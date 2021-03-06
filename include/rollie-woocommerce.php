<?php
/*
1.General
2.Archive product
2.Single product
2.MyAccount
2.login
3.Orders Table
4.Orders table Query Snipets
5.Cart
7.notices
6.Functions
Cart and login icon on navbar
*/

function rollie_woo_content_post_page() {
	require locate_template( 'template-parts/post/content-post-page.php' );
}
function rollie_woo_output_content_wrapper() {
	echo '<div class="woocommerce rollie_woo_template">';
}
function woo_before_shop_loop_row() {
	if ( wc_get_loop_prop( 'columns' ) < 6 && wc_get_loop_prop( 'columns' ) > 0 ) {
		$rollie_standard_col = wc_get_loop_prop( 'columns' );
	} else {
		$rollie_standard_col = 0;
	}
	if ( get_theme_mod( 'rollie_woo_l_shop_columns_md', 2 ) ) {
		$rollie_md_col = get_theme_mod( 'rollie_woo_l_shop_columns_md', 2 );
	} else {
		$rollie_md_col = 0;
	}
	echo '<div class="row rollie_products rollie_products-' . esc_attr( $rollie_standard_col_ ) . ' rollie_products_md-' . esc_attr( $rollie_md_col ) . ' ">';
}

/**
 * Change the breadcrumb separator
 */

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => ' &gt; ',
		'wrap_before' => '<nav class="woocommerce-breadcrumb rollie_subtitle_text_color rollie_f_excerpt">',
		'wrap_after'  => '</nav>',
		'before'      => '<span class="rollie_category_title_text_color">',
		'after'       => '</span>',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
}

function rollie_woocommerce_sale_flash( $onsale, $post, $product ) {
	return "<div class='rollie_f_meta rollie_d_contents rollie_second_text_color'>" . $onsale . '</div>';
};
function rollie_main_wrapper() {
	echo '</main>';
}
add_filter( 'woocommerce_sale_flash', 'rollie_woocommerce_sale_flash', 10, 3 );
add_action( 'woocommerce_before_main_content', 'rollie_woo_content_post_page', 8 );
add_action( 'woocommerce_before_main_content', 'rollie_woo_output_content_wrapper', 11 );

add_action( 'woocommerce_after_main_content', 'rollie_main_wrapper', 20 );
add_action( 'woocommerce_after_main_content', 'rollie_div_wraper_end', 30 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_shop_loop', 'woo_before_shop_loop_row', 9 );
add_action( 'woocommerce_after_shop_loop', 'rollie_div_wraper_end', 200 );



function rollie_woo_template_loop_product_title() {
	echo '<h4 class="  ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . ' m-0 py-1">' . get_the_title() . '</h4>';
}
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
add_action( 'woocommerce_shop_loop_item_title', 'rollie_woo_template_loop_product_title', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 100 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 100 );

function rollie_woo_price_design() {
	if ( get_theme_mod( 'rollie_woo_price_design', 1 ) == 1 || get_theme_mod( 'rollie_woo_price_design', 1 ) == 2 ) {

		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 32 );

		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );

		add_action(
			'woocommerce_before_shop_loop_item_title',
			function() {
				if ( get_theme_mod( 'rollie_woo_price_design', 1 ) == 2 ) {
					$class = 'd-block w-100 rollie_modern_price rollie_category_title_text_color rollie_post_title_bg_color';
				} else {
					$class = 'd-inline-block rollie_classic_price rollie_category_title_text_color rollie_post_title_bg_color';
				}
				echo '<div class="' . $class . '"">';
			},
			31
		);
		add_action( 'woocommerce_before_shop_loop_item_title', 'rollie_div_wraper_end', 33 );
	}
}

function rollie_woo_add_to_cart_link( $html, $product, $args ) {

	$args['class'] .= ' rollie_shop_add_to_cart';
	$args['class']  = str_replace( 'button', ' ', $args['class'] );
	$html           = sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'rollie_shop_add_to_cart' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		'<i class="fas fa-cart-plus"></i>'
	);
	return $html;
}

function rollie_add_to_cart_small_icon() {
	if ( get_theme_mod( 'rollie_woo_add_to_cart_design', 1 ) == 1 ) {
		add_filter( 'woocommerce_loop_add_to_cart_link', 'rollie_woo_add_to_cart_link', 10, 3 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
		add_action(
			'woocommerce_before_shop_loop_item_title',
			function() {
				echo '<div class="d-inline-block position-relative m-auto  rollie_product_img_container">';
			},
			9
		);
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'rollie_div_wraper_end', 50 );
	}
}

function rollie_woo_customizer_actions() {
	rollie_add_to_cart_small_icon();
	rollie_woo_price_design();
}

add_action( 'init', 'rollie_woo_customizer_actions' );

function rollie_shop_loop_sku() {
	global $product;
	if ( get_theme_mod( 'rollie_woo_l_shop_display_sku', true ) ) {
		echo '<div class="rollie_shop_sku rollie_subtitle_text_color rollie_f_excerpt py-1">' . __( 'SKU:', 'woocommerce' ) . ' ' . $product->get_sku() . '</div>';
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'rollie_shop_loop_sku', 5 );

add_action(
	'woocommerce_after_shop_loop_item_title',
	function() {
		global $product;
		if ( get_theme_mod( 'rollie_woo_l_shop_display_attr' ) != 1 ) {
			if ( get_theme_mod( 'rollie_woo_l_shop_display_attr' ) == 2 ) {
				$rollie_p_a_b = true;
			} else {
				$rollie_p_a_b = false;
			}
			rollie_product_attributes( $product, get_theme_mod( 'rollie_woo_l_shop_display_attr_max', 2 ), $rollie_p_a_b );
		}

	},
	4
);
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
add_action(
	'woocommerce_after_shop_loop',
	function () {
		echo '<div class="col-12">';
		$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
		$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
		rollie_pagination( $total, 2, $current, WC()->query->get_current_endpoint() );
		echo '</div>';
	},
	11
);
add_action(
	'woocommerce_before_single_product',
	function() {
		echo '<div class="rollie_single_product_page col-12">';
	}
);

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action( 'woocommerce_after_single_product', 'rollie_div_wraper_end' );
add_action( 'woocommerce_before_single_product_summary', 'rollie_single_product_gallery' );
function rollie_single_product_gallery() {
	global $product;
	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$post_thumbnail_id = $product->get_image_id();
	$wrapper_classes   = apply_filters(
		'woocommerce_single_product_image_gallery_classes',
		array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
			'col-md-' . get_theme_mod( 'rollie_woo_l_single_w', 8 ),
			'col-' . get_theme_mod( 'rollie_woo_l_single_w_md', 12 ),
			'rollie_single_product_image_c',
		)
	);
	?>

	<div class=" <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
		<figure class="woocommerce-product-gallery__wrapper">
			<?php
			if ( $product->get_image_id() ) {
				$html = rollie_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html = '<div class="woocommerce-product-gallery__image--placeholder">';

				if ( class_exists( 'A3_Lazy_Load' ) ) {
					$html .= apply_filters( 'a3_lazy_load_html', sprintf( '<img src="%s" alt="%s" class=" rollie_single_product_image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) ), null );
				} else {
					$html .= sprintf( '<img src="%s" alt="%s" class=" rollie_single_product_image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				}

				$html .= '</div>';
			}
			echo $html;
			remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
			do_action( 'woocommerce_product_thumbnails' );
			?>
		</figure>
	</div>
	<?php
}

function rollie_get_gallery_image_html( $attachment_id, $main_image = false ) {
	global $product;
	$html              = '';
	$slides            = '';
	$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
	$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );

	$attachment_ids = $product->get_gallery_image_ids();

	// Outside the product loop:
	$product    = new WC_Product_Variable( $product->get_id() );
	$variations = $product->get_available_variations();

	$attachment_ids[] = $product->get_image_id();

	foreach ( $variations as $variation ) {
		if ( $variation['image_id'] ) {
			$attachment_ids[] = $variation['image_id'];

		}
	}

	if ( $attachment_ids ) {
		foreach ( $attachment_ids as $attachment_id ) {
			$image_size    = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
			$full_size     = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
			$thumbnail_src = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
			$full_src      = wp_get_attachment_image_src( $attachment_id, $full_size );
			$image         = wp_get_attachment_image(
				$attachment_id,
				$image_size,
				false,
				apply_filters(
					'woocommerce_gallery_image_html_attachment_image_params',
					array(
						'title'                   => get_post_field( 'post_title', $attachment_id ),
						'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
						'data-src'                => $full_src[0],
						'data-large_image'        => $full_src[0],
						'data-large_image_width'  => $full_src[1],
						'data-large_image_height' => $full_src[2],

						'src'                     => $full_src[0],
						'class'                   => $main_image ? 'wp-post-image rollie_single_product_image  ' : '',
					),
					$attachment_id,
					$image_size,
					$main_image
				)
			);
			$slides       .= '<a rollie_gallery_image_id=' . esc_attr( $attachment_id ) . ' class=" swiper-slide " href="' . esc_url( $full_src[0] ) . '"><div  class="rollie_zoom_image" data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image ">' . $image . '</div></a>';
		}
		$html .= "<div class='rollie_single_product_swiper_container rollie_swiper swiper-container'>";
		$html .= '  <div class="swiper-button-prev"></div>';

		$html .= "<div class='swiper-wrapper '>";
		$html .= $slides;

		$html .= '</div>';
		$html .= '<div class="swiper-button-next"></div>';
		$html .= '<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>';
		$html .= '</div>';

	} elseif ( $product->get_image_id() ) {
		$attachment_id = $product->get_image_id();
		$image_size    = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
		$full_size     = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src      = wp_get_attachment_image_src( $attachment_id, $full_size );
		$image         = wp_get_attachment_image(
			$attachment_id,
			$image_size,
			false,
			apply_filters(
				'woocommerce_gallery_image_html_attachment_image_params',
				array(
					'title'                   => get_post_field( 'post_title', $attachment_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
					'data-src'                => $full_src[0],
					'data-large_image'        => $full_src[0],
					'data-large_image_width'  => $full_src[1],
					'data-large_image_height' => $full_src[2],

					'src'                     => $full_src[0],
					'class'                   => $main_image ? 'wp-post-image rollie_single_product_image  ' : '',
				),
				$attachment_id,
				$image_size,
				$main_image
			)
		);

		$html .= '<div class="rollie_single_product_swiper_container rollie_swiper swiper-container swiper-container-horizontal"><a class="rollie_swiper swiper-slide  " href="' . esc_url( $full_src[0] ) . '"><div  class="rollie_zoom_image" data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image ">' . $image . '</div></a></div>';
	} else {
		$html = '<div class="woocommerce-product-gallery__image--placeholder">';
		if ( class_exists( 'A3_Lazy_Load' ) ) {
			$html .= apply_filters( 'a3_lazy_load_html', sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) ), null );
		} else {
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		}
		$html .= '</div>';
	}

	return $html;
}

add_action(
	'woocommerce_before_single_product_summary',
	function() {
		$md  = ( 12 - get_theme_mod( 'rollie_woo_l_single_w', 8 ) );
		$col = ( 12 - get_theme_mod( 'rollie_woo_l_single_w_md', 12 ) );
		if ( $md <= 0 ) {
			$md = 12;
		}
		if ( $col <= 0 ) {
			$col = 12;
		}
		$classes  = 'col-md-' . $md;
		$classes .= ' col-' . $col;

		echo '<div class="rollie_single_product_summary ' . esc_attr( $classes ) . ' ">';
	},
	50
);

add_action( 'woocommerce_after_single_product_summary', 'rollie_div_wraper_end', 1 );

function rollie_single_product_meta() {
	global $product;
	echo '<div class="product_meta">';
	echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' );
	the_title( '<h3 class="product_title entry-title">', '</h3>' );

	do_action( 'woocommerce_product_meta_start' );
	if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) :
		?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

		<?php
	endif;
	echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' );
	echo '</div>';
}



remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'rollie_single_product_meta', 5 );
add_action( 'woocommerce_after_single_product_summary', 'rollie_single_product_content', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

function rollie_single_product_content() {
	$tabs = apply_filters( 'woocommerce_product_tabs', array() );
	if ( ! empty( $tabs ) ) :
		?>
		<div class="woocommerce-tabs rollie_woo_tabs  wc-tabs-wrapper">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div class="woocommerce-Tabs-panel 
				<?php
				if ( esc_attr( $key ) == 'description' || esc_attr( $key ) == 'additional_information' || esc_attr( $key ) == 'reviews' ) {
					echo 'rollie_woo_tab_panel_toogle';
				}
				?>
				rollie_woo_tab_panel  woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $tab['callback'] ) ) {
					call_user_func( $tab['callback'], $key, $tab ); }
				?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php
	endif;

}
do_action( 'woocommerce_product_meta_end' );

function rollie_woo_login_form_site_icon() {
	if ( get_theme_mod( 'rollie_navbar_logo' ) ) {
		echo '<div class="rollie_login_form_site_icon_wrapper">';
		echo '<img class="rollie_login_form_site_icon d-block m-auto" alt="' . esc_attr( get_the_title( attachment_url_to_postid( esc_url( get_theme_mod( 'rollie_navbar_logo' ) ) ) ) ) . '" src="' . esc_url( get_theme_mod( 'rollie_navbar_logo' ) ) . '"/>';
		if ( get_theme_mod( 'rollie_footer_logo_desc_text' ) ) {
			echo '<div class="rollie_f_footer_sub m-1 rollie_subtitle_text_color">' . esc_html( get_theme_mod( 'rollie_footer_logo_desc_text' ) ) . '</div>';
		}
		echo '</div>';
	}
}
add_action( 'woocommerce_login_form_start', 'rollie_navbar_icon', 5 );

//
// loginend
add_filter( 'woocommerce_enqueue_styles', 'rollie_dequeue_styles' );
function rollie_dequeue_styles( $enqueue_styles ) {
	// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
	unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
	unset( $enqueue_styles['woocommerce-general'] );    // will be added manualy
	return $enqueue_styles;
}


function rollie_shortcode_my_orders( $atts ) {
	shortcode_atts(
		$atts = array(
			'order_count' => -1,
		),
		$atts
	);
	ob_start();
	wc_get_template(
		'myaccount/my-orders.php',
		array(
			'current_user' => get_user_by( 'id', get_current_user_id() ),
			'order_count'  => $atts['order_count'],
		)
	);
	return ob_get_clean();
}
add_shortcode( 'rollie_my_orders', 'rollie_shortcode_my_orders' );

add_filter( 'woocommerce_my_account_my_orders_query', 'rollie_my_orders_query' );

function rollie_my_orders_query( $args ) {
	if ( is_wc_endpoint_url( 'completed' ) ) {
		$args['post_status'] = array( 'wc-completed' );
	} elseif ( is_wc_endpoint_url( 'on-hold' ) ) {
		$args['post_status'] = array( 'wc-on-hold', 'wc-pending' );
	} elseif ( is_wc_endpoint_url( 'processing' ) ) {
		$args['post_status'] = array( 'wc-processing' );
	} elseif ( is_wc_endpoint_url( 'refunded' ) ) {
		$args['post_status'] = array( 'wc-refunded' );
	} elseif ( is_wc_endpoint_url( 'canceled' ) ) {
		$args['post_status'] = array( 'wc-canceled', 'wc-failed' );
	}
	return $args;
}

// Register new endpoint to use for My Account page
function rollie_add_endpoint() {
	add_rewrite_endpoint( 'recievied', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'on-hold', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'processing', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'completed', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'canceled', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'refunded', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'rollie_add_endpoint' );


// Add new query var
function rollie_query_vars( $vars ) {
	foreach ( array( 'completed', 'on-hold', 'refunded', 'processing', 'canceled' ) as $e ) {
		$vars[ $e ] = $e;
	}
	return $vars;
}

add_filter( 'woocommerce_get_query_vars', 'rollie_query_vars' );

// 4. Add content to the new endpoint

function rollie_my_orders_query_content() {
	rollie_woo_orders_table_sort_menu();
	if ( is_wc_endpoint_url( 'completed' ) ) {
		echo "<h2 class='rollie_sibling_d_none'>" . __( 'Completed', 'woocommerce' ) . '</h2>';
	} elseif ( is_wc_endpoint_url( 'on-hold' ) ) {
		echo "<h2 class='rollie_sibling_d_none'>" . __( 'On-hold', 'woocommerce' ) . ' & ' . __( 'Pending', 'woocommerce' ) . '</h2>';
	} elseif ( is_wc_endpoint_url( 'processing' ) ) {
		echo "<h2 class='rollie_sibling_d_none'>" . __( 'Processing', 'woocommerce' ) . '</h2>';
	} elseif ( is_wc_endpoint_url( 'refunded' ) ) {
		echo "<h2 class='rollie_sibling_d_none'>" . __( 'Refunded', 'woocommerce' ) . '</h2>';
	} elseif ( is_wc_endpoint_url( 'canceled' ) ) {
		echo "<h2 class='rollie_sibling_d_none'>" . __( 'Canceled', 'woocommerce' ) . ' & ' . __( 'Failed', 'woocommerce' ) . '</h2>';
	}
	echo do_shortcode( '[rollie_my_orders]' );

}

foreach ( array( 'completed', 'processing', 'on-hold', 'refunded', 'canceled' ) as $key => $value ) {
	add_action( 'woocommerce_account_' . $value . '_endpoint', 'rollie_my_orders_query_content' );
}

function rollie_woo_order_status_icon( $rollie_woo_order_status, $rollie_is_downloadable = false, $url = false, $animated = true ) {
	$rollie_woo_order_status_icon = '';
	switch ( $rollie_woo_order_status ) {
		case 'pending':
			$rollie_woo_order_status_icon = 'fas fa-sync';
			if ( $animated ) {
				$rollie_woo_order_status_icon .= ' fa-pulse';
			}
			break;
		case 'on-hold':
			$rollie_woo_order_status_icon = 'fas fa-hand-holding-usd';
			break;
		case 'processing':
			if ( $rollie_is_downloadable ) {
				$rollie_woo_order_status_icon = 'fas fa-sync';
				if ( $animated ) {
					$rollie_woo_order_status_icon .= ' fa-pulse animated';
				}
			} else {
				$rollie_woo_order_status_icon = 'fas fa-shipping-fast';
				if ( $animated ) {
					$rollie_woo_order_status_icon .= ' faa-passing animated';
				}
			}

			break;
		case 'completed':
			if ( $rollie_is_downloadable ) {
				$rollie_woo_order_status_icon = 'fas fa-download';
			} else {
				$rollie_woo_order_status_icon = 'fas fa-check';
				if ( $animated ) {
					$rollie_woo_order_status_icon .= ' faa-pulse animated faa-slow';
				}
			}

			break;
		case 'canceled':
			$rollie_woo_order_status_icon = 'fas fa-times';
			break;
		case 'refunded':
			$rollie_woo_order_status_icon = 'far fa-handshake';
			break;
		case 'failed':
			$rollie_woo_order_status_icon = 'fas fa-exclamation-triangle faa-slow';
			if ( $animated ) {
				$rollie_woo_order_status_icon .= ' flash  faa-slow';
			}
			break;
		default:
			$rollie_woo_order_status_icon = 'fas fa-dolly-flatbed';
			break;

	}
	if ( $url ) {
		return '<a href=' . esc_url( $url ) . "><i class= 'm-3 rollie_woo_order_status_icon " . esc_attr( $rollie_woo_order_status_icon ) . "' ></i></a>";
	} else {
		return "<i class= 'm-3 rollie_woo_order_status_icon " . esc_attr( $rollie_woo_order_status_icon ) . "' ></i>";
	}
}

function rollie_woo_orders_custom_column( $columns ) {
	unset( $columns['order-number'] );
	unset( $columns['order-date'] );
	unset( $columns['order-status'] );
	unset( $columns['order-total'] );
	unset( $columns['order-actions'] );
	$columns ['rollie_order-custom_column'] = __( 'Orders', 'woocommerce' );
	return $columns;
}
add_filter( 'woocommerce_my_account_my_orders_columns', 'rollie_woo_orders_custom_column' );

function rollie_woo_order_custom_column( $order ) {

	?>
	<div class='rollie_woo_order_table rollie_table rollie_woo_border_custom_column_rad '>
		<a href=" <?php echo esc_url( $order->get_view_order_url() ); ?>	" >
			<div class='  rollie_woo_order_table_banner'>		
				<?php $rollie_o_date = $order->get_date_created()->date_i18n( 'Y-m-d' ); ?>
				<div class="col-12 d-flex">
					<div class='col-8 text-left'><?php esc_html_e( 'Order Date', 'woocommerce' ) . ': ' . $rollie_o_date; ?></div>
					<div class='col-4 text-right'><?php esc_html( __( 'id', 'woocommerce' ) . ': #' . $order->get_order_number() ); ?></div>
				</div>
			</div>
		</a>
		<div class='row m-0 py-1 rollie_woo_order_table rollie_darker_main_color'>
			<div class='col-12'>
				<div class='<?php esc_attr( rollie_embl_subtitles() ); ?>'>
					<?Php
					foreach ( $order->get_items() as $item_id => $item ) {
						$product = $item->get_product();
						?>
						<div class='row rollie_woo_order_item_row  '>
							<div class='col-4 col-md-2  rollie_woo_order_table_thumbnail'><?php echo $product->get_image( 'woocommerce_gallery_thumbnail' ); ?></div>
							<div class='col-8 col-md-10'>
								<div class='row m-0 '>
									<div class='col-md-8 col-12 text-left'><?php esc_html( $item->get_name() ); ?></div>
									<div class='col-md-4 col-12 text-center rollie_wrap_n'> <?php echo esc_html( wc_price( $item->get_total() ) ); ?><span class='font-weight-bold'> x </span><?php echo esc_html( $item->get_quantity() ); ?></div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class='row rollie_woo_order_summary_row   <?php echo esc_html( rollie_embl_subtitles( true ) ); ?>'>		
					<div class='col-4 small text-center rollie_flex_text_center'> 
						<div> 	
							
							<?php echo rollie_woo_order_status_icon( $order->get_status(), $order->has_downloadable_item(), $order->get_view_order_url() ); // ignore wpcs ?>
							<div class="rollie_line_h_1 pt-1"><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></div>
							<div class="rollie_line_h_1 ">
							<?php
							if ( $order->get_status() == 'completed' && $order->has_downloadable_item() ) {
								esc_html__( 'Downloadable', 'woocommerce' );}
							?>
							</div>
						</div>	
					</div>
					<div class='col-8 text-right '><div class='small'> <?php echo esc_html( __( 'Shipping:', 'woocommerce' ) . ': ' . wc_price( $order->get_shipping_total() ) ); ?></div>
					<span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
					<h4 class='text-right'><?php echo esc_html( wc_price( $order->get_total() ) ); ?></h4>
				</div>
			</div>
		</div>
		<div class='rollie_woo_order_actions p-0 m-0 col-12 rollie_flex_text_center'>
			<?php
			$actions = wc_get_account_orders_actions( $order );
			if ( ! empty( $actions ) ) {
				foreach ( $actions as $key => $action ) {
					echo '<a href="' . esc_url( $action['url'] ) . '" class="inline-block  rollie_button  mx-auto my-1 rollie_f_b_f btn ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
				}
			}
			?>
		</div>	
	</div>		
	<?php
}
add_action( 'woocommerce_my_account_my_orders_column_rollie_order-custom_column', 'rollie_woo_order_custom_column' );

// Counts how many orders have been ordered
function rollie_get_total_orders_e( $status ) {
	if ( class_exists( 'WP_CountUp_JS_Main' ) ) {

		echo do_shortcode( '[countup start="0" end="' . esc_attr( rollie_get_total_orders( $status ) ) . '" decimals="0" duration="5"]' );
	} else {
		echo esc_html( rollie_get_total_orders( $status ) );
	}
}
function rollie_get_total_orders( $status ) {

	$customer_orders = wc_get_orders(
		array(
			'meta_key'    => '_customer_user',
			'meta_value'  => get_current_user_id(),
			'post_type'   => wc_get_order_types(),
			'post_status' => $status,
			'paginate'    => true,
		)
	);
	return esc_html( $customer_orders->total );
}

function rollie_woo_orders_table_sort_menu() {
	?>
	<div class='row rollie_orders_sort_menu rollie_darker_main_color rollie_table rollie_menus_shadow text-center mb-3'>
		<div class=" rollie_woo_order_table_banner col-12">		
			<h2 class="col-12 text-left"><?php esc_html_e( 'Your orders', 'rollie' ); ?></h2>
		</div>
		<div class='col-6 col-md-4 col-xl-6  rollie_my_acc_nav_side 
		<?php
		if ( is_wc_endpoint_url( 'orders' ) ) {
			echo 'rollie_sort_orders_current  rollie_menus_shadow';}
		?>
		'  >	 
			<a href='<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>'>
				<div class='rollie_sort_orders_counter m-auto'>
					<h3>
						<?php rollie_get_total_orders_e( array( 'wc-on-hold', 'wc-pending', 'wc-processing', 'wc-cancelled', ' wc-refunded', 'wc-failed', 'wc-completed', 'wc-refunded' ) ); ?>
						
					</h3>
					<i class='fas fa-shopping-basket' ></i>
				</div>	
				<?php echo '<div class="m-auto text-center">' . esc_html__( 'All', 'woocommerce' ) . '</div>'; ?>
			</a>
		</div>


		<div class='col-6 col-md-4 col-xl-6  rollie_my_acc_nav_side 	
		<?php
		if ( is_wc_endpoint_url( 'completed' ) ) {
			echo 'rollie_sort_orders_current';}
		?>
		'>
			<a href='<?php echo esc_url( wc_get_account_endpoint_url( 'completed' ) ); ?>'>
				<div class='rollie_sort_orders_counter m-auto'>
					<h3><?php rollie_get_total_orders_e( array( 'wc-completed' ) ); ?></h3>
					<i class='fas fa-check'></i>
				</div>
				<?php echo "<div  class='m-auto text-center'>" . esc_html__( 'Completed', 'woocommerce' ) . '</div>'; ?>
			</a>
		</div>
		<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side 
		<?php
		if ( is_wc_endpoint_url( 'processing' ) ) {
			echo 'rollie_sort_orders_current';}
		?>
		 '>
			<a href='<?php echo wc_get_account_endpoint_url( 'processing' ); ?>'>
				<div class='rollie_sort_orders_counter m-auto'>
					<h3><?php rollie_get_total_orders_e( array( 'wc-processing' ) ); ?></h3>
					<i class='fas fa-shipping-fast'></i>
				</div>	
				<?php echo "<div class='m-auto text-center'>" . esc_html__( 'Processing', 'woocommerce' ) . '</div>'; ?>
			</a>
		</div>
		<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side 
		<?php
		if ( is_wc_endpoint_url( 'on-hold' ) ) {
			echo 'rollie_sort_orders_current';}
		?>
		'>	
			<a href='<?php echo wc_get_account_endpoint_url( 'on-hold' ); ?>'>
				<div class='rollie_sort_orders_counter m-auto'>
					<h3><?php	rollie_get_total_orders_e( array( 'wc-on-hold', 'wc-pending' ) ); ?></h3>
					<i class='fas  fa-sync'  ></i>
				</div>	
				<?php echo "<div  class='m-auto text-center'>" . esc_html__( 'On-hold', 'woocommerce' ) . ' & ' . esc_html__( 'Pending', 'woocommerce' ) . '</div>'; ?>
				
			</a>
		</div>
		<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side 
		<?php
		if ( is_wc_endpoint_url( 'canceled' ) ) {
			echo 'rollie_sort_orders_current';}
		?>
		'>	
			<a href='<?php echo wc_get_account_endpoint_url( 'canceled' ); ?>'>
				<div class='rollie_sort_orders_counter m-auto'>
					<h3><?php	rollie_get_total_orders_e( array( 'wc-canceled', 'wc-failed' ) ); ?> </h3>
					<i class='fas fa-times'></i>
				</div>		
				<?php echo "<div  class='m-auto text-center'>" . esc_html__( 'Canceled', 'woocommerce' ) . ' & ' . esc_html__( 'Failed', 'woocommerce' ) . '</div>'; ?>
			</a>
		</div>


		<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side 
		<?php
		if ( is_wc_endpoint_url( 'refunded' ) ) {
			echo 'rollie_sort_orders_current';}
		?>
		'>
			<a href='<?php echo wc_get_account_endpoint_url( 'refunded' ); ?>'>
				<div class='rollie_sort_orders_counter m-auto '>
					<h3>	<?php	rollie_get_total_orders_e( array( 'wc-refunded' ) ); ?></h3>
					<i class='fas fa-handshake' ></i>
				</div>
				<?php	echo "<div class='m-auto text-center'>" . esc_html__( 'Refunded', 'woocommerce' ) . '</div>'; ?>
			</a>
		</div>
	</div>
	<?php

}

add_action( 'woocommerce_before_account_orders', 'rollie_woo_orders_table_sort_menu' );

function rollie_filter_woo_account_menu_item_classes( $classes, $endpoint ) {

	if ( 1 == get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) ) {
		$classes[] .= ' col-6  ';
		$classes[] .= ' rollie_my_acc_nav_big_tiles ';
		$classes[] .= ' col-lg-4  ';
	} elseif ( 2 == get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) ) {
		$classes[] .= ' rollie_my_acc_nav_side ';

	} elseif ( 3 == get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) ) {
		$classes[] .= ' rollie_my_acc_nav_wide ';
	}
	return $classes;
};
add_filter( 'woocommerce_account_menu_item_classes', 'rollie_filter_woo_account_menu_item_classes', 10, 2 );

function rollie_action_woo_before_account_navigation() {
	$rollie_actual_link = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) == ) {
		$rollie_actual_link  { /*if is displayed dashboard page apply class that creates bigger tiles*/
		$rollie_dash_class = 'rollie_my_acc_dashboard rollie_table';
		}
	} else {
		$rollie_dash_class = '';
	}

	$rollie_current_user = wp_get_current_user();

	if ( get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) == 1 ) {
		$rollie_class_c         = 'rollie_my_acc_nav_big_tiles_c';
		$rollie_user_info_class = ' col-12 col-lg-3 ';
	} elseif ( get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) == 2 ) {

		$rollie_class_c = 'rollie_table rollie_my_acc_nav_side_c rollie_f_navs position-sticky';

		$rollie_class_c        .= ' col-5';
		$rollie_class_c        .= ' col-lg-4';
		$rollie_class_c        .= ' rollie_menus_shadow';
		$rollie_user_info_class = 'col-12';
	} elseif ( 3 == get_theme_mod( 'rollie_woo_l_my_account_nav', 1 ) ) {
		$rollie_class_c = 'rollie_my_acc_nav_wide_c';
	}
	if ( is_user_logged_in() ) {
		$rollie_class_c .= ' rollie_logged_in';
	} else {
		$rollie_class_c .= ' rollie_logged_out';
	}
	echo "<div class=' " . esc_attr( $rollie_class_c ) . " '>";
	echo "<div class=' " . esc_attr( $rollie_dash_class ) . "  rollie_my_acc_container   '>";
	if ( is_user_logged_in() ) { // if is logged in
		echo "<figure class=' " . esc_attr( $rollie_user_info_class ) . " rollie_woo_order_table_banner m-0 border-0 rollie_menus_shadow'>";
		echo "<img class='mx-auto d-block rollie_avatar avatar' alt='" . esc_attr( $rollie_current_user->display_name ) . "' src='" . esc_url( get_avatar_url( get_current_user_id() ) ) . "''>";
		echo "<figcaption class='p-2'>";

		if ( ! empty( $rollie_current_user->user_login ) ) {
			echo "<p><span class='rollie_my_acc_nav_login'>" . esc_html( $rollie_current_user->user_login ) . ' </span></p>';
		}

		if ( ! empty( $rollie_current_user->user_firstname ) || ! empty( $rollie_current_user->user_lastname ) ) {
			echo "<p class='rollie_my_acc_nav_name'>" . esc_html( $rollie_current_user->user_firstname ) . ' ' . esc_html( $rollie_current_user->user_lastname ) . '</p>';
		}

		if ( ! empty( $rollie_current_user->user_email ) ) {
			echo "<p class=' rollie_my_acc_nav_email'>" . esc_html( $rollie_current_user->user_email ) . '</p>';
		}
		echo "<p class=' rollie_my_acc_nav_logout'><a href=" . esc_url( wp_logout_url() ) . '>' . esc_html__( 'Logout', 'woocommerce' ) . '</a></span>';
		echo '</figcaption>';
		echo '</figure>';

	} else {
		echo "<div class='woocommerce'>";
		woocommerce_login_form();
		echo '</div>';
	}
}
add_action( 'woocommerce_before_account_navigation', 'rollie_action_woo_before_account_navigation' );

function rollie_action_woo_after_account_navigation() {
	echo '</div>';
	echo '</div>';
}
add_action( 'woocommerce_after_account_navigation', 'rollie_action_woo_after_account_navigation' );

function rollie_center_my_account_page() {
	echo "<div class='rollie_flex_text_center h-100'>";
	echo '<div>';
}
add_action( 'woocommerce_account_content', 'rollie_center_my_account_page', 1 );
add_action( 'woocommerce_account_content', 'rollie_action_woo_after_account_navigation', 400 );

function rollie_endpoint_titles( $title, $id ) {
	if ( is_wc_endpoint_url( 'canceled' ) && in_the_loop() ) { // add your endpoint urls
		$title = __( 'Orders', 'woocommerce' ); // change your entry-title
	} elseif ( is_wc_endpoint_url( 'on-hold' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'refunded' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'Processing' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'completed' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );

	} elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) {
		$title = __( 'Account Details', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'dashboard' ) && in_the_loop() ) {
		$title = __( 'Dashboard', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'orders', 'downloads' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) {
		$title = __( 'Downloads', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ) {
		$title = __( 'Addresses', 'woocommerce' );
	} elseif ( is_wc_endpoint_url( 'payment-methods' ) && in_the_loop() ) {
		$title = __( 'Payment methods', 'woocommerce' );
	}
	return $title;
}
add_filter( 'the_title', 'rollie_endpoint_titles', 10, 2 );

// Cart

function rollie_woo_cart_total_content() {
	echo "<div class='rollie_woo_cart_total rollie_table rollie_table rollie_woo_border_custom_column_rad col-12'>";
}
function rollie_woo_cart_content() {
	echo "<div class='rollie_woo_cart_content rollie_table rollie_woo_border_custom_column_rad'>";
}
function rollie_div_wraper_end() {
	echo '</div>';
}
function rollie_woo_order_review_content() {
	echo "<div class='rollie_woo_order_review_content rollie_table rollie_woo_border_custom_column_rad'>";
}
add_action( 'woocommerce_before_cart_table', 'rollie_woo_cart_content', 1 );
add_action( 'woocommerce_after_cart_table', 'rollie_div_wraper_end', 200 );
add_action( 'woocommerce_before_cart_totals', 'rollie_woo_cart_total_content', 1 );
add_action( 'woocommerce_after_cart_totals', 'rollie_div_wraper_end', 200 );
add_action( 'woocommerce_checkout_before_order_review', 'rollie_woo_order_review_content', 1 );
add_action( 'woocommerce_checkout_after_order_review', 'rollie_div_wraper_end', 200 );

function rollie_woo_cart_totals_order_total_html( $value ) {
	$value = "<h4 class='rollie_f_subtitles_h4 rollie_woo_cart_total_c'>" . esc_html( $value ) . '</h4>';
	return $value;
}
add_filter( 'woocommerce_cart_totals_order_total_html', 'rollie_woo_cart_totals_order_total_html', 10, 1 );

function rollie_woo_orders_pagination() {
	$args = array(
		'meta_value' => get_current_user_id(),
		'paginate'   => true,
	);
	if ( is_wc_endpoint_url( 'completed' ) ) {
		$args['post_status'] = array( 'wc-completed' );
	} elseif ( is_wc_endpoint_url( 'on-hold' ) ) {
		$args['post_status'] = array( 'wc-on-hold', 'wc-pending' );
	} elseif ( is_wc_endpoint_url( 'processing' ) ) {
		$args['post_status'] = array( 'wc-processing' );
	} elseif ( is_wc_endpoint_url( 'refunded' ) ) {
		$args['post_status'] = array( 'wc-refunded' );
	} elseif ( is_wc_endpoint_url( 'canceled' ) ) {
		$args['post_status'] = array( 'wc-canceled', 'wc-failed' );
	}

	$customer_orders = wc_get_orders( $args );
	$paged           = get_query_var( 'orders' ) ? get_query_var( 'orders' ) : 1;
	rollie_pagination( $customer_orders->max_num_pages, 2, $paged, 'orders' );

}
add_action( 'woocommerce_before_account_orders_pagination', 'rollie_woo_orders_pagination' );

function rollie_woo_cart_item_thumbnail( $product_get_image, $cart_item, $cart_item_key ) {
	return "<div class='woocommerce_gallery_thumbnail'>" . $product_get_image . '</div>';
};
add_filter( 'woocommerce_cart_item_thumbnail', 'rollie_woo_cart_item_thumbnail', 10, 3 );

function rollie_order_details( $order ) {
	$status   = $order->get_status();
	$step_0   = '';
	$step_1   = '';
	$step_2   = '';
	$step_0_i = rollie_woo_order_status_icon( 'on-hold', false, false, false );
	$step_1_i = rollie_woo_order_status_icon( 'processing', false, false, false );
	$step_2_i = rollie_woo_order_status_icon( 'completed', false, false, false );

	$step_1_str = __( 'Processing', 'woocommerce' );

	if ( 'cancelled' == $status || 'failed' == $status ) {
		$step_0        = 'rollie_error_color';
		$step_1        = 'rollie_muted_color';
		$step_2        = 'rollie_muted_color';
		$step_0_status = true;
		$step_1_status = false;
		$step_2_status = false;

		$step_0_i = rollie_woo_order_status_icon( $status );

	} elseif ( 'pending' == $status || 'on-hold' == $status ) {
		$step_0 = 'rollie_success_color';
		$step_1 = 'rollie_muted_color';
		$step_2 = 'rollie_muted_color';

		$step_0_i      = rollie_woo_order_status_icon( $status );
		$step_1_i     .= ' rollie_muted_text_color ';
		$step_2_i     .= ' rollie_muted_text_color ';
		$step_0_status = true;
		$step_1_status = false;
		$step_2_status = false;
	} elseif ( 'processing' == $status ) {

		$step_0        = 'rollie_success_color';
		$step_1        = 'rollie_success_color';
		$step_2        = 'rollie_muted_color';
		$step_1_i     .= rollie_woo_order_status_icon( $status );
		$step_2_i     .= ' rollie_muted_text_color ';
		$step_0_status = true;
		$step_1_status = true;
		$step_2_status = false;
	} elseif ( 'completed' == $status || 'refunded' == $status ) {
		$step_0        = 'rollie_success_color';
		$step_1        = 'rollie_success_color';
		$step_2        = 'rollie_success_color';
		$step_0_status = true;
		$step_1_status = true;
		$step_2_status = true;
		$step_2_i     .= rollie_woo_order_status_icon( $status );

	} else {
		$step_0        = 'rollie_success_color';
		$step_1        = 'rollie_success_color';
		$step_2        = 'rollie_muted_color';
		$step_2_i     .= ' rollie_muted_text_color ';
		$step_0_status = true;
		$step_1_status = true;
		$step_2_status = false;
	}

	$date_cr        = $order->get_date_created();
	$date_paid      = $order->get_date_paid();
	$date_completed = $order->get_date_completed();

	if ( $order->has_downloadable_item() && 'refunded' == ! $status ) {
		$step_2_i = rollie_woo_order_status_icon( $status, true, false, false );
	}
	?>

	<div class='container-fluid rollie_woo_order_progress px-0 py-3 '>
		<div class= 'row'>
			<h2 class='w-100'><?php esc_html__( 'Order details', 'woocommerce' ); ?></h2>
			<?php
			if ( 'failed' == $order->get_status() || 'canceled' == $order->get_status() ) {
				$color_status = 'text-danger';
			} elseif ( 'processing' == $order->get_status() || 'success' == $order->get_status() || 'refunded' == $order->get_status() ) {
				$color_status = 'text-success';
			} else {
				$color_status = 'text-warning';
			}
			?>
			<div class='order-describe text-center w-100 p-2 '>
				<?php
				echo substr(
					wp_kses_post(
						apply_filters(
							'woocommerce_order_tracking_status',
							sprintf(
								__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
								'<span class="order-number">' . esc_html( $order->get_order_number() ) . '</span>',
								'<span class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</span>',
								'<h4 class="order-status ' . esc_attr( $color_status ) . '">' . wc_get_order_status_name( $order->get_status() ) . '</h4>'
							)
						)
					),
					0,
					-1
				);
				?>
			</div>
			<?php
			if ( 'bacs' == $order->get_payment_method() && ( 'pending' == $order->get_status() || 'on-hold' == $order->get_status() ) ) {
				echo '<div class="col-12" >';
				rollie_get_bacs_account_details_order();
				echo ' </div>';
			}
			?>
			<h3 class='col-12 rollie_fancy_line '><?php echo substr( __( 'Order status.', 'woocommerce' ), 0, -1 ); ?></h3>
			<div class='rollie_woo_order_progress_bar  col-3 '><i class=" rollie_flex_text_center rollie_woo_order_status_icon fas fa-clipboard-list  "></i><hr class='rollie_success_color'></hr>
				<?php
				echo '<div>' . esc_html__( 'Order created', 'woocommerce' ) . '</div>';
				if ( $date_cr ) {
					echo '<small>' . esc_html( $date_cr->date_i18n() ) . ' ' . esc_html( $date_cr->date_i18n( 'h:m' ) ) . '</small>';
				}
				?>
			</div>
			<div class='rollie_woo_order_progress_bar col-3 
			<?php
			if ( ! $step_0_status ) {
				echo 'rollie_muted_text_color';
			}
			?>
			'>
			<i class=' rollie_flex_text_center  <?php echo esc_html( $step_0_i ); ?>'></i><hr class='<?Php echo esc_html( $step_0 ); ?>'></hr>
				<?php
				if ( 'refunded' != $status && 'completed' != $status && 'processing' != $status ) {
					echo wc_get_order_status_name( $status );
				}
				echo '<div>' . esc_html__( 'Payment', 'woocommerce' ) . ': ' . '</div>';
				$payment = wc_get_payment_gateway_by_order( $order );
				if ( $payment ) {
					echo '<div>' . esc_html( $payment->get_method_title() ) . '</div>';
				}

				if ( $date_paid ) {

					echo '<small>' . esc_html( $date_paid->date_i18n() ) . ' ' . esc_html( $date_paid->date_i18n( 'h:m' ) ) . '</small>';
				}

				?>
			</div>
			<div class='rollie_woo_order_progress_bar col-3 
			<?php
			if ( ! $step_1_status ) {
				echo 'rollie_muted_text_color';}
			?>
			'><i class=' rollie_flex_text_center  <?php echo esc_html( $step_1_i ); ?>'></i><hr class='<?Php echo esc_html( $step_1 ); ?>'></hr> <span><?php?></span>
				<?php echo '<div>' . esc_html__( 'Processing', 'woocommerce' ) . '</div>'; ?>
			</div>
			<div class='rollie_woo_order_progress_bar  
			<?php
			if ( ! $step_2_status ) {
				echo 'rollie_muted_text_color';}
			?>
			col-3'><i class=' rollie_flex_text_center  <?php echo esc_attr( $step_2_i ); ?>'></i><hr class='<?Php echo esc_attr( $step_2 ); ?>'></hr>
				<?php
				echo '<div>' . wc_get_order_status_name( $status ) . '</div>';
				if ( $date_completed ) {
					echo '<small>' . esc_html( $date_completed->date_i18n() ) . ' ' . esc_html( $date_completed->date_i18n( 'h:m' ) ) . '</small>';
				}
				?>
			</div>	
			<?php
			if ( 'completed' == $status ) {
				echo '<div>' . esc_html( $order->get_date_completed() ) . '</div>';}
			?>
		</div>
	</div>
	<div class="rollie_woo_order_table rollie_table rollie_darker_main_color rollie_woo_border_custom_column_rad ">

	<?php
}
	add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 10 );
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );

	add_action( 'woocommerce_order_details_before_order_table', 'rollie_order_details' );
	add_action( 'woocommerce_order_details_after_order_table', 'rollie_div_wraper_end' );
	add_filter( 'woocommerce_order_item_name', 'rollie_product_thumbnail_order_details', 20, 3 );


function rollie_get_bacs_account_details_order() {

	rollie_get_bacs_account_details_html();
}

function rollie_woo_thankyou_order_received_text( $var, $order ) {

	$var  = '<div class="rollie_thankyou_message text-center">' . esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ) . '<div><i class="fas fa-check text-success rollie_thankyou_icon"></i></div>' . $var;
	$var .= '</div>';
	return $var;
};
add_filter( 'woocommerce_thankyou_order_received_text', 'rollie_woo_thankyou_order_received_text', 10, 2 );

function rollie_product_thumbnail_order_details( $item_name, $item, $is_visible ) {
	if ( is_wc_endpoint_url( 'view-order' ) || is_wc_endpoint_url( 'order-received' ) ) {
		$product   = $item->get_product();
		$thumbnail = $product->get_image( 'woocommerce_gallery_thumbnail' );
		if ( $product->get_image_id() > 0 ) {
			$item_name = "<div class=' d-inline-block p-1 rollie_woo_order_table_thumbnail'>" . $thumbnail . '</div><div class="d-inline-block">' . $item_name . '</div>';
		}
	}
	return $item_name;

}

function rollie_get_bacs_account_details_html( $echo = true ) {

	ob_start();

	$gateway   = new WC_Gateway_BACS();
	$country   = WC()->countries->get_base_country();
	$locale    = $gateway->get_country_locale();
	$bacs_info = get_option( 'woocommerce_bacs_accounts' );

	// Get sortcode label in the $locale array and use appropriate one
	$sort_code_label = isset( $locale[ $country ]['sortcode']['label'] ) ? $locale[ $country ]['sortcode']['label'] : __( 'Sort code', 'woocommerce' );

	?>
		<div class="woocommerce-bacs-bank-details m-2">
			<h2 class="wc-bacs-bank-details-heading"><?php esc_html__( 'Our bank details', 'woocommerce' ); ?></h2>
			<div class=' rollie_table rollie_woo_border_custom_column_rad rollie_darker_main_color'>
			<?php

			if ( $bacs_info ) :
				foreach ( $bacs_info as $account ) :

					$account_name   = esc_attr( wp_unslash( $account['account_name'] ) );
					$bank_name      = esc_attr( wp_unslash( $account['bank_name'] ) );
					$account_number = esc_attr( $account['account_number'] );
					$sort_code      = esc_attr( $account['sort_code'] );
					$iban_code      = esc_attr( $account['iban'] );
					$bic_code       = esc_attr( $account['bic'] );
					?>
					<h3 class="wc-bacs-bank-details-account-name"><?php echo esc_html( $account_name ); ?>:</h3>
					<ul class="wc-bacs-bank-details order_details bacs_details">
						<li class="bank_name"><?php esc_html__( 'Bank', 'woocommerce' ); ?>: <strong><?php echo esc_html( $bank_name ); ?></strong></li>
						<li class="account_number"><?php esc_html__( 'Account number', 'woocommerce' ); ?>: <strong><?php echo esc_html( $account_number ); ?></strong></li>
						<li class="sort_code"><?php echo esc_html( $sort_code_label ); ?>: <strong><?php echo esc_html( $sort_code ); ?></strong></li>
						<li class="iban"><?php esc_html__( 'IBAN', 'woocommerce' ); ?>: <strong><?php echo esc_html( $iban_code ); ?></strong></li>
						<li class="bic"><?php esc_html__( 'BIC', 'woocommerce' ); ?>: <strong><?php echo esc_html( $bic_code ); ?></strong></li>
					</ul>
					<?php
				endforeach;
			endif;
			?>
			</div>
		</div>
		<?php

		$output = ob_get_clean();

		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
}
function rollie_product_attributes( $product, $limit = 1, $display_key = true ) {
	$product_attributes = array();
	$limit_incr         = 0;
	// Display weight and dimensions before attribute list.
	$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

	if ( $display_dimensions && $product->has_weight() ) {
		$product_attributes['weight'] = array(
			'label' => __( 'Weight', 'woocommerce' ),
			'value' => wc_format_weight( $product->get_weight() ),
		);
	}

	if ( $display_dimensions && $product->has_dimensions() ) {
		$product_attributes['dimensions'] = array(
			'label' => __( 'Dimensions', 'woocommerce' ),
			'value' => wc_format_dimensions( $product->get_dimensions( false ) ),
		);
	}

	// Add product attributes to list.
	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );

	foreach ( $attributes as $attribute ) {
		if ( $limit <= $limit_incr ) {
			break;
		}
		$values = array();

		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );

				if ( $attribute_taxonomy->attribute_public ) {
					$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
				} else {
					$values[] = $value_name;
				}
			}
		} else {
			$values = $attribute->get_options();

			foreach ( $values as $value ) {
				$value = make_clickable( esc_html( $value ) );
			}
		}
		$i   = 0;
		$len = count( $values );
		if ( $display_key ) {
			echo '<div class="rollie_product_attr_mini rollie_f_excerpt">';
		} else {
			echo '<span class="rollie_product_attr_mini rollie_f_excerpt">';
		}

		if ( $display_key ) {
			echo '<span class="rollie_product_attr_key">';
			echo wc_attribute_label( $attribute->get_name() ) . ': ';
		}
		echo '</span>';
		echo '<span class="rollie_product_attr_mini_val rollie_f_excerpt ">';
		foreach ( $values as $key => $value ) {
			if ( $i == $len - 1 ) {
				echo $value;
			} else {
				echo $value . ', ';
			}
			// ???
			$i++;

		}
		echo '</span>';
		if ( $display_key ) {
			echo '</div>';
		} else {
			echo '</span>';
		}
		$limit_incr++;
	}

}

function woocomerce_rollie_nav_top_icons() {
	?>
		<button class="btn" data-toggle="collapse"  data-target="#rollie_nav_user_info" aria-expanded="false" aria-controls="rollie_nav_user_info">
			<i class='fas fa-user'></i>
		</button>	
		<button class="btn" data-toggle="collapse"   data-target="#rollie_nav_cart_info" aria-expanded="false" aria-controls="rollie_nav_cart_info">
			<i class='fas fa-shopping-bag'></i>
		</button>	
	<?php
}
	add_action( 'rollie_nav_top_icons_right', 'woocomerce_rollie_nav_top_icons', 20 );

function woocommerce_rollie_nav_top_icons_colapsed() {

	if ( 'small' == get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) ) {
		echo "<div id='rollie_nav_user_info' class='collapse rollie_menus_shadow col-8 col-md-3 p-0'> ";
	} else {
		echo "<div id='rollie_nav_user_info' class='collapse rollie_menus_shadow rollie_flex_text_center rollie_nav_top_icons_side_item rollie_collapse_side'> ";

	}

	if ( is_user_logged_in() ) {
		do_action( 'woocommerce_account_navigation' );
	} else {
		rollie_action_woo_before_account_navigation();
		rollie_action_woo_after_account_navigation();
	}
	?>
	</div>

	<?php
	if ( get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) == 'small' ) {
		echo '<div  class="collapse  rollie_menus_shadow rollie_navbar_color rollie_table  col-8 col-md-3 p-0 " id="rollie_nav_cart_info">';
	} else {
		echo '<div class="collapse  rollie_menus_shadow rollie_navbar_color rollie_table rollie_collapse_side rollie_nav_top_icons_side_item" id="rollie_nav_cart_info">';
	}

	$items_count           = WC()->cart->get_cart_contents_count();
	$text_label            = _n( 'item', 'items', $items_count, 'rollie' );
	$rollie_minicart_count = '<small> ' . $text_label . ': ' . $items_count . '</small>';

	the_widget(
		'WC_Widget_Cart',
		'',
		array(
			'before_widget' => '<div class="widget woocommerce widget_shopping_cart  ">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="rollie_woo_order_table_banner border-0 rollie_woo_color rollie_f_navs col-12 row text-center"><div class="col-9"><i class="fas text-left fa-shopping-bag pl-2 float-left"></i>',
			'after_title'   => '</div><div class="col-3 ">' . esc_html( $rollie_minicart_count ) . '</div></div>',

		)
	);
	echo '</div>';
}
add_action( 'rollie_nav_top_icons_colapsed_content', 'woocommerce_rollie_nav_top_icons_colapsed', 20 );
