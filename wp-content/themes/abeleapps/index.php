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

get_header(); ?>


			<?php while ( have_posts() ) : the_post(); ?>
	
	

	
	
	index
		
	<div class="content">
		<div class="container">
		
		<div class="row">
		<div class="span12">
		<h2> <?php the_title(); ?> </h2>
		<?php the_content(); ?>
		</div>
		</div>
		
	
			
	<?php endwhile; // end of the loop. ?>

	



<?php get_footer(); ?>
