<?php get_header(); ?>
	<div class="rollie_content_container_padding_bottom">
			<main id="<?php echo 'page-' . get_the_ID(); ?>">
	<?php


	// variables for content-post-page and customizer
	$rollie_row_counter                    = 0;
	$rollie_rows_counter                   = 0;
	$rollie_current_posts_row_limit        = 0;
	$rollie_current_style                  = 0;
	$rollie_need_single_row_tag_at_style_2 = true;
	$rollie_style_display_for_rest         = get_theme_mod( 'rollie_style_display_for_rest_ct_php' );
	$rollie_one_on_row_panoramix1          = get_theme_mod( 'rollie_one_on_row_panoramix1_ct_php' );
	$rollie_two_on_row_surroundix2         = get_theme_mod( 'rollie_two_on_row_surroundix2_ct_php' );

	require locate_template( 'include/rollie_posts_pages_bootstrap_class_variables.php' );




		get_template_part( 'template-parts/post/content-category' );





	if ( have_posts() ) :

		while ( have_posts() ) :
			the_post();


			// include(locate_template('template-parts/post/content-index.php',true));
			include locate_template( 'template-parts/post/content-index.php' );
			// get_template_part( 'template-parts/post/content-index' );
			endwhile;
		endif;




	if ( function_exists( 'rollie_pagination' ) ) {
			rollie_pagination();
	}

	?>
	 </div> 
	<?Php
	if ( is_active_sidebar( 'sidebar_right' ) ) {
		echo "<aside class='rollie_sidebar_right  col-2 '>";// offset-1
		dynamic_sidebar( 'sidebar_right' );
		echo '</aside >';
	}


	?>
		</main>  
		
	
			
		</div>	
		
	<?php get_footer(); ?>
