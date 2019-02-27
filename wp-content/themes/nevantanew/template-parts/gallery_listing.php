<?php
if(empty($selected_season_id) && empty($selected_designer_id)){
$args = array( 'numberposts' => -1, 'post_type' => 'post', 'post_status' => 'published', 
    'tax_query' => array(
    array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $selected_cat_id,
        'include_children' => 'false', 
    )
));
}elseif(empty($selected_season_id)){

$args = array( 'numberposts' => -1, 'post_type' => 'post', 'post_status' => 'published', 
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $selected_cat_id,
        'include_children' => 'false', 
    ),
    array(
        'taxonomy' => 'designer',
        'field'    => 'term_id',
        'terms'    => $selected_designer_id,
        'include_children' => 'false',
    )
));

}elseif(empty($selected_designer_id)){

$args = array( 'numberposts' => -1, 'post_type' => 'post', 'post_status' => 'published', 
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $selected_cat_id,
        'include_children' => 'false', 
    ),
    array(
        'taxonomy' => 'season',
        'field'    => 'term_id',
        'terms'    => $selected_season_id,
        'include_children' => 'false',
    )
));


}
else{
$args = array( 'numberposts' => -1, 'post_type' => 'post', 'post_status' => 'published', 
    'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $selected_cat_id,
        'include_children' => 'false', 
    ),
    array(
        'taxonomy' => 'season',
        'field'    => 'term_id',
        'terms'    => $selected_season_id,
        'include_children' => 'false',
    ),
    array(
        'taxonomy' => 'designer',
        'field'    => 'term_id',
        'terms'    => $selected_designer_id,
        'include_children' => 'false',
    )
));
}



$sub_tax_terms = get_terms( array(
    'taxonomy' => 'gallery_season',
    'hide_empty' => true,
) );


$objects = get_posts($args);
$post_ids = wp_list_pluck( $objects, 'ID' );
$gallery_season_terms = wp_get_object_terms( $post_ids, 'category' );



//print_r($objects);

    foreach($objects as $valueKey => $value) {

        if( !is_object_in_term($value->ID,'season','Amazon India Couture Week 2015') ) {
            unset($objects[$valueKey]);
        } 
    }




$years = array();
foreach ($objects as $post){
    $year = get_the_time('Y', $post->ID); //Echos date in Y-m-d format.
    if ( ! isset( $years[ $year ] ) ) $years[ $year ] = array();
      $years[ $year ][] = $post;
}


  print_r($years);  




?>




<?php
foreach($gallery_season_terms as $list_terms){?>
<a  onclick="submit_special_category('<?php echo $list_terms->term_id ?>')"><?php echo $list_terms->name; ?></a>
<?php
}
?>
		<div class="col-md-12 nopad-left-right">
			<?php
			foreach ($objects as $gal_post) {
				?>
				<div class="col-md-3  image-gallery sort-destination lightbox popup-gallery bordernone" data-sort-id="portfolio">

					<?php						 												
					$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($gal_post->ID), 'gallery-thumb-images');							
					$imagesrc = $image_data[0];
					$image_data_full = wp_get_attachment_image_src(get_post_thumbnail_id($gal_post->ID), 'full');
					?>	
					<a href="<?php echo $image_data_full[0]; ?>" class="lightbox-portfolio">
							<div class="innerpage-video-img">
								<img class="img-res" src="<?php echo $imagesrc; ?>" width="206" height="206">
							</div>                         
							<div class="title-post-inner-page">
								<?php echo $gal_post->post_title; ?>
							</div>                                    
						</a>
					</div>
					<?php }?>
				</div>
			</div>
		</div>