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

    <div class="subscribe">
      <div class="inside">
        <h3 class="signup">Lorem Seculor Oris!</h3>
        <form>
          <input type="email" name="email" placeholder="Email">
          <input type="submit" value="Sign Up">
        </form>
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

    // Magazine Grid
    ?>
    <div class="homepage-blog">
    <h2>From the Blog</h2>
    <?php

    $query = new WP_Query( 'showposts=4&cat=-108' );

    if ( $query->have_posts() ) {
    ?>

    <?php
      while ( $query->have_posts() ) { $query->the_post();
      ?>
        <div class="block">
        <?php
        woo_get_template_part(  'content', 'post' );
        ?>
      </div><!--/.block-->
    <?php
      } // End WHILE Loop
    } else {
      get_template_part( 'content', 'noposts' );
    }
    //woo_pagenav( $query );
    //wp_reset_query();

    // Magazine Grid end
    ?>
  <a href="<?php echo site_url();?>/blog" class="woo-sc-button custom medium blog" style="background:#6EC095;border-color:#6EC095">More from the Blog</a>
  </div>
    <h2>Featured by</h2>
    <ul class="media">
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/gazette-logo.png" alt="The Montreal Gazette"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/vitamindaily-logo.png" alt="Vitamin Daily Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/alive-logo.png" alt="Alive Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/fashion-logo.png" alt="Fashion Magazine"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/09/stiletto-woman-logo.png" alt="Stiletto Woman Magazine"/></li>
    </ul>
    <ul class="media">
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/cbc.png" alt="CBC"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/westmount-examiner.png" alt="The Westmount Examiner"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/CJNT.png" alt="CJNT"/></li>
      <li><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2015/11/watchmojo.png" alt="Watch Mojo TV"/></li>
    </ul>

    <?php
    woo_loop_after();
    ?>
            </section><!-- /#main -->
            <?php woo_main_after(); ?>

            <?php get_sidebar(); ?>

    </div><!-- /#main-sidebar-container -->

    <?php get_sidebar( 'alt' ); ?>

    </div><!-- /#content -->

		<?php woo_main_after(); ?>

    </div><!-- /.content -->

<?php get_footer(); ?>
