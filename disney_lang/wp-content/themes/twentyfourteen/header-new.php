<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<html lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html"; charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="Content-Language" content="en">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <link rel="stylesheet" type="text/css"
            href="<?php bloginfo('template_directory')?>/css/global.css">
      <link rel="stylesheet" media="screen" type="text/css"
            href="<?php bloginfo('template_directory')?>/css/constructionCorp1.css">
      <link rel="stylesheet" media="screen" type="text/css"
            href="<?php bloginfo('template_directory')?>/css/formCorp.css">
      <link rel="stylesheet" media="screen" type="text/css"
            href="<?php bloginfo('template_directory')?>/css/company.css">
      <link rel="stylesheet" media="print" type="text/css"
            href="<?php bloginfo('template_directory')?>/css/globalPrint.css">

      <!-- Check browser version  End -->
      <!-- Javascript Includes Begin -->
      <script async="" src="http://b.scorecardresearch.com/beacon.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/jquery-1.4.4.min.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/config.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/toolsCorp.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/search.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/functions.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/formControl.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/flashjs.js"></script>
      <script language="JavaScript" type="text/javascript"
              src="<?php bloginfo('template_directory')?>/js/global.js"></script>
    <!-- Check OS DL file extension Begin -->
	<script language="javascript">
	function addExtension(filePath){
	 var osFileType = ".exe";
	 var fileWithExt = filePath + osFileType;
	 document.location.href =  fileWithExt;
	 }
	 </script>
    <!-- Check OS DL file extension  End -->
    <style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
    .en-markup-crop-options {
        top: 18px !important;
        left: 50% !important;
        margin-left: -100px !important;
        width: 200px !important;
        border: 2px rgba(255,255,255,.38) solid !important;
        border-radius: 4px !important;
    }
    .en-markup-crop-options div div:first-of-type {
        margin-left: 0px !important;
    }
    </style>
</head>

<body class="CorporateEnvironmentalPolicyPage_CORPORATE zh_CN">

<!-- SiteCatalyst Begin -->

<!-- SiteCatalyst End -->

<!-- Global Header Begin -->
<div id="globalHeader">



<div id="toolBar">
    <a href="./企业环保政策_files/企业环保政策.html" class="languageToggle tcToggle"><span>简体</span></a>
    <a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_HK/environmentality/overview?name=CorporateEnvironmentalPolicyPage" class="languageToggle tcToggle"><span>繁體</span></a>
    <a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/en_US/environmentality/overview?name=CorporateEnvironmentalPolicyPage" class="languageToggle engToggle"><span>Eng</span></a>
</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
			<div class="logo">
				<a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/home/home?name=HomePage">香港迪士尼乐园度假区.</a>
			</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>


	<!-- NAV Begin
		<div class="globalNav">
			<div class="logo">
				<a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/home/home?name=HomePage">香港迪士尼乐园度假区.</a>
			</div>
			<ul class="mainMenuBar">
				<li class="menuContainer">
					<ul class="mainMenu">
						<li class="menuItem" id="menuItem1"><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/careers/overview?name=CareersPage" id="careersButton" class="mainMenuPanel"><span class="">人才招聘</span></a>
						</li>
							<li class="navSep"></li>
						<li class="menuItem" id="menuItem2"><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/environmentality/overview?name=EnvironmentalityPage" id="environmentalityButton" class="mainMenuPanel"><span class="">环境</span></a>
									<div class="dropmenu dropmenulast">
									<div class="submenu-bd submenu-bd-1">
									<div class="clearfixA">
									<ul class="mainSection">
									<li class="oneBlock">
									<ul class="listingOfMenu">
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/environmentality/overview?name=AboutEnvironmentalityPage" id="aboutDisneyEnvironmentalityButton" class="subMenuPanel"><span class="">关于迪士尼「环保意「蟋」」</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/environmentality/overview?name=EnvironmentalManagementPage" id="environmentalManagementButton" class="subMenuPanel"><span class="">环境管理措施</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/environmentality/overview?name=EnvironmentalUsefulLinksPage" id="usefulLinksButton" class="subMenuPanel"><span class="">相关网站</span></a></li>
								</ul></li></ul></div></div></div>
						</li>
							<li class="navSep"></li>
						<li class="menuItem" id="menuItem3"><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/communityRelations/overview?name=CorporateCitizenshipPage" id="corporateCitizenshipButton" class="mainMenuPanel"><span class="">
企业公民事务</span></a>
									<div class="dropmenu">
									<div class="submenu-bd submenu-bd-1">
									<div class="clearfixA">
									<ul class="mainSection">
									<li class="oneBlock">
									<ul class="listingOfMenu">
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/communityRelations/overview?name=CompassionPage" id="compassionButton" class="subMenuPanel"><span class="">关爱社会</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/communityRelations/overview?name=ConservationPage" id="conservationButton" class="subMenuPanel"><span class="">保护环境</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/communityRelations/overview?name=CreativityPage" id="creativityButton" class="subMenuPanel"><span class="">启迪创意</span></a></li>
								</ul></li></ul></div></div></div>
						</li>
							<li class="navSep"></li>
						<li class="menuItem" id="menuItem4"><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/news/overview?name=NewsPage" id="pressRoomButton" class="mainMenuPanel"><span class="">新闻中心</span></a>
						</li>
							<li class="navSep"></li>
						<li class="menuItem" id="menuItem5"><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/aboutOurCompany/overview?name=AboutOurCompanyPage" id="aboutOurCompanyButton" class="mainMenuPanel"><span class="">公司资料</span></a>
									<div class="dropmenu">
									<div class="submenu-bd submenu-bd-1">
									<div class="clearfixA">
									<ul class="mainSection">
									<li class="oneBlock">
									<ul class="listingOfMenu">
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/aboutOurCompany/overview?name=CompanyOverviewPage" id="companyOverviewButton" class="subMenuPanel"><span class="">公司资料</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/aboutOurCompany/overview?name=BoardOfDirectorsPage" id="boardOfDirectorButton" class="subMenuPanel"><span class="">董事局成员</span></a></li>
										<li><a href="http://hkcorporate.hongkongdisneyland.com/hkdlcorp/zh_CN/aboutOurCompany/overview?name=ManagementTeamPage" id="managementTeamButton" class="subMenuPanel"><span class="">管理团队</span></a></li>
								</ul></li></ul></div></div></div>
						</li>
					</ul>
				</li>
			</ul>
		</div>

	<!-- NAV End -->

	</div>
	<div id="Header">
	<div id="mainMedia">
<img name="roll_EnvironmentalitySectionMedia_CORPORATE_zh_CN" galleryimg="no" src="./企业环保政策_files/corp-header-environmentality.jpg" alt="" border="" width="959" height="230"></div><!-- mainMedia end -->

    </div>