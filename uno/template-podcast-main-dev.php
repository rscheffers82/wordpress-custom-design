<?php
/**
 * Template Name: Podcast Main Page - DEV
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
             <div class="podcast-main-tagline">Inspiring individual and global change</div>
             <div class="podcast-main-cta cta">
               <a id="podcast-cta" class="btn brown hover grow-more" href="#cta-listen">Listen</a>
             </div>
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

       <div class="wrapper details-podcast">
         <div class="podcast-time-date">
           <h2><?php the_field('subtitle'); ?></h2>
         <div class="podcast-player">
           <?php echo do_shortcode('[spreaker type=player resource="show_id=2727118" width="100%" height="200px" theme="light" playlist="false" playlist-continuous="false" autoplay="false" live-autoplay="true" chapters-image="true" hide-logo="true" hide-likes="true" hide-comments="false" hide-sharing="false"]'); ?>
         </div>
         <?php
          $shortcode = '[social-share-buttons download="' . get_field('download_link') . '"]';
          echo do_shortcode($shortcode);
         ?>
         <?php the_content(); ?>

           <div class="podcast-guest">
             <p>Next: <?php the_field('date_next_podcast'); ?> : <?php the_field('topic_guest_name'); ?></p>
             <div class="img-wrap">
               <div class="guest-img" style="background-image: url(<?php the_field('guest_image'); ?>)"></div>
             </div>

             <?php if(get_field('feature_two_guests') && get_field('guest2_image')) : ?>
               <div class="img-wrap">
                 <div class="guest-img" style="background-image: url(<?php the_field('guest2_image'); ?>)"></div>
               </div>
            <?php endif; ?>

             <p><?php the_field('weekly_topic_guest'); ?></p>
           </div>

            <h2 class="header2-1">Upcoming guests:</h2>
            <div class="guest-list-wrapper">
              <?php if (have_posts()) { $count = 0;
                while (have_posts()) { the_post(); $count++;
                  $post_meta = get_post_meta($post->ID, 'podcast-guests', false);

                    foreach($post_meta[0] as $item) { ?>
                          <?php $img_url = wp_get_attachment_url( $item['image'][0] ); ?>

                          <div class="guest-list">
                            <div class="img-wrap">
                              <div class="guest-img" style="background-image: url('<?php echo $img_url; ?>');"></div>
                            </div>
                            <div class="guest-details">
                              <ul>
                                <li><strong><?php echo $item['date']; ?></strong></li>
                                <li><?php echo $item['guest-name']; ?></li>
                                <li><?php echo $item['guest-company']; ?></li>
                              </ul>
                            </div>
                          </div>
                    <?php }
                  }
                } ?>
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

    <h2 class="header2-1">Previously on the series <span>#Motherhood</span>, <span>#Let’sCreateAVillage</span></h2>
    <div class="podcasts-wrapper">
    <?php
    $query = new WP_Query( 'cat=130&posts_per_page=-1' );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) { $query->the_post();
        woo_get_template_part( 'content-podcast', get_post_type() );
      }
    } else {
      get_template_part( 'content', 'noposts' );
    }
    wp_reset_query();
    ?>
   </div>  <!-- podcasts-wrapper -->

 <!-- Radio host summary -->
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
      <a href="https://itunes.apple.com/us/podcast/heart-beat-internet-radio/id310513252?mt=2" class="btn soft-white rounded grow" target="_blank"><i class="fa fa-apple"></i> Apple Podcasts</a><br>
      <a class="btn soft-white rounded grow" onclick="newsletterFocus()"><i class="fa fa-envelope"></i>  Podcast news</a><br>
      <a id="listen-to-archives" href="#listen-to-archives" class="btn soft-white rounded grow podcast podcast-full podcast-full-keep">Listen to archives</a><br>
    </div>
  </div>
 </div>
 <!-- end Radio host summary -->


    <h2 class="header2-1" id="listen-to-archives">Heatbeat radio archives</h2>
    <div class="podcasts-wrapper">
    <?php
    $query = new WP_Query( 'cat=108&posts_per_page=-1' );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) { $query->the_post();
        woo_get_template_part( 'content-podcast', get_post_type() );
      }
    } else {
      get_template_part( 'content', 'noposts' );
    }
    wp_reset_query();
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

           <h2 class="header2-1">Listen to these two series to gain insight into your own journey through marriage, pregnancy, and birth.</h2>
           <p class="subtitle">Join Julie, in conversation with expert guests, as she journeyed through marriage and then pregnancy and birth for the first time.<p>
           <div class="podcast-radioshows-wrapper">
             <a class="podcast-radioshow" href=<?php echo $link_pregnancy; ?>>
               <img src=<?php echo $img_pregnancy; ?> alt="Conscious Pregnancy" />
             </a>
             <a class="podcast-radioshow" href=<?php echo $link_marriage; ?>>
               <img src=<?php echo $img_marriage; ?> alt="Getting Married Consciously" />
             </a>
           </div>

            <h2 class="header2-1">What listeners are saying</h2>
           <?php echo do_shortcode('[testimonial_view id=3]'); ?>

     </div><!-- /#main-sidebar-container -->

       <?php get_sidebar( 'alt' ); ?>
       </div><!-- /#content -->

    <?php woo_main_after(); ?>

   </div><!-- /.content -->

 <?php get_footer(); ?>
