<?php
	if (is_active_sidebar( 'sidebar_right' ) && is_active_sidebar( 'sidebar_left' )){		
		$rollie_display_index = 3;
	}
	elseif (is_active_sidebar( 'sidebar_left' ) )	{
			$rollie_display_index = 1;
	}
	elseif (is_active_sidebar( 'sidebar_right' ) )	{
			$rollie_display_index = 2;
	}
	else {
			$rollie_display_index = 0;
	}
	
	$rollie_single_page_display_style_classes = [];
	$rollie_single_page_display_style_classes  [0]['content_col_width'] = ' col-10 col-md-8  '; // no sidebars
	$rollie_single_page_display_style_classes  [1]['content_col_width'] = ' col-10 col-md-8 '; //has left sidebar
	$rollie_single_page_display_style_classes  [2]['content_col_width'] = ' col-10 col-md-8 ';//has right sidebar
	$rollie_single_page_display_style_classes  [3]['content_col_width'] = ' col-10 col-md-8 ';//has right and left sidebar

	$rollie_single_page_display_style_classes  [0]['content_offset'] = ' offset-1 offset-md-0 offset-md-2 ';
	$rollie_single_page_display_style_classes  [1]['content_offset'] = ' offset-1 offset-md-0 ';
	$rollie_single_page_display_style_classes  [2]['content_offset'] = ' offset-1 offset-md-0 offset-md-2 ';
	$rollie_single_page_display_style_classes  [3]['content_offset'] = ' offset-1 offset-md-0 ';

	$rollie_single_page_display_style_classes  [0]['sidebar_l_offset'] = '';
	$rollie_single_page_display_style_classes  [1]['sidebar_l_offset'] = '';
	$rollie_single_page_display_style_classes  [2]['sidebar_l_offset'] = '';
	$rollie_single_page_display_style_classes  [3]['sidebar_l_offset'] = '';

	$rollie_single_page_display_style_classes  [0]['sidebar_r_offset'] = '';
	$rollie_single_page_display_style_classes  [1]['sidebar_r_offset'] = '';
	$rollie_single_page_display_style_classes  [2]['sidebar_r_offset'] = '';
	$rollie_single_page_display_style_classes  [3]['sidebar_r_offset'] = '';

	$rollie_single_page_sidebar_width = "col-2";