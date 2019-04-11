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
			'rollie_woo_notice_design', // rollie_one_on_row_design_php_0
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_woo_notice_design', // rollie_one_on_row_design_php_0
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_woo_notifications_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
				),
			)
		);




	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_notice_color','Notice Color','#ccedfd'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_error_color','Error Color','#ef9a9a'); 
	rollie_add_gradient_control ($wp_customize,'rollie_woo_notifications_section','rollie_woo_success_color','Success Color','#a5d6a7'); 

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


		







