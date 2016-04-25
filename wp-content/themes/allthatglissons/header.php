<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<title>~ All That Glissons ~ | Handmade Pottery, whimsical and unique Sculptures and Masks. Original Miniature Doll Molds, made by sculptor and doll artist Theresa A. Glisson. Over 23 years experience. Based in Goldsboro, NC.</title>
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    		<meta name="theme-color" content="#121212">
	    	<?php } ?>
	  <meta property="og:url" content="http://allthatglissons.com"/>  	
		<meta property="og:title" content="~ All That Glissons ~ "/>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/fb-share.jpg"/>
		<meta property="og:site_name" content="~ All That Glissons ~ "/>
		<meta property="og:description" content="Handmade Pottery, whimsical and unique Sculptures and Masks. Original Miniature Doll Molds, made by sculptor and doll artist Theresa A. Glisson. Over 23 years experience. Based in Goldsboro, NC.">	
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header class="header hide-for-large-up" role="banner">
							
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->
							  	  
						 <?php get_template_part( 'parts/nav', 'top-offcanvas' ); ?>
							
						<div class="row">
							<div class="large-12 columns">
								<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Home" width="270" height="264" class="logo"></a>				
						</div>						
								 	
					</header> <!-- end .header -->					
					<header class="header show-for-large-up" role="banner">
							
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /parts directory -->
							
						<div class="row">
							<div class="large-3 columns">
								<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Home" width="270" height="264" class="logo"></a>				
							</div>
							<div class="large-9 columns">
								<div class="top-menu">
									<?php joints_top_nav(); ?>
									<a href="https://www.facebook.com/theresa.glisson" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook" class="fb"></a>			
								</div>
							</div>
						</div>							
								 	
					</header> <!-- end .header -->
