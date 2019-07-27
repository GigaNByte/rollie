
<!doctype html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width , initial-scale=1">
	<title>Rollie theme</title>

	<?php wp_head(); ?>

</head>	

<body class=" <?php echo 'body_page_id-' . get_queried_object_id(); ?>">
	<div class='rollie_main_color rollie_background_color_div'></div>
	<?php
		if (get_theme_mod('rollie_menu_position',false)){
				require get_template_directory().'/include/rollie_navbar.php' ;
		} 
	?>
	<div class="rollie_header_container row p-0 ">
		<?php 
		if (!get_theme_mod('rollie_menu_position',false)){
			require get_template_directory().'/include/rollie_navbar.php' ;
		}

		//HEADER IMAGE
			$page_for_posts = get_option( 'page_for_posts' );

			//get id of image 
			if (( is_home() || is_archive() || is_search()) && has_post_thumbnail( $page_for_posts ) ) {
				$rollie_image_id = get_post_thumbnail_id($page_for_posts); 
			} elseif ( is_category() && ( function_exists( 'get_field' ) && get_field( 'rollie_cat_img', get_queried_object() ) ) ) {
				$rollie_image_id = attachment_url_to_postid(get_field( 'rollie_cat_img', get_queried_object()));
			}
			elseif(has_post_thumbnail()){
				$rollie_image_id = get_post_thumbnail_id();
			}
			else {
				$rollie_image_id = attachment_url_to_postid( get_header_image('full') );
			}
			
			//check if there is default image for this type of page
			if( empty($rollie_image_id)){
				$rollie_image_id = get_theme_mod('rollie_header'.rollie_page_template_sufix());
			}

			if (!empty($rollie_image_id)){						
				$img_alt = get_post_meta( $rollie_image_id, '_wp_attachment_image_alt', true ); 
				echo rollie_header_image_responsive($rollie_image_id,$img_alt); 
			}
			?>

		</div>


