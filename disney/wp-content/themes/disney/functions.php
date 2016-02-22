<?php
add_theme_support ( 'post-thumbnails' );

if (function_exists ( 'register_nav_menu' )) {
	register_nav_menu ( 'header-menu', 'navigation' );
}

add_filter ( 'show_admin_bar', '__return_false' );

add_filter ( 'get_avatar', 'get_ssl_avatar' );
function get_ssl_avatar($avatar) {
	$avatar = preg_replace ( '/.*\/avatar\/(.*)\?s=([\d]+)&.*/', '<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">', $avatar );
	return $avatar;
}

add_action ( 'admin_menu', 'disney_remove_menus' );
function disney_remove_menus() {
	remove_menu_page ( 'edit-comments.php' ); // Comments
	remove_menu_page ( 'themes.php' ); // Appearance
	remove_menu_page ( 'plugins.php' ); // Plugins
	remove_menu_page ( 'tools.php' ); // Tools
	remove_menu_page ( 'options-general.php' ); // Settings
}

add_action ( 'admin_menu', 'disney_remove_useless_element_in_post_type' );
function disney_remove_useless_element_in_post_type() {
	remove_meta_box ( 'commentsdiv', 'post', 'normal' );
	remove_meta_box ( 'commentstatusdiv', 'post', 'normal' );
	remove_meta_box ( 'tagsdiv-post_tag', 'post', 'normal' );
	remove_meta_box ( 'trackbacksdiv', 'post', 'normal' );
	remove_meta_box ( 'postexcerpt', 'post', 'normal' );
	remove_meta_box ( 'postcustom', 'post', 'normal' );
}

add_filter ( 'screen_options_show_screen', '__return_false' );

add_filter ( 'contextual_help', 'disney_remove_help', 999, 3 );
function disney_remove_help($old_help, $screen_id, $screen) {
	$screen->remove_help_tabs ();
	return $old_help;
}

function get_slug_from_currenturl() {
    $string = cur_page_url();
    $result = split('/',$string);
    $arr = array_slice($result, -2,1);
    return $arr[0];
}

function get_request_category() {
    $current_slug = get_slug_from_currenturl();
    $category_current = get_term_by('slug', $current_slug,'category');
    return $category_current;
}

function get_top_category($id){
    $category = get_term_by('term_id',$id,'category');
    $parent_id = $category->parent;

    if ($parent_id != 0) {
        $category = get_top_category($parent_id);
    }
    return $category;
}

function cur_page_url()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

/*Judge is there have the menu by menu name
 * @$menu_name the name for menu
 * @retrun true if there have menu, false if there cannot find the menu by menu name
 */
function has_menu($menu_name) {
    $array = wp_get_nav_menus();

    foreach ($array as $menu) {
        if ($menu->name == $menu_name) {
            return true;
        }
    }

    return false;
}

// Add class Waker_Nav_Menu_Second_Level
require get_template_directory().'/inc/class-walker-nav-menu-second-level.php';
