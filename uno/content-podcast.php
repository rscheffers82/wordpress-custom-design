<?php
/**
 * Post Content Template
 *
 * This template is the default page content template. It is used to display the content of the
 * `single.php` template file, contextually, as well as in archive lists or search results.
 *
 * @package WooFramework
 * @subpackage Template
 */
/**
 * Settings for this template file.
 *
 * This is where the specify the HTML tags for the title.
 * These options can be filtered via a child theme.
 *
 * @link http://codex.wordpress.org/Plugin_API#Filters
 */
$settings = array(
				'thumb_w' => 100,
				'thumb_h' => 100,
				'thumb_align' => 'alignleft',
				'post_content' => 'excerpt',
				'comments' => 'both'
				);
$settings = woo_get_dynamic_values( $settings );
$title_before = '<h1 class="title entry-title">';
$title_after = '</h1>';

if ( ! is_single() ) {
	$title_before = '<h2 class="title entry-title">';
	$title_after = '</h2>';
}
?>

<article <?php post_class(); ?>>

<a href="<?php echo get_permalink(); ?>">
	<?php the_title( $title_before, $title_after ); ?>
	<a href="<?php echo get_permalink(); ?>">
		<?php woo_image( 'width=' . esc_attr( $settings['thumb_w'] ) . '&height=' . esc_attr( $settings['thumb_h'] ) . '&class=thumbnail ' . esc_attr( $settings['thumb_align'] ) . '&link=img' ); ?>
	</a>
</a>

</article>
