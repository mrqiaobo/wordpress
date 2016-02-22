<?php get_header(); ?>

<div id="Content">
	<div id="centerColumn">

		<div class="ContentZone">
			<div class="module" id="AboutOurCompanyPage_CORPORATE">
				<div class="BlockST">
					<div id="StoryTelling">
						<h1 class="titleStory"><?php single_cat_title(); ?></h1>
					</div>
					<!-- End Story Telling-->
				</div>

				<!-- End BlockST-->
				<div class="BlockSP">
					<div class="space"></div>
				</div>
				
				<?php if (have_posts()): while (have_posts()): the_post();?>
				
				<div class="BlockD">
					<!-- hey print media here -->
					<div class="BlockDLeft">
						<img name="roll_MessageFromMDContentSubMedia_CORPORATE_zh_CN"
							galleryimg="no"
							src="<?php bloginfo('template_directory')?>/images/company-frame180x110.gif"
							alt="" border="" width="180" height="110"
							style="background-image: url(<?php if (has_post_thumbnail()) { the_post_thumbnail_url(); } ?>);">
					</div>
					<div class="BlockDRight">
						<h3><?php the_title(); ?></h3>
						<p><?php the_content(); ?></p>
						<div class="space"></div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- End BlockD -->
				<div class="space"></div>
				<?php endwhile; endif;?>
			</div>
		</div>
	</div>
</div>

<!-- Center Column End -->
<?php get_footer(); ?>
