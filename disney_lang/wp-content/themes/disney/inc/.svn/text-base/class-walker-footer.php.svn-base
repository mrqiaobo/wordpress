<?php

class walker_footer extends Walker_Nav_Menu {
	
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}
	
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$order = $item->menu_order;
		$index = $order % 4;

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$item_output = '';
		
		$item_output .= '<span class="footer-link"><a' . $attributes . ' target="_blank">'. $item->title .'</a></span>';
		
		if ($index == 0) {
			$item_output .= '</div><div class="footer-link-row">';
		}
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}