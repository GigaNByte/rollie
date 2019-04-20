	
	<?php


			$is_post_page_title_single_row = get_theme_mod( 'rollie_posts_page_title_single_row' );
					$parent_title          = get_the_title( $post->post_parent );
		if ( function_exists( 'get_field' ) ) {
			
			$is_display_content_post_page = get_field( 'rollie_display_content_post_page' );
				$rollie_alt_cat_title = get_field( 'rollie_alternate_subtitle', get_the_ID() );
			
				if (empty($rollie_alt_cat_title)&& get_field('rollie_display_subtitle', get_the_ID()))
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

	$rollie_line='';
						if ( get_theme_mod ('rollie_embl_titles' ,0 ) == 1){
								$rollie_line=' rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_t ';
							} 
							 if ( get_theme_mod ('rollie_embl_titles' ,0) == 2){
								$rollie_line=' rollie_fancy_line rollie_fancy_line_t rollie_fancy_line_horizontal';
							} 

	$page_for_posts_id = get_option( 'page_for_posts' );
	if ( $page_for_posts_id ) { ?>
		<header class="container-fluid rollie_title_container rollie_title_bg_color">
			<div class='row'>
		
		<?php


		if ( $is_display_content_post_page && ( ! $is_post_page_title_single_row ) ) {
		
			

			if ( $rollie_alt_cat_title ) {
					  echo '<div class="rollie_parent_title '.$rollie_below.$rollie_line.' rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
			}

				the_title( '<div class="  rollie_f_headings '.$rollie_line.' rollie_title_text_color">', '</div>' );


			?>
			<div class="col-8 offset-2  rollie_f_excerpt_s  rollie_flex_text_center rollie_subtitle_text_color">
							<?php
							if ( function_exists( 'get_field' ) ) {
								echo get_field( 'rollie_excerpt' );}
							?>
							
						</div>
		
			<?php
		}
		if ( $is_display_content_post_page && $is_post_page_title_single_row ) {
						if ( get_theme_mod ('rollie_embl_titles' ,0)== 1){
						echo '<span class="rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_t"></span>';
						}

			?>
						
						<div class=" offset-1 col-5   rollie_f_headings rollie_title_text_color ">
				
					<?php
					
					if ( $rollie_alt_cat_title ) {
						echo '<div class="rollie_parent_title '.$rollie_below.' rollie_second_title_ppr   rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_alt_cat_title . '</div>';
					}

				

						the_title();
				
						}

					?>
						</div>
						<div class="col-5  rollie_f_excerpt_s  rollie_flex_text_center rollie_subtitle_text_color">
							<?php
							if ( function_exists( 'get_field' ) ) {
								echo get_field( 'rollie_excerpt' );}
							?>
							
						</div>
				
					
				</div>
		</header>
				<?php
		}
		
			

	 else {?>
			<header class="container-fluid rollie_title_container rollie_title_bg_color">
			</header>
	<?php }?>
</div><!-- closing page head from header.php-->	
<div class="rollie_content_container_padding_bottom"><!-- tag will be colosed in index.php-->
	<main id="<?php echo 'page-' . get_the_ID(); ?>">
	  <div class="rollie_text_content_align  ">
		 <div class=" row m-0">


		<?php

		$rollie_is_active_sidebar_left  = is_active_sidebar( 'sidebar_left' )&& $rollie_allow_sidebars ;
		$rollie_is_active_sidebar_right = is_active_sidebar( 'sidebar_right' )&& $rollie_allow_sidebars ;

		if ( $rollie_is_active_sidebar_left ) {
			echo "<aside class='rollie_sidebar_left col-2 '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside>';
			$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
		} elseif ( ! $rollie_is_active_sidebar_right ) {
			$rollie_offset_var      = 'offset-md-0   col-12 col-md-12   offset-lg-0';// col lg-12 col-md-10
			$rollie_entry_offset_lg = 'offset-md-1';
		} else {
				$rollie_offset_var = 'offset-1  col-md-8 offset-md-2';
		}

		echo "<div class='rollie_text_post_content rollie_f_pp_content rollie_main_theme_text_color col-10   " . $rollie_offset_var . " '>";



		?>
			
			<div class="entry-content-page  
			<?php
			if ( ! empty( $rollie_entry_offset_lg ) ) {
				echo $rollie_entry_offset_lg;}
			?>
			 ">
				<div class="row">
					<div class="col-10 offset-1 col-lg-8 offset-lg-2  ">
		<?php

	if ( $page_for_posts_id ) { 
		if ( is_category() && function_exists( 'get_field' ) ) {

			  $cat_id = get_queried_object_id();

			  echo get_field( 'category_excerpt', $wp_query->get_queried_object_id() );
		} else {
				 the_content();
		}
	}
		?>
				  <!-- Page Content -->
					</div>
				</div>

			</div><!-- .entry-content-page -->

		
