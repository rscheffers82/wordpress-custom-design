 <?php
 /**
  * Template Name: Confirm Booking
  *
  * The contact form page template displays the a
  * simple contact form in your website's content area.
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
			woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.
		}
	}

	woo_loop_after();
?>
            </section><!-- /#main -->
            <?php woo_main_after(); ?>

            <?php get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->

		<?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
