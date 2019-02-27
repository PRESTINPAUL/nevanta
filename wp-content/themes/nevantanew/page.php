<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Nevanta
 * @subpackage Nevanta 
 */
get_header();
?>
<div role="main" class="main">


    <?php
    get_template_part('template-parts/content', 'page');
    ?>

</div><!-- .content-area -->
<?php get_footer(); ?>
