<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="canonical" href="<?php echo get_permalink();?>" />
	<script src="https://cdn.ampproject.org/v0.js" async></script>
    <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
	<style amp-boilerplate>
		body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>    
    	    
	<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BlogPosting","mainEntityOfPage":"http:\/\/porch.technorigins.com\/facilities\/","publisher":{"@type":"Organization","name":"Porch","logo":{"@type":"ImageObject","url":"","height":36,"width":190}},"headline":"FACILITIES","datePublished":"2014-02-03T07:46:46+00:00","dateModified":"2014-02-04T07:37:21+00:00","author":{"@type":"Person","name":"admin"},"image":{"@type":"ImageObject","url":"http:\/\/porch.technorigins.com\/wp-content\/uploads\/2014\/02\/facilities-img-1_03.png","width":537,"height":207}}</script>	    	
<title>
    <?php wp_title(); ?>
</title>                
                    
<?php include('head.php');?>
</head>
<body class="front-page">
    <header class="container">    
      <div class="banner-area">
      <?php 
       $banner_settings = get_cfc_meta( 'banner_settings' );
        $banner_img_url = wp_get_attachment_url( $banner_settings[0]['banner-image'] ); 
      ?>
      <amp-img layout="responsive" width="1080" height="610" class="bannerimg" src="<?php echo $banner_img_url; ?>"  alt="<?php echo $banner_settings[0]['banner-title']; ?>"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"></amp-img>
      <div class="banner_title"><?php echo $banner_settings[0]['banner-title']; ?></div>
      <div class="button_link"><a href="<?php echo $banner_settings[0]['button-link']; ?>" class="whitebox"><?php echo $banner_settings[0]['button-label']; ?></a></div>
      
      <div id="headerwrap">
          <div id="header">
    
            
                    <div class="logo-container"> <a href="<?php echo site_url(); ?>"><amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png"
          width="50"
          height="64"
          alt="Nevanta"></amp-img></a>
          </div>
            
          </div>
      </div>
      </div>  
    </header>

	<?php include('menu.php');?>

    <main>
        <div class="frontpage-video-section">
    
    <?php $args = array('posts_per_page' => 6, 'offset' => 0, 'category' => 2);
				$myposts = get_posts($args);
				$counter = 0;
				foreach ($myposts as $post){
					setup_postdata($post);
					$autor_id = $post->post_author;
					$autordata = get_userdata($autor_id);
					$author_role = $autordata->roles[0];
					$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
					$designer_cat_name = $designer_cat[0];
					$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
					$season_cat_name = $season_cat[0];?>
              <div>
                <div class="video-container top-video pink"> <a href="<?php the_permalink();?>">
                  <div class="frontpage-video-img">
                  <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');																												
                                $imagename = basename($image_data[0]);
                                $thumb_width = 1140;
                                $thumb_height = 631;																	
                                $parts = explode('.', $image_data[0]);
                                $last = array_pop($parts);
                                $parts = array(implode('.', $parts), $last);
                                $imagesrc = $parts[0].'.'.$last;?>
                                                    <amp-img class="img-res" layout="responsive" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>">
                    <div class="video-play-icon"></div>
                  </div>
                  <h2 class="sliding-u-l-r"><?php echo wp_trim_words( $post->post_title, 5, '' ); ?><span class="author-name">
                    <?php if($author_role == "fashion_designer"){
							echo 'by ';	
							the_author();
						}
						else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
						else if($season_cat_name == ""){ echo ''; }
						else {echo 'by '.$season_cat_name; }  ?></span></h2>                  
                  </a> </div>
              </div>
              
              <?php } ?>
           </div>       
        <div class="view-allvideos"> <a href="<?php echo site_url(); ?>/all-video/" class="viewdiv"> View All Videos &nbsp;&nbsp;&nbsp;| </a> <a href="<?php echo site_url(); ?>/latestvideo/" class="viewdiv2">&nbsp;&nbsp;View Latest Videos </a> </div>        
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