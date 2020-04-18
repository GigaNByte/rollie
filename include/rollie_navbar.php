<?Php
/**
 * The template for displaying and managing customizer options for navbar
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

if ( has_nav_menu( 'rollie_top_menu' ) ) {

$rollie_menu_top_position = '';
if ( get_theme_mod( 'rollie_navbar_overlay' ,true) && !'full' == get_theme_mod('rollie_navbar_design','full'))   { 
	echo "<div class='overlay rollie_overlay rollie_collapse_side_overlay'></div>";		
 } 
if (get_theme_mod('rollie_navbar_absolute',false)){
	$rollie_menu_top_position = 'position-absolute';
}
if (get_theme_mod('rollie_navbar_fixed',true)){
	$rollie_menu_top_position = 'position-fixed';
}
if ('fixed_full' == get_theme_mod('rollie_navbar_design','full') && !get_theme_mod('rollie_navbar_absolute',false)){
	$rollie_menu_top_position = '';
}
$rollie_navbar_transparent = '';
if (get_theme_mod('rollie_navbar_transparent',true)){
	$rollie_navbar_transparent = ' rollie_navbar_transparent rollie_transparent ';
}
$rollie_navbar_always_collapse = '';
if (get_theme_mod('rollie_navbar_always_collapse',false)){
	
	$rollie_navbar_always_collapse = ' rollie_navbar_always_collapse ';
}
?>
<nav id="rollie_navbar_c" class='rollie_menus_shadow  rollie_f_navs <?php echo $rollie_menu_top_position ?>'> 			

	<div id="rollie_navbar_top" class="navbar rollie_navbar rollie_navbar_color navbar-expand invisible <?php echo $rollie_navbar_transparent.$rollie_navbar_always_collapse ?>" >
		<?php 

		 dynamic_sidebar( 'rollie_widgetarea_navbar' );

		if( has_nav_menu( 'rollie_top_menu_small_top_bar' )  ){

			echo "<nav class='rollie_top_menu_small_top_bar small col-12 rollie_flex_text_center '>";
			if (get_theme_mod('rollie_menu_top_logo_positon',1) == 2 && ! empty( get_theme_mod( 'rollie_navbar_logo' ) )){
				rollie_navbar_icon();
			}


			wp_nav_menu( array(
				'theme_location'  => 'rollie_top_menu_small_top_bar',				
				'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
				'container'=>'',		
				'walker' => new Rollie_Walker_Standard,
				'depth'           => '1',
			));
			echo "</nav>";
		}
		?>
		<button class="navbar-toggler m-2 rollie_navbar_toggler" type="button" data-toggle="collapse" data-target="#rollie_nav_top_main_container" aria-controls="rollie_nav_top_main_container" aria-expanded="false" aria-label="Toggle navigation">		
			<i class="fas fa-bars"></i>
		</button>

		<?php
		if (get_theme_mod('rollie_menu_top_logo_positon',1) == 1 && ! empty( get_theme_mod( 'rollie_navbar_logo' ) ) ) {
			rollie_navbar_icon();
		}


			rollie_top_menu_wp_nav_menu();
		
		//example of using rollie_nav_top_icons_right action
		add_action('rollie_nav_top_icons_right','rollie_nav_top_search_button',100);
		if( has_nav_menu( 'rollie_top_menu_icons' ) ){
			echo "<nav class='rollie_top_menu_icons px-2 rollie_flex_text_center '>";
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
	<?php 
	

	if (get_theme_mod('rollie_nav_top_icons_colapsed_content','small') == 'side'){
		rollie_nav_top_search_button_colapsed(); 
	}else{
		rollie_nav_top_icons_colapsed_content();
		
	}
  ?>
</nav>

<?php } ?>