<?php /* Template Name: Our Services */  ?>

<?php get_header(); ?>
	
		<div class="band footer">
			<div class="container main">
			<div class="sixteen columns">
				<h1 class="footer-heading">Our Services</h1>
				<?php dynamic_sidebar("Footer Section 02");?>			
			</div>
			</div>
			<?php echo do_shortcode("[huge_it_portfolio id='1']"); ?>				
		</div><!--end band-->

<?php get_footer(); ?>
