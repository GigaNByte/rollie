<?php
/**
 * The template for displaying the footer
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

/*
* div ending for rollie_content_container_padding_bottom
* js uses container to calculate footer size and applies padding and manages collapsing
*/
if ( get_theme_mod( 'rollie_footer_collapse', true ) ) {
	echo '</div>';
}
$rollie_fotter_collapse = '';
if ( get_theme_mod( 'rollie_footer_collapse', true ) ) {
	$rollie_fotter_collapse = 'rollie_footer_collapse rollie_padding_footer_measure';
}

?>
<footer id='rollie_footer' class='rollie_menus_shadow rollie_f_footer_sub rollie_f_navs rollie_subtitle_text_color'>
		<div class='<?php echo esc_attr( $rollie_fotter_collapse ); ?> rollie_second_color'>
		<?php
		// #rollie_footer div is neccesary to not mess up wp-footer WordPress widget and animation

		if ( has_nav_menu( 'rollie_footer_menu' ) ) {
			?>
			<nav class="navbar navbar-expand-sm p-4 justify-content-center ">
				<?php
				wp_nav_menu(
					array(
						'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
						'theme_location' => 'rollie_footer_menu',
						'container'      => false,
						'menu_class'     => 'justify-content-center row footer-row',
						'walker'         => new Rollie_Walker_Footer(),
					)
				);
				?>
			</nav>

			<?php
		}

		dynamic_sidebar( 'rollie_widgetarea_footer_bottom' );

		$footer_capiton_text = get_theme_mod( 'rollie_footer_caption_text' );
		if ( $footer_capiton_text ) {
			echo '<div class="rollie_fancy_line rollie_fancy_line_horizontal rollie_fancy_line_f"></div>';
			echo "<div class='rollie_footer_caption py-2'>" . esc_html( $footer_capiton_text ) . '</div>';
		}

		if ( has_nav_menu( 'rollie_footer_menu_bottom_bar' ) ) {
			echo "<nav class='rollie_top_menu_small_top_bar  col-12 rollie_flex_text_center '>";
			wp_nav_menu(
				array(
					'theme_location' => 'rollie_footer_menu_bottom_bar',
					'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
					'walker'         => new Rollie_Walker_Standard(),
					'depth'          => '1',
				)
			);
			echo '</nav>';
		}
		?>
	</div>
	<?php wp_footer(); ?>
</footer>

<?php
if ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'fixed' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'small' != get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'side' ) ) {
	echo '</div>'; // fixed content
	echo '</div>'; // header,main,footer

	// rollie_menus_shadow is added to rollie_fixed_menu_right_container in js to prevent box shadow overflow
	if ( 'small' != get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) ) {

		if ( 'fixed_full' == get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'full' ) ) {
			echo "<div id='rollie_fixed_menu_right_container' class='d-flex rollie_fixed_menu_right_container_fixed_full rollie_f_navs '>";
		} else {
			echo "<div id='rollie_fixed_menu_right_container' class='d-flex  rollie_f_navs '>";
		}
		rollie_nav_top_icons_colapsed_content();
		echo '</div>';
	}
	echo '</div>'; // row
}
?>
</body>
</html>
