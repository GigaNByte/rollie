<?php
require_once get_template_directory() . '/include/layout-vars/rollie-layout-vars-index.php';
get_header();
require locate_template( 'template-parts/post/content-post-page.php' );

if ( have_posts() ) {
	?>
	<div class="row justify-content-center p-5">
		<div class="col-12 col-md-8 col-lg-6">
			<?php get_search_form(); ?>
		</div>
	</div>
	<?php
	while ( have_posts() ) {
		the_post();
		include locate_template( 'template-parts/post/content-index.php' );
	}
} else {
	?>
	<div class='row'>
		<div class='col-12'>
			<?php esc_html_e( 'Nothing matched your search terms', 'rollie' ); ?>
		</div>
	</div>
	<?php
}
?>
<div class="row justify-content-center p-5">
		<div class="col-12 col-md-8 col-lg-6">
<?php get_search_form(); ?>
	</div>
</div>
<?php
rollie_pagination();
if ( is_active_sidebar( 'sidebar_right' && $rollie_allow_sidebars ) ) {
	echo "<aside class='rollie_sidebar_right " . esc_attr( $rollie_sidebar_col ) . " '>";
	dynamic_sidebar( 'rollie_sidebar_right' );
	echo '</aside >';
}
get_sidebar();
?>
</div>
<?php get_footer(); ?>
