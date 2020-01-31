<?php
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'custom_contact_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class custom_contact_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'custom_contact_widget',

// Widget name will appear in UI
__('Custom Contact Widget', 'custom_contact_widget_domain'),

// Widget description
array( 'description' => __( 'Custom contact info widget', 'custom_contact_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

get_template_part('template-parts/modules/contact-widget');

echo '<style> .widget_custom_contact_widget .widget-title { display:none; } </style>';

echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'custom_contact_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class custom_contact_widget ends here

function contact_info($map = '') {
// Contact Widget
$address = nl2br(get_theme_mod('heartwood_address'));
if($map == 'map') :

echo '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10885.521025182721!2d-93.6010215!3d46.9935061!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x384e960fee15a1f!2sLemco%20Hydraulics%20Inc!5e0!3m2!1sen!2sus!4v1580485506851!5m2!1sen!2sus" width="600" height="240" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
endif;
echo '<br><br><h5> '. get_bloginfo('name') . '</h5>';
if ($address != '') {
	echo '<span class="contact-info-address">' . $address . '</span><br>';
}
if (get_theme_mod('heartwood_phone') != '') {
	echo '<span class="contact-info-phone"><abbr title="Phone Number">PH</abbr>: <a href="tel:' . get_theme_mod('heartwood_phone'). '">' . get_theme_mod('heartwood_phone') . '</a></span><br>';
}
if (get_theme_mod('heartwood_fax') != '') {
	echo '<span class="contact-info-fax"><abbr title="Fax">F</abbr>: <a href="tel:' . get_theme_mod('heartwood_fax'). '">' . get_theme_mod('heartwood_fax') . '</a></span><br>';
}
if (get_theme_mod('heartwood_email') !='' ) {
	echo '<span class="contact-info-email"><abbr title="Email Address">E</abbr>: <a href="mailto:' . get_theme_mod('heartwood_email'). '">' . get_theme_mod('heartwood_email') . '</a></span>';
}
if (get_theme_mod('heartwood_hours') !='' ) {
	echo '<br><br><span class="contact-info-hours"><strong>HOURS OF OPERATION</strong><br>'.nl2br(get_theme_mod('heartwood_hours')).'</span>';
}
}

//CONTACT INFO
class builtrite_contact_info_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Contact Info' );
	}

	function widget( $args, $instance ) {

    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? 'Contact Info' : apply_filters('widget_title', $instance['title']);

    if ($title === ' ') {
      //do nothing
	} else {
		echo $before_title . $title . $after_title;
	}

  echo '<span class="contact-info-title">' . get_bloginfo('name') . '</span><br>';
	echo '<span class="contact-info-address">' . nl2br(get_theme_mod('builtrite_address')) . '</span><br>';
	echo '<span class="contact-info-phone"><abbr title="Phone Number">PH</abbr>: ' . get_theme_mod('builtrite_phone') . '</span><br>';
	echo '<span class="contact-info-email"><abbr title="Email Address">E</abbr>: ' . get_theme_mod('builtrite_email') . '</span>';

	echo $after_widget;

    }

	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }

	 function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	<?php
	  }
}

// type widget

//CONTACT INFO
class builtrite_type_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Product Types' );
	}

	function widget( $args, $instance ) {

    extract($args, EXTR_SKIP);

    $tax_terms = get_terms('type', array('hide_empty' => false));
    global $post;
    $object = get_queried_object();
    $query_id = $object->term_id;
    $parent = $object->parent;

    echo $before_widget;
      if($object->parent) :
          $title = empty($instance['title']) ? get_term($parent)->name : apply_filters('widget_title', $instance['title']);
        else :
    $title = empty($instance['title']) ? 'Product Categories' : apply_filters('widget_title', $instance['title']);

  endif;

    if ($title === ' ') {
      //do nothing
	} else {
		echo $before_title . $title . $after_title;
	}

  echo '<hr>';
  if($object->parent) : $par = 'has-parent'; else : $par = ''; endif;
  echo '<ul class="product-cat-list '.$par.'">';

  $wcatTerms = get_terms('type', array('hide_empty' => 0));

   foreach($wcatTerms as $term) :
     if($term->term_id === $query_id) {
        $class ='class="current-menu-item"';
      } else {
        $class = '';
      }
      //echo $term->parent;
      if($term->parent) {
        $sub = 'class="sub-cat" data-attr="'.$term->slug.'"';
      } else {
        $sub = '';
      }
    $link  = get_term_link($term->term_id);
    echo '<li '.$sub.'><a '.$class.' href="'.$link.'">'.$term->name.'</a></li>';
   endforeach;
   echo '</ul>';
	//echo get_queried_object()->term_id;



	echo $after_widget;

    }

	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }

	 function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	<?php
	  }
}

// industry widget

//CONTACT INFO
class builtrite_industry_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Product Industries' );
	}

	function widget( $args, $instance ) {

    extract($args, EXTR_SKIP);

    echo $before_widget;
    $title = empty($instance['title']) ? 'Industries' : apply_filters('widget_title', $instance['title']);

    if ($title === ' ') {
      //do nothing
	} else {
		echo $before_title . $title . $after_title;
	}

	$tax_terms = get_terms('industry', array('hide_empty' => false));

	echo '<ul class="product-cat-list">';
	global $post;
	$query_id = get_queried_object()->term_id;

	foreach($tax_terms as $term) {
		if($term->term_id === $query_id) {
			$class ='class="current-menu-item"';
		} else{
			$class = '';
		}
				$link  = get_term_link($term->term_id);
				echo '<li><a '.$class.' href="'.$link.'">'.$term->name.'</a></li>';
			}
	echo '</ul>';

	//echo get_queried_object()->term_id;;


	echo $after_widget;

    }

	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }

	 function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	<?php
	  }
}



function builtrite_register_widgets() {
	register_widget( 'builtrite_contact_info_widget' );
	register_widget( 'builtrite_type_widget' );
	register_widget( 'builtrite_industry_widget' );
}

add_action( 'widgets_init', 'builtrite_register_widgets' );
