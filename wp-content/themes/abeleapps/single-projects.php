<?php
/**
* This is the Template for single project posts
 *
 * @package AbeleApps
 */

get_header(); ?>



			<?php while ( have_posts() ) : the_post(); ?>
	
	

	<?php $carousel = get_field('carousel');
	
	
	
	
	 ?>


	<div id="PageCarousel" class="ad-carousel carousel slide">
 
  <!-- Carousel items -->
  <div class="carousel-inner">
  
  <?php foreach ($carousel as $key => $cimg ): ?>
  
     <div class="item <?php if($key == 0){ echo "active"; } ?>">
     		<div class="item-inner" style="background: url('<?php echo $cimg['carousel_image']; ?>') 50% 50% no-repeat">
	     	</div>
     </div>
    
    
   
    <?php endforeach; ?>

  </div>
  <?php if ($key>0): ?>
  <!-- Carousel nav -->
  <a class="ad-carousel-control left" href="#PageCarousel" data-slide="prev"></a>
  <a class="ad-carousel-control right" href="#PageCarousel" data-slide="next"></a>
  <?php endif; ?>
  
</div>

<script>
$('#PageCarousel').carousel({
  interval: <?php the_field('slide_duration'); ?>
})
</script>


	
	
	
	
	</div>

	
		
	<div class="content">
		<div class="container">
		
		
	<div class="banner row">
		<div class="span6">
			
				<div class="banner-front">

				<p class="banner-sub-top"><?php echo the_title(); ?></p>
				
				<p class="platform"><a href="<?php the_field('app_store_link'); ?>" title="Link to App Store"><?php the_field('Platform'); ?> &raquo;</a> </p>
					<div class="shares">
				<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5163835368d65455"></script>
<!-- AddThis Button END -->

					</div>
				</div>
		
		</div>
		
		<div class="span6">
			<div class="banner-back">
				<span class="triangle" alt=""> </span>
<p class="banner-desc dynt"><?php the_field('short_description') ?></p>
			</div>
		</div>
			
	</div>
	
	
	
	<?php
	
while(has_sub_field("page_body")): ?>
 
	<?php if(get_row_layout() == "image_left"): // layout: Content ?>
 <?php  $image=  get_sub_field('image'); ?>
			<div class="row">
			<div class="span2 offset1">
		<a href="<?php echo $image['sizes']['mid-large']; ?>" class="fancybox"> <img src="<?php echo $image['sizes']['medium']; ?>" alt="" /> </a>
		</div>

		<div class="span8">
		<?php the_sub_field('body'); ?>
		</div>
			</div>
 
	<?php elseif(get_row_layout() == "image_right"): // layout: File ?>
  <?php  $image=  get_sub_field('image'); ?>
		<div class="row">
		<div class="span8 offset1">
		<?php the_sub_field('body'); ?>
		</div>
		<div class="span2">
	<a href="<?php echo $image['sizes']['mid-large']; ?>" class="fancybox"> <img src="<?php echo $image['sizes']['medium']; ?>" alt="" /> </a>
		</div>
	</div>
 
	<?php elseif(get_row_layout() == "testimonial"): // layout: Featured Posts ?>
 
	<div class="row">
		<div class="span10 offset1">
		
		<span class="testimonial">
		<?php the_sub_field('quote') ?>
	</span>
		<p class="quote-author">&#151;<?php the_sub_field('source') ?> </p>
		
		
		</div>
	</div>
 
	<?php endif; ?>
 
<?php endwhile; ?>

	

	
		
			
	<?php endwhile; // end of the loop. ?>

	



<?php get_footer(); ?>
