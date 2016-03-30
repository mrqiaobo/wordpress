<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title><?php bloginfo( 'blogname' ); ?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/style.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory')?>/css/css.css">

</head>

<body <?php echo is_home() ? 'id="home-body"' : "";?>>

  <div id="header" class="container">
    <nav class="navbar navbar-default" role="navigation">

      <div class="container-fluid">
        <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	         </button>
          <a class="logo" href="<?php bloginfo( 'url' ) ?>"> <img src="<?php bloginfo('template_directory')?>/images/logo.png" />
          </a>
        </div>

        <div class="collapse navbar-collapse">
           <?php
							wp_nav_menu ( array (
									'theme_location' => 'navigation-menu',
									'container' => false,
									'menu_class' => 'nav navbar-nav',
									'menu_id' => 'primary-menu',
									'depth' => 2
							) );
						?>
          </div>

      </div>
    </nav>

  </div>

  <div class="main-media container">
	<?php if(!is_404()) :?>
		<?php if (is_home()) :?>
			<?php
				$gallery_src_array = get_menu_images();
				if (count($gallery_src_array) >1):
			?>
	        <div id="carousel-id" class="carousel slide" data-ride="carousel">
	          <ol class="carousel-indicators">
	          <?php foreach ($gallery_src_array as $index => $src) :?>
	            <li data-target = "#carousel-id" data-slide-to = "<?php echo $index?>" class="<?php echo (($index==2) ? "active" : "")?>"></li>
	          <?php endforeach;?>
	          </ol>
	          <div class="carousel-inner">
			  <?php foreach ($gallery_src_array as $index => $src) :?>
			    <div class="item <?php if($index ==2) echo "active";?>">
	              <img src="<?php echo $src?>">
	          </div>
			  <?php endforeach;?>
	          </div>
	          <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	          <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	        </div>
			<?php else:?>
				<?php if (empty($gallery_src_array[0])):?>
			 	<img src="<?php bloginfo( 'template_directory' ) ?>/images/corp-home-mickey-mouse-castle.jpg"/>
			 	<?php else:?>
				<img src="<?php echo $gallery_src_array[0]?>"/>
				<?php endif;?>
			<?php endif;?>
		<?php else: ?>
			<img src="<?php echo get_the_image_url_from_top_menu_item();?>" >
		<?php endif; ?>
	<?php endif;?>
  </div>
