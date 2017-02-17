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
     if (have_posts()) { $count = 0;
       ?>
    <h1 class="title entry-title">Podcast</h1>
    <?php
     	// Display the description for this archive, if it's available.
     	woo_archive_description();
     ?>

     <div class="fix"></div>

     <?php
     	while (have_posts()) { the_post(); $count++;

     		woo_get_template_part( 'content', get_post_type() );

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
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
