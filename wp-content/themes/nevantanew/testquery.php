<?php
$configFile = dirname(__FILE__) . "/../../../wp-config.php";
include_once($configFile);
$all_posts_args = array(
					'posts_per_page'     => 100,
					'paged' => $paged,
					'orderby' => 'ID',
					'category__in' => $category_in,
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'terms' => $catID,
							'field' => 'term_id',
							),
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => array( 29, 1 ),
								'operator' => 'NOT IN',
							)
					),
					'order'    => (isset($order) && $order !='') ? $order : 'DESC',
					'author' => $author_id
				);

$results_all_posts = query_posts($all_posts_args);
echo "<pre>";
print_r( $blogusers);
echo "</pre>";
?>
