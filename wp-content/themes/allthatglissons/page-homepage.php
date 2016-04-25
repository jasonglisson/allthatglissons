<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
<div id="content" class="container">
			
				<div class="row">
			
					<div class="large-3 columns">
<!-- 						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image1.jpg" alt="home1" width="270" height="264">	 -->		
							<?php 
							//print_r($post);
							$images1 = get_field('image_block_2');
							
							if( $images1 ): ?>
							    <ul class="home-slide-1">
							        <?php foreach( $images1 as $image1 ): ?>
							            <li>
							                     <img src="<?php echo $image1['sizes']['gallery-thumb']; ?>" alt="<?php echo $image1['alt']; ?>" width="270" height="264" />
							            </li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>										
					</div>
					
					<div class="large-6 columns block">
						<div class="scripture">
							"O Lord, You are our Father, We are the clay, and You our potter; And all of us are the work of Your hand."<br>
							<span>- Isaiah 64 : 8</span>
						</div>
					</div>
					
					<div class="large-3 columns block contact-wrap">
						<div class="contact block">
							<span class="phone">919.731.2789<br></span>
							<span class="address">209 Little River Dr.<br> Goldsboro, NC 27530<br><br></span>
							<span class="email"><a href="/contact">Click here to email me!</a></span>
						</div>	
					</div>
				
				</div>
				
				<div class="row">		
					
					<div class="large-6 columns events-wrap">
						<div class="events">
							<h4>Upcoming Events</h4>
						<?php 

						$event0 = current_time('Ymd');
						$args = array(
						  'post_type' => 'event',
							'post_status' => 'publish',
							'posts_per_page' => '1',
							'meta_query' => array(
								array(
									'key' => 'event_date',
									'compare' => '>=',
									'value' => $event0,
									)
									),
							'meta_key' => 'event_date',
							'orderby' => 'meta_value',
							'order' => 'ASC',
							'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
						);						
						
						$loop = new WP_Query( $args ); 
						
						if ( !empty( $loop->posts ) ) {
							while ( $loop->have_posts() ) : $loop->the_post();
							?><h5><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php  $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
								  echo $date->format('m/d/Y');?></a></h5>
								  <?php the_excerpt(); ?>
							<?php				
							endwhile; 
						} else {
							echo 'No upcoming events.';
						}
						
						?>								
						<?php wp_reset_postdata(); ?>
						</div>	
					</div>					
					<div class="large-3 columns">
<!-- 						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/image1.jpg" alt="home1" width="270" height="264"> -->
							<?php 
							//print_r($post);
							$images2 = get_field('image_block_1');
							
							if( $images2 ): ?>
							    <ul class="home-slide-2">
							        <?php foreach( $images2 as $image2 ): ?>
							            <li>
							                     <img src="<?php echo $image2['sizes']['gallery-thumb']; ?>" alt="<?php echo $image2['alt']; ?>" width="270" height="264" />
							            </li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>												
					</div>				
					<div class="large-3 columns">
						<div id="swiffycontainer" style="width: 100%; height: 257px;">
						</div>				
					</div>

				</div>
    
			</div> <!-- end #content -->
<div id="gallery-wrap">
				<div class="row">
					<div class="large-3 columns">
						<a href="/gallery/pottery">
							<div class="circle masks" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/image3.jpg);">Pottery</div>	
							<h3>Pottery</h3>
						</a>
					</div>
					<div class="large-3 columns">
						<a href="/gallery/sculptures">
							<div class="circle masks" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/image2.jpg);">Sculptures</div>				
							<h3>Sculptures</h3>
						</a>
					</div>			
					<div class="large-3 columns">
						<a href="/gallery/dolls">
							<div class="circle masks" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/image4.jpg);">Dolls</div>			
							<h3>Dolls</h3>
						</a>
					</div>
					<div class="large-3 columns">
						<a href="/gallery/masks">
							<div class="circle masks" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/image1.jpg);">Masks</div>				
							<h3>Masks</h3>
						</a>
					</div>						
				</div>
			</div>	
<div id="about-wrap" class="container">
	<div class="row">
		<div class="large-9 columns block">
			<div class="about">
				<h4>About</h4>
				<div class="about-home-txt">
					<?php $the_query = new WP_Query( 'page_id=11' ); ?>
					<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>
						<?php the_excerpt(); ?>
					<?php endwhile;?>
				</div>
			</div>
		</div>
		<div class="large-3 columns">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-home.jpg" alt="home1" class="about-img" width="270" height="264">						
		</div>		
	</div>	
</div>	

<?php get_footer(); ?>
