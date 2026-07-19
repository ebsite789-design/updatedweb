<?php
/*
Template Name: Arise Sports Full Page
*/

get_header();
?>

<style>
:root{
  --ink:#0b0b0b;--paper:#f4f1eb;--red:#f0442e;--muted:#77736c;
}
body{margin:0;background:var(--paper);color:var(--ink);font-family:Manrope,Arial,sans-serif;}
.site-header{height:82px;display:flex;align-items:center;justify-content:space-between;padding:0 5.5vw;position:sticky;top:0;z-index:10;width:100%;background:#101010;color:#fff;}
.brand{line-height:.72;text-decoration:none;color:inherit;font-family:'Barlow Condensed',sans-serif;font-weight:900;font-size:2.15rem;letter-spacing:-1.5px;}
.brand small{display:block;font-size:.78rem;letter-spacing:4.8px;margin-left:2px;margin-top:7px;}
.site-header nav{display:flex;align-items:center;gap:28px;}
.site-header nav a{font-size:.75rem;text-transform:uppercase;letter-spacing:.1em;color:inherit;text-decoration:none;font-weight:700;}
.hero{min-height:745px;background:#101010;color:#fff;padding:145px 5.5vw 80px;display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:center;}
.hero h1{font:900 clamp(4rem,8vw,8.7rem)/.79 'Barlow Condensed',sans-serif;letter-spacing:-.045em;margin:37px 0 25px;}
.hero h1 em{color:var(--red);font-style:normal;}
.intro{max-width:360px;color:#d0d0d0;font-size:.95rem;line-height:1.75;margin-bottom:35px;}
.button{display:inline-flex;gap:20px;justify-content:space-between;align-items:center;padding:15px 19px;text-decoration:none;text-transform:uppercase;letter-spacing:.09em;font-weight:800;font-size:.69rem;color:#fff;background:var(--red);}
.section{padding:90px 5.5vw;}
.section h2{font:900 clamp(2.5rem,5vw,3.8rem)/.85 'Barlow Condensed',sans-serif;letter-spacing:-.04em;margin:0 0 18px;}
.section p{line-height:1.75;color:#4a443f;}
.card{background:#fff;padding:28px;border-radius:20px;box-shadow:0 14px 38px rgba(0,0,0,.08);margin-top:18px;}
@media(max-width:720px){.site-header{height:72px;padding:0 7vw}.site-header nav{display:none}.hero{padding:128px 7vw 50px;display:block;}.hero h1{font-size:5rem;}}
</style>

<header class="site-header">
  <a class="brand" href="/" aria-label="Arise Sports home"><span>ARISE</span><small>SPORTS</small></a>
  <nav aria-label="Main navigation">
    <a href="/#about">About</a>
    <a href="/#events">Events</a>
    <a href="/register/">Register</a>
    <a href="/gallery/">Gallery</a>
  </nav>
</header>

<section class="hero">
  <div>
    <p style="font-size:.7rem;letter-spacing:.15em;font-weight:800;text-transform:uppercase;color:#c8c8c8;">Bengaluru · India</p>
    <h1>BEYOND<br><em>THE GAME.</em></h1>
    <p class="intro">We create high-energy sporting experiences that bring players, fans and communities together.</p>
    <a class="button" href="/register/">Register now →</a>
  </div>
  <div class="card">
    <h2>Upcoming events</h2>
    <p><strong>26/07/2026</strong> — Arise Indoor Box Cricket Tournament</p>
    <p><strong>09/08/2026</strong> — Arise Football Championship (5-A-Side)</p>
    <p><strong>09/08/2026</strong> — 1V1 Showdown</p>
  </div>
</section>

<section class="section" id="about">
  <h2>About Arise</h2>
  <p>Arise Sports Management creates exciting sporting experiences for communities, teams and corporate partners across Bengaluru and beyond.</p>
</section>

<section class="section" id="events">
  <h2>Events</h2>
  <div class="card">
    <p><strong>ARISE INDOOR BOX CRICKET TOURNAMENT</strong><br/>26/07/2026</p>
    <p><strong>ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)</strong><br/>09/08/2026</p>
    <p><strong>1V1 SHOWDOWN</strong><br/>09/08/2026</p>
  </div>
</section>

<?php get_footer(); ?>
