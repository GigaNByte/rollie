<?php

					$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_gallery' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = ' fa-image ';
}
if ( ( ! empty( get_the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) ) {
	$rollie_has_content = true;
} else {
	$rollie_has_content = false;
}













?>
				<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0 rollie_posts_shadow  ">
					<div onclick="window.location='<?php echo get_page_link(); ?>'" class=" p-0 rollie_link_js <?php echo 'rollie_main_color'; ?> ">
				<?php
				if ( get_theme_mod( 'rollie_display_format_icon_gallery' ) ) {
					?>
							<div class="rollie_icon_first   rollie_icon_gallery_custom_colors  p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
					<?php	} ?>
						<?php
						if ( get_post_gallery() ) {

							$rollie_gallery    = get_post_gallery( get_the_ID(), false );
							$rollie_galleryIDS = $rollie_gallery['ids'];
							$rollie_parts      = explode( ',', $rollie_galleryIDS );
							?>

								
									<div   class="rollie_gallery_post_format p-1 ">	
										<div class="swiper-container rollie_gallery_1_swiper ">
											<div class="swiper-wrapper">
											
									<?php
									foreach ( $rollie_parts  as $key => $value ) {
											$rollie_image_full = wp_get_attachment_image_src( $value, 'full' );
										?>
										
												<div class="swiper-slide rollie_post_thumbnail_img">
													<img src="<?php echo $rollie_image_full[0]; ?>"    alt="Gallery image" />
												</div>
											
							<?php } ?>

											</div>
											<div class="swiper-pagination"></div>
										</div>
									</div>	
							<?php
						} else {



							if ( ! get_post_gallery() ) {
								if ( get_theme_mod( 'rollie_aspect_ratio_image' ) ) {
									?>
											<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail_img rollie_post_thumbnail_height_m rollie_link_js' >
												<img src="<?php echo $rollie_thumbnail_url_escaped; ?>">
											</div>	
								
									<?php
								} else {
									?>
											<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
									<?php
								}
							}
						}
						?>
						
							<div class=" rollie_first_post_title_c_raw rollie_meta_c_modern rollie_force_m_h_0  <?php echo col-12 ?>">		
						
									<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
							
							<div onclick="window.location='<?php echo get_page_link(); ?>'" class=" text-center rollie_link_js  rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </div>				
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


							?>
							</div>	
							<?php
						}
						?>
				
						<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
				</div>
			</article>
		
		
