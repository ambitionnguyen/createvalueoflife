<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="wf-container wf-clearfix">
 *
 * @package presscore
 * @since presscore 0.1
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ancient-ie old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ancient-ie old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="old-ie9 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if ( presscore_responsive() ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php endif; // is responsive?>
	<?php if ( dt_retina_on() ) { dt_core_detect_retina_script(); } ?>
	<title><?php echo presscore_blog_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style type="text/css" id="static-stylesheet"></style>
	<?php
	if ( ! is_preview() ) {

		presscore_favicon();

		echo of_get_option('general-tracking_code', '');

		presscore_icons_for_handhelded_devices();

	}

	wp_head();
	?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' ); ?>/css/global.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('.fancybox').fancybox();
		});
	</script>
</head>

<body <?php body_class(); ?>>
<div style="display:none" id="googlemap">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3439.3130860663778!2d-97.678078!3d30.455569000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644ce69af4a3e7d%3A0x9da3d1dad783e89f!2sWalkabout+Transportation!5e0!3m2!1sen!2s!4v1418263707562" width="800" height="600" frameborder="0" style="border:0"></iframe>
</div>
<?php do_action( 'presscore_body_top' ); ?>

<div id="page"<?php if ( 'boxed' == of_get_option('general-layout', 'wide') ) echo ' class="boxed"'; ?>>
<header id="masthead" class="site-header format-header-wat" role="banner">
	<!-- <nav id="site-navigation" class="main-navigation fomat-navigation-height" role="navigation">
		<div class="header-content-wat ">
			
				<div class="first-el-header-wat items-header-wat" id="second-item-footer-right">
					15400 Long Vista Dr #101 Austin, TX
				</div>
				<div class="second-el-header-wat items-header-wat" id="third-item-footer-right">
					972-722-9933
				</div>
				<div class="third-el-header-wat items-header-wat" id="fourth-item-left">
					info@walkabouttrans.com
				</div>
			
		</div>
		
	</nav> --><!-- #site-navigation format haphan-->

</header>
<?php if ( of_get_option('top_bar-show', 1) ) : ?>

	<?php get_template_part( 'templates/header/top-bar', of_get_option('top_bar-content_alignment', 'side') ); ?>

<?php endif; // show top bar ?>

<?php if ( apply_filters( 'presscore_show_header', true ) ) : ?>

	<?php get_template_part( 'templates/header/header', of_get_option( 'header-layout', 'left' ) ); ?>

<?php endif; // show header ?>

	<?php do_action( 'presscore_before_main_container' ); ?>

	<div id="main" <?php presscore_main_container_classes(); ?>><!-- class="sidebar-none", class="sidebar-left", class="sidebar-right" -->

<?php if ( presscore_is_content_visible() ): ?>

		<div class="main-gradient"></div>

		<div class="wf-wrap">
			<div class="wf-container-main">
				<?php do_action( 'presscore_before_content' ); ?>

<?php endif; ?>