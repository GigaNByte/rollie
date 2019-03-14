<?php

function rollie_filter_woo_account_menu_item_classes( $classes, $endpoint ) { 




if (get_theme_mod('rollie_woo_l_my_account_nav',1) == 1){


	$classes[] .= " col-6  ";	
	$classes[] .= " rollie_my_acc_nav_big_tiles ";
	$classes[] .= " col-lg-4  ";
}
elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 2){
$classes[] .= " rollie_my_acc_nav_side ";

}
elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 3){
$classes[] .= " rollie_my_acc_nav_wide ";
}
  return $classes; 
}; 
add_filter( 'woocommerce_account_menu_item_classes', 'rollie_filter_woo_account_menu_item_classes', 10, 2 ); 

function rollie_action_woo_before_account_navigation ()
{
	$rollie_actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ( $rollie_actual_link == get_permalink( get_option('woocommerce_myaccount_page_id') )) /*if is displayed dashboard page apply class that creates bigger tiles*/{
		$rollie_dash_class =" rollie_my_acc_dashboard ";
}
else{
	$rollie_dash_class = "";
}	

$rollie_current_user = wp_get_current_user();
   if ( ! $rollie_current_user->exists() ) {
       return;
   }


	if (get_theme_mod('rollie_woo_l_my_account_nav',1) == 1){
$rollie_class_c = ' rollie_my_acc_nav_big_tiles_c ';
$rollie_class_c .= ' rollie_darker_main_color_h ';
$rollie_user_info_class = " col-12 col-lg-3 ";
}
elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 2){
$rollie_class_c = " rollie_my_acc_nav_side_c ";
$rollie_class_c .= " col-5  ";
$rollie_class_c .= " col-lg-4  ";
$rollie_class_c .= ' rollie_darker_main_color_h ';
$rollie_user_info_class = " col-12 ";
}
elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 3){
$rollie_class_c = " rollie_my_acc_nav_wide_c ";
}
	echo "<div class='".$rollie_class_c.$rollie_dash_class."  rollie_my_acc_container rollie_f_b_f '>";
	echo 	"<figure class=' ".$rollie_user_info_class."  '>";
	echo 		"<img class='mx-auto d-block' src=".get_avatar_url( get_current_user_id()).">";
	echo 		"<figcaption class='pt-1'>";

				if (!empty($rollie_current_user->user_login)) {
				echo "<p><span class='rollie_my_acc_nav_login'>".$rollie_current_user->user_login." "."</span>";
				echo  "<span><a href=".wp_logout_url().">". __( 'Logout', 'woocommerce' )."</a></span></p>";
				}

				if (! empty($rollie_current_user->user_firstname)||!empty($rollie_current_user->user_lastname)) {
				echo "<p class='rollie_my_acc_nav_name'>".$rollie_current_user->user_firstname." ".$rollie_current_user->user_lastname."</p>";
				}

				if (! empty($rollie_current_user->user_email)){
				echo "<p class='rollie_my_acc_nav_email'>".$rollie_current_user->user_email."</p>";
				} 	
	echo 		"</figcaption>";
	

		echo "</figure>";
}

 add_action('woocommerce_before_account_navigation','rollie_action_woo_before_account_navigation');
 function rollie_action_woo_after_account_navigation ()
{
	echo "</div>";
}   

 add_action('woocommerce_after_account_navigation','rollie_action_woo_after_account_navigation');


function rollie_action_woo_account_content()
{
echo  "<div class='row p-0 m-0 h-100'>";
	echo "<div class='p-0 col-12 rollie_f_headings rollie_title_text_color rollie_account_title' >".get_the_title()."</div>";
	echo "<div class='col-12 rollie_account_content'>";

}



function rollie_action_woo_account_content_wraper_end()
{

echo "</div>";
echo "</div>";
}






function rollie_woo_endpoint_title( $title, $id ) {
	if ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) { // add your endpoint urls
		$title =  __( 'Downloads', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'orders' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
		$title = __( 'Account Details', 'woocommerce' );
	}
	elseif(is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ){
		$title = __( 'Addresses', 'woocommerce' );
	}
	 elseif(is_wc_endpoint_url( 'payment-methods' ) && in_the_loop() ){
		$title = __( 'Payment Methods', 'woocommerce' );
	}
	 elseif(is_wc_endpoint_url( 'customer-logout' ) && in_the_loop() ){
		$title = __( 'Logout', 'woocommerce' );
	}
	 elseif(is_wc_endpoint_url( 'dashboard' ) && in_the_loop() ){
		$title = __( 'Dashboard', 'woocommerce' );
	}
	return $title;

}
add_filter( 'the_title', 'rollie_woo_endpoint_title', 10, 2 );

  add_action ('woocommerce_account_content','rollie_action_woo_account_content',1);
  add_action ('woocommerce_account_content','rollie_action_woo_account_content_wraper_end',200);