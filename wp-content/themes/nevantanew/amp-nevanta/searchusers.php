<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="canonical" href="<?php echo array_shift(explode('&', home_url( add_query_arg( NULL, NULL ) )));?>" />
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
        
   <!-- <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>    
	<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>    
	<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>  -->
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
            $link = site_url()."/designers";
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
                            /*$image_data = get_user_meta($user->ID, 'cupp_upload_meta'); 									
                            $parts_upload = explode('uploads', $image_data[0]);
                            $thumb_width = 136;
                            $thumb_height = 145;					
                            $imagesrc = 'http://s3-eu-west-1.amazonaws.com/nevanta-test/uploads'.$parts_upload[1];
							$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];

							if(@getimagesize($path)) {
								$imagesrc = $path;
							}elseif(@getimagesize($nevanta_lambda)){						
								$imagesrc = $nevanta_lambda;
							}else{
								$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
								$imagesrc = $image_data[0];
							}	*/	
							
							$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
							$imagesrc = $image_data[0];												
                            ?>                      
                            <amp-img layout="responsive" alt="username" src="<?php echo $imagesrc; ?>" width="136" height="145" alt="<?php the_title(); ?>"></amp-img> 
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
	
    <?php include('footer.php'); ?>