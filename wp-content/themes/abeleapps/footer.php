<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package AbeleApps
 */
?>

		<footer>
			<div class="row">
				<div class="span12"> 
					<ul class="footer-list">
					<li><a id="f-tw" href="<?php the_field('Twitter_Link', 63 ); ?>" data-toggle="tooltip" title="Follow us on Twitter"><span class="twitter"> </span></a></li>
					<li><a id="f-fb" href="<?php the_field('Facebook_Link', 63 ); ?>" data-toggle="tooltip" title="Find us on Facebook"><span class="facebook"> </span></a></li>
					<li><a id="f-em" href="mailto:<?php the_field('Contact_Email', 63 ); ?>" data-toggle="tooltip" title="Email us"><span class="email"> </span></a></li>
					<li><a id="f-ph" data-toggle="tooltip" title="Call us" class="fancybox-call-us" data-fancybox-type="iframe" href="<?php echo get_permalink(112); ?>"><span class="phone"> </span></a></li>
					
					
					</ul>
					
					<p class="center"> &copy; Abele Apps <?php echo date('Y'); ?> | Built by <a href="http://infographique.co.uk">infographique </a> </p>
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
	$(".fancybox").fancybox();
			</script>
			
<?php wp_footer(); ?>


			</footer>
		
		</div> <!--content -->
	</div><!--container-->
	</body>
</html>