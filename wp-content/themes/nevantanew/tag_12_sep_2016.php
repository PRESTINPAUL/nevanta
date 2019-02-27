<?php
/**
 * The template for displaying tag
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

			<div class="col-md-12">
                <header class="tag-header">
                   <h1 class="page-title">  Tag : </h1>	 <h1 class="tag-name"> <?php single_tag_title(); ?> </h1>
                
                </header>
			</div>
<div id="list_tag_posts">
<?php 
$tag = get_queried_object();
$term_id= $tag->term_id;
if($_POST){
$show_type = $_POST['show_type'];
echo do_shortcode('[tag_list_all show_type="'.$show_type.'"]');
}else {
echo do_shortcode('[tag_video_blog]'); 
}
?>
</div>
 </main><!-- .site-main -->
</div><!-- .content-area -->
</div>

<script>
jQuery("#video_view_more").click(function(){
jQuery("#video_tag_form").submit();
}); 
jQuery("#blog_view_more").click(function(){
jQuery("#blog_tag_form").submit();
}); 
</script>
<?php get_footer(); ?>