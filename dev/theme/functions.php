<?php
/* Zékario Theme functions and definitions */
require get_template_directory() . '/inc/load-scripts.php';
require get_template_directory() . '/inc/load-acf.php';
require get_template_directory() . '/inc/load-gf.php';
/*
require get_template_directory() . '/inc/load-taxonomies.php';
*/
require get_template_directory() . '/inc/load-tinymce.php';
require get_template_directory() . '/inc/load-navbar.php';
require get_template_directory() . '/inc/load-breadcrumb.php';
require get_template_directory() . '/inc/load-pagination.php';
require get_template_directory() . '/inc/load-image.php';
require get_template_directory() . '/inc/load-excerpt.php';
require get_template_directory() . '/inc/load-disable-comments.php';

add_filter( 'sanitize_file_name', 'remove_accents' );

/* Admin bar */
add_filter('show_admin_bar', '__return_false');


/* Zekario_setup */
function zekario_setup() {
    load_theme_textdomain( 'zekario', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );

	update_option( 'thumbnail_size_w', 320 );
	update_option( 'thumbnail_size_h', 'auto');

	update_option( 'medium_size_w', 576 );
	update_option( 'medium_size_h', 'auto');

	update_option( 'medium_large_size_w', 768 );
	update_option( 'medium_large_size_h', 'auto');

	update_option( 'large_size_w', 1200 );
	update_option( 'large_size_h', 'auto');

    add_image_size( 'meta-fb-image', 1200, 630, true );
    add_image_size( 'meta-tw-image', 1024, 512, true );

    register_nav_menus( array(
        'menu-head'    => __( 'Menu Head', 'zekario' ),
        'menu-mobile' => __( 'Menu Mobile', 'zekario' ),
        'menu-footer' => __( 'Menu Footer', 'zekario' ),
        'menu-essp' => __( 'Menu essp', 'zekario' ),
    ) );
}
add_action( 'after_setup_theme', 'zekario_setup' );
