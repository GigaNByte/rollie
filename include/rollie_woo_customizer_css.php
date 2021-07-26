<?php
	$rollie_inline_style  = '';
	$rollie_inline_style .= '.rollie_sort_orders_current,.rollie_my_acc_nav_side_c .is-active,.rollie_my_acc_nav_side:hover{background:' . $rollie_main_theme_color->rgb . ';}';
	$rollie_inline_style .= '.rollie_my_acc_nav_side_c .woocommerce-MyAccount-navigation, #rollie_nav_user_info  .rollie_my_acc_container     { background:' . $rollie_darker_main_theme_color->rgb . ';}';
	$rollie_inline_style .= '.rollie_orders_sort_menu .rollie_my_acc_nav_side:hover{box-shadow: 0px 0px 8px 1px	' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . '}';

if ( get_theme_mod( 'rollie_woo_l_shop_img', true ) ) {
	$rollie_inline_style .= ' .woocommerce ul.products li.product a img { max-height:' . get_theme_mod( 'rollie_woo_l_shop_img_max_h', 200 ) . 'px}';
}

	$rollie_inline_style .= '.rollie_single_product_image{ max-height:' . get_theme_mod( 'rollie_woo_l_single_img_max_h', '600' ) . 'px;}';

	$rollie_inline_style .= '.rollie_sort_orders_current,.rollie_my_acc_nav_side_c .is-active ,.rollie_my_acc_nav_wide_c,.woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register,.rollie_woo_border_color_custom_column,.woocommerce .woocommerce-customer-details address  {border-color:' . $rollie_third_theme_color->rgb . ';}';
	$rollie_inline_style .= '.woocommerce span.onsale{ background-color:' . $rollie_third_theme_color->rgb . ';}';

	$rollie_woo_notice_color  = new Rollie_Gradient( 'rollie_woo_notice_color', '#ccedfd', '.woocommerce-info ', array( 'background' ) );
	$rollie_woo_error_color   = new Rollie_Gradient( 'rollie_woo_error_color', '#ef9a9a', ' .woocommerce-error ,.rollie_error_color', array( 'background' ) );
	$rollie_woo_success_color = new Rollie_Gradient( 'rollie_woo_success_color', '#a5d6a7', '.woocommerce-message, .rollie_success_color ', array( 'background' ) );

	$rollie_inline_style .= $rollie_woo_error_color->css_snippet();
	$rollie_inline_style .= $rollie_woo_success_color->css_snippet();
	$rollie_inline_style .= $rollie_woo_notice_color->css_snippet();
	$rollie_inline_style .= '.rollie_muted_text_color{color:' . get_theme_mod( 'rollie_muted_color', '#555555' ) . ';}.rollie_muted_color{ background: ' . get_theme_mod( 'rollie_muted_color', '#555555' ) . '; }';

	$rollie_inline_style .= '.woocommerce-error,.woocommerce-message,.woocommerce-info {' . '' . ' color:' . get_theme_mod( 'rollie_woo_notice_text_color', '#212529' ) . '; border-radius: ' . get_theme_mod( 'rollie_woo_notice_radius' ) . 'px; }';

if ( get_theme_mod( 'rollie_woo_notice_icon_invert', false ) ) {
	$rollie_inline_style .= '.woocommerce-error:before,.woocommerce-message:before,.woocommerce-info:before {' . '' . ' color:' . get_theme_mod( 'rollie_woo_notice_text_color', '#212529' ) . ' !important ;}';
} else {
	$rollie_inline_style .= '.woocommerce-info:before { color: ' . get_theme_mod( 'rollie_woo_notice_border_color', '#ccedfd' ) . ';}.woocommerce-message:before {  color:' . get_theme_mod( 'rollie_woo_success_border_color', '#a5d6a7' ) . ';} .woocommerce-error:before { color:' . get_theme_mod( 'rollie_woo_error_border_color', '#ef9a9a' ) . ';}';
}
	$rollie_inline_style .= '.woocommerce-info{  border-color: ' . get_theme_mod( 'rollie_woo_notice_border_color', '#ccedfd' ) . ';}.woocommerce-message {  border-color:' . get_theme_mod( 'rollie_woo_success_border_color', '#a5d6a7' ) . ';} .woocommerce-error{ border-color:' . get_theme_mod( 'rollie_woo_error_border_color', '#ef9a9a' ) . ';}';

if ( get_theme_mod( 'rollie_woo_notice_width_full', true ) ) {
	$rollie_inline_style .= '.woocommerce-notices-wrapper{width:100%;}';
}
if ( get_theme_mod( 'rollie_woo_notice_border', 2 ) == 1 ) {
	$rollie_inline_style .= '.woocommerce-NoticeGroup > ul{ border-top-style:solid;}';
} elseif ( get_theme_mod( 'rollie_woo_notice_border', 2 ) == 2 ) {
	$rollie_inline_style .= '.woocommerce-NoticeGroup > ul{ border-left-style:solid;}';
} elseif ( get_theme_mod( 'rollie_woo_notice_border', 2 ) == 3 ) {
	$rollie_inline_style .= '.woocommerce-NoticeGroup > ul{ border-style:solid; }';
}

if ( get_theme_mod( 'rollie_embl_subtitles', 1 ) == 1 ) {
	$rollie_inline_style .= ' .cart-subtotal,  .order-total, #rollie_nav_cart_info .woocommerce.widget_shopping_cart .total   { border-right-style:solid }';
	$rollie_inline_style .= '  .woocommerce-shipping-totals  > th,.rollie_sort_orders_current, .rollie_my_acc_nav_side_c  .is-active  ,.rollie_checked_payment_method  { border-left-style:solid }';
}
if ( get_theme_mod( 'rollie_embl_subtitles', 1 ) == 2 ) {
		$rollie_inline_style .= 'rollie_sort_orders_current, .woocommerce-shipping-totals  > th ,#rollie_nav_cart_info .woocommerce.widget_shopping_cart .total,.rollie_checked_payment_method, .rollie_my_acc_nav_side_c  .is-active ,  .cart-subtotal { border-bottom-style:solid }';
}
	wp_add_inline_style( 'rollie_stylesheet', $rollie_inline_style );
