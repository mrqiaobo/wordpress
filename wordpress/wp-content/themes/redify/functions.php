<?php
add_action( 'wp_enqueue_scripts', 'redify_theme_css',999);
function redify_theme_css() {
    wp_enqueue_style( 'redify-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'redify-child-style', get_stylesheet_uri(), array( 'redify-parent-style' ) );
}
require( get_stylesheet_directory() . '/functions/customizer/customizer_home_page.php' );

add_action( 'after_setup_theme', 'redify_theme_setup' ); 	
   	function redify_theme_setup()
   	{	
   		require_once( get_stylesheet_directory() . '/theme_setup_data.php' );
		// setup admin pannel defual data for index page		
   		$redify_theme= redify_theme_data_setup();
   	}
	
add_action( 'customize_register', 'remove_custom', 1000 );
function remove_custom($wp_customize) {
  $wp_customize->remove_setting('rambo_home_page_customizer');
  $wp_customize->remove_section('recent_news_settings');
}
?>