<?php $unique_id = esc_attr( uniqid( 'search-form-' ) );






require_once ABSPATH . 'wp-admin/includes/plugin.php';


if ( is_plugin_active( 'better-font-awesome/better-font-awesome.php' ) ) {
	$rollie_search_icon = '<i class="fas fa-search"></i>';

}

if ( empty( $rollie_id ) ) {
	$rollie_id = 0;
}
?>




	
	
		<form id="rollie_form_<?php echo esc_html( $rollie_id ); ?>" role="search" method="get" required="required" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group rollie_search_form_shadow  ">
   <input required form="rollie_form_<?php echo esc_html( $rollie_id ); ?>" id="<?php echo $unique_id; ?>" name="s"  type="text" autocomplete="off" class="form-control rollie_search_input_m_1 rollie_form_input form-control-default rollie_f_b_f  rollie_search_input" >
	<button form="rollie_form_<?php echo esc_html( $rollie_id ); ?>" class="btn rollie_search_button_m_1  "  type="submit">
		<?Php echo $rollie_search_icon; ?>
	</button>

</div>
</form>

<?php $rollie_id++; ?>
