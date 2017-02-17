<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php wp_head(); ?>
<?php woo_head(); ?>
</head>
<?php
	$wearelive = chi_get_header_image_url();
	if($wearelive !== "") {?>
		<body <?php body_class('custom-header'); ?>>
 	<?php }
	else { ?>
		<body <?php body_class(); ?>>
	<?php } ?>
<?php woo_top(); ?>
<div id="wrapper">

	<div id="inner-wrapper">

	<?php woo_header_before(); ?>

	<header id="header" class="col-full">

		<?php woo_header_inside();
		// Callback for Social Widget
		  if ( function_exists('dynamic_sidebar') && is_active_sidebar('header-socnets') ) {
		    dynamic_sidebar('header-socnets');
		 	} ?>
	</header>
	<?php woo_header_after(); ?>
