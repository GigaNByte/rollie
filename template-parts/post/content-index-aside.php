<?php

		$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_aside' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = ' fa-exclamation ';
} ?>

		
			
				
					
		
				
					<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0  rollie_posts_shadow rollie_first_post_title_c_raw   ">
						<?php
						if ( get_theme_mod( 'rollie_display_format_icon_aside' ) ) {
							?>
				<div class="rollie_icon_first  rollie_icon_aside_custom_colors  p-1">	<i class=" fas fa-1x  d-flex  <?php echo $rollie_format_icon; ?>"></i> </div>	
		<?php	} ?>
							<div class=" rollie_meta_c_modern col-12">		
					
								<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
										
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 p-1 row">
								<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
						</div>
					
						
						<?php


						if ( ! empty( get_the_content() ) ) {
							?>
						
									<div class=" rollie_min_h_modern w-100 ">	
					
										<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?>">
									   <?php




										   the_content();



										?>
										</div>	
									</div>	
							<?php
						}
						?>
				
					<?php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
				</article>
					
		
		
