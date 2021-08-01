<?php
// to include in function .
// http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/

function rollie_breadcrumb() {
	$separator   = ' > ';
	$is_woo_page = false;
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_woocommerce() || is_cart() ) {
			$is_woo_page = true;
		}
	}
	if ( ! is_front_page() && ! $is_woo_page ) {

		// Start the breadcrumb with a link to your homepage.
		echo '<nav class="rollie_subtitle_text_color rollie_f_excerpt rollie_breadcrumb ">';
		echo '<a c href="' . esc_url( home_url() ) . '">' . esc_html( bloginfo( 'name' ) ) . '</a>' . esc_html( $separator );

		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if ( is_category() || is_single() ) {

			the_category( ', ' );

		} elseif ( is_archive() || is_single() ) {
			if ( is_day() ) {
				printf( esc_html( '%s' ), get_the_date() );
			} elseif ( is_month() ) {
				printf( esc_html( '%s' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'rollie' ) ) );
			} elseif ( is_year() ) {
				printf( esc_html( '%s' ), get_the_date( _x( 'Y', 'yearly archives date format', 'rollie' ) ) );
			} else {
				esc_html_e( 'Blog Archives', 'rollie' );
			}
		}

		// If the current page is a single post, show its title with the separator.
		if ( is_single() ) {
			the_title( '<span class="rollie_category_title_text_color">' . esc_html( $separator ), '</span>', true );
		}

		// If the current page is a static page, show its title.
		if ( is_page() ) {
			the_title( '<span class="rollie_category_title_text_color">', '</span>', true );
		}

		// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog.
		if ( is_home() ) {

			$page_for_posts_id = get_option( 'page_for_posts' );
			if ( $page_for_posts_id ) {
				$r_post = get_post( $page_for_posts_id );
				setup_postdata( $r_post );
				the_title();
				rewind_posts();
			}
		}
		echo '</nav>';
	}
}
