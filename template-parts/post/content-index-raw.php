<article id="<?php echo 'post-' . get_the_ID(); ?>"  <?php post_class( 'p-0 rollie_posts_shadow rollie_post_wrapper row' ); ?>>
	<div class=" rollie_meta_c_modern col-12 ">		
		<a href='<?php echo get_page_link(); ?>'>						
			<h2 class=" rollie_title_text_color  rollie_first_post_title rollie_f_subtitles"><?php the_title(); ?> </h2>				
		</a>				
		<div class="rollie_post_metadata rollie_subtitle_text_color <?php echo $rollie_post_display_style_classes[ $rollie_max_posts_on_current_row ]['post_metadata_div']; ?> m-0 row">
			<?php require locate_template( 'template-parts/special/content-meta.php' ); ?>
		</div>	
	</div>
	<div class=" rollie_min_h_modern w-100 ">	
		<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt  <?php echo $rollie_post_display_style_classes [ $rollie_max_posts_on_current_row ]['post_excerpt_div_col_modern']; ?> ">	
			<p>
			<?php
				the_excerpt();
			?>
			</p>	
		</div>		
	</div>
</article>
