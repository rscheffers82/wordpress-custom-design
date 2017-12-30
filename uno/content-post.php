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
		<div class="blogpost-details">
			<?php if('content' == $settings['post_content'] || is_single()) {
				// This will be printen on an individual blog post
				echo 'By <a href="/who-is-julie-cusmariu" target="_blank">' . get_the_author() . '</a> – ';
				echo the_date('F j, Y');
			} ?>
		</div>
	</header>

	<!--  Only display the image when ! singular or when it's within the podcast or motherhood category!!! -->
	<?php if ( ( 'content' != $settings['post_content'] && ! is_singular() ) || in_category('podcast') || in_category('julie-in-conversation-motherhood'))
		woo_image( 'width=' . esc_attr( $settings['thumb_w'] ) . '&height=' . esc_attr( $settings['thumb_h'] ) . '&class=thumbnail ' . esc_attr( $settings['thumb_align'] ) ); ?>

	<?php // woo_post_meta(); ?>
	<section class="entry">
		<!-- new start -->
		<?php
			if ( 'content' == $settings['post_content'] || is_single() ) {
				// This will be printed on an individual blog post
				the_content( __( 'Continue Reading &rarr;', 'woothemes' ) );
				wp_link_pages( $page_link_args );
			} else {
				// This will be printed on the blogpost overview page
				the_excerpt();
			}
		?>
		<!-- end -->
		<?php // the_content(); ?>
	</section><!-- /.entry -->
	<?php if( ('content' == $settings['post_content'] || is_single()) && !in_category('julie-in-conversation-motherhood') ) {
		// This will be printen on an individual blog post and if those are not in the category motherhood
		echo '<div class="post-social-share">' .
			do_shortcode('[Sassy_Social_Share title="Sharing is Caring" style="display: inline-block;" class="arrow"]') .
		'</div>';
	} ?>
	<?php woo_post_inside_after(); ?>
</article><!-- /.post -->

<?php if ( 'content' == $settings['post_content'] || is_single() ) { ?>
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

	<!-- Display blogpost tags if they are set -->
	<?php $postTags = get_the_tags();
	if ($postTags) { ?>
		<hr class="blog">
		<div class="post-meta">
			<i class="fa fa-tags icon" aria-hidden="true"></i>
			<?php
				foreach($postTags as $tag) {
						echo '<div class="post-tag">' .
							'• <a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' .
						'</div>';
				}
			?>
		</div>
	<?php } ?>


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
					echo '<hr class="blog">';
					echo '<div class="post-meta">
						<p>Other posts you will probably like.</p>
						<ul>';

					while( $my_query->have_posts() ) {
						$my_query->the_post();
						$cats_data = get_the_category(get_the_ID());
						$is_podcast = false;
						foreach($cats_data as $cat) {
							if ($cat->category_nicename === "julie-in-conversation-motherhood" || $cat->category_nicename === "podcasts") {
								$is_podcast = true;
							}
						}
						$the_title = $is_podcast ? 'PODCAST - ' . get_the_title() : get_the_title();
						$the_title_fancy = $is_podcast
							? '<span class="podcast-label">PODCAST</span>' . get_the_title()
							: get_the_title();  ?>
						<li>
							<div class="relatedthumb">
								<a href="<? the_permalink()?>" rel="bookmark" title="<?php echo $the_title; ?>">

									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail($img_args);
									} else {
										echo '<img src="' . get_stylesheet_directory_uri() . '/images/default-placeholder.png">';
									} ?>
								</a>
							</div>
							<div class="relatedcontent">
								<a href="<? the_permalink()?>" rel="bookmark" title="<?php echo $the_title; ?>">
									<p><?php echo $the_title_fancy; ?></p>
								</a>
							</div>
						</li>
					<? }
					echo '</ul></div>';
				}
			}
			$post = $orig_post;
			wp_reset_query();
	?>
<?php } ?>
<?php woo_post_after();
	$comm = $settings['comments'];
	if ( ( 'post' == $comm || 'both' == $comm ) && is_single() ) {
		comments_template();
	}
?>
