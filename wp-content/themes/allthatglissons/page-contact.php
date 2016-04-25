<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
					<h2 class="post-title large-12 columns"><?php echo get_the_title( $ID ); ?> </h2>			
			
				  <div id="main" class="large-12 medium-12 columns" role="main">
					
						<?php while (have_posts()) : the_post(); ?>
						
							<?php the_content(); ?>
						
						<?php endwhile; ?>
					    					
    			</div> <!-- end #main -->
					<div id="map" class="section large-6 columns">
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
						<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
						<script type="text/javascript">
						function initialize() {
						
						  // Create an array of styles.
						  var styles = [
						    {
						      stylers: [
						        { hue: "#826e6f" },
						        { saturation: -20 }
						      ]
						    },{
						      featureType: "road",
						      elementType: "geometry",
						      stylers: [
						        { lightness: 100 },
						        { visibility: "simplified" }
						      ]
						    },{
						      featureType: "road",
						      elementType: "labels",
						      stylers: [
						        { visibility: "off" }
						      ]
						    }
						  ];
						
						    var loc, map, marker;
						    
						    loc = new google.maps.LatLng(35.450799, -78.040454);
							pos = new google.maps.LatLng(35.450799, -78.040454);
						
							var mapOptions = {
								zoom: 11,
								disableDefaultUI:true,    
								center: pos,
								panControl:true,
								zoomControl:true,
								scrollwheel: false,
								disableDoubleClickZoom: true,								
								panControlOptions: {
								    position: google.maps.ControlPosition.TOP_RIGHT
								}	
							};
						    
						    map = new google.maps.Map(document.getElementById('map-canvas'),
						    mapOptions);
						    
						    var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
						    
							var image = '/wp-content/themes/allthatglissons/assets/images/marker.png';
							marker = new google.maps.Marker({
								position: loc,
								map: map,
								icon: image,
							});
						    
							//Associate the styled map with the MapTypeId and set it to display.
							map.mapTypes.set('map_style', styledMap);
							map.setMapTypeId('map_style');    
						    
						}
						google.maps.event.addDomListener(window, 'load', initialize);
						</script>
						<div id="map-canvas" class="shadow"></div>
				</div>	
					
					<?php echo do_shortcode( '[contact-form-7 id="7" title="Contact form 1"]' ); ?>			  
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>