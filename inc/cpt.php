<?php


      // Our custom post type function
function create_posttype()
{
    register_post_type('product',
    // CPT Options
        array(
            'labels' => array(
              'name'               => _x('Products', 'post type general name', 'your-plugin-textdomain'),
  'singular_name'      => _x('Product', 'post type singular name', 'your-plugin-textdomain'),
  'menu_name'          => _x('Products', 'admin menu', 'your-plugin-textdomain'),
  'name_admin_bar'     => _x('Product', 'add new on admin bar', 'your-plugin-textdomain'),
  'add_new'            => _x('Add New', 'Product', 'your-plugin-textdomain'),
  'add_new_item'       => __('Add New Product', 'your-plugin-textdomain'),
  'new_item'           => __('New Product', 'your-plugin-textdomain'),
  'edit_item'          => __('Edit Product', 'your-plugin-textdomain'),
  'view_item'          => __('View Product', 'your-plugin-textdomain'),
  'all_items'          => __('All Products', 'your-plugin-textdomain'),
  'search_items'       => __('Search Products', 'your-plugin-textdomain'),
  'parent_item_colon'  => __('Parent Products:', 'your-plugin-textdomain'),
  'not_found'          => __('No Products found.', 'your-plugin-textdomain'),
  'not_found_in_trash' => __('No Products found in Trash.', 'your-plugin-textdomain')
            ),
            'public' => true,
            'hierarchical'                =>    true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions' ),
            'taxonomies' => array( 'industry','type','post_tag'),
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');


// Our custom post type function
function create_posttype2()
{
register_post_type('dealer',
// CPT Options
  array(
      'labels' => array(
        'name'               => _x('Dealers', 'post type general name', 'your-plugin-textdomain'),
'singular_name'      => _x('Dealer', 'post type singular name', 'your-plugin-textdomain'),
'menu_name'          => _x('Dealers', 'admin menu', 'your-plugin-textdomain'),
'name_admin_bar'     => _x('Dealer', 'add new on admin bar', 'your-plugin-textdomain'),
'add_new'            => _x('Add New', 'Dealer', 'your-plugin-textdomain'),
'add_new_item'       => __('Add New Dealer', 'your-plugin-textdomain'),
'new_item'           => __('New Dealer', 'your-plugin-textdomain'),
'edit_item'          => __('Edit Dealer', 'your-plugin-textdomain'),
'view_item'          => __('View Dealer', 'your-plugin-textdomain'),
'all_items'          => __('All Dealers', 'your-plugin-textdomain'),
'search_items'       => __('Search Dealers', 'your-plugin-textdomain'),
'parent_item_colon'  => __('Parent Dealers:', 'your-plugin-textdomain'),
'not_found'          => __('No Dealers found.', 'your-plugin-textdomain'),
'not_found_in_trash' => __('No Dealers found in Trash.', 'your-plugin-textdomain')
      ),
      'public' => true,
      'hierarchical'                =>    true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'dealer'),
      'supports'           => array( 'title','revisions' ),
  //    'taxonomies' => array( 'industry','type','post_tag'),
  )
);
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype2');


add_action('init', 'create_private_Product_tax');

function create_private_Product_tax()
{
    register_taxonomy(
        'type',
        'product',
        array(
            'label' => __('Type'),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        )
    );
}

//add_action('init', 'create_private_Product_tax2');

function create_private_Product_tax2()
{
    register_taxonomy(
        'industry',
        'product',
        array(
            'label' => __('Industry'),
            'public' => true,
            'rewrite' => true,
            'hierarchical' => true,
        )
    );
}


function customize_customtaxonomy_archive_display($query)
{
    if (($query->is_main_query()) && (is_tax('type') || is_post_type_archive('product'))) {
        $query->set('orderby', 'menu_order');
    }
    $query->set('order', 'ASC');
}

add_action('pre_get_posts', 'customize_customtaxonomy_archive_display');
