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
$rollie_img_data = array(
new Rollie_Image_Size('header',__('Header Images Sizes','rollie'),'',array(
	'lg'=>array('w'=>1920,'h'=>1080,'crop'=>true,'size_label' =>__('Large Sized','rollie'),'size_name'=>'rollie_l'),
	'md'=>array('w'=>1336,'h'=>768,'crop'=>true,'size_label' =>__('Medium Sized','rollie'),'size_name'=>'rollie_m'),
	'sm'=>array('w'=>1024,'h'=>768,'crop'=>true,'size_label' =>__('Small Sized','rollie'),'size_name'=>'rollie_s'),
	'xs'=>array('w'=>414,'h'=>736,'crop'=>true,'size_label' =>__('Tiny Sized','rollie'),'size_name'=>'rollie_xs'),
)), 

new Rollie_Image_Size('thumbnail',__('Thumbnail Images Sizes','rollie'),'',array(
	'lg'=>array('w'=>768,'h'=>0,'crop'=>true,'size_label' =>__('Large Sized','rollie'),'size_name'=>'rollie_l_thumb'),
	'sm'=>array('w'=>1080,'h'=>0,'crop'=>true,'size_label' =>__('Medium Sized','rollie'),'size_name'=>'rollie_m_thumb'),
	'xs'=>array('w'=>414,'h'=>0,'crop'=>true,'size_label' => __('Small Sized','rollie'),'size_name'=>'rollie_s_thumb'),
)),
);
$rollie_border_data = array(
'sections'=> new Rollie_Border('sections','rollie_borders_section',__('Global Border Settings','rollie'),__('This control sets border settings for elements which has no assigned customizer controls like Top Navbar Menu Items','rollie')),
'tables'=> new Rollie_Border('tables','rollie_borders_section',__('Tables, Comments & Page Sections','rollie')),
'buttons'=> new Rollie_Border('buttons','rollie_buttons_section',__('Button Border','rollie')),
'inputs'=> new Rollie_Border('inputs','rollie_forms_inputs_section',__('Inputs Border','rollie')),
'images'=> new Rollie_Border('images','rollie_img_panel',__('Images Border','rollie'),'',true),
);

