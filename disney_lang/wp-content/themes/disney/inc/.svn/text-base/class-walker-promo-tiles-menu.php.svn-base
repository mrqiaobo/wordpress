<?php
class Walker_Promo_Tiles_Menu extends Walker_Nav_Menu {
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat ( "\t", $depth );
		$output .= "\n$indent<div class = \"row\">\n";
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat ( "\t", $depth );
		$output .= "$indent</div>\n";
	}
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$atts = array ();
		$atts ['title'] = ! empty ( $item->attr_title ) ? $item->attr_title : '';
		$atts ['target'] = ! empty ( $item->target ) ? $item->target : '';
		$atts ['rel'] = ! empty ( $item->xfn ) ? $item->xfn : '';
		$atts ['href'] = ! empty ( $item->url ) ? $item->url : '';
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if (! empty ( $value )) {
				$value = ('href' === $attr) ? esc_url ( $value ) : esc_attr ( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		$thumbnail_id = get_post_thumbnail_id ( $item->ID );
		$srcs = wp_get_attachment_image_src ( $thumbnail_id );

		$item_output = '	<div class="col-md-4 col-sm-4">';
		$item_output .= '		<a' . $attributes . '>';
		$item_output .= '			<div class="promo-box">';
		$item_output .= '				<img  src="' . $srcs [0] . '"><span>'.$item->title.'</span></img>';
		$item_output .= '			</div>';
		$item_output .= '		</a>';
		$item_output .= '	</div>';
		
		$output .= $item_output;
	}
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "\n";
	}
}
