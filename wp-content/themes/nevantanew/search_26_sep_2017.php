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

$args = array (
	'role' => 'Fashion_designer',
	'order' => 'ASC',
	'number' => 4,
	'orderby' => 'display_name',
	'search' => '*'.esc_attr( $qa ).'*',
);

// Create the WP_User_Query object
$wp_user_query = new WP_User_Query($args);

// Get the results
$blogusers = $wp_user_query->get_results();


$blog_list  = get_posts(array(
        's' => $qa,
        'numberposts' => 4,
        'post_type' => 'blog'
    ));

global $wpdb;

$video_posts = $wpdb->get_results("SELECT DISTINCT(wp_posts.ID) as postid,wp_posts.* FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '15' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC LIMIT 4");

$gallery_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '29' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC LIMIT 4"); 
//echo '<pre>'.print_r($gallery_posts, true).'</pre>';die;
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

<div class="container">  
    <div class="tag_video_new">VIDEOS</div> 
    <div class="View-More">
    <?php //if ($total_tag_video > $count_to_display) { ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="post" name="show_type"></form>View More</a>
        <?php //} ?>
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
<!-- Video Ends ->



   <!- Designer starts --> 	
    <div class="container">  
    <div class="tag_video_new">PEOPLE</div> 
    <div class="View-More">
    <?php //if ($total_tag_video > $count_to_display) { ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="post" name="show_type"></form>View More</a>
        <?php //} ?>
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
 <!--  Designer ENDS --> 	

 <!--- Gallery starts -->
<div class="container">  
    <div class="tag_video_new">GALLERY</div> 
    <div class="View-More">
    <?php //if ($total_tag_video > $count_to_display) { ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="post" name="show_type"></form>View More</a>
        <?php //} ?>
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
    <a href="<?php echo $image_data_full[0]; ?>" class="lightbox-portfolio">
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
 <!-- Gallery Ends -->


<!-- Blog Starts  -->

<div class="container">  
    <div class="tag_video_new">BLOG</div> 
    <div class="View-More">
    <?php //if ($total_tag_video > $count_to_display) { ?>
    <a id="video_view_more">
    <form method="Post" action="" id="video_tag_form">
    <input type="hidden" value="post" name="show_type"></form>View More</a>
        <?php //} ?>
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

<!--   Blog Ends -->



</main> <!-- .site-main -->
</div><!-- .content-area -->
</div>

<!--?php get_sidebar(); ?-->


<script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/nevantanew/js/hilitor.js"></script>
<script type="text/javascript">

  //var myHilitor = new Hilitor("");
 // myHilitor.apply("<?php echo (isset($_GET['s']) ? $_GET['s'] : "");?>");  
</script>

<?php get_footer(); ?>
