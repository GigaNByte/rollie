<?php 
require get_template_directory().'/include/layout-vars/rollie-layout-vars-header.php'?>
<div class='rollie_header_wrapper <?php echo esc_attr( $rollie_wrapper_class . ' ' . $rollie_header_image_max_h ); ?>'> 
<header class="p-4  <?php echo esc_attr( $rollie_header_class ); ?>">
		<?php if ( is_author() ) { ?>
				<div class="col-6 col-md-3 rollie_flex_text_center">
					<?php echo get_avatar( $rollie_author->ID, '', '', '', array( 'class' => 'float-right' ) ); ?>
				</div>
			<?php
		}
		?>
		<div class="<?php echo esc_attr( rollie_embl_titles() . ' ' . $rollie_bb_h1 ); ?> rollie_f_headings rollie_title_text_color ">
			<h1> <?php rollie_title(); ?></h1>
			<h2 class="rollie_parent_title rollie_f_headings rollie_category_title_text_color "><?php rollie_subtitle(); ?></h2>
		</div>
		<?php
		if ( 1 != get_theme_mod( 'rollie_header_ex_style' . rollie_page_template_sufix() ) ) {
			?>
			<div class="<?php echo esc_attr( $rollie_bb_ex ); ?> rollie_f_excerpt rollie_flex_center_v rollie_subtitle_text_color">
				<?php rollie_excerpt( false ); ?>
			</div>
	<?php } ?>
</header>	 	
</div>
