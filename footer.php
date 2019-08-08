	
</div> <!--rollie_content_container_padding_bottom-->

<?php 
wp_footer();




if ( has_nav_menu( 'Footer_Menu' )){

	?>





	<div class= "rollie_menus_shadow rollie_padding_footer_measure rollie_footer rollie_second_color" id="rollie_footer">





		<nav class="navbar navbar-expand-sm p-0 rollie_f_footer justify-content-center rollie_footer_nav">

			<?php
			wp_nav_menu(
				array(
					'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
					'theme_location' => 'Footer_Menu',
					'container'      => false,
					'menu_class'     => 'navbar-nav  row footer-row',
					'walker'         => new Rollie_Walker_Footer(),
				)
			);
			?>
			
		</nav>
		


		<?php




		$footer_capiton_text = get_theme_mod( 'rollie_footer_caption_text' );

		if ( $footer_capiton_text ) {
			echo '<span class="rollie_footer_line"></span>';
			echo "<div class='rollie_footer_caption rollie_f_footer_sub'>" . $footer_capiton_text . '</div>';

		}

		?>
	</div>
<?php }?>
</body>
</html>
