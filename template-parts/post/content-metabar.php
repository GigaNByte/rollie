<?php
if ( get_theme_mod( 'rollie_comments_icon' ) ) {
	$rollie_comments_icon = get_theme_mod( 'rollie_comments_icon' );
} else {
	$rollie_comments_icon = 'fa-comment';

}

if ( get_theme_mod( 'rollie_tag_char' ) ) {
	$rollie_tag_char = get_theme_mod( 'rollie_tag_char' );
} else {
		$rollie_tag_char = '';

}


if ( get_theme_mod( 'rollie_tags_display_icon' ) ) {
	
	if ( get_theme_mod( 'rollie_tags_icon' ) ) {
		$rollie_tags_icon = get_theme_mod( 'rollie_tags_icon' );
	} else {
		$rollie_tags_icon = 'fa-tags';
	}

	$rollie_tags_icon = '<i class=" fas fa-1x ' . $rollie_tags_icon . ' "></i>';

} 


$rollie_c_format = get_post_format();


if ( comments_open() || ( get_the_tags() || ( $rollie_c_format && get_theme_mod( 'rollie_tags_display_post_format' ) ) ) ) {
	?>
	
<div class="row m-0 p-0 rollie_f_meta d-flex">	
		<div class="col-6 text-left pb-1  rollie_subtitle_text_color rollie_post_excerpt ">
			<div class="  rollie_icon_first  d-inline-block   m-1 ">	
			
			<?php
			if ( $rollie_tags_icon && ( get_the_tags() || $rollie_c_format  || has_category() ) ) {
				echo $rollie_tags_icon;
			}
			?>
		
			</div>
						
 		<?php

		$rollie_p_format_a = get_post_format_link( get_post_format() );
		if ( $rollie_c_format && get_theme_mod( 'rollie_tags_display_post_format' ) ) {

			switch ( $rollie_c_format ) {
				case 'aside':
					$rollie_post_format_str = __('Aside');
					break;
				case 'gallery':
					$rollie_post_format_str = __('Gallery');
					break;
				case 'link':
					  $rollie_post_format_str = __('Link');
					break;
				case 'image':
					 $rollie_post_format_str = __('Image');
					break;
				case 'video':
					 $rollie_post_format_str = __('Video');
					break;
				case 'quote':
					 $rollie_post_format_str = __('Quote');
					break;
				case 'status':
					$rollie_post_format_str =__('Status');
					break;
				case 'audio':
					 $rollie_post_format_str = __('Audio');
					break;
			}

			echo ' <a href=' . $rollie_p_format_a . '>' . $rollie_post_format_str . '</a> ';														
		}

		the_category(' '); 
		the_tags( ' '.$rollie_tag_char ,' '.$rollie_tag_char,'');

		?>
																							
		</div>

		<div class="col-6 text-right pb-1 rollie_subtitle_text_color rollie_post_excerpt  flex-row-reverse">
		<?php
		if ( comments_open() ) {
		$rollie_comments_num = get_comments_number();
	
		if (has_post_format(array('status','aside'))){ ?>
			<div class='rollie_show_post_trigger' rollie_post_id='<?php the_ID()?>'>
		<?php }else{ ?>
			<a class=" d-block" href="'<?php echo get_comments_link(); ?>'">	 
		<?php } ?>
				<div class='m-auto d-inline-block '><?php  _e('Comments')?></div>
				<span class=' d-inline-block rollie_icon_first fa-stack fa-1x'>
					<i class='far <?php echo $rollie_comments_icon ?> fa-stack-2x'></i>
					<strong class='fa-stack-1x fa-stack-text rollie_text_color_3 rollie_t_shadow_0 '><?php echo get_comments_number()?></strong>
				</span>
		<?php
		 if (has_post_format(array('status','aside'))){ ?>		
			</div>	
		<?php }else{ ?>
			</a>
	<?php
			} 		
		} 
		?>	

	</div>
</div>	
<?php
}



