<?php
if( function_exists( 'acf_add_options_page' ) ) {
    // acf_add_options_page( get_bloginfo() );
	// acf_add_options_page( 'Menu' );

	acf_add_options_page(array(
		'page_title' 	=> get_bloginfo(),
		'menu_slug'		=> 'parent',
		'icon_url'      => 'dashicons-welcome-widgets-menus'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'À propos',
		'menu_title' 	=> 'À propos',
		'parent_slug' 	=> 'parent',
	));

}
