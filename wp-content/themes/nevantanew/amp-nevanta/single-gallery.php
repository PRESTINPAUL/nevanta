<!doctype html>
<html amp>
<head>
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
        
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>    
	<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>  
<title>
    <?php wp_title(); ?>
</title>                
                     
<?php include('head.php'); ?>
</head>
<body class="front-page post-single-gallery-page">
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
	if (isset($_GET['keyword'])) {
		$qa = $_GET['keyword'];	
	} 
	?> 
    	<?php if($qa){?>
        	<?php
				//$gallery_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '29' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC"); 
				$curr_id = get_the_ID();			
				$args=array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'post_status' => 'publish',	
					's' => $qa,					
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'slug',
							'terms'    => 'gallery'
						),
					),
				);		
				//$my_query = new wp_query( $args );	 
				$my_query = get_posts( $args );
				$cnt = 0;
				$total_posts = count($my_query);
				//while ( $my_query->have_posts()) :  $my_query->the_post();
				//echo "<pre>";print_r($my_query);
				foreach($my_query as $post) : setup_postdata($post);
				if($curr_id == get_the_ID()){
				$pre_id = $my_query[$cnt-1]->ID;
				$next_id = $my_query[$cnt+1]->ID;
?>					
          
        	<article class="amp-wp-article">   
                 
            <ul class="single-gallery-nav-posts">                                      
               <?php if($cnt != 0) {?> <li class="single-gallery-next-link">« <a href="<?php echo get_permalink($pre_id);?>?keyword=<?php echo $qa;?>" rel="Previous">Previous</a></li><?php } ?>
               
              <?php if($cnt != ($total_posts-1)) {?><li class="single-gallery-prev-link"><a href="<?php echo get_permalink($next_id);?>?keyword=<?php echo $qa;?>" rel="Next">Next</a> » </li><?php } ?>
            </ul>             
           		<?php
					/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$parts_upload = explode('uploads', $image_data[0]);					
					$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/380/uploads'.$parts_upload[1];
					$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

					if (@getimagesize($path)) {
						$imagesrc = $path;
					}elseif(@getimagesize($nevanta_lambda)){						
						$imagesrc = $nevanta_lambda;
					}else{
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$imagesrc = $image_data[0];
					}*/
					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyone');
					$imagesrc = $image_data[0];
				?>
                                                  
                <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="308" height="495" alt="<?php the_title(); ?>"></amp-img>
                <header class="amp-wp-article-header ampforwp-title">
                  <h1 class="amp-wp-title"><?php the_title();?></h1>
                </header>                                          
            </article>         <?php } $cnt++; endforeach;wp_reset_query();?>
        
        <?php } else{ ?>
        
    	<article class="amp-wp-article">        
        <ul class="single-gallery-nav-posts">
            <!--<li class="single-gallery-prev-link"><?php previous_post_link('&laquo; %link', '%title', TRUE, ' ', 'category');?></li>
            <li class="single-gallery-next-link"><?php next_post_link( '%link &raquo;', '%title', TRUE, ' ', 'category' ); ?></li>-->                        
            <li class="single-gallery-next-link"><?php next_post_link( '&laquo; %link', 'Previous', TRUE); ?></li>
            <li class="single-gallery-prev-link"><?php previous_post_link('%link &raquo; ', 'Next', TRUE);?></li>
        </ul>             
		<?php while (have_posts()) : the_post();
		
		/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		$parts_upload = explode('uploads', $image_data[0]);					
		$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/380/uploads'.$parts_upload[1];
		$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

		if (@getimagesize($path)) {
			$imagesrc = $path;
		}elseif(@getimagesize($nevanta_lambda)){						
			$imagesrc = $nevanta_lambda;
		}else{
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
			$imagesrc = $image_data[0];
		}*/
		
		$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyone');
		$imagesrc = $image_data[0];
		?>        
            <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="308" height="495" alt="<?php the_title(); ?>"></amp-img>
            <header class="amp-wp-article-header ampforwp-title">
              <h1 class="amp-wp-title"><?php the_title();//echo wp_trim_words( get_the_content(), 10, NULL );?></h1>
            </header>                                        
        <?php endwhile;?>                                                
        </article>   
                
        <?php } ?>
        
    </main>
	    
      <?php include('footer.php'); ?>