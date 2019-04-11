<?php
@ini_set( 'upload_max_size', '10M' );
@ini_set( 'post_max_size', '10M' );
@ini_set( 'max_execution_time', '300' );
$rollie_supported_post_formats = array( 'link', 'aside', 'quote', 'status', 'audio', 'video', 'image', 'gallery' );

function rollie_script_start() {

		wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'swiper_lib_js', get_template_directory_uri() . '/js/swiper.min.js', array(), '4.3.4', 'true' );
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.2.1', 'true' );
	wp_enqueue_script( 'rollie_js', get_template_directory_uri() . '/js/rollie.js', array(), '1.00', 'true' );
	if (class_exists('WooCommerce')) 	wp_enqueue_script( 'rollie_woo_js', get_template_directory_uri() . '/js/rollie_woocommerce.js', array(), '1.00', 'true' );
}
function rollie_style_start() {
	 wp_enqueue_style( 'swiper_lib_css', get_template_directory_uri() . '/css/swiper.min.css', array(), '4.3.4', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.2.1', 'all' );
	wp_enqueue_style( 'rollie_stylesheet', get_template_directory_uri() . '/css/rollie.css', array(),  date("h:i:s"), 'all' );
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'rollie_woo_stylesheet', get_template_directory_uri() . '/css/rollie_woocommerce.css', array(), '1.00', 'all' );
	}

 
 	require get_template_directory() . '/include/rollie_customizer_css.php';
 		rollie_customizer_css ();
}


add_action( 'customize_preview_init', 'rollie_customize_script' );
 
/* Customizer: Enqueue Script */
function rollie_customize_script(){
    wp_enqueue_script( 'rollie_customizer_preview', get_template_directory_uri() . '/js/rollie_customizer_preview.js', array( 'jquery', 'customize-preview' ), date("h:i:s"), true );
    if (class_exists('woocommerce'))
    {
    	  wp_enqueue_script( 'rollie_woo_customizer_preview', get_template_directory_uri() . '/js/rollie_woo_customizer_preview.js', array( 'jquery', 'customize-preview' ), date("h:i:s"), true );
    }
}


add_action( 'wp_enqueue_scripts', 'rollie_style_start' );
add_action( 'wp_enqueue_scripts', 'rollie_script_start' );
function theme_support_rollie() {
	add_theme_support(
		'custom-logo',
		array(
			'height'     => 512,
			'width'      => 512,
			'flex-width' => true,
		)
	);
## Disables MIME Types Check ##
function wph_disable_mime_check($data,$file,$filename,$mimes){
   $wp_filetype = wp_check_filetype($filename,$mimes);
   $ext = $wp_filetype['ext'] ;
   $type = $wp_filetype['type'] ;
   $proper_filename = $data['proper_filename'] ;
   return compact('ext','type','proper_filename');
}
add_filter('wp_check_filetype_and_ext','wph_disable_mime_check',10,4);
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	function rollie_enqueue_comment_reply_script() {
		if ( get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment_reply' );
		}
	}

	add_action( 'comment_form_before', 'rollie_enqueue_comment_reply_script' );

	add_theme_support( 'post-formats', array( 'link', 'aside', 'quote', 'status', 'audio', 'video', 'image', 'gallery' ) );

		register_nav_menu( 'Rollie_Top_Menu', 'Rollie_top_menu_nav' );
		register_nav_menu( 'rollie_cat_swap_menu', 'Rollie category swipe Menu' );
		register_nav_menu( 'Footer_Menu', 'Footer_Menu_nav' );

}

function rollie_widget_setup() {
/*	register_sidebar(
		array(

			'name'          => 'Cookie_popup',
			'id'            => 'cookie_popup',
			'class'         => 'custom-cookie-popup',
			'descripton'    => 'Its a cookie popup message',

			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="custom-widget-cookie-popup "> <div class=" col-8 col-lg-10 custom-widget-cookie-popup-title"><div class="custom-widget-cookie-popup-title-container">  ',
			'after_title'   => ' <span class="rollie_fancy_line"><span/></div></div> <div class="col-4 col-lg-2 custom-widget-cookie-popup-button-container" ><button class="custom-widget-cookie-popup-button">Roger!</button></div></div>',

		)
	);
	*/
	register_sidebar(
		array(

			'name'          => 'Sidebar_right',
			'id'            => 'sidebar_right',
			'class'         => 'rollie_sidebar_right',
			'descripton'    => 'Its a sidebar right',

			'before_widget' => '<div id="%1$s" class="widget %2$s rollie_f_widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',

		)
	);
		register_sidebar(
			array(

				'name'          => 'Sidebar_left',
				'id'            => 'sidebar_left',
				'class'         => 'rollie_sidebar_left',
				'descripton'    => 'Its a sidebar left',

				'before_widget' => '<div id="%1$s" class="widget %2$s rollie_f_widget ">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
			register_sidebar(
				array(

					'name'          => 'Sidebar_bottom',
					'id'            => 'sidebar_bottom',
					'class'         => 'rollie_sidebar_bottom',
					'descripton'    => 'Its a widget area at bottom of page',

					'before_widget' => '<div id="%1$s" class="widget %2$s rollie_widget rollie_f_widget  col-lg-3 col-md-4 col-xs-12 col-sm-6">',
					'after_widget'  => '</div>',
					'before_title'  => '<h1 class="widget-title">',
					'after_title'   => '</h1>',
				)
			);
				register_sidebar(
					array(

						'name'          => 'Sidebar_bottom_archive',
						'id'            => 'sidebar_bottom_archive',
						'class'         => 'rollie_sidebar_bottom',
						'descripton'    => 'Its a widget area for archive page at bottom of page',
						'before_widget' => '<div id="%1$s" class="widget %2$s rollie_widget  rollie_f_widget  col-lg-3 col-md-4 col-xs-12 col-sm-6">',
						'after_widget'  => '</div>',
						'before_title'  => '<h1 class="widget-title">',
						'after_title'   => '</h1>',
					)
				);

}
function custom_setup() {
	add_editor_style();
	add_theme_support( 'woocommerce' );
}

function rollie_customizer_stylesheet() {

	wp_register_style( 'select2.min.css', get_template_directory_uri() . '/css/select2.min.css', array(), '4.0.6', 'all' );
	wp_enqueue_style( 'select2.min.css' );
	wp_enqueue_style( 'rollie_customizer', trailingslashit( get_template_directory_uri() ) . 'css/rollie_customizer.css', array(), '1.0', 'all' );

}


function rollie_customizer_scripts() {
	wp_enqueue_script( 'rollie_customizer', trailingslashit( get_template_directory_uri() ) . 'js/rollie_customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
	wp_enqueue_script( 'skyrocket-select2-js', get_template_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '4.0.6', true );
	wp_enqueue_script( 'rollie_js', get_template_directory_uri() . '/js/rollie_gradient_bulider.js', array(), '1.00', true );
}


function rollie_new_excerpt_more( $more ) {
	return '...';
}


 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $path;
    
}


function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

require get_template_directory() . '/include/rollie_required_plugins_TGMPA.php';
require get_template_directory() . '/include/rollie_sanitization_functions.php';
require get_template_directory() . '/include/rollie_walker_cat_swap.php';
require get_template_directory() . '/include/rollie_walker_footer.php';
require get_template_directory() . '/include/rollie_walker_comment.php';
require get_template_directory() . '/include/rollie_customizer.php';
require get_template_directory() . '/include/rollie_special_functions.php';
require get_template_directory() . '/include/rollie_walker_nav_top_toggle.php';
require get_template_directory() . '/include/rollie_custom_shortcodes.php';
require get_template_directory() . '/include/rollie_acf_field_import.php';
require get_template_directory() . '/presets/rollie-presets.php';
require get_template_directory() . '/include/rollie_pagination.php';
require get_template_directory() . '/include/rollie_register_strings_polylang.php';
require get_template_directory() . '/include/rollie_woocommerce.php';
require get_template_directory() . '/include/pe-customizer.php';

add_action( 'customize_register', 'rollie_customizer_register' );
add_action( 'after_setup_theme', 'custom_setup' );
add_action( 'widgets_init', 'rollie_widget_setup' );
add_action( 'init', 'theme_support_rollie' );


add_filter( 'excerpt_more', 'rollie_new_excerpt_more' );
add_filter( 'post_gallery', 'rollie_custom_gallery', 10, 2 );

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');


add_action( 'customize_controls_print_styles', 'rollie_customizer_stylesheet' );
add_action( 'customize_controls_enqueue_scripts', 'rollie_customizer_scripts' );



