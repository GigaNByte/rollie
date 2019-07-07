<?php

	
$rollie_author_id = get_the_author();

if(has_post_format('status') && get_avatar_url($rollie_author_id)){
	?>
	<div class='rollie_twitt_metadata row col-12 px-1'>
		<div class='col-6  text-left'>
			<a href='<?php echo get_the_author_link($rollie_author_id)?>'>
				<img class=' mr-2 rounded' src="<?php echo get_avatar_url($rollie_author_id, array('size'=>40))?>" alt='<?php get_the_author_meta('nickname')?>' >
				<b><?php echo get_the_author_meta('nickname')?></b>
			</a>
		</div>
		<time class=' col-6 rollie_date rollie_subtitle_text_color   rollie_f_meta_alt text-right'>
		<?php echo get_the_time(get_option('time_format'))." ".get_the_date( get_option('date_format')); ?>
		</time>	
	</div>
<?php	
}else{
	if ( get_theme_mod( 'rollie_display_author' . $rollie_template ) && ! empty( get_the_author() ) ) { 
	?>	
		<div class="rollie_author   rollie_f_meta_alt  text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col  p-0">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">  <?php the_author(); ?> </a>
		</div>
	<?php
	}
	if ( get_theme_mod( 'rollie_display_date'.$rollie_template )) {
	?>
		<div class="rollie_date rollie_f_meta_alt  text-center <?php echo $rollie_post_display_style_classes[ $rollie_current_style ]['post_author_date_div']; ?> col  p-0" > 
			<?php echo get_the_time(get_option('time_format'))." ".get_the_date( get_option('date_format')); ?> 
		</div>			
	<?php
	} 
}		