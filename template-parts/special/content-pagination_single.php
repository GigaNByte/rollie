<?php
if ( get_theme_mod( 'rollie_pagination_enable', true ) ) {

	if ( ! ( is_page() && ( get_theme_mod( 'rollie_pagination_page_enable', true ) == false ) ) ) {

		?>

			<div class='col-12 '>
				<nav class="m-2 rollie_pagination  rollie_f_b_f" aria-label="Page navigation" role="navigation" >
					<span class="sr-only"></span>
					<ul class="m-0 pagination rollie_pagination justify-content-center ft-wpbs">
			<?php



			if ( function_exists( 'icl_t' ) ) {
				$rollie_next_str     = icl_t( 'Rollie', 'pagination-next', 'Next' );
				$rollie_previous_str = icl_t( 'Rollie', 'pagination-previous', 'Previous' );
			} else {
					$rollie_next_str     = 'Next';
					$rollie_previous_str = 'Previous';
			}
			if ( is_single() ) {
				$rollie_home_link = get_option( 'page_for_posts' );
			} else {
				$rollie_home_link = get_option( 'page_on_front' );
			}

			if ( get_theme_mod( 'rollie_pagination_display_name', true ) ) {
				$previous      = get_previous_post();
				$next          = get_next_post();
				$rollie_next_n = get_the_title( $previous );
				$rollie_prev_n = get_the_title( $next );
				$rollie_class  = 'rollie_subtitle_text_color';
			} else {
				$rollie_class          = '';
					$rollie_prev_n     = '';
						$rollie_next_n = '';
			}

			if ( get_previous_post_link() ) {

				 echo '<li class=" rollie_pagination_item page-item"> ' . get_previous_post_link( '<span class="page-link   rollie_pagination_link ">%link', '<div>' . $rollie_prev_n . '<i class="fas fa-chevron-left px-1 align-text-top"></i><span class="' . $rollie_class . '">' . $rollie_previous_str . '</span></div></span>' ) . '</li>';
			}
			get_post_type_archive_link( 'post' );
			if ( get_post_type_archive_link( 'post' ) ) {
				echo '<li class="rollie_pagination_item page-item "> <a href="' . $rollie_home_link . '"><span class="page-link rollie_flex_text_center rollie_pagination_link"><i class="fas fa-home align-text-top"></i></span></a></li>';
			}

			if ( get_next_post_link() ) {

					 echo '<li class=" rollie_pagination_item page-item"> ' . get_next_post_link( '<span class="page-link  rollie_pagination_link ">%link', '<div><span class="' . $rollie_class . '">' . $rollie_next_str . '</span><i class="fas fa-chevron-right px-1 align-text-top"></i>' . $rollie_prev_n . '</div></span>' ) . '</li>';
			}
			?>


					</ul>
				</nav>
			</div>
	
			<?php
	}
}?>
