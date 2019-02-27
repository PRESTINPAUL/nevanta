<?php

add_action('simple_fb_pre_get_posts', function ($query) {
	$query->set('post_type', 'blog');
});