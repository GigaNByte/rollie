<?php


if ( has_nav_menu( 'rollie_cat_swap_menu' ) ) {


	/*
	$rollie_m_o = rollie_get_menu_object_by_registered_slug( 'rollie_cat_swap_menu' );
	if ( function_exists( 'get_field' ) ) {
		$rollie_swap_cat_t = get_field( 'rollie_swap_cat_on_page_type', $rollie_m_o );
	}
	*/

	// if ( $rollie_swap_cat_t && in_array( 'single_post', $rollie_swap_cat_t ) ) {
	?>
 <div class=" rollie_cat_swap_menu">
 

 <div class="swiper-container rollie_cat_swap_swiper">
	 <div class="swiper-button-prev">  </div>
		<?php
		wp_nav_menu(
			array(

				'theme_location'  => 'rollie_cat_swap_menu',

				'container'       => 'div',

				'container_class' => 'swiper-wrapper ',
				'items_wrap'      => '%3$s',
				'menu_class'      => 'navbar-nav rollie_current_cat   swiper-wrapper  row ',

				'walker'          => new Rollie_Walker_Cat_Swap(),



			)
		);

		?>
									
	 <div class="swiper-button-prev">  </div>
	<div class="swiper-button-next">  </div>
								</div>
							
								 </div>
								<?php
								// }
}
