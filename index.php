<?php
require_once get_template_directory() .'/include/rollie_posts_pages_bootstrap_class_variables.php';	
 get_header();
	

	// variables for content-post-page and customizer
	$rollie_row_counter                    = 0;
	$rollie_rows_counter                   = 0;
	$rollie_current_posts_row_limit        = 0;
	$rollie_current_style                  = 0;
	$rollie_need_single_row_tag_at_style_2 = true;
	if(is_archive()){
	$rollie_style_display_for_rest         = get_theme_mod( 'rollie_style_display_for_rest_ar_php' );
	$rollie_one_on_row_panoramix1          = get_theme_mod( 'rollie_one_on_row_panoramix1_ar_php' );
	$rollie_two_on_row_surroundix2         = get_theme_mod( 'rollie_two_on_row_surroundix2_ar_php' );
	}
	else{
	$rollie_style_display_for_rest         = get_theme_mod( 'rollie_style_display_for_rest_php' );
	$rollie_one_on_row_panoramix1          = get_theme_mod( 'rollie_one_on_row_panoramix1_php' );
	$rollie_two_on_row_surroundix2         = get_theme_mod( 'rollie_two_on_row_surroundix2_php' );
	}


if ( is_home() ) {
	global $post;

	$page_for_posts_id = get_option( 'page_for_posts' );
	if ( $page_for_posts_id ) {
		$post = get_page( $page_for_posts_id );
		setup_postdata( $post );
	}
	


	get_template_part( 'template-parts/post/content-post-page' );

rewind_posts();
}


if ( have_posts() ) :

	while ( have_posts() ) :
		the_post();

		include locate_template( 'template-parts/post/content-index.php' );
		
	endwhile;
endif;
?>
</main>
	  
	<?php

	if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {
		 $rollie_sidebar_col = 'col-'.get_theme_mod('rollie_posts_page_l_sidebar_size',2);
		echo "<aside class='rollie_sidebar_right ".$rollie_sidebar_col." '>";
		dynamic_sidebar( 'sidebar_right' );
		echo '</aside>';
	}
	rollie_pagination();
	get_sidebar( 'bottom_1' );
	if ( is_archive() ) {
		if ( is_active_sidebar( 'sidebar_bottom_archive' ) ) {
			echo '<section class="row rollie_sidebar_bottom">';
				dynamic_sidebar( 'sidebar_bottom_archive' );
			echo '</section >';
		}
	}

	?>
</div>
	<?php get_footer(); ?>