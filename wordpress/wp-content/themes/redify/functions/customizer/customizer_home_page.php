<?php
function redify_home_page_customizer( $wp_customize ) {

/* Header Section */
	$wp_customize->add_panel( 'home_page_setting', array(
		'capability'     => 'edit_theme_options',
		'priority'   => 250,
		'title'      => __('Home Page Settings', 'redify'),
	) );

 
$wp_customize->add_section(
        'news_section_settings',
        array(
            'title' => __('Recent News Setting','redify'),
            'description' => '',
			'priority'   => 230,
			'panel'  => 'home_page_setting',)
    );
	
	//Enable & Disable News Section
	$wp_customize->add_setting(
    'rambo_theme_options[home_latest_news_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'rambo_theme_options[home_latest_news_enabled]',
    array(
        'label' => __('Enable Latest News Section','redify'),
        'section' => 'news_section_settings',
        'type' => 'checkbox',
    ));
		
		
	//News Title
	$wp_customize->add_setting(
    'rambo_theme_options[blog_section_head]',
    array(
        'default' => __('Latest News','redify'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		
		)
	);	
	$wp_customize->add_control('rambo_theme_options[blog_section_head]',array(
    'label'   => __('Recent News Section Heading','redify'),
    'section' => 'news_section_settings',
	 'type' => 'text',
	 )  );
	}
	add_action( 'customize_register', 'redify_home_page_customizer' );
	?>