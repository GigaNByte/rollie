<?php 
 

if(has_post_format(array('aside','status'))){
		$rollie_link_disabled = 'rollie_link_disabled'; 
}

?>





<article class="rollie_posts_shadow rollie_post" id="<?php echo 'post-' . get_the_ID(); ?>">
	<div  class=" <?php echo $rollie_article_wrapper; ?>" >
		<?php
		if (!has_post_format('status')){
		 echo rollie_post_foreground($rollie_current_style);
		}
		 ?>
		<div class=" <?php echo $rollie_post_wraper; ?> m-0 p-4" >
		
			<?php get_template_part( 'template-parts/special/content', 'display_cat' ); ?>
			
			<?php if (has_post_format('status')){?>

				<div class="rollie_post_metadata rollie_subtitle_text_color p-0 m-0 row"> 
					<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
				</div>	
				<a class='<?php echo $rollie_link_disabled; ?>' href='<?php echo get_page_link(); ?> '>
					<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>			
				</a>

			<?php }else{?>

				<a class='<?php echo $rollie_link_disabled ?>' href='<?php echo get_page_link(); ?> '>
					<h2 class=" rollie_title_text_color "><?php the_title(); ?> </h2>			
				</a>
				<div class="rollie_post_metadata rollie_subtitle_text_color p-0 m-0 row "> 
					<?php require locate_template( 'template-parts/special/content-postmeta.php' ); ?>
				</div>	

			<?php } ?>
			
			<a class='<?php echo $rollie_link_disabled ?>' href='<?php echo get_page_link(); ?> '>				
				<?php require locate_template( 'template-parts/special/content-post_excerpt.php' ); ?>
			</a>					

		</div>
	</div>
		<?Php	get_template_part( 'template-parts/post/content', 'metabar' ); ?>		
</article>	
