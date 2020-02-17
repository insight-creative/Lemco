<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lemco
 */

?>
<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-13074741-57"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-13074741-57');
	</script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lemco' ); ?></a>
	<div class="container nopad">
	<header id="masthead" class="site-header" role="navigation">

			<?php do_action('before_header'); ?>

			<?php get_template_part('template-parts/modules/header/header-standard'); ?>
			<?php // get_template_part('template-parts/modules/header/header-centered'); ?>

			<?php do_action('add_to_header'); ?>
		</div>
	</header><!-- #masthead -->

	<?php do_action('before_content'); ?>

	<div id="content" class="site-content">
		<div class="container">
