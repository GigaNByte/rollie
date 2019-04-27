<?php
/*
1.General
2.MyAccount
3.Orders Table
4.Orders table Query Snipets
5.Cart
6.Functions 
*/
/* My orders Table*/


//query_filtering
//disable stylesheets
add_filter( 'woocommerce_enqueue_styles', 'rollie_dequeue_styles' );
function rollie_dequeue_styles( $enqueue_styles ) {// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	unset( $enqueue_styles['woocommerce'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}


function rollie_shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count,
       
    ) );
    return ob_get_clean();
}
add_shortcode('rollie_my_orders', 'rollie_shortcode_my_orders');

add_filter( 'woocommerce_my_account_my_orders_query', 'rollie_my_orders_query' );
function rollie_my_orders_query($args){

	if( is_wc_endpoint_url('completed') )  $args['post_status'] = array('wc-completed');
	elseif( is_wc_endpoint_url('on-hold') )  $args['post_status'] = array('wc-on-hold','wc-pending');
	elseif( is_wc_endpoint_url('processing') )  $args['post_status'] = array('wc-processing');
	elseif( is_wc_endpoint_url('refunded') )  $args['post_status'] = array('wc-refunded');
	elseif( is_wc_endpoint_url('canceled') )  $args['post_status'] = array('wc-canceled','wc-failed');
	return $args;
}


// 1. Register new endpoint to use for My Account page
 
function rollie_add_endpoint() {
add_rewrite_endpoint( 'recievied', EP_ROOT | EP_PAGES );
add_rewrite_endpoint( 'on-hold', EP_ROOT | EP_PAGES );
add_rewrite_endpoint( 'processing', EP_ROOT | EP_PAGES );
add_rewrite_endpoint( 'completed', EP_ROOT | EP_PAGES );
add_rewrite_endpoint( 'canceled', EP_ROOT | EP_PAGES );
add_rewrite_endpoint( 'refunded', EP_ROOT | EP_PAGES );

}
 
add_action( 'init', 'rollie_add_endpoint' );
 
 
// 2. Add new query var
 
function rollie_query_vars( $vars ) {
     foreach (["completed",'on-hold','refunded','processing','canceled'] as $e) {
        $vars[$e] = $e;
    }
    return $vars;
}
 
add_filter( 'woocommerce_get_query_vars', 'rollie_query_vars' );

 

// 3. Insert the new endpoint into the My Account menu
 /*
function rollie_add_my_account_menu_items( $items ) {
    $items['completed'] = __('Completed','woocommerce');
    $items['processing'] = __('Processing','woocommerce')." ".__('Pending','woocommerce');
    $items['on-hold'] = __('On-hold','woocommerce');
   	$items['refunded'] = __('Refunded','woocommerce');
   	$items['canceled'] = __('Canceled','woocommerce')." ".__('Failed','woocommerce');
    return $items;
}
 
add_filter( 'woocommerce_account_menu_items', 'rollie_add_my_account_menu_items' );
 
 */

// 4. Add content to the new endpoint
 
function rollie_my_orders_query_content() {
	rollie_woo_orders_table_sort_menu();
if( is_wc_endpoint_url('completed') )  echo "<h2 class='rollie_sibling_d_none'>".__( 'Completed', 'woocommerce' )."</h2>";
	elseif( is_wc_endpoint_url('on-hold') ) echo "<h2 class='rollie_sibling_d_none'>".__( 'On-hold', 'woocommerce' )." & ".__( 'Pending', 'woocommerce' )."</h2>" ;
	elseif( is_wc_endpoint_url('processing') ) echo  "<h2 class='rollie_sibling_d_none'>".__( 'Processing', 'woocommerce' )."</h2>";
	elseif( is_wc_endpoint_url('refunded') ) echo  "<h2 class='rollie_sibling_d_none'>".__( 'Refunded', 'woocommerce' )."</h2>";
	elseif( is_wc_endpoint_url('canceled') ) echo "<h2 class='rollie_sibling_d_none'>".__( 'Canceled', 'woocommerce' )." & ".__( 'Failed', 'woocommerce' )."</h2>" ;
echo do_shortcode( '[rollie_my_orders]' );

}

foreach ( array('completed','processing','on-hold','refunded','canceled') as $key => $value)
{
add_action( 'woocommerce_account_'.$value.'_endpoint', 'rollie_my_orders_query_content' );
}

    







function rollie_woo_order_status_icon($rollie_woo_order_status,$rollie_is_downloadable=false,$url=false,$animated = true) 
{
	$rollie_woo_order_status_icon = '';
	switch($rollie_woo_order_status)
		{
	case 'pending':
	  $rollie_woo_order_status_icon = 'fas fa-sync  ' ;
	  if ($animated)  $rollie_woo_order_status_icon .= 'fa-pulse';
 	break;		
	case 'on-hold':
	  $rollie_woo_order_status_icon = 'fas fa-hand-holding-usd    ' ;
 	break;							 	
 	case 'processing':
		if ($rollie_is_downloadable){
 		 $rollie_woo_order_status_icon = 'fas fa-sync';
 		 if ($animated)  $rollie_woo_order_status_icon .= ' fa-pulse animated ';
		}
		else{
			$rollie_woo_order_status_icon = 'fas fa-shipping-fast    ';
			 if ($animated)  $rollie_woo_order_status_icon .= ' faa-passing animated ';
		}

 	break;
 	case 'completed':
 		if ($rollie_is_downloadable){
			$rollie_woo_order_status_icon = 'fas fa-download ' ;
		}
		else{
			 $rollie_woo_order_status_icon = 'fas fa-check ';	
			  if ($animated)  $rollie_woo_order_status_icon .= ' faa-pulse animated faa-slow';
		}

	break; 
	case 'canceled':
	  $rollie_woo_order_status_icon = 'fas fa-times '; 
 	break;
 	case 'refunded':
	  $rollie_woo_order_status_icon = 'far fa-handshake'; 
 	break;
	case 'failed':
	  $rollie_woo_order_status_icon = 'fas fa-exclamation-triangle faa-slow'; 
	    if ($animated)  $rollie_woo_order_status_icon .= ' flash  faa-slow';
 	break;
 	default:
 	  $rollie_woo_order_status_icon = 'fas fa-dolly-flatbed'; 
 	break;
			
		}
		if ($url)
		{
	return  "<a href=".esc_url($url) ."><i class= 'm-3 rollie_woo_order_status_icon  ".$rollie_woo_order_status_icon."' ></i></a>" ;
		}
		else
			return "<i class= 'm-3 rollie_woo_order_status_icon  ".$rollie_woo_order_status_icon."' ></i>";
}

function rollie_woo_orders_custom_column( $columns ) {

	$rollie_line='';
	$rollie_line_r='';


	    unset( $columns['order-number'] );
        unset( $columns['order-date'] );
        unset( $columns['order-status'] );
        unset( $columns['order-total'] );
       unset( $columns['order-actions'] );
	$columns ['rollie_order-custom_column'] =  __('Orders','woocommerce');

	//$columns = array('rollie_order-custom_column' => $columns['rollie_order-custom_column']) + $columns;
    return $columns;
}
add_filter( 'woocommerce_my_account_my_orders_columns', 'rollie_woo_orders_custom_column' );

function rollie_woo_order_custom_column( $order ) {
       	if ( get_theme_mod ('rollie_embl_subtitles' ,1 ) == 1){
			$rollie_line='  rollie_fancy_line rollie_fancy_line_vertical rollie_fancy_line_n ';
			$rollie_line_r ='rollie_fancy_line rollie_fancy_line_vertical_r'  ;
		} 
		 if ( get_theme_mod ('rollie_embl_subtitles' ,1) == 2){
			$rollie_line=' rollie_fancy_line  rollie_fancy_line_horizontal rollie_fancy_line_n ';

		} 
?>

<div class='rollie_woo_order_table rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad '>
	<a href=" <?php echo esc_url($order->get_view_order_url()); ?>	" >
	<div class='  rollie_woo_order_table_banner    '>		

	
		<?php $rollie_o_date = $order->get_date_created()->date_i18n('Y-m-d')?>
		<div class="col-12 d-flex">
			<div class='col-8 text-left'><?php echo  __('Order Date','woocommerce').': '.$rollie_o_date?></div>
				<div class='col-4 text-right'><?php echo __('ID','wordpress').': #'.$order->get_order_number() ?></div>
		</div>
		
	</div>
	</a>
	<div class=' row  m-0 p-0 rollie_woo_order_table  rollie_woo_border_color_custom_column '>
	
			<div class='col-12'>
					<div class='<?php echo $rollie_line;?>'>
			<?Php	foreach( $order->get_items() as $item_id => $item ){
					$product = $item->get_product(); 
			?>
	
				<div class='row rollie_woo_order_item_row  rollie_woo_border_color_custom_column '>
				
					<div class='col-4 col-md-2  rollie_woo_order_table_thumbnail'><?php echo $product->get_image('woocommerce_gallery_thumbnail');?></div>
					<div class='col-8 col-md-10'>
						<div class='row m-0 '>

							<div class='col-md-8 col-12 text-left'><?php echo  $product_name = $item->get_name(); ?></div>
							<div class='col-md-4 col-12 text-center rollie_wrap_n'> <?php echo wc_price( $item->get_total() );?><span class='font-weight-bold'> x </span><?php echo $item->get_quantity();  ?></div>
							
						</div>
					
					</div>
				</div>
			<?php } ?>
				</div>
				<div class='row rollie_woo_order_summary_row  rollie_woo_border_color_custom_column <?php echo $rollie_line_r;?>'>		
						<div class='col-4 small text-center rollie_flex_text_center'> 
							<div> 	


								<?php  echo 	rollie_woo_order_status_icon($order->get_status(),$order->has_downloadable_item(),$order->get_view_order_url())?>
								<div class="rollie_line_h_1 pt-1"><?php echo  esc_html( wc_get_order_status_name( $order->get_status() ) );  ?></div>
								<div class="rollie_line_h_1 "><?php if($order->get_status()  == "completed" && $order->has_downloadable_item()) _e('Downloadable','woocommerce')  ?></div>
							</div>	
						</div>

						<div class='col-8 text-right '><div class='small'> <?php echo __('Shipping:','woocommerce').": ".wc_price($order->get_shipping_total()); ?></div>
							<span><?php _e('Total','woocommerce')?></span>
							 <h4 class='text-right'><?php echo wc_price($order->get_total());?></h4>
						</div>

				</div>
		</div>

			<div class='rollie_woo_order_actions p-0 m-0 col-12 rollie_flex_text_center'>
				<?php 
				$actions = wc_get_account_orders_actions( $order );

				if ( ! empty( $actions ) ) {
					foreach ( $actions as $key => $action ) {
						echo '<a href="' . esc_url( $action['url'] ) . '" class="inline-block  rollie_button  mx-auto my-1 rollie_f_b_f btn ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
					}
				}
				?>
			</div>	
				
</div>		
<?php
}
    add_action( 'woocommerce_my_account_my_orders_column_rollie_order-custom_column', 'rollie_woo_order_custom_column' );


//Counts how many orders have been ordered 
    function rollie_get_total_orders_e ($status)
    {
    		if (class_exists('WP_CountUp_JS_Main')){
		 echo do_shortcode('[countup start="0" end="'.rollie_get_total_orders($status).'" decimals="0" duration="5"]');
			}
			else{
			echo rollie_get_total_orders($status);
		}
    }
 function rollie_get_total_orders($status) {

    $customer_orders = wc_get_orders( array(

        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
       	'post_status' => $status,
		'paginate' => true,     

    ) );
    return esc_html($customer_orders->total);
}

function rollie_woo_orders_table_sort_menu ()
{
	?>
<div class='row rollie_orders_sort_menu text-center mb-3'>

	<div class='col-6 col-md-4 col-xl-6 rollie_my_acc_nav_side <?php if (is_wc_endpoint_url('orders')) echo 'rollie_sort_orders_current';?>'  >	 
		<a href='<?php  echo wc_get_account_endpoint_url('orders') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto'>
				<h3>
					<?php	rollie_get_total_orders_e(array('wc-on-hold','wc-pending', 'wc-processing' ,'wc-cancelled',' wc-refunded', 'wc-failed' ,'wc-completed', 'wc-refunded'))	?>
						
				</h3>
				<i class='fas fa-shopping-basket' ></i>
			</div>	
				<?php	echo '<div class="m-auto text-center">'.__( 'All', 'woocommerce' ).'</div>'; ?>
		</a>
	</div>


	<div class='col-6 col-md-4 col-xl-6 rollie_my_acc_nav_side 	<?php if (is_wc_endpoint_url('completed')) echo 'rollie_sort_orders_current';?>'  >
		<a href='<?php  echo wc_get_account_endpoint_url('completed') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto'>
				<h3><?php	rollie_get_total_orders_e(array('wc-completed'))	?></h3>
				<i class='fas fa-check'></i>
				
			</div>
			<?php echo "<div  class='m-auto text-center'>".__( 'Completed', 'woocommerce' )."</div>";	?>
		</a>
	</div>


	<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side <?php if (is_wc_endpoint_url('processing')) echo 'rollie_sort_orders_current';?> '  >
		<a href='<?php  echo wc_get_account_endpoint_url('processing') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto'>
				<h3><?php	rollie_get_total_orders_e(array('wc-processing'))	?></h3>
				<i class='fas fa-shipping-fast '  ></i>
			</div>	
			<?php echo "<div  class='m-auto text-center'>".__( 'Processing', 'woocommerce' )."</div>";	?>
			
		</a>
	</div>


	<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side <?php if (is_wc_endpoint_url('on-hold')) echo 'rollie_sort_orders_current';?>' >	
		<a href='<?php  echo wc_get_account_endpoint_url('on-hold') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto'>
				<h3><?php	rollie_get_total_orders_e(array('wc-on-hold','wc-pending'))	?></h3>
				<i class='fas  fa-sync'  ></i>
			</div>	
		<?php echo 	"<div  class='m-auto text-center'>". __( 'On-hold', 'woocommerce' ).' & '.__( 'Pending', 'woocommerce' )."</div>";	?>
				
		</a>
	</div>
	
	
	<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side <?php if (is_wc_endpoint_url('canceled')) echo 'rollie_sort_orders_current';?>' >	
		<a href='<?php  echo wc_get_account_endpoint_url('canceled') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto'>
				<h3>	<?php	rollie_get_total_orders_e(array('wc-canceled','wc-failed'))	?> </h3>
				<i class='fas fa-times'  ></i>
			</div>		
			<?php	echo "<div  class='m-auto text-center'>". __( 'Canceled', 'woocommerce' )." & ".__( 'Failed', 'woocommerce' )."</div>" ; 	?>
				
		</a>
	</div>

	
	<div class='col-6 col-md-4 col-xl-3 rollie_my_acc_nav_side <?php if (is_wc_endpoint_url('refunded')) echo 'rollie_sort_orders_current';?>' >
		<a href='<?php  echo wc_get_account_endpoint_url('refunded') ; ?>'>
			<div class='rollie_sort_orders_counter m-auto '>
				<h3>	<?php	rollie_get_total_orders_e(array('wc-refunded'))	?></h3>
				<i class='fas fa-handshake'  ></i>
			</div>
	
			<?php	echo "<div class='m-auto text-center'>".__( 'Refunded', 'woocommerce' )."</div>";	?>
		</a>
	</div>
	
</div>
<?php

}

add_action('woocommerce_before_account_orders','rollie_woo_orders_table_sort_menu');



function rollie_filter_woo_account_menu_item_classes( $classes, $endpoint ) { 




	if (get_theme_mod('rollie_woo_l_my_account_nav',1) == 1){


		$classes[] .= " col-6  ";	
		$classes[] .= " rollie_my_acc_nav_big_tiles ";
		$classes[] .= " col-lg-4  ";
	}
	elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 2){
	$classes[] .= " rollie_my_acc_nav_side ";

	}
	elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 3){
	$classes[] .= " rollie_my_acc_nav_wide ";
	}
	  return $classes; 
	}; 
	add_filter( 'woocommerce_account_menu_item_classes', 'rollie_filter_woo_account_menu_item_classes', 10, 2 ); 

	function rollie_action_woo_before_account_navigation ()
	{
		$rollie_actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ( $rollie_actual_link == get_permalink( get_option('woocommerce_myaccount_page_id') )) /*if is displayed dashboard page apply class that creates bigger tiles*/{
			$rollie_dash_class =" rollie_my_acc_dashboard ";
	}
	else{
		$rollie_dash_class = "";
	}	

	$rollie_current_user = wp_get_current_user();
	   if ( ! $rollie_current_user->exists() ) {
	       return;
	   }


		if (get_theme_mod('rollie_woo_l_my_account_nav',1) == 1){
	$rollie_class_c = ' rollie_my_acc_nav_big_tiles_c ';
	$rollie_class_c .= ' rollie_darker_main_color_h ';
	$rollie_user_info_class = " col-12 col-lg-3 ";
	}
	elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 2){
	$rollie_class_c = " rollie_my_acc_nav_side_c ";
	$rollie_class_c .= " col-5  ";
	$rollie_class_c .= " col-lg-4  ";
	$rollie_class_c .= ' rollie_darker_main_color_h ';
	$rollie_user_info_class = " col-12 ";
	}
	elseif (get_theme_mod('rollie_woo_l_my_account_nav',1) == 3){
	$rollie_class_c = " rollie_my_acc_nav_wide_c ";
	}
		echo "<div class='".$rollie_class_c.$rollie_dash_class."  rollie_my_acc_container rollie_f_b_f '>";
		echo 	"<figure class=' ".$rollie_user_info_class."  '>";
		echo 		"<img class='mx-auto d-block' src=".get_avatar_url( get_current_user_id()).">";
		echo 		"<figcaption class='pt-1'>";

					if (!empty($rollie_current_user->user_login)) {
					echo "<p><span class='rollie_my_acc_nav_login'>".$rollie_current_user->user_login." "."</span>";
					echo  "<span><a href=".wp_logout_url().">". __( 'Logout', 'woocommerce' )."</a></span></p>";
					}

					if (! empty($rollie_current_user->user_firstname)||!empty($rollie_current_user->user_lastname)) {
					echo "<p class='rollie_my_acc_nav_name'>".$rollie_current_user->user_firstname." ".$rollie_current_user->user_lastname."</p>";
					}

					if (! empty($rollie_current_user->user_email)){
					echo "<p class='rollie_my_acc_nav_email'>".$rollie_current_user->user_email."</p>";
					} 	
		echo 		"</figcaption>";
		

			echo "</figure>";
}

 add_action('woocommerce_before_account_navigation','rollie_action_woo_before_account_navigation');
 function rollie_action_woo_after_account_navigation ()
{
	echo "</div>";
}   

 add_action('woocommerce_after_account_navigation','rollie_action_woo_after_account_navigation');


function rollie_action_woo_account_content()
{

echo  "<div class='row p-0 m-0 h-100'>";
		$rollie_line='';
						if ( get_theme_mod ('rollie_embl_titles' ,0 ) == 1){
								$rollie_line=' rollie_fancy_line  rollie_fancy_line_vertical rollie_fancy_line_t ';
							} 
							 if ( get_theme_mod ('rollie_embl_titles' ,0) == 2){
								$rollie_line=' rollie_fancy_line rollie_fancy_line_t rollie_fancy_line_horizontal';
							} 
	

	echo "<div class='p-0 col-12 ".$rollie_line." rollie_f_headings rollie_title_text_color rollie_account_title' >";

	echo get_the_title();
	
	echo "</div>";

$rollie_remove_order_status_text_flag='';

if (is_wc_endpoint_url( 'view-order' ))	$rollie_remove_order_status_text_flag = 'rollie_remove_order_status_text_flag';
	echo "<div class='col-12 rollie_account_content ".$rollie_remove_order_status_text_flag."'>";


}



function rollie_action_woo_account_content_wraper_end()
{

echo "</div>";
echo "</div>";
}








  add_action ('woocommerce_account_content','rollie_action_woo_account_content',1);
  add_action ('woocommerce_account_content','rollie_action_woo_account_content_wraper_end',200);

function rollie_endpoint_titles( $title, $id ) {
	if ( is_wc_endpoint_url( 'canceled' ) && in_the_loop() ) { // add your endpoint urls
		$title =  __( 'Orders', 'woocommerce' ); // change your entry-title
	}
	elseif ( is_wc_endpoint_url( 'on-hold' ) && in_the_loop() ) {
		$title =  __( 'Orders', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'refunded' ) && in_the_loop() ) {
		$title =  __( 'Orders', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'Processing' ) && in_the_loop() ) {
		$title =  __( 'Orders', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'completed' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	
	}
	elseif ( is_wc_endpoint_url( 'edit-account' ) && in_the_loop() ) { 
		$title = __( 'Account Details', 'woocommerce' ); 
	}
	elseif ( is_wc_endpoint_url( 'dashboard' ) && in_the_loop() ) {
		$title = __( 'Dashboard', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'orders','downloads' ) && in_the_loop() ) {
		$title = __( 'Orders', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'downloads' ) && in_the_loop() ) {
		$title = __( 'Downloads', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ) {
		$title = __( 'Addresses', 'woocommerce' );
	}
	elseif ( is_wc_endpoint_url( 'payment-methods' ) && in_the_loop() ) {
		$title =__( 'Payment methods', 'woocommerce' );
	}
	return $title;
}
add_filter( 'the_title', 'rollie_endpoint_titles', 10, 2 );

//Cart

function rollie_woo_cart_total_content()
{
	echo "<div class='rollie_woo_cart_total rollie_woo_border_color_custom_column rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad col-12'>";
}
function rollie_woo_cart_content()
{
echo "<div class='rollie_woo_cart_content rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad'>";
}
function rollie_woo_cart_content_wraper_end()
{

echo "</div>";
}
function rollie_woo_order_review_content()
{
echo "<div class='rollie_woo_order_review_content rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad'>";
}

add_action('woocommerce_before_cart_table','rollie_woo_cart_content',1);
add_action('woocommerce_after_cart_table','rollie_woo_cart_content_wraper_end',200);
add_action('woocommerce_before_cart_totals','rollie_woo_cart_total_content',1);
add_action('woocommerce_after_cart_totals','rollie_woo_cart_content_wraper_end',200);
 add_action( 'woocommerce_checkout_before_order_review','rollie_woo_order_review_content' ,1);
    add_action( 'woocommerce_checkout_after_order_review','rollie_woo_cart_content_wraper_end',200);
function rollie_woo_cart_totals_order_total_html( $value)
{
	$value="<h4 class='rollie_f_subtitles_h4 '>".$value.'</h4>';
return  $value;
}
add_filter( 'woocommerce_cart_totals_order_total_html', 'rollie_woo_cart_totals_order_total_html', 10, 1 ); 

function rollie_woo_orders_pagination()
{
	$args = array('meta_value'  => get_current_user_id(),'paginate' => true);
	if( is_wc_endpoint_url('completed') )  $args['post_status'] = array('wc-completed');
	elseif( is_wc_endpoint_url('on-hold') )  $args['post_status'] = array('wc-on-hold','wc-pending');
	elseif( is_wc_endpoint_url('processing') )  $args['post_status'] = array('wc-processing');
	elseif( is_wc_endpoint_url('refunded') )  $args['post_status'] = array('wc-refunded');
	elseif( is_wc_endpoint_url('canceled') )  $args['post_status'] = array('wc-canceled','wc-failed');




 $customer_orders = wc_get_orders( $args ); 
 global $wp_query;

$paged = get_query_var('orders') ? get_query_var('orders') : 1 ;

rollie_pagination( $customer_orders->max_num_pages ,2,$paged,'orders' );
 
	
}
add_action('woocommerce_before_account_orders_pagination','rollie_woo_orders_pagination');
function rollie_woo_cart_item_thumbnail( $product_get_image, $cart_item, $cart_item_key ) { 
 
    return  "<div class='woocommerce_gallery_thumbnail'>".$product_get_image."</div>"; 
}; 

  
// add the filter 
add_filter( 'woocommerce_cart_item_thumbnail', 'rollie_woo_cart_item_thumbnail', 10, 3 );

function rollie_order_details($order)
{?>

<?php







 	$status = $order->get_status();
$step_0 ='';
$step_1 ='';
$step_2 ='';
$step_0_i = rollie_woo_order_status_icon('on-hold',false,false,false);
$step_1_i = rollie_woo_order_status_icon('processing',false,false,false);
$step_2_i = rollie_woo_order_status_icon('completed',false,false,false);

$step_1_str = __('Processing','woocommerce');



	if($status == 'cancelled'|| $status == 'failed')
	{
		$step_0 = 'rollie_error_color';
		$step_1 = 'rollie_muted_color';
		$step_2 = 'rollie_muted_color';
			$step_0_status= true;
			$step_1_status=false;  
			$step_2_status=false; 
		
	$step_0_i = rollie_woo_order_status_icon($status);

	}
	elseif ($status == 'pending' || $status == 'on-hold' )
	{
		$step_0 = 'rollie_success_color';
		$step_1 = 'rollie_muted_color';
		$step_2 = 'rollie_muted_color';
	
		$step_0_i =	rollie_woo_order_status_icon($status);	
		$step_1_i .= " rollie_muted_text_color ";
		$step_2_i .= " rollie_muted_text_color ";
		$step_0_status= true;
		$step_1_status=false;  
		$step_2_status=false; 
	}
	elseif  ( $status == 'processing'){
		

	$step_0 = 'rollie_success_color';
	$step_1 = 'rollie_success_color';
	$step_2 = 'rollie_muted_color';
	$step_1_i .= rollie_woo_order_status_icon($status);
	$step_2_i .= " rollie_muted_text_color ";
	$step_0_status= true;
	$step_1_status=true;  
	$step_2_status=false; 
	}
	elseif  ( $status == 'completed'|| $status =='refunded'){
	$step_0 = 'rollie_success_color';
	$step_1 = 'rollie_success_color';
	$step_2 = 'rollie_success_color';
	$step_0_status= true;
	$step_1_status=true;  
	$step_2_status=true; 
		$step_2_i .= rollie_woo_order_status_icon($status);


		
	}
	else 	//for suuum plugins
	{
	$step_0 = 'rollie_success_color';
	$step_1 = 'rollie_success_color';
	$step_2 = 'rollie_muted_color';
	$step_2_i .= " rollie_muted_text_color ";
	$step_0_status= true;
	$step_1_status=true;  
	$step_2_status=false; 
	}	
	
		$date_cr = $order->get_date_created();
		$date_paid = $order->get_date_paid();
		$date_completed = $order->get_date_completed();

	

	
if ($order->has_downloadable_item() &&  !$status =='refunded') $step_2_i = rollie_woo_order_status_icon($status,true,false,false);
?>

	<div class='container-fluid rollie_woo_order_progress px-0 py-3 '>

		<div class= 'row'>
			



			<h2 class='w-100'><?php _e('Order details','woocommerce');?></h2>




	
	<?php if( $order->get_status() == 'failed' || $order->get_status() == 'canceled'   ){
			$color_status = 'text-danger';
			}elseif ($order->get_status() == 'processing'||$order->get_status() == 'success'||$order->get_status() == 'refunded') {
				$color_status = 'text-success';
			}else{
			$color_status = 'text-warning';
			} ?>
<div class='order-describe text-center w-100 p-2 '>
<?php 

		echo substr( wp_kses_post( apply_filters( 'woocommerce_order_tracking_status', sprintf(
		__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
		'<span class="order-number">' . $order->get_order_number() . '</span>',
		'<span class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</span>',
		'<h4 class="order-status '. $color_status . '">' . wc_get_order_status_name( $order->get_status() ) . '</h4>'
	) ) ),0, -1);

?>
</div>
		<?php

	if($order->get_payment_method()=='bacs' && ($order->get_status() == 'pending' || $order->get_status() == 'on-hold')  ) {
			echo'<div class="col-12" >';
		 rollie_get_bacs_account_details_order();
		echo' </div>';
	}
	?>
			<h3 class='col-12 rollie_fancy_line '><?php echo  substr(__('Order status.','woocommerce'),0, -1)?></h3>
				<div class='rollie_woo_order_progress_bar  col-3 '><i class=" rollie_flex_text_center rollie_woo_order_status_icon fas fa-clipboard-list  "></i><hr class='rollie_success_color'></hr>
					<?php echo '<div>'.__('Order created','woocommerce').'</div>';
					if ($date_cr)	echo '<small>'.$date_cr->date_i18n().' '.$date_cr->date_i18n('h:m').'</small>';?>
				</div>

				<div class='rollie_woo_order_progress_bar col-3 <?php if (!$step_0_status  ) echo 'rollie_muted_text_color' ?> '><i class=' rollie_flex_text_center  <?php echo esc_html($step_0_i ) ?>'></i><hr class='<?Php echo  esc_html($step_0)?>'></hr>
				<?php 	 
					if($status != 'refunded'&&$status != 'completed'&& $status != 'processing'){
						echo wc_get_order_status_name($status);
				
					}
						 echo '<div>'.__('Payment','woocommerce').': '.'</div>';
						$payment =  wc_get_payment_gateway_by_order($order);
						if ($payment){
						echo '<div>'.$payment->get_method_title( ).'</div>';
						}
					
					
					
					if ($date_paid){
					
					echo '<small>'.$date_paid->date_i18n().' '.$date_paid->date_i18n('h:m').'</small>' ;
					}
							
				?>
				</div>
				
				<div class='rollie_woo_order_progress_bar col-3 <?php if (!$step_1_status) echo 'rollie_muted_text_color' ?> '><i class=' rollie_flex_text_center  <?php echo esc_html($step_1_i ) ?>'></i><hr class='<?Php echo esc_html($step_1)?>'></hr> <span><?php?></span>
					<?php 	echo '<div>'.__('Processing','woocommerce').'</div>' ?>
				</div>
				<div class='rollie_woo_order_progress_bar  <?php if (!$step_2_status) echo 'rollie_muted_text_color' ?> col-3'><i class=' rollie_flex_text_center  <?php echo esc_html($step_2_i ) ?>'></i><hr class='<?Php echo esc_html($step_2)?>'></hr>
			<?php 

		
				echo  '<div>'.wc_get_order_status_name($status).'</div>' ;
			if ($date_completed){
				echo '<small>'.$date_completed->date_i18n().' '.$date_completed->date_i18n('h:m').'</small>' ;
			}
		
			?>
				</div>	
	<?php			if ($status == 'completed') echo  '<div>'.$order->get_date_completed().'</div>' ; ?>
		</div>
	</div>

<div class="rollie_woo_order_table rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad ">


<?php

}
    add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form' ,10);
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');

add_action('woocommerce_order_details_before_order_table','rollie_order_details');
add_action('woocommerce_order_details_after_order_table','rollie_woo_cart_content_wraper_end');
add_filter( 'woocommerce_order_item_name', 'rollie_product_thumbnail_order_details', 20, 3 );
    // define the woocommerce_thankyou_order_received_text callback 

function rollie_get_bacs_account_details_order(){
	
	rollie_get_bacs_account_details_html();
}

    function rollie_woo_thankyou_order_received_text( $var, $order ) { 
        // make filter magic happen here... 
    $var = '<div class="rollie_thankyou_message text-center">'.'<div><i class="fas fa-check text-success rollie_thankyou_icon"></i></div>'.$var;

   
       
       $var .='</div>';
        return $var; 


    }; 
             
    // add the filter 
    add_filter( 'woocommerce_thankyou_order_received_text', 'rollie_woo_thankyou_order_received_text', 10, 2 ); 

function rollie_product_thumbnail_order_details( $item_name, $item, $is_visible ) {
    if( is_wc_endpoint_url( 'view-order' ) || is_wc_endpoint_url( 'order-received' )) {
        $product   = $item->get_product(); 
        $thumbnail = $product->get_image('woocommerce_gallery_thumbnail'); 
        if( $product->get_image_id() > 0 )
            $item_name = "<div class=' d-inline-block p-1 rollie_woo_order_table_thumbnail'>" . $thumbnail . '</div><div class="d-inline-block">' . $item_name.'</div>';
    }
    return $item_name;

}

function rollie_get_bacs_account_details_html( $echo = true ) {


    ob_start();

    $gateway    = new WC_Gateway_BACS();
    $country    = WC()->countries->get_base_country();
    $locale     = $gateway->get_country_locale();
    $bacs_info  = get_option( 'woocommerce_bacs_accounts');

    // Get sortcode label in the $locale array and use appropriate one
    $sort_code_label = isset( $locale[ $country ]['sortcode']['label'] ) ? $locale[ $country ]['sortcode']['label'] : __( 'Sort code', 'woocommerce' );


    ?>
    <div class="woocommerce-bacs-bank-details m-2">
    <h2 class="wc-bacs-bank-details-heading"><?php _e('Our bank details'); ?></h2>
   	 <div class=' rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad'>
    <?php

    if ( $bacs_info ) : foreach ( $bacs_info as $account ) :


    $account_name   = esc_attr( wp_unslash( $account['account_name'] ) );
    $bank_name      = esc_attr( wp_unslash( $account['bank_name'] ) );
    $account_number = esc_attr( $account['account_number'] );
    $sort_code      = esc_attr( $account['sort_code'] );
    $iban_code      = esc_attr( $account['iban'] );
    $bic_code       = esc_attr( $account['bic'] );
    ?>
    <h3 class="wc-bacs-bank-details-account-name"><?php echo $account_name; ?>:</h3>
    <ul class="wc-bacs-bank-details order_details bacs_details">
        <li class="bank_name"><?php _e('Bank'); ?>: <strong><?php echo $bank_name; ?></strong></li>
        <li class="account_number"><?php _e('Account number'); ?>: <strong><?php echo $account_number; ?></strong></li>
        <li class="sort_code"><?php echo $sort_code_label; ?>: <strong><?php echo $sort_code; ?></strong></li>
        <li class="iban"><?php _e('IBAN'); ?>: <strong><?php echo $iban_code; ?></strong></li>
        <li class="bic"><?php _e('BIC'); ?>: <strong><?php echo $bic_code; ?></strong></li>
    </ul>
    <?php endforeach; endif; ?>
    	</div>
    </div>
    <?php


    $output = ob_get_clean();

    if ( $echo )
        echo $output;
    else
        return $output;
}