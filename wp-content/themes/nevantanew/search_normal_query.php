<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();


if (isset($_GET['s'])) {
	$qa = $_GET['s'];
	//$qa_arr = explode(' ',$qa);
} 

global $wpdb;
 $current_url = $_SERVER['REQUEST_URI'];
/*
$video_posts = $wpdb->get_results("SELECT DISTINCT(wp_posts.ID) as postid,wp_posts.* FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '15' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC LIMIT 4");

$gallery_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '29' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC LIMIT 4"); 
//echo '<pre>'.print_r($gallery_posts, true).'</pre>';die;
*/
?>
<div class="container">
<div id="primary" class="content-area search-content">
    <main id="main" class="site-main search-page" role="main">

    <div class="col-md-12">
	<div class="title-post-inner-page">
           Search results for : <?php echo $qa; ?>
    </div>  
	</div>


<!-- video starts -->
<?php if(empty($_POST) || ($_POST['type'] == 'video')){
$video_args = array(
'post_type' => 'post',
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
    $video_args['posts_per_page']='4';
}else {
    $video_args['posts_per_page']='100';
}
$video_posts = get_posts($video_args);



if(!empty($video_posts)){
?>
<div class="container">  
    <div class="tag_video_new">VIDEOS</div> 
    <div class="View-More">
     <?php if ($_POST['type'] == 'video') { ?>
     <a href="<?php echo $current_url; ?>" id="video_view_more">View Less</a>
        <?php } else { ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="video" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div class="col-md-12 col-sm-12 header-bot-line nopad-left-right"><hr></div>
    <div class="row mob_tag_top">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($video_posts as $post) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentythree');
            $imagesrc = $image_data[0];
            if (is_url_exist($imagesrc)) {
        ?>
    <div class="col-md-3">
    <a href="<?php echo get_permalink($post->ID); ?>">
    <div class="innerpage-video-img">
    <img class="img-res" src="<?php echo $imagesrc; ?>" width="272" height="153">
    <div class="video-play-btn-inner-page">
    <img src="/wp-content/themes/nevantanew/img/play.svg" class="play-inner-page">             
    </div>
    </div>                         
    <div class="title-post-inner-page">
    <?php echo $post->post_title; ?>
    </div>                                    
    </a>
    </div>
        <?php } }?>
    </div></div>
    </div>
    <?php } }?>

<!-- Video Ends ->



   <!- Designer starts --> 
   <?php if(empty($_POST) || ($_POST['type'] == 'fashion')){
$args = array (
    'role' => 'Fashion_designer',
    'order' => 'ASC',
    'orderby' => 'display_name',
    'search' => '*'.esc_attr( $qa ).'*',
);
if(empty($_POST)){
    $args['number']='4';
}else {
    $args['number']='100';
}
// Create the WP_User_Query object
$wp_user_query = new WP_User_Query($args);
// Get the results
$blogusers = $wp_user_query->get_results();
if(!empty($blogusers)){
    ?>	
    <div class="container">  
    <div class="tag_video_new">PEOPLE</div> 
    <div class="View-More">
    <?php if ($_POST['type'] == 'fashion') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
        <?php } else { ?>
    <a id="search_user_click">
    <form method="Post" action="" id="search_user_form">
    <input type="hidden" value="fashion" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div class="col-md-12 col-sm-12 header-bot-line nopad-left-right"><hr></div>
    <div class="row mob_tag_top">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($blogusers as $user) {
            $image_data = get_user_meta($user->ID, 'cupp_upload_meta');
			$imagesrc = $image_data[0];		
            if (is_url_exist($imagesrc)) {
        ?>
    <div class="col-md-3">
    <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>">
    <div class="innerpage-video-img">
    <img class="img-res" src="<?php echo $imagesrc; ?>" width="272" height="153">
    </div>                         
    <div class="title-post-inner-page">
            <?php echo $user->display_name; ?>
    </div>                                    
    </a>
    </div>
        <?php } }?>
    </div></div>
    </div>
    <?php } }?>
 <!--  Designer ENDS --> 	

 <!--- Gallery starts -->
 <?php if(empty($_POST) || ($_POST['type'] == 'gallery')){

$gallery_args = array(
'post_type' => 'post',
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
    $gallery_args['posts_per_page']='4';
}
$gallery_posts = get_posts($gallery_args);
if(!empty($gallery_posts)){
?>
<div class="container">  
    <div class="tag_video_new">GALLERY</div> 
    <div class="View-More">
     <?php if ($_POST['type'] == 'gallery') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
        <?php }else {?>
    <a id="search_gallery_click">
    <form method="Post" action="" id="search_gallery_form">
    <input type="hidden" value="gallery" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div class="col-md-12 col-sm-12 header-bot-line nopad-left-right"><hr></div>
    <div class="row mob_tag_top">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($gallery_posts as $gal_post) {
        setup_postdata($gal_post);
        ?>
    <div class="col-md-3 videolist image-gallery sort-destination lightbox popup-gallery bordernone" data-sort-id="portfolio">

    <?php						 												
	$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($gal_post->ID), 'post-thumb-second');							
	$imagesrc = $image_data[0];
	$image_data_full = wp_get_attachment_image_src(get_post_thumbnail_id($gal_post->ID), 'full');
	?>	
    <!--<a href="<?php echo $image_data_full[0]; ?>" class="lightbox-portfolio">-->
    <a href="<?php echo get_permalink($gal_post->ID); ?>">
    <div class="innerpage-video-img">
    <img class="img-res" src="<?php echo $imagesrc; ?>" width="272" height="153">
    </div>                         
    <div class="title-post-inner-page">
            <?php echo $gal_post->post_title; ?>
    </div>                                    
    </a>
    </div>
        <?php }?>
    </div></div>
    </div>
    <?php }} ?>
 <!-- Gallery Ends -->


<!-- Blog Starts  -->
<?php if(empty($_POST) || ($_POST['type'] == 'blog')){
$blog_array  = array(
        's' => $qa,
        'post_type' => 'blog',
        'post_status' => 'publish'
    );

if(empty($_POST)){
    $blog_array['posts_per_page']='4';
   }else {
    $blog_array['posts_per_page']='-1';
   }
$blog_list = get_posts($blog_array);
if(!empty($blog_list)){
?>

<div class="container">  
    <div class="tag_video_new">BLOG</div> 
    <div class="View-More">
   <?php if ($_POST['type'] == 'blog') { ?>
    <a href="<?php echo $current_url; ?>" >View Less</a>
        <?php } else { ?>
    <a id="search_blog_click">
    <form method="Post" action="" id="search_blog_form">
    <input type="hidden" value="blog" name="type"></form>View More</a>
        <?php } ?>
    </div> 
    <div class="col-md-12 col-sm-12 header-bot-line nopad-left-right"><hr></div>
    <div class="row mob_tag_top">
    <div class="col-md-12 nopad-left-right">
        <?php
        foreach ($blog_list as $blog_posts) {
            $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($blog_posts->ID), 'blog-thumb-twentythree');
            $imagesrc = $image_data[0];
            if (is_url_exist($imagesrc)) {
        ?>
    <div class="col-md-3">
    <a href="<?php echo get_permalink($blog_posts->ID); ?>">
    <div class="innerpage-video-img">
    <img class="img-res" src="<?php echo $imagesrc; ?>" width="272" height="153">
    </div>                         
    <div class="title-post-inner-page">
            <?php echo $blog_posts->post_title; ?>
    </div>                                    
    </a>
    </div>
        <?php } }?>
    </div></div>
    </div>
     <?php }}?>

<!--   Blog Ends -->



</main> <!-- .site-main -->
</div><!-- .content-area -->
</div>

<!--?php get_sidebar(); ?-->


<script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/nevantanew/js/hilitor.js"></script>
<script type="text/javascript">
var myHilitor = new Hilitor("");
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
.title-post-inner-page:hover{color:#fff !important;}
</style>


<?php get_footer(); ?>
