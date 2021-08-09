<?php
	/**
	 * TinyMCE Custom Control
	 */
class Rollie_TinyMCE_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'rollie_tinymce_editor';

	/**
	 * Pass our TinyMCE toolbar string to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['rollie_tinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
		$this->json['rollie_tinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
			<div class="rollie_tinymce_control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
			</div>
		<?php
	}
}
	/**
	 * Googe Font Select Custom Control
	 */


class Rollie_Google_Font_Select_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered.
	 */
	public $type = 'rollie_google_fonts';
	/**
	 * The list of Google Fonts.
	 */
	private $font_list = false;
	/**
	 * The saved font values decoded from json.
	 */
	private $font_values = array();
	/**
	 * The index of the saved font within the list of Google fonts.
	 */
	private $font_list_index = 0;
	/**
	 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'.
	 */
	private $font_count = 'all';
	/**
	 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'.
	 */
	private $font_order_by = 'alpha';
	/**
	 * Get our list of fonts from the json file.
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Get the font sort order.
		if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
			$this->font_order_by = 'popular';
		}
		// Get the list of Google fonts.
		if ( isset( $this->input_attrs['font_count'] ) ) {
			if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
				$this->font_count = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
			}
		}
		$this->font_list = $this->rollie_get_google_fonts( 'all' );
		// Decode the default json font value.
		$this->font_values = json_decode( $this->value() );
		// Find the index of our default font within our list of Google fonts.
		$this->font_list_index = $this->rollie_get_font_index( $this->font_list, $this->font_values->font );
	}
	/**
	 * Enqueue our scripts and styles
	 */

	/**
	 * Export our List of Google Fonts to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['rollie_fontslist'] = $this->font_list;
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		$font_counter    = 0;
		$is_font_in_list = false;
		$font_list_str   = '';
		if ( ! empty( $this->font_list ) ) {
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
					<select class="google-fonts-list rollie_fonts_list" control-name="<?php echo esc_attr( $this->id ); ?>"
						rollie-reset-value="<?php echo esc_attr( $this->font_values->font ); ?>">
						<?php
						foreach ( $this->font_list as $key => $value ) {
							$font_counter++;
							$font_list_str .= '<option value="' . esc_attr( $value->family ) . '" ' . selected( $this->font_values->font, $value->family, false ) . '>' . esc_html( $value->family ) . '</option>';
							if ( $this->font_values->font === $value->family ) {
								$is_font_in_list = true;
							}
							if ( is_int( $this->font_count ) && $font_counter === $this->font_count ) {
								break;
							}
						}
						if ( ! $is_font_in_list && $this->font_list_index ) {
							// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font.
							$font_list_str = '<option value="' . $this->font_list[ $this->font_list_index ]->family . '" ' . selected( $this->font_values->font, $this->font_list[ $this->font_list_index ]->family, false ) . '>' . $this->font_list[ $this->font_list_index ]->family . ' (default)</option>' . $font_list_str;
						}
						// Display our list of font options.
						echo wp_kses(
							$font_list_str,
							array(
								'option' => array(
									'selected' => array(),
									'value'    => array(),
								),
							)
						);
						?>
					</select>	
			</div>
			<div class="customize-control-description">Select weight &amp; style for regular text</div>
			<div class="weight-style">
				<select class="google-fonts-regularweight-style rollie_regularweight"
					rollie-reset-value="<?php echo esc_attr( $this->font_values->regularweight ); ?>">
					<?php
					foreach ( $this->font_list[ $this->font_list_index ]->variants as $key => $value ) {
						echo '<option value="' . esc_attr( $value ) . '" ' . selected( $this->font_values->regularweight, $value, false ) . '>' . esc_html( $value ) . '</option>';
					}
					?>
				</select>
			</div>

			<?php
			if ( $this->input_attrs['disable_bold_italic'] ) {
					$rollie_d_class = 'rollie_d_none';
			} else {
					$rollie_d_class = '';
			}
			?>

			<div class="customize-control-description <?php echo esc_attr( $rollie_d_class ); ?>"> 
				<?php echo esc_html__( 'Select weight for', 'rollie' ) . '<italic>' . esc_html__( 'italic text', 'rollie' ) . '</italic>'; ?>
			</div>
			<div class="weight-style <?php echo esc_attr( $rollie_d_class ); ?>">
				<select class="google-fonts-italicweight-style rollie_italicweight"
					<?php disabled( in_array( 'italic', $this->font_list[ $this->font_list_index ]->variants ), false ); ?>
					rollie-reset-value="<?php echo esc_attr( $this->font_values->italicweight ); ?>">
					<?php
						$option_count = 0;
					foreach ( $this->font_list[ $this->font_list_index ]->variants as $key => $value ) {
						// Only add options that are italic.
						if ( strpos( $value, 'italic' ) !== false ) {
							echo '<option value="' . esc_attr( $value ) . '" ' . selected( $this->font_values->italicweight, $value, false ) . '>' . esc_html( $value ) . '</option>';
							$option_count++;
						}
					}
					if ( ! $option_count ) {
						echo '<option value="">Not Available for this font</option>';
					}
					?>
				</select>
			</div>
			<div class="customize-control-description <?php echo esc_attr( $rollie_d_class ); ?>">
				<?php echo esc_html__( 'Select weight for', 'rollie' ) . '<b>' . esc_html__( 'bold text', 'rollie' ) . '</b>'; ?>
			</div>
			<div class="weight-style <?php echo esc_attr( $rollie_d_class ); ?>">
				<select class="google-fonts-boldweight-style rollie_boldweight"
					rollie-reset-value="<?php echo esc_attr( $this->font_values->boldweight ); ?>">
					<?php
					$option_count = 0;
					foreach ( $this->font_list[ $this->font_list_index ]->variants as $key => $value ) {
						// Only add options that aren't italic.
						if ( strpos( $value, 'italic' ) === false ) {
							echo '<option value="' . esc_attr( $value ) . '" ' . selected( $this->font_values->boldweight, $value, false ) . '>' . esc_html( $value ) . '</option>';
							$option_count++;
						}
					}
					// This should never evaluate as there'll always be at least a 'regular' weight.
					if ( ! $option_count ) {
						?>
						<option value=""><?php esc_html__( 'Not Available for this font', 'rollie' ); ?></option>
						<?php
					}
					?>
				</select>
			</div>

			<div class="customize-control-description"><?php echo esc_html__( 'Select subset', 'rollie' ); ?> </div>
			<div class="weight-style">
				<select class="google-fonts-subsets-style rollie_subsets "
					rollie-reset-value="<?php echo esc_attr( $this->font_values->subsets ); ?>">
					<?php
						$option_countr = 0;
					foreach ( $this->font_list[ $this->font_list_index ]->subsets as $key => $value ) {
						echo '<option value="' . esc_attr( $value ) . '" ' . selected( $this->font_values->subsets, $value, false ) . '>' . esc_html( $value ) . '</option>';
						$option_countr++;
					}
					if ( $option_countr == 0 ) {
						echo '<option value="">' . esc_html__( 'Not Available for this font', 'rollie' ) . '</option>';
					}
					?>

				</select>
			</div>
			<input type="hidden" class="google-fonts-category rollie_font_category"
				value="<?php echo esc_attr( $this->font_values->category ); ?>"
				rollie-reset-value="<?php echo esc_attr( $this->font_values->category ); ?>">
			<span> <?php esc_html_e( 'Reset to previous settings', 'rollie' ); ?> </span>
			<span default="<?php echo esc_attr( $this->value() ); ?>"
				object_name="<?php echo esc_attr( $this->input_attrs['object_name'] ); ?>"
				class="rollie_font_reset dashicons dashicons-image-rotate"></span>
			<?php
		}
	}
	/**
	 * Find the index of the saved font in our multidimensional array of Google Fonts
	 */
	public function rollie_get_font_index( $haystack, $needle ) {
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
	public function rollie_get_google_fonts( $max_displayed_fonts = 30 ) {
		// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY.
		$font_file = trailingslashit( get_template_directory_uri() ) . 'include/customizer/rollie_google_fonts.json';
		if ( 'popular' == $this->font_order_by ) {
			$font_file = trailingslashit( get_template_directory_uri() ) . 'include/customizer/rollie_google_fonts.json';
		}
		$request = wp_remote_get( $font_file );
		if ( is_wp_error( $request ) ) {
			return '';
		}
		$body    = wp_remote_retrieve_body( $request );
		$content = json_decode( $body );
		if ( 'all' == $max_displayed_fonts ) {
			return $content->items;
		} else {
			return array_slice( $content->items, 0, $max_displayed_fonts );
		}
	}
}


class Rollie_Icon_Customize_Control extends WP_Customize_Control {

	public $type = 'rollie_image_radio_button';

	public function render_content() {

		if ( 'radio' == $this->type ) {
			?>
			<?php

			if ( empty( $this->choices ) ) {
				return;
			}

			$name           = '_customize-radio-' . $this->id;
			$description_id = '_customize-description-' . $this->id;
			?>
	<div class="rollie_customizer_icon_container">
			<?php if ( ! empty( $this->label ) ) : ?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
		<span id="<?php echo esc_attr( $description_id ); ?>"
			class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>
		<div class="rollie_center">
			<?php
			foreach ( $this->choices as $key => $value ) :
				$rollie_split = explode( ' ', $value, 2 );
				?>
			<div class="customize-inside-control-row  rollie_customizer_icon_single">
				<div class="rollie_margin_auto_c">
					<label for="<?php echo esc_attr( $this->id ); ?>" class='d-inline-block '>
					<?php if ( isset( $this->input_attrs['icon_type'] ) && 'png' == $this->input_attrs['icon_type'] ) { ?>
						<img class="rollie_dash rollie_icon_customize_control_img"
							src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . esc_html( $rollie_split[0] ) . '.png' ); ?>"></img>
						<?php } else { ?>
						<i class="rollie_dash fas fa-2x <?php echo ( esc_html( preg_replace( '/[ ,]+/', ' ', trim( $rollie_split[0] ) ) ) ); ?> "></i>
						<?php } ?>
					</label>
					<input type="radio" name="<?php echo esc_attr( $this->id ); ?>"
						value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?>
					<?php checked( esc_attr( $key ), $this->value() ); ?> />
				</div>
				<p><?php echo esc_html( $rollie_split[1] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
			<?php
		} else {
			return;
		}
	}

}
class Rollie_Slider_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'rollie_slider_control';
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {

	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		/**
		* This Slider_Custom_Control allows Rollie_Multiple_Switch_Customizer_Control to decide when display this custom control .
		*/

		?>


	<div class="slider-custom-control">
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number"
			id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
			value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value"
			<?php $this->link(); ?> />
		<?php if ( ! empty( $this->description ) ) : ?>
		<span id="<?php echo esc_attr( $this->description_id ); ?>"
			class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>
		<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>"
			slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>"
			slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span
			class="slider-reset dashicons dashicons-image-rotate"
			rollie-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
	</div>
		<?php
	}
}
	/**
	 * Simple Notice Custom Control
	 */
class Rollie_Notice_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'rollie_simple_notice';
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
	<div class="rollie_simple_notice_control">
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
	 */
class Rollie_Toggle_Switch_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 */
	public $type = 'rollie_toogle_switch';
	/**
	 * Enqueue our scripts and styles
	 */

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
	<div class="rollie_toggle_switch_control">
		<div class="rollie_toogle_switch">
			<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>"
				class="rollie_toogle_switch_checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> <?php checked( $this->value() ); ?> >
			<label class="rollie_toogle_switch_label" for="<?php echo esc_attr( $this->id ); ?>">
				<span class="rollie_toogle_switch_inner "></span>
				<span class="rollie_toogle_switch_switch"></span>
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
	 *
	 * Supports font reseting
	 */

	public $type = 'rollie_multiple_switch';
	public function render_content() {
		$rollie_font_reset_toogle_class = '';
		$rollie_font_reset_toogle_arg   = '';
		if ( isset( $this->input_attrs['rollie_font_reset_toogle'] ) && 'rollie_font_reset_toogle' == $this->input_attrs['rollie_font_reset_toogle'] ) {
			$rollie_font_reset_toogle_class = $this->input_attrs['rollie_font_reset_toogle'];
			if ( ! empty( $this->input_attrs['defaults'] ) ) {
				$rollie_font_reset_toogle_arg = "reset-value ='" . $this->input_attrs['defaults'] . "'";
			}
		}

		$name             = '_customize-radio-' . $this->id;
		$input_id         = '_customize-input-' . $this->id;
		$description_id   = '_customize-description-' . $this->id;
		$describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

		if ( empty( $this->choices ) ) {
			return;
		}

		?>
	<div class="rollie_multiple_switch_c ">
		<?php if ( ! empty( $this->label ) ) : ?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
		<span id="<?php echo esc_attr( $description_id ); ?>"
			class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>
		<div class="rollie_multiple_switch_row rollie_multiple_switch_row_js <?Php echo esc_attr( $rollie_font_reset_toogle_class ); ?>"
			<?php echo esc_attr( $rollie_font_reset_toogle_arg ); ?>>
			<?php foreach ( $this->choices as $value => $label ) : ?>
			<div id="<?Php echo esc_attr( $this->id . '-' . $value ); ?>"
				rollie_mscc_attrs="<?php echo esc_attr( $this->id . '-' . $value ); ?>"
				class="rollie_multiple_switch_c rollie_mscc_js rollie_col">
				<span class="customize-inside-control-row rollie_multiple_switch">

					<input id="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>" type="radio"
						<?php echo $describedby_attr; ?> value="<?php echo esc_attr( $value ); ?>"
						name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); ?>
						<?php checked( $this->value(), $value ); ?> />
					<label
						for="<?php echo esc_attr( $input_id . '-radio-' . $value ); ?>"><?php echo esc_html( $label ); ?></label>

				</span>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
		<?php
	}
}



class Rollie_Text_Custom_Control extends WP_Customize_Control {

	/**
	 * Control name.
	 */

	public $type = 'rollie_text_custom';

	/**
	 * Render the control.
	 */
	public function render_content() {

		if ( 'text' == $this->type ) {
			if ( ! empty( $this->input_attrs['default'] ) ) {
				$rollie_def = " reset-value='" . $this->input_attrs['default'] . "' ";
			} else {
				$rollie_def = '';
			}
			if ( ! empty( $this->label ) ) :
				?>
	<label for="<?php echo esc_attr( $this->id ); ?>"
		class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
	<?php endif; ?>

	<input <?php echo esc_attr( $rollie_def ); ?> id="<?php echo esc_attr( $this->id ); ?>"
		type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?>
			<?php if ( ! isset( $this->input_attrs['value'] ) ) : ?>
				value="<?php echo esc_attr( $this->value() ); ?>"
		<?php endif; ?> <?php $this->link(); ?> />
			<?php
		} else {
			return;
		}
	}

}

function rollie_customize_render_control( $instance ) {
	if ( isset( $instance->input_attrs['rollie_multiple_switch_cc'] ) ) {
		$rollie_mscc_attrs = esc_attr( $instance->input_attrs['rollie_multiple_switch_cc'] );
		if ( ! empty( $rollie_mscc_attrs ) ) {
			echo '<div rollie_mscc_attrs=' . esc_attr( $rollie_mscc_attrs ) . '></div>';
		}
	}
}
add_action( 'customize_render_control', 'rollie_customize_render_control', 1, 1 );

class Rollie_Device_Control extends WP_Customize_Control {

	public $type = 'rollie_device';

	public function render_content() {
		if ( ! empty( $this->label ) ) {
			?>
		<label for="<?php echo esc_attr( $this->id ); ?>"
			class="customize-control-title "><?php echo esc_html( $this->label ); ?></label>
		<?php } ?>

		<div class='rollie_device_control_c p-1 customize-control  
			<?php
			if ( isset( $this->input_attrs['switch_size'] ) && 'big' == $this->input_attrs['switch_size'] ) {
				echo esc_attr( 'rollie_big_device' );
			}
			?>
			'>
			<?php if ( isset( $this->input_attrs['collapse_target_lg'] ) ) { ?>
			<div class='rollie_device_control dashicons dashicons-desktop' data-toggle="collapse" role="button"
				aria-expanded="true" data-target="<?php echo esc_attr( $this->input_attrs['collapse_target_lg'] ); ?>"
				aria-controls="<?php echo esc_attr( $this->input_attrs['collapse_target_lg'] ); ?>"></div>
			<?php } ?>
			<?php if ( isset( $this->input_attrs['md'] ) && isset( $this->input_attrs['collapse_target_md'] ) ) { ?>
			<div class='rollie_device_control dashicons dashicons-laptop' data-toggle="collapse" role="button"
				aria-expanded="false" data-target="<?php echo esc_attr( $this->input_attrs['collapse_target_md'] ); ?>"
				aria-controls="<?php echo esc_attr( $this->input_attrs['collapse_target_md'] ); ?>"></div>
			<?php } ?>
			<?php if ( isset( $this->input_attrs['sm'] ) && isset( $this->input_attrs['collapse_target_sm'] ) ) { ?>
			<div class='rollie_device_control  dashicons dashicons-tablet' data-toggle="collapse" role="button"
				aria-expanded="false" data-target="<?php echo esc_attr( $this->input_attrs['collapse_target_sm'] ); ?>"
				aria-controls="<?php echo esc_attr( $this->input_attrs['collapse_target_sm'] ); ?>"></div>
			<?php } ?>
			<?php if ( isset( $this->input_attrs['xs'] ) && isset( $this->input_attrs['collapse_target_xs'] ) ) { ?>
			<div class='rollie_device_control dashicons dashicons-smartphone' data-toggle="collapse" role="button"
				aria-expanded="false" data-target="<?php echo esc_attr( $this->input_attrs['collapse_target_xs'] ); ?>"
				aria-controls="<?php echo esc_attr( $this->input_attrs['collapse_target_xs'] ); ?>"></div>
			<?php } ?>
		</div>
		<?php
	}
}

class Rollie_Alpha_Color_Control extends WP_Customize_Control {
	/**
	 * Control name.
	 */
	public $type = 'rollie_alpha_color';
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
		// Process the palette.
		if ( isset( $this->input_attrs['rollie_multiple_switch_cc'] ) ) {
			$rollie_mscc_attrs = $this->input_attrs['rollie_multiple_switch_cc'];
		}
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}
		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
		// Begin the output.
		?>
		
			<?php
			// Output the label and description if they were passed in.
			if ( ! empty( $this->label ) ) {
				?>
				<span for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
			}
			?>
			<label>
			<input  class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>"
			data-palette="<?php echo esc_attr( $palette ); ?>"
			data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>"
			<?php $this->link(); ?> />	
			</label>		
			

		<?php

	}
}
class Rollie_Customizer_Collapse_Label_Control extends WP_Customize_Control {
	/**
	 * Displays title and description
	 */

	public $type     = 'rollie_toogle_label';
	public $expanded = 'false';



	public function render_content() {
		if ( isset( $this->input_attrs['expanded'] ) && $this->input_attrs['expanded'] ) {
			$this->expanded = 'true';

		}
		if ( ! empty( $this->label ) ) :
			?>
			<h3 class="rollie_customizer_label rollie_collapse_label_toggle accordion-section-title customize-control-title "
				aria-expanded="<?php echo esc_attr( $this->expanded ); ?>" rollie_collapse_elements="
				<?Php
				if ( isset( $this->input_attrs['rollie_collapse_elements_number'] ) ) {
					echo esc_attr( $this->input_attrs['rollie_collapse_elements_number'] );}
				?>
				">
				<?php echo esc_html( $this->label ); ?>
			</h3>
			<?php endif; ?>

			<?php if ( ! empty( $this->description ) ) { ?>
			<span id="<?php echo esc_attr( $this->description_id ); ?>" class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php
			}
	}

}

class Rollie_Css_Ruler_Control extends WP_Customize_Control {
	public $type = 'rollie_css_ruler';
	public function render_content() {

		?>

	<div class='rollie_css_ruler_label customize-control-title'><?php echo esc_html( $this->label ); ?></div>
	<div class='rollie_css_ruler_label customize-control-description'><?php echo esc_html( $this->description ); ?></div>
	<div class='rollie_css_ruler_c'>
		<?php
		if ( ! empty( $this->value() ) ) {
			$rollie_css_ruler_defaults = explode( ',', $this->value(), 4 );
		} else {
			$rollie_css_ruler_defaults = array_fill( false, 4, 0 );
		}

		if ( isset( $this->input_attrs['type'] ) && 'b-width' == $this->input_attrs['type'] ) {
			$label_1 = __( 'Top', 'rollie' );
			$label_2 = __( 'Right', 'rollie' );
			$label_3 = __( 'Bottom', 'rollie' );
			$label_4 = __( 'left', 'rollie' );
		} else {
			$label_1 = __( 'Top Left', 'rollie' );
			$label_2 = __( 'Top Right', 'rollie' );
			$label_3 = __( 'Bottom Left', 'rollie' );
			$label_4 = __( 'Bottom Right', 'rollie' );
		}
		?>
		<span>
			<input class='rollie_css_ruler_item rollie_css_ruler_item_l' type='number'
				value='<?php echo esc_attr( $rollie_css_ruler_defaults[0] ); ?>'></input>
			<label class='d-block' for="<?php echo esc_attr( $this->id ); ?>"><?php echo esc_html( $label_1 ); ?></label>
		</span>
		<span>
			<input type='number' class='rollie_css_ruler_item rollie_css_ruler_item_t'
				value='<?php echo esc_attr( $rollie_css_ruler_defaults[1] ); ?>'></input>
			<label class='d-block' for="<?php echo esc_attr( $this->id ); ?>"><?php echo esc_html( $label_2 ); ?></label>
		</span>
		<span>
			<input class='rollie_css_ruler_item rollie_css_ruler_item_b' type='number'
				value='<?php echo esc_attr( $rollie_css_ruler_defaults[2] ); ?>'></input>
			<label class='d-block' for="<?php echo esc_attr( $this->id ); ?>"><?php echo esc_html( $label_3 ); ?></label>
		</span>
		<span>
			<input class='rollie_css_ruler_item rollie_css_ruler_item_r' type='number'
				value='<?php echo esc_attr( $rollie_css_ruler_defaults[3] ); ?>'></input>
			<label class='d-block' for="<?php echo esc_attr( $this->id ); ?>"><?php echo esc_html( $label_4 ); ?></label>
		</span>
		<span class='rollie_css_ruler_link' title='link All Controls'>
			<b>PX</b>
			<div class="rollie_ruler_link dashicons dashicons-admin-links"></div>
		</span>
		<input hidden name="<?php echo esc_attr( $this->id ); ?>" class='rollie_css_ruler_input'
			value='<?php echo esc_attr( $this->value() ); ?>'
			data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>"
			id="<?php echo esc_attr( $this->id ); ?>"></input>
	</div>
		<?php

	}
}
