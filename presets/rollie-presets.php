<?php

function ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Rollie Forestry Industry Demo',
			'categories'                   => array( 'Forestry', 'Wood', 'Industry', 'Comercial', 'Nature' ),
			'local_import_file'            => get_template_directory() . '/presets/rollie-forestry-2021-08-06.xml',
			'local_import_widget_file'     => get_template_directory() . '/presets/rollie-forestry-2021-08-06.wie',
			'local_import_customizer_file' => get_template_directory() . '/presets/rollie-forestry-2021-08-06.dat',
			'import_preview_image_url'     => get_template_directory_uri() . '/presets/rollie-forestry-2021-08-06.jpg',
			'import_notice'                => __( 'Importing presets should have be done BEFORE adding any pages or content to Wordpress Delete all wordpress default pages and posts before importing.', 'rollie' ),
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_before_content_import( $selected_import ) {
	if ( 'Rollie Forestry Industry Demo' === $selected_import['import_file_name'] ) {
		// before the content import starts
		 // replaces urls in preset files
		 /*
		$rollie_dat = file_get_contents( get_template_directory() . '/presets/rollie-forestry-2021-08-06.dat' );
		$rollie_dat = str_replace( 'http://localhost/wp-content/themes', get_template_directory_uri() . '/presets/images/', $rollie_dat );
		file_put_contents( trailingslashit( get_template_directory() ) . 'presets/rollie-forestry-2021-08-06.dat', $rollie_dat );
		*/
		$xml_external_path = trailingslashit( get_template_directory_uri() ) . 'presets/rollie-forestry-2021-08-06.xml';
		$xml               = simplexml_load_file( $xml_external_path );
		$searches          = array( 'http://localhost/wp-content/themes/rollie/' );
		$replacements      = array( trailingslashit( get_template_directory() ) );

		$newXml = simplexml_load_string( str_replace( $searches, $replacements, $xml->asXml() ) );
		$newXml->asXml( $xml_external_path );
	}
}
add_action( 'ocdi/before_content_import', 'ocdi_before_content_import' );

function ocdi_change_time_of_single_ajax_call() {
	return 10;
}
add_filter( 'ocdi/time_for_one_ajax_call', 'ocdi_change_time_of_single_ajax_call' );

function ocdi_after_import_setup() {
	// Assign menus to their locations.
	$top_menu          = get_term_by( 'name', 'Top menu', 'nav_menu' );
	$top_icons_menu    = get_term_by( 'name', 'Navbar Icons', 'nav_menu' );
	$footer_menu       = get_term_by( 'name', 'Fotter Menu', 'nav_menu' );
	$footer_small_menu = get_term_by( 'name', 'Fotter small menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'rollie_top_menu'               => $top_menu->term_id,
			'rollie_top_menu_icons'         => $top_icons_menu->term_id,
			'rollie_footer_menu_bottom_bar' => $footer_small_menu->term_id,
			'rollie_footer_menu'            => $footer_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Rollie Forestry & Co.' );
	$blog_page_id  = get_page_by_title( 'Forestry News' );
	update_option( 'blogname', 'Rollie Forestry.' );
	update_option( 'blogdescription', '' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
