<?php

function rollie_meta_control( $wp_customize, $rollie_sufix, $rollie_section_prefix ) {
		$wp_customize->add_setting( 'rollie_meta_label' . $rollie_sufix, array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_meta_label' . $rollie_sufix,
				array(
					'label'       => __( 'Metainfos', 'rollie' ),

					'section'     => $rollie_section_prefix . $rollie_sufix,
					'input_attrs' => array(
						'rollie_collapse_elements_number' => 5,

					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_meta_style' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_meta_style' . $rollie_sufix,
			array(
				'label'   => __( 'Metainfo Style', 'rollie' ),
				'section' => $rollie_section_prefix . $rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					1 => __( 'Classic', 'rollie' ),
					2 => __( 'Modern', 'rollie' ),
					3 => __( 'Clean', 'rollie' ),

				),

			)
		);

		$wp_customize->add_setting(
			'rollie_display_date' . $rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_display_date' . $rollie_sufix,
				array(
					'label'   => __( 'Display Date', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author_avatar' . $rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_display_author_avatar' . $rollie_sufix,
				array(
					'label'   => __( 'Display Author Avatar', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author' . $rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_display_author' . $rollie_sufix,
				array(
					'label'   => __( 'Display Author', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,

				)
			)
		);
	$wp_customize->add_setting(
		'rollie_display_comments' . $rollie_sufix,
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_display_cat' . $rollie_sufix,
			array(
				'label'   => __( 'Display Comments Link', 'rollie' ),
				'section' => $rollie_section_prefix . $rollie_sufix,

			)
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_display_comments' . $rollie_sufix,
			array(
				'label'   => __( 'Display Categories', 'rollie' ),
				'section' => $rollie_section_prefix . $rollie_sufix,

			)
		)
	);
	$wp_customize->add_setting(
		'rollie_display_cat' . $rollie_sufix,
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);
}
function rollie_thumbnail_control( $wp_customize, $rollie_sufix, $rollie_section_prefix ) {
	$wp_customize->add_setting( 'rollie_thumbnail_label' . $rollie_sufix, array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_thumbnail_label' . $rollie_sufix,
			array(
				'label'       => __( 'Thumbnail Image', 'rollie' ),
				'section'     => $rollie_section_prefix . $rollie_sufix,
				'input_attrs' => array(
					'rollie_collapse_elements_number' => 2,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_thumbnail_min_h' . $rollie_sufix,
		array(
			'default'           => 25,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);
	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_thumbnail_min_h' . $rollie_sufix,
			array(
				'label'       => esc_html__( 'Thumbnail Minimum Image height (vh)', 'rollie' ),
				'section'     => $rollie_section_prefix . $rollie_sufix,
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 100,
					'step' => 1,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_thumbnail_max_h' . $rollie_sufix,
		array(
			'default'           => 50,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);
	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_thumbnail_max_h' . $rollie_sufix,
			array(
				'label'       => esc_html__( 'Thumbnail Maximum Image height (vh)', 'rollie' ),
				'section'     => $rollie_section_prefix . $rollie_sufix,
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 100,
					'step' => 1,
				),
			)
		)
	);
}
function rollie_header_control( $wp_customize, $rollie_sufix, $rollie_section_prefix ) {
	$wp_customize->add_setting( 'rollie_header' . $rollie_sufix, array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_header' . $rollie_sufix,
				array(
					'label'       => __( 'Header Image', 'rollie' ),

					'section'     => $rollie_section_prefix . $rollie_sufix,
					'input_attrs' => array(
						'rollie_collapse_elements_number' => 6,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_alt_thumbnail' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_file',
				'transport'         => 'refresh',
				'default'           => '',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail' . $rollie_sufix,
				array(
					'label'   => __( 'Alternate Thumbnail', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_header_style' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_header_style' . $rollie_sufix,
			array(
				'label'   => esc_html__( 'Header Style', 'rollie' ),
				'section' => $rollie_section_prefix . $rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					'classic'             => esc_html__( 'Classic', 'rollie' ),
					'classic_transparent' => esc_html__( 'Classic Transparent', 'rollie' ),
					'modern'              => esc_html__( 'Modern', 'rollie' ),
					'modern_transparent'  => esc_html__( 'Modern Transparent', 'rollie' ),
					'clean'               => esc_html__( 'Clean', 'rollie' ),
				),

			)
		);

		$wp_customize->add_setting(
			'rollie_header_height' . $rollie_sufix,
			array(
				'default'           => 65,
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_header_height' . $rollie_sufix,
			array(
				'label'       => __( 'Header Image size (vh)', 'rollie' ),

				'section'     => $rollie_section_prefix . $rollie_sufix,
				'input_attrs' => array(
					'min'  => 20,
					'max'  => 120,
					'step' => 1,
				),
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_header_ex_style' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			'rollie_header_ex_style' . $rollie_sufix,
			array(
				'label'   => __( 'Excerpt Display Style', 'rollie' ),
				'section' => $rollie_section_prefix . $rollie_sufix,
				'type'    => 'select',

				'choices' => array(
					1 => __( 'Hide Excerpt', 'rollie' ),
					2 => __( 'Next to Titles', 'rollie' ),
					3 => __( 'Below Titles', 'rollie' ),
					4 => __( 'Responsive', 'rollie' ),
				),

			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_header_full_width' . $rollie_sufix,
				array(
					'label'   => __( 'Full Width Header', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_header_h_align' . $rollie_sufix,
				array(
					'sanitize_callback' => 'rollie_sanitize_radio',
					'default'           => 2,

				)
			);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_header_h_align' . $rollie_sufix,
				array(
					'label'   => esc_html__( 'Title Container Horizontal Align', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,
					'type'    => 'radio',
					'choices' => array(
						1 => 'fa-align-left ' . esc_html__( 'Align left', 'rollie' ),
						2 => 'fa-align-center ' . esc_html__( 'Center', 'rollie' ),
						3 => 'fa-align-right ' . esc_html__( 'Align right', 'rollie' ),
					),
				)
			)
		);
			$wp_customize->add_setting(
				'rollie_header_v_align' . $rollie_sufix,
				array(
					'sanitize_callback' => 'rollie_sanitize_radio',
					'default'           => 2,

				)
			);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_header_v_align' . $rollie_sufix,
				array(
					'label'   => esc_html__( 'Title Container Vertical Align', 'rollie' ),
					'section' => $rollie_section_prefix . $rollie_sufix,
					'type'    => 'radio',
					'choices' => array(
						1 => 'fa-align-left,fa-rotate-90,d-block,mb-6  ' . esc_html__( 'Align Top', 'rollie' ),
						2 => 'fa-align-justify,mb-6  ' . esc_html__( 'Center', 'rollie' ),
						3 => 'fa-align-right,fa-rotate-90,d-block,mb-6 ' . esc_html__( 'Align Bottom', 'rollie' ),
					),
				)
			)
		);
}


function rollie_add_page_control( $wp_customize, $rollie_panel_name, $rollie_title, $rollie_sufix ) {
	if ( ! empty( $rollie_sufix ) ) {
		$rollie_sufix = '_' . $rollie_sufix;
	}

	$wp_customize->add_section(
		'rollie_page' . $rollie_sufix,
		array(
			'title'    => esc_html( $rollie_title ),
			'panel'    => 'rollie_grid_masonry_meta_panel',
			'priority' => 20,
		)
	);
	rollie_header_control( $wp_customize, $rollie_sufix, 'rollie_page' );
	rollie_meta_control( $wp_customize, $rollie_sufix, 'rollie_page' );
}


function rollie_add_post_page_control( $wp_customize, $rollie_panel_name, $rollie_title, $rollie_sufix ) {

	if ( ! empty( $rollie_sufix ) ) {
		$rollie_sufix = '_' . $rollie_sufix;
	}
	$wp_customize->add_section(
		'rollie_post_page' . $rollie_sufix,
		array(
			'title'    => esc_html( $rollie_title ),
			'panel'    => 'rollie_grid_masonry_meta_panel',
			'priority' => 20,
		)
	);

	rollie_header_control( $wp_customize, $rollie_sufix, 'rollie_post_page' );
	rollie_thumbnail_control( $wp_customize, $rollie_sufix, 'rollie_post_page' );

		$wp_customize->add_setting( 'rollie_grid_masonry_label' . $rollie_sufix, array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_grid_masonry_label' . $rollie_sufix,
				array(
					'label'       => __( 'Post Grid', 'rollie' ),

					'section'     => 'rollie_post_page' . $rollie_sufix,
					'input_attrs' => array(
						'rollie_collapse_elements_number' => 11,

					),
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_grid_masonry_type' . $rollie_sufix,
				array(
					'default'           => 1,
					'sanitize_callback' => 'rollie_sanitize_radio',
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					'rollie_grid_masonry_type' . $rollie_sufix,
					array(
						'section' => 'rollie_post_page' . $rollie_sufix,
						'choices' => array(
							1 => __( 'Rollie Custom Grid', 'rollie' ),
							2 => __( 'Masonry', 'rollie' ),
						),
					)
				)
			);
			$rollie_masonry_breakpoints = array( 'lg', 'sm', 'xs' );
			$rollie_size_labels         = array(
				'lg' => __( 'Large desktops', 'rollie' ),
				'sm' => __( 'Medium Devices', 'rollie' ),
				'xs' => __( 'Phones', 'rollie' ),
			);
			$input_attrs_device         = array(
				'switch_size'               => 'big',
				'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-2',
			);
			foreach ( $rollie_masonry_breakpoints as  $size ) {
				$input_attrs_device[ $size ]                      = true;
				$input_attrs_device[ 'collapse_target_' . $size ] = '#customize-control-' . 'rollie_post_page_masonry_size' . $size . $rollie_sufix;
			}

			$wp_customize->add_setting(
				'rollie_post_page_masonry_size' . $rollie_sufix . '_device',
				array(
					'sanitize_callback' => 'rollie_sanitize_select',
					'default'           => 1,

				)
			);

			$wp_customize->add_control(
				new Rollie_Device_Control(
					$wp_customize,
					'rollie_post_page_masonry_size' . $rollie_sufix . '_device',
					array(
						'section'     => 'rollie_post_page' . $rollie_sufix,
						'input_attrs' => $input_attrs_device,
						'label'       => __( 'Rollie Single Masonry Post Width', 'rollie' ),
					)
				)
			);

	foreach ( $rollie_masonry_breakpoints as $size ) {

		$wp_customize->add_setting(
			'rollie_post_page_masonry_size' . $size . $rollie_sufix,
			array(
				'default'           => 33,
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				'rollie_post_page_masonry_size' . $size . $rollie_sufix,
				array(
					'label'       => $rollie_size_labels[ $size ] . ' ' . __( 'width (%)', 'rollie' ),
					'section'     => 'rollie_post_page' . $rollie_sufix,
					'input_attrs' => array(
						'min'                       => 0,
						'max'                       => 100,
						'step'                      => 1,
						'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-2',
					),
				)
			)
		);
	}

				$wp_customize->add_setting(
					'rollie_post_page_masonry_gutter' . $rollie_sufix,
					array(
						'default'           => 3,
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_page_masonry_gutter' . $rollie_sufix,
			array(
				'label'       => __( 'Masonry gutter between posts (px)', 'rollie' ),
				'section'     => 'rollie_post_page' . $rollie_sufix,
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 50,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-2',
				),

			)
		)
	);

		$wp_customize->add_setting(
			'rollie_post_page_grid_for_paged' . $rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_post_page_grid_for_paged' . $rollie_sufix,
				array(
					'label'       => __( 'Set same style of display for next pages of posts', 'rollie' ),
					'section'     => 'rollie_post_page' . $rollie_sufix,
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',
					'input_attrs' => array(
						'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-1',

					),

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_one_on_row' . $rollie_sufix,
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_post_page_one_on_row' . $rollie_sufix,
			array(
				'label'       => __( 'Number of post displayed in full size column ', 'rollie' ),
				'section'     => 'rollie_post_page' . $rollie_sufix,
				'type'        => 'number',
				'input_attrs' => array(
					'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-1',

				),
			)
		);
			$wp_customize->add_setting(
				'rollie_post_page_two_on_row' . $rollie_sufix,
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_post_page_two_on_row' . $rollie_sufix,
			array(
				'label'       => __( 'Number of posts displayed in two columns ', 'rollie' ),
				'section'     => 'rollie_post_page' . $rollie_sufix,
				'type'        => 'number',
				'input_attrs' => array(
					'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-1',

				),
			)
		);
	$wp_customize->add_setting(
		'rollie_default_max_posts_on_row' . $rollie_sufix,
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 1,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_default_max_posts_on_row' . $rollie_sufix,
				array(
					'label'       => __( 'Default Style for rest of the posts', 'rollie' ),
					'section'     => 'rollie_post_page' . $rollie_sufix,
					'type'        => 'radio',
					'choices'     => array(
						0 => 'fa-bars ' . __( 'One column on row', 'rollie' ),
						1 => 'fa-th-large ' . __( 'Two columns on row', 'rollie' ),
						2 => 'fa-th ' . __( 'Three column on row ', 'rollie' ),
					),
					'input_attrs' => array(
						'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-1',
					),
				)
			)
		);

	$wp_customize->add_setting(
		'rollie_post_margin_auto' . $rollie_sufix,
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_post_margin_auto' . $rollie_sufix,
				array(
					'label'       => __( 'Center all posts', 'rollie' ),
					'section'     => 'rollie_post_page' . $rollie_sufix,
					'input_attrs' => array(
						'rollie_multiple_switch_cc' => 'rollie_grid_masonry_type' . $rollie_sufix . '-1',

					),
				)
			)
		);

	$wp_customize->add_setting( 'rollie_design_label' . $rollie_sufix, array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_design_label' . $rollie_sufix,
				array(
					'label'       => __( 'Post Design', 'rollie' ),
					'section'     => 'rollie_post_page' . $rollie_sufix,
					'input_attrs' => array(
						'rollie_collapse_elements_number' => 5,
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_row_design_0' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 'classic',

			)
		);

		$wp_customize->add_control(
			'rollie_post_page_row_design_0' . $rollie_sufix,
			array(
				'label'   => __( 'Design of posts displayed as one in one row', 'rollie' ),
				'section' => 'rollie_post_page' . $rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					'classic'             => __( 'Classic', 'rollie' ),
					'classic_transparent' => __( 'Classic Transparent (Reverses Text Colors)', 'rollie' ),
					'classic_clean'       => __( 'Classic Clean', 'rollie' ),
					'modern'              => __( 'Modern', 'rollie' ),
					'modern_transparent'  => __( 'Modern Transparent (Reverses Text Colors)', 'rollie' ),
					'clean'               => __( 'Clean', 'rollie' ),
				),

			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_row_design_1' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_post_page_row_design_1' . $rollie_sufix,
			array(
				'label'   => __( 'Design of posts displayed as two in one row', 'rollie' ),
				'section' => 'rollie_post_page' . $rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					'classic'             => __( 'Classic', 'rollie' ),
					'classic_transparent' => __( 'Classic Transparent (Reverses Text Colors)', 'rollie' ),
					'classic_clean'       => __( 'Classic Clean', 'rollie' ),
					'modern'              => __( 'Modern', 'rollie' ),
					'modern_transparent'  => __( 'Modern Transparent (Reverses Text Colors)', 'rollie' ),
					'clean'               => __( 'Clean', 'rollie' ),
				),
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_row_design_2' . $rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

	$wp_customize->add_control(
		'rollie_post_page_row_design_2' . $rollie_sufix,
		array(
			'label'   => __( 'Design of posts displayed as three in one row', 'rollie' ),
			'section' => 'rollie_post_page' . $rollie_sufix,
			'type'    => 'select',
			'choices' => array(
				'classic'             => __( 'Classic', 'rollie' ),
				'classic_transparent' => __( 'Classic Transparent (Reverses Text Colors)', 'rollie' ),
				'classic_clean'       => __( 'Classic Clean', 'rollie' ),
				'modern'              => __( 'Modern', 'rollie' ),
				'modern_transparent'  => __( 'Modern Transparent (Reverses Text Colors)', 'rollie' ),
				'clean'               => __( 'Clean', 'rollie' ),
			),
		)
	);

	$wp_customize->add_setting(
		'rollie_post_page_raw_enable' . $rollie_sufix,
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_post_page_raw_enable' . $rollie_sufix,
			array(
				'label'       => __( 'Enable raw style for all posts', 'rollie' ),
				'section'     => 'rollie_post_page' . $rollie_sufix,
				'input_attrs' => array(),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_aspect_ratio_clean' . $rollie_sufix,
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_aspect_ratio_clean' . $rollie_sufix,
			array(
				'label'   => __( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_post_page' . $rollie_sufix,
			)
		)
	);
	rollie_meta_control( $wp_customize, $rollie_sufix, 'rollie_post_page' );

}
/*
@param
  $section -> name of section will be applied to section and control
  $setting->prefix of all setings in this control section
  $title -> frontend title of hidable,toogable gradient/color customizer
  $default-> default value of single color (this function only supoorts defaults for single colors)
*/
function rollie_add_gradient_control( $wp_customize, $section_name, $setting_name, $title, $default ) {

	$wp_customize->add_setting( $setting_name . '_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				$setting_name . '_label',
				array(
					'label'       => __( $title, 'rollie' ),

					'section'     => $section_name,
					'input_attrs' => array(
						'rollie_collapse_elements_number' => 9,
					),
				)
			)
		);

		$wp_customize->add_setting(
			$setting_name . '_gs',
			array(
				'default'           => 1,
				'sanitize_callback' => 'rollie_sanitize_radio',
				'transport'         => 'postMessage',
			)
		);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					$setting_name . '_gs',
					array(
						'section' => $section_name,
						'choices' => array(
							1 => __( ' Simple Color ', 'rollie' ),
							2 => __( ' Gradient ', 'rollie' ),

						),
					)
				)
			);

	$wp_customize->add_setting(
		$setting_name . '_gr_1',
		array(
			'default'           => 'rgba(255,255,255,1)',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			$setting_name . '_gr_1',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => $section_name,
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',

				),

			)
		)
	);

			$wp_customize->add_setting(
				$setting_name . '_stop_gr_1',
				array(
					'default'           => 40,
					'transport'         => 'postMessage',
					'sanitize_callback' => 'rollie_sanitize_integer',
					'input_attrs'       => array(
						'rollie_multiple_switch_cc' => $setting_name . '_gs-2',

					),
				)
			);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			$setting_name . '_stop_gr_1',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',
				),
			)
		)
	);

	$wp_customize->add_setting(
		$setting_name . '_gr_2',
		array(
			'default'           => 'rgba(255,255,255,1)',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			$setting_name . '_gr_2',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => $section_name,
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',

				),

			)
		)
	);

				$wp_customize->add_setting(
					$setting_name . '_stop_gr_2',
					array(
						'default'           => 40,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			$setting_name . '_stop_gr_2',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
			$setting_name . '_gr_3',
			array(
				'default'           => 'rgba(255,255,255,1)',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_rgba',
			)
		);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			$setting_name . '_gr_3',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => $section_name,
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',

				),
			)
		)
	);

				$wp_customize->add_setting(
					$setting_name . '_stop_gr_3',
					array(
						'default'           => 0,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			$setting_name . '_stop_gr_3',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
				$setting_name . '_angle_gr',
				array(
					'default'           => 45,
					'transport'         => 'postMessage',
					'sanitize_callback' => 'rollie_sanitize_integer',

				)
			);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			$setting_name . '_angle_gr',
			array(
				'label'       => __( 'Gradient Angle', 'rollie' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 360,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => $setting_name . '_gs-2',

				),
			)
		)
	);

		$wp_customize->add_setting(
			$setting_name,
			array(
				'default'           => 'rgba(255,255,255,1)',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_rgba',
			)
		);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			$setting_name,
			array(
				'label'        => __( 'Single Color', 'rollie' ),
				'section'      => $section_name,

				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => $setting_name . '_gs-1',

				),
			)
		)
	);
}

function rollie_customizer_register( $wp_customize ) {

	require get_template_directory() . '/include/rollie_customizer_control_classes.php';

		$wp_customize->add_panel(
			'rollie_navs_panel',
			array(
				'title'    => __( 'Rollie Menus & Navbars', 'rollie' ),
				'priority' => 18,
			)
		);
	$wp_customize->add_panel(
		'rollie_color_design_panel',
		array(
			'title'    => __( 'Rollie Color & Design', 'rollie' ),
			'priority' => 18,
		)
	);
	$wp_customize->add_panel(
		'rollie_color_gradient',
		array(
			'title'    => __( 'Rollie Colors & Design', 'rollie' ),
			'priority' => 18,
			'panel'    => 'rollie_color_design_panel',
		)
	);
		$wp_customize->add_panel(
			'rollie_font_panel',
			array(
				'title'    => __( 'Rollie Font Options', 'rollie' ),
				'priority' => 18,
			)
		);
		$wp_customize->add_panel(
			'rollie_grid_masonry_meta_panel',
			array(
				'title'    => __( 'Rollie Post Grids & Page Headers', 'rollie' ),
				'priority' => 18,
			)
		);
		$wp_customize->add_panel(
			'rollie_layout_panel',
			array(
				'title'    => __( 'Rollie Sidebars Layout', 'rollie' ),
				'priority' => 18,
			)
		);

	$wp_customize->add_panel(
		'rollie_img_panel',
		array(
			'title'    => __( 'Rollie Images Sizes ', 'rollie' ),
			'priority' => 18,
		)
	);

	rollie_add_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', __( 'Single Page', 'rollie' ), 'sp' );
	rollie_add_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', __( 'Single Post Page', 'rollie' ), 'spp' );
	rollie_add_post_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', __( 'Blog Page', 'rollie' ), 'pp' );
	if ( class_exists( 'WooCommerce' ) ) {
		$rollie_ctar_str = __( 'Archive Blog, Category pages, Product Categories', 'rollie' );
	} else {
		$rollie_ctar_str = __( 'Archive Blog and Category pages', 'rollie' );
	}
	rollie_add_post_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', $rollie_ctar_str, 'ctar' );
	rollie_add_post_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', __( 'Search Page', 'rollie' ), 'se' );
	if ( class_exists( 'WooCommerce' ) ) {
		rollie_add_post_page_control( $wp_customize, 'rollie_grid_masonry_meta_panel', __( 'Woocommerce Pages', 'rollie' ), 'woo' );
	}

	$wp_customize->add_panel(
		'rollie_sidebars',
		array(
			'title'    => __( 'Rollie Sidebars', 'rollie' ),
			'priority' => 19,
		)
	);

	$wp_customize->add_panel(
		'rollie_misc_panel',
		array(
			'title'    => __( 'Rollie Miscellaneous', 'rollie' ),
			'priority' => 19,
		)
	);
		$wp_customize->add_panel(
			'rollie_post_formats_panel',
			array(
				'title'    => __( 'Rollie Post Formats', 'rollie' ),
				'priority' => 18,
			)
		);

	$wp_customize->add_section(
		'rollie_footer_section',
		array(
			'title'    => __( 'Footer Settings', 'rollie' ),
			'priority' => 5,
			'panel'    => 'rollie_misc_panel',
		)
	);

	$wp_customize->add_setting( 'rollie_footer_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_footer_label',
			array(
				'label'       => __( 'Footer Settings', 'rollie' ),

				'section'     => 'rollie_footer_section',
				'input_attrs' => array(
					'rollie_collapse_elements_number' => 2,
					'expanded'                        => true,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_footer_collapse',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_footer_collapse',
			array(
				'label'   => __( 'Collapsing Footer Animation', 'rollie' ),
				'section' => 'rollie_footer_section',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_footer_caption_text',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new Rollie_TinyMCE_Custom_Control(
			$wp_customize,
			'rollie_footer_caption_text',
			array(
				'label'       => __( 'Footer caption text', 'rollie' ),
				'description' => __( 'Text will be shown below footer navigation', 'rollie' ),
				'section'     => 'rollie_footer_section',
				'input_attrs' => array(
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
					'toolbar2' => 'formatselect outdent indent | blockquote charmap',
				),
			)
		)
	);

	$wp_customize->add_section(
		'rollie_menu_top_section',
		array(
			'title'    => __( 'Navbar settings', 'rollie' ),
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'rollie_pagination_section',
		array(
			'title'    => __( 'Pagination settings', 'rollie' ),
			'priority' => 10,
			'panel'    => 'rollie_misc_panel',
		)
	);
	$wp_customize->add_setting( 'rollie_pagination_section_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_pagination_section_label',
			array(
				'label'       => esc_html__( 'Pagination Settings', 'rollie' ),

				'section'     => 'rollie_pagination_section',
				'input_attrs' =>
				array(
					'rollie_collapse_elements_number' => 3,
					'expanded'                        => true,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_enable',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_pagination_enable',
			array(
				'label'   => __( 'Enable pagination', 'rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_display_name',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_pagination_display_name',
			array(
				'label'   => __( 'Display next and previous post or page title in pagination', 'rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_page_enable',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_pagination_page_enable',
			array(
				'label'   => __( 'Enable pagination on single pages', 'rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
	$wp_customize->add_section(
		'rollie_sidebar_section',
		array(
			'title'    => __( 'Sidebars Global Settings', 'rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_layout_panel',
		)
	);
	$wp_customize->add_setting( 'rollie_sidebar_section_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_sidebar_section_label',
			array(
				'label'       => __( 'Sidebars Global Settings', 'rollie' ),

				'section'     => 'rollie_sidebar_section',
				'input_attrs' => array(
					'rollie_collapse_elements_number' => 1,
					'expanded'                        => true,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_disable_sidebar_mobile',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_disable_sidebar_mobile',
			array(
				'label'   => __( 'Disable sidebars on small screens ', 'rollie' ),
				'section' => 'rollie_sidebar_section',

			)
		)
	);

	$wp_customize->add_section(
		'rollie_post_pages_l_section',
		array(
			'title'    => __( 'Post Pages Sidebars Layout', 'rollie' ),
			'panel'    => 'rollie_layout_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'rollie_single_page_l_section',
		array(
			'title'    => __( 'Single Pages Sidebars Layout', 'rollie' ),
			'panel'    => 'rollie_layout_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_setting( 'rollie_post_pages_l_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_post_pages_l_label',
			array(
				'label'       => __( 'Post Pages Sidebars Layout', 'rollie' ),
				'section'     => 'rollie_post_pages_l_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 4,
					'expanded'                        => true,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_posts_page_l',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 2,
		)
	);

	$wp_customize->add_control(
		new Rollie_Icon_Customize_Control(
			$wp_customize,
			'rollie_posts_page_l',
			array(
				'label'       => __( 'Sidebars Layout', 'rollie' ),
				'description' => __( 'You can modify sidebar content in "Widgets" panel ', 'rollie' ),
				'type'        => 'radio',
				'section'     => 'rollie_post_pages_l_section',
				'choices'     => array(
					1 => __( 'sidebar_left only left sidebar  ', 'rollie' ),
					2 => __( 'full_size no sidebars', 'rollie' ),
					3 => __( 'double_sidebars double sidebars', 'rollie' ),
					4 => __( 'sidebar_right only right sidebar ', 'rollie' ),
				),
				'input_attrs' => array(
					'icon_type' => 'png',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_posts_page_l_ignore',
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_posts_page_l_ignore',
			array(
				'label'   => __( 'Display sidebars only when are including widgets', 'rollie' ),
				'section' => 'rollie_post_pages_l_section',
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_posts_page_l_sidebar_size',
			array(
				'default'           => 2,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_posts_page_l_sidebar_size',
			array(
				'description' => 'Be sure that layout with sidebars is applied',
				'label'       => __( 'Sidebar size', 'rollie' ),
				'section'     => 'rollie_post_pages_l_section',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_posts_page_l_padding',
			array(
				'default'           => 3,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_posts_page_l_padding',
			array(
				'label'       => esc_html__( 'Padding Between Main Container and sidebars (%)', 'rollie' ),
				'section'     => 'rollie_post_pages_l_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_post_page_grid_for_paged_php',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_post_page_grid_for_paged_php',
			array(
				'label'       => __( 'Invert vertical sidebars to horizontal in small devices', 'rollie' ),
				'section'     => 'rollie_posts_page_section',
				'description' => "This feature won't work if 'disable sidebars on in small devices' option in sidebars global settings is enabled",
			)
		)
	);
		$wp_customize->add_setting( 'rollie_single_page_l_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_single_page_l_label',
				array(
					'label'       => __( 'Single Pages Sidebars Layout', 'rollie' ),
					'section'     => 'rollie_single_page_l_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 4,
						'expanded'                        => true,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_single_page_l',
			array(
				'sanitize_callback' => 'rollie_sanitize_radio',
				'default'           => 2,

			)
		);
		$wp_customize->add_setting(
			'rollie_single_page_l_ignore',
			array(
				'default'           => false,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_Control(
				$wp_customize,
				'rollie_single_page_l_ignore',
				array(
					'label'       => __( 'Display sidebars only when are including widgets', 'rollie' ),
					'section'     => 'rollie_single_page_l_section',
					'description' => 'This feature will disable settings below',
				)
			)
		);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_single_page_l',
				array(
					'label'       => __( 'Sidebars Layout', 'rollie' ),
					'description' => __( 'You can modify sidebars content in Wordpress Widgets panel ', 'rollie' ),
					'section'     => 'rollie_single_page_l_section',
					'type'        => 'radio',
					'choices'     => array(
						1 => __( 'sidebar_left only left sidebar  ', 'rollie' ),
						2 => __( 'full_size no sidebars', 'rollie' ),
						3 => __( 'double_sidebars double sidebars', 'rollie' ),
						4 => __( 'sidebar_right only right sidebar ', 'rollie' ),
					),
					'input_attrs' => array(
						'icon_type' => 'png',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_single_page_l_sidebar_size',
			array(
				'default'           => 2,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_single_page_l_sidebar_size',
			array(
				'description' => 'Be sure that layout with sidebars is applied',
				'label'       => __( 'Sidebar size', 'rollie' ),
				'section'     => 'rollie_single_page_l_section',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_single_page_l_padding',
			array(
				'default'           => 3,
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_single_page_l_padding',
			array(
				'label'       => __( 'Padding in Main Content', 'rollie' ),
				'section'     => 'rollie_single_page_l_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_section(
		'rollie_theme_colors_section',
		array(
			'title'    => __( 'Theme Colors', 'rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'rollie_embl_section',
		array(
			'title'    => __( 'Border Line Embellishments Design', 'rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);
	$wp_customize->add_setting( 'rollie_embl_titles_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_embl_titles_label',
				array(
					'label'       => esc_html__( 'Page Titles', 'rollie' ),
					'section'     => 'rollie_embl_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 2,
					),
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_embl_titles', // rollie_one_on_row_design_php_0
				array(
					'sanitize_callback' => 'rollie_sanitize_select',
					'default'           => 3,

				)
			);

		$wp_customize->add_control(
			'rollie_embl_titles', // rollie_one_on_row_design_php_0
			array(
				'label'   => esc_html__( 'Design of  Embellishments', 'rollie' ),
				'section' => 'rollie_embl_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Vertical Line', 'rollie' ),
					2 => esc_html__( 'Horizontal Line', 'rollie' ),
					3 => esc_html__( 'None', 'rollie' ),
				),
			)
		);

					$wp_customize->add_setting(
						'rollie_embl_titles_width',
						array(
							'default'           => 1,
							'transport'         => 'postMessage',
							'sanitize_callback' => 'rollie_sanitize_integer',
						)
					);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_titles_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)', 'rollie' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,
				),
			)
		)
	);
		$wp_customize->add_setting( 'rollie_embl_subtitles_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_embl_subtitles_label',
				array(
					'label'       => esc_html__( 'Subtitles', 'rollie' ),
					'section'     => 'rollie_embl_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 2,
					),
				)
			)
		);
			$wp_customize->add_setting(
				'rollie_embl_subtitles',
				array(
					'sanitize_callback' => 'rollie_sanitize_select',
					'default'           => 1,

				)
			);

		$wp_customize->add_control(
			'rollie_embl_subtitles',
			array(
				'label'   => esc_html__( 'Design of Embellishments', 'rollie' ),
				'section' => 'rollie_embl_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Vertical Line', 'rollie' ),
					2 => esc_html__( 'Horizontal Line', 'rollie' ),
					3 => esc_html__( 'None', 'rollie' ),
				),
			)
		);

					$wp_customize->add_setting(
						'rollie_embl_subtitles_width',
						array(
							'default'           => 1,
							'transport'         => 'postMessage',
							'sanitize_callback' => 'rollie_sanitize_integer',
						)
					);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_subtitles_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)', 'rollie' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,
				),
			)
		)
	);
			$wp_customize->add_setting( 'rollie_embl_navbar_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_embl_navbar_label',
				array(
					'label'       => esc_html__( 'Navbar', 'rollie' ),
					'section'     => 'rollie_embl_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 2,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_embl_navbar', // rollie_one_on_row_design_php_0
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			'rollie_embl_navbar',
			array(
				'label'   => esc_html__( 'Navbar Embellishments', 'rollie' ),
				'section' => 'rollie_embl_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Vertical Line', 'rollie' ),
					2 => esc_html__( 'Horizontal Line', 'rollie' ),
					3 => esc_html__( 'None', 'rollie' ),
				),
			)
		);

					$wp_customize->add_setting(
						'rollie_embl_navbar_width',
						array(
							'default'           => 1,
							'transport'         => 'postMessage',
							'sanitize_callback' => 'rollie_sanitize_integer',
						)
					);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_navbar_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)', 'rollie' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,
				),
			)
		)
	);

				$wp_customize->add_setting( 'rollie_embl_footer_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_embl_footer_label',
				array(
					'label'       => esc_html__( 'Footer', 'rollie' ),
					'section'     => 'rollie_embl_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 2,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_embl_footer',
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			'rollie_embl_footer',
			array(
				'label'   => esc_html__( 'Design of  Embellishments', 'rollie' ),
				'section' => 'rollie_embl_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Vertical Line', 'rollie' ),
					2 => esc_html__( 'Horizontal Line', 'rollie' ),
					3 => esc_html__( 'None', 'rollie' ),
				),
			)
		);
				$wp_customize->add_setting(
					'rollie_embl_footer_width',
					array(
						'default'           => 1,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_footer_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)', 'rollie' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,
				),
			)
		)
	);
	$wp_customize->add_section(
		'rollie_font_breakpoints',
		array(
			'title'    => __( 'Advanced Font Responsiveness Settings', 'rollie' ),
			'panel'    => 'rollie_font_panel',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting( 'rollie_font_vw_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_font_vw_label',
			array(
				'label'       => esc_html__( 'Font Responsiveness Breakpoints', 'rollie' ),
				'section'     => 'rollie_font_breakpoints',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 2,
					'expanded'                        => true,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_font_vw_min',
		array(
			'default'           => 400,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				'rollie_font_vw_min',
				array(
					'label'       => __( 'Downscaling breakpoint (px)', 'rollie' ),
					'description' => __( 'Select screen width when font stops downscaling. Breakpoint should be less than maximum ', 'rollie' ) . __( 'screen width otherwise sets default values', 'rollie' ),
					'section'     => 'rollie_font_breakpoints',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 100,
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_font_vw_max',
			array(
				'default'           => 1200,
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Rollie_Slider_Custom_Control(
				$wp_customize,
				'rollie_font_vw_max',
				array(
					'label'       => __( 'Upscaling breakpoint (px)', 'rollie' ),
					'description' => __( 'Select screen width when font starts upscaling. Breakpoint should be greater than minimum ', 'rollie' ) . __( 'screen width otherwise sets default values', 'rollie' ),
					'section'     => 'rollie_font_breakpoints',
					'input_attrs' => array(
						'min'  => 200,
						'max'  => 1900,
						'step' => 100,
					),
				)
			)
		);
	global $rollie_font_data;
	foreach ( $rollie_font_data as $font_data ) {
		$font_data->add_customizer_controls();
	}
	global $rollie_border_data;
	foreach ( $rollie_border_data as $key => $rollie_border ) {
		$rollie_border->add_customizer_controls();
	}

	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_main_theme_color', __( 'Main Theme Color', 'rollie' ), '#ffffff' );
	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_darker_main_theme_color', __( 'Darker/Contrast Theme Color', 'rollie' ), '#e3e6e8' );
	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_second_theme_color', __( 'Second Theme Color', 'rollie' ), '#212121' );
	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_third_theme_color', __( 'Third Theme Color', 'rollie' ), '#a37e2c' );
	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_sidebar_theme_color', __( 'Sidebars Color', 'rollie' ), '#ffffff' );
	rollie_add_gradient_control( $wp_customize, 'rollie_buttons_section', 'rollie_button_b_color', __( 'Button Color', 'rollie' ), '#ffffff' );
	rollie_add_gradient_control( $wp_customize, 'rollie_buttons_section', 'rollie_button_b_h_color', __( 'Button Color At Hover', 'rollie' ), '#212121' );
	rollie_add_gradient_control( $wp_customize, 'rollie_theme_colors_section', 'rollie_post_classic_title_bg_theme_color', __( 'Rollie Post Title in Thumbnail', 'rollie' ), '#ffffff' );
	rollie_add_gradient_control( $wp_customize, 'rollie_buttons_section', 'rollie_button_alt_b_color', __( 'Alternate Button Color', 'rollie' ), '#ffffff' );
	rollie_add_gradient_control( $wp_customize, 'rollie_buttons_section', 'rollie_button_alt_b_h_color', __( 'Alternate Button Color At Hover', 'rollie' ), '#212121' );
	rollie_add_gradient_control( $wp_customize, 'rollie_navbar_section', 'rollie_navbar_color', __( 'Navbar Color', 'rollie' ), 'rgba(255,255,255,0.8)' );

		// widget end#ffffff

		$wp_customize->add_setting( 'rollie_title_bg_theme_color_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_title_bg_theme_color_label',
				array(
					'label'       => esc_html__( 'Page Title Background Color ', 'rollie' ),
					'section'     => 'rollie_theme_colors_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 9,
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_title_bg_theme_color_gs',
			array(
				'default'           => 2,
				'sanitize_callback' => 'rollie_sanitize_radio',
				'transport'         => 'postMessage',
			)
		);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					'rollie_title_bg_theme_color_gs',
					array(
						'section' => 'rollie_theme_colors_section',
						'choices' => array(
							1 => esc_html__( ' Simple Color ', 'rollie' ),
							2 => esc_html__( ' Gradient ', 'rollie' ),

						),
					)
				)
			);

	$wp_customize->add_setting(
		'rollie_title_bg_theme_color_gr_1',
		array(
			'default'           => 'rgba(255,255,255,0.75)',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_1',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => 'rollie_theme_colors_section',
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',

				),

			)
		)
	);

			$wp_customize->add_setting(
				'rollie_title_bg_theme_color_stop_gr_1',
				array(
					'default'           => 40,
					'transport'         => 'postMessage',
					'sanitize_callback' => 'rollie_sanitize_integer',
					'input_attrs'       => array(
						'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',

					),
				)
			);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_stop_gr_1',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_title_bg_theme_color_gr_2',
		array(
			'default'           => 'rgba(255,255,255,0.9)',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_2',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => 'rollie_theme_colors_section',
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',

				),

			)
		)
	);

				$wp_customize->add_setting(
					'rollie_title_bg_theme_color_stop_gr_2',
					array(
						'default'           => 100,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_stop_gr_2',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_title_bg_theme_color_gr_3',
			array(
				'default'           => 'rgba(255,255,255,1)',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_rgba',
			)
		);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_3',
			array(
				'label'        => __( 'Alpha Color Picker', 'rollie' ),
				'section'      => 'rollie_theme_colors_section',
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',

				),
			)
		)
	);

				$wp_customize->add_setting(
					'rollie_title_bg_theme_color_stop_gr_3',
					array(
						'default'           => 100,
						'transport'         => 'postMessage',
						'sanitize_callback' => 'rollie_sanitize_integer',
					)
				);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_stop_gr_3',
			array(
				'label'       => __( 'Color Stop (%) ', 'rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 100,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
				'rollie_title_bg_theme_color_angle_gr',
				array(
					'default'           => 45,
					'transport'         => 'postMessage',
					'sanitize_callback' => 'rollie_sanitize_integer',

				)
			);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_angle_gr',
			array(
				'label'       => esc_html__( 'Gradient Angle', 'rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'                       => 0,
					'max'                       => 360,
					'step'                      => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',

				),
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_title_bg_theme_color',
			array(
				'default'           => '#ffffff',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_rgba',
			)
		);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color',
			array(
				'label'        => __( 'Page Title Background Color', 'rollie' ),
				'section'      => 'rollie_theme_colors_section',

				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-1',

				),
			)
		)
	);

		$wp_customize->add_setting( 'rollie_shadow_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_shadow_label',
				array(
					'label'       => esc_html__( 'Box Shadows', 'rollie' ),
					'section'     => 'rollie_theme_colors_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 5,
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_shadow_theme_color',
			array(
				'default'           => '#a37e2c',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rollie_sanitize_rgba',
			)
		);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_shadow_theme_color',
			array(
				'label'        => __( 'Shadow Color', 'rollie' ),
				'section'      => 'rollie_theme_colors_section',
				'show_opacity' => true,
				'input_attrs'  => array(
					'rollie_multiple_switch_cc' => 'rollie_shadow_theme_color_gs-1',

				),
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_shadow_posts',
			array(
				'default'           => false,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					'rollie_shadow_posts',
					array(
						'label'   => esc_html__( 'Shadow on Posts and Products ', 'rollie' ),
						'section' => 'rollie_theme_colors_section',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_shadow_menus',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);
			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					'rollie_shadow_menus',
					array(
						'label'   => esc_html__( 'Shadow on menus and navbars', 'rollie' ),
						'section' => 'rollie_theme_colors_section',

					)
				)
			);
			$wp_customize->add_setting(
				'rollie_shadow_images',
				array(
					'default'           => false,
					'sanitize_callback' => 'rollie_sanitize_checkbox',
				)
			);

				$wp_customize->add_control(
					new Rollie_Toggle_Switch_Custom_Control(
						$wp_customize,
						'rollie_shadow_images',
						array(
							'label'   => esc_html__( 'Shadow on images ', 'rollie' ),
							'section' => 'rollie_theme_colors_section',

						)
					)
				);

				$wp_customize->add_setting(
					'rollie_shadow_button_h',
					array(
						'default'           => false,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

					$wp_customize->add_control(
						new Rollie_Toggle_Switch_Custom_Control(
							$wp_customize,
							'rollie_shadow_button_h',
							array(
								'label'   => esc_html__( 'Shadow on Buttons at hover', 'rollie' ),
								'section' => 'rollie_theme_colors_section',
							)
						)
					);

	$wp_customize->add_section(
		'rollie_theme_colors_text_section',
		array(
			'title'    => __( 'Theme Text Colors', 'rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);
	$wp_customize->add_setting( 'rollie_theme_colors_text_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_theme_colors_text_label',
			array(
				'label'       => esc_html__( 'Theme Text Colors', 'rollie' ),
				'section'     => 'rollie_theme_colors_text_section',
				'input_attrs' =>
				array(
					'rollie_collapse_elements_number' => 7,
					'expanded'                        => true,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_title_text_color',
		array(
			'default'           => '#212121',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_title_text_color',
			array(
				'label'    => __( 'Text color for titles ', 'rollie' ),
				'section'  => 'rollie_theme_colors_text_section',
				'settings' => 'rollie_title_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_main_theme_text_color',
		array(
			'default'           => '#212529',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_main_theme_text_color',
			array(
				'label'    => esc_html__( 'Main Theme Text Color', 'rollie' ),
				'section'  => 'rollie_theme_colors_text_section',
				'settings' => 'rollie_main_theme_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_second_text_color',
		array(
			'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_second_text_color',
			array(
				'label'       => esc_html__( 'Second text color  ', 'rollie' ),
				'description' => esc_html__( 'Text color on second or third theme color as background ', 'rollie' ),
				'section'     => 'rollie_theme_colors_text_section',
				'settings'    => 'rollie_second_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_subtitle_text_color',
		array(
			'default'           => '#818181',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_subtitle_text_color',
			array(
				'label'       => esc_html__( 'Third text color', 'rollie' ),
				'description' => esc_html__( 'Post and page excerpts, metainfo bars, footer subitems color ', 'rollie' ),
				'section'     => 'rollie_theme_colors_text_section',
				'settings'    => 'rollie_subtitle_text_color',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_fourth_text_color',
		array(
			'default'           => '#228050',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_fourth_text_color',
			array(
				'label'       => esc_html__( 'Fourth text color', 'rollie' ),
				'description' => esc_html__( ' Links color on page content or article', 'rollie' ),
				'section'     => 'rollie_theme_colors_text_section',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_category_title_text_color',
		array(
			'default'           => '#a37e2c',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_category_title_text_color',
			array(
				'label'       => esc_html__( 'Fifth Text Color', 'rollie' ),
				'description' => esc_html__( 'Category titles, links at hover, Fancy Line color', 'rollie' ),
				'section'     => 'rollie_theme_colors_text_section',
				'settings'    => 'rollie_category_title_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_muted_color',
		array(
			'default'           => '#282828',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_muted_color',
			array(
				'label'   => esc_html__( 'Muted Color ', 'rollie' ),
				'section' => 'rollie_theme_colors_text_section',
			)
		)
	);

	// navbars

	$wp_customize->add_section(
		'rollie_navbar_section',
		array(
			'title'    => esc_html__( 'Navbar Colors & Settings', 'rollie' ),
			'priority' => 9,
			'panel'    => 'rollie_misc_panel',
		)
	);

	$wp_customize->add_setting( 'rollie_navbar_colors_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_navbar_colors_label',
			array(
				'label'       => esc_html__( 'Navbar Text Colors', 'rollie' ),
				'section'     => 'rollie_navbar_section',

				'input_attrs' =>
				array(
					'rollie_collapse_elements_number' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_text_color',
		array(
			'default'           => '#212121',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_navbar_text_color',
			array(
				'label'    => esc_html__( 'Navbar Text Color', 'rollie' ),
				'section'  => 'rollie_navbar_section',
				'settings' => 'rollie_navbar_text_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_text_hover_color',
		array(
			'default'           => '#a37e2c',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_navbar_text_hover_color',
			array(
				'label'    => esc_html__( 'Navbar Text Hover Color', 'rollie' ),
				'section'  => 'rollie_navbar_section',
				'settings' => 'rollie_navbar_text_hover_color',

			)
		)
	);

	$wp_customize->add_setting( 'rollie_menu_top_position_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_menu_top_position_label',
			array(
				'label'       => esc_html__( 'Navbar Design And Position', 'rollie' ),
				'section'     => 'rollie_navbar_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 5,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_menu_top_item_align',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 2,

		)
	);

	$wp_customize->add_control(
		new Rollie_Icon_Customize_Control(
			$wp_customize,
			'rollie_menu_top_item_align',
			array(
				'label'   => esc_html__( 'Navbar items align', 'rollie' ),
				'section' => 'rollie_navbar_section',
				'type'    => 'radio',
				'choices' => array(
					1 => 'fa-align-left ' . esc_html__( 'Left', 'rollie' ),
					2 => 'fa-align-center ' . esc_html__( 'Center', 'rollie' ),
					3 => 'fa-align-right ' . esc_html__( 'Right', 'rollie' ),
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_navbar_fixed',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_fixed',
			array(
				'label'   => esc_html__( 'Fixed navbar', 'rollie' ),
				'section' => 'rollie_navbar_section',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_absolute',
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_absolute',
			array(
				'label'   => esc_html__( 'Navbar positioned absolute', 'rollie' ),
				'section' => 'rollie_navbar_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_menu_top_logo_positon',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);
	$wp_customize->add_control(
		'rollie_menu_top_logo_positon',
		array(
			'label'   => esc_html__( 'Navbar Logo Position', 'rollie' ),
			'section' => 'rollie_navbar_section',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'Main Navbar Navigation', 'rollie' ),
				2 => esc_html__( 'Small Top Navbar Navigation', 'rollie' ),

			),
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_design',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 'full',
		)
	);

	$wp_customize->add_control(
		'rollie_navbar_design',
		array(
			'label'   => esc_html__( 'Navbar collapse design', 'rollie' ),
			'section' => 'rollie_navbar_section',
			'type'    => 'select',
			'choices' => array(
				'full'       => __( 'Top: Full width', 'rollie' ),
				'side'       => __( 'Side: Layered', 'rollie' ),
				'fixed'      => __( 'Side: Fixed 1 ', 'rollie' ),
				'fixed_full' => __( 'Side: Fixed 2', 'rollie' ),
			),
		)
	);
	if ( class_exists( 'Woocommerce' ) ) {
		$wp_customize->add_setting(
			'rollie_nav_top_icons_colapsed_content',
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 'small',

			)
		);

		$wp_customize->add_control(
			'rollie_nav_top_icons_colapsed_content',
			array(
				'label'       => esc_html__( 'Icons menu collapse design', 'rollie' ),
				'description' => esc_html__( 'This options applies changes to collapsible Woocommerce Cart and MyAccount widgets', 'rollie' ),
				'section'     => 'rollie_navbar_section',
				'type'        => 'select',
				'choices'     => array(
					'small'      => __( 'Small', 'rollie' ),
					'fixed'      => __( 'Side: Fixed 1', 'rollie' ),
					'fixed_full' => __( 'Side: Fixed 2', 'rollie' ),
				),
			)
		);
	}

	$wp_customize->add_setting( 'rollie_navbar_a_settings_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_navbar_a_settings_label',
			array(
				'label'       => esc_html__( 'Navbar Additional Settings', 'rollie' ),
				'section'     => 'rollie_navbar_section',

				'input_attrs' =>
				array(
					'rollie_collapse_elements_number' => 5,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_logo_title',
		array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_logo_title',
			array(
				'label'   => __( 'Display site title', 'rollie' ),
				'section' => 'rollie_navbar_section',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_overlay',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_overlay',
			array(
				'label'   => esc_html__( 'Enable overlay when Navbar drops', 'rollie' ),
				'section' => 'rollie_navbar_section',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_transparent',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_transparent',
			array(
				'label'       => __( 'Apply Transparency when Navbar is on top of the page', 'rollie' ),
				'description' => __( 'Works better with fixed Navbar', 'rollie' ),
				'section'     => 'rollie_navbar_section',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_always_collapse',
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_always_collapse',
			array(
				'label'       => esc_html__( 'Show always Collapsed Navigation', 'rollie' ),
				'description' => esc_html__( 'By default Rollie Theme calculates and applies Collapsed Navigation on specified device sizes', 'rollie' ),
				'section'     => 'rollie_navbar_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_navbar_search_form',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_navbar_search_form',
			array(
				'label'       => esc_html__( 'Enable search form icon', 'rollie' ),
				'description' => esc_html__( 'To enable icon Rollie Navbar: Icon Navigation Menu must be active', 'rollie' ),
				'section'     => 'rollie_navbar_section',

			)
		)
	);

	$wp_customize->add_setting( 'rollie_navbar_logos_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_navbar_logos_label',
			array(
				'label'       => esc_html__( 'Navbar Logos', 'rollie' ),
				'section'     => 'rollie_navbar_section',

				'priority'    => 2,
				'input_attrs' =>
				array(
					'rollie_collapse_elements_number' => 2,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'rollie_navbar_logo',
			array(
				'label'    => __( 'Navbar logo', 'rollie' ),
				'section'  => 'rollie_navbar_section',
				'priority' => 2,
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_navbar_collapse_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',

		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'rollie_navbar_collapse_logo',
			array(
				'label'    => __( 'Navbar Collapse Logo', 'rollie' ),
				'section'  => 'rollie_navbar_section',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_section(
		'rollie_tags',
		array(
			'title'    => __( 'Comment and tags bar', 'rollie' ),
			'priority' => 40,
			'panel'    => 'rollie_misc_panel',

		)
	);

	$wp_customize->add_setting(
		'rollie_tags_display_icon',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					'rollie_tags_display_icon',
					array(
						'label'   => esc_html__( 'Display tag icon', 'rollie' ),
						'section' => 'rollie_tags',

					)
				)
			);
		$wp_customize->add_setting(
			'rollie_tags_display_post_format',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

			$wp_customize->add_control(
				new Rollie_Toggle_Switch_Custom_Control(
					$wp_customize,
					'rollie_tags_display_post_format',
					array(
						'label'   => esc_html__( 'Display post format as tag link', 'rollie' ),
						'section' => 'rollie_tags',

					)
				)
			);

	$wp_customize->add_section(
		'rollie_borders_section',
		array(
			'title'    => esc_html__( 'Page Sections Borders ', 'rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);

	$wp_customize->add_section(
		'rollie_buttons_section',
		array(
			'title'    => esc_html__( 'Buttons', 'rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);

	$wp_customize->add_section(
		'rollie_icons_section',
		array(
			'title'    => esc_html__( 'Icons', 'rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);
		$wp_customize->add_setting( 'rollie_icons_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_icons_label',
				array(
					'label'       => __( 'Icons Colors', 'rollie' ),
					'section'     => 'rollie_icons_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 3,
						'expanded'                        => true,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'rollie_icon_color_first',
			array(
				'default'           => '#212121',
				'transport'         => 'refresh',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first',
			array(
				'label'   => __( 'Icon first color', 'rollie' ),
				'section' => 'rollie_icons_section',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_color_first_shadow',
				array(
					'default'           => '#a37e2c',
					'transport'         => 'refresh',
					'sanitize_callback' => 'rollie_sanitize_hex_color',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first_shadow',
			array(
				'label'   => __( 'Icon first shadow color', 'rollie' ),
				'section' => 'rollie_icons_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_icon_color_first_h',
		array(
			'default'           => '#ffffff',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first_h',
			array(
				'label'   => __( 'Icon first color when hover', 'rollie' ),
				'section' => 'rollie_icons_section',
			)
		)
	);

	$wp_customize->add_section(
		'rollie_forms_inputs_section',
		array(
			'title'    => esc_html__( 'Forms', 'rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);
		$wp_customize->add_setting( 'rollie_forms_inputs_color_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
		$wp_customize->add_control(
			new Rollie_Customizer_Collapse_Label_Control(
				$wp_customize,
				'rollie_forms_inputs_color_label',
				array(
					'label'       => __( 'Form Colors', 'rollie' ),
					'section'     => 'rollie_forms_inputs_section',

					'input_attrs' => array(
						'rollie_collapse_elements_number' => 3,
						'expanded'                        => true,
					),
				)
			)
		);

	$wp_customize->add_setting(
		'rollie_form_input_color_backg',
		array(
			'default'           => 'rgba(255,255,255,0.8)',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_form_input_color_backg',
			array(
				'label'        => __( 'Form color', 'rollie' ),
				'section'      => 'rollie_forms_inputs_section',
				'show_opacity' => true,
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_form_input_text_color',
		array(
			'default'           => '#212529',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_form_input_text_color',
			array(
				'label'   => __( 'Forms text color', 'rollie' ),
				'section' => 'rollie_forms_inputs_section',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_form_input_border_color',
		array(
			'default'           => '#a37e2c',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_form_input_border_color',
			array(
				'label'   => __( 'Form shadow and border color', 'rollie' ),
				'section' => 'rollie_forms_inputs_section',
			)
		)
	);

	$wp_customize->add_section(
		'rollie_post_format_gallery',
		array(
			'title'    => __( 'Gallery Post Format', 'rollie' ),
			'priority' => 5,
			'panel'    => 'rollie_post_formats_panel',
		)
	);

	$wp_customize->add_setting( 'rollie_post_format_gallery_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_post_format_gallery_label',
			array(
				'label'       => __( 'Metainfos', 'rollie' ),
				'section'     => 'rollie_post_format_gallery',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 1,
					'expanded'                        => true,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_post_format_gallery_slider',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_switch_sanitization',

		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_post_format_gallery_slider',
			array(
				'label'   => __( 'Display gallery post format as slider', 'rollie' ),
				'section' => 'rollie_post_format_gallery',

			)
		)
	);
		global $rollie_img_data;
	foreach ( $rollie_img_data as $img_data ) {
		$img_data->add_customizer_controls();
	}

	if ( class_exists( 'WooCommerce' ) ) {
		require get_template_directory() . '/include/rollie_customizer_woo.php';
	}

}
