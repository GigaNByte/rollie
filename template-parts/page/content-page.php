<?php get_template_part( 'template-parts/special/content-header' );?>

</div><!-- closing page head from header.php-->	

<?php if (get_theme_mod('rollie_footer_collapse',true)){?>
	<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in footer.php more details about this container in footer.php-->
<?php } ?>

	<div class=" row m-0">
 	
<?php

$rollie_is_active_sidebar_left  = $rollie_allow_sidebar_l && $rollie_allow_sidebars ;
$rollie_is_active_sidebar_right = $rollie_allow_sidebar_r  && $rollie_allow_sidebars ;

if ( $rollie_is_active_sidebar_left && $rollie_is_active_sidebar_right) {
	echo "<aside class='rollie_sidebar_left ".$rollie_sidebar_col." '>";
	dynamic_sidebar( 'sidebar_left' );
	echo '</aside>';
	$rollie_offset_var = ' col-md-8 col-12 offset-md-0';
} elseif($rollie_is_active_sidebar_left){
		echo "<aside class='rollie_sidebar_left  ".$rollie_sidebar_col." '>";
	dynamic_sidebar( 'sidebar_left' );
	echo '</aside>';
	$rollie_offset_var = ' col-md-10 col-12 offset-md-0';
}elseif (  $rollie_is_active_sidebar_right ) {
	$rollie_offset_var      = 'col-md-10';// col lg-12 col-md-10
	$rollie_entry_offset_lg = '';
} else {
		$rollie_offset_var = 'col-12';
}

	if (class_exists( 'WooCommerce' )  &&  is_account_page()){
		//disables paddings in smaller devices
		$disable_paddings = 'rollie_disable_p';
	}else{
		$disable_paddings = '';
	}

?>

		<main  id="<?php echo 'page-' . get_the_ID(); ?>" class=' <?php echo $disable_paddings; ?> rollie_f_main  rollie_main_theme_text_color    <?php echo $rollie_main_col ?> '>
			<?php rollie_breadcrumb();?>	
		  	<article id="<?php echo 'page-content-' . get_the_ID(); ?>"  class="rollie_text_content_align rollie_single_page_content">
			<?php
			require locate_template('/template-parts/special/content-singlemeta.php');

			
			the_content(); 
			
			?> <!-- Page Content -->
		
		
						<?php
				
				  get_template_part( 'template-parts/special/content', 'pagination_single' );
			
			
				 	
					comments_template();
			

					?>
					</article>					 
			</main>		 
	</div>
		
	
