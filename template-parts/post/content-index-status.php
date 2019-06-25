<?php
			$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_status' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = '  fa-newspaper ';
}


if ( ! has_post_thumbnail( get_the_ID() ) ) {
	if ( ! empty( get_theme_mod( 'rollie_alt_status_thumbnail_php' ) ) ) {
		$rollie_thumbnail_url_escaped = get_theme_mod( 'rollie_alt_status_thumbnail_php' );
	} else {
		$rollie_thumbnail_url_escaped = '';
	}
}


?>
			


	
						
				<article id="<?php echo 'post-' . get_the_ID(); ?>" class=" p-0 rollie_posts_shadow  ">
					<div onclick="window.location='<?php echo get_page_link(); ?>'" class="  rollie_link_js p-0 rollie_posts_shadow   ">
				
				<?php
				if ( get_theme_mod( 'rollie_display_format_icon_status' ) ) {
					?>
				<div class="rollie_icon_first  rollie_icon_status_custom_colors  p-1 ">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
		<?php	} ?>					
				
					
						
						<?php


						if ( the_content() ) {
							?>
						
							<div class=" rollie_min_h_modern w-100 ">	
					
			
										
								<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt   <?php echo $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_div_col_modern']; ?>">
							
										
							<?php	the_content(); ?>
									
									</div>	
							
						
								</div>	
								<?php
						}

						if ( ! empty( $rollie_thumbnail_url_escaped ) ) {
							if ( get_theme_mod( 'rollie_aspect_ratio_status' ) ) {
								?>
					<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail_img rollie_post_thumbnail_height_m rollie_link_js p-2 ' >
						<img class="rounded" src="<?php echo $rollie_thumbnail_url_escaped; ?>">
					</div>	
				
								<?php
							} else {
								?>
					<div  class=' rollie_post_thumbnail rollie_post_thumbnail_height_m rollie_post_thumbnail_status p-2 rounded ' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
								<?php
							}
						}
						?>
						<div class=" rollie_meta_c_modern  col-12 ">		
					
					
						<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
													
											
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-1  row">
							<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
																	
							</div>	
									<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>
						</div>
					
					
				</div>
						
		</article>
	
