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
