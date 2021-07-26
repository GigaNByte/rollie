<?php

function ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Rollie Forestry Industry Demo',
			'categories'                   => array( 'Forestry', 'Wood', 'Industry', 'Comercial', 'Nature' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.xml',
			// 'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.dat',
			'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'presets/rollie-forestry.jpg',
			'import_notice'                => __( 'Importing presets should have be done BEFORE adding any pages or content to wordpress ', 'rollie' ),
		),
		array(
			'import_file_name'         => 'Empty',
			'import_notice'            => __( 'This is dummy preset beacause plugin requires two presets to display previev images', 'rollie' ),
			'import_preview_image_url' => 'empty',
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_before_content_import( $selected_import ) {
	if ( 'Rollie Forestry Industry Demo' === $selected_import['import_file_name'] ) {
		// before the content import starts
		// replaces urls in preset files
		$rollie_dat = file_get_contents( trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.dat' );
		$rollie_dat = str_replace( 'http://localhost/wordpress/wp-content/themes/rollie_2/', trailingslashit( get_template_directory_uri() ) . 'presets/images/', $rollie_dat );

		file_put_contents( trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.dat', $rollie_dat );

		$xml_external_path = trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2019-02-18.xml';
		$xml               = simplexml_load_file( $xml_external_path );
		$searches          = array( 'http://localhost/wordpress/wp-content/themes/rollie_2/' );
		$replacements      = array( trailingslashit( get_template_directory() ) );

		$newXml = simplexml_load_string( str_replace( $searches, $replacements, $xml->asXml() ) );
		$newXml->asXml( $xml_external_path );
	}
}
add_action( 'ocdi/before_content_import', 'ocdi_before_content_import' );


function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$top_menu    = get_term_by( 'name', 'Top menu', 'nav_menu' );
	$cat_menu    = get_term_by( 'name', 'Category swipe menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'footer menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'rollie_top_menu'      => $top_menu->term_id,
			'rollie_cat_swap_menu' => $cat_menu->term_id,
			'Footer_Menu'          => $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Rollie Forestry & Co.' );
	$blog_page_id  = get_page_by_title( 'News' );

	update_option( 'show_on_front', '$front_page_id->ID' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
