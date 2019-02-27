<?php
/**
 * The template for displaying archive pages
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
    <div class="row">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">


                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="taxonomy-description">', '</div>');
                    ?>
                </header><!-- .page-header -->


                <div class="container">
                    <div class="row">
                        <div class="col-md-12 rightalign searchbox">
                            <form name='latest' id="latest" method='post' action=''>
                                Sort by: 
                                <select name="order" id="order" class="blackbox" onchange='document.latest.submit()'>
                                    <option value="DESC" <?php if ($_POST['order'] == "DESC") { ?> selected = "selected" <?php } ?>>Latest</option>
                                    <option value="ASC" <?php if ($_POST['order'] == "ASC") { ?> selected = "selected" <?php } ?>>Oldest</option>
                                    <!--option value="VIEWS" <?php if ($_POST['order'] == "VIEWS") { ?> selected = "selected" <?php } ?>>Most Viewed</option-->
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">        
                    <div class="row">
                        <?php
                        /* $aid = get_the_ID();
                          $cid = get_the_category($aid);
                          $catID = $cid[0]->term_id;
                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                          $order = $_POST['order'];
                          //$args = array('posts_per_page' => 30, 'paged' => $paged);
                          $args = array(
                          'cat' => $catID,
                          'posts_per_page' => 30,
                          'paged' => $paged,
                          'orderby' => 'ID',
                          'order' => $order
                          );
                          query_posts($args); */

                        global $wp_query;
                        $args = array(
                            //'category__and' => 'category',
                            'tag__in' => 'post_tag', //must use tag id for this field
                            'posts_per_page' => 20,
                            
                            ); //get all posts
                            
                        $posts = get_posts($args);
						foreach ($posts as $post) :
                            //do stuff 
                        endforeach;
                        ?>

                        <div class="col-md-2 videolist"  >
                            <a href="<?php echo get_permalink(); ?>"><?php echo the_post_thumbnail(thumbnail); ?></a>
                            <div>by <?php the_author_link(); ?></div>
                            <div><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
                        </div>


                    </div>
                </div>

                <!--?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach ($posttags as $tag) {
                        echo '<img src="http://example.com/images/' . $tag->term_id . '.jpg" alt="' . $tag->name . '" />';
                    }
                }
                ?-->
                <div class="container">
                    <div class="page">
                        <?php
                        wp_simple_pagination();
                        // wp_reset_postdata();
                        ?>
                    </div>
                </div>

            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
</div>
<!--?php get_sidebar(); ?-->
<?php get_footer(); ?>
