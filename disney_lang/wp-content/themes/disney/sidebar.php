
	<?php
	$id = get_queried_object_id();
	global $disney_top_navigation_name;
	$current_nav_menu = get_item_from_nav_menu( $disney_top_navigation_name, $id );
	$dapth = get_menu_item_depth( $current_nav_menu );
	if ( $dapth == 1 ) {
		?>
    <div class="content-title-div"><h1><?php if ($current_nav_menu): echo $current_nav_menu->title; endif; ?></h1></div>
    <p><?php if ($current_nav_menu): echo $current_nav_menu->description; endif; ?></p>
    <div class="first-category-content contrainer">
    <?php
			 $menu_children_items = get_menu_children_items( $current_nav_menu );
		    foreach ( $menu_children_items as $item ) {
		    	$thumbnail_id = get_post_thumbnail_id( $item );
		    	$srcs = wp_get_attachment_image_src ( $thumbnail_id, "thumbnail" );
		    	$src = $srcs [0];
					?>
          <div class="col-xs-4">
            <a href="<?php echo $item->url?>">
              <ul>
                <li><img src="<?php echo $src?>" /></li>
                <li class="first-category-content-title"><?php echo $item->title?></li>
              </ul>
            </a>
          </div>
          <?php
				}
		}?>
    </div>
  <div class="row">
  <div id="sidebar" class="col-sm-3 hidden-xs">
		<?php
		wp_nav_menu ( array (
				'theme_location' => 'navigation-menu',
				'container' => false,
				'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
				'walker' => new Walker_Nav_Menu_Second_Level () 
		) );
		?>
	</div>