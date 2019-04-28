<?php

 get_header();?>



			
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/post/content', 'single' );



			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// comments_template();
			// endif;
		endwhile;
	endif;

	?>	



<?php get_footer(); ?>
