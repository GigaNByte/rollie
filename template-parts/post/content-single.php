<?php require locate_template( 'include/rollie_single_pages_bootstrap_class_variables.php' ); ?>	
	
<main id="<?php echo 'page-' . get_the_ID(); ?>">

			
		<div class="container-fluid rollie_title_container rollie_title_bg_color">
		<?php
		
		get_template_part( 'template-parts/special/content', 'swap_cat' );

		if ( function_exists( 'icl_t' ) ) {
			$rollie_categories_str = icl_t( 'Rollie', 'info-categories', 'Categories' );
			$rollie_author_str     = icl_t( 'Rollie', 'info-author', 'Author' );
		} else {
			$rollie_categories_str = 'Categories';
			$rollie_author_str     = '';
		}
		
		if( get_theme_mod("rollie_font_headings_sub_pos") == 2 ){
	$rollie_below = "rollie_below_js";
		}
		else
		{
			$rollie_below ="";
		}	
		?>
			
			<div class="titles">

			<?php
			$parent_title = get_the_title( $post->post_parent );
			if ( function_exists( 'get_field' ) ) {
				$rollie_alt_cat_title = get_field( 'rollie_alternate_subtitle' );
						if (empty($rollie_alt_cat_title)&& get_field('rollie_display_subtitle',get_the_ID()))
				{
					$rollie_alt_cat_title = get_bloginfo('name');
				}
			}
			if ( is_page() && $post->post_parent && ( ! $rollie_alt_cat_title ) ) {
				echo '<div class="rollie_f_headings rollie_f_headings_h2 rollie_parent_title '.$rollie_below.'  rollie_category_title_text_color   ">' . $parent_title . '</div>';
			} elseif ( $rollie_alt_cat_title ) {
					  echo '<div class="rollie_f_headings rollie_f_headings_h2 rollie_parent_title '.$rollie_below.' rollie_category_title_text_color">' . $rollie_alt_cat_title . '</div>';
			}

				the_title( '<div class="  rollie_f_headings rollie_title_text_color">', '</div>' );
			?>
				
				<div class=" rollie_f_excerpt_s  rollie_subtitle_text_color col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
					<p>
					<?php
					if ( function_exists( 'get_field' ) ) {
						get_field( 'rollie_excerpt' );}
					?>
					</p>
				</div>
			
		
			
			</div>
			<?php
		//	if ( get_theme_mod( 'rollie_post_section_php' ) == 'bottom' ) {
				
		require locate_template('/template-parts/special/content-singlemeta.php');
			 //} ?>	
		
	
		</div>


	  <article  id="<?php echo 'post-content-' . get_the_ID(); ?> " class="rollie_text_content_align  rollie_main_color ">
	  

	
		 <div class=" row m-0">
		<?php



		if ( is_active_sidebar( 'sidebar_left' )){
			echo "<aside class='rollie_sidebar_left   ".$rollie_single_page_display_style_classes  [$rollie_display_index]['sidebar_l_offset'].$rollie_single_page_sidebar_width."  '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside>';
		}		






		echo "<div class='rollie_text_post_content rollie_f_pp_content  rollie_main_theme_text_color " .$rollie_single_page_display_style_classes[$rollie_display_index]['content_col_width']. $rollie_single_page_display_style_classes[$rollie_display_index]['content_offset'] . " '>";


		?>

			
			
			
		
				
		<?php the_content(); ?>


			

			<?php
			
			?>
		
			</div>
					<?php

					if ( is_active_sidebar( 'sidebar_right' ) ) {
						echo "<div class='rollie_sidebar_right   ".$rollie_single_page_display_style_classes  [$rollie_display_index]['sidebar_r_offset'].$rollie_single_page_sidebar_width."'>";
							dynamic_sidebar( 'sidebar_right' );
						echo '</div>';
					}
					?>

					<?php
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

?>
