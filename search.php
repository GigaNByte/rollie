<?php 
	require_once get_template_directory() .'/include/rollie_posts_pages_bootstrap_class_variables.php';	
get_header(); ?>



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


get_template_part( 'template-parts/post/content-post-page' );

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

		include locate_template( 'template-parts/post/content-index.php' );
		
	endwhile;
else :

	?>
	<div class='row'>
		<div class='col-12'>
			<?php	 _e('Nothing matched your search terms' ,'rollie') ?>
		</div>
	</div>
	<?php
endif;
get_search_form();



rollie_pagination();

?>	
<?php

if ( is_active_sidebar( 'sidebar_right' && $rollie_allow_sidebars ) ) {
		echo "<aside class='rollie_sidebar_right ".$rollie_sidebar_col." '>";// offset-1
		dynamic_sidebar( 'sidebar_right' );
		echo '</aside >';
	}
	get_sidebar( 'bottom_1' );
	if ( is_archive() ) {
		if ( is_active_sidebar( 'sidebar_bottom_archive' ) ) {
			echo '<section class="row rollie_sidebar_bottom">';
			dynamic_sidebar( 'sidebar_bottom_archive' );
			echo '</section>';
		}
	}?>


	<?php	get_footer();?>
	
