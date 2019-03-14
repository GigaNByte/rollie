<?php

  $rollie_featured_img_url     = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$rollie_dont_change_style      = false;
$rollie_last_post_dont_add_div = false;

	$rollie_raw_enable = get_theme_mod( 'rollie_raw_enable' . $rollie_template . '_php' );


$rollie_style_display_for_rest = get_theme_mod( 'rollie_style_display_for_rest' . $rollie_template . '_php' );
$rollie_rest_style_for_paged   = get_theme_mod( 'rollie_rest_style_for_paged' . $rollie_template . '_php' );



if ( empty( $rollie_style_display_for_rest ) ) {
	$rollie_style_display_for_rest = 3;// plus1
}






if ( $wp_query->current_post == 0 ) {


	if ( $rollie_one_on_row_panoramix1 != 0 ) {
		$rollie_current_style           = 0;
		$rollie_current_posts_row_limit = $rollie_one_on_row_panoramix1;
	} elseif ( $rollie_two_on_row_surroundix2 != 0 ) {
			$rollie_current_style           = 1;
			$rollie_current_posts_row_limit = $rollie_two_on_row_surroundix2;
	} elseif ( $rollie_two_on_row_surroundix2 == 0 && $rollie_one_on_row_panoramix1 == 0 ) {

		$rollie_current_style           = $rollie_style_display_for_rest - 1;
		$rollie_current_posts_row_limit = 200;// LIMITATION TO NEXT 200 POSTS

	}
	if ( 0 < get_query_var( 'paged', 1 ) && ! $rollie_rest_style_for_paged ) {
		$rollie_current_style           = $rollie_style_display_for_rest - 1;
		$rollie_current_posts_row_limit = 200;// LIMITATION TO NEXT 200 POSTS
		$rollie_dont_change_style       = true;
	}
} else {
	if ( $rollie_current_style == 0 ) {
		$rollie_current_posts_row_limit = $rollie_one_on_row_panoramix1;
	}
	if ( $rollie_current_style == 1 ) {
			$rollie_current_posts_row_limit = $rollie_two_on_row_surroundix2;
	}
	if ( $rollie_current_style == 2 ) {
				$rollie_current_posts_row_limit = 200;
	}
}



if ( $rollie_row_counter == 0 ) {
	if ( $rollie_current_style == 0 ) {
		?>			
		<div class="row m-0"> 
		<?php
	} elseif ( $rollie_current_style != 0 && $rollie_need_single_row_tag_at_style_2 == true ) {

		?>
			
	
		<div class="row m-0"> 
		
		<?php
		$rollie_need_single_row_tag_at_style_2 = false;
	} else {
		$rollie_need_single_row_tag_at_style_2 = false;

	}
}



		echo "<div class=   '" . $rollie_post_display_style_classes[ $rollie_current_style ]['first_div_col'] . "  '  >";



	 $rollie_current_design = get_theme_mod( 'rollie_row_design' . $rollie_template . '_php_' . $rollie_current_style );


		$rollie_current_post_format = get_post_format();


if ( has_post_thumbnail( get_the_ID() ) ) {
		$rollie_thumbnail_url_escaped = get_the_post_thumbnail_url();

}




if ( in_array( $rollie_current_post_format, $rollie_supported_post_formats ) ) {
	$rollie_current_post_format = '-' . $rollie_current_post_format;


} else {
	if ( ! has_post_thumbnail( get_the_ID() ) ) {
		if ( ! empty( get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template . '_php' ) ) ) {
			$rollie_thumbnail_url_escaped = get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template . '_php' );
		} else {
			$rollie_thumbnail_url_escaped = '';
		}
	}

			$rollie_current_post_format == '';
}


if ( $rollie_raw_enable == false ) {
	if ( in_array( $rollie_current_post_format, array( '-status', '-aside', '-audio', '-video', '-image', '-gallery' ) ) ) {
			include locate_template( 'template-parts/post/content-index' . $rollie_current_post_format . '.php' );
	} else {
		switch ( $rollie_current_design ) {
			case 0:
				include locate_template( 'template-parts/post/content-index-classic' . $rollie_current_post_format . '.php' );
				break;
			case 1:
				include locate_template( 'template-parts/post/content-index-classic' . $rollie_current_post_format . '.php' );
				break;
			case 2:
				include locate_template( 'template-parts/post/content-index-modern' . $rollie_current_post_format . '.php' );
				break;
			case 3:
				include locate_template( 'template-parts/post/content-index-clean' . $rollie_current_post_format . '.php' );
				break;
		}
	}
} else {
	include locate_template( 'template-parts/post/content-index-raw.php' );
}
	echo '</div>';



	$rollie_row_counter++;


if ( $rollie_current_style < $rollie_row_counter || $wp_query->current_post == $wp_query->query_vars['posts_per_page'] ) {// row ending


	if ( $rollie_current_style == 0 ) {

		echo '</div>';
			$rollie_last_post_dont_add_div = true;
	}

	$rollie_row_counter = 0;
	$rollie_rows_counter++;



	if ( $rollie_rows_counter > ( $rollie_current_posts_row_limit - 1 ) && $rollie_dont_change_style == false ) {

		if ( $rollie_current_style != 0 && $rollie_style_display_for_rest == 1 ) {

			echo '</div>';


		}



		$rollie_current_style++;
		$rollie_rows_counter = 0;


		if ( $rollie_current_style == 1 && $rollie_two_on_row_surroundix2 == 0 && $rollie_style_display_for_rest == 1 ) {

			$rollie_current_style++;
		}


		if ( $rollie_current_style > 1 && $rollie_dont_change_style == false ) {
			$rollie_current_style = $rollie_style_display_for_rest - 1;
				// idk why when $rollie_style_display_for_rest = 0 current style is empty
				$rollie_dont_change_style = true;
		}
	}
}

if ( ( ( $wp_query->current_post + 1 ) == ( $wp_query->post_count ) ) && $rollie_current_style != 0 && $rollie_last_post_dont_add_div == false ) {


	echo '</div>';


}


























