<?php

add_action('after_setup_theme', function () {

// Title Tag in Head
    add_theme_support('title-tag');



    // Erweiter
    add_theme_support('appearance-tools');



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

    // Aktivierung von Beitragsbildern
    add_theme_support('post-thumbnails');

    // Register Menu Aktivieren
    register_nav_menus([
        'primary' => __('Haupt Navigation', 'webdev'),
        'footer' => __('Footer Navigation', 'webdev'),
    ]);


    //Backend
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');



});


// CSS und JS vor dem Body
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('webdev-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('icon-style', get_template_directory_uri() . '/assets/css/icon.css');



    add_action('enqueue_block_editor_assets', function() {
        wp_enqueue_script('editor-script', get_template_directory_uri() .'/assets/js/editor.js',
            ['wp-blocks', 'wp-dom'], '1.0.0', true);
    });

    // Jss im Footer einfügen
    wp_enqueue_script('webdev-script', get_template_directory_uri() . '/assets/js/scripts.js',[],'1.0',true);

});


//Zusätlische Dokumententypen erlauben
add_filter('upload_mimes', function ( $mimes = []) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});




//Social Media Einfügen
function theme_customizer_social_links($wp_customize): void
{
    // Customizer Section
    $wp_customize->add_section('social_links_section', [
        'title' => __('Social Links', 'webdev'),
        'priority' => 100
    ]);

    $social_links = [
        'linkedin' => __('LinkedIn Link', 'webdev'),
        'instagram' => __('Instagram Link', 'webdev'),
        'facebook' => __('Facebook Link', 'webdev'),
        'github' => __('GitHub Link', 'webdev'),
    ];

    foreach($social_links as $link => $label)
    {
        // Setting
        $wp_customize->add_setting($link, [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        ]);

        //Control (Eingabefelder)
        $wp_customize->add_control($link, [
            'label'    => __($label, 'webdev'),
            'section'  => 'social_links_section',
            'type'     => 'text'
        ]);
    }

    // Setting
    $wp_customize->add_setting('social_bar_position', [
        'default'           => '',
    ]);

    //Control (Eingabefelder)
    $wp_customize->add_control('social_bar_position', [
        'label'    => __('Position der Social Bar auf links setzen', 'webdev'),
        'section'  => 'social_links_section',
        'type'     => 'checkbox',
    ]);

}

add_action('customize_register', 'theme_customizer_social_links');





//Pagination
function pagination($paged = '', $max_page = '')
{
    $big = 999999999; // need an unlikely integer
    if (!$paged) {
        $paged = get_query_var('paged');
    }


    if (!$max_page) {
        global $wp_query;
        $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
    }

    $html = '<nav class="pagination">';
    $html .= paginate_links([
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $max_page,
        'mid_size' => 1,
        'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'wifi') . '"></span>',
        'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'wifi') . '"></span>'
    ]);
    $html .= '</nav>';
    echo $html;
}




