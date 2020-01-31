<?php

if(is_post_type_archive('product')) :

$myPost   = get_post( 14 );
$myContent =  apply_filters( 'the_content', $myPost->post_content );


else :

$myContent = term_description();

endif;


if($myContent) : ?>

<section id="type-desc">
  <div class="container">
    <?php if(is_post_type_archive('product')) : ?>
      <h2>About Our Products</h2>
    <?php else : ?>
      <?php
      $term = get_queried_object();
      $term = $term->name;
      if(substr($term, -1)== 's') :
      if(strpos($term, 'Series')) : ?>
          <h2>Lemco <?php echo $term; ?> Loaders</h2>
      <?php  else : ?>
        <h2>Lemco <?php echo $term; ?></h2>
      <?php endif; ?>
      <?php else : ?>
      <h2>Lemco <?php echo $term; ?> Products</h2>
      <?php endif; ?>
    <?php endif; ?>
      <?php echo $myContent; ?>

  </div>
</section>

<?php endif; ?>
