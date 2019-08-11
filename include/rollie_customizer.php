<?php
/*

@param
$panel name of parent panel to witch will be applied to section and control
  $section -> name of new post page section
  $setting->prefix of all setings in this control section
  $title -> frontend title of this new section
*/


function rollie_meta_control($wp_customize,$rollie_sufix,$rollie_section_prefix){
				$wp_customize->add_setting(	'rollie_meta_label'.$rollie_sufix);
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_meta_label'.$rollie_sufix,
			array(
				'label'   =>__( 'Metainfos', 'rollie' ),
				'section'       => $rollie_section_prefix.$rollie_sufix,
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 3,
				'rollie_open_close_auto'=>true,
							)
			)
		)
	);

		$wp_customize->add_setting(
			'rollie_display_date'.$rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_date'.$rollie_sufix,
				array(
					'label'   =>__( 'Display date', 'rollie' ),
					'section' => $rollie_section_prefix.$rollie_sufix,

				)
			)
		);
		$wp_customize->add_setting(
			'rollie_display_author'.$rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_display_author'.$rollie_sufix,
				array(
					'label'   =>__( 'Display author', 'rollie' ),
					'section' => $rollie_section_prefix.$rollie_sufix,

				)
			)
		);
	$wp_customize->add_setting(
					'rollie_display_cat'.$rollie_sufix,
					array(
						'default'           => true,
						'sanitize_callback' => 'rollie_sanitize_checkbox',
					)
				);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_display_cat'.$rollie_sufix,
			array(
				'label'   =>__( 'Display categories', 'rollie' ),
				'section' => $rollie_section_prefix.$rollie_sufix,

			)
		)
	);
}

function rollie_header_control($wp_customize,$rollie_sufix,$rollie_section_prefix)
{
	$wp_customize->add_setting(	'rollie_header'.$rollie_sufix);
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_header'.$rollie_sufix,
			array(
				'label'   =>__( 'Header Image', 'rollie' ),
				'section'       => $rollie_section_prefix.$rollie_sufix,
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 6,
			'rollie_open_close_auto'=>true,
							)
			)
		)
	);
		$wp_customize->add_setting(
			'rollie_alt_thumbnail'.$rollie_sufix,
				array(
				'sanitize_callback' => 'rollie_sanitize_file',
				'transport'         => 'refresh',
				'default'           => '',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'rollie_alt_thumbnail'.$rollie_sufix,
				array(
					'label'   => __( 'Alternate Post Thumbnail', 'Rollie' ),
					'section' => $rollie_section_prefix.$rollie_sufix,
			

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_header_style'.$rollie_sufix, 
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_header_style'.$rollie_sufix, 
			array(
				'label'   => __( 'Header Style', 'rollie' ),
				'section' => $rollie_section_prefix.$rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					1 =>__( 'Classic', 'rollie' ),
					2 =>__('Classic Transparent','rollie')	,
					3 =>__( 'Modern', 'rollie' ),
					4 =>__( 'Modern Transparent', 'rollie' ),
					5 =>__( 'Clean', 'rollie' ),
								
				),
				
			)
		);
		



		$wp_customize->add_setting(
			'rollie_header_height'.$rollie_sufix,
			array(
				'default'           => 65,
				'transport' =>'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_header_height'.$rollie_sufix,
			array(
				'label'       =>__( 'Header Image size (vh)' ,'rollie'),
				
				'section'     => $rollie_section_prefix.$rollie_sufix,
				'input_attrs' => array(
					'min'  => 20,
					'max'  => 120,
					'step' => 1,
				),							
			))	
	);




		$wp_customize->add_setting(
			'rollie_header_ex_style'.$rollie_sufix, 
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			'rollie_header_ex_style'.$rollie_sufix, 
			array(
				'label'   => __( 'Excerpt Display Style', 'rollie' ),
				'section' => $rollie_section_prefix.$rollie_sufix,
				'type'    => 'select',

				'choices' => array(
					1 =>__( 'Hide Excerpt', 'rollie' ),
					2 =>__( 'Below Titles', 'rollie' ),
					3 =>__( 'Next to Titles', 'rollie' ),				
					4 =>__( 'Responsive', 'rollie' ),				
				),
				
			)
		);


		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_header_full_width'.$rollie_sufix,
				array(
					'label'       =>__( 'Full Width Header', 'rollie' ),
					'section'     => $rollie_section_prefix.$rollie_sufix,
				)
			)
		);

			$wp_customize->add_setting(
			'rollie_header_h_align'.$rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_radio',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_header_h_align'.$rollie_sufix,
				array(
					'label'   => esc_html__( 'Title Container Horizontal Align', 'Rollie' ),
					'section' => $rollie_section_prefix.$rollie_sufix,
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
			'rollie_header_v_align'.$rollie_sufix,
			array(
				'sanitize_callback' => 'rollie_sanitize_radio',
				'default'           => 2,

			)
		);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_header_v_align'.$rollie_sufix,
				array(
					'label'   => esc_html__( 'Title Container Vertical Align', 'Rollie' ),
					'section' => $rollie_section_prefix.$rollie_sufix,
					'type'    => 'radio',
					'choices' => array(
						1 => esc_html__( 'fa-align-left Top ', 'rollie' ),
						2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
						3 => esc_html__( 'fa-align-right three Bottom  ', 'rollie' ),
					),
				)
			)
		);
}


function rollie_add_page_control ($wp_customize,$rollie_panel_name,$rollie_title,$rollie_sufix){
	if (!empty($rollie_sufix)){
$rollie_sufix='_'.$rollie_sufix;
	}

	$wp_customize->add_section(
		'rollie_page'.$rollie_sufix,
		array(
			'title'    => esc_html($rollie_title),
			'panel'    => 'rollie_grid_meta_panel',
			'priority' => 20,
		)
	);
	rollie_header_control($wp_customize,$rollie_sufix,'rollie_page');
	rollie_meta_control($wp_customize,$rollie_sufix,'rollie_page');
}


function rollie_add_post_page_control ($wp_customize,$rollie_panel_name,$rollie_title,$rollie_sufix) {

	if (!empty($rollie_sufix)){
$rollie_sufix='_'.$rollie_sufix;
	}
	$wp_customize->add_section(
		'rollie_post_page'.$rollie_sufix,
		array(
			'title'    => esc_html($rollie_title),
			'panel'    => 'rollie_grid_meta_panel',
			'priority' => 20,
		)
	);
		
	rollie_header_control($wp_customize,$rollie_sufix,'rollie_post_page');

			$wp_customize->add_setting(	'rollie_grid_label'.$rollie_sufix);
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_grid_label'.$rollie_sufix,
			array(
				'label'   =>__( 'Post Grid', 'rollie' ),
				'section'       => 'rollie_post_page'.$rollie_sufix,
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 9,
			
							)
			)
		)
	);

			$wp_customize->add_setting(
						'rollie_grid_type'.$rollie_sufix,
						array(
							'default'           => 1,
							'sanitize_callback' => 'rollie_sanitize_radio',
							'transport' =>'refresh'
						)
					);

			$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
					'rollie_grid_type'.$rollie_sufix,
					array(					
						'section' => 'rollie_post_page'.$rollie_sufix,
						'choices' => array(
							1 =>__( 'Rollie Custom Grid', 'rollie' ),
							2 =>__( 'Masonry', 'rollie' ),
					),
					)
				)
			);
						$wp_customize->add_setting(
			'rollie_post_page_masonry_size'.$rollie_sufix,
			array(
				'default'           => 33,
				'transport' =>'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_page_masonry_size'.$rollie_sufix,
			array(
				'label'       =>__( 'Masonry single post width (%)' ,'rollie'),
				'section'     => 'rollie_post_page'.$rollie_sufix,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-2'
				),			
			)
			)	
	);
							$wp_customize->add_setting(
			'rollie_post_page_masonry_size_m'.$rollie_sufix,
			array(
				'default'           => 33,
				'transport' =>'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_page_masonry_size_m'.$rollie_sufix,
			array(
				'label'       => __( 'Masonry single post width for smaller devices (%)','rollie' ),
				'section'     => 'rollie_post_page'.$rollie_sufix,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-2'
				),
									
			)
			)
	);			
				$wp_customize->add_setting(
			'rollie_post_page_masonry_ma'.$rollie_sufix,
			array(
				'default'           => 3,
				'transport' =>'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

	$wp_customize->add_control(
		new Skyrocket_Slider_Custom_Control(
			$wp_customize,
			'rollie_post_page_masonry_ma'.$rollie_sufix,
			array(
				'label'       => __( 'Masonry gutter between posts (px)' ,'rollie'),
				'section'     => 'rollie_post_page'.$rollie_sufix,
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-2'
				),
									
			)
			)
	);			



		$wp_customize->add_setting(
			'rollie_post_page_grid_for_paged'.$rollie_sufix,
			array(
				'default' => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_page_grid_for_paged'.$rollie_sufix,
				array(
					'label'       =>__( 'Set same style of display for next pages of posts', 'rollie' ),
					'section'     => 'rollie_post_page'.$rollie_sufix,
					'description' => 'If is off the next page is styled by "display for rest of the posts style" value ',
						'input_attrs'=>array(
								'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-1'
						
							)

				)
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_one_on_row'.$rollie_sufix,
			array(
				'sanitize_callback' => 'absint',
				'default'           => 1,
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'rollie_post_page_one_on_row'.$rollie_sufix,
			array(
				'label'   =>__( 'Number of post displayed in full size column ', 'Rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
				'type'    => 'number',
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-1'
		
			)
			)
		);
			$wp_customize->add_setting(
				'rollie_post_page_two_on_row'.$rollie_sufix,
				array(
					'sanitize_callback' => 'absint',
					'default'           => 2,
					'transport'         => 'refresh',
				)
			);

		$wp_customize->add_control(
			'rollie_post_page_two_on_row'.$rollie_sufix,
			array(
				'label'   =>__( 'Number of posts displayed in two columns ', 'Rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
				'type'    => 'number',
						'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-1'
		
			)
			)
		);
	$wp_customize->add_setting(
		'rollie_post_page_default_style'.$rollie_sufix,
		array(
			'sanitize_callback' => 'rollie_sanitize_radio',
			'default'           => 3,

		)
	);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_post_page_default_style'.$rollie_sufix,
				array(
					'label'   =>__( 'Default Style for rest of the posts', 'Rollie' ),
					'section' => 'rollie_post_page'.$rollie_sufix,
					'type'    => 'radio',
					'choices' => array(
						1 =>__( 'fa-bars split on row ', 'rollie' ),
						2 =>__( 'fa-th-large split two on row ', 'rollie' ),
						3 =>__( 'fa-th split three on row ', 'rollie' ),
					),
							'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-1'
			)
				)
			)
		);
		
	$wp_customize->add_setting(
			'rollie_post_margin_auto'.$rollie_sufix,
			array(
				'default'           => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_margin_auto'.$rollie_sufix,
				array(
					'label'   =>__( 'Center all posts', 'rollie' ),
					'section' => 'rollie_post_page'.$rollie_sufix,
					'input_attrs'=>array(
				'rollie_multiple_switch_cc' => 'rollie_grid_type'.$rollie_sufix.'-1'
		
			))
			)
		);


	$wp_customize->add_setting(	'rollie_design_label'.$rollie_sufix);
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_design_label'.$rollie_sufix,
			array(
				'label'   => __( 'Post Design', 'rollie' ),
				'section'       => 'rollie_post_page'.$rollie_sufix,
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 5,
				'rollie_open_close_auto'=>true,
							)
			)
		)
	);

		

		$wp_customize->add_setting(
			'rollie_post_page_row_design_0'.$rollie_sufix, 
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_post_page_row_design_0'.$rollie_sufix, 
			array(
				'label'   => __( 'Design of posts displayed as one in one row', 'rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					1 =>__( 'Classic', 'rollie' ),
					2 =>__( 'Modern', 'rollie' ),
					3 =>__( 'Clean', 'rollie' ),

				),
				
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_row_design_1'.$rollie_sufix, 			
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_post_page_row_design_1'.$rollie_sufix, 			
			array(
				'label'   =>__( 'Design of posts displayed as two in one row', 'Rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					1 =>__( 'Classic', 'rollie' ),
					2 =>__( 'Modern', 'rollie' ),
					3 =>__( 'Clean', 'rollie' ),
				),
			)
		);

		$wp_customize->add_setting(
			'rollie_post_page_row_design_2'.$rollie_sufix, 			
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);

		$wp_customize->add_control(
			'rollie_post_page_row_design_2'.$rollie_sufix, 			
			array(
				'label'   =>__( 'Design of posts displayed as three in one row', 'Rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
				'type'    => 'select',
				'choices' => array(
					1 =>__( 'Classic', 'rollie' ),
					2 =>__( 'Modern ', 'rollie' ),
					3 =>__( 'Clean', 'rollie' ),
				),
			)
		);

						$wp_customize->add_setting(
							'rollie_post_page_raw_enable'.$rollie_sufix,
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_page_raw_enable'.$rollie_sufix,
				array(
					'label'   =>__( 'Enable raw style for all posts', 'rollie' ),
					'section' => 'rollie_post_page'.$rollie_sufix,
					'input_attrs'=>array(
				)
			)
			)
		);
						$wp_customize->add_setting(
							'rollie_aspect_ratio_clean'.$rollie_sufix,
							array(
								'default'           => false,
								'sanitize_callback' => 'rollie_sanitize_checkbox',
							)
						);

	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_aspect_ratio_clean'.$rollie_sufix,
			array(
				'label'   =>__( 'Clean display style: Save aspect ratio for thumbnails ', 'rollie' ),
				'section' => 'rollie_post_page'.$rollie_sufix,
			)
		)
	);
rollie_meta_control($wp_customize,$rollie_sufix,'rollie_post_page');




}
/*

@param
  $section -> name of section will be applied to section and control
  $setting->prefix of all setings in this control section
  $title -> frontend title of hidable,toogable gradient/color customizer
  $default-> default value of single color (this function only supoorts defaults for single colors)
*/
function rollie_add_gradient_control ($wp_customize,$section_name,$setting_name,$title,$default) {

	$wp_customize->add_setting(	$setting_name.'_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			$setting_name.'_label',
			array(
				'label'   =>__( $title, 'rollie' ),
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
							1 =>__( ' Simple Color ', 'rollie' ),
						2 =>__( ' Gradient ', 'rollie' ),
				
						
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
				'label'       =>__( 'Color Stop (%) ' ),
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
				'label'       =>__( 'Color Stop (%) ' ),
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
				'label'       =>__( 'Color Stop (%) ' ),
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
				'label'       =>__( 'Gradient Angle','rollie' ),
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
		'rollie_font_panel',
		array(
			'title'    => __( 'Rollie font options' ),
			'priority' => 20,
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
		'rollie_img_panel',
		array(
			'title'    => __( 'Rollie Image Sizes ' ),
			'priority' => 20,
		)
	);

	rollie_add_page_control($wp_customize,'rollie_grid_meta_panel','Single Page','sp');
	rollie_add_page_control($wp_customize,'rollie_grid_meta_panel','Single Post Page','spp');
	rollie_add_post_page_control($wp_customize,'rollie_grid_meta_panel','Main Blog Page','');
	rollie_add_post_page_control($wp_customize,'rollie_grid_meta_panel','Archive pages','ar');
	rollie_add_post_page_control($wp_customize,'rollie_grid_meta_panel','Category Pages','ct');
	rollie_add_post_page_control($wp_customize,'rollie_grid_meta_panel','Search Page','se');
	
	$wp_customize->add_panel(
		'rollie_sidebars',
		array(
			'title'    => __( 'Rollie   ' ),
			'priority' => 20,
		)
	);
	
		
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
			'title'    =>__( 'Footer settings', 'Rollie' ),
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



				$wp_customize->add_section(
					'rollie_menu_top_section',
					array(
						'title'    =>__( 'Menu top settings', 'Rollie' ),
						'priority' => 20,
					)
				);

		$wp_customize->add_control(
			new Rollie_Icon_Customize_Control(
				$wp_customize,
				'rollie_menu_top_item_align',
				array(
					'label'   =>__( 'Menu items align', 'Rollie' ),
					'section' => 'rollie_menu_top_section',
					'type'    => 'radio',
					'choices' => array(
						1 =>__( 'fa-align-left Align left ', 'rollie' ),
						2 =>__( 'fa-align-center Center ', 'rollie' ),
						3 =>__( 'fa-align-right three Align right  ', 'rollie' ),
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
						'label'   => __( 'Enable search form ', 'rollie' ),
						'section' => 'rollie_menu_top_section',

					)
				)
			);


	$wp_customize->add_section(
		'rollie_pagination_section',
		array(
			'title'    =>__( 'Pagination settings', 'rollie' ),
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
				'label'   =>__( 'Enable pagination', 'rollie' ),
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
				'label'   => __( 'Display next and previous post or page title', 'Rollie' ),
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
				'label'   => __( 'Enable pagination on single pages', 'Rollie' ),
				'section' => 'rollie_pagination_section',
			)
		)
	);
		$wp_customize->add_section(
					'rollie_sidebar_section',
					array(
						'title'    =>__( 'Sidebars Global Settings', 'Rollie' ),
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
						'label'   => __( 'Disable sidebars on small screens ', 'Rollie' ),
						'section' => 'rollie_sidebar_section',

					)
				)
			);


	$wp_customize->add_section(
		'rollie_post_pages_l_section',
		array(
			'title'    => __( 'Post Pages', 'Rollie' ),
			'panel'    => 'rollie_layout_panel',
			'priority' => 20,
		)
	);

				$wp_customize->add_section(
		'rollie_single_page_l_section',
		array(
			'title'    => __( 'Single Pages', 'Rollie' ),
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
					'label'       =>__( 'Display sidebars only when there are widgets inside ', 'rollie' ),
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
					'label'   =>__( 'Sidebars Layout', 'rollie' ),
					'description'=>__( 'You can modify sidebar content in "Widgets" panel ', 'rollie' ),
					'type'    => 'radio',
					'section' => 'rollie_post_pages_l_section',
					'choices' => array(
						1 =>__( 'sidebar_left only left sidebar  ', 'rollie' ),
						2 =>__( 'full_size no sidebars', 'rollie' ),
						3 =>__( 'double_sidebars double sidebars', 'rollie' ),
						4 =>__( 'sidebar_right only right sidebar ', 'rollie' ),
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
				'label'       =>__( 'Sidebar size' ),
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
				'label'       =>__( 'Padding in Main Content' ),
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
				'default' => true,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_post_page_grid_for_paged_php',
				array(
					'label'       =>__( 'Invert vertical sidebars to horizontal in small devices', 'rollie' ),
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
					'label'       =>__( 'Display sidebars only when there are widgets inside ', 'rollie' ),
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
					'label'   =>__( 'Sidebars Layout', 'rollie' ),
					'description'=>__( 'You can modify sidebar content in "Widgets" panel ', 'rollie' ),
					'section' => 'rollie_single_page_l_section',
					'type'    => 'radio',
					'choices' => array(
						1 =>__( 'sidebar_left only left sidebar  ', 'rollie' ),
						2 =>__( 'full_size no sidebars', 'rollie' ),
						3 =>__( 'double_sidebars double sidebars', 'rollie' ),
						4 =>__( 'sidebar_right only right sidebar ', 'rollie' ),
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
				'label'       =>__( 'Sidebar size' ),
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
				'label'       =>__( 'Padding in Main Content' ),
				'section'     => 'rollie_single_page_l_section',
				'input_attrs' => array(
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				),
			)
		)
	);
				

	

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
				'rollie_collapse_elements_number'=> 2,
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
				'rollie_collapse_elements_number'=> 2,
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
								'rollie_collapse_elements_number'=> 2,
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
				'label'   => esc_html__( 'Navbar Embellishments', 'Rollie' ),
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
								'rollie_collapse_elements_number'=> 2,
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
$wp_customize->add_section(
		'rollie_font_breakpoints',
		array(
			'title'    => __( 'Advanced Responsiveness Settings', 'Rollie' ),
			'panel'    => 'rollie_font_panel',
			'priority' => 1,
		)
	);



$wp_customize->add_setting(
			'rollie_font_vw_min',
			array(
				'default'   => 400,
				'transport' => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Slider_Custom_Control(
				$wp_customize,
				'rollie_font_vw_min',
				array(
					'label'       => __( 'Select vievport width when font stops downsizing (px)' , 'rollie'),
					'description' => __( 'Breakpoint should be less than','rollie').' max '.__('vievport width otherwise sets default values', 'rollie' ),
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
				'default'   =>  1200,
				'transport' => 'refresh',
				'sanitize_callback' => 'skyrocket_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Skyrocket_Slider_Custom_Control(
				$wp_customize,
				'rollie_font_vw_max',
				array(
					'label'       =>__( 'Select vievport width when font starts downsizing (px)', 'rollie' ),
					'description' =>__( 'Breakpoint should be greater than','rollie').	' min '.__('vievport width otherwise sets default values', 'rollie' ),
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
foreach ($rollie_font_data as $font_data) {
	$font_data->add_customizer_controls();
}


	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_main_theme_color',__('Main Theme Color','rollie'),'#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_darker_main_theme_color',__('Darker/Contrast Theme Color','rollie'),'#e3e6e8'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_second_theme_color',__('Second Theme Color','rollie'),'#212121'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_third_theme_color',__('Third Theme Color','rollie'),'#a37e2c'); 
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_sidebar_theme_color',__('Sidebars Color','rollie'),'#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_b_color',__('Button Color','rollie'),'#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_b_h_color',__('Button Color At Hover','rollie'),'#212121');
	rollie_add_gradient_control ($wp_customize,'rollie_theme_colors_section','rollie_post_classic_title_bg_theme_color',__('Rollie Post Title in Thumbnail','rollie'),'#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_alt_b_color',__('Alternate Button Color','rollie'),'#ffffff'); 
	rollie_add_gradient_control ($wp_customize,'rollie_buttons_section','rollie_button_alt_b_h_color',__('Alternate Button Color At Hover','rollie'),'#212121'); 
	rollie_add_gradient_control ($wp_customize,'rollie_navbar_section','rollie_navbar_color',__('Navbar Color','rollie'),'rgba(255,255,255,0.8)'); 



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
			'rollie_menu_top_logo_positon',
			array(
				'sanitize_callback' => 'rollie_sanitize_select',
				'default'           => 1,

			)
		);
 
		$wp_customize->add_control(
				'rollie_menu_top_logo_positon',
				array(
					'label'   => esc_html__( 'Menu Logo Position', 'Rollie' ),
					'section' => 'rollie_navbar_section',
					'type'    => 'select',
					'choices' => array(
						1 => esc_html__( 'Main Menu Navigation', 'rollie' ),
						2 => esc_html__( 'Small Top Menu Navigation', 'rollie' ),

					),
				)
			);
					$wp_customize->add_setting(
		'rollie_menu_top_logo_title',
		array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',

		)
	);
	
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_menu_top_logo_title',
			array(
				'label'   =>__( 'Display Site Title', 'rollie' ),
				'section' => 'rollie_navbar_section',
					
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
			'rollie_menu_position',
			array(
				'default'           => false,
				'sanitize_callback' => 'rollie_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			new Skyrocket_Toggle_Switch_Custom_control(
				$wp_customize,
				'rollie_menu_position',
				array(
					'label'   =>__( 'Navbar over Image', 'rollie' ),
					'section' => 'rollie_navbar_section',
			)
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
						'label'   => esc_html__( 'Display post format as tag link', 'Rollie' ),
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
	$wp_customize->add_setting(	'rollie_button_border_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_button_tables_label',
			array(
				'label'   =>__( 'Border', 'rollie' ),
				'section' => 'rollie_tables_section',
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 2,
				'rollie_open_close_auto'=>true,
				)
			)
		)
	);

	
				$wp_customize->add_setting(
				'rollie_table_border_w',
				array(
					'default'           => '2,2,2,2',
					'sanitize_callback' => 'rollie_sanitize_css_ruler',
				)
			);

			$wp_customize->add_control(
				new Rollie_Css_Ruler_Control(
					$wp_customize,
					'rollie_table_border_w',
					array(
						'label'   => esc_html__( 'Border width:', 'Rollie' ),
						'section' => 'rollie_tables_section',
						'input_attrs'=>array(
							'type'=>'b-width',
						)
					)
				)
			);	
		
				$wp_customize->add_setting(
				'rollie_table_rounded',
				array(
					'default'           => '2,2,2,2',
					'sanitize_callback' => 'rollie_sanitize_css_ruler',
				)
			);

			$wp_customize->add_control(
				new Rollie_Css_Ruler_Control(
					$wp_customize,
					'rollie_table_rounded',
					array(
						'label'   => esc_html__( 'Border Radius:', 'Rollie' ),
						'section' => 'rollie_tables_section',

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
	



	$wp_customize->add_setting(	'rollie_button_border_label');
		$wp_customize->add_control(
		new Rollie_Customizer_Collapse_Label_Control(
			$wp_customize,
			'rollie_button_border_label',
			array(
				'label'   =>__( 'Border', 'rollie' ),
				'section' => 'rollie_buttons_section',
				'input_attrs'=> array (
				'rollie_collapse_elements_number'=> 2,
				'rollie_open_close_auto'=>true,
				)
			)
		)
	);

		
				$wp_customize->add_setting(
				'rollie_button_border_w',
				array(
					'default'           => '2,2,2,2',
					'sanitize_callback' => 'rollie_sanitize_css_ruler',
				)
			);

			$wp_customize->add_control(
				new Rollie_Css_Ruler_Control(
					$wp_customize,
					'rollie_button_border_w',
					array(
						'label'   => esc_html__( 'Border width:', 'Rollie' ),
						'section' => 'rollie_buttons_section',
						'input_attrs'=>array(
							'type'=>'b-width',
						)
					)
				)
			);	

				$wp_customize->add_setting(
				'rollie_button_rounded',
				array(
					'default'           => '2,2,2,2',
					'sanitize_callback' => 'rollie_sanitize_css_ruler',
				)
			);

			$wp_customize->add_control(
				new Rollie_Css_Ruler_Control(
					$wp_customize,
					'rollie_button_rounded',
					array(
						'label'   => esc_html__( 'Border Radius:', 'Rollie' ),
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

	$wp_customize->add_section(
		'rollie_post_format_gallery',
		array(
			'title'    =>__( 'Gallery Post Format', 'Rollie' ),
			'priority' => 5,
			'panel'    => 'rollie_post_formats_panel',
		)
	);



			$wp_customize->add_setting(
		'rollie_post_format_gallery_static',
		array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'skyrocket_switch_sanitization',

		)
	);
	
	$wp_customize->add_control(
		new Skyrocket_Toggle_Switch_Custom_control(
			$wp_customize,
			'rollie_post_format_gallery_static',
			array(
				'label'   =>__( 'Display gallery without slider', 'rollie' ),
				'section' => 'rollie_post_format_gallery',
					
			)
		)
	);
		global $rollie_img_data;
foreach ($rollie_img_data as $img_data) {
	$img_data->add_customizer_controls();
}


	
	if (class_exists('WooCommerce')){
	require get_template_directory() . '/include/rollie_customizer_woo.php';
		}

}



