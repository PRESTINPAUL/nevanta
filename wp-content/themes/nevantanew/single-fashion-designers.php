
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
//$args = array('post_type' => 'fashion-designers');
//$query = new WP_Query($args);
?>

<?php if (!user_can(get_the_author_meta('ID'), 'administrator')): ?> 
    <div class="container" >
        <div class="row"  >
            <div class="col-md-12 authordesign"  >
                <div class="col-md-4" >                    
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
				
				// $thumb = get_post_thumbnail_id();
				//$image = vt_resize( $thumb, '', 350, 350, true );
				
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-fifteen');
				$imagesrc = $image_data[0];
                ?>
        		<img src="<?php echo $imagesrc; ?>" width="350" height="350" />

                </div>
                <div class="col-md-8">
                    <div class="col-md-6 ">
                        <div class="author " ><?php  the_title(); ?> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social" style="float:right;">
                            <a href="https://www.facebook.com/NevantaMedia?fref=ts" target="newtab"><img src="<?php bloginfo('template_directory'); ?>/img/icon-fb.png"  alt="Facebook" class="newicon1"></a>
                            <a href="https://twitter.com/NevantaMedia" target="newtab" ><img src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png"  alt="Twitter" class="newicon1"></a>                    
                            <a href="https://instagram.com/nevantamedia/" target="newtab"><img src="<?php bloginfo('template_directory'); ?>/img/icon-insta.png"  alt="Instagram" class="newicon1"></a>
                            <a href="https://in.pinterest.com/nevantamedia/" target="newtab"><img src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png"  alt="Pinterest" class="newicon1" ></a>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="newauthor"><?php the_content(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top:2%;">

        <?php if (have_posts()) : ?>
            <div class="author1" >Videos of <?php echo $curauth->display_name; ?></div>
            <div class="row" >
                <div class="owl-carousel owl-theme stage-margin" data-plugin-options='{"items": 6, "margin": 10,"loop": false, "nav": true, "dots": false}'>
                    <?php
                    $aid = $curauth->data->ID;
                    query_posts("author=$aid");
                    while (have_posts()) : the_post();
                        ?>
                        <div class="col-md-12">
                            <a href="<?php echo get_permalink(); ?>"><?php echo the_post_thumbnail('medium'); ?></a>
                            <div>by  <?php the_author_link(); ?></div>
                            <a href="<?php echo get_permalink(); ?>"><p><?php the_title(); ?></p></a>
                        </div>
                        <?php endwhile; else : ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="container" style="padding-top:2%;">
        <div class="author1" >More Designer Profiles</div>
        <div class="row" style="">
           	<div class="owl-carousel owl-theme show-nav-hover" data-plugin-options='{"items": 4, "margin": 0, "loop": false, "nav": true, "dots": false}'>
                <?php
                $blogusers = get_users('orderby=rand&role=Fashion_designer&exclude=' . $curauth->data->ID);

                foreach ($blogusers as $user) {
                    ?>	
                    <div class="col-md-12" style="text-align:center;" >
                        <a href="<?php echo site_url(); ?>/author/<?php echo $user->user_nicename; ?>" style="color:#fff;">

                            <img src="<? echo userimage($user->ID,'300');?>" width="350" alt="username" /><br /><br />
                            <?php echo $user->display_name; ?>
                        </a>
                    </div>

                <?php } ?>

            </div>

        </div>
    </div>

<?php else:  
    get_template_part('template-parts/content', 'error'); ?>
    <?php endif ?>
    </div>
    </div>

<?php get_footer(); ?>
