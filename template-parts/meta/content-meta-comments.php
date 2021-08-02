<?php
if ( comments_open() && get_theme_mod( 'rollie_display_author_avatar' . $rollie_template_sufix ) ) {
	if ( has_post_format( array( 'status', 'aside' ) ) ) { ?>
		<div class='rollie_show_post_trigger' rollie_post_id='<?php the_ID(); ?>'>
	<?php } else { ?>
		<a class="col" href="'<?php echo get_comments_link(); ?>'">	 
	<?php } ?>
			<span class='m-auto rollie_fourth_text_color'><?php esc_html__( 'Comments', 'rollie' ); ?></span>
		<?php
		rollie_comments_counter();
		if ( has_post_format( array( 'status', 'aside' ) ) ) {
			?>
				
			</div>	
		<?php } else { ?>
			</a>
			<?php
		}
}
?>
