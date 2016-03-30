<?php get_header(); ?>

<?php 
if (is_home()) {
	wp_nav_menu( array(
	'theme_location' => 'tile-menu',
	'container' => 'div',
	'container_id' => 'promo-tiles',
	'container_class' => 'container',
	'items_wrap' => '%3$s',
	'link_class' => 'promo-box',
	'walker' => new Walker_Promo_Tiles_Menu()
	) );
}
?>

<?php get_footer(); ?>

