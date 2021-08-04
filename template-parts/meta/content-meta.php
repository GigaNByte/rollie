<div class="p-3 rollie_subtitle_text_color rollie_f_meta d-flex flex-wrap">
	<div class='rollie_f_meta d-flex'>
		<div class="rollie_author text-center p-2">
			<?php
			if ( get_theme_mod( 'rollie_display_author_avatar' . $rollie_template_sufix ) && ! empty( get_the_author() ) ) {
				rollie_avatar( get_the_author(), false );
			}
			if ( get_theme_mod( 'rollie_display_author' . $rollie_template_sufix ) ) {
				echo '<span>' . get_the_author_link() . '</span>';
			}
			?>
		</div>	
		<?php
		if ( get_theme_mod( 'rollie_display_date' . $rollie_template_sufix ) ) {
			?>
		<div class="rollie_date m-auto text-center p-2" > 
			<?php echo get_the_date( get_option( 'date_format' ) ); ?> 
		</div>			
			<?php
		}
		?>

	</div>
	<div class='m-auto rollie_subtitle_text_color d-flex flex-nowrap '>
		<span class='px-2'>	
			<?php esc_html_e( 'Comments', 'rollie' ); ?>
		</span>
		<span class='px-2'>
			<?php rollie_comments_counter(); ?>		
		</span>
	</div>
</div>
