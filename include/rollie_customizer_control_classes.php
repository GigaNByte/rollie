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
						<select class="google-fonts-list rollie_fonts_list" control-name="<?php echo esc_attr( $this->id ); ?>" rollie-reset-value="<?php echo esc_attr($this->fontValues->font ); ?>">
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
						<select class="google-fonts-regularweight-style rollie_regularweight"   rollie-reset-value="<?php echo esc_attr($this->fontValues->regularweight); ?>">
							<?php
							foreach ( $this->fontList[ $this->fontListIndex ]->variants as $key => $value ) {
								echo '<option value="' . $value . '" ' . selected( $this->fontValues->regularweight, $value, false ) . '>' . $value . '</option>';
							}
							?>
						</select>
					</div>
								<?php
								if ($this->input_attrs['disable_bold_italic']  ) {
										$rollie_d_class = 'rollie_d_none';
								} else {
										$rollie_d_class = '';
								}
								?>
				
						<div class="customize-control-description <?php echo $rollie_d_class; ?>">Select weight for <italic>italic text</italic></div>
						<div class="weight-style <?php echo $rollie_d_class; ?>">
							<select class="google-fonts-italicweight-style rollie_italicweight" <?php disabled( in_array( 'italic', $this->fontList[ $this->fontListIndex ]->variants ), false ); ?> rollie-reset-value="<?php echo esc_attr( $this->fontValues->italicweight ); ?>">
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
							<select class="google-fonts-boldweight-style rollie_boldweight" rollie-reset-value="<?php echo esc_attr(  $this->fontValues->boldweight ); ?>">
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
						<select class="google-fonts-subsets-style rollie_subsets " rollie-reset-value="<?php echo esc_attr( $this->fontValues->subsets); ?>">
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
					<input type="hidden" class="google-fonts-category rollie_font_category" value="<?php echo $this->fontValues->category; ?>" rollie-reset-value="<?php echo esc_attr( $this->fontValues->category ); ?>">
					
						<span> <?php _e('Reset to previous settings','rollie')?> </span>
						<span default="<?php echo esc_attr( $this->value() ); ?>" object_name="<?php echo esc_attr( $this->input_attrs['object_name'] ); ?>" class=" rollie_font_reset dashicons dashicons-image-rotate"></span>

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

public $type = 'image_radio_button';

	public function render_content() {

		if ( $this->type == 'radio' ) {
			?>
			<?php

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			$description_id   = '_customize-description-' . $this->id;
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
				foreach ( $this->choices as $key => $value ):  
		
					$rollie_split = explode(' ', $value, 2);?>

					
					<div class="customize-inside-control-row  rollie_customizer_icon_single">
						<div class="rollie_margin_auto_c">
							<label for="<?php echo esc_attr( $name . '-radio-' . $value ); ?>"class='d-inline-block '>
							<?php if ( isset($this->input_attrs['icon_type']) && $this->input_attrs['icon_type']=='png') { ?>	
							<img class="rollie_dash rollie_icon_customize_control_img"   src="<?php echo get_template_directory_uri().'/images/'.esc_html( $rollie_split[0] ).'.png'  ;?>"></img>
							<?php }else{?>
									<i class="rollie_dash  fab fa-2x   <?php echo ( esc_html( $rollie_split[0] ) ); ?> "></i>
							<?php }?>
							 </label>
						
					<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>

							
									</div>
							<p>
						<?php echo  $rollie_split[1];?>
						
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

		?>


			<div class="slider-custom-control" >
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" rollie-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
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
		?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
					<?php
					$this->link();
					checked( $this->value() );
					?>
					 >
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner "></span>
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

	//support for font reseting

	public $type = 'multiple-switch';
	public function render_content() {	
		$rollie_font_reset_toogle_class   = '';
		$rollie_font_reset_toogle_arg   = '';
		if ( isset( $this->input_attrs['rollie_font_reset_toogle'] ) && $this->input_attrs['rollie_font_reset_toogle'] == 'rollie_font_reset_toogle' ) {
			$rollie_font_reset_toogle_class   = $this->input_attrs['rollie_font_reset_toogle'];
			if ( ! empty( $this->input_attrs['defaults'] ) ) {
				$rollie_font_reset_toogle_arg = "reset-value ='" . $this->input_attrs['defaults']. "'";
			}
		} 

		  $input_id         = '_customize-input-' . $this->id;
    $description_id   = '_customize-description-' . $this->id;
    $describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

			if ( empty( $this->choices ) ) {
			                return;
			            }
			 
            $name = '_customize-radio-' . $this->id;
            ?>
<div class="rollie_multiple_switch_c "> 
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif; ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
	 <div class="rollie_multiple_switch_row rollie_multiple_switch_row_js <?Php echo $rollie_font_reset_toogle_class;?>" <?php echo $rollie_font_reset_toogle_arg;?>>
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

function action_customize_render_control( $instance ) { 
	if (isset($instance->input_attrs['rollie_multiple_switch_cc']) ){ $rollie_mscc_attrs = esc_attr( $instance->input_attrs['rollie_multiple_switch_cc'] );?>
	<div  rollie_mscc_attrs="<?php if (isset($rollie_mscc_attrs) ) echo esc_attr($rollie_mscc_attrs) ;?>"></div>
<?php 
}
}; 

add_action( 'customize_render_control', 'action_customize_render_control', 1, 1 ); 
class Rollie_Device_Control extends WP_Customize_Control{
	public $type = 'rollie-device';
	public function render_content() {
	if ( ! empty( $this->label ) ){
	?>
	<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title rollie-device-title"><?php echo esc_html( $this->label ); ?></label>
	<?php }?>

		<div class='rollie_device_control_c p-1 customize-control  <?php if (isset($this->input_attrs['switch_size']) && $this->input_attrs['switch_size']== 'big') echo 'rollie_big_device'; ?> '>	
		<?php if(isset($this->input_attrs['collapse_target_lg'])){?>	
			<div class='rollie_device_control dashicons dashicons-desktop' data-toggle="collapse" role="button" aria-expanded="true" data-target="<?php echo esc_attr($this->input_attrs['collapse_target_lg'] )?>" aria-controls="<?php echo esc_attr($this->input_attrs['collapse_target_lg'] )?>" ></div>
		<?php } ?>
		<?php if (isset($this->input_attrs['md']) &&  isset($this->input_attrs['collapse_target_md'])){?>
			<div class='rollie_device_control dashicons dashicons-laptop' data-toggle="collapse" role="button" aria-expanded="false"  data-target="<?php echo esc_attr($this->input_attrs['collapse_target_md'] )?>" aria-controls="<?php echo esc_attr($this->input_attrs['collapse_target_md'] )?>" ></div>
		<?php }?>
		<?php if (isset($this->input_attrs['sm']) &&  isset($this->input_attrs['collapse_target_sm'])){?>
			<div class='rollie_device_control  dashicons dashicons-tablet'data-toggle="collapse" role="button" aria-expanded="false"  data-target="<?php echo esc_attr($this->input_attrs['collapse_target_sm'] )?>" aria-controls="<?php echo esc_attr($this->input_attrs['collapse_target_sm'] )?>"></div>
		<?php }?>
		<?php if (isset($this->input_attrs['xs']) && isset($this->input_attrs['collapse_target_xs']) ){?>
			<div class='rollie_device_control dashicons dashicons-smartphone'data-toggle="collapse" role="button" aria-expanded="false"  data-target="<?php echo esc_attr($this->input_attrs['collapse_target_xs'] )?>" aria-controls="<?php echo esc_attr($this->input_attrs['collapse_target_xs'] )?>"></div>
		<?php }?>
		</div>
<?php
	}	
}

class Customize_Alpha_Color_Control extends WP_Customize_Control {
	/**
	 * Official control name.
	 */
	public $type = 'rollie-alpha-color';
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
				 


		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}
		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
		// Begin the output. ?>
		
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
		 if (isset($this->input_attrs['rollie_open_close_auto']) && $this->input_attrs['rollie_open_close_auto']){
		 	 $rollie_open_close_auto ='true';
		 }
		 else {
		 	$rollie_open_close_auto='false';
		 }
		 	
            ?> 

            <?php if ( ! empty( $this->label ) ) : ?>
            	<h3 class="rollie_collapse_label_toggle accordion-section-title customize-control-title  rollie_customizer_label " rollie_open_close_auto="<?Php echo esc_attr($rollie_open_close_auto)?>" rollie_collapse_elements="<?Php if (isset($this->input_attrs['rollie_collapse_elements_number'])) echo esc_attr ($this->input_attrs['rollie_collapse_elements_number'])  ?>">

            		<?php echo esc_html( $this->label ); ?></h3>
                
            <?php endif; ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; 
}
  
}



