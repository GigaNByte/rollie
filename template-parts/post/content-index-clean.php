<?php

if ( ( ! empty( get_the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) && $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_lenght_raw'] !== 1 ) {

	$rollie_has_content = true;
} else {

	$rollie_has_content = false;
} ?>
				
				
				
	
		
		
					<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0 rollie_posts_shadow  ">
							<?php

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
						
							<div class=" rollie_first_post_title_c_raw rollie_meta_c_modern rollie_force_m_h_0  col-12">		
					
						<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
													
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
						
							<div class=" rollie_min_h_modern w-100 ">	
					
							<?php
							if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {

								?>
								<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt   <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?>">
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

							if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght_raw'] > 2 ) {

								?>
										<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> ">	 <p>
											 <?php




												if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
													echo esc_html( rollie_limit_text( get_field( 'rollie_excerpt' ), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght_raw'], '...' ) );
												} else {
													echo esc_html( rollie_limit_text( get_the_excerpt(), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght_raw'], '...' ) );
												}



												?>
											

																
												</p>	</div>	
												<?php

							}
							?>
									
									
									<?php




									get_template_part( 'template-parts/post/content', 'metabar' );
									?>
									
						
								
								
									
									
							</div>	
							<?php
						}

						?>
				
							
								
				
				</article>
				
		
		
