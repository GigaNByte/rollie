				
					
				
				
					<article id="<?php echo 'post-' . get_the_ID(); ?>"  class=" p-0 rollie_posts_shadow <?php echo 'rollie_main_color'; ?> ">
						
							<div class=" rollie_meta_c_modern <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_meta_c_div_col']; ?>">		
									
								
													
							<div onclick="window.location='<?php echo get_page_link(); ?>'" class=" rollie_link_js text-center  rollie_first_post_title rollie_title_text_color rollie_f_subtitles"><?php the_title(); ?> </div>				
							
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
							<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
						</div>
					
						
					
						
							<div class="rollie_main_color rollie_min_h_modern w-100 ">	
										<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> ">	 <p>
												<?php
												if ( get_field( 'rollie_excerpt' ) ) {
													echo get_field( 'rollie_excerpt' );
												} else {
													the_excerpt();
												}

												?>
												 </p>	</div>		</div>
						
				
					
				</article>
				
		
