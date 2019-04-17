	
<?php
	require locate_template( 'include/rollie_single_pages_bootstrap_class_variables.php' );
	


	if ( function_exists( 'get_field' ) ) {
				$rollie_alt_cat_title = get_field( 'rollie_alternate_subtitle' );
		
				if (empty($rollie_alt_cat_title) && get_field('rollie_display_subtitle',get_the_ID()))
				{
			
					$rollie_alt_cat_title = get_bloginfo('name');
				}
						
			} 
			$parent_title = get_the_title( $post->post_parent );
 ?>

	
		<header class="container-fluid rollie_title_container rollie_title_bg_color">
			<div class="titles">

			<?php




		

	if( get_theme_mod("rollie_font_headings_sub_pos") == 2 ) {
		$rollie_below = "rollie_below_js";
						
	}
	else {
		
			$rollie_below ="";
	}

			if ( is_page() && $post->post_parent && ( ! $rollie_alt_cat_title ) ) {
				echo '<div class="rollie_parent_title '.$rollie_below.' rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $parent_title . '</div>';
			} elseif ( $rollie_alt_cat_title ) {
					  echo '<div class="rollie_parent_title '.$rollie_below.' rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
			}

				the_title( '<div class="  rollie_f_headings rollie_title_text_color">', '</div>' ); ?>
				
				<div class=" rollie_f_excerpt_s rollie_subtitle_text_color col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 ">
					<p>
		<?php
		if ( function_exists( 'get_field' ) ) {
				  echo get_field( 'rollie_excerpt' );
		}
		?>
					</p>
				</div>
			
			
			
			</div>
		</header>
	</div><!-- closing page head from header.php-->
	<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in page.php-->
		<main id="<?php echo 'page-' . get_the_ID(); ?>">
		<div class="m-auto">
	  <article id="<?php echo 'page-content-' . get_the_ID(); ?>"  class="rollie_text_content_align ">
	  
		<?php
				require locate_template('/template-parts/special/content-singlemeta.php');
		if ( rollie_page_has_children() ) {
				get_template_part( 'template-parts/page/content', 'page-parent' );
		}
		?>
		 <div class=" row m-0">


		<?php



		if ( is_active_sidebar( 'sidebar_left' )&& $rollie_allow_sidebars  ) {
			echo "<aside class='rollie_sidebar_left ".$rollie_single_page_display_style_classes  [$rollie_display_index]['sidebar_l_offset'].$rollie_single_page_sidebar_width." '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside >';
		}



	

		echo "<div class='rollie_text_post_content rollie_f_pp_content rollie_main_theme_text_color    " .$rollie_single_page_display_style_classes[$rollie_display_index]['content_col_width']. $rollie_single_page_display_style_classes[$rollie_display_index]['content_offset'] . " '>";



		?>
					
		
			<div class="kubitza_container"><hr></hr></div>
				<?php the_content(); ?> <!-- Page Content -->
		
		

		
		</div>
					<?php

					if ( is_active_sidebar( 'sidebar_right' ) && $rollie_allow_sidebars ) {
						echo "<aside class='rollie_sidebar_right ".$rollie_single_page_display_style_classes  [$rollie_display_index]['sidebar_r_offset'].$rollie_single_page_sidebar_width." '>";
							dynamic_sidebar( 'sidebar_right' );
						echo '</aside >';
					}
			
			  get_template_part( 'template-parts/special/content', 'pagination_single' );
	if ( comments_open() || get_comments_number() ) {

		?>
						 <div class='col-12 col-md-8 offset-md-2 '>	
						 <?php
							comments_template();
							?>
						 </div>	
						 <?php
	}
	?>
		</div>
	</article>



					
		
<?php



		get_sidebar( 'bottom_1' );

if ( is_active_sidebar( 'sidebar_bottom_archive' ) ) {
	echo '<section class="row rollie_sidebar_bottom_archive">';
		dynamic_sidebar( 'sidebar_bottom_archive' );
	echo '</section >';

}

?>
