<?php
	$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_link' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = ' fa-link ';
}



if ( function_exists( 'get_field' ) ) {
	$rollie_post_link = esc_url( get_field( 'rollie_external_link', get_the_ID() ) );
}
if ( empty( $rollie_post_link ) ) {
	$rollie_post_link = get_page_link();
}

if ( ( ! empty( get_the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) ) {
	$rollie_has_content = true;
} else {
	$rollie_has_content = false;
} ?>
	 
 

		
		
		

				
				
					<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0 rollie_posts_shadow   ">
					<?php
					if ( get_theme_mod( 'rollie_display_format_icon_link' ) ) {
						?>
						<div class="
						<?php
						if ( $rollie_thumbnail_url_escaped ) {
							echo 'rollie_icon_first rollie_modern_absolute_icon';}
						?>
						  rollie_icon_link_custom_colors  p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
						<?php
					}

					if ( get_theme_mod( 'rollie_aspect_ratio_clean' ) ) {
						?>
								<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail_img rollie_post_thumbnail_height_m rollie_link_js' >
									<img src="<?php echo $rollie_thumbnail_url_escaped; ?>">
								</div>	
							
						<?php
					} else {
						if ( $rollie_thumbnail_url_escaped ) {
							?>
							
								<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
							<?php
						}
					}
					?>
			
							<div class=" rollie_first_post_title_c_raw rollie_meta_c_modern rollie_force_m_h_0   col-12 ">		
					
													
								<a href='<?php echo get_page_link(); ?>'>						
									<h2 class=" rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </h2>				
								</a>				
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
								<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
						</div>
					
						
						<?php


						if ( $rollie_has_content ) {
							?>
						
							<a href="<?php echo get_page_link(); ?>">	
								<div class=" rollie_min_h_modern w-100 ">	
						
							<?php
							if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {

								?>
									<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt   <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> "> 
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
											<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> ">	
												
												<p>
													<?php

													if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
														echo esc_html( rollie_limit_text( get_field( 'rollie_excerpt' ), 30, '...' ) );
													} else {
														echo esc_html( rollie_limit_text( get_the_excerpt(), 20, '...' ) );
													}



													?>
																	
																	
												</p>
												
											</div>	
											<?php

							}
							?>
										
									
									</div>	
								
							</a>	
				<?php } ?>
				
					<?php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
								
					
				</article>
				
		
		
