	<div class='rollie_twitt_metadata rollie_f_meta row col-12 px-1 text-left'>
			<?php rollie_avatar(get_the_author(),true);?>
			<div class='rollie_flex_center_v '>
				<span class='p-1 '><?php the_author_link(); ?></span>
				<time class='rollie_date rollie_flex_center_v rollie_subtitle_text_color p-1  rollie_collapse_overlap '>
				<?php echo get_the_time(get_option('time_format'))." ".get_the_date( get_option('date_format')); ?>
				</time>	
			</div>
	</div>