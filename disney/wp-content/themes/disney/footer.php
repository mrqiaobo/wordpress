</div>
<!-- Core End -->

<!--footer Start-->
<div id="footer">
	<div class="footerLinksContainer">
<!-- 	<div class="footerLinkRow"> -->
	<?php
	// wp_nav_menu ( 'footer' );
	$footers = $wpdb->get_results ( 'SELECT wp_posts.post_title, wp_postmeta.meta_value 
							  		 FROM wp_terms
										INNER JOIN wp_term_relationships ON wp_terms.term_id = wp_term_relationships.term_taxonomy_id
										INNER JOIN wp_posts ON wp_term_relationships.object_id = wp_posts.id
										INNER JOIN wp_postmeta ON wp_postmeta.post_id = wp_posts.id
 							 	 	 WHERE wp_terms.name = "footer" 
										AND wp_postmeta.meta_key = "_menu_item_url"
 						     	' );
		?>
<!-- 			<span class="footerLink"> -->
			<?php
			for ($divIndex = 0; $divIndex <= floor(count($footers) / 4); $divIndex ++) {
			?>
			<div class="footerLinkRow">
				<span class="footerLink">
				<?php
				for ( $linkIndex = 0; $linkIndex < 4; $linkIndex ++ ) {
					$index = $divIndex * 4 + $linkIndex;
					if ( $index >= count( $footers ) ) break;
					if ( $linkIndex != 0 ) {
						?>
						<span>|</span>
						<?php
					}
					$footer = $footers[$index];
				?>
					<a href="<?php echo $footer->meta_value;?>" target="_blank"><?php echo $footer->post_title;?></a>
				<?php
				};
				?>
				</span>
			</div>
			<?php
			};
			?>
<!-- 			</span> -->
<!-- 		</div> -->
<!-- 		<div class="footerLinkRow"> -->
<!-- 			<span class="footerLink"><a -->
<!-- 				href="https://www.hongkongdisneyland.cn/help/email/" target="_blank">联络我们</a></span> -->
<!-- 			<span>|</span> <span class="footerLink"><a -->
<!-- 				href="https://www.hongkongdisneyland.cn/terms-conditions/" -->
<!-- 				target="_blank">使用条款</a></span> <span>|</span> <span -->
<!-- 				class="footerLink"><a -->
<!-- 				href="https://www.hongkongdisneyland.cn/privacy-legal/" -->
<!-- 				target="_blank">私隐政策</a></span> <span>|</span> <span -->
<!-- 				class="footerLink"><a -->
<!-- 				href="https://www.hongkongdisneyland.cn/legal-notices/" -->
<!-- 				target="_blank">法律条款</a></span> -->
<!-- 		</div> -->
<!-- 		<div class="footerLinkRow"> -->
<!-- 			<span class="footerLink"><a href="https://www.hongkongdisneyland.cn/" -->
<!-- 				target="_blank">香港迪士尼乐园</a></span> <span>|</span> <span -->
<!-- 				class="footerLink"><a href="http://news-cn.hongkongdisneyland.com/" -->
<!-- 				target="_blank">香港迪士尼乐园新闻中心 </a></span> <span>|</span> <span -->
<!-- 				class="footerLink"><a -->
<!-- 				href="http://www.disney.com.hk/index_flash.html" target="_blank">迪士尼香港官方网站</a></span> -->
<!-- 			<span>|</span> <span class="footerLink"><a -->
<!-- 				href="http://corporate.disney.go.com" target="_blank">华特迪士尼公司官方网站</a></span> -->
<!-- 		</div> -->
	</div>
</div>
<div id="copyRightContainer">
	<span class="symbol">©</span>迪士尼版权所有 <br> <span class="symbol">©</span>迪士尼／皮克斯
	<br>香港迪士尼乐园 <br>香港国际主题乐园有限公司
</div>
<!-- Footer End -->


<!-- Content Wrapper End -->


<!-- SiteCatalyst Begin -->

<!-- SiteCatalyst code version: H.9.
Copyright 1997-2007 Omniture, Inc. More info available at
http://www.omniture.com -->

<script language="JavaScript"><!--
/* Specify the Report Suite ID(s) to track here */

var s_account="wdgwdprohkdlczhcn";

//-->
</script>

<script language="JavaScript"
	src="https://analytics.disney.go.com/analytics/framework/1.27/framework-bottom.min.js"></script>
<script language="JavaScript"><!--
s_wdpro.pageName="wdpro/hkdlcorporate/cn/zh/content/aboutus/aboutourcompanypage";
s_wdpro.hier1="wdpro/hkdlcorporate/cn/zh/content/aboutus";
s_wdpro.prop1="HKDLCORPORATE";
s_wdpro.prop29="Not Registered";
s_wdpro.prop12="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/careers/overview?name=CareersPage";
s_wdpro.eVar10="HKDLCORPORATE";

s_wdpro.trackingServer="w88.hongkongdisneyland.com";
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=s_wdpro.t();if(s_code)document.write(s_code)
//-->
</script>

<script type="text/javascript">
(function(){
	var model = {
		configuration:{
			SiteCatalyst: {turnOff:true}
		}
	};
	if(!!WDPRO && !!WDPRO.Analytics && !!WDPRO.Analytics.Framework){
		WDPRO.Analytics.Framework.update(model);
	}
})();
</script>

<!-- SiteCatalyst End -->

<script type="text/javascript">try{WDPRO_LOADER.load();}catch(e){}</script>

</body>
</html>