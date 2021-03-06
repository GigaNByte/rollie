<?php

/**
 * The template for displaying comments
 *
 * @package rollie
 * @author sqnchy
 * @since Rollie 1.0
 */

if ( post_password_required() ) {
	return;
}
?>

<section id="comments " class="comments-area rollie_comment_titles col-12 col-md-8 offset-md-2">

	<?php
	if ( isset( $_GET['replytocom'] ) ) {
		$rollie_reply_id = $_GET['replytocom'];
		if ( ! empty( $rollie_reply_id ) && get_option( 'page_comments' ) ) {
			echo esc_html( $rollie_reply_id );
			$rollie_reply = get_comment( $rollie_reply_id );
			?>
			<div class=" media-body card mt-3 rollie_comment  " id="div-comment-<?php echo esc_html( $rollie_reply_id ); ?>">
				<div class="card-header rollie_card_header hoverable ">
					<div class="flex-center rollie_f_main">
						<a href="" class="media-object float-left">
							<?php echo get_avatar( $rollie_reply->user_id, 32, '', '', array( 'class' => 'comment_avatar mr-2 ' ) ); ?>
						</a>
						<h5 class="media-heading "><?php echo esc_html( $rollie_reply->comment_author ); ?></h5>
					</div> 
					<section class="rollie_comment_content">
						<p class="font-italic">
							<?php echo esc_html( $rollie_reply->comment_content ); ?>
						</p>
					</section>
				</div>
			</div>
			<?php
		}
	}

	$fields = array(
		'author' =>
		'<div class="form-group"><label for="author">' . __( 'Name', 'rollie' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control rollie_form_control rollie_form_input" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',

		'email'  =>
		'<div class="form-group"><label for="email">' . __( 'Email', 'rollie' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control rollie_form_control rollie_form_input" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></div>',

		'url'    =>
		'<div class="form-group  last-field"><label for="url">' . __( 'Website', 'rollie' ) . '</label><input id="url" name="url" class="form-control rollie_form_control rollie_form_input" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
	);

	$args = array(
		'class_submit'         => 'submit d-block rollie_button  mx-auto my-2 rollie_f_b_f btn  btn-lg rollie_button_submit ',
		'label_submit'         => __( 'Submit', 'rollie' ),
		'comment_field'        =>
		'<div class="rollie_f_main "> <span class="required"></span><textarea id="comment" placeholder="' . __( 'Share your thoughts', 'rollie' ) . '  " class="form-control rollie_form_control rollie_form_input" name="comment" rows="1" required="required"></textarea></p></div>',
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'title_reply'          => "<h3 class='comment-title col-12" . rollie_embl_subtitles() . "'>" . __( 'Reply', 'rollie' ) . '</h3>',
		'logged_in_as'         => '<p class="logged-in-as m-1  ">' . sprintf( __( 'Logged in as', 'rollie' ) . ' <a href="%1$s " class=""> &#160;%2$s </a>.&#160; <a  class="rollie_text_color_3 " href="%3$s" title="Log out of this account">' . __( 'Logout', 'rollie' ) . '</a>', admin_url( 'profile.php' ), ' ' . $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title rollie_f_main">',
		'title_reply_after'    => '</h3>',
		'comment_notes_before' => '<p class="comment-notes">' .
			esc_html__( 'Your email address will not be published', 'rollie' ) . ' ' . ( $req ? esc_html__( 'Required fields are marked *', 'rollie' ) : '' ) .
			'</p>',
	);

	comment_form( $args );

	if ( have_comments() ) {
		?>

		<h3 class="comment-title col-12 <?Php echo esc_attr( rollie_embl_subtitles() ); ?> ">
			<?php echo '<span>' . esc_html__( 'Comments and replies', 'rollie' ) . ' <span> (' . esc_html( get_comments_number() ) . ') </span>'; ?>
		</h3>
		<div class="comment-list rollie_f_comment list-unstyled rollie_comments">
			<?php
			$args = array(
				'walker'      => new Rollie_Comment_Walker(),
				'reply_text'  => __( 'Reply', 'rollie' ),
				'style'       => 'div',
				'short_ping'  => true,
				'avatar_size' => '32',
			);

			wp_list_comments( $args );
			?>
		</div>
		<?php
		$args = array(
			'format'       => '',
			'type'         => 'array',
			'echo'         => false,
			'add_fragment' => '#comments',
		);

		$rollie_links = paginate_comments_links( $args );

		if ( ! empty( $rollie_links ) ) {
			?>
			<nav class=" p-4 rollie_pagination   rollie_f_b_f" aria-label="Comments Pagination" role="navigation">
				<span class="sr-only"><?php esc_html_e( 'Page navigation', 'rollie' ); ?></span>
				<ul class="pagination rollie_pagination justify-content-center m-0 ">

					<?php
					foreach ( $rollie_links as $rollie_link ) {

						preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $rollie_link, $rollie_href );
						preg_match( '/<a[^>]*>(.*?)<\/a>/s', $rollie_link, $rollie_content );

						if ( ! ( empty( $rollie_content[1] ) ) ) {
							?>
							<li class="rollie_pagination_item page-item ">
								<a class="page-link rollie_pagination_link" href="<?php echo esc_url( $rollie_href[0][0] ); ?>">
									<?php echo esc_html( $rollie_content[1] ); ?>
								</a>
							</li>
							<?php
						} else {
							?>
							<li class="rollie_pagination_item page-item rollie_pagination_active active">
								<a class="page-link rollie_pagination_link" href="<?php echo esc_url( $rollie_href[0][0] ); ?>">
									<?php echo esc_html( get_query_var( 'paged' ) + 1 ); ?>
								</a>
							</li>
							<?php
						}
					}
					?>
				</ul>
			</nav>
			<?php
		}
	}
	?>
</section>
