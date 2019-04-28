<?php





		$wp_customize->add_panel(
		'rollie_woo_l_panel',
		array(
			'title'    => __( 'Rollie Woocommerce layouts' ),
			'priority' => 20,
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

$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_category_archive_display' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_default_catalog_orderby' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_catalog_columns' )->section = 'rollie_woo_l_shop_section';
$wp_customize->get_control( 'woocommerce_catalog_rows' )->section = 'rollie_woo_l_shop_section';
//$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';
//$wp_customize->get_control( 'woocommerce_shop_page_display' )->section = 'rollie_woo_l_shop_section';

	
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
			'title'    => __( 'Rollie Woocommerce Colors and Design' ),
			'priority' => 20,
		)
	);

$wp_customize->add_section(
			'rollie_woo_notifications_section',
			array(
				'title'    => esc_html__( 'WooCommerce Notifications', 'Rollie' ),
				'panel'    => 'rollie_woo_c&d_panel',
				'priority' => 20,
			)
		);






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
				'label'             => __( 'Main Theme Text Color', 'Rollie' ),
				'section'           => 'rollie_woo_notifications_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_woo_notice_radius',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_woo_notice_radius',
			array(
				'label'       => esc_html__( 'Notice border radius ' ),
				'section'     => 'rollie_woo_notifications_section',
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
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_woo_notice_icon_invert',
				array(
					'label'   => esc_html__( 'Invert Icon Color', 'rollie' ),
					'section' => 'rollie_woo_notifications_section',

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
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_woo_notice_width_full',
				array(
					'label'   => esc_html__( 'Display Message In Full Width', 'rollie' ),
					'section' => 'rollie_woo_notifications_section',

				)
			)
		);





	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_notice_color','Notice Color','#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_error_color','Error Color','#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_success_color','Success Color','#e3e6e8'); 
	$wp_customize->add_setting(
		'rollie_notification_text_color',
		array(
			'default'   => '#212121',
			'transport' => 'refresh',

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_notification_text_color',
			array(
				'label'             => __( 'Text color for notification ', 'Rollie' ),
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_title_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
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
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_notice_border_color',
			array(
				'label'         => __( 'Notice Border Color', 'rollie' ),
				'section'       => 'rollie_woo_notifications_section',
				'show_opacity'  => true, 	
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
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_error_border_color',
			array(
				'label'         => __( 'Error Border Color', 'rollie' ),
				'section'       => 'rollie_woo_notifications_section',
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
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_woo_success_border_color',
			array(
				'label'         => __( 'Success Border Color', 'rollie' ),
				'section'       => 'rollie_woo_notifications_section',
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
				'settings'          => 'rollie_title_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

		







