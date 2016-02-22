<?php
/**
 * Navigation Menu API: Walker_Nav_Menu_Second_Level class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.0.0
 */

/**
 * Create HTML list of nav menu items.
 *
 * @since 3.0.0
 * @uses Walker
 */
class Walker_Nav_Menu_Second_Level extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth=0, $args = array()) {
        if ($depth > 0) {
            parent::start_lvl($output, $depth, $args);
        }
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ($depth > 0) {
            parent::end_lvl($output, $depth, $args);
        }
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $category = get_top_category($item->object_id);
        if ($depth > 0 && $category->slug == $_SESSION["top_slug"]) {
            parent::start_el($output, $item, $depth, $args, $id);
        }
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}