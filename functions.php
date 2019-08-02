<?php
@ini_set( 'upload_max_size', '10M' );
@ini_set( 'post_max_size', '10M' );
@ini_set( 'max_execution_time', '300' );
$rollie_supported_post_formats = array( 'link', 'aside', 'quote', 'status', 'audio', 'video', 'image', 'gallery' );

function rollie_script_start() {

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script(
		'rollie_ajax',
		get_template_directory_uri() . '/js/rollie_ajax.js',
		array('jquery')
	);
	wp_localize_script(
		'rollie_ajax',
		'rollie_ajax_obj',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			 'security' => wp_create_nonce('rollieNoNce_post_status'),
		 )
	);

	wp_enqueue_script( 'swiper_lib_js', get_template_directory_uri() . '/js/swiper.min.js', array(), '4.3.4', 'true' );
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.2.1', 'true' );
		wp_enqueue_script( 'masonry_js', get_template_directory_uri() . '/js/masonry.min.js', array(), '1.00', 'true' );
	wp_enqueue_script( 'rollie_js', get_template_directory_uri() . '/js/rollie.js', array(), date("h:i:s"), 'true' );
	if (class_exists('WooCommerce')) {
		wp_enqueue_script( 'rollie_woo_js', get_template_directory_uri() . '/js/rollie_woocommerce.js', array(), '1.00', 'true' );
		wp_enqueue_script( 'zoom_js', get_template_directory_uri() . '/js/zoom.js', array(), '1.37', 'true' );
	}
}

function rollie_style_start( ) {
global $rollie_font_data;
	wp_enqueue_style( 'swiper_lib_css', get_template_directory_uri() . '/css/swiper.min.css', array(), '4.3.4', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.2.1', 'all' );
	wp_enqueue_style('woocommerce_stylesheet', WP_PLUGIN_URL. '/woocommerce/assets/css/woocommerce.css',false,'1.0',"all");
	wp_enqueue_style( 'rollie_stylesheet', get_template_directory_uri() . '/css/rollie.css', array(),  date("h:i:s"), 'all' );
    
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'rollie_woo_stylesheet', get_template_directory_uri() . '/css/rollie_woocommerce.css', array(), date("h:i:s"), 'all' );
	}
	
 		rollie_customizer_css($rollie_font_data);

}

add_action('wp_enqueue_scripts', 'rollie_style_start');
/* Customizer: 
Enqueue Script */

function rollie_customize_script(){
    wp_enqueue_script( 'rollie_customizer_preview', get_template_directory_uri() . '/js/rollie_customizer_preview.js', array( 'jquery', 'customize-preview' ), date("h:i:s"), true );
    if (class_exists('woocommerce'))
    {
    	  wp_enqueue_script( 'rollie_woo_customizer_preview', get_template_directory_uri() . '/js/rollie_woo_customizer_preview.js', array( 'jquery', 'customize-preview' ), date("h:i:s"), true );
    }
}

/**
 * Cache the customizer styles
 */
function rollie_customizer_cache() {
	global $wp_customize;

	// Check we're not on the Customizer.
	// If we're on the customizer then DO NOT cache the results.
	if ( ! isset( $wp_customize ) ) {

		// Get the theme_mod from the database
		$data = get_theme_mod( 'rollie_customizer_styles', false );

		// If the theme_mod does not exist, then create it.
		if ( $data == false ) {
			// We'll be adding our actual CSS using a filter
			$data = apply_filters( 'rollie_styles_filter', null );
			// Set the theme_mod.
			set_theme_mod( 'rollie_customizer_styles', $data );
		}

	// If we're on the customizer, get all the styles using our filter
	} else {

		$data = apply_filters( 'rollie_styles_filter', null );

	}

	// Add the CSS inline.
	// Please note that you must first enqueue the actual 'my-styles' stylesheet.
	// See http://codex.wordpress.org/Function_Reference/wp_add_inline_style#Examples
	wp_add_inline_style( 'rollie_stylesheet', $data );
}

add_action( 'wp_enqueue_scripts', 'rollie_customizer_cache', 130 );

/**
 * Reset the cache when saving the customizer
 */
function rollie_reset_style_cache_on_customizer_save() {
	remove_theme_mod( 'rollie_customizer_styles' );
}

add_action( 'customize_save_after', 'rollie_reset_cache_on_customizer_save' );

add_action( 'wp_enqueue_scripts', 'rollie_script_start' );
add_action( 'customize_preview_init', 'rollie_customize_script' );





## Disables MIME Types Check ##
function wph_disable_mime_check($data,$file,$filename,$mimes){
   $wp_filetype = wp_check_filetype($filename,$mimes);
   $ext = $wp_filetype['ext'] ;
   $type = $wp_filetype['type'] ;
   $proper_filename = $data['proper_filename'] ;
   return compact('ext','type','proper_filename');
}
add_filter('wp_check_filetype_and_ext','wph_disable_mime_check',10,4);

function rollie_theme_support() {
	add_theme_support(
		'custom-logo',
		array(
			'height'     => 512,
			'width'      => 512,
			'flex-width' => true,
		)
	);

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


}

         

add_filter( 'rollie_is_active_sidebar', 'is_active_sidebar', 10, 2 ); 
function rollie_widget_setup() {

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

					'before_widget' => '<div id="%1$s" class="widget %2$s p-0 m-0 rollie_f_widget  col-lg-3 col-md-4 col-xs-12 col-sm-6">',
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
						'before_widget' => '<div id="%1$s" class="widget %2$s  p-0 m-0   rollie_f_widget  col-lg-3 col-md-4 col-xs-12 col-sm-6">',
						'after_widget'  => '</div>',
						'before_title'  => '<h1 class="widget-title">',
						'after_title'   => '</h1>',
					)
				);

}
function rollie_custom_setup() {

	register_nav_menu( 'Rollie_Top_Menu', 'Rollie Top Menu Nav' );
	register_nav_menu( 'rollie_top_menu_icons', 'Rollie Top Menu Icon Nav' );
	register_nav_menu( 'rollie_cat_swap_menu', 'Rollie Category Swipe Menu' );
	register_nav_menu( 'Footer_Menu', 'Rollie Footer Menu Nav' );

	add_image_size( 'rollie_xs', 414,736,true); 
	add_image_size( 'rollie_s', 1024,768  ,true); 
	add_image_size( 'rollie_m', 1336,768 ,true ); 
	add_image_size( 'rollie_l', 1920,1080 ,true); 
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
require get_template_directory() . '/include/rollie_breadcrumb.php';
require get_template_directory() . '/include/rollie_customizer.php';
require get_template_directory() . '/include/rollie_special_functions.php';
require get_template_directory() . '/include/rollie_walker_nav_top_toggle.php';
require get_template_directory() . '/include/rollie_walker_nav_top_icons.php';
require get_template_directory() . '/include/rollie_custom_shortcodes.php';
require get_template_directory() . '/include/rollie_acf_field_import.php';
require get_template_directory() . '/presets/rollie-presets.php';
require get_template_directory() . '/include/rollie_pagination.php';
require get_template_directory() . '/include/rollie_register_strings_polylang.php';
require get_template_directory() . '/include/rollie_woocommerce.php';
require get_template_directory() . '/include/rollie_smart_widget.php';
require get_template_directory() . '/include/rollie_ajax.php';
require get_template_directory() . '/include/rollie_customizer_css.php';	
require get_template_directory() . '/include/rollie_customizer_classes.php';	
require get_template_directory() . '/include/rollie_customizer_font_functions.php';



add_action( 'customize_register', 'rollie_customizer_register' );
add_action( 'after_setup_theme', 'rollie_custom_setup' );
add_action( 'widgets_init', 'rollie_widget_setup' );
add_action( 'init', 'rollie_theme_support' );

add_filter( 'excerpt_more', 'rollie_new_excerpt_more' );

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');


add_action( 'customize_controls_print_styles', 'rollie_customizer_stylesheet' );
add_action( 'customize_controls_enqueue_scripts', 'rollie_customizer_scripts' );






class ProxyFunc {
    public $args = null;
    public $func = null;
    public $location = null;
    public $func_args = null;
    function __construct($func, $args, $location='after', $action='', $priority = 10, $accepted_args = 1) {
        $this->func = $func;
        $this->args = is_array($args) ? $args : array($args);
        $this->location = $location;
        if( ! empty($action) ){
            // (optional) pass action in constructor to automatically subscribe
            add_action($action, $this, $priority, $accepted_args );
        }
    }
    function __invoke() {
        // current arguments passed to invoke
        $this->func_args = func_get_args();

        // position of stored arguments
        switch($this->location){
            case 'after':
                $args = array_merge($this->func_args, $this->args );
                break;
            case 'before':
                $args = array_merge($this->args, $this->func_args );
                break;
            case 'replace':
                $args = $this->args;
                break;
            case 'reference':
                // only pass reference to this object
                $args = array($this);
                break;
            default:
                // ignore stored args
                $args = $this->func_args;
        }

        // trigger the callback
        call_user_func_array( $this->func, $args );

        // clear current args
        $this->func_args = null;
    }
}