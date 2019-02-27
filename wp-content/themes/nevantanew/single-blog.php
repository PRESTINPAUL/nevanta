<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package nevanta
 * @subpackage nevanta

 */
get_header();


?>
<div class="container">
	<div class="col-md-12 nopad-left-right">
		<div class="col-md-8">
			<div class="row">
			<?php
			// Start the loop.
			while (have_posts()) : the_post();

				// Include the single post content template.
				get_template_part('template-parts/content', 'single-blog');
				
			// End of the loop.
			endwhile;
			?>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3 blog-sidebar-main-div">
			<?php if (!(MobileDTS::is('mobile') || MobileDTS::is('android') || MobileDTS::is('ios'))) { ?>
			<?php /*?><section id="text-2" class="blog-sidebar widget widget_text">
				<div class="textwidget">
					<div class="border-div-sidebar-news">
						<div class="sidebar-news"> SUBSCRIBE TO OUR <span style="line-height: 2.3em;">NEWSLETTER</span> </div>
						<form>
							<?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]'); ?> 
						</form>
						<div class="sidebar-news2">Let us bring you the latest from fashion shows, celebrity style, designer dictates and trend tips and advice, straight into your inbox. Subscribe now! </div>
					</div>
				</div>
			</section><?php */?>
			<?php } ?>
			<?php dynamic_sidebar('blog-sidebar'); ?>
		</div>		
		<?php 
			global $post; 
			$tag = get_the_terms ( $post->ID, 'post_tag' );
			// Start the loop.
			while (have_posts()) : the_post();
			if (!empty($tag)) {
		?>
			<div class="single-bog-post-tags">
				<?php echo get_the_term_list( $post->ID, 'post_tag', 'Tags: ', ' ', '' ); ?>
			</div>
		<?php
			}
			endwhile;
		?>
		<div class="single-blog-post-share after-content">
			
			<?php 
				$link = get_permalink();
				// twitter share count
				//$json_string_twitter = file_get_contents("http://cdn.api.twitter.com/1/urls/count.json?url=".$link);
				$json_string_twitter = file_get_contents("http://public.newsharecounts.com/count.json?url=".$link);
				$json_twitter = json_decode($json_string_twitter, true);
				$twitter_count = intval( $json_twitter['count'] );
				
				// facebook share count
				$json_string_fb = file_get_contents("http://graph.facebook.com/?id=".$link);
				$json_fb = json_decode($json_string_fb, true);
				$fb_count = intval( $json_fb['shares'] );
				
				// pinterest share count
			$json_string_pinterest = file_get_contents("http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=".$link);
			$json_string_pinterest = preg_replace( '/^receiveCount\((.*)\)$/', '\\1', $json_string_pinterest );
			$json_pinterest = json_decode($json_string_pinterest, true);
			
			$pinterest_count = intval( $json_pinterest['count'] );
				
				 $social_shares = $twitter_count + $fb_count + $pinterest_count;
				 if($social_shares != '0'){
			 ?><div class="single-blog-post-share-count"><?php echo $social_shares; ?> shares</div>
             <?php } ?>
			<a class="fb-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" >
				<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-fb.png" height="37" width="37" alt="" />
			</a>
			<a class="twitter-share" target="_blank"  href="https://twitter.com/share" data-size="large"  data-url="https://dev.twitter.com/web/tweet-button">
				<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png" height="37" width="37" alt="" />
			</a>
			<!--<a class="insta-share" target="_blank" href="https://instagram.com/nevantamedia/" >
				<img class="img-res" src="<?php //bloginfo('template_directory'); ?>/img/icon-insta.png" height="37" width="37" alt="" />
			</a>-->
			<a class="pin-share" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=nevanta&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" >
				<img class="img-res" src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png" height="37" width="37" alt="" />
			</a>
		</div>
		<div class="single-blog-post-fb-comments single-discussion-section">
			<h5 class="single-blog-post-comments-title">Discussion</h5>
			<div class="posts-comments">
				<div id="fb-root"></div>
				<script type="text/javascript">
				
				 window.fbAsyncInit = function() {
					
						FB.init({
						  appId      : '957787880981244',
						  xfbml      : true,
						  version    : 'v2.5',
						  oauth: true
						});
						
						
						FB.getLoginStatus(function(response) {
						  if (response.status === 'connected') {
								jQuery('.fb-loginlogo').hide();
							}
						 });
					  };
						(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id))
								return;
							js = d.createElement(s);
							js.id = id;
							js.src = "//connect.facebook.net/en_US/all.js";
							fjs.parentNode.insertBefore(js, fjs);
							
							 
						}(document, 'script', 'facebook-jssdk'));
				
					
					/*jQuery(document).ready(function(e) {
						
					});*/
					
					function fb_login() {
						FB.login( function(response) {
							FB.getLoginStatus(function(response) {
								if (response.status === 'connected') {
									jQuery('.fb-loginlogo').hide();
								}
							});
							
						}, { scope: 'email,public_profile' } );
					}
				</script>
					   
				<div class="fb-comments" data-colorscheme="dark" data-href="<?php echo get_permalink(get_the_ID());?>" data-numposts="3"></div>
			</div>
		</div>
		<?php 
		/*start of related stories */
		$orig_post_related = $post;
		global $post;
		$tags_related = get_the_terms ( $post->ID, 'post_tag' );
		//$tags_related = wp_get_post_terms($post->ID);
		//echo '<pre>anirudh'.print_r($tags_related, true).'</pre>';die;
		if ($tags_related) {
			$tag_ids = array();
			foreach($tags_related as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
			//print_r($tag_ids);
			$type = 'blog';
			$args=array(
				'post_type' => $type,
				'post_status' => 'publish',
				//'taxonomy' => 'blog_tag',
				//'terms' => $tag_ids,
				'tax_query' => array(
				array(
			'taxonomy' => 'post_tag',
			'field'    => 'term_id',
			'terms'    => $tag_ids,
		),
	),
				'post__not_in' => array($post->ID),
				'posts_per_page'=>-1, // Number of related posts to display.
				'caller_get_posts'=>1,
			);

			$my_query_related = new WP_Query( $args );
			
			if($my_query_related->have_posts()):
		?>
		<div class="single-related-blog-post bottom-ext-space">
			<h4 class="single-related-blog-post-heading">Related Stories</h4>
			<div class="owl-carousel owl-theme manual bottom-ext-space" id="related-blog-posts-slider">
				<?php 
				while( $my_query_related->have_posts() ): $my_query_related->the_post(); ?>
				<div class="item">
					<?php						
						
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eight');
						$imagesrc = $image_data[0];									
					?>
					<a href="<?php the_permalink(); ?>" class="related_stories_blog">
                        <img class="img-res" src="<?php echo $imagesrc; ?>" width="140" height="85" />
                    </a>
					<p class="related-blog-post-author-name">by <?php the_author(); ?></p>
					<a href="<?php the_permalink(); ?>" class="related-blog-post-title"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a>
				</div>
				<?php	
				endwhile;
				?>
			</div>
		</div>
		<?php
		endif;
		}
		$post = $orig_post_related;
		wp_reset_query();
		/*end of related stories */
		?>
		<?php 
		/*start of latest stories */
		$orig_post = $post;
		global $post;
		$type = 'blog';
		$args=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'post__not_in' => array($post->ID),
			'posts_per_page' => 20
		);
		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) : ?>
		
		<div class="single-latest-blog-post">
			<h4 class="single-latest-blog-post-heading">Latest Stories</h4>
			<div class="owl-carousel owl-theme manual" id="latest-blog-posts-slider">
				<?php 
				while( $my_query->have_posts() ): $my_query->the_post(); ?>
				<div class="item">
					<?php 												
						
						$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog-thumb-eight');
						$imagesrc = $image_data[0];									
					?>
					<a href="<?php the_permalink(); ?>" class="latest_stories_blog">                    
                        <img class="img-res" src="<?php echo $imagesrc; ?>" width="140" height="85" />
                    </a>
					<p class="latest-blog-post-author-name">by <?php the_author(); ?></p>
					<a href="<?php the_permalink(); ?>" class="latest-blog-post-title"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a>
				</div>
				<?php	
				endwhile;
				?>
			</div>
		</div>
		<?php
		endif;
		$post = $orig_post;
		wp_reset_query();
		/*end of latest stories */
		?>
		<?php if (MobileDTS::is('ios') || MobileDTS::is('mobile') || MobileDTS::is('android')) { ?>
		<div class="single-blog-news blog-newsletter">
			<div class="col-md-6 single-blog-posts-newsletter newsletter">
				<img class="img-res single-news-image" src="<?php bloginfo('template_directory'); ?>/img/subscribe-to-our-newsletter-bg.png" />
				<h5 class="news-tagline">SUBSCRIBE TO OUR NEWSLETTER</span></h5>
			</div>
			<div class="col-md-6 newsletter-form">
				<form>
				  <?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]'); ?>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script>
jQuery(document).ready(function(e) {
    jQuery(".newsletter-form #es_txt_email_pg").attr('placeholder','ENTER EMAIL ADDRESS');
});
</script>
<?php get_footer(); ?>
