<?php
/**
 * Admin Dashboard
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WC_Admin_Dashboard' ) ) :

/**
 * Disney_Dashboard Class.
 */
class Disney_Dashboard {
	
	/**
	 * Hook in tabs.
	 */
	function __construct() {
		add_action( 'wp_dashboard_setup', array( $this, 'init' ) );
		add_filter ( 'update_right_now_text', array (
				$this,
				'update_right_now_text'
		) );
	}
	
	/***
	 * Init dashboard widgets.
	 */
	function init() {
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		wp_add_dashboard_widget( 'disney_muenu_widget', __( 'Menu', 'disney' ), array( $this, 'menu_widget' ));
		wp_add_dashboard_widget( 'disney_navigation_widget', __( 'Navigation', 'disney'), array( $this, 'navigation_widget' ) );
	}
	
	/***
	 * Show dashboard nav
	 */
	function menu_widget() {
		if ( !$menu_location = get_menu_name_by_location() ) {
			?>
			<div><a href="edit-tags.php?taxonomy=category" onclick="jQuery(this).parent().next('.wrapper').slideToggle();" style="display:block; padding:5px; border: 1px solid #eee; margin-bottom:2px; background-color: #F7F7F7;"><?php echo ( __( 'Add New Category', 'disney' ) )?></a></div>
      <?php 
      return;
		}
		$nav_menu_items = wp_get_nav_menu_items( $menu_location ) ;
		$depth = 0;
		$pre_id = 0;
		$pre_parent_id = 0;

		foreach ( $nav_menu_items as $nav_menu_item ) {
			$parent_id = $nav_menu_item->menu_item_parent;
			
			$category = get_category( $nav_menu_item->object_id );
			if ( $parent_id == 0 ) {
				$depth = 0;
			} else if ( $pre_id == $parent_id ) {
				$depth++;
			} else if ( $pre_parent_id != $parent_id ) {
				$depth--;
			}
			
			$margin_left = 15*$depth . 'px';
			echo "<div style=\"margin: 5px 0 0 $margin_left\"><a href=\"edit.php?category_name=$category->slug\">$nav_menu_item->title</a></div>";
			
			$pre_id = $nav_menu_item->ID;
			$pre_parent_id = $parent_id;
		}
	}
	
	function navigation_widget() {
		?>
		<div><a href="post-new.php" onclick="jQuery(this).parent().next('.wrapper').slideToggle();" style="display:block; padding:5px; border: 1px solid #eee; margin-bottom:2px; background-color: #F7F7F7;"><?php echo ( __( 'Add New Post', 'disney' ) )?></a></div>
		<div><a href="edit-tags.php?taxonomy=category" onclick="jQuery(this).parent().next('.wrapper').slideToggle();" style="display:block; padding:5px; border: 1px solid #eee; margin-bottom:2px; background-color: #F7F7F7;"><?php echo ( __( 'Add New Category', 'disney' ) )?></a></div>
		<div><a href="nav-menus.php" onclick="jQuery(this).parent().next('.wrapper').slideToggle();" style="display:block; padding:5px; border: 1px solid #eee; margin-bottom:2px; background-color: #F7F7F7;"><?php echo ( __( 'Adjust Menu Structure', 'disney' ) )?></a></div>
		<?php
	}
	
	function update_right_now_text($content) {
		return "";
	}
}

endif;

return new Disney_Dashboard();
