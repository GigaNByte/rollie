<?php
$wp_customize->add_panel(
	'rollie_woo_l_panel',
	array(
		'title'    => esc_html__( 'Rollie Woocommerce Layouts', 'rollie' ),
		'priority' => 19,
	)
);
$wp_customize->add_section(
	'rollie_img_thumbnail',
	array(
		'title'    => esc_html__( 'Product Image Sizes', 'rollie' ),
		'priority' => 20,
		'panel'    => 'rollie_img_panel',
	)
);

$wp_customize->add_section(
	'rollie_woo_l_my_account_section',
	array(
		'title'    => esc_html__( 'WooCommerce My Account', 'rollie' ),
		'panel'    => 'rollie_woo_l_panel',
		'priority' => 20,
	)
);
$wp_customize->add_section(
	'rollie_woo_l_shop_section',
	array(
		'title'    => esc_html__( 'WooCommerce Shop Page', 'rollie' ),
		'panel'    => 'rollie_woo_l_panel',
		'priority' => 20,
	)
);

$wp_customize->add_setting( 'rollie_woo_l_shop_vanilla_settings_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_l_shop_vanilla_settings_label',
			array(
				'label'       => esc_html__( 'Shop Page Layout Settings', 'rollie' ),
				'section'     => 'rollie_woo_l_shop_section',
				'priority'    => 1,

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 7,
					'expanded'                        => false,
				),
			)
		)
	);
	$wp_customize->add_setting( 'rollie_woo_l_shop_vanilla_settings_desc_1', , array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Notice_Control(
			$wp_customize,
			'rollie_woo_l_shop_vanilla_settings_desc_1',
			array(
				'description' => esc_html__( 'Woocommerce Products Grid settings are in Rollie Post Grids & Post Meta Panel', 'rollie' ),
				'section'     => 'rollie_woo_l_shop_section',
				'priority'    => 1,

			)
		)
	);


	$wp_customize->add_section(
		'rollie_woo_l_single_section',
		array(
			'title'    => esc_html__( 'WooCommerce Single Product Page', 'rollie' ),
			'panel'    => 'rollie_woo_l_panel',
			'priority' => 20,
		)
	);
	$wp_customize->add_setting( 'rollie_woo_l_single_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_l_single_label',
			array(
				'label'       => esc_html__( 'Single Product Page Settings', 'rollie' ),
				'section'     => 'rollie_woo_l_single_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 3,
					'expanded'                        => true,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_l_single_img_max_h',
		array(
			'default'           => 200,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_img_max_h',
			array(
				'label'       => esc_html__( 'Rollie Single Product Image Max Height (px)', 'rollie' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 50,
					'max'  => 800,
					'step' => 50,

				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_l_single_w',
		array(
			'default'           => 8,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_w',
			array(
				'label'       => esc_html__( 'Rollie Single Product Gallery Width', 'rollie' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 4,
					'max'  => 12,
					'step' => 1,

				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_l_single_w_md',
		array(
			'default'           => 12,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_w_md',
			array(
				'label'       => esc_html__( 'Rollie Single Product Gallery Width for Smaller Devices', 'rollie' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 4,
					'max'  => 12,
					'step' => 1,

				),
			)
		)
	);

	$wp_customize->get_control( 'woocommerce_shop_page_display' )->section        = 'rollie_woo_l_shop_section';
	$wp_customize->get_control( 'woocommerce_category_archive_display' )->section = 'rollie_woo_l_shop_section';
	$wp_customize->get_control( 'woocommerce_default_catalog_orderby' )->section  = 'rollie_woo_l_shop_section';
	$wp_customize->get_control( 'woocommerce_catalog_columns' )->section          = 'rollie_woo_l_shop_section';
	$wp_customize->get_control( 'woocommerce_catalog_rows' )->section             = 'rollie_woo_l_shop_section';

	$wp_customize->add_setting(
		'rollie_woo_l_shop_columns_md', // rollie_one_on_row_design_php_0
		array(
			'sanitize_callback' => 'absint',
			'default'           => 2,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_l_shop_columns_md', // rollie_one_on_row_design_php_0
		array(
			'label'       => esc_html__( 'Products per row on smaller devices', 'rollie' ),
			'section'     => 'rollie_woo_l_shop_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 6,
			),
		)
	);

	$wp_customize->add_setting( 'rollie_woo_l_shop_impr_img_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_l_shop_impr_img_label',
			array(
				'label'       => __( 'Rollie Improved Product Images', 'rollie' ),
				'section'     => 'rollie_woo_l_shop_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 2,
					'expanded'                        => false,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_l_shop_img',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);


	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_woo_l_shop_img',
			array(
				'label'       => esc_html__( 'Rollie Improved Product Images Size', 'rollie' ),
				'description' => esc_html__( 'If this option is enable Rollie Theme will ignore Woocommerce setings for product images', 'rollie' ),
				'section'     => 'rollie_woo_l_shop_section',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_l_shop_img_max_h',
		array(
			'default'           => 200,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_shop_img_max_h',
			array(
				'label'       => esc_html__( 'Rollie Improved Product Image Max Height (px)', 'rollie' ),
				'section'     => 'rollie_woo_l_shop_section',
				'input_attrs' => array(
					'min'  => 50,
					'max'  => 500,
					'step' => 50,

				),
			)
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_woo_l_shop_display_sku',
			array(
				'label'   => esc_html__( 'Invert Icon Color', 'rollie' ),
				'section' => 'rollie_woo_l_shop_section',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_l_shop_display_sku',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);


	$wp_customize->add_setting(
		'rollie_woo_l_shop_display_attr',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 2,
		)
	);

	$wp_customize->add_control(
		'rollie_woo_l_shop_display_attr',
		array(
			'label'   => esc_html__( 'Display product attributes', 'rollie' ),
			'section' => 'rollie_woo_c&d_panel',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'None', 'rollie' ),
				2 => esc_html__( 'Only Values', 'rollie' ),
				3 => esc_html__( 'Keys and Values', 'rollie' ),
			),
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_l_shop_display_attr_max', // rollie_one_on_row_design_php_0
		array(
			'sanitize_callback' => 'absint',
			'default'           => 2,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_l_shop_display_attr_max', // rollie_one_on_row_design_php_0
		array(
			'label'       => esc_html__( 'Maximum Number of Displayed Attributes', 'rollie' ),
			'section'     => 'rollie_woo_c&d_panel',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 6,
			),
		)
	);

	$wp_customize->add_setting( 'rollie_woo_l_my_account_nav_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_l_my_account_nav_label',
			array(
				'label'       => __( 'My Account Page Settings', 'rollie' ),
				'section'     => 'rollie_woo_l_my_account_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 1,
					'expanded'                        => true,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_l_my_account_nav', // rollie_one_on_row_design_php_0
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_l_my_account_nav',
		array(
			'label'   => esc_html__( 'Design of My Account navigation', 'rollie' ),
			'section' => 'rollie_woo_l_my_account_section',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'Big Tiles Nav', 'rollie' ),
				2 => esc_html__( 'Simple Side Nav', 'rollie' ),
				3 => esc_html__( 'Wide Top Nav', 'rollie' ),
			),
		)
	);

	$wp_customize->add_panel(
		'rollie_woo_c&d_panel',
		array(
			'title'    => __( 'Rollie Woocommerce Colors & Design', 'rollie' ),
			'priority' => 19,
		)
	);

	$wp_customize->add_section(
		'rollie_woo_c&d_notifications_section',
		array(
			'title'    => esc_html__( 'WooCommerce Notifications', 'rollie' ),
			'panel'    => 'rollie_woo_c&d_panel',
			'priority' => 20,
		)
	);
	$wp_customize->add_section(
		'rollie_woo_c&d_shop_section',
		array(
			'title'    => esc_html__( 'WooCommerce Shop Page', 'rollie' ),
			'panel'    => 'rollie_woo_c&d_panel',
			'priority' => 20,
		)
	);
	$wp_customize->add_setting( 'rollie_woo_c&d_shop_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_c&d_shop_label',
			array(
				'label'       => __( '', 'rollie' ),
				'section'     => 'rollie_woo_c&d_notifications_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 4,
					'expanded'                        => true,
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_add_to_cart_design',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_add_to_cart_design',
		array(
			'label'   => esc_html__( 'Design of Add to Cart Button', 'rollie' ),
			'section' => 'rollie_woo_c&d_shop_section',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'Small Icon', 'rollie' ),
				2 => esc_html__( 'Standard Button', 'rollie' ),
			),
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_price_design',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_price_design',
		array(
			'label'   => esc_html__( 'Design and Position of Price', 'rollie' ),
			'section' => 'rollie_woo_c&d_shop_section',
			'type'    => 'select',
			'choices' => array(

				1 => esc_html__( 'Classic', 'rollie' ),
				2 => esc_html__( 'Modern', 'rollie' ),
				3 => esc_html__( 'Clean', 'rollie' ),
			),
		)
	);

	$wp_customize->add_setting( 'rollie_woo_notices_design_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_notices_design_label',
			array(
				'label'       => __( 'Notices Design', 'rollie' ),
				'section'     => 'rollie_woo_c&d_notifications_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 4,

				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_notice_border',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 2,

		)
	);

	$wp_customize->add_control(
		'rollie_woo_notice_border',
		array(
			'label'   => esc_html__( 'Design of Notice Border', 'rollie' ),
			'section' => 'rollie_woo_c&d_notifications_section',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'Vertical Line', 'rollie' ),
				2 => esc_html__( 'Horizontal Line', 'rollie' ),
				3 => esc_html__( 'Full Border', 'rollie' ),
				4 => esc_html__( 'None', 'rollie' ),
			),
		)
	);




	$wp_customize->add_setting(
		'rollie_woo_notice_radius',
		array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_integer',
		)
	);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_notice_radius',
			array(
				'label'       => esc_html__( 'Notice Border Radius', 'rollie' ),
				'section'     => 'rollie_woo_c&d_notifications_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_notice_icon_invert',
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',

		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_woo_notice_icon_invert',
			array(
				'label'   => esc_html__( 'Invert Icon Color', 'rollie' ),
				'section' => 'rollie_woo_c&d_notifications_section',

			)
		)
	);

	$wp_customize->add_setting(
		'rollie_woo_notice_width_full',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		new Rollie_Toggle_Switch_Custom_Control(
			$wp_customize,
			'rollie_woo_notice_width_full',
			array(
				'label'   => esc_html__( 'Display Message In Full Width', 'rollie' ),
				'section' => 'rollie_woo_c&d_notifications_section',
			)
		)
	);

	$wp_customize->add_setting( 'rollie_woo_notices_text_label', array( 'sanitize_callback' => 'rollie_sanitize_no_input' ) );
	$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_woo_notices_text_label',
			array(
				'label'       => __( 'Notices Text Colors', 'rollie' ),
				'section'     => 'rollie_woo_c&d_notifications_section',

				'input_attrs' => array(
					'rollie_collapse_elements_number' => 4,
					'sanitize_callback'               => 'rollie_sanitize_checkbox',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_notice_text_color',
		array(
			'default'           => '#212529',
			'transport'         => 'refresh',
			'sanitize_callback' => 'rollie_sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_woo_notice_text_color',
			array(
				'label'   => __( 'Notice Text Color', 'rollie' ),
				'section' => 'rollie_woo_c&d_notifications_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_error_border_color',
		array(
			'default'           => '#ef9a9a',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_error_border_color',
			array(
				'label'        => __( 'Error Border Color', 'rollie' ),
				'section'      => 'rollie_woo_c&d_notifications_section',
				'show_opacity' => true,
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_notice_border_color',
		array(
			'default'           => '#ccedfd',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_notice_border_color',
			array(
				'label'        => __( 'Notice Border Color', 'rollie' ),
				'section'      => 'rollie_woo_c&d_notifications_section',
				'show_opacity' => true,
			)
		)
	);



	$wp_customize->add_setting(
		'rollie_woo_success_border_color',
		array(
			'default'           => '#a5d6a7',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_success_border_color',
			array(
				'label'        => __( 'Success Border Color', 'rollie' ),
				'section'      => 'rollie_woo_c&d_notifications_section',
				'show_opacity' => true,
			)
		)
	);

	rollie_add_gradient_control( $wp_customize, 'rollie_woo_c&d_notifications_section', 'rollie_woo_notice_color', 'Notice Color', '#e3e6e8' );
	rollie_add_gradient_control( $wp_customize, 'rollie_woo_c&d_notifications_section', 'rollie_woo_error_color', 'Error Color', '#e3e6e8' );
	rollie_add_gradient_control( $wp_customize, 'rollie_woo_c&d_notifications_section', 'rollie_woo_success_color', 'Success Color', '#e3e6e8' );
