<article id="<?php echo 'post-' . get_the_ID(); ?>" class="rollie_posts_shadow row rollie_modern <?php echo $rollie_post_format_class; ?> ">
	<div class="rollie_post_wrapper <?php echo $rollie_article_wrapper; ?>" >
		<div class=" <?php echo $rollie_post_wraper; ?> m-0" >
				<div class="rollie_post_metadata rollie_subtitle_text_color p-0 m-0 row"> 
					<?php require locate_template( 'template-parts/meta/content-meta-modern-author_date.php' ); ?>	
				</div>	
			<div class='col p-1'>
				<?php require locate_template( 'template-parts/meta/content-meta-classic-categories.php' ); ?>	
			</div>

			<a class='<?php echo $rollie_link_disabled; ?>' href='<?php echo get_page_link(); ?> '>
				<?php if ( get_the_title() ) { ?>
					<h2 class="col-12 rollie_title_text_color "><?php the_title(); ?> </h2>																	
				<?php } ?>
					<?php echo rollie_post_foreground( $rollie_current_style ); ?>
				<div class='row rollie_f_meta rollie_v_center  '>		 
					<div class='row py-3  rollie_f_meta rollie_flex_text_center'>					
					<?php require locate_template( 'template-parts/meta/content-meta-comments.php' ); ?>
					</div>		
				</div>	
				<?php require locate_template( 'template-parts/special/content-post_excerpt.php' ); ?>
			</a>
		</div>
	</div>	
</article>
