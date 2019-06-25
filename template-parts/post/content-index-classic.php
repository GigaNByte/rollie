
<article class="rollie_posts_shadow " id="<?php echo 'post-' . get_the_ID(); ?>">
 	<div class="position-relative rollie_post_thumbnail_height_m">
			<img  class='position-absolute rollie_post_thumbnail  rollie_post_thumbnail_height_m ' src='<?php echo $rollie_thumbnail_url_escaped; ?>' alt='<?php echo  $rollie_thumbnail_alt?>'>  	
				<div class=" <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['second_div_col']; ?> rollie_first_post_title_c rollie_post_classic_title_bg_color  m-0 p-0" >
					<div class=" p-1 " >
					
				<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
												
							<a href='<?php echo get_page_link(); ?>'>						
								<h2 class=" rollie_title_text_color  rollie_first_post_title "><?php the_title(); ?> </h2>				
							</a>					
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
			</div>

		</article>	
