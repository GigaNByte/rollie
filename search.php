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
	$rollie_style_display_for_rest         = get_theme_mod( 'rollie_style_display_for_rest_se_php' );
	$rollie_one_on_row_panoramix1          = get_theme_mod( 'rollie_one_on_row_panoramix1_se_php' );
	$rollie_two_on_row_surroundix2         = get_theme_mod( 'rollie_two_on_row_surroundix2_se_php' );



	require locate_template( 'include/rollie_posts_pages_bootstrap_class_variables.php' );


	// numver says how many words you want to display in excerpt
	// variables for content-post-page and customizer END
		get_template_part( 'template-parts/post/content-search' );





	if ( have_posts() ) :
		?>
		<div class="row">
			<div class="col-12">
			<?php
			get_search_form();
			?>
		</div>
		</div>
		<?php
		while ( have_posts() ) :
			the_post();


			// include(locate_template('template-parts/post/content-index.php',true));
			include locate_template( 'template-parts/post/content-index.php' );
			// get_template_part( 'template-parts/post/content-index' );
			endwhile;
		else :
			if ( function_exists( 'icl_t' ) ) {
				$rollie_nothing_str = icl_t( 'Rollie', 'search-nothing_matched', 'Nothing matched your search terms' );

			} else {
				$rollie_nothing_str = 'Nothing matched your search terms';

			}
			?>
			<div class='row'>
				<div class='col-12'>
			<?php	echo $rollie_nothing_str; ?>
				</div>
			</div>
			<?php
		endif;
		get_search_form();


		if ( function_exists( 'rollie_pagination' ) ) {

			rollie_pagination();
		}
		?>
		</div>  
	<?php

	if ( is_active_sidebar( 'sidebar_right' ) ) {
		echo "<aside class='rollie_sidebar_right offset-1 col-2 '>";// offset-1
		dynamic_sidebar( 'sidebar_right' );
		echo '</aside >';
	}

	?>
			
		
	
				
		</main>	
			
	<?php
	get_sidebar( 'bottom_1' );
	if ( is_archive() ) {
		if ( is_active_sidebar( 'sidebar_bottom_archive' ) ) {
			echo '<section class="row rollie_sidebar_bottom">';
				dynamic_sidebar( 'sidebar_bottom_archive' );
			echo '</section>';
		}
	}
	get_footer()
	?>
