<article class="rollie_posts_shadow rollie_post row <?php echo $rollie_post_format_class ?> " id="<?php echo 'post-' . get_the_ID(); ?>">
	<div class=" <?php echo $rollie_article_wrapper; ?>" >		
		<?php echo rollie_post_foreground($rollie_current_style);?>
		<div class=" <?php echo $rollie_post_wraper; ?> m-0" >		
				<a class='<?php echo $rollie_link_disabled ?>' href='<?php echo get_page_link(); ?> '>
					<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>										
					<?php require locate_template( 'template-parts/special/content-post_excerpt.php' ); ?>
				</a>
			<?php  require locate_template( 'template-parts/meta/content-meta-classic-author_date.php' );?>
		</div>
	</div>
		<div class="col-6 py-3 text-left flex-row-reverse">
		<?php  require locate_template( 'template-parts/meta/content-meta-classic-categories.php' );?>	
		</div>
		<div class="col-6 py-3 text-right flex-row-reverse">
		<?php  require locate_template( 'template-parts/meta/content-meta-comments.php' );?>		
		</div>

</article>	
