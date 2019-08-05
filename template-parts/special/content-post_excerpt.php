<?php
$rollie_post_format_css = '';
if (has_post_format(array('aside','quote'))) $rollie_post_format_css = 'rollie_second_text_color rollie_f_subtitles_h4';
if (has_post_format('quote')) $rollie_post_format_css .= ' text-italics';
if (has_post_format(array('status'))) $rollie_post_format_css = 'rollie_f_subtitles_h4 text-left';
?>

<div class="rollie_main_theme_text_color rollie_post_excerpt rollie_f_excerpt <?php echo $rollie_post_format_css; ?>"> 

	<?php 
	if ( !isset($rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] ) || $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] === 'full' ) {
			if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
				echo get_field( 'rollie_excerpt' );
			} else {
				the_excerpt();
			}
	}
	if ( $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'] > 2 ) {
			if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
				echo  rollie_limit_text( get_field( 'rollie_excerpt' ), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'], '...' );
			} else {
				echo rollie_limit_text( get_the_excerpt(), $rollie_post_display_style_classes[ $rollie_current_style ]['post_excerpt_lenght'], '...' );
			}
	}
	?>
<?php if (has_post_format('status')){
		echo rollie_post_foreground($rollie_current_style);
	}


	?>
</div>	

<?php
if (has_post_format('quote') && function_exists('get_field')){
	echo "<div class='".$rollie_post_format_css."'>".get_field('rollie_quote_author')."</div>";
}