<?php



if ( get_theme_mod( 'rollie_display_author' . $rollie_template ) && ! empty( get_the_author() ) ) { ?>	
											<div class="rollie_author   rollie_f_meta_alt  text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col "><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">  <?php the_author(); ?> </a></div>
		<?php
} else {
	?>
											 <div class="rollie_author rollie_f_meta_alt text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col-12 col-lg-12" ></div>				
		<?php
}



if ( get_theme_mod( 'rollie_display_date' . $rollie_template ) && ! empty( get_the_date( 'Y-m-d' ) ) ) {
	?>
										
											<div class="rollie_date rollie_f_meta_alt  text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col " > <?php echo get_the_date( 'Y-m-d' ); ?> </div>			
			<?php
} else {
	?>
											<div class="rollie_date rollie_f_meta_alt  text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col-12  " >  </div> 
		<?php	}

?>
