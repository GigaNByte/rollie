<?php
function rollie_custom_gallery( $string, $attr ) {
	$posts = get_posts(
		array(
			'include'   => $attr['ids'],
			'post_type' => 'attachment',
		)
	);

	if ( ! get_theme_mod( 'rollie_gallery_static', false ) ) {

			$output = "<div class='rollie_gallery_post_format p-2 '>";
			$output = "<div class='swiper-container rollie_gallery_1_swiper'>";
			$output = "<div class='swiper-wrapper'>";

		foreach ( $posts as $image_post ) {
			$output .= "<div class='swiper-slide rollie_post_thumbnail_img'>";
			$output .= "<img src='" . wp_get_attachment_image_src( $image_post->ID, 'full' )[0] . "' alt='" . get_the_title( $image_post->ID ) . "' />";
			$output .= '</div>';
		}
			$output .= '</div>';
			$output .= "<div class='swiper-pagination'></div>";
			$output .= '</div>';
			$output .= '</div>';
	}
	return $output;
}
