<?php
$rollie_allow_sidebars = true;
if ( class_exists( 'WooCommerce' ) ) {
	if (is_account_page()){
		$rollie_allow_sidebars = false;
	} 
}


if ( is_category() ) {


		$rollie_template = '_ct';

} elseif ( is_archive() ) {
	$rollie_template = '_ar';
} elseif ( is_search() ) {
	$rollie_template = '_se';
} else {
	$rollie_template = '';

}


	         if (get_theme_mod( 'rollie_post_margin_auto'.$rollie_template ,true))
			 {
				 $rollie_m_a = 'm-auto';
			 }
	$rollie_post_display_style_classes                      = [];
	$rollie_post_display_style_classes [0]['first_div_col'] = ' col-12 ' . $rollie_m_a;
	$rollie_post_display_style_classes [1]['first_div_col'] = 'col-6 ' . $rollie_m_a;

if ( is_active_sidebar( 'sidebar_right' ) || is_active_sidebar( 'sidebar_left' ) && $rollie_allow_sidebars ) {
	$rollie_post_display_style_classes [2]['first_div_col'] = ' col-6 col-lg-4 p-2 p-lg-auto ' . $rollie_m_a;
} else {
	$rollie_post_display_style_classes [2]['first_div_col'] = ' col-6 col-md-4 p-2 p-md-auto ' . $rollie_m_a;
}

	$rollie_post_display_style_classes [0]['second_div_col'] = ' col-5 ';
	$rollie_post_display_style_classes [1]['second_div_col'] = ' col-lg-5 col-6 ';
	$rollie_post_display_style_classes [2]['second_div_col'] = ' col-12 col-md-7 col-lg-6 ';

	$rollie_post_display_style_classes [0]['post_metadata_div'] = '';
	$rollie_post_display_style_classes [1]['post_metadata_div'] = ' p-0 ';
	$rollie_post_display_style_classes [2]['post_metadata_div'] = ' p-0 p-lg-2 rollie_force_p_0 ';

	$rollie_post_display_style_classes [0]['post_author_date_div'] = '';
	$rollie_post_display_style_classes [1]['post_author_date_div'] = ' p-0 ';
	$rollie_post_display_style_classes [2]['post_author_date_div'] = '';

	$rollie_post_display_style_classes [0]['post_excerpt_lenght'] = 'full';
	$rollie_post_display_style_classes [1]['post_excerpt_lenght'] = 30;
	$rollie_post_display_style_classes [2]['post_excerpt_lenght'] = 1;

	$rollie_post_display_style_classes [0] ['post_excerpt_lenght_raw'] = 'full';
	$rollie_post_display_style_classes [1] ['post_excerpt_lenght_raw'] = 'full';
	$rollie_post_display_style_classes [2] ['post_excerpt_lenght_raw'] = 30;

	$rollie_post_display_style_classes [0]['post_meta_c_div_col'] = ' col-12 ';
	$rollie_post_display_style_classes [1]['post_meta_c_div_col'] = ' col-12 ';
	$rollie_post_display_style_classes [2]['post_meta_c_div_col'] = ' col-12 ';

	$rollie_post_display_style_classes [0]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 ';
	$rollie_post_display_style_classes [1]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 ';
	$rollie_post_display_style_classes [2]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 offset-md-1 ';

