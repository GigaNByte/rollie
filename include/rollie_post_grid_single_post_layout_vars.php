<?php
$rollie_post_foreground = rollie_post_foreground( $rollie_max_posts_on_current_row );
$rollie_absolute        = '';
$rollie_center_no_img   = '';
if ( ! empty( $rollie_post_foreground ) ) {
	if ( 'classic_clean' != $rollie_current_design ) {
		$rollie_absolute = ' position-absolute';
	}
} else {
	$rollie_center_no_img = 'd-flex justify-content-center';
}

$rollie_post_wraper = '';
if ( 'modern' == $rollie_current_design ) {
	if ( ! empty( $rollie_post_foreground ) ) {
		$rollie_post_wraper .= $rollie_post_display_style_classes[ $rollie_max_posts_on_current_row ]['second_div_col_classic'];
	} else {
		$rollie_post_wraper .= 'col-12';
	}
	$rollie_post_wraper    .= ' p-3 rollie_post_title_bg_color';
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
		$rollie_post_wraper .= ' rollie_center_abs ';
	} else {
		$rollie_article_wrapper .= ' rollie_second_color';
	}
}
if ( has_post_format( array( 'status', 'image' ) ) ) {
	$rollie_post_wraper .= ' rollie_f_subtitle';
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
