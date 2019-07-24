<?php



$rollie_bb_h1 = '';
$rollie_bb_ex = ''; 

$rollie_header_class = '';

if(is_author()){
$rollie_author = get_user_by( 'slug', get_query_var( 'author_name' ) );
}



switch (get_theme_mod('rollie_header_ex_style'.rollie_post_page_template_prefix(),4)) {

  	  case 2:
 		$rollie_bb_h1 .= ' offset-0 col-6 offset-md-1 col-md-5 ';
		$rollie_bb_ex .= ' col-6 offset-md-0 col-md-5 '; 
        break;
       case 3:
  		$rollie_bb_h1 .= ' offset-0 col-12 offset-md-1 col-md-10 ';
		$rollie_bb_ex .= ' offset-0 col-12 offset-md-1 col-md-10 '; 
        break; 
           case 4://responsive
  		$rollie_bb_h1 .= ' offset-0 col-12 offset-md-1 col-md-5 ';
		$rollie_bb_ex .= ' offset-0 col-12 offset-md-0 col-md-5 '; 
        break;    
} 
if (get_theme_mod('rollie_header_full_width'.rollie_post_page_template_prefix(),true) == false ){
$rollie_bb_h1 = 'd-inline-block';
$rollie_header_class .= ' d-inline-block ';
$rollie_bb_ex = 'd-flex'; 

}else{
	$rollie_header_class .= ' row ';
}
switch (get_theme_mod('rollie_header_h_align'.rollie_post_page_template_prefix(),3)) {
    case 1://top
    $rollie_header_class .=' rollie_h_top ';
        break;
    case 2://center
      $rollie_header_class .=' rollie_h_center rollie_flex_text_center' ; 
        break;
    case 3://bottom
   $rollie_header_class .=' rollie_h_bottom ';
        break;
} 

switch (get_theme_mod('rollie_header_v_align'.rollie_post_page_template_prefix(),3)) {
    case 1:
    $rollie_header_class .=' rollie_v_left ';
        break;
    case 2:
      $rollie_header_class .=' rollie_v_center ' ; 
        break;
    case 3:
   $rollie_header_class .=' rollie_v_right ';
        break;
}

?>
<header class=" position-absolute p-4 rollie_title_bg_color <?php echo $rollie_header_class;?>">

<?php if(is_author()){ ?>
		<div class="col-6 col-md-3  rollie_flex_text_center">
			<?php echo get_avatar( $rollie_author->ID, '', '', '', array( 'class' => 'float-right' ) ); ?>
		</div>
<?php

 } 
			?>
			
			<div class="<?php echo rollie_embl_titles().' '.$rollie_bb_h1;?>  rollie_f_headings rollie_title_text_color ">
				<h2 class="rollie_parent_title rollie_below_js rollie_f_headings  rollie_category_title_text_color "><?php rollie_subtitle() ?></h2>
				<h1> <?php rollie_title()?></h1>
			
			</div>
			<div class="<?php echo $rollie_bb_ex ; ?> rollie_f_excerpt_s  rollie_subtitle_text_color">
				
				<?php 
				if (get_theme_mod('rollie_header_full_width'.rollie_post_page_template_prefix(),true) == false) echo "<div class='rollie_w_0'>";
				rollie_excerpt();
				if (get_theme_mod('rollie_header_full_width'.rollie_post_page_template_prefix(),true) == false) echo "</div>";
				?>	

		
	</div>
</header>