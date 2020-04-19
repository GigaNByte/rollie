<?php
function rollie_pagination( $pages = '', $range = 2 , $paged = false ,$rollie_woo_endpoint=false) {
	$rollie_showitems =  ( $range * 2 ) + 1;
	if (! $paged )
	{
global $paged;

		if ( empty( $paged ) ) {
			$paged = 1;
		}
		if ( $pages == '' ) {
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
		echo '<div class="rollie_pagination_item page-item  disabled   hidden-md-down d-none d-lg-block"><span class=" rollie_subtitle_text_color page-link">' . __("Page","rollie") . ' ' . $paged . ' ' . __("of","rollie") . ' ' . $pages . '</span></div>';

		if ( $paged > 2 && $paged > $range + 1 && $rollie_showitems < $pages ) {

			if ($rollie_woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, 1 ) );
			}
			else{
				$rollie_page_link = get_pagenum_link( 1 );
			}
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . $rollie_page_link . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . __("first","rollie") . '</span></a></div>';
		}

		if ( $paged > 1 && $rollie_showitems < $pages ) {


			if ($rollie_woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $paged - 1 ) );
			}
			else{
				$rollie_page_link =  get_pagenum_link( $paged - 1 );
			}

			echo '<div class="rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' .$rollie_page_link. '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . __("Previous","rollie") . '</span></a></div>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $rollie_showitems ) ) {
				
				if ($rollie_woo_endpoint){
					$rollie_page_link =	esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $i ) );
				}
				else{
					$rollie_page_link =  get_pagenum_link( $i );
				}

				echo ( $paged == $i ) ? '<div class="rollie_pagination_item page-item rollie_pagination_active active"><span class=" rollie_second_color page-link"><span class="sr-only">' . __("Current page","rollie") . '</span>' . $i . '</span></div>' : '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' .$rollie_page_link . '"><span class="sr-only">Page </span>' . $i . '</a></div>';
			}
		}

		if ( $paged < $pages && $rollie_showitems < $pages ) {

			if ($rollie_woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $paged + 1 ) );
			}
			else{
				$rollie_page_link = get_pagenum_link( $paged + 1 );
			}

			echo '<div class=" rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' .$rollie_page_link . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . __("Next","rollie") . '</span>&rsaquo;</a></div>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $rollie_showitems < $pages ) {

			if ($rollie_woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $rollie_woo_endpoint, $pages) );
			}
			else{
				$rollie_page_link = get_pagenum_link( $pages ) ;
			}

			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . $rollie_page_link . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . __("Last","rollie") . '</span>&raquo;</a></div>';
		}
		echo '</nav>';
		echo '</div>';	
		 // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">'.__("of","rollie").'</span> '.$pages.' ]</div>';
	}
}


function rollie_comment_pagination( $pages = '', $range = 2 ) {

	$rollie_showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo '<div class="row justify-content-center">';
		echo '<nav class="m-2 rollie_pagination pagination d-flex  rollie_f_b_f" role="navigation">';	
		echo '<div class="rollie_pagination_item page-item disabled   hidden-md-down d-none d-lg-block"><span class="rollie_subtitle_text_color page-link">' . __("Page","rollie") . ' ' . $paged . ' ' . __("of","rollie") . ' ' . $pages . '</span></div>';

		if ( $paged > 2 && $paged > $range + 1 && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( 1 ) . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . __("first","rollie") . '</span></a></div>';
		}

		if ( $paged > 1 && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item "><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . __("Previous","rollie") . '</span></a></div>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $rollie_showitems ) ) {
				echo ( $paged == $i ) ? '<div class="rollie_pagination_item page-item rollie_pagination_active active"><span class=" rollie_second_color "><span class="sr-only">' . $__("Current page","rollie") . '</span>' . $i . '</span></div>' : '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $i ) . '"><span class="sr-only">Page </span>' . $i . '</a></div>';
			}
		}

		if ( $paged < $pages && $rollie_showitems < $pages ) {
			echo '<div class=" rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . __("Next","rollie") . '</span>&rsaquo;</a></div>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $rollie_showitems < $pages ) {
			echo '<div class="rollie_pagination_item page-item"><a class=" rollie_pagination_link page-link" href="' . get_pagenum_link( $pages ) . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . __("Last","rollie") . '</span>&raquo;</a></div>';
		}
		echo '</nav>';
		echo '</div>';
	}
}
