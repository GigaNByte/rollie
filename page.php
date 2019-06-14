<?php


/**
 * The template for displaying all pages
 *
 * This is the template displays single page
 *
 * @package
 * @subpackage
 * @since 1.0
 * @version 1.0
 */
require_once get_template_directory() .'/include/rollie_single_pages_bootstrap_class_variables.php';    
get_header();?>

<?php

  //  get_template_part( 'template-parts/post/content-header' );
if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/page/content', 'page' );

        endwhile;
endif;?>

</main> 

    <?php

    if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {
       
        echo "<aside class='rollie_sidebar_right ".$rollie_sidebar_col." '>";// offset-1
        dynamic_sidebar( 'sidebar_right' );
        echo '</aside>';
    }
    rollie_pagination();
    get_sidebar( 'bottom_1' );
    if ( is_archive() ) {
        if ( is_active_sidebar( 'sidebar_bottom_archive' ) ) {
            echo '<section class="row rollie_sidebar_bottom">';
                dynamic_sidebar( 'sidebar_bottom_archive' );
            echo '</section >';
        }
    }
    ?>
</div>
    <?php get_footer(); ?>