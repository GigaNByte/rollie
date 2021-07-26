<?php
/**
 * This controler file stores variables with appropriate css classes based on customizer layout, sidebars options.
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

$rollie_allow_sidebars = true;

if ( class_exists( 'WooCommerce' ) ) {
	if ( is_account_page() ) {
		$rollie_allow_sidebars = false;
	}
}

if ( is_single() || is_page() ) {
	$rollie_current_template = 'single_page';
} else {
	$rollie_current_template = 'posts_page';
}


 $rollie_sidebar_col = 'col-' . get_theme_mod( 'rollie_' . $rollie_current_template . '_l_sidebar_size', 2 );
 $rollie_multiply    = ( get_theme_mod( 'rollie_' . $rollie_current_template . '_l', 2 ) == 3 ? 2 : 1 );
if ( get_theme_mod( 'rollie_' . $rollie_current_template . '_l', 2 ) == 2 ) {
	$rollie_multiply = 0;
}
if ( $rollie_allow_sidebars ) {
	$rollie_main_col = 12 - $rollie_multiply * intval( get_theme_mod( 'rollie_' . $rollie_current_template . '_l_sidebar_size', 2 ) );
} else {
	 $rollie_main_col = 12;
}
  $rollie_main_col = 'col-' . $rollie_main_col;


if ( get_theme_mod( 'rollie_' . $rollie_current_template . '_l_ignore', false ) ) {
	if ( is_active_sidebar( 'sidebar_left' ) ) {
		$rollie_allow_sidebar_l = true;
	} else {
		$rollie_allow_sidebar_l = false;
	}
	if ( is_active_sidebar( 'sidebar_right' ) ) {
		$rollie_allow_sidebar_r = true;
	} else {
		$rollie_allow_sidebar_r = false;
	}
} else {
	if ( 3 == get_theme_mod( 'rollie_' . $rollie_current_template . '_l', 2 ) ) {
		$rollie_allow_sidebar_r = true;
		$rollie_allow_sidebar_l = true;
	} elseif ( 1 == get_theme_mod( 'rollie_' . $rollie_current_template . '_l', 2 ) ) {
		$rollie_allow_sidebar_r = false;
		$rollie_allow_sidebar_l = true;
	} elseif ( 4 == get_theme_mod( 'rollie_' . $rollie_current_template . '_l', 2 ) ) {
		$rollie_allow_sidebar_r = true;
		$rollie_allow_sidebar_l = false;
	} else {
		$rollie_allow_sidebar_r = false;
		$rollie_allow_sidebar_l = false;
	}
}
