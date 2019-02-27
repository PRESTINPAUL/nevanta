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


<body class="front-page">
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
    
		<?php
/* Template Name: Blog */
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

<div class="blog_slider">
<amp-carousel width="500" height="500" layout="responsive" type="slides" autoplay controls loop arrows dots='.'>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<?php					
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			$imagename = basename($image_data[0]);			
			$parts = explode('.', $image_data[0]);
			$last = array_pop($parts);
			$parts = array(implode('.', $parts), $last);
			$thumb_width = 350;
			$thumb_height = 526;
			$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;									
		?>
        <div>              
        <amp-img src="<?php echo $imagesrc; ?>" width="500" height="600" layout="responsive"></amp-img>
        <a class="blog-post-title" href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 3, '' ); ?></a>
        </div>
<?php endwhile; ?>

</amp-carousel> 
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
if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
	$posts_per_page = 8;
}
else{
	$posts_per_page = 7;
}
$args=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'caller_get_posts' => 1,
	'paged'=>$paged,
	'post__not_in'=> $featured_ids,					
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
					if( $my_query->have_posts() ) :
					$i = 1;
					while ($my_query->have_posts()) : $my_query->the_post(); 
					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$imagename = basename($image_data[0]);
					if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
						$thumb_width = 330;
						$thumb_height = 283;
					}
					else{
						if( $i == 1 || $i == 2 || $i == 6 || $i == 7 ){
							$thumb_width = 200;
							$thumb_height = 200;
						}
						else if( $i == 3 || $i == 5 ){
							$thumb_width = 372;
							$thumb_height = 209;
						}
						else{
							$thumb_width = 374;
							$thumb_height = 374;
						}
					}															
					$parts = explode('.', $image_data[0]);
					$last = array_pop($parts);
					$parts = array(implode('.', $parts), $last);
					$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;					
										
					if( $i == 1 || $i == 2 ){ ?>
					<?php if( $i == 1 ){ ?><div class="first-row"><?php } ?>
						<div class="single-blog-list">
							<div class="blog-image">
								<a href="<?php the_permalink(); ?>">											
                                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img> 
								</a>
							</div>
							<div class="col-md-7 blog-content">
            <a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php 
            if (strlen($post->post_title) > 72) {
			echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } else {
			the_title();
			}?></h2></a>								
			<p class="blog-excerpt"><?php 
			$excerpt = get_the_excerpt();
			if(strlen($excerpt) > 75){
			$excerpt = substr($excerpt, 0, 75); echo $excerpt.'...';}
			else{ echo $excerpt;}
			
			?> </p><span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php if( ($i == 2) || ($my_query->post_count == $i) ){ ?></div><!--first-row--><?php } ?>
					<?php } elseif( $i == 3 || $i == 4 || $i == 5 ){ ?>
					<?php if( $i == 3 ){ ?><div class="second-row"><?php } ?>
						<?php 
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
							else{ ?>
						<div class="single-blog-list">
							<div class="blog-image">
						<?php } 	?>
								<a href="<?php the_permalink(); ?>">									
                                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img> 
								</a>
							</div>
							<?php
							if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {								
							if($i == 3){ ?><div class="col-md-12 col-sm-6 col-xs-6 blog-content">
							<?php }	else{ ?><div class="col-md-12 blog-content">
							<?php }}else{ ?><div class="col-md-12 blog-content">
							<?php } ?>						
								<a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php //the_title();
								if (strlen($post->post_title) > 72) {
									echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } 
								else { the_title(); }
								 ?></h2></a>
								<?php if (!(MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android'))) {																																					
									if( $i == 3 || $i == 5 ){ ?>									
                                    <p class="blog-excerpt">
                                    <?php
                                    $excerpt = get_the_excerpt();
									if(strlen($excerpt) > 75){
									$excerpt = substr($excerpt, 0, 75);
									echo $excerpt.'...';
									}else { echo $excerpt;}
									?>
									</p>
                                <?php } } else{ ?>								
                                    <p class="blog-excerpt">
                                        <?php
                                        $excerpt = get_the_excerpt();
                                        if(strlen($excerpt) > 75){
                                        $excerpt = substr($excerpt, 0, 75);
                                        echo $excerpt.'...';
                                        }
                                        else
                                        {
                                            echo $excerpt;
                                        }
                                        ?>
                                    </p>
								<?php } ?>
								<span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>
					<?php if( ($i == 5) || ($my_query->post_count == $i) ){ ?></div><?php } ?>
					<?php }elseif( $i == 6 || $i == 7 || $i == 8 ){ ?>
					<?php if( $i == 6 ){ ?><div class="third-row"><?php } ?>
					<?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {if($i == 6){ ?>
                    <div class="single-blog-list">
                        <div class="blog-image">
                <?php }
                    else{																		
                        
                         ?>
                        <div class="single-blog-list">
                            <div class="blog-image">
                <?php }
                }
                else{ ?>
            <div class="single-blog-list">
                <div class="blog-image">
                <?php } ?>                                                        
                    <a href="<?php the_permalink(); ?>">                        			
                        <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php the_title(); ?>"></amp-img> 
                    </a>
                </div>
                <?php
                if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {																						                    if($i == 6){ ?>
                        <div class="blog-content">
                <?php }
                    else{ ?>
                        <div class="blog-content">
                <?php }
                }
                else{ ?>
                <div class="blog-content">
                <?php } ?>
                    <a href="<?php the_permalink(); ?>"><h2 class="blog-title"><?php //the_title();
                    if (strlen($post->post_title) > 72) {
echo substr(the_title($before = '', $after = '', FALSE), 0, 72) . '...'; } else {
the_title();
}
                     ?></h2></a>								
                    <p class="blog-excerpt">
                        <?php
                        $excerpt = get_the_excerpt();
                        if(strlen($excerpt) > 75){
                        $excerpt = substr($excerpt, 0, 75);
                        echo $excerpt.'...';
                        }
                        else
                        {
                            echo $excerpt;
                        }
                        ?>
                        </p>
                    <span class="blog-author">by <?php the_author(); ?></span>
                </div>
            </div>
        <?php 
            if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {																																			
                
                if( ($i == 8) || ($my_query->post_count == $i) ){ ?></div><?php } 
            }
            else{
                if( ($i == 7) || ($my_query->post_count == $i) ){ ?></div><?php }
            }
        } ?>
        <?php $i++;
        endwhile; ?>                   
        <div class="blog-post-pagination">
            <?php if($paged != 1){ 
                if($paged == $my_query->max_num_pages){
                    previous_posts_link( '<div class="blog-post-newer"><h4>Newer Posts</h4></div>' );
                }else{
                    previous_posts_link( '<div class="intermediate-pages"><div class="col-md-5 col-xs-5 blog-post-newer intermediate-pages-newer"><h4>Newer Posts</h4></div>' );
                }
            } 
            if($paged != $my_query->max_num_pages){
                if($paged == 1){
                    next_posts_link( '<div class="blog-post-older"><h4>Older Posts</h4></div>', $my_query->max_num_pages );
                }else{
                    next_posts_link( '<div class="blog-post-older intermediate-pages-older"><h4>Older Posts</h4></div></div>', $my_query->max_num_pages );
                }
            } ?>
        </div>
    <?php endif; ?>
  
    </div><!--blogs-lists-->
    
</div>
</main>
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
    
   	<script type="application/javascript" async src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">             
		jQuery('#designer_user').on('change', function() {
		  jQuery("#main_cat_order").val("");
		})    				
		
		jQuery('#main_cat_order').on('change', function() {
		  jQuery("#designer_user").val("");
		})   
		
		jQuery('.fashion-dropdwon').selectric({ disableOnMobile: false,});                
		
		var $selectValue = jQuery('#select_value').find('strong');            
		
		$selectValue.text(jQuery('#get_value').val());
						  
		jQuery('#get_value').selectric().on('change', function() {
			$selectValue.text(jQuery(this).val());
		});
	</script>     	
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