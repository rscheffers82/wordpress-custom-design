 <?php
 /**
  * Template Name: Services Sub-page Dev
  *
  * Here we setup all logic and HTML that is required for the index template, used as both the homepage
  * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
  *
  * @package WooFramework
  * @subpackage Template
  */

get_header();
?>
<!-- Displays Custom Header image -->
<?php
$wearelive = chi_get_header_image_url();
if($wearelive !== "") { ?>
		<section class="home-section custom-header" style="background-image:url('<?php chi_display_header(); ?>')">
		</section>
<?php } ?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">

      	<div id="main-sidebar-container">

            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <section id="main">
<?php
	woo_loop_before();

	if (have_posts()) { $count = 0;
		while (have_posts()) { the_post(); $count++;
			// default content like title and page content
			woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.

      ?>
			<!-- Sub-page Services widgets code -->
      <div class="sub-service-wrapper">

  			<?php $get_post_meta = get_post_meta($post->ID, 'intuition-services', false);
  			foreach($get_post_meta[0] as $item) { ?>

            <div class="col">
              <div class="service-title"><?php echo $item['title']; ?></div>
              <img src="<?php echo wp_get_attachment_url( $item['image'][0] ); ?>" class="img-responsive">
              <div class="underneath-image">
                <div class="description"><?php echo wpautop($item['description']); ?></div>
                <div class="price">USD $<?php echo $item['price']; ?>,-</div>
                <a class="btn green-full grow rounded" href="<?php echo $item['button']; ?>">Book here</a>
              </div>
            </div>

        <?php } ?>
      </div>
      <?php echo wpautop(get_post_meta($post->ID, 'text-below-sub-services', true));
    }
  } ?>
	<?php woo_loop_after(); ?>
            </section><!-- /#main -->
            <?php woo_main_after(); ?>

            <?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->

		<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
