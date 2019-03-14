<?php

				$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_video' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = '   fa-film ';
} ?>
			

					
		
					
					<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0 rollie_posts_shadow <?php echo 'rollie_main_color'; ?> ">
			<?php
			if ( get_theme_mod( 'rollie_display_format_icon_video' ) ) {
				?>
						<div class=" rollie_icon_first   rollie_icon_video_custom_colors   p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
				<?php	} ?>
								<div class=" rollie_embed dinline-block embed-responsive embed-responsive-16by9">
								<?php echo rollie_get_embedded_media( array( 'video', 'iframe' ) ); ?>
								</div>	
					
		
							<div class=" rollie_first_post_title_c_raw rollie_meta_c_modern rollie_force_m_h_0  <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_meta_c_div_col']; ?>">		
					
			<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
													
							<div onclick="window.location='<?php echo get_page_link(); ?>'" class=" text-center rollie_link_js rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </div>				
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
		<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
						</div>
						<a href="<?php echo get_page_link(); ?>">		
								<div class="rollie_main_color rollie_min_h_modern w-100 p-1 ">
									<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  rollie_main_color <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?>"> 
								
						
							
								
						
										

								<?php
								if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
											echo get_field( 'rollie_excerpt' );
								}
								?>
											
									
									</div>	
									
								</div>	
							</a>		
							
			
									
							
			
						
					
							
						
					
				
							<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
				</article>
		
		
		
