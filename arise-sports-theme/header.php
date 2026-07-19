<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Arise Sports home"><span>ARISE</span><small>SPORTS</small></a>
        <nav aria-label="Main navigation">
            <a href="<?php echo esc_url(home_url('/#about')); ?>">About</a>
            <a href="<?php echo esc_url(home_url('/#events')); ?>">Events</a>
            <a href="<?php echo esc_url(home_url('/register/')); ?>">Register</a>
            <a href="<?php echo esc_url(home_url('/gallery/')); ?>">Gallery</a>
        </nav>
    </header>
