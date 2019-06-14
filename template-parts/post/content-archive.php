	
	

		<header class="container-fluid rollie_title_container rollie_title_bg_color">

					<div class="row m-0  ">
						<div class=" offset-1 col-5   rollie_f_headings rollie_f_headings_h2 rollie_title_text_color rollie_flex_text_center">
						<?php
						$rollie_arch_title = rollie_get_translated_archive_title();
							echo $rollie_arch_title;

						?>
						</div>
						<div class="col-5  rollie_f_excerpt_s  rollie_flex_text_center rollie_subtitle_text_color">
							
							
						</div>
				
					</div>
				
		
		</header>
</div><!-- closing page head from header.php-->
<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in index.php-->
	<?php	rollie_breadcrumb();?>
	<main id="<?php echo 'page-' . get_the_ID(); ?>">
	 
		 <div class=" row m-0">
		 	
		<?php

		$rollie_is_active_sidebar_left  = is_active_sidebar( 'sidebar_left' ) && $rollie_allow_sidebars ;
		$rollie_is_active_sidebar_right = is_active_sidebar( 'sidebar_right' ) && $rollie_allow_sidebars ;

		if ( $rollie_is_active_sidebar_left && $rollie_allow_sidebars ) {
			echo "<aside class='rollie_sidebar_left   ".$rollie_sidebar_col." '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside >';
			$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
		} elseif ( ! $rollie_is_active_sidebar_right  ) {
			$rollie_offset_var      = 'offset-md-0   col-12 col-md-12   offset-lg-0';// col lg-12 col-md-10
			$rollie_entry_offset_lg = 'offset-md-1';
		} else {
				$rollie_offset_var = 'offset-1  col-md-8 offset-md-2';
		}

		echo "<div class='rollie_main_post_content rollie_f_pp_content rollie_main_theme_text_color   " . $rollie_main_col . " '>";



		?>
			
			<article class="entry-content-page  <?php echo $rollie_entry_offset_lg; ?> ">
				
					<div class="row">
						<div class="col-10 offset-1  col-lg-8 offset-lg-2  ">	
	  
		<?php
		if ( is_category() && function_exists( 'get_field' ) ) {

			  $cat_id = get_queried_object_id();

			  echo get_field( 'category_excerpt', $wp_query->get_queried_object_id() );
		} else {

				 the_content();
		}

		?>
				  <!-- Page Content -->
						</div>
					</div>
				
			</article><!-- .entry-content-page -->

		
