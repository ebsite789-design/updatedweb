<?php get_header(); ?>

<main>
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">Bengaluru · India</p>
            <h1>BEYOND<br><em>THE GAME.</em></h1>
            <p class="intro">We create high-energy sporting experiences that bring players, fans and communities together.</p>
            <a class="button" href="<?php echo esc_url(home_url('/register/')); ?>">Register now →</a>
        </div>
        <div class="hero-side">
            <div class="hero-media">
                <img src="<?php echo esc_url(home_url('/images/arise-team-highlight.jpg')); ?>" alt="Arise Sports team and event highlight" />
            </div>
            <div class="card">
                <h2>Upcoming events</h2>
                <p><strong>26/07/2026</strong> — Arise Indoor Box Cricket Tournament</p>
                <p><strong>09/08/2026</strong> — Arise Football Championship (5-A-Side)</p>
                <p><strong>09/08/2026</strong> — 1V1 Showdown</p>
            </div>
        </div>
    </section>

    <section class="statement" id="about">
        <h2>SPORT HAS THE POWER<br>TO <span>MOVE</span> PEOPLE.</h2>
        <p>Arise Sports Management is a team of sports lovers, operators and event makers. From the first whistle to the final celebration, we make every moment count.</p>
    </section>

    <section class="section" id="events">
        <h2>Events</h2>
        <div class="grid">
            <div class="card">
                <p><strong>ARISE INDOOR BOX CRICKET TOURNAMENT</strong><br/>26/07/2026</p>
            </div>
            <div class="card">
                <p><strong>ARISE FOOTBALL CHAMPIONSHIP (5-A-SIDE)</strong><br/>09/08/2026</p>
            </div>
            <div class="card">
                <p><strong>1V1 SHOWDOWN</strong><br/>09/08/2026</p>
            </div>
        </div>
    </section>

    <section class="numbers">
        <div><strong>78+</strong><span>Events delivered</span></div>
        <div><strong>271+</strong><span>Players in community</span></div>
        <div><a class="contact-link" href="<?php echo esc_url(home_url('/register/')); ?>">Register now</a></div>
    </section>
</main>

<?php get_footer(); ?>
