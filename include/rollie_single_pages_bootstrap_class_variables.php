<?php
 $rollie_sidebar_col = 'col-'.get_theme_mod('rollie_single_page_l_sidebar_size',2);
  $rollie_multiply = (get_theme_mod('rollie_posts_page_l',2)==3 > 2 ? 2 : 1); 
  $rollie_main_col = 12 - $rollie_multiply * intval(get_theme_mod('rollie_posts_page_l_sidebar_size',2));
  $rollie_main_col  =  'col-'.  $rollie_main_col ;

if (get_theme_mod('rollie_single_page_l_ignore',false)  ){
		if ( is_active_sidebar( 'sidebar_left' )){
	$rollie_allow_sidebar_l = true;
	}else{
	$rollie_allow_sidebar_l = false ;
	}
	if ( is_active_sidebar( 'sidebar_right' )){
	$rollie_allow_sidebar_r = true;
	}else{
	$rollie_allow_sidebar_r = false ;
	}
}else{

	if (get_theme_mod('rollie_single_page_l',2) == 3 ){
	$rollie_allow_sidebar_r = true;
	$rollie_allow_sidebar_l = true;
	}	
	elseif(get_theme_mod('rollie_single_page_l',2) == 1){
	$rollie_allow_sidebar_r = false;
	$rollie_allow_sidebar_l = true;
	}
	elseif(get_theme_mod('rollie_single_page_l',2) == 4){
	$rollie_allow_sidebar_r = true;
	$rollie_allow_sidebar_l = false;
	}else{	
	$rollie_allow_sidebar_r = false ;
	$rollie_allow_sidebar_l = false;
	}
}

$rollie_allow_sidebars=true;


if ( class_exists( 'WooCommerce' ) ) {
	if (is_account_page()){
		$rollie_allow_sidebars = false;
	} 
}
	if ( $rollie_allow_sidebar_r && $rollie_allow_sidebar_l && $rollie_allow_sidebars){		
		$rollie_display_index = 3;
	}
	elseif ( $rollie_allow_sidebar_l && 	$rollie_allow_sidebars)	{
			$rollie_display_index = 1;
	}
	elseif ($rollie_allow_sidebar_r && $rollie_allow_sidebars)	{
			$rollie_display_index = 2;
	}
	else {
			$rollie_display_index = 0;
	}
	
