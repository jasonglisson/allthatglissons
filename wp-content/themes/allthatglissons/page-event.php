<?php
/*
Template Name: Event
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
					<h2 class="post-title large-12 columns"><?php echo get_the_title( $ID ); ?> </h2>			
			
						<div id="content" role="main" class="large-8 columns">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php the_content(); ?>
						<h3 style="color:#666;border-bottom:1px dotted #ddd;">Upcoming Events</h3> 
						<?php /*
$args = array( 
							'post_type' => 'event', 
							'order_by' => 'date', 
							'order' => 'DESC', 
							'posts_per_page' => -1
						);
*/

						$event0 = current_time('Ymd');
						$args = array(
						  'post_type' => 'event',
							'post_status' => 'publish',
							'posts_per_page' => '10',
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
						
						$loop = new WP_Query( $args ); /* print_r($loop); */
/*
						echo '<ul>';
						while ( $loop->have_posts() ) : $loop->the_post();
							?><li class="event-list"><h3><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
								  echo $date->format('m/d/Y');?></a></h3>
								  <?php the_excerpt(); ?></li>
							<?php				
							endwhile; 
						echo '</ul>';
*/
						if ( !empty( $loop->posts ) ) {
							while ( $loop->have_posts() ) : $loop->the_post();
							?><li class="event-list"><h3><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
								  echo $date->format('m/d/Y');?></a></h3>
								  <?php the_excerpt(); ?></li>
							<?php				
							endwhile; 
							echo '</ul><br><br><br><br>';
						} else {
							echo 'No upcoming events.<br><br><br><br><br><br>';
						}
						
						?>						
						<h3 style="color:#666;border-bottom:1px dotted #ddd;">Past Events </h3> 
						<?php /*
$args = array( 
							'post_type' => 'event', 
							'order_by' => 'date', 
							'order' => 'DESC', 
							'posts_per_page' => -1
						);
*/

						$event1 = current_time('Ymd');
						$args = array(
						  'post_type' => 'event',
							'post_status' => 'publish',
							'posts_per_page' => '10',
							'meta_query' => array(
								array(
									'key' => 'event_date',
									'compare' => '<=',
									'value' => $event1,
									)
									),
							'meta_key' => 'event_date',
							'orderby' => 'meta_value',
							'order' => 'DESC',
							'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
						);						
						
						$loop = new WP_Query( $args );
						echo '<ul>';
						while ( $loop->have_posts() ) : $loop->the_post();
							?><li class="event-list"><h3><a href="<?php the_permalink() ?>"><?php the_title();?> - 
							<?php $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
								  echo $date->format('m/d/Y');?></a></h3>
								  <?php the_excerpt(); ?></li>
							<?php				
							endwhile; 
						echo '</ul>';
						?>						
					</div>

				</article>


			<?php endwhile; ?>

		</div>
    
						<div class="large-4 columns sidebar">
						<div class="gallery-pics">
				<?php 
				 
				// args
				$args = array(
				    'posts_per_page' => 10, 
				    'post_type' => 'gallery', 
				    'orderby' => 'rand', 
				    'meta_query' => array( 
				    	array(  
				    		'key' => 'gallery',
				    	)
				    )
				 );
				// get results
				$the_query = new WP_Query( $args );
				// The Loop
				?>
				<ul class="gallery-list">
				<?php if( $the_query->have_posts() ): ?>
				    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a class="link-img-wrap" href="<?php the_permalink() ?>">
									<?php $rows = get_field('gallery' ); // get all the rows
									$rand_row = $rows[ array_rand( $rows ) ]; // get the first row
									$rand_row_image = $rand_row; // get the sub field value 
									$var = get_post($rows->ID);
									$i = 0;
									shuffle($rows);
									foreach($rows as $r) {
										echo '<div class="list-item"><img src="'.$r['sizes']['thumbnail'] .'"/><h3>' . $var->post_title . '</h3></div>';
										if (++$i == 1) break;
									}
									//echo '<img src="'.$rand_row['sizes']['thumbnail'] .'"/>';
									?>
							</a>
						</li>	
				    <?php endwhile; ?>
				<?php endif; ?>
				</ul>
				<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>					
			</div>
					</div>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>