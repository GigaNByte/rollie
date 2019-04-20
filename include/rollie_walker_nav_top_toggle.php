<?php
class Rollie_Walker_Nav_Top_Toggle extends Walker_Nav_Menu {


	public $dropdownsibling = false;
	public $rollie_count    = 0;
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}

		$indent = str_repeat( $t, $depth );
		if ( ( $args->walker->has_children ) ) {
			$classes   = array( 'dropdown-menu rollie_navbar_color' );
			$classes[] = 'rollie_dropdown_menu';
		} else {
			// Default class.
			$classes   = array( 'sub-menu', 'navbar-nav' );
			$classes[] = 'submenu';
		}
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */

		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<div $class_names >{$n}";

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// li a span
		// Echo rollie_count of items in menu
		/*$menu_obj->rollie_count;*/

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names   = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		if ( $args->walker->has_children && $depth === 0 ) {
			if ( $this->dropdownsibling ) {
				 $output .= '</li>';

				$output .= '</div>';
			}

			$this->dropdownsibling = true;
			$classes[]             = 'nav-item';
					if ( get_theme_mod ('rollie_embl_navbar' ,2 ) == 1){
								$classes[] =' rollie_fancy_line_vertical' ;
								$classes[] =' rollie_fancy_line';
									$classes[] ='rollie_fancy_line_n';
							} 
							 if ( get_theme_mod ('rollie_embl_navbar' ,2) == 2){
									$classes[] =' rollie_fancy_line';
									$classes[] ='rollie_fancy_line_n';
									$classes[] ='rollie_fancy_line_horizontal';
							} 

			$classes[] = 'rollie_nav_item';
			$classes[] = 'dropdown';

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$output             .= '<div class="  m-2 rollie_item_min_w px-2 ">';
						$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

							$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes                .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes                .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes                .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes                .= 'style=" display: inline-block"';
			
			$attributes                .= ' data-target="#" class="nav-link rollie_nav_link "';

			$item_output = $args->before;
		

			$item_output .= '<a ' . $attributes . '>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';
			$item_output .= ' <span style="align:right" href="#" data-target="#" class="dropdown-toggle rollie_dropdown_toogle  rollie_chevron_menu rollie_icon_nav rollie_icon_global" data-toggle="dropdown"> <i class="fas fa-chevron-down fa-1x fa-gradient"></i></span>';

			

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				$this->rollie_count++;

		}
		if ( ! $args->walker->has_children && $depth > 0 ) {

			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

			$attributes .= 'class=  "dropdown-item rollie_dropdown_item  " ';
			$item_output = $args->before;

			$item_output .= '<a ' . $attributes . '>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';
			// $item_output .= '<span class="rollie_fancy_line"></span>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}
		if ( ( ! $args->walker->has_children ) && ( $depth === 0 ) ) {
			$this->dropdownsibling = false;
			if ( $this->rollie_count > 0 ) {
				$output .= '</li>';

				$output            .= '</div>';
				$this->rollie_count = 0;
			}
			/*
			 -----------------------------------------------
			CLASSES
			-------------------------------------------------
			*/
			$classes[] = 'nav-item';

			$classes[] = 'rollie_nav_item';

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

						/*
						 -----------------------------------------------
			CLASSES
			-------------------------------------------------
			*/
				/*
				 -----------------------------------------------
			li output
			-------------------------------------------------
			*/
			$output .= $indent . '<div class=" m-2 rollie_item_min_w  px-2  ">';
			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

				/*
				 -----------------------------------------------
			li output
			-------------------------------------------------
			*/

			/*
			 -----------------------------------------------
			LINKS
			-------------------------------------------------
			*/
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
$rollie_line='';
						if ( get_theme_mod ('rollie_embl_navbar' ,2 ) == 1){
								$rollie_line='  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_n ';
							} 
							 if ( get_theme_mod ('rollie_embl_navbar' ,2) == 2){
								$rollie_line=' rollie_fancy_line rollie_fancy_line_n rollie_fancy_line_horizontal';
							} 
	
			$attributes .= 'data-target="#"  class="nav-link rollie_nav_link '.$rollie_line.'"';
			
		
			$item_output = $args->before;
		
			$item_output .= '<a ' . $attributes . '>';
		
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';

			

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

			/*
			 -----------------------------------------------
			LINK output
			-------------------------------------------------
			*/

			$output .= '</div>';
		}

		if ( $args->walker->has_children && $depth > 0 ) {

			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

			$attributes .= 'class=dropdown-item rollie_dropdown_item';

			$item_output = $args->before;

			$item_output .= '<a ' . $attributes . '>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';
	

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}

	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		// closing ul
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			   $t = '';
			   $n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent  = str_repeat( $t, $depth );
		$output .= "$indent</div>{$n}";

	}



	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}

	}
}







