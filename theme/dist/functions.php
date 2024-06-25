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


// Register Custom Post Type
// https://generatewp.com/post-type/
function post_type_projects(): void
{
    $labels = array(
        'name' => _x('Projekte', 'Post Type General Name', 'webdev'),
        'singular_name' => _x('Projekt', 'Post Type Singular Name', 'webdev'),
        'menu_name' => __('Projekte', 'webdev'),
        'name_admin_bar' => __('Projekte', 'webdev'),
        'archives' => __('Projekt Archiv', 'webdev'),
        'attributes' => __('Item Attributes', 'webdev'),
        'parent_item_colon' => __('Parent Item:', 'webdev'),
        'all_items' => __('Alle Projekte', 'webdev'),
        'add_new_item' => __('Add New Item', 'webdev'),
        'add_new' => __('Neues Projekt hinzufügen', 'webdev'),
        'new_item' => __('Neues Projekt', 'webdev'),
        'edit_item' => __('Edit Item', 'webdev'),
        'update_item' => __('Update Item', 'webdev'),
        'view_item' => __('View Item', 'webdev'),
        'view_items' => __('View Items', 'webdev'),
        'search_items' => __('Search Item', 'webdev'),
        'not_found' => __('Kein Projekt gefunden', 'webdev'),
        'not_found_in_trash' => __('Not found in Trash', 'webdev'),
        'featured_image' => __('Projektbild', 'webdev'),
        'set_featured_image' => __('Projektbild auswählen', 'webdev'),
        'remove_featured_image' => __('Projektbild entfernen', 'webdev'),
        'use_featured_image' => __('Als Projektbild verwenden', 'webdev'),
        'insert_into_item' => __('Insert into item', 'webdev'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'webdev'),
        'items_list' => __('Items list', 'webdev'),
        'items_list_navigation' => __('Items list navigation', 'webdev'),
        'filter_items_list' => __('Filter items list', 'webdev'),
    );
    $args = array(
        'label' => __('Projekt', 'webdev'),
        'description' => __('Unsere Projekte', 'webdev'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-buddicons-replies',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true
    );
    register_post_type('project', $args);

}

add_action('init', 'post_type_projects', 0);




