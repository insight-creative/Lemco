<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lemco
 */

get_header();
?>

<aside id="secondary" class="widget-area">
	<a class="gallery-item" href="<?php echo get_the_post_thumbnail_url(); ?>"/>
		<?php echo get_the_post_thumbnail(); ?>
	</a>
	<div id="product-gallery" class="gallery">
	<?php
	$gallery = get_field('gallery');
	if($gallery) :
	foreach($gallery as $image) :

		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
		$thumb = $image['sizes'][ 'thumbnail' ];
		?>

		<a class="gallery-item" href="<?php echo $url; ?>" title="<?php echo $title; ?>">

			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

	</a>

<?php endforeach; endif; ?>
</div>

		</aside><!-- #secondary -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/modules/product-tabs');

			//get_template_part( 'template-parts/content-page');


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				//comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
//get_sidebar();
get_footer();
