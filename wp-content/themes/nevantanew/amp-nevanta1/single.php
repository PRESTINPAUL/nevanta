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
	<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>  
<title>
    <?php wp_title(); ?>
</title>                
                     
<?php include('head.php');?>
</head>
<body class="front-page post-single-page">
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
    	<article class="amp-wp-article">  	        
        <?php while (have_posts()) : the_post();
			$single_video = get_cfc_meta( 'video_url' );
			$autor_id = $post->post_author;
			$autordata = get_userdata($autor_id);
			$author_role = $autordata->roles[0];
			$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
			$designer_cat_name = $designer_cat[0];
			$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
			$season_cat_name = $season_cat[0]; ?>
			            
            <header class="amp-wp-article-header ampforwp-title">
              <h1 class="amp-wp-title"><?php the_title(); ?></h1>
            </header>            
            <amp-video width="480" height="270" src="<?php echo $single_video[0]['mobile-video']; ?>" poster="<?php the_post_thumbnail_url('full', array('class' => 'img-res'));?>" layout="responsive" controls="controls">
                <div fallback>
                  <p>Your browser doesn't support HTML5 video.</p>
                </div>
                <source type="video/mp4" src="<?php echo $single_video[0]['mobile-video']; ?>">
                <source type="video/webm" src="<?php echo $single_video[0]['mobile-video']; ?>">
            </amp-video>                              
                   
            <div class="amp-wp-article-content">
              <div class="amp-wp-content the_content"><?php echo get_the_content(); ?></div>     
              
              <?php if(has_tag()) {?>              
              	<div class="author-tag"><?php the_tags('Tags:' , ' '); ?></div>
              <?php } ?>                                                
            </div>              
            
            <?php //$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'custom-size' ); ?>
           <!-- <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title();?>"> --> 
            
            
            <div class="amp-wp-content relatedpost">
              <div class="related_posts">
                <ol class="clearfix">
                  <h3>Related Videos</h3> 
                  <amp-carousel width="330" height="350" layout="responsive" type="slides" autoplay controls loop arrows dots='.'> 
                  <!--<amp-carousel height="100" layout="fixed-height" type="carousel" autoplay controls loop arrows dots='.'>-->
                  <?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) { setup_postdata($post); ?>
                	 <div>                        
        			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">  
                    <?php 
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$thumb_width = 330;
					$thumb_height = 283;
					$parts = explode('.', $image_data[0]);
					$last = array_pop($parts);
					$parts = array(implode('.', $parts), $last);
					$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;							
					?>                                        
                    <amp-img src="<?php echo $imagesrc;//the_post_thumbnail_url('blog-thumb-first', array('class' => 'img-res'));?>" width="330" height="283" alt="<?php the_title(); ?>"></amp-img>                  </a>                                                      
                    <?php echo "<br>";?>
                <span class="author-name">     
				<?php	
				if($author_role == "fashion_designer"){echo 'by ';	the_author_link();}
				else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
				else if($season_cat_name != ""){ echo 'by '.$season_cat_name; }
				?>
                </span>
					<a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>
                                             
                  </div>
                <?php } wp_reset_postdata(); ?>	  
                </amp-carousel>
                                                                                                       
                </ol>
              </div>
            </div>            
                
        <?php endwhile;?>          
        </article>                            
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