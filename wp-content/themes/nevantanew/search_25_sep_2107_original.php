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
	$qa_arr = explode(' ',$qa);
} 

$args = array (
	'role' => 'Fashion_designer',
	'order' => 'ASC',
	'orderby' => 'display_name',
	'search' => '*'.esc_attr( $qa ).'*',
);

// Create the WP_User_Query object
$wp_user_query = new WP_User_Query($args);

// Get the results
$blogusers = $wp_user_query->get_results();

global $wpdb;

$video_posts = $wpdb->get_results("SELECT DISTINCT(wp_posts.ID) as postid,wp_posts.* FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '15' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC");

$gallery_posts = $wpdb->get_results("SELECT * FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->term_relationships.term_taxonomy_id = '29' AND $wpdb->posts.post_status='publish' AND $wpdb->posts.post_type = 'post' AND ($wpdb->posts.post_title LIKE '%$qa%' OR $wpdb->posts.post_content LIKE '%$qa%') ORDER BY post_date DESC"); 
//echo '<pre>'.print_r($gallery_posts, true).'</pre>';die;
?>

<div id="primary" class="content-area search-content">
    <main id="main" class="site-main search-page" role="main">
        <?php $countGALLERY = 0;
                    $countVIDEO = 0;?>
        <?php //if (have_posts()) : ?>

            <div class="container">
             <div class="col-md-12">
                <div class="row">
                    <div>		            
                        <ul class="nav navbar-nav search-tab-nav">
                            <li class="latest_tab active-tab"><a href="javascript:void(0);" class="menu1">Latest</a></li>
                            <li class="people_tab"><a href="javascript:void(0);" class="menu1">People</a></li>
                            <li class="video_tab"><a href="javascript:void(0);" class="menu1">Videos</a></li>
                            <li class="gallery_tab"><a href="javascript:void(0);" class="menu1">Gallery</a></li>
                        </ul>
                    </div>
                </div>
				<?php 
				if(empty($blogusers) && empty($video_posts) && empty($gallery_posts)){ ?>
				<div class="col-md-12 search">
					<span class="error_common">Oops! No result for your search.</span>
                </div>
				<?php 
				}
				else{
				?>
				<div>
                    <div id="people_search" class="">
                        <div class="row">
							<?php 
							if(empty($blogusers)){ ?>
							<div class="col-md-12 error_div_people" style="display:none;">
								<span>Oops! No result for your search.</span>
							</div>
							<?php 
							}
							else{
							?>
                        	<div class="col-md-12">
								<div class="row">
									<h2 class="tag-title">People</h2>
								</div>
                            </div>
							<?php } ?>
						</div>
                        <div class="row">
							<?php
							if(!empty($blogusers)){ 
								foreach ($blogusers as $user) {
                            ?>	
                                <div class="col-md-2 col-sm-3 col-xs-4 search-people-tab">
                                    <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" class="search_page_people_img">
                                        <?php													
											$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
											$imagesrc = $image_data[0];												
										?>										
                                        <img class="img-res" src="<?php echo $imagesrc; ?>" width="196" height="211" alt="username" /> <br /><br />
                                        <?php echo $user->display_name; ?>
                                    </a>
                                </div>
							<?php }
							}
							?>
                        </div>
                    </div>
					<div id="video_search">  
						<div class="row">
							<?php 
							if(empty($video_posts)){ ?>
							<div class="col-md-12 error_div_video" style="display:none;">
								<span>Oops! No result for your search.</span>
							</div>
							<?php 
							}
							else{ ?>
							<div class="col-md-12">
								<div class="row">
									<h2 class="tag-title">Videos </h2>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row">
						
							<?php
								if(!empty($video_posts)){
								foreach($video_posts as $post){
									setup_postdata($post);
							?>
											
								<div class="col-md-2 col-sm-3 col-xs-6 search-video-tab">
									<a class="img-link search_page_img" href="<?php echo get_permalink(); ?>">										
										<?php										
										$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eight');
										$imagesrc = $image_data[0];
										?>																																									
                                        <img src="<?php echo $imagesrc; ?>" width="141" height="85" class="img-res" />											
                                        <?php
										$autor_id = $post->post_author;
										$autordata = get_userdata($autor_id);
										$author_role = $autordata->roles[0];
										?>
									</a>
									<?php if($author_role == "fashion_designer"){ ?><div style="padding-top:7px;">by <a href="<?php echo site_url(); ?>/designer/<?php echo get_the_author_meta('user_nicename'); ?>"><?php the_author_link(); ?></a> </div><?php } ?>
									<a href="<?php echo get_permalink(); ?>"><p><?php echo wp_trim_words( $post->post_title, 5, '...' ); ?></p></a>
								</div>									
							<?php }	// End the loop.
									wp_reset_postdata();
									$countVIDEO++;
							   }
							?>
						</div>
					</div>
					<div id="Gallery_search">
                   		
						<div class="row">
							<?php 
							if(empty($gallery_posts)){ ?>
								<div class="col-md-12 error_div_gallery" style="display:none;">
									<span>Oops! No result for your search.</span>
								</div>
							<?php 
							}
							else{ ?>
								<div class="col-md-12">
									<div class="row">
										<h2 class="tag-title">Gallery</h2>
									</div>
								</div>
						<?php } ?>
						</div>
						<div class="row">				  
							
							<?php
							if(!empty($gallery_posts)){
							foreach($gallery_posts as $post){
								setup_postdata($post);?>
				<div class="col-md-3 col-sm-3 col-xs-4 videolist image-gallery sort-destination lightbox popup-gallery bordernone" data-sort-id="portfolio">
                       
                         <?php						 												
							$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumb-second');							
							$imagesrc = $image_data[0];
							$image_data_full = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							
						 ?>	
                         
                         <div>
							<a href="<?php echo $image_data_full[0]; ?>" class="lightbox-portfolio">                            
                            	<div class="popup-image"><img src="<?php echo $imagesrc; ?>" class="img-res" width="206" height="206" alt="" /></div>                                                      
                           <p><?php echo wp_trim_words( $post->post_title, 10, '...' ); ?></p> 
                           
                            </a>
                            </div>   
                                                    
                           <!-- <a href="<?php echo $image_data_full[0]; ?>" class="lightbox-portfolio">
								<p><?php echo wp_trim_words( $post->post_title, 10, '...' ); ?></p>
                            </a>	-->						
                            
                            </div>
							<?php }// End the loop.
								wp_reset_postdata();
								$countGALLERY++;
							}
							?>
                            
						</div>
					</div>
                </div>
				<?php } ?>
            </div>
             </div>
             
    </main><!-- .site-main -->
</div><!-- .content-area -->

<!--?php get_sidebar(); ?-->


<script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/nevantanew/js/hilitor.js"></script>
<script type="text/javascript">

  var myHilitor = new Hilitor("");
  myHilitor.apply("<?php echo (isset($_GET['s']) ? $_GET['s'] : "");?>");  
</script>

<?php get_footer(); ?>
