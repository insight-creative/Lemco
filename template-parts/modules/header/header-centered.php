<div id="center-nav" class="container header-container">
<nav id="site-navigation-left" class="main-navigation">
  <ul class="menu">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'items_wrap' => '%3$s',
    'container' => false,
    'menu_id'        => 'primary-menu',
    'link_after' => '<span class="desktop-dropdown"></span><span class="mobile-toggle"><span></span></span>',
    'walker' => new Primary_Menu_Walker()
  ) );

  ?>
</ul>
</nav><!-- #site-navigation -->


<div class="site-branding">
  <?php
  the_custom_logo();
  if ( is_front_page() && is_home() ) :
    ?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php
  else :
    ?>
    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php
  endif;

  $lemco_description = get_bloginfo( 'description', 'display' );

  if ( $lemco_description || is_customize_preview() ) : ?>

    <p class="site-description"><?php echo $lemco_description; /* WPCS: xss ok. */ ?></p>

  <?php endif; ?>

</div><!-- .site-branding -->

<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span></span><span></span><span></span></button>

<nav id="site-navigation-right" class="main-navigation">
  <ul class="menu">
  <?php
  wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'items_wrap' => '%3$s',
    'container' => false,
    'menu_id'        => 'primary-menu',
  	'link_after' => '<span class="desktop-dropdown"></span><span class="mobile-toggle"><span></span></span>',
    'walker' => new Primary_Menu_Walker()
  ) );

  ?>
</ul>
</nav><!-- #site-navigation -->
</div>
