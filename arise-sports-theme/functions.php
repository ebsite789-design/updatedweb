<?php
function arise_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'arise_setup');

function arise_enqueue_assets() {
    wp_enqueue_style('arise-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'arise_enqueue_assets');

function arise_handle_custom_routes() {
    $request_path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');

    if ($request_path === 'register') {
        status_header(200);
        include get_template_directory() . '/page-register.php';
        exit;
    }

    if ($request_path === 'gallery') {
        status_header(200);
        include get_template_directory() . '/page-gallery.php';
        exit;
    }
}
add_action('template_redirect', 'arise_handle_custom_routes');
