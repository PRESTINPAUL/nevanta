<?php
/*
  Template Name: searchuser
 */
get_header();
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
<div class="container">
    <div class="row">
        <div class="col-md-12 searchuser-by-alphabet nopad-left-right">
            <?php
            $i = 65;
            for ($i; $i <= 90; $i++) {											
					echo '<span>';
					//echo $qa;
					//echo $carct = chr($i);
					if ($qa == chr($i)){?>
						<style>a.latter-color{color:#E50D91 !important;}</style><?php
						echo '<a class="latter-color" href="/searchuser?a=' . chr($i) . '">' . chr($i) . '</a>';
					}else{
						echo '<a href="/searchuser?a=' . chr($i) . '">' . chr($i) . '</a>';
					}
					echo '</span>';
            }
            ?>
        </div>
    </div>
    
    <div class="col-md-12 nopad-left-right">
        <?php
        //  $blogusers = get_users('search=' . $qa . '*&role=Fashion_designer');
			global $wpdb;
			 $querystr = "SELECT wp_users.* FROM wp_users INNER JOIN wp_usermeta ON ( wp_users.ID = wp_usermeta.user_id ) WHERE 1=1 AND ( ( ( wp_usermeta.meta_key = 'wp_capabilities' AND CAST(wp_usermeta.meta_value AS CHAR) LIKE '%\"Fashion\\_designer\"%' ) ) ) AND (display_name LIKE '".esc_attr($qa)."%') ORDER BY user_login ASC ";

			 $blogusers = $wpdb->get_results($querystr, OBJECT);
		//echo '<pre>'.print_r($blogusers, true).'</pre>';die;
        /*$users = new WP_User_Query(array(
            'search' => esc_attr($qa) . '*',
            'search_columns' => array(
                'display_name'
            ),
            'role' => 'Fashion_designer'
        ));
		echo '<pre>'.print_r($users, true).'</pre>';
        $blogusers = $users->get_results();*/
		
        foreach ($blogusers as $user) {
            ?>	
            <div class="custom-col-designer designer-page">
                <a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >
                    <?php //echo get_avatar($user->ID, 200); ?> 
					<?php
						/*$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
						$parts_upload = explode('uploads', $image_data[0]);
						$thumb_width = 198;
						$thumb_height = 213;					
						$path = 'http://s3-eu-west-1.amazonaws.com/nevanta-test/uploads'.$parts_upload[1];
						$nevanta_lambda = 'http://s3-eu-west-1.amazonaws.com/nevanta-lambda/uploads'.$parts_upload[1];
						
						if (@getimagesize($path)) {
							$imagesrc = $path;
						}elseif(@getimagesize($nevanta_lambda)){						
							$imagesrc = $nevanta_lambda;
						}else{
							$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
							$imagesrc = $image_data[0];
						}*/
												
						//$imgURL = get_cupp_meta($user->ID, array(220, 220));
						//$thumb = get_cupp_meta($user->ID, 'full'); 
						//$image = vt_resize( '', $thumb, 198, 213, true );
						
						$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
						$imagesrc = $image_data[0];
					?>
					<!--<img class="img-res" src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" alt="username" />-->
                    <img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" alt="username" />
					
                    <span class="designer-name col-md-12"><?php echo $user->display_name; ?></span>
                </a>
            </div>

            <?php
        }
        if (empty($blogusers)) {            // echo get_template_part('template-parts/content', 'none'); ?>

		   <section class="no-results not-found">
	
    <div class="container">
    <div class="col-md-12">
   
	<div class="page-content serachuser-text">
		<h2>Looks like we don't have any designers in <?php echo $qa;?></h2>
	</div><!-- .page-content -->
    
    </div>
    </div>
</section>
<?php
        }
        ?>
    </div>
    <div class="page">
        <?php
        wp_simple_pagination();
        ?>
    </div>
</div>


    <?php get_footer(); ?>
