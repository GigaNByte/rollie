<?php get_template_part( 'template-parts/special/content-header' ); ?>

</div><!-- closing page head from header.php-->	

<?php
if ( get_theme_mod( 'rollie_footer_collapse', true ) ) {
	echo '<div class="rollie_content_container_padding_bottom">';// tag will be closed in footer.php more details about this container in footer.php
}
	echo '<div class="rollie_flex_height_stretch row m-0">';

$rollie_is_active_sidebar_left  = $rollie_allow_sidebar_l && $rollie_allow_sidebars;
$rollie_is_active_sidebar_right = $rollie_allow_sidebar_r && $rollie_allow_sidebars;
if ( $rollie_is_active_sidebar_left && $rollie_is_active_sidebar_right ) {
	echo "<aside class='rollie_sidebar_left " . esc_attr( $rollie_sidebar_col ) . " '>";
	dynamic_sidebar( 'sidebar_left' );
	echo '</aside>';
	$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
} elseif ( $rollie_is_active_sidebar_left ) {
	echo "<aside class='rollie_sidebar_left  " . esc_attr( $rollie_sidebar_col ) . " '>";
	dynamic_sidebar( 'sidebar_left' );
	echo '</aside>';
	$rollie_offset_var = ' col-md-10 col-12 offset-md-0';
} elseif ( $rollie_is_active_sidebar_right ) {
	$rollie_offset_var      = 'col-md-10';
	$rollie_entry_offset_lg = '';
} else {
	$rollie_offset_var = 'col-12';
}

if ( class_exists( 'WooCommerce' ) && is_account_page() ) {
	// disables paddings in smaller devices
	$disable_paddings = 'rollie_woo_disable_p';
} else {
	$disable_paddings = '';
}
?>

<main  id="<?php echo 'page-' . get_the_ID(); ?>" class='rollie_f_main rollie_main_theme_text_color <?php echo esc_attr( $rollie_main_col ); ?> '>
	<?php rollie_breadcrumb(); ?>		
	<article id="<?php echo esc_attr( 'page-content-' . get_the_ID() ); ?>"  <?php post_class( esc_attr( $disable_paddings ) . ' rollie_text_content_align rollie_single_page_content' ); ?>>
		<?php
		if ( ! is_404() ) {
			require locate_template( '/template-parts/page/content-page-meta.php' );
			the_content();
			rollie_link_pages();
			get_template_part( 'template-parts/page', 'pagination-single' );
			comments_template();
		}

		?>
	</article>					 
</main>
