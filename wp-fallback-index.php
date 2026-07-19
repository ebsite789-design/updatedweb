<?php
/*
Plugin Name: Arise Safe Fallback
Description: Minimal fallback page that prevents a white screen if the theme is broken.
Version: 1.0
*/

add_action('wp_head', function () {
    echo '<style>body{font-family:Arial,sans-serif;padding:40px;line-height:1.6}h1{font-size:2rem}</style>';
});

add_shortcode('arise_safe_fallback', function () {
    return '<h1>Arise Sports</h1><p>Your site is loading with a safe fallback page. Please activate a default theme or re-upload the custom theme.</p>';
});
