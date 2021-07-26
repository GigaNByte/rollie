<?php
if ( get_theme_mod( 'rollie_tag_char' ) ) {
	$rollie_tag_char = get_theme_mod( 'rollie_tag_char' );
} else {
		$rollie_tag_char = '';
}
if ( get_theme_mod( 'rollie_tags_display_icon' ) ) {

	if ( get_theme_mod( 'rollie_tags_icon' ) ) {
		$rollie_tags_icon = get_theme_mod( 'rollie_tags_icon' );
	} else {
		$rollie_tags_icon = 'fa-tags';
	}
	$rollie_tags_icon = '<i class=" fas fa-1x ' . $rollie_tags_icon . ' "></i>';
}
?>
<div class='rollie_post_categories'>
	<div class="rollie_icon_first  d-inline-block   m-1 ">	
	
	<?php
		$rollie_c_format = get_post_format();
	if ( isset( $rollie_tags_icon ) && ( get_the_tags() || $rollie_c_format || has_category() ) ) {
		echo $rollie_tags_icon;
		$rollie_c_format = get_post_format();
	}
	?>

	</div>
		
	<?php
		$rollie_p_format_a = get_post_format_link( get_post_format() );
	if ( $rollie_c_format && get_theme_mod( 'rollie_tags_display_post_format' ) ) {

		echo ' <a href=' . $rollie_p_format_a . '>' . get_post_format_string( $rollie_c_format ) . '</a> ';
	}

		the_category( ' ' );
		the_tags( ' ' . $rollie_tag_char, ' ' . $rollie_tag_char, '' );
	?>
</div>
