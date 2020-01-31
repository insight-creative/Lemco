<?php
// Hooks

function read_more($content) {
if(!is_page() && !is_single()) {
	$more = '<a class="btn" href="'.get_the_permalink().'">Read More</a>';
	$content = $content.$more;
	}
	return $content;
}

add_filter('the_excerpt', 'read_more');


function new_nav_menu_items($items, $args) {
		//print_R($args);
    if($args->menu_id == 'primary-menu'){
       $shop_item = '<li class="header-search">'.get_search_form(false).'</li>';
       $items = $items . $shop_item;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);


function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
          $classes[] = 'ie';
          if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
          $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
             $classes[] = 'osx';
         } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
             $classes[] = 'linux';
         } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
             $classes[] = 'windows';
         }
        return $classes;
}

add_filter('body_class','mv_browser_body_class');


function get_banner() {
if(get_the_post_thumbnail() && is_page() || get_the_post_thumbnail() && is_single() || is_home() || is_page() || is_archive()) :
		if(!is_page('privacy-policy') && !is_page('terms-of-use')) :
		get_template_part('template-parts/modules/hero');
	endif;
	endif;
}

add_action('before_content', 'get_banner');

function add_banner_class($classes) {
	if(get_the_post_thumbnail() && is_page() || get_the_post_thumbnail() && is_single() || is_home() || is_page() || is_archive()) :
		if(!is_page('privacy-policy') && !is_page('terms-of-use')) :
		$classes[] = 'has-banner';
		endif;
	endif;
  //$classes[] = 'abs-head';
	//$classes[] = 'fix-head';
	//$classes[] = 'reverse-nav';
	//$classes[] = 'trans';
	//$classes[] = 'full-height';
	return $classes;

}

add_filter( 'body_class', 'add_banner_class');

function crumb() {
if(function_exists('bcn_display')) {
	//if(!is_front_page()) :
		get_template_part('template-parts/modules/crumb');
//	endif;
	 }
}

add_action('add_to_hero','crumb');

function pre_header() {
	get_template_part('template-parts/modules/pre-header');
}

add_action('before_header','pre_header');

function home_featured() {
	//get_template_part('template-parts/modules/banner');
		//	get_template_part('template-parts/modules/grid-example');
		if(is_front_page()) :
			get_template_part('template-parts/modules/grid-example');
		endif;

}

add_action('add_to_hero','home_featured');


function related_prod() {
	//get_template_part('template-parts/modules/banner');
		//	get_template_part('template-parts/modules/grid-example');
		if(is_singular('product')) :
			get_template_part('template-parts/modules/grid-example');
		endif;

}

add_action('after_content','related_prod');

function grid() {
	//get_template_part('template-parts/modules/banner');
		//	get_template_part('template-parts/modules/grid-example');
			get_template_part('template-parts/modules/upper-footer');
}

add_action('after_content','grid');

function social_links() {
	ob_start();
		get_template_part( 'template-parts/modules/social');
	$content = ob_get_contents();
	return $content;
}


add_action('after_content','tax_desc', 1);

function tax_desc() {
	if(is_post_type_archive('product') || is_tax('type')) :
		get_template_part( 'template-parts/modules/type-desc');
	endif;
}

function move_post_nav() {
	if(is_singular('product')) {
		ob_start();
		echo '<div class="nav-wrapper">';
			the_post_navigation();
			echo '</div>';
			return ob_get_contents();
	}
}

add_action('after_content','move_post_nav', 1);


// iamge sizes

add_theme_support( 'post-thumbnails' );

	 add_image_size( 'featured', 800, 550, array( 'center', 'center' )  );

		add_filter( 'image_size_names_choose', 'lemco_custom_sizes', 1, 5 );

		function lemco_custom_sizes( $sizes ) {
				return array_merge( $sizes, array(
						'featured' => __( 'Featured' ),
				) );
		}


		add_action( 'edit_form_after_title', 'add_content_before_editor' );
function add_content_before_editor() {
	if(get_post_type() == 'product') :
    echo '<br><h2>Tab 1: Description</h2>';
	endif;
}

/**
 * ----------------------------------------
 *  Adds sidebar name, as class, on the body
 * ----------------------------------------
 */
add_filter('body_class', 'init_add_sidebar_classes_to_body');
function init_add_sidebar_classes_to_body($classes = '')
{
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar';
    }
    return $classes;
}

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
