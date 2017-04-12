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

    <div class="mail-subscribe">
      <div class="inside">
        <h3 class="signup">Subscribe to Julie's newsletter!</h3>
        <form
          method="post"
          class="af-form-wrapper"
          accept-charset="UTF-8"
          action="https://www.aweber.com/scripts/addlead.pl"
          target="_blank"
        >
          <div style="display: none;">
            <input type="hidden" name="meta_web_form_id" value="1377243306" />
            <input type="hidden" name="meta_split_id" value="" />
            <input type="hidden" name="listname" value="intuitiontips" />
            <input type="hidden" name="redirect" value="https://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_42622a16a4f3bbebb668f4198696d367" />

            <input type="hidden" name="meta_adtracking" value="Email_Only" />
            <input type="hidden" name="meta_message" value="1" />
            <input type="hidden" name="meta_required" value="email" />

            <input type="hidden" name="meta_tooltip" value="" />
          </div>

          <input type="email" name="email" placeholder="Email">
          <input type="submit" name="submit" value="Sign Up" class="pulse .call-to-action-hollow" alt="Sign Up">
        </form>
        <!-- <form method="post" action="http://www.aweber.com/scripts/addlead.pl" target="_new">
          <input type="hidden" name="meta_web_form_id" value="305744">
          <input type="hidden" name="meta_split_id" value="">
          <input type="hidden" name="unit" value="intuitiontips">

          <input type="hidden" name="redirect" value="http://www.aweber.com/form/thankyou_vo.html">
          <input type="hidden" name="meta_redirect_onlist" value="">
          <input type="hidden" name="meta_adtracking" value="">
          <input type="hidden" name="meta_message" value="1">
          <input type="hidden" name="meta_required" value="email">
          <input type="hidden" name="meta_forward_vars" value="0">

          <input type="email" name="email" placeholder="Email">
          <input type="submit" value="Sign Up" class="pulse">
        </form> -->
      </div> <!--.inside -->
    </div> <!-- .subscribe -->

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
    <h3 class="thin center">Latest News and Events</h3>
    <div class="homepage-blog">
    <?php

    $query = new WP_Query( 'showposts=4&cat=-108' );

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
      <a href="<?php echo site_url();?>/blog" class="call-to-action woo-sc-button">View all posts</a>
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
