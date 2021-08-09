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
require get_template_directory() . '/include/layout-vars/rollie-layout-vars-index.php';
get_header();?>

<?php
if ( ! have_posts() ) {
	require locate_template( 'template-parts/page/content-page.php' );
} else {
	while ( have_posts() ) :
		the_post();
		require locate_template( 'template-parts/page/content-page.php' );
	endwhile;
}

if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {
		echo "<aside class='rollie_sidebar_right " . esc_attr( $rollie_sidebar_col ) . " '>";
		dynamic_sidebar( 'rollie_sidebar_right' );
		echo ' < / aside > ';
}
	rollie_pagination();
	get_sidebar();
?>
</div>
<?php get_footer(); ?>
