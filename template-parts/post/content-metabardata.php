<?php








if ( get_theme_mod( 'rollie_comments_icon' ) ) {
	$rollie_comments_icon = get_theme_mod( 'rollie_comments_icon' );
} else {
	$rollie_comments_icon = 'fa-comment';

}

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



if ( get_theme_mod( 'rollie_tags_alt_text',false ) ) {
		
		
		
		if ( function_exists( 'icl_t' ) ) {

			$rollie_tags_str   = icl_t( 'Rollie', 'metabar-categories&tags', 'CATS & TAGS' );
		}
		else
		{
			$rollie_tags_str   = 'CATS & TAGS';
		}	
	
		$rollie_tags_icon = $rollie_tags_str;

}

