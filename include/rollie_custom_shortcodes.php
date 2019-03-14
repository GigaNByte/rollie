<?php
function rollie_custom_gallery( $string, $attr ) {

	$output = "<div class='rollie_gallery_post_format p-2 '>	
					<div class='swiper-container rollie_gallery_1_swiper'>
						<div class='swiper-wrapper'>";

	$posts = get_posts(
		array(
			'include'   => $attr['ids'],
			'post_type' => 'attachment',
		)
	);

	foreach ( $posts as $imagePost ) {
		$output .= "<div class='swiper-slide rollie_post_thumbnail_img'>
					<img src='" . wp_get_attachment_image_src( $imagePost->ID, 'extralarge' )[0] . "'    alt='Gallery image' />
				</div>";

	}

	$output .= "</div>
					<div class='swiper-pagination'></div>
				</div>
			</div>";

	return $output;
}
