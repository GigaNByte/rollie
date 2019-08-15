		<?Php
		if ( has_nav_menu( 'rollie_top_menu' ) ) {
			if ( get_theme_mod( 'rollie_menu_overlay' ) ) { ?>
				<div class="overlay rollie_overlay rollie_collapse_side_overlay"></div>
		<?php } ?>

			<nav id="rollie_insert_search_form_between_js" class='rollie_f_navbar'> 			

				<div id="rollie_navbar_top" class="navbar rollie_navbar rollie_navbar_color rollie_nav_top_2_nav_js navbar-expand invisible " >
						<?php 
				if( has_nav_menu( 'rollie_top_menu_small_top_bar' )  ){

					echo "<nav class='rollie_top_menu_small_top_bar col-12 rollie_flex_text_center '>";
						if (get_theme_mod('rollie_menu_top_logo_positon',1) == 2 && ! empty( get_theme_mod( 'rollie_menu_top_logo' ) )){
							rollie_navbar_icon();

						}

					wp_nav_menu( array(
						'theme_location'  => 'rollie_top_menu_small_top_bar',				
						 'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
						 'container'=>'',		
						'walker' => new Rollie_Walker_Nav_Top_Icons,
						'depth'           => '1',
					));
					echo "</nav>";
				}
				?>
					<button class="navbar-toggler m-2 rollie_navbar_toggler" type="button" data-toggle="collapse" data-target="#rollie_nav_top_2" aria-controls="rollie_nav_top_2" aria-expanded="false" aria-label="Toggle navigation">		
							<i class="fas fa-bars"></i>
					</button>

					<?php
					if (get_theme_mod('rollie_menu_top_logo_positon',1) == 1 && ! empty( get_theme_mod( 'rollie_menu_top_logo' ) ) ) {
						rollie_navbar_icon();
					}


					if ( 'side' == get_theme_mod( 'rollie_menu_design' ) ) {
						$rollie_side_active_c  = ' rollie_collapse_side_js rollie_navbar_color ';
						$rollie_side_c         = 'rollie_navbar_color';

					} else {
						$rollie_side_active_c  = '';
						$rollie_side_c        = '';

					}

					$rollie_navbar_align = get_theme_mod( 'rollie_menu_top_item_align',2);

					if ( $rollie_navbar_align == 1 ) {
						$rollie_navbar_align = '';
					} elseif ( $rollie_navbar_align == 2 ) {
						$rollie_navbar_align = 'm-auto';
					} elseif ( $rollie_navbar_align == 3 ) {
						$rollie_navbar_align = 'ml-auto';
					}

			
					wp_nav_menu( array(

						'theme_location'  => 'rollie_top_menu',
						'container_id'    => 'rollie_nav_top_2',
						'container_class' => 'collapse   navbar-collapse rollie_navbar_top_container  ' . $rollie_side_active_c , 
						'menu_id'         => false,
						 'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',			
						'menu_class'      => 'navbar-nav rollie_top_navbar_b_color rollie_wrap rollie_nav_top_2_js ' . $rollie_navbar_align,
						'walker'          => new Rollie_Walker_Nav_Top_Toggle(),
						'depth'           => '6',

					));

					//example of using rollie_nav_top_icons_right action
					add_action('rollie_nav_top_icons_right','rollie_nav_top_search_button',100);
					if( has_nav_menu( 'rollie_top_menu_icons' ) ){
						echo "<nav class='rollie_top_menu_icons rollie_flex_text_center '>";
						wp_nav_menu( array(
							'theme_location'  => 'rollie_top_menu_icons',				
							 'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',			
							'walker' => new Rollie_Walker_Nav_Top_Icons,
							'depth'           => '1',
							'container'=>''
						));
						do_action('rollie_nav_top_icons_right');
						echo "</nav>";
					}
					
					 ?>	
				</div>
				<div id='rollie_nav_top_icons_colapsed_content'>						
				<?php
				//example of using rollie_nav_top_icons_colapsed_content

				add_action('rollie_nav_top_icons_colapsed_content','rollie_nav_top_search_button_colapsed',10);
				 do_action('rollie_nav_top_icons_colapsed_content');
				  ?>
				</div>
			</nav>

		<?php } ?>