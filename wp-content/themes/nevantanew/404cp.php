<!DOCTYPE html>
<html>
    <head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>404-We can’t seem to find the page your are looking for </title>
 <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/custominner.css">
</head>

<body>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="col-md-12 error-404 not-found">
				<header class="404-page-header">
					<h1 class="page-title"><?php _e( 'Oops!', 'twentysixteen' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'We can’t seem to find the </br>
                                  page your are looking for', 'twentysixteen' ); ?></p>
				</div><!-- .page-content -->
                
                <div class="page-404-img">
           <?php //echo get_template_directory(); exit;?>
					<img src="<?php bloginfo('template_directory'); ?>/img/404-img.png" alt="404" class="404-img">
                    <p class="404-imgtext"><?php _e( 'Error code: 404', 'twentysixteen' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

		<?php //get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->
</div>


</body>
</html>
