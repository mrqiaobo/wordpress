<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div id="secondary">
	<?php
	         $current_cagetory_id = get_request_category()->term_id;
            $c = get_top_category($current_cagetory_id);
            $_SESSION["top_slug"] = $c->slug;
            ?>
            <h2><?php echo $c->name;?></h2>

	 <nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php
		  wp_nav_menu(array(
		      'theme_location' => 'primary' ,
		      'menu_class' => 'nav-menu',
		      'menu_id' => 'primary-menu',
		      'walker' => new Walker_Nav_Menu_Second_Level()) );
		?>
	</nav>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
