<?php

get_header();

$type = 'blog';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'meta_query' => array(
		array(
			'key'     => 'featured_post',
			'value'   => 'yes',
			'compare' => '=',
		)
	)
  );

$my_query = null;
$my_query = new WP_Query($args);
$featured_ids = wp_list_pluck( $my_query->posts, 'ID' );
if( $my_query->have_posts() ) : ?>
<!--<div class="container">
<div class="col-md-12">-->
<div class="owl-carousel owl-theme manual blog-list-submenu" id="blog_posts_slider" >
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<?php		
		$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-tenth');
		$imagesrc = $image_data[0];
		?>		                
		<div class="item">
			<a href="<?php the_permalink(); ?>">	
            	<img class="img-res" src="<?php echo $imagesrc; ?>" width="350" height="526" />  
			</a>
			<a class="blog-post-title" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3, '' ); ?></a>
		</div>		
<?php endwhile; ?>
</div>
<?php endif;
wp_reset_query();

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

$posts_per_page = 7;
//$posts_per_page = 10;
$args=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'caller_get_posts' => 1,
	'paged'=>$paged,
	'post__not_in'=> $featured_ids,
	'tax_query' => array(
							array(
							'taxonomy' => 'blog_category',
							'field'    => 'slug',
							'terms'    => get_query_var( 'term' ),
							),
						),
						/*'meta_query' => array(
								array(
									'key'     => 'featured_post',
									'value'   => 'no',
									'compare' => '=',
								)
							)*/						
  );
  
$my_query = null;
$my_query = new WP_Query($args);
?>
<div id="primary" class="container blog-content-main">
	<div class="row">
		<main id="main" class="site-main" role="main">
			<div class="col-md-12 nopad-left-right">
				<div class="blogs-lists<?php if($my_query->post_count == 1){ ?> one-posts-page <?php } ?>">				
				<?php 
					//echo '<pre>'.print_r($my_query, true).'</pre>';die;
					if( $my_query->have_posts() ) :
					$i = 1;
					while ($my_query->have_posts()) : $my_query->the_post(); 					
						if( $i == 1 || $i == 2 || $i == 6 || $i == 7 ){
							$thumb_width = 200;
							$thumb_height = 200;
							$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-second');
							$imagesrc = $image_data[0];
						}
						else if( $i == 3 || $i == 5 || $i == 8 || $i == 10){
							$thumb_width = 372;
							$thumb_height = 209;
							$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-third');
							$imagesrc = $image_data[0];
						}
						else{
							$thumb_width = 374;
							$thumb_height = 374;
							$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-fourth');
							$imagesrc = $image_data[0];
						}													
					
					if( $i == 1 || $i == 2 ){ ?>
					<?php if( $i == 1 ){ ?><div class="first-row"><?php } ?>
						<div class="col-md-6 col-sm-6 col-xs-6 single-blog-list nopad-left">
							<div class="col-md-5 blog-image">
								<a href="<?php the_permalink(); ?>" class="blog_cat_img_200">
									<img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
								</a>
							</div>
							<div class="col-md-7 blog-content nopad-left-right">
								<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php //the_title(); 
								if (strlen($post->post_title) > 72) {
								echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } else {
								the_title();
								}							
								?></h2></a>								
                               <p class="blog-excerpt"><?php 	
							   $excerpt = get_the_excerpt();
							   
							   echo substr($excerpt, 0, 140).'...';
							   							 
								/*if(strlen($excerpt) > 75){	
								$excerpts = substr($excerpt, 0, 75);
								echo $excerpts."...";
								}
								else
								{				
									echo $excerpt;
								}*/	
															
								?> </p>
								<span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php if( ($i == 2) || ($my_query->post_count == $i) ){ ?></div><!--first-row--><?php } ?>
					<?php }
					elseif( $i == 3 || $i == 4 || $i == 5 || $i == 8 || $i == 9 || $i == 10 ){ ?>
					<?php if( $i == 3 || $i == 8){ ?><div class="second-row"><?php } ?>
                    	<?php if($i == 3){$image_mar="nopad-left";}
							  if($i == 4){$image_mar=" ";}
							  if($i == 5){$image_mar="nopad-right";}
						 ?>
						<div class="col-md-4 single-blog-list <?php echo $image_mar; ?>">
							<div class="blog-image">
						<?php 
						if($i== 3 || $i==5 || $i == 10){
							$image_class="blog_cat_img";	
						}elseif($i==4 || $i == 9){
							$image_class="blog_cat_med";
						}
						?>
                        
                        <a href="<?php the_permalink(); ?>" class="<?php echo $image_class; ?>">
                            <img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
                        </a>
							</div>
							
							<div class="col-md-12 blog-content nopad-left">										
								<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php //the_title(); 
								if (strlen($post->post_title) > 72) {
								echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } else {
								the_title();
								}							
								?></h2></a>
								<?php if (!(MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android'))) {
									if( $i == 3 || $i == 5 ){ ?>									
                                    <p class="blog-excerpt"><?php 	
							   		$excerpt = get_the_excerpt();	
									
									echo substr($excerpt, 0, 140).'...';							 
									
									/*if(strlen($excerpt) > 75){	
									$excerpts = substr($excerpt, 0, 75);
									echo $excerpts."...";
									}
									else
									{										
										echo $excerpt;
									}	*/								
									?> </p>
								<?php } } else{ ?>								
                                <p class="blog-excerpt"><?php 	
							   $excerpt = get_the_excerpt();	
							   
							   echo substr($excerpt, 0, 140).'...';
												 
								/*if(strlen($excerpt) > 75){	
								$excerpts = substr($excerpt, 0, 75);
								echo $excerpts."...";
								}
								else
								{									
									echo $excerpt;
								}*/
								
								?> </p>
								<?php } ?>
								<span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php if( ($i == 5) || ($my_query->post_count == $i) ){ ?></div><?php } ?>
					<?php }
					elseif( $i == 6 || $i == 7 ){ ?>
					<?php if( $i == 6 ){ ?><div class="third-row"><?php } ?>						
						<div class="col-md-6 single-blog-list nopad-left-right">	
                        	<div class="col-md-5 blog-image">						
								<a href="<?php the_permalink(); ?>" class="blog_cat_img_200">
									<img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
								</a>
							</div>							
							<div class="col-md-7 blog-content nopad-left-right">							
								<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php //the_title(); 
								if (strlen($post->post_title) > 72) {
								echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } else {
								the_title();
								}
								?></h2></a>								
                                <p class="blog-excerpt"><?php 	
							    $excerpt = get_the_excerpt();	
								
								echo substr($excerpt, 0, 140).'...';
								
															 
								/*if(strlen($excerpt) > 75){	
								$excerpts = substr($excerpt, 0, 75);
									echo $excerpts."...";
								}
								else
								{									
									echo $excerpt;
								}*/								
								?> </p>
								<span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php 						
							if( ($i == 7) || ($my_query->post_count == $i) ){ ?></div><?php }					
					} ?>
					<?php $i++;
					endwhile; ?>   
                                   
					<!--<div class="blog-post-pagination">
						<?php if($paged != 1){ 
							if($paged == $my_query->max_num_pages){
								previous_posts_link( '<div class="col-md-3 col-xs-5 blog-post-newer"><h4>Newer Posts</h4></div>' );
							}else{
								previous_posts_link( '<div class="intermediate-pages"><div class="col-md-5 col-xs-5 blog-post-newer intermediate-pages-newer"><h4>Newer Posts</h4></div>' );
							}
						} 
						if($paged != $my_query->max_num_pages){
							if($paged == 1){
								next_posts_link( '<div class="col-md-3 col-xs-5 blog-post-older"><h4>Older Posts</h4></div>', $my_query->max_num_pages );
							}else{
								next_posts_link( '<div class="col-md-5 col-xs-5 blog-post-older intermediate-pages-older"><h4>Older Posts</h4></div></div>', $my_query->max_num_pages );
							}
						} ?>
					</div>-->
                    
                    <div class="col-md-12 nopad-left-right">
                        <div style="float:right;">
                            <?php 
                            global $wp_query;                       
                            $right_img = get_template_directory_uri().'/img/right.svg';
                            $left_img = get_template_directory_uri().'/img/left.svg';
                                                                          
                               $current_page = max(1, get_query_var('paged'));
                                echo paginate_links(array( 
                                   //'base' => get_pagenum_link(1) . '%_%',                             
                                   'format' => 'page/%#%/',
                                   'current' => $current_page,
                                   'total' => $my_query->max_num_pages,
                                   'prev_next' => true,				   
                                  // 'end_size' => '3',
                                   // 'mid_size' => '2',
                                    'prev_text' => __('<img src="'.$left_img.'" class="left"> Prev '),
                                    'next_text' => __(' Next <img src="'.$right_img.'" class="right">')
                                ));                        
                            ?>
                        </div>
                    </div>  
                    
				<?php endif; ?>
              
				</div><!--blogs-lists-->
				
			</div>
		</main>
	</div>
</div>
<script>
jQuery(document).ready(function(e) {
    jQuery(".newsletter-form #es_txt_email_pg").attr('placeholder','ENTER EMAIL ADDRESS');
});
</script>
<?php get_footer(); ?>