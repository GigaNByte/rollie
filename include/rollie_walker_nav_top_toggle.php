<?php
class Rollie_Walker_Nav_Top_Toggle extends Walker_Nav_Menu
{
    public $dropdown_opened = 0;
    public $rollie_max_dropdown_depth = 0;

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        
        $indent = str_repeat($t, $depth);
        if (($depth == 0)) {
            $classes = array(
                'dropdown-menu',
                'px-1',
                'rollie_navbar_color',
                'rollie_dropdown_menu'
            );
            
        } else {
            // Default class.
            $classes = array(
                'rollie_subdropdown',
                'rollie_navbar_color'
            );
        }
        
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= "{$n}{$indent}<div $class_names >{$n}";
        
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $li_attributes = '';
        $class_names   = $value = '';
         $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        if ($args->walker->has_children && $depth == 0) {

            while ($this->dropdown_opened > 0) {
                $output .= '</div>';
                
                --$this->dropdown_opened;
            }
            $this->dropdown_opened = 0;
            $this->dropdown_opened++;
            $classes[] = 'nav-item';   
            $classes[] = 'rollie_nav_item';
            $classes[] = 'dropdown';
            $classes[] = 'p-2';
            $classes[] = 'rollie_item_min_w';
            
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';
            
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
            
            
            $output .= $indent . '<div' . $id . $value . $class_names . $li_attributes . '>';
            
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            $attributes .= ' data-target="#" class="nav-link rollie_nav_link d-inline-block "';
            
            $item_output = $args->before;   
            $item_output .= '<a ' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;    
            $item_output .= '</a>';
            $item_output .= ' <span  href="#" data-target="#" class="dropdown-toggle rollie_dropdown_toogle  rollie_chevron_menu rollie_icon_nav rollie_icon_global" data-toggle="dropdown"> <i class="fas fa-chevron-down fa-1x fa-gradient"></i></span>';
            $item_output .= $args->after;
            
        } elseif (!$args->walker->has_children && $depth != 0) {
            
            while ($depth - $this->rollie_max_dropdown_depth < 1) {
                $output .= '</div>';
                --$this->rollie_max_dropdown_depth;
                --$this->dropdown_opened;
                
            }
            
            
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            
            $attributes .= 'class=  "dropdown-item rollie_dropdown_item  " ';
            $item_output = $args->before;
            
            $item_output .= '<a ' . $attributes . '>';
            
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= '<span class="rollie_fancy_line"></span>';
            $item_output .= $args->after;
            
        } elseif ((!$args->walker->has_children) && ($depth == 0)) {
            
            
            
            while ($this->dropdown_opened > 0) {
                $output .= '</div>';
                --$this->dropdown_opened;
            }
            $this->dropdown_opened = 0;
            
            $classes[] = 'nav-item';
            $classes[] = 'p-2';
            $classes[] = 'rollie_item_min_w';
            $classes[] = 'rollie_nav_item';
            
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';
            
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
            $output .= $indent . '<div' . $id . $value . $class_names . $li_attributes . '>';
            
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            $attributes .= 'data-target="#"  class="nav-link rollie_nav_link ' . rollie_embl_navbar() . '"';
            
            $item_output = $args->before;
            $item_output .= '<a ' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            
        } elseif ($args->walker->has_children && $depth > 0) {
            $this->rollie_max_dropdown_depth = $depth; 
            $this->dropdown_opened += 1;
            
            $classes[] = 'nav-item';
            $classes[] = 'rollie_nav_item';
            $classes[] = 'subdropdown';
            $classes[] = 'p-2';
            $classes[] = 'rollie_item_min_w';
            
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = ' class="' . esc_attr($class_names) . '"';
            
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
            
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
            $attributes .= ' data-target="#" class="rollie_nav_link  nav-link dropdown-submenu  d-inline-block "';
            
            $item_output = $args->before;   
            $item_output .= '<a ' . $attributes . '>';            
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= ' <span  href="#" data-target="#" class="dropdown-toggle rollie_dropdown_toogle  rollie_chevron_menu rollie_icon_nav rollie_icon_global" data-toggle="rollie_subdropdown"> <i class="fas fa-chevron-down fa-1x fa-gradient"></i></span>';
            $item_output .= $args->after;    
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        
        if (!$args->walker->has_children && $depth == 0) $output .= "</div>";
           
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat($t, $depth);
        
        if ($depth == 0) {
            
            while ($this->dropdown_opened > 0) {
                $output .= '</div>';
                --$this->dropdown_opened;
            }
            $this->dropdown_opened = 0;
        }
    }
}
