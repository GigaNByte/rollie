<?php
require get_template_directory() . '/include/rollie_index_layout_vars.php';
get_template_part( 'template-parts/special/content-header' );
?>
</div><!-- closing page head from header.php-->	

<?php if ( get_theme_mod( 'rollie_footer_collapse', true ) ) { ?>
	<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in footer.php more details about this container in footer.php-->
	<?php } ?>

	<div class=" rollie_flex_height_stretch row m-0">
		<?php

		$rollie_is_active_sidebar_left  = $rollie_allow_sidebar_l && $rollie_allow_sidebars;
		$rollie_is_active_sidebar_right = $rollie_allow_sidebar_r && $rollie_allow_sidebars;
		$rollie_entry_offset_lg         = '';
		if ( $rollie_is_active_sidebar_left && $rollie_is_active_sidebar_right ) {
			echo "<aside class='rollie_sidebar_left " . $rollie_sidebar_col . " '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside>';
			$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
		} elseif ( $rollie_is_active_sidebar_left ) {
			echo "<aside class='rollie_sidebar_left " . $rollie_sidebar_col . " '>";
			dynamic_sidebar( 'sidebar_left' );
			echo '</aside>';
			$rollie_offset_var = ' col-md-10 col-12 offset-md-0';
		} elseif ( $rollie_is_active_sidebar_right ) {
			$rollie_offset_var      = 'col-md-10';// col lg-12 col-md-10
			$rollie_entry_offset_lg = '';
		} else {
			$rollie_offset_var = 'col-12';
		}
		?>
		<main id="<?php echo 'page-' . get_the_ID(); ?>" class='rollie_main_post_content rollie_f_main rollie_main_theme_text_color <?php echo $rollie_main_col; ?> '>
			<?php	rollie_breadcrumb(); ?>
			<?php if ( is_category() || is_home() ) { ?>
				<article <?php post_class( $rollie_entry_offset_lg ); ?>> 
					<div class="row">
						<div class="col-10 offset-1 col-lg-8 offset-lg-2  ">
							<?php
							if ( is_category() ) {
								echo category_description();
							} elseif ( is_home() ) {
								the_content();
							}
							?>
						</div>
					</div>
				</article>
			<?php } ?>
