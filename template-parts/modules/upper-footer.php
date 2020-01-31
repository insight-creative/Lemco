<!-- CTA -->
<section id="upper-footer">
  <div class="container">
    <div class="row">
    <div>
    <ul class="footer-nav" role="navigation">
      <li><a href="/"><span class="ion-ios-home"></span></a></li>
    <?php

    wp_nav_menu( array(
      'theme_location' => 'menu-1',
      'container' => false,
      'items_wrap' => '%3$s',
      'menu_id'        => 'primary-menu-footer',
    ) );

  ?>
</ul>
  </div>
  <div><strong>Email Signup:</strong>
    <?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]'); ?>
  </div>
</div>
</section>
