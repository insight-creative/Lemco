<section class="images">
  <div class="container">
    <div style="text-align:center;">
      <?php if(is_front_page()) : ?>
        <h4><small>Featured</small>Attachments &amp; Handlers</h4>
      <?php else : ?>
        <h3>Related Products</h3>

      <?php endif; ?>

      </div>

      <br>

        <div class="row carousel carousel-external carousel-full-width">
          <?php

          if(is_singular('product')) :

            $terms = get_the_terms($post->ID, 'type');
            if ($terms) {
              foreach ($terms as $term) {
                $termID[] = $term->slug;
              }
            }

            $term = array_pop($termID);

          $not = get_the_ID();

          $custom_args = array(
              'post_type' => 'product',
              'posts_per_page' => 3,
              'orderby' => 'menu_order title',
              'order' => 'ASC',
              'post__not_in' => array($not),
              'tax_query' => array(
              array(
                  'taxonomy' => 'type',
                  'field' => 'slug',
                  'terms'    => $term,
                 ),
           ),
        );

        else :

          $custom_args = array(
              'post_type' => 'product',
              'posts_per_page' => -1,
              'orderby' => 'menu_order title',
              'order' => 'ASC',
              'tax_query' => array(
                array(
                  'taxonomy' => 'post_tag',
                //  'field' => 'slug',
                  'terms'    => 'Featured'
              ),
            ),
        );


        endif;

        if(get_field('related_products')) :
        $objs = get_field('related_products');
        foreach( $objs as $post) :
        setup_postdata($post);

          get_template_part( 'template-parts/content', 'product' );

        endforeach;

        wp_reset_postdata();

        else :


        $custom_query = new WP_Query($custom_args); ?>

        <?php if ($custom_query->have_posts()) : ?>

            <!-- the loop -->
        <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

        <?php	get_template_part( 'template-parts/content', 'product' ); ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

      <?php else : ?>

        <style>

          .images {
            display:none;
          }

        </style>

      <?php endif; endif; ?>

      </div>
  </div>
</section>
