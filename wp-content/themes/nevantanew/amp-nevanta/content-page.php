<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">   
	<link rel="canonical" href="<?php echo array_shift(explode('?', home_url( add_query_arg( NULL, NULL ) ))); //echo get_page_link($tag->ID);?>" />
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
        
<title><?php wp_title(); ?></title>

<?php include('head.php');?>
</head>
<body class="front-page">
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
    <main>              
    	<?php
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
					
		     
     //   $_SESSION['main_cat_order'] = $_SESSION['designer_user'] = $_SESSION['order'] = $_SESSION['latest_main_cat_order'] = $_SESSION['latest_designer_user'] = $_SESSION['latest_order'] = $_SESSION['gallery_main_cat_order'] = $_SESSION['gallery_designer_user'] = $_SESSION['gallery_order'] = $_SESSION['tag_main_cat_order'] = $_SESSION['tag_designer_user'] = $_SESSION['tag_order'] = "";        		
		
        if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != ""){
        	$_SESSION['content_main_cat_order']= $_REQUEST['main_cat_order'];
			$_SESSION['content_designer_user']="";
		}elseif(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
        	$_SESSION['content_designer_user']= $_REQUEST['designer_user'];
			$_SESSION['content_main_cat_order']="";
		}
		else{$_SESSION['content_main_cat_order']="";$_SESSION['content_designer_user']="";}
        if(isset($_REQUEST['order'])){
            $_SESSION['content_order']= $_REQUEST['order'];
        }		        
		
		?>    
        
        
        <div class="rightalign searchbox content-cat">
        
        <div class="surf-video-txt">
			<?php while (have_posts()) : the_post(); ?>
                <?php remove_filter ('the_content',  'wpautop'); ?>
                <h2><?php the_content(); ?></h2>
            <?php endwhile; ?>
        </div> 
        
                                   
              <form id="main_cat" method="GET" name="main_cat" action="<?php echo the_permalink();?>" target="_top">
            <div class="search_sort_left">
                <!--<select name="main_cat_order" id="main_cat_order" class="blackbox fashion-dropdwon"  onchange="this.form.submit();">-->
                <select name="main_cat_order" id="main_cat_order" class="blackbox fashion-dropdwon" on="change:main_cat.submit">
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
             
             <form id="order" method="GET" action="<?php echo $url_site;?>" target="_top">
             <div class="col-md-6 col-sm-6 search_sort_right">               
				<div class="col-md-4 col-sm-4">                	
					<select data-selectric-ignore name="order" id="order" class="blackbox fashion-dropdwon" on="change:order.submit">
                    	<option class="select_order" value="">Sort by</option> 
						<option value="DESC" <?php if ($_REQUEST['order'] == "DESC" || $_SESSION['order'] == "DESC") { ?> selected = "selected" <?php } ?>>Latest</option>
						<option value="ASC" <?php if ($_REQUEST['order'] == "ASC" || $_SESSION['order'] == "ASC") { ?> selected = "selected" <?php } ?>>Oldest</option>
						<option value="VIEWS" <?php if ($_REQUEST['order'] == "VIEWS" || $_SESSION['order'] == "VIEWS") { ?> selected = "selected" <?php } ?>>Most Viewed</option>
					</select>
				</div>
            </div>
            </form>   
                                                                                                 
            </div>    
        
        <div class="container">                         
		<?php
		    //print_r($_REQUEST);
			
            $display_count = 30;
            $aid = get_the_ID(); 
            $cid = get_the_category($aid);
            $author_id = "";
            if(count($cid) > 0)
            {
                foreach($cid as $cid1)
                {
                    $pagecatid[] =  $cid1->term_id;
                }
            }			
            $catID = $cid[0]->term_id;
            $taxonomy = 'category';											
            
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : $_SESSION['content_order']; 
			
			if(isset($_REQUEST['main_cat_order']) && $_REQUEST['main_cat_order'] != "")
            {
                $catID = $_REQUEST['main_cat_order'];				
                $taxonomy = 'season';				
                $season_cat_name = get_cat_name($catID );			
            }
            else if(isset($_SESSION['content_main_cat_order']) && $_SESSION['content_main_cat_order'] != "")
            {			
			    $catID = $_SESSION['content_main_cat_order'];
                $taxonomy = 'season';
                $season_cat_name = get_cat_name($catID );
            }
            else{$catID = $cid[0]->term_id;			
                $taxonomy = 'category';
            }	
			
            if(isset($_REQUEST['designer_user']) && $_REQUEST['designer_user'] != ""){
                $author_id = $_REQUEST['designer_user'];
                $designer_cat = get_term_by('id', $author_id,'designer');
                $designer_cat_name = $designer_cat->name;
                $catID = $cid[0]->term_id;
                $taxonomy = 'category';
                
                if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}            
            }
            else if(isset($_SESSION['content_designer_user']) && $_SESSION['content_designer_user'] != ""){
                $author_id = $_SESSION['content_designer_user'];
                $designer_cat = get_term_by('id', $author_id, 'designer');
                $designer_cat_name = $designer_cat->name;
                $catID = $cid[0]->term_id;
                $taxonomy = 'category';			
                if(!empty($designer_cat_name)){$taxonomy = 'designer';$catID=$author_id;$author_id="";}			
            }									
                
            if($taxonomy == 'category'){
                $catID = $pagecatid;
				
				//print_r($catID);
				
                $category_in = "";
            } else {
                $category_in = $pagecatid;	
				//print_r($category_in);
            }
            if((isset($_REQUEST['order']) && $order == "VIEWS") || (isset($_SESSION['content_order']) && $order == "VIEWS"))
            {  
			
			  $args = array(
                'posts_per_page' => $display_count,
                'paged' => $paged,
                'category__in' => $category_in,
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
                    'posts_per_page'     => -1,
                    'paged' => $paged,
                    'category__in' => $category_in,
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
                            'taxonomy' => 'category',
                            'terms' => $pagecatid,
                            'field' => 'term_id',
                            ),
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
			else{
                $args = array(
                    'posts_per_page' => $display_count,
                    'paged' => $paged,
                    'orderby' => 'ID',
                    'category__in' => $category_in,
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
                    'paged' => $paged,
                    'orderby' => 'ID',
                    'category__in' => $category_in,
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
            $designer_cat = wp_get_post_terms($post->ID, 'designer', array("fields" => "names"));
            $designer_cat_name = $designer_cat[0];
            $season_cat = wp_get_post_terms($post->ID, 'season', array("fields" => "names"));
            $season_cat_name = $season_cat[0];
									
			$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-twentyfive');			
			$imagesrc = $image_data[0];
        ?>
       
		<?php if(get_the_ID() != $aid ){ ?>
	        <div class="videolist col-50 mobi-ply"> 
            <a href="<?php echo get_permalink(); ?>" class="fashion">
	             <amp-img layout="responsive" src="<?php echo $imagesrc; ?>" width="208" height="117" alt="<?php the_title(); ?>"></amp-img> 
                 <amp-img layout="responsive" class="video-play-btn-inner-page-mobile" height="150" width="150" src="<?php bloginfo('template_directory'); ?>/amp-nevanta/img/play-mobile.svg" alt="Nevanta"></amp-img>                 
            </a>
            
        <?php /*?><span class="author-name">                    
        <?php 
        if($author_role == "fashion_designer"){
        $var_author = "";
        echo "by " ;	
            the_author_link();
        }
        else if($designer_cat_name != ""){ $var_author = "by ".$designer_cat_name;  }
		else if($season_cat_name == ""){ $var_author = '';  }
		else {$var_author =  "by ".$season_cat_name; }
		$author_title = strlen($var_author) > 37 ? substr($var_author,0,35)."..." : $var_author;
		echo $author_title;				
		?>
        </span><?php */?>
        <div class="title_post_mobile">
        <a href="<?php echo get_permalink(); ?>">
          <?php            
			echo $post->post_title;	
            ?>
          </a> 
        </div>
        </div>
        <?php }?>
        <?php endwhile;?> 
        </div>      
        <div class="container">
        	<div class="con_right">
            <?php
			
			$right_img = get_template_directory_uri().'/img/right.svg';
			$left_img = get_template_directory_uri().'/img/left.svg';	
	
	
                if ($total_posts > $total_query) {                 
                 $current_page = max(1, get_query_var('paged'));
				 $baslink = explode("?",get_pagenum_link(1));
                    echo paginate_links(array(
                       'base' => $baslink[0] . '%_%',
                       'format' => 'page/%#%/',
                       'current' => $current_page,
                       'total' => $total_pages,
                       'prev_next' => true,				 				  
					   'end_size' => '0',
					   'mid_size' => '3',
					   'prev_text' => __('<img src="'.$left_img.'" class="left"> Previ '),
						'next_text' => __(' Next <img src="'.$right_img.'" class="right">')
                    ));
         		}
                ?>
          </div>
        </div>
	</main>
    
   <?php include('footer.php'); ?>
