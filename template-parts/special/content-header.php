<?php
$is_post_page_title_single_row = get_theme_mod( 'rollie_posts_page_title_single_row' );
$rollie_bb_h1 = 'offset-0 col-6 offset-md-1 col-md-5';
$rollie_bb_ex = 'col-6 offset-md-0 col-md-6'; 
if(is_author()){
$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
}
?>
<header class="container-fluid rollie_title_container rollie_title_bg_color">
	<div class='row'>
<?php if(is_author()){ ?>
		<div class="col-6 col-md-3  rollie_flex_text_center">
			<?php echo get_avatar( $rollie_author->ID, '', '', '', array( 'class' => 'float-right' ) ); ?>
		</div>
<?php
$rollie_bb_h1 = 'col-6 col-md-3 m-0' ;

 } ?>	
	
		<?php

	//	if ($is_post_page_title_single_row ) {

			?>
			
			<div class="<?php echo rollie_embl_titles().' '.$rollie_bb_h1;?>  rollie_f_headings rollie_title_text_color ">
				<h2 class="rollie_parent_title rollie_below_js rollie_f_headings  rollie_category_title_text_color "><?php rollie_subtitle() ?></h2>
				<h1> <?php rollie_title()?></h1>
			
			</div>
			<div class="<?php echo $rollie_bb_ex ; ?> rollie_f_excerpt_s rollie_flex_text_center rollie_subtitle_text_color">
				<?php rollie_excerpt();?>	
			</div>

		<?php// }?>	
	</div>
</header>