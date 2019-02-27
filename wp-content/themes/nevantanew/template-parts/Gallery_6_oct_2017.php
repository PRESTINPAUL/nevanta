<?php
/*
  Template Name: Gallery
 */
get_header();

$_SESSION['main_cat_order'] = $_SESSION['designer_user'] = $_SESSION['order'] = $_SESSION['latest_main_cat_order'] = $_SESSION['latest_designer_user'] = $_SESSION['latest_order'] = $_SESSION['content_main_cat_order'] = $_SESSION['content_designer_user'] = $_SESSION['content_order'] = $_SESSION['tag_main_cat_order'] = $_SESSION['tag_designer_user'] = $_SESSION['tag_order'] = $_SESSION['old_id ']  = "";

if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
			{$_SESSION['gallery_main_cat_order']= $_REQUEST['main_cat_order'];$_SESSION['gallery_designer_user']="";}
else if(isset($_POST['main_cat_order']) && $_POST['main_cat_order']=='')
{
	$_SESSION['gallery_main_cat_order']="";
}
if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
$_SESSION['gallery_designer_user']= $_REQUEST['designer_user'];$_SESSION['gallery_main_cat_order']="";}
else if(isset($_POST['designer_user']) && $_REQUEST['designer_user'] == "")
{$_SESSION['gallery_designer_user']="";}
if(isset($_REQUEST['order'])){
	$_SESSION['gallery_order']= $_REQUEST['order'];
}
?>

<section class="gallery-section">

<div class="container">
    <div class="surf-video-txt col-md-12 nopad-left-right">
        <?php the_content(); ?>
    </div>
</div>

<div class="container nopad-left-right">
    <div class="col-md-12 searchbox nopad-left-right">   			
            <form name='latest' id="latest" method='post' action=''>
            	<div class="col-md-3 col-sm-3 col-xs-6 search_sort_left">
                <select name="main_cat_order" id="main_cat_order" class="blackbox fashion-dropdwon">
                     <!--<option value="" <?php if ($_REQUEST['main_cat_order'] == '') { ?> selected = "selected" <?php } ?>>Season/Fashion Show</option>-->
                     <option value="0">Season/Fashion Show</option>
                <?php
					$categories = get_terms( 'season', array(
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => 0,
						'offset' => 5
					)); ?>

				<?php
					
					if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
					 foreach ( $categories as $term ) {
						// echo '<pre>';print_r($term);
				?>
                 <option value="<?php echo $term->term_id; ?>" <?php if ($_REQUEST['main_cat_order'] == $term->term_id || $_SESSION['gallery_main_cat_order'] == $term->term_id) { ?> selected = "selected" <?php } ?>><?php echo $term->name; ?></option>
                <?php 
					 }} ?>
                </select>
            </div>
            
            <?php
			
			$user_array = array();
					//$designer_names_array = array();
					$args = array(
						'role'         => 'fashion_designer',
						'orderby'      => 'login',
						'order'        => 'ASC',
						'count_total'  => false,
						'fields'       => 'all',
						'who'          => ''
					 ); 
					$blogusers = get_users( $args );
					foreach ( $blogusers as $user ) {
						//echo '<pre>';print_r($user);
						$user_array[] = $user;
				
					}
					
					$designer_categories = get_terms( 'designer', array(
						'orderby'    => 'count',
						'hide_empty' => 0
					) );
					 foreach ( $designer_categories as $term ) {
						 $user_array[] = $term;
						
					 }
					 
					// $mypostids = array_merge( $user_array, $designer_array );
					foreach($user_array as $usss){
						//$name_keys = array('user_name','user_id');
					  if($usss->display_name != ""){
						  //$designer_names_array[] = array_fill_keys(array('user_name'), $usss->display_name);
					  $designer_names_array[] = array('user_id' => $usss->ID, 'user_name' => $usss->display_name);
					  }
					  if($usss->name != ""){
						//  $designer_names_array[] = array_fill_keys(array('user_name'), $usss->name);
					  //	 $designer_names_array[] = array_fill_keys(array('user_id'), $usss->term_id );
						 $designer_names_array[] = array('user_id' => $usss->term_id, 'user_name' => $usss->name);
					  }
					 
					
					 	
					}
					
					
function msort($array, $key, $sort_flags = SORT_REGULAR) {
    if (is_array($array) && count($array) > 0) {
        if (!empty($key)) {
            $mapping = array();
            foreach ($array as $k => $v) {
				
                $sort_key = '';
                if (!is_array($key)) {
                    $sort_key = $v[$key];
					
                } else {
                    // @TODO This should be fixed, now it will be sorted as string
                    foreach ($key as $key_key) {
                        $sort_key .= ucfirst($v[$key_key]);
						//ucfirst($sort_key);
                    }
                    $sort_flags = SORT_STRING;
                }
                $mapping[$k] = $sort_key;
            }
            asort($mapping, $sort_flags);
            $sorted = array();
            foreach ($mapping as $k => $v) {
                $sorted[] = $array[$k];
            }
            return $sorted;
        }
    }
    return $array;
}
				
$designer_names_arrayss = msort($designer_names_array, array('user_name'));
			?>
            
            <div class="col-md-3 col-sm-3 col-xs-6 search_sort_middle">
            	<select name="designer_user" id="designer_user" class="blackbox fashion-dropdwon">					
                    <?php 
					 foreach ( $designer_names_arrayss as $x => $term ) {
					
					 ?>
					 <option class="select_designer">Select Designer</option> 
                   <option value="<?php echo $term['user_id']; ?>" <?php if ($_REQUEST['designer_user'] == $term['user_id'] || $_SESSION['gallery_designer_user'] == $term['user_id']) { ?> selected = "selected" <?php } ?>><?php echo $term['user_name']; ?></option>
				  
                    <?php
					}
					 ?>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 search_sort_right">
                <div class="col-md-6 col-sm-6 col-xs-6 search_sort_by"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 nopad-left-right"><span class="sort-by-text">Sort by:</span>&nbsp;&nbsp;
					<select name="order" id="order" data-selectric-ignore class="blackbox fashion-dropdwon">					
						<option value="DESC" <?php if ($_REQUEST['order'] == "DESC" || $_SESSION['gallery_order'] == "DESC") { ?> selected = "selected" <?php } ?>>Latest</option>
						<option value="ASC" <?php if ($_REQUEST['order'] == "ASC" || $_SESSION['gallery_order'] == "ASC") { ?> selected = "selected" <?php } ?>>Oldest</option>
						<option value="VIEWS" <?php if ($_REQUEST['order'] == "VIEWS" || $_SESSION['gallery_order'] == "VIEWS") { ?> selected = "selected" <?php } ?>>Most Viewed</option>
					</select>
				</div>
            </div>
            </form>
        </div>
</div>

<div class="container magnific-slider-overlay">
    <div class="col-md-12 nopad-left-right">
         <?php      
           // $aid = 29 ;
			$display_count = 20;
            $cid = 29;
			$author_id = "";
			$taxonomy = 'category';
			$catID = $cid;
            //print_R($cid);
			if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
			{
				$catID = $_REQUEST['main_cat_order'];
				$taxonomy = 'season';
				$season_cat_name = get_cat_name($catID );
				$paged = 1;
				if($catID == 0)
				{
					$catID = 15;
					$taxonomy = 'category';
					$_SESSION['main_cat_order']="";
				}
			}
			else if(isset($_SESSION['gallery_main_cat_order']) && $_SESSION['gallery_main_cat_order'] != "")
			{
				$catID = $_SESSION['gallery_main_cat_order'];
				$taxonomy = 'season';
				$season_cat_name = get_cat_name($catID );
			}
			else{$catID = $cid;
			$taxonomy = 'category';}
			
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : $_SESSION['gallery_order'];
			
            //$args = array('posts_per_page' => 30, 'paged' => $paged);
			
			if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
				$author_id = $_REQUEST['designer_user'];
				$designer_cat = get_term_by('id', $author_id, 'designer');
				$designer_cat_name = $designer_cat->name;
				$catID = $cid;
				$taxonomy = 'category';
				$paged = 1;
				if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
			}
			else if(isset($_SESSION['gallery_designer_user']) && $_SESSION['gallery_designer_user'] != ""){
				$author_id = $_SESSION['gallery_designer_user'];
				$designer_cat = get_term_by('id', $author_id, 'designer');
				$designer_cat_name = $designer_cat->name;
				$catID = $cid;
				$taxonomy = 'category';
				if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
			}
			
			if((isset($_REQUEST['order']) && $order == "VIEWS") || (isset($_SESSION['gallery_order']) && $order == "VIEWS"))
			{ 
				$args = array(
				'post_type' => 'post',
                'posts_per_page'     => $display_count,
                'paged' => $paged,
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'wpb_post_views_count',
						'compare' => 'NOT EXISTS',
						'value' => ''
					),
					 array(
						 'key' => 'wpb_post_views_count',
						)
				),
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'terms' => $catID,
						'field' => 'term_id',
						),
						array(
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => array( 29 ),
							'operator' => 'IN',
						)
				),
                'orderby' => 'meta_value',
                'order'    => 'DESC',
				'author' => $author_id
           	 );	
				 $all_posts_args = array(
					'post_type' => 'post',
					'posts_per_page'     => -1,
					'paged' => $paged,
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'wpb_post_views_count',
							'compare' => 'NOT EXISTS',
							'value' => ''
						),
						 array(
							 'key' => 'wpb_post_views_count',
							)
					),
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29 ),
								'operator' => 'IN',
							)
					),
					'orderby' => 'meta_value',
					'order'    => 'DESC',
					'author' => $author_id
				 );
				 $results_all_posts = query_posts($all_posts_args);
			}
			else
			{
				$args = array(
					'post_type' => 'post',
					'posts_per_page'     => $display_count,
					'paged' => $paged,
					'orderby' => 'ID',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29 ),
								'operator' => 'IN',
							)
					),
					'order'    => (isset($order) && $order !='') ? $order : 'DESC',
					'author' => $author_id
				);
				$all_posts_args = array(
					'post_type' => 'post',
					'posts_per_page'     => -1,
					'paged' => $paged,
					'orderby' => 'ID',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29 ),
								'operator' => 'IN',
							)
					),
					'order'    => (isset($order) && $order !='') ? $order : 'DESC',
					'author' => $author_id
				);
				$results_all_posts = query_posts($all_posts_args);
			}
		//echo '<pre>'.print_r($args, true).'</pre>';
        $results = query_posts($args);
		$total_posts = count($results_all_posts);
		$total_query = count($results);
		$total_pages = intval($total_posts / $display_count) +1 ;
        while (have_posts()) : the_post();
		$autor_id = $post->post_author;
		$autordata = get_userdata($autor_id);
		$author_role = $autordata->roles[0];
            ?>
           <div class="gallery-cust-col gallerylist">
                <ul class="image-gallery sort-destination">
					<div class="gallery-feat-img">
                    	<?php						
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumb-second');
						$image_data_full = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');	
						?>
                     <a href="<?php echo $image_data_full[0]; ?>" title="<?php echo $post->post_title; ?>"  data-group="1" class="galleryItem lightbox-portfolio" >
						<img class="img-res" src="<?php echo $image_data[0]; ?>" />
                        </a>
					</div>               
                </ul>
			</div>
        <?php endwhile;	?>
	</div>
    
	<div class="col-md-12 nopad-left-right mar-top-20">
		<div style="float:right;">
			<?php
			
			$right_img = get_template_directory_uri().'/img/right.svg';
			$left_img = get_template_directory_uri().'/img/left.svg';
			
			if ($total_posts > $total_query) {
				
			   $current_page = max(1, get_query_var('paged'));
				echo paginate_links(array(
				   //'base' => get_pagenum_link(1) . '%_%',
				   'format' => 'page/%#%/',
				   'current' => $current_page,
				   'total' => $total_pages,
				   'prev_next' => true,				   
				   'end_size' => '3',
			   		'mid_size' => '2',
			   		'prev_text' => __('<img src="'.$left_img.'" class="left"> Prev '),
					'next_text' => __(' Next <img src="'.$right_img.'" class="right">')
				));
			}
			//wp_simple_pagination();
			// wp_reset_postdata();
			?>
		</div>
    </div>
</div>

<script>
	jQuery('#designer_user').on('change', function() {
	  jQuery("#main_cat_order").val("");
	})
	
	jQuery('#main_cat_order').on('change', function() {
	  jQuery("#designer_user").val("");
	})
</script>

<script>
jQuery('.fashion-dropdwon').selectric({ disableOnMobile: false,});

jQuery(document).ready(function(e) {
	var groups = {};
	jQuery('.galleryItem').each(function() {
		var id = parseInt(jQuery(this).attr('data-group'), 10);
	  
		if(!groups[id]) {
	    	groups[id] = [];
	  	} 
	  
	  	groups[id].push( this );
	});





	<?php $paged = get_query_var('paged'); ?>

	var _LAST_INDEX = false;
	
	jQuery.each(groups, function(i) {
		jQuery(this).magnificPopup({
			type: 'image',
			gallery: {
		      	enabled: true,
		      	tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
			},
			callbacks: {
				elementParse: function(item) {
					// item.index = item.index + <?php echo (($paged - 1) * $display_count); ?>;

					// return item;
				},
				change: function (magnific) {
					// var currIndex = magnific.index - <?php echo (($paged - 1) * $display_count); ?>,
					// 	maxIndex = <?php echo ($total_query - 1); ?>,
					// 	prevUrl = '<?php echo (($paged - 1) === 0 ? get_pagenum_link($total_pages) : get_pagenum_link($paged - 1)); ?>',
					// 	nextUrl = '<?php echo (($paged + 1) === ($total_pages + 1) ? get_pagenum_link(1) : get_pagenum_link($paged + 1)); ?>',
					// 	goTo = false;

					// if ((currIndex === 0) && (_LAST_INDEX === maxIndex)) {
					// 	goTo = nextUrl;
					// } else if ((currIndex === maxIndex) && (_LAST_INDEX === 0)) {
					// 	goTo = prevUrl;
					// }

					// if (goTo === false) {
					// 	_LAST_INDEX = currIndex;
					// } else {
					// 	var $ = jQuery;
					// 	var overlay = $('<div />').css({
					// 		backgroundColor: 'rgba(0,0,0,.7)',
					// 		position: 'absolute',
					// 		display: 'block',
					// 		left: '0px',
					// 		top: '0px',
					// 		width: '100%',
					// 		height: '100%',
					// 		zIndex: 1000
					// 	});

					// 	$('.magnific-slider-overlay').append(overlay);

					// 	this.close();

					// 	window.location.href = goTo;
					// }
				},
				close: function () {
					// _LAST_INDEX = false;
				}
			}
	  	});
	});
});
</script>
</section>
<?php
get_footer();
?>
