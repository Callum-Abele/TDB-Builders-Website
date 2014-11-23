<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AbeleApps
 */

get_header(); ?>


<div class="content">
		<div class="container">
		<div class="row">
			<div class="span2 offset10">
				<?php get_search_form(); ?>
		</div>
		</div>
		
<?php 
$how_far = 0;
$posts_per = get_field('per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( Array(
									'post_type' => 'projects',
									'posts_per_page' => $posts_per,
									'paged' => $paged,
									
									 ));?>

	<?php if ( have_posts() ) : ?>
	

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
			<a href="<?php the_permalink(); ?>" class="nochange">
     		<div class="ad-portfolio" style="background: url('<?php the_field('cover_image') ?>') 0 0 no-repeat">
     		</div>

	<div class="banner row">
		<div class="span6">

				<div class="banner-front">
					<span class="chevron"> </span>

					<p class="banner-sub-top"><?php echo the_title(); ?></p>
					
				<p class="platform"><?php the_field('Platform'); ?> </p>
					

				
				</div>
		
		</div>
		
		<div class="span6">
			<div class="banner-back">
				<span class="triangle"> </span>
<p class="banner-desc"><?php the_field('short_description') ?></p>
			</div>
		</div>
			
	</div>
	</a>



			<?php 
			$how_far++;
			endwhile; ?>


		<?php endif; ?>

<div class="row">
	<div class="span12 center">
		<?php posts_nav_link(); ?> <br />
		<?php $ad_offset = $paged-1;
		$bottom_end = ($posts_per*$ad_offset)+1
			
		?>
Showing <?php echo ($bottom_end).' - '.($bottom_end+($how_far-1)); ?>
	</div>
</div>
<?php get_footer(); ?>