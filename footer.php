<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lemco
 */

?>
</div> <!-- container -->
	</div><!-- #content -->

	<?php do_action('after_content'); ?>

	<footer id="colophon" class="site-footer">
		<div class="container footer-items">
		<div class="site-contact">
			<?php echo '<a class="custom-logo-link" href="/"><img alt="Lemco footer logo" src="'.get_theme_mod('footer_logo').'"/></a>'; ?>
			<?php get_template_part('template-parts/modules/social'); ?>
			<?php contact_info(); ?>
		</div>

		<?php do_action('add_to_footer'); ?>

		<?php get_sidebar('footer'); ?>

	</div>
	<div class="container">
		<div class="site-info">
			<p>
				&copy;<?php echo date('Y').'&nbsp;<a href="/">'.get_bloginfo('name').'</a>' ?>
			</p>
			<ul>
				<li><a href="/privacy-policy/">Privacy</a></li>
				<li><a href="/terms-of-use/">Terms</a></li>
			</ul>
		</div><!-- .site-info -->
	</div> <!-- container -->
	</footer><!-- #colophon -->

	<div class="lightbox" style="display:none">
	<a href="#" class="close"><span></span><span></span></a>
	<div class="gallery-container">

	</div>
</div>

	<?php do_action('after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
