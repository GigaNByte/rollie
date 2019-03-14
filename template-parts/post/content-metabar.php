<?php
			$rollie_c_format = get_post_format();
		  require locate_template( 'template-parts/post/content-metabardata.php' );



if ( comments_open() || ( get_the_tags() || ( $rollie_c_format && get_theme_mod( 'rollie_tags_display_post_format' ) ) ) ) {
	?>
	
							<div class="row m-0 p-0 rollie_f_meta d-flex">	
									<div class="col-6 text-left pb-1  rollie_subtitle_text_color rollie_post_excerpt ">
										<div class="  rollie_icon_first  d-inline-block   m-1 ">	
				
			<?php
			if ( $rollie_tags_icon && ( get_the_tags() || $rollie_c_format  || has_category() ) ) {
				echo $rollie_tags_icon;
			}
			?>

										</div>
						
															 <?php
															


																$rollie_p_format_a = get_post_format_link( get_post_format() );


										
						if ( $rollie_c_format && get_theme_mod( 'rollie_tags_display_post_format' ) ) {


																	if ( function_exists( 'icl_t' ) ) {

																		$rollie_aside_str   = icl_t( 'Rollie', 'archive-archives', 'Asides' );
																		$rollie_gallery_str = icl_t( 'Rollie', 'archive-galleries', 'Galleries' );
																		$rollie_image_str   = icl_t( 'Rollie', 'archive-images', 'Images' );
																		$rollie_video_str   = icl_t( 'Rollie', 'archive-videos', 'Videos' );
																		$rollie_quote_str   = icl_t( 'Rollie', 'archive-quotes', 'Quotes' );
																		$rollie_link_str    = icl_t( 'Rollie', 'archive-links', 'Links' );
																		$rollie_status_str  = icl_t( 'Rollie', 'archive-statuses', 'Statuses' );
																		$rollie_audio_str   = icl_t( 'Rollie', 'archive-audio', 'Audio' );


																	} else {

																		$rollie_aside_str   = 'Asides';
																		$rollie_gallery_str = 'Galleries';
																		$rollie_link_str    = 'Links';
																		$rollie_image_str   = 'Images';
																		$rollie_video_str   = 'Videos';
																		$rollie_quote_str   = 'Quotes';
																		$rollie_status_str  = 'Statuses';
																		$rollie_audio_str   = 'Audio';
																	}
																	switch ( $rollie_c_format ) {
																		case 'aside':
																			$rollie_post_format_str = $rollie_aside_str;
																			break;
																		case 'gallery':
																			$rollie_post_format_str = $rollie_gallery_str;
																			break;
																		case 'link':
																			  $rollie_post_format_str = $rollie_link_str;
																			break;
																		case 'image':
																			 $rollie_post_format_str = $rollie_image_str;
																			break;
																		case 'video':
																			 $rollie_post_format_str = $rollie_video_str;
																			break;
																		case 'quote':
																			 $rollie_post_format_str = $rollie_quote_str;
																			break;
																		case 'status':
																			$rollie_post_format_str = $rollie_status_str;
																			break;
																		case 'audio':
																			 $rollie_post_format_str = $rollie_audio_str;
																			break;
																	}

																	echo ' <a href=' . $rollie_p_format_a . '>' . $rollie_post_format_str . '</a> ';
																}
										the_category(' '); 
										the_tags( ' '.$rollie_tag_char ,' '.$rollie_tag_char,'');
																?>
																		
								
									</div>
									
									<div class="col-6 text-right pb-1 rollie_subtitle_text_color rollie_post_excerpt  flex-row-reverse">
						<?php
						if ( comments_open() ) {
									 $rollie_comments_num = get_comments_number();

							?>
												<a class=" d-block" href="'<?php echo get_comments_link(); ?>'">	 
												
											<?Php

																 echo "<div class='m-auto d-inline-block '> comments:</div> <span class=' d-inline-block rollie_icon_first    fa-stack fa-1x'>
													<i class='far " . $rollie_comments_icon . " fa-stack-2x  '></i>
														<strong class='fa-stack-1x fa-stack-text rollie_text_color_3 rollie_t_shadow_0 '>" . get_comments_number() . '</strong>
													</span> ';

											?>
												</a>
										
									<?php
						}
						?>
									 
									</div>
								</div>	
								<?php
}



