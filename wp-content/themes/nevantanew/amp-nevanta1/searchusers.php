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
	<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>  
<title>
    <?php wp_title(); ?>
</title>                                   
<?php include('head.php'); ?>
</head>

<?php
/*
  Template Name: searchuser
 */
if(isset($_SESSION)){
	session_destroy();
}
if (isset($_GET['a'])) {
    $qa = $_GET['a'];
} else {
    //header("location:designer1");
}
//echo ".........".$qa;
?>

<body class="front-page">
    <header class="container">    
      <div class="banner-area">      
          <div id="headerwrap">
            <div id="header">                
                <div class="logo-container">
                    <a href="<?php echo site_url(); ?>">
                    <amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png" width="50" height="64" alt="Nevanta"></amp-img></a>
                </div>            
            </div>
          </div>
      </div>  
    </header>
    <?php include('menu.php');?>
    <main>  
    
    
	<div class="container">
     	<div class="row">
        
        <div class="searchuser-by-alphabet">
        
            <?php
            $i = 65;
            $link = "//nevanta.com/designers";
            for ($i; $i <= 90; $i++) {					
                echo '<span class="search_desi"><a href="'.$link.'/searchuser?a=' . chr($i) . '">' . chr($i) . '</a></span>';
            }
            ?>
        </div>
    </div>

        <div class="row designer_sec" >    
            
                <?php
                //  $blogusers = get_users('search=' . $qa . '*&role=Fashion_designer');
                    global $wpdb;
                     $querystr = "SELECT wp_users.* FROM wp_users INNER JOIN wp_usermeta ON ( wp_users.ID = wp_usermeta.user_id ) WHERE 1=1 AND ( ( ( wp_usermeta.meta_key = 'wp_capabilities' AND CAST(wp_usermeta.meta_value AS CHAR) LIKE '%\"Fashion\\_designer\"%' ) ) ) AND (display_name LIKE '".esc_attr($qa)."%') ORDER BY user_login ASC ";
        
                     $blogusers = $wpdb->get_results($querystr, OBJECT);
                               
                foreach ($blogusers as $user) { ?>	
                    <div class="designer" >
                        <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >
                            <?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {                         
                            $image_data = get_user_meta($user->ID, 'cupp_upload_meta'); 									
                            $parts_upload = explode('uploads', $image_data[0]);
                            $thumb_width = 136;
                            $thumb_height = 145;					
                            $imagesrc = 'http://s3-eu-west-1.amazonaws.com/nevanta-test/uploads'.$parts_upload[1];                       
                            ?>                      
                            <amp-img layout="responsive" alt="username" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img> 
                            <?php }
                            else{                      
                            $image_data = get_user_meta($user->ID, 'cupp_upload_meta'); 					                                        
                            $parts_upload = explode('uploads', $image_data[0]);                       
                            $thumb_width =  136;
                            $thumb_height = 145;					
                            $imagesrc = 'http://s3-eu-west-1.amazonaws.com/nevanta-test/uploads'.$parts_upload[1];                        
                            ?>  
                            <amp-img layout="responsive" alt="username" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img>                                               
                            <?php } ?>
                            <span class="designer-name"><?php echo $user->display_name; ?></span>
                        </a>
                    </div>
        
                    <?php } if (empty($blogusers)) { ?>        
                  		<section class="no-results not-found">            
                            <div class="container">
                                <div class="col-md-12">                           
                                    <div class="page-content serachuser-text">
                                        <h2>Looks like we don't have any designers in <?php echo $qa;?></h2>
                                    </div>                        
                                </div>
                            </div>
                        </section>
        			<?php } ?>
            </div>            
       
   </div>   

<div class="container">
 <div class="con_right">
        <?php
		if ($total_posts > $total_query) {
            
           $current_page = max(1, get_query_var('paged'));
			echo paginate_links(array(
               'base' => get_pagenum_link(1) . '%_%',
               'format' => 'page/%#%/',
               'current' => $current_page,
               'total' => $total_pages,
               'prev_next' => true,
			   'prev_text' => __('Previous '),
				'next_text' => __(' Next'),
			   'before_page_number' => ' | '
			));
 }
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
