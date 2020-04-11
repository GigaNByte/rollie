<?php
if ( comments_open() ) {
	if (has_post_format(array('status','aside'))){ ?>
		<div class='rollie_show_post_trigger' rollie_post_id='<?php the_ID()?>'>
	<?php }else{ ?>
		<a class="col" href="'<?php echo get_comments_link(); ?>'">	 
	<?php } ?>

			<span class='m-auto rollie_fourth_text_color'><?php  _e('Comments')?></span>
		<?php	rollie_comments_counter(); ?>
				
		<?php if (has_post_format(array('status','aside'))){ ?>		
				</div>	
		<?php } else { ?>
				</a>
		<?php } 
 } ?>	

