<?php
 $rollie_sidebar_col = 'col-'.get_theme_mod('rollie_posts_page_l_sidebar_size',2);
 $rollie_multiply = (get_theme_mod('rollie_posts_page_l',2) == 3  ? 2 : 1); 
  $rollie_main_col = 12 - $rollie_multiply * intval(get_theme_mod('rollie_posts_page_l_sidebar_size',2));
  $rollie_main_col  =  'col-'.  $rollie_main_col ;


if (get_theme_mod('rollie_posts_page_l_ignore',false)  ){
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
	if (get_theme_mod('rollie_posts_page_l',2) == 3 ){
	$rollie_allow_sidebar_r = true;
	$rollie_allow_sidebar_l = true;
	}	
	elseif(get_theme_mod('rollie_posts_page_l',2) == 1){
	$rollie_allow_sidebar_r = false;
	$rollie_allow_sidebar_l = true;
	}
	elseif(get_theme_mod('rollie_posts_page_l',2) == 4){
	$rollie_allow_sidebar_r = true;
	$rollie_allow_sidebar_l = false;
	}else{	
	$rollie_allow_sidebar_r = false ;
	$rollie_allow_sidebar_l = false;
	}
}
		
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

			$rollie_m_a ='';
	         if (get_theme_mod( 'rollie_post_margin_auto'.$rollie_template ,true))
			 {
				 $rollie_m_a = 'm-auto';
			 }
	$rollie_post_display_style_classes                      = [];
	$rollie_post_display_style_classes [0]['first_div_col'] = ' col-12 ' . $rollie_m_a;
	$rollie_post_display_style_classes [1]['first_div_col'] = 'col-6 ' . $rollie_m_a;

if ( $rollie_allow_sidebar_r && $rollie_allow_sidebar_l && $rollie_allow_sidebars ) {
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



	$rollie_post_display_style_classes [0]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 ';
	$rollie_post_display_style_classes [1]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 ';
	$rollie_post_display_style_classes [2]['post_excerpt_div_col_modern'] = ' col-12 col-md-10 offset-md-1 ';

