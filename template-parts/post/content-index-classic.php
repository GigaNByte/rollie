<article class="rollie_posts_shadow rollie_post row <?php echo $rollie_post_format_class ?> " id="<?php echo 'post-' . get_the_ID(); ?>">
	<div class=" <?php echo $rollie_article_wrapper; ?>" >		
		<?php echo rollie_post_foreground($rollie_current_style);?>
		<div class=" <?php echo $rollie_post_wraper; ?> m-0" >
			<div class="col p-2 text-left flex-row-reverse">
			<?php  require locate_template( 'template-parts/meta/content-meta-classic-categories.php' ); 	 ?>	
			</div>		
				<a class='<?php echo $rollie_link_disabled ?>' href='<?php echo get_page_link(); ?> '>
					<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>										
					<?php 
						require locate_template( 'template-parts/special/content-post_excerpt.php' ); 
					?>
				</a>
				<div class=" py-3 rollie_subtitle_text_color rollie_f_meta ">
				<?php  require locate_template( 'template-parts/meta/content-meta-ccc-author_date.php' ); 	?>
					<span class='p-2'>
						<?php rollie_comments_counter();?>		
					</span>
				</div>
		</div>
	</div>
</article>	
