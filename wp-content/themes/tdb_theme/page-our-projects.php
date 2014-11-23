<?php /* Template Name: Our Projects */  ?>


<?php get_header(); ?>


		<div class="band footer">	
		
			<footer class="container main">

				<div class="eight columns">
					<div class="six columns offset-by-two">	
						<h1 class="footer-heading">Pictures</h1>
					</div>
					<?php echo do_shortcode("[srizonfbalbum id=1]");  ?>
				</div>
				
					<div class="three columns offset-by-two">
					<h1 class="footer-heading">Videos</h1>
					</div>
				<div class="eight columns">
					<?php echo do_shortcode('[youtube id="LMS19MKQqmY" mode="thumbnail" align="right"]');  ?>
				</div>

				<div class="eight columns">
					<?php echo do_shortcode('[youtube id="XYMTCfHL9Cg" mode="thumbnail" align="right"]');  ?>
				</div>

				
			</footer><!-- container -->
		
		</div><!--end band-->

<?php get_footer(); ?>
