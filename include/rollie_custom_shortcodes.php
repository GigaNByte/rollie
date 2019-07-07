<?php
function rollie_custom_gallery( $string, $attr ) {
	$posts = get_posts(
		array(
			'include'   => $attr['ids'],
			'post_type' => 'attachment',
		)
	);

	if( get_theme_mod('rollie_gallery_static',false)){

	}else{

		$output = "<div class='rollie_gallery_post_format p-2 '>";	
		$output = "<div class='swiper-container rollie_gallery_1_swiper'>";
		$output = "<div class='swiper-wrapper'>";

		foreach ( $posts as $imagePost ) {
			$output .= "<div class='swiper-slide rollie_post_thumbnail_img'>";
			$output .= "<img src='" . wp_get_attachment_image_src( $imagePost->ID, 'extralarge' )[0] . "'    alt='Gallery image' />";
			$output .= "</div>";
		}

		$output .= "</div>";
		$output .= "<div class='swiper-pagination'></div>";
		$output .= "</div>";
		$output .= "</div>";
	}		

	return $output;
}
