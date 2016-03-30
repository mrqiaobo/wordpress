<?php
require_once (ABSPATH . 'wp-admin/includes/nav-menu.php');
require_once get_template_directory () . '/inc/class-walker-nav-menu-second-level.php';
require_once get_template_directory () . '/inc/class-walker-promo-tiles-menu.php';
require_once get_template_directory () . '/inc/class-walker-footer.php';
require_once get_template_directory () . '/inc/class-disney-theme-configuration.php';
require_once get_template_directory() . '/inc/class-walker-menu-image-editor.php';
require_once get_template_directory() . '/inc/class-disney-image-menu.php';
require_once get_template_directory() . '/inc/class-disney-dashboard.php';
require_once get_template_directory() . '/inc/class-disney-category-template.php';


$disney_top_navigation_name;
$disney_nav_menu_items;
$disney_current_page_top_item_id;

function get_menu_item_depth ( $menu_item ) {
	global $disney_top_navigation_name;
	$depth = 1;
	while ( $menu_item->menu_item_parent != 0 ) {
		$depth ++;
		$menu_item = get_menu_parent_item( $menu_item );
	}
	return $depth;
}

function get_menu_parent_item ( $menu_item ) {
	$parent_id = (int) $menu_item->menu_item_parent;
	foreach (get_nav_menu_items() as $nav_menu_item ) {
		if ( $parent_id == $nav_menu_item->ID ) {
			return $nav_menu_item;
		}
	}
	return null;
}

function get_menu_child_items ( $menu_item ) {
	$items = array();
	foreach ( get_nav_menu_items() as $nav_menu_item ) {
		$parent_id = (int)$nav_menu_item->menu_item_parent;
		if ( $parent_id == $menu_item->ID ) {
			array_push( $items, $nav_menu_item );
		}
	}
	return $items;
}

function get_menu_item ( $id ) {
	foreach ( get_nav_menu_items() as $item ) {
		if ( $id == $item->object_id ) {
			return $item;
		}
	}
	return null;
}

function get_nav_menu_items () {
	global $disney_nav_menu_items;
	if ( !isset( $disney_nav_menu_items ) ) {
		if ($menu_location = get_menu_name_by_location() ) {

			$disney_nav_menu_items = wp_get_nav_menu_items( $menu_location );
		}
	}
	return $disney_nav_menu_items;
}
/**
 *
 * @author : jacob qiao
 * @param $id: curent
 *            menu item's id
 * @param $location :
 *            the location for menu
 * @return the object of top menu item
 */

function get_top_menu_item($id, $location = "navigation-menu") {
	if ($menu_name = get_menu_name_by_location ( $location )) {
		if ($top_id = get_top_menu_item_id ( $menu_name, $id )) {
			return get_term ( $top_id );
        }
    }
    return false;
}

/**
 *
 * @author : jacob qiao
 * @param
 *            $menu_name
 * @param
 *            $current_term_id
 * @return the father item's id for current menu item.
 */
function get_father_menu_item_id($menu_name, $current_term_id) {
	if (($current_term_id != 0) && ($menu = get_item_from_nav_menu ( $menu_name, $current_term_id ))) {
		$parent = get_post_meta ( $menu->menu_item_parent, '_menu_item_object_id' );
		$result = $parent [0];
        return $result;
    }

    return false;
}

/**
 *
 * @author : Jacob Qiao
 * @param
 *            $menu_name
 * @param
 *            $curent_term_id
 * @return the top menu item's term_id
 */
function get_top_menu_item_id($menu_name, $curent_term_id) {
	if (($parent_id = get_father_menu_item_id ( $menu_name, $curent_term_id )) === false) {
        return false;
    }

    if ($parent_id == 0) {
        return $curent_term_id;
    }
	return get_top_menu_item_id ( $menu_name, $parent_id );
}

/**
 *
 * @author : Jacob Qiao
 * @param $menu_name: the
 *            menu's name
 * @param unknown $menu_name
 */
function get_current_parent_id_from_menu($menu_name) {
	$current_id = get_queried_object_id ();
	$parent_menu = get_father_menu_item_id ( $menu_name, $current_id );
    return $parent_menu;
}

/**
 *
 * @author : jacob qiao
 * @return thumnnail src address from current menu item's super item.
 */
function get_the_image_url_from_top_menu_item() {
    global $disney_top_navigation_name;

	if (empty ( $disney_top_navigation_name )) {
		$disney_top_navigation_name = get_menu_name_by_location ();
    }
    $menu_name = $disney_top_navigation_name;
	$current_id = get_queried_object_id ();

	if ($top_menu_item_id = get_top_menu_item_id ( $menu_name, $current_id )) {
		$thumbnail_menu_item = get_item_from_nav_menu ( $menu_name, $top_menu_item_id );

        if ($thumbnail_menu_item != null) {
			$thumbnail_id = get_post_thumbnail_id ( $thumbnail_menu_item->ID );
			$srcs = wp_get_attachment_image_src ( $thumbnail_id, "full" ); // px :large >medium > thumbnail >full
			$src = $srcs [0];

            return $src;
        }
    }

    return "";
}

/**
 * return the object in menu by id.
 * @author : jacob qiao
 * @param $menu_name
 * @param $id
 */
function get_item_from_nav_menu($menu_name, $id) {
  global $disney_nav_menu_items;

	if (! isset ( $disney_nav_menu_items )) {
		$menu = wp_get_nav_menu_object ( $menu_name );
		$items = wp_get_nav_menu_items ( $menu->term_id, array (
            'update_post_term_cache' => false
		) );
        $disney_nav_menu_items = $items;
    }

	foreach ( $disney_nav_menu_items as $menu_item ) {
        if ($id == $menu_item->object_id) {
            return $menu_item;
        }
    }
    return null;
}

/**
 *
 * @author : jacob qiao
 * @param string $location_name
 * @return return the menu name in the location.
 */
function get_menu_name_by_location($location_name = "navigation-menu") {
	if (! has_nav_menu ( $location_name )) {
        return false;
    }

	$locations = get_nav_menu_locations ();
	$nav = wp_get_nav_menu_object ( $locations [$location_name] );

	if ($nav) {
		return $nav->name;
	} else {
		return false;
	}
}

/**
 *  return an src array for menu images
 * @param string $menu_location the menu location, default gallery
 * @return array
 */
function get_menu_images ($menu_location = "gallery-menu") {
	$menu_name = get_menu_name_by_location ( $menu_location );
	$src_array = array ();
	$menu = wp_get_nav_menu_object ( $menu_name );
	$items = wp_get_nav_menu_items ( $menu->term_id, array (
			'update_post_term_cache' => false
	));

	foreach ( $items as $thumbnail_menu_item ) {
		if ($thumbnail_menu_item != null) {
			$thumbnail_id = get_post_thumbnail_id ( $thumbnail_menu_item->ID );
			$srcs = wp_get_attachment_image_src ( $thumbnail_id, "full" ); // px :large >medium > thumbnail >full
			$src = $srcs [0];
			$src_array [] = $src;
		}
	}

	return $src_array;
}