<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="canonical" href="<?php echo array_shift(explode('?', home_url( add_query_arg( NULL, NULL ) )));//get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );?>" />
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

<?php
if (isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
else :
    $curauth = get_userdata(intval($author));
    if ($author == 1) {
        //wp_redirect( home_url() ); exit;
        $author = 0;
    }
endif;
$abc = get_the_author_meta($curauth->data->ID);
?>

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
    
    

<?php if (!user_can(get_the_author_meta('ID'), 'administrator')): ?> 
    <div class="container">
        <div class="row">
            <div class="authordesign single-author">
                <div class="author-profile-pic">                                 
					<?php														
						$image_data = get_user_meta($curauth->ID, 'cupp_upload_meta');
						$imagesrc = $image_data[0];																
					?>					                 
                    <amp-img layout="responsive" class="author-page-banr" src="<?php echo $imagesrc; ?>" width="223" height="223" alt="username"></amp-img>
                </div>
                <div class="single-author-desc">                	                    
                    <div class="row">
                        <div class="author pro-author-name"><?php echo $curauth->display_name; ?> </div>
                        <?php $all_meta_for_user = get_user_meta( $curauth->id );?>
                    </div>                                      
                    <div class="authordesc">                    		
							<div class="newauthor <?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) { ?> more-designer <?php } ?>">                                                        
                             <div>                           
                              <input type="checkbox" class="read-more-state" id="post-2" />                            
                              <span class="read-more-wrap">
                                <span>
									<?php 
										$string = explode (' ', $curauth->user_description, 24);																																																		
										echo wp_trim_words( $curauth->user_description, 23, '' );										
									?>
                                </span>  
                                   
                                <span class="read-more-target">
                                	<?php $string = $string[23]; print_r($string);?>
                                </span>    
                                
                              </span> 
                                                           
                              <label for="post-2" class="read-more-trigger"></label>
                            </div>                           
                            
                        </div>    
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
	    
    <div class="container author-page">
	
        <?php if (have_posts()) : ?>
            <div class="author1">Videos of <?php echo $curauth->display_name; ?></div>
            <div class="row author-page-mobile-videos">
            <!--<amp-carousel class="videosofauthor" width="400" height="400" layout="responsive" type="slides" autoplay controls loop arrows dots='.'>-->            <!--<amp-carousel class="videosofauthor" width="372" height="240" layout="responsive" type="slides" autoplay controls loop arrows>-->
            <amp-carousel height="180" layout="fixed-height" type="carousel" autoplay controls loop arrows>
                    <?php
                    $aid = $curauth->data->ID;
                    query_posts("author='".$aid."'&cat='15'");
                    while (have_posts()) : the_post();									
					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyfive');
					$imagesrc = $image_data[0];																				
					$imagesrc = str_replace('http://','https://',$imagesrc);										
					?>
                        <div class="item-author-videos">                        
                            <a href="<?php echo get_permalink(); ?>">
                            <div class="img-videos-author-page">
                            <amp-img src="<?php echo $imagesrc; ?>" width="188px" height="106px" alt="username"></amp-img>                           
                            </div>
							</a>
                            <!--<div class="author-name-profile">by  <?php the_author_link(); ?></div>-->
                            <div class="author-video-excert">
                            	<a href="<?php echo get_permalink(); ?>">
                                <p><?php echo $post->post_title; //echo wp_trim_words( $post->post_title, 8, '...' ); ?></p>
                                </a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                  </amp-carousel>                   
            </div>
		<?php endif; ?>			 
			<div class="author1">More Designer Profiles</div>
			<?php /*?><div class="row">
                <amp-carousel class="moredesinerprofile" width="350" height="430" layout="responsive" type="slides" autoplay controls loop arrows>
					<?php
					$blogusers = get_users('orderby=rand&role=Fashion_designer&exclude=' . $curauth->data->ID);					
					foreach ($blogusers as $user) {?>	
						<div class="profile-slider">
							<a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>">
								<?php								
								
								$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
								$imagesrc = $image_data[0];																
								$imagesrc = str_replace('http://','https://',$imagesrc);																								
								?>
                                 <div class="auth_name">
                                	<amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="350" height="350" alt="username"></amp-img>        								                                 </div>
                                 <div class="auname"><?php echo $user->display_name; ?></div>
							</a>
						</div>
					<?php } ?>
				 </amp-carousel>
			</div><?php */?>
            
            <div class="row author-page-mobile-profile">
                <amp-carousel height="180" layout="fixed-height" type="carousel" autoplay controls loop arrows>
					<?php
					$blogusers = get_users('orderby=rand&role=Fashion_designer&exclude=' . $curauth->data->ID);					
					foreach ($blogusers as $user) {?>	
						<div class="profile-slider">
							<a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>">
								<?php																
								$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
								$imagesrc = $image_data[0];																
								$imagesrc = str_replace('http://','https://',$imagesrc);																								
								?>
                                 <div class="auth_name">
                                	<amp-img src="<?php echo $imagesrc; ?>" width="125" height="125" alt="username"></amp-img>        								                                 </div>
                                 <div class="auname"><?php echo $user->display_name; ?></div>
							</a>
						</div>
					<?php } ?>
				 </amp-carousel>
			</div>
		</div>
	</div>
<?php else:  get_template_part('template-parts/content', 'error'); endif ?>   

 </main>	
    <?php include('footer.php'); ?>