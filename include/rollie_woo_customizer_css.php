<?php


wp_enqueue_style( 'rollie_woo_stylesheet', get_template_directory_uri() . '/css/rollie_inline.css', array(),  date("h:i:s"), 'all' );


wp_add_inline_style('rollie_woo_stylesheet'," .rollie_sort_orders_current,.rollie_my_acc_nav_side_c .is-active\n{\nbackground:".$rollie_main_theme_color->rgb.";\n}");


if (get_theme_mod('rollie_woo_l_shop_img',true)){
wp_add_inline_style( 'rollie_woo_stylesheet', " .woocommerce ul.products li.product a img \n{\n max-height:".get_theme_mod('rollie_woo_l_shop_img_max_h',200)."px\n}");
}

wp_add_inline_style('rollie_woo_stylesheet',".rollie_single_product_image\n{\n max-height:".get_theme_mod('rollie_woo_l_single_img_max_h','600')."px;\n}");





wp_add_inline_style( 'rollie_woo_stylesheet', ".rollie_sort_orders_current,.rollie_my_acc_nav_side_c .is-active ,.rollie_my_acc_nav_wide_c,.woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register,.rollie_woo_border_color_custom_column,.woocommerce .woocommerce-customer-details address \n {border-color:".$rollie_third_theme_color->rgb.";}" );
wp_add_inline_style('rollie_woo_stylesheet',".woocommerce span.onsale{\n background-color:".$rollie_third_theme_color->rgb.";\n}");

$rollie_woo_notice_color = new Rollie_Gradient ('rollie_woo_notice_color','#ccedfd' ,'.woocommerce-info ', array('background'));
$rollie_woo_error_color = new Rollie_Gradient ('rollie_woo_error_color','#ef9a9a' ,' .woocommerce-error ,.rollie_error_color', array('background'));
$rollie_woo_success_color = new Rollie_Gradient ('rollie_woo_success_color','#a5d6a7' ,'.woocommerce-message, .rollie_success_color ', array('background'));

wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_error_color->css_snippet());	
wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_success_color->css_snippet());	
wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_notice_color->css_snippet());	
wp_add_inline_style('rollie_woo_stylesheet',".rollie_muted_text_color{color:\n". get_theme_mod('rollie_muted_color','#555555').";\n}\n.rollie_muted_color{ background: ".get_theme_mod("rollie_muted_color",'#555555').";\n }");


wp_add_inline_style('rollie_woo_stylesheet' ,".woocommerce-error,.woocommerce-message,.woocommerce-info {"."\n"." color:".get_theme_mod('rollie_woo_notice_text_color','#212529').";\n border-radius: ".get_theme_mod('rollie_woo_notice_radius')."px; \n}\n");

if (get_theme_mod('rollie_woo_notice_icon_invert',false) ){

wp_add_inline_style('rollie_woo_stylesheet' ,".woocommerce-error:before,.woocommerce-message:before,.woocommerce-info:before {"."\n"." color:".get_theme_mod('rollie_woo_notice_text_color','#212529')." !important ;\n}\n");
}
else{
wp_add_inline_style('rollie_woo_stylesheet',".woocommerce-info:before { \n color: ".get_theme_mod('rollie_woo_notice_border_color','#ccedfd').";\n}\n.woocommerce-message:before { \n color:".get_theme_mod('rollie_woo_success_border_color','#a5d6a7').";\n}\n .woocommerce-error:before {\n color:".get_theme_mod('rollie_woo_error_border_color','#ef9a9a').";\n}\n" );
}
wp_add_inline_style('rollie_woo_stylesheet',".woocommerce-info{ \n border-color: ".get_theme_mod('rollie_woo_notice_border_color','#ccedfd').";\n}\n.woocommerce-message { \n border-color:".get_theme_mod('rollie_woo_success_border_color','#a5d6a7').";\n}\n .woocommerce-error{\n border-color:".get_theme_mod('rollie_woo_error_border_color','#ef9a9a').";\n}\n" );

if (get_theme_mod('rollie_woo_notice_width_full',true)){
wp_add_inline_style('rollie_woo_stylesheet' ,'.woocommerce-notices-wrapper{width:100%;}');
}
if (get_theme_mod('rollie_woo_notice',2) == 1){
wp_add_inline_style('rollie_woo_stylesheet' ,".woocommerce-NoticeGroup > ul\n{\n border-top-style:solid;\n}\n");
}elseif (get_theme_mod('rollie_woo_notice',2) == 2 ){
wp_add_inline_style('rollie_woo_stylesheet' ,".woocommerce-NoticeGroup > ul\n{\n border-left-style:solid;\n}\n");
}elseif (get_theme_mod('rollie_woo_notice',2) == 3 ){
wp_add_inline_style('rollie_woo_stylesheet' ,".woocommerce-NoticeGroup > ul\n{\n border-style:solid; \n}\n");
}


if ( get_theme_mod ('rollie_embl_subtitles' ,1 ) == 1){
		wp_add_inline_style('rollie_woo_stylesheet' ," .cart-subtotal,  .order-total, #rollie_nav_cart_info .woocommerce.widget_shopping_cart .total  \n { border-right-style:solid \n}" );

		wp_add_inline_style('rollie_woo_stylesheet' ,"  .woocommerce-shipping-totals  > th,.rollie_sort_orders_current, .rollie_my_acc_nav_side_c  .is-active  ,.rollie_checked_payment_method \n { border-left-style:solid \n}" );	
} 
 if ( get_theme_mod ('rollie_embl_subtitles' ,1) == 2){
	wp_add_inline_style('rollie_woo_stylesheet' ,);
		wp_add_inline_style('rollie_woo_stylesheet' ,"rollie_sort_orders_current, .woocommerce-shipping-totals  > th ,#rollie_nav_cart_info .woocommerce.widget_shopping_cart .total,.rollie_checked_payment_method, .rollie_my_acc_nav_side_c  .is-active ,  .cart-subtotal\n { border-bottom-style:solid \n}" 
	);
} 




?>

