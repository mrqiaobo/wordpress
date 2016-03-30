<?php
/**
 * Navigation Menu API: Walker_Nav_Menu_Second_Level class
 *
 * @package themes/disney/inc
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

	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $disney_top_navigation_name;
		global $disney_current_page_top_item_id;
		$parent_id = $item->object_id;
		$menu_name = $disney_top_navigation_name;

		if ($item->menu_item_parent != "0") {
			$result = get_post_meta ( $item->menu_item_parent, '_menu_item_object_id' );
			$parent_id = $result [0];
		}
		$current_menu_group_id = get_top_menu_item_id ( $menu_name, $parent_id );

		if (empty ( $disney_current_page_top_item_id )) {
			$current_term_id = get_queried_object_id ();
			$disney_current_page_top_item_id = get_top_menu_item_id ( $disney_top_navigation_name, $current_term_id );
		}
		$current_page_top_item_id = $disney_current_page_top_item_id;

		if ($depth > 0 && ($current_menu_group_id ==$current_page_top_item_id)) {
		    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		    $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= '<div' . $id . $class_names . '>';

            $atts = array();
            $atts['title'] = ! empty($item->attr_title) ? $item->attr_title : '';
            $atts['target'] = ! empty($item->target) ? $item->target : '';
            $atts['rel'] = ! empty($item->xfn) ? $item->xfn : '';
            $atts['href'] = ! empty($item->url) ? $item->url : '';

            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (! empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters('the_title', $item->title, $item->ID);
            $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
	}


    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}