<?php


$rollie_font_data = array(
new Rollie_Font('navbar', __( 'Navbar items ', 'rollie' ),array('.rollie_f_navbar'),array(
	"U" => array( "ignore"=>false),
	"ls" => array( "default" => 0.6),
	"align" => array( "default" => "center"),
)),
 new Rollie_Font('headings', __('Headings H1,H2', 'rollie'),array('.rollie_f_headings' ,'h1' ,'h2'),array(
	"U" => array( "ignore"=>false,'default'=>true),
	"ls" => array( "default" => 1.1),
	"h2_max" => array("ignore" =>false),
	"h2_min" => array("ignore" =>false),
	"max" => array( "default" => 42),
	"min" => array( "default" => 32),
	"align" => array( "default" => "center"),
)),
new Rollie_Font('subtitles', __( 'Subtitles H3,H4', 'rollie' ),array('.rollie_f_subtitles','h3','h4'),array(
	"U" => array( "ignore"=>false,'default'=>false),
	"ls" => array( "default" => 0.7),
	"max" => array( "default" => 32),
	"min" => array( "default" => 26),
	"h4_max" => array("ignore" =>false),
	"h4_min" => array("ignore" =>false),
	"align" => array( "default" => "center"),
)),
new Rollie_Font('main',__('Main theme font','rollie'), array('.rollie_f_main','body'),array(
	"disable_bold_italic" => array( "default" => false),
)),
new Rollie_Font('excerpt', __( 'Page and post excerpts','rollie'), array('.rollie_f_excerpt'), array(
	"disable_bold_italic" => array( "default" => false),
	"max" => array( "default" => 16),
	"min" => array( "default" => 16),
	"align" => array( "default" => "center"),
	"disable_bold_italic" => array( "default" => false),
)),

new Rollie_Font('b_f',__( 'Buttons and forms', 'rollie' ), array('.rollie_f_b_f'), array(
	"U" => array( "ignore"=>false,'default'=>true),
	"align" => array( "default" => "center"),
	"max" => array( "default" => 21),
	"min" => array( "default" => 19),
)),
new Rollie_Font('widget',__( 'Widget content', 'rollie'), array('.rollie_f_widget'),array(
	"disable_bold_italic" => array( "default" => false),
)),
new Rollie_Font('comment',__( 'Comments', 'rollie' ), array('.rollie_f_comment'),array(
)),

new Rollie_Font('footer',__( 'Footer items', 'rollie' ), array('.rollie_f_footer'),array(
	"U" => array( "ignore"=>false),
	"ls" => array( "default" => 0.6),
	"align" => array( "default" => "center"),
)),
new Rollie_Font('footer_sub',__( 'Footer captions and subitems', 'rollie'), array('.rollie_f_footer_sub'),array(
	"U" => array( "ignore"=>false),
	"ls" => array( "default" => 0.6),
	"max" => array( "default" => 14),
	"min" => array( "default" => 14),
	"alt_enable" => array( "default" => 2),
	"align" => array( "default" => "center"),
	"alt" => array( "default" => "'helvetica'"),
)),
new Rollie_Font('metainfo',__( 'Post metainfos', 'rollie' ),array('.rollie_f_meta'),array(
)),
);


