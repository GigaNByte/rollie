<?php
$rollie_post_format_css = 'd-block';
if (has_post_format(array('aside','quote'))) $rollie_post_format_css = ' rollie_second_text_color rollie_f_subtitles_h4';
if (has_post_format('quote')) $rollie_post_format_css .= ' text-italics';
if (has_post_format('image')) $rollie_post_format_css .= ' ';
if (has_post_format('status')) $rollie_post_format_css = ' rollie_f_subtitles_h4 text-left';
?>

<div class="rollie_main_theme_text_color  rollie_post_excerpt rollie_f_excerpt <?php echo $rollie_post_format_css; ?>"> 
	<?php rollie_excerpt();?>
</div>	

<?php
if (has_post_format('quote') && function_exists('get_field')){
	echo "<div class='".$rollie_post_format_css."'>".get_field('rollie_quote_author')."</div>";
}