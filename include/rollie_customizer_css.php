<?php
function rgba2rgb( $color ) {
	if ( empty( $color ) || is_array( $color ) ) {
		return 'rgb(0,0,0)';
	}
	if ( false === strpos( $color, 'rgba' ) ) {
		return $color;
	}
	$color = str_replace( ' ', '', $color );
	sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	return 'rgb(' . $red . ',' . $green . ',' . $blue . ')';
}

function rollie_customizer_css() {
	$rollie_inline_style = '';
	rollie_fonts_customizer_css();

	$rollie_main_theme_color = new Rollie_Gradient( 'rollie_main_theme_color', '#ffffff', '.rollie_main_color,.rollie_grid_item', array( 'background' ) );

	$rollie_inline_style      .= $rollie_main_theme_color->css_snippet();
	$rollie_second_theme_color = new Rollie_Gradient( 'rollie_second_theme_color', '#212121', '.rollie_second_color ,.rollie_footer.footer,.shop_table > thead ,.rollie_woo_order_table_banner, .rollie_top_menu_icons > button[aria-expanded="true"]', array( 'background' ) );

	$rollie_inline_style .= $rollie_second_theme_color->css_snippet();
	list($rollie_second_color_r, $rollie_second_color_g, $rollie_second_color_b) = sscanf( $rollie_second_theme_color->rgb, '#%02x%02x%02x' );
	$rollie_inline_style     .= '.rollie_table, .rollie_woo_order_table_banner border-color:' . $rollie_second_theme_color->rgb . ';}';
	$rollie_third_theme_color = new Rollie_Gradient( 'rollie_third_theme_color', '#a37e2c', '.rollie_third_color', array( 'background' ) );

	$rollie_inline_style .= $rollie_third_theme_color->css_snippet();

	$rollie_third_color = $rollie_third_theme_color->rgb_gr_1;

	$rollie_darker_main_theme_color = new Rollie_Gradient( 'rollie_darker_main_theme_color', '#e3e6e8', '.rollie_darker_main_color, address', array( 'background' ) );

	$rollie_inline_style       .= $rollie_darker_main_theme_color->css_snippet();
	$rollie_sidebar_theme_color = new Rollie_Gradient( 'rollie_sidebar_theme_color', '#e3e6e8', '.rollie_sidebar_color,.rollie_sidebar_left , .rollie_sidebar_right', array( 'background' ) );

	$rollie_inline_style .= $rollie_sidebar_theme_color->css_snippet();

	$rollie_title_bg_theme_color = new Rollie_Gradient( 'rollie_title_bg_theme_color', '#e3e6e8', '.rollie_title_bg_color', array( 'background' ) );

	$rollie_inline_style         .= $rollie_title_bg_theme_color->css_snippet();
	$rollie_post_classic_title_bg = new Rollie_Gradient( 'rollie_post_classic_title_bg_theme_color', '#ffffff', '.rollie_post_classic_title_bg_color', array( 'background' ) );

	$rollie_inline_style .= $rollie_post_classic_title_bg->css_snippet();

	$rollie_navbar_color = new Rollie_Gradient( 'rollie_navbar_color', 'rgba(255,255,255,0.8)', '.rollie_navbar_color', array( 'background' ) );

	$rollie_inline_style .= $rollie_navbar_color->css_snippet();
	$rollie_button_b      = new Rollie_Gradient( 'rollie_button_b_color', '#212121', '.rollie_button ,.woocommerce button.button ,.woocommerce #respond input#submit, .woocommerce a.button ,.woocommerce   .button ', array( 'background-color' ) );

	$rollie_inline_style .= $rollie_button_b->css_snippet();
	$rollie_button_b_h    = new Rollie_Gradient( 'rollie_button_b_h_color', '#ffffff', ' .rollie_button:hover , .woocommerce #respond input#submit:hover,.rollie_button:active,.woocommerce a.button:hover,.woocomerce .button:hover', array( 'background' ) );

	$rollie_inline_style .= $rollie_button_b_h->css_snippet();
	$rollie_button_alt_b  = new Rollie_Gradient( 'rollie_button_alt_b_color', '#212121', '.rollie_button_alt,.woocommerce button.button.alt ,.woocommerce a.button.alt,.woocommerce .checkout-button', array( 'background-color' ) );

	$rollie_inline_style  .= $rollie_button_alt_b->css_snippet();
	$rollie_button_alt_b_h = new Rollie_Gradient( 'rollie_button_alt_b_h_color', '#ffffff', ' .rollie_button_alt:hover,.woocommerce button.button.alt:hover ,.woocommerce a.button.alt:hover,.woocommerce .checkout-button:hover', array( 'background' ) );

	$rollie_shadow_button_h_snippet = '';
	if ( get_theme_mod( 'rollie_shadow_button_h', true ) ) {
		$rollie_shadow_button_h_snippet = ' box-shadow: 0px 0px 8px 1px' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . ';';
		$rollie_inline_style           .= '.rollie_button:hover , .woocommerce #respond input#submit:hover,.rollie_button:active,.woocommerce a.button:hover,.woocomerce .button:hover,.rollie_button_alt:hover,.woocommerce button.button.alt:hover ,.woocommerce a.button.alt:hover,.woocommerce .checkout-button:hover{box-shadow: 0px 0px 8px 1px	' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . '}';
	}

	$rollie_inline_style .= '.rollie_button , .woocommerce #respond input#submit,.rollie_button,.woocommerce a.button,.woocomerce .button { color:' . $rollie_button_b_h->rgb . '; border-color:' . $rollie_button_b_h->rgb . ';}';
	$rollie_inline_style .= '.rollie_button:hover , .woocommerce #respond input#submit:hover,.rollie_button:hover,.woocommerce a.button:hover,.woocomerce .button:hover { color:' . $rollie_button_b->rgb . '; border-color:' . $rollie_button_b->rgb . ';' . $rollie_shadow_button_h_snippet . '}';
	$rollie_inline_style .= ' .rollie_button_alt:hover,.woocommerce button.button.alt:hover ,.woocommerce a.button.alt:hover,.woocommerce .checkout-button:hover { color:' . $rollie_button_alt_b->rgb . '; border-color:' . $rollie_button_alt_b->rgb . ';' . $rollie_shadow_button_h_snippet . '}';
	$rollie_inline_style .= ' .rollie_button_alt,.woocommerce button.button.alt ,.woocommerce a.button.alt,.woocommerce .checkout-button{ color:' . $rollie_button_alt_b_h->rgb . '; border-color:' . $rollie_button_alt_b_h->rgb . ';}';
	$rollie_inline_style .= $rollie_button_alt_b_h->css_snippet();

	$rollie_form_input_border_color = get_theme_mod( 'rollie_form_input_border_color', '#a37e2c' );
	$rollie_form_input_color_backg  = get_theme_mod( 'rollie_form_input_color_backg', 'rgba(255,255,255,0.8)' );

	$rollie_icon_color_first        = get_theme_mod( 'rollie_icon_color_first', '#212121' );
	$rollie_icon_color_first_h      = get_theme_mod( 'rollie_icon_color_first_h', '#ffffff' );
	$rollie_icon_color_first_shadow = get_theme_mod( 'rollie_icon_color_first_shadow', '#a37e2c' );

	$rollie_second_text_color         = get_theme_mod( 'rollie_second_text_color', '#ffffff' );
	$rollie_main_theme_text_color     = get_theme_mod( 'rollie_main_theme_text_color', '#212529' );
	$rollie_title_text_color          = get_theme_mod( 'rollie_title_text_color', '#212121' );
	$rollie_fourth_text_color         = get_theme_mod( 'rollie_fourth_text_color', '#228050' );
	$rollie_subtitle_text_color       = get_theme_mod( 'rollie_subtitle_text_color', '#818181' );
	$rollie_category_title_text_color = get_theme_mod( 'rollie_category_title_text_color', '#a37e2c' );

	$rollie_navbar_text_color       = get_theme_mod( 'rollie_navbar_text_color', '#212121' );
	$rollie_navbar_hover_text_color = get_theme_mod( 'rollie_navbar_text_hover_color', '#212121' );
	$rollie_navbar_chevron          = get_theme_mod( 'rollie_navbar_chevron', '#212121' );
	$rollie_navbar_hover_chevron    = get_theme_mod( 'rollie_navbar_hover_chevron', '#a37e2c' );

	global $rollie_border_data;

	if ( get_theme_mod( 'rollie_shadow_menus', true ) ) {
		$rollie_inline_style .= '.rollie_menus_shadow {box-shadow: 0px 0px 8px 1px	' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . '}';
	}
	if ( get_theme_mod( 'rollie_shadow_posts' ) ) {
		$rollie_inline_style .= '.rollie_posts_shadow {box-shadow: 0px 0px 8px 1px	' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . '}';
	}
	if ( get_theme_mod( 'rollie_shadow_images', true ) ) {
		$rollie_inline_style .= '.rollie_images_shadow, .rollie_status_ajax_z  img,main img {box-shadow: 0px 0px 8px 1px	' . get_theme_mod( 'rollie_shadow_theme_color', '#e3e6e8' ) . '}';
	}

	$rollie_inline_style .= '.rollie_smart_banner_fade:hover{ 	background-color: rgba(' . $rollie_second_color_r . ',' . $rollie_second_color_g . ',' . $rollie_second_color_b . ', 0.8);	}';
	$rollie_inline_style .= '.swiper-pagination-bullet-active{background:	' . $rollie_third_color . '!important ;}';
	$rollie_inline_style .= ' .rollie_pagination:hover * , .rollie_pagination * ,.page-item , .rollie_fancy_line,.woocommerce h3 ,.woocommerce h2,address {border-color:  ' . $rollie_third_theme_color->rgb . ';}';

	$rollie_inline_style .= '.rollie_table{ ' . $rollie_border_data['tables']->css_snippet() . '}';
	$rollie_inline_style .= '.rollie_smart_banner_single img{ ' . $rollie_border_data['images']->css_snippet() . 'border-color:  ' . $rollie_third_theme_color->rgb . ';}';

	if ( get_theme_mod( 1 == 'rollie_embl_subtitles', 1 ) ) {
		$rollie_inline_style .= '.woocommerce h3 , .woocommerce h2 { border-left-style:solid; border-width:' . get_theme_mod( 'rollie_embl_subtitles_width', 1 ) . 'px; }';
	}
	if ( get_theme_mod( 2 == 'rollie_embl_subtitles', 1 ) ) {
		$rollie_inline_style .= '.woocommerce ,.woocommerce h2{ border-bottom-style:solid  }';
	}

	$rollie_inline_style .= '.rollie_fancy_line_t { border-width:' . get_theme_mod( 'rollie_embl_titles_width', 1 ) . 'px; }.rollie_fancy_line_s {  border-width:' . get_theme_mod( 'rollie_embl_subtitles_width', 1 ) . 'px; }.rollie_fancy_line_f { border-width:' . get_theme_mod( 'rollie_embl_footer_width', 1 ) . 'px; }  .rollie_fancy_line_n   {  border-width:' . get_theme_mod( 'rollie_embl_navbar_width', 1 ) . 'px;} ';
	$rollie_inline_style .= '.rollie_pagination * ,.page-item.active .page-link,.page-item.disabled .page-link { border-color:' . $rollie_third_theme_color->rgb . '; color: ' . $rollie_main_theme_text_color . ' ;}';
	$rollie_inline_style .= '.rollie_pagination_active *,.page-item.active .page-link{ color: ' . $rollie_third_theme_color->rgb . ' ;  background-color: ' . $rollie_second_theme_color->rgb . '}';
	$rollie_inline_style .= '.rollie_pagination_link:hover{ color: ' . $rollie_third_theme_color->rgb . ' ;  background :' . $rollie_darker_main_theme_color->rgb_gr_1 . ';	}';
	$rollie_inline_style .= '.rollie_main_theme_text_color{ color: ' . $rollie_main_theme_text_color . ';}';
	$rollie_inline_style .= '.rollie_second_text_color,.shop_table > thead,.rollie_woo_order_table_banner, #rollie_nav_user_info .rollie_login_form_site_icon_wrapper { color: ' . $rollie_second_text_color . ';}';
	$rollie_inline_style .= '.rollie_title_text_color{color: ' . $rollie_title_text_color . ';}';
	$rollie_inline_style .= '.rollie_fourth_text_color,.rollie_my_acc_nav_side_c  a, article a { color: ' . $rollie_fourth_text_color . ' ;}';
	$rollie_inline_style .= '.rollie_sort_orders_current,.rollie_my_acc_nav_side_c .is-active > a, .rollie_category_title_text_color,a:hover,.rollie_footer_dropdown_item:hover{ color: ' . $rollie_category_title_text_color . ';}';
	$rollie_inline_style .= '.rollie_text_color_3 { color: ' . $rollie_category_title_text_color . '; }';
	$rollie_inline_style .= '.rollie_subtitle_text_color { color: ' . $rollie_subtitle_text_color . ' ; }';

	if ( get_theme_mod( 'rollie_font_pp_content_bolder_links', true ) ) {
		$rollie_inline_style .= 'main p a { font-weight:bolder;}';
	}

	$rollie_inline_style .= '.rollie_icon_first,.cld-common-wrap,.fas,.far,.fal,.fab { color: ' . $rollie_icon_color_first . ';text-shadow: 0px 0px 3px  ' . $rollie_icon_color_first_shadow . ' ; }';
	$rollie_inline_style .= ".rollie_icon_first:hover,.cld-common-wrap:hover,button[aria-expanded='true'] *,.fas:hover ,.fal:hover,.fab:hover,.far:hover,button:hover .fas,button:hover .far ,button:hover .fas,button:hover .fal,	.rollie_icon_first:active,.cld-common-wrap:active,.fas:active ,.fal:active,.fab:active,.far:active,button:active .fas,button:active .far ,button:active .fas,button:active .fal{ color: " . $rollie_icon_color_first_h . ' ; }';
	$rollie_inline_style .= '.rollie_button ,.woocommerce button.button ,.woocommerce #respond input#submit, .woocommerce a.button,.rollie_top_menu_icons > button ,.woocommerce   .button,.rollie_button_alt,.woocommerce button.button.alt ,.woocommerce a.button.alt,.woocommerce .checkout-button {' . $rollie_border_data['buttons']->css_snippet() . '}';
	$rollie_inline_style .= '.rollie_nav_link,.rollie_dropdown_item{color: ' . $rollie_navbar_text_color . ';}';
	$rollie_inline_style .= '.rollie_nav_link:hover,.rollie_dropdown_item:hover { color: ' . $rollie_navbar_hover_text_color . '; }';
	$rollie_inline_style .= '.rollie_chevron_menu { color: ' . $rollie_navbar_chevron . ' !important; }';
	$rollie_inline_style .= '.rollie_chevron_menu:hover{ color: ' . $rollie_navbar_hover_chevron . '!important;}';
	$rollie_inline_style .= "span .select2-selection__rendered,.rollie_login_icons_c:before ,select,[type='checkbox']:checked + span::before,[type='checkbox']:not(:checked) + span::before,[type='radio']:checked + label::before,[type='radio']:not(:checked) + label::before,.quantity ,.input-text,.rollie_form_input{ " . $rollie_border_data['inputs']->css_snippet() . '  color: ' . get_theme_mod( 'rollie_form_input_text_color', '#212529' ) . ';	 border-color: ' . $rollie_form_input_border_color . ' !important;  background: ' . $rollie_form_input_color_backg . '; }';
	$rollie_inline_style .= '.rollie_status_ajax_z  img,main img { ' . $rollie_border_data['images']->css_snippet() . ' border-color:' . $rollie_third_theme_color->rgb . ';  }';
	$rollie_inline_style .= '.rollie_avatar img,.avatar,.avatar img{ ' . $rollie_border_data['avatars']->css_snippet() . ' border-color:' . $rollie_third_theme_color->rgb . ';  }';
	$rollie_inline_style .= 'span .select2-selection , .rollie_login_icons_c:before ,.quantity:active,.quantity-button:hover,.quantity-button :focus-within,.input-text:active,.input-text:hover,.input-text:focus-within,.rollie_form_input:active, .rollie_form_input:hover,.rollie_form_input { background: ' . rgba2rgb( $rollie_form_input_color_backg ) . '; }';
	$rollie_inline_style .= '.rollie_form_input button  { border-style:none; }';
	$rollie_inline_style .= "[type='radio']:checked + label:after,[type='radio']:not(:checked) + label:after,[type='checkbox']:checked + span:after,[type='checkbox']:not(:checked) + span:after{  background:" . $rollie_form_input_border_color . '; }';
	$rollie_inline_style .= 'span .select2-selection ,label:hover::before  ,select:focus-within ,.quantity:focus-within,.input-text:focus-within,	.rollie_search_form_shadow:focus-within{ box-shadow: 0px 0px 8px 1px ' . $rollie_form_input_border_color . '; }';
	$rollie_inline_style .= '.swiper-pagination-bullet{background:' . $rollie_darker_main_theme_color->rgb_gr_1 . ';}';

	if ( get_theme_mod( 'rollie_disable_sidebar_mobile', true ) ) {
		$rollie_inline_style .= '@media screen and (max-width:   768px){ .rollie_sidebar_left, .rollie_sidebar_right { display:none; }}	';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		require get_template_directory() . '/include/rollie_woo_customizer_css.php';
	}

	$rollie_inline_style .= '.rollie_main_post_content{ padding-right:' . get_theme_mod( 'rollie_posts_page_l_padding', 3 ) . '%; padding-left:' . get_theme_mod( 'rollie_posts_page_l_padding', 3 ) . '%;}';
	$rollie_inline_style .= '.rollie_single_page_content{ padding-right:' . get_theme_mod( 'rollie_single_page_l_padding', 3 ) . '%; padding-left:' . get_theme_mod( 'rollie_single_page_l_padding', 3 ) . '%;}';

	foreach ( rollie_page_template_sufix_array() as  $sufix ) {
		$rollie_inline_style .= '.rollie_header_wrapper' . $sufix . '{ min-height:' . get_theme_mod( 'rollie_header_height' . $sufix, 60 ) . 'vh;}';
		if ( get_theme_mod( 'rollie_grid_type' . $sufix, 1 ) == 2 ) {
			$rollie_inline_style .= '@media (min-width: 1280px) {.rollie_grid_size' . $sufix . '.rollie_grid_size ,.rollie_grid_size' . $sufix . '~ .rollie_grid_item { width: ' . get_theme_mod( 'rollie_post_page_masonry_size_lg' . $sufix, 33 ) . '%;}}';
			$rollie_inline_style .= '@media (min-width: 768px) and (max-width: 1279.98px)  {.rollie_grid_size' . $sufix . '.rollie_grid_size ,.rollie_grid_size' . $sufix . '~ .rollie_grid_item { width: ' . get_theme_mod( 'rollie_post_page_masonry_size_sm' . $sufix, 33 ) . '%;}}';
			$rollie_inline_style .= '@media (max-width: 767.98px) {.rollie_grid_size' . $sufix . '.rollie_grid_size  ,.rollie_grid_size' . $sufix . '~ .rollie_grid_item { width: ' . get_theme_mod( 'rollie_post_page_masonry_size_xs' . $sufix, 50 ) . '%;}}';
			$rollie_inline_style .= '.rollie_grid_size' . $sufix . '.rollie_grid_item { padding: ' . get_theme_mod( 'rollie_post_page_masonry_gutter' . $sufix, 3 ) . 'px;}';
		}
	}
	wp_add_inline_style( 'rollie_stylesheet', $rollie_inline_style );
}
