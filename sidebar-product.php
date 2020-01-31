<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lemco
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<aside id="footer-widgets" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</aside><!-- #secondary -->
