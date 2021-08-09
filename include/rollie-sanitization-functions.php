<?php
/**
 * This file stores contains sanitization functions used in theme and customizer custom Rollie classes
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

/**
 * Interval sanitization (rollie_css_ruler)
 *
 * @return int   Sanitized value
 */
function rollie_sanitize_css_ruler( $input ) {
	$input = explode( ',', $input, 4 );
	foreach ( $input as $key => $input_single ) {
		$input_single = rollie_sanitize_integer( $input_single );
	}
	$input = implode( ',', $input );
	return $input;
}
/**
 * Shortcode sanitization
 *
 * @return int   Sanitized value
 */
function rollie_sanitize_shortcode() {
		return array(
			'a' => array(
				'href'  => array(),
				'class' => array(),
			),
		);
}

/**
 * Hex css color format sanitization
 *
 * @param  String  Hex color value
 * @return String  Sanitized value
 */
function rollie_sanitize_hex_color( $hex_color, $setting ) {

	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}

/**
 * File sanitization
 *
 * @return int   Sanitized value
 */
function rollie_sanitize_file( $file, $setting ) {

			// allowed file types.
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
			);

			// check file type from file name.
			$file_ext = wp_check_filetype( $file, $mimes );

			// if file has a valid mime type return it, otherwise return default.
			return ( $file_ext['ext'] ? $file : $setting->default );
}
/**
 * Radio sanitization
 *
 * @return int   Sanitized value
 */
function rollie_sanitize_radio( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Select sanitization
 *
 * @return int   Sanitized value
 */
function rollie_sanitize_select( $input, $setting ) {

	// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// get the list of possible select options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// return input if valid or return default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

/**
 * Non Input Controls sanitization (For security and coding requirments)
 *
 * @param  int   int value
 * @return int   Sanitized value
 */
function rollie_sanitize_no_input( $input ) {
	return true;
}
/**
 * Checkbox sanitization
 *
 * @param  int   int value
 * @return int   Sanitized value
 */
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
function rollie_google_font_sanitization( $input ) {
	$val = json_decode( $input, true );
	if ( is_array( $val ) ) {
		foreach ( $val as $key => $value ) {
			$val[ $key ] = sanitize_text_field( $value );
		}
		$input = wp_json_encode( $val );
	} else {
		$input = wp_json_encode( sanitize_text_field( $val ) );
	}
	return $input;
}

/**
 * Int sanitization
 *
 * @param  int   int value
 * @return int   Sanitized value
 */
function rollie_sanitize_integer( $input ) {
	return (int) $input;
}

/**
 * Rgba css color format sanitization
 *
 * @param  Float   Float value
 * @return Float   Sanitized value
 */
function rollie_sanitize_rgba( $color ) {
	if ( empty( $color ) || is_array( $color ) ) {
		return 'rgba(0,0,0,0)';
	}
	// If string does not start with 'rgba', then treat as hex.
	// sanitize the hex color and finally convert hex to rgba.
	if ( false === strpos( $color, 'rgba' ) ) {
		return sanitize_hex_color( $color );
	}

	// By now we know the string is formatted as an rgba color so we need to further sanitize it.
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}


/**
 * Float sanitization
 *
 * @param  Float   Float value
 * @return Float   Sanitized value
 */
function rollie_sanitize_float( $input ) {
	return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
}

/**
 * Switch sanitization
 *
 * @param  string   Switch value
 * @return integer  Sanitized value
 */
function rollie_switch_sanitization( $input ) {
	if ( true === $input ) {
		return 1;
	} else {
		return 0;
	}
}
