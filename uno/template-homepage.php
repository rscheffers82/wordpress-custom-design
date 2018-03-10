<?php
/**
 * Template Name: Homepage
 *
 * Here we setup all logic and HTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header(); ?>

    <!-- <div id="content"> -->

    	<?php woo_main_before(); ?>

		<?php do_action( 'homepage' ); ?>

    <div class="podcast-newsletter">
      <div class="center">
        <div class="podcast-icon" style="display:inline-block;"> </div>
        <div style="display:inline-block;">
          <p>Never want to miss a podcast?</p>

          <!-- Begin MailChimp Signup Form -->
          <div id="mc_embed_signup">
          <form action="https://Juliecusmariu.us17.list-manage.com/subscribe/post?u=cb461b2264802e21da240f9e3&amp;id=a996b74875" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          		<div id="mc_embed_signup_scroll">

          			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
          			<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cb461b2264802e21da240f9e3_7b115a52d7" tabindex="-1" value=""></div>
          			<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn white pulse">
          	</div>
          </form>
          </div>
          <!--End mc_embed_signup-->

        </div>
      </div>
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

     <!-- Featured blog post rendering -->
    <!-- <h3 class="elegant">From the Blog</h3> -->
    <h3 class="thin center">Some of my thoughts</h3>
    <div class="homepage-blog">
    <?php

    $query = new WP_Query( 'showposts=4&cat=-108,-130' );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) { $query->the_post();
        woo_get_template_part(  'homefeatured', 'post' );
      }
    } else {
      get_template_part( 'content', 'noposts' );
    }
    //woo_pagenav( $query );
    //wp_reset_query();
    ?>
    <p>
      <a href="<?php echo site_url();?>/blog" class="btn green-full rounded grow">View all posts</a>
    </p>
    <!-- <div class="button-wrapper">
      <a href="<?php //echo site_url();?>/blog" class="woo-sc-button custom medium blog home-blog-button">View all posts</a>
    </div> -->
  </div>

    <!-- Magazine Grid end -->
    <!-- Magazine Grid -->
    <!-- <h3 class="thin">Featured by</h3> -->

    <ul class="media">
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/gazette-logo.png" alt="The Montreal Gazette"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/vitamindaily-logo.png" alt="Vitamin Daily Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/alive-logo.png" alt="Alive Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/fashion-logo.png" alt="Fashion Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/stiletto-woman-logo.png" alt="Stiletto Woman Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/cbc.png" alt="CBC"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/westmount-examiner.png" alt="The Westmount Examiner"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/CJNT.png" alt="CJNT"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/watchmojo.png" alt="Watch Mojo TV"/></li>
    </ul>

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
