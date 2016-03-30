<?php get_header(); ?>
<div class="col-sm-12 col-lg-9 col-md-9 post-div">
	 <?php if (have_posts()): while (have_posts()): the_post();?>
	 <?php the_title( '<h1>', '</h1>' ); ?>
	<div class="col-9">
			<!-- hey print media here -->
			<div class=row>
			<?php if (has_post_thumbnail()) {?>
			<div class="col-lg-3 col-md-4 col-sm-4 postTitleBottom">
				<img galleryimg="no"
					src="<?php bloginfo('template_directory')?>/images/company-frame180x110.gif"
					alt="" border="" width="180" height="110"
					style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
			</div>
			<div class="col-lg-9 col-md-8 col-sm-8 postTitleBottom">
			<?php } else {?>
			<?php }?>
				<?php the_content(); ?>
				<div class="space"></div>
				<div class="clear"></div>
		<!-- End BlockD -->
		</div>

		</div>
		<div class="postbottom"></div>
		<?php endwhile; endif;?>
	</div>
</div>
</div>
<!-- Center Column End -->
<?php get_footer(); ?>
