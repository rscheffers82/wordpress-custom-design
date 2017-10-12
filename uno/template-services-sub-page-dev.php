<?php
/**
 * Template Name: Services Sub-page Dev
 *
 * Here we setup all logic and HTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
// helper function(s)

function display_button($name, $price, $img_url) {
 echo '<form action="/confirm-booking" method="post">';
   echo '<input value="Book here" type="submit" class="btn green-full rounded grow">';
   echo '<input type="hidden" name="package-name" value="' . $name . '">';
   echo '<input type="hidden" name="package-price" value="' . $price . '">';
   echo '<input type="hidden" name="package-img-url" value="' . $img_url . '">';
 echo '</form>';
}
?>
<!-- Displays Custom Header image -->
<?php
$wearelive = chi_get_header_image_url();
if($wearelive !== "") { ?>
   <section class="home-section custom-header" style="background-image:url('<?php chi_display_header(); ?>')">
   </section>
<?php } ?>

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
     // default content like title and page content
     woo_get_template_part( 'content', 'page' ); // Get the page content template file, contextually.

     ?>
     <!-- Sub-page Services widgets code -->
     <div class="service-wrapper">

       <?php $get_post_meta = get_post_meta($post->ID, 'intuition-services', false);
       foreach($get_post_meta[0] as $item) { ?>
             <?php $img_url = wp_get_attachment_url( $item['image'][0] ); ?>
             <div class="col">
                 <div class="box img-responsive" style="background: url(<?php echo $img_url; ?>)">
                   <a>
                     <div class="wrapper single">
                         <?php echo $item['title']; ?>
                     </div>
                   </a>
                 </div>
                 <div class="details">
                   <div class="description"><?php echo wpautop($item['description']); ?></div>
                   <div class="price"><?php echo '$' . $item['price']; ?>,-</div>
                   <?php display_button( $item['title'], $item['price'], $img_url ); ?>
                 </div>
             </div>

       <?php } ?>
     </div>
     <?php echo wpautop(get_post_meta($post->ID, 'text-below-sub-services', true));
   }
 } ?>
 <?php woo_loop_after(); ?>
           </section><!-- /#main -->
           <?php woo_main_after(); ?>

           <?php get_sidebar(); ?>

   </div><!-- /#main-sidebar-container -->

   <?php get_sidebar( 'alt' ); ?>

   </div><!-- /#content -->
 <?php woo_content_after(); ?>

<?php get_footer(); ?>
