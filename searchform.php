<?php  






require_once ABSPATH . 'wp-admin/includes/plugin.php';


if ( is_plugin_active( 'better-font-awesome/better-font-awesome.php' ) ) {
	$rollie_search_icon = '<i class="fas fa-search"></i>';

}

if ( empty( $rollie_id ) ) {
	$rollie_id = 0;
}
?>






<form id="rollie_form_<?php echo esc_html( $rollie_id ); ?>" role="search" method="get" required="required" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class=" rollie_search_form_shadow d-flex  ">
		<input form="rollie_form_<?php echo esc_html( $rollie_id ); ?>"  name="s"  type="text" autocomplete="off" value="<?php echo get_search_query(); ?>" class="rollie_search_input  rollie_form_input form-control-default rollie_f_b_f  " >
		<button form="rollie_form_<?php echo esc_html( $rollie_id ); ?>" class="rollie_search_button rollie_form_input btn   "  type="submit">
			<?Php echo $rollie_search_icon; ?>
		</button>

	</div>


</form>
<?php $rollie_id++; 
?>
