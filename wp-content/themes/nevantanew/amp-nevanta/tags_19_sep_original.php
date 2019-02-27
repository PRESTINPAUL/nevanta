<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">    
	<link rel="canonical" href="<?php echo array_shift(explode('?', home_url( add_query_arg( NULL, NULL ) )));//get_term_link($tag->slug,'post_tag');?>" />
	<script src="https://cdn.ampproject.org/v0.js" async></script>        
	<style amp-boilerplate>
		body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>        
        
	 <?php 		
		$post_types = get_post_type( get_the_ID() ); 
		$modified_date =  get_the_modified_date('n-j-Y', get_the_ID());
		$publish_date = date('n-j-Y', strtotime(get_the_date()));
		
		global $post;
		$post_tmp = get_post(get_the_ID());
		$author_id = $post_tmp->post_author;
		$user_info = get_userdata($author_id);
		$author_type = implode(', ', $user_info->roles);
		$username = $user_info->user_login;
		
		$metadata = array(
			'@context' => 'http://schema.org',
			'@type' => 'BlogPosting',
			'mainEntityOfPage' => get_permalink(),
			'publisher' => array(
				'@type' => $post_types,
				'name' => 'Nevanta',
			),
			'headline' => get_the_title(),
			'datePublished' => date( 'c', $publish_date ),
			'dateModified' => date( 'c', $modified_date ),
			'author' => array(
				'@type' => $author_type,
				'name' => $username,
			),
		);?>
        
        <script type="application/ld+json"><?php echo json_encode( $metadata ); ?></script>
               
<title>
    <?php wp_title(); ?>
</title>                                   
<?php include('head.php'); ?>
</head>
<body class="front-page tagpage">
    <header class="container">    
          <div class="banner-area">      
              <div id="headerwrap">
                <div id="header">                
                    <div class="logo-container">
                        <a href="<?php echo site_url(); ?>"><amp-img src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png" width="50" height="64" alt="Nevanta"></amp-img></a>
                    </div>            
                </div>
              </div>
          </div>  
        </header>
    <?php include('menu.php');?>    
<?php //get_header();
if(isset($_SESSION)){			
	$cur_id = get_the_ID();
	if($_SESSION['old_id '] == ''){
		$_SESSION['old_id '] = $cur_id; 
	}
	else{
		if($cur_id != $_SESSION['old_id ']){
			$_SESSION['content_main_cat_order'] = $_SESSION['content_order'] = $_SESSION['content_order'] = "";
			$_SESSION['old_id '] = $cur_id;
		}
	}
}   
$_SESSION['main_cat_order'] = $_SESSION['designer_user'] = $_SESSION['order'] = $_SESSION['latest_main_cat_order'] = $_SESSION['latest_designer_user'] = $_SESSION['latest_order'] = $_SESSION['content_main_cat_order'] = $_SESSION['content_designer_user'] = $_SESSION['content_order'] = $_SESSION['gallery_main_cat_order'] = $_SESSION['gallery_designer_user'] = $_SESSION['gallery_order'] = $_SESSION['old_id '] = "";

if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
{$_SESSION['tag_main_cat_order']= $_REQUEST['main_cat_order'];$_SESSION['tag_designer_user']="";}
else if(isset($_POST['main_cat_order']) && $_POST['main_cat_order']=='')
{
	$_SESSION['tag_main_cat_order']="";
}
if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
$_SESSION['tag_designer_user']= $_REQUEST['designer_user'];$_SESSION['tag_main_cat_order']="";}
else if(isset($_POST['designer_user']) && $_REQUEST['designer_user'] == "")
{$_SESSION['tag_designer_user']="";}
if(isset($_REQUEST['order'])){
	$_SESSION['tag_order']= $_REQUEST['order'];
}
?>

<div class="container">
    <div id="primary" class="content-area">
      <main>   
        
        <div class="col-md-12 tags-header">
                <header class="tag-header">                	
                    <h1 class="page-title">  Tag : </h1>	 <h1 class="tag-name"> <?php single_tag_title(); ?> </h1>
                    <?php   the_archive_description('<div class="taxonomy-description">', '</div>');?>
                </header><!-- .page-header -->
            </div>
        
        <div class="container">
          <div class="row">
            <?php
                        //global $wp_query;						
						$catID = get_query_var('tag_id');
						$display_count = 30;
						$author_id = "";
						$taxonomy = 'post_tag';
						
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : $_SESSION['tag_order'];
						
						if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
						{
							$catID = $_REQUEST['main_cat_order'];
							$taxonomy = 'season';
							$season_cat_name = get_cat_name($catID );
							$paged = 1;
							}
						else if(isset($_SESSION['tag_main_cat_order']) && $_SESSION['tag_main_cat_order'] != "")
						{
							$catID = $_SESSION['tag_main_cat_order'];
							$taxonomy = 'season';
							$season_cat_name = get_cat_name($catID );
							}
							else{$catID = get_query_var('tag_id');
							$taxonomy = 'post_tag';
						}
						
						if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
							$author_id = $_REQUEST['designer_user'];
							$designer_cat = get_term_by('id', $author_id, 'designer');
							$designer_cat_name = $designer_cat->name;
							$catID = get_query_var('tag_id');
							$taxonomy = 'post_tag';
							$paged = 1;
							if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
						}
						if(isset($_SESSION['tag_designer_user']) && $_SESSION['tag_designer_user'] != ""){
							$author_id = $_SESSION['tag_designer_user'];
							$designer_cat = get_term_by('id', $author_id, 'designer');
							$designer_cat_name = $designer_cat->name;
							$catID = get_query_var('tag_id');
							$taxonomy = 'post_tag';
							if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}
						}
						
						
						if(isset($_REQUEST['order']) && $order == "VIEWS")
						{ 
							$args = array(
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
									)
							),
							'orderby' => 'meta_value',
							'order'    => 'DESC',
							'author' => $author_id
						 );
						$all_posts_args = array(
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
							'paged' => $paged,
							'orderby' => 'ID',
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'terms' => $catID,
									'field' => 'term_id',
									)
							),
							'order'    => (isset($order) && $order !='') ? $order : 'DESC',
							'author' => $author_id
						);	
							$all_posts_args = array(
								'posts_per_page'     => -1,
								'paged' => $paged,
								'orderby' => 'ID',
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy,
										'terms' => $catID,
										'field' => 'term_id',
										)
								),
								'order'    => (isset($order) && $order !='') ? $order : 'DESC',
								'author' => $author_id
							);	
							$results_all_posts = query_posts($all_posts_args);
						}
                       //$my_query = new wp_query( $args );
                       $my_query = query_posts( $args );
						$total_posts = count($results_all_posts);
						$total_query = count($my_query);
						$total_pages = intval($total_posts / $display_count) +1 ;
						while( have_posts() ) {  the_post();
						
						$autor_id = $post->post_author;
						$autordata = get_userdata($autor_id);
						
						//echo $autordata->user_nicename ;
						//echo '<pre>';print_r($autordata);
						
						$author_role = $autordata->roles[0];
						$designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
						$designer_cat_name = $designer_cat[0];
						$season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
						$season_cat_name = $season_cat[0];
						 
						//$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						//$image = vt_resize( '', $thumb[0], 150, 150, true );
						
						//$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
												
						//$imagename = basename($image_data[0]);					
						//$parts = explode('.', $image_data[0]);
						//$last = array_pop($parts);
						//$parts = array(implode('.', $parts), $last);
						//$thumb_width = 150;
						//$thumb_height = 150;
						//$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;
						
						
					/*$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					$thumb_width = 150;
					$thumb_height = 150;
					$parts = explode('.', $image_data[0]);
					$last = array_pop($parts);
					$parts = array(implode('.', $parts), $last);
					$imagesrc = $parts[0].'-'.$thumb_width.'x'.$thumb_height.'.'.$last;	*/
						?>
                        
                        
            <div class="videolist col-50"> 
            
            <!--<a href="<?php echo get_permalink(); ?>"> <img class = "img-res" src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
            </a>-->
            
            <a href="<?php echo get_permalink(); ?>" class="fashion">
                <amp-img layout="responsive" src="<?php the_post_thumbnail_url(array(150, 150), array('class' => 'img-res'));?>" width="150" height="150" alt="<?php the_title(); ?>"></amp-img> 				
            </a>            
                        
              <span class="author-name">  
				<?php 
                    if($author_role == "fashion_designer"){
                    echo 'by ';	
                    the_author_link();
                    }
                    else if($designer_cat_name != ""){ echo 'by '.$designer_cat_name; }
                    else if($season_cat_name == ""){ echo ''; }
                    else {echo 'by '.$season_cat_name; }
                ?>
                </span>
              <div><a href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>
                </a></div>
            </div>
            <?php } ?>
          </div>
        </div>
        
        <div class="con_right">
          <?php
                if ($total_posts > $total_query) {            
                   $current_page = max(1, get_query_var('paged'));
                    echo paginate_links(array(
                       'base' => get_pagenum_link(1) . '%_%',
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
      </main>
      <!-- .site-main --> 
    </div>
    <!-- .content-area --> 
</div>
    
   <?php include('footer.php'); ?>