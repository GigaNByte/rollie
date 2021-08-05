<?php
// to include in function .
// http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/

function rollie_breadcrumb() {
	global $post;
	$parents     = get_post_ancestors( $post );
	$separator   = ' > ';
	$is_woo_page = false;
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_woocommerce() || is_cart() ) {
			$is_woo_page = true;
		}
	}

	if ( ! is_front_page() && ! $is_woo_page ) {

		// Start the breadcrumb with a link to your homepage.
		echo '<nav class="rollie_subtitle_text_color rollie_f_excerpt rollie_breadcrumb" aria-label="Breadcrumb">';
		echo '<a href="' . esc_url( home_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>' . esc_html( $separator );
		foreach ( $parents as $parent ) {
			echo '<a href="' . esc_url( get_page_link( $parent ) ) . '">' . get_the_title( $parent ) . '</a>' . esc_html( $separator );
		}
		$breadcrumb_last_title = '';
		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if ( is_category() ) {
			$breadcrumb_last_title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			if ( is_day() ) {
				$breadcrumb_last_title = get_the_date();
			} elseif ( is_month() ) {
				$breadcrumb_last_title = get_the_date( _x( 'F Y', 'monthly archives date format', 'rollie' ) );
			} elseif ( is_year() ) {
				$breadcrumb_last_title = get_the_date( _x( 'Y', 'yearly archives date format', 'rollie' ) );
			} elseif ( is_tag() ) {
				$breadcrumb_last_title = __( 'Tag:' ) . ' ' . single_tag_title( '', false );
			} else {
				$breadcrumb_last_title = __( 'Blog Archives', 'rollie' );
			}
		} elseif ( is_search() ) {
			$breadcrumb_last_title = __( 'Search', 'rollie' );
		} elseif ( is_page() || is_single() ) {
			$breadcrumb_last_title = get_the_title();
		} elseif ( is_home() ) {
			$page_for_posts_id = get_option( 'page_for_posts' );
			if ( $page_for_posts_id ) {
				$r_post = get_post( $page_for_posts_id );
				setup_postdata( $r_post );
				$breadcrumb_last_title = get_the_title();
				rewind_posts();
			}
		}
		echo '<span class="rollie_category_title_text_color" aria-current="' . esc_attr( $breadcrumb_last_title ) . '">' . esc_html( $breadcrumb_last_title ) . '</span>';
		echo '</nav>';
	}
}
