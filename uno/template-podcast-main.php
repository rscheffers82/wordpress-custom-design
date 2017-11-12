<?php
/**
 * Template Name: Podcast Main Page
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





            <!-- <input type="email">
            <input type="submit" class="btn pulse white" id="newsletter" value="Subscribe"> -->
          </div>
        </div>
      </div>

      <div class="wrapper details-podcast">
        <div class="podcast-time-date">
        <?php the_content(); ?>

          <div class="podcast-guest">
            <p>In the next session Julie will be <?php echo $action; ?><?php the_field('topic_guest_name'); ?>.</p>
            <div class="img-wrap"><div class="guest-img" style="background-image: url(<?php the_field('guest_image'); ?>)"></div></div>
            <p><?php the_field('weekly_topic_guest'); ?></p>
          </div>
        </div>
      </div>

      <div class="radio-show-summary">
        <?php // echo the_field('radio_show_summary'); ?>
        <div class="wrapper podcast-host">
          <?php if( get_field('text_field') !== ''): ?>
            <div class="podcast-image" style="background: url(<?php echo the_field('radio_host_image'); ?>)"></div>
          <?php endif; ?>
          <div class="podcast-bio">
            <?php echo the_field('radio_host_bio'); ?>
          </div>
          <div class="podcast-subscribe">
            <h1 class="title" style="font-size: 2em !important;margin-top: .75rem;">Subscribe</h1>
            <a href="https://itunes.apple.com/us/podcast/heart-beat-internet-radio/id310513252?mt=2" class="btn soft-white rounded grow" target="_blank"><i class="fa fa-apple"></i>  iTunes</a><br>
            <a class="btn soft-white rounded grow" onclick="newsletterFocus()"><i class="fa fa-envelope"></i>  Podcast news</a><br>
            <a href="#listen-to-archives" class="btn soft-white rounded grow podcast podcast-full podcast-full-keep">Listen to archives</a><br>
          </div>
        </div>
      </div>
<script>
function newsletterFocus() {
  (function() {
    document.getElementById("newsletter").focus();
    document.getElementById("newsletter").select();
  })();
}
</script>
        <!-- #content Starts -->
    <?php woo_content_before(); ?>
    <div id="content" class="col-full">
      <div id="main-sidebar-container">
          <!-- #main Starts -->
          <?php woo_main_before(); ?>
          <section id="main">

            <?php //woo_loop_before();
          //  if (have_posts()) { $count = 0;
        //      while (have_posts()) { the_post(); $count++;
        //        woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.
        //      }
      //      }
            ?>
            <h3 id="listen-to-archives" class="thin">Click on an image below to listen to previous shows</h3>

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
          <?php echo do_shortcode('[testimonial_view id=3]'); ?>

    </div><!-- /#main-sidebar-container -->

      <?php get_sidebar( 'alt' ); ?>
      </div><!-- /#content -->

		<?php woo_main_after(); ?>

  </div><!-- /.content -->

<?php get_footer(); ?>
