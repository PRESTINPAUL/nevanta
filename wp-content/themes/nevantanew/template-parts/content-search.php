<?php
/**
 * The template part for displaying results in search pages
 *
 * @package nevanta
 * @subpackage nevanta 
 */

?>

        <article id="post-<?php the_ID(); ?>">
            <?php if ('post' === get_post_type() && in_array(29,$cat_id_arr)) { ?>
                  <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                        <div class="col-md-3 videolist image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
                              <div><a href="<?php echo $image_data[0]; ?>" class="lightbox-portfolio" > <?php the_post_thumbnail('medium'); ?> </a></div>   
                             <a href="<?php echo get_permalink(); ?>"><p><?php the_title(); ?></p></a>        
                        </div>
            
            <?php  } if ('post' === get_post_type() && in_array(15,$cat_id_arr)) {?>
                
              
                    <div class="col-md-2">
                        <a href="<?php echo get_permalink(); ?>"><?php echo the_post_thumbnail(thumbnail); ?></a>
                        <div style="padding-top:7px;">by <a href="<?php echo site_url(); ?>/author/<?php echo get_the_author_meta('user_nicename'); ?>"><?php the_author_link(); ?></a> </div>
                        <a href="<?php echo get_permalink(); ?>"><p><?php the_title(); ?></p></a>
                    </div>
                

            <?php  } ?>

        </article><!-- #post-## -->
   