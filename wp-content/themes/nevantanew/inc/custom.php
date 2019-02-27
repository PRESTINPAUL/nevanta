<?php

add_action('simple_fb_pre_get_posts', function ($query) {
	$query->set('category_name', 'video-blogs');
	$query->set('posts_per_page', -1);
	$query->set('post_status', 'publish');
});

add_action('wp_head', function () {
	echo '<meta property="fb:pages" content="267774286615856" />';
});

add_filter('simple_fb_article_cover_template_file', function ($name) {
	$file = trailingslashit(__DIR__) . 'IA-video.php';

	$video = get_cfc_meta('video_url');
	$has_video = ! empty($video);
	$thumbnail_id = get_post_thumbnail_id();

	// Post featured image as FB IA cover image.
	if (! $has_video && $thumbnail_id) {
		return $name;
	}

	return $file;
});