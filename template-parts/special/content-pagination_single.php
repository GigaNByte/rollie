<?php
if (class_exists('WooCommerce') ){
$cond =true;
	if (is_woocommerce()  && !is_shop() || is_cart()||is_checkout() ){
		$cond = false;
	}
}
if ( get_theme_mod( 'rollie_pagination_enable', true ) && ( ! ( is_page() && ( get_theme_mod( 'rollie_pagination_page_enable', true ) == false ) ) ) && $cond) { 
?>
	<div class='row justify-content-center rollie_footer_margin'>	
		<nav class="m-2 rollie_pagination pagination d-flex  rollie_f_b_f " >
			
	<?php
		if ( is_single() ) {
			$rollie_home_link = get_option( 'page_for_posts' );
		} else {
			$rollie_home_link = get_option( 'page_on_front' );
		}
		$rollie_class = '';
		$rollie_prev_n = '';
		$rollie_next_n = '';
		if ( get_theme_mod( 'rollie_pagination_display_name', true ) ) {
			$previous      = get_previous_post();
			$next          = get_next_post();
			$rollie_next_n = get_the_title( $previous );
			$rollie_prev_n = get_the_title( $next );
			$rollie_class  = 'rollie_subtitle_text_color';
		} 
		if ( get_previous_post_link() ) {

			 echo '<div class=" rollie_pagination_item page-item">' . get_previous_post_link( "<span class='rollie_pagination_link page-link'>%link", '<div class="rollie_flex_text_center">'. $rollie_prev_n .'<i class="fas fa-chevron-left px-3 align-text-top"></i><span class="' . $rollie_class . '">' . __("Previous","rollie") . '</span></div></span>' ) . '</div>';
		}
		if ( get_post_type_archive_link( 'post' ) ) {
			echo '<div class="rollie_pagination_item page-item"> <a href="' . $rollie_home_link . '"><span class="rollie_flex_text_center rollie_pagination_link page-link"><i class="fas fa-home align-text-top"></i></span></a></div>';
		}
		if ( get_next_post_link() ) {
			 echo '<div class="rollie_pagination_item page-item"> ' . get_next_post_link( '<span class="rollie_pagination_link page-link">%link', '<div class="rollie_flex_text_center "><span class="' . $rollie_class . '">' . __("Next","rollie"). '</span><i class="fas fa-chevron-right px-3 align-text-top"></i>' . $rollie_prev_n . '</div></span>' ) . '</div>';
		}
		

	?>
			
		</nav>
	</div>
<?php
}
