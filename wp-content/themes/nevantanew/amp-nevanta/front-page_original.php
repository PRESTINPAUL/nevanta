<!doctype html>
<html amp><head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="canonical" href="<?php echo array_shift(explode('?', home_url( add_query_arg( NULL, NULL ) )));?>" />   
    
	<script src="https://cdn.ampproject.org/v0.js" async></script>
	<style amp-boilerplate>
		body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>    
    	<?php 		
		$post_types = get_post_type( get_the_ID() ); 
		$modified_date =  get_the_modified_date('n-j-Y', get_the_ID());
		$publish_date = date('n-j-Y', strtotime(get_the_date()));
		
		global $post;
		$post_tmp = get_post(get_the_ID());
		$author_id = $post_tmp->post_author;
		$user_info = get_userdata($author_id);
		$author_type = implode(', ', $user_info->roles);
		$username = $user_info->user_login;
		
		$metadata = array(
			'@context' => 'http://schema.org',
			'@type' => 'BlogPosting',
			'mainEntityOfPage' => get_permalink(),
			'publisher' => array(
				'@type' => $post_types,
				'name' => 'Nevanta',
			),
			'headline' => get_the_title(),
			'datePublished' => date( 'c', $publish_date ),
			'dateModified' => date( 'c', $modified_date ),
			'author' => array(
				'@type' => $author_type,
				'name' => $username,
			),
		);?>
        
        <script type="application/ld+json"><?php echo json_encode( $metadata ); ?></script>            		
<title>
    <?php wp_title(); ?>
</title>                
                    
<?php include('head.php');?>
</head>
<body class="front-page">
    <header class="container">    
      <div class="banner-area">
      <?php 	 
 	   $pageID = get_option('page_on_front');	  
       $banner_settings = get_cfc_meta( 'banner_settings', $pageID );
	   $banner_img_url = wp_get_attachment_image_src($banner_settings[0]['banner-image'], 'blog-thumb-seventeen', true );	   	 
      ?>
      <amp-img layout="responsive" width="1080" height="610" class="bannerimg" srcset="<?php echo $banner_img_url[0]; ?>"  alt="<?php echo $banner_settings[0]['banner-title']; ?>"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"></amp-img>
      <div class="banner_title"><?php echo $banner_settings[0]['banner-title']; ?></div>
      <div class="button_link"><a href="<?php echo $banner_settings[0]['button-link']; ?>" class="whitebox"><?php echo $banner_settings[0]['button-label']; ?></a></div>
      
      <div id="headerwrap">
          <div id="header">
              <div class="logo-container"><a href="<?php echo site_url(); ?>"><amp-img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" width="43" height="54" alt="Nevanta"></amp-img></a></div>            
          </div>
      </div>
      </div>  
    </header>

	<?php include('menu.php');?>

    <main>
        <div class="frontpage-video-section">
        
        <div class="top-home-page-mobile">
        	<div class="recent-video-mo">RECENT VIDEOS</div>
            <div class="viewall-mo"><a href="<?php echo site_url(); ?>/all-video/">View All</a></div>
        </div>
    
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
	?>
              <div>
                <div class="video-container top-video pink"> 
                <a href="<?php the_permalink();?>">
                  <div class="frontpage-video-img">
                  <?php 					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-seventeen');
					$imagesrc = $image_data[0];		
					?>
                     <amp-img class="img-res" layout="responsive" src="<?php echo $imagesrc; ?>" width="1140" height="631">
                    <div class="video-play-icon"></div>
                  </div>
                  <h2 class="sliding-u-l-r"><?php echo $post->post_title; //echo wp_trim_words( $post->post_title, 5, '' ); ?></h2>                  
                  </a> </div>
              </div>
              
              <?php } ?>
           </div>                          
        
    </main>
	    
    <?php include('footer.php'); ?>