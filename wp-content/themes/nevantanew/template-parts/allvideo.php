<?php
/*
  Template Name: allvideo
 */
get_header();

$_SESSION['latest_main_cat_order'] = $_SESSION['latest_designer_user'] = $_SESSION['latest_order'] = $_SESSION['content_main_cat_order'] = $_SESSION['content_designer_user'] = $_SESSION['content_order'] = $_SESSION['gallery_main_cat_order'] = $_SESSION['gallery_designer_user'] = $_SESSION['gallery_order'] = $_SESSION['tag_main_cat_order'] = $_SESSION['tag_designer_user'] = $_SESSION['tag_order'] = $_SESSION['old_id '] = "";

if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
			{$_SESSION['main_cat_order']= $_REQUEST['main_cat_order'];$_SESSION['designer_user']="";}
else if(isset($_POST['main_cat_order']) && $_POST['main_cat_order']=='')
{
	$_SESSION['main_cat_order']="";
}
if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
$_SESSION['designer_user']= $_REQUEST['designer_user'];$_SESSION['main_cat_order']="";}
else if(isset($_POST['designer_user']) && $_REQUEST['designer_user'] == "")
{$_SESSION['designer_user']="";}
if(isset($_REQUEST['order'])){
	$_SESSION['order']= $_REQUEST['order'];
	//$paged = 1;	
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="surf-video-txt">
				<?php while (have_posts()) : the_post(); ?>
                    <?php remove_filter ('the_content',  'wpautop'); ?>
                    <h2><?php the_content(); ?></h2>
                <?php endwhile; ?>
            </div>            
        </div>
    </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 rightalign searchbox content-cat nopad-left-right">      
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
            <option value="<?php echo $term->term_id; ?>" <?php if ($_REQUEST['main_cat_order'] == $term->term_id || $_SESSION['main_cat_order'] == $term->term_id) { ?> selected = "selected" <?php } ?>><?php echo $term->name; ?></option>
            <?php 
					 }} ?>
            
            <!-- <option value="2" <?php //if ($_REQUEST['main_cat_order'] == 2) { ?> selected = "selected" <?php //} ?>>Season</option>
                    <option value="16" <?php //if ($_REQUEST['main_cat_order'] == 16) { ?> selected = "selected" <?php //} ?>>Fashion Shows</option>
                    -->
          </select>
        </div>
        <?php
			/*global $wpdb;
					$results = $wpdb->get_results( 'SELECT  wp_users.ID, wp_users.display_name, wp_term_taxonomy.term_id FROM wp_users JOIN wp_term_taxonomy WHERE wp_term_taxonomy.taxonomy = "designer"');
					echo '<pre>';print_r($results);*/
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
					//uasort($designer_names_array);
					//echo '<pre>';print_r($designer_names_array);
			//		echo '<pre>';print_r($designer_names_arr);
			?>
        <div class="col-md-3 col-sm-3 col-xs-6 search_sort_middle">
          <select name="designer_user" id="designer_user" class="blackbox fashion-dropdwon">
            <?php 
					 foreach ( $designer_names_arrayss as $x => $term ) {
					
					 ?>
            <option class="select_designer">Select Designer</option>
            <option value="<?php echo $term['user_id']; ?>" <?php if ($_REQUEST['designer_user'] == $term['user_id'] || $_SESSION['designer_user'] == $term['user_id']) { ?> selected = "selected" <?php } ?>><?php echo $term['user_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        
        <div class="col-md-6 col-sm-6 search_sort_right">
          <div class="col-md-6 col-sm-6 col-xs-6 search_sort_by"></div>
          <div class="col-md-6 col-sm-6 col-xs-6 search_sort_by_order_latestvideo"><span class="sort-by-text">Sort by:</span>&nbsp;&nbsp;
            <select data-selectric-ignore name="order" id="order" class="blackbox fashion-dropdwon">            
              <option value="DESC" <?php if ($_REQUEST['order'] == "DESC" || $_SESSION['order'] == "DESC") { ?> selected = "selected" <?php } ?>>Latest</option>
              <option value="ASC" <?php if ($_REQUEST['order'] == "ASC" || $_SESSION['order'] == "ASC") { ?> selected = "selected" <?php } ?>>Oldest</option>
              <option value="VIEWS" <?php if ($_REQUEST['order'] == "VIEWS" || $_SESSION['order'] == "VIEWS") { ?> selected = "selected" <?php } ?>>Most Viewed</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container"> 
  <div class="row">
  <div class="col-md-12 nopad-left-right"> 
  <?php      
       //wp_reset_query();
	   //$display_count = 30;
	   $display_count = 32;
	   // Next, get the current page
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		// calculate the offset
		//$offset = ( $paged - 1 ) * $display_count;
	  
	   		//$paged = (get_query_var('paged') && get_query_var('paged') > 1) ? get_query_var('paged') : 1;
			//echo 'paged: '.$paged;
			/*if($paged > 1){
				 $offset = ($number * ($paged - 1) + 1) - $number; }
				  else { $offset = 0; }
			echo 'Offset: '.$offset;
           	*/$catID = 15;
			$author_id = "";
            //print_R($cid);
			
            if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
			{
				$catID = $_REQUEST['main_cat_order'];
				$_SESSION['main_cat_order']= $_REQUEST['main_cat_order'];
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
			else if(isset($_SESSION['main_cat_order']) && $_SESSION['main_cat_order'] != "")
			{
				$catID = $_SESSION['main_cat_order'];
				$taxonomy = 'season';
				$season_cat_name = get_cat_name($catID );
			}
			else{$catID = 15;$taxonomy = 'category';}
           /* Order by */
            $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : $_SESSION['order'];
						
		
			if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
				$author_id = $_REQUEST['designer_user'];
				$_SESSION['designer_user']= $_REQUEST['designer_user'];
				$designer_cat = get_term_by('id', $author_id, 'designer');
				$designer_cat_name = $designer_cat->name;
				$catID = 15;
				$taxonomy = 'category';
				$paged = 1;
				if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
			}
			else if(isset($_SESSION['designer_user']) && $_SESSION['designer_user'] != ""){
				
				$author_id = $_SESSION['designer_user'];
				$designer_cat = get_term_by('id', $author_id, 'designer');
				$designer_cat_name = $designer_cat->name;
				$catID = 15;
				$taxonomy = 'category';
				if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
			}
			if((isset($_REQUEST['order']) && $order == "VIEWS") || (isset($_SESSION['order']) && $order == "VIEWS"))
			{ 
				$args = array(
				'post_type' => 'post',
                'posts_per_page'     => $display_count,
				//'offset'            => $offset,
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
							'terms'    => array( 29, 1 ),
							'operator' => 'NOT IN',
						)
				),
                'orderby' => 'meta_value',
                'order'    => 'DESC',
				'author' => $author_id
           	 );	
			 
				$all_posts_args = array(
					'post_type' => 'post',
					'posts_per_page'     => -1,
					//'offset'            => $offset,
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
								'terms'    => array( 29, 1 ),
								'operator' => 'NOT IN',
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
					'posts_per_page'     => $display_count,
					//'offset'            => $offset,
					'paged' => $paged,
					'orderby' => 'date',
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29, 1 ),
								'operator' => 'NOT IN',
							)
					),
					'order'    => (isset($order) && $order !='') ? $order : 'DESC',
					'author' => $author_id
				);	
				$all_posts_args = array(
					'posts_per_page'     => -1,
					//'offset'            => $offset,
					'paged' => $paged,
					'orderby' => 'date',
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29, 1 ),
								'operator' => 'NOT IN',
							)
					),
					'order'    => (isset($order) && $order !='') ? $order : 'DESC',
					'author' => $author_id
				 );
				 $results_all_posts = query_posts($all_posts_args);
			}			
			$results = query_posts($args);
			$total_posts = count($results_all_posts);
			$total_query = count($results);
			$total_pages = intval($total_posts / $display_count) +1 ;
        while (have_posts()) : the_post();		
		$autor_id = $post->post_author;
		$autordata = get_userdata($autor_id);
		$author_role = $autordata->roles[0];
            ?>
  <?php if(get_post_type( get_the_ID() ) != "page" ){ ?>
  <div class="col-md-3">
    <a href="<?php echo get_permalink(); ?>">
    <div class="innerpage-video-img">
		<?php  $image_data[0] = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID) , 'blog-thumb-twentythree');?>
        <img class="img-res" src="<?php echo $image_data[0][0]; ?>" width="272" height="153" />
        <div class="video-play-btn-inner-page">
            <img src="<?php echo get_template_directory_uri(); ?>/img/play.svg" class="play-inner-page">                  
        </div>
     </div>                         
     <div class="title-post-inner-page"><?php echo $post->post_title; ?></div>
    </a>         
  </div>
  <?php }?>  
  
  <?php endwhile;
  
  wp_reset_postdata();?>  
  </div>
  </div>
</div>

<div class="container nopad-left-right">
  <div style="float:right;">
  	<?php //wp_paginate(); ?>
    <?php		
	$right_img = get_template_directory_uri().'/img/right.svg';
	$left_img = get_template_directory_uri().'/img/left.svg';		
		
	if($total_posts > $total_query) { 
	   $current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
		   'base' => get_pagenum_link(1) . '%_%',
		   'format' => 'page/%#%/',
		   'current' => $current_page,
		   'total' => $total_pages,
		   'prev_next' => true,						  
		   'end_size' => '1',
		   'mid_size' => '3',
		   'prev_text' => __('<img src="'.$left_img.'" class="left"> Previ '),
			'next_text' => __(' Next <img src="'.$right_img.'" class="right">')
		   //'before_page_number' => ' | '
		));
	}  	
        ?>
  </div>
</div>

<script>
   /* jQuery( "a.title-post-inner-page" ).on( "hover", function() {    
        jQuery( ".title-post-inner-page" ).animate({ color: "#E50D93"},500);
    });*/
</script>

<script>
	jQuery('#designer_user').on('change', function() {
	  jQuery("#main_cat_order").val("");
	})
	
	jQuery('#main_cat_order').on('change', function() {
	  jQuery("#designer_user").val("");
	})
</script> 
<script type="text/javascript">
	jQuery('.fashion-dropdwon').selectric({ disableOnMobile: false,});
	</script>
<?php
get_footer();
?>
