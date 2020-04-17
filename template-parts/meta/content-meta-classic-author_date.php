<div class='row rollie_f_meta rollie_v_center  '>
	<div class="rollie_author text-center col p-2">
<?php
		if ( get_theme_mod( 'rollie_display_author_avatar' . $rollie_template ) && ! empty( get_the_author() ) ) { 
		rollie_avatar(get_the_author(),false); 
		}
		if ( get_theme_mod( 'rollie_display_author' . $rollie_template )) { 
		echo '<span>'.get_the_author_link().'</span>'; 
		 ?>
	</div>
	<?php
	}
	if ( get_theme_mod( 'rollie_display_date'.$rollie_template )) {
	?>
		<div class="rollie_date text-center col p-2 " > 
			<?php echo get_the_date( get_option('date_format')); ?> 
		</div>			
	<?php
	
	} 
?></div>