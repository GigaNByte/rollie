<?php
if ( empty( $rollie_id ) ) {
	$rollie_id = 0;
}
$rollie_id++
?>
<form id="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" role="search" method="get" required="required" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="rollie_search_form_shadow d-flex">
		<input form="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" name="s"  type="text" autocomplete="off" value="<?php echo get_search_query(); ?>" class="rollie_search_input rollie_form_input form-control-default rollie_f_b_f" >	
		<button form="<?php echo esc_attr( 'rollie_form_' . $rollie_id ); ?>" class="rollie_search_button rollie_form_input btn"  type="submit">
				<i class="fas fa-search"></i>
		</button>
	</div>
</form>
