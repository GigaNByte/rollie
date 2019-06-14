<?php






		get_template_part( 'template-parts/special/content-header' );	

	?>
</div><!-- closing page head from header.php-->		
<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in index.php-->
	<?php rollie_breadcrumb();?>
	<main id="<?php echo 'page-' . get_the_ID(); ?>">	
	 
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

		echo "<div class='rollie_main_post_content rollie_f_pp_content rollie_main_theme_text_color   " . $rollie_main_col . " '>";




