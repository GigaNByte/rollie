<?php
if ( comments_open() && get_theme_mod( 'rollie_display_author_avatar' . $rollie_template_sufix ) ) {

	if ( has_post_format( array( 'status', 'aside' ) ) ) {
		echo '<div class="rollie_show_post_trigger" rollie_post_id= ' . esc_attr( the_ID() ) . ' >';
	} else {
		echo '<a class="col" href="' . esc_url( get_comments_link() ) . '">';
	} ?>

		<span class='m-auto rollie_fourth_text_color p-3 '>
			<?php esc_html_e( 'Comments', 'rollie' ); ?>
		</span>
		<span class='px-2'>
			<?php rollie_comments_counter(); ?>
		</span>

	<?php
	if ( has_post_format( array( 'status', 'aside' ) ) ) {
		echo '</div>';
	} else {
		echo '</a>';
	}
}
?>
