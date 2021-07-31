<?php
require_once get_template_directory() . '/include/rollie_grid_post_design_vars.php';

$rollie_dont_change_style          = false;
$rollie_last_post_dont_add_div     = false;
$rollie_current_posts_row_no_limit = false;

if ( $wp_query->current_post == 0 ) {
	if ( $rollie_max_posts_one_on_row != 0 ) {
		$rollie_max_posts_on_current_row = 0;
		$rollie_current_posts_row_limit  = $rollie_max_posts_one_on_row;
	} elseif ( $rollie_max_posts_two_on_row != 0 ) {
		$rollie_max_posts_on_current_row = 1;
		$rollie_current_posts_row_limit  = $rollie_max_posts_two_on_row;
	} elseif ( $rollie_max_posts_two_on_row == 0 && $rollie_max_posts_one_on_row == 0 ) {
		$rollie_max_posts_on_current_row   = $rollie_default_max_posts_on_row;
		$rollie_current_posts_row_limit    = 200;
		$rollie_current_posts_row_no_limit = true;
	}
	if ( 0 < get_query_var( 'paged', 1 ) && ! get_theme_mod( 'rollie_post_page_grid_for_paged' . $rollie_template_sufix, false ) ) {
		$rollie_max_posts_on_current_row   = $rollie_default_max_posts_on_row;
		$rollie_current_posts_row_limit    = 200;
		$rollie_current_posts_row_no_limit = true;
		$rollie_dont_change_style          = true;
	}
} else {
	if ( 0 == $rollie_max_posts_on_current_row ) {
		$rollie_current_posts_row_limit = $rollie_max_posts_one_on_row;
	}
	if ( 1 == $rollie_max_posts_on_current_row ) {
		$rollie_current_posts_row_limit = $rollie_max_posts_two_on_row;
	}
	if ( 2 == $rollie_max_posts_on_current_row ) {
		$rollie_current_posts_row_limit    = 200;
		$rollie_current_posts_row_no_limit = true;
	}
}

$rollie_current_design             = get_theme_mod( 'rollie_post_page_row_design_' . $rollie_max_posts_on_current_row . $rollie_template_sufix, 'classic' );
$rollie_current_design_transparent = false;  // transparent design text reverses colors
// it will simplify if statements
if ( $rollie_current_design == 'classic_transparent' ) {
	$rollie_current_design             = 'classic';
	$rollie_current_design_transparent = true;
} elseif ( $rollie_current_design == 'modern_transparent' ) {
	$rollie_current_design             = 'modern';
	$rollie_current_design_transparent = true;
}
$rollie_post_wraper = '';
if ( $rollie_current_design == 'modern' ) {
	$rollie_post_wraper    .= $rollie_post_display_style_classes[ $rollie_max_posts_on_current_row ]['second_div_col_classic'] . 'p-3 rollie_post_title_bg_color ';
	$rollie_article_wrapper = '';
} elseif ( $rollie_current_design == 'classic' ) {
	$rollie_post_wraper     = 'col-12 p-3 rollie_post_title_bg_color';
	$rollie_article_wrapper = 'position-relative';
} elseif ( $rollie_current_design == 'classic_clean' ) {
	$rollie_post_wraper     = 'col-12 p-3 rollie_post_title_bg_color';
	$rollie_article_wrapper = '';
} elseif ( $rollie_current_design == 'clean' ) {
	$rollie_post_wraper     = 'col-12';
	$rollie_article_wrapper = '';
}

if ( has_post_format( array( 'aside', 'quote' ) ) ) {
	$rollie_post_wraper .= 'col-12 rollie_f_subtitle text-center';
	if ( has_post_thumbnail() ) {
		$rollie_post_wraper .= 'rollie_center_abs ';
	} else {
		$rollie_article_wrapper .= 'rollie_second_color';
	}
}
if ( has_post_format( array( 'status', 'image' ) ) ) {
	$rollie_post_wraper .= 'rollie_f_subtitle';
}

$rollie_current_post_format = get_post_format();

if ( in_array( $rollie_current_post_format, $rollie_supported_post_formats ) ) {
	$rollie_current_post_format = '-' . $rollie_current_post_format;
} else {
	$rollie_current_post_format == '';
}

$rollie_link_disabled = '';
if ( has_post_format( array( 'aside', 'status', 'image' ) ) ) {
	$rollie_link_disabled = 'rollie_link_disabled';
}
$rollie_post_format_class = '';
if ( get_post_format() ) {
	$rollie_post_format_class = 'rollie_post_format_' . get_post_format();
}
if ( $rollie_current_design_transparent ) {
	$rollie_post_format_class .= 'rollie_second_text_color rollie_reverse_text_color';
}

if ( $rollie_col_counter == 0 ) {
	if ( 1 == get_theme_mod( 'rollie_grid_type' . $rollie_template_sufix, 1 ) ) {
		// not masonry
		if ( $rollie_max_posts_on_current_row == 0 ) {
			echo '<div class="row m-0">';
		} elseif ( $rollie_extra_row_tag ) {
			echo '<div class="row m-0">';
			$rollie_extra_row_tag = false;
		} else {
			$rollie_extra_row_tag = false;
		}
	} else {
		// masonry
		echo '<div class="rollie_grid rollie_grid' . $rollie_template_sufix . '">';
		echo '<div class="rollie_grid_size rollie_grid_size' . $rollie_template_sufix . '"></div>';
	}
}
echo '<div class="' . $rollie_post_display_style_classes[ $rollie_max_posts_on_current_row ]['first_div_col'] . '">';

if ( $rollie_post_page_raw_enable ) {
	require locate_template( 'template-parts/post/content-index-raw.php' );
} else {
	if ( has_post_format( 'status' ) || has_post_format( 'image' ) || $rollie_current_design == 'classic' ) {

		require locate_template( 'template-parts/post/content-index-classic.php' );
	} elseif ( $rollie_current_design == 'modern' ) {
		require locate_template( 'template-parts/post/content-index-modern.php' );
	} elseif ( $rollie_current_design == 'clean' ) {
		require locate_template( 'template-parts/post/content-index-clean.php' );
	} else {
		require locate_template( 'template-parts/post/content-index-classic.php' );
	}
}

echo '</div>';
$rollie_col_counter++;

if ( 1 == get_theme_mod( 'rollie_grid_type' . $rollie_template_sufix, 1 ) ) {
	if ( $rollie_max_posts_on_current_row < $rollie_col_counter || $wp_query->current_post == $wp_query->query_vars['posts_per_page'] ) { // row ending
		if ( $rollie_max_posts_on_current_row == 0 ) {
			echo '</div>';
			$rollie_last_post_dont_add_div = true;
		}

		$rollie_col_counter = 0;
		$rollie_row_counter++;

		if ( $rollie_row_counter > ( $rollie_current_posts_row_limit - 1 ) && ! $rollie_dont_change_style && ! $rollie_current_posts_row_no_limit ) {
			if ( $rollie_max_posts_on_current_row != 0 && 0 == $rollie_default_max_posts_on_row ) {
				echo '</div>';
			}

			$rollie_max_posts_on_current_row++;
			$rollie_row_counter = 0;

			if ( 1 == $rollie_max_posts_on_current_row && 1 == $rollie_max_posts_two_on_row && 0 == $rollie_default_max_posts_on_row ) {
				$rollie_max_posts_on_current_row++;
			}
			if ( 1 < $rollie_max_posts_on_current_row && ! $rollie_dont_change_style ) {
				$rollie_max_posts_on_current_row = $rollie_default_max_posts_on_row;
				$rollie_dont_change_style        = true;
			}
		}
	}
	if ( ( ( $wp_query->current_post + 1 ) == ( $wp_query->post_count ) ) && 0 != $rollie_max_posts_on_current_row && ! $rollie_last_post_dont_add_div ) {
		echo '</div>';
	}
} else {
	if ( $wp_query->current_post + 1 == $wp_query->post_count ) {
		echo '</div>';
	}
}
