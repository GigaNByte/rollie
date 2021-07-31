<div class='rollie_post_categories'>
	<div class="rollie_icon_first d-inline-block m-1">	
		<?php
			$rollie_c_format = get_post_format();

		if ( get_theme_mod( 'rollie_tags_display_icon', true ) ) {
			echo '<i class=" fas fa-1x fa-tags"></i>';
		}

		?>
	</div>
	<?php
	if ( ! empty( $rollie_c_format ) && get_theme_mod( 'rollie_tags_display_post_format' ) ) {
		echo ' <a href=' . get_post_format_link( get_post_format() ) . '>' . get_post_format_string( $rollie_c_format ) . '</a> ';
	}
		the_category( ' ' );
		the_tags( ' ', ' ' );
	?>
</div>
