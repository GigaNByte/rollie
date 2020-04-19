<?php
/**
 * The template for displaying all pages
 *
 * This is the template displays single page
 *
 * @package
 * @since 1.0
 * @version 1.0
 */
require get_template_directory() .'/include/rollie_posts_pages_bootstrap_class_variables.php'; 
get_header();?>

<?php


if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        require locate_template( 'template-parts/page/content-page.php' );
    endwhile;
endif;?>


<?php

if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {

        echo "<aside class='rollie_sidebar_right ".$rollie_sidebar_col." '>";// offset-1
        dynamic_sidebar( 'rollie_sidebar_right' );
        echo '</aside>';
    }
    rollie_pagination();
    get_sidebar( );
    ?>
</div>
<?php get_footer(); ?>