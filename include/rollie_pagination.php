<?php
/**
 * This file contains functions for creating pagination for pages and comments
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

 /**
  * Creates pagination for pages
  */
function rollie_pagination( $pages = '', $range = 2, $paged = false, $rollie_woo_endpoint = false ) {
	$rollie_showitems = ( $range * 2 ) + 1;
	if ( ! $paged ) {
		global $paged;

		if ( empty( $paged ) ) {
			$paged = 1;
		}
		if ( '' == $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}
	}

	if ( 1 != $pages ) {

		echo '<div class="row col-12 justify-content-center rollie_footer_margin">';
		echo '<nav class="m-2 rollie_pagination pagination d-flex  rollie_f_b_f" role="navigation">';
		echo '<div class="rollie_pagination_item page-item  disabled   hidden-md-down d-none d-lg-block"><span class=" rollie_subtitle_text_color page-link">' . esc_html( __( 'Page', 'rollie' ) . ' ' . $paged . ' ' . __( 'of', 'rollie' ) . ' ' . $pages ) . '</span></div>';

		if ( $paged > 2 && $paged > $range + 1 && $rollie_showitems < $pages ) {

			if ( $rollie_woo_endpoint ) {
				$rollie_page_link = esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, 1 ) );
			} else {
				$rollie_page_link = get_pagenum_link( 1 );
			}
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . esc_url( $rollie_page_link ) . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'First', 'rollie' ) . '</span></a></div>';
		}

		if ( $paged > 1 && $rollie_showitems < $pages ) {

			if ( $rollie_woo_endpoint ) {
				$rollie_page_link = esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $paged - 1 ) );
			} else {
				$rollie_page_link = get_pagenum_link( $paged - 1 );
			}

			echo '<div class="rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' . esc_url( $rollie_page_link ) . '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Previous', 'rollie' ) . '</span></a></div>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $rollie_showitems ) ) {

				if ( $rollie_woo_endpoint ) {
					$rollie_page_link = esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $i ) );
				} else {
					$rollie_page_link = get_pagenum_link( $i );
				}

				echo ( $paged == $i ) ? '<div class="rollie_pagination_item page-item rollie_pagination_active active"><span class=" rollie_second_color page-link"><span class="sr-only">' . esc_html__( 'Current page', 'rollie' ) . '</span>' . esc_html( $i ) . '</span></div>' : '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . esc_url( $rollie_page_link ) . '"><span class="sr-only">Page </span>' . esc_html( $i ) . '</a></div>';
			}
		}

		if ( $paged < $pages && $rollie_showitems < $pages ) {

			if ( $rollie_woo_endpoint ) {
				$rollie_page_link = esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $paged + 1 ) );
			} else {
				$rollie_page_link = get_pagenum_link( $paged + 1 );
			}

			echo '<div class=" rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' . esc_url( $rollie_page_link ) . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Next', 'rollie' ) . '</span>&rsaquo;</a></div>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $rollie_showitems < $pages ) {

			if ( $rollie_woo_endpoint ) {
				$rollie_page_link = esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $pages ) );
			} else {
				$rollie_page_link = get_pagenum_link( $pages );
			}

			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . esc_url( $rollie_page_link ) . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Last', 'rollie' ) . '</span>&raquo;</a></div>';
		}
		echo '</nav>';
		echo '</div>';
		// echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">'.__("of","rollie").'</span> '.$pages.' ]</div>'; .
	}
}

 /**
  * Creates pagination for comments
  */
function rollie_comment_pagination( $pages = '', $range = 2 ) {

	$rollie_showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( '' == $pages ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	// wpcs warns about get_pagenum_link() is sanitized by default check: wp-docs.
	if ( 1 != $pages ) {
		echo '<div class="row justify-content-center">';
		echo '<nav class="m-2 rollie_pagination pagination d-flex  rollie_f_b_f" role="navigation">';
		echo '<div class="rollie_pagination_item page-item disabled   hidden-md-down d-none d-lg-block"><span class="rollie_subtitle_text_color page-link">' . esc_html( __( 'Page', 'rollie' ) . ' ' . $paged . ' ' . __( 'of', 'rollie' ) . ' ' . $pages ) . '</span></div>';

		if ( $paged > 2 && $paged > $range + 1 && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( 1 ) . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'first', 'rollie' ) . '</span></a></div>';
		}

		if ( $paged > 1 && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Previous', 'rollie' ) . '</span></a></div>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $rollie_showitems ) ) {
				echo ( $paged == $i ) ? '<div class="rollie_pagination_item page-item rollie_pagination_active active"><span class=" rollie_second_color "><span class="sr-only">' . esc_html__( 'Current page', 'rollie' ) . '</span>' . esc_html( $i ) . '</span></div>' : '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $i ) . '"><span class="sr-only">Page </span>' . esc_html( $i ) . '</a></div>';
			}
		}

		if ( $paged < $pages && $rollie_showitems < $pages ) {
			echo '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Next', 'rollie' ) . '</span>&rsaquo;</a></div>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $pages ) . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . esc_html__( 'Last', 'rollie' ) . '</span>&raquo;</a></div>';
		}
		echo '</nav>';
		echo '</div>';
	}
}
 /**
  * Creates wp_link_pages pagination
  */

function rollie_link_pages() {

	$args = array(
		'before'           => '<div class="row col-12 justify-content-center"><nav class="m-2 rollie_pagination pagination d-flex  rollie_f_b_f" role="navigation"><div class="rollie_pagination_item page-item disabled"><span class="rollie_subtitle_text_color page-link">' . esc_html( __( 'Page:', 'rollie' ) ) . '</span></div>',
		'after'            => '</nav></div>',
		'link_before'      => '',
		'link_after'       => '',
		'aria_current'     => 'page',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'rollie' ),
		'previouspagelink' => __( 'Previous page', 'rollie' ),
		'pagelink'         => '%',
		'echo'             => 1,
	);
	wp_link_pages( $args );
}
  // define the wp_link_pages_link callback to add pagination classes before links
function filter_wp_link_pages_link( $link, $i ) {
	global $page;
	$rollie_class = '';
	if ( $page == $i ) {
		$rollie_class = 'rollie_pagination_active active';
	}
	// make filter magic happen here...
	$before = '<div class="rollie_pagination_item page-item ' . esc_attr( $rollie_class ) . '"><span class="rollie_subtitle_text_color page-link">';
	$after  = '</span></div>';
	return $before . $link . $after;
};
// add the filter
add_filter( 'wp_link_pages_link', 'filter_wp_link_pages_link', 10, 2 );
