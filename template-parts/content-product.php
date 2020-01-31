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
	<a href="<?php echo get_the_permalink(); ?>">
	<?php if(is_singular() && !is_page()) : ?>
	<header class="entry-header">
		<?php

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				lemco_posted_on();
				lemco_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

<?php endif; ?>

<?php

$thumb = get_field('type_image');

if(!empty($thumb)) :

	echo '<img class="wp-post-image" src="'.$thumb['url'].'" alt="'.$thumb['alt'].'" />';

	else :

		the_post_thumbnail('featured');

	endif;

?>

	<div class="entry-content">

		<header class="entry-header">
			<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					lemco_posted_on();
					lemco_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

	<?php

			echo '<a class="btn" href="'.get_the_permalink().'">More Info</a>';


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
