<?php
/*
  Template Name: Full Width
 */
get_header();
if(isset($_SESSION)){
	session_destroy();
} 
?>

<div role="main" class="main">
<div class="container full-widht-content">
    <div class="row">
		<div class="col-md-12">	
        <div class="col-md-12">	
        	<div class="text-center"><h1><?php the_title(); ?></h1></div>
        <?php the_content(); ?>
        </div>
  		</div>
	</div>
</div>    
</div><!-- .content-area -->

<?php get_footer(); ?>