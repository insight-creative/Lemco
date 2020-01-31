<!-- Social -->
<?php

$menu_name = 'social-menu';
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
    $menu = wp_get_nav_menu_items( $locations[ $menu_name ] );
    ?>

<nav class="social-links">
  <ul class="social-list">
    <?php foreach ( $menu as $item ) : //print_R($item); ?>

      <li><a target="_blank" href="<?php echo $item->url; ?>"><span aria-hidden="true" class="ion-logo-<?php

      $original_url = $item->url; //try with all urls above

      $pieces = parse_url($original_url);
      $domain = isset($pieces['host']) ? $pieces['host'] : '';
      if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain,    $regs)) {
        echo strstr( $regs['domain'], '.', true );
      }
      ?>"></span></a></li>
  <?php endforeach; ?>
  </ul>
</nav>

<?php endif; ?>
