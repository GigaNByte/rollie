<?php
		


require get_template_directory() .'/include/rollie_posts_pages_bootstrap_class_variables.php';	


	//$page_for_posts_id = get_option( 'page_for_posts' );

	//if ( $page_for_posts_id ) { 
		get_template_part( 'template-parts/special/content-header' );	
?>
</div><!-- closing page head from header.php-->	

<div class="rollie_content_container_padding_bottom"><!-- tag will be colosed in FOOTER.php if its woocomerce shop page you need to remowe sum hook -->
<?php	rollie_breadcrumb();?>
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
				echo "<aside class='rollie_sidebar_left ".$rollie_sidebar_col." '>";
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
	<main  id="<?php echo 'page-' . get_the_ID(); ?>" class='rollie_main_post_content rollie_f_pp_content rollie_main_theme_text_color   <?php echo $rollie_main_col ?> '>
			<div class='entry-content-page <?php if ( ! empty( $rollie_entry_offset_lg ) ) echo $rollie_entry_offset_lg;?>'>  
				<div class="row">
					<div class="col-10 offset-1 col-lg-8 offset-lg-2  ">
		
			<?php
			//if ( $page_for_posts_id ) { 
				if ( is_category() ) {
 						echo category_description();
				} elseif (is_home()){
					the_content();
				}
			
		//	}?>
				
				  <!-- Page Content -->
					</div>
				</div>
			</div><!-- .entry-content-page -->

		
