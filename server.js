require('dotenv').config();
const express = require('express');
const cors = require('cors');
const { Pool } = require('pg');

const app = express();
app.use(cors());
app.use(express.json({ limit: '20mb' }));

// Accept base64 JSON bodies up to ~20MB


const pool = new Pool({
  connectionString: process.env.NEON_DATABASE_URL,
});

app.get('/health', (req, res) => {
  res.json({ ok: true });
});

function requireString(value, fieldName) {
  if (typeof value !== 'string' || !value.trim()) {
    throw new Error(`Missing/invalid ${fieldName}`);
  }
  return value.trim();
}

app.post('/api/registrations', async (req, res) => {
  try {
    const body = req.body || {};

    const name = requireString(body.name, 'name');
    const email = requireString(body.email, 'email');
    const team = requireString(body.team, 'team');
    const captain = requireString(body.captain, 'captain');
    const instagram = requireString(body.instagram, 'instagram');
    const event = requireString(body.event, 'event');

    const eventDate = typeof body.eventDate === 'string' ? body.eventDate.trim() : null;
    const fee = typeof body.fee === 'string' ? body.fee.trim() : null;

    // Expect base64 strings for uploaded images.
    const captainPhotoBase64 = typeof body.captainPhoto === 'string' ? body.captainPhoto : null;
    const paymentScreenshotBase64 = typeof body.paymentScreenshot === 'string' ? body.paymentScreenshot : null;

    const captainPhotoBytes = captainPhotoBase64 ? Buffer.from(captainPhotoBase64, 'base64') : null;
    const paymentScreenshotBytes = paymentScreenshotBase64 ? Buffer.from(paymentScreenshotBase64, 'base64') : null;

    const timestamp = body.timestamp ? new Date(body.timestamp) : new Date();


    // Ensure table exists (safe for small usage; for production use migrations).
    await pool.query(`
      CREATE TABLE IF NOT EXISTS event_registrations (
        id SERIAL PRIMARY KEY,
        created_at TIMESTAMPTZ NOT NULL,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        team TEXT NOT NULL,
        captain TEXT NOT NULL,
        instagram TEXT NOT NULL,
        event TEXT NOT NULL,
        event_date TEXT NULL,
        fee TEXT NULL,
        captain_photo BYTEA NULL,
        payment_screenshot BYTEA NULL

      );
    `);

    const result = await pool.query(
      `INSERT INTO event_registrations
      (created_at, name, email, team, captain, instagram, event, event_date, fee, captain_photo, payment_screenshot)
       VALUES
        ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11)

       RETURNING id;`,
      [
        timestamp,
        name,
        email,
        team,
        captain,
        instagram,
        event,
        eventDate,
        fee,
        captainPhotoBytes,
        paymentScreenshotBytes,

      ]
    );

    res.json({ success: true, id: result.rows[0].id });
  } catch (err) {
    res.status(400).json({ success: false, error: err.message || String(err) });
  }
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
  // eslint-disable-next-line no-console
  console.log(`Server listening on port ${port}`);
});

