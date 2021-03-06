<?php
$rollie_bb_h1         = '';
$rollie_bb_ex         = '';
$rollie_header_class  = '';
$rollie_wrapper_class = '';

if ( is_author() ) {
	$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
}
switch ( get_theme_mod( 'rollie_header_ex_style' . rollie_page_template_sufix(), 2 ) ) {
	case 1:
		$rollie_bb_h1 .= ' col-12 ';
	case 2:
		$rollie_bb_h1 .= ' offset-0 col-6 offset-md-1 col-md-5 ';
		$rollie_bb_ex .= ' col-6 offset-md-0 col-md-5 text-center';
		break;
	case 3:
		$rollie_bb_h1 .= ' offset-0 col-12 offset-md-1 col-md-10 ';
		$rollie_bb_ex .= ' offset-0 col-12 offset-md-1 col-md-10 ';
		break;
	case 4:// responsive
		$rollie_bb_h1 .= ' offset-0 col-12 offset-md-1 col-md-5 ';
		$rollie_bb_ex .= ' offset-0 col-12 offset-md-0 col-md-5 ';
		break;
}
if ( get_theme_mod( 'rollie_header_style' . rollie_page_template_sufix(), 'classic' ) == 'modern' || get_theme_mod( 'rollie_header_style' . rollie_page_template_sufix(), 'classic' ) == 'modern_transparent' ) {
	$rollie_bb_h1        = 'd-inline-block';
	$rollie_bb_ex        = 'd-flex';
	$rollie_header_class = 'd-inline-block';

} else {
	$rollie_header_class = ' row w-100';
}
switch ( get_theme_mod( 'rollie_header_h_align' . rollie_page_template_sufix(), 3 ) ) {
	case 1:// top
		$rollie_wrapper_class .= ' rollie_h_left ';
		break;
	case 2:// center
		$rollie_wrapper_class .= ' rollie_h_center ';
		break;
	case 3:// bottom
		$rollie_wrapper_class .= ' rollie_h_right ';
		break;
}

switch ( get_theme_mod( 'rollie_header_v_align' . rollie_page_template_sufix(), 3 ) ) {
	case 1:
		$rollie_wrapper_class .= ' rollie_v_top ';
		break;
	case 2:
		$rollie_wrapper_class .= ' rollie_v_center ';
		break;
	case 3:
		$rollie_wrapper_class .= ' rollie_v_bottom ';
		break;
}
if ( get_theme_mod( 'rollie_header_style' . rollie_page_template_sufix(), 'classic' ) == 'classic_transparent' || get_theme_mod( 'rollie_header_style' . rollie_page_template_sufix(), 'classic' ) == 'modern_transparent' ) {
	$rollie_header_class .= '  ';
} else {
	$rollie_header_class .= ' rollie_title_bg_color ';
}
$rollie_header_image_max_h = '';
if ( 'clean' != get_theme_mod( 'rollie_header_style' . rollie_page_template_sufix(), 'classic' ) ) {
	$rollie_header_image_max_h = '<div class="rollie_header_container row p-0 ">';
	$rollie_header_image_max_h = 'rollie_header_image_min_h' . rollie_page_template_sufix();
}
?>