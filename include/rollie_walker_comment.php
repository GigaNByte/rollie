<?php
/**
 * A custom WordPress comment walker class to implement the Bootstrap 3 Media object in WordPress comment list.
 *
 * @package     WP Bootstrap Comment Walker
 * @version     1.0.0
 * @author      Edi Amin <to.ediamin@gmail.com>
 * @license     http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link        https://github.com/ediamin/wp-bootstrap-comment-walker
 */
class Rollie_Comment_Walker extends Walker_Comment {
	/**
	 * Output a comment in the HTML5 format.
	 *
	 * @access protected
	 * @since 1.0.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param object $comment Comment to display.
	 * @param int    $depth   Depth of comment.
	 * @param array  $args    An array of arguments.
	 */
	function rollie_comment_translate_c_a_str( $name ) {
		if ( function_exists( 'icl_t' ) ) {
			$rollie_c_accept_str = esc_html( icl_t( 'Rollie', 'info-comment_awaiting_moderation', 'Your comment is awaiting moderation' ) );
			$rollie_edit_str     = icl_t( 'Rollie', 'info-edit', 'Edit' );
			$rollie_reply_str    = icl_t( 'Rollie', 'info-comment_awaiting_moderation', 'Reply' );
		} else {
			$rollie_c_accept_str = 'Your comment is awaiting moderation';
			$rollie_edit_str     = 'Edit';
			$rollie_reply_str    = 'Reply';
		}

		switch ( $name ) {
			case 'c_accept':
				return $rollie_c_accept_str;
					break;
			case 'edit':
				return $rollie_edit_str;
					break;
			case 'reply':
				return $rollie_reply_str;
					break;
			default:
				return;
					break;
		}

	}



	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( $args['style'] === 'div' ) ? 'div' : 'li';
		?>		
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>>
			

			<div class="media-body card mt-3 rollie_comment rollie_darker_main_color " id="div-comment-<?php comment_ID(); ?>">
				<div class="card-header rollie_card_header hoverable ">
					<div class="flex-center rollie_font_first">
						<?php if ( $args['avatar_size'] != 0 ) : ?>
						<a href="<?php echo get_comment_author_url(); ?>" class="media-object float-left">
							<?php echo get_avatar( $comment, $args['avatar_size'], 'mm', '', array( 'class' => 'comment_avatar mr-2 ' ) ); ?>
						</a>
						<?php endif; ?>
						<h5 class="media-heading "><?php echo get_comment_author_link(); ?></h5>
					</div>
						<div class="rollie_comment_content  card-text">
							
								<?php comment_text(); ?>
							
					</div>
			
					<div class="rollie_comment_metadata flex-center ">
						
						<ul class="list-inline">
							<a class="hidden-xs-down mr-1" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<div class='d-inline-block  small font-weight-light  rollie_subtitle_text_color'>
									<time datetime="<?php comment_time( 'c' ); ?>">
									
											



									<?php printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
									</time>
								</div>	
							</a>
							
							<?php edit_comment_link( __( '<i class=" fas fa-edit rollie_icon_first rollie_icon_comment"></i> ' . $this->rollie_comment_translate_c_a_str( 'edit' ) ), ' <li class=" edit-link list-inline-item chip  ">', '</li>' ); ?>
							
							<?php

								comment_reply_link(
									array_merge(
										$args,
										array(
											'reply_text' => '<i class=" fas rollie_icon_first rollie_icon_comment fa-reply-all"></i> ' . $this->rollie_comment_translate_c_a_str( 'reply' ),
											'add_below'  => 'div-comment',
											'depth'      => $depth,
											'max_depth'  => $args['max_depth'],
											'before'     => '   <li class="  reply-link list-inline-item  chip">',
											'after'      => '</li>',
										)
									)
								);
							do_action( 'cld_like_dislike_output', '', $comment );
							?>
							


						</ul>
					</div><!-- .comment-metadata -->
					
				</div>
				
				
				
				
				<div class="card-block rollie_card_block warning-color">
						<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php echo $this->rollie_comment_translate_c_a_str( 'c_accept' ); ?></p>
					<?php endif; ?>				

				<!-- .comment-content -->
								
				<!-- </div> -->

			<!-- </div>		 -->
		<?php
	}
}
