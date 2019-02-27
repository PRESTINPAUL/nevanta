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
<main class="site-main search-page" id="search-details">
  <?php //get_header();

if (isset($_GET['s'])) {
	$qa = $_GET['s'];
	//$qa_arr = explode(' ',$qa);
} 

global $wpdb;
 $current_url = $_SERVER['REQUEST_URI'];
 $count_to_display = 4;
?>

<div class="col-md-12">
    <div class="title-post-inner-page">
           Search results for : <?php echo $qa; ?>
    </div>   
      </div>


<!-- video starts here -->

<?php if(empty($_POST) || ($_POST['type'] == 'video')){

$video_args = array(
'post_type' => 'post',
'orderby' => 'post_date',
'order' => 'DESC',
's' => $qa,
'post_status' => 'publish',
'tax_query' => array(
    array(
    'taxonomy' => 'category',
    'field' => 'id',
    'terms' => 15
     )
  )
);

if(empty($_POST)){
    $video_args['posts_per_page'] = $count_to_display;
}else {
    $video_args['posts_per_page']='-1';
}
$get_video_query = new WP_Query($video_args);
$total_search_video = $get_video_query->found_posts;
$video_posts = $get_video_query->posts;

if ($get_video_query->have_posts()):
?>

<div class="container mob_tag_top"> 
    <div class="tag_video_new">VIDEOS</div> 
    <div class="View-More">
    <?php if ($_POST['type'] == 'video') { ?>
     <a href="<?php echo $current_url; ?>" id="video_view_more">View Less</a>
        <?php } else if($total_search_video > $count_to_display){ ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="video" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div style="clear: both"></div>
    <div class="divider-copy-2"></div>
    <div class="row">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($video_posts as $post) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentythree');
            $imagesrc = $image_data[0];
            if (is_url_exist($imagesrc)) {
        ?>
            <div class="videolist col-50 mobi-ply">
                <a href="<?php echo get_permalink($post->ID); ?>" class="fashion">         
                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="208" height="117" alt="<?php the_title(); ?>"></amp-img>
                     <amp-img layout="responsive" class="video-play-btn-inner-page-mobile" height="150" width="150"  src="<?php bloginfo('template_directory'); ?>/amp-nevanta/img/play-mobile.svg" alt="Nevanta"></amp-img> 
                </a>
                 <div class="title_post_mobile">
                <a href="<?php echo get_permalink($post->ID); ?>">
                <?php echo $post->post_title; ?>
                </a>
                </div>
                </div>
        <?php } }?>
    </div></div>
    </div>
<?php endif;
wp_reset_postdata(); } ?>

      <!-- video ends here -->

<!-- fashion designer starts here -->
<?php if(empty($_POST) || ($_POST['type'] == 'fashion')){
$args = array (
    'role' => 'Fashion_designer',
    'order' => 'ASC',
    'orderby' => 'display_name',
    'search' => '*'.esc_attr( $qa ).'*',
);
if(empty($_POST)){
    $args['number'] = $count_to_display;
}
//else {
    //$args['number'] = '200';
//}
// Create the WP_User_Query object
$wp_user_query = new WP_User_Query($args);
// Get the results
$blogusers = $wp_user_query->get_results();
$users_count = (int) $wp_user_query->get_total();
    if(!empty($blogusers)){
    ?>
    <div class="container mob_tag_top"> 
    <div class="tag_video_new">DESIGNER</div> 
    <div class="View-More">
    <?php if ($_POST['type'] == 'fashion') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
    <?php } else if($users_count > $count_to_display) { ?>
    <a id="search_user_click">
    <form method="Post" action="" id="search_user_form">
    <input type="hidden" value="fashion" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div style="clear: both"></div>
    <div class="divider-copy-2"></div>
    <div class="row">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($blogusers as $user) {
            $image_data = get_user_meta($user->ID, 'cupp_upload_meta');
            $imagesrc = $image_data[0];   
            if (is_url_exist($imagesrc)) {
            ?>
            <div class="videolist col-50 mobi-ply">
                <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" class="fashion">         
                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="136" height="146" alt="<?php echo $user->user_nicename; ?>"></amp-img>
                </a>
                 <div class="title_post_mobile">
                <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>">
                <?php echo $user->display_name; ?>
                </a>
                </div>
                </div>
        <?php } }?>
    </div></div>
    </div>
    <?php } } ?>
<!-- fashion designer ends here -->

<!-- Gallery starts here -->

<?php if(empty($_POST) || ($_POST['type'] == 'gallery')){

$gallery_args = array(
'post_type' => 'post',
'orderby' => 'post_date',
'order' => 'DESC',
's' => $qa,
'post_status' => 'publish',
'tax_query' => array(
    array(
    'taxonomy' => 'category',
    'field' => 'id',
    'terms' => 29
     )
  )
);
if(empty($_POST)){
    $gallery_args['posts_per_page'] = $count_to_display;
}else {
    $gallery_args['posts_per_page'] = '-1';
}

$get_gallery_query = new WP_Query($gallery_args);
$total_search_gallery = $get_gallery_query->found_posts;
$gallery_posts = $get_gallery_query->posts;
if ($get_gallery_query->have_posts()):
?>
    <div class="container mob_tag_top"> 
    <div class="tag_video_new">GALLERY</div> 
    <div class="View-More">
    <?php if ($_POST['type'] == 'gallery') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
        <?php }else if($total_search_gallery > $count_to_display) {?>
    <a id="search_gallery_click">
    <form method="Post" action="" id="search_gallery_form">
    <input type="hidden" value="gallery" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div style="clear: both"></div>
    <div class="divider-copy-2"></div>
    <div class="row">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($gallery_posts as $gallery) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($gallery->ID), 'blog-thumb-twentysix');
            $imagesrc = $image_data[0];
            if (is_url_exist($imagesrc)) { ?>
            <div class="videolist col-50 mobi-ply">
                <a href="<?php echo get_permalink($gallery->ID); ?>?keyword=<?php echo $qa; ?>" class="fashion">
                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="135" height="240" alt="<?php the_title(); ?>"></amp-img>
                </a>
                 <div class="title_post_mobile">
                <a href="<?php echo get_permalink($gallery->ID); ?>?keyword=<?php echo $qa; ?>">
                <?php echo $gallery->post_title; ?>
                </a>
                </div>
                </div>
        <?php } }?>
    </div></div>
    </div>
    <?php
  endif;
    wp_reset_postdata();
     } ?>
      <!-- Gallery ends here -->

       <!-- Blog starts here -->
<?php if(empty($_POST) || ($_POST['type'] == 'blog')){
$blog_array  = array(
        's' => $qa,
        'post_type' => 'blog',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

if(empty($_POST)){
    $blog_array['posts_per_page'] = $count_to_display;
   }else {
    $blog_array['posts_per_page'] = '-1';
   }
$get_blog_query = new WP_Query($blog_array);
$total_search_blog = $get_blog_query->found_posts;
$blog_list = $get_blog_query->posts;
if ($get_blog_query->have_posts()):
?>
    <div class="container mob_tag_top"> 
    <div class="tag_video_new">BLOG</div> 
    <div class="View-More">
    <?php if ($_POST['type'] == 'blog') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
        <?php } else if($total_search_blog > $count_to_display) { ?>
    <a id="search_blog_click">
    <form method="Post" action="" id="search_blog_form">
    <input type="hidden" value="blog" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div style="clear: both"></div>
    <div class="divider-copy-2"></div>
    <div class="row">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($blog_list as $blog_posts) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($blog_posts->ID), 'blog-thumb-twentysix');
            $imagesrc = $image_data[0];
            if (is_url_exist($imagesrc)) { ?>
            <div class="videolist col-50 mobi-ply">
                <a href="<?php echo get_permalink($blog_posts); ?>" class="fashion">         
                    <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="135" height="240" alt="<?php the_title(); ?>"></amp-img>
                </a>
                 <div class="title_post_mobile">
                <a href="<?php echo get_permalink($blog_posts->ID); ?>">
                <?php echo $blog_posts->post_title; ?>
                </a>
                </div>
                </div>
        <?php } }?>
    </div></div>
    </div>
    <?php
endif;
    wp_reset_postdata();
     } ?>
      <!-- Blog ends here -->
<?php 
      if((empty($get_video_query->have_posts())) && (empty($get_blog_query->have_posts())) && (empty($get_gallery_query->have_posts())) && (empty($blogusers))){
         ?>
         <div class="container">
            <div class="col-md-12">
                <div class="col-md-12 search"> 
                    <span class="error_common">Oops! No result for your search.</span>
                </div>
            </div>
        </div>
        <?php
    } 
?>
</main>
<!-- .site-main -->
<script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/nevantanew/js/hilitor.js"></script>
<script type="text/javascript">
var myHilitor = new Hilitor("search-details");
 myHilitor.apply("<?php echo (isset($_GET['s']) ? $_GET['s'] : "");?>");  
</script>
<script>
    var el_video = document.getElementById('video_view_more');
    if(el_video){
        el_video.addEventListener('click', function () {
            document.getElementById("video_tag_form").submit();
        });
    }
    var el_blog = document.getElementById('search_blog_click');
    if(el_blog){
        el_blog.addEventListener('click', function () {
            document.getElementById("search_blog_form").submit();
        });
    }
    var el_users = document.getElementById('search_user_click');
    if(el_users){
        el_users.addEventListener('click', function () {
            document.getElementById("search_user_form").submit();
        });
    }
    var el_gallery = document.getElementById('search_gallery_click');
    if(el_gallery){
        el_gallery.addEventListener('click', function () {
            document.getElementById("search_gallery_form").submit();
        });
    }  
</script>
<style>
 em {
    color: #E50D93 !important;
    background-color: transparent !important;
}
.title-post-inner-page{color: #fff !important;}
:focus {
  outline: none !important;
}

::-moz-focus-inner {
  border: 0 !important;
}
</style>
<?php include('footer.php'); ?>