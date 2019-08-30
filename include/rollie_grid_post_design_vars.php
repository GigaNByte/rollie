<?php

$rollie_template =  rollie_page_template_sufix();
$rollie_m_a ='';
if (get_theme_mod( 'rollie_post_margin_auto'.$rollie_template ,true)){
	$rollie_m_a = 'm-auto';
}
$rollie_post_display_style_classes                      = [];
$rollie_post_display_style_classes [0]['first_div_col'] = '  col-12 ' . $rollie_m_a;
$rollie_post_display_style_classes [1]['first_div_col'] = '  col-12 col-md-6 ' . $rollie_m_a;

if ( $rollie_allow_sidebar_r && $rollie_allow_sidebar_l && $rollie_allow_sidebars ) {
	$rollie_post_display_style_classes [2]['first_div_col'] = ' col-6 col-lg-4 p-2 p-lg-auto ' . $rollie_m_a;
} else {
	$rollie_post_display_style_classes [2]['first_div_col'] = ' col-6 col-md-4 p-2 p-md-auto ' . $rollie_m_a;
}

if (get_theme_mod('rollie_grid_type'.$rollie_template ,1)==2){
	$rollie_post_display_style_classes [0]['first_div_col'] = ' rollie_grid_item ' ;
	$rollie_post_display_style_classes [1]['first_div_col'] = ' rollie_grid_item ' ;
	$rollie_post_display_style_classes [2]['first_div_col'] = ' rollie_grid_item ' ;
}

$rollie_post_display_style_classes [0]['second_div_col_classic'] = ' col-5 ';
$rollie_post_display_style_classes [1]['second_div_col_classic'] = ' col-lg-5 col-6 ';
$rollie_post_display_style_classes [2]['second_div_col_classic'] = ' col-12 col-md-7 col-lg-6 ';







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

$rollie_row_counter                    = 0;
$rollie_rows_counter                   = 0;
$rollie_current_posts_row_limit        = 0;
$rollie_current_style                  = 0;
$rollie_need_single_row_tag_at_style_2 = true;
$rollie_post_page_default_style         = get_theme_mod( 'rollie_post_page_default_style'.$rollie_template ,2);
$rollie_post_page_one_on_row          = get_theme_mod( 'rollie_post_page_one_on_row'.$rollie_template,1 );
$rollie_post_page_two_on_row         = get_theme_mod( 'rollie_post_page_two_on_row'.$rollie_template ,1);
$rollie_post_page_raw_enable = get_theme_mod( 'rollie_post_page_raw_enable' . $rollie_template ,false );


$rollie_link_disabled = '';

function rollie_filter_page_link_link( $link, $post_id, $sample ) { 
  if (has_post_format('link') &&  function_exists( 'get_field' )){ 
     $link = get_field('rollie_external_link');
 }
 return $link;
}  
add_filter( 'page_link', 'rollie_filter_page_link_link', 30, 3 ); 	
