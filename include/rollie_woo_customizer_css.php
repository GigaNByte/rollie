<?php


wp_enqueue_style( 'rollie_woo_stylesheet', get_template_directory_uri() . '/css/rollie_inline.css', array(),  date("h:i:s"), 'all' );

wp_add_inline_style( 'rollie_woo_stylesheet', ".rollie_woo_border_color_custom_column{border-color:".$rollie_third_theme_color->css_snippet(true)."}" );
	$rollie_woo_notice_color = new Rollie_Gradient ('rollie_woo_notice_color','#ffffff' ,' .rollie_button_alt:hover, .woocommerce a.button.alt:hover', array('background','border-color'));
wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_notice_color->css_snippet());		
	$rollie_woo_error_color = new Rollie_Gradient ('rollie_woo_error_color','#ffffff' ,' .woocommerce-error, .woocommerce a.button.alt:hover', array('background','border-color'));
wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_error_color->css_snippet());	
	$rollie_woo_success_color = new Rollie_Gradient ('rollie_woo_success_color','#ffffff' ,' .rollie_button_alt:hover, .woocommerce a.button.alt:hover',array('background','border-color'));
wp_add_inline_style('rollie_woo_stylesheet' ,$rollie_woo_success_color->css_snippet());	


?>
