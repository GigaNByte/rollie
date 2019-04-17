<?php
	$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_link' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = ' fa-link ';
}



if ( ! has_post_thumbnail( get_the_ID() ) ) {
	if ( ! empty( get_theme_mod( 'rollie_alt_link_thumbnail_php' ) ) ) {
		$rollie_thumbnail_url_escaped = get_theme_mod( 'rollie_alt_link_thumbnail_php' );
	} else {
		$rollie_thumbnail_url_escaped = '';
	}
}
if ( function_exists( 'get_field' ) ) {
	$rollie_post_link = esc_url( get_field( 'rollie_external_link', get_the_ID() ) );
} else {
	$rollie_post_link = '';
}

if ( empty( $rollie_post_link ) ) {
	$rollie_post_link = get_page_link();
}
if ( ( ! empty( get_the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) && $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_lenght'] !== 1 ) {
				   $rollie_has_content = true;
} else {
	$rollie_has_content = false;
}

?>	<article id="<?php echo 'post-' . get_the_ID(); ?>" class="rollie_posts_shadow rollie_d_root">
							<?Php
							if ( get_theme_mod( 'rollie_display_format_icon_link' ) ) {
								?>
			<div class="rollie_icon_first rollie_modern_absolute_icon  rollie_icon_link_custom_colors  p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
	<?php	} ?>		
		
			<div class="position-relative">
				<div  onclick="window.location='<?php echo $rollie_post_link; ?>'" class=' rollie_post_thumbnail_modern rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
	
	
		
			</div>
				
				<div class="  rollie_first_post_title_c_modern  
				<?php
				if ( ! $rollie_has_content ) {
					echo 'rollie_post_modern_title_bg_color';}
				?>
				 " >
					<div class=" p-0 rollie_d_contents_ch 
					<?php
					if ( $rollie_has_content ) {
						echo 'rollie_post_modern_title_bg_color';}
					?>
					" >
						
							<div class="rollie_meta_c_modern <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_meta_c_div_col']; ?>">		
					
									<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
					
								<div onclick="window.location='<?php echo $rollie_post_link; ?>'" class=" rollie_link_js  text-center  rollie_title_text_color rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </div>				
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
									<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> "> 
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
											<div class="rollie_main_theme_text_color  rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?> ">	
												
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
						</div>	
						
							<?php
						} else {
							?>
							</div>	
							<?php
						}
						?>
				
					
				</div>
					<?php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
			</article>	
