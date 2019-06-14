	
<?php
	
	


	
require get_template_directory() .'/include/rollie_single_pages_bootstrap_class_variables.php';	


	//$page_for_posts_id = get_option( 'page_for_posts' );

	//if ( $page_for_posts_id ) { 
		get_template_part( 'template-parts/special/content-header' );	
?>
</div><!-- closing page head from header.php-->	

	<div class="rollie_content_container_padding_bottom"><!-- tag will be closed in page.php-->
	<?php rollie_breadcrumb();?>
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
?>
	<main  id="<?php echo 'page-' . get_the_ID(); ?>" class=' rollie_f_pp_content rollie_single_page_content rollie_main_theme_text_color    <?php echo $rollie_main_col ?> '>
		
	  <article id="<?php echo 'page-content-' . get_the_ID(); ?>"  class="rollie_text_content_align ">
	  
		<?php
				require locate_template('/template-parts/special/content-singlemeta.php');
		if ( rollie_page_has_children() ) {
				get_template_part( 'template-parts/page/content', 'page-parent' );
		}
		

		echo "<div class='rollie_main_page_content rollie_f_pp_content rollie_main_theme_text_color '>";?>
					
		
			<div class="kubitza_container"><hr></hr></div>
				<?php the_content(); ?> <!-- Page Content -->
			</div>
					<?php
			
			  get_template_part( 'template-parts/special/content', 'pagination_single' );
	if ( comments_open() || get_comments_number() ) {?>
				 <section class='col-12 col-md-8 offset-md-2 '>	
			
				 <?php comments_template();?>
					
				 </section>				
 <?php	} ?>
	
		
	</article>
