<!doctype html>
<html amp>
<head>
<meta charset="utf-8">
<link rel="dns-prefetch" href="https://cdn.ampproject.org">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="canonical" href="<?php echo get_permalink();?>" />
<script src="https://cdn.ampproject.org/v0.js" async></script>
<style amp-boilerplate>
body {
	-webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	-moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	-ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
	animation: -amp-start 8s steps(1, end) 0s 1 normal both
}
@-webkit-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-moz-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-ms-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@-o-keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
@keyframes -amp-start {
from {
visibility:hidden
}
to {
	visibility: visible
}
}
</style>
<noscript>
<style amp-boilerplate>
body {
	-webkit-animation: none;
	-moz-animation: none;
	-ms-animation: none;
	animation: none
}
</style>
</noscript>
<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"BlogPosting","mainEntityOfPage":"http:\/\/porch.technorigins.com\/facilities\/","publisher":{"@type":"Organization","name":"Porch","logo":{"@type":"ImageObject","url":"","height":36,"width":190}},"headline":"FACILITIES","datePublished":"2014-02-03T07:46:46+00:00","dateModified":"2014-02-04T07:37:21+00:00","author":{"@type":"Person","name":"admin"},"image":{"@type":"ImageObject","url":"http:\/\/porch.technorigins.com\/wp-content\/uploads\/2014\/02\/facilities-img-1_03.png","width":537,"height":207}}</script>
<!--<script async custom-element="amp-image-lightbox" src="https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js"></script>-->
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
<title>
<?php wp_title(); ?>
</title>
<?php include('head.php'); ?>
</head><?php
/*
  Template Name: Gallery
 */

if(isset($_SESSION)){
	$cur_id = get_the_ID();
	if($_SESSION['old_id '] == ''){
		$_SESSION['old_id '] = $cur_id; 
	}
	else{
		if($cur_id != $_SESSION['old_id ']){
			$_SESSION['gallery_main_cat_order'] = $_SESSION['gallery_order'] = $_SESSION['gallery_order'] = "";
			$_SESSION['old_id '] = $cur_id;
		}
	}	
}

//$_SESSION['main_cat_order'] = $_SESSION['designer_user'] = $_SESSION['order'] = $_SESSION['latest_main_cat_order'] = $_SESSION['latest_designer_user'] = $_SESSION['latest_order'] = $_SESSION['content_main_cat_order'] = $_SESSION['content_designer_user'] = $_SESSION['content_order'] = $_SESSION['tag_main_cat_order'] = $_SESSION['tag_designer_user'] = $_SESSION['tag_order'] = $_SESSION['old_id ']  = "";

	if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
	{
		$_SESSION['gallery_main_cat_order']= $_REQUEST['main_cat_order'];
		$_SESSION['gallery_designer_user']="";
	}elseif(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != "")
	{
		$_SESSION['gallery_designer_user']= $_REQUEST['designer_user'];
		$_SESSION['gallery_main_cat_order']="";
	}
	else if(isset($_POST['designer_user']) && $_REQUEST['designer_user'] == "")
	{
		$_SESSION['gallery_designer_user']="";
		$_SESSION['gallery_main_cat_order']="";
	}
	
	if(isset($_REQUEST['order'])){
		$_SESSION['gallery_order']= $_REQUEST['order'];
	}
?>
<body class="front-page">
<header class="container">
  <div class="banner-area">
    <div id="headerwrap">
      <div id="header">
        <div class="logo-container"> <a href="<?php echo site_url(); ?>">
          <amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png" width="50" height="64" alt="Nevanta"></amp-img>
          </a> </div>
      </div>
    </div>
  </div>
</header>
<?php include('menu.php');?>
<main>
  <section class="gallery-section">
    <div class="rightalign searchbox content-cat">
        <form id="main_cat" method="GET" name="main_cat" action="<?php echo the_permalink();?>" target="_top">              
            <div class="search_sort_left">
                <select name="main_cat_order" id="main_cat_order" class="blackbox fashion-dropdwon"  onchange="this.form.submit();">
                <option value="">Season/Fashion Show</option>
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
                 <option value="<?php echo $term->term_id; ?>" <?php if ($_REQUEST['main_cat_order'] == $term->term_id || $_SESSION['content_main_cat_order'] == $term->term_id) { ?> selected = "selected" <?php } ?>><?php echo $term->name; ?></option>
                <?php 
					 }} ?>                                      
                </select>
            </div>
           </form>    
      <?php			
					$user_array = array();				
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
						$user_array[] = $user;
					}
					
					$designer_categories = get_terms( 'designer', array(
						'orderby'    => 'count',
						'hide_empty' => 0
					) );
					 foreach ( $designer_categories as $term ) {
						 $user_array[] = $term;
						
					 }
					 
					foreach($user_array as $usss){
					  if($usss->display_name != ""){
					  $designer_names_array[] = array('user_id' => $usss->ID, 'user_name' => $usss->display_name);
					  }
					  if($usss->name != ""){
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
										foreach ($key as $key_key) {
											$sort_key .= ucfirst($v[$key_key]);
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
      <form id="designer" method="GET" action="<?php echo the_permalink();?>" target="_top">
        <div class="search_sort_middle">
          <select name="designer_user" id="designer_user" class="blackbox fashion-dropdwon" on="change:designer.submit">
           <option class="select_designer" value="">Select Designer</option>
            <?php foreach ( $designer_names_arrayss as $x => $term ) { ?>
            <option value="<?php echo $term['user_id']; ?>" <?php if ($_REQUEST['designer_user'] == $term['user_id'] || $_SESSION['content_designer_user'] == $term['user_id']) { ?> selected = "selected" <?php } ?>><?php echo $term['user_name']; ?></option>
            <?php } ?>
          </select>
        </div>
      </form>
      
      <!-- <form id="short" method="GET" action="<?php echo the_permalink();?>" target="_top">  
					<select data-selectric-ignore name="order" id="order" class="blackbox fashion-dropdwon" on="change:short.submit">
						<option class="select_designer">Select</option> 
						<option value="DESC" <?php if ($_REQUEST['order'] == "DESC" || $_SESSION['content_order'] == "DESC") { ?> selected = "selected" <?php } ?>>Latest</option>
						<option value="ASC" <?php if ($_REQUEST['order'] == "ASC" || $_SESSION['content_order'] == "ASC") { ?> selected = "selected" <?php } ?>>Oldest</option>
						<option value="VIEWS" <?php if ($_REQUEST['order'] == "VIEWS" || $_SESSION['content_order'] == "VIEWS") { ?> selected = "selected" <?php } ?>>Most Viewed</option>
					</select>				
            </form>--> 
      
    </div>
    <div class="container gallerypage">
      <?php             
				$display_count = 20;
				$cid = 29;
				$author_id = "";
				$taxonomy = 'category';
				$catID = $cid;           
				            
							        
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : $_SESSION['gallery_order'];			           
                   
				
				if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
				{
					$catID = $_REQUEST['main_cat_order'];
					$taxonomy = 'season';
					$season_cat_name = get_cat_name($catID );
					//$paged = 1;
				}
				/*else if(isset($_SESSION['gallery_main_cat_order']) && $_SESSION['gallery_main_cat_order'] != "")
				{
					$catID = $_SESSION['gallery_main_cat_order'];
					$taxonomy = 'season';
					$season_cat_name = get_cat_name($catID );
				}*/
				else{$catID = $cid; $taxonomy = 'category';}   
				   
				    
				if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
					$author_id = $_REQUEST['designer_user'];
					$designer_cat = get_term_by('id', $author_id, 'designer');
					$designer_cat_name = $designer_cat->name;
					$catID = $cid;
					$taxonomy = 'category';
					//$paged = 1;
					if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
				}
				/*else if(isset($_SESSION['gallery_designer_user']) && $_SESSION['gallery_designer_user'] != ""){
					$author_id = $_SESSION['gallery_designer_user'];
					$designer_cat = get_term_by('id', $author_id, 'designer');
					$designer_cat_name = $designer_cat->name;
					$catID = $cid;
					$taxonomy = 'category';
					if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
				}*/
                  
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
                $results = query_posts($args);
                $total_posts = count($results_all_posts);
                $total_query = count($results);
                $total_pages = intval($total_posts / $display_count) +1 ;
                while (have_posts()) : the_post();
                $autor_id = $post->post_author;
                $autordata = get_userdata($autor_id);	
                $author_role = $autordata->roles[0];           
                $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $imagename = basename($image_data[0]);                        
				if (MobileDTS::is('mobile') || MobileDTS::is('android')) {
					$thumb_width = 136;
					$thumb_height = 145;
				}
				else{
					$thumb_width = 206;
					$thumb_height = 206;
				}				
				?>
      <div class="gallery">
        <ul class="image-gallery sort-destination">
          <div class="gallery-feat-img">
            <?php 								
                                $parts = explode('.', $image_data[0]);
                                $last = array_pop($parts);
                                $parts = array(implode('.', $parts), $last);
                             	$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;	
								/*$imagesrc = $parts[0].'.'.$last;	*/							
                                ?>
            <!--<a href="<?php echo $image_data[0]; ?>" title="<?php echo $post->post_title; ?>"  data-group="1" class="galleryItem lightbox-portfolio">  --> 
            <a href="<?php echo get_permalink(); ?>">
            <amp-img layout="responsive" class="img-res" src="<?php echo $imagesrc; ?>" width="87" height="87"></amp-img>
            </a> 
            
            <!--<amp-img on="tap:lightbox1" role="button" layout="responsive"  tabindex="0" class="img-res" on="tap:my-lightbox.close" src="<?php echo $imagesrc; ?>" width="87" height="87"></amp-img>  --> 
            
            <!--<amp-image-lightbox id="lightbox1"  layout="nodisplay"></amp-image-lightbox>--> 
            <!--</a>--> 
          </div>
        </ul>
      </div>
      <?php endwhile; ?>
      <div class="con_right">
        <?php
                    if ($total_posts > $total_query) {				
                       $current_page = max(1, get_query_var('paged'));
                        echo paginate_links(array(				 
                           'format' => 'page/%#%/',
                           'current' => $current_page,
                           'total' => $total_pages,
                           'prev_next' => true,
                           'prev_text' => __('Previous '),
                            'next_text' => __(' Next'),
                           'before_page_number' => ' | '
                        ));
                    }			
                    ?>
      </div>
    </div>
  </section>
</main>
<footer class="container">
  <div class="social-footer">
    <ul class="social-icons-footer">
      <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-fb.png" height="36" width="36" alt="Facebook"></amp-img>
        </a></li>
      <li><a href="https://twitter.com/NevantaMedia" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-tw.png" height="36" width="36" alt="Twitter"></amp-img>
        </a></li>
      <li><a href="https://instagram.com/nevantamedia/" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-insta.png" height="36" width="36" alt="Instagram"></amp-img>
        </a></li>
      <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank">
        <amp-img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/icon-pinterest.png" height="36" width="36" alt="Pinterest"></amp-img>
        </a></li>
    </ul>
  </div>
  <div class="partfirst"> <span class="copy">©2016 Nevanta Ltd</span> <span class="terms-menu"><a href="https://www.nevanta.com/terms-and-conditions/">Terms</a> | <a href="https://www.nevanta.com/privacy-policy/">Privacy Policy</a></span> </div>
  <div id="footer" class="footer-menu">
    <?php
            wp_nav_menu( array(
                'menu' => 'footer'
            ) ); 
        ?>
  </div>
</footer>

<!--Plugin Version :0.9.31 -->
<amp-analytics type="googleanalytics" id="analytics1"> 
  <script type="application/json">
        {
          "vars": {
            "account": "UA-XXXXX-Y"
          },
          "triggers": {
            "trackPageview": {
              "on": "visible",
              "request": "pageview"
            }
          }
        }
        </script> 
</amp-analytics>
</body>
</html>
