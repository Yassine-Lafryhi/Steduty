<?php
$orig_post = $post;
global $post;
$categories        = get_the_category($post->ID);
$related_post_text = steduty_get_option( 'you_may_like_text' );
if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	$args = array(
		'category__in'       => $category_ids,
		'post__not_in'       => array($post->ID),
		'posts_per_page'     => 3,
		'ignore_sticky_posts'=> 1,
		'orderby'            => 'rand'
	);
	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="post-related">
		    <div class="ct_post_area">
		        <h4 class="ct_post_area-title">
		            <span>
		                <?php echo esc_html($related_post_text); ?>
		            </span>
		        </h4>
		    </div>
            <div class="cf related-stuff">
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<div class="item-related">
					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
					<a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_post_thumbnail('steduty-random-thumb'); ?></a>
					<?php endif; ?>
					<h3><a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_title(); ?></a></h3>
					<span class="date"><?php the_time( get_option('date_format') ); ?></span>
				</div>
		<?php
		}
		echo '</div></div>';
	}
}
wp_reset_postdata();
?>
