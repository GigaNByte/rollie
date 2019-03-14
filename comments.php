<?PHP
if ( post_password_required() ) {
	return;
}
if ( function_exists( 'icl_t' ) ) {
			$rollie_c_and_r_str             = icl_t( 'Rollie', 'info-comments_and_replies_on', 'Comments and replies on' );
			$rollie_s_and_c_str             = icl_t( 'Rollie', 'info-submit_comment', 'Submit a comment' );
			$rollie_comment_str             = icl_t( 'Rollie', 'info-comment', 'Comment' );
			$rollie_lr_str                  = icl_t( 'Rollie', 'info-leave_reply', 'Leave reply' );
			$rollie_logged_str              = icl_t( 'Rollie', 'info-logged_in_as', 'Logged in as' );
			$rollie_logout_str              = icl_t( 'Rollie', 'info-log_out', 'Log out?' );
			$rollie_pnav_page_str    		= icl_t( 'Rollie', 'pnav-page', 'Page navigation' );
			$rollie_c_placeholder_str 		= icl_t( 'Rollie', 'info-comment-placeholder', 'Share your thoughts' );
			$rollie_edit_str                = icl_t( 'Rollie', 'info-edit', 'Edit' );
			$rollie_reply_str               = icl_t( 'Rollie', 'info-reply', 'Reply' );

			$rollie_name_str     = icl_t( 'Rollie', 'info-form-name', 'Name' );
			$rollie_email_str	 = icl_t( 'Rollie', 'info-form-email', 'Email' );
			$rollie_email_str    = icl_t( 'Rollie', 'info-form-email', 'Edit' );
			$rollie_website_str  = icl_t( 'Rollie', 'info-form-website', 'Website' );
			$rollie_required_str = icl_t( 'Rollie', 'info-form-required', ' Required fields are marked' );
			$rollie_c_note_str   = icl_t( 'Rollie', 'info-form-note', 'Your email address will not be published. ' );


} else {
	$rollie_c_and_r_str       = 'Comments and replies on';
	$rollie_s_and_c_str       = 'Submit a comment';
	$rollie_comment_str       = 'Comment';
	$rollie_lr_str            = 'Leave reply';
	$rollie_logged_str        = 'Logged in as';
	$rollie_logout_str        = 'Log out?';
	$rollie_edit_str          = 'Edit';
	$rollie_reply_str         = 'Reply';
	$rollie_pnav_page_str     = 'Page navigation';
	$rollie_c_placeholder_str = 'Share your thoughts';
	$rollie_name_str          = 'Name';
	$rollie_email_str         = 'Email';
	$rollie_website_str       = 'Website';
	$rollie_required_str      = 'Required fields are marked';
	$rollie_c_note_str        = 'Your email address will not be published. ';
}







?>

<section id="comments " class="comments-area rollie_comment_titles">
	
	<?php


	if ( isset( $_GET['replytocom'] ) ) {
		$rollie_reply_id = $_GET['replytocom'];

		if ( ! empty( $rollie_reply_id ) && get_option( 'page_comments' ) ) {
			echo $rollie_reply_id;
			$rollie_reply = get_comment( $rollie_reply_id );
			?>
			<div class=" media-body card mt-3 rollie_comment  " id="div-comment-<?php echo $rollie_reply_id; ?>">
				<div class="card-header rollie_card_header hoverable ">
					<div class="flex-center rollie_font_first">
				
						<a href="" class="media-object float-left">
							<?php echo get_avatar( $rollie_reply->user_id, 32, '', '', array( 'class' => 'comment_avatar mr-2 ' ) ); ?>
						</a>
						
						<h5 class="media-heading "><?php echo $rollie_reply->comment_author; ?></h5>
					</div>	
			<div class="rollie_comment_content  card-text">
					
							<p class="font-italic">
							
						<?php echo $rollie_reply->comment_content; ?>
							 </p>
					</div> 
					</div>
							</div>	
			<?php
		}
	}

			$fields = array(

				'author' =>
					'<div class="form-group"><label for="author">' . $rollie_name_str . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control rollie_form_control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',

				'email'  =>
					'<div class="form-group"><label for="email">' . $rollie_email_str . '</label> <span class="required">*</span><input id="email" name="email" class="form-control rollie_form_control" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required="required" /></div>',

				'url'    =>
					'<div class="form-group  last-field"><label for="url">' . $rollie_website_str . '</label><input id="url" name="url" class="form-control rollie_form_control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',

			);

			$args = array(

				'class_submit'         => 'submit d-block rollie_button  mx-auto my-2 rollie_f_b_f btn  btn-lg rollie_button_submit ',
				'label_submit'         => $rollie_s_and_c_str,
				'comment_field'        =>
					'<div class="rollie_font_first "> <span class="required"></span><textarea id="comment" placeholder="' . $rollie_c_placeholder_str . '  " class="form-control rollie_form_control" name="comment" rows="1" required="required"></textarea></p></div>',
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
				'title_reply'          => $rollie_reply_str,
				'logged_in_as'         => '<p class="logged-in-as m-1  ">' . sprintf( __( $rollie_logged_str . ' <a href="%1$s " class="">%2$s</a>. <a  class="rollie_text_color_3 " href="%3$s" title="Log out of this account">' . $rollie_logout_str . '</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
				'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title rollie_font_first">',
				'title_reply_after'    => '</h3>',
				'comment_notes_before' => '<p class="comment-notes">' .
				$rollie_c_note_str . ( $req ? $rollie_required_str : '' ) .
				'</p>',
			);

			comment_form( $args );


			if ( have_comments() ) :






				?>
			
		
		<h3 class="comment-title col-12">
				<?php


					echo '<h3 ><span>' . $rollie_c_and_r_str . ' "</span><span>' . get_the_title() . '"</span><span> (' . get_comments_number() . ') </span></h3>';


				?>
			
		</h2>
	
		<ul class="comment-list rollie_f_comment list-unstyled rollie_comments">
			
				<?php

				$args = array(
					'walker'      => new Rollie_Comment_Walker(),
					'reply_text'  => $rollie_reply_str,
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => '32',

				);

				wp_list_comments( $args );

				?>
			
		</ul>
				<?php
				$argus = array(

					'format'       => '',
					'type'         => 'array',
					'echo'         => false,
					'add_fragment' => '#comments',

				);
				?>
				<?php
				$rollie_links = paginate_comments_links( $argus );


				if ( ! empty( $rollie_links ) ) {


					?>
  <nav class="  m-1 rollie_pagination   rollie_f_b_f" aria-label="Page navigation" role="navigation">
		<span class="sr-only"><?ph echo $rollie_pnav_page_str ?></span>	
			<ul class="pagination rollie_pagination justify-content-center m-0 ">
	
		
					<?php
					foreach ( $rollie_links as $rollie_link ) {


							 preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $rollie_link, $rollie_href );

							 preg_match( '/<a[^>]*>(.*?)<\/a>/s', $rollie_link, $rollie_content );

						?>

			
							<?php
							if ( ! ( empty( $rollie_content[1] ) ) ) {
								?>
			<li class="rollie_pagination_item page-item " >
				<a class="page-link rollie_pagination_link" href="<?php echo $rollie_href[0][0]; ?>">
								<?php
								echo $rollie_content[1];
							} else {
								?>
			<li class="rollie_pagination_item page-item rollie_pagination_active active" >
				<a class="page-link rollie_pagination_link" href="<?php echo $rollie_href[0][0]; ?>">
								<?php

								echo get_query_var( 'paged' ) + 1;
							}

							?>
				</a>
			</li>
					<?php	} ?>
			</ul>
		</span>	
</nav>
					<?php

				}


				?>
		
				<?php
		endif;
			?>
	
	
</section><!-- .comments-area -->
