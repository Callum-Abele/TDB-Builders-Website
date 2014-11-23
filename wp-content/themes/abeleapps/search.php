<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package AbeleApps
 */

get_header(); ?>

	<div class="content">
		<div class="container">
		<div class="row">
		<div class="span3">
		
		
		</div>
			<div class="span2 offset7">
				 <?php get_search_form(); ?>
		</div>
		</div>


	<?php if ( have_posts() ) : ?>
	

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<a href="<?php the_permalink(); ?>">
     		<div class="ad-portfolio" style="background: url('<?php the_field('cover_image') ?>') 0 0 no-repeat">
     		</div>

	<div class="banner row">
		<div class="span6">
		<a class="banner-link nochange" href="<?php the_permalink(); ?>">
				<div class="banner-front">
					<span class="chevron"> </span>

					<p class="banner-sub-top"><?php echo the_title(); ?></p>
				
				</div>
		</a>
		</div>
		
		<div class="span6">
			<div class="banner-back">
				<span class="triangle" alt=""> </span>
<p class="banner-desc"><?php the_field('short_description') ?></p>
			</div>
		</div>
			
	</div>
	



			<?php 
			$how_far++;
			endwhile; ?>
<?php else: ?>

	<div class="row">
		<div class="span12 center">
		<h1>No Projects Found.</h1>
		<h4>We couldn't find anything by the name '<?php echo get_query_var('s'); ?>'.</h4>
		Perhaps you could try searching for something else?
		
		</div>
		</div>

		<?php endif; ?>

<div class="row">
	<div class="span12 center">
		<?php posts_nav_link(); ?> <br />
		<?php $offset = $paged-1;
		$bottom_end = ($posts_per*$offset)+1
			
		?>
Showing Results <?php echo ($bottom_end).' - '.($bottom_end+($how_far-1)); ?>
	</div>
</div>
<?php get_footer(); ?>