<?php
/*
  Template Name: New designer
 */
get_header();
if (isset($_GET['a'])) {
    $qa = $_GET['a'];
} else {
//header("location:designer1");
}

//echo ".........".$qa;
?>

<div class="container" >
    <div class="row">
        <div class="col-md-12" style="text-align:center;">
            <?php
            $i = 65;
            for ($i; $i <= 90; $i++) {
                echo '<span style="padding:10px;"><a href="/searchuser?a=' . chr($i) . '">' . chr($i) . '</a></span>';
            }
            ?>
        </div>
    </div>


<?php
$number = 16;
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$paged = 'fashion-designers';
$args = array('posts_per_page' => 16, 'post_type' => 'fashion-designers');

/*query_posts($args);
$offset = ($paged - 1) * $number;
$users = get_users();
$query = get_users('&offset=' . $offset . '&number=' . $number . 'orderby=nicename&role=Fashion_designer');
$total_users = count($users);
$total_query = count($query);
$total_pages = intval($total_users / $number) +1 ;*/

$query = new WP_Query($args);

//foreach ($query as $user) {
	
	
   
	while($query->have_posts()): $query->the_post();		
	/*$thumb = get_post_thumbnail_id();
	$image = vt_resize( $thumb, '', 220, 220, true );*/
	
	$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-thirteen');
	$imagesrc = $image_data[0];
    ?>
        <div class="col-md-3 designer" >
       
            <a href="<?php echo the_permalink(); ?>" > 
  				<img src="<?php echo $imagesrc; ?>" width="220" height="220" />
                <br /><br/>
                  <?php  the_title(); ?>
            </a>
        </div>

    <?php
endwhile;
wp_reset_query();
?>
</div>
<div class="container">
    <div class="row" style="float:right;">
<?php

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
              //'type' => 'list',
           ));
          echo '</div>';
 }
//wp_simple_pagination();
// wp_reset_postdata();
?>
    </div>
</div>


<?php
get_footer();
?>
 






