<?php
/**
 * heartwood Customizer Class
 *
 * @author   benluoma
 * @package  heartwood
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'heartwood_Customizer' ) ) :

	/**
	 * The heartwood Customizer class
	 */
	class heartwood_Customizer {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'customize_register',              array( $this, 'customize_register' ) );
			add_action( 'after_setup_theme',               array( $this, 'custom_header_setup' ) );
			add_action( 'wp_head', 												 array( $this, 'heartwood_customizer_css' ) );
		}

		/**
		 * Setup the WordPress core custom header feature.
		 *
		 */
		public function custom_header_setup() {
			add_theme_support( 'custom-header', apply_filters( 'heartwood_custom_header_args', array(
				'default-image' => '',
				'header-text'   => false,
				'width'         => 1950,
				'height'        => 500,
				'flex-width'    => true,
				'flex-height'   => true,
			) ) );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {

			// Add Design section
			$wp_customize->add_panel( 'heartwood_design',
				 array(
						'title' => 'Design',
						'priority' => 80,
						 )
				 );

				 /**
	 			 * Adding typography panel
	 			 */
	 			$wp_customize->add_section( 'heartwood_typography', array(
	             'title'          => 'Typography',
							 'panel'				=> 'heartwood_design',
	             'priority'       => 80,
	         ) );

					 $wp_customize->add_section( 'heartwood_ui', array(
	 	             'title'          => 'UI',
	 							 'panel'				=> 'heartwood_design',
	 	             'priority'       => 80,
	 	         ) );

						 //ui style
			  		 $wp_customize->add_setting(
			  			 'heartwood_ui_style',
			  			 array(
			  					'default' => 'round'
			  			 )
			  		 );

			  		 $wp_customize->add_control('heartwood_ui_style', array(
			  				 'label' => 'UI Style',
			 				 'description' => 'Style for buttons, inputs and other elements.',
			  				 'section' => 'heartwood_ui',
			  				 'priority' => 20,
			  				 'type' => 'select',
			  					 'choices'        => array(
			  						'round'  => __( 'Round' ),
			  						'square'  => __( 'Square' ),
			 						'geometric'  => __( 'Geometric' ),
			  					 )
			  			 )
			  		 );



					// Setup Sections/Panels
					$wp_customize->get_section('colors')->panel = 'heartwood_design';
					$wp_customize->get_section('colors')->priority = 90;

					/**
					 * Custom theme colors
					 */


					 //Adding color

					 /*
					 $wp_customize->add_setting( 'page_color' , array(
								'default'     => '',
								'transport'   => 'refresh',
						) );
*/
					$wp_customize->add_setting( 'primary_color' , array(
							'default'     => '',
							'transport'   => 'refresh',
					) );

					$wp_customize->add_setting( 'link_color' , array(
							'default'     => '',
							'transport'   => 'refresh',
					) );

					$wp_customize->add_setting( 'text_color' , array(
							'default'     => '',
							'transport'   => 'refresh',
					) );

					$wp_customize->add_setting( 'accent_color' , array(
							'default'     => '',
							'transport'   => 'refresh',
					) );

					//Adding control
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_color', array(
						'label'       => __( 'Page Color', 'heartwood' ),
						'section'     => 'colors',
					) ) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
						'label'       => __( 'Primary Color', 'heartwood' ),
						'section'     => 'colors',
					) ) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
						'label'       => __( 'Accent Color', 'heartwood' ),
						'section'     => 'colors',
					) ) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
						'label'       => __( 'Text Color', 'heartwood' ),
						'section'     => 'colors',
					) ) );

					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
						'label'       => __( 'Link Color', 'heartwood' ),
						'section'     => 'colors',
					) ) );



					// Add Layout section
					$wp_customize->add_panel( 'heartwood_layout',
							array(
								'title' => 'Layout',
								'priority' => 80,
									 )
							);



			// Setup Sections/Panels
			//$wp_customize->get_section('header_image')->title = __( 'Header' );
			//$wp_customize->get_section('header_image')->panel = 'heartwood_layout';

			//$wp_customize->get_section('background_image')->title = __( 'Content' );
			//$wp_customize->get_section('background_image')->panel = 'heartwood_layout';

			// Add Footer section
			$wp_customize->add_section( 'heartwood_header',
				 array(
						'title' => 'Header',
						'panel' => 'heartwood_layout',
						'priority' => 80,
						 )
				 );

				 // Add Footer section
	 			$wp_customize->add_section( 'heartwood_content',
	 				 array(
	 						'title' => 'Content',
	 						'panel' => 'heartwood_layout',
	 						'priority' => 80,
	 						 )
	 				 );

			// Add Footer section
			$wp_customize->add_section( 'heartwood_footer',
				 array(
						'title' => 'Footer',
						'panel' => 'heartwood_layout',
						'priority' => 80,
						 )
				 );



					 //footer
			 		 $wp_customize->add_setting(
			 			 'heartwood_footer_layout',
			 			 array(
			 					'default' => 'left'
			 			 )
			 		 );

			 		 $wp_customize->add_control('heartwood_footer_layout', array(
			 				 'label' => 'Footer Layout',
			 				 'section' => 'heartwood_footer',
			 				 'type' => 'select',
			 				 'priority' => 1,
			 					'choices'        => array(
			 						'default'  => __( 'Default' ),
			 						'stacked'   => __( 'Stacked' ),
			 					)
			 			 )
			 		 );


			//header layout
			 $wp_customize->add_setting(
				 'heartwood_header_layout',
		     array(
		        'default' => 'right'
		     )
			 );

			 $wp_customize->add_control('heartwood_header_layout', array(
			     'label' => 'Header Layout',
			     'section' => 'heartwood_header',
					 'type' => 'select',
					 'priority' => 1,
            'choices'        => array(
							'right'  => __( 'Right' ),
							'left'  => __( 'Left' ),
							'center'   => __( 'Center' ),
            )
			   )
			 );

			 //fixed Header
			 $wp_customize->add_setting(
 		 			'heartwood_fixed_header',
 		 			array(
 		 				'default' => 0,
 		 			)
 		 	);

 		 	$wp_customize->add_control(
 		 		'heartwood_fixed_header',
 		 		array(
 		 			'type' => 'checkbox',
 		 			'priority' => 2,
 		 			'section' => 'heartwood_header',
 		 			'label' => __( 'Fixed Header', 'heartwood' ),
 		 			'description' => '',
 		 		)
 		 	);

			//header layout
			 $wp_customize->add_setting(
				 'heartwood_mobile_menu_type',
		     array(
		        'default' => 'bottom'
		     )
			 );

			 $wp_customize->add_control('heartwood_mobile_menu_type', array(
			     'label' => 'Mobile Menu Collapse',
			     'section' => 'heartwood_header',
					 'priority' => 3,
					 'type' => 'select',
            'choices'        => array(
							'top'  => __( 'Top' ),
							//'right'  => __( 'Right' ),
							'bottom'  => __( 'Bottom' ),
							//'left'  => __( 'Left' ),
							//'full'	=> __( 'Full' ),
            )
			   )
			 );

			 //body layout
			 /*
 			 $wp_customize->add_setting(
 				 'heartwood_general_layout',
 		     array(
 		        'default' => 'full'
 		     )
 			 );

 			 $wp_customize->add_control('heartwood_general_layout', array(
 			     'label' => 'Content Layout',
 			     'section' => 'heartwood_content',
 					 'priority' => 1,
 					 'type' => 'select',
             'choices'        => array(
 							'full'  => __( 'Full Width' ),
 							'framed'  => __( 'Framed' ),
             )
 			   )
 			 );
			 */

			 //sidebar
			 $wp_customize->add_setting(
 		 			'heartwood_sidebar',
 		 			array(
 		 				'default' => 0,
						'label' => 'Content Layout'
 		 			)
 		 	);

 		 	$wp_customize->add_control(
 		 		'heartwood_sidebar',
 		 		array(
 		 			'type' => 'checkbox',
 		 			'priority' => 2,
 		 			'section' => 'heartwood_content',
 		 			'label' => __( 'Add Sidebar', 'heartwood' ),
 		 			'description' => '',
 		 		)
 		 	);


			/**
			 * Tagline display settings
			 */


		 	$wp_customize->add_setting(
		 			'heartwood_show_tagline',
		 			array(
		 				'default' => 0,
		 				'type' => 'theme_mod',
		 				'capability' => 'edit_theme_options',
		 				'transport' => 'refresh',
		 			)
		 	);

		 	$wp_customize->add_control(
		 		'heartwood_show_tagline',
		 		array(
		 			'type' => 'checkbox',
		 			'priority' => 10,
		 			'section' => 'title_tagline',
		 			'label' => __( 'Display Tagline', 'heartwood' ),
		 			'description' => '',
		 		)
		 	);


			$wp_customize->add_setting('footer_logo', array(
			'default' => '',
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			));

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
				'label' => __( 'Footer Logo', 'base' ),
				'section' => 'title_tagline',
				'priority' => 8,
				'settings' => 'footer_logo',
				))
			);


		 $wp_customize->add_setting(
				 'heartwood_show_tagline',
				 array(
					 'default' => 0,
					 'type' => 'theme_mod',
					 'capability' => 'edit_theme_options',
					 'transport' => 'refresh',
				 )
		 );


			/**
			 * Contact info settings (used in Contact Info widget)
			 */




			$wp_customize->add_setting(
					'heartwood_address',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'refresh',
					)
			);


			$wp_customize->add_control(
				'heartwood_address',
				array(
					'type' => 'textarea',
					'priority' => 11,
					'section' => 'title_tagline',
					'label' => __( 'Address', 'heartwood' ),
					'description' => '',
				)
			);

			$wp_customize->add_setting(
					'heartwood_phone',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'refresh',
					)
			);

			$wp_customize->add_control(
				'heartwood_phone',
				array(
					'type' => 'text',
					'priority' => 11,
					'section' => 'title_tagline',
					'label' => __( 'Phone', 'heartwood' ),
					'description' => '',
				)
			);

			$wp_customize->add_setting(
					'heartwood_fax',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'refresh',
					)
			);

			$wp_customize->add_control(
				'heartwood_fax',
				array(
					'type' => 'text',
					'priority' => 11,
					'section' => 'title_tagline',
					'label' => __( 'Fax', 'heartwood' ),
					'description' => '',
				)
			);

			$wp_customize->add_setting(
					'heartwood_email',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'refresh',
					)
			);

			$wp_customize->add_control(
				'heartwood_email',
				array(
					'type' => 'text',
					'priority' => 11,
					'section' => 'title_tagline',
					'label' => __( 'Email', 'heartwood' ),
					'description' => '',
				)
			);



			$wp_customize->add_setting(
					'heartwood_hours',
					array(
						'default' => '',
						'type' => 'theme_mod',
						'capability' => 'edit_theme_options',
						'transport' => 'refresh',
					)
			);

			$wp_customize->add_control(
				'heartwood_hours',
				array(
					'type' => 'textarea',
					'priority' => 11,
					'section' => 'title_tagline',
					'label' => __( 'Hours', 'heartwood' ),
					'description' => '',
				)
			);



		}

		/**
		 * Add customizer css to doc head
		 *
		 */
		public function heartwood_customizer_css() { ?>
			<style type="text/css">

			<?php
			switch (get_theme_mod('heartwood_type_scale')) {
			    case 'fine':
			       	echo 'html { font-size: 14px }';
			        break;
			    case 'big':
			        echo 'html { font-size: 18px }';
			        break;
					case 'oversize':
					    echo 'html { font-size: 20px }';
					    break;
			    default:
			        break;
			}

			 ?>

			<?php
			$fontCheck = array(
				'Helvetica',
				'Georgia',
				'Courier'
			);

			if (get_theme_mod('headings_font')) :
				$headings_font = get_theme_mod('headings_font');
        $headings_name = str_replace(' ', '+', $headings_font);
				if ( !in_array($headings_font,$fontCheck) ) {
				    echo '@import url("https://fonts.googleapis.com/css?family=' . $headings_name . ':300,300i,400,400i,600,600i");';
				}
				?>

				h1,
				h2,
				h3,
				.btn,
				.site-title {
					font-family: <?php echo '"'. $headings_font . '"'; ?>;
				}
			<?php endif; ?>

			<?php if (get_theme_mod('body_font')) :
        $body_font = get_theme_mod('body_font');
        $body_name = str_replace(' ', '+', $body_font);
				if (!in_array($body_font,$fontCheck)) {
				    echo '@import url("https://fonts.googleapis.com/css?family=' . $body_name . ':300,300i,400,400i,600,600i");';
				}
				?>

				body,
				h1 small,
				h2 small {
					font-family: <?php echo '"'. $body_font . '"'; ?>;
				}
			<?php endif; ?>
									/* TODO: Get Background Color in here */
		    <?php if (get_theme_mod('primary_color')) : ?>
									/* Button Background Color */
									button,
									input[type='button'],
									input[type='reset'],
									input[type='submit'],
									.btn,
									.button,
									.cat-link,
									.widget_tag_cloud a {
										background-color: <?php echo get_theme_mod('primary_color'); ?>;
									}
								@media (max-width: 1023px) {
									.site-navigation {
										background-color: <?php echo get_theme_mod('primary_color'); ?>;
									}
									.main-menu li:hover {
										background-color: <?php echo adjustBrightness(get_theme_mod('primary_color'), -50); ?>;
									}
								}

									button:hover,
									input[type='button']:hover,
									input[type='reset']:hover,
									input[type='submit']:hover,
									.btn:hover,
									.button:hover,
									.cat-link:hover,
									.widget_tag_cloud a:hover {
										background-color: <?php echo adjustBrightness(get_theme_mod('primary_color'), -50); ?>;
									}

					<?php endif; ?>

		      <?php if (get_theme_mod('link_color')) : ?>
									/* Link Color */
									a,
									a:visited,
									.main-menu li > a,
									.main-menu li > a:visited,
									.search-submit {
										color: <?php echo get_theme_mod('link_color'); ?>;
									}

									a:hover,
									.main-menu li > a:hover,
									.search-submit {
										color: <?php echo adjustBrightness(get_theme_mod('link_color'), -50); ?>;
									}

									.main-menu li.current-menu-item > a,
									.main-menu li.current-menu-ancestor > a,
									.search-submit:hover {
										color: <?php echo adjustBrightness(get_theme_mod('link_color'), -100); ?>;
									}
					<?php endif; ?>

		      <?php if (get_theme_mod('text_color')) : ?>
									/* Main Text Color */
									body {
										color: <?php echo get_theme_mod('text_color'); ?>;
									}
				  <?php endif; ?>

					<?php if (get_theme_mod('accent_color')) : ?>
									/* Secondary Text Color */
									h4,
									h5,
									h6,
									.site-description,
									.widget-title,
									.specimen-title {
										color: <?php echo get_theme_mod('accent_color'); ?> !important;
									}
									.onsale {
										background-color: <?php echo get_theme_mod('accent_color'); ?> !important;
									}
					<?php endif; ?>

					<?php if ( (bool) get_theme_mod('heartwood_show_tagline') == FALSE ) : ?>
						.site-description {
							clip: rect(1px, 1px, 1px, 1px);
							position: absolute;
						}
					<?php endif; ?>

			</style>
		<?php }

	}


endif;

return new heartwood_Customizer();
