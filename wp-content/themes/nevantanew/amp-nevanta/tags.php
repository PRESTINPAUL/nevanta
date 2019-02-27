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
?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="col-md-12">
				<header class="tag-header">
					<h1 class="page-title">  Tag : </h1><h1 class="tag-name"> <?php single_tag_title(); ?> </h1>
				</header>
			</div>

			
			<?php 
			if($_POST && isset($_POST['show_type'])){
				$show_type = $_POST['show_type'];
				echo do_shortcode('[tag_list_all_mobile show_type="'.$show_type.'"]');
			}else {
				echo do_shortcode('[tag_video_blog_mobile]'); 
			}
			?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
</div>
<script>
	var el_video = document.getElementById('video_view_more');
	if(el_video){
		el_video.addEventListener('click', function () {
			document.getElementById("video_tag_form").submit();
		});
	}
	var el_blog = document.getElementById('blog_view_more');
	if(el_blog){
		el_blog.addEventListener('click', function () {
			document.getElementById("blog_tag_form").submit();
		});
	}
</script>

<?php include('footer.php'); ?>
