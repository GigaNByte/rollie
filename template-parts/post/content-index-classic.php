<article <?php post_class( 'rollie_posts_shadow rollie_classic ' . esc_attr( $rollie_post_format_class ) ); ?>  id="<?php echo esc_attr( 'post-' . get_the_ID() ); ?>">		
	<div class="position-relative <?php echo esc_attr( $rollie_center_no_img ); ?>">
		<?php echo $rollie_post_foreground; ?>
		<div class="rollie_post_container <?php echo esc_attr( $rollie_post_wraper . $rollie_absolute ); ?> ">
			<div class="col p-3 text-left flex-row-reverse">
			<?php require locate_template( 'template-parts/meta/content-meta-categories.php' ); ?>	
			</div>		
			<a class='<?php echo $rollie_link_disabled; ?>' href='<?php echo get_page_link(); ?> '>
				<h2 class="rollie_title_text_color "><?php the_title(); ?> </h2>										
				<?php require locate_template( 'template-parts/meta/content-meta-excerpt.php' ); ?>
			</a>
			<?php require locate_template( 'template-parts/meta/content-meta.php' ); ?>
		</div>
	</div>
</article>
