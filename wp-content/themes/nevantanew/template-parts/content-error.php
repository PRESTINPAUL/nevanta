<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header(); ?>
<div class="container">
    <div class="row">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
				</header><!-- .page-header -->

				<!--div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>

					<?php get_search_form(); ?>
				</div--><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

		<!--?php get_sidebar( 'content-bottom' ); --?>

	</div><!-- .content-area -->
    </div>
</div>
</div>
<!--?php get_sidebar(); ?-->
<?php get_footer(); ?>