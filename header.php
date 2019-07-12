
<!doctype html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width , initial-scale=1">
	<title>Rollie theme</title>

	<?php wp_head(); ?>

</head>	
<body class=" <?php echo 'body_page_id-' . get_queried_object_id(); ?>">
	<div class='rollie_main_color rollie_background_color_div'></div>
		<div class="container-fluid position-relative p-0">
			<div class="rollie_header_container row p-0 ">
				<?php
		//HEADER IMAGE
				$page_for_posts = get_option( 'page_for_posts' );
		
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
				
				if (!empty($rollie_image_id)){			
				
//echo   "<img src='". wp_get_attachment_image_url($rollie_image_id,'rollie_m')."'>";
					echo rollie_header_image_source($rollie_image_id); 

				}
?>
</div>
<?Php
		if ( has_nav_menu( 'Rollie_Top_Menu' ) ) {
			if ( get_theme_mod( 'rollie_menu_overlay' ) ) { ?>

				<div class="overlay rollie_overlay rollie_collapse_side_overlay"></div>

			<?php } ?>

			<div id="rollie_insert_search_form_between_js " class='position-relative '> 			
				<nav id="rollie_navbar_top"class="navbar rollie_navbar rollie_navbar_color rollie_nav_top_2_nav_js rollie_f_navbar    navbar-expand invisible " >
					<button class="navbar-toggler m-2 rollie_navbar_toggler" type="button" data-toggle="collapse" data-target="#rollie_nav_top_2" aria-controls="rollie_nav_top_2" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fas fa-bars"></i>
						</span>
					</button>
						<?php
						if ( ! empty( get_theme_mod( 'rollie_menu_top_logo' ) ) ) {
							echo     '<a class="rollie_nav_top_logom-auto" href="'.esc_url( home_url( '/' ) ).'">';
							echo "<img class='p-1  rollie_menu_top_logo_w rollie_menu_top_logo_h' src='" . get_theme_mod( 'rollie_menu_top_logo' ) . "'>";
							echo '</a>';
						}

						?>
						<?php


						if ( 'side' == get_theme_mod( 'rollie_menu_design' ) ) {
							$rollie_side_active_c  = 'rollie_collapse_side_js';
							$rollie_side_c         = 'rollie_navbar_color';

						} else {
							$rollie_side_active_c  = '';
							$rollie_side_c        = '';

						}

						$rollie_navbar_align = get_theme_mod( 'rollie_menu_top_item_align' );

						if ( $rollie_navbar_align == 1 ) {
							$rollie_navbar_align = '';
						} elseif ( $rollie_navbar_align == 2 ) {
							$rollie_navbar_align = 'm-auto';
						} elseif ( $rollie_navbar_align == 3 ) {
							$rollie_navbar_align = 'ml-auto';
						}



						wp_nav_menu(
							array(

								'theme_location'  => 'Rollie_Top_Menu',
								'container'       => 'div',
								'container_id'    => 'rollie_nav_top_2',
								'container_class' => 'collapse   navbar-collapse rollie_navbar_top_container  ' . $rollie_side_active_c , 
								'menu_id'         => false,
								'menu_class'      => 'navbar-nav rollie_top_navbar_b_color rollie_wrap rollie_nav_top_2_js ' . $rollie_navbar_align,
								'walker'          => new Rollie_Walker_Nav_Top_Toggle(),
								'depth'           => '10',
							)
						);
						if ( get_theme_mod( 'rollie_search_form_menu_top' ) ) {	?>
							<button class="rollie_search_button_standalone    btn "><i class="fas fa-search"></i></button>	
						<?php }?>						
					</nav>
					<?php if ( get_theme_mod( 'rollie_search_form_menu_top' ) ) {?>

						<div id="rollie_search_input_menu_top" class="rollie_nav_form rollie_navbar_color py-1   ">
							<?Php get_search_form(); ?>
						</div>

					<?php } ?>
				</div>

			<?php } ?>

		</div>



	
