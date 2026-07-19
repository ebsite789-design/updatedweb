<?php
/*
Template Name: Register Page
*/
get_header();
?>

<main class="section">
    <h2>Register</h2>
    <p>Use the form below to register your team for upcoming events.</p>

    <form style="max-width:760px;padding:24px;background:#f7f2ea;border-radius:18px;box-shadow:0 12px 40px rgba(0,0,0,0.08);">
        <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px;">
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Full name
                <input type="text" name="name" placeholder="Enter your name" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;" />
            </label>
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Email address
                <input type="email" name="email" placeholder="you@example.com" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;" />
            </label>
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Team name
                <input type="text" name="team" placeholder="Your team name" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;" />
            </label>
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Captain / leader name
                <input type="text" name="captain" placeholder="Captain name" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;" />
            </label>
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Captain Instagram ID / link
                <input type="text" name="instagram" placeholder="@username or link" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;" />
            </label>
            <label style="display:flex;flex-direction:column;gap:8px;font-weight:600;">
                Choose event
                <select name="event" required style="padding:12px 14px;border:1px solid #d0c8ba;border-radius:10px;font:inherit;">
                    <option value="" selected disabled>Select an event</option>
                    <option value="ARISE INDOOR BOX CRICKET TOURNAMENT">ARISE INDOOR BOX CRICKET TOURNAMENT</option>
                    <option value="ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)">ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)</option>
                    <option value="1V1 SHOWDOWN">1V1 SHOWDOWN</option>
                </select>
            </label>
        </div>

        <button type="submit" style="margin-top:18px;padding:12px 18px;border:0;border-radius:999px;background:#f0442e;color:white;font-weight:700;cursor:pointer;">Register team</button>
        <p style="margin-top:12px;color:#4a443f;">You can also reach us at <a href="mailto:arisesportsbtg@gmail.com">arisesportsbtg@gmail.com</a>.</p>
    </form>
</main>

<?php get_footer(); ?>
