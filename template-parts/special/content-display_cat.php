<?php

$rollie_current_cat   = get_the_category();
$rollie_current_count = 0;
$rollie_index_c       = 0;
$rollie_cat_id        = 0;
$rollie_cat           = 0;
foreach ( $rollie_current_cat as $linia ) {
	if ( $rollie_current_count == 0 ) {
		continue;
	} elseif ( $rollie_current_count > 3 ) {
		break;
	} else {
		$rollie_cat_id[ $rollie_index_c ] = [ $rollie_current_count ]->name;
		$rollie_cat[ $rollie_index_c ]    = [ $rollie_current_count ]->cat_ID;
		$rollie_index_c++;

	}
	$rollie_current_count++;

}

if ( $rollie_cat[0] && get_theme_mod( 'rollie_display_cat' . $rollie_template ) ) {
	?>
																									
								<div class=" p-1 rollie_first_post_categories rollie_main_theme_text_color text-center "> 
									<div class="d-inline-block">
																		
		<?php
		for ( $x = 0;$x < 2;$x++ ) {

			if ( $rollie_cat[ $x ] ) {
				$rollie_cat_link = get_category_link( $rollie_cat_id[ $x ] );
				?>
												 
													<a class="d-inline-block pl-1" href="<?php echo $rollie_cat_link; ?>" title="<?php echo $rollie_cat[ $x ]; ?>"> 											
													
				<?php echo $rollie_cat[ $x ]; ?>
													
														
													</a>												
				<?php
			}
		}
		?>
											
									</div>
								</div>
												
									
						<?php	} ?>
