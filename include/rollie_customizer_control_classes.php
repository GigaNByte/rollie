<?php
	/**
	 * TinyMCE Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
class Skyrocket_TinyMCE_Custom_control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'tinymce_editor';
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		wp_enqueue_script( 'skyrocket-custom-controls-js', trailingslashit( get_template_directory_uri() ) . 'js/customizer.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'skyrocket-custom-controls-css', trailingslashit( get_template_directory_uri() ) . 'css/customizer.css', array(), '1.0', 'all' );
		wp_enqueue_editor();
	}
	/**
	 * Pass our TinyMCE toolbar string to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['skyrockettinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
		$this->json['skyrockettinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
			<div class="tinymce-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
			</div>
			<?php
	}
}
	/**
	 * Googe Font Select Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

class Skyrocket_Google_Font_Select_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'google_fonts';
	public $nut  = 0;
	/**
	 * The list of Google Fonts
	 */
	private $fontList = false;
	/**
	 * The saved font values decoded from json
	 */
	private $fontValues = [];
	/**
	 * The index of the saved font within the list of Google fonts
	 */
	private $fontListIndex = 0;
	/**
	 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
	 */
	private $fontCount = 'all';
	/**
	 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
	 */
	private $fontOrderBy = 'alpha';
	/**
	 * Get our list of fonts from the json file
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Get the font sort order
		if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
			$this->fontOrderBy = 'popular';
		}
		// Get the list of Google fonts
		if ( isset( $this->input_attrs['font_count'] ) ) {
			if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
				$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
			}
		}
		$this->fontList = $this->skyrocket_getGoogleFonts( 'all' );
		// Decode the default json font value
		$this->fontValues = json_decode( $this->value() );
		// Find the index of our default font within our list of Google fonts
		$this->fontListIndex = $this->skyrocket_getFontIndex( $this->fontList, $this->fontValues->font );
	}
	/**
	 * Enqueue our scripts and styles
	 */

	/**
	 * Export our List of Google Fonts to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['skyrocketfontslist'] = $this->fontList;
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		$fontCounter  = 0;
		$isFontInList = false;
		$fontListStr  = '';
		if ( ! empty( $this->fontList ) ) {
			?>
				<div class="google_fonts_select_control">
				<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list rollie_fonts_list" control-name="<?php echo esc_attr( $this->id ); ?>" slider-reset-value="<?php echo esc_attr( $this->input_attrs['rfont'] ); ?>">
						<?php
						foreach ( $this->fontList as $key => $value ) {
							$fontCounter++;
							$fontListStr .= '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
							if ( $this->fontValues->font === $value->family ) {
								$isFontInList = true;
							}
							if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
								break;
							}
						}
						if ( ! $isFontInList && $this->fontListIndex ) {
							// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font
							$fontListStr = '<option value="' . $this->fontList[ $this->fontListIndex ]->family . '" ' . selected( $this->fontValues->font, $this->fontList[ $this->fontListIndex ]->family, false ) . '>' . $this->fontList[ $this->fontListIndex ]->family . ' (default)</option>' . $fontListStr;
						}
							// Display our list of font options
							echo $fontListStr;
						?>
						</select>
					</div>
					<div class="customize-control-description">Select weight &amp; style for regular text</div>
					<div class="weight-style">
						<select class="google-fonts-regularweight-style rollie_regularweight"   slider-reset-value="<?php echo esc_attr( $this->input_attrs['rregularweight'] ); ?>">
							<?php
							foreach ( $this->fontList[ $this->fontListIndex ]->variants as $key => $value ) {
								echo '<option value="' . $value . '" ' . selected( $this->fontValues->regularweight, $value, false ) . '>' . $value . '</option>';
							}
							?>
						</select>
					</div>
								<?php
								if ( isset( $this->input_attrs['disable_bold_italic'] ) && $this->input_attrs['disable_bold_italic'] == 'true' ) {
										$rollie_d_class = 'rollie_d_none';
								} else {
										$rollie_d_class = '';
								}
								?>
				
						<div class="customize-control-description <?php echo $rollie_d_class; ?>">Select weight for <italic>italic text</italic></div>
						<div class="weight-style <?php echo $rollie_d_class; ?>">
							<select class="google-fonts-italicweight-style rollie_italicweight" <?php disabled( in_array( 'italic', $this->fontList[ $this->fontListIndex ]->variants ), false ); ?> slider-reset-value="<?php echo esc_attr( $this->input_attrs['ritalicweight'] ); ?>">
								<?php
								$optionCount = 0;
								foreach ( $this->fontList[ $this->fontListIndex ]->variants as $key => $value ) {
									// Only add options that are italic
									if ( strpos( $value, 'italic' ) !== false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->italicweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								if ( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
								?>
							</select>
						</div>
						<div class="customize-control-description <?php echo $rollie_d_class; ?>">Select weight for <strong>bold text</strong></div>
						<div class="weight-style <?php echo $rollie_d_class; ?>">
							<select class="google-fonts-boldweight-style rollie_boldweight" slider-reset-value="<?php echo esc_attr( $this->input_attrs['rboldweight'] ); ?>">
								<?php
								$optionCount = 0;
								foreach ( $this->fontList[ $this->fontListIndex ]->variants as $key => $value ) {
									// Only add options that aren't italic
									if ( strpos( $value, 'italic' ) === false ) {
										echo '<option value="' . $value . '" ' . selected( $this->fontValues->boldweight, $value, false ) . '>' . $value . '</option>';
										$optionCount++;
									}
								}
								// This should never evaluate as there'll always be at least a 'regular' weight
								if ( $optionCount == 0 ) {
									echo '<option value="">Not Available for this font</option>';
								}
								?>
							</select>
						</div>
					
					<div class="customize-control-description">Select subset </div>
					<div class="weight-style">
						<select class="google-fonts-subsets-style rollie_subsets " slider-reset-value="<?php echo esc_attr( $this->input_attrs['rsubsets'] ); ?>">
							<?php
							$optionCountr = 0;
							foreach ( $this->fontList[ $this->fontListIndex ]->subsets as $key => $value ) {
									echo '<option value="' . $value . '" ' . selected( $this->fontValues->subsets, $value, false ) . '>' . $value . '</option>';
								$optionCountr++;
							}
							if ( $optionCountr == 0 ) {
								echo '<option value="">Not Available for this font</option>';
							}

							?>
							
						</select>

					</div>
					<input type="hidden" class="google-fonts-category rollie_font_category" value="<?php echo $this->fontValues->category; ?>" slider-reset-value="<?php echo esc_attr( $this->input_attrs['rcategory'] ); ?>">
				<span>Reset to default font type settings </span> <span object_name="<?php echo esc_attr( $this->input_attrs['object_name'] ); ?>" class=" rollie_font_reset dashicons dashicons-image-rotate"></span>
				</div>
				<?php
		}
	}
	/**
	 * Find the index of the saved font in our multidimensional array of Google Fonts
	 */
	public function skyrocket_getFontIndex( $haystack, $needle ) {
		if ( is_array( $haystack ) || is_object( $haystack ) ) {
			foreach ( $haystack as $key => $value ) {
				if ( $value->family == $needle ) {
					return $key;
				}
			}
		}
		return false;
	}
	/**
	 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
	 */
	public function skyrocket_getGoogleFonts( $count = 30 ) {
		// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
		$fontFile = trailingslashit( get_template_directory_uri() ) . 'include/rollie_google_fonts.json';
		if ( $this->fontOrderBy === 'popular' ) {
			$fontFile = trailingslashit( get_template_directory_uri() ) . 'include/rollie_google_fonts.json';
		}
		$request = wp_remote_get( $fontFile );
		if ( is_wp_error( $request ) ) {
			return '';
		}
		$body    = wp_remote_retrieve_body( $request );
		$content = json_decode( $body );
		if ( $count == 'all' ) {
			return $content->items;
		} else {
			return array_slice( $content->items, 0, $count );
		}
	}
}
























class Rollie_Icon_Customize_Control extends WP_Customize_Control {



	public function render_content() {

		if ( $this->type == 'radio' ) {
			?>
			<?php

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			?>
			<div class="rollie_customizer_icon_container">
			<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
						<div class="rollie_center">
				<?php
				foreach ( $this->choices as $value => $label ) :
					$rollie_split = explode( 'split', $label );

					?>
					<div class="customize-inside-control-row  rollie_customizer_icon_single">
						<div class="rollie_margin_auto_c">
							<label for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"class='d-inline-block '><i class="rollie_dash  fab fa-2x   <?php echo ( esc_html( $rollie_split[0] ) ); ?> "></i> </label>
						
						<input
							
							id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
							type="radio"
							
							value="<?php echo esc_attr( $value ); ?>"
							name="<?php echo esc_attr( $name ); ?>"
							<?php $this->link(); ?>
							<?php checked( $this->value(), $value ); ?>
							/
							>
									</div>
							<p>
						<?php
							$x = 0;
						foreach ( $rollie_split as $split ) {

							if ( $x == 1 ) {
								 echo esc_html( $split );
							}
							$x++;
						}
						?>
						
							</p>
					
					</div>
					
<?php endforeach; ?>
					</div>
				<br>
			</div>
				<?php
		} else {
			return;
		}
	}

}
class Skyrocket_Slider_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'slider_control';
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {

	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
	/*	
	

	*/	
/* This attributes  allows Rollie_Multiple_Switch_Customizer_Control to decide when display this custom control

*/
	if (isset($this->input_attrs['rollie_multiple_switch_cc']) ) $rollie_mscc_attrs = esc_attr( $this->input_attrs['rollie_multiple_switch_cc'] );
		?>


			<div class="slider-custom-control" rollie_mscc_attrs="<?php if ( isset( $rollie_mscc_attrs) ) echo $rollie_mscc_attrs ;?>">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
			</div>
			<?php
	}
}
	/**
	 * Simple Notice Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
class Skyrocket_Simple_Notice_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'simple_notice';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		$allowed_html = array(
			'a'      => array(
				'href'   => array(),
				'title'  => array(),
				'class'  => array(),
				'target' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'i'      => array(
				'class' => array(),
			),
			'span'   => array(
				'class' => array(),
			),
			'code'   => array(),
		);
		?>
			<div class="simple-notice-custom-control">
			<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
			<?php
	}
}
	/**
	 * Toggle Switch Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
class Skyrocket_Toggle_Switch_Custom_control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'toogle_switch';
	/**
	 * Enqueue our scripts and styles
	 */

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		if ( isset( $this->input_attrs['customclass'] ) && $this->input_attrs['customclass'] == 'rollie_alt_toogle' ) {
			$rollie_alt_toogle   = $this->input_attrs['customclass'];
			$rollie_alt_toogle_i = $this->input_attrs['customclass'] . '_inner';
			$rollie_alt_toogle_l = $this->input_attrs['customclass'] . '_label';
			$rollie_alt_toogle_c = $this->input_attrs['customclass'] . '_control';
			if ( ! empty( $this->input_attrs['default'] ) ) {
				$rollie_alt_toogle_def = "reset-value ='" . $this->input_attrs['default'] . "'";
			}
		} else {
			$rollie_alt_toogle   = '';
			$rollie_alt_toogle_l = '';
			$rollie_alt_toogle_c = '';
		}
		?>
			<div class="toggle-switch-control <?php echo esc_html( $rollie_alt_toogle_c ); ?>">
				<div class="toggle-switch">
					<input type="checkbox" 
					<?php
					if ( ! empty( $rollie_alt_toogle_def ) ) {
						echo $rollie_alt_toogle_def;}
					?>
					 id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox <?php echo esc_html( $rollie_alt_toogle ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" 
		<?php
					$this->link();
					checked( $this->value() );
		?>
					 >
					<label class="toggle-switch-label <?php echo esc_html( $rollie_alt_toogle_l ); ?>" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner <?php echo esc_html( $rollie_alt_toogle_i ); ?>"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<div class="customize-control-title pr-1"><?php echo esc_html( $this->label ); ?></div>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
			<?php
	}
}

class Rollie_Multiple_Switch_Customizer_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'multiple-switch';
	public function render_content() {	
		  $input_id         = '_customize-input-' . $this->id;
    $description_id   = '_customize-description-' . $this->id;
    $describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

			if ( empty( $this->choices ) ) {
			                return;
			            }
			 
            $name = '_customize-radio-' . $this->id;
            ?>
<div class="rollie_single_gradient_c "> 
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
	 <div class="rollie_multiple_switch_row rollie_multiple_switch_row_js">
            <?php foreach ( $this->choices as $value => $label ) : ?>
             <div id="<?Php echo $this->id.'-'.$value ?>"   rollie_mscc_attrs="<?Php echo $this->id.'-'.$value ?>"  class="rollie_multiple_switch_c rollie_mscc_js  rollie_col  ">	
                <span class=" customize-inside-control-row rollie_multiple_switch">
         
                    <input 
                        id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"
                        type="radio"
                        <?php echo $describedby_attr; ?>
                        value="<?php echo esc_attr( $value ); ?>"
                        name="<?php echo esc_attr( $name ); ?>"
                        <?php $this->link(); ?>
                        <?php checked( $this->value(), $value ); ?>
                        />
                    <label for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"><?php echo esc_html( $label ); ?></label>
               	
                </span>
             </div>  

            <?php endforeach;?> 
	</div>
</div>
<?php      }
}



class Rollie_Text_Custom_Control extends WP_Customize_Control {


	public $type = 'text_custom_control';

	public function render_content() {

		if ( $this->type == 'text' ) {
			if ( ! empty( $this->input_attrs['default'] ) ) {
				$rollie_def = " reset-value='" . $this->input_attrs['default'] . "' ";
			} else {
				$rollie_def = '';
			}
			if ( ! empty( $this->label ) ) :
				?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
					<?php endif; ?>
				
				<input
				<?php echo $rollie_def; ?>
					id="<?php echo esc_attr( $this->id ); ?>"
					type="<?php echo esc_attr( $this->type ); ?>"
					
					<?php $this->input_attrs(); ?>
					<?php if ( ! isset( $this->input_attrs['value'] ) ) : ?>
						value="<?php echo esc_attr( $this->value() ); ?>"
					<?php endif; ?>
					<?php $this->link(); ?>
/>
				<?php
		} else {
			return;
		}
	}

}
class Customize_Alpha_Color_Control extends WP_Customize_Control {
	/**
	 * Official control name.
	 */
	public $type = 'alpha-color';
	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 */
	public $palette;
	/**
	 * Add support for showing the opacity value on the slider handle.
	 */
	public $show_opacity;
	/**
	 * Enqueue scripts and styles.
	 *
	 * Ideally these would get registered and given proper paths before this control object
	 * gets initialized, then we could simply enqueue them here, but for completeness as a
	 * stand alone class we'll register and enqueue them here.
	 */

	/**
	 * Render the control.
	 */
	public function render_content() {
		// Process the palette
//


		if (isset($this->input_attrs['rollie_multiple_switch_cc']) ) $rollie_mscc_attrs = esc_attr( $this->input_attrs['rollie_multiple_switch_cc'] );
				 
		
/* This html attributes inserted in first html tag of rendered content of control allows Rollie_Multiple_Switch_Customizer_Control to decide when display this custom control
	Atribbute strings should be declared in array called input_attrs
	Attribute string structure: customizer_control_name.'-'.$Customizer_control_choice_number
'rollie_multiple_switch_cc'=>'rollie_elements-1'


	example:
##################################################	
#'rollie_multiple_switch_cc'=>'rollie_elements-1'#
##################################################

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
	!!!!!!!!!!!!	'rollie_multiple_switch_cc'=>'rollie_elements-1'!!!!!!!!!!!!
				),
			)
		)
	);
$wp_customize->add_control(
				new Rollie_Multiple_Switch_Customizer_Control(
					$wp_customize,
!!!!!!!!!!! 'rollie_elements',    !!!!!!!!!!!!
					array(					
						'section' => 'rollie_theme_colors_section',
						'choices' => array(
	!!!!!!!!!!!!		1 => esc_html__( ' Footer ', 'rollie' ),!!!!!!!!!!!!
						2 => esc_html__( ' Header ', 'rollie' ),
						
						
					),
					)
				)
			);
*/

		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}
		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
		// Begin the output. ?>
		<div class="rollie_single_gradient_c rollie_single_gradient_padding " rollie_mscc_attrs="<?php if (isset($rollie_mscc_attrs) ) echo esc_attr($rollie_mscc_attrs) ;?>"> 
			<?php // Output the label and description if they were passed in.
			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
			} ?>
			<label>
		
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
			</label>
		</div>	

		<?php

	}
}
class Rollie_Customizer_Collapse_Label_Control extends WP_Customize_Control {
	/**
	 * Displays title and description
	 */

public $type = 'toogle-label';
	public function render_content() {	
            ?> 
            <?php if ( ! empty( $this->label ) ) : ?>
            	<h3 class="rollie_collapse_label_toggle accordion-section-title customize-control-title  rollie_customizer_label " rollie_collapse_elements="<?Php if (isset($this->input_attrs['rollie_collapse_elements_number'])) echo esc_attr ($this->input_attrs['rollie_collapse_elements_number'])  ?>">
            		<?php echo esc_html( $this->label ); ?></h3>
                
            <?php endif; ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
<?php      }
}