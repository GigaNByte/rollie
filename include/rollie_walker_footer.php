<?php
class Rollie_Walker_Footer extends Walker_Nav_Menu {



	public $counter         = 0;/*Closes item with subitems .*/
	public $isfirstrow      = true;
	public $dropdownsibling = false;
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
			$classes = array( 'rollie_footer_dropdown_menu' );

		} else {
			// Default class.
			$classes   = array( 'sub-menu', 'navbar-nav', 'rollie_footer_nav' );
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
		$menu = wp_get_nav_menu_object( $args->menu );

		$rollie_footer_logo = get_theme_mod( 'rollie_footer_menu_logo' );

		$rollie_caption_1 = get_theme_mod( 'rollie_footer_logo_desc_text' );

		$theme_locations = get_nav_menu_locations();

		$theme_location = 'Footer_Menu';


		if ( $this->isfirstrow && $rollie_footer_logo ) {


			$output     .= '<div class=" col-lg-4 col-md-6 p-0  rollie_footer_col  align-middle rollie_subtitle_text_color rollie_f_footer_sub  rollie_logo_footer_menu">';
			$output     .= '<a  href="'.esc_url( home_url( '/' ) ).'">';
			$output     .= '<div class= rollie_footer_logo_h >';
			$output     .= '<img alt="'.get_the_title(attachment_url_to_postid($rollie_footer_logo)).'" src="' . $rollie_footer_logo . '">';
			$output .= '</div>';
			$output		.= '</a>';
			if ( $rollie_caption_1 ) {
				$output .= '<p class=" rollie_footer_menu_caption rollie_flex_text_center ">' . $rollie_caption_1 . '</p>';

			}
			$output .= '</div>';
		}

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

			$classes[] = 'rollie_footer_nav_item';
			$classes[] = 'dropdown';

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

					$output .= '<div class=" col-lg-2 col-md-3  rollie_footer_col ">';

			$output     .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';


						
				$attributes .= ' class="nav-link rollie_second_text_color rollie_footer_nav_link dropdown-toggle '.rollie_embl_footer().'"';
			

			$attributes .= ' data-target="#" data-toggle="dropdown"';

			$item_output = $args->before;
		
		

			$item_output .= '<a ' . $attributes . ' >';
	
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';

		
			

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				$this->counter++;

		}
		if ( ! $args->walker->has_children && $depth > 0 ) {
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

			$attributes .= 'class="dropdown-item  rollie_subtitle_text_color rollie_f_footer_sub rollie_footer_dropdown_item"';

			$item_output = $args->before;

			$item_output .= '<a ' . $attributes . '>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		if ( ( ! $args->walker->has_children ) && ( $depth === 0 ) ) {

			$this->dropdownsibling = false;
			if ( $this->counter > 0 ) {
				$output .= '</li>';

				$output       .= '</div>';
				$this->counter = 0;
			}
			/*
			 -----------------------------------------------
			CLASSES
			-------------------------------------------------
			*/

			$classes[] = 'nav-item';

			$classes[] = 'rollie_footer_nav_item';

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

			$output .= '<div class=" col-lg-2 col-md-3  rollie_footer_col ">';

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

			$attributes .= ' data-target="#" class="nav-link rollie_second_text_color rollie_footer_nav_link'.rollie_embl_footer().'"';

			/*
			 -----------------------------------------------
			LINK output
			-------------------------------------------------
			*/

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

			$attributes .= 'class="dropdown-item rollie_subtitle_text_color rollie_f_footer_sub rollie_footer_dropdown_item"';
			$item_output = $args->before;

			$item_output .= '<a ' . $attributes . '>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' </a>' : '</a>';

			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

		}
		$this->isfirstrow = false;

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







