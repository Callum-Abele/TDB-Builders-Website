<?php /* Template Name: Page  */  ?>

<?php get_header();   ?>

	<div class="band footer">	
		<footer class="container main">
			<div class="ten columns">
			<?php  if ( have_posts() ) : while ( have_posts()  ) : the_post();

				the_content(); //display whatever you wrote in the wordpress editor

			endwhile; endif;?>
			</div>

		</footer>
	</div>

<?php get_footer();  ?>
