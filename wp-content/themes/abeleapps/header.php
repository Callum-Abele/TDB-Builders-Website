<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package AbeleApps
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>



 <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fancybox/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/fancybox/jquery.fancybox.pack.js?v=2.1.4"></script>







    
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="description" content="Let's Innovate. At Abele Apps we use our experience and intuition to create powerful software solutions for your business needs." />



<title>Abele Apps | <?php wp_title( '', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-d8a4955d-d844-de30-c6f4-4509b6e8ce14", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>




	</head>
	
	<body <?php body_class(); ?>>
	<nav> <!-- Primary Navigation (Top Header) -->
		<div class="container">
			<div class="row">
				<div class="span6">
				
				<?php
				
				$defaults = array(
	'theme_location'  => 'main_navigation',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'nav-left',
	'menu_id'         => '1',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '<span></span>',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults ); ?>
					
				</div>
				
				<div class="span6">
						<span class="nav-right"><a href="<?php echo get_site_url(); ?>"> <span class="logo"> </span> </a> </span>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="nav-space"> </div>
	
