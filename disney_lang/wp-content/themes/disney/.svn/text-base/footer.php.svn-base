<?php if ( !is_home() && !is_404() ): ?>
  </div>
<?php endif; ?>

<div id="footer" class="container">
	<?php
	wp_nav_menu ( array (
			'theme_location' => 'links-menu',
			'container_class' => 'footer-link-row',
			'items_wrap' => '%3$s',
			'walker' => new walker_footer()
	) );
	?>
</div>

<div id="<?php echo is_home() ? "home-copyright" : "copyright"; ?>" class="container">
	<span class="symbol">©</span>迪士尼版权所有 <br> <span class="symbol">©</span>迪士尼／皮克斯
	<br>香港迪士尼乐园 <br>香港国际主题乐园有限公司
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory')?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">

  $(document).ready(function() {
	  if ($(".footer-link-row").length <= 0) {
		  $("#home-footer").hide();
		  $("#footer").hide();
	  }

    $("#primary-menu>li").each(function(i, val){
        if ($(val).children(".sub-menu").length > 0) {
            var subMenuItemWidth = $(val).children(".sub-menu").width();
            var menuItemWidth = $(val).width();
            if (subMenuItemWidth <　menuItemWidth)　{
            	$(val).children(".sub-menu").width(menuItemWidth);
            }
        }
        });

      $("#primary-menu .sub-menu>li").each(function(i, val){
        $(val).children("a").width($(val).width()-10/*padding*/);
        });
	    
	});

</script>

</body>
</html>