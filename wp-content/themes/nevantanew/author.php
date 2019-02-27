<?php get_header(); ?>

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


//echo "<pre>";print_R($curauth);
//echo "<pre>";print_R($author);

$abc = get_the_author_meta($curauth->data->ID);
//echo "<pre>";print_R($abc);
?>

<?php if (!user_can(get_the_author_meta('ID'), 'administrator')): 
	//if (user_can(get_the_author_meta('ID'), 'administrator') || user_can(get_the_author_meta('ID'), 'fashion_designer')):
?> 
    <div class="container nopad-left-right">       
        <div class="col-md-12 authordesign single-author nopad-left-right">
            <div class="col-md-3 col-sm-3 col-xs-3 author-profile-pic">                                   
                <?php                                            
                    $image_data = get_user_meta($curauth->ID, 'cupp_upload_meta');
                    $imagesrc = $image_data[0];	                ?>					
                <img class="img-res" src="<?php echo $imagesrc; ?>" width="255" height="255" alt="username" />               
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9 single-author-desc">
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row">
                    <div class="author pro-author-name"><?php echo $curauth->display_name; ?> </div>
                    <?php $all_meta_for_user = get_user_meta( $curauth->id );?>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row">
                    <div class="social" style="float:right;">
                        <?php if(isset($all_meta_for_user['facebook'][0])){ ?>
                        <a href="<?php echo $all_meta_for_user['facebook'][0]; ?> " target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-fb.png"  alt="Facebook" class="newicon1"></a>
                        <?php }
                        if(isset($all_meta_for_user['twitter'][0])){ ?>
                        <a href="<?php echo $all_meta_for_user['twitter'][0]; ?>" target="_blank" ><img src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png"  alt="Twitter" class="newicon1"></a>                    
                        <?php }
                        if(isset($all_meta_for_user['instagram'][0])){ ?>
                        <a href="<?php echo $all_meta_for_user['instagram'][0]; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-insta.png"  alt="Instagram" class="newicon1"></a>
                        <?php }
                        if(isset($all_meta_for_user['pinterest'][0])){ ?>
                        <a href="<?php echo $all_meta_for_user['pinterest'][0]; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png"  alt="Pinterest" class="newicon1" ></a>
                        <?php } ?>
                    </div>
                </div>    
                </div>
                <div class="col-md-12 authordesc">
                    <div class="row">
                        <div class="newauthor <?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) { ?> more-designer <?php } ?>"><?php echo $curauth->user_description; ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container single-div-after-video-slider">
        <div class="col-md-12 author-page-line nopad-left-right"><hr/></div>
    </div> 
	
    
    <div class="container">
	<div class="col-md-12 nopad-left-right">
        <?php if (have_posts()) : ?>
            <!--<div class="author1" >Videos of <?php echo $curauth->display_name; ?></div>-->
            
            <div class="author1">Related Videos</div>
            
            <div id="owl-video-sec" class="author-single-owl owl-carousel owl-theme stage-margin" data-plugin-options='{"items": 7,"margin": 10,"loop": false, "nav": true, "dots": false, "singleItem" : false}'>
                <?php
                $aid = $curauth->data->ID;
                query_posts("author='".$aid."'&cat='15'");
                while (have_posts()) : the_post();															                  																	
                
                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eight');
                $imagesrc = $image_data[0];																
                ?>
                    <div class="col-md-12 nopad-left-right">
                        <a href="<?php echo get_permalink(); ?>">                            
                            <img class="img-res" src="<?php echo $imagesrc; ?>" width="144" height="81" />
                        </a>
                        <!--<div class="author-name-profile">by  <?php the_author_link(); ?></div>-->
                        <a class="author-desc" href="<?php echo get_permalink(); ?>"><p><?php echo wp_trim_words( $post->post_title, 8, '...' ); ?></p></a>
                    </div>
                    <?php endwhile; ?>
            </div> 
                                         
        <div class="col-md-12 author-page-line nopad-left-right"><hr/></div>                
		<?php endif; ?>        
	</div>    
    </div>
	<div style="clear:both;"></div>                         
        
    <div class="container">
		<div class="col-md-12 nopad-left-right">
			<div class="author1" >More Designer Profiles</div>
			<div class="row" style="">
				<div class="owl-carousel owl-theme show-nav-hover" data-plugin-options='{"items": 5, "margin": 0, "loop": false, "nav": true, "dots": false}'>
					<?php
					$blogusers = get_users('orderby=rand&role=Fashion_designer&exclude=' . $curauth->data->ID);

					foreach ($blogusers as $user) {
						?>	
						<div class="col-md-12 profile-slider" style="text-align:center;" >
							<a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>">
								<?php																											
								$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
								$imagesrc = $image_data[0];
								?>                                                                								
                                <img class="img-res" src="<?php echo $imagesrc; ?>" width="197" height="211" alt="username" /><br />
								<p class="desi-name"><?php echo $user->display_name; ?></p>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php else:  
    get_template_part('template-parts/content', 'error'); ?>
    <?php endif ?>
   <!-- </div>
    </div>-->

<?php get_footer(); ?>
