<?php

// DEALERS SHORTCODE


function dealer_code($content) {
  ob_start();
//  echo '<br>';
  get_template_part('inc/acf/map');
  echo '<section id="dealers"><div class="tailor-grid"><h2>I. Truck Mounted Material Handlers</h2>';
  $args = array( 'post_type' => 'dealer',
                 'posts_per_page' => -1,
                 'orderby' => 'title',
                 'order'   => 'ASC',
                 'meta_key'		=> 'category',
	               'meta_value'	=> array('truck', 'both'),

              );
  $loop = new WP_Query( $args );
  if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php get_template_part('inc/acf/dealer'); ?>
  <?php endwhile; endif; wp_reset_postdata();
  echo '</div>';
  echo '<hr><div class="tailor-grid">';
  echo '<h2>II. Attachments & Stationary Electric Material Handlers - Scrap / Waste Handling</h2>';
  $args2 = array( 'post_type' => 'dealer',
                 'posts_per_page' => -1,
                 'orderby' => 'title',
                 'order'   => 'ASC',
                 'meta_key'		=> 'category',
	               'meta_value'	=> array('attach', 'both'),

              );
  $loop2 = new WP_Query( $args2 );
  if ( $loop2->have_posts() ) :
    while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
    <?php get_template_part('inc/acf/dealer'); ?>
  <?php endwhile; endif; wp_reset_postdata();
  echo '</div>';

  echo '</section>';
  $content = ob_get_clean();
  return $content;
}
add_shortcode('dealers', 'dealer_code');
