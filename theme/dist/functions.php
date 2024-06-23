<?php

add_action('after_setup_theme', function () {

// Title Tag in Head
    add_theme_support('title-tag');



    // Navigation Menu



    // Logo
    add_theme_support('custom-logo', [
        'height' => 60,
        'width' => 100,

        // SVG format, schneiden
        'flex-height' => true,
        'flex-width' => true,
    ]);

    //HTML5 Support Aktivieren
    add_theme_support('html5', [
        'caption', 'comment-form', 'comment-list', 'gallery', 'search-form', 'style', 'script'
    ]);

    // Register Menu Aktivieren
    register_nav_menus([
        'primary' => __('Haupt Navigation', 'webdev'),
        'footer' => __('Footer Navigation', 'webdev'),
    ]);



});


// CSS und JS vor dem Body
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('webdev-style', get_template_directory_uri() . '/style.css');

});


//Zusätlische Dokumententypen erlauben
add_filter('upload_mimes', function ( $mimes = []) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});

