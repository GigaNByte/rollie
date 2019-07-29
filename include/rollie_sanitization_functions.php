<?php
function rollie_sanitize_shortcode() {
		return array (
			'a' => array (
				'href' => array(),
				'class' => array(),
			),
			
		);
	}

function rollie_sanitize_hex_color( $hex_color, $setting ) {

	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! null( $hex_color ) ? $hex_color : $setting->default );
}

function rollie_sanitize_file( $file, $setting ) {

			// allowed file types
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
			);

			// check file type from file name
			$file_ext = wp_check_filetype( $file, $mimes );

			// if file has a valid mime type return it, otherwise return default
			return ( $file_ext['ext'] ? $file : $setting->default );
}

function rollie_sanitize_radio( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function rollie_sanitize_select( $input, $setting ) {

	// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key( $input );

	// get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}


function rollie_sanitize_checkbox( $input ) {
	$output = filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
	return $output;
}
		/**
	 * Google Font sanitization
	 *
	 * @param  string   JSON string to be sanitized
	 * @return string   Sanitized input
	 */
if ( ! function_exists( 'skyrocket_google_font_sanitization' ) ) {
	function skyrocket_google_font_sanitization( $input ) {
		$val = json_decode( $input, true );
		if ( is_array( $val ) ) {
			foreach ( $val as $key => $value ) {
				$val[ $key ] = sanitize_text_field( $value );
			}
			$input = json_encode( $val );
		} else {
			$input = json_encode( sanitize_text_field( $val ) );
		}
		return $input;
	}
}
		/**
	 * Slider sanitization
	 *
	 * @param  string   Slider value to be sanitized
	 * @return string   Sanitized input
	 */
if ( ! function_exists( 'skyrocket_range_sanitization' ) ) {
	function skyrocket_range_sanitization( $input, $setting ) {
		$attrs  = $setting->manager->get_control( $setting->id )->input_attrs;
		$min    = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
		$max    = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
		$step   = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );
		$number = floor( $input / $attrs['step'] ) * $attrs['step'];
		return skyrocket_in_range( $number, $min, $max );
	}
}

function skyrocket_sanitize_integer( $input ) {
		return (int) $input;
}
function rollie_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}



function rollie_sanitize_float( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

if ( ! function_exists( 'skyrocket_text_sanitization' ) ) {
	function skyrocket_text_sanitization( $input ) {
		if ( strpos( $input, ',' ) !== false ) {
			$input = explode( ',', $input );
		}
		if ( is_array( $input ) ) {
			foreach ( $input as $key => $value ) {
				$input[ $key ] = sanitize_text_field( $value );
			}
			$input = implode( ',', $input );
		} else {
			$input = sanitize_text_field( $input );
		}
		return $input;
	}
}

function rollie_sanitize_class_html( $input ) {
	 $allowed_html = array(
		 'a'      => array(
			 'href'  => array(),
			 'class' => array(),
			 'title' => array(),
		 ),
		 'br'     => array(),
		 'b'      => array(),

		 'span'   => array(),
		 'em'     => array(),
		 'strong' => array(),
	 );

	wp_kses( $input, $allowed_html );
}
		/**
		 * Switch sanitization
		 *
		 * @param  string       Switch value
		 * @return integer  Sanitized value
		 */

function skyrocket_switch_sanitization( $input ) {
	if ( true === $input ) {
		return 1;
	} else {
		return 0;
	}
}
