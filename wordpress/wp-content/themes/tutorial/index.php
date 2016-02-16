<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body>
<!-- 页头部分-->
<div id="header">
<h1>
<a href="<?php bloginfo('url');//调用博客首页地址?>"><?php bloginfo('name'); //调用站点标题?></a>
</h1>
<?php bloginfo('description');//调用blog描述?>
</div>

<!-- 博客内容部分-->
<div id="container"> <!-- 主要将博客的主要内容和其他东西分开，如sliderbar 和footer-->

	<?php if(have_posts()): ?> 
		<?php while(have_posts()):?>
			<?php the_post(); //调用具体的日志来显示?>
			
			<div class="post">
				<h2><a href="<?php the_permalink(); //调用每篇日志地址?>"><?php the_title();//调用日志标题?></a></h2>
				<!-- 日志内容-->
				<div class="entry">
					<?php the_content(); //调用日志内容?>
				</div>
			</div>
		<?php endwhile;?>
	<?php endif;?>
	
</div>

</body>
</html>