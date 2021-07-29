<?php
require_once get_template_directory() . '/include/rollie_posts_pages_bootstrap_class_variables.php';
 get_header();

if ( is_home() ) {
	global $post;

	$page_for_posts_id = get_option( 'page_for_posts' );
	if ( $page_for_posts_id ) {
		$post = get_page( $page_for_posts_id );
		setup_postdata( $post );
	}
	require locate_template( 'template-parts/post/content-post-page.php' );
	rewind_posts();
}

if ( have_posts() ) {
	while ( have_posts() ) :
		the_post();
		include locate_template( 'template-parts/post/content-index.php' );
	endwhile;
}

?>
</main>
	<?php

	if ( $rollie_allow_sidebar_r && $rollie_allow_sidebars ) {
		$rollie_sidebar_col = 'col-' . get_theme_mod( 'rollie_posts_page_l_sidebar_size', 2 );
		echo "<aside class='rollie_sidebar_right " . esc_attr( $rollie_sidebar_col ) . " '>";
		dynamic_sidebar( 'rollie_sidebar_right' );
		echo '</aside>';
	}
	rollie_pagination();
	get_sidebar();

	?>
</div>
<?php get_footer(); ?>
