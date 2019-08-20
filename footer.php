<?php
/**
 * The template for displaying the footer
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */
?>

</div> <!--rollie_content_container_padding_bottom (container for calculate footer animation ) closing tag-->
<footer class='rollie_menus_shadow rollie_f_footer_sub rollie_f_footer rollie_subtitle_text_color '>

<div class= " rollie_padding_footer_measure rollie_footer  rollie_second_color" id="rollie_footer">
	<?Php
if ( has_nav_menu( 'Footer_Menu' )){ ?>
	
		<nav class="navbar navbar-expand-sm p-0  justify-content-center rollie_footer_nav">
		<?php
			wp_nav_menu(
				array(
					'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
					'theme_location' => 'Footer_Menu',
					'container'      => false,
					'menu_class'     => '  justify-content-center row footer-row',
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
		echo "<div class='rollie_footer_caption py-2'>" . $footer_capiton_text . '</div>';
 	}
 	?>
 	</div>
 	
 	<?php
 	wp_footer();
	?>

	</footer>

</body>
</html>
