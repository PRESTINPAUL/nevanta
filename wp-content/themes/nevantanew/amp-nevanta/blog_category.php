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


<body class="front-page mainblog-page">
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
<!--<amp-carousel width="375" height="375" layout="responsive" type="slides" autoplay controls loop arrows dots='.'>-->
<amp-carousel width="375" height="375" layout="responsive" type="slides" autoplay controls loop arrows>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
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
			
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-fourth');
			$imagesrc = $image_data[0];					
		?>
        <div>              
        <amp-img src="<?php echo $imagesrc; ?>" width="375" height="375" layout="responsive"></amp-img>
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
//if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) {
	$posts_per_page = 8;
/*}
else{
	$posts_per_page = 7;
}*/
$args=array(
	'post_type' => $type,
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'caller_get_posts' => 1,
	'paged'=>$paged,
	'post__not_in'=> $featured_ids,
	'tax_query' => array(
			array(
			'taxonomy' => 'blog_category',
			'field'    => 'slug',
			'terms'    => get_query_var( 'term' ),
			),
		),							
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
										
					/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$parts_upload = explode('uploads', $image_data[0]);					
					$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda-output/210/uploads'.$parts_upload[1];
					if (@getimagesize($path)) {
						$imagesrc = $path;
					}else{
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$imagesrc = $image_data[0];
					}*/
					
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-second');
					$imagesrc = $image_data[0];	
					?>
                    
                    <div class="single-blog-list">
                        <div class="blog-image">
                            <a href="<?php the_permalink(); ?>">											
                                <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="200" height="200" alt="<?php the_title(); ?>"></amp-img>
                            </a>
                        </div>
							<div class="blog-content">
            <a href="<?php the_permalink(); ?>">
            <h2 class="blog-title">
			<?php 
            //if (strlen($post->post_title) > 50) {
			//echo substr(the_title($before = '', $after = '', FALSE), 0, 60) . '...'; } else {
			//the_title();
			//echo substr($post->post_title,0,15);
			echo $post->post_title;
			//}?>
            </h2></a>								
			<p class="blog-excerpt"><?php 
			$excerpt = get_the_excerpt();
			//if(strlen($excerpt) > 50){
			//$excerpt = substr($excerpt, 0, 60); echo $excerpt.'...';}
			//else{ echo $excerpt;}
			$content = substr($excerpt,0,40);
			echo $content.'...';
			
			?> </p><span class="blog-author">by <?php the_author(); ?></span>
							</div>
						</div>																		
					
        <?php $i++;
        endwhile; ?>                   
      
    <?php endif; ?>
  
    </div><!--blogs-lists-->
    
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
    
</div>
</main>
</div>
</div>					

	</main>
    <?php include('footer.php'); ?>