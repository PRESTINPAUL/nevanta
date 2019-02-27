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
<title>
    <?php wp_title(); ?>
</title>                                   
<?php include('head.php'); ?>
</head>
<?php
/*
  Template Name: designer
 */
if(isset($_SESSION)){
	session_destroy();
}
if (isset($_GET['a'])) {
    echo $qa = $_GET['a'];
} else {
}
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

   		<div class="container">
        <div class="row">
        	
            <div class="searchuser-by-alphabet">
            
                <?php
                $i = 65;
				//$link = site_url()."/designers";
				$link = site_url();
                for ($i; $i <= 90; $i++) {					
                    echo '<span class="search_desi"><a href="'.$link.'/searchuser?a=' . chr($i) . '">' . chr($i) . '</a></span>';
                }
                ?>
            </div>
        </div>
    
    <div class="row designer_sec">        
    <?php
    $number = 9;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array('posts_per_page' => 9, 'paged' => $paged);
    
    query_posts($args);
    $offset = ($paged - 1) * $number;
    $users = get_users('&role=Fashion_designer');
    $query = get_users('&offset=' . $offset . '&number=' . $number . 'orderby=nicename&role=Fashion_designer');
    $total_users = count($users);
    $total_query = count($query);
    $total_pages = intval($total_users / $number) +1 ;
    
    foreach ($query as $user) { 
        ?>        
                <div class="designer" >
                    <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >                    	                    
                        <?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')){                                             
							$thumb_width = 136;
							$thumb_height = 145; 
							$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
							$imagesrc = $image_data[0];
							$imagesrc = str_replace('http://','https://',$imagesrc);  
                        }else{                                                                  
							$thumb_width = 198;
							$thumb_height = 213;
							$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
							$imagesrc = $image_data[0];
							$imagesrc = str_replace('http://','https://',$imagesrc);   
						}
                        ?>  
                        <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="<?php echo $user->display_name; ?>"></amp-img>                                                                       
                        <span class="designer-name"><?php echo $user->display_name; ?></span>
                    </a>
                </div>
        <?php }?>            
    </div>
    </div>
    <div class="container">
        <div class="con_right">
			<?php 
			$right_img = get_template_directory_uri().'/img/right.svg';
			$left_img = get_template_directory_uri().'/img/left.svg';
			   
             if ($total_users > $total_query) {               
               $current_page = max(1, get_query_var('paged'));
               echo paginate_links(array(
                   'base' => get_pagenum_link(1) . '%_%',
                   'format' => 'page/%#%/',
                   'current' => $current_page,
                   'total' => $total_pages,
                   'prev_next' => true,				 				  
				   'end_size' => '0',
				   'mid_size' => '3',
                   'prev_text' => __('<img src="'.$left_img.'" class="left"> Previ '),
				   'next_text' => __(' Next <img src="'.$right_img.'" class="right">')	
               ));
             }
            ?>
                                     
        </div>
    </div>

	</main>
	
    <?php include('footer.php'); ?>