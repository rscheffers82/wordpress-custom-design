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

          <form method="post" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl"  >
            <div style="display: none;">
            <input type="hidden" name="meta_web_form_id" value="1212515379" />
            <input type="hidden" name="meta_split_id" value="" />
            <input type="hidden" name="listname" value="awlist4853401" />

            <input type="hidden" name="meta_adtracking" value="Listen_to_my_podcast_sign_up" />
            <input type="hidden" name="meta_message" value="1" />
            <input type="hidden" name="meta_required" value="email" />

            <input type="hidden" name="meta_tooltip" value="" />
            </div>
            <input class="text" id="awf_field-94169424" type="email" name="email" value="" tabindex="501" onfocus=" if (this.value == '') { this.value = ''; }" onblur="if (this.value == '') { this.value='';} " />
            <input type="submit" name="submit "class="btn pulse white" id="newsletter" value="Subscribe">
          </form>
          <script type="text/javascript">
          // Special handling for facebook iOS since it cannot open new windows
          (function() {
              if (navigator.userAgent.indexOf('FBIOS') !== -1 || navigator.userAgent.indexOf('Twitter for iPhone') !== -1) {
                  document.getElementById('af-form-1212515379').parentElement.removeAttribute('target');
              }
          })();
          </script><script type="text/javascript">
              <!--
              (function() {
                  var IE = /*@cc_on!@*/false;
                  if (!IE) { return; }
                  if (document.compatMode && document.compatMode == 'BackCompat') {
                      if (document.getElementById("af-form-1212515379")) {
                          document.getElementById("af-form-1212515379").className = 'af-form af-quirksMode';
                      }
                      if (document.getElementById("af-body-1212515379")) {
                          document.getElementById("af-body-1212515379").className = "af-body inline af-quirksMode";
                      }
                      if (document.getElementById("af-header-1212515379")) {
                          document.getElementById("af-header-1212515379").className = "af-header af-quirksMode";
                      }
                      if (document.getElementById("af-footer-1212515379")) {
                          document.getElementById("af-footer-1212515379").className = "af-footer af-quirksMode";
                      }
                  }
              })();
              -->
          </script>
          <!-- /AWeber Web Form Generator 3.0.1 -->
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
