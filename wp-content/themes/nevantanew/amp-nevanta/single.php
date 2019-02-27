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
                    <a href="<?php echo site_url(); ?>"><amp-img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" width="43" height="54" alt="Nevanta"></amp-img></a>
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
			$season_cat_name = $season_cat[0]; 						
			
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentytwo');
			$imagesrc = $image_data[0];
			?>
			<div class="top-margin"></div>
            <amp-video width="640" height="360" src="<?php echo $single_video[0]['mobile-video']; ?>" poster="<?php echo $imagesrc; ?>" layout="responsive" controls="controls">           
                <div fallback>
                  <p>Your browser doesn't support HTML5 video.</p>
                </div>
                <source type="video/mp4" src="<?php echo $single_video[0]['mobile-video']; ?>">
                <source type="video/webm" src="<?php echo $single_video[0]['mobile-video']; ?>">
            </amp-video> 
            
            <header class="amp-wp-article-header ampforwp-title">
              <h1 class="amp-wp-title"><?php the_title(); ?></h1>
            </header> 
            
            <div class="date-share">                           
                <div class="post-single-page-date">
                    <?php echo get_the_date(get_option('date_format')); ?>
                </div>
                <div class="post-single-page-social-share">
                    <span class="single-share">Share this on &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" >                            
                            <amp-img class="inner-page-fb" src="<?php bloginfo('template_directory'); ?>/img/fb.svg" width="21px" height="21px" ></amp-img>
                        </a>
                        
                        <a target="_blank"  href="https://twitter.com/share" data-size="large"  data-url="https://dev.twitter.com/web/tweet-button">                            <amp-img class="inner-page-tw" src="<?php bloginfo('template_directory'); ?>/img/twitter1.svg" width="21px" height="21px" ></amp-img>
                        </a>					
            
                        <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=nevanta&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" >                            
                            <amp-img class="inner-page-pinterest" src="<?php bloginfo('template_directory'); ?>/img/pinterest1.svg" width="21px" height="21px" ></amp-img>
                        </a>
                </div>                 
            </div>                        
                   
            <div class="amp-wp-article-content">            	
                                                	
              <div class="amp-wp-content the_content"><?php echo get_the_content(); ?></div>     
              
              
             <?php if ($author_role == "fashion_designer"): ?> 
                <div class="fashion-designer-single-page">                   
                        <div class="designer-title-single-page">Featured Designer</div>                                                
                        <div class="designer-detailes-single-page">
                            <div class="authr-img-single-page">
                                <?php 																		
                                    $image_data = get_user_meta(get_the_author_ID(), 'cupp_upload_meta');
                                    $imagesrc = $image_data[0];
                                ?>
                                <amp-img alt="Author name" class="img-res" src="<?php echo $imagesrc; ?>" width="141" height="141"></amp-img>
                            </div>
                            <div class="authr-desc-single-page">                            
                                <div class="author-title-single-page">
                                    <a href="<?php echo site_url() ?>/designer/<?php getAUTHORurl(get_the_author_ID()); ?>">
                                        <?php 
                                        if($author_role == "fashion_designer"){	the_author(); }
                                        else if($designer_cat_name != ""){ echo $designer_cat_name; }
                                        else if($season_cat_name == ""){ echo ''; }
                                        else {echo $season_cat_name; }?>
                                    </a>
                                </div>                                
                                <div class="author-role-single-page"><?php getAUTHORrole(get_the_author_ID()); ?></div>                                
                                                               
                                	<div class="authordesc-single">
                                            <div class="newauthor more-designer">
                                             <div>
                                              <input type="checkbox" class="read-more-state-single" id="post-3" />                            
                                              <span class="read-more-wrap-single">
                                                <span>
                                                <?php 
													$string = explode (' ', get_the_author_meta( "description", get_the_author_ID()), 18);																																																		
													echo wp_trim_words(get_the_author_meta( "description", get_the_author_ID()), 17, '' );										
												?>                                                   
                                                </span>  
                                                <span class="read-more-target-single">
                                                    <?php $string = $string[17]; print_r($string);?>
                                                </span>    
                                              </span>                         
                                              <label for="post-3" class="read-more-trigger-single"></label>
                                            </div>                           
                                        </div>    
                                    </div>                              
                                
                            </div>
                        </div>                    
                </div>                                                              
            <?php endif ?>
              
              
              
              
              
              <?php $tag = get_the_tags(); if(has_tag()) {?>              
              	<div class="author-tag"><?php the_tags('Tags:   ' , ' '); ?></div>
              <?php } ?>                                                
            </div>                                  
             <?php
			 $orig_post = $post;
			 global $post;
			 $tags = wp_get_post_tags($post->ID);
			 if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			$args=array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=>20,
			'caller_get_posts'=>1,
			'cat' => 15
			);
		
			$my_query = new wp_query( $args );
			if($my_query->have_posts()){
				
			 ?>           
            <div class="amp-wp-content relatedpost arrowsetting-single-page">
              <div class="related_posts">
                <ol class="clearfix">
                  <h3>Related Videos</h3>                   
                  <amp-carousel height="260px" layout="fixed-height" type="carousel" autoplay controls loop arrows>
                  <?php 				  				
				
				$tags = wp_get_post_tags($post->ID);
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
								
              $related = get_posts(array('post_status' => 'publish','cat' => 15,'caller_get_posts'=>1,'tag__in' => $tag_ids, 'numberposts' => 20, 'post__not_in' => array($post->ID) ) );
                if( $related ) foreach( $related as $post ) { setup_postdata($post); 
				$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
				$designer_cat_name = $designer_cat[0];
				$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
				$season_cat_name = $season_cat[0];
									
				$autor_id = $post->post_author;
				$autordata = get_userdata($autor_id);
				$author_role = $autordata->roles[0];?>
                	 <div>                        
        			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">  
                    <?php																									
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-second');
					$imagesrc = $image_data[0];			
					?>                                        
                    <amp-img src="<?php echo $imagesrc; ?>" width="180px" height="180px" alt="<?php the_title(); ?>"></amp-img>                                  
                    <span class="author-title-single"><?php echo wp_trim_words( get_the_title(), 12, '...' ); ?><span></a>
                  </div>
                <?php } wp_reset_postdata(); ?>	  
                </amp-carousel>                                                                                                       
                </ol>
              </div>
            </div>            
                
        <?php } } endwhile;?>          
        </article>                            
    </main>
    
    <script async custom-element="amp-facebook-comments" src="https://cdn.ampproject.org/v0/amp-facebook-comments-0.1.js"></script>
    <amp-facebook-comments width=486 height=657
    layout="responsive"
    data-numposts="5"
    data-href="<?php echo the_permalink();?>">
</amp-facebook-comments>
	    
       <?php include('footer.php'); ?>