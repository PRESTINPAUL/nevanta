<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="canonical" href="<?php echo get_permalink();?>" />
	<script src="https://cdn.ampproject.org/v0.js" async></script>        
	<style amp-boilerplate>
		body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>        
        
	<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BlogPosting","mainEntityOfPage":"http:\/\/porch.technorigins.com\/facilities\/","publisher":{"@type":"Organization","name":"Porch","logo":{"@type":"ImageObject","url":"","height":36,"width":190}},"headline":"FACILITIES","datePublished":"2014-02-03T07:46:46+00:00","dateModified":"2014-02-04T07:37:21+00:00","author":{"@type":"Person","name":"admin"},"image":{"@type":"ImageObject","url":"http:\/\/porch.technorigins.com\/wp-content\/uploads\/2014\/02\/facilities-img-1_03.png","width":537,"height":207}}</script>    
	<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>	    
<title>
    <?php wp_title(); ?>
</title>                                   
<?php include('head.php'); ?>
</head>


<body class="front-page blog-single-page">
    <header class="container">    
      <div class="banner-area">      
          <div id="headerwrap">
            <div id="header">                
                <div class="logo-container">
                    <a href="<?php echo site_url(); ?>"><amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png" width="50" height="64" alt="Nevanta"></amp-img></a>
                </div>            
            </div>
          </div>
      </div>  
    </header>
    <?php include('menu.php');?>
    <main> 
        
    
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="row">
                    <?php while (have_posts()) : the_post();  ?>
                     	
                        <div class="blog-header">	
                            <div class="single-blog-post-title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="single-blog-post-info">
                                <p class="single-blog-post-author"><?php the_author(); ?><?php the_date('F j, Y', ' | '); ?></p>
                            </div>	
                        </div>
						                        
                        <div class="single-blog-post-content">
							<?php if(!empty(get_cfc_meta( 'single_blog_gallery_new' ))){ ?>
                            <div class="gallery-tile-view">
                                <?php if (!(MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android'))) { ?>
                                <div class="single-image-info-div">
                                    <div class="row">
                                        <div class="col-md-10 single-image-courtesy"></div>
                                        <div class="col-md-1 image-counts">
                                            <span class="current-gallery-image">1</span>
                                            <span class="total-gallery-image"><?php echo '/'.count(get_cfc_meta( 'single_blog_gallery_new' )); ?></span>
                                        </div>
                                        <div class="col-md-1 grid-view-div">
                                            <img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/grid.png"/>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>	
                                
                                	
                                <div class="blog-slider-page">
								<amp-carousel width="600" height="800" layout="responsive" type="slides" autoplay controls loop arrows dots='.'>
                                    <?php 
                                    $photo_courtesy = array();
                                    foreach( get_cfc_meta( 'single_blog_gallery_new' ) as $key => $value ){								
									$photo_obj = get_cfc_field( 'single_blog_gallery_new','gallery-image', false, $key );  
									$photo_courtesy[$key]['courtesy'] = get_cfc_field( 'single_blog_gallery_new','image-courtesy', false, $key );
                                    ?>
                                    
                                    <div>              
                                    <amp-img src="<?php echo $photo_obj['url']; ?>" width="500" height="600" layout="responsive"></amp-img>
                                    <span class="blog-post-title-blog"><?php echo $photo_obj['caption']; ?></span>
                                    </div>
                                                                                                           
                                                                           
                                    <?php } ?>
                                </amp-carousel> 
								</div>                                
                                
                            </div>
                            
                            <?php } ?>
                            <div class="single-blog-post-desc">
                                <?php the_content(); ?>
                            </div>
                        </div>                                                
                           
                    <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-md-1"></div>               
                <?php 
                    global $post; 
                    $tag = get_the_terms ( $post->ID, 'blog_tag' );
                    // Start the loop.
                    while (have_posts()) : the_post();
                    if (!empty($tag)) {
                ?>
                   
                    <div class="author-tag"><?php echo get_the_term_list( $post->ID, 'blog_tag', 'Tags: ', ' ' ); ?></div>
                   
                <?php
                    }
                    endwhile;
                ?>
                
                
                <?php 
                /*start of related stories */
                $orig_post_related = $post;
                global $post;
                $tags_related = get_the_terms ( $post->ID, 'blog_tag' );
                if ($tags_related) {
                    $tag_ids = array();
                    foreach($tags_related as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
                    $type = 'blog';
                    $args=array(
                        'post_type' => $type,
                        'post_status' => 'publish',                      
                        'tax_query' => array(
                        array(
                    'taxonomy' => 'blog_tag',
                    'field'    => 'term_id',
                    'terms'    => $tag_ids,
                ),
            ),
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>-1, // Number of related posts to display.
                        'caller_get_posts'=>1,
                    );
        
                    $my_query_related = new WP_Query( $args );
                    
                    if($my_query_related->have_posts()):
                ?>
                <div class="single-related-blog-post">
                    <h3>Related Videos</h3>  
                    <amp-carousel height="100" layout="fixed-height" type="carousel" autoplay controls loop arrows dots='.'>
                        <?php 
                        while( $my_query_related->have_posts() ): $my_query_related->the_post(); ?>
                        
                        <div class="item">
                            <?php 
                                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                $imagename = basename($image_data[0]);
                                $thumb_width = 140;
                                $thumb_height = 85;
                                
                                $parts = explode('.', $image_data[0]);
                                $last = array_pop($parts);
                                $parts = array(implode('.', $parts), $last);
                                $imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;		                             
                            ?>                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                            <amp-img src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img>         
                            </a>
                        </div>
                        
						<?php endwhile;?>
                    </amp-carousel>
                </div>
                <?php
                endif;
                }
                $post = $orig_post_related;
                wp_reset_query();
                /*end of related stories */
                ?>
                <?php 
                /*start of latest stories */
                $orig_post = $post;
                global $post;
                $type = 'blog';
                $args=array(
                    'post_type' => $type,
                    'post_status' => 'publish',
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 20
                );
                $my_query = null;
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) : ?>
                
                <div class="single-latest-blog-post">
                    <h3>Latest Stories</h3>
                    <amp-carousel height="100" layout="fixed-height" type="carousel" autoplay controls loop arrows dots='.'>
                        <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
                       	 <div class="item">
                            <?php 
                                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                $imagename = basename($image_data[0]);
                                $thumb_width = 140;
                                $thumb_height = 85;                                
                                $parts = explode('.', $image_data[0]);
                                $last = array_pop($parts);
                                $parts = array(implode('.', $parts), $last);
								$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;	
							?>
                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                            <amp-img src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img>         
                            </a>                            
                            
                        </div>
                        <?php endwhile;?>
                    </amp-carousel>
                </div>
                <?php
                endif;
                $post = $orig_post;
                wp_reset_query();
                /*end of latest stories */
                ?>                
            </div>
        </div>	
    	

	</main>	
    <footer class="container">    
        <div class="social-footer">
          <ul class="social-icons-footer">          
             <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-fb.png" height="36" width="36" alt="Facebook"></amp-img></a></li>
              <li><a href="https://twitter.com/NevantaMedia" target="_blank"><amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-tw.png" height="36" width="36" alt="Twitter"></amp-img></a></li>
              <li><a href="https://instagram.com/nevantamedia/" target="_blank"><amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-insta.png" height="36" width="36" alt="Instagram"></amp-img></a></li>
              <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-pinterest.png" height="36" width="36" alt="Pinterest"></amp-img></a></li>      
          </ul>
        </div>
        
    	<div class="partfirst">
    	<span class="copy">©2016 Nevanta Ltd</span>    
    	<span class="terms-menu"><a href="https://www.nevanta.com/terms-and-conditions/">Terms</a> | <a href="https://www.nevanta.com/privacy-policy/">Privacy Policy</a></span>
    </div> 
     
    	<div id="footer" class="footer-menu">      	
        <?php
            wp_nav_menu( array(
                'menu' => 'footer'
            ) ); 
        ?>         
      </div>
    </footer>
       	     	
    <!--Plugin Version :0.9.31 -->
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