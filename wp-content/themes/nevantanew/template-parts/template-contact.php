<?php
/*
  Template Name: Contact Us Template
 */
get_header();
if(isset($_SESSION)){
	session_destroy();
}
?>

<div role="main" class="main">
<div class="container full-widht-content contact-us-template">
    <div class="row">
		<div class="col-md-12">	
        <div class="col-md-12 text-center">	
        
        <div class="col-md-3 col-sm-2">
        </div>
        <div class="col-md-6 col-sm-8">	<?php while (have_posts()) : the_post(); ?>
        	<div class="text-center"><h1><?php the_title(); ?></h1></div>
            
        	<?php the_content(); ?>
            <?php endwhile; ?>
        </div>    
        <div class="col-md-3 col-sm-2">    
        </div>
        
        </div>
  		</div>
	</div>
</div>    
</div><!-- .content-area -->

<?php get_footer(); ?>