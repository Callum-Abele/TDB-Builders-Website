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

<div class="content">
		<div class="container">
			<div class="row">
			<div class="span12"> </div>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
	
	

	<div class="row">
		<div class="span6">
	
	<img class="ad-half" src="<?php echo get_field('image_1'); ?>" />
     		
     		
		</div>
		
		<div class="span6">
		<?php the_field('body_1'); ?>
		</div>
	</div>
	
	
	<div class="banner row">
		<div class="span6">

				<div class="banner-front">
					

					<p class="banner-sub-top"><span class="logo"> </span></p>
					
				<p class="platform-tag">Let's Innovate.</p>
					

				
				</div>
		
		</div>
		
		<div class="span6">
			<div class="banner-back">
				<span class="triangle"> </span>
<p class="banner-desc">
<p class="banner-list-label"> List of Expertise: </p>
<ul class="skill-list">
	<?php 
	$skills = get_field('skills');
		
	foreach($skills as $skill): ?>
	
<li>
	<?php echo $skill['skill_label']; ?>
	
</li>
	<?php endforeach; ?>
	</ul>
	
</p>
			</div>
		</div>
			
	</div>
		
		
			<div class="row">
			<div class="span6">
		<?php the_field('body_2'); ?>
		</div>
		<div class="span6">
	
	<img class="ad-half" src="<?php echo get_field('image_2'); ?>" />     		
	</div>
     		
		</div>
		
		

	
	
			
	<?php endwhile; // end of the loop. ?>

	



<?php get_footer(); ?>
