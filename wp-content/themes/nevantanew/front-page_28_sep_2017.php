<?php
/*
  Template Name: Homepage
 */
 
if(isset($_SESSION)){
	session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<title>Nevanta - Fashion Videos, Indian Designers, Celebrity Style & More</title>-->
<meta name="description" content="Watch the latest runway shows from top Indian designers. Stay updated on fashion weeks and latest trends from Bollywood and celebrity red carpet styles.">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="google-site-verification" content="z4ukSHN0CvjMdVgpDAocdSbdtYQuMDZSXOkXEejhNIk" />
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/magnific-popup.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-elements.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-animate.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mediaelementplayer.min.css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/css/settings.min.css" media="screen">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/custom.min.css"> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/modernizr/modernizr.min.js"></script>
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28889163-1', 'auto');
  ga('send', 'pageview');

</script>
<meta name="msvalidate.01" content="8770903BF8489A60B339BA34D13C863B" /> 

<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='//rec.getsmartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '5175bff35c3eb936f90803565599524b6474f0d6');
</script>
</head>
<?php require_once("vt_resize.php"); 	
	if (MobileDTS::is('ios')) {
		$minheight = '';
	} else if (MobileDTS::is('mobile') || MobileDTS::is('android')) {						
		$minheight = '';
	} else {
		$minheight = 720;   
	}
?>
<body>
<div class="body home">
<div role="main" class="main"> 
<!-- Main Logo  -->
<div class="tp-caption hidden-sm hidden-xs"
   data-x="-70" data-hoffset="0"
   data-y="-70"
   data-start=""
   style="z-index: 6;"
   data-transform_in="">
   <a href="<?php bloginfo('home'); ?>"><img class="logo-slider img-res" src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt=""></a>
</div> 

<div class="tp-caption hidden-lg hidden-md"
   data-x="-70" data-hoffset="0"
   data-y="-70"
   data-start=""
   style="z-index: 6"
   data-transform_in="">
   <a href="<?php bloginfo('home'); ?>"><img class="logo-slider img-res" src="<?php bloginfo('template_directory'); ?>/img/logo.svg" alt=""></a>
</div>
  <div class="slider-container light rev_slider_wrapper" >
    <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 500, "gridheight": 500, "minHeight": <?php echo $minheight; ?>}'>
    
    
    <!--<div class="col-md-4 newsletter">
      <div class="border-div">
            <span class="news"> Follow us on:</span>
            <ul class="social-icons-footer">
              <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ifb.svg" class="ifb img-responsive"></a></li>
              <li><a href="https://twitter.com/NevantaMedia" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" class="twitter img-responsive"></a></li>
              <li><a href="https://instagram.com/nevantamedia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" class="instagram img-responsive"></a></li>
              <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.svg" class="pinterest img-responsive"></a></li>
            </ul>
      </div>
    </div>-->
   
      <ul>
        <?php
							
						foreach( get_cfc_meta( 'background_video' ) as $background_vid ){ 						
						
						$background_vid_url = $background_vid['background-video-url']; 
						
						?>
        <li data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-description="" class="tp-revslider-slidesli rs-pause-timer-always">
          <div class="rs-background-video-layer"  
                                     data-videomp4="<?php echo $background_vid_url; ?>" 
                                    	data-x="0" 
                                            data-y="0"
                                            data-autoplay="true"
                                            data-autoplayonlyfirsttime="false"
                                            data-nextslideatend="true"
                                            data-forceCover="1"
                                            data-dottedoverlay="twoxtwo"
                                            data-aspectratio="16:9"
                                            style="z-index: 2"></div>
        
           
          
        </li>
        <?php } 
		//}?>
      </ul>
      
      <div class="top-head">            
                           
            <div class="header-search hidden-xs">
            
            <div class="newsletter"> 
            <span class="news"> Follow us on:</span>
            <ul class="social-icons-footer">
            <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/ifb.svg" class="ifb"></a></li>
            <li><a href="https://twitter.com/NevantaMedia" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" class="twitter"></a></li>
            <li><a href="https://instagram.com/nevantamedia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" class="instagram"></a></li>
            <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.svg" class="pinterest"></a></li>
            </ul>
            </div>
                                   
            <form class="search" action="<?php echo get_home_url('','','https'); ?>" method="get">
            <input name="s" type="text" class="searchbox1" placeholder="Search..." required autocomplete="off">
            <input type="image" src="<?php bloginfo('template_directory'); ?>/img/icon-search.png" alt="Submit" width="23" height="23" name='submit' class='enableOnInput submitBtn'/>
            <a class="close" style="display:none;"> <img class="img-responsive close-icon" src="<?php bloginfo('template_directory'); ?>/img/icon-close.png" /> </a>
            </form>
            </div>                
        </div>
      
    </div>
  </div>
  
  <nav class="navbar navbar-default navbar-home" style="margin-bottom:40px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="navbar-header">           
          </div>
          <div class="collapse navbar-collapse header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <?php navigationmenu("Homemenu"); ?>             
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
 <div class="container home-middle-section">
    <div class="row"> 
    <div class="col-md-12 middle-top-row">
    	<div class="view-allrecentvideos">RECENT VIDEOS</div>        
        <div class="view-alllatestvideos">
            <a href="<?php echo site_url(); ?>/all-video/" class="viewdiv">View All Videos</a>
        </div>
    </div>    
    
    <div class="col-md-12 nopad-left-right">
      <?php
		$args = array(
			'posts_per_page' => 16,
			'offset' => 0,
			'category' => 2
		);
		$myposts = get_posts($args);

		foreach($myposts as $post)
			{
			setup_postdata($post);
			$autor_id = $post->post_author;
			$autordata = get_userdata($autor_id);
			$author_role = $autordata->roles[0];
			$designer_cat = wp_get_post_terms($post->ID, 'designer', array(
				"fields" => "names"
			));
			$designer_cat_name = $designer_cat[0];
			$season_cat = wp_get_post_terms($post->ID, 'season', array(
				"fields" => "names"
			));
			$season_cat_name = $season_cat[0]; 
	  ?>
      
      <div class="col-md-3">
        <div class="frontpage-video-section">
          <div>
            <div class="video-container-home">
            <a href="<?php the_permalink(); ?>">
              
              <div class="frontpage-video-img">
                <?php  $image_data[0] = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'blog-thumb-twentythree');?>
                <img class="img-res" src="<?php echo $image_data[0][0]; ?>" width="272" height="153" />
                <div class="video-play-btn">
                	<img src="<?php echo get_template_directory_uri(); ?>/img/play.svg" class="play">                  
                </div>
             </div>
              
              <div class="title-post"><?php echo $post->post_title; ?></div>                            
              </a></div>
          </div>
        </div>
      </div>
      <?php } wp_reset_postdata(); ?>  
      
    </div>  
    </div>
  </div>
  
  <?php /*?>
  <div class="container home-middle-section" style="margin-top:80px;">
    <div class="row">
      <?php	
		$args = array('posts_per_page' => 6, 'offset' => 0, 'category' => 2);
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
			$season_cat_name = $season_cat[0];
		
		if($counter == 0){
		?>
      <div class="col-md-12">
        <div class="frontpage-video-section">
          <div >
            <div class="video-container top-video pink"> <a href="<?php the_permalink(); ?>">
              <div class="frontpage-video-img">
                <?php 					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eleven');
					$imagesrc = $image_data[0];										
				 ?>              
                <img class="img-res" src="<?php echo $imagesrc; ?>" width="1140" height="631" />
                <div class="video-play-icon"></div>
              </div>
              <h2 class="sliding-u-l-r"><?php echo wp_trim_words( $post->post_title, 5, '' ); ?><span class="author-name " style="text-align:left;" >
                <?php if($author_role == "fashion_designer"){
							echo 'by ';	
							the_author();
						}
						else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
						else if($season_cat_name == ""){ echo ''; }
						else {echo 'by '.$season_cat_name; }  ?>
                </span></h2>           
              <?php $videoviews = get_post_meta( get_the_ID(), 'wpb_post_views_count', true ); ?>
              <h3 class="views-home"> <?php echo $videoviews; ?> Views</h3>
              </a> </div>
          </div>
        </div>
      </div>
      <?php
		}
		if($counter == 1){ ?>
      <div class="col-lg-7 col-sm-6 video-section-left">
        <?php }
		if($counter == 1 || $counter == 2){ ?>
        <div class="video-container pink" > <a href="<?php the_permalink(); ?>">
          <?php 
			if (MobileDTS::is('ipad') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
				echo the_post_thumbnail( 'full', array( 'class' => 'img-res video-left-poster' ) );
			}
			else{				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-sixteen');
				$imagesrc = $image_data[0];
			?>          
          <img class="img-res" src="<?php echo $imagesrc; ?>" width="682" height="396" />
          <?php } ?>
          <div class="video-play-icon-small"></div>
          <h2 class="sliding-u-l-r video-title"><?php echo substr( $post->post_title, 0, 50); ?><span class="author-name">
            <?php if($author_role == "fashion_designer"){
					echo 'by ';	
					the_author();
				}
				else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
				else if($season_cat_name == ""){ echo ''; }
				else {echo 'by '.$season_cat_name; }  ?>
            </span></h2>         
          <?php $views = get_post_meta( get_the_ID(), 'wpb_post_views_count', true ); ?>
          <h3 class="views-home">
            <?php  echo  $views;?>
            Views</h3>
          </a> </div>
        <?php } if($counter == 2){ ?>
      </div>
      <?php	}if($counter == 3){ ?>
      <div class="col-lg-5 col-sm-6 video-section-right">
        <?php }if($counter == 3 || $counter == 4 || $counter == 5){ ?>
        <div class="video-container pink"> <a href="<?php the_permalink(); ?>">
			<?php 						
			 $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-seventeen');
             $imagesrc = $image_data[0];
             ?>         
          <img class="img-res" src="<?php echo $imagesrc; ?>" width="456" height="253" />
          <div class="video-play-icon-small"></div>
          <h2 class="sliding-u-l-r video-title"><?php echo substr( $post->post_title, 0, 50); ?><span class="author-name">
            <?php if($author_role == "fashion_designer"){
					echo 'by ';	
					the_author();
				}
				else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
				else if($season_cat_name == ""){ echo ''; }
				else {echo 'by '.$season_cat_name; }  ?>
            </span></h2>          
          <?php $views = get_post_meta( get_the_ID(), 'wpb_post_views_count', true ); ?>
          <h3 class="views-home">
            <?php  echo  $views;?>
            Views</h3>
          </a> </div>
        <?php }if($counter == 5){ ?>
      </div>
		<?php	}		
            $counter++;
            }
            wp_reset_postdata();
            
        ?>
      </br>
      <div style="clear:both;"></div>
      <div class="col-lg-12">
        <div class="view-allvideos"> <a href="<?php echo site_url(); ?>/all-video/" class="viewdiv"> View All Videos &nbsp;&nbsp;&nbsp;| </a> <a href="<?php echo site_url(); ?>/latestvideo/" class="viewdiv2">&nbsp;&nbsp;View Latest Videos </a> </div>
      </div>
    </div>
  </div><?php */?>
  
  
  
  <footer id="footer" style="background:white;">
    <div style="background:white;">
      <div class="sub-footer">
        <div class="container">          
          <div class="row" >  
          
                  
                <div class="col-md-4 col-sm-12 facebook_likebox" >
                  <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <div class="fb-page" data-href="https://www.facebook.com/NevantaMedia/" data-tabs="timeline" data-width="400px" data-height="390" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/NevantaMedia/"><a href="https://www.facebook.com/NevantaMedia/">Nevanta</a></blockquote></div></div>            
                </div>
                
                
                <div class="col-md-4 col-sm-12 twitter_box" > <a class="twitter-timeline" href="https://twitter.com/NevantaMedia" data-widget-id="698049058078732289" width="400" height="389">Tweets by @NevantaMedia</a> 
                  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
                </div>
                
                
                <div class="col-md-4 co-sm-12 instagram_feed"><?php echo do_shortcode('[instagram-feed]'); ?></div>
           
           
          </div>
          <!-- END .row--> 
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 copyright footer-menu">
            <!--<ul class="social-icons-footer">
              <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><div class="icon-fb" height="54" width="54" alt="Facebook"></div></a></li>
              <li><a href="https://twitter.com/NevantaMedia" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png" height="54" width="54" alt="Twitter"></a></li>
              <li><a href="https://instagram.com/nevantamedia/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-insta.png" height="54" width="54" alt="Instagram"></a></li>
              <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png" height="54" width="54" alt="Pinterest"></a></li>
            </ul>-->
            	               
                    <ul>
                      <?php navigationmenufooter("Homemenu"); ?>
                    </ul>
                  
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 copyright">
            <div class="copy col-md-7 col-xs-6">©2016 Nevanta Ltd</div>
            <div class="terms-menu col-md-5 col-xs-6"><a href="<?php echo esc_url( get_permalink('32439') ); ?>">Terms</a> | <a href="<?php echo esc_url( get_permalink('32437') ); ?>">Privacy Policy</a></div>
          </div>
        </div>        
      </div>
    </div>
  </footer>
</div>
</div>
<!-- Vendor --> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery/jquery.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.appear/jquery.appear.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easing/jquery.easing.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery-cookie/jquery-cookie.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/common/common.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.validation/jquery.validation.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.stellar/jquery.stellar.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.gmap/jquery.gmap.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.lazyload/jquery.lazyload.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/isotope/jquery.isotope.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/owl.carousel.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/vide/vide.min.js"></script> 

<!-- Theme Base, Components and Settings --> 
<script src="<?php bloginfo('template_directory'); ?>/js/theme.min.js"></script> 

<!-- Current Page Vendor and Views --> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/js/views/view.home.js"></script> 

<!-- Theme Custom --> 
<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script> 

<!-- Theme Initialization Files --> 
<script src="<?php bloginfo('template_directory'); ?>/js/theme.init.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/vendor/videoplayer/mediaelement-and-player.min.js"></script> 
<script>
		jQuery('audio,video').mediaelementplayer({
			success: function(player, node) {
				jQuery('#' + node.id + '-mode').html('mode: ' + player.pluginType);
			}
		});
		// Sticky Header Home Page
		// Create a clone of the menu, right next to original.
		jQuery('.navbar-home').addClass('original').clone().insertAfter('.navbar-home').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

		scrollIntervalID = setInterval(stickIt, 10);


		function stickIt() {

		  var orgElementPos = jQuery('.original').offset();
		  orgElementTop = orgElementPos.top;               

		  if (jQuery(window).scrollTop() >= (orgElementTop)) {
			// scrolled past the original position; now only show the cloned, sticky element.

			// Cloned element should always have same left position and width as original element.     
			orgElement = jQuery('.original');
			coordsOrgElement = orgElement.offset();
			leftOrgElement = coordsOrgElement.left;  
			widthOrgElement = orgElement.css('width');
			jQuery('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
			jQuery('.original').css('visibility','hidden');
		  } else {
			// not scrolled past the menu; only show the original menu.
			jQuery('.cloned').hide();
			jQuery('.original').css('visibility','visible');
		  }
		}
		// End of Sticky Header Home Page
</script> 
<?php wp_footer(); ?>
</body>
</html>
