<?php
/**
 * Template Name: Dance Page
 *
 * Here we setup all logic and HTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header(); ?>

    <?php woo_main_before(); ?>
    <div class="video-wrapper">
      <iframe width="100%" height="700" src="https://www.youtube.com/embed/Z-SJpWxHW7M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>


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
    ?>

    <?php woo_loop_after(); ?>
      </section><!-- /#main -->
      <?php woo_main_after(); ?>

      <?php get_sidebar(); ?>

    </div><!-- /#main-sidebar-container -->

      <?php get_sidebar( 'alt' ); ?>
      </div><!-- /#content -->

		<?php woo_main_after(); ?>

  </div><!-- /.content -->

<?php get_footer(); ?>
