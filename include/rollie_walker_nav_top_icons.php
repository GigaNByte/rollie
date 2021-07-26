<?php

class Rollie_Walker_Nav_Top_Icons extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output = '';
	}
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output = '';
	}
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent       = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]    = 'rollie_menu_top_icon_class' . $item->ID;
		$class_names  = '';
		$class_names  = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names  = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id           = apply_filters( 'nav_menu_item_id', 'rollie_menu_top_icon_' . $item->ID, $item, $args );
		$id           = $id ? esc_attr( $id ) : '';
		$output      .= $indent . '<button class="btn"  data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">';
		$attributes   = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes  .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes  .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes  .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= '</button>';
	}
}

class Rollie_Walker_Standard extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output = '';
	}
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output = '';
	}
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent       = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names  = '';
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]    = 'rollie_menu_top_icon_class' . $item->ID;
		$class_names  = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names  = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id           = apply_filters( 'nav_menu_item_id', 'rollie_menu_top_icon_' . $item->ID, $item, $args );
		$id           = $id ? esc_attr( $id ) : '';
		$output      .= $indent . '<span class="mx-3 my-2"  data-toggle="collapse" data-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">';
		$attributes   = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes  .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes  .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes  .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= $indent . '</span>';
	}
}
