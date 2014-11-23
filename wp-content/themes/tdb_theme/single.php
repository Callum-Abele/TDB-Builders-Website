	<?php get_header(); ?>
		
			<div class="band chief">
		
				<div class="container">
			
					<div class="sixteen columns">		
					
					</div>
						
					<div class="ten columns">
					
						<!-- Start the Loop. -->
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
						<article>
						
							<div class="three columns alpha thumbnail">
							
								<figure>
								
									<a href="<?php the_permalink() ?>">
								
								<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID) ) {
								
											$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
											
											?>
																						
											<img src="<?php echo $thumbnail[0]; ?>" alt="" />
											
								<?php }else{ ?>	
								
									<img src="<?php echo get_template_directory_uri(); ?>/images/thumb_iceland.jpg" alt="iceland" />
									
								<?php } ?>	
								
									</a>
								
								</figure>
							
							</div><!--three-->	
						
							<div class="seven columns omega">
							
								<p class="breadcrumbs"><a href="#">Breadcrumb</a> &gt; <a href="#">trail</a></p>
								
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
								
								<p class="meta">Posted by <?php the_author_posts_link() ?> <?php the_time('F jS, Y') ?> <?php comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?></p>
								
								<?php the_content(); ?>
													
							</div><!--seven-->	
							
							<hr />			
						
						</article><!--blog post-->
					
						<?php endwhile; else: ?>
						
						<p>Sorry, no posts matched your criteria.</p>
						
						<?php endif; ?>
					
					</div><!--end ten-->			
			
					<?php get_sidebar(); ?>
					
				</div><!--end container-->
				
			</div><!--end band-->	
		
		<?php get_footer(); ?>