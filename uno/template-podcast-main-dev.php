<?php
/**
 * Template Name: Podcast Main Page DEV
 *
 * Here we setup all logic and HTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header(); ?>

    <!-- <div id="content"> -->
      <div style="display: none; visibility: hidden;">
        <?php $action = (the_field('topic_guest') == "topic") ? ' discussing' : ' featuring'; ?>
      </div>
    	<?php woo_main_before(); ?>

      <?php
      $wearelive = chi_get_header_image_url();
      if($wearelive !== "") { ?>
        <header>
          <section class="left">
            <h1 class='podcast-main-title'><?php
              the_title();
              echo $action; ?>
            </h2>
            <h1 class="podcast-topic-guest-name"><?php echo the_field('topic_guest_name') ; ?></h1>
            <h2 class='podcast-sub-title'>A live podcast with</h2>
            <h1 class='title title-entry podcast-sub-title-julie'>Julie Cusmariu</h1>
          </section>
          <section class="right" style="background-image:url('<?php chi_display_header(); ?>')">
          </section>
        </header>
      <?php } ?>

      <!-- Before the content, full width -->
      <div class="radio-show-summary">
        <?php echo the_field('radio_show_summary'); ?>
      </div>
      <div class="wrapper">
        <div class="podcast-time-date">
          <h1>WHEN</h1>
          Each Wednesday, 2PM ET
        </div>
        <div class="podcast-join">
          <h1>How to Join</h1>
          - First you do<br>
          - After that<br>
          - Then...<br>
          - Next click on<br>
        </div>
      </div>

      <hr class="down";

      <div class="podcast-topic-guest-description">
        <?php the_field('weekly_topic_guest'); ?>
      </div>
      <div class="podcast-image" style="background: url(<?php echo the_field('radio_host_image'); ?>)"></div>
      <div class="podcast-bio">
        <?php echo the_field('radio_host_bio'); ?>
      </div>

        <!-- #content Starts -->
    <?php woo_content_before(); ?>
    <div id="content" class="col-full">
      <div id="main-sidebar-container">
          <!-- #main Starts -->
          <?php woo_main_before(); ?>
          <section id="main">
            <?php woo_loop_before();
            if (have_posts()) { $count = 0;
              while (have_posts()) { the_post(); $count++;
                woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.
              }
            }
            ?>

            <div class="podcasts-wrapper">
    <?php

    $query = new WP_Query( 'cat=108&posts_per_page=-1' );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) { $query->the_post();
        // woo_get_template_part(  'content-podcast', 'post' );
        woo_get_template_part( 'content-podcast', get_post_type() );

      }
    } else {
      get_template_part( 'content', 'noposts' );
    }
    ?>
  </div>  <!-- podcasts-wrapper -->

  </div>  <!-- main-sidebar-container -->
    <?php woo_loop_after(); ?>
      </section><!-- /#main -->
      <?php woo_main_after(); ?>

      <?php get_sidebar(); ?>


        <?php
        $link_pregnancy = get_site_url() . '/conscious-pregnancy-empowering-birth';
        $img_pregnancy = get_site_url() . '/wp-content/uploads/2017/04/conscious-pregnancy-650wide.jpg';

        $link_marriage = get_site_url() . '/getting-married-consciously';
        $img_marriage = get_site_url() . '/wp-content/uploads/2017/03/getting-married-consciously-BeyondIDo.Julie_.jpg';
        ?>

          <h1 class="title entry-title">Radio Shows</h1>

          <div class="podcast-radioshows-wrapper">
            <a class="podcast-radioshow" href=<?php echo $link_pregnancy; ?>>
              <img src=<?php echo $img_pregnancy; ?> alt="Conscious Pregnancy" />
            </a>
            <a class="podcast-radioshow" href=<?php echo $link_marriage; ?>>
              <img src=<?php echo $img_marriage; ?> alt="Getting Married Consciously" />
            </a>
          </div>

          <h1 class="title entry-title">What listeners are saying</h1>
          <?php // do_action( 'woothemes_testimonials', array( 'limit' => 2, 'id' => '3638, 4175', 'size' => 100, 'per_row' => 2, ) ); ?>
          <?php echo do_shortcode('[testimonial_view id=3]'); ?>

    </div><!-- /#main-sidebar-container -->

      <?php get_sidebar( 'alt' ); ?>
      </div><!-- /#content -->

		<?php woo_main_after(); ?>

  </div><!-- /.content -->

<?php get_footer(); ?>
