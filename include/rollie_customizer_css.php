<?php
		function rgba2rgb($color) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgb(0,0,0)';
    if ( false === strpos( $color, 'rgba' ) ) {
        return $color;
    }
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgb('.$red.','.$green.','.$blue.')';
}


function rollie_customizer_css () 
{



	
			//nAVBAR_FONT	
				$rollie_font_navbar ['U']	= get_theme_mod('rollie_font_navbar_U'	,false);
				$rollie_font_navbar ['ls']	= get_theme_mod( 'rollie_font_navbar_ls',0.6);
				$rollie_font_navbar ['lh']	= get_theme_mod( 'rollie_font_navbar_lh',1.4);
				$rollie_font_navbar_obj	= get_theme_mod('rollie_font_navbar_obj');
				$rollie_font_navbar ['alt_enable']	= get_theme_mod('rollie_font_navbar_alt_enable'	,false	);
				$rollie_font_navbar ['alt']	= get_theme_mod('rollie_font_navbar_alt'	,'Arial');
				$rollie_font_navbar ['alt_weight']	= get_theme_mod('rollie_font_navbar_alt_weight'	, 300	);
				$rollie_font_navbar ['max']	= get_theme_mod("rollie_font_navbar_max",16) ;
				$rollie_font_navbar ['min']	= get_theme_mod("rollie_font_navbar_min",16) ;
				$rollie_font_navbar ['vw_min'] = get_theme_mod("rollie_font_navbar_vw_min",500) ;
				$rollie_font_navbar ['vw_max'] = get_theme_mod("rollie_font_navbar_vw_max",1200) ;
				$rollie_font_navbar_obj = json_decode($rollie_font_navbar_obj);
				$rollie_font_navbar['disable_bold_italic'] ='true';


			 //headers Font
				$rollie_font_headings ['U']	= get_theme_mod('rollie_font_headings_U',true);
				$rollie_font_headings ['ls']	= get_theme_mod( 'rollie_font_headings_ls'	,1.1);
				$rollie_font_headings ['lh']	= get_theme_mod( 'rollie_font_headings_lh'	,1.4);
				$rollie_font_headings_obj		= get_theme_mod('rollie_font_headings_obj');
				$rollie_font_headings ['max']	= get_theme_mod("rollie_font_headings_max",46) ;
				$rollie_font_headings ['min']	= get_theme_mod("rollie_font_headings_min",32) ;
				$rollie_font_headings['h2_max']	= get_theme_mod("rollie_font_headings_h2_max",30) ;
				$rollie_font_headings['h2_min']	= get_theme_mod("rollie_font_headings_h2_min",26) ;
				$rollie_font_headings ['vw_min'] = get_theme_mod("rollie_font_headings_vw_min",500) ;
				$rollie_font_headings ['vw_max'] = get_theme_mod("rollie_font_headings_vw_max",1200) ;
				$rollie_font_headings ['sub_pos']	= get_theme_mod('rollie_font_headings_sub_pos',1);	
				$rollie_font_headings ['alt_enable']	= get_theme_mod('rollie_font_headings_alt_enable',false	);
				$rollie_font_headings ['alt']	= get_theme_mod('rollie_font_headings_alt'	,'Arial');
				$rollie_font_headings ['alt_weight']	= get_theme_mod('rollie_font_headings_alt_weight', 300	);
				$rollie_font_headings ['align'] = get_theme_mod("rollie_font_headings_align",2);
				$rollie_font_headings_obj = json_decode($rollie_font_headings_obj);
				$rollie_font_headings ['disable_bold_italic'] ='true';		
			
			 //SUBTITLES FONT
				$rollie_font_subtitles ['U']	= get_theme_mod('rollie_font_subtitles_U',false);
				$rollie_font_subtitles ['ls']	= get_theme_mod( 'rollie_font_subtitles_ls'	,0.7);
				$rollie_font_subtitles ['lh']	= get_theme_mod( 'rollie_font_subtitles_lh'	,1.4);
				$rollie_font_subtitles_obj		= get_theme_mod('rollie_font_subtitles_obj');
				$rollie_font_subtitles ['max']	= get_theme_mod("rollie_font_subtitles_max",32) ;
				$rollie_font_subtitles ['min']	= get_theme_mod("rollie_font_subtitles_min",26) ;
				$rollie_font_subtitles['h4_max']	= get_theme_mod("rollie_font_subtitles_h4_max",30) ;
				$rollie_font_subtitles['h4_min']	= get_theme_mod("rollie_font_subtitles_h4_min",26) ;
				$rollie_font_subtitles ['vw_min'] = get_theme_mod("rollie_font_subtitles_vw_min",500) ;
				$rollie_font_subtitles ['vw_max'] = get_theme_mod("rollie_font_subtitles_vw_max",1200) ;
				$rollie_font_subtitles ['alt_enable']	= get_theme_mod('rollie_font_subtitles_alt_enable',false);
				$rollie_font_subtitles ['alt']	= get_theme_mod('rollie_font_subtitles_alt'	,'Arial');
				$rollie_font_subtitles ['alt_weight']	= get_theme_mod('rollie_font_subtitles_alt_weight', 300	);
				$rollie_font_subtitles ['align'] = get_theme_mod("rollie_font_subtitles_align",2);
				$rollie_font_subtitles_obj = json_decode($rollie_font_subtitles_obj);
				
				$rollie_font_subtitles['disable_bold_italic'] = 'true';
			 //Exceerpt FONT
				
				$rollie_font_excerpt ['ls']	= get_theme_mod( 'rollie_font_excerpt_ls'	,0.0);
				$rollie_font_excerpt ['lh']	= get_theme_mod( 'rollie_font_excerpt_lh'	,1.4);
				$rollie_font_excerpt_obj		= get_theme_mod('rollie_font_excerpt_obj');
				$rollie_font_excerpt ['max']	= get_theme_mod("rollie_font_excerpt_max",16) ;
				$rollie_font_excerpt ['min']	= get_theme_mod("rollie_font_excerpt_min",16) ;
				$rollie_font_excerpt ['vw_min'] = get_theme_mod("rollie_font_excerpt_vw_min",500) ;
				$rollie_font_excerpt ['vw_max'] = get_theme_mod("rollie_font_excerpt_vw_max",1200) ;
				$rollie_font_excerpt ['alt_enable']	= get_theme_mod('rollie_font_excerpt_alt_enable',false);
				$rollie_font_excerpt ['alt']	= get_theme_mod('rollie_font_excerpt_alt'	,'Arial');
				$rollie_font_excerpt ['alt_weight']	= get_theme_mod('rollie_font_excerpt_alt_weight', 300	);
				$rollie_font_excerpt ['alt_weight_b']	= get_theme_mod('rollie_font_excerpt_alt_weight_b', 600	);
				$rollie_font_excerpt ['align'] = get_theme_mod("rollie_font_excerpt_align",2);
				$rollie_font_excerpt_obj = json_decode(	$rollie_font_excerpt_obj);	
				$rollie_font_excerpt['disable_bold_italic'] = 'false';		
			 //pp_content FONT

				$rollie_font_pp_content ['ls']	= get_theme_mod( 'rollie_font_pp_content_ls'	,0.0);
				$rollie_font_pp_content ['lh']	= get_theme_mod( 'rollie_font_pp_content_lh'	,1.4);
				$rollie_font_pp_content_obj		= get_theme_mod('rollie_font_pp_content_obj');
				$rollie_font_pp_content ['max']	= get_theme_mod("rollie_font_pp_content_max",19) ;
				$rollie_font_pp_content ['min']	= get_theme_mod("rollie_font_pp_content_min",17) ;
				$rollie_font_pp_content ['vw_min'] = get_theme_mod("rollie_font_pp_content_vw_min",500) ;
				$rollie_font_pp_content ['vw_max'] = get_theme_mod("rollie_font_pp_content_vw_max",1200) ;
				$rollie_font_pp_content ['alt_enable']	= get_theme_mod('rollie_font_pp_content_alt_enable',false);
				$rollie_font_pp_content ['alt']	= get_theme_mod('rollie_font_pp_content_alt','Arial');
				$rollie_font_pp_content ['alt_weight']	= get_theme_mod('rollie_font_pp_content_alt_weight', 300	);
				$rollie_font_pp_content ['alt_weight_b']	= get_theme_mod('rollie_font_pp_content_alt_weight_b', 600	);
				$rollie_font_pp_content ['align'] = get_theme_mod("rollie_font_pp_content_align",1);
				$rollie_font_pp_content_obj	= json_decode($rollie_font_pp_content_obj	);
				$rollie_font_pp_content ['disable_bold_italic'] = 'false';
			 // website_s FONT
				$rollie_font_website_s ['U']	= get_theme_mod('rollie_font_website_s_U',false);
				$rollie_font_website_s ['ls']	= get_theme_mod( 'rollie_font_website_s_ls',0.1);
				$rollie_font_website_s ['lh']	= get_theme_mod( 'rollie_font_website_s_lh',1.4);
				$rollie_font_website_s_obj	= get_theme_mod('rollie_font_website_s_obj');
				$rollie_font_website_s ['max']	= get_theme_mod("rollie_font_website_s_max",24) ;
				$rollie_font_website_s ['min']	= get_theme_mod("rollie_font_website_s_min",21) ;
				$rollie_font_website_s ['vw_min'] = get_theme_mod("rollie_font_website_s_vw_min",500) ;
				$rollie_font_website_s ['vw_max'] = get_theme_mod("rollie_font_website_s_vw_max",1200) ;
				$rollie_font_website_s ['alt_enable']	= get_theme_mod('rollie_font_website_s_alt_enable',false);
				$rollie_font_website_s ['alt']	= get_theme_mod('rollie_font_website_s_alt','Arial');
				$rollie_font_website_s ['alt_weight']	= get_theme_mod('rollie_font_website_s_alt_weight', 300	);
				$rollie_font_website_s ['align'] = get_theme_mod("rollie_font_website_s_align",1);
				$rollie_font_website_s ['wiget_align'] = get_theme_mod("rollie_font_website_s_widget_align",2);
				$rollie_font_website_s_obj	 = json_decode(	$rollie_font_website_s_obj	);
				$rollie_font_website_s ['disable_bold_italic'] = 'true';	
			 // button and f FONT
				$rollie_font_b_f ['U']	= get_theme_mod('rollie_font_b_f_U',false);
				$rollie_font_b_f ['ls']	= get_theme_mod( 'rollie_font_b_f_ls',0.1);
				$rollie_font_b_f ['lh']	= get_theme_mod( 'rollie_font_b_f_lh',1.4);
				$rollie_font_b_f_obj	= get_theme_mod('rollie_font_b_f_obj');
				$rollie_font_b_f ['max']	= get_theme_mod("rollie_font_b_f_max",21) ;
				$rollie_font_b_f ['min']	= get_theme_mod("rollie_font_b_f_min",19) ;
				$rollie_font_b_f ['vw_min'] = get_theme_mod("rollie_font_b_f_vw_min",500) ;
				$rollie_font_b_f ['vw_max'] = get_theme_mod("rollie_font_b_f_vw_max",1200) ;
				$rollie_font_b_f ['alt_enable']	= get_theme_mod('rollie_font_b_f_alt_enable',false);
				$rollie_font_b_f ['alt']	= get_theme_mod('rollie_font_b_f_alt','Arial');
				$rollie_font_b_f ['alt_weight']	= get_theme_mod('rollie_font_b_f_alt_weight', 300);
				$rollie_font_b_f ['align'] = get_theme_mod("rollie_font_b_f_align",2);
				$rollie_font_b_f_obj = json_decode($rollie_font_b_f_obj);
				$rollie_font_b_f ['disable_bold_italic'] = 'true';
			 // comment FONT
				
				$rollie_font_comment ['ls']	= get_theme_mod( 'rollie_font_comment_ls',0.0);
				$rollie_font_comment ['lh']	= get_theme_mod( 'rollie_font_comment_lh',1.4);
				$rollie_font_comment_obj	= get_theme_mod('rollie_font_comment_obj');
				$rollie_font_comment ['max']	= get_theme_mod("rollie_font_comment_max",15) ;
				$rollie_font_comment ['min']	= get_theme_mod("rollie_font_comment_min",15) ;
				$rollie_font_comment ['vw_min'] = get_theme_mod("rollie_font_comment_vw_min",500) ;
				$rollie_font_comment ['vw_max'] = get_theme_mod("rollie_font_comment_vw_max",1200) ;
				$rollie_font_comment ['alt_enable']	= get_theme_mod('rollie_font_comment_alt_enable',true);
				$rollie_font_comment ['alt']	= get_theme_mod('rollie_font_comment_alt','helvetica');
				$rollie_font_comment ['alt_weight']	= get_theme_mod('rollie_font_comment_alt_weight',300);
				$rollie_font_comment ['align'] = get_theme_mod("rollie_font_comment_align",1);
				$rollie_font_comment_obj = json_decode($rollie_font_comment_obj);
				$rollie_font_comment['disable_bold_italic'] = 'true';
				
			// widget FONT
				
				$rollie_font_widget ['ls']	= get_theme_mod( 'rollie_font_widget_ls',0.0);
				$rollie_font_widget ['lh']	= get_theme_mod( 'rollie_font_widget_lh',1.4);
				$rollie_font_widget_obj	= get_theme_mod('rollie_font_widget_obj');
				$rollie_font_widget ['max']	= get_theme_mod("rollie_font_widget_max",16) ;
				$rollie_font_widget ['min']	= get_theme_mod("rollie_font_widget_min",16) ;
				$rollie_font_widget ['vw_min'] = get_theme_mod("rollie_font_widget_vw_min",500) ;
				$rollie_font_widget ['vw_max'] = get_theme_mod("rollie_font_widget_vw_max",1200) ;
				$rollie_font_widget ['alt_enable']	= get_theme_mod('rollie_font_widget_alt_enable',false);
				$rollie_font_widget ['alt']	= get_theme_mod('rollie_font_widget_alt','Arial');
				$rollie_font_widget ['alt_weight']	= get_theme_mod('rollie_font_widget_alt_weight', 300);
				$rollie_font_widget ['alt_weight_b']	= get_theme_mod('rollie_font_widget_alt_weight_b', 600);
				$rollie_font_widget ['align'] = get_theme_mod("rollie_font_widget_align",1);
				$rollie_font_widget_obj = json_decode($rollie_font_widget_obj);
				$rollie_font_widget ['disable_bold_italic'] ='false';
			 // footer_sub FONT
				$rollie_font_footer_sub ['U']	= get_theme_mod('rollie_font_footer_sub_U',false);
				$rollie_font_footer_sub ['ls']	= get_theme_mod( 'rollie_font_footer_sub_ls',0.8);
				$rollie_font_footer_sub ['lh']	= get_theme_mod( 'rollie_font_footer_sub_lh',1.4);
				$rollie_font_footer_sub_obj	= get_theme_mod('rollie_font_footer_sub_obj');
				$rollie_font_footer_sub ['max']	= get_theme_mod("rollie_font_footer_sub_max",13) ;
				$rollie_font_footer_sub ['min']	= get_theme_mod("rollie_font_footer_sub_min",13) ;
				$rollie_font_footer_sub ['vw_min'] = get_theme_mod("rollie_font_footer_sub_vw_min",500) ;
				$rollie_font_footer_sub ['vw_max'] = get_theme_mod("rollie_font_footer_sub_vw_max",1200) ;
				$rollie_font_footer_sub ['alt_enable']	= get_theme_mod('rollie_font_footer_sub_alt_enable',true);
				$rollie_font_footer_sub ['alt']	= get_theme_mod('rollie_font_footer_sub_alt','helvetica');
				$rollie_font_footer_sub ['alt_weight']	= get_theme_mod('rollie_font_footer_sub_alt_weight', 300);
				$rollie_font_footer_sub ['alt_weight_b']	= get_theme_mod('rollie_font_footer_sub_alt_weight_b', 600);
				$rollie_font_footer_sub ['align'] = get_theme_mod("rollie_font_footer_sub_align",2);
				$rollie_font_footer_sub_obj = json_decode($rollie_font_footer_sub_obj);
				
				$rollie_font_footer_sub['disable_bold_italic'] ='false';	
			 // footer FONT
				$rollie_font_footer ['U']	= get_theme_mod('rollie_font_footer_U',false);
				$rollie_font_footer ['ls']	= get_theme_mod( 'rollie_font_footer_ls',1);
				$rollie_font_footer ['lh']	= get_theme_mod( 'rollie_font_footer_lh',1.4);
				$rollie_font_footer_obj	= get_theme_mod('rollie_font_footer_obj');
				$rollie_font_footer ['max']	= get_theme_mod("rollie_font_footer_max",16) ;
				$rollie_font_footer ['min']	= get_theme_mod("rollie_font_footer_min",16) ;
				$rollie_font_footer ['vw_min'] = get_theme_mod("rollie_font_footer_vw_min",500) ;
				$rollie_font_footer ['vw_max'] = get_theme_mod("rollie_font_footer_vw_max",1200) ;
				$rollie_font_footer ['alt_enable']	= get_theme_mod('rollie_font_footer_alt_enable',false);
				$rollie_font_footer ['alt']	= get_theme_mod('rollie_font_footer_alt','arial');
				$rollie_font_footer ['alt_weight']	= get_theme_mod('rollie_font_footer_alt_weight', 300);
				$rollie_font_footer ['align'] = get_theme_mod("rollie_font_footer_align",2);
				$rollie_font_footer ['disable_bold_italic'] ='true';
				$rollie_font_footer_obj = json_decode($rollie_font_footer_obj);
				
				
				
				
			 // metainfo font 
				$rollie_font_metainfo ['U']	= get_theme_mod('rollie_font_metainfo_U',true);
				$rollie_font_metainfo ['ls']	= get_theme_mod( 'rollie_font_metainfo_ls',0.0);
				$rollie_font_metainfo ['lh']	= get_theme_mod( 'rollie_font_metainfo_ls',1.4);
				$rollie_font_metainfo ['a_ls']	= get_theme_mod( 'rollie_font_metainfo_a_ls',0.8);
				$rollie_font_metainfo_obj	= get_theme_mod('rollie_font_metainfo_obj');
				$rollie_font_metainfo ['max']	= get_theme_mod("rollie_font_metainfo_max",14) ;
				$rollie_font_metainfo ['min']	= get_theme_mod("rollie_font_metainfo_min",14) ;
				$rollie_font_metainfo ['vw_min'] = get_theme_mod("rollie_font_metainfo_vw_min",500) ;
				$rollie_font_metainfo ['vw_max'] = get_theme_mod("rollie_font_metainfo_vw_max",1200) ;
				$rollie_font_metainfo ['alt_enable']	= get_theme_mod('rollie_font_metainfo_alt_enable',false);
				$rollie_font_metainfo ['alt']	= get_theme_mod('rollie_font_metainfo_alt','Arial');
				$rollie_font_metainfo ['alt_weight']	= get_theme_mod('rollie_font_metainfo_alt_weight', 300);
				$rollie_font_metainfo_obj = json_decode($rollie_font_metainfo_obj);
				$rollie_font_metainfo['disable_bold_italic'] ='true';	
				
				
				
			 // excerpt_s font 
				$rollie_font_excerpt_s ['U']	= get_theme_mod('rollie_font_excerpt_s_U',false);
				$rollie_font_excerpt_s ['ls']	= get_theme_mod( 'rollie_font_excerpt_s_ls',0.0);
				$rollie_font_excerpt_s ['lh']	= get_theme_mod( 'rollie_font_excerpt_s_lh',1.4);
				$rollie_font_excerpt_s_obj	= get_theme_mod('rollie_font_excerpt_s_obj');
				$rollie_font_excerpt_s ['max']	= get_theme_mod("rollie_font_excerpt_s_max",14) ;
				$rollie_font_excerpt_s ['min']	= get_theme_mod("rollie_font_excerpt_s_min",14) ;
				$rollie_font_excerpt_s ['vw_min'] = get_theme_mod("rollie_font_excerpt_s_vw_min",500) ;
				$rollie_font_excerpt_s ['vw_max']= get_theme_mod("rollie_font_excerpt_s_vw_max",1200) ;
				$rollie_font_excerpt_s ['align'] = get_theme_mod("rollie_font_excerpt_s_align",2);
				$rollie_font_excerpt_s ['alt_enable']	= get_theme_mod('rollie_font_excerpt_s_alt_enable',true);
				$rollie_font_excerpt_s ['alt']	= get_theme_mod('rollie_font_excerpt_s_alt','Arial');
				$rollie_font_excerpt_s ['alt_weight']	= get_theme_mod('rollie_font_excerpt_s_alt_weight', 100);
				
				$rollie_font_excerpt_s_obj = json_decode($rollie_font_excerpt_s_obj);		
				$rollie_font_excerpt_s['disable_bold_italic'] ='false';
				


		
		$rollie_google_s [] = rollie_add_font($rollie_font_headings_obj,$rollie_font_headings,'rollie_font_headings',array('.rollie_f_headings' ,'h1 ' ,'h2'));	
		$rollie_google_s [] = rollie_add_font($rollie_font_navbar_obj,$rollie_font_navbar,'rollie_font_navbar',array('.rollie_f_navbar'));
		$rollie_google_s [] = rollie_add_font($rollie_font_subtitles_obj,$rollie_font_subtitles,'rollie_font_subtitles',array('.rollie_f_subtitles','h3','h4'));
		$rollie_google_s [] = rollie_add_font($rollie_font_excerpt_obj,$rollie_font_excerpt,'rollie_font_excerpt',array('.rollie_f_excerpt'));
		$rollie_google_s [] = rollie_add_font($rollie_font_pp_content_obj,$rollie_font_pp_content,'rollie_font_pp_content',array('.rollie_f_pp_content','.rollie_font_first','body'));
		$rollie_google_s [] = rollie_add_font($rollie_font_website_s_obj,$rollie_font_website_s,'rollie_font_website_s',array('.rollie_f_website_s'));
		$rollie_google_s [] = rollie_add_font($rollie_font_b_f_obj,$rollie_font_b_f,'rollie_font_b_f',array('.rollie_f_b_f'));
		$rollie_google_s [] = rollie_add_font($rollie_font_comment_obj,$rollie_font_comment,'rollie_font_comment',array('.rollie_f_comment'));
		$rollie_google_s [] = rollie_add_font($rollie_font_widget_obj,$rollie_font_widget,'rollie_font_widget',array('.rollie_f_widget'));
		$rollie_google_s [] = rollie_add_font($rollie_font_footer_sub_obj ,$rollie_font_footer_sub ,'rollie_font_footer_sub',array('.rollie_f_footer_sub'));
		$rollie_google_s [] = rollie_add_font($rollie_font_footer_obj,$rollie_font_footer,'rollie_font_footer',array('.rollie_f_footer'));
		$rollie_google_s [] = rollie_add_font($rollie_font_metainfo_obj,$rollie_font_metainfo,'rollie_font_metainfo',array('.rollie_f_meta'));
		$rollie_google_s [] = rollie_add_font($rollie_font_excerpt_s_obj,$rollie_font_excerpt_s,'rollie_font_excerpt_s',array('.rollie_f_excerpt_s'));


		$rollie_google_s = array_values(array_filter($rollie_google_s));

				rollie_add_google_font_stylesheet($rollie_google_s);

































		$rollie_main_theme_color = new Rollie_Gradient ("rollie_main_theme_color", "#ffffff",'.rollie_main_color',array('background'));
 
     wp_add_inline_style( 'rollie_stylesheet', $rollie_main_theme_color->css_snippet());
	$rollie_second_theme_color = new Rollie_Gradient ("rollie_second_theme_color", "#212121",'.rollie_second_color',array('background'));
 
     wp_add_inline_style( 'rollie_stylesheet', $rollie_second_theme_color->css_snippet());
		list ( $rollie_second_color_r , $rollie_second_color_g , $rollie_second_color_b ) = sscanf ( $rollie_second_theme_color->rgb_gr_1, "#%02x%02x%02x");
			$rollie_third_theme_color = new Rollie_Gradient ("rollie_third_theme_color", "#a37e2c",'.rollie_third_color',array('background'));

 
     wp_add_inline_style( 'rollie_stylesheet', $rollie_third_theme_color->css_snippet());

		list ( $rollie_third_color_r , $rollie_third_color_g , $rollie_third_color_b ) = sscanf ( $rollie_third_theme_color->rgb_gr_1, "#%02x%02x%02x");
		$rollie_third_color =   $rollie_third_theme_color->rgb_gr_1;



			$rollie_darker_main_theme_color = new Rollie_Gradient ("rollie_darker_main_theme_color", "#e3e6e8",'.rollie_darker_main_color',array('background'));

     wp_add_inline_style( 'rollie_stylesheet',  $rollie_darker_main_theme_color->css_snippet());
			$rollie_sidebar_theme_color = new Rollie_Gradient ("rollie_sidebar_theme_color", "#e3e6e8",'.rollie_sidebar_color,.rollie_sidebar_left , .rollie_sidebar_right',array('background'));
					
     wp_add_inline_style( 'rollie_stylesheet',  $rollie_sidebar_theme_color->css_snippet());
		list ( $rollie_sidebar_theme_color_r , $rollie_sidebar_theme_color_g , $rollie_sidebar_theme_color_b ) = sscanf ( $rollie_sidebar_theme_color->rgb_gr_1, "#%02x%02x%02x");


			$rollie_title_bg_theme_color= new Rollie_Gradient ("rollie_title_bg_theme_color", "#e3e6e8",'.rollie_title_bg_color',array('background'));
				
     wp_add_inline_style( 'rollie_stylesheet', 	 $rollie_title_bg_theme_color->css_snippet());

			$rollie_post_classic_title_bg= new Rollie_Gradient ("rollie_post_classic_title_bg_theme_color", "#ffffff",'.rollie_post_classic_title_bg_color',array('background'));
				
     wp_add_inline_style( 'rollie_stylesheet', 	 $rollie_post_classic_title_bg->css_snippet());

			$rollie_post_modern_title_bg= new Rollie_Gradient ("rollie_post_modern_title_bg_theme_color", "#ffffff",'.rollie_post_modern_title_bg_color',array('background'));
				
     wp_add_inline_style( 'rollie_stylesheet', 	 $rollie_post_modern_title_bg->css_snippet());

	$rollie_navbar_color = new Rollie_Gradient ('rollie_navbar_color','rgba(255,255,255,0.8)' ,'.rollie_navbar_color', array('background'));
					
     wp_add_inline_style( 'rollie_stylesheet', 	 $rollie_navbar_color->css_snippet());
		$rollie_button_b = new Rollie_Gradient ('rollie_button_b_color','#212121' ,'.rollie_button ,.woocommerce button.button , .woocommerce a.button ,.rollie_woo_order_table_banner    ,.woocommerce   .button ,.shop_table > thead', array('background-color'));
					
     wp_add_inline_style( 'rollie_stylesheet', 	 $rollie_button_b->css_snippet());		
	$rollie_button_b_h = new Rollie_Gradient ('rollie_button_b_h_color','#ffffff' ,' .rollie_button:hover , .rollie_button:active,.woocommerce a.button:hover,.woocomerce .button:hover', array('background'));
						
     wp_add_inline_style( 'rollie_stylesheet',  $rollie_button_b_h->css_snippet());	
	$rollie_button_alt_b = new Rollie_Gradient ('rollie_button_alt_b_color','#212121' ,'.rollie_button_alt,.woocommerce button.button.alt ,.woocommerce a.button.alt,.woocommerce .checkout-button',array( 'background-color'));
						
     wp_add_inline_style( 'rollie_stylesheet',  $rollie_button_alt_b->css_snippet());		
	$rollie_button_alt_b_h = new Rollie_Gradient ('rollie_button_alt_b_h_color','#ffffff' ,' .rollie_button_alt:hover,.woocommerce button.button.alt:hover ,.woocommerce a.button.alt:hover,.woocommerce .checkout-button:hover',array('background'));
     wp_add_inline_style( 'rollie_stylesheet',  $rollie_button_alt_b_h->css_snippet());











	
	$rollie_icon_link_color = get_theme_mod("rollie_icon_link_color","#212121");
	$rollie_icon_link_color_h = get_theme_mod("rollie_icon_link_color_h","#ffffff");
	$rollie_icon_link_shadow = get_theme_mod("rollie_icon_link_shadow","#a37e2c");
	
	$rollie_icon_aside_color = get_theme_mod("rollie_icon_aside_color","#212121");
	$rollie_icon_aside_color_h = get_theme_mod("rollie_icon_aside_color_h","#ffffff");
	$rollie_icon_aside_shadow = get_theme_mod("rollie_icon_aside_shadow","#a37e2c");
	
	$rollie_icon_quote_color = get_theme_mod("rollie_icon_quote_color","#212121");
	$rollie_icon_quote_color_h = get_theme_mod("rollie_icon_quote_color_h","#ffffff");
	$rollie_icon_quote_shadow = get_theme_mod("rollie_icon_quote_shadow","#a37e2c");
	
	$rollie_icon_audio_color = get_theme_mod("rollie_icon_audio_color","#212121");
	$rollie_icon_audio_color_h = get_theme_mod("rollie_icon_audio_color_h","#ffffff");
	$rollie_icon_audio_shadow = get_theme_mod("rollie_icon_audio_shadow","#a37e2c");
	
	$rollie_icon_video_color = get_theme_mod("rollie_icon_video_color","#212121");
	$rollie_icon_video_color_h = get_theme_mod("rollie_icon_video_color_h","#ffffff");
	$rollie_icon_video_shadow = get_theme_mod("rollie_icon_video_shadow","#a37e2c");
	
	$rollie_icon_status_color = get_theme_mod("rollie_icon_status_color","#212121");
	$rollie_icon_status_color_h = get_theme_mod("rollie_icon_status_color_h","#ffffff");
	$rollie_icon_status_shadow = get_theme_mod("rollie_icon_status_shadow","#a37e2c");
	
	$rollie_icon_gallery_color = get_theme_mod("rollie_icon_gallery_color","#212121");
	$rollie_icon_gallery_color_h = get_theme_mod("rollie_icon_gallery_color_h","#ffffff");
	$rollie_icon_gallery_shadow = get_theme_mod("rollie_icon_gallery_shadow","#a37e2c");
	
	$rollie_form_input_border_color = get_theme_mod("rollie_form_input_border_color","#a37e2c");
	$rollie_form_input_color_backg = get_theme_mod("rollie_form_input_color_backg","rgba(255,255,255,0.8)");
	

	
	$rollie_comment_s_s_color = get_theme_mod("rollie_comment_s_s_color","#212121");
	$rollie_comment_f_s_color = get_theme_mod("rollie_comment_f_s_color","#212121");
	
	$rollie_icon_comment_shadow = get_theme_mod("rollie_icon_comment_shadow","#ffffff");
	$rollie_icon_comment_color_h = get_theme_mod("rollie_icon_comment_color_h","#212121");
	$rollie_icon_comment_color = get_theme_mod("rollie_icon_comment_color","#818181");
	

	
	
	$rollie_button_color = get_theme_mod("rollie_button_color","#ffffff");
	$rollie_button_shadow = get_theme_mod("rollie_button_shadow","#a37e2c");
	$rollie_button_color_h = get_theme_mod("rollie_button_color_h","#a37e2c");

	
	
	
	$rollie_icon_color_first = get_theme_mod("rollie_icon_color_first","#212121");
	$rollie_icon_color_first_h = get_theme_mod("rollie_icon_color_first_h","#ffffff");
	$rollie_icon_color_first_shadow = get_theme_mod("rollie_icon_color_first_shadow","#a37e2c");
	$rollie_icon_color_second = get_theme_mod("rollie_icon_color_second","#212121");
	$rollie_icon_color_second_h = get_theme_mod("rollie_icon_color_second_h","#ffffff");
	$rollie_icon_color_second_shadow = get_theme_mod("rollie_icon_color_second_shadow","#a37e2c");
	
	
	
	$rollie_sidebar_background = get_theme_mod("rollie_sidebar_background","#ffffff") ;
	$rollie_widget_background = get_theme_mod("rollie_widget_background","#ffffff") ;
	$rollie_second_text_color = get_theme_mod('rollie_second_text_color','#ffffff');
	$rollie_widget_title_text_color = get_theme_mod("rollie_widget_title_text_color","#212121") ;
	
	$rollie_widget_text_color = get_theme_mod("rollie_widget_text_color","#212121") ;
	$rollie_widget_shadow_color = get_theme_mod("rollie_widget_shadow_color","#a37e2c") ;


	
			
			
	
			
			$rollie_main_theme_text_color =get_theme_mod("rollie_main_theme_text_color","#212529");
			
			$rollie_title_text_color   = get_theme_mod("rollie_title_text_color", '#212121' ) ;
			$rollie_fourth_text_color = get_theme_mod("rollie_fourth_text_color","#228050");
			
			$rollie_subtitle_text_color = get_theme_mod("rollie_subtitle_text_color","#818181");
			
			$rollie_category_title_text_color = get_theme_mod("rollie_category_title_text_color","#a37e2c");
			
			
		//Theme color section end
			
			

			
			
			
			$rollie_navbar_text_color=get_theme_mod("rollie_navbar_text_color","#212121");
			$rollie_navbar_hover_text_color=get_theme_mod("rollie_navbar_text_hover_color","#212121");
			$rollie_navbar_chevron =get_theme_mod("rollie_navbar_chevron","#212121");
			$rollie_navbar_hover_chevron =get_theme_mod("rollie_navbar_hover_chevron","#a37e2c");

















				
wp_add_inline_style( 'rollie_stylesheet'," .rollie_posts_shadow {box-shadow: 0px 0px 8px 1px	". get_theme_mod('rollie_shadow_theme_color','#e3e6e8')."}")	;
wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_child_pages_thumbnail_img:hover{ 	background-color: rgba(".  $rollie_second_color_r .',' .  $rollie_second_color_g . ',' . $rollie_second_color_b.", 0.8);	}");
wp_add_inline_style( 'rollie_stylesheet'," .swiper-pagination-bullet-active{background:	". $rollie_third_color ."!important ;}");
wp_add_inline_style ( 'rollie_stylesheet',".rollie_fancy_line,.woocommerce h3 ,.woocommerce h2\n {border-color: \n ".$rollie_third_theme_color->rgb.";} ");

 		if ( get_theme_mod ('rollie_embl_subtitles' ,1 ) == 1){

			wp_add_inline_style ( 'rollie_stylesheet',".woocommerce h3 ,.woocommerce h2 \n{\n border-left-style:solid \n}");
		} 
		 if ( get_theme_mod ('rollie_embl_subtitles' ,1) == 2){
		wp_add_inline_style ( 'rollie_stylesheet',".woocommerce h3  ,.woocommerce h2\n{\n border-bottom-style:solid \n}");

		} 
	

wp_add_inline_style( 'rollie_stylesheet'," .rollie_pagination * { border-color:". $rollie_darker_main_theme_color->rgb .";\n color: ". $rollie_main_theme_text_color ." ;}");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_pagination_active * { color: ". $rollie_third_color ." ; }");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_pagination_link:hover{ color: ". $rollie_third_color ." ;\n  background :". $rollie_darker_main_theme_color->rgb_gr_1 .";	}");



	
wp_add_inline_style( 'rollie_stylesheet'," .rollie_main_theme_text_color{ color: ".	$rollie_main_theme_text_color   .";}");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_second_text_color{ color: ".	$rollie_second_text_color .";}");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_title_text_color{color: ".	 $rollie_title_text_color  .";}");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_fourth_text_color, article a { color: ".	 $rollie_fourth_text_color  ." ;}");
wp_add_inline_style( 'rollie_stylesheet'," .rollie_category_title_text_color,a:hover,.rollie_footer_dropdown_item:hover{ color: ".	$rollie_category_title_text_color   .";}");
/*hr
{
border-color:color: ".	$rollie_category_title_text_color   .";
}
*/
wp_add_inline_style( 'rollie_stylesheet'," .rollie_text_color_3 { color: ".	$rollie_category_title_text_color   ."; }");
			
			
wp_add_inline_style( 'rollie_stylesheet'," .rollie_subtitle_text_color { color: ".	$rollie_subtitle_text_color  ." ; }");

			

 if ( get_theme_mod('rollie_font_pp_content_bolder_links',true) ){ 
	wp_add_inline_style( 'rollie_stylesheet'," 	main p a { font-weight:bolder;}");
		
	}



			
		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_first,.cld-common-wrap,.fas,   .far  , .fal,  .fab { color: ". $rollie_icon_color_first ." ;\n  text-shadow: 0px 0px 3px  ". $rollie_icon_color_first_shadow ." ; }");
			
			

		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_first:hover,.cld-common-wrap:hover,.fas:hover ,.fal:hover,.fab:hover,.far:hover,button:hover .fas,button:hover .far ,button:hover .fas,button:hover .fal{ color: ". $rollie_icon_color_first_h ." ; }");
			
		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_second { color: ". $rollie_icon_color_second ." !important ;\n  text-shadow: 0px 0px 3px  ". $rollie_icon_color_second_shadow ." !important;}");
			
		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_second:hover { color: ". $rollie_icon_color_second_h ." !important ; }");
			$rollie_comment_stl = '';
				if (get_theme_mod('rollie_comment_section_shadow',true)){ 
					$rollie_comment_stl .= "border-style:none;\n";
					$rollie_comment_stl .= "box-shadow: 0px 0px 8px 1px ".$rollie_comment_s_s_color.";\n";
					$rollie_comment_stl .= "border-color: ".$rollie_comment_s_s_color.";\n";
				}
				else{	
					$rollie_comment_stl .=	"box-shadow:none ;\n";	
					$rollie_comment_stl .= "border-color: ".$rollie_comment_s_s_color.";\n";	
				}	

		wp_add_inline_style( 'rollie_stylesheet',"rollie_comment { ".$rollie_comment_stl." }");
				
				
		wp_add_inline_style( 'rollie_stylesheet',".rollie_form_control { border-color:". $rollie_comment_f_s_color ."  ; }");
			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_form_control:focus,.rollie_form_control:hover{ box-shadow: 0px 0px 8px 1px ". $rollie_comment_f_s_color .";\n  border-color:". $rollie_comment_f_s_color ."; }");

			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_comment,.cld-common-wrap {color: ". $rollie_icon_comment_color ."  ;}");



				 if ( !empty ($rollie_icon_comment_shadow))	
					{
			wp_add_inline_style( 'rollie_stylesheet',".rollie_icon_comment,.cld-common-wrap { text-shadow: 0px 0px 3px  ". $rollie_icon_comment_shadow ." ;}");
					
					}
				
				
			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_icon_comment:hover ,.cld-common-wrap:hover {color: ". $rollie_icon_comment_color_h ."  ;}");
				
					
	$rollie_button_shadow_stl = '';

			 if (  get_theme_mod('rollie_button_shadow_on')){	
								$rollie_button_shadow_stl =	"box-shadow: 0px 0px 8px 1px  ". $rollie_button_shadow ." !important;\n";
				}	
								
			if ( !get_theme_mod('rollie_button_rounded',true))	{	
			$rollie_button_shadow_stl =	"border-radius: 0rem;\n";
				}	


				wp_add_inline_style( 'rollie_stylesheet'," .rollie_button,.shop_table > thead, .rollie_woo_order_table_banner,.woocommerce .button { color: ". $rollie_button_color ."  !important;\n border-color:". $rollie_button_shadow ." !important; ".$rollie_button_shadow_stl."}");
				wp_add_inline_style( 'rollie_stylesheet'," .rollie_button:hover,.rollie_button:active{ color: ". $rollie_button_color_h ."  ;}");
				
				
			
				
				
				wp_add_inline_style( 'rollie_stylesheet'," .rollie_nav_link,.rollie_dropdown_item{color: ".	$rollie_navbar_text_color   .";}");
				
			
				
				wp_add_inline_style( 'rollie_stylesheet'," .rollie_nav_link:hover,.rollie_dropdown_item:hover { color: ".	$rollie_navbar_hover_text_color   ."; }");
				
				wp_add_inline_style( 'rollie_stylesheet'," .rollie_chevron_menu { color: ".	 $rollie_navbar_chevron  ." !important; }");
				
				
			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_chevron_menu:hover{ color: ".	$rollie_navbar_hover_chevron   ."!important;}");
				
			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_menu_top_logo_h { height: ".	get_theme_mod("rollie_menu_top_logo_h",40)."px" .";}");
			wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_footer_logo_h>img { height: ".	get_theme_mod("rollie_footer_logo_h",100)."px" ."; }");

			
			
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_link_custom_colors:hover { color: ". $rollie_icon_link_color_h ." ; }");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_link_custom_colors { color: ". $rollie_icon_link_color ." ;\n  text-shadow: 0px 0px 3px  ". $rollie_icon_link_shadow ." ;}");
			
			
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_aside_custom_colors:hover { color: ". $rollie_icon_aside_color_h ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_aside_custom_colors{ color: ". $rollie_icon_aside_color ." ;\n text-shadow: 0px 0px 3px  ". $rollie_icon_aside_shadow ." ;	}");
			
			
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_quote_custom_colors:hover { color: ". $rollie_icon_quote_color_h ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_quote_custom_colors { color: ". $rollie_icon_quote_color ." ;\n text-shadow: 0px 0px 3px  ". $rollie_icon_quote_shadow ." ;}");
			
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_audio_custom_colors:hover { color: ". $rollie_icon_audio_color_h ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_audio_custom_colors{ color: ". $rollie_icon_audio_color ." ;\n text-shadow: 0px 0px 3px  ". $rollie_icon_audio_shadow ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_video_custom_colors:hover { color: ". $rollie_icon_video_color_h ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_video_custom_colors{ color: ". $rollie_icon_video_color ." ; \n text-shadow: 0px 0px 3px  ". $rollie_icon_video_shadow ." ;	}");
			
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_status_custom_colors:hover { color: ". $rollie_icon_status_color_h ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_status_custom_colors { color: ". $rollie_icon_status_color ." ; \n text-shadow: 0px 0px 3px  ". $rollie_icon_status_shadow ." ;}");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_gallery_custom_colors:hover { color: ". $rollie_icon_gallery_color_h ." ; }");
			
			wp_add_inline_style( 'rollie_stylesheet'," .rollie_icon_gallery_custom_colors{ color: ". $rollie_icon_gallery_color ." ; \n text-shadow: 0px 0px 3px  ". $rollie_icon_gallery_shadow ." ;}");


		wp_add_inline_style( 'rollie_stylesheet',".quantity:active,.quantity-button:hover,.quantity-button :focus-within,.input-text:active,.input-text:hover,.input-text:focus-within,.rollie_form_input:active, .rollie_form_input:hover,[type='radio']:checked:hover + label::after,[type='radio']:not(:checked):hover + span::before,[type='checkbox']:checked:hover + span::after,[type='checkbox']:not(:checked):hover + label::before,.rollie_form_input:focus-within { background: ".rgba2rgb($rollie_form_input_color_backg)."; }");
		
		wp_add_inline_style( 'rollie_stylesheet',"[type='checkbox']:checked + span::before,[type='checkbox']:not(:checked) + span::before,[type='radio']:checked + label::before,[type='radio']:not(:checked) + label::before,.quantity ,.input-text,.rollie_form_input{ \n border-width:".get_theme_mod('rollie_form_input_b_width',1)."px; \n color: ".get_theme_mod('rollie_form_input_text_color','	#212529').";\n border-style:solid; \n border-radius: ".get_theme_mod('rollie_form_input_radius',2)."px ;	\n border-color: ".  $rollie_form_input_border_color     ." !important; \n background: ". $rollie_form_input_color_backg ."; }");
wp_add_inline_style('rollie_stylesheet','.rollie_form_input button { border-style:none; }');
			
		wp_add_inline_style( 'rollie_stylesheet',"[type='radio']:checked + label:after,[type='radio']:not(:checked) + label:after,[type='checkbox']:checked + span:after,[type='checkbox']:not(:checked) + span:after{\n  background:".$rollie_form_input_border_color .";\n }");




		wp_add_inline_style( 'rollie_stylesheet'," label:hover::before  , .quantity:focus-within,.input-text:focus-within,	.rollie_search_form_shadow:focus-within{ box-shadow: 0px 0px 8px 1px ". $rollie_form_input_border_color     ."; }");
		
		wp_add_inline_style( 'rollie_stylesheet'," 	.swiper-pagination-bullet{		background:	". $rollie_darker_main_theme_color->rgb_gr_1 .";}");
		
			
			
			
		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_sidebar_left  .widget-title ,.rollie_sidebar_right  .widget-title{ color: ". $rollie_widget_title_text_color ."!important;}");
			
		wp_add_inline_style( 'rollie_stylesheet'," 	.rollie_sidebar_left > .widget, .rollie_sidebar_right > .widget{	box-shadow:  0px 0px 8px 1px ". $rollie_widget_shadow_color ." ; \n  background:	". $rollie_widget_background ."; \n  color: ". $rollie_widget_text_color ."; }");
			
			
			

	

			if (get_theme_mod('rollie_disable_sidebar_mobile',true))
				{  
				wp_add_inline_style( 'rollie_stylesheet'," 	@media screen and (max-width:   768px){ .rollie_sidebar_left, .rollie_sidebar_right { display:none; }}	");
				}
				
	if (class_exists('WooCommerce'))
	{
		require get_template_directory() . '/include/rollie_woo_customizer_css.php';
	}
}
 


function multi_unique($src){
	$output = array_map("unserialize",
		array_unique(array_map("serialize", $src)));
	return $output;
}
function get_string_between($string, $start, $end){
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}



function rollie_text_align_f($align)
{
	switch ($align){
		case 1:
		return "text-align:left;";
		break;
		case 2:
		return "text-align:center;";
		break;
		case 3:
		return "text-align:justify;";
		break;
		case 4:
		return "text-align:right;"; 
		break;
		default:
		return ""; 
	}
	
	
}




	function rollie_add_font ($font_obj,$font_array,$font_str,$font_class_a)
	{
						
		$css_snippet = '';
					
					if (  !empty($font_str) && !empty($font_array))
					{
						$rollie_class="";
						$rollie_initial_class="";
						$rollie_apply_h2 = false;
						$rollie_apply_h4 = false;
						$i = 0;
						
						foreach ($font_class_a as $classes) 
						{
							
							if ($i>0)
							{
								$o = ",";
								
								
								
							}
							else
							{
								
								$rollie_initial_class = $classes;
								$o= "";
			
								
							}
							$rollie_class.=$o.$classes;
							$i++;	
							
						} 
				
						if (array_key_exists ( "h2_min" ,  $font_array )) {
					
									$rollie_apply_h2 = true;
									$rollie_heading_str = 'h2';	
								}
						if (array_key_exists ( "h4_min" ,  $font_array )) {
									$rollie_apply_h4 = true;
									$rollie_heading_str = 'h4';
								}		
				
						if ($font_array ['min']< $font_array ['max'] && $font_array ['vw_min'] < $font_array ['vw_max'])
						{ 

						$css_snippet .=	 $rollie_class ."{"."\n";					 
							
							$css_snippet .=	"font-size:". $font_array ['min'] ."px;";
							$css_snippet .=	"}"."\n";
						
							
						$css_snippet .=	"@media screen and (min-width: ".  	$font_array ['vw_min'] ."px)"."{"."\n";	
							
						$css_snippet .=	$rollie_class ."{"."\n";	
							
										  
							$css_snippet .=	"font-size: calc( ". $font_array ['min']  ."px + ( ( ".  $font_array ['max']  ." - ".  $font_array ['min'] ." ) * (100vw - ". 	  $font_array ['vw_min'] ."px) / (".   $font_array ['vw_max'] ." - ".  $font_array ['vw_min'] .") ) );";
							$css_snippet .=	"}"."\n";
						$css_snippet .=	"}"."\n";
						$css_snippet .=	"@media screen and (min-width: ".  	$font_array ['vw_max'].") {"."\n";
						$css_snippet .=	 $rollie_class ."{"."\n";						 
							
						$css_snippet .=		"font-size: ".$font_array ['max'] ."px;";
							$css_snippet .=	"}"."\n";
						$css_snippet .=	"}"."\n";
					
					
					
		
					if ($rollie_apply_h2 || $rollie_apply_h4)
					{
						
		

									$css_snippet .= $rollie_initial_class."_".$rollie_heading_str."{"."\n"; 
								$css_snippet .= "font-size: ".$font_array [$rollie_heading_str.'_min']."px;";
								$css_snippet .=	"}"."\n";
								$css_snippet .= "@media screen and (min-width: ".	$font_array ['vw_min'] ."px) {"."\n";
								$css_snippet .= $rollie_initial_class."_".$rollie_heading_str." , ".$rollie_heading_str."{"."\n" ;
								$css_snippet .= "font-size: calc( ". $font_array [$rollie_heading_str.'_min']  ."px + ( ( ".  $font_array [$rollie_heading_str.'_max']  ." - ".  $font_array [$rollie_heading_str.'_min'] ." ) * (100vw - ". $font_array ['vw_min'] ."px) / (".  $font_array ['vw_max'] ." - ".$font_array ['vw_min'] .") ) ) !important;";
								$css_snippet .=	"}"."\n";
								$css_snippet .=	"}"."\n";
								$css_snippet .= "@media screen and (min-width: ".	$font_array ['vw_max'] ."px) {"."\n";
								$css_snippet .= $rollie_initial_class."_".$rollie_heading_str." , ".$rollie_heading_str."{"."\n" ;
								$css_snippet .=	"font-size: calc( ".$font_array [$rollie_heading_str.'_min']  ."px + ( ( ".$font_array [$rollie_heading_str.'_max']  ." - ".$font_array [$rollie_heading_str.'_min'] ." ) * (100vw - ".$font_array ['vw_min'] ."px) / (".$font_array ['vw_max'] ." - ".$font_array ['vw_min'] .") ) ) !important;";
								$css_snippet .=	"}"."\n";
								$css_snippet .=	"}"."\n";
					}
			
			
		}

		if ($font_array ['alt_enable'] == false && is_object($font_obj))
		{
			
			(is_null($font_obj->font))?( $rollie_font = "Rokkitt" ):( $rollie_font = $font_obj->font );				
			
			
			(is_null($font_obj->regularweight))?( $rollie_font_w = "300" ):( $rollie_font_w  = $font_obj->regularweight );
			
			
			
			
			if ($font_array ['disable_bold_italic'] == 'false') 
			{		
				
				
				
				
				(is_null($font_obj->italicweight)||$font_obj->italicweight=="italic")?( $rollie_font_i = "" ):( $rollie_font_i  = $font_obj->italicweight );
					(is_null($font_obj->boldweight))?( $rollie_font_b = "700" ):( $rollie_font_b  = $font_obj->boldweight );
				$rollie_i_w = str_replace( "italic", '',$rollie_font_i);
				
				$rollie_i_w = str_replace( "i",'', $rollie_i_w);
				
				
				$css_snippet .= $rollie_class." > i, ".$rollie_initial_class."_i"." {"."\n";
				if ( is_string($rollie_i_w)): $rollie_str_a = "normal"; else: $rollie_str_a = $rollie_i_w ; endif;
				if ( is_string($rollie_font_b)): $rollie_str_b = "normal"; else:  $rollie_str_b = $rollie_font_b ; endif;
				$css_snippet .= "font-weight: ".$rollie_str_a ;		
				$css_snippet .=	"}"."\n";
			
				$css_snippet .=	$rollie_class."> b,". $rollie_initial_class."_b"."{"."\n";
				$css_snippet .=	"font-weight:".$rollie_str_b;  
				$css_snippet .=	"}"."\n";
				
			}
			
			else
			{
				
				$rollie_font_b= '';
				$rollie_font_i= '';
			}
			
			(is_null($font_obj->subsets))?( $rollie_font_s = "latin" ):( $rollie_font_s = $font_obj->subsets );
			


			
				$css_snippet .= $rollie_class."{"."\n"; 				
				 if ( $font_array ['min'] == $font_array ['max']) {						
					$css_snippet .= "font-size: ".$font_array ['max']."px;";	
				 } 

				if ( is_string($rollie_font_w)): $rollie_str_c = "normal"; else: $rollie_str_c = $rollie_font_w; endif;	

				$css_snippet .= "font-family: '".$rollie_font ."'  , Arial,serif;";
				$css_snippet .= "font-weight: ".$rollie_str_c.";";
				$css_snippet .=	"letter-spacing: ".$font_array ['ls']."px;";
				$css_snippet .=	"line-height: ".$font_array ['lh'].";";

				if (array_key_exists ( "U" ,  $font_array ) && $font_array['U'] == true) { 						
					$css_snippet .=	"text-transform:uppercase;";																	
				}
									
									
									
				if (array_key_exists ( "align" ,  $font_array ) && $font_array['align']) 
				{	
					$css_snippet .= rollie_text_align_f($font_array['align']);
				}
				$css_snippet .=	"}"."\n";



				if(! empty($rollie_font_s) ) 
				{
					$rollie_font_s 	= $rollie_font_s ;
				}	
				else
				{
					$rollie_font_s 	= "latin" ;
				}
				

				if ( empty($rollie_font_w) || $rollie_font_w == "regular"    )
				{
					$rollie_font_w = "regular";	
				}	
				
				if ( empty($rollie_font_i) ||  $rollie_font_i == "italic"   )
				{
					$rollie_font_i = "";	
				}	
				
				
				if (  empty($rollie_font_b)  ||  $rollie_font_b == "regular" )
				{
					$rollie_font_b = "";	
				}	
				
				
				
				
				$rollie_font = preg_replace("/[\s_]/", "+", $rollie_font) ;
				


				$rollie_google_font = ['name'=>$rollie_font , 'weight'=> $rollie_font_w , 'boldweight'=>$rollie_font_b , 'italicweight' =>$rollie_font_i, 'subset'=>$rollie_font_s,'disable_bold_italic'=>$font_array['disable_bold_italic']];


				
				
				
				
			}
			else
			{ 	
				
				$css_snippet .= $rollie_class."{"."\n"; 	

					if (   $font_array ['min'] ==  $font_array ['max']) {				
				$css_snippet .= 	"font-size: ".$font_array ['max'] ."px;";
										
									
				$css_snippet .="font-family: ".  $font_array ['alt'].", Arial,serif;";	
				 if ( is_string($font_array ['alt_weight'])): $rollie_str_d = "normal"; else: $rollie_str_d =  $font_array ['alt_weight']; endif ;
				$css_snippet .="font-weight: ".$rollie_str_d .";";
				$css_snippet .="letter-spacing: ".  $font_array ['ls'] ."px;";
				$css_snippet .="line-height: ".  $font_array ['lh'] .";";

				if (array_key_exists ( "U" ,  $font_array ) && $font_array['U'] == true) { 						
					$css_snippet .=	"text-transform:uppercase;";																	
				}
							
				if (array_key_exists ( "align" ,  $font_array ) && $font_array['align']) {	
						$css_snippet .= rollie_text_align_f($font_array['align']);	
				} 					
				$css_snippet .=	"}"."\n";
			
				
				if ($rollie_apply_h2 || $rollie_apply_h4)
				{

					$css_snippet .= $rollie_initial_class."_".$rollie_heading_str." , ".$rollie_heading_str." {"; 			
					$css_snippet .= "font-size: ".$font_array [$rollie_heading_str.'_max']."px;";
					$css_snippet .=	"}"."\n";

				}		
					
					

					
					
				}	
			}


     wp_add_inline_style( 'rollie_stylesheet', $css_snippet );

			if (isset($rollie_google_font))
			{
				
				return $rollie_google_font;
			}
			
			
			
			
		}	

}



function rollie_add_google_font_stylesheet($rollie_google_s){
			if (!empty($rollie_google_s)&& $rollie_google_s != false )
		{	

			$rollie_google_s = multi_unique($rollie_google_s);
			//$rollie_google_compressed = [];
			$rollie_google_compressed  =  array(array('weight','name'));
			
			$temp_array = array(array('weight'));
			$rollie_google_compressed_s = array();
			$rollie_google_compressed_i = array();
			
			foreach ($rollie_google_s as $rollie_google_name )
			{
				
				if (is_null($rollie_google_name))
				{
					continue;
				}
				$temp_array_names[] = $rollie_google_name['name'] ;
				
			}
			
			
			
			
			foreach ($rollie_google_s as $rollie_google_name)
			{
				$isrepeated = false;
				
				
				
			//	if(isset($rollie_google_name['name'])) 
				//{
					//continue;
				//}
				
				
				if (!in_array($rollie_google_name['name'], $temp_array))
				{
					$temp_array [] = $rollie_google_name['name'];
					
				}
				else
				{
					$isrepeated = true;
				}

				if ($isrepeated )
				{
					if (!empty($rollie_google_name['weight']));
					{
						if (empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
						{
							$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['weight'].",";
						}
						else
						{
							$rollie_google_compressed[$rollie_google_name['name']]['weight'] .= $rollie_google_name['weight'].",";
						}
					}
					
					if ($rollie_google_name['disable_bold_italic'] == 'false')
					{
						if(!empty($rollie_google_name['boldweight']))
						{
							if(empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
							{
								$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['boldweight']."," ;
							}
							else 
							{	
								$rollie_google_compressed[$rollie_google_name['name']]['weight'] .= $rollie_google_name['boldweight'].",";
							}
						}
						if(!empty($rollie_google_name['italicweight']))
						{							
							if  ($rollie_google_name['italicweight']  != 'italic')
							{
								
								if(empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
								{
									$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['italicweight'].",";
								}
								else
								{
									$rollie_google_compressed[$rollie_google_name['name']]['weight'] .= $rollie_google_name['italicweight'].",";
								}													
								
							}
						}
					}
					
					
					
					
					
				}
				else 
				{	
					
					if ($rollie_google_name['disable_bold_italic'] == 'false' )
					{
						if(!empty($rollie_google_name['boldweight']))
						{
							
							if(empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
							{
								$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['boldweight'].",";
							}
							else 
							{	
								$rollie_google_compressed[$rollie_google_name['name']]['weight'] .= $rollie_google_name['boldweight'].",";
							}
						}
						if(!empty($rollie_google_name['italicweight']))
						{
							if  ($rollie_google_name['italicweight']  != 'italic')
							{
								
								if(empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
								{
									$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['italicweight'].",";
								}
								else
								{
									$rollie_google_compressed[$rollie_google_name['name']]['weight'] .= $rollie_google_name['italicweight'].",";
								}													
								
							}
						}
					}	
					
					$rollie_google_compressed[$rollie_google_name['name']]['name'] = $rollie_google_name['name'];
					
					if (!empty($rollie_google_name['weight']) )
					{
						if (empty($rollie_google_compressed[$rollie_google_name['name']]['weight']))
						{
							$rollie_google_compressed[$rollie_google_name['name']]['weight'] = $rollie_google_name['weight'].",";
						}
						else
						{
							$rollie_google_compressed[$rollie_google_name['name']]['weight'] .=  $rollie_google_name['weight'].",";
						}	
					}

					
					
				}
				
				if(isset($rollie_google_name['subset']) && !empty($rollie_google_name['subset'])) $rollie_google_compressed_s[] = $rollie_google_name['subset'];
				
				
			}
			
			
			$rollie_google_compressed_s = array_unique($rollie_google_compressed_s);
			$rollie_google_compressed_s =  implode(",",$rollie_google_compressed_s);
			

			


			
			$rollie_google_compressed_url = "";
			$rollie_google_compressed = array_values(array_filter($rollie_google_compressed));
			foreach ($rollie_google_compressed as $rollie_single_c )
			{
				if(empty($rollie_single_c['name'])) 
				{
					continue;
				}
				if ( !empty($rollie_single_c['weight']) && $rollie_single_c['weight'] != ',')
				{
					$rollie_single_c['weight'] = substr($rollie_single_c['weight'], 0, -1);
					$rollie_single_c['weight']  = explode(',', $rollie_single_c['weight']);
					$rollie_single_c['weight'] = array_unique($rollie_single_c['weight']);
					$rollie_single_c['weight'] = implode(",",$rollie_single_c['weight']);
					if (strpos($rollie_single_c['weight'],"italic"))
					{
						$rollie_single_c['weight'] = str_replace("italic","i",$rollie_single_c['weight']);
					}

					$rollie_single_c['weight'] = ":".$rollie_single_c['weight'];
					
				}
				else
				{
					$rollie_single_c['weight'] = "";
				}				
				
				if (empty($rollie_single_c['name']))
				{
					$rollie_google_compressed_url = $rollie_single_c['name'].$rollie_single_c['weight']."|";
				}
				else
				{
					$rollie_google_compressed_url .= $rollie_single_c['name'].$rollie_single_c['weight']."|";	
				}					
			}
			//deleting last "|" 
			
			$rollie_google_compressed_url = substr($rollie_google_compressed_url, 0, -1); 
			
			$rollie_google_compressed_url = 'https://fonts.googleapis.com/css?family='.$rollie_google_compressed_url.'&amp;subset='.$rollie_google_compressed_s;

			wp_enqueue_style('rollie_custom_google_fonts',$rollie_google_compressed_url);
			
			
	}
}

class Rollie_Gradient {
    // constructor

    public function __construct($theme_mod, $standard_color, $css_selector,$css_property, $css_before_value='' ) {
        $this->theme_mod = $theme_mod;
        $this->standard_color = $standard_color;
        $this->css_selector = $css_selector;
        $this->css_property = $css_property;

        if ($css_before_value) {
        		$this->css_before_value = $css_before_value;
        }else{
	$this->css_before_value =''	;
		}
		if (get_theme_mod($theme_mod.'_gr_1')){

				$this->rgb_gr_1 = $this->ToRgb( get_theme_mod($theme_mod.'_gr_1'));
		}else{
			$this->rgb_gr_1 =$standard_color;
		}
		if (get_theme_mod($theme_mod.'_gr_2')){
				$this->rgb_gr_2 = $this->ToRgb( get_theme_mod($theme_mod.'_gr_2'));
		}else{
			$this->rgb_gr_2 =$standard_color;
		}
		if (get_theme_mod($theme_mod.'_gr_3')){

				$this->rgb_gr_3 = $this->ToRgb( get_theme_mod($theme_mod.'_gr_3'));
		}else{
			$this->rgb_gr_3 =$standard_color;
		}	

if (get_theme_mod($theme_mod.'_gs' == 2)){
		$this->rgb = $this->ToRgb( get_theme_mod($theme_mod.'_gr_1'));
}
else
{
	$this->rgb = $this->ToRgb( get_theme_mod($theme_mod));
}

if(!$this->rgb)
{
	$this->rgb = $this->standard_color;
}
    }
	private function ToRgb ($color) {

				if ($color[0] && $color[0] !='#')
				{
			$color=(preg_split('/rgba?\(\s*|\s*,\s*|\s*\)/', $color, -1, PREG_SPLIT_NO_EMPTY));
			 return '#'.dechex($color[0]).dechex($color[1]).dechex($color[2]);
			}
			else
			{

				return $color;
			}

		}

    public function css_snippet($without_selectors = false) {
		$css_snippet_all = '';
		if ($without_selectors)
		{
			$css_snippet_before_a = array(' ');
			$css_snippet_after = '';
		}
		else{
			$css_snippet_before_a = array();
			foreach ($this->css_property as $key => $css_property) {
				$css_snippet_before_a[] = $this->css_selector.' { '. $css_property .":";
				}
			$css_snippet_after = "; } ";
		}

				if (get_theme_mod( $this->theme_mod.'_gs') == 2) { //means gradient active
					foreach ( $css_snippet_before_a as $css_snippet_before )
				      $css_snippet_all .= $css_snippet_before." linear-gradient( " . get_theme_mod($this->theme_mod.'_angle_gr',0) . "deg, " . get_theme_mod( $this->theme_mod.'_gr_1',$this->standard_color) . " " .       get_theme_mod( $this->theme_mod.'_stop_gr_1',100) . "% , " . get_theme_mod( $this->theme_mod.'_gr_2',$this->standard_color) . " " . get_theme_mod( $this->theme_mod.'_stop_gr_2',0) . "% , " . get_theme_mod( $this->theme_mod.'_gr_3',$this->standard_color) . " " . get_theme_mod( $this->theme_mod.'_stop_gr_3',0) . "% )".$css_snippet_after ;
				
				    }
				    else{
						foreach ( $css_snippet_before_a as $css_snippet_before )
							{
				     		 $css_snippet_all .=  $css_snippet_before.$this->css_before_value.' '.get_theme_mod($this->theme_mod,$this->standard_color).$css_snippet_after ;
							}
 						
				    }
		  return $css_snippet_all;
	}
}
