<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AbeleApps
 */

?>

<html>
<head>
 <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
</head>

<body class="callusib">
<?php while ( have_posts() ) : the_post(); ?>
<div class="callusi">
		
			

<?php the_content(); ?>

							
			
			
</div>

<?php endwhile; ?>
</body>
</html>
