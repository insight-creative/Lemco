<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lemco
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<div class="home-links">
			<a href="/products/">VIEW PRODUCTS</a>&nbsp;&nbsp;<span class="link-sep">|</span>&nbsp;&nbsp;<a href="/services/">OUR SERVICES</a>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<aside id="secondary" class="widget-area">
		<?php echo get_the_post_thumbnail(); ?>
	</aside><!-- #secondary -->


<?php

get_footer();
