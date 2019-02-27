<!doctype html>
<html amp>
<head>
  <!-- Generated by PageFrog v.<?php echo $this->get('pagefrog_version');  ?> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic|Open+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <?php do_action( 'amp_post_template_head', $this ); ?>

  <style amp-custom>
    <?php $this->load_parts( array( 'style' ) ); ?>
    <?php do_action( 'amp_post_template_css', $this ); ?>
  </style>
</head>
<body>
  <?php do_action( 'amp_post_template_body_begin', $this ); ?>

  <?php
      $possible_imgs = PageFrog_Amp_Header_Image_Sanitizer::get_header_img_srcs_possible( $this->get( 'post' )->ID );
      $header_img_in_content = false;
      foreach ( $possible_imgs as $img ) {
        if ( PageFrog_Utils::contains( $this->get( 'post_amp_content' ), $img ) ) {
          $header_img_in_content = true;
          break;
        }
      }
      $new_post = new PageFrog_NewPostSettings_Storage();

      $show_header_img = ! $header_img_in_content && $new_post->get_amp_show_header_images_bool() && has_post_thumbnail( $this->get( 'post' )->ID );
      if ( $show_header_img ) :
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $this->get( 'post' )->ID ), 'full' );
        $thumb_url = $thumb[0];
        $thumb_width = $thumb[1];
        $thumb_height = $thumb[2];
        ?>
      
    <div class="thumbnail">
      <amp-img src="<?php echo $thumb_url; ?>" layout="responsive" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>"></amp-img>
    </div>
  <?php endif; ?>

<nav class="title-bar">
  <div>
    <a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
      <?php $site_icon_url = $this->get( 'site_icon_url' ); ?>
      <?php if ( $site_icon_url ) : ?>
        <?php 
        $width = $this->get( 'site_icon_width' );
        if ( ! $width ) {
          $width = 24;
        }
        $height = $this->get( 'site_icon_height' );
        if ( ! $height ) {
          $height = 24;
        }
        ?>
        <amp-img src="<?php echo esc_url( $site_icon_url ); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="site-icon"></amp-img>
        &nbsp;
      <?php else : ?>
        <svg x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24">
          <path class="st0" d="M12,0C5.4,0,0,5.4,0,12c0,6.6,5.4,12,12,12c6.6,0,12-5.4,12-12C24,5.4,18.6,0,12,0z M1.2,12c0-1.6,0.3-3,0.9-4.4l5.1,14.1C3.7,20,1.2,16.3,1.2,12z M12,22.8c-1.1,0-2.1-0.2-3-0.4l3.2-9.4l3.3,9.1c0,0.1,0,0.1,0.1,0.1C14.5,22.6,13.3,22.8,12,22.8z M13.5,6.9c0.6,0,1.2-0.1,1.2-0.1c0.6-0.1,0.5-0.9-0.1-0.9c0,0-1.7,0.1-2.9,0.1c-1.1,0-2.8-0.1-2.8-0.1c-0.6,0-0.7,0.9-0.1,0.9c0,0,0.6,0.1,1.1,0.1l1.7,4.6l-2.4,7.1L5.4,6.9c0.7,0,1.2-0.1,1.2-0.1c0.6-0.1,0.5-0.9-0.1-0.9c0,0-1.7,0.1-2.9,0.1c-0.2,0-0.4,0-0.7,0c1.9-2.9,5.2-4.9,9-4.9c2.8,0,5.4,1.1,7.3,2.8c0,0-0.1,0-0.1,0c-1.1,0-1.8,0.9-1.8,1.9c0,0.9,0.5,1.6,1.1,2.5c0.4,0.7,0.9,1.6,0.9,3c0,0.9-0.3,2.1-0.8,3.5l-1.1,3.6L13.5,6.9z M17.4,21.3l3.3-9.5c0.6-1.5,0.8-2.8,0.8-3.9c0-0.4,0-0.8-0.1-1.1c0.8,1.5,1.3,3.3,1.3,5.2C22.8,16,20.6,19.5,17.4,21.3z"/>
        </svg>
      <?php echo esc_html( $this->get( 'blog_name' ) ); ?>
      <?php endif; ?>
    </a>
  </div>
</nav>
<div class="content">
  <h1 class="title"><?php echo $this->get( 'post_title' ); ?></h1>
  <ul class="meta">
    <?php $this->load_parts( apply_filters( 'amp_post_template_meta_parts', array( 'meta-author', 'meta-time', 'meta-taxonomy' ) ) ); ?>
  </ul>
  <?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
</div>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>