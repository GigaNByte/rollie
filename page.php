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



		
	
		<?php
		while ( have_posts() ) :
			the_post();


					get_template_part( 'template-parts/page/content', 'page' );

	endwhile; // End of the loop.



			rollie_pagination();
		
 get_footer(); ?>
