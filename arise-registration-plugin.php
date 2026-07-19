<?php
/*
Plugin Name: Arise Registration
Description: Adds a WordPress registration form for Arise events that can post to a Google Sheet via Apps Script.
Version: 1.0
*/

if (!defined('ABSPATH')) {
    exit;
}

add_shortcode('arise_registration_form', 'arise_registration_form_shortcode');

function arise_registration_form_shortcode($atts)
{
    ob_start();
    ?>
    <div class="arise-registration-form-wrap">
        <form id="arise-registration-form" class="arise-registration-form">
            <div class="arise-form-grid">
                <label>
                    Full name
                    <input type="text" name="name" placeholder="Enter your name" required />
                </label>
                <label>
                    Email address
                    <input type="email" name="email" placeholder="you@example.com" required />
                </label>
                <label>
                    Team name
                    <input type="text" name="team" placeholder="Your team name" required />
                </label>
                <label>
                    Captain / leader name
                    <input type="text" name="captain" placeholder="Captain name" required />
                </label>
                <label>
                    Captain Instagram ID / link
                    <input type="text" name="instagram" placeholder="@username or link" required />
                </label>
                <label>
                    Choose event
                    <select name="event" required>
                        <option value="" selected disabled>Select an event</option>
                        <option value="ARISE INDOOR BOX CRICKET TOURNAMENT">ARISE INDOOR BOX CRICKET TOURNAMENT</option>
                        <option value="ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)">ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)</option>
                        <option value="1V1 SHOWDOWN">1V1 SHOWDOWN</option>
                    </select>
                </label>
            </div>

            <button type="submit">Register team</button>
            <p class="arise-form-status" role="status" aria-live="polite"></p>
        </form>
    </div>

    <style>
        .arise-registration-form-wrap {
            max-width: 760px;
            margin: 30px 0;
            padding: 24px;
            background: #f7f2ea;
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.08);
        }

        .arise-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .arise-registration-form label {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-weight: 600;
        }

        .arise-registration-form input,
        .arise-registration-form select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d0c8ba;
            border-radius: 10px;
            font: inherit;
        }

        .arise-registration-form button {
            margin-top: 18px;
            padding: 12px 18px;
            border: 0;
            border-radius: 999px;
            background: #f0442e;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .arise-form-status {
            margin-top: 12px;
            min-height: 1.4em;
            font-weight: 700;
            color: #f0442e;
        }

        .arise-form-status.success {
            color: #1f7a3d;
        }

        .arise-form-status.error {
            color: #b42318;
        }

        @media (max-width: 720px) {
            .arise-form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('arise-registration-form');
        const status = form?.querySelector('.arise-form-status');

        if (!form) return;

        const SHEET_WEBAPP_URL = 'YOUR_APPS_SCRIPT_WEBAPP_URL';

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const formData = new FormData(form);
            const payload = {
                timestamp: new Date().toISOString(),
                name: formData.get('name')?.toString().trim() || '',
                email: formData.get('email')?.toString().trim() || '',
                team: formData.get('team')?.toString().trim() || '',
                captain: formData.get('captain')?.toString().trim() || '',
                instagram: formData.get('instagram')?.toString().trim() || '',
                event: formData.get('event')?.toString().trim() || ''
            };

            if (status) {
                status.textContent = 'Submitting...';
                status.className = 'arise-form-status';
            }

            try {
                if (SHEET_WEBAPP_URL && !SHEET_WEBAPP_URL.includes('YOUR_APPS_SCRIPT_WEBAPP_URL')) {
                    await fetch(SHEET_WEBAPP_URL, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload)
                    });

                    if (status) {
                        status.textContent = 'Registration saved successfully.';
                        status.classList.add('success');
                    }
                } else {
                    if (status) {
                        status.textContent = 'Google Sheet endpoint is not configured yet.';
                        status.classList.add('error');
                    }
                }
            } catch (error) {
                if (status) {
                    status.textContent = 'There was a problem saving the registration.';
                    status.classList.add('error');
                }
            }

            form.reset();
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
