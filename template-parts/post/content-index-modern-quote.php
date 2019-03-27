<?php
			$rollie_format_icon = esc_html( get_theme_mod( 'rollie_format_icon_class_quote' ) );

if ( ! $rollie_format_icon ) {
	$rollie_format_icon = ' fa-quote-left ';
}


if ( ! has_post_thumbnail( get_the_ID() ) ) {
	if ( ! empty( get_theme_mod( 'rollie_alt_quote_thumbnail_php' ) ) ) {
		$rollie_thumbnail_url_escaped = get_theme_mod( 'rollie_alt_quote_thumbnail_php' );
	} else {
				$rollie_thumbnail_url_escaped = '';
	}
}

if ( ( ! empty( the_content() ) || ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) ) && ( $rollie_post_display_style_classes [ $rollie_current_style ]['post_excerpt_lenght'] !== 1 ) ) {
	$rollie_has_content = true;
} else {
	$rollie_has_content = false;
}
?>
				
				<article id="<?php echo 'post-' . get_the_ID(); ?>" class='rollie_posts_shadow rollie_d_root'>
		<?php
		if ( get_theme_mod( 'rollie_display_format_icon_link' ) ) {
			?>
				<div class="rollie_icon_first rollie_modern_absolute_icon  rollie_icon_quote_custom_colors  p-1">	<i class=" fas fa-2x   <?php echo $rollie_format_icon; ?>"></i> </div>	
		<?php	} ?>		
				
				<div class="position-relative">
					<div  onclick="window.location='<?php echo get_page_link(); ?>'" class=' rollie_post_thumbnail_modern rollie_post_thumbnail_height_m rollie_link_js' style='background-image: url(<?php echo $rollie_thumbnail_url_escaped; ?>);' > </div>	
	
		
		
				</div>
				
				<div class="  rollie_first_post_title_c_modern  
				<?php
				if ( ! $rollie_has_content ) {
					echo 'rollie_post_modern_title_bg_color';}
				?>
					 " >
					<div class=" p-0 
					<?php
					if ( $rollie_has_content ) {
						echo 'rollie_post_modern_title_bg_color';}
					?>
					" >
						
							<div class="rollie_meta_c_modern <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_meta_c_div_col']; ?>">		
									
									<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
						
						</div>
					
						
						<?php


						if ( $rollie_has_content ) {
							?>
							<div class="m-1 ">
								<div class="rollie_main_theme_text_color font-italic  rollie_post_excerpt rollie_f_excerpt  ">
									
							   <?php

								if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {


									echo get_field( 'rollie_excerpt' );
								} else {
									echo get_the_excerpt();
								}
								?>
								</div>	
							
							
							
									<div class="rollie_main_theme_text_color font-weight-bold text-center rollie_post_excerpt rollie_f_excerpt    " > 
									<?php
									if ( function_exists( 'get_field' ) ) {
										echo esc_html( get_field( 'rollie_quote_author', get_the_ID() ) );}
									?>
										 </a></div>				
								
							
							</div>	
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
		
