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
	</header>

	<!-- Add tags -->
	<div class="post-meta">
		<?php $postTags = get_the_tags();
		if ($postTags) {
			foreach($postTags as $tag) {
					echo '<div class="post-tag">' . $tag->name . '</div>';
			}
		}
		?>
	</div>

	
	<?php woo_image( 'width=' . esc_attr( $settings['thumb_w'] ) . '&height=' . esc_attr( $settings['thumb_h'] ) . '&class=thumbnail ' . esc_attr( $settings['thumb_align'] ) ); ?>

	<?php woo_post_meta(); ?>
	<section class="entry">
		<?php the_content(); ?>
	</section><!-- /.entry -->

	<!-- <div class="fix"></div> -->
	<?php // woo_post_inside_after(); ?>

</article><!-- /.post -->
<?php woo_post_after();
$comm = $settings['comments'];
if ( ( 'post' == $comm || 'both' == $comm ) && is_single() ) { comments_template(); }
?>
