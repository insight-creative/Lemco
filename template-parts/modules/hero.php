<!-- Hero -->
<div class="container nopad">
<section id="hero" role="banner" class="parallax <?php if(is_home() || is_front_page()) : echo 'carousel-full-width carousel'; endif; ?>">
  <?php if(is_front_page()) : ?>

    <?php $slides = get_field('hero_carousel');

    foreach($slides as $slide) : ?>

    <div class="slide item <?php if($slide['overlay'] == false) : echo 'no-overlay'; endif; ?>">

      <?php
      // vars
	     $url = $slide['background_image']['url'];
	     $title = $slide['background_image']['title'];
	     $alt = $slide['background_image']['alt'];
	     $caption = $slide['background_image']['caption'];
       ?>

       <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />


      <div class="container">
          <div class="hero-content">
           <?php echo $slide['content']; ?>
        </div>
      </div>
    </div>

  <?php endforeach; ?>



  <?php else : ?>
  <?php if(!is_home() && !is_singular('post')) : ?>
  <div class="slide item">
    <?php if(get_the_post_thumbnail()) : ?>
    <img src="<?php echo  get_the_post_thumbnail_url(); ?>"/>
  <?php else : ?>

    <img src="https://picsum.photos/500/350/?tree"/>

  <?php endif; ?>

  <?php if(is_singular('product')) : ?>


    <div class="container">
        <div class="hero-content">
         <h1 class="entry-title">
           <small><?php
           global $wp_query;
           $id = $wp_query->post->ID;
          $types = get_the_terms( $id, 'type' );
          if($types) :
          foreach ($types as $type) :
            $term = $type->term_id; ?>
            <a href="<?php echo get_term_link($term); ?>"><?php echo $type->name; ?></a>
          <?php endforeach; endif; ?> </small>
           <?php echo get_the_title(); ?>
         </h1>
         <?php if(is_front_page()) : ?>
         <a class="btn">Learn More</a>
       <?php endif; ?>
         <?php if(is_archive()) : ?>
           <a class="link-alt">Read More</a>
          <?php endif; ?>
      </div>
    </div>

  <?php elseif(is_post_type_archive('product')) : ?>

    <div class="container">
        <div class="hero-content">
         <h1 class="entry-title">
           Products
         </h1>
      </div>
    </div>

  <?php elseif(is_tax('type')) : ?>

    <div class="container">
        <div class="hero-content">
         <h1 class="entry-title">
           <small>Product category</small>
           <?php echo get_queried_object()->name; ?>
         </h1>
      </div>
    </div>


  <?php else : ?>

    <div class="container">
        <div class="hero-content">
         <h1 class="entry-title">
           <?php if(is_front_page()) : ?>
            <small>Forestry Equipment</small>
          <?php endif; ?>
           <?php echo get_the_title(); ?>
         </h1>
         <?php if(is_front_page()) : ?>
         <a class="btn">Learn More</a>
       <?php endif; ?>
         <?php if(is_archive()) : ?>
           <a class="link-alt">Read More</a>
          <?php endif; ?>
      </div>
    </div>

  <?php endif; ?>
  </div>
  <?php if(is_front_page()) : ?>
    <div class="slide item">
      <img src="<?php echo  get_the_post_thumbnail_url(); ?>"/>
      <div class="container">
          <div class="hero-content">
           <h1 class="entry-title">
            <small>Forestry Equipment</small>
             <?php echo get_the_title(); ?>
           </h1>
           <?php if(is_front_page()) : ?>
           <a class="btn">Learn More</a>
         <?php endif; ?>
           <?php if(is_archive()) : ?>
             <a class="link-alt">Read More</a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

<?php else : ?>

    <?php
    // archives
    if(!is_singular('post')) :
     $args = array(
        'post_type' => 'post' // get all posts
     );
    else:
    //single
    $args = array(
       'post_type' => 'post',
       'post__in' => array($post->ID) // just the current post
    );
    endif;

    $post_query = new WP_Query($args);
    if($post_query->have_posts() ) :
    while($post_query->have_posts() ) :
    $post_query->the_post();

    ?>

    <div class="slide item">
      <?php if(get_the_post_thumbnail()) : ?>
        <?php the_post_thumbnail(); ?>
      <?php else : ?>
        <img src="<?php echo 'https://picsum.photos/2000/1000/?random' ?>"/>
      <?php endif; ?>
      <div class="container">
          <div class="hero-content">
           <h1 class="entry-title">
             <small><a href="<?php
              $archive_year = get_the_time('Y');
              $archive_month = get_the_time('m');
              echo get_month_link($archive_year, $archive_month); ?>">
             <?php echo get_the_date(); ?></a></small>
             <?php echo get_the_title(); ?>
           </h1>
           <p><?php
            $author_id = $post->post_author;
            $author = get_the_author_meta( 'display_name', $author_id);
            $link = get_author_posts_url($author_id);
            echo 'Posted by <a href="'.$link.'">'.$author.'</a>'; ?>
           </p>
           <?php if(!is_single()) : ?>
            <a href="<?php echo get_the_permalink(); ?>" class="link-alt">Read Article</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <?php endwhile; endif; wp_reset_postdata(); ?>

<?php endif; endif; ?>

</section>
  <?php do_action('add_to_hero'); ?>
</div>
