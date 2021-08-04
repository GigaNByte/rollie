<?php
	/**
	 * This File containts miscellaneous functions and template functions used in various page templates and components in theme
	 *
	 * @package rollie
	 * @author sqnchy
	 * @since Rollie 1.0
	 */

	add_shortcode(
		'rollie_header_video',
		function( $atts ) {
				$atts = shortcode_atts(
					array(
						'src' => '',
					),
					$atts
				);

			// Validate the link and return the output.
			if ( filter_var( $atts['src'], FILTER_VALIDATE_URL ) ) {
				return '<video autoplay loop muted class="rollie_header_image rollie_header_shortcode rollie_header_video" src="' . esc_url_raw( $atts['src'] ) . '"></video>';
			}
		}
	);

	/**
	 * Component: Displays number of comments
	 *
	 * @return HTML
	 */
	function rollie_comments_counter() {
		?>
		<span class='rollie_icon_first fa-stack fa-1x'>
			<i class='far fa-comment fa-stack-2x'></i>
			<strong class='fa-stack-1x fa-stack-text rollie_t_shadow_0 '><?php echo esc_html( get_comments_number() ); ?></strong>
		</span>
		<?php
	}

	/**
	 * Component: Displays user avatar
	 *
	 * @return HTML
	 */
	function rollie_avatar( $rollie_author_id, $rollie_center_avatar = false ) {
		if ( empty( $rollie_author_id ) ) {
			return;
		}

		if ( $rollie_center_avatar ) {
			$rollie_center_avatar = 'rollie_flex_text_center';
		} else {
			$rollie_center_avatar = '';
		}
		?>

		<a class='<?php echo esc_attr( $rollie_center_avatar ); ?>' href='<?php echo get_the_author_link( $rollie_author_id ); ?>'>
			<img class='rollie_avatar avatar mr-2' src="<?php echo esc_url( get_avatar_url( $rollie_author_id, array( 'size' => 40 ) ) ); ?>" alt='<?php get_the_author_meta( 'nickname' ); ?>' >	
		</a>
		<?php
	}

	/**
	 * Component: Displays Icon menu in collapsed Top Navigation Menu
	 */
	function rollie_nav_top_icons_colapsed_content() {
		if ( 'small' != get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) ) {
			$rollie_nav_top_icons_colapsed_content_class = 'rollie_nav_top_icons_colapsed_content_side';
		} else {
			$rollie_nav_top_icons_colapsed_content_class = 'rollie_nav_top_icons_colapsed_content_small';
		}
		echo "<nav id='rollie_nav_top_icons_colapsed_content' class='d-flex " . esc_attr( $rollie_nav_top_icons_colapsed_content_class ) . "'>";

		if ( 'small' == get_theme_mod( 'rollie_nav_top_icons_colapsed_content', 'small' ) ) {
			add_action( 'rollie_nav_top_icons_colapsed_content', 'rollie_nav_top_search_button_colapsed', 10 );
		}
		do_action( 'rollie_nav_top_icons_colapsed_content' );
		echo '</nav>';

	}

	/**
	 * Component: Displays Top Navigation Menu
	 *
	 * @return HTML
	 */
	function rollie_top_menu_wp_nav_menu() {
		$rollie_side_active_c = '';
		if ( 'full' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
			$rollie_side_active_c = 'rollie_collapse_full ';
		} elseif ( 'side' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
			$rollie_side_active_c = 'rollie_collapse_side rollie_navbar_color rollie_collapse_side_navbar';
		} elseif ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) || 'fixed' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
			$rollie_side_active_c = 'rollie_collapse_side rollie_collapse_fixed ';
			if ( 'fixed_full' == get_theme_mod( 'rollie_navbar_design', 'full' ) ) {
				$rollie_side_active_c = 'rollie_collapse_side rollie_collapse_fixed rollie_collapse_fixed_full';
			}
		}

		$rollie_navbar_align_mod = get_theme_mod( 'rollie_menu_top_item_align', 2 );

		$rollie_navbar_align = '';
		if ( 1 == $rollie_navbar_align_mod ) {
			$rollie_navbar_align = 'mr-auto text-left';
		} elseif ( 2 == $rollie_navbar_align_mod ) {
			$rollie_navbar_align = 'm-auto text-center';
		} elseif ( 3 == $rollie_navbar_align_mod ) {
			$rollie_navbar_align = 'ml-auto text-right';
		}

		add_filter( 'wp_nav_menu_items', 'rollie_navbar_collapse_logo', 10, 2 );
		function rollie_navbar_collapse_logo( $nav, $args ) {
			if ( 'rollie_top_menu' == $args->theme_location && get_theme_mod( 'rollie_navbar_collapse_logo' ) ) {
				return "<div class='rollie_navbar_collapse_logo rollie_item_min_w'>" . rollie_navbar_icon( 'rollie_navbar_collapse_logo', false ) . '</div>' . $nav;
			} else {
				return $nav;
			}
		}
		if ( has_nav_menu( 'rollie_top_menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'rollie_top_menu',
					'container_id'    => 'rollie_nav_top_main_container',
					'container_class' => 'collapse navbar-collapse ' . $rollie_side_active_c,
					'menu_id'         => false,
					'items_wrap'      => '<div id="%1$s" class="%2$s">%3$s</div>',
					'menu_class'      => 'navbar-nav rollie_wrap ' . $rollie_navbar_align,
					'walker'          => new Rollie_Walker_Nav_Top_Toggle(),
					'depth'           => '6',
				)
			);
		}
	}

	function rollie_navbar_icon( $logo_url = 'rollie_navbar_logo', $echo = true ) {
		$rollie_retina_navbar         = '';
		$rollie_retina_navbar_snippet = '';
		if ( get_theme_mod( $logo_url ) ) {

			if ( function_exists( 'wr2x_get_retina_from_url' ) && wr2x_get_retina_from_url( esc_url( get_theme_mod( $logo_url ) ) ) ) {
				$rollie_retina_navbar = ', ' . wr2x_get_retina_from_url( esc_url( get_theme_mod( $logo_url ) ) ) . ' 2x';
			}

			$rollie_retina_navbar_snippet .= '<a class="rollie_nav_top_logo m-auto px-2" href="' . esc_url( home_url( '/' ) ) . '">';
			$rollie_menu_top_logo_id       = esc_attr( attachment_url_to_postid( esc_url( get_theme_mod( $logo_url ) ) ) );
			$rollie_retina_navbar_snippet .= "<img class='p-1  m-auto d-block' srcset='" . esc_url( get_theme_mod( $logo_url ) ) . ' 1x' . $rollie_retina_navbar . "' alt='" . esc_attr( get_the_title( $rollie_menu_top_logo_id ) ) . "'>";
			if ( get_theme_mod( 'rollie_navbar_logo_title', false ) ) {
				$rollie_retina_navbar_snippet .= '<div class="text-center text-nowrap rollie_nav_site_title">' . esc_html( get_bloginfo( 'name' ) ) . '</div>';
			}
				$rollie_retina_navbar_snippet .= '</a>';
		}
		if ( $echo ) {
			// ignore wpcs everything is escaped.
			echo $rollie_retina_navbar_snippet;
		} else {
			return $rollie_retina_navbar_snippet;
		}
	}

	function rollie_nav_top_search_button() {
		if ( get_theme_mod( 'rollie_navbar_search_form' ) ) {
			?>
			<button data-toggle="collapse" data-target="#rollie_search_input_menu_top" aria-expanded="false" aria-controls="rollie_search_input_menu_top" id='rollie_search_button_standalone' class=" btn ">
				<i class="fas fa-search"></i>
			</button>	
			<?php
		}
	}
	function rollie_nav_top_search_button_colapsed() {
		if ( get_theme_mod( 'rollie_navbar_search_form' ) ) {
			?>
			<div id="rollie_search_input_menu_top" class="collapse rollie_navbar_color py-1" >
				<?Php get_search_form(); ?>
			</div>
			<?php
		}
	}

	function rollie_thumbnail_id() {
		$page_for_posts        = get_option( 'page_for_posts' );
		$rollie_template_sufix = rollie_page_template_sufix();
		if ( has_post_thumbnail( get_the_ID() ) ) {
			$rollie_thumbnail_id = get_post_thumbnail_id();
		} elseif ( ( is_home() || is_archive() || is_search() || is_404() ) && has_post_thumbnail( $page_for_posts ) ) {
			$rollie_thumbnail_id = get_post_thumbnail_id( $page_for_posts );
		} elseif ( is_category() && ( function_exists( 'get_field' ) && get_field( 'rollie_cat_img', get_queried_object() ) ) ) {
			$rollie_thumbnail_id = attachment_url_to_postid( get_field( 'rollie_cat_img', get_queried_object() ) );
		} elseif ( ! empty( get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template_sufix ) ) ) {
			$rollie_thumbnail_id = attachment_url_to_postid( get_theme_mod( 'rollie_alt_thumbnail' . $rollie_template_sufix ) );
		} elseif ( has_header_image() ) {
			$data                = get_object_vars( get_theme_mod( 'header_image_data' ) );
			$rollie_thumbnail_id = is_array( $data ) && isset( $data['attachment_id'] ) ? $data['attachment_id'] : '';
		} else {
			$rollie_thumbnail_id = '';
		}
		return $rollie_thumbnail_id;
	}
	function rollie_thumbnail_alt( $rollie_thumbnail_id ) {
		$rollie_thumbnail_alt = esc_html( get_the_post_thumbnail_caption() );
		if ( empty( $rollie_thumbnail_alt ) ) {
			$rollie_thumbnail_alt = get_post_meta( $rollie_thumbnail_id, '_wp_attachment_image_alt', true );
			if ( empty( $rollie_thumbnail_alt ) ) {
				$rollie_thumbnail_alt = get_the_title();
			}
		}
		return $rollie_thumbnail_alt;
	}

	function rollie_header_image_responsive( $image_id, $image_alt, $class, $rollie_sizes, $limit = 'full' ) {
		global $_wp_additional_image_sizes;
		$i         = 1;
		$image_alt = ( ! empty( $image_alt ) ) ? "alt='" . $image_alt . "'" : "alt='" . get_the_title() . "_thumbnail'";

		$image_srcset = '<picture>';
		foreach ( $rollie_sizes as $size ) {
			if ( isset( $_wp_additional_image_sizes[ $size ] ) && wp_get_attachment_image_url( $image_id, $size ) ) {
				$retina = '';
				if ( function_exists( 'wr2x_get_retina_from_url' ) && wr2x_get_retina_from_url( wp_get_attachment_image_url( $image_id, $size ) ) ) {
					$retina = ', ' . wr2x_get_retina_from_url( wp_get_attachment_image_url( $image_id, $size ) ) . ' 2x';
				}
				$image_srcset .= "<source media='(max-width:" . $_wp_additional_image_sizes[ $size ]['width'] . "px)' srcset='" . wp_get_attachment_image_url( $image_id, $size ) . $retina . "'>";
				$i++;
			}
		}
		$image_srcset .= "<img sizes='100%' class='" . $class . "'" . $image_alt . "src='" . wp_get_attachment_image_url( $image_id, $limit ) . "'>";
		$image_srcset .= '</picture>';

		if ( class_exists( 'A3_Lazy_Load' ) ) {
			return apply_filters( 'a3_lazy_load_html', $image_srcset, null );
		} else {
			return $image_srcset;
		}

	}

	function rollie_post_foreground( $rollie_max_posts_on_current_row ) {
		$html                = '';
		$rollie_thumbnail_id = rollie_thumbnail_id();
		if ( get_post_format() == 'video' ) {
			$html .= '<div class="rollie_embed rollie_post_thumbnail embed-responsive embed-responsive-16by9 ' . esc_attr( 'rollie_thumbnail_min_max_size' . rollie_page_template_sufix() ) . '">';
			$html .= rollie_get_embedded_media( array( 'video', 'iframe' ) );
			$html .= '</div>';
		} elseif ( get_post_format() == 'audio' ) {
			$html .= '<div class="rollie_embed rollie_post_thumbnail">';
			$html .= rollie_get_embedded_media( array( 'audio', 'iframe' ) );
			$html .= '</div>';
		} elseif ( get_post_format() == 'gallery' && get_post_gallery() ) {
			$rollie_gallery     = get_post_gallery( get_the_ID(), false );
			$rollie_gallery_ids = $rollie_gallery['ids'];
			$rollie_parts       = explode( ',', $rollie_gallery_ids );
			if ( get_theme_mod( 'rollie_post_format_gallery_slider', true ) ) {
				$html .= '<div class="rollie_gallery_post_format row ' . esc_attr( 'rollie_thumbnail_min_max_size' . rollie_page_template_sufix() ) . '">';
				$html .= "<div class='col-6 h-50'>";
				if ( isset( $rollie_parts[0] ) ) {
					$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[0], 'full' );
					$html             .= '<img class="w-100 rollie_thumbnail" src="' . $rollie_attachment[0] . '" alt="' . get_the_title( $rollie_parts[0] ) . '"/>';
				}

					$html .= '</div>';
					$html .= "<div class='col-6  h-50'>";

				if ( isset( $rollie_parts[1] ) ) {
					$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[1], 'full' );
					$html             .= '<img class="w-100 rollie_thumbnail" src="' . $rollie_attachment[0] . '" alt="' . get_the_title( $rollie_parts[1] ) . '"/>';
				}

					$html .= '</div>';
					$html .= "<div class='col-12 h-50'>";

				if ( isset( $rollie_parts[2] ) ) {
					$rollie_attachment = wp_get_attachment_image_src( $rollie_parts[2], 'full' );
					$html             .= '<img class="w-100 rollie_thumbnail" src="' . $rollie_attachment[0] . '" alt="' . get_the_title( $rollie_parts[2] ) . '"/>';

				}
					$html .= '</div>';
					$html .= '</div>';
			} else {

				$html .= "<div class='rollie_gallery_post_format'>";
				$html .= "<div class='swiper-container rollie_gallery_1_swiper'>";
				$html .= "<div class='swiper-wrapper'>";

				foreach ( $rollie_parts  as $key => $attach_id ) {

					$rollie_attachment = wp_get_attachment_image_src( $attach_id, 'full' );

					$html .= "<div class='swiper-slide rollie_post_thumbnail_img'>";
					$html .= "<img src='" . $rollie_attachment[0] . "' alt='" . get_the_title( $attach_id ) . "'/>";
					$html .= '</div>';
				}

				$html .= '</div>';
				$html .= "<div class='swiper-pagination'></div>";
				$html .= '</div>';
				$html .= '</div>';

			}
		} elseif ( ! empty( $rollie_thumbnail_id ) ) {
			$rollie_header_limit = ( 0 != $rollie_max_posts_on_current_row ) ? 'rollie_m_thumb' : 'rollie_l_thumb';
			$html               .= rollie_header_image_responsive( $rollie_thumbnail_id, rollie_thumbnail_alt( $rollie_thumbnail_id ), 'rollie_post_thumbnail rollie_thumbnail_min_max_size' . rollie_page_template_sufix(), array( 'rollie_xs_thumb', 'rollie_s_thumb', 'rollie_m_thumb', 'rollie_l_thumb' ), $rollie_header_limit );
		}
			$html = apply_filters( 'rollie_post_foreground_filter', $html );

		if ( ! empty( $html ) ) {
			$html = '<a class="display-contents" href="' . get_page_link() . '">' . $html . '</a>';
		}
		if ( class_exists( 'A3_Lazy_Load' ) ) {
			return apply_filters( 'a3_lazy_load_html', $html, null );
		} else {
			return $html;
		}
	}

	function rollie_page_template_sufix() {
		if ( class_exists( 'Woocommerce' ) && ( is_woocommerce() || is_cart() || is_checkout() ) && ! ( is_product_category() || is_product_tag() ) ) {
			return '_woo';
		}

		if ( is_category() || is_archive() ) {
			return '_ctar';
		} elseif ( is_search() ) {
			return '_se';
		} elseif ( is_page() ) {
			return '_sp';
		} elseif ( is_single() ) {
			return '_spp';
		} else {
			return '_pp';
		}
	}
	function rollie_page_template_sufix_array() {
		if ( class_exists( 'Woocommerce' ) ) {
			return array( '_ctar', '_sp', '_spp', '_se', '_pp', '_woo' );
		} else {
			return array( '_ctar', '_sp', '_spp', '_se', '_pp' );
		}
	}
	function rollie_post_page_template_sufix_array() {
		if ( class_exists( 'Woocommerce' ) ) {
			return array( '_ctar', '_se', '_pp', '_woo' );
		} else {
			return array( '_ctar', '_se', '_pp' );
		}
	}
	function rollie_subtitle() {
		global $post;
		if ( class_exists( 'get_field' ) && get_field( 'rollie_alternate_subtitle', get_the_ID() ) ) {
			echo esc_html( get_field( 'rollie_alternate_subtitle', get_the_ID() ) );
		} elseif ( is_search() ) {
			esc_html_e( 'Search', 'rollie' );
		} elseif ( is_category() ) {
			esc_html_e( 'Category', 'rollie' );
		} elseif ( is_tag() ) {
			esc_html_e( 'Tag', 'rollie' );
		} elseif ( is_author() ) {
			esc_html_e( 'Author', 'rollie' );
		} elseif ( is_year() ) {
			esc_html_e( 'Year', 'rollie' );
		} elseif ( is_month() ) {
			esc_html_e( 'Month', 'rollie' );
		} elseif ( is_day() ) {
			esc_html_e( 'Day', 'rollie' );
		} elseif ( is_tax( 'post_format' ) ) {
			esc_html_e( 'Posts', 'rollie' );
		} elseif ( is_post_type_archive() ) {
			echo post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			echo esc_html( $tax->labels->singular_name );
		} elseif ( ! empty( $post->post_parent ) && get_the_title( $post->post_parent ) ) {
			echo esc_html( get_the_title( $post->post_parent ) );
		} else {
			echo esc_html( get_bloginfo( 'name' ) );
		}
	}

	function rollie_title() {
		if ( class_exists( 'Woocommerce' ) && is_woocommerce() && apply_filters( 'woocommerce_show_page_title', true ) ) {
			woocommerce_page_title();
		} elseif ( is_search() ) {
			global $wp_query;
			if ( have_posts() ) {
				echo '<div class="text-uppercase h2 d-inline-block" ><p class="font-weight-normal">(' . esc_html( $wp_query->found_posts ) . ') ' . esc_html__( 'Results for:', 'rollie' ),' <i>' . get_search_query() . '</i></div>';
			} else {
				echo '<div class="text-uppercase h2 d-inline-block" ><p class="font-weight-normal"><i>' . get_search_query() . '<i></div>';
			}
		} elseif ( is_category() ) {
			echo single_cat_title( '', false );
		} elseif ( is_tag() ) {
			echo single_tag_title( '', false );
		} elseif ( is_author() ) {
			$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
			echo esc_html( $rollie_author->nickname );
		} elseif ( is_year() ) {
			echo get_the_date( _x( 'Y', 'yearly archives date format', 'rollie' ) );
		} elseif ( is_month() ) {
			echo get_the_date( _x( 'F Y', 'monthly archives date format', 'rollie' ) );
		} elseif ( is_day() ) {
			echo get_the_date( _x( 'F j, Y', 'daily archives date format', 'rollie' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				esc_html_e( 'Asides', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				esc_html_e( 'Galleries', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				esc_html_e( 'Images', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				esc_html_e( 'Videos', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				esc_html_e( 'Quotes', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				esc_html_e( 'Links', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				esc_html_e( 'Statuses', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				esc_html_e( 'Audio', 'rollie' );
			}
		} elseif ( is_post_type_archive() ) {
			echo post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			echo single_term_title( '', false );
		} elseif ( is_404() ) {
			esc_html_e( '404 Page Not Found', 'rollie' );
		} else {
			the_title();
		}
	}

	function rollie_get_embedded_media( $type = array() ) {
		$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
		$embed   = get_media_embedded_in_content( $content, $type );
		if ( in_array( 'audio', $type ) ) {
			$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
		} else {
			$output = $embed[0];
		}
		return $output;
	}

	function rollie_excerpt( $show_if_field_empty = true ) {
		if ( class_exists( 'Woocommerce' ) && is_woocommerce() ) {
			do_action( 'woocommerce_archive_description' );
		} elseif ( is_category() && function_exists( 'get_field' ) ) {
			echo esc_html( get_field( 'category_excerpt', get_queried_object_id() ) );
		} elseif ( is_author() ) {
			$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
			echo esc_html( $rollie_author->description );
		} elseif ( $show_if_field_empty || has_excerpt() ) {
			the_excerpt();
		}

	}
	function rollie_embl_titles() {
		if ( 1 == get_theme_mod( 'rollie_embl_titles', 0 ) ) {
			return ' rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_t ';
		}
		if ( 2 == get_theme_mod( 'rollie_embl_titles', 0 ) ) {
			return ' rollie_fancy_line rollie_fancy_line_t rollie_fancy_line_horizontal ';
		} else {
			return '';
		}
	}
	function rollie_embl_subtitles( $right = false ) {
		if ( 1 == get_theme_mod( 'rollie_embl_subtitles', 1 ) ) {

			if ( $right ) {
				return ' rollie_fancy_line rollie_fancy_line_vertical_r';
			} else {
				return '  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_s ';
			}
		}
		if ( 2 == get_theme_mod( 'rollie_embl_subtitles', 1 ) ) {
			return ' rollie_fancy_line  rollie_fancy_line_horizontal rollie_fancy_line_s ';
		} else {
			return '';
		}
	}

	function rollie_embl_navbar() {
		if ( 1 == get_theme_mod( 'rollie_embl_navbar', 2 ) ) {
			return ' rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_n ';
		}
		if ( 2 == get_theme_mod( 'rollie_embl_navbar', 2 ) ) {
			return ' rollie_fancy_line rollie_fancy_line_n rollie_fancy_line_horizontal';
		} else {
			return '';
		}
	}

	function rollie_embl_footer() {
		if ( 1 == get_theme_mod( 'rollie_embl_footer', 2 ) ) {
			return '  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_f ';
		}
		if ( 2 == get_theme_mod( 'rollie_embl_footer', 2 ) ) {
			return ' rollie_fancy_line  rollie_fancy_line_horizontal rollie_fancy_line_f ';
		} else {
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
	function rollie_get_menu_object_by_registered_slug( $menu_slug ) {

		$menu_items = array();
		$locations  = get_nav_menu_locations();
		if ( ! empty( $locations ) && ! isset( $locations[ $menu_slug ] ) ) {
			$menu       = get_term( $locations[ $menu_slug ] );
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
		$rollie_output   = '';
		$rollie_title    = '';
		$rollie_subtitle = '';

		if ( is_category() ) {
			$rollie_title    = __( 'Category', 'rollie' );
			$rollie_subtitle = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$rollie_title    = __( 'Tag', 'rollie' );
			$rollie_subtitle = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$rollie_title    = __( 'Author', 'rollie' );
			$rollie_subtitle = get_the_author();
		} elseif ( is_year() ) {
			$rollie_title    = __( 'Year', 'rollie' );
			$rollie_subtitle = get_the_date( _x( 'Y', 'yearly archives date format', 'rollie' ) );
		} elseif ( is_month() ) {
			$rollie_title    = __( 'Month', 'rollie' );
			$rollie_subtitle = get_the_date( _x( 'F Y', 'monthly archives date format', 'rollie' ) );
		} elseif ( is_day() ) {
			$rollie_title    = __( 'Day', 'rollie' );
			$rollie_subtitle = get_the_date( _x( 'F j, Y', 'daily archives date format', 'rollie' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			$rollie_title = __( 'Posts', 'rollie' );
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$rollie_subtitle = __( 'Asides', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$rollie_subtitle = __( 'Galleries', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$rollie_subtitle = __( 'Images', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$rollie_subtitle = __( 'Videos', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$rollie_subtitle = __( 'Quotes', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$rollie_subtitle = __( 'Links', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$rollie_subtitle = __( 'Statuses', 'rollie' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$rollie_subtitle = __( 'Audio', 'rollie' );
			}
		} elseif ( is_post_type_archive() ) {
			$rollie_title    = __( 'Archives', 'rollie' );
			$rollie_subtitle = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			// Taxonomy singular name.
			$rollie_title = sprintf( __( '% 1$s', 'rollie' ), $tax->labels->singular_name );
			// Current taxonomy term.
			$rollie_subtitle = sprintf( __( '% 1$s', 'rollie' ), single_term_title( '', false ) );
		} else {
			$rollie_title = __( 'Archives', 'rollie' );
		}

		if ( ! empty( $rollie_title ) ) {
			$rollie_output .= '<div class="rollie_title_text_color">';
			$rollie_output .= esc_html( $rollie_title );
			$rollie_output .= '</div>';
		}
		if ( ! empty( $rollie_subtitle ) ) {
			$rollie_output                   .= '<div class="rollie_parent_title rollie_second_title_ppr  rollie_f_headings rollie_f_headings_h2 rollie_category_title_text_color">';
			( is_author() ) ? $rollie_output .= '<span class="vcard">' . $rollie_subtitle . '</span>' : $rollie_output .= esc_html( $rollie_subtitle );
			$rollie_output                   .= '</div>';
		}
		return apply_filters( 'get_the_archive_title', $rollie_output );
	}

	function rollie_remove_duplicates_from_multidimension_array( $src ) {
		$output = array_map(
			'unserialize',
			array_unique( array_map( 'serialize', $src ) )
		);
		return $output;
	}

	function get_string_between( $string, $start, $end ) {
		$string = ' ' . $string;
		$ini    = strpos( $string, $start );
		if ( ! $ini ) {
			return '';
		}
		$ini += strlen( $start );
		$len  = strpos( $string, $end, $ini ) - $ini;
		return substr( $string, $ini, $len );
	}

	function rollie_text_align_f( $align ) {
		switch ( $align ) {
			case 1:
				return 'text-align:left;';
			break;
			case 2:
				return 'text-align:center;';
			break;
			case 3:
				return 'text-align:justify;';
			break;
			case 4:
				return 'text-align:right;';
			break;
			default:
				return '';
		}
	}
