<?php
if ( is_single() ) {
	$rollie_template = '_spp';
} elseif ( is_page() ) {
	$rollie_template = '_sp';
}
?>		
<div class="rollie_post_page_metadata row justify-content-center">
		<?php
		if ( get_theme_mod( 'rollie_display_date' . $rollie_template, true ) ) {
			$time_string = '<time class="rollie_date col-auto" datetime="%1$s">%2$s</time>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
			echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput
		}
		?>
	<?php

	if ( get_theme_mod( 'rollie_display_author' . $rollie_template, true ) ) {
		?>
			<div class= 'rollie_author col-auto'>
				<?php echo esc_html( __( 'Author', 'rollie' ) . ': ' ); ?>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
				<?php the_author(); ?>	
				</a>
			</div>	
		<?php
	}
	if ( has_category() ) {
		echo "<div class = 'rollie_categories col-auto'>" . esc_html__( 'Categories', 'rollie' ) . ': ';
		get_the_category( ', ' );
		echo '</div>';
	};
	?>
</div>
