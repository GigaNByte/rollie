<?php





		$wp_customize->add_panel(
		'rollie_woo_l_panel',
		array(
			'title'    => __( 'Rollie Woocommerce Layouts' ),
			'priority' => 19,
		)
	);
	$wp_customize->add_section(
		'rollie_img_thumbnail',
		array(
			'title'    =>__( 'Product Image Sizes', 'Rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_img_panel',
		)
	);
	
	$wp_customize->add_section(
			'rollie_woo_l_my_account_section',
			array(
				'title'    => esc_html__( 'WooCommerce My Account', 'Rollie' ),
				'panel'    => 'rollie_woo_l_panel',
				'priority' => 20,
			)
		);
	$wp_customize->add_section(
			'rollie_woo_l_shop_section',
			array(
				'title'    => esc_html__( 'WooCommerce Shop Page', 'Rollie' ),
				'panel'    => 'rollie_woo_l_panel',
				'priority' => 20,
			)
		);
	$wp_customize->add_section(
			'rollie_woo_l_single_section',
			array(
				'title'    => esc_html__( 'WooCommerce Single Product Page', 'Rollie' ),
				'panel'    => 'rollie_woo_l_panel',
				'priority' => 20,
			)
		);
	$wp_customize->add_setting(
			'rollie_woo_l_single_img_max_h',
			array(
				'default'           => 200,
					'transport' =>'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_img_max_h',
			array(
				'label'       => esc_html__( 'Rollie Single Product Image Max Height (px)' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 50,
					'max'  => 800,
					'step' => 50
					
				),
			)
		)
	);
	$wp_customize->add_setting(
			'rollie_woo_l_single_w',
			array(
				'default'           => 8,
					'transport' =>'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_w',
			array(
				'label'       => esc_html__( 'Rollie Single Product Gallery Width' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 4,
					'max'  => 12,
					'step' => 1
					
				),
			)
		)
	);
	$wp_customize->add_setting(
			'rollie_woo_l_single_w_md',
			array(
				'default'           => 12,
					'transport' =>'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_single_w_md',
			array(
				'label'       => esc_html__( 'Rollie Single Product Gallery Width for Smaller Devices' ),
				'section'     => 'rollie_woo_l_single_section',
				'input_attrs' => array(
					'min'  => 4,
					'max'  => 12,
					'step' => 1
					
				),
			)
		)
	);




$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_category_archive_display' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_default_catalog_orderby' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_catalog_columns' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_catalog_rows' )->section = 'rollie_woo_l_shop_section';
//$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';
//$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';

		$wp_customize->add_setting(
					'rollie_woo_l_shop_img',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);


		$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_woo_l_shop_img',
				array(
					'label'   => esc_html__( 'Rollie Improved Image Size', 'rollie' ),
					'description'=> esc_html__( 'If this option is enable Rollie Theme will ignore Woocommerce setings for product images', 'rollie' ),
					'section' => 'rollie_woo_l_shop_section',

				)
			)
		);

		

				$wp_customize->add_setting(
			'rollie_woo_l_shop_img_max_h',
			array(
				'default'           => 200,
					'transport' =>'refresh',
				'sanitize_callback' => 'rollie_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Rollie_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_l_shop_img_max_h',
			array(
				'label'       => esc_html__( 'Rollie Improved Product Image Max Height (px)' ),
				'section'     => 'rollie_woo_l_shop_section',
				'input_attrs' => array(
					'min'  => 50,
					'max'  => 500,
					'step' => 50
					
				),
			)
		)
	);
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
				'label'   => esc_html__( 'Products per row on smaller devices', 'Rollie' ),
				'section' => 'rollie_woo_l_shop_section',
				'type'        => 'number',
				'input_attrs' => array(
					'min' => 0,
					'max' => 6
				),
			)
		);
$wp_customize->add_control(
			new Rollie_Toggle_Switch_Custom_control(
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
				'label'   => esc_html__( 'Maximum Number of Displayed Attributes', 'Rollie' ),
				'section' => 'rollie_woo_c&d_panel',
				'type'        => 'number',
				'input_attrs' => array(
					'min' => 0,
					'max' => 6
				),
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
			'rollie_woo_l_my_account_nav', // rollie_one_on_row_design_php_0
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_woo_l_my_account_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Big Tiles', 'rollie' ),
					2 => esc_html__( 'Simple Side Nav', 'rollie' ),
					3 => esc_html__( 'Wide Top Nav', 'rollie' ),
				),
			)
		);








		$wp_customize->add_panel(
		'rollie_woo_c&d_panel',
		array(
			'title'    => __( 'Rollie Woocommerce Colors & Design' ),
			'priority' => 19,
		)
	);

$wp_customize->add_section(
			'rollie_woo_c&d_notifications_section',
			array(
				'title'    => esc_html__( 'WooCommerce Notifications', 'Rollie' ),
				'panel'    => 'rollie_woo_c&d_panel',
				'priority' => 20,
			)
		);
	$wp_customize->add_section(
			'rollie_woo_c&d_shop_section',
			array(
				'title'    => esc_html__( 'WooCommerce Shop Page', 'Rollie' ),
				'panel'    => 'rollie_woo_c&d_panel',
				'priority' => 20,
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
			$wp_customize->add_setting(
			'rollie_woo_notice', 
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			'rollie_woo_notice', 
			array(
				'label'   => esc_html__( 'Design of Notice Border', 'Rollie' ),
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
				'label'       => esc_html__( 'Notice Border Radius ' ),
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
			new Rollie_Toggle_Switch_Custom_control(
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
			new Rollie_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_woo_notice_width_full',
				array(
					'label'   => esc_html__( 'Display Message In Full Width', 'rollie' ),
					'section' => 'rollie_woo_c&d_notifications_section',

				)
			)
		);





	rollie_add_gradient_control ($wp_customize,'rollie_woo_c&d_notifications_section','rollie_woo_notice_color','Notice Color','#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_c&d_notifications_section','rollie_woo_error_color','Error Color','#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_c&d_notifications_section','rollie_woo_success_color','Success Color','#e3e6e8'); 
	
	$wp_customize->add_setting(
		'rollie_woo_notice_text_color',
		array(
			'default'   => '#212529',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_woo_notice_text_color',
			array(
				'label'             => __( 'Notice Text Color', 'Rollie' ),
				'section'           => 'rollie_woo_c&d_notifications_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_error_border_color',
		array(
			'default'     => '#ef9a9a',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_error_border_color',
			array(
				'label'         => __( 'Error Border Color', 'rollie' ),
				'section'       => 'rollie_woo_c&d_notifications_section',
				'show_opacity'  => true, 	
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_woo_notice_border_color',
		array(
			'default'     => '#ccedfd',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_notice_border_color',
			array(
				'label'         => __( 'Notice Border Color', 'rollie' ),
				'section'       => 'rollie_woo_c&d_notifications_section',
				'show_opacity'  => true, 	
			)
		)
	);



	$wp_customize->add_setting(
		'rollie_woo_success_border_color',
		array(
			'default'     => '#a5d6a7',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	$wp_customize->add_control(
		new Rollie_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_success_border_color',
			array(
				'label'         => __( 'Success Border Color', 'rollie' ),
				'section'       => 'rollie_woo_c&d_notifications_section',
				'show_opacity'  => true, 	
			)
		)
	);

$wp_customize->add_setting(
		'rollie_muted_color',
		array(
			'default'   => '#282828',
			'transport' => 'refresh',

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_muted_color',
			array(
				'label'             => __( 'Muted Color ', 'Rollie' ),
				'section'           => 'rollie_theme_colors_text_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

		







