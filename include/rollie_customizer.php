<?php

/*

@param
 $section -> full name of section
  $setting -> name of section will be applied to section and control
  $title -> frontend title of hidable,toogable gradient/color customizer
  $default-> default value of single color (this function only supoorts defaults for single colors)
*/
function rollie_add_gradient_control ($wp_customize,$section_name,$setting_name,$title,$default) 
{


$wp_customize->add_setting(	$setting_name.'_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			$setting_name.'_label',
			array(
				'label'   => esc_html__( $title, 'rollie' ),
				'section'       => $section_name,
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 9,
							)
			)
		)
	);


		$wp_customize->add_setting(
						$setting_name.'_gs',
						array(
							'default'           => 1,
							'sanitize_callback' => 'rollie_sanitize_radio',
							'transport' =>'postMessage'
						)
					);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					$setting_name.'_gs',
					array(					
						'section' => $section_name,
						'choices' => array(
							1 => esc_html__( ' Simple Color ', 'rollie' ),
						2 => esc_html__( ' Gradient ', 'rollie' ),
				
						
					),
					)
				)
			);

	$wp_customize->add_setting(
		$setting_name.'_gr_1',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			$setting_name.'_gr_1',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => $section_name,
				'show_opacity'  => true, 
			'input_attrs'=>array(
				'rollie_multiple_switch_cc' => $setting_name.'_gs-2'
		
			)
		
			)
		)
	);
	
			$wp_customize->add_setting(
			$setting_name.'_stop_gr_1',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => $setting_name.'_gs-2'
		
			)
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			$setting_name.'_stop_gr_1',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => $setting_name.'_gs-2',	
				),
			)
		)
	);
		

	
	$wp_customize->add_setting(
		$setting_name.'_gr_2',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			$setting_name.'_gr_2',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => $section_name,
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => $setting_name.'_gs-2'
		
			)
		
		
			)
		)
	);


				$wp_customize->add_setting(
			$setting_name.'_stop_gr_2',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
		$setting_name.'_stop_gr_2',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => $setting_name.'_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
		$setting_name.'_gr_3',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			$setting_name.'_gr_3',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => $section_name,
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => $setting_name.'_gs-2'
		
			)
			)
		)
	);

				$wp_customize->add_setting(
			$setting_name.'_stop_gr_3',
			array(
				'default'           => 0,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			$setting_name.'_stop_gr_3',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => $setting_name.'_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
			$setting_name.'_angle_gr',
			array(
				'default'           => 45,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',

			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			$setting_name.'_angle_gr',
			array(
				'label'       => esc_html__( 'Gradient Angle','rollie' ),
				'section'     => $section_name,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 360,
					'step' => 1,
					'rollie_multiple_switch_cc' => $setting_name.'_gs-2',
					
				),
			)
		));


		$wp_customize->add_setting(
		$setting_name,
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			$setting_name,
			array(
				'label'             => __( 'Single Color', 'Rollie' ),
				'section'           => $section_name,
				
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => $setting_name.'_gs-1'
		
			)
			)
		)
	);
}

function rollie_customizer_register( $wp_customize ) {


	require get_template_directory() . '/include/rollie_customizer_control_classes.php';


		$wp_customize->add_panel(
			'rollie_navs_panel',
			array(
				'title'    => __( 'Rollie menus and navs ' ),
				'priority' => 20,
			)
		);
	$wp_customize->add_panel(
		'rollie_color_design_panel',
		array(
			'title'    => __( 'Rollie color and design' ),
			'priority' => 20,
		)
	);
	$wp_customize->add_panel(
		'rollie_color_gradient',
		array(
			'title'    => __( 'Rollie color and design' ),
			'priority' => 20,
			'panel' => "rollie_color_design_panel"
		)
	);
		$wp_customize->add_panel(
		'rollie_layout_panel',
		array(
			'title'    => __( 'Rollie Sidebars Layout' ),
			'priority' => 20,
		)
	);
		$wp_customize->add_panel(
		'rollie_grid_meta_panel',
		array(
			'title'    => __( 'Rollie Post Grids and Post Metainfos ' ),
			'priority' => 20,
		)
	);

	$wp_customize->add_panel(
		'rollie_sidebars',
		array(
			'title'    => __( 'Rollie   ' ),
			'priority' => 20,
		)
	);
		require get_template_directory() . '/include/rollie_customizer_font_functions.php';
		
	$wp_customize->add_panel(
		'rollie_misc_panel',
		array(
			'title'    => __( 'Rollie miscellaneous settings ' ),
			'priority' => 20,
		)
	);
		$wp_customize->add_panel(
		'rollie_post_formats_panel',
		array(
			'title'    => __( 'Rollie post formats' ),
			'priority' => 20,
		)
	);


	$wp_customize->add_section(
		'rollie_footer_section',
		array(
			'title'    => esc_html__( 'Footer settings', 'Rollie' ),
			'priority' => 5,
			'panel'    => 'rollie_misc_panel',
		)
	);

	$wp_customize->add_setting(
		'rollie_footer_logo_desc_text',
		array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new Skyrocket_TinyMCE_Custom_control(
			$wp_customize,
			'rollie_footer_logo_desc_text',
			array(
				'label'       => __( 'Footer logo description text' ),
				'description' => __( 'Text will be displayed under or next to footer logo' ),
				'section'     => 'rollie_footer_section',
				'input_attrs' => array(
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
					'toolbar2' => 'formatselect outdent indent | blockquote charmap',
				),
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
		new Skyrocket_TinyMCE_Custom_control(
			$wp_customize,
			'rollie_footer_caption_text',
			array(
				'label'       => __( 'Footer caption text' ),
				'description' => __( 'Text will be below footer navigation' ),
				'section'     => 'rollie_footer_section',
				'input_attrs' => array(
					'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
					'toolbar2' => 'formatselect outdent indent | blockquote charmap',
				),
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_footer_menu_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',

			)
		);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'rollie_footer_menu_logo',
			array(
				'label'   => __( 'Footer menu logo', 'rollie' ),
				'section' => 'rollie_footer_section',
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_footer_logo_h',
			array(
				'default'           => 40,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_footer_logo_h',
			array(
				'label'       => esc_html__( 'Height of logo (px) ' ),
				'section'     => 'rollie_footer_section',
				'input_attrs' => array(
					'min'  => 30,
					'max'  => 400,
					'step' => 10,
				),
			)
		)
	);





				$wp_customize->add_section(
					'rollie_menu_top_section',
					array(
						'title'    => esc_html__( 'Menu top settings', 'Rollie' ),
						'priority' => 20,
					)
				);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_menu_top_item_align',
				array(
					'label'   => esc_html__( 'Menu items align', 'Rollie' ),
					'section' => 'rollie_menu_top_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
						2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
						3 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),
					),
				)
			)
		);

					$wp_customize->add_setting(
						'rollie_search_form_menu_top',
						array(
							'default'           => true,
							'sanitize_callback' => 'rollie_sanitize_checkbox',
						)
					);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_search_form_menu_top',
					array(
						'label'   => esc_html__( 'Enable search form ', 'Rollie' ),
						'section' => 'rollie_menu_top_section',

					)
				)
			);

							$wp_customize->add_setting(
								'rollie_search_form_menu_top_type',
								array(
									'default'           => true,
									'sanitize_callback' => 'rollie_sanitize_checkbox',
								)
							);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_search_form_menu_top_type',
					array(
						'label'   => esc_html__( 'Display search icon only ', 'Rollie' ),
						'section' => 'rollie_menu_top_section',

					)
				)
			);

	$wp_customize->add_section(
		'rollie_pagination_section',
		array(
			'title'    => esc_html__( 'Pagination settings', 'Rollie' ),
			'priority' => 10,
			'panel'    => 'rollie_misc_panel',
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_enable',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_pagination_enable',
			array(
				'label'   => esc_html__( 'Enable pagination', 'Rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_display_name',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_pagination_display_name',
			array(
				'label'   => esc_html__( 'Display next and previous post or page title', 'Rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_pagination_page_enable',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_pagination_page_enable',
			array(
				'label'   => esc_html__( 'Enable pagination on single pages', 'Rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
		$wp_customize->add_section(
					'rollie_sidebar_section',
					array(
						'title'    => esc_html__( 'Sidebars Global Settings', 'Rollie' ),
						'priority' => 20,
						'panel'    => 'rollie_layout_panel',
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
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_disable_sidebar_mobile',
					array(
						'label'   => esc_html__( 'Disable sidebars on small screens ', 'Rollie' ),
						'section' => 'rollie_sidebar_section',

					)
				)
			);


	$wp_customize->add_section(
		'rollie_post_pages_l_section',
		array(
			'title'    => esc_html__( 'Post Pages', 'Rollie' ),
			'panel'    => 'rollie_layout_panel',
			'priority' => 20,
		)
	);

				$wp_customize->add_section(
		'rollie_single_page_l_section',
		array(
			'title'    => esc_html__( 'Single Pages', 'Rollie' ),
			'panel'    => 'rollie_layout_panel',
			'priority' => 20,
		)
	);

		
	
				$wp_customize->add_setting(
			'rollie_posts_page_l_ignore',
			array(
				'default' => false,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);
	$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_posts_page_l_ignore',
				array(
					'label'       => esc_html__( 'Display sidebars only when there are widgets inside ', 'rollie' ),
					'section'     => 'rollie_post_pages_l_section',
					'description' => "This feature will disable settings below",
	
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
					'label'   => esc_html__( 'Sidebars Layout', 'rollie' ),
					'description'=> esc_html__( 'You can modify sidebar content in "Widgets" panel ', 'rollie' ),
					'type'    => 'radio',
					'section' => 'rollie_post_pages_l_section',
					'choices' => array(
						1 => esc_html__( 'sidebar_left only left sidebar  ', 'rollie' ),
						2 => esc_html__( 'full_size no sidebars', 'rollie' ),
						3 => esc_html__( 'double_sidebars double sidebars', 'rollie' ),
						4 => esc_html__( 'sidebar_right only right sidebar ', 'rollie' ),
					),
					'input_attrs' =>array(
					'icon_type'	=> 'png',
					)
				)
			)
		);
			$wp_customize->add_setting(
			'rollie_posts_page_l_sidebar_size',
			array(
				'default'           => 2,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_posts_page_l_sidebar_size',
			array(
				'description'=>'Be sure that layout with sidebars is applied',
				'label'       => esc_html__( 'Sidebar size' ),
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
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_posts_page_l_padding',
			array(
				'label'       => esc_html__( 'Padding in Main Content' ),
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
			'rollie_rest_style_for_paged_php',
			array(
				'default' => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_rest_style_for_paged_php',
				array(
					'label'       => esc_html__( 'Invert vertical sidebars to horizontal in small devices', 'rollie' ),
					'section'     => 'rollie_posts_page_section',
					'description' => "This feature won't work if 'disable sidebars on in small devices' option in sidebars global settings is enabled",

				)
			)
		);
				$wp_customize->add_setting(
			'rollie_single_page_l_ignore',
			array(
				'default' => false,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);
	$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_single_page_l_ignore',
				array(
					'label'       => esc_html__( 'Display sidebars only when there are widgets inside ', 'rollie' ),
					'section'     => 'rollie_single_page_l_section',
					'description' => "This feature will disable settings below",
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

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_single_page_l',
				array(
					'label'   => esc_html__( 'Sidebars Layout', 'rollie' ),
					'description'=> esc_html__( 'You can modify sidebar content in "Widgets" panel ', 'rollie' ),
					'section' => 'rollie_single_page_l_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'sidebar_left only left sidebar  ', 'rollie' ),
						2 => esc_html__( 'full_size no sidebars', 'rollie' ),
						3 => esc_html__( 'double_sidebars double sidebars', 'rollie' ),
						4 => esc_html__( 'sidebar_right only right sidebar ', 'rollie' ),
					),
					'input_attrs' =>array(
					'icon_type'	=> 'png',
					)
				)
			)
		);
					$wp_customize->add_setting(
			'rollie_single_page_l_sidebar_size',
			array(
				'default'           => 2,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_single_page_l_sidebar_size',
			array(
				'description'=>'Be sure that layout with sidebars is applied',
				'label'       => esc_html__( 'Sidebar size' ),
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
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_single_page_l_padding',
			array(
				'label'       => esc_html__( 'Padding in Main Content' ),
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
		'rollie_posts_page_section',
		array(
			'title'    => esc_html__( 'Main Blog Page settings', 'Rollie' ),
			'panel'    => 'rollie_grid_meta_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_setting(
		'rollie_posts_page_title_single_row',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',
		)
	);
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_posts_page_title_single_row',
			array(
				'label'   => esc_html__( 'Display titles and excerpt in single row', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_row_design_php_0', // rollie_one_on_row_design_php_0
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_php_0', // rollie_one_on_row_design_php_0
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_php_1', // rollie_two_on_row_design_php_1
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_php_1', // rollie_two_on_row_design_php_1
			array(
				'label'   => esc_html__( 'Design of posts displayed as two in one row', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_php_2', // rollie_three_on_row_design_php_2
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_php_2', // rollie_three_on_row_design_php_2
			array(
				'label'   => esc_html__( 'Design of posts displayed as three in one row', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern ', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

						$wp_customize->add_setting(
							'rollie_raw_enable_php',
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_raw_enable_php',
				array(
					'label'   => esc_html__( 'Enable raw style for all posts', 'rollie' ),
					'section' => 'rollie_posts_page_section',

				)
			)
		);

								$wp_customize->add_setting(
									'rollie_rest_style_for_paged_php',
									array(
										'default' => true,
										'sanitize_callback' => 'rollie_sanitize_checkbox',
									)
								);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_rest_style_for_paged_php',
				array(
					'label'       => esc_html__( 'Set same style of display for next pages of posts', 'rollie' ),
					'section'     => 'rollie_posts_page_section',
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_one_on_row_panoramix1_php', // panoramix
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_one_on_row_panoramix1_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as one on row ', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
				'type'    => 'number',
			)
		);
			$wp_customize->add_setting(
				'rollie_two_on_row_surroundix2_php',
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_two_on_row_surroundix2_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as two on row ', 'Rollie' ),
				'section' => 'rollie_posts_page_section',
				'type'    => 'number',
			)
		);
	$wp_customize->add_setting(
		'rollie_style_display_for_rest_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 3,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_style_display_for_rest_php',
				array(
					'label'   => esc_html__( 'What style of display you want to choose for rest of the posts', 'Rollie' ),
					'section' => 'rollie_posts_page_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-bars split on row ', 'rollie' ),
						2 => esc_html__( 'fa-th-large split two on row ', 'rollie' ),
						3 => esc_html__( 'fa-th split three on row ', 'rollie' ),
					),
				)
			)
		);
			$wp_customize->add_setting(
				'rollie_alt_thumbnail_php',
				array(
					'sanitize_callback' => 'rollie_sanitize_file',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_posts_page_section',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_margin_auto',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_margin_auto',
				array(
					'label'   => esc_html__( 'Center all posts', 'rollie' ),
					'section' => 'rollie_posts_page_section',

				)
			)
		);

						$wp_customize->add_setting(
							'rollie_aspect_ratio_clean',
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_aspect_ratio_clean',
			array(
				'label'   => esc_html__( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_posts_page_section',

			)
		)
	);

		$wp_customize->add_setting(
			'rollie_display_date',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_date',
				array(
					'label'   => esc_html__( 'Display date', 'rollie' ),
					'section' => 'rollie_posts_page_section',

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_posts_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_cat',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_cat',
			array(
				'label'   => esc_html__( 'Display categories', 'rollie' ),
				'section' => 'rollie_posts_page_section',

			)
		)
	);

	// CATEGORY TEMPLATE
	$wp_customize->add_section(
		'rollie_category_page_section',
		array(
			'title'    => esc_html__( 'Category page settings', 'Rollie' ),
			'panel'    => 'rollie_grid_meta_panel',
			'priority' => 20,
		)
	);

	$wp_customize->add_setting(
		'rollie_row_design_ct_php_0',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

		$wp_customize->add_control(
			'rollie_row_design_ct_php_0',
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_category_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_ct_php_1', // rollie_two_on_row_design_php_1
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_ct_php_1', // rollie_two_on_row_design_php_1
			array(
				'label'   => esc_html__( 'Design of posts displayed as two in one row', 'Rollie' ),
				'section' => 'rollie_category_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_ct_php_2', // rollie_three_on_row_design_php_2
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_ct_php_2', // rollie_three_on_row_design_php_2
			array(
				'label'   => esc_html__( 'Design of posts displayed as three in one row', 'Rollie' ),
				'section' => 'rollie_category_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern ', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

				$wp_customize->add_setting(
					'rollie_raw_enable_ct_php',
					array(
						'default'           => false,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_raw_enable_ct_php',
				array(
					'label'   => esc_html__( 'Enable raw style for all posts', 'rollie' ),
					'section' => 'rollie_category_page_section',

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_one_on_row_panoramix1_ct_php', // panoramix
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_one_on_row_panoramix1_ct_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as one on row ', 'Rollie' ),
				'section' => 'rollie_category_page_section',
				'type'    => 'number',
			)
		);
			$wp_customize->add_setting(
				'rollie_two_on_row_surroundix2_ct_php', // panoramix
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_two_on_row_surroundix2_ct_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as two on row ', 'Rollie' ),
				'section' => 'rollie_category_page_section',
				'type'    => 'number',
			)
		);
	$wp_customize->add_setting(
		'rollie_style_display_for_rest_ct_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 3,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_style_display_for_rest_ct_php',
				array(
					'label'   => esc_html__( 'What style of display you want to choose for rest of the posts', 'Rollie' ),
					'section' => 'rollie_category_page_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-bars split on row ', 'rollie' ),
						2 => esc_html__( 'fa-th-large split two on row ', 'rollie' ),
						3 => esc_html__( 'fa-th split three on row ', 'rollie' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_rest_style_for_paged_ct_php',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_rest_style_for_paged_ct_php',
				array(
					'label'       => esc_html__( 'Set same style of display for next pages of posts ', 'rollie' ),
					'section'     => 'rollie_category_page_section',
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_alt_thumbnail_ct_php',
				array(
					'sanitize_callback' => 'rollie_sanitize_file',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail_ct_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_category_page_section',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_margin_auto_ct',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_margin_auto_ct',
				array(
					'label'   => esc_html__( 'Center all posts', 'rollie' ),
					'section' => 'rollie_category_page_section',

				)
			)
		);

						$wp_customize->add_setting(
							'rollie_aspect_ratio_clean_ct',
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_aspect_ratio_clean_ct',
			array(
				'label'   => esc_html__( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_category_page_section',

			)
		)
	);

				$wp_customize->add_setting(
					'rollie_display_date_ct',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_date_ct',
				array(
					'label'   => esc_html__( 'Display date', 'rollie' ),
					'section' => 'rollie_category_page_section',

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author_ct',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author_ct',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_category_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_cat_ct',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_cat_ct',
			array(
				'label'   => esc_html__( 'Display categories', 'rollie' ),
				'section' => 'rollie_category_page_section',

			)
		)
	);
		// archive
		$wp_customize->add_section(
			'rollie_archive_page_section',
			array(
				'title'    => esc_html__( 'Archive page settings', 'Rollie' ),
				'panel'    => 'rollie_grid_meta_panel',
				'priority' => 20,
			)
		);
		$wp_customize->add_section(
			'rollie_single_page_section',
			array(
				'title'    => esc_html__( 'Single page settings', 'Rollie' ),
				'panel'    => 'rollie_grid_meta_panel',
				'priority' => 20,
			)
		);

			$wp_customize->add_section(
			'rollie_single_post_page_section',
			array(
				'title'    => esc_html__( 'Single post page settings', 'Rollie' ),
				'panel'    => 'rollie_grid_meta_panel',
				'priority' => 20,
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author_sp',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author_sp',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_single_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_date_sp',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_date_sp',
			array(
				'label'   => esc_html__( 'Display date', 'rollie' ),
				'section' => 'rollie_single_page_section',

			)
		)
	);
	$wp_customize->add_setting(
			'rollie_display_author_spp',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author_spp',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_single_post_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_date_spp',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_date_spp',
			array(
				'label'   => esc_html__( 'Display  date', 'rollie' ),
				'section' => 'rollie_single_post_page_section',

			)
		)
	);
	$wp_customize->add_setting(
		'rollie_row_design_ar_php_0',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

		$wp_customize->add_control(
			'rollie_row_design_ar_php_0',
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_archive_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_ar_php_1', // rollie_two_on_row_design_php_1
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_ar_php_1', // rollie_two_on_row_design_php_1
			array(
				'label'   => esc_html__( 'Design of posts displayed as two in one row', 'Rollie' ),
				'section' => 'rollie_archive_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_ar_php_2', // rollie_three_on_row_design_php_2
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_ar_php_2', // rollie_three_on_row_design_php_2
			array(
				'label'   => esc_html__( 'Design of posts displayed as three in one row', 'Rollie' ),
				'section' => 'rollie_archive_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern ', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

				$wp_customize->add_setting(
					'rollie_raw_enable_ar_php',
					array(
						'default'           => false,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_raw_enable_ar_php',
				array(
					'label'   => esc_html__( 'Enable raw style for all posts', 'rollie' ),
					'section' => 'rollie_archive_page_section',

				)
			)
		);

										$wp_customize->add_setting(
											'rollie_rest_style_for_paged_ar_php',
											array(
												'default' => true,
												'sanitize_callback' => 'rollie_sanitize_checkbox',
											)
										);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_rest_style_for_paged_ar_php',
				array(
					'label'       => esc_html__( 'Set same style of display for next pages of posts  ', 'rollie' ),
					'section'     => 'rollie_archive_page_section',
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_one_on_row_panoramix1_ar_php', // panoramix
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_one_on_row_panoramix1_ar_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as one on row ', 'Rollie' ),
				'section' => 'rollie_archive_page_section',
				'type'    => 'number',
			)
		);
			$wp_customize->add_setting(
				'rollie_two_on_row_surroundix2_ar_php', // panoramix
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_two_on_row_surroundix2_ar_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as two on row ', 'Rollie' ),
				'section' => 'rollie_archive_page_section',
				'type'    => 'number',
			)
		);
	$wp_customize->add_setting(
		'rollie_style_display_for_rest_ar_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 3,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_style_display_for_rest_ar_php',
				array(
					'label'   => esc_html__( 'What style of display you want to choose for rest of the posts', 'Rollie' ),
					'section' => 'rollie_archive_page_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-bars split on row ', 'rollie' ),
						2 => esc_html__( 'fa-th-large split two on row ', 'rollie' ),
						3 => esc_html__( 'fa-th split three on row ', 'rollie' ),
					),
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_alt_thumbnail_ar_php',
				array(
					'sanitize_callback' => 'rollie_sanitize_file',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail_ar_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_archive_page_section',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_margin_auto_ar',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_margin_auto_ar',
				array(
					'label'   => esc_html__( 'Center all posts', 'rollie' ),
					'section' => 'rollie_archive_page_section',

				)
			)
		);

						$wp_customize->add_setting(
							'rollie_aspect_ratio_clean_ar',
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_aspect_ratio_clean_ar',
			array(
				'label'   => esc_html__( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_archive_page_section',

			)
		)
	);

				$wp_customize->add_setting(
					'rollie_ar_translate_php',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_ar_translate_php',
				array(
					'label'   => esc_html__( 'Enable title translating for archives', 'rollie' ),
					'section' => 'rollie_archive_page_section',

				)
			)
		);

				$wp_customize->add_setting(
					'rollie_display_date_ar',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_date_ar',
				array(
					'label'   => esc_html__( 'Display date', 'rollie' ),
					'section' => 'rollie_archive_page_section',

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author_ar',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author_ar',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_archive_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_cat_ar',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_cat_ar',
			array(
				'label'   => esc_html__( 'Display categories', 'rollie' ),
				'section' => 'rollie_archive_page_section',

			)
		)
	);
		// archive end
		// search start
		$wp_customize->add_section(
			'rollie_search_page_section',
			array(
				'title'    => esc_html__( 'Search page settings', 'Rollie' ),
				'panel'    => 'rollie_grid_meta_panel',
				'priority' => 20,
			)
		);

	$wp_customize->add_setting(
		'rollie_row_design_se_php_0',
		array(
			'sanitize_callback' => 'rollie_sanitize_select',
			'default'           => 1,

		)
	);

		$wp_customize->add_control(
			'rollie_row_design_se_php_0',
			array(
				'label'   => esc_html__( 'Design of posts displayed as one in one row', 'Rollie' ),
				'section' => 'rollie_search_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_se_php_1', // rollie_two_on_row_design_php_1
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_se_php_1', // rollie_two_on_row_design_php_1
			array(
				'label'   => esc_html__( 'Design of posts displayed as two in one row', 'Rollie' ),
				'section' => 'rollie_search_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

		$wp_customize->add_setting(
			'rollie_row_design_se_php_2', // rollie_three_on_row_design_php_2
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_row_design_se_php_2', // rollie_three_on_row_design_php_2
			array(
				'label'   => esc_html__( 'Design of posts displayed as three in one row', 'Rollie' ),
				'section' => 'rollie_search_page_section',
				'type'    => 'select',
				'choices' => array(
					1 => esc_html__( 'Classic', 'rollie' ),
					2 => esc_html__( 'Modern ', 'rollie' ),
					3 => esc_html__( 'Clean', 'rollie' ),

				),
			)
		);

				$wp_customize->add_setting(
					'rollie_raw_enable_se_php',
					array(
						'default'           => false,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_raw_enable_se_php',
				array(
					'label'   => esc_html__( 'Enable raw style for all posts', 'rollie' ),
					'section' => 'rollie_search_page_section',

				)
			)
		);

										$wp_customize->add_setting(
											'rollie_rest_style_for_paged_se_php',
											array(
												'default' => true,
												'sanitize_callback' => 'rollie_sanitize_checkbox',
											)
										);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_rest_style_for_paged_se_php',
				array(
					'label'       => esc_html__( 'Set same style of display for next pages of posts ', 'rollie' ),
					'section'     => 'rollie_search_page_section',
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_one_on_row_panoramix1_se_php', // panoramix
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_one_on_row_panoramix1_se_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as one on row ', 'Rollie' ),
				'section' => 'rollie_search_page_section',
				'type'    => 'number',
			)
		);
			$wp_customize->add_setting(
				'rollie_two_on_row_surroundix2_se_php', // panoramix
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_two_on_row_surroundix2_se_php',
			array(
				'label'   => esc_html__( 'How many posts you want to display as two on row ', 'Rollie' ),
				'section' => 'rollie_search_page_section',
				'type'    => 'number',
			)
		);
	$wp_customize->add_setting(
		'rollie_style_display_for_rest_se_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 3,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_style_display_for_rest_se_php',
				array(
					'label'   => esc_html__( 'What style of display you want to choose for rest of the posts', 'Rollie' ),
					'section' => 'rollie_search_page_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-bars split on row ', 'rollie' ),
						2 => esc_html__( 'fa-th-large split two on row ', 'rollie' ),
						3 => esc_html__( 'fa-th split three on row ', 'rollie' ),
					),
				)
			)
		);

			$wp_customize->add_setting(
				'rollie_alt_thumbnail_se_php',
				array(
					'sanitize_callback' => 'rollie_sanitize_file',
					'transport'         => 'refresh',
					'default'           => '',
				)
			);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail_se_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_search_page_section',
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_margin_auto_se',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_margin_auto_se',
				array(
					'label'   => esc_html__( 'Center all posts', 'rollie' ),
					'section' => 'rollie_search_page_section',

				)
			)
		);

						$wp_customize->add_setting(
							'rollie_aspect_ratio_clean_se',
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_aspect_ratio_clean_se',
			array(
				'label'   => esc_html__( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_search_page_section',

			)
		)
	);

				$wp_customize->add_setting(
					'rollie_display_date_se',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_date_se',
				array(
					'label'   => esc_html__( 'Display date', 'rollie' ),
					'section' => 'rollie_search_page_section',

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author_se',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author_se',
				array(
					'label'   => esc_html__( 'Display author', 'rollie' ),
					'section' => 'rollie_search_page_section',

				)
			)
		);
				$wp_customize->add_setting(
					'rollie_display_cat_se',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_cat_se',
			array(
				'label'   => esc_html__( 'Display categories', 'rollie' ),
				'section' => 'rollie_search_page_section',

			)
		)
	);

		// search end
		// widget style customize



		$wp_customize->add_setting(
						'rollie_search_form_menu_top',
						array(
							'default'           => true,
							'sanitize_callback' => 'rollie_sanitize_checkbox',
						)
					);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_search_form_menu_top',
					array(
						'label'   => esc_html__( 'Enable search form ', 'Rollie' ),
						'section' => 'rollie_menu_top_section',

					)
				)
			);



/*

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'rollie_main_theme_text_color',
				array(
					'label'             => __('Main Theme text color', 'Rollie' ),
					'section'           => 'rollie_theme_colors_section',
					'sanitize_callback' => 'rollie_sanitize_hex_color',
				)
			)
		);

	
*/		

	$wp_customize->add_section(
		'rollie_theme_colors_section',
		array(
			'title'    => __( 'Theme Colors', 'Rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);
	
	$wp_customize->add_section(
		'rollie_embl_section',
		array(
			'title'    => __( 'Line Embellishments Design', 'Rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);
						$wp_customize->add_setting(	'rollie_embl_titles_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_embl_titles_label',
			array(
				'label'   => esc_html__( 'Page Titles', 'rollie' ),
				'section'       => 'rollie_embl_section',
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 3,
				'rollie_open_close_auto'=>true,
							)
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
				'label'   => esc_html__( 'Design of  Embellishments', 'Rollie' ),
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
			'rollie_embl_titles_size',
			array(
				'default'           => 3,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_titles_size',
			array(
				'label'       => esc_html__( 'Detail Size' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 3,
					'step' => 1,	
				),
			)
		)
	);
					$wp_customize->add_setting(
			'rollie_embl_titles_width',
			array(
				'default'           => 1,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_titles_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,	
				),
			)
		)
	);
						$wp_customize->add_setting(	'rollie_embl_subtitles_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_embl_subtitles_label',
			array(
				'label'   => esc_html__( 'Subtitles', 'rollie' ),
				'section'       => 'rollie_embl_section',
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 3,
					'rollie_open_close_auto'=>true
							)
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
				'label'   => esc_html__( 'Design of Embellishments', 'Rollie' ),
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
			'rollie_embl_subtitles_size',
			array(
				'default'           => 3,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_subtitles_size',
			array(
				'label'       => esc_html__( 'Detail Size' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 3,
					'step' => 1,	
				),
			)
		)
	);
					$wp_customize->add_setting(
			'rollie_embl_subtitles_width',
			array(
				'default'           => 1,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_subtitles_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,	
				),
			)
		)
	);
			$wp_customize->add_setting(	'rollie_embl_navbar_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_embl_navbar_label',
			array(
				'label'   => esc_html__( 'Navbar', 'rollie' ),
				'section'       => 'rollie_embl_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 3,
								'rollie_open_close_auto'=>true
							)
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
				'label'   => esc_html__( ' Embellishments', 'Rollie' ),
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
			'rollie_embl_navbar_size',
			array(
				'default'           => 3,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_navbar_size',
			array(
				'label'       => esc_html__( 'Detail Size' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 3,
					'step' => 1,	
				),
			)
		)
	);
					$wp_customize->add_setting(
			'rollie_embl_navbar_width',
			array(
				'default'           => 1,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_navbar_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,	
				),
			)
		)
	);

				$wp_customize->add_setting(	'rollie_embl_footer_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_embl_footer_label',
			array(
				'label'   => esc_html__( 'Footer', 'rollie' ),
				'section'       => 'rollie_embl_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 3,
								'rollie_open_close_auto'=>true
							)
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
				'label'   => esc_html__( 'Design of  Embellishments', 'Rollie' ),
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
			'rollie_embl_footer_size',
			array(
				'default'           => 3,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_footer_size',
			array(
				'label'       => esc_html__( 'Detail Size' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 3,
					'step' => 1,	
				),
			)
		)
	);
					$wp_customize->add_setting(
			'rollie_embl_footer_width',
			array(
				'default'           => 1,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_embl_footer_width',
			array(
				'label'       => esc_html__( 'Detail Thickness (px)' ),
				'section'     => 'rollie_embl_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 40,
					'step' => 1,	
				),
			)
		)
	);

	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_main_theme_color','Main Theme Color','#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_darker_main_theme_color','Darker/Contrast Theme Color','#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_second_theme_color','Second Theme Color','#212121'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_third_theme_color','Third Theme Color','#a37e2c'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_sidebar_theme_color','Sidebars Color','#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_b_color','Button Color','#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_b_h_color','Button Color At Hover','#212121');



	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_alt_b_color','Alternate Button Color','#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_alt_b_h_color','Alternate Button Color At Hover','#212121'); 
	rollie_add_gradient_control ($wp_customize,'rollie_navbar_section','rollie_navbar_color','Navbar Color','rgba(255,255,255,0.8)'); 



		// widget end#ffffff
	


		$wp_customize->add_setting(	'rollie_title_bg_theme_color_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_label',
			array(
				'label'   => esc_html__( 'Page Title Background Color ', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 9,
							)
			)
		)
	);


		$wp_customize->add_setting(
						'rollie_title_bg_theme_color_gs',
						array(
							'default'           => 2,
							'sanitize_callback' => 'rollie_sanitize_radio',
							'transport' =>'postMessage'
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
			'default'     => 'rgba(255,255,255,0.75)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_1',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
			'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2'
		
			)
		
			)
		)
	);
	
			$wp_customize->add_setting(
			'rollie_title_bg_theme_color_stop_gr_1',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2'
		
			)
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_stop_gr_1',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',	
				),
			)
		)
	);
		

	
	$wp_customize->add_setting(
		'rollie_title_bg_theme_color_gr_2',
		array(
			'default'     => 'rgba(255,255,255,0.9)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_2',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2'
		
			)
		
		
			)
		)
	);


				$wp_customize->add_setting(
			'rollie_title_bg_theme_color_stop_gr_2',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
		'rollie_title_bg_theme_color_stop_gr_2',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
		'rollie_title_bg_theme_color_gr_3',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_gr_3',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2'
		
			)
			)
		)
	);

				$wp_customize->add_setting(
			'rollie_title_bg_theme_color_stop_gr_3',
			array(
				'default'           => 0,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_stop_gr_3',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
			'rollie_title_bg_theme_color_angle_gr',
			array(
				'default'           => 45,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',

			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_title_bg_theme_color_angle_gr',
			array(
				'label'       => esc_html__( 'Gradient Angle','rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 360,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-2',
					
				),
			)
		));


		$wp_customize->add_setting(
		'rollie_title_bg_theme_color',
		array(
			'default'     => '#ffffff',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);






	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_title_bg_theme_color',
			array(
				'label'             => __( 'Page Title Background Color', 'Rollie' ),
				'section'           => 'rollie_theme_colors_section',
				
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_title_bg_theme_color_gs-1'
		
			)
			)
		)
	);











		$wp_customize->add_setting(	'rollie_post_classic_title_bg_theme_color_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_label',
			array(
				'label'   => esc_html__( 'Post Classic Title Background ', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 9,
							)
			)
		)
	);


		$wp_customize->add_setting(
						'rollie_post_classic_title_bg_theme_color_gs',
						array(
							'default'           => 2,
							'sanitize_callback' => 'rollie_sanitize_radio',
							'transport' =>'postMessage'
						)
					);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					'rollie_post_classic_title_bg_theme_color_gs',
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
		'rollie_post_classic_title_bg_theme_color_gr_1',
		array(
			'default'     => 'rgba(255,255,255,0.75)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_gr_1',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
			'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2'
		
			)
		
			)
		)
	);
	
			$wp_customize->add_setting(
			'rollie_post_classic_title_bg_theme_color_stop_gr_1',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2'
		
			)
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_stop_gr_1',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2',	
				),
			)
		)
	);
		

	
	$wp_customize->add_setting(
		'rollie_post_classic_title_bg_theme_color_gr_2',
		array(
			'default'     => 'rgba(255,255,255,0.9)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_gr_2',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2'
		
			)
		
		
			)
		)
	);


				$wp_customize->add_setting(
			'rollie_post_classic_title_bg_theme_color_stop_gr_2',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
		'rollie_post_classic_title_bg_theme_color_stop_gr_2',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
		'rollie_post_classic_title_bg_theme_color_gr_3',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_gr_3',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2'
		
			)
			)
		)
	);

				$wp_customize->add_setting(
			'rollie_post_classic_title_bg_theme_color_stop_gr_3',
			array(
				'default'           => 0,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_stop_gr_3',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
			'rollie_post_classic_title_bg_theme_color_angle_gr',
			array(
				'default'           => 45,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',

			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color_angle_gr',
			array(
				'label'       => esc_html__( 'Gradient Angle','rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 360,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-2',
					
				),
			)
		));


		$wp_customize->add_setting(
		'rollie_post_classic_title_bg_theme_color',
		array(
			'default'     => '#ffffff',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);






	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_classic_title_bg_theme_color',
			array(
				'label'             => __( 'Post Classic Style Title Background', 'Rollie' ),
				'section'           => 'rollie_theme_colors_section',
				
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_classic_title_bg_theme_color_gs-1'
		
			)
			)
		)
	);


		$wp_customize->add_setting(	'rollie_post_modern_title_bg_theme_color_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_label',
			array(
				'label'   => esc_html__( 'Post Modern Title Background', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 9,
							)
			)
		)
	);


		$wp_customize->add_setting(
						'rollie_post_modern_title_bg_theme_color_gs',
						array(
							'default'           => 2,
							'sanitize_callback' => 'rollie_sanitize_radio',
							'transport' =>'postMessage'
						)
					);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					'rollie_post_modern_title_bg_theme_color_gs',
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
		'rollie_post_modern_title_bg_theme_color_gr_1',
		array(
			'default'     => 'rgba(255,255,255,0.75)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_gr_1',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
			'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2'
		
			)
		
			)
		)
	);
	
			$wp_customize->add_setting(
			'rollie_post_modern_title_bg_theme_color_stop_gr_1',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2'
		
			)
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_stop_gr_1',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2',	
				),
			)
		)
	);
		

	
	$wp_customize->add_setting(
		'rollie_post_modern_title_bg_theme_color_gr_2',
		array(
			'default'     => 'rgba(255,255,255,0.9)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_gr_2',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2'
		
			)
		
		
			)
		)
	);


				$wp_customize->add_setting(
			'rollie_post_modern_title_bg_theme_color_stop_gr_2',
			array(
				'default'           => 40,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
		'rollie_post_modern_title_bg_theme_color_stop_gr_2',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2',
				),
			)
		)
	);
		$wp_customize->add_setting(
		'rollie_post_modern_title_bg_theme_color_gr_3',
		array(
			'default'     => 'rgba(255,255,255,1)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_gr_3',
			array(
				'label'         => __( 'Alpha Color Picker', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2'
		
			)
			)
		)
	);

				$wp_customize->add_setting(
			'rollie_post_modern_title_bg_theme_color_stop_gr_3',
			array(
				'default'           => 0,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_stop_gr_3',
			array(
				'label'       => esc_html__( 'Color Stop (%) ' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2',
				),
			)
		)
	);
			$wp_customize->add_setting(
			'rollie_post_modern_title_bg_theme_color_angle_gr',
			array(
				'default'           => 45,
					'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',

			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color_angle_gr',
			array(
				'label'       => esc_html__( 'Gradient Angle','rollie' ),
				'section'     => 'rollie_theme_colors_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 360,
					'step' => 1,
					'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-2',
					
				),
			)
		));


		$wp_customize->add_setting(
		'rollie_post_modern_title_bg_theme_color',
		array(
			'default'     => '#ffffff',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);






	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_post_modern_title_bg_theme_color',
			array(
				'label'             => __( 'Post modern Style Title Background', 'Rollie' ),
				'section'           => 'rollie_theme_colors_section',
				
				'show_opacity'  => true, 
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_post_modern_title_bg_theme_color_gs-1'
		
			)
			)
		)
	);




		$wp_customize->add_setting(	'rollie_shadow');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_shadow',
			array(
				'label'   => esc_html__( 'Box Shadows', 'rollie' ),
				'section'       => 'rollie_theme_colors_section',
				'input_attrs'=> array (
								'rollie_collapse_elements_number'=> 3,
							)
			)
		)
	);


		$wp_customize->add_setting(
		'rollie_shadow_theme_color',
		array(
			'default'   => '#a37e2c',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);



	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_shadow_theme_color',
			array(
				'label'             => __( 'Shadow Color', 'Rollie' ),
				'section'           => 'rollie_theme_colors_section',
				'show_opacity'  => true, 
					'input_attrs'=>array(
			'rollie_multiple_switch_cc' => 'rollie_shadow_theme_color_gs-1',
		
			)
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
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_shadow_posts',
					array(
						'label'   => esc_html__( 'Enable on Posts and Products ', 'Rollie' ),
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
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_shadow_menus',
					array(
						'label'   => esc_html__( 'Enable on Menus ', 'Rollie' ),
						'section' => 'rollie_theme_colors_section',

					)
				)
			);





$wp_customize->add_section(
		'rollie_theme_colors_text_section',
		array(
			'title'    => __( 'Theme Text Colors', 'Rollie' ),
			'panel'    => 'rollie_color_design_panel',
			'priority' => 30,
		)
	);


	$wp_customize->add_setting(
		'rollie_title_text_color',
		array(
			'default'   => '#212121',
			'transport' => 'refresh',

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_title_text_color',
			array(
				'label'             => __( 'Text color for titles ', 'Rollie' ),
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_title_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);




	$wp_customize->add_setting(
		'rollie_main_theme_text_color',
		array(
			'default'   => '#212529',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_main_theme_text_color',
			array(
				'label'             => __( 'Main Theme Text Color', 'Rollie' ),
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_main_theme_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_second_text_color',
		array(
			'default'   => '#ffffff',
			'transport' => 'refresh',

		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_second_text_color',
			array(
				'label'             => __( 'Second text color  ', 'Rollie' ),
				'description'       => __( ' Text color on second or third theme color as background ' ),
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_second_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);



	$wp_customize->add_setting(
		'rollie_subtitle_text_color',
		array(
			'default'   => '#818181',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_subtitle_text_color',
			array(
				'label'             => __( 'Third text color', 'Rollie' ),
				'description'		=> __('Post and page excerpts, metainfo bars, footer subitems color '),
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_subtitle_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_fourth_text_color',
		array(
			'default'   => '#228050',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_fourth_text_color',
			array(
				'label'             => __( 'Fourth text color', 'Rollie' ),
				'description'		=> __(' Links color on page content or article'),
				'section'           => 'rollie_theme_colors_text_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_category_title_text_color',
		array(
			'default'   => '#a37e2c',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_category_title_text_color',
			array(
				'label'             => __( 'Fifth Text Color' , 'Rollie' ),
				'description'		=> __('Category titles, links at hover,fancy line color'),		
				'section'           => 'rollie_theme_colors_text_section',
				'settings'          => 'rollie_category_title_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);


	// navbars
	$wp_customize->add_section(
		'rollie_navbar_section',
		array(
			'title'    => __( 'Top Navbar settings and colors', 'Rollie' ),
			'priority' => 9,
			'panel'    => 'rollie_misc_panel',
		)
	);

		$wp_customize->add_setting(
			'rollie_menu_top_logo',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',

			)
		);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'rollie_menu_top_logo',
			array(
				'label'   => __( 'Top menu logo', 'rollie' ),
				'section' => 'rollie_navbar_section',
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_menu_top_logo_h',
			array(
				'default'           => 40,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_menu_top_logo_h',
			array(
				'label'       => esc_html__( 'Height of logo (px) ' ),
				'section'     => 'rollie_navbar_section',
				'input_attrs' => array(
					'min'  => 30,
					'max'  => 400,
					'step' => 10,
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
					'label'   => esc_html__( 'Menu items align', 'Rollie' ),
					'section' => 'rollie_navbar_section',
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
						2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
						3 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),
					),
				)
			)
		);

		$wp_customize->add_setting(
			'rollie_menu_design',
			array(
				'sanitize_callback' => 'rollie_sanitize_radio',
				'default'           => 'full',

			)
		);

		$wp_customize->add_control(
			'rollie_menu_design',
			array(
				'label'   => esc_html__( 'Navbar menu design', 'Rollie' ),
				'section' => 'rollie_navbar_section',
				'type'    => 'radio',
				'choices' => array(
					'full' => esc_html__( 'Full width collapse', 'rollie' ),
					'side' => esc_html__( 'Left side collapse', 'rollie' ),
				),
			)
		);

					$wp_customize->add_setting(
						'rollie_menu_overlay',
						array(
							'default'           => true,
							'sanitize_callback' => 'rollie_sanitize_checkbox',
						)
					);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_menu_overlay',
					array(
						'label'   => esc_html__( 'Enable overlay when menu drops', 'Rollie' ),
						'section' => 'rollie_navbar_section',

					)
				)
			);

					$wp_customize->add_setting(
						'rollie_search_form_menu_top',
						array(
							'default'           => true,
							'sanitize_callback' => 'rollie_sanitize_checkbox',
						)
					);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_search_form_menu_top',
					array(
						'label'   => esc_html__( 'Enable search form ', 'Rollie' ),
						'section' => 'rollie_navbar_section',

					)
				)
			);

							$wp_customize->add_setting(
								'rollie_search_form_menu_top_type',
								array(
									'default'           => true,
									'sanitize_callback' => 'rollie_sanitize_checkbox',
								)
							);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_search_form_menu_top_type',
					array(
						'label'   => esc_html__( 'Display search icon only ', 'Rollie' ),
						'section' => 'rollie_navbar_section',

					)
				)
			);






	$wp_customize->add_setting(
		'rollie_navbar_text_color',
		array(
			'default'   => '#212121',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_navbar_text_color',
			array(
				'label'             => __( 'Navbar Text Color', 'Rollie' ),
				'section'           => 'rollie_navbar_section',
				'settings'          => 'rollie_navbar_text_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_navbar_text_hover_color',
		array(
			'default'   => '#a37e2c',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_navbar_text_hover_color',
			array(
				'label'             => __( 'Navbar Text Hover Color', 'Rollie' ),
				'section'           => 'rollie_navbar_section',
				'settings'          => 'rollie_navbar_text_hover_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);



	$wp_customize->add_section(
		'rollie_post_format_link',
		array(
			'title'    => __( 'Post format: link', 'Rollie' ),
			'panel'    => 'rollie_post_formats_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'rollie_alt_link_thumbnail_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_file',
			'transport'         => 'refresh',
			'default'           => '',
		)
	);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_link_thumbnail_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_post_format_link',
				)
			)
		);
	$wp_customize->add_setting(
		'rollie_display_format_icon_link',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_link',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_link',

					)
				)
			);
		$wp_customize->add_setting(
			'rollie_format_icon_class_link',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_link',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_link',
				'type'        => 'text',
				'placeholder' => __( ' fa-link', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_link_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_link_color',
			array(
				'label'             => __( 'Link icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_link',
				'settings'          => 'rollie_icon_link_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_link_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_link_shadow',
			array(
				'label'             => __( 'Link icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_link',
				'settings'          => 'rollie_icon_link_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_link_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_link_color_h',
			array(
				'label'             => __( 'Link icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_link',
				'settings'          => 'rollie_icon_link_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

		/*===================================*/

	$wp_customize->add_section(
		'rollie_post_format_aside',
		array(

			'title'    => __( 'Post format: aside', 'Rollie' ),
			'panel'    => 'rollie_post_formats_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'rollie_display_format_icon_aside',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_aside',
					array(
						'label'   => esc_html__( 'Display post format aside', 'Rollie' ),
						'section' => 'rollie_post_format_aside',

					)
				)
			);
		$wp_customize->add_setting(
			'rollie_format_icon_class_aside',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_aside',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format aside', 'Rollie' ),
				'section'     => 'rollie_post_format_aside',
				'type'        => 'text',
				'placeholder' => __( ' fa-link', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_aside_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_aside_color',
			array(
				'label'             => __( 'Aside icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_aside',
				'settings'          => 'rollie_icon_aside_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_aside_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_aside_shadow',
			array(
				'label'             => __( 'Aside icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_aside',
				'settings'          => 'rollie_icon_aside_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_aside_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_aside_color_h',
			array(
				'label'             => __( 'Aside icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_aside',
				'settings'          => 'rollie_icon_aside_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

		/*===================================*/

	$wp_customize->add_section(
		'rollie_post_format_quote',
		array(
			'title'    => __( 'Post format: quote', 'Rollie' ),
			'panel'    => 'rollie_post_formats_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'rollie_alt_quote_thumbnail_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_file',
			'transport'         => 'refresh',
			'default'           => '',
		)
	);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_quote_thumbnail_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_post_format_quote',
				)
			)
		);
	$wp_customize->add_setting(
		'rollie_display_format_icon_quote',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_quote',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_quote',

					)
				)
			);
		$wp_customize->add_setting(
			'rollie_format_icon_class_quote',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_quote',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_quote',
				'type'        => 'text',
				'placeholder' => __( ' fa-quote-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_quote_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_quote_color',
			array(
				'label'             => __( 'Aside icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_quote',
				'settings'          => 'rollie_icon_quote_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_quote_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_quote_shadow',
			array(
				'label'             => __( 'Aside icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_quote',
				'settings'          => 'rollie_icon_aside_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_quote_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_quote_color_h',
			array(
				'label'             => __( 'Aside icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_quote',
				'settings'          => 'rollie_icon_aside_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);
			/*===================================*/

	$wp_customize->add_section(
		'rollie_post_format_status',
		array(
			'title'    => __( 'Post format: status', 'Rollie' ),
			'panel'    => 'rollie_post_formats_panel',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'rollie_aspect_ratio_status',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_aspect_ratio_status',
					array(
						'label'   => esc_html__( 'Save aspect ratio for thumbnails', 'Rollie' ),
						'section' => 'rollie_post_format_status',

					)
				)
			);

	$wp_customize->add_setting(
		'rollie_alt_status_thumbnail_php',
		array(
			'sanitize_callback' => 'rollie_sanitize_file',
			'transport'         => 'refresh',
			'default'           => '',
		)
	);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_status_thumbnail_php',
				array(
					'label'   => __( 'Add alternate post thumbnail', 'Rollie' ),
					'section' => 'rollie_post_format_status',
				)
			)
		);
	$wp_customize->add_setting(
		'rollie_display_format_icon_status',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_status',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_status',

					)
				)
			);
		$wp_customize->add_setting(
			'rollie_format_icon_class_status',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_status',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_status',
				'type'        => 'text',
				'placeholder' => __( ' fa-status-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_status_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_status_color',
			array(
				'label'             => __( 'status icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_status',
				'settings'          => 'rollie_icon_status_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_status_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_status_shadow',
			array(
				'label'             => __( 'status icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_status',
				'settings'          => 'rollie_icon_status_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_status_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_status_color_h',
			array(
				'label'             => __( 'status icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_status',
				'settings'          => 'rollie_icon_status_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

		// =============================
			$wp_customize->add_section(
				'rollie_post_format_audio',
				array(
					'title'    => __( 'Post format: audio', 'Rollie' ),
					'panel'    => 'rollie_post_formats_panel',
					'priority' => 40,
				)
			);

	$wp_customize->add_setting(
		'rollie_display_format_icon_audio',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_audio',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_audio',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_format_icon_class_audio',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_audio',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_audio',
				'type'        => 'text',
				'placeholder' => __( ' fa-audio-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_audio_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_audio_color',
			array(
				'label'             => __( 'audio icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_audio',
				'settings'          => 'rollie_icon_audio_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_audio_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_audio_shadow',
			array(
				'label'             => __( 'audio icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_audio',
				'settings'          => 'rollie_icon_audio_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_audio_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_audio_color_h',
			array(
				'label'             => __( 'audio icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_audio',
				'settings'          => 'rollie_icon_audio_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

				// =============================
			$wp_customize->add_section(
				'rollie_post_format_video',
				array(
					'title'    => __( 'Post format: video', 'Rollie' ),
					'panel'    => 'rollie_post_formats_panel',
					'priority' => 40,
				)
			);

		$wp_customize->add_setting(
			'rollie_display_format_icon_video',
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_video',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_video',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_format_icon_class_video',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_video',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_video',
				'type'        => 'text',
				'placeholder' => __( ' fa-video-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_video_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_video_color',
			array(
				'label'             => __( 'video icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_video',
				'settings'          => 'rollie_icon_video_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_video_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_video_shadow',
			array(
				'label'             => __( 'video icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_video',
				'settings'          => 'rollie_icon_video_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_video_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_video_color_h',
			array(
				'label'             => __( 'video icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_video',
				'settings'          => 'rollie_icon_video_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

						// =============================
			$wp_customize->add_section(
				'rollie_post_format_image',
				array(
					'title'    => __( 'Post format: image', 'Rollie' ),
					'panel'    => 'rollie_post_formats_panel',
					'priority' => 40,
				)
			);

	$wp_customize->add_setting(
		'rollie_display_format_icon_image',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_image',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_image',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_format_icon_class_image',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_image',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_image',
				'type'        => 'text',
				'placeholder' => __( ' fa-image-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_image_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_image_color',
			array(
				'label'             => __( 'image icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_image',
				'settings'          => 'rollie_icon_image_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_image_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_image_shadow',
			array(
				'label'             => __( 'image icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_image',
				'settings'          => 'rollie_icon_image_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_image_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_image_color_h',
			array(
				'label'             => __( 'image icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_image',
				'settings'          => 'rollie_icon_image_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_aspect_ratio_image',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_aspect_ratio_image',
					array(
						'label'   => esc_html__( 'Save aspect ratio for thumbnails', 'Rollie' ),
						'section' => 'rollie_post_format_image',

					)
				)
			);
							// =============================
			$wp_customize->add_section(
				'rollie_post_format_gallery',
				array(
					'title'    => __( 'Post format: gallery', 'Rollie' ),
					'panel'    => 'rollie_post_formats_panel',
					'priority' => 40,
				)
			);

	$wp_customize->add_setting(
		'rollie_display_format_icon_gallery',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_display_format_icon_gallery',
					array(
						'label'   => esc_html__( 'Display post format icon', 'Rollie' ),
						'section' => 'rollie_post_format_gallery',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_format_icon_class_gallery',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_format_icon_class_gallery',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for post format icon', 'Rollie' ),
				'section'     => 'rollie_post_format_gallery',
				'type'        => 'text',
				'placeholder' => __( ' fa-gallery-left ', 'Rollie' ),
			)
		);

						$wp_customize->add_setting(
							'rollie_icon_gallery_color',
							array(
								'default'   => '#212121',
								'transport' => 'refresh',
							)
						);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_gallery_color',
			array(
				'label'             => __( 'gallery icon color', 'Rollie' ),
				'section'           => 'rollie_post_format_gallery',
				'settings'          => 'rollie_icon_gallery_color',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_gallery_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_gallery_shadow',
			array(
				'label'             => __( 'gallery icon shadow color', 'Rollie' ),
				'section'           => 'rollie_post_format_gallery',
				'settings'          => 'rollie_icon_gallery_shadow',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

							$wp_customize->add_setting(
								'rollie_icon_gallery_color_h',
								array(
									'default'   => '#ffffff',
									'transport' => 'refresh',
								)
							);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_gallery_color_h',
			array(
				'label'             => __( 'gallery icon color when hover', 'Rollie' ),
				'section'           => 'rollie_post_format_gallery',
				'settings'          => 'rollie_icon_gallery_color_h',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_aspect_ratio_gallery',
		array(
			'default'           => true,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_aspect_ratio_gallery',
					array(
						'label'   => esc_html__( 'Save aspect ratio for thumbnails', 'Rollie' ),
						'section' => 'rollie_post_format_gallery',

					)
				)
			);

	$wp_customize->add_section(
		'rollie_tags',
		array(
			'title'    => __( 'Comment and tags bar', 'Rollie' ),
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
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_tags_display_icon',
					array(
						'label'   => esc_html__( 'Display tag icon', 'Rollie' ),
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
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_tags_display_post_format',
					array(
						'label'   => esc_html__( 'Display post format as tag', 'Rollie' ),
						'section' => 'rollie_tags',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_tags_icon',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_tags_icon',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for tag icon ', 'Rollie' ),
				'section'     => 'rollie_tags',
				'type'        => 'text',
				'placeholder' => __( ' fa-tags', 'Rollie' ),
			)
		);
		$wp_customize->add_setting(
			'rollie_comments_icon',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content
			)
		);

		$wp_customize->add_control(
			'rollie_comments_icon',
			array(
				'label'       => esc_html__( ' Type different Font Awesome class for comments icon ', 'Rollie' ),
				'section'     => 'rollie_tags',
				'type'        => 'text',
				'placeholder' => __( ' fa-comment', 'Rollie' ),
			)
		);
	$wp_customize->add_setting(
		'rollie_tags_alt_text',
		array(
			'default'           => false,
			'sanitize_callback' => 'rollie_sanitize_checkbox',
		)
	);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_tags_alt_text',
					array(
						'label'   => esc_html__( 'Display text instead tag (label) icon  ', 'Rollie' ),
						'description'=>' Alternate text from defined string in language plugin settings',
						'section' => 'rollie_tags',

					)
				)
			);

		$wp_customize->add_setting(
			'rollie_tag_char',
			array(
				'sanitize_callback' => 'wp_filter_nohtml_kses', // removes all HTML from content

			)
		);

		$wp_customize->add_control(
			'rollie_tag_char',
			array(
				'label'       => esc_html__( ' Type character which will be displaying  before every tag name ', 'Rollie' ),
				'section'     => 'rollie_tags',
				'type'        => 'text',
				'placeholder' => __( '#', 'Rollie' ),
			)
		);

	$wp_customize->add_section(
		'rollie_tables_section',
		array(
			'title'    => esc_html__( 'Page Sections, Tables, Comments', 'Rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);

			$wp_customize->add_setting(
			'rollie_tables_border_w',
			array(
				'default'           => 2,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_tables_border_w',
			array(
				'label'       => esc_html__( 'Border width (px) ' ),
				'section'     => 'rollie_tables_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);
		

			$wp_customize->add_setting(
			'rollie_tables_border_rad',
			array(
				'default'           => 2,
				'transport' =>'postMessage',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_tables_border_rad',
			array(
				'label'       => esc_html__( 'Border radius (px) ' ),
				'section'     => 'rollie_tables_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);
		
	

				
	$wp_customize->add_section(
		'rollie_buttons_section',
		array(
			'title'    => esc_html__( 'Buttons', 'Rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);

				$wp_customize->add_setting(
					'rollie_button_rounded',
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_button_rounded',
					array(
						'label'   => esc_html__( 'Rounded corners', 'Rollie' ),
						'section' => 'rollie_buttons_section',

					)
				)
			);

											

			$wp_customize->add_setting(
				'rollie_button_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_button_shadow',
			array(
				'label'             => __( 'Button border color ', 'Rollie' ),
				'section'           => 'rollie_buttons_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

					




			$wp_customize->add_setting(
				'rollie_button_shadow_on',
				array(
					'default'           => true,
					'sanitize_callback' => 'rollie_sanitize_checkbox',
				)
			);

			$wp_customize->add_control(
				new Skyrocket_Toggle_Switch_Custom_control(
					$wp_customize,
					'rollie_button_shadow_on',
					array(
						'label'   => esc_html__( 'Enable shadow button border style instead solid', 'Rollie' ),
						'section' => 'rollie_buttons_section',

					)
				)
			);

	$wp_customize->add_section(
		'rollie_icons_section',
		array(
			'title'    => esc_html__( 'Icons', 'Rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);

								$wp_customize->add_setting(
									'rollie_icon_color_first',
									array(
										'default'   => '#212121',
										'transport' => 'refresh',
									)
								);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first',
			array(
				'label'             => __( 'Icon first color', 'Rollie' ),
				'section'           => 'rollie_icons_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

			$wp_customize->add_setting(
				'rollie_icon_color_first_shadow',
				array(
					'default'   => '#a37e2c',
					'transport' => 'refresh',
				)
			);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first_shadow',
			array(
				'label'             => __( 'Icon first shadow color', 'Rollie' ),
				'section'           => 'rollie_icons_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);
								$wp_customize->add_setting(
									'rollie_icon_color_first_h',
									array(
										'default'   => '#ffffff',
										'transport' => 'refresh',
									)
								);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_icon_color_first_h',
			array(
				'label'             => __( 'Icon first color when hover', 'Rollie' ),
				'section'           => 'rollie_icons_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);


	$wp_customize->add_section(
		'rollie_forms_inputs_section',
		array(
			'title'    => esc_html__( 'Forms and inputs ', 'Rollie' ),
			'priority' => 20,
			'panel'    => 'rollie_color_design_panel',
		)
	);
	$wp_customize->add_setting(
		'rollie_form_input_color_backg',
		array(
			'default'     => 'rgba(255,255,255,0.8)',
			'transport'   => 'postMessage',
			'sanitize_callback'=>'rollie_sanitize_rgba',
		)
	);

	// Alpha Color Picker control.
	$wp_customize->add_control(
		new Customize_Alpha_Color_Control(
			$wp_customize,
			'rollie_form_input_color_backg',
			array(
				'label'         => __( 'Form color', 'rollie' ),
				'section'       => 'rollie_forms_inputs_section',
				'show_opacity'  => true, 
			)
		)
	);
	$wp_customize->add_setting(
		'rollie_form_input_text_color',
		array(
			'default'   => '#212529',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_form_input_text_color',
			array(
				'label'             => __( 'Forms text color', 'Rollie' ),
				'section'           => 'rollie_forms_inputs_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);

	$wp_customize->add_setting(
		'rollie_form_input_border_color',
		array(
			'default'   => '#a37e2c',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'rollie_form_input_border_color',
			array(
				'label'             => __( 'Form shadow and border color', 'Rollie' ),
				'section'           => 'rollie_forms_inputs_section',
				'sanitize_callback' => 'rollie_sanitize_hex_color',
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_form_input_b_width',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_form_input_b_width',
			array(
				'label'       => esc_html__( 'Forms and Inputs border width (px)' ),
				'section'     => 'rollie_forms_inputs_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);










		$wp_customize->add_setting(
			'rollie_form_input_radius',
			array(
				'default'           => 2,
				'transport'         => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_form_input_radius',
			array(
				'label'       => esc_html__( 'Forms and Inputs border radius ' ),
				'section'     => 'rollie_forms_inputs_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 10,
					'step' => 1,
				),
			)
		)
	);

			
	if (class_exists('WooCommerce')){
	require get_template_directory() . '/include/rollie_customizer_woo.php';
		}
}



