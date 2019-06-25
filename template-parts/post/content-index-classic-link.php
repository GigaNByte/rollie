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
}

if ( empty( $rollie_post_link ) ) {
	$rollie_post_link = get_page_link();
}
	  // HERE
?>
 
<article id="<?php echo 'post-' . get_the_ID(); ?>" class="rollie_posts_shadow">	 
	<a href="<?php echo $rollie_post_link(); ?>">	
	</a>	
	<div  class=' rollie_post_thumbnail rollie_post_thumbnail_height_m ' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' >  	
			<?php

			if ( get_theme_mod( 'rollie_display_format_icon_link' ) ) {
				?>
					<div class="rollie_icon_first  rollie_icon_link_custom_colors p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
				<?php
			}

			?>
					<div class=" <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['second_div_col']; ?> rollie_first_post_title_c rollie_post_classic_title_bg_color rollie_post_thumbnail_height_m m-0 p-0" >
						<div class=" p-1 " >
										
						<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
													
							<a href='<?php echo get_page_link(); ?>'>						
								<h2 class=" rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </h2>				
							</a>			
							<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_metadata_div']; ?> m-0 row">
								<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
							</div>	
					<?php

					if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {

						?>
						<a href="<?php echo get_page_link(); ?>">
							<div  class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  ">
							<?php
							// HERE
							if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {


								echo get_field( 'rollie_excerpt' );

							} else {
										the_excerpt();
							}

							?>
									</div>
							</a>
							<?php
					}

					if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] > 2 ) {
						?>
							<a href="<?php echo get_page_link(); ?>">
								
								
								<div  class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt ">	 <p>
								<?php




								if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
									echo esc_html( rollie_limit_text( get_field( 'rollie_excerpt' ), 30, '...' ) );
								} else {
									echo esc_html( rollie_limit_text( get_the_excerpt(), 20, '...' ) );
								}





								?>
										 </p>	</div>	
								</a>
							<?php

					}
					?>
				
						</div>
					</div>
				</div>	
				<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>	
			</article>	
		
