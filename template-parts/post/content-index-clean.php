<article id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>" <?php post_class( 'rollie_posts_shadow row rollie_clean ' . esc_attr( $rollie_post_format_class ) ); ?>>
	<div class="rollie_post_wrapper <?php echo $rollie_article_wrapper; ?>" >
		<div class="<?php echo $rollie_post_wraper; ?> m-0" >
			<div class="rollie_post_metadata rollie_subtitle_text_color p-0 m-0 row"> 
				<?php require locate_template( 'template-parts/meta/content-meta-clean.php' ); ?>	
			</div>	
			<div class='col p-1'>
				<?php require locate_template( 'template-parts/meta/content-meta-categories.php' ); ?>	
			</div>
			<a class='<?php echo $rollie_link_disabled; ?>' href='<?php echo get_page_link(); ?> '>
				<?php if ( get_the_title() ) { ?>
					<h2 class="col-12 rollie_title_text_color "><?php the_title(); ?> </h2>																	
				<?php } ?>
					<?php echo rollie_post_foreground( $rollie_max_posts_on_current_row ); ?>
				<div class='row py-3  rollie_f_meta rollie_flex_text_center'>					
					<?php require locate_template( 'template-parts/meta/content-meta-comments.php' ); ?>
				</div>		
				<div class='row py-3'>
					<div class='px-3'>
						<?php require locate_template( 'template-parts/special/content-post_excerpt.php' ); ?>
					</div>
				</div>
			</a>
		</div>
	</div>	
</article>
