<?php
//  to include in functions.php
function rollie_breadcrumb() {
    $sep = ' > ';
$is_woo_page = false;
if ( class_exists( 'WooCommerce' ) ) {
    if ( is_woocommerce() ||  is_cart())    	$is_woo_page = true;
}
    if (!is_front_page() && !$is_woo_page ) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<nav class="pl-5 text-left  rollie_subtitle_text_color rollie_f_excerpt rollie_breadcrumb col-12">';
        echo '<a class="rollie_category_title_text_color" href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            
         the_category( ', ' ); 

        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'rollie' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'rollie' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'rollie' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'rollie' ), get_the_date( _x( 'Y', 'yearly archives date format', 'rollie' ) ) );
            } else {
                _e( 'Blog Archives', 'rollie' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
           
            
          echo the_title('<span class="rollie_category_title_text_color">'.$sep,'</span>');
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title('<span class="rollie_category_title_text_color">','</span>');
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</nav>';
    }
    /*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/
}
?>