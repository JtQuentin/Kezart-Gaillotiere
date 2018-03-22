<?php
/**
 * Zékario Theme load scripts functionality
 */

function zekario_base() {

	/* Styles */
	wp_deregister_style('default-style', get_stylesheet_uri());

	wp_register_style('bootstrap-css', get_theme_file_uri( '/assets/library/bootstrap/css/bootstrap.min.css'), false, '4.0.0', null);
	wp_enqueue_style('bootstrap-css');

/*	wp_register_style('font-awesome-css', get_theme_file_uri( '/assets/library/font-awesome/css/fontawesome-all.min.css'), false, '5.0.6', null);
	wp_enqueue_style('font-awesome-css');*/

	wp_register_style('swiper-css', get_theme_file_uri( '/assets/library/swiper/css/swiper.min.css' ), false, '4.1.0', null);
	wp_enqueue_style( 'swiper-css');

	wp_register_style( 'fancybox-css', get_theme_file_uri( '/assets/library/fancybox/jquery.fancybox.min.css' ), false, '3.2.10' );
	wp_enqueue_style( 'fancybox-css');

    $update_time = filemtime(get_stylesheet_directory() . '/assets/css/theme.min.css');
    wp_enqueue_style( 'zekario-css', get_theme_file_uri( '/assets/css/theme.min.css' ), array(), $update_time );

	/* Scripts */

	// wp_deregister_script('jquery');
	wp_enqueue_script('jquery-3.2.1', get_theme_file_uri( '/assets/library/jquery/jquery-3.2.1.min.js'), array(), '3.2.1', false);
	// wp_enqueue_script('jquery-migrate-1.4.1', get_theme_file_uri( '/assets/library/jquery/jquery-migrate-1.4.1.min.js'), array(), '1.4.1', false);
	wp_enqueue_script('bootstrap-js', get_theme_file_uri( '/assets/library/bootstrap/js/bootstrap.bundle.min.js'), array(), '4.0.0', true);

//	wp_enqueue_script('bootstrap-js-native', get_theme_file_uri( '/assets/library/bootstrap/native-js.2.0.15/bootstrap-native-v4.min.js'), array(), '4.0.0-beta.3', true);

	wp_enqueue_script('font-awesome-js', get_theme_file_uri( '/assets/library/font-awesome/js/fontawesome-all.min.js'), array(), '5.0.6', false);

	wp_enqueue_script('swiper-js', get_theme_file_uri( '/assets/library/swiper/js/swiper.min.js' ), array(), '4.1.0', true);

	wp_enqueue_script( 'fancybox-js', get_theme_file_uri( '/assets/library/fancybox/jquery.fancybox.min.js' ), array(), '3.2.10', true );
//	wp_enqueue_script( 'font-awesome-js', get_theme_file_uri( '/assets/library/font-awesome/js/fontawesome-all.min.js' ), array(), '5.0.4', true );

    $update_time = filemtime(get_stylesheet_directory() . '/assets/js/theme.min.js');
	wp_enqueue_script( 'zekario-js', get_theme_file_uri( '/assets/js/theme.min.js' ), array(), $update_time, true );

	$obj_array = array(
		'url_home' => get_home_url(),
		'is_home' => is_front_page(),
		'is_page' => is_page(),
	);
	wp_localize_script( 'zekario-js', 'objects', $obj_array );
	wp_enqueue_script( 'zekario-js' );
}
add_action('wp_enqueue_scripts', 'zekario_base', 100);

function zekario_scripts_admin() {
	foreach( glob( get_template_directory() . '/assets/admin/*.js' ) as $file ) {
		$filename = substr($file, strrpos($file, '/') + 1);
		wp_enqueue_script( $filename, get_template_directory_uri() . '/assets/admin/' . $filename);
	}

	foreach( glob( get_template_directory() . '/assets/admin/*.css' ) as $file ) {
		$filename = substr($file, strrpos($file, '/') + 1);
		wp_enqueue_style( $filename, get_template_directory_uri() . '/assets/admin/' . $filename);
	}
}
add_action( 'admin_enqueue_scripts', 'zekario_scripts_admin' );

function zekario_scripts_gsap() {
//    wp_enqueue_script('GSAP-TweenLite', get_theme_file_uri().'/assets/library/gsap/TweenLite.min.js', array(), '1.20.3', false);
    wp_enqueue_script('GSAP-TweenMax', get_theme_file_uri().'/assets/library/gsap/TweenMax.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-TimelineLite', get_theme_file_uri().'/assets/library/gsap/TimelineLite.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-TimelineMax', get_theme_file_uri().'/assets/library/gsap/TimelineMax.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-utils-CSSTransform', get_theme_file_uri().'/assets/library/gsap/utils/CSSTransform.min.js', array(), '1.20.3', false);
    wp_enqueue_script('GSAP-utils-SplitText', get_theme_file_uri().'/assets/library/gsap/utils/SplitText.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-easing-EasePack', get_theme_file_uri().'/assets/library/gsap/easing/EasePack.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-plugins-easing', get_theme_file_uri().'/assets/library/gsap/plugins/AttrPlugin.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-plugins-CSSPlugin', get_theme_file_uri().'/assets/library/gsap/plugins/CSSPlugin.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-plugins-CSSRulePlugin', get_theme_file_uri().'/assets/library/gsap/plugins/CSSRulePlugin.min.js', array(), '1.20.3', false);
//    wp_enqueue_script('GSAP-plugins-DrawSVGPlugin', get_theme_file_uri().'/assets/library/gsap/plugins/DrawSVGPlugin.min.js', array(), '1.20.3', false);
//	wp_enqueue_script('GSAP-SplitText', get_theme_file_uri().'/assets/library/gsap/utils/SplitText.min.js', array(), '1.20.3', false);
}
add_action( 'wp_enqueue_scripts', 'zekario_scripts_gsap' );

function zekario_scripts_scrollmagic() {
   wp_enqueue_script('scrollmagic', get_theme_file_uri().'/assets/library/scrollmagic/ScrollMagic.min.js', array(), '2.0.5', true);
//    wp_enqueue_script('scrollmagic-debug', get_theme_file_uri().'/assets/library/scrollmagic/plugins/debug.addIndicators.min.js', array(), '2.0.5', true);
   wp_enqueue_script('scrollmagic-gsap', get_theme_file_uri().'/assets/library/scrollmagic/plugins/animation.gsap.min.js', array(), '2.0.5', true);
   wp_enqueue_script('scrollmagic-velocity', get_theme_file_uri().'/assets/library/scrollmagic/plugins/animation.velocity.min.js', array(), '2.0.5', true);
}
add_action( 'wp_enqueue_scripts', 'zekario_scripts_scrollmagic' );
