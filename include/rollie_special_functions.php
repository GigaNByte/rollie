<?php
function rollie_thumbnail_url(){
 if ( has_post_thumbnail( get_the_ID() ) ) {
	$rollie_thumbnail_url_escaped = get_the_post_thumbnail_url();
	
}else{
	if ( ! empty( get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template  ) ) ) {
		$rollie_thumbnail_url_escaped = get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template  );
	} else {
		$rollie_thumbnail_url_escaped = '';
	}
}
return $rollie_thumbnail_url_escaped;
}
function rollie_thumbnail_alt(){
	$rollie_thumbnail_alt =  esc_html ( get_the_post_thumbnail_caption() ) ;
	if (empty($rollie_thumbnail_alt))   $rollie_thumbnail_alt = get_the_title();
	return $rollie_thumbnail_alt;
}
function rollie_header_image_source($image_id){
	$img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); 
	$image_srcset = "<picture>";
	if (wp_get_attachment_image_url($image_id,'rollie_xs')){
	$retina = '';
  	if (wr2x_get_retina_from_url( wp_get_attachment_image_url($image_id,'rollie_l') )){
  	$retina = ', '.wr2x_get_retina_from_url( wp_get_attachment_image_url($image_id,'rollie_xs')).' 2x';
  	}

  $image_srcset .=  "<source media='(max-width: 414px)' srcset='". wp_get_attachment_image_url($image_id,'rollie_xs').$retina."'>";
	}
if (wp_get_attachment_image_url($image_id,'rollie_s')){	

  	$retina = '';
  	if (wr2x_get_retina_from_url( wp_get_attachment_image_url($image_id,'rollie_s') )){
  	$retina = ', '.wr2x_get_retina_from_url( wp_get_attachment_image_url($image_id,'rollie_s')).' 2x';
  	}

  $image_srcset .=  "<source media='(max-width: 1024px) ' srcset='".wp_get_attachment_image_url($image_id,'rollie_s') .$retina."'>";
  }
  if (wp_get_attachment_image_url($image_id,'rollie_m')){

  	$retina = '';
  	if (wr2x_get_retina_from_url( wp_get_attachment_image_url($image_id,'rollie_m') )){
  	$retina = ', '. ( wp_get_attachment_image_url($image_id,'rollie_m')).' 2x';
  	}

  $image_srcset .=  "<source media='(max-width: 1336px) ' srcset='".wp_get_attachment_image_url($image_id,'rollie_m') .$retina."'>";

  }
  if (wp_get_attachment_image_url($image_id,'rollie_l')){
  	  	$retina=', '.wp_get_attachment_image_url($image_id,'full').' 2x';
  $image_srcset .=  "<source media='(max-width: 1920px)' srcset='".wp_get_attachment_image_url($image_id,'rollie_l').$retina."'>";
  }
  $image_srcset .=  "<img sizes='100vh'; class='rollie_header_image' alt='".$img_alt ."'src='".wp_get_attachment_image_url($image_id,'full')."'>";

  $image_srcset .=  "</picture";
return $image_srcset;
}

function rollie_post_foreground () {
		$html='';

		if (get_post_format()=='video'){

			$html .= "<div class='rollie_embed  rollie_post_thumbnail  rollie_post_thumbnail_height_m  embed-responsive embed-responsive-16by9'>";
			$html .= rollie_get_embedded_media( array( 'video', 'iframe' ) ); 
			$html .= "</div>";	
			
		}elseif(get_post_format()=='audio'){

			$html .= "<div class='rollie_embed  rollie_post_thumbnail  rollie_post_thumbnail_height_m '>";
			$html .= rollie_get_embedded_media( array( 'audio', 'iframe' ) ); 
			$html .= "</div>";	

		}elseif(get_post_format()=='gallery' &&  get_post_gallery()){
			$rollie_gallery    = get_post_gallery( get_the_ID(), false );
			$rollie_galleryIDS = $rollie_gallery['ids'];
			$rollie_parts      = explode( ',', $rollie_galleryIDS );

			if (get_theme_mod('rollie_post_format_gallery_static',true)){
				$html .= "<div class='rollie_gallery_post_format rollie_post_thumbnail_height_m row'>";	
					$html .= "<div class='col-6 h-50'>";
					if (isset($rollie_parts[0])){
						$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[0], 'full' );
						$html .=  "<img class=' h-100 rollie_post_thumbnail  ' src='".$rollie_attachment[0]."' alt='".get_the_title($rollie_parts[0])."'/>";
					}

					$html .= "</div>"; 
					$html .= "<div class='col-6  h-50'>";
					
					if (isset($rollie_parts[1])){
						$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[1], 'full' );
						$html .=  "<img class=' h-100 rollie_post_thumbnail  ' src='".$rollie_attachment[0]."' alt='".get_the_title($rollie_parts[1])."'/>";
					}

					$html .= "</div>"; 
					$html .= "<div class='col-12 h-50'>";	
					
					if (isset($rollie_parts[2])){
						$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[2], 'full' );
						$html .=  "<img class='h-100 rollie_post_thumbnail  ' src='".$rollie_attachment[0]."' alt='".get_the_title($rollie_parts[2])."'/>";
					}

					$html .= "</div>";
				$html .= "</div>";
			}else{

			
			$html .= "<div class='rollie_gallery_post_format '>";	
			$html .= "<div class='swiper-container rollie_gallery_1_swiper'>";
			$html .= "<div class='swiper-wrapper'>";
							
			foreach ( $rollie_parts  as $key => $attach_id ) {

				$rollie_attachment = wp_get_attachment_image_src( $attach_id, 'full' );
											
				$html .= "<div class='swiper-slide rollie_post_thumbnail_img'>";
				$html .=  "<img src='".$rollie_attachment[0]."' alt='".get_the_title($attach_id)."'/>";
				$html .= "</div>";
			} 

				$html .= "</div>";
				$html .= "<div class='swiper-pagination'></div>";
				$html .= "</div>";
				$html .= "</div>";
			
			}
			
		}elseif(has_post_thumbnail()){
	
		$html .= "<img class=' rollie_post_thumbnail  rollie_post_thumbnail_height_m' src='".rollie_thumbnail_url() ."' alt='".rollie_thumbnail_alt()."'>";	
		}
		$html = apply_filters('rollie_post_foreground_filter',$html);

		if (!empty($html)){
			$html = "<a href='".get_page_link()."'>".$html."</a>";	
		}
		
		return  $html;
}
function rollie_post_page_template_prefix(){
	if ( is_category() ) {
		return  '_ct';
	} elseif ( is_archive() ) {
		return  '_ar';
	} elseif ( is_search() ) {
		return  '_se';
	} else {
		return '';
	}
}
function rollie_subtitle(){
	global $post;
	if ( class_exists('get_field') && get_field( 'rollie_alternate_subtitle', get_the_ID() )){
		echo get_field( 'rollie_alternate_subtitle', get_the_ID() );
	}
	elseif (is_search()){
		_e('Search');
	}elseif(is_category()){
		_e('Category');
	}elseif ( is_tag() ) {
		_e('Tag');
	} elseif ( is_author() ) {
		_e('Author');
	} elseif ( is_year() ) {
		_e('Year');
	} elseif ( is_month() ) {
		_e('Month');
	} elseif ( is_day() ) {
		_e('Day');
	} elseif ( is_tax( 'post_format' ) ) {
		_e('Posts');
	}elseif ( is_post_type_archive() ) {	
		echo post_type_archive_title( '', false ) ;
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		echo $tax->labels->singular_name;
	}elseif(  $post->post_parent &&  get_the_title( $post->post_parent ) ){
		echo get_the_title( $post->post_parent); 
	}else{
		echo get_bloginfo('name');
	}	
}

function rollie_title(){
		
	if (class_exists('Woocommerce') && is_woocommerce() && apply_filters( 'woocommerce_show_page_title', true ) ){
	woocommerce_page_title();
	}
	elseif (is_search()){
		global $wp_query;
		 if ( have_posts() ) { 						
			echo '<div class="text-uppercase  h2 d-inline-block" ><p class="font-weight-normal">' . '(' . $wp_query->found_posts . ') ' .__('Results for:','rollie'),' <i>' . get_search_query() . '</i></div>'; 
	 	}else {
			echo '<div class="text-uppercase  h2 d-inline-block" ><p class="font-weight-normal"><i>' . get_search_query() . '<i></div>'; 
	 	}
	}elseif(is_category()){
	echo single_cat_title( '', false );
	}elseif ( is_tag() ) {
		echo single_tag_title( '', false ) ;
	} elseif ( is_author() ) {
		 $rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) ); 
		echo $rollie_author->nickname;
	} elseif ( is_year() ) {
		echo get_the_date( _x( 'Y', 'yearly archives date format' ) );
	} elseif ( is_month() ) {
		echo get_the_date( _x( 'F Y', 'monthly archives date format' ) );
	} elseif ( is_day() ) {
		echo get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			_e('Asides');
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			_e('Galleries');
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			_e('Images');
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			_e('Videos');
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			_e('Quotes');
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			_e('Links');
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			_e('Statuses');
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			_e('Audio');
		}
	}elseif ( is_post_type_archive() ) {	
		echo post_type_archive_title( '', false ) ;
	} elseif ( is_tax() ) {
		echo single_term_title( '', false );
	} else {
		the_title('','');
	}		
}

function rollie_get_embedded_media( $type = array() ) {
	 $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed    = get_media_embedded_in_content( $content, $type );
	if ( in_array( 'audio', $type ) ) {
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	} else {
		$output = $embed[0];
	}
	return $output;
}
		
	function rollie_excerpt(){
	if ( class_exists('Woocommerce') && is_woocommerce() ){
	do_action( 'woocommerce_archive_description' );
	}elseif ( is_category() && function_exists( 'get_field' ) ) {
	global $wp_query;
		$cat_id = get_queried_object_id();
		echo get_field( 'category_excerpt', $wp_query->get_queried_object_id() );
	}elseif(is_author()){
		$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) ); 
		echo $rollie_author->description; 
	}
	elseif ( function_exists( 'get_field' ) ) {
		echo get_field( 'rollie_excerpt' );
	}

}	
	function rollie_embl_titles(){
		if ( get_theme_mod ('rollie_embl_titles' ,0 ) == 1){
			return  ' rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_t ';
		} 
		if ( get_theme_mod ('rollie_embl_titles' ,0) == 2){
			return ' rollie_fancy_line rollie_fancy_line_t rollie_fancy_line_horizontal';
		} else{
			return '';
		}
	}
	function rollie_embl_subtitles($right=false){
		if ( get_theme_mod ('rollie_embl_subtitles' ,1) == 1){
		
			if ($right){
				return ' rollie_fancy_line rollie_fancy_line_vertical_r'  ;
			}else{
				return '  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_s ';
			}
		} 
		if ( get_theme_mod ('rollie_embl_subtitles' ,1) == 2){
			return ' rollie_fancy_line  rollie_fancy_line_horizontal rollie_fancy_line_s ';
		} else{
			return '';
		}
	}

	function rollie_embl_navbar(){
		if ( get_theme_mod ('rollie_embl_navbar' ,2 ) == 1){
			return' rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_n ';
		} 
		 if ( get_theme_mod ('rollie_embl_navbar' ,2) == 2){
			return ' rollie_fancy_line rollie_fancy_line_n rollie_fancy_line_horizontal';
		}  else{
			return '';
		}
	}

	function rollie_embl_footer(){
		if ( get_theme_mod ('rollie_embl_footer' ,2 ) == 1){
			return '  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_f ';
		} 
		 if ( get_theme_mod ('rollie_embl_footer' ,2) == 2){
			return ' rollie_fancy_line  rollie_fancy_line_horizontal rollie_fancy_line_f ';
		}  else{
			return '';
		}
	}
function rollie_page_has_children() {
	global $post;

	$pages = get_pages( 'child_of=' . $post->ID );

	if ( count( $pages ) > 0 ) :
		return true;
  else :
		return false;
  endif;
}
function get_menu_object_by_registered_slug( $menu_slug ) {

	$menu_items = array();

	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
		$menu = get_term( $locations[ $menu_slug ] );

		$menu_items = wp_get_nav_menu_object( $menu->term_id );

	}

	return $menu_items;

}
function rollie_limit_text( $text, $limit, $ending ) {
	if ( str_word_count( $text, 0 ) > $limit ) {
		$words = str_word_count( $text, 2 );
		$pos   = array_keys( $words );
		$text  = substr( $text, 0, $pos[ $limit ] ) . $ending;
	}
	  return $text;
}

function rollie_get_translated_archive_title() {
	if ( function_exists( 'icl_t' ) ) {
		$rollie_posts_str     = icl_t( 'Rollie', 'archive-posts', 'Posts' );
		$rollie_archives_str  = icl_t( 'Rollie', 'archive-archives', 'Archives' );
		$rollie_category_str  = icl_t( 'Rollie', 'archive-category', 'Category' );
		$rollie_tag_str       = icl_t( 'Rollie', 'archive-tag', 'Tag' );
		$rollie_year_str      = icl_t( 'Rollie', 'archive-year', 'Year' );
		$rollie_month_str     = icl_t( 'Rollie', 'archive-month', 'Month' );
		$rollie_day_str       = icl_t( 'Rollie', 'archive-day', 'Day' );
		$rollie_asides_str    = icl_t( 'Rollie', 'archive-asides', 'Asides' );
		$rollie_galleries_str = icl_t( 'Rollie', 'archive-galleries', 'Galleries' );
		$rollie_images_str    = icl_t( 'Rollie', 'archive-images', 'Images' );
		$rollie_author_str    = icl_t( 'Rollie', 'archive-author', 'Author' );
		$rollie_links_str     = icl_t( 'Rollie', 'archive-links', 'Links' );
		$rollie_videos_str    = icl_t( 'Rollie', 'archive-videos', 'Videos' );
		$rollie_quotes_str    = icl_t( 'Rollie', 'archive-quotes', 'Quotes' );
		$rollie_statuses_str  = icl_t( 'Rollie', 'archive-statuses', 'Statuses' );
		$rollie_audio_str     = icl_t( 'Rollie', 'archive-audio', 'Audio' );
	} else {
		$rollie_posts_str     = 'Posts';
		$rollie_archives_str  = 'Archives';
		$rollie_category_str  = 'Category';
		$rollie_tag_str       = 'Tag';
		$rollie_year_str      = 'Year';
		$rollie_month_str     = 'Month';
		$rollie_day_str       = 'Day';


	}

	if ( is_category() ) {
		
		
		//  $rollie_category_str ., single_cat_title( '', false );
	} elseif ( is_tag() ) {
	//	 translators: Tag archive title. 1: Tag name */
	//$title = $rollie_tag_str  single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		
		$title = sprintf( __( '<div class="rollie_parent_title rollie_second_title_ppr   rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_author_str . '</div> <div class=" rollie_title_text_color"> %s </div> ' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_year_str . '</div> <div class=" rollie_title_text_color"> %s </div> ' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
	} elseif ( is_month() ) {
		
		$title = sprintf( __( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_month_str . '</div> <div class=" rollie_title_text_color"> %s </div>' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
	} elseif ( is_day() ) {
		
		$title = sprintf( __( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_day_str . '</div> <div class=" rollie_title_text_color"> %s </div>' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_asides_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_galleries_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_images_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_videos_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_quotes_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_links_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_statuses_str . '</div>', 'post format archive title' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_posts_str . '</div> <div class=" rollie_title_text_color">' . $rollie_audio_str . '</div>', 'post format archive title' );
		}
	} elseif ( is_post_type_archive() ) {
		/* translators: Post type archive title. 1: Post type name */
		$title = sprintf( __( '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color ">' . $rollie_archives_str . '</div> <div class=" rollie_title_text_color"> %s </div>' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( $rollie_archives_str );
	}

	/**
	 * Filters the archive title.
	 *
	 * @since 4.1.0
	 *
	 * @param string $title Archive title to be displayed.
	 */
	return apply_filters( 'get_the_archive_title', $title );
	
}
