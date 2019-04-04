<?php

if ( function_exists( 'icl_t' ) ) {
	$rollie_search_str  = icl_t( 'Rollie', 'search-search', 'Search' );
	$rollie_results_str = icl_t( 'Rollie', 'search-search_results_for', 'Results for:' );
	$rollie_nothing     = icl_t( 'Rollie', 'search-nothing_matched', 'Nothing matched your search terms' );
} else {
	$rollie_search_str  = 'Search';
	$rollie_results_str = 'Results for:';
		$rollie_nothing = 'Nothing matched your search terms';
}


		if( get_theme_mod("rollie_font_headings_sub_pos") == 2 ){
	$rollie_below = "rollie_below_js";
		}
		else{
		
			$rollie_below ="";
		}
?>
	

		<header class="container-fluid rollie_title_container rollie_title_bg_color">

					<div class="row m-0  ">

			
						
						<div class=" offset-1 col-5   rollie_f_headings rollie_title_text_color rollie_flex_text_center">
							<div class="rollie_parent_title <?php echo $rollie_below ?> rollie_second_title_ppr  rollie_f_headings  rollie_f_headings_h2 rollie_category_title_text_color "><?php echo $rollie_search_str; ?></div>
						<?php if ( have_posts() ) : ?>							
							<?php	echo '<div class="text-uppercase  h2 d-inline-block" ><p class="font-weight-normal">' . '(' . $wp_query->found_posts . ') ' . $rollie_results_str,' <i>' . get_search_query() . '</i></div>'; ?>
						<?php else : ?>
							<?php	echo '<div class="text-uppercase  h2 d-inline-block" ><p class="font-weight-normal"><i>' . get_search_query() . '<i></div>'; ?>
						<?php endif; ?>
						</div>
						<div class="col-5  rollie_f_excerpt_s  rollie_flex_text_center rollie_subtitle_text_color">
							<?php
							// echo get_field('rollie_excerpt');
							?>
							 
							
						</div>
				
					</div>
				
		
		</header>


	  <div class="rollie_text_content_align  rollie_main_color">
		 <div class=" row m-0">
		<?php

		$rollie_is_active_sidebar_left  = is_active_sidebar( 'sidebar_left' ) && $rollie_allow_sidebars ;
		$rollie_is_active_sidebar_right = is_active_sidebar( 'sidebar_right' )&& $rollie_allow_sidebars ;

		if ( $rollie_is_active_sidebar_left ) {
			echo "<aside class='rollie_sidebar_right col-2 '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside >';
			$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
		} elseif ( ! $rollie_is_active_sidebar_right ) {
			$rollie_offset_var      = 'offset-md-0   col-12 col-md-12   offset-lg-0';// col lg-12 col-md-10
			$rollie_entry_offset_lg = 'offset-md-1';
		} else {
				$rollie_offset_var = 'offset-1  col-md-8 offset-md-2';
		}

		echo "<div class='rollie_text_post_content rollie_f_pp_content rollie_main_theme_text_color col-10   " . $rollie_offset_var . " '>";




