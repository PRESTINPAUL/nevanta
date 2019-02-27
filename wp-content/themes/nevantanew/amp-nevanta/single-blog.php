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
                                            <amp-img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/grid.png" width="18" height="18" alt="an image"></amp-img>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>	
                                
                                	
                                <div class="blog-slider-page single-blog-post-slider">                                
                                <amp-carousel width="243" height="400" layout="responsive" type="slides" autoplay controls loop arrows>
                                    <?php 
                                    $photo_courtesy = array();
                                    foreach( get_cfc_meta( 'single_blog_gallery_new' ) as $key => $value ){								
									$photo_obj = get_cfc_field( 'single_blog_gallery_new','gallery-image', false, $key );  
									$photo_courtesy[$key]['courtesy'] = get_cfc_field( 'single_blog_gallery_new','image-courtesy', false, $key );									
									$url_blog_single = wp_get_attachment_image_src($photo_obj['id'],'blog-thumb-twentyone', true );
                                    ?>                                    
                                    <div>                                                  
                                    <amp-img src="<?php echo $url_blog_single['0']; ?>" width="243" height="391" layout="responsive"></amp-img>
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
                    $tag = get_the_terms ( $post->ID, 'post_tag' );
                    // Start the loop.
                    while (have_posts()) : the_post();
                    if (!empty($tag)) {
                ?>
                   
                    <div class="author-tag"><?php echo get_the_term_list( $post->ID, 'post_tag', 'Tags: ', ' ' ); ?></div>
                   
                <?php
                    }
                    endwhile;
                ?>
                
                
                <?php 
                /*start of related stories */
                $orig_post_related = $post;
                global $post;
                $tags_related = get_the_terms ( $post->ID, 'post_tag' );
                if ($tags_related) {
                    $tag_ids = array();
                    foreach($tags_related as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
                    $type = 'blog';
                    $args=array(
                        'post_type' => $type,
                        'post_status' => 'publish',                      
                        'tax_query' => array(
                        array(
                    'taxonomy' => 'post_tag',
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
                <div class="single-related-blog-post single-blog-post-related-stories">
                    <h3>RELATED STORIES</h3>                     
                    <!--<amp-carousel height="100" layout="fixed-height" type="carousel" autoplay controls loop arrows>-->
                    <amp-carousel height="180" layout="fixed-height" type="carousel" autoplay controls loop arrows>
                        <?php 
                        while( $my_query_related->have_posts() ): $my_query_related->the_post(); ?>                        
                        <div class="item-single-blog-post-related-stories-videos">
                            <?php 																								    
								$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyfive');
								$imagesrc = $image_data[0];                     
                            ?>                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                            <div class="related-stories-imgs-single-blog">                           
                                <amp-img src="<?php echo $imagesrc; ?>" width="188px" height="106px" alt="<?php the_title(); ?>"></amp-img>
                            </div>
                            <!--<div class="related-stories-images-title"><?php echo get_the_title(); ?></div>-->
                            </a>
                            
                            <div class="related-stories-images-title">
                            	<a href="<?php echo get_permalink(); ?>">
                                <p><?php echo get_the_title(); ?></p>
                                </a>
                            </div>
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
                
                <div class="single-latest-blog-post single-blog-post-latest-stories">
                    <h3>LATEST STORIES</h3>
                    <amp-carousel height="180" layout="fixed-height" type="carousel" autoplay controls loop arrows>
                        <?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
                       	 <div class="item-single-blog-post-latest-stories">
                            <?php 																
								$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyfive');
								$imagesrc = $image_data[0];
							?>                            
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                            <div class="latest-stories-imgs-single-blog">                            	
                            	<amp-img src="<?php echo $imagesrc; ?>" width="188px" height="106px" alt="<?php the_title(); ?>"></amp-img>                            </div>
                            <!--<div class="latest-stories-images-title"><?php echo get_the_title(); ?></div>-->
                            </a>  
                            
                            <div class="latest-stories-images-title">
                            	<a href="<?php echo get_permalink(); ?>">
                                <p><?php echo get_the_title(); ?></p>
                                </a>
                            </div>                                                      
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
      <?php include('footer.php'); ?>	  
