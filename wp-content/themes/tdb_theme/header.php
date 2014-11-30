<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo wp_title(); ?></title>
	
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>
<body>

	<div class="page">

		<div class="band navigation">
			<h1 class="header-logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			<nav class="container primary">

		
				<div class="contact details">
					<div class="four columns alpha">	
						<h4>Landline: 01773 302222</h4>
					</div>
					<div class="four columns">
						<h4>Mobile: 07612995634</h4>
					</div>
					<div class="four columns omega">
						<div class="facebook_icon">f<a href="https://www.facebook.com/pages/TDB-Builders/1453216311615213?sk=info&tab=overview"><h5>Like us on Facebook</h5></a></div>

					</div>
				</div>
	

			<?php wp_nav_menu(  
				array(  
					'menu' 				=> 'Primary Navigation',
					'container'       	=> 'div',
					'container_class' 	=> 'twelve columns',
				   'container_id'       => 'navigation'	
				)  
			); ?>

			</nav><!--end container-->

		</div><!--end band-->	

