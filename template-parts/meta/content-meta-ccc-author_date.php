<span class=' rollie_f_meta   '>
	<span class="rollie_author  text-center  p-2">
<?php
if ( get_theme_mod( 'rollie_display_author_avatar' . $rollie_template ) && ! empty( get_the_author() ) ) {
	rollie_avatar( get_the_author(), false );
}
if ( get_theme_mod( 'rollie_display_author' . $rollie_template ) ) {
	echo '<span>' . get_the_author_link() . '</span>';
	?>
	</span>	 
	<?php
}
if ( get_theme_mod( 'rollie_display_date' . $rollie_template ) ) {
	?>
		<span class="rollie_date text-center p-2 " > 
		<?php echo get_the_date( get_option( 'date_format' ) ); ?> 
		</span>			
	<?php

}
?>
</span>
