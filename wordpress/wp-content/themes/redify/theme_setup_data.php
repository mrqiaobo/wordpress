<?php
function redify_theme_data_setup()
{
	return $rambo_theme_options=array(
		'home_custom_banner_image' => get_stylesheet_directory_uri() . '/images/slide.jpg',
		'home_latest_news_enabled' => true,
		'blog_section_head' => __('Latest News','redify'),
		);
}
?>