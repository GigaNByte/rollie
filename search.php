<?php 
	require_once get_template_directory() .'/include/rollie_posts_pages_bootstrap_class_variables.php';	
get_header(); ?>



<?php






     require locate_template( 'template-parts/post/content-post-page.php' );

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
	
