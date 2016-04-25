<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row">
			
					<h2 class="post-title large-12 columns"><span class="post-type"><?php echo $post->post_type; ?> // </span><?php echo get_the_title( $ID ); ?> </h2>
			
					<div id="main" class="large-12 medium-12 columns first" role="main">
					<div class="large-12 columns"><?php echo $post->post_content; ?></div>						
							<?php 
							//print_r($post);
							$images = get_field('gallery');
							
							if( $images ): ?>
							    <ul>
							        <?php foreach( $images as $image ): ?>
							            <li>
							                <a href="<?php echo $image['url']; ?>" rel="lightbox[gallery]" title="<?php echo $image['caption']; ?>">
							                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['caption']; ?>" />
							                </a>
<!-- 							                <p><?php echo $image['caption']; ?></p> -->
							            </li>
							        <?php endforeach; ?>
							    </ul>
							<?php endif; ?>
			
					</div> <!-- end #main -->
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>