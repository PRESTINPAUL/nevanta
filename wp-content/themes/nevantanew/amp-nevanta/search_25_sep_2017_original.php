<!doctype html>
<html amp>
<head>
<meta charset="utf-8">
<link rel="dns-prefetch" href="https://cdn.ampproject.org">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="canonical" href="<?php echo array_shift(explode('&', home_url( add_query_arg( NULL, NULL ) )));?>" />
<script src="https://cdn.ampproject.org/v0.js" async></script>

<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

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
          <?php if(empty($blogusers)){ ?>
          <div class="col-md-12 error_div_people" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php  } else{   ?>
          <div class="col-md-12">
            <div class="row">
              <h2 class="tag-title">People</h2>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
          <?php   if(!empty($blogusers)){ foreach ($blogusers as $user) { ?>
          <div class="search-people-tab designerlist col-50">
          <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >          
            <?php 
			/*$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
			$parts_upload = explode('uploads', $image_data[0]);					
			$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/500/uploads'.$parts_upload[1];
			$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

			if (@getimagesize($path)) {
				$imagesrc = $path;
			}elseif(@getimagesize($nevanta_lambda)){						
				$imagesrc = $nevanta_lambda;
			}else{
				$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
				$imagesrc = $image_data[0];
			}*/
			
			$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
			$imagesrc = $image_data[0];
			?>
            <amp-img src="<?php echo $imagesrc; ?>" width="100" height="100" layout="responsive"></amp-img><br />
            <?php echo $user->display_name; ?> 
          </a> </div>
          <?php } } ?>
        </div>
      </div>
      <div id="video_search">
        <div class="row">
          <?php if(empty($video_posts)){ ?>
          <div class="col-md-12 error_div_video" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php }else{ ?>
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
				/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
				$parts_upload = explode('uploads', $image_data[0]);					
				$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/210/uploads'.$parts_upload[1];
				$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

				if(@getimagesize($path)) {
					$imagesrc = $path;
				}elseif(@getimagesize($nevanta_lambda)){						
					$imagesrc = $nevanta_lambda;
				}else{
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$imagesrc = $image_data[0];
				}*/
				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumb-second');
				$imagesrc = $image_data[0];
			?>            
            <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="206" height="206" alt="<?php the_title(); ?>"></amp-img>               
            <?php 
			$autor_id = $post->post_author;
			$autordata = get_userdata($autor_id);
			$author_role = $autordata->roles[0];
			?>
            </a>
            <?php if($author_role == "fashion_designer"){ ?>
            <div class="designerby">by <a href="<?php echo site_url(); ?>/designer/<?php echo  get_the_author_meta('user_nicename'); ?>">
              <?php the_author_link(); ?>
              </a> </div>
            <?php } ?>
            <a href="<?php echo get_permalink(); ?>">
            <p><?php echo substr($post->post_title, 0, 60).'...';//echo wp_trim_words( $post->post_title, 5, '...' ); ?></p>
            </a> </div>
          <?php   } wp_reset_postdata();$countVIDEO++; }?>
        </div>
      </div>
      <div id="Gallery_search">
        <div class="row">
          <?php if(empty($gallery_posts)){ ?>
          <div class="col-md-12 error_div_gallery" style="display:none;"> <span>Oops! No result for your search.</span> </div>
          <?php }else{ //echo "<pre>"; print_r($gallery_posts); ?>
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
            <?php //$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array(210, 126));?>			
            <a href="<?php echo get_permalink(); ?>?keyword=<?php echo $qa; ?>" class="lightbox-portfolio" >
              <div>
              <?php
				/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
				$parts_upload = explode('uploads', $image_data[0]);					
				$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/210/uploads'.$parts_upload[1];
				$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

				if (@getimagesize($path)) {
					$imagesrc = $path;
				}elseif(@getimagesize($nevanta_lambda)){						
					$imagesrc = $nevanta_lambda;
				}else{
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$imagesrc = $image_data[0];
				}*/
				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumb-second');
				$imagesrc = $image_data[0];
			  ?> 
              <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="206" height="206" alt="<?php the_title(); ?>"></amp-img> 
              <p><?php echo substr($post->post_title, 0, 60).'...';//echo wp_trim_words( $post->post_title, 7, '...' ); ?></p>
             </div>
          	</a>
          </div> 
          <?php  } wp_reset_postdata();   $countGALLERY++; } ?>       
      </div>
    </div>
    <?php } ?>
  </div>
</main>
<!-- .site-main -->

<?php include('footer.php'); ?>