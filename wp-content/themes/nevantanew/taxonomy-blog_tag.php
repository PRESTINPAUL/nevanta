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
<div class="owl-carousel owl-theme manual blog-tag-page-list-submenu" id="blog_posts_slider" >
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
/*if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
	$posts_per_page = 8;
}
else{*/
	$posts_per_page = 7;
//}
$args=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'caller_get_posts' => 1,
	'paged'=>$paged,
	'post__not_in'=> $featured_ids,
	'tax_query' => array(
							array(
							'taxonomy' => 'blog_tag',
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
			<div class="col-md-12">
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
						else if( $i == 3 || $i == 5 ){
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
						<div class="col-md-6 col-sm-6 col-xs-6 single-blog-list">
							<div class="col-md-5 blog-image">
								<a href="<?php the_permalink(); ?>">
							<img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
								</a>
							</div>
							<div class="col-md-7 blog-content">
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
								$excerpt = substr($excerpt, 0, 75);
								echo $excerpt.'...';
								}
								else
								{
									echo $excerpt;
								}
								*/
								?> </p>
								<span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php if( ($i == 2) || ($my_query->post_count == $i) ){ ?></div><!--first-row--><?php } ?>
					<?php }
					elseif( $i == 3 || $i == 4 || $i == 5 ){ ?>
					<?php if( $i == 3 ){ ?><div class="second-row"><?php } ?>
                    <?php if($i == 3){$image_mar="nopad-left";}
							  if($i == 4){$image_mar=" ";}
							  if($i == 5){$image_mar="nopad-right";}
						 ?>
						<?php /*?><?php 
							if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
								if($i == 3){ ?>
								<div class="col-md-4 col-sm-12 col-xs-12 single-blog-list">
									<div class="col-md-12 col-sm-6 col-xs-6 blog-image">
							<?php }
								else{ ?>
									<div class="col-md-4 col-sm-6 col-xs-6 single-blog-list">
										<div class="col-md-12 blog-image">
							<?php }
							}
							else{ ?><?php */?>
						<div class="col-md-4 single-blog-list <?php echo $image_mar; ?>">
							<div class="blog-image">
								<a href="<?php the_permalink(); ?>">
									<img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
								</a>
							</div>
							<?php /*?><?php
							if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
								if($i == 3){ ?>
									<div class="col-md-12 col-sm-6 col-xs-6 blog-content">
							<?php }
								else{ ?>
									<div class="col-md-12 blog-content">
							<?php }
							}
							else{ ?><?php */?>
							<div class="col-md-12 blog-content">
						<?php //} ?>						
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
										if(strlen($excerpt) > 75){
										$excerpt = substr($excerpt, 0, 75);
										echo $excerpt.'...';
										}
										else
										{
											echo $excerpt;
										}
										
										?> </p>
								<?php } } else{ ?>								
                                <p class="blog-excerpt"><?php 
								   $excerpt = get_the_excerpt();
								   
								   echo substr($excerpt, 0, 140).'...';
								   
								   /* if(strlen($excerpt) > 75){
								    $excerpt = substr($excerpt, 0, 75);
									echo $excerpt.'...';
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
					elseif( $i == 6 || $i == 7 || $i == 8 ){ ?>
					<?php if( $i == 6 ){ ?><div class="third-row"><?php } ?>
						<?php /*?><?php 
							if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
								if($i == 6){ ?>
								<div class="col-md-4 col-sm-12 col-xs-12 single-blog-list">
									<div class="col-md-12 col-sm-6 col-xs-6 blog-image">
							<?php }
								else{ ?>
									<div class="col-md-4 col-sm-6 col-xs-6 single-blog-list">
										<div class="col-md-12 blog-image">
							<?php }
							}
							else{ ?><?php */?>
						<div class="col-md-6 single-blog-list">
							<div class="col-md-5 blog-image">							
								<a href="<?php the_permalink(); ?>">
									<img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" />				
								</a>
							</div>
							<?php /*?><?php
							if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
								if($i == 6){ ?>
									<div class="col-md-12 col-sm-6 col-xs-6 blog-content">
							<?php }
								else{ ?>
									<div class="col-md-12 blog-content">
							<?php }
							}
							else{ ?><?php */?>
							<div class="col-md-7 blog-content">
							<?php //} ?>
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
									$excerpt = substr($excerpt, 0, 75);
									echo $excerpt.'...';
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
						/*if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
							if( ($i == 8) || ($my_query->post_count == $i) ){ ?></div><?php } 
						}
						else{*/
							if( ($i == 7) || ($my_query->post_count == $i) ){ ?></div><?php }
						//}
					} ?>
					<?php $i++;
					endwhile; ?>
                    <?php /*if( $i == 2 ){ ?></div><!--first-row--><?php }*/ ?>
					<div class="blog-post-pagination">
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
					</div>
				<?php endif; ?>
              
				</div><!--blogs-lists-->
                
                <div class="blog-newsletter">
					<div class="col-md-6 newsletter">
						<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/subscribe-to-our-newsletter-bg.png" />
						<h5 class="news-tagline">SUBSCRIBE TO OUR<?php if (!(MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android'))) { ?><br> <?php } ?> NEWSLETTER</span></h5>
					</div>
					<div class="col-md-6 newsletter-form">
						<form>
						  <?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]'); ?>
						</form>
					</div>
				</div>
				
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