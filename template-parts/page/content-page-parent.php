<div class="rollie_child_pages_banner_container"> 
<?php
$args = array(
	'post_parent' => $post->ID,
	'post_type'   => 'page',
	'orderby'     => 'menu_order',
);

$child_query = new WP_Query( $args );
?>

<?php
while ( $child_query->have_posts() ) :
	$child_query->the_post();
	?>
	
	<div class="rollie_child_pages_banner row">	
			<div class="rollie_child_pages_thumbnail col-12 ">
				<a href="<?php echo get_page_link(); ?>">
										
	<?php
					echo "<div class='rollie_child_pages_thumbnail_img ' style='background-image: url(" . get_the_post_thumbnail_url() . ");' >";
	?>
					



								<div class='rollie_child_pages_text_container rollie_second_text_color '>
									<div>
										<div class='rollie_child_pages_thumbnail_title rollie_f_headings rollie_f_headings_h2 w-100'>
													<?php

													the_title();
													?>
											
										</div>
									<span class="w-25 rollie_fancy_line d-inline-block"></span>
										<div class='rollie_child_pages_thumbnail_ex rollie_f_excerpt_s w-100 '>
											<?php

											if ( function_exists( 'get_field' ) && get_field( 'rollie_excerpt' ) ) {
												echo get_field( 'rollie_excerpt' );
											} else {
												the_excerpt();
											}

											?>
										</div>
									</div>	
								</div>
								
						</div>
		
					<div class=" rollie_f_pp_content  col-
					col-md-8 col-lg-6  ">
				<?php

				echo "<div class='pr-1  pr-md-2 pr-lg-3 d-inline rollie_parent_page_a   rollie_title_text_color'>" . get_the_title( $post->post_parent ) . '</div>';

				echo "<div class='d-inline rollie_child_page_a rollie_subtitle_text_color'>" . get_the_title() . '</div>';
				?>
				
					</div>
				</a>	

		</div>
	</div>

		</br>
<?php endwhile; ?>

<?php
wp_reset_postdata();



?>
</div>
