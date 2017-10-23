<?php
/**
 * Template Name: Services Sub-page
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
    // echo '<i class="fa fa-mail-forward" style="font-size:24px"></i>';
  //  echo '<input value="Book now" type="submit" class="btn green-full rounded grow fa fa-mail-forward">';
   echo '<button type="submit" class="btn orange-full rounded grow package"><i class="fa fa-mail-forward" style="font-size: 1.25rem;
margin-right: .5rem;"></i>Learn More</button>';
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
		<section class="home-section custom-header" style="position:relative; max-width:100vw; background-image:url('<?php chi_display_header(); ?>')">
			<header>
				<h1 class='title title-entry title-positioning'><?php the_title(); ?></h1>
			</header>
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
                   <div class="price"><?php echo '$' . $item['price']; ?></div>
                   <?php display_button( $item['title'], $item['price'], $img_url ); ?>
                 </div>
             </div>

       <?php } ?>
     </div>
     <?php
        // display content below the packages
        $get_post_below_packages_meta = get_post_meta($post->ID, 'group-below-packages', false);
        echo wpautop($get_post_below_packages_meta[0]["content_below_packages"]);
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
