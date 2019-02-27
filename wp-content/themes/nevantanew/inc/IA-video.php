<header>
	<?php 
	global $fb_instant_src;
	$kicker = apply_filters('simple_fb_kicker', '', get_the_ID());
	?>
	<?php if (! empty($kicker)): ?>
		<details>
			<summary><?php echo esc_html($kicker); ?></summary>
		</details>
	<?php endif; ?>

	<?php

	$video = get_cfc_meta('video_url');
	$has_video = ! empty($video);
	$thumbnail_id = get_post_thumbnail_id();

	// Post featured image as FB IA cover image.
	if (! $has_video && $thumbnail_id) {
		Simple_FB_Instant_Articles::instance()->render_image_markup($thumbnail_id);
	} else { ?>
		<figure data-feedback="fb:likes, fb:comments">
			<video>
		    	<source src="<?php echo $video[0]['tablet']; ?>" type="video/mp4" />  
		  	</video>
		</figure>
	<?php }

	the_title('<h1>', '</h1>');

	if (function_exists('the_subheading')) {
		the_subheading('<h2>', '</h2>');
	}

	?>

	<?php if (function_exists('coauthors')): ?>
		<?php coauthors('</address>, <address>', ' </address> and <address> ', '<address>', '</address>'); ?>
	<?php else: ?>
		<address><?php the_author(); ?></address>
	<?php endif; ?>

	<!-- The published and last modified time stamps -->
	<time class="op-published" dateTime="<?php echo esc_attr(get_the_time('c')); ?>"><?php echo esc_attr(get_post_time('Y-m-d\TH:i:s\Z')); ?></time>
	<time class="op-modified" dateTime="<?php echo esc_attr(get_the_modified_time('c')); ?>"><?php echo esc_attr(get_the_modified_date('Y-m-d\TH:i:s\Z')); ?></time>
</header>
