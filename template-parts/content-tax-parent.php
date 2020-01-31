<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lemco
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$term = get_term($term); ?>

	<a href="<?php echo get_term_link($term); ?>">

	<?php

	$thumb = get_field('type_image', $term->taxonomy . '_' . $term->term_id);
	
	if(!empty($thumb)) :

			echo '<img class="wp-post-image" src="'.$thumb['url'].'" alt="'.$thumb['alt'].'" />';

		else :

			the_post_thumbnail('featured');

		endif;

	?>

	<div class="entry-content">

		<header class="entry-header">
			<?php
				echo '<h2 class="entry-title"><a href="' . get_term_link($term) . '" rel="bookmark">'.$term->name.'</a></h2>';

				$desc = get_field('short_description', $term->taxonomy . '_' . $term->term_id);
				if($desc) {
					echo $desc;
				}
			?>
		</header><!-- .entry-header -->

	<?php

			echo '<a class="btn" href="'.get_term_link($term).'">Learn More</a>';


		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lemco' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //lemco_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
