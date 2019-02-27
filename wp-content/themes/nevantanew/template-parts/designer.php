<?php
/*
  Template Name: designer
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
    <div class="col-md-12 searchuser-by-alphabet nopad-left-right">
    <!--<div class="surf-video-txt">
    <?php while (have_posts()) : the_post(); ?>
        <?php remove_filter ('the_content',  'wpautop'); ?>
        <h2><?php the_content(); ?></h2>
    <?php endwhile; ?>
    </div>-->
        <?php
        $i = 65;
        for ($i; $i <= 90; $i++) {
            //echo '<span style="padding:10px;"><a href="/searchuser?a=' . chr($i) . '">' . chr($i) . '</a></span>';
			echo '<span><a href="/searchuser?a=' . chr($i) . '">' . chr($i) . '</a></span>';
        }
        ?>
    </div>

<div class="col-md-12 nopad-left-right">
	<!--<div class="col-md-12">-->
<?php
$number = 25;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('posts_per_page' => 25, 'paged' => $paged);

query_posts($args);
$offset = ($paged - 1) * $number;
$users = get_users('&role=Fashion_designer');
$query = get_users('&offset=' . $offset . '&number=' . $number . 'orderby=nicename&role=Fashion_designer');
$total_users = count($users);
$total_query = count($query);
$total_pages = intval($total_users / $number) +1 ;

foreach ($query as $user) { 
    ?>
	
			<div class="custom-col-designer designer-page">
				<a href="<?php echo site_url(); ?>/designer/<?php echo $user->user_nicename; ?>" >
					<?php 					
					$image_data = get_user_meta($user->ID, 'cupp_upload_meta');
					$imagesrc = $image_data[0];
					?>                                        					
                    <img class="img-res" src="<?php echo $imagesrc; ?>" height="211.4" alt="<?php echo $user->display_name; ?>" />					
					<span class="designer-name col-md-12"><?php echo $user->display_name; ?></span>
				</a>
			</div>
        

    <?php } ?>
		<!--</div>-->
</div>
</div>

<!--<div class="container nopad-left-right single-div-after-video-slider">
    <div class="col-md-12 col-sm-12 single-page-line-desinger nopad-left-right"><hr/></div>
</div> -->

<div class="container nopad-left-right">
    <div style="float:right;">
<?php
	$right_img = get_template_directory_uri().'/img/right.svg';
	$left_img = get_template_directory_uri().'/img/left.svg';
		
 if ($total_users > $total_query) {
            //echo '<div id="pagination" class="clearfix">';
           // echo '<span class="pages">Pages:</span>';
          
           $current_page = max(1, get_query_var('paged'));
         //  $big = 999999999; // need an unlikely integer
           echo paginate_links(array(
               'base' => get_pagenum_link(1) . '%_%',
               'format' => 'page/%#%/',
               'current' => $current_page,
               'total' => $total_pages,
               'prev_next' => true,
			   'end_size' => '3',
			   'mid_size' => '2',
				'prev_text' => __('<img src="'.$left_img.'" class="left"> Previ '),
				'next_text' => __(' Next <img src="'.$right_img.'" class="right">')
           ));
          //echo '</div>';
 }
?>
    </div>
</div>

<script>
/*jQuery(".custom-col-designer.designer-page:nth-child(5n+0)").after(function() {
  return "<div class='col-md-12 col-sm-12 single-page-line-desinger nopad-left-right'><hr/></div>";
});*/
</script>

<?php
get_footer();
?>