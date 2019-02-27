<!doctype html>
<html amp>
<head>
<meta charset="utf-8">
<link rel="dns-prefetch" href="https://cdn.ampproject.org">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="canonical" href="<?php echo get_permalink();?>" />
<script src="https://cdn.ampproject.org/v0.js" async></script>
<style amp-boilerplate>
body {
	-webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	-moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	-ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	animation: -amp-start 8s steps(1, end) 0s 1 normal both
}
@-webkit-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-moz-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-ms-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-o-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
</style>
<noscript>
<style amp-boilerplate>
body {
	-webkit-animation: none;
	-moz-animation: none;
	-ms-animation: none;
	animation: none
}
</style>
</noscript>
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BlogPosting","mainEntityOfPage":"http:\/\/porch.technorigins.com\/facilities\/","publisher":{"@type":"Organization","name":"Porch","logo":{"@type":"ImageObject","url":"","height":36,"width":190}},"headline":"FACILITIES","datePublished":"2014-02-03T07:46:46+00:00","dateModified":"2014-02-04T07:37:21+00:00","author":{"@type":"Person","name":"admin"},"image":{"@type":"ImageObject","url":"http:\/\/porch.technorigins.com\/wp-content\/uploads\/2014\/02\/facilities-img-1_03.png","width":537,"height":207}}</script>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<title>
<?php wp_title(); ?>
</title>
<?php include('head.php');?>
</head>
<body class="front-page searchpage">
<header class="container">
  <div class="banner-area">
    <div id="headerwrap">
      <div id="header">
        <div class="logo-container"> 
            <a href="<?php echo site_url(); ?>">
              <amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png" width="50" height="64" alt="Nevanta"></amp-img>
            </a> 
       </div>
      </div>
    </div>
  </div>
</header>
<?php include('menu.php');?>
<main class="site-main search-page">
  <?php //get_header();

if (isset($_GET['s'])) {
	$qa = $_GET['s'];
	$qa_arr = explode(' ',$qa);
} 

$args = array (
	'role' => 'Fashion_designer',
	'order' => 'ASC',
	'orderby' => 'display_name',
	'search' => '*'.esc_attr( $qa ).'*',
);

// Create the WP_User_Query object
$wp_user_query = new WP_User_Query($args);

// Get the results
$blogusers = $wp_user_query->get_results();

global $wpdb;

$video_posts = $wpdb->get_results("SELECT DISTINCT(wp_posts.ID) as postid,wp_posts.* FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '15' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC");

$gallery_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '29' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC"); 
//echo '<pre>'.print_r($gallery_posts, true).'</pre>';die;
?>
  <?php $countGALLERY = 0; $countVIDEO = 0;?>
  <?php //if (have_posts()) : ?>
  <div class="col-md-12"> 
    <!--<div class="row">
                        <div>		            
                            <ul class="nav navbar-nav search-tab-nav">
                                <li class="latest_tab active-tab"><a href="javascript:void(0);" class="menu1">Latest</a></li>
                                <li class="people_tab"><a href="javascript:void(0);" class="menu1">People</a></li>
                                <li class="video_tab"><a href="javascript:void(0);" class="menu1">Videos</a></li>
                                <li class="gallery_tab"><a href="javascript:void(0);" class="menu1">Gallery</a></li>
                            </ul>
                        </div>
                    </div>-->
    <?php 
                    if(empty($blogusers) && empty($video_posts) && empty($gallery_posts)){ ?>
    <div class="col-md-12 search"> <span class="error_common">Oops! No result for your search.</span> </div>
    <?php }else{?>
    <div>
      <div id="people_search">
        <div class="row">
          <?php 
                                if(empty($blogusers)){ ?>
          <div class="col-md-12 error_div_people" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php 
                                }
                                else{
                                ?>
          <div class="col-md-12">
            <div class="row">
              <h2 class="tag-title">People</h2>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
          <?php
                                if(!empty($blogusers)){ foreach ($blogusers as $user) { ?>
          <div class="search-people-tab designerlist col-50"> <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >
            <?php
                                                $image_data = get_cupp_meta($user->ID, array(100, 100)); 
												/*$imagename = basename($image_data);			
												$parts = explode('.', $image_data);
												$last = array_pop($parts);
												$parts = array(implode('.', $parts), $last);
												$thumb_width = 210;
												$thumb_height = 126;
												$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;	
												*/
                                                //$image = vt_resize( '', $thumb, 196, 211, true );
                                            ?>
            <amp-img src="<?php echo $image_data; ?>" width="100" height="100" layout="responsive"></amp-img>
            <!--<img class="img-res" src="<?php echo $thumb; ?>" width="196" height="211" alt="username" />--><br />
            <?php echo $user->display_name; ?> </a> </div>
          <?php }
                                }
                                ?>
        </div>
      </div>
      <div id="video_search">
        <div class="row">
          <?php 
                                if(empty($video_posts)){ ?>
          <div class="col-md-12 error_div_video" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php 
                                }
                                else{ ?>
          <div class="col-md-12">
            <div class="row">
              <h2 class="tag-title">Videos </h2>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
          <?php  if(!empty($video_posts)){ foreach($video_posts as $post){ setup_postdata($post);?>
          <div class="search-video-tab designerlist col-50"> <a class="img-link" href="<?php echo get_permalink(); ?>">
            <?php 
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(210, 126));
											//print_r($image);
                                            if (MobileDTS::is('mobile') || MobileDTS::is('android')) {                                                												
                                                /*$image_vt_size = vt_resize( '', $image[0], 210, 126, true );
                                                if($image_vt_size['width']=='')
                                                {
                                                $image_vt_size['url'] = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                                $image_vt_size['width'] = '210';
                                                $image_vt_size['height'] = '126';                                
                                                }*/
                                                 ?>
            <amp-img src="<?php echo $image[0]; ?>" width="210" height="126" layout="responsive"></amp-img>
            <!--<img class="img-res" src="<?php echo $image_vt_size['url']; ?>" width="<?php echo $image_vt_size['width']; ?>" height="<?php echo $image_vt_size['height']; ?>" alt="" />-->
            <?php }
                                            else{
                                                //echo the_post_thumbnail( 'thumbnail', array( 'class' => 'img-res' ) );
                                                /*$image_vt_size = vt_resize( '', $image[0], 141, 85, true );
                                                if($image_vt_size['width']=='')
                                                {
                                                $image_vt_size['url'] = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                                $image_vt_size['width'] = '160';
                                                $image_vt_size['height'] = '100';                                
                                                }*/
												//the_post_thumbnail_url( 'thumbnail', array( 'class' => 'img-res' ) );
                                                 ?>
            <amp-img src="<?php the_post_thumbnail_url( array(160, 100) ); ?>" width="210" height="126" layout="responsive"></amp-img>
            <!--<img class="img-res" src="<?php echo $image_vt_size['url']; ?>" width="<?php echo $image_vt_size['width']; ?>" height="<?php echo $image_vt_size['height']; ?>" alt="" />-->
            <?php }
                                            $autor_id = $post->post_author;
                                            $autordata = get_userdata($autor_id);
                                            $author_role = $autordata->roles[0];
                                            ?>
            </a>
            <?php if($author_role == "fashion_designer"){ ?>
            <div class="designerby">by <a href="<?php echo site_url(); ?>/designer/<?php echo get_the_author_meta('user_nicename'); ?>">
              <?php the_author_link(); ?>
              </a> </div>
            <?php } ?>
            <a href="<?php echo get_permalink(); ?>">
            <p><?php echo wp_trim_words( $post->post_title, 5, '...' ); ?></p>
            </a> </div>
          <?php   } wp_reset_postdata();$countVIDEO++; }?>
        </div>
      </div>
      <div id="Gallery_search">
        <div class="row">
          <?php 
                                if(empty($gallery_posts)){ ?>
          <div class="col-md-12 error_div_gallery" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php 
                                }
                                else{ //echo "<pre>"; print_r($gallery_posts); ?>
          <div class="col-md-12">
            <div class="row">
              <h2 class="tag-title">Gallery</h2>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
          <?php
                                if(!empty($gallery_posts)){
                                foreach($gallery_posts as $post){ //echo "<pre>"; print_r($post);
                                    setup_postdata($post);?>
          <div class="videolist image-gallery sort-destination lightbox popup-gallery bordernone" data-sort-id="portfolio">
            <?php //$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium'); ?>
            <a href="<?php echo $image_data[0]; ?>" class="lightbox-portfolio" >
            <div>

              <?php 		
			  							//$imagesrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(150, 150));
										
										//print_r($image);
			  							//the_post_thumbnail('medium', array( 'class' => 'img-res' ));
										//$imagename = basename($image_data[0]);
										//$imagename = str_replace(".png",".jpg",$imagename);
										//$imagename = str_replace(".PNG",".jpg",$imagename);
										/*if (MobileDTS::is('mobile') || MobileDTS::is('android')) {
											$thumb_width = 136;
											$thumb_height = 146;
										}
										else{
											$thumb_width = 206;
											$thumb_height = 206;
										}*/
										//if(!file_exists(get_bloginfo('url').'/wp-content/uploads/crop-gallery/'.$imagename)){
											//$image = imagecreatefromjpeg($image_data[0]);
											/*if(exif_imagetype($image_data[0]) == IMAGETYPE_JPEG)
											$image = imagecreatefromjpeg($image_data[0]);
											else if(exif_imagetype($image_data[0]) == IMAGETYPE_PNG)
											$image = imagecreatefrompng($image_data[0]);
											
											$filename = 'wp-content/uploads/crop-gallery/'.$imagename;
											
											$width = imagesx($image);
											$height = imagesy($image);
											
											// Remove the divide by 0 error, https://redmine.nevanta.com/issues/447
											if($height > 0)
											{
											   $original_aspect = $width / $height;
											}
											else
											{
											   $original_aspect = 1;
											}
											$thumb_aspect = $thumb_width / $thumb_height;
						
											if ( $original_aspect >= $thumb_aspect )
											{
											   // If image is wider than thumbnail (in aspect ratio sense)
											   $new_height = $thumb_height;
											   $new_width = $width / ($height / $thumb_height);
											}
											else
											{
											   // If the thumbnail is wider than the image
											   $new_width = $thumb_width;
											   $new_height = $height / ($width / $thumb_width);
											}
						
											$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
						
											// Resize and crop
											imagecopyresampled($thumb,
											   $image,
											   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
											   0, // Center the image vertically
											   0, 0,
											   $new_width, $new_height,
											   $width, $height);
											imagejpeg($thumb, $filename, 100);
											$imagesrc = get_bloginfo('url').'/'.$filename;*/
										//}
										//else{
                        //$imagesrc = get_bloginfo('url').'/wp-content/uploads/crop-gallery/'.$imagename;
                    //}
					
					?>
					<?php //echo $image_data; 
					//$imagesrc = the_post_thumbnail_url( 'medium' );  ?>
             <!-- <amp-img src="<?php echo $image_data[0]; ?>" width="67" height="72" layout="responsive"></amp-img>-->
              <amp-img src="<?php the_post_thumbnail_url( 'thumbnail', array( 'class' => 'img-res' ) ); ?>" width="100" height="100" layout="responsive"></amp-img>
              <!--<img src="<?php echo $imagesrc; ?>" class="img-res" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="" />--> 
            </div>
            <p><?php echo wp_trim_words( $post->post_title, 10, '...' ); ?></p>
          </div>
          </a>
          <?php  } wp_reset_postdata();   $countGALLERY++; } ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</main>
<!-- .site-main -->

<footer class="container">
  <div class="social-footer">
    <ul class="social-icons-footer">
      <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-fb.png" height="36" width="36" alt="Facebook"></amp-img>
        </a></li>
      <li><a href="https://twitter.com/NevantaMedia" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-tw.png" height="36" width="36" alt="Twitter"></amp-img>
        </a></li>
      <li><a href="https://instagram.com/nevantamedia/" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-insta.png" height="36" width="36" alt="Instagram"></amp-img>
        </a></li>
      <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-pinterest.png" height="36" width="36" alt="Pinterest"></amp-img>
        </a></li>
    </ul>
  </div>
  <div class="partfirst"> <span class="copy">©2016 Nevanta Ltd</span> <span class="terms-menu"><a href="https://www.nevanta.com/terms-and-conditions/">Terms</a> | <a href="https://www.nevanta.com/privacy-policy/">Privacy Policy</a></span> </div>
  <div id="footer" class="footer-menu">
    <?php
            wp_nav_menu( array(
                'menu' => 'footer'
            ) ); 
        ?>
  </div>
</footer>
<amp-analytics type="googleanalytics" id="analytics1"> 
  <script type="application/json">
        {
          "vars": {
            "account": "UA-XXXXX-Y"
          },
          "triggers": {
            "trackPageview": {
              "on": "visible",
              "request": "pageview"
            }
          }
        }
        </script> 
</amp-analytics>
</body>
</html>
