<?php
/**
 * The template for displaying archive pages
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

		$term = get_q
		$terms = get_term_children( $term_id, $taxonomy_name );

		if ( !empty( $terms ) && !is_wp_error( $terms ) ){
 			echo $terms;
			foreach
		}

		 ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('product');
get_footer();
