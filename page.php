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









	 get_header();?>


	<!-- div empty from header -->


		<div class="rollie_content_container_padding_bottom">
			<main id="<?php echo 'page-' . get_the_ID(); ?>">
		<?php
		while ( have_posts() ) :
			the_post();


					get_template_part( 'template-parts/page/content', 'page' );

	endwhile; // End of the loop.


		if ( function_exists( 'rollie_pagination' ) ) {
			rollie_pagination();
		}

		?>
				</main>
			</div> <!--rollie_content_container_padding_bottom-->
		<!--</div>  end of div empty div from header -->
	<?php get_footer(); ?>
