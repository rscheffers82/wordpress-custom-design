<?php
/**
 * Archive Template
 *
 * The archive template is a placeholder for archives that don't have a template file.
 * Ideally, all archives would be handled by a more appropriate template according to the
 * current page context (for example, `tag.php` for a `post_tag` archive).
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
?>
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">

    	<div id="main-sidebar-container">

            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <!-- <section id="main" class="col-left"> -->

			<?php global $more; $more = 0;

     woo_loop_before();
     if (have_posts()) { $count = 0; ?>
    <h1 class="title entry-title">Podcast</h1>

    <?php $img_itunes = get_site_url() . '/wp-content/uploads/2017/03/julie-cusmariu-available-on-itunes2.png'; ?>
    <a class="podcast-link" href="https://itunes.apple.com/us/podcast/heart-beat-internet-radio/id310513252?mt=2" target="_blank">
      <div class="podcast-icon">
        <img src=<?php echo $img_itunes; ?> alt="Julie Cusmariu on iTunes" />
      </div>
      <div class="podcast-text">
        Click to subscribe to Julie Cusmariu, Intuitive Consultant, Life Coach and host of Heart Beat radio
      </div>
    </a>
    <!-- Display the description for this archive, if it's available. -->
    <?php woo_archive_description(); ?>

     <div class="fix"></div>

     <?php
     	while (have_posts()) { the_post(); $count++;
     		woo_get_template_part( 'content-podcast', get_post_type() );
     	} // End WHILE Loop
     } else {
     	get_template_part( 'content', 'noposts' );
     } // End IF Statement

     woo_loop_after();

     woo_pagenav(); ?>

            </section><!-- /#main -->
            <?php woo_main_after(); ?>

            <?php //get_sidebar(); ?>

		</div><!-- /#main-sidebar-container -->

		<?php// get_sidebar( 'alt' ); ?>
    </div><!-- /#content -->

    <?php
    $link_pregnancy = get_site_url() . '/conscious-pregnancy-empowering-birth';
    $img_pregnancy = get_site_url() . '/wp-content/uploads/2017/03/conscious-pregnancy-1.jpg';

    $link_marriage = get_site_url() . '/getting-married-consciously';
    $img_marriage = get_site_url() . '/wp-content/uploads/2017/03/getting-married-consciously-BeyondIDo.Julie_.jpg';
    ?>
    <div class="col-full archives" style="width: 100%">

      <h1 class="title entry-title">Conscious Pregnancy</h1>
      <a class="podcast-radioshow" href=<?php echo $link_pregnancy; ?>>
        <img src=<?php echo $img_pregnancy; ?> alt="Conscious Pregnancy" />
      </a>

      <h1 class="title entry-title">Getting Married Consciously</h1>
      <a class="podcast-radioshow" href=<?php echo $link_pregnancy; ?>>
        <img src=<?php echo $img_marriage; ?> alt="Getting Married Consciously" />
      </a>
      <!--
      <iframe
        class="soundcloud"
        width="90%"
        height="450"
        scrolling="no"
        frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/304164859&amp;color=d72844&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false">
    </iframe>

    <iframe
      class="soundcloud"
      width="90%"
      height="450"
      scrolling="no"
      frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/304161208&amp;color=d72844&amp;auto_play=false&amp;hide_related=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false">
    </iframe> -->
  </div>
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
