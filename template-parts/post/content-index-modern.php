<?php

if ( ( ! empty( get_the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) && $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_lenght'] !== 1 ) {
	$rollie_has_content = true;
} else {
	$rollie_has_content = false;
}


?>
			<article id="<?php echo 'post-' . get_the_ID(); ?>" class="rollie_posts_shadow rollie_d_root">
				<div class="position-relative">
					<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail_modern rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
					
				</div>
					
				<div class="  rollie_first_post_title_c_modern  
				<?php
				if ( ! $rollie_has_content ) {
					echo 'rollie_modern_gradient';}
				?>
				 " >
					<div class=" p-0 rollie_d_contents_ch 
					<?php
					if ( $rollie_has_content ) {
						echo 'rollie_modern_gradient';}
					?>
						" >
						
							<div class="rollie_meta_c_modern <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_meta_c_div_col']; ?>">		
				
									<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
													
							<div onclick="window.location='<?php echo get_page_link(); ?>'" class=" rollie_link_js text-center rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </div>				
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
								<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
						</div>
					
						
						<?php


						if ( $rollie_has_content ) {
							?>
						</div>
							<div class="rollie_main_color rollie_min_h_modern w-100 ">	
					
							<?php
							if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {

								?>
								<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  rollie_main_color <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> "> 
																																			<?php

																																			if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
																																											  echo get_field( 'rollie_excerpt' );
																																			} else {
																																													  the_excerpt();

																																			}
																																			?>
										</div>	
										<?php
							}
							if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] > 2 ) {

								?>
										<div class="rollie_main_theme_text_color rollie_main_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> ">	 <p>
											 <?php




												if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
													echo esc_html( rollie_limit_text( get_field( 'rollie_excerpt' ), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'], '...' ) );
												} else {
													echo esc_html( rollie_limit_text( get_the_excerpt(), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'], '...' ) );
												}





												?>
												 </p>	</div>	
								 <?php

							}
							?>
								</div>	
								<?php
						} else {
							?>
							</div>	
							<?php
						}
						?>
				
					
				</div>
						<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
			</article>	

	
