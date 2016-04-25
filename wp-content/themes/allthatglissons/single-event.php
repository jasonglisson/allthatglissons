<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row">
					
					<?php 
								$date = DateTime::createFromFormat('Ymd', get_field('event_date', $ID ));?>						
			
					<h2 class="post-title large-12 columns"><span class="post-type"><?php echo $post->post_type; ?> // </span> <?php echo $date->format('m.d.Y'); ?>  // <?php echo get_the_title( $ID ); ?> </h2>
			
					<div id="main" class="large-8 medium-8 columns first" role="main">
						
						<?php while (have_posts()) : the_post(); ?>
						
							<?php the_content(); ?>
						
						<?php endwhile; ?>

						<div id="event-gallery">
		<?php
		$images = get_field('event_gallery');
		if( $images ): 
		 ?>
    <div id="event-gallery">
        <ul class="event-gallery">
            <?php foreach( $images as $image ): ?>
                <li>
    <a href="<?php echo $image['sizes']['large']?>" rel="lightbox[event]" class="event-image large-2"><img class="event-gallery-img" src="<?php echo $image['sizes']['thumbnail'];?>"></a>                    
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>		 
	</div>
		
					</div> <!-- end #main -->
					
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