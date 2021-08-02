<?php
require_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( empty( $rollie_id ) ) {
	$rollie_id = 0;
}
$rollie_id++
?>
<form id="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" role="search" method="get" required="required" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="rollie_search_form_shadow d-flex">
		<input form="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" name="s"  type="text" autocomplete="off" value="<?php echo get_search_query(); ?>" class="rollie_search_input rollie_form_input form-control-default rollie_f_b_f" >	
		<button form="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" class="rollie_search_button rollie_form_input btn"  type="submit">
			<?Php
			if ( is_plugin_active( 'better-font-awesome/better-font-awesome.php' ) ) {
				?>
				<i class="fas fa-search"></i>
			<?php } ?>
		</button>
	</div>
</form>
