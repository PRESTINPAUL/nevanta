<?php
/**
 * The template part for displaying single posts
 *
 * @package nevanta
 * @subpackage nevanta

 */
$single_video = get_cfc_meta( 'video_url' );
$autor_id = $post->post_author;
$autordata = get_userdata($autor_id);
//echo $autordata->user_nicename ;
//echo '<pre>';print_r($autordata);
$author_role = $autordata->roles[0];
$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
$designer_cat_name = $designer_cat[0];
$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
$season_cat_name = $season_cat[0];    
  
?>
<style>
.hidecontrols{display:none !important;}

.remove-slider-poster{display:none !important;}
.add-slider-poster{display:block !important;}
.display-none-media-video{display:none;}
.display-media-video{display:block;}

@media screen and (-webkit-min-device-pixel-ratio:0) { 
.remove-slider-poster{display:none !important;}
.add-slider-poster{display:block !important;}
.display-none-media-video{display:none !important;}
.display-media-video{display:block !important;}
}


</style>
<div class="nopad-left-right">	
		<div class="col-md-12 slider single-video nopad-left-right">	
			<div id='media-player'>
            <div id="video_html5">
            
            <a class="slider-poster" id="slider-poster-new">
            	<?php				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'blog-thumb-twentyfour');				
				$imagesrc = $image_data[0];
				
				$image_data_full_video = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
				?>
				<img class="img-res" src="<?php echo $image_data_full_video[0]; ?>" />            	
            </a>
            			
			 <video id="media-video" controls poster="<?php echo $image_data_full_video[0]; ?>" class="media-video-new">
                <source src='<?php echo $single_video[0]['desktop-video']; ?>' type='video/mp4'>
             </video> 
            
			<?php /*?><a class="slider-poster" id="slider-poster-new">
            	<?php
				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'blog-thumb-twentyfour');				
				$imagesrc = $image_data[0];
				
				$image_data_full_video = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
				?>
				<img class="img-res" src="<?php echo $imagesrc; ?>" />            	
            </a>
            			
			 <video id="media-video" controls poster="<?php echo $image_data_full_video[0]; ?>" class="media-video-new">
                <source src='<?php echo $single_video[0]['desktop-video']; ?>' type='video/mp4'>
             </video> <?php */?>            		                    
             <div class="video-overlay-button" onclick='togglePlayPauseOnScreen();'></div>                                       
			 </div>
			 <div id='media-controls' class="old">
				<div class="container">
					<div class="col-md-12 col-sm-12 col-xs-12 progress-div">
						
						<div class="col-md-11 col-sm-10 col-xs-10">
							<div class="row">
								<?php 	if (checkos() != "iPhone" && checkos() != "Android" && checkos() != "Mobile") { ?>
                                <div class="progressBar">
									<div class="timeBar"></div>
								</div>
								<?php } ?>
							 </div>   
						</div>   
						<div class="col-md-1 col-sm-2 col-xs-2 text-center"> 
							<div class="row"> 
								<div class="progressTime">
									<span class="current-time-video-player"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 controls">					
				
						<div class="col-md-1 col-sm-1 col-xs-1 play-pause-div">				
							<button id='play-pause-button' class='play' title='play' onclick='togglePlayPause();'>Play</button>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1 mute-unmute-div">							
						   <div class="volume">
								<span class="volumeBar"></span>
							</div>
							<div class="sound sound2 btn"></div>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-9 video-info-div">
							<p class="author-name">						
							</p>							
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1 expand-div">
							<button id='fullscreen-button' class='fullscreen' title='fullscreen'>FS</button>
						</div>                                                                       						
									
					</div>                                        
                    
				</div>
                
                
			</div>
                      
          </div>		
            <script>
			jQuery(document).ready(function(){				
				jQuery('#media-video').on('click', function() {
					<?php if (checkos() == "iPhone" || checkos() == "Android" || checkos() == "Mobile") {}
						else{ ?>														
							togglePlayPauseOnScreen();
					<?php } ?>
				});
							
				jQuery('.video-overlay-button').on('click', function() {
					jQuery('#media-video').addClass('display-media-video');
					jQuery('#media-video').show();
					jQuery('.slider-poster').hide();
					jQuery(".video-info-div").show();
					jQuery('#media-controls').removeClass("hidecontrols");
										
					jQuery('.slider-poster').removeClass('add-slider-poster');
					
				});		
				
				
				jQuery('#media-video').on('ended', function(e) {				
					//jQuery('#media-video').toggle();					
					jQuery('#media-video').removeClass('display-media-video');
					jQuery('#media-video').addClass('display-none-media-video');
					jQuery('#media-video').hide();
					//jQuery('.slider-poster').show();
					jQuery('.slider-poster').addClass('add-slider-poster');					
				});												
				
				<?php //} ?>
			});							
				</script>	
        </div>
</div>
<div style="clear:both;"></div>

<div class="nopad-left-right">
    <div class="row">
        <div class="col-md-12">
			<div class="post-single-page-title">
                <?php echo get_the_title(); ?>
            </div>
		</div>
    </div>
</div>

<div class="nopad-left-right date-share">
    <div class="row">
        <div class="col-md-12">
			<div class="post-single-page-date">
                <?php echo get_the_date(get_option('date_format')); ?>
            </div>
            <div class="post-single-page-social-share">
	            <p class="single-share">Share this on &nbsp;&nbsp;&nbsp;&nbsp;</p>
                
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" >
                        <img class="inner-page-fb" src="<?php bloginfo('template_directory'); ?>/img/fb.svg">
                    </a>
                    
                    <a target="_blank"  href="https://twitter.com/share" data-size="large"  data-url="https://dev.twitter.com/web/tweet-button">
                        <img class="inner-page-tw" src="<?php bloginfo('template_directory'); ?>/img/twitter1.svg">
                    </a>					
        
                    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=nevanta&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" >
                        <img class="inner-page-pinterest" src="<?php bloginfo('template_directory'); ?>/img/pinterest1.svg">
                    </a>
                
            </div>
		</div>
    </div>
</div>



<div class="nopad-left-right single-content">
    <div class="row">
        <div class="col-md-12">
			<div class="post-content-single-page">
                <?php echo get_the_content($more_link_text, $stripteaser); ?>
            </div>
		</div>
    </div>
</div>

<div class="nopad-left-right single-content-page-divider">
	<div class="col-md-12 col-sm-12 single-content-page-line nopad-left-right"><hr/></div>
</div>

<?php if ($author_role == "fashion_designer"): ?> 
    <div class="container fashion-designer-container nopad-left-right">
        <div class="row">
        
        	<div class="col-md-12 Featured-designer-banner-title">Featured Designer</div>
            
            
            <div class="col-md-12 Featured-designer-detailes">
            	<div class="col-md-2 authr-img">
                	<?php 																		
						$image_data = get_user_meta(get_the_author_ID(), 'cupp_upload_meta');
						$imagesrc = $image_data[0];
					?>
					<img class="img-res" src="<?php echo $imagesrc; ?>" alt="Author name" width="180" height="180" />
                </div>
                <div class="col-md-10 authr-desc">
                
                	<div class="col-md-12 author-title">
						<a href="<?php echo site_url() ?>/designer/<?php getAUTHORurl(get_the_author_ID()); ?>">
							<?php 
							if($author_role == "fashion_designer"){	the_author(); }
							else if($designer_cat_name != ""){ echo $designer_cat_name; }
							else if($season_cat_name == ""){ echo ''; }
							else {echo $season_cat_name; }?>
						</a>
					</div>
					
                    <div class="col-md-12 author-role"><?php getAUTHORrole(get_the_author_ID()); ?></div>
                    
					<div class="col-md-12 author-desc"><?php getAUTHORdesc(get_the_author_ID()); ?></div>
                                        
                </div>
            </div>            
            			
        </div>
    </div>
    
    
    <div class="nopad-left-right single-div-after-desnr">
        <div class="col-md-12 col-sm-12 single-page-line-dsnr nopad-left-right"><hr/></div>
    </div>
<?php endif ?>

<?php 
	$tag = get_the_tags();
	if (!empty($tag)) {
?>
		<div class="tags-new">
			<div class="row">
				<div class="col-md-12 author-tags">
                	<div class="tags-title-name">Tags: </div>
                    <div class="tags-displaying"><?php the_tags('', ' '); ?></div>
				</div>
			</div>
		</div>
        
        <div class="nopad-left-right single-div-after-tags">
            <div class="col-md-12 col-sm-12 single-page-line-tgs nopad-left-right"><hr/></div>
        </div>
<?php
 }
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
<div class="author-related-videos-single-page nopad-left-right">
		<div class="author-videos-single">
			<div class="col-md-12 authorname-title nopad-left-right">Related Videos</div>
				<div class="owl-carousel owl-theme stage-margin single-related-videos manual" id="owl-example">
						<?php
							while( $my_query->have_posts() ) {							
							$my_query->the_post();
							$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
							$designer_cat_name = $designer_cat[0];
							$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
							$season_cat_name = $season_cat[0];					
							$autor_id = $post->post_author;
							$autordata = get_userdata($autor_id);							
							$author_role = $autordata->roles[0];
						?>
				<div class="item">
					<?php
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eight');
						$imagesrc = $image_data[0];
					?>
					<a href="<?php the_permalink(); ?>"><img class="img-res" src="<?php echo $imagesrc; ?>" width="144" height="81" /></a>					
					<a class="authorname-title-slider" href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a>					
				</div>
    <?php } ?>
				</div>
			</div>
		</div>  
        
        <div class="nopad-left-right single-div-after-video-slider">
            <div class="col-md-12 col-sm-12 single-page-line-slider nopad-left-right"><hr/></div>
        </div> 
	
    <?php }}
	
    $post = $orig_post;
    wp_reset_query();
    ?>   

   
<div class="single-discussion-section" style="margin-top: 20px;">  
    <div class="row">
        <div class="col-md-10">
			<div class="posts-comments">
				<div id="fb-root"></div>
				<script type="text/javascript">				
				 window.fbAsyncInit = function() {					
						FB.init({
						  appId      : '957787880981244',
						  xfbml      : true,
						  version    : 'v2.5',
						  oauth: true
						});												
						FB.getLoginStatus(function(response) {
						  if (response.status === 'connected') {
								jQuery('.fb-loginlogo').hide();
							}
						 });
					  };
						(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id))
								return;
							js = d.createElement(s);
							js.id = id;
							js.src = "//connect.facebook.net/en_US/all.js";
							fjs.parentNode.insertBefore(js, fjs);														 
						}(document, 'script', 'facebook-jssdk'));														
					function fb_login() {
						FB.login( function(response) {
							FB.getLoginStatus(function(response) {
								if (response.status === 'connected') {
									jQuery('.fb-loginlogo').hide();
								}
							});
							
						}, { scope: 'email,public_profile' } );
					}
				</script>					   
				<div class="fb-comments" data-colorscheme="dark" data-href="<?php echo get_permalink(get_the_ID());?>" data-numposts="3"></div>				
			</div>
        </div>
    </div>
</div>