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
        <?php $action = (the_field('topic_guest') == "topic") ? 'discussing ' : 'featuring '; ?>
      </div>
    	<?php woo_main_before(); ?>

      <?php
      $wearelive = chi_get_header_image_url();
      if($wearelive !== "") { ?>
        <header class="show">
          <section class="left">
            <h1 class='podcast-main-title'><?php the_title(); ?></h1>
            <div class="podcast-main-title-underline">a live podcast</div>
            <!-- <div class="podcast-main-middle">
              <p>#motherhood</p>
              <p>#let's create a village</p>
            </div> -->
            <!-- <div class="podcast-main-bottom">
              a new series with
              <h1 class="title">Julie Cusmariu</h1>
            </div> -->
          </section>
          <section class="right" style="background-image:url('<?php chi_display_header(); ?>')">
          </section>
        </header>
      <?php } ?>

      <!-- Before the content, full width -->
      <div class="podcast-newsletter">
        <div class="center">
          <div class="podcast-icon" style="display:inline-block;"> </div>
          <div style="display:inline-block;">
            <p>Never want to miss a podcast?</p>
            <input type="email">
            <input type="submit" class="btn pulse white" value="Subscribe">
          </div>
        </div>
      </div>

      <div class="wrapper details-podcast">
        <div class="podcast-time-date">
          <!-- <p><strong>Join Julie every Wednesday @ 2PM ET</strong></p> -->
          <h2 class="header">Join Julie live every Wednesday @ 2PM ET</h2>
          <p>To attend the live session, visit or reload this page at 2PM ET. The broadcast will start automatically in the player below.</p>
          <?php echo do_shortcode('[spreaker type=player resource="show_id=2727118" width="100%" height="200px" theme="light" playlist="false" playlist-continuous="false" autoplay="false" live-autoplay="true" chapters-image="true" hide-logo="true" hide-likes="false" hide-comments="false" hide-sharing="false"]'); ?>
          <!-- <h1><?php echo $action; ?></h1> -->

          <div class="podcast-guest">

            <p>In the next session Julie will be <?php echo $action; ?><?php the_field('topic_guest_name'); ?>.</p>
            <div class="img-wrap"><div class="guest-img" style="background-image: url(<?php the_field('guest_image'); ?>)"></div></div>
            <p><?php the_field('weekly_topic_guest'); ?></p>
          </div>
        </div>
      </div>

      <div class="radio-show-summary">
        <?php echo the_field('radio_show_summary'); ?>
      </div>

      <!-- <hr class="down"> -->

      <div class="wrapper podcast-host">
        <?php if( get_field('text_field') ): ?>
          <div class="podcast-image" style="background: url(<?php echo the_field('radio_host_image'); ?>)"></div>
        <?php endif; ?>
        <div class="podcast-bio">
          <?php echo the_field('radio_host_bio'); ?>
        </div>
      </div>

        <!-- #content Starts -->
    <?php woo_content_before(); ?>
    <div id="content" class="col-full">
      <div id="main-sidebar-container">
          <!-- #main Starts -->
          <?php woo_main_before(); ?>
          <section id="main">

            <h1 class="title entry-title">What listeners are saying</h1>
            <?php // do_action( 'woothemes_testimonials', array( 'limit' => 2, 'id' => '3638, 4175', 'size' => 100, 'per_row' => 2, ) ); ?>
            <?php echo do_shortcode('[testimonial_view id=3]'); ?>


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

    </div><!-- /#main-sidebar-container -->

      <?php get_sidebar( 'alt' ); ?>
      </div><!-- /#content -->

		<?php woo_main_after(); ?>

  </div><!-- /.content -->

<?php get_footer(); ?>
