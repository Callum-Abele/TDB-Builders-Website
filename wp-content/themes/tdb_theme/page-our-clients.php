<?php /* Template Name: Our Clients */ ?>
<?php get_header();  ?>

	<div class="band footer">	
		<footer class="container main">
		<div class="sixteen columns">
			<h1 class="footer-heading">Our Clients</h1>
		</div>
		<div class="sixteen columns">
			<?php echo do_shortcode("[random_testimonial count='5' use_excerpt='1']");  ?>
		</div>
		</footer>
	</div>
<?php get_footer();  ?>
