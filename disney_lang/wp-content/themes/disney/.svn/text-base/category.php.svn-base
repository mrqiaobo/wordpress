<?php 
	$id = get_queried_object_id();
	$current_nav_menu = get_menu_item( $id );
	$depth = get_menu_item_depth( $current_nav_menu );
	
	if ( $depth ==2 ) {
		$menu_child_items = get_menu_child_items( $current_nav_menu );
		if ( count( $menu_child_items  ) > 0 ) {
			$first_item = $menu_child_items[0];
			header( "Location:$first_item->url" );
			exit();
		}
	} else  {
	
	get_header();?>
  <div id="content" class="container content-container">
  <?php
	if ( $depth == 1 ) {
		?>
    <div class="content-title-div"><h1><?php if ($current_nav_menu): echo $current_nav_menu->title; endif; ?></h1></div>
    <p class="content-description"><?php if ($current_nav_menu): echo $current_nav_menu->description; endif; ?></p>
    <div class="first-category-content contrainer">
    <?php
			 $menu_child_items = get_menu_child_items( $current_nav_menu );
		    foreach ( $menu_child_items as $item ) {
		    	$thumbnail_id = get_post_thumbnail_id( $item );
		    	$srcs = wp_get_attachment_image_src ( $thumbnail_id, "thumbnail" );
		    	$src = $srcs [0];
					?>
          <div class="col-xs-4">
            <a href="<?php echo $item->url?>">
              <div class="image-borer"><img src="<?php echo $src?>" /></div>
              <div class="first-category-content-title"><?php echo $item->title?></div>
            </a>
          </div>
          <?php }?>
          </div>
    <?php } else {
			$parent_nav_menu = get_menu_parent_item( $current_nav_menu );
    ?>
    <div class="content-title-div"><h1><?php if ($parent_nav_menu): echo $parent_nav_menu->title; endif; ?></h1></div>
    <div>
    <div id="sidebar">
      <ul>
	    <?php $brother_nav_menu = get_menu_child_items( $parent_nav_menu );
	    		foreach ( $brother_nav_menu as $menu_item ) {
	    			if ( $id == (int)$menu_item->object_id ) {
	    				echo "<li><a class=\"selected_item\">$menu_item->title</a></li>";
	    			} else {
	    				echo "<li><a href=\"$menu_item->url\">$menu_item->title</a></li>";
	    			}
	    		}
	    ?>
      </ul>
		</div>
	  
	<div class="post-content">
		<?php disney_get_all_post()?>
<?php }} ?>
</div>
<?php get_footer(); ?>

<?php
function disney_get_all_post() {
	 if (have_posts()): while (have_posts()): the_post();?>
			<div class="row post-sub-item">
				<?php if (has_post_thumbnail()) {?>
				<div class="col-md-3 col-sm-4 col-xs-5 post-left-part">
					<img style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
				</div>
			  <div class="col-md-9 col-sm-12  col-xs-12 post-right-part">
          <?php the_title( '<h2 class="post-sub-title">', '</h2>' ); ?>
			    <?php the_content(); ?>
				</div> <?php } else {
					the_content();
					} ?>
			</div>
			<?php endwhile; endif;?>
		</div>
<?php }?>