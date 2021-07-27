<?php
$rollie_post_foreground = rollie_post_foreground( $rollie_current_style );
$rollie_absolute        = '';
if ( ! empty( $rollie_post_foreground ) ) {
	$rollie_absolute = ' position-absolute';
}
?>
<article class="rollie_posts_shadow rollie_classic  <?php echo esc_attr( $rollie_post_format_class ); ?> " id="<?php echo 'post-' . get_the_ID(); ?>">		
<div class="position-relative d-flex justify-content-center">
		<?php echo $rollie_post_foreground; ?>
		<div class="rollie_post_container <?php echo esc_attr( $rollie_post_wraper . $rollie_absolute ); ?> ">
			<div class="col p-3 text-left flex-row-reverse">
			<?php require locate_template( 'template-parts/meta/content-meta-classic-categories.php' ); ?>	
			</div>		
			<a class='<?php echo $rollie_link_disabled; ?>' href='<?php echo get_page_link(); ?> '>
				<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>										
				<?php
					require locate_template( 'template-parts/special/content-post_excerpt.php' );
				?>
			</a>
			<div class=" p-3 rollie_subtitle_text_color rollie_f_meta ">
			<?php require locate_template( 'template-parts/meta/content-meta-ccc-author_date.php' ); ?>
				<span class='p-3'>
					<?php rollie_comments_counter(); ?>		
				</span>
			</div>
		</div>
	</div>
</article>
