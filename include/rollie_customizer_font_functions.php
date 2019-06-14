<?php
	// initialize_font()
	{
	$wp_customize->add_panel(
		'rollie_font_panel',
		array(
			'title'    => __( 'Rollie font options' ),
			'priority' => 20,
		)
	);



		$wp_customize->add_section(
			'rollie_font_navbar_section',
			array(
				'panel'    => 'rollie_font_panel',
				'title'    => esc_html__( 'Navbar items ', 'rollie' ),
				'priority' => 20,
			)
		);
				$wp_customize->add_setting(
					'rollie_font_navbar_i',
					array(
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_class_html',
					)
				);

				$wp_customize->add_control(
					new Skyrocket_Simple_Notice_Custom_control(
						$wp_customize,
						'rollie_font_navbar_i',
						array(
							'label'       => __( 'Font options for Navbar items' ),
							'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_navbar </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
							'section'     => 'rollie_font_navbar_section',
						)
					)
				);


				$wp_customize->add_section(
					'rollie_font_headings_section',
					array(

						'panel'    => 'rollie_font_panel',
						'title'    => esc_html__( 'Main headings of pages and sections ', 'rollie' ),
						'priority' => 20,
					)
				);

				$wp_customize->add_setting(
					'rollie_font_headings_i',
					array(
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_class_html',
					)
				);

				$wp_customize->add_control(
					new Skyrocket_Simple_Notice_Custom_control(
						$wp_customize,
						'rollie_font_headings_i',
						array(
							'label'       => __( 'Font options for Main headings of pages and sections' ),
							'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_headings </strong>and <strong> &lt;h1&gt; &lt;h2&gt; </strong>tags </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
							'section'     => 'rollie_font_headings_section',
						)
					)
				);




				$wp_customize->add_section(
					'rollie_font_subtitles_section',
					array(
						'panel'    => 'rollie_font_panel',
						'title'    => esc_html__( 'Small titles and subtitles  ', 'rollie' ),
						'priority' => 20,
					)
				);
				$wp_customize->add_setting(
					'rollie_font_subtitles_i',
					array(
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_class_html',
					)
				);

				$wp_customize->add_control(
					new Skyrocket_Simple_Notice_Custom_control(
						$wp_customize,
						'rollie_font_subtitles_i',
						array(
							'label'       => __( 'Font options for subtitles and blog page posts titles' ),
							'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_subtitles </strong>and <strong> &lt;h3&gt; &lt;h4&gt; </strong>tags </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
							'section'     => 'rollie_font_subtitles_section',
						)
					)
				);





				$wp_customize->add_section(
					'rollie_font_excerpt_section',
					array(
						'panel'    => 'rollie_font_panel',
						'title'    => esc_html__( ' Page and post excerpts', 'rollie' ),
						'priority' => 20,
					)
				);
				$wp_customize->add_setting(
					'rollie_font_excerpt_i',
					array(
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_class_html',
					)
				);

				$wp_customize->add_control(
					new Skyrocket_Simple_Notice_Custom_control(
						$wp_customize,
						'rollie_font_excerpt_i',
						array(
							'label'       => __( 'Font options for posts excerpts in blog page' ),
							'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_excerpt </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
							'section'     => 'rollie_font_excerpt_section',
						)
					)
				);

				$wp_customize->add_section(
					'rollie_font_excerpt_s_section',
					array(
						'panel'    => 'rollie_font_panel',
						'title'    => esc_html__( 'Single excerpt descripton', 'rollie' ),
						'priority' => 20,
					)
				);
				$wp_customize->add_setting(
					'rollie_font_excerpt_s_i',
					array(
						'default'           => '',
						'transport'         => 'refresh',
						'sanitize_callback' => 'rollie_sanitize_class_html',
					)
				);

				$wp_customize->add_control(
					new Skyrocket_Simple_Notice_Custom_control(
						$wp_customize,
						'rollie_font_excerpt_s_i',
						array(
							'label'       => __( 'Font options for current excerpt or short description near page title' ),
							'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_excerpt_s </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
							'section'     => 'rollie_font_excerpt_s_section',
						)
					)
				);

						$wp_customize->add_section(
							'rollie_font_pp_content_section',
							array(
								'panel'    => 'rollie_font_panel',
								'title'    => esc_html__( ' Main content ( Main theme font)', 'rollie' ),
								'priority' => 20,
							)
						);
						$wp_customize->add_setting(
							'rollie_font_pp_content_i',
							array(
								'default'           => '',
								'transport'         => 'refresh',
								'sanitize_callback' => 'rollie_sanitize_class_html',
							)
						);

						$wp_customize->add_control(
							new Skyrocket_Simple_Notice_Custom_control(
								$wp_customize,
								'rollie_font_pp_content_i',
								array(
									'label'       => __( 'Font options for page and post content. This is also default text class for undefined elements and paragraphs' ),
									'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b><strong> rollie_font_first </strong> <strong>rollie_f_pp_content </strong> and <strong> &lt;p&gt; </strong>tags</b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
									'section'     => 'rollie_font_pp_content_section',
								)
							)
						);


						$wp_customize->add_section(
							'rollie_font_metainfo_section',
							array(
								'panel'    => 'rollie_font_panel',
								'title'    => esc_html__( ' Posts metainfos', 'rollie' ),
								'priority' => 20,
							)
						);
						$wp_customize->add_setting(
							'rollie_font_metainfo_i',
							array(
								'default'           => '',
								'transport'         => 'refresh',
								'sanitize_callback' => 'rollie_sanitize_class_html',
							)
						);

						$wp_customize->add_control(
							new Skyrocket_Simple_Notice_Custom_control(
								$wp_customize,
								'rollie_font_metainfo_i',
								array(
									'label'       => __( 'Font options for  posts metainfo like authors, date and tags' ),
									'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_meta </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
									'section'     => 'rollie_font_metainfo_section',
								)
							)
						);

					
								$wp_customize->add_section(
									'rollie_font_b_f_section',
									array(

										'panel'    => 'rollie_font_panel',
										'title'    => esc_html__( 'Buttons and forms', 'rollie' ),
										'priority' => 20,
									)
								);
								$wp_customize->add_setting(
									'rollie_font_b_f_i',
									array(
										'default'   => '',
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_class_html',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Simple_Notice_Custom_control(
										$wp_customize,
										'rollie_font_b_f_i',
										array(
											'label'       => __( 'Font options for buttons, paginations and forms ' ),
											'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_b_f </strong>and <strong> &lt;form&gt; </strong>tags </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
											'section'     => 'rollie_font_b_f_section',
										)
									)
								);

								$wp_customize->add_section(
									'rollie_font_comment_section',
									array(
										'panel'    => 'rollie_font_panel',
										'title'    => esc_html__( ' Comments content ', 'rollie' ),
										'priority' => 20,
									)
								);
								$wp_customize->add_setting(
									'rollie_font_comment_i',
									array(
										'default'   => '',
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_class_html',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Simple_Notice_Custom_control(
										$wp_customize,
										'rollie_font_comment_i',
										array(
											'label'       => __( 'Font options for comments text' ),
											'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_comment </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
											'section'     => 'rollie_font_comment_section',
										)
									)
								);


								$wp_customize->add_section(
									'rollie_font_widget_section',
									array(
										'panel'    => 'rollie_font_panel',
										'title'    => esc_html__( 'Widget content ', 'rollie' ),
										'priority' => 20,
									)
								);


								$wp_customize->add_setting(
									'rollie_font_widget_i',
									array(
										'default'   => '',
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_class_html',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Simple_Notice_Custom_control(
										$wp_customize,
										'rollie_font_widget_i',
										array(
											'label'       => __( 'Font options for widgets' ),
											'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_widget </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
											'section'     => 'rollie_font_widget_section',
										)
									)
								);





								$wp_customize->add_section(
									'rollie_font_footer_sub_section',
									array(
										'panel'    => 'rollie_font_panel',
										'title'    => esc_html__( ' Footer captions and subitems ', 'rollie' ),
										'priority' => 20,
									)
								);

								$wp_customize->add_setting(
									'rollie_font_footer_sub_i',
									array(
										'default'   => '',
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_class_html',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Simple_Notice_Custom_control(
										$wp_customize,
										'rollie_font_footer_sub_i',
										array(
											'label'       => __( 'Font options for footer subitems' ),
											'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_footer_sub </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
											'section'     => 'rollie_font_footer_sub_section',
										)
									)
								);

								$wp_customize->add_section(
									'rollie_font_footer_section',
									array(
										'panel'    => 'rollie_font_panel',
										'title'    => esc_html__( ' Footer items ', 'rollie' ),
										'priority' => 20,
									)
								);


								$wp_customize->add_setting(
									'rollie_font_footer_i',
									array(
										'default'   => '',
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_class_html',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Simple_Notice_Custom_control(
										$wp_customize,
										'rollie_font_footer_i',
										array(
											'label'       => __( 'Font options for footer items ' ),
											'description' => __( ' <span>This options are saved to css class called :<span class="rollie_info_c"><b> <strong>rollie_f_footer </strong> </b></span></span><br> <br> <strong> <span class="rollie_warn_c ">Important! </span>Using many different Google Fonts and weights in theme may slow down loading of your site! </strong><br><a href="https://fonts.google.com/" target="_blank">More information about Google Fonts</a>' ),
											'section'     => 'rollie_font_footer_section',
										)
									)
								);
								}
								// rollie_font_headings_function()
								{
								$wp_customize->add_setting(
									'rollie_font_headings_U',
									array(
										'default'   => true,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_headings_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_headings_section',
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_headings_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_headings_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_headings_max',
									array(
										'default'   => 46,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_headings_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_headings_min',
									array(
										'default'   => 32,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_headings_h2_max',
									array(
										'default'   => 30,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);


								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_h2_max',
										array(
											'label'       => esc_html__( ' Maximum font size for h2 subtitle (px) ' ),
											'section'     => 'rollie_font_headings_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_headings_h2_min',
									array(
										'default'   => 26,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_h2_min',
										array(
											'label'       => esc_html__( 'Minimum font size for h2 subtitle (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_headings_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_headings_ls',
									array(
										'default'   => 1.1,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_sub_pos',
									array(
										'sanitize_callback' => 'rollie_sanitize_select',
										'default' => 1,

									)
								);

								$wp_customize->add_control(
									'rollie_font_headings_sub_pos',
									array(
										'label'   => esc_html__( 'H2 subtitle Position', 'rollie' ),
										'section' => 'rollie_font_headings_section',
										'type'    => 'select',
										'choices' => array(
											1 => esc_html__( 'Above heading', 'rollie' ),
											2 => esc_html__( 'below heading', 'rollie' ),
										),
									)
								);

								$wp_customize->add_setting(
									'rollie_font_headings_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => 'regular',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_headings_obj',
										array(

											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => 'regular',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_headings_obj',
											),
										)
									)
								);






								$wp_customize->add_setting(
									'rollie_font_headings_alt_enable',
									array(
										'default'   => 0,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_headings_alt_enable',
										array(

											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',

											),

										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_headings_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_headings_section',
										'type'        => 'text',
										'placeholder' => __( 'arial', 'rollie' ),
									)
								);


								$wp_customize->add_setting(
									'rollie_font_headings_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_headings_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_headings_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								}


								// rollie_font_subtitles_function()
								{

								$wp_customize->add_setting(
									'rollie_font_subtitles_U',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_subtitles_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_subtitles_section',
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_subtitles_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);
								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_subtitles_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_subtitles_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_subtitles_max',
									array(
										'default'   => 32,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_subtitles_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_subtitles_min',
									array(
										'default'   => 26,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);

									$wp_customize->add_setting(
									'rollie_font_subtitles_h4_max',
									array(
										'default'   => 30,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);


								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_h4_max',
										array(
											'label'       => esc_html__( ' Maximum font size for h4 subtitle (px) ' ),
											'section'     => 'rollie_font_subtitles_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_subtitles_h4_min',
									array(
										'default'   => 26,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_h4_min',
										array(
											'label'       => esc_html__( 'Minimum font size for h4 subtitle (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_subtitles_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_subtitles_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_subtitles_ls',
									array(
										'default'   => 0.7,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_subtitles_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_subtitles_obj',
									array(
										'default' => json_encode(
											array(

												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',

												'boldweight' => '300',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_obj',
										array(
											// 'default' => '{"font":"Rokkitt","regularweight":"300","italicweight":"italic","boldweight":"700","category":"monotype"}',
											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_subtitles_obj',
											),
										)
									)
								);










								$wp_customize->add_setting(
									'rollie_font_subtitles_alt_enable',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_subtitles_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_subtitles_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_subtitles_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_subtitles_section',
										'type'        => 'text',
										'placeholder' => __( 'arial', 'rollie' ),
									)
								);


								$wp_customize->add_setting(
									'rollie_font_subtitles_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_subtitles_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								}

								// rollie_font_navbar_function()
								{
								$wp_customize->add_setting(
									'rollie_font_navbar_U',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_navbar_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_navbar_section',
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_navbar_max',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_navbar_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_navbar_min',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_navbar_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_navbar_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_navbar_ls',
									array(
										'default'   => 0.6,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											// 'description' =>  esc_html__( '' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_navbar_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_navbar_obj',
									array(
										'default' => json_encode(
											array(

												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '700',
												'category' => 'monotype',
												'disable_bold_italic' => 'true', // NEEDS TO BE SET ALSO WHEN DECODING JSON IN ALL DI
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_obj',
										array(

											'label'       => __( 'Navbar font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_navbar_obj',
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_navbar_alt_enable',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_navbar_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_navbar_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_navbar_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_navbar_section',
										'type'        => 'text',
										'placeholder' => 'Arial',
									)
								);


								$wp_customize->add_setting(
									'rollie_font_navbar_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_navbar_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_navbar_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								}

							
								{

								$wp_customize->add_setting(
									'rollie_font_excerpt_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_excerpt_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_excerpt_section',
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);
								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_excerpt_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_excerpt_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_excerpt_max',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_excerpt_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_excerpt_min',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);




								$wp_customize->add_setting(
									'rollie_font_excerpt_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_excerpt_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_lh',
										array(
											'label'       => esc_html__( ' Line height (em)' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '700',
												'category' => 'monotype',
												'disable_bold_italic' => 'false',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_obj',
										array(

											'label'       => __( ' font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => false,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '700',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_excerpt_obj',
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_alt_enable',
									array(
										'default'   => 0,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_excerpt_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_excerpt_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_excerpt_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_excerpt_section',
										'type'        => 'text',
										'placeholder' => 'Arial',
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_excerpt_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_excerpt_alt_weight_b',
									array(
										'default'   => 600,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_alt_weight_b',
										array(
											'label'       => esc_html__( 'Bold Font Weight for alternative font' ),
											'section'     => 'rollie_font_subtitles_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);
								}
								// rollie_font_pp_content_function()
								{

								$wp_customize->add_setting(
									'rollie_font_pp_content_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 1,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_pp_content_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_pp_content_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_pp_content_max',
									array(
										'default'   => 19,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
									$wp_customize->add_setting( 'rollie_font_pp_content_bolder_links',
								   array(
									  'default' => 1,
									  'transport' => 'refresh',
									  'sanitize_callback' => 'skyrocket_switch_sanitization'
								   )
								);
								$wp_customize->add_control( new Skyrocket_Toggle_Switch_Custom_control( $wp_customize, 'rollie_font_pp_content_bolder_links',
								   array(
									'label' => esc_html__( 'Enable bolder font for links ', 'rollie' ),
									  'section' => 'rollie_font_pp_content_section',
									  'description'=>'Bolder links will be applied to <p> tags inside <main> page section ',
								   )
								) );
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_pp_content_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_pp_content_min',
									array(
										'default'   => 17,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_pp_content_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_pp_content_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_pp_content_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_pp_content_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_pp_content_obj',
									array(
										'default'   => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '700',
												'category' => 'monotype',
												'disable_bold_italic' => 'false',

											)
										),
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_obj',
										array(
											// 'default' => '{"font":"Rokkitt","regularweight":"300","italicweight":"italic","boldweight":"700","category":"monotype"}',
											'label'       => __( ' font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => false,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '700',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_pp_content_obj',
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_pp_content_alt_enable',
									array(
										'default'   => 0,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_pp_content_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);




								$wp_customize->add_setting(
									'rollie_font_pp_content_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_pp_content_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_pp_content_section',
										'type'        => 'text',
										'placeholder' => __( 'arial', 'rollie' ),
									)
								);


								$wp_customize->add_setting(
									'rollie_font_pp_content_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_pp_content_alt_weight_b',
									array(
										'default'   => 600,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_pp_content_alt_weight_b',
										array(
											'label'       => esc_html__( 'Bold Font Weight for alternative font' ),
											'section'     => 'rollie_font_pp_content_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								}

								// rollie_font_excerpt_s_function()
								
													$wp_customize->add_setting(
									'rollie_font_excerpt_s_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_excerpt_s_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_excerpt_s_section',
										)
									)
								);
								{

								$wp_customize->add_setting(
									'rollie_font_excerpt_s_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_excerpt_s_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_excerpt_s_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_excerpt_s_max',
									array(
										'default'   => 14,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_excerpt_s_min',
									array(
										'default'   => 14,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_excerpt_s_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_s_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_excerpt_s_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_excerpt_s_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_s_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '700',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_obj',
										array(

											'label'       => __( 'Select Google Font ' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_excerpt_s_obj',
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_excerpt_s_alt_enable',
									array(
										'default'   => true,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_excerpt_s_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
												'default' => true,
											),

										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_s_alt',
									array(
										'default' => 'Arial',
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									new rollie_Text_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_alt',
										array(
											'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'type'        => 'text',
											'placeholder' => 'Arial',
											'input_attrs' => array(
												'default' => 'Arial',
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_excerpt_s_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_excerpt_s_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_excerpt_s_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								}

								// rollie_font_website_s_function()
								{
								$wp_customize->add_setting(
									'rollie_font_website_s_U',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_website_s_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_website_s_section',
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_website_s_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 1,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_website_s_widget_align',
										array(
											'label'   => esc_html__( 'Widget heading allign', 'rollie' ),
											'section' => 'rollie_font_website_s_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_website_s_widget_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_website_s_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_website_s_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_website_s_max',
									array(
										'default'   => 24,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_website_s_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_website_s_min',
									array(
										'default'   => 21,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_website_s_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_website_s_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_website_s_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_website_s_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_website_s_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '300',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_obj',
										array(
											// 'default' => '{"font":"Rokkitt","regularweight":"300","italicweight":"italic","boldweight":"700","category":"monotype"}',
											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_website_s_obj',
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_website_s_alt_enable',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_website_s_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);




								$wp_customize->add_setting(
									'rollie_font_website_s_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_website_s_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_website_s_section',
										'type'        => 'text',
										'placeholder' => __( 'arial', 'rollie' ),
									)
								);


								$wp_customize->add_setting(
									'rollie_font_website_s_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_website_s_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_website_s_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								 }

								 // rollie_font_b_f_function()
								 {
								$wp_customize->add_setting(
									'rollie_font_b_f_U',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_b_f_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_b_f_section',
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_b_f_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 2,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_b_f_align',
										array(
											'label'   => esc_html__( 'Text allign', 'rollie' ),
											'section' => 'rollie_font_b_f_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_b_f_max',
									array(
										'default'   => 21,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_b_f_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_b_f_min',
									array(
										'default'   => 19,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_b_f_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_b_f_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_b_f_ls',
									array(
										'default'   => 0.1,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_b_f_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_b_f_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '300',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_obj',
										array(
											// 'default' => '{"font":"Rokkitt","regularweight":"300","italicweight":"italic","boldweight":"700","category":"monotype"}',
											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '700',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_b_f_obj',
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_b_f_alt_enable',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_b_f_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_b_f_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_b_f_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_b_f_section',
										'type'        => 'text',
										'placeholder' => __( 'arial', 'rollie' ),
									)
								);


								$wp_customize->add_setting(
									'rollie_font_b_f_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_b_f_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_b_f_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								 }

								 // rollie_font_comment_function()
								 {
								$wp_customize->add_setting(
									'rollie_font_comment_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 1,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_comment_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_comment_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_comment_max',
									array(
										'default'   => 15,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_comment_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_comment_min',
									array(
										'default'   => 15,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_comment_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_comment_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_comment_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_comment_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_comment_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '300',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_comment_obj',
										array(
											// 'default' => '{"font":"Rokkitt","regularweight":"300","italicweight":"italic","boldweight":"700","category":"monotype"}',
											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_comment_obj',
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_comment_alt_enable',
									array(
										'default'   => true,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_comment_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
												'default' => true,
											),

										)
									)
								);







								$wp_customize->add_setting(
									'rollie_font_comment_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',
										'default' => 'helvetica',

									)
								);

								$wp_customize->add_control(
									new rollie_Text_Custom_Control(
										$wp_customize,
										'rollie_font_comment_alt',
										array(
											'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
											'section'     => 'rollie_font_comment_section',
											'type'        => 'text',
											'placeholder' => 'arial',
											'input_attrs' => array(
												'default' => 'helvetica',
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_comment_alt_weight',
									array(
										'default'   => 300,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_comment_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_comment_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);


								 }



								 //	rollie_font_widget_function()
								 {


								$wp_customize->add_setting(
									'rollie_font_widget_align',
									array(
										'sanitize_callback' => 'rollie_sanitize_radio',
										'default' => 1,

									)
								);

								$wp_customize->add_control(
									new rollie_Icon_Customize_Control(
										$wp_customize,
										'rollie_font_widget_align',
										array(
											'label'   => esc_html__( 'Menu items align', 'rollie' ),
											'section' => 'rollie_font_widget_section',
											'type'    => 'radio',
											'choices' => array(
												1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
												2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
												3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
												4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_widget_max',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_widget_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_widget_min',
									array(
										'default'   => 16,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_widget_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_widget_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_widget_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_widget_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_widget_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '700',
												'category' => 'monotype',
												'disable_bold_italic' => 'false',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_widget_obj',
										array(
											'label'       => __( 'headings font family Google ' ),
											'description' => esc_html__( 'Select Google Fonts ' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => false,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '700',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_widget_obj',
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_widget_alt_enable',
									array(
										'default'   => false,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_switch_sanitization',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_widget_alt_enable',
										array(
											'label'       => esc_html__( 'Enable custom non-google font', 'rollie' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'customclass' => 'rollie_alt_toogle',
											),

										)
									)
								);





								$wp_customize->add_setting(
									'rollie_font_widget_alt',
									array(
										'sanitize_callback' => 'wp_filter_nohtml_kses',

									)
								);

								$wp_customize->add_control(
									'rollie_font_widget_alt',
									array(
										'label'       => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
										'section'     => 'rollie_font_widget_section',
										'type'        => 'text',
										'placeholder' => 'arial',

									)
								);


								$wp_customize->add_setting(
									'rollie_font_widget_alt_weight',
									array(
										'default'   => 100,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_alt_weight',
										array(
											'label'       => esc_html__( 'Font Weight for alternative font' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_widget_alt_weight_b',
									array(
										'default'   => 600,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_widget_alt_weight_b',
										array(
											'label'       => esc_html__( 'Bold Font Weight for alternative font' ),
											'section'     => 'rollie_font_widget_section',
											'input_attrs' => array(
												'min'  => 100,
												'max'  => 900,
												'step' => 100,
											),
										)
									)
								);



								 }

								 // rollie_font_metainfo
								 {
								$wp_customize->add_setting(
									'rollie_font_metainfo_U',
									array(
										'default'   => true,
										'transport' => 'refresh',
										'sanitize_callback' => 'wp_filter_nohtml_kses',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Toggle_Switch_Custom_control(
										$wp_customize,
										'rollie_font_metainfo_U',
										array(
											'label'   => __( 'Uppercase content' ),
											'section' => 'rollie_font_metainfo_section',
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_metainfo_max',
									array(
										'default'   => 14,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_max',
										array(
											'label'       => esc_html__( ' Maximum font size (px) ' ),
											'section'     => 'rollie_font_metainfo_section',
											'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);
								$wp_customize->add_setting(
									'rollie_font_metainfo_min',
									array(
										'default'   => 14,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_min',
										array(
											'label'       => esc_html__( 'Minimum font size (px)' ),
											'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 1,
												'max'  => 100,
												'step' => 1,
											),
										)
									)
								);



								$wp_customize->add_setting(
									'rollie_font_metainfo_vw_min',
									array(
										'default'   => 500,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_vw_min',
										array(
											'label'       => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
											'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 1000,
												'step' => 50,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_metainfo_vw_max',
									array(
										'default'   => 1200,
										'transport' => 'refresh',
										'sanitize_callback' => 'skyrocket_sanitize_integer',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_vw_max',
										array(
											'label'       => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
											'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 300,
												'max'  => 1900,
												'step' => 50,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_metainfo_ls',
									array(
										'default'   => 0.0,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_ls',
										array(
											'label'       => esc_html__( ' Letter spacing  (px)' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_metainfo_lh',
									array(
										'default'   => 1.4,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_lh',
										array(
											'label'       => esc_html__( ' Line height  (em)' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 0.5,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);


								$wp_customize->add_setting(
									'rollie_font_metainfo_a_ls',
									array(
										'default'   => 0.8,
										'transport' => 'refresh',
										'sanitize_callback' => 'rollie_sanitize_float',
									)
								);
								$wp_customize->add_control(
									new Skyrocket_Slider_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_a_ls',
										array(
											'label'       => esc_html__( ' Letter spacing for author and date  (px)' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'min'  => 0,
												'max'  => 5,
												'step' => 0.1,
											),
										)
									)
								);

								$wp_customize->add_setting(
									'rollie_font_metainfo_obj',
									array(
										'default' => json_encode(
											array(
												'font'     => 'Rokkitt',
												'regularweight' => '300',
												'italicweight' => 'italic',
												'subsets'  => 'latin',
												'boldweight' => '300',
												'category' => 'monotype',
												'disable_bold_italic' => 'true',
											)
										),
										'sanitize_callback' => 'skyrocket_google_font_sanitization',
									)
								);

								$wp_customize->add_control(
									new Skyrocket_Google_Font_Select_Custom_Control(
										$wp_customize,
										'rollie_font_metainfo_obj',
										array(
											'label'       => __( 'Select Google Font' ),
											'section'     => 'rollie_font_metainfo_section',
											'input_attrs' => array(
												'font_count' => 'all',
												'orderby'  => 'alpha',
												'disable_bold_italic' => true,
												'rfont'    => 'Rokkitt',
												'rregularweight' => '300',
												'rboldweight' => '300',
												'ritalicweight' => 'italic',
												'rsubsets' => 'latin',
												'rcategory' => 'monotype',
												'object_name' => 'rollie_font_metainfo_obj',
											),
										)
									)
								);


												$wp_customize->add_setting(
													'rollie_font_metainfo_alt_enable',
													array(
														'default'           => false,
														'transport'         => 'refresh',
														'sanitize_callback' => 'skyrocket_switch_sanitization',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Toggle_Switch_Custom_control(
														$wp_customize,
														'rollie_font_metainfo_alt_enable',
														array(
															'label'   => esc_html__( 'Enable custom non-google font', 'rollie' ),
															'section' => 'rollie_font_metainfo_section',
															'input_attrs' => array(
																'customclass'  => 'rollie_alt_toogle',
															),

														)
													)
												);




												$wp_customize->add_setting(
													'rollie_font_metainfo_alt',
													array(
														'sanitize_callback' => 'wp_filter_nohtml_kses',

													)
												);

												$wp_customize->add_control(
													'rollie_font_metainfo_alt',
													array(
														'label' => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
														'section' => 'rollie_font_metainfo_section',
														'type' => 'text',
														'placeholder' => __( 'arial', 'rollie' ),
													)
												);


												$wp_customize->add_setting(
													'rollie_font_metainfo_alt_weight',
													array(
														'default' => 100,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_metainfo_alt_weight',
														array(
															'label'   => esc_html__( 'Font Weight for alternative font' ),
															'section' => 'rollie_font_metainfo_section',
															'input_attrs' => array(
																'min'  => 100,
																'max'  => 900,
																'step' => 100,
															),
														)
													)
												);


												 }

												 //	rollie_font_footer_sub_function()
												 {
												$wp_customize->add_setting(
													'rollie_font_footer_sub_U',
													array(
														'default' => false,
														'transport' => 'refresh',
														'sanitize_callback' => 'wp_filter_nohtml_kses',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Toggle_Switch_Custom_control(
														$wp_customize,
														'rollie_font_footer_sub_U',
														array(
															'label'   => __( 'Uppercase content' ),
															'section' => 'rollie_font_footer_sub_section',
														)
													)
												);

												$wp_customize->add_setting(
													'rollie_font_footer_sub_align',
													array(
														'sanitize_callback' => 'rollie_sanitize_radio',
														'default' => 2,

													)
												);

												$wp_customize->add_control(
													new rollie_Icon_Customize_Control(
														$wp_customize,
														'rollie_font_footer_sub_align',
														array(
															'label' => esc_html__( 'Menu items align', 'rollie' ),
															'section' => 'rollie_font_footer_sub_section',
															'type' => 'radio',
															'choices' => array(
																1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
																2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
																3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
																4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

															),
														)
													)
												);
												$wp_customize->add_setting(
													'rollie_font_footer_sub_max',
													array(
														'default' => 13,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_max',
														array(
															'label'   => esc_html__( ' Maximum font size (px) ' ),
															'section' => 'rollie_font_footer_sub_section',
															'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
															'input_attrs' => array(
																'min'  => 1,
																'max'  => 100,
																'step' => 1,
															),
														)
													)
												);
												$wp_customize->add_setting(
													'rollie_font_footer_sub_min',
													array(
														'default' => 13,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_min',
														array(
															'label'   => esc_html__( 'Minimum font size (px)' ),
															'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 1,
																'max'  => 100,
																'step' => 1,
															),
														)
													)
												);



												$wp_customize->add_setting(
													'rollie_font_footer_sub_vw_min',
													array(
														'default' => 500,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_vw_min',
														array(
															'label'   => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
															'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 0,
																'max'  => 1000,
																'step' => 50,
															),
														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_sub_vw_max',
													array(
														'default' => 1200,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_vw_max',
														array(
															'label'   => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
															'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 300,
																'max'  => 1900,
																'step' => 50,
															),
														)
													)
												);

												$wp_customize->add_setting(
													'rollie_font_footer_sub_ls',
													array(
														'default' => 0.8,
														'transport' => 'refresh',
														'sanitize_callback' => 'rollie_sanitize_float',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_ls',
														array(
															'label'   => esc_html__( ' Letter spacing  (px)' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 0,
																'max'  => 5,
																'step' => 0.1,
															),
														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_sub_lh',
													array(
														'default' => 1.4,
														'transport' => 'refresh',
														'sanitize_callback' => 'rollie_sanitize_float',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_lh',
														array(
															'label'   => esc_html__( ' Line height  (em)' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 0.5,
																'max'  => 5,
																'step' => 0.1,
															),
														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_sub_obj',
													array(
														'default' => json_encode(
															array(
																'font' => 'Rokkitt',
																'regularweight' => '300',
																'italicweight' => 'italic',
																'subsets' => 'latin',
																'boldweight' => '700',
																'category' => 'monotype',
																'disable_bold_italic' => 'false',

															)
														),
														'sanitize_callback' => 'skyrocket_google_font_sanitization',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Google_Font_Select_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_obj',
														array(

															'label'   => __( 'headings font family Google ' ),
															'description' => esc_html__( 'Select Google Fonts ' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'font_count' => 'all',
																'orderby' => 'alpha',
																'disable_bold_italic' => false,
																'rfont'   => 'Rokkitt',
																'rregularweight' => '300',
																'rboldweight' => '700',
																'ritalicweight' => 'italic',
																'rsubsets' => 'latin',
																'rcategory' => 'monotype',
																'object_name' => 'rollie_font_footer_sub_obj',

															),
														)
													)
												);



												$wp_customize->add_setting(
													'rollie_font_footer_sub_alt_enable',
													array(
														'default' => true,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_switch_sanitization',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Toggle_Switch_Custom_control(
														$wp_customize,
														'rollie_font_footer_sub_alt_enable',
														array(
															'label'   => esc_html__( 'Enable custom non-google font', 'rollie' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'customclass' => 'rollie_alt_toogle',
																'default' => true,
															),

														)
													)
												);






												$wp_customize->add_setting(
													'rollie_font_footer_sub_alt',
													array(
														'sanitize_callback' => 'wp_filter_nohtml_kses',
														'default' => 'helvetica',
													)
												);

												$wp_customize->add_control(
													new rollie_Text_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_alt',
														array(
															'label' => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
															'section' => 'rollie_font_footer_sub_section',
															'type' => 'text',
															'input_attrs' => array(
																'default' => 'helvetica',
															),

														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_sub_alt_weight',
													array(
														'default' => 300,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_alt_weight',
														array(
															'label'   => esc_html__( 'Font Weight for alternative font' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 100,
																'max'  => 900,
																'step' => 100,
															),
														)
													)
												);

												$wp_customize->add_setting(
													'rollie_font_footer_sub_alt_weight_b',
													array(
														'default' => 600,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_sub_alt_weight_b',
														array(
															'label'   => esc_html__( 'Bold Font Weight for alternative font' ),
															'section' => 'rollie_font_footer_sub_section',
															'input_attrs' => array(
																'min'  => 100,
																'max'  => 900,
																'step' => 100,
															),
														)
													)
												);



												 }


												 //	rollie_font_footer_function()
												 {


												$wp_customize->add_setting(
													'rollie_font_footer_U',
													array(
														'default' => false,
														'transport' => 'refresh',
														'sanitize_callback' => 'wp_filter_nohtml_kses',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Toggle_Switch_Custom_control(
														$wp_customize,
														'rollie_font_footer_U',
														array(
															'label'   => __( 'Uppercase content' ),
															'section' => 'rollie_font_footer_section',
														)
													)
												);
												$wp_customize->add_setting(
													'rollie_font_footer_align',
													array(
														'sanitize_callback' => 'rollie_sanitize_radio',
														'default' => 2,

													)
												);

												$wp_customize->add_control(
													new rollie_Icon_Customize_Control(
														$wp_customize,
														'rollie_font_footer_align',
														array(
															'label' => esc_html__( 'Menu items align', 'rollie' ),
															'section' => 'rollie_font_footer_section',
															'type' => 'radio',
															'choices' => array(
																1 => esc_html__( 'fa-align-left Align left ', 'rollie' ),
																2 => esc_html__( 'fa-align-center Center ', 'rollie' ),
																3 => esc_html__( 'fa-align-justify three Justify ', 'rollie' ),
																4 => esc_html__( 'fa-align-right three Align right  ', 'rollie' ),

															),
														)
													)
												);
												$wp_customize->add_setting(
													'rollie_font_footer_max',
													array(
														'default' => 16,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_max',
														array(
															'label'   => esc_html__( ' Maximum font size (px) ' ),
															'section' => 'rollie_font_footer_section',
															'description' => esc_html__( 'Should be bigger than min font size otherwise sets default' ),
															'input_attrs' => array(
																'min'  => 1,
																'max'  => 100,
																'step' => 1,
															),
														)
													)
												);
												$wp_customize->add_setting(
													'rollie_font_footer_min',
													array(
														'default' => 16,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_min',
														array(
															'label'   => esc_html__( 'Minimum font size (px)' ),
															'description' => esc_html__( 'Should be less than max font size otherwise sets default' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 1,
																'max'  => 100,
																'step' => 1,
															),
														)
													)
												);



												$wp_customize->add_setting(
													'rollie_font_footer_vw_min',
													array(
														'default' => 500,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_vw_min',
														array(
															'label'   => esc_html__( 'Select vievport width when font stops downsizing (px)' ),
															'description' => esc_html__( 'Should be less than max vievport width otherwise sets default' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 0,
																'max'  => 1000,
																'step' => 50,
															),
														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_vw_max',
													array(
														'default' => 1200,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_vw_max',
														array(
															'label'   => esc_html__( 'Select vievport width when font starts downsizing (px) ' ),
															'description' => esc_html__( 'Should be bigger than min vievport width otherwise sets default' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 300,
																'max'  => 1900,
																'step' => 50,
															),
														)
													)
												);

												$wp_customize->add_setting(
													'rollie_font_footer_ls',
													array(
														'default' => 1,
														'transport' => 'refresh',
														'sanitize_callback' => 'rollie_sanitize_float',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_ls',
														array(
															'label'   => esc_html__( ' Letter spacing  (px)' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 0,
																'max'  => 5,
																'step' => 0.1,
															),
														)
													)
												);

												$wp_customize->add_setting(
													'rollie_font_footer_lh',
													array(
														'default' => 1.4,
														'transport' => 'refresh',
														'sanitize_callback' => 'rollie_sanitize_float',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_lh',
														array(
															'label'   => esc_html__( ' Line height  (em)' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 0.5,
																'max'  => 5,
																'step' => 0.1,
															),
														)
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_obj',
													array(
														'default' => json_encode(
															array(
																'font' => 'Rokkitt',
																'regularweight' => '300',
																'italicweight' => 'italic',
																'subsets' => 'latin',
																'boldweight' => '700',
																'category' => 'monotype',
																'disable_bold_italic' => 'true',
															)
														),
														'sanitize_callback' => 'skyrocket_google_font_sanitization',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Google_Font_Select_Custom_Control(
														$wp_customize,
														'rollie_font_footer_obj',
														array(
															'label'   => __( 'headings font family Google ' ),
															'description' => esc_html__( 'Select Google Fonts ' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'font_count' => 'all',
																'orderby' => 'alpha',
																'disable_bold_italic' => true,
																'rfont'   => 'Rokkitt',
																'rregularweight' => '300',
																'rboldweight' => '700',
																'ritalicweight' => 'italic',
																'rsubsets' => 'latin',
																'rcategory' => 'monotype',
																'object_name' => 'rollie_font_footer_obj',

															),
														)
													)
												);




												$wp_customize->add_setting(
													'rollie_font_footer_alt_enable',
													array(
														'default' => false,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_switch_sanitization',
													)
												);
												$wp_customize->add_control(
													new Skyrocket_Toggle_Switch_Custom_control(
														$wp_customize,
														'rollie_font_footer_alt_enable',
														array(
															'label'   => esc_html__( 'Enable custom non-google font', 'rollie' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'customclass'  => 'rollie_alt_toogle',
															),

														)
													)
												);






												$wp_customize->add_setting(
													'rollie_font_footer_alt',
													array(
														'sanitize_callback' => 'wp_filter_nohtml_kses',

													)
												);

												$wp_customize->add_control(
													'rollie_font_footer_alt',
													array(
														'label' => esc_html__( ' Type custom non-google font name ( be sure that font is included to this site! )', 'rollie' ),
														'section' => 'rollie_font_footer_section',
														'type' => 'text',
														'placeholder' => __( 'arial', 'rollie' ),
													)
												);


												$wp_customize->add_setting(
													'rollie_font_footer_alt_weight',
													array(
														'default' => 100,
														'transport' => 'refresh',
														'sanitize_callback' => 'skyrocket_sanitize_integer',
													)
												);

												$wp_customize->add_control(
													new Skyrocket_Slider_Custom_Control(
														$wp_customize,
														'rollie_font_footer_alt_weight',
														array(
															'label'   => esc_html__( 'Font Weight for alternative font' ),
															'section' => 'rollie_font_footer_section',
															'input_attrs' => array(
																'min'  => 100,
																'max'  => 900,
																'step' => 100,
															),
														)
													)
												);





												 }
