
		<div class="container-fluid  rollie_title_container rollie_title_bg_color">
		<?php

			$rollie_q_o           = get_queried_object();
					$parent_title = get_the_title( $post->post_parent );
		if ( function_exists( 'get_field' ) ) {
			$rollie_alt_cat_title = get_field( 'rollie_alternate_subtitle', get_the_ID() );
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
		?>
			<div class="titles">

			<?php




			if ( $rollie_alt_cat_title ) {
					  echo '<div class="rollie_parent_title '.$rollie_below.' rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
			}


			?>
			
			</div>
								<div class="row m-0  ">
						<div class=" offset-1 col-5 rollie_title  rollie_f_headings rollie_title_text_color rollie_flex_text_center">
						<?php
						if ( $rollie_alt_cat_title ) {
							echo '<div class="rollie_parent_title '.$rollie_below.'rollie_second_title_ppr rollie_f_headings rollie_f_headings_h2  rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
						}
							 single_cat_title();
						?>
						</div>
						<div class="col-5  rollie_f_excerpt_s  rollie_flex_text_center rollie_subtitle_text_color">
							
						<?php
						if ( function_exists( 'get_field' ) ) {
							echo get_field( 'rollie_category_excerpt', $rollie_q_o );}
						?>
						</div>
				
					</div>
				
			
		</div>


	  <div class="rollie_text_content_align  rollie_main_color ">
		 <div class=" row m-0">
		<?php

		$rollie_is_active_sidebar_left  = is_active_sidebar( 'sidebar_left' );
		$rollie_is_active_sidebar_right = is_active_sidebar( 'sidebar_right' );

		if ( $rollie_is_active_sidebar_left ) {
			echo "<aside class='rollie_sidebar_left    col-2 '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside >';
			$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
		} elseif ( ! $rollie_is_active_sidebar_right ) {
			$rollie_offset_var      = 'offset-md-0   col-12 col-md-12   offset-lg-0';// col lg-12 col-md-10
			$rollie_entry_offset_lg = 'offset-md-1';
		} else {
				$rollie_offset_var = 'offset-1  col-md-8 offset-md-2';
		}

		echo "<div class='rollie_text_post_content rollie_f_pp_content rollie_main_theme_text_color col-10   " . $rollie_offset_var . " '>";



		?>
			
			<div class="entry-content-page  <?php echo $rollie_entry_offset_lg; ?> ">
				<div class="row">
					<div class="col-10 offset-1  col-lg-8 offset-lg-2  ">	
		<?php

				echo category_description();

		?>
				  
					</div>
				</div>
			</div>
	
		
