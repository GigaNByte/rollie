<article id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>" <?php post_class( 'rollie_posts_shadow row ' . esc_attr( $rollie_post_format_class ) ); ?>>
	<div class="rollie_post_wrapper <?php echo $rollie_article_wrapper; ?>" >		
		<?php echo rollie_post_foreground( $rollie_max_posts_on_current_row ); ?>
		<div class=" <?php echo esc_attr( $rollie_post_wraper ); ?> m-0" >		
				<a class='<?php echo esc_attr( $rollie_link_disabled ); ?>' href='<?php esc_url( get_page_link() ); ?> '>
					<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>										
					<?php require locate_template( 'template-parts/special/content-post_excerpt.php' ); ?>
				</a>
			<?php require locate_template( 'template-parts/meta/content-meta-classic-author_date.php' ); ?>
		</div>
	</div>
	<div class="col-6 py-3 text-left flex-row-reverse">
		<?php require locate_template( 'template-parts/meta/content-meta-classic-categories.php' ); ?>	
	</div>
	<div class="col-6 py-3 text-right flex-row-reverse">
		<?php require locate_template( 'template-parts/meta/content-meta-comments.php' ); ?>		
	</div>
</article>
