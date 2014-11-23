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
	
	

	
	
	
		
	<div class="content">
		<div class="container">
		
		
		<div class="row">
				<div class="span12"> 
					<ul class="footer-list footer-big">
					<li><a id="f-tw" href="<?php the_field('Twitter_Link', 63 ); ?>" data-toggle="tooltip" title="Follow us on Twitter"><span class="twitter"> </span></a></li>
					<li><a id="f-fb" href="<?php the_field('Facebook_Link', 63 ); ?>" data-toggle="tooltip" title="Find us on Facebook"><span class="facebook"> </span></a></li>
					<li><a id="f-em" href="mailto:<?php the_field('Contact_Email', 63 ); ?>" data-toggle="tooltip" title="Email us"><span class="email"> </span></a></li>
					<li><a id="f-ph" hdata-toggle="tooltip" title="Call us" class="fancybox-call-us" data-fancybox-type="iframe" href="<?php echo get_permalink(112); ?>"><span class="phone"> </span></a></li>
					</ul>
						</div>
			</div>
			<script type="text/javascript">
			$('#f-tw').tooltip();
			$('#f-fb').tooltip();
			$('#f-em').tooltip();
			$('#f-ph').tooltip();
			$(".fancybox-call-us").fancybox({
		
		width		: '300px',
		height		: '120px',
		autoSize	: false,
		closeClick	: false
	});

			</script>

		
		
		<div class="row">
		<div class="span12">
		<?php the_content(); ?>
		</div>
		</div>
		
	
			
	<?php endwhile; // end of the loop. ?>

	



<?php get_footer('noicons'); ?>
