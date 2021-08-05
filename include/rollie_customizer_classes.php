<?php
class Rollie_Image_Size {

	public $img_sizes_data;
	public $customizer_section_description;
	public $customizer_section_title;
	private $img_set_name;
	private $customizer_section;

	public function __construct( $img_set_name, $customizer_section_title, $customizer_section_description, $img_sizes_data ) {
		$this->img_sizes_data                 = $img_sizes_data;
		$this->img_set_name                   = 'rollie_img_' . $img_set_name;
		$this->customizer_section_title       = $customizer_section_title;
		$this->customizer_section_description = $customizer_section_description;
		$this->customizer_section             = $this->img_set_name . '_section';
	}

	public function add_customizer_controls() {
		global $wp_customize;
		$wp_customize->add_section(
			$this->customizer_section,
			array(
				'panel'       => 'rollie_img_panel',
				'title'       => $this->customizer_section_title,
				'description' => $this->customizer_section_description,
				'priority'    => 20,
			)
		);
		$wp_customize->add_setting( $this->customizer_section_title . '_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				$this->customizer_section_title . '_label',
				array(
					'label'       => esc_html( $this->customizer_section_title ) . ' ' . __( 'Settings', 'rollie' ),
					'section'     => $this->customizer_section,

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 1 + count( $this->img_sizes_data ) * 3,
						'expanded'                        => true,
					),
				)
			)
		);

		$wp_customize->add_setting(
			$this->img_set_name . '_device',
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$input_attrs_device = array( 'switch_size' => 'big' );
		foreach ( $this->img_sizes_data as $key => $size ) {
			$input_attrs_device[ $key ]                      = true;
			$input_attrs_device[ 'collapse_target_' . $key ] = '#customize-control-' . $this->img_set_name . '_crop_' . $key . ',#customize-control-' . $this->img_set_name . '_w_' . $key . ',#customize-control-' . $this->img_set_name . '_h_' . $key;
		}
		$wp_customize->add_control(
			new Rollie_Device_Control(
				$wp_customize,
				$this->img_set_name . '_device',
				array(
					'section'     => $this->customizer_section,
					'input_attrs' => $input_attrs_device,

				)
			)
		);

		foreach ( $this->img_sizes_data as $key => $size ) {

			$wp_customize->add_setting(
				$this->img_set_name . '_crop_' . $key,
				array(
					'default'           => $size['crop'],
					'sanitize_callback' => 'rollie_sanitize_checkbox',

				)
			);

			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					$this->img_set_name . '_crop_' . $key,
					array(
						'label'       => __( 'Crop Image: ', 'rollie' ) . $size['size_label'],
						'description' => __( 'If true, images will be cropped to the specified dimensions using center positions otherwise will be resized and can vary in size', 'rollie' ),
						'section'     => $this->customizer_section,
					)
				)
			);
			$wp_customize->add_setting(
				$this->img_set_name . '_w_' . $key,
				array(
					'sanitize_callback' => 'rollie_sanitize_integer',
					'default'           => $size['w'],
				)
			);
			$wp_customize->add_control(
				$this->img_set_name . '_w_' . $key,
				array(
					'type'    => 'number',
					'section' => $this->customizer_section,
					'label'   => __( 'Image Width (px): ', 'rollie' ) . $size['size_label'],
				)
			);
			$wp_customize->add_setting(
				$this->img_set_name . '_h_' . $key,
				array(
					'sanitize_callback' => 'rollie_sanitize_integer',
					'default'           => $size['h'],
				)
			);
			$wp_customize->add_control(
				$this->img_set_name . '_h_' . $key,
				array(
					'type'        => 'number',
					'section'     => $this->customizer_section,
					'description' => __( 'If height value is zero height will be set automaticaly to match aspect ratio of image', 'rollie' ),
					'label'       => __( 'Image Height (px): ', 'rollie' ) . $size['size_label'],
				)
			);
		}
	}
	public function add_image_sizes() {
		foreach ( $this->img_sizes_data  as $key => $size ) {
			add_image_size( $size['size_name'], get_theme_mod( $this->img_set_name . '_w_' . $key, $size['w'] ), get_theme_mod( $this->img_set_name . '_h_' . $key, $size['h'] ), get_theme_mod( $this->img_set_name . '_crop_' . $key, $size['crop'] ) );
		}
	}
}
class Rollie_Font {

	public $font_data;
	private $font_set_name;
	public $font_set_class;
	public $customizer_section_title;
	private $customizer_section;
	private static $font_data_def = array(
		'U'                   => array(
			'default' => false,
			'ignore'  => true,
		),
		'ls'                  => array(
			'default' => 0,
			'ignore'  => false,
		),
		'lh'                  => array(
			'default' => 1.2,
			'ignore'  => false,
		),
		'max'                 => array(
			'default' => 16,
			'ignore'  => false,
		),
		'min'                 => array(
			'default' => 16,
			'ignore'  => false,
		),
		'align'               => array(
			'default' => 1,
			'ignore'  => false,
		),
		'h4_min'              => array(
			'default' => 20,
			'ignore'  => true,
		),
		'h4_max'              => array(
			'default' => 24,
			'ignore'  => true,
		),
		'h2_max'              => array(
			'default' => 30,
			'ignore'  => true,
		),
		'h2_min'              => array(
			'default' => 27,
			'ignore'  => true,
		),
		'alt_enable'          => array(
			'default' => 1,
			'ignore'  => false,
		),
		'alt'                 => array(
			'default' => '',
			'ignore'  => false,
		),
		'alt_weight'          => array(
			'default' => 40,
			'ignore'  => false,
		),
		'disable_bold_italic' => array(
			'default' => true,
			'ignore'  => false,
		),
		'font'                => array( 'default' => true ),
		'italicweight'        => array( 'default' => 'italic' ),
		'subsets'             => array( 'default' => 'latin' ),
		'category'            => array( 'default' => 'sans-serif' ),
		'regularweight'       => array( 'default' => 'regular' ),
		'boldweight'          => array( 'default' => '700' ),
	);

	public function __construct( $font_set_name, $customizer_section_title, $font_set_class, $data ) {
		$this->customizer_section_title = $customizer_section_title;
		$this->font_set_name            = 'rollie_font_' . $font_set_name;
		$this->font_set_class           = $font_set_class;
		$this->customizer_section       = 'rollie_font_' . $font_set_name . '_section';

		// $this->font_data = array_merge(Rollie_Font::$font_data_def, $data);

		foreach ( self::$font_data_def as $key => $value ) {

			if ( isset( $data[ $key ] ) ) {
				foreach ( self::$font_data_def[ $key ] as $key_2 => $value_2 ) {
					if ( isset( $data[ $key ][ $key_2 ] ) ) {
						$this->font_data[ $key ][ $key_2 ] = $data[ $key ][ $key_2 ];
					} else {
						$this->font_data[ $key ][ $key_2 ] = self::$font_data_def[ $key ][ $key_2 ];
					}
				}
			} else {
				$this->font_data[ $key ] = self::$font_data_def[ $key ];
			}
		}
	}

	public function add_customizer_controls() {
		global $wp_customize;

		$wp_customize->add_section(
			$this->font_set_name . '_section',
			array(
				'panel'    => 'rollie_font_panel',
				'title'    => $this->customizer_section_title,
				'priority' => 20,
			)
		);

		$wp_customize->add_setting( $this->font_set_name . '_label1', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				$this->font_set_name . '_label1',
				array(
					'label'       => esc_html__( 'Font Family: ', 'rollie' ) . esc_html__( esc_html( $this->customizer_section_title ), 'rollie' ),
					'section'     => $this->customizer_section,

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 5,
						'expanded'                        => true,
					),
				)
			)
		);

		$wp_customize->add_setting( $this->font_set_name . '_i', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$font_set_class_str = implode( ', ', $this->font_set_class );
		$wp_customize->add_control(
			new Rollie_Notice_Control(
				$wp_customize,
				$this->font_set_name . '_i',
				array(
					'description' => ' <span>' . __( 'This styles are saved to css selectors:', 'rollie' ) . '<span class="rollie_info_c"><b><strong> ' . esc_html( $font_set_class_str ) . '</strong> </b></span></span></br> </br><strong> <span class="rollie_warn_c ">' . __( 'Important!', 'rollie' ) . ' </span>' . __( 'Using many different Fonts and weights in theme may slow down loading of your site!', 'rollie' ) . '</strong></br><a href="https://fonts.google.com/" target="_blank">' . __( 'More information about', 'rollie' ) . ' Google Fonts</a>',
					'section'     => $this->customizer_section,
				)
			)
		);

		$wp_customize->add_setting(
			$this->font_set_name . '_alt_enable',
			array(
				'default'           => $this->font_data['alt_enable']['default'],
				'sanitize_callback' => 'rollie_sanitize_radio',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			new Rollie_Multiple_Switch_Customizer_Control(
				$wp_customize,
				$this->font_set_name . '_alt_enable',
				array(
					'section'     => $this->customizer_section,
					'choices'     => array(
						1 => __( 'Google Fonts', 'rollie' ),
						2 => __( 'Custom Font', 'rollie' ),
					),
					'input_attrs' => array(
						'rollie_font_reset_toogle' => 'rollie_font_reset_toogle',
						'defaults'                 => $this->font_data['alt_enable']['default'],
					),

				)
			)
		);

		$wp_customize->add_setting(
			$this->font_set_name . '_obj',
			array(
				'default'           => json_encode(
					array(

						'font'          => $this->font_data['font']['default'],
						'regularweight' => $this->font_data['regularweight']['default'],
						'italicweight'  => $this->font_data['italicweight']['default'],
						'subsets'       => $this->font_data['subsets']['default'],
						'boldweight'    => $this->font_data['boldweight']['default'],
						'category'      => $this->font_data['category']['default'],

					)
				),
				'sanitize_callback' => 'rollie_google_font_sanitization',
			)
		);

		$wp_customize->add_control(
			new Rollie_Google_Font_Select_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_obj',
				array(
					'description' => esc_html__( 'Select Google Fonts Family', 'rollie' ),
					'section'     => $this->customizer_section,
					'input_attrs' => array(
						'font_count'                => 'all',
						'orderby'                   => 'alpha',
						'disable_bold_italic'       => $this->font_data['disable_bold_italic']['default'],
						'object_name'               => $this->font_set_name . '_obj',
						'rollie_multiple_switch_cc' => $this->font_set_name . '_alt_enable-1',
					),
				)
			)
		);

		$wp_customize->add_setting(
			$this->font_set_name . '_alt',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'default'           => $this->font_data['alt']['default'],
			)
		);

		$wp_customize->add_control(
			$this->font_set_name . '_alt',
			array(
				'label'       => esc_html__( 'Custom Font Name', 'rollie' ),
				'description' => esc_html__( 'This name will be added to CSS stylesheet. Be sure that font file is included to website. If font is incorect, sets default', 'rollie' ),
				'section'     => $this->customizer_section,
				'type'        => 'text',
				'placeholder' => 'Arial',
				'input_attrs' => array(
					'rollie_multiple_switch_cc' => $this->font_set_name . '_alt_enable-2',
				),
			)
		);

		$wp_customize->add_setting(
			$this->font_set_name . '_alt_weight',
			array(
				'default'           => $this->font_data['alt_weight']['default'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',

			)
		);

		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_alt_weight',
				array(
					'label'       => esc_html__( 'Font Weight for custom font', 'rollie' ),
					'section'     => $this->customizer_section,
					'input_attrs' => array(
						'min'                       => 100,
						'max'                       => 900,
						'step'                      => 100,
						'rollie_multiple_switch_cc' => $this->font_set_name . '_alt_enable-2',
					),
				)
			)
		);

		$rollie_count_elements = 4;
		if ( ! $this->font_data['U']['ignore'] ) {
			$rollie_count_elements++;
		}
		if ( ! $this->font_data['align']['ignore'] ) {
			$rollie_count_elements++;
		}
		if ( ( ! $this->font_data['h4_min']['ignore'] && ! $this->font_data['h4_max']['ignore'] ) || ( ! $this->font_data['h2_min']['ignore'] && ! $this->font_data['h2_max']['ignore'] ) ) {
			$rollie_count_elements += 2;
		}

		$wp_customize->add_setting( $this->font_set_name . '_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				$this->font_set_name . '_label',
				array(
					'label'       => __( 'Font Size & Align', 'rollie' ),
					'section'     => $this->customizer_section,

					'input_attrs' => array(
						'rollie_collapse_elements_number' => $rollie_count_elements,
						'expanded'                        => true,
					),
				)
			)
		);

		if ( ! $this->font_data['align']['ignore'] ) {
			$wp_customize->add_setting(
				$this->font_set_name . '_align',
				array(
					'sanitize_callback' => 'rollie_sanitize_radio',
					'default'           => $this->font_data['align']['default'],
				)
			);

			$wp_customize->add_control(
				new rollie_Icon_Customize_Control(
					$wp_customize,
					$this->font_set_name . '_align',
					array(
						'label'   => esc_html__( 'Text align', 'rollie' ),
						'section' => $this->customizer_section,
						'type'    => 'radio',
						'choices' => array(
							1 => esc_html( 'fa-align-left ' . __( 'Align left', 'rollie' ) ),
							2 => esc_html( 'fa-align-center ' . __( 'Center', 'rollie' ) ),
							3 => esc_html( 'fa-align-justify ' . __( 'Justify', 'rollie' ) ),
							4 => esc_html( 'fa-align-right ' . __( 'Align right', 'rollie' ) ),
						),
					)
				)
			);
		}
		if ( ! $this->font_data['U']['ignore'] ) {
			$wp_customize->add_setting(
				$this->font_set_name . '_U',
				array(
					'default'           => $this->font_data['U']['default'],
					'transport'         => 'refresh',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
				)
			);
			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					$this->font_set_name . '_U',
					array(
						'label'   => esc_html__( 'Uppercase text', 'rollie' ),
						'section' => $this->customizer_section,
					)
				)
			);
		}
		$wp_customize->add_setting(
			$this->font_set_name . '_max',
			array(
				'default'           => $this->font_data['max']['default'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_max',
				array(
					'label'       => esc_html__( 'Maximum font size (px)', 'rollie' ),
					'section'     => $this->customizer_section,
					'description' => esc_html__( 'Should be bigger than min font size otherwise sets default', 'rollie' ),
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					),
				)
			)
		);
		$wp_customize->add_setting(
			$this->font_set_name . '_min',
			array(
				'default'           => $this->font_data['min']['default'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_min',
				array(
					'label'       => esc_html__( 'Minimum font size (px)', 'rollie' ),
					'description' => esc_html__( 'Should be less than max font size otherwise sets default', 'rollie' ),
					'section'     => $this->customizer_section,
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					),
				)
			)
		);

		// additional fields for h2 and h4 .
		if ( ( ! $this->font_data['h4_min']['ignore'] && ! $this->font_data['h4_max']['ignore'] ) || ( ! $this->font_data['h2_min']['ignore'] && ! $this->font_data['h2_max']['ignore'] ) ) {
			$heading_repeats = array();
			if ( ! $this->font_data['h4_min']['ignore'] ) {
				$heading_repeats[] = 'h4';
			}
			if ( ! $this->font_data['h2_min']['ignore'] ) {
				$heading_repeats[] = 'h2';
			}

			foreach ( $heading_repeats as $key => $value ) {

				$wp_customize->add_setting(
					$this->font_set_name . '_' . $value . '_min',
					array(
						'default'           => $this->font_data[ $value . '_min' ]['default'],
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

				$wp_customize->add_control(
					new Rollie_Slider_Custom_Control(
						$wp_customize,
						$this->font_set_name . '_' . $value . '_min',
						array(
							'label'       => esc_html( __( 'Minimum font size for', 'rollie' ) . ' ' . $value . ' ' . __( 'headings (px)', 'rollie' ) ),
							'description' => esc_html__( 'Should be less than max font size otherwise sets default', 'rollie' ),
							'section'     => $this->customizer_section,
							'input_attrs' => array(
								'min'  => 1,
								'max'  => 100,
								'step' => 1,
							),
						)
					)
				);

				$wp_customize->add_setting(
					$this->font_set_name . '_' . $value . '_max',
					array(
						'default'           => $this->font_data[ $value . '_max' ]['default'],
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

				$wp_customize->add_control(
					new Rollie_Slider_Custom_Control(
						$wp_customize,
						$this->font_set_name . '_' . $value . '_max',
						array(
							'label'       => esc_html( __( 'Maximum font size for', 'rollie' ) . ' ' . $value . ' ' . __( 'headings (px)', 'rollie' ) ),
							'description' => esc_html__( 'Should be more than min font size otherwise sets default', 'rollie' ),
							'section'     => $this->customizer_section,
							'input_attrs' => array(
								'min'  => 1,
								'max'  => 100,
								'step' => 1,
							),
						)
					)
				);
			}
		}

		$wp_customize->add_setting(
			$this->font_set_name . '_ls',
			array(
				'default'           => $this->font_data['ls']['default'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_float',
			)
		);
		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_ls',
				array(
					'label'       => esc_html__( 'Letter spacing (px)', 'rollie' ),
					'section'     => $this->customizer_section,
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 5,
						'step' => 0.1,
					),
				)
			)
		);

		$wp_customize->add_setting(
			$this->font_set_name . '_lh',
			array(
				'default'           => $this->font_data['lh']['default'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_float',
			)
		);
		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				$this->font_set_name . '_lh',
				array(
					'label'       => esc_html__( 'Line height (em)', 'rollie' ),
					'section'     => $this->customizer_section,
					'input_attrs' => array(
						'min'  => 0.5,
						'max'  => 5,
						'step' => 0.1,

					),
				)
			)
		);
	}
	public function add_font() {
		$font_str = $this->font_set_name;
		$font_obj = json_decode( get_theme_mod( $this->font_set_name . '_obj' ) );

		if ( ! $this->font_data['U']['ignore'] ) {
			$font_array['U'] = get_theme_mod( $this->font_set_name . '_U', );
		}

		$font_array['ls']     = get_theme_mod( $this->font_set_name . '_ls', $this->font_data['ls']['default'] );
		$font_array['lh']     = get_theme_mod( $this->font_set_name . '_lh', $this->font_data['lh']['default'] );
		$font_array_obj       = get_theme_mod( $this->font_set_name . '_obj' );
		$font_array['max']    = get_theme_mod( $this->font_set_name . '_max', $this->font_data['max']['default'] );
		$font_array['min']    = get_theme_mod( $this->font_set_name . '_min', $this->font_data['min']['default'] );
		$font_array['vw_min'] = get_theme_mod( 'rollie_font_vw_min', 400 );
		$font_array['vw_max'] = get_theme_mod( 'rollie_font_vw_max', 1200 );

		if ( ! $this->font_data['align']['ignore'] ) {
			$font_array['align'] = get_theme_mod( $this->font_set_name . '_align', $this->font_data['align']['default'] );
		}

		$font_array['alt_enable'] = get_theme_mod( $this->font_set_name . '_alt_enable', $this->font_data['alt_enable']['default'] );
		$font_array['alt']        = get_theme_mod( $this->font_set_name . '_alt', $this->font_data['alt']['default'] );
		$font_array['alt_weight'] = get_theme_mod( $this->font_set_name . '_alt_weight', $this->font_data['alt_weight']['default'] );

		if ( ! $this->font_data['h2_min']['ignore'] ) {
			$font_array['h2_min'] = get_theme_mod( $this->font_set_name . '_h2_min', $this->font_data['h2_min']['default'] );

			$font_array['h2_max'] = get_theme_mod( $this->font_set_name . '_h2_max', $this->font_data['h2_max']['default'] );
		}
		if ( ! $this->font_data['h4_min']['ignore'] ) {
			$font_array['h4_min'] = get_theme_mod( $this->font_set_name . '_h4_min', $this->font_data['h4_min']['default'] );
			$font_array['h4_max'] = get_theme_mod( $this->font_set_name . '_h4_max', $this->font_data['h4_max']['default'] );
		}
		$font_array['disable_bold_italic'] = $this->font_data['disable_bold_italic']['default'];

		$css_snippet = '';

		if ( ! empty( $font_str ) && ! empty( $font_array ) ) {

			$rollie_class         = '';
			$rollie_initial_class = '';
			$rollie_apply_h2      = false;
			$rollie_apply_h4      = false;
			$i                    = 0;

			foreach ( $this->font_set_class as $classes ) {

				if ( $i > 0 ) {
					$o = ',';
				} else {

					$rollie_initial_class = $classes;
					$o                    = '';
				}
				$rollie_class .= $o . $classes;
				$i++;
			}

			if ( $font_array['min'] < $font_array['max'] && $font_array['vw_min'] < $font_array['vw_max'] ) {

				$css_snippet .= $rollie_class . '{';

				$css_snippet .= 'font-size:' . $font_array['min'] . 'px;';
				$css_snippet .= '}';

				$css_snippet .= '@media screen and (min-width: ' . $font_array['vw_min'] . 'px){';

				$css_snippet .= $rollie_class . '{';

				$css_snippet .= 'font-size: calc( ' . $font_array['min'] . 'px + ( ( ' . $font_array['max'] . ' - ' . $font_array['min'] . ' ) * (100vw - ' . $font_array['vw_min'] . 'px) / (' . $font_array['vw_max'] . ' - ' . $font_array['vw_min'] . ') ) );';
				$css_snippet .= '}';
				$css_snippet .= '}';
				$css_snippet .= '@media screen and (min-width: ' . $font_array['vw_max'] . ') {';
				$css_snippet .= $rollie_class . '{';

				$css_snippet .= 'font-size: ' . $font_array['max'] . 'px;';
				$css_snippet .= '}';
				$css_snippet .= '}';

				if ( array_key_exists( 'h2_min', $font_array ) ) {

					$rollie_apply_h2    = true;
					$rollie_heading_str = 'h2';
				}
				if ( array_key_exists( 'h4_min', $font_array ) ) {
					$rollie_apply_h4    = true;
					$rollie_heading_str = 'h4';
				}

				if ( $rollie_apply_h2 || $rollie_apply_h4 ) {

					$css_snippet .= $rollie_initial_class . '_' . $rollie_heading_str . '{' . "\n";
					$css_snippet .= 'font-size: ' . $font_array[ $rollie_heading_str . '_min' ] . 'px;';
					$css_snippet .= '}' . "\n";
					$css_snippet .= '@media screen and (min-width: ' . $font_array['vw_min'] . 'px) {' . "\n";
					$css_snippet .= $rollie_initial_class . '_' . $rollie_heading_str . ' , ' . $rollie_heading_str . '{' . "\n";
					$css_snippet .= 'font-size: calc( ' . $font_array[ $rollie_heading_str . '_min' ] . 'px + ( ( ' . $font_array[ $rollie_heading_str . '_max' ] . ' - ' . $font_array[ $rollie_heading_str . '_min' ] . ' ) * (100vw - ' . $font_array['vw_min'] . 'px) / (' . $font_array['vw_max'] . ' - ' . $font_array['vw_min'] . ') ) ) !important;';
					$css_snippet .= '}' . "\n";
					$css_snippet .= '}' . "\n";
					$css_snippet .= '@media screen and (min-width: ' . $font_array['vw_max'] . 'px) {' . "\n";
					$css_snippet .= $rollie_initial_class . '_' . $rollie_heading_str . ' , ' . $rollie_heading_str . '{' . "\n";
					$css_snippet .= 'font-size: calc( ' . $font_array[ $rollie_heading_str . '_min' ] . 'px + ( ( ' . $font_array[ $rollie_heading_str . '_max' ] . ' - ' . $font_array[ $rollie_heading_str . '_min' ] . ' ) * (100vw - ' . $font_array['vw_min'] . 'px) / (' . $font_array['vw_max'] . ' - ' . $font_array['vw_min'] . ') ) ) !important;';
					$css_snippet .= '}' . "\n";
					$css_snippet .= '}' . "\n";
				}
			}

			if ( $font_array['alt_enable'] && is_object( $font_obj ) ) {

				( is_null( $font_obj->font ) ) ? $rollie_font = 'Rokkitt' : $rollie_font = $font_obj->font;

				( is_null( $font_obj->regularweight ) ) ? $rollie_font_w = '300' : $rollie_font_w  = $font_obj->regularweight;

				if ( ! $font_array['disable_bold_italic'] ) {

					( is_null( $font_obj->italicweight ) || 'italic' == $font_obj->italicweight ) ? $rollie_font_i = '' : $rollie_font_i  = $font_obj->italicweight;
					( is_null( $font_obj->boldweight ) ) ? $rollie_font_b = '700' : $rollie_font_b  = $font_obj->boldweight;
					$rollie_i_w = str_replace( 'italic', '', $rollie_font_i );

					$rollie_i_w = str_replace( 'i', '', $rollie_i_w );

					$css_snippet .= $rollie_class . ' > i, ' . $rollie_initial_class . '_i {';
					if ( is_string( $rollie_i_w ) ) :
						$rollie_str_a = 'normal';
					else :
						$rollie_str_a = $rollie_i_w;
					endif;
					if ( is_string( $rollie_font_b ) ) :
						$rollie_str_b = 'normal';
					else :
						$rollie_str_b = $rollie_font_b;
					endif;
					$css_snippet .= 'font-weight: ' . $rollie_str_a;
					$css_snippet .= '}' . "\n";

					$css_snippet .= $rollie_class . '> b,' . $rollie_initial_class . '_b {';
					$css_snippet .= 'font-weight:' . $rollie_str_b;
					$css_snippet .= '}' . "\n";
				} else {

					$rollie_font_b = '';
					$rollie_font_i = '';
				}

				( is_null( $font_obj->subsets ) ) ? $rollie_font_s = 'latin' : $rollie_font_s = $font_obj->subsets;

				$css_snippet .= $rollie_class . '{' . "\n";
				if ( $font_array['min'] == $font_array['max'] ) {
					$css_snippet .= 'font-size: ' . $font_array['max'] . 'px;';
				}

				if ( is_string( $rollie_font_w ) ) :
					$rollie_str_c = 'normal';
				else :
					$rollie_str_c = $rollie_font_w;
				endif;

				$css_snippet .= "font-family: '" . $rollie_font . "'  , Arial,serif;";
				$css_snippet .= 'font-weight: ' . $rollie_str_c . ';';
				$css_snippet .= 'letter-spacing: ' . $font_array['ls'] . 'px;';
				$css_snippet .= 'line-height: ' . $font_array['lh'] . ';';

				if ( array_key_exists( 'U', $font_array ) && $font_array['U'] ) {
					$css_snippet .= 'text-transform:uppercase;';
				}

				if ( array_key_exists( 'align', $font_array ) && $font_array['align'] ) {
					$css_snippet .= rollie_text_align_f( $font_array['align'] );
				}
				$css_snippet .= '}' . "\n";

				if ( ! empty( $rollie_font_s ) ) {
					$rollie_font_s = $rollie_font_s;
				} else {
					$rollie_font_s = 'latin';
				}

				if ( empty( $rollie_font_w ) || 'regular' == $rollie_font_w ) {
					$rollie_font_w = 'regular';
				}

				if ( empty( $rollie_font_i ) || 'italic' == $rollie_font_i ) {
					$rollie_font_i = '';
				}

				if ( empty( $rollie_font_b ) || 'regular' == $rollie_font_b ) {
					$rollie_font_b = '';
				}

				$rollie_font = preg_replace( '/[\s_]/', '+', $rollie_font );

				$rollie_google_font = array(
					'name'                => $rollie_font,
					'weight'              => $rollie_font_w,
					'boldweight'          => $rollie_font_b,
					'italicweight'        => $rollie_font_i,
					'subset'              => $rollie_font_s,
					'disable_bold_italic' => $font_array['disable_bold_italic'],
				);
			} else {

				$css_snippet .= $rollie_class . '{' . "\n";

				if ( $font_array['min'] == $font_array['max'] ) {
					$css_snippet .= 'font-size: ' . $font_array['max'] . 'px;';
				}

				$css_snippet .= 'font-family: ' . $font_array['alt'] . ', Arial,serif;';
				if ( is_string( $font_array['alt_weight'] ) ) :
					$rollie_str_d = 'normal';
				else :
					$rollie_str_d = $font_array['alt_weight'];
				endif;
				$css_snippet .= 'font-weight: ' . $rollie_str_d . ';';
				$css_snippet .= 'letter-spacing: ' . $font_array['ls'] . 'px;';
				$css_snippet .= 'line-height: ' . $font_array['lh'] . ';';

				if ( array_key_exists( 'U', $font_array ) && $font_array['U'] ) {
					$css_snippet .= 'text-transform:uppercase;';
				}

				if ( array_key_exists( 'align', $font_array ) && $font_array['align'] ) {
					$css_snippet .= rollie_text_align_f( $font_array['align'] );
				}
				$css_snippet .= '}' . "\n";

				if ( $rollie_apply_h2 || $rollie_apply_h4 ) {

					$css_snippet .= $rollie_initial_class . '_' . $rollie_heading_str . ' , ' . $rollie_heading_str . ' {';
					$css_snippet .= 'font-size: ' . $font_array[ $rollie_heading_str . '_max' ] . 'px;';
					$css_snippet .= '}' . "\n";
				}
			}
			wp_add_inline_style( 'rollie_stylesheet', $css_snippet );
			if ( isset( $rollie_google_font ) ) {

				return array( $rollie_google_font, $css_snippet );
			} else {
				return array( '', $css_snippet );
			}
		}
	}
}

function rollie_fonts_customizer_css() {
	global $rollie_font_data;
	foreach ( $rollie_font_data as  $rollie_font_obj ) {
		$rollie_font_google_data[] = $rollie_font_obj->add_font()[0];
	}

	add_google_font_snippet( $rollie_font_google_data );
}

function add_google_font_snippet( $rollie_google_s ) {

	$rollie_google_s = array_values( array_filter( $rollie_google_s ) );

	if ( ! empty( $rollie_google_s ) && $rollie_google_s ) {

		$rollie_google_s = rollie_remove_duplicates_from_multidimension_array( $rollie_google_s );
		// $rollie_google_compressed = [];
		$rollie_google_compressed = array( array( 'weight', 'name' ) );

		$temp_array                 = array( array( 'weight' ) );
		$rollie_google_compressed_s = array();
		$rollie_google_compressed_i = array();

		foreach ( $rollie_google_s as $rollie_google_name ) {
			if ( is_null( $rollie_google_name ) ) {
				continue;
			}
			$temp_array_names[] = $rollie_google_name['name'];
		}

		foreach ( $rollie_google_s as $rollie_google_name ) {
			$isrepeated = false;

			if ( ! in_array( $rollie_google_name['name'], $temp_array ) ) {
				$temp_array[] = $rollie_google_name['name'];
			} else {
				$isrepeated = true;
			}

			if ( $isrepeated ) {
				if ( ! empty( $rollie_google_name['weight'] ) ) {
					if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
						$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['weight'] . ',';
					} else {
						$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['weight'] . ',';
					}
				}

				if ( ! $rollie_google_name['disable_bold_italic'] ) {
					if ( ! empty( $rollie_google_name['boldweight'] ) ) {
						if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
							$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['boldweight'] . ',';
						} else {
							$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['boldweight'] . ',';
						}
					}
					if ( ! empty( $rollie_google_name['italicweight'] ) ) {
						if ( 'italic' != $rollie_google_name['italicweight'] ) {

							if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
								$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['italicweight'] . ',';
							} else {
								$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['italicweight'] . ',';
							}
						}
					}
				}
			} else {

				if ( ! $rollie_google_name['disable_bold_italic'] ) {
					if ( ! empty( $rollie_google_name['boldweight'] ) ) {
						if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
							$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['boldweight'] . ',';
						} else {
							$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['boldweight'] . ',';
						}
					}
					if ( ! empty( $rollie_google_name['italicweight'] ) ) {
						if ( 'italic' != $rollie_google_name['italicweight'] ) {

							if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
								$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['italicweight'] . ',';
							} else {
								$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['italicweight'] . ',';
							}
						}
					}
				}

				$rollie_google_compressed[ $rollie_google_name['name'] ]['name'] = $rollie_google_name['name'];

				if ( ! empty( $rollie_google_name['weight'] ) ) {
					if ( empty( $rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] ) ) {
						$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] = $rollie_google_name['weight'] . ',';
					} else {
						$rollie_google_compressed[ $rollie_google_name['name'] ]['weight'] .= $rollie_google_name['weight'] . ',';
					}
				}
			}

			if ( isset( $rollie_google_name['subset'] ) && ! empty( $rollie_google_name['subset'] ) ) {
				$rollie_google_compressed_s[] = $rollie_google_name['subset'];
			}
		}

		$rollie_google_compressed_s = array_unique( $rollie_google_compressed_s );
		$rollie_google_compressed_s = implode( ',', $rollie_google_compressed_s );

		$rollie_google_compressed_url = '';
		$rollie_google_compressed     = array_values( array_filter( $rollie_google_compressed ) );

		foreach ( $rollie_google_compressed as $rollie_single_c ) {
			if ( empty( $rollie_single_c['name'] ) ) {
				continue;
			}
			if ( ! empty( $rollie_single_c['weight'] ) && ',' != $rollie_single_c['weight'] ) {

				$rollie_single_c['weight'] = substr( $rollie_single_c['weight'], 0, -1 );
				$rollie_single_c['weight'] = explode( ',', $rollie_single_c['weight'] );
				$rollie_single_c['weight'] = array_unique( $rollie_single_c['weight'] );
				$rollie_single_c['weight'] = implode( ',', $rollie_single_c['weight'] );

				if ( strpos( $rollie_single_c['weight'], 'italic' ) ) {
					$rollie_single_c['weight'] = str_replace( 'italic', 'i', $rollie_single_c['weight'] );
				}

				$rollie_single_c['weight'] = ':' . $rollie_single_c['weight'];
			} else {
				$rollie_single_c['weight'] = '';
			}

			if ( empty( $rollie_single_c['name'] ) ) {
				$rollie_google_compressed_url = $rollie_single_c['name'] . $rollie_single_c['weight'] . '|';
			} else {
				$rollie_google_compressed_url .= $rollie_single_c['name'] . $rollie_single_c['weight'] . '|';
			}
		}
		// deleting last "|" .

		$rollie_google_compressed_url = substr( $rollie_google_compressed_url, 0, -1 );

		$rollie_google_compressed_url = 'https://fonts.googleapis.com/css?family=' . $rollie_google_compressed_url . '&amp;subset=' . $rollie_google_compressed_s;

		wp_enqueue_style( 'rollie_custom_google_fonts', $rollie_google_compressed_url, array(), '1.0' );
	}
}
class Rollie_Gradient {
	public function __construct( $theme_mod, $standard_color, $css_selector, $css_property, $css_before_value = '' ) {
		$this->theme_mod      = $theme_mod;
		$this->standard_color = $standard_color;
		$this->css_selector   = $css_selector;
		$this->css_property   = $css_property;

		if ( $css_before_value ) {
			$this->css_before_value = $css_before_value;
		} else {
			$this->css_before_value = '';
		}
		if ( get_theme_mod( $theme_mod . '_gr_1' ) ) {

			$this->rgb_gr_1 = $this->to_rgb( get_theme_mod( $theme_mod . '_gr_1' ) );
		} else {
			$this->rgb_gr_1 = $standard_color;
		}
		if ( get_theme_mod( $theme_mod . '_gr_2' ) ) {
			$this->rgb_gr_2 = $this->to_rgb( get_theme_mod( $theme_mod . '_gr_2' ) );
		} else {
			$this->rgb_gr_2 = $standard_color;
		}
		if ( get_theme_mod( $theme_mod . '_gr_3' ) ) {

			$this->rgb_gr_3 = $this->to_rgb( get_theme_mod( $theme_mod . '_gr_3' ) );
		} else {
			$this->rgb_gr_3 = $standard_color;
		}

		if ( 2 == get_theme_mod( $theme_mod . '_gs' ) ) {
			$this->rgb = $this->to_rgb( get_theme_mod( $theme_mod . '_gr_1' ) );
		} else {
			$this->rgb = $this->to_rgb( get_theme_mod( $theme_mod ) );
		}

		if ( ! $this->rgb ) {
			$this->rgb = $this->standard_color;
		}
	}
	private function to_rgb( $color ) {
		if ( isset( $color[0] ) && '#' != $color[0] ) {
			$color = ( preg_split( '/rgba?\(\s*|\s*,\s*|\s*\)/', $color, -1, PREG_SPLIT_NO_EMPTY ) );
			return '#' . dechex( $color[0] ) . dechex( $color[1] ) . dechex( $color[2] );
		} else {

			return $color;
		}
	}

	public function css_snippet( $without_selectors = false ) {
		$css_snippet_all = '';
		if ( $without_selectors ) {
			$css_snippet_before_a = array( ' ' );
			$css_snippet_after    = '';
		} else {
			$css_snippet_before_a = array();
			foreach ( $this->css_property as $key => $css_property ) {
				$css_snippet_before_a[] = $this->css_selector . ' { ' . $css_property . ':';
			}
			$css_snippet_after = '; } ';
		}

		if ( get_theme_mod( $this->theme_mod . '_gs' ) == 2 ) { // means gradient active.
			foreach ( $css_snippet_before_a as $css_snippet_before ) {
				$css_snippet_all .= $css_snippet_before . ' linear-gradient( ' . get_theme_mod( $this->theme_mod . '_angle_gr', 0 ) . 'deg, ' . get_theme_mod( $this->theme_mod . '_gr_1', $this->standard_color ) . ' ' . get_theme_mod( $this->theme_mod . '_stop_gr_1', 100 ) . '% , ' . get_theme_mod( $this->theme_mod . '_gr_2', $this->standard_color ) . ' ' . get_theme_mod( $this->theme_mod . '_stop_gr_2', 0 ) . '% , ' . get_theme_mod( $this->theme_mod . '_gr_3', $this->standard_color ) . ' ' . get_theme_mod( $this->theme_mod . '_stop_gr_3', 0 ) . '% )' . $css_snippet_after;
			}
		} else {
			foreach ( $css_snippet_before_a as $css_snippet_before ) {
				$css_snippet_all .= $css_snippet_before . $this->css_before_value . ' ' . get_theme_mod( $this->theme_mod, $this->standard_color ) . $css_snippet_after;
			}
		}
		return $css_snippet_all;
	}
}

class Rollie_Border {

	private $customizer_section_description;
	private $customizer_section_title;
	private $border_set_name;
	private $panel_flag;
	private $expand_label;
	private $customizer_section;

	public function __construct( $border_set_name, $customizer_section, $customizer_section_title, $customizer_section_description = '', $panel_flag = false, $expand_label = false ) {
		 $this->border_set_name               = 'rollie_border_' . $border_set_name;
		$this->customizer_section             = $customizer_section;
		$this->panel_flag                     = $panel_flag;
		$this->customizer_section_title       = $customizer_section_title;
		$this->customizer_section_description = $customizer_section_description;
		if ( $expand_label ) {
			$this->expand_label = true;
		} else {
			$this->expand_label = false;
		}
	}

	public function add_customizer_controls() {
		global $wp_customize;
		if ( $this->panel_flag ) {

			$wp_customize->add_section(
				$this->border_set_name . '_section',
				array(
					'title'    => $this->customizer_section_title,
					'panel'    => $this->customizer_section,
					'priority' => 20,
				)
			);
			$this->customizer_section = $this->border_set_name . '_section';
		}
		if ( ! $this->panel_flag || $this->expand_label ) {
			$wp_customize->add_setting( $this->border_set_name . '_collapse', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
			$wp_customize->add_control(
				new Rollie_Customizer_Collapse_Label_Control(
					$wp_customize,
					$this->border_set_name . '_collapse',
					array(
						'label'       => $this->customizer_section_title,
						'section'     => $this->customizer_section,
						'priority'    => 30,

						'input_attrs' => array(
							'rollie_collapse_elements_number' => 2,
							'expanded' => $this->expand_label,
						),
					)
				)
			);
		}
		$wp_customize->add_setting(
			$this->border_set_name . '_w',
			array(
				'default'           => '2,2,2,2',
				'sanitize_callback' => 'rollie_sanitize_css_ruler',
			)
		);

		$wp_customize->add_control(
			new Rollie_Css_Ruler_Control(
				$wp_customize,
				$this->border_set_name . '_w',
				array(
					'label'       => __( 'Border width:', 'rollie' ),
					'description' => $this->customizer_section_description,
					'section'     => $this->customizer_section,
					'priority'    => 30,
					'input_attrs' => array(
						'type' => 'b-width',
					),
				)
			)
		);
		$wp_customize->add_setting(
			$this->border_set_name . '_rad',
			array(
				'default'           => '2,2,2,2',
				'sanitize_callback' => 'rollie_sanitize_css_ruler',
			)
		);
		$wp_customize->add_control(
			new Rollie_Css_Ruler_Control(
				$wp_customize,
				$this->border_set_name . '_rad',
				array(
					'label'       => esc_html__( 'Border Radius:', 'rollie' ),
					'section'     => $this->customizer_section,
					'priority'    => 30,
					'input_attrs' => array(
						'type' => 'b-width',
					),
				)
			)
		);
	}
	public function css_snippet() {
		return "\n  border-style:solid;\nborder-width:" . str_replace( ',', 'px ', get_theme_mod( $this->border_set_name . '_w', '2,2,2,2' ) . ',' ) . ";\n  border-radius:" . str_replace( ',', 'px ', get_theme_mod( $this->border_set_name . '_rad', '2,2,2,2' ) . ',' ) . ";\n";
	}
}
