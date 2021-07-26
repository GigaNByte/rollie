<?php
get_header();
require_once get_template_directory() . '/include/rollie_posts_pages_bootstrap_class_variables.php';
require locate_template( 'template-parts/post/content-post-page.php' );

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		include locate_template( 'template-parts/post/content-index.php' );
		endwhile;
	endif;
?>
</main>
<?php
if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {
	echo "<aside class='rollie_sidebar_right " . esc_attr( $rollie_sidebar_col ) . "'>";
	dynamic_sidebar( 'rollie_sidebar_right' );
	echo '</aside>';
}
	rollie_pagination();
	get_sidebar();

?>
</div>
<?php get_footer(); ?>
