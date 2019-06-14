<?php
function rollie_pagination( $pages = '', $range = 2 , $paged = false ,$woo_endpoint=false) {

	 // thanks to fellowtuts edited and mulitlanguage edit by Wilczurs/Squanchy
	if ( function_exists( 'icl_t' ) ) {
		$rollie_page_str         = icl_t( 'Rollie', 'pagination-page', 'Page' );
		$rollie_of_str           = icl_t( 'Rollie', 'pagination-of', 'of' );
		$rollie_last_str         = icl_t( 'Rollie', 'pagination-last', 'Last' );
		$rollie_next_str         = icl_t( 'Rollie', 'pagination-next', 'Next' );
		$rollie_current_page_str = icl_t( 'Rollie', 'pagination-current_page', 'Current page' );
		$rollie_previous_str     = icl_t( 'Rollie', 'pagination-previous', 'Previous' );
		$rollie_first_str        = icl_t( 'Rollie', 'pagination-first', 'first' );
	} else {

		$rollie_page_str         = 'Page';
		$rollie_of_str           = 'of';
		$rollie_last_str         = 'Last';
		$rollie_next_str         = 'Next';
		$rollie_current_page_str = 'Current page';
		$rollie_previous_str     = 'Previous';
		$rollie_first_str        = 'First';
	}

	$showitems =  ( $range * 2 ) + 1;

	
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

		echo '<nav class=" m-2 col-12 rollie_pagination rollie_f_b_f" aria-label="Page navigation" role="navigation" >';
		echo '<span class="sr-only">Page navigation</span>';
		echo '<ul class=" m-0 pagination rollie_pagination justify-content-center ft-wpbs">';

		  echo '<li class="rollie_pagination_item page-item disabled   hidden-md-down d-none d-lg-block"><span class=" rollie_subtitle_text_color page-link">' . $rollie_page_str . ' ' . $paged . ' ' . $rollie_of_str . ' ' . $pages . '</span></li>';

		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {

			if ($woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $woo_endpoint, 1 ) );
			}
			else{
				$rollie_page_link = get_pagenum_link( 1 );
			}
			echo '<li class="rollie_pagination_item page-item"><a class="page-link rollie_pagination_link" href="' . $rollie_page_link . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . $rollie_first_str . '</span></a></li>';
		}

		if ( $paged > 1 && $showitems < $pages ) {


			if ($woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $woo_endpoint, $paged - 1 ) );
			}
			else{
				$rollie_page_link =  get_pagenum_link( $paged - 1 );
			}

			echo '<li class="rollie_pagination_item page-item "><a class="page-link rollie_pagination_link" href="' .$rollie_page_link. '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . $rollie_previous_str . '</span></a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				
				if ($woo_endpoint){
					$rollie_page_link =	esc_url( wc_get_endpoint_url( $woo_endpoint, $i ) );
				}
				else{
					$rollie_page_link =  get_pagenum_link( $i );
				}


				echo ( $paged == $i ) ? '<li class="rollie_pagination_item page-item rollie_pagination_active active"><span class="page-link rollie_second_color "><span class="sr-only">' . $rollie_current_page_str . '</span>' . $i . '</span></li>' : '<li class="page-item rollie_pagination_item"><a class="page-link rollie_pagination_link " href="' .$rollie_page_link . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {

			if ($woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $woo_endpoint, $paged + 1 ) );
			}
			else{
				$rollie_page_link = get_pagenum_link( $paged + 1 );
			}


			echo '<li class=" rollie_pagination_item page-item"><a class="page-link rollie_pagination_link " href="' .$rollie_page_link . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . $rollie_next_str . '</span>&rsaquo;</a></li>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {

			if ($woo_endpoint){
				$rollie_page_link =	esc_url( wc_get_endpoint_url( $woo_endpoint, $pages) );
			}
			else{
				$rollie_page_link = get_pagenum_link( $pages ) ;
			}

			echo '<li class="rollie_pagination_item page-item"><a class="page-link rollie_pagination_link " href="' . $rollie_page_link . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . $rollie_last_str . '</span>&raquo;</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
		 // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">'.$rollie_of_str.'</span> '.$pages.' ]</div>';
	}
}





function rollie_comment_pagination( $pages = '', $range = 2 ) {
	 // thanks to fellowtuts edited  mulitlanguage,woocommerce  edit by Wilczurs/Squanchy
	if ( function_exists( 'icl_t' ) ) {
		$rollie_page_str         = icl_t( 'Rollie', 'pagination-page', 'Page' );
		$rollie_of_str           = icl_t( 'Rollie', 'pagination-of', 'of' );
		$rollie_last_str         = icl_t( 'Rollie', 'pagination-last', 'Last' );
		$rollie_next_str         = icl_t( 'Rollie', 'pagination-next', 'Next' );
		$rollie_current_page_str = icl_t( 'Rollie', 'pagination-current_page', 'Current page' );
		$rollie_previous_str     = icl_t( 'Rollie', 'pagination-previous', 'Previous' );
		$rollie_first_str        = icl_t( 'Rollie', 'pagination-first', 'first' );
	} else {

		$rollie_page_str         = 'Page';
		$rollie_of_str           = 'of';
		$rollie_last_str         = 'Last';
		$rollie_next_str         = 'Next';
		$rollie_current_page_str = 'Current page';
		$rollie_previous_str     = 'Previous';
		$rollie_first_str        = 'First';
	}

	$showitems = ( $range * 2 ) + 1;
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

		echo '<nav   class="m-2 rollie_pagination" aria-label="Page navigation" role="navigation">';
		echo '<span class="sr-only">Page navigation</span>';
		echo '<ul class=" m-0 pagination rollie_pagination justify-content-center ft-wpbs">';

		  echo '<li class="rollie_pagination_item page-item disabled   hidden-md-down d-none d-lg-block"><span class=" rollie_subtitle_text_color page-link">' . $rollie_page_str . ' ' . $paged . ' ' . $rollie_of_str . ' ' . $pages . '</span></li>';

		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo '<li class="rollie_pagination_item page-item"><a class="page-link rollie_pagination_link" href="' . get_pagenum_link( 1 ) . '" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block">' . $rollie_first_str . '</span></a></li>';
		}

		if ( $paged > 1 && $showitems < $pages ) {
			echo '<li class="rollie_pagination_item page-item "><a class="page-link rollie_pagination_link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block">' . $rollie_previous_str . '</span></a></li>';
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? '<li class="rollie_pagination_item page-item rollie_pagination_active active"><span class="page-link rollie_second_color "><span class="sr-only">' . $rollie_current_page_str . '</span>' . $i . '</span></li>' : '<li class="page-item rollie_pagination_item"><a class="page-link rollie_pagination_link " href="' . get_pagenum_link( $i ) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo '<li class=" rollie_pagination_item page-item"><a class="page-link rollie_pagination_link " href="' . get_pagenum_link( $paged + 1 ) . '" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">' . $rollie_next_str . '</span>&rsaquo;</a></li>';
		}

		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo '<li class="rollie_pagination_item page-item"><a class="page-link rollie_pagination_link " href="' . get_pagenum_link( $pages ) . '" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">' . $rollie_last_str . '</span>&raquo;</a></li>';
		}

		echo '</ul>';
		echo '</nav>';
		 // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">'.$rollie_of_str.'</span> '.$pages.' ]</div>';
	}
}
