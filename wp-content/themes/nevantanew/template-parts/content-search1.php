<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="container" >
            <div class="row">
                <div>		            
                    <ul class="nav navbar-nav" >
                        <li ><a href="#" class="menu1">Latest</a></li>
                        <li style="border-bottom:1px solid gray"><a href="#" class="menu1">People</a></li>
                        <li><a href="#" class="menu1">Videos</a></li>
                        <li ><a class="menu1">gallery</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <?php
                if (isset($_GET['s'])) {
                    $qa = $_GET['s'];
                } else {
                    //header("location:designer1");
                }
                $blogusers = get_users('search=' . $qa . '*&role=Fashion_designer');

                if (empty($blogusers)) {

                    echo '<span style=" font-size:30px;">DESIGNER NOT FOUND WITH THIS NAME</span>';
                }
                ?>


                <?php
                foreach ($blogusers as $user) {
                    ?>	
                    <div class="col-lg-3" style="padding:20px;min-height: 300px;text-align:center; ">
                        <a href="<?php echo site_url(); ?>/author/<?php echo $user->user_nicename; ?>" >
                            <?php echo get_avatar($user->ID, 200); ?> <br /><br />
                            <?php echo $user->display_name; ?>
                        </a>
                    </div>


                <?php } ?>

            </div>   

            <div class="row">
                <div class="related-videos">
                    <div class="container" style="margin-top:20px;">
                        <?php if (have_posts()) : ?>
                            <h4>Videos </h4>

                            <div class="row">
                                <?php
                                if (isset($_GET['s'])) {
                                $qa = $_GET['s'];
                                } else {
                                    //header("location:designer1");
                                }
                                $aid = get_posts('search=' . $qa . '*$curauth->data->ID;');

                                // $aid = $qa . '*';
                                //   $args = array('author' => 12);
                                //$aid = $curauth->data->ID;
                                query_posts("author=$aid");
                                //query_posts($args);
                                while (have_posts()) : the_post();
                                    ?>
                                    <div class="col-md-2">
                                        <a href="<?php echo get_permalink(); ?>"><?php echo the_post_thumbnail(thumbnail); ?></a>
                                        <div style="padding-top:7px;">by <a href="<?php echo site_url(); ?>/author/<?php echo get_the_author_meta('user_nicename'); ?>"><?php the_author_link(); ?></a> </div>
                                        <a href="<?php echo get_permalink(); ?>"><p><?php the_title(); ?></p></a>
                                    </div>
                                <?php endwhile;
                                ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related-videos">
                    <div class="container" style="margin-top:20px;">
                        <?php if (have_posts()) : ?>
                            <h4>Gallery</h4>
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array('posts_per_page' => 8, 'paged' => $paged);

                            query_posts($args);
                            while (have_posts()) : the_post();
                                ?>

                                <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

                                <div class="col-md-3 videolist" >
                                    <ul class="image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>

                                        <div><a href="<?php echo $image_data[0]; ?>" class="lightbox-portfolio" > <?php the_post_thumbnail('medium'); ?> </a></div>               

                                    </ul>
                                </div>


                                <?php
                            endwhile;
                            ?>
                        <?php endif; ?>
                    </div>


                </div>

            </div>

        </div>
    </main>
</div>
<!--?php get_sidebar(); ?-->
<?php get_footer(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
