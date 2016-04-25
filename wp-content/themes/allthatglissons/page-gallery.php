<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
					<div class="large-12 columns"><h2 class="page-title"><?php echo the_title( ); ?> </h2></div>
					<div class="large-12 columns"><?php echo $post->post_content; ?></div>	
				</div>
				<div class="row gallery-wrap">
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

							<?php if( $the_query->have_posts() ): ?>
					    	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					    	<div class="large-3 columns">
									<a class="link-img-wrap" href="<?php the_permalink() ?>">
										<?php $rows = get_field('gallery' ); // get all the rows
										$rand_row = $rows[ array_rand( $rows ) ]; // get the first row
										$rand_row_image = $rand_row; // get the sub field value 
										$var = get_post($rows->ID);
										$i = 0;
										shuffle($rows);
										foreach($rows as $r) {
											echo '<div class="list-item"><img src="'.$r['sizes']['gallery-thumb'] .'"/><h3 class="gallery-title">' . $var->post_title . '</h3></div>';
											if (++$i == 1) break;
										}
										//echo '<img src="'.$rand_row['sizes']['thumbnail'] .'"/>';
										?>
								</a>
					    	</div>	
								<?php endwhile; ?>
							<?php endif; ?>

					<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>					
				    
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
