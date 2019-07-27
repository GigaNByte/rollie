<?php
if (is_single())
{
	$rollie_template = '_spp';
}
elseif(is_page())
{
	$rollie_template = '_sp';
}
	?>		
			<div class="rollie_post_metadata row p-0">
				<div class="rollie_date col text-center" >
		<?php	if (get_theme_mod('rollie_display_date'.$rollie_template,true)){
				the_date( 'Y-m-d' ); 
				echo " ";
				the_time(); 
				}	?> 
		<?php	if (get_theme_mod('rollie_display_author'.$rollie_template,true)){		
			?>
			<?php echo  __('Author').': '; ?>
					<a class="rollie_author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
						<?php the_author(); ?>
						
					</a>
		<?php }?>			
				</div>
			</div>	
			<div class="rollie_categories  text-center " >  
				<?php
				if( has_category())	echo __('Categories') . ': ';
				the_category( ', ' );
				?>
			</div>


