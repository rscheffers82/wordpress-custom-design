<?php
/**
 * Post Content Template for Podcast & Motherhood posts
 * @package WooFramework
 * @subpackage Template
 */

$settings = array(
				'thumb_w' => 100,
				'thumb_h' => 100,
				'thumb_align' => 'alignleft',
				'post_content' => 'excerpt',
				'comments' => 'both'
				);
$settings = woo_get_dynamic_values( $settings );
$title_before = '<h2 class="header2-1">';
$title_after = '</h2>';
if ( ! is_single() ) {
$title_before = '<h2 class="title entry-title">';
$title_after = '</h2>';
$title_before = $title_before . '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" rel="bookmark" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
$title_after = '</a>' . $title_after;
}
$page_link_args = apply_filters( 'woothemes_pagelinks_args', array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) );
woo_post_before();
?>
<article <?php post_class(); ?>>
<?php woo_post_inside_before(); ?>

	<header>
		<?php the_title( $title_before, $title_after ); ?>
		<div class="blogpost-details"><?php
			echo 'By <a href="/who-is-julie-cusmariu" target="_blank">' . get_the_author() . '</a> – ';
			echo the_date('F j, Y');
			?></div>
	</header>

	<!--  Only display the image when ! singular or when it's within the podcast category!!! -->
	<?php if ( ( 'content' != $settings['post_content'] && ! is_singular() ) || in_category('podcast') || in_category('julie-in-conversation-motherhood'))
		woo_image( 'width=' . esc_attr( $settings['thumb_w'] ) . '&height=' . esc_attr( $settings['thumb_h'] ) . '&class=thumbnail ' . esc_attr( $settings['thumb_align'] ) ); ?>

	<?php // woo_post_meta(); ?>
	<section class="entry">
		<?php the_content(); ?>
	</section><!-- /.entry -->

</article><!-- /.post -->

<div class="fix"></div>
<hr class="blog">

<div class="author-wrapper">
	<div class="author-image">
		<img src="<?php the_field('radio_host_image', 4237); ?>" width="250px" height="250px">
	</div>
	<div class="author-description">
		<p><?php the_field('radio_host_bio', 4237); ?></p>
	</div>
</div>

<hr class="blog">

<!-- Display blogpost tags -->
<div class="post-meta">
	<p>This post is tagged with:</p>
	<?php $postTags = get_the_tags();
	if ($postTags) {
		foreach($postTags as $tag) {
				echo '<div class="post-tag">' .
					'• <a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' .
				'</div>';
		}
	}
	?>
</div>

<hr class="blog">

<!-- Related posts based on tag -->
<?php
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);

	if ($tags) {
		$img_args = ['class' => 'img-related-post'];
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 4, // Number of related posts that will be shown.
				'caller_get_posts'=> 1
			);
			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
				echo '<div class="post-meta">
					<p>Similar articles with the same tag(s):</p>
					<ul>';

				while( $my_query->have_posts() ) {
					$my_query->the_post(); ?>

					<li>
						<div class="relatedthumb">
							<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">

								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail($img_args);
								} else {
									echo '<img src="' . get_stylesheet_directory_uri() . '/images/default-placeholder.png">';
								} ?>
							</a>
						</div>
						<div class="relatedcontent">
							<p><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
							<?php //the_time('M j, Y') ?>
						</div>
					</li>
				<? }
				echo '</ul></div>';
			}
		}
		$post = $orig_post;
		wp_reset_query();
?>

<?php woo_post_after();
$comm = $settings['comments'];
if ( ( 'post' == $comm || 'both' == $comm ) && is_single() ) { comments_template(); }
?>
