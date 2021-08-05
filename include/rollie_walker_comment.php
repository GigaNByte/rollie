<?php

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

	protected function html5_comment( $comment, $depth, $args ) {
		?>		
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'has-children media' : ' media' ); ?>>
			<div class="media-body card mt-3 rollie_comment rollie_darker_main_color rollie_second_text_color " id="div-comment-<?php comment_ID(); ?>">
				<div class="card-header rollie_card_header hoverable ">
					<div class="flex-center rollie_f_main">
						<?php if ( 0 != $args['avatar_size'] ) : ?>
						<a href="<?php echo esc_url( get_comment_author_url() ); ?>" class="media-object float-left">
							<?php echo get_avatar( $comment, $args['avatar_size'], 'mm', '', array( 'class' => 'comment_avatar mr-2' ) ); ?>
						</a>
						<?php endif; ?>
						<h5 class="media-heading "><?php echo get_comment_author_link(); ?></h5>
					</div>
					<div class="rollie_comment_content ">
						<?php comment_text(); ?>	
					</div>
					<div class="rollie_comment_metadata flex-center ">				
							<a class="hidden-xs-down mr-1" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
								<div class='d-inline-block  small font-weight-light  rollie_subtitle_text_color'>
									<time datetime="<?php comment_time( 'c' ); ?>">
									<?php echo esc_html( printf( _x( '%s ago', '%s = human-readable time difference', 'rollie' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ) ); ?>
									</time>
								</div>	
							</a>
							<?php
							edit_comment_link( '<i class=" fas fa-edit rollie_icon_first rollie_icon_comment"></i> ' . __( 'Edit', 'rollie' ), '<span class="edit-link list-inline-item chip">', '</span>' );
								comment_reply_link(
									array_merge(
										$args,
										array(
											'reply_text' => '<i class=" fas rollie_icon_first rollie_icon_comment fa-reply-all"></i> ' . __( 'Reply', 'rollie' ),
											'add_below'  => 'div-comment',
											'depth'      => $depth,
											'max_depth'  => $args['max_depth'],
											'before'     => '<span class="reply-link list-inline-item chip">',
											'after'      => '</span>',
										)
									)
								);
							do_action( 'cld_like_dislike_output', '', $comment );
							?>
					</div>	
				</div>
			</div>	
		</div>
		<div class="card-block rollie_card_block warning-color">
				<?php if ( '0' == $comment->comment_approved ) : ?>
			<p class=" comment-awaiting-moderation label label-info text-muted small"><?php esc_html_e( 'Your comment is awaiting moderation', 'rollie' ); ?></p>
			<?php endif; ?>				
		</div>
		<?php
	}
}
