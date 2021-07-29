<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the page header div.
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width , initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

</head>	

<body <?php body_class(); ?>>
<?php
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
?>
	<div class='rollie_main_color rollie_background_color_div'></div>

	<?php
	// navbar containers logic
	require get_template_directory() . '/include/rollie_navbar.php';
	if ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'fixed' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'small' != get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) ) {
		echo "<div id='rollie_main_container'class='h-100 d-flex flex-row '>";
		if ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'fixed' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
			$rollie_fixed_class = '';
			if ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
				$rollie_fixed_class = 'rollie_fixed_full_menu_container';
			} else {
				$rollie_fixed_class = 'position-absolute';
			}
			echo "<div id='rollie_fixed_menu_left_container' class='rollie_menus_shadow " . esc_attr( $rollie_fixed_class ) . " rollie_flex_text_center rollie_navbar_color rollie_f_navs'>";
			echo '</div>';
		}
		echo "<div id='rollie_content_wrapper' class='w-100 col p-0'>";
		if ( get_theme_mod( 'rollie_navbar_fixed', true ) ) {
			echo "<div id='rollie_fixed_menu_fixed_content' class='rollie_fixed_content'>";
		} else {
			echo "<div id='rollie_fixed_menu_fixed_content'>";
		}
	}

	?>

	<div class="rollie_header_container row p-0 ">
		
		<?php
		if ( function_exists( 'get_field' ) && esc_url_raw( get_field( 'rollie_header_video_src' ) ) ) {
			// url is sanitased in shortocde funct
			echo do_shortcode( '[rollie_header_video src="' . get_field( 'rollie_header_video_src' ) . '"]' );

		} elseif ( function_exists( 'get_field' ) && get_field( 'rollie_header_shortcode_src' ) ) {

			echo do_shortcode( wp_kses( get_field( 'rollie_header_shortcode_src' ), rollie_sanitize_shortcode() ) );

		} else {
			// HEADER IMAGE

			$page_for_posts = get_option( 'page_for_posts' );

			// get id of image
			if ( ( is_home() || is_archive() || is_search() ) && has_post_thumbnail( $page_for_posts ) ) {
				$rollie_image_id = get_post_thumbnail_id( $page_for_posts );
			} elseif ( is_category() && ( function_exists( 'get_field' ) && get_field( 'rollie_cat_img', get_queried_object() ) ) ) {
				$rollie_image_id = attachment_url_to_postid( get_field( 'rollie_cat_img', get_queried_object() ) );
			} elseif ( has_post_thumbnail() ) {
				$rollie_image_id = get_post_thumbnail_id();
			} else {
				$rollie_image_id = attachment_url_to_postid( get_header_image( 'full' ) );
			}

			// check if there is default image for this type of page
			if ( empty( $rollie_image_id ) ) {
				$rollie_image_id = get_theme_mod( 'rollie_header' . rollie_page_template_sufix() );
			}
			if ( is_404() ) {
				$rollie_image_id = get_theme_mod( 'rollie_header' . '_sp' );
			}
			if ( ! empty( $rollie_image_id ) ) {
				$img_alt = get_post_meta( $rollie_image_id, '_wp_attachment_image_alt', true );
				echo rollie_header_image_responsive( $rollie_image_id, $img_alt, 'rollie_header_image', array( 'rollie_xs', 'rollie_s', 'rollie_m', 'rollie_l' ) ); // ignore wpcs.
			}
		}
		?>
