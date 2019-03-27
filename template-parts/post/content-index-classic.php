<article class="rollie_posts_shadow">
			<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' >  	
				<div class=" <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['second_div_col']; ?> rollie_first_post_title_c rollie_post_classic_title_bg_color rollie_post_thumbnail_height_m_c m-0 p-0" >
					<div class=" p-1 rollie_d_contents_ch" >
					
				<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
												
					<div     class=" text-center   rollie_first_post_title rollie_title_text_color rollie_f_subtitles" > <?php the_title(); ?> </a></div>				
						<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
							<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
						</div>	
				<?php

				if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {

					?>
						<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt ">
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
							<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt ">	 <p>
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
					
				</div>
				
			</div>
<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>			
		</article>	
