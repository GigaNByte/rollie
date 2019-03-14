	
	
	
		
	
		<header class="container-fluid rollie_title_container">
			

			<?php


			$parent_title         = get_the_title( $post->post_parent );
			
			if ( function_exists( 'get_field' ) ) {
				$rollie_alt_cat_title = get_field( 'rollie_alternate_subtitle' );
				if (empty($rollie_alt_cat_title)&& get_field('rollie_display_subtitle',get_the_ID()))
				{
					$rollie_alt_cat_title = get_bloginfo('name');
				}
			}

		if( get_theme_mod("rollie_font_headings_sub_pos") == 2 ){
	$rollie_below = "rollie_below_js";
		}
		else{
		
			$rollie_below ="";
		}
			if ( is_page() && $post->post_parent && ( ! $rollie_alt_cat_title ) ) {
				echo '<div class="rollie_parent_title '.$rollie_below.' ">' . $parent_title . '</div>';
			} elseif ( $rollie_alt_cat_title ) {
					  echo '<div class="rollie_parent_title '.$rollie_below.' rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
			}

				the_title( '<div class=" rollie_title_text_color">', '</div>' );

			if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) { ?>
					<div class=" rollie_f_excerpt_s rollie_subtitle_text_color col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
						<p>
					<?php get_field( 'rollie_excerpt' ); ?>
						</p>
					</div>
				<?php
			}
			?>
			
			
		</header>


	  <div class="rollie_text_content_align rollie_main_color ">
	  
		<?php
		if ( rollie_page_has_children() ) {
				get_template_part( 'template-parts/page/content', 'page_parent' );
		}
		?>
		 <div class=" row m-0">
		<?php

		$rollie_is_active_sidebar_left = is_active_sidebar( 'sidebar_left' );


		if ( $rollie_is_active_sidebar_left ) {
			echo "<aside class='rollie_sidebar_right  col-2 '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside >';
		}



		if ( $rollie_is_active_sidebar_left ) {
								$rollie_offset_var = 'offset-1 col-md-6 ';
		} else {
				$rollie_offset_var = 'offset-1 offset-md-0 col-md-6 offset-md-3';
		}




		echo "<div class='rollie_text_post_content rollie_f_pp_content rollie_main_theme_text_color col-10   " . $rollie_offset_var . " '>";



		?>
