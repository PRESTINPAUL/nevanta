<?php
/**
 * The template part for displaying single blog posts
 *
 * @package nevanta
 * @subpackage nevanta

 */
?>
<div class="blog-header">
	<!--<div class="blog-breadcrums">
		<a href="#">Style Lounge</a><span class="bred-separator"></span><a href="#">Blog</a>
	</div>-->
	<div class="single-blog-post-title">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="single-blog-post-info">
		<p class="single-blog-post-author"><?php the_author(); ?></p><p class="single-blog-post-date"><?php the_date('F j, Y', ' | '); ?></p>
	</div>
	<div class="single-blog-post-share">
		
		<?php 
			$link = get_permalink();
			
			// twitter share count
			//$json_string_twitter = file_get_contents("http://cdn.api.twitter.com/1/urls/count.json?url=".$link);
			$json_string_twitter = file_get_contents("http://public.newsharecounts.com/count.json?url=".$link);
			$json_twitter = json_decode($json_string_twitter, true);
			$twitter_count = intval( $json_twitter['count'] );
			
			
			// facebook share count
			$json_string_fb = file_get_contents("http://graph.facebook.com/?id=".$link);
			$json_fb = json_decode($json_string_fb, true);
			$fb_count = intval( $json_fb['shares'] );
			
			// pinterest share count
			$json_string_pinterest = file_get_contents("http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=".$link);
			$json_string_pinterest = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $json_string_pinterest );
			$json_pinterest = json_decode($json_string_pinterest, true);
			
			$pinterest_count = intval( $json_pinterest['count'] );
			
			 $social_shares = $twitter_count + $fb_count + $pinterest_count;
			if($social_shares != '0'){
		 ?><div class="single-blog-post-share-count"><?php echo $social_shares; ?> shares</div>
         <?php } ?>
		<a class="fb-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" >
			<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-fb.png" height="37" width="37" alt="" />
		</a>
		<a class="twitter-share" target="_blank"  href="https://twitter.com/share" data-size="large"  data-url="https://dev.twitter.com/web/tweet-button">
			<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png" height="37" width="37" alt="" />
		</a>
		<!--<a class="insta-share" target="_blank" href="https://instagram.com/nevantamedia/" >
			<img class="img-res" src="<?php //bloginfo('template_directory'); ?>/img/icon-insta.png" height="37" width="37" alt="" />
		</a>-->
		<a class="pin-share" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=nevanta&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" >
			<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png" height="37" width="37" alt="" />
		</a>
	</div>
</div>
<div class="single-blog-post-content">
	<?php if(!empty(get_cfc_meta( 'single_blog_gallery_new' ))){ ?>
	<div class="gallery-tile-view">
		<?php if (!(MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android'))) { ?>
		<div class="single-image-info-div">
			<div class="row">
				<div class="col-md-10 single-image-courtesy"></div>
				<div class="col-md-1 image-counts"><span class="current-gallery-image">1</span><span class="total-gallery-image"><?php echo '/'.count(get_cfc_meta( 'single_blog_gallery_new' )); ?></span></div>
				<div class="col-md-1 grid-view-div">
					<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/grid.png"/>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) { ?>
		<div class="single-image-info-div border-bottom">
			<div class="row">
				<div class="col-sm-9 col-xs-9 single-image-courtesy"></div>
				<div class="col-sm-3 col-xs-3 image-counts">
					<span class="current-gallery-image">1</span>
					<span class="total-gallery-image"><?php echo '/'.count(get_cfc_meta( 'single_blog_gallery_new' )); ?></span>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="owl-carousel owl-theme manual" id="single-blog-post-gallery">
			<?php 
			$photo_courtesy = array();
			foreach( get_cfc_meta( 'single_blog_gallery_new' ) as $key => $value ){
				//echo '<pre>'.print_r($key .' => '. $value, true).'</pre>';
				
				$photo_obj = get_cfc_field( 'single_blog_gallery_new','gallery-image', false, $key );  
				
				//print_r($photo_obj);
				
				$photo_courtesy[$key]['courtesy'] = get_cfc_field( 'single_blog_gallery_new','image-courtesy', false, $key );
				
				//print_r($photo_obj['id']);
				
				//$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array('220','220'), true );
				
				//echo '<pre>'.print_r($photo_obj, true).'</pre>';
				//$image = vt_resize( '', $photo_obj['url'], 335, 500, true );
				?>
				<div class="item">
                	<?php $url_blog_single = wp_get_attachment_image_src($photo_obj['id'],'blog-thumb-tenth', true );?>
					<!--<img class="img-res" src="<?php echo $photo_obj['url']; ?>" />-->
                    
                    <img class="img-res" src="<?php echo $url_blog_single['0']; ?>" width="355" height="487" />
					
					<?php if($photo_obj['caption'] != ""){ ?>
					<span class="single-blog-post-img-caption"><?php echo $photo_obj['caption']; ?></span>
					<?php } ?>
					<input type="hidden" id="current_gal_image" name="current_gal_image" value="<?php echo $key+1; ?>" />
				</div>
			<?php } ?>
		</div>
		<?php //echo '<pre>'.print_r($photo_courtesy, true).'</pre>'; ?>
	</div>
	<div class="gallery-grid-view">
		<div class="single-image-info-div">
			<div class="row">
				<div class="col-md-11"></div>
				<div class="col-md-1 tile-view-div">
					<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/tile.png"/>
				</div>
			</div>
		</div>
		<div class="single-gallery-grid-posts">
        <div class="row">
			<?php 
			foreach( get_cfc_meta( 'single_blog_gallery_new' ) as $key => $value ){								
				$image_data = get_cfc_field( 'single_blog_gallery_new','gallery-image', false, $key );
				$imagesrc = $image_data['url'];				
			?>
				<div class="col-md-4">
                	<div class="blog_grid_layout_img">
						<img class="img-res" src="<?php echo $imagesrc; ?>" width="250" height="200" />
                    </div>
					<?php if($photo_obj['caption'] != ""){ ?>
					<div class="single-blog-post-grid-img-caption"><?php echo $image_data['caption']; ?></div>
					<?php } ?>
				</div>
			<?php } ?>
          </div>  
		</div>
	</div>
	<?php } ?>
	<div class="single-blog-post-desc">
		<?php the_content(); ?>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(e){ 
	
		jQuery('#single-blog-post-gallery').owlCarousel({
			"singleItem": true,
			"autoPlay": false,
			"nav": true,
			"navText":false,
			"dots": false,
			"autoHeight" : true,
			responsiveClass: true,
				responsive: {
				  0: {
					items: 1,
					nav: true,
					loop: false
				  },
				  480: {
					items: 1,
					nav: true,
					loop: false
				  },
				  600: {
					items: 1,
					nav: true,
					loop: false
				  },
				  1000: {
					items: 1,
					nav: true,
					loop: false
				  }
				}
		});
	
		var courtesy = <?php echo json_encode($photo_courtesy); ?>;
		//console.log(courtesy[0].courtesy);
		//console.log(courtesy.length)
		if(courtesy != null && courtesy.length >= 1){
			//console.log(courtesy[0].courtesy);
			if(courtesy[0].courtesy != ''){
				jQuery('.single-image-courtesy').text(courtesy[0].courtesy);
			}
			else{
				jQuery('.single-image-courtesy').html('&nbsp;');
			}			
			jQuery('#single-blog-post-gallery .owl-next').on('click',function(e) {
				var current_id_image = jQuery('#single-blog-post-gallery .owl-item.active #current_gal_image').val()-1;
				if(courtesy[current_id_image].courtesy != ''){
					jQuery('.single-image-courtesy').text(courtesy[current_id_image].courtesy);
				}
				else{
					jQuery('.single-image-courtesy').html('&nbsp;');
				}
				/* changing image count */
				var current_image_id = jQuery('#single-blog-post-gallery .owl-item.active #current_gal_image').val();
				jQuery('.current-gallery-image').text(current_image_id);
			});
			jQuery('#single-blog-post-gallery .owl-prev').on('click',function(e) {
				var current_id_image = jQuery('#single-blog-post-gallery .owl-item.active #current_gal_image').val()-1;
				if(courtesy[current_id_image].courtesy != ''){
					jQuery('.single-image-courtesy').text(courtesy[current_id_image].courtesy);
				}
				else{
					jQuery('.single-image-courtesy').html('&nbsp;');
				}
				/* changing image count */
				var current_image_id = jQuery('#single-blog-post-gallery .owl-item.active #current_gal_image').val();
				jQuery('.current-gallery-image').text(current_image_id);
			});
		}
		else{
			jQuery('.single-image-courtesy').html('&nbsp;');
		}
	});
</script>