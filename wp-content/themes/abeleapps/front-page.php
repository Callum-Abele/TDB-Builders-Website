<?php
/**
 *
 * @package AbeleApps
*/

get_header(); ?>



			<?php while ( have_posts() ) : the_post(); ?>


	<?php $carousel = get_field('carousel');
	
	
	
	
	foreach( $carousel as $key => $project )
{
	
	$projectInfo[$key]['id'] = $project['project']->ID;
	
	
	$projectInfo[$key]['carousel_image'] = get_field('cover_image',$projectInfo[$key]['id']);
	
	
	$projectInfo[$key]['short_description'] = get_field('short_description',$projectInfo[$key]['id']);
	$projectInfo[$key]['title'] = $project['project']->post_title;
	$projectInfo[$key]['slug'] = $project['project']->slug;
	$projectInfo[$key]['link'] = get_permalink( $projectInfo[$key]['id']);
	
}
	 ?>


	<div id="myCarousel" class="ad-carousel carousel slide">
 
  <!-- Carousel items -->
  <div class="carousel-inner">
  <?php foreach ($projectInfo as $key => $project): ?>
  
     <div class="item <?php if($key == 0){ echo "active"; } ?>">
     	<a href="<?php echo $project['link']; ?>">
     		<div class="item-inner" style="background: url('<?php echo $project['carousel_image']; ?>') 50% 50% no-repeat">
	     		<div id="inner-title<?php echo $key; ?>" class="ca-hidden"><?php echo $projectInfo[$key]['title']; ?> </div>
	     		<div id="inner-desc<?php echo $key; ?>" class="ca-hidden"><?php echo $projectInfo[$key]['short_description']; ?></div>
	     		<div id="inner-link<?php echo $key; ?>" class="ca-hidden"><?php echo $projectInfo[$key]['link']; ?></div>
     		</div>
     	</a>
     </div>
    
    
   
    <?php endforeach; ?>

  </div>
  <!-- Carousel nav -->
  <a class="ad-carousel-control left" href="#myCarousel" data-slide="prev"></a>
  <a class="ad-carousel-control right" href="#myCarousel" data-slide="next"></a>
  
</div>
<script>
$('#myCarousel').carousel({
  interval: <?php the_field('slide_duration'); ?>
})
</script>
	



	


	
	
		
	<div class="content">
		<div class="container">
		


	
	<div class="banner row">
		<div class="span6">
		<a class="banner-link nochange" href="#banner">
				<div class="banner-front">
					<span class="chevron"> </span>
					<p class="numeral dynt"></p>
					<p class="banner-sub dynt"></p>
				
				</div>
		</a>
		</div>
		
		<div class="span6">
			<div class="banner-back">
			<span class="triangle" alt=""> </span>
				<p class="banner-desc dynt"></p>
			</div>
		</div>
			
	</div>

	
	
	
	
		
			<div class="row">
				<div class="span6">
<?php the_field('body_1'); ?>
				</div>
				
				<div class="span6">
				<?php the_field('body_2'); ?>
				</div>
			</div>
			
	<?php endwhile; // end of the loop. ?>

	<script type="text/javascript">


$('#myCarousel').carousel({
    interval: 5000
});

// Could be slid or slide (slide happens before animation, slid happens after)
$('#myCarousel').bind('slide', function() {
   $('.dynt').fadeOut(500);

});


$('#myCarousel').bind('slid', function() {

   idx = $('.carousel-inner div.active').index();
   

   
   
   $('p.numeral').text('#0'+(idx+1));
   $('p.banner-sub').text($('div#inner-title'+idx).text());
   
   $('p.banner-desc').html($('div#inner-desc'+idx).html());
   $('a.banner-link').attr('href', $('div#inner-link'+idx).text() );
    $('.dynt').fadeIn(500);
   
   
})
idx = $('.carousel-inner div.active').index();
   $('p.numeral').text('#0'+(idx+1));
   $('p.banner-sub').text($('div#inner-title'+idx).text());
   
   $('p.banner-desc').html($('div#inner-desc'+idx).html());
  $('a.banner-link').attr('href', $('div#inner-link'+idx).text() );


   


</script>



<?php get_footer(); ?>
