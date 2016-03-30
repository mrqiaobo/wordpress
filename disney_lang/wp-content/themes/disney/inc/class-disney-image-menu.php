<?php
class Disney_Image_Menu {
	function __construct() {
		add_post_type_support ( "nav_menu_item", "thumbnail" );
		add_filter ( 'manage_nav-menus_columns', array (
				$this,
				'menu_image_nav_menu_manage_columns',
				11 
		) );
		add_action ( 'admin_head-nav-menus.php', array (
				$this,
				'menu_image_admin_head_nav_menus_action' 
		) );
		add_action ( 'wp_ajax_set-nav-menu-item-thumbnail', array (
				$this,
				'wp_ajax_set_nav_menu_item_thumbnail' 
		) );
		add_action ( 'admin_action_delete-menu-item-image', array (
				$this,
				'menu_image_delete_menu_item_image_action' 
		) );
		add_action ( 'save_post_nav_menu_item', array (
				$this,
				'menu_image_save_post_action' 
		), 10, 3 );
		add_action ( "admin_init", array (
				$this,
				"menu_image_init" 
		) );
	}
	
	/**
	 * Add menu-image start*
	 */
	
	/**
	 * add custom walker and filter to edit nav
	 *
	 * @author :jacob.qiao
	 */
	public function menu_image_init() {
		// Add custom field for menu edit walker
		if (! has_action ( 'wp_nav_menu_item_custom_fields' )) {
			add_filter ( 'wp_edit_nav_menu_walker', array (
					$this,
					'menu_image_edit_nav_menu_walker_filter' 
			) );
		}
		// Add image selector to walker.
		add_action ( 'wp_nav_menu_item_custom_fields', array (
				$this,
				'menu_item_custom_fields' 
		), 10, 1 );
	}
	
	/**
	 * return image select div.
	 *
	 * @author jacob.qiao
	 * @param
	 *        	$item_id
	 */
	public function menu_item_custom_fields($item_id) {
		?>
<div class="field-image hide-if-no-js wp-media-buttons">
    			<?php echo $this->wp_post_thumbnail_html( $item_id )?>
    		</div>
<?php
	}
	
	/**
	 * return the custom walker class
	 *
	 * @author : jacob.qiao
	 */
	public function menu_image_edit_nav_menu_walker_filter() {
		return 'Walker_Nav_Menu_Editor';
	}
	
	/**
	 * get the post thumbnail html
	 *
	 * @author :jacob.qiao
	 * @param unknown $item_id        	
	 * @return
	 *
	 */
	public function wp_post_thumbnail_html($item_id) {
		$default_size = array (
				200,
				120,
				false 
		);
		$content = $this->wp_post_thumbnail_only_html ( $item_id );
		$image_size = get_post_meta ( $item_id, '_menu_item_image_size', true );
		
		if (! $image_size) {
			$image_size = $default_size;
		}
		$title_position = get_post_meta ( $item_id, '_menu_item_image_title_position', true );
		if (! $title_position) {
			$title_position = apply_filters ( 'menu_image_default_title_position', 'after' );
		}
		$content = "<div class='menu-item-images' style='min-height:70px'>$content</div>";
		return apply_filters ( 'admin_menu_item_thumbnail_html', $content, $item_id );
	}
	
	/**
	 * get the thumbnail select button and label
	 *
	 * @author :jacob qiao
	 * @param unknown $item_id        	
	 * @return string
	 */
	public function wp_post_thumbnail_only_html($item_id) {
		$default_size = array (
				200,
				120,
				false 
		);
		$markup = '<p class="description description-thin" ><label>%s<br /><a title="%s" href="#" class="set-post-thumbnail button%s" data-item-id="%s" style="height: auto;">%s</a>%s</label></p>';
		$thumbnail_id = get_post_thumbnail_id ( $item_id );
		$content = sprintf ( $markup, esc_html__ ( 'Menu image', 'disney' ), $thumbnail_id ? esc_attr__ ( 'Change menu item image', 'disney' ) : esc_attr__ ( 'Set menu item image', 'disney' ), '', $item_id, $thumbnail_id ? wp_get_attachment_image ( $thumbnail_id, $default_size ) : esc_html__ ( 'Set image', 'disney' ), $thumbnail_id ? '<a href="#" class="remove-post-thumbnail">' . __ ( 'x', 'disney' ) . '</a>' : '' );
		
		return $content;
	}
	
	/**
	 * Add menu media js script and custom css script to admin
	 *
	 * @author :jacob.qiao
	 */
	public function menu_image_admin_head_nav_menus_action() {
		wp_enqueue_script ( 'nav-menu-image-admin', '/wp-content/themes/disney/js/nav-menu-image-admin.js', array (
				'jquery' 
		) );
		wp_localize_script ( 'nav-menu-image-admin', 'menuImage', array (
				'l10n' => array (
						'uploaderTitle' => __ ( 'Chose menu image', 'disney' ),
						'uploaderButtonText' => __ ( 'Select', 'disney' ) 
				),
				'settings' => array (
						'nonce' => wp_create_nonce ( 'update-menu-item' ) 
				) 
		) );
		wp_enqueue_media ();
		wp_enqueue_style ( 'editor-buttons' );
		wp_register_style ( 'nav-menu-image', '/wp-content/themes/disney/css/nav-menu-image-admin.css' );
		wp_enqueue_style ( 'nav-menu-image' );
	}
	
	/**
	 * javascript POST handler method, return the thumnail image to js
	 */
	public function wp_ajax_set_nav_menu_item_thumbnail() {
		$json = ! empty ( $_REQUEST ['json'] );
		
		$post_ID = intval ( $_POST ['post_id'] );
		
		if (! current_user_can ( 'edit_post', $post_ID )) {
			wp_die ( - 1 );
		}
		$thumbnail_id = intval ( $_POST ['thumbnail_id'] );
		check_ajax_referer ( "update-menu-item" );
		$success = ($thumbnail_id == '-1') ? delete_post_thumbnail ( $post_ID ) : set_post_thumbnail ( $post_ID, $thumbnail_id );
		
		if ($success) {
			$return = $this->wp_post_thumbnail_only_html ( $post_ID );
			$json ? wp_send_json_success ( $return ) : wp_die ( $return );
		}
		wp_die ( 0 );
	}
	public function menu_image_nav_menu_manage_columns($columns) {
		return $columns + array (
				'image' => __ ( 'Image', 'disney' ) 
		);
	}
	
	// save menu image to post meta.
	public function menu_image_save_post_action($post_id, $post) {
		$menu_image_settings = array (
				'menu_item_image_size',
				'menu_item_image_title_position' 
		);
		foreach ( $menu_image_settings as $setting_name ) {
			if (isset ( $_POST [$setting_name] [$post_id] ) && ! empty ( $_POST [$setting_name] [$post_id] )) {
				if ($post->{"_$setting_name"} != $_POST [$setting_name] [$post_id]) {
					update_post_meta ( $post_id, "_$setting_name", esc_sql ( $_POST [$setting_name] [$post_id] ) );
				}
			}
		}
	}
	
	/**
	 * When menu item removed remove menu image metadata.
	 */
	public function menu_image_delete_menu_item_image_action() {
		$menu_item_id = ( int ) $_REQUEST ['menu-item'];
		check_admin_referer ( 'delete-menu_item_image_' . $menu_item_id );
		
		if (is_nav_menu_item ( $menu_item_id ) && has_post_thumbnail ( $menu_item_id )) {
			delete_post_thumbnail ( $menu_item_id );
			delete_post_meta ( $menu_item_id, '_thumbnail_hover_id' );
			delete_post_meta ( $menu_item_id, '_menu_item_image_size' );
			delete_post_meta ( $menu_item_id, '_menu_item_image_title_position' );
		}
	}
/**
 * Add menu-image end*
 */
}

new Disney_Image_Menu();