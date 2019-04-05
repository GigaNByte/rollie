<?php
/*
1.General
2.MyAccount
3.Orders Table
4.Orders table Query Snipets
*/
/* My orders Table*/


//query_filtering

function rollie_shortcode_my_orders( $atts ) {
    extract( shortcode_atts( array(
        'order_count' => -1
    ), $atts ) );

    ob_start();
    wc_get_template( 'myaccount/my-orders.php', array(
        'current_user'  => get_user_by( 'id', get_current_user_id() ),
        'order_count'   => $order_count
    ) );
    return ob_get_clean();
}
add_shortcode('rollie_my_orders', 'rollie_shortcode_my_orders');

add_filter( 'woocommerce_my_account_my_orders_query', 'rollie_my_orders_query' );
function rollie_my_orders_query($args){
var_dump($endpoint = WC()->query->get_current_endpoint());
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
 
function rollie_add_my_account_menu_items( $items ) {
    $items['completed'] = __('Completed','woocommerce');
    $items['processing'] = __('Processing','woocommerce')." ".__('Or','rollie')." ".__('Pending','woocommerce');
    $items['on-hold'] = __('On-hold','woocommerce');
   	$items['refunded'] = __('Refunded','woocommerce');
   	$items['canceled'] = __('Canceled','woocommerce')." ".__('Or','rollie')." ".__('Failed','woocommerce');
    return $items;
}
 
add_filter( 'woocommerce_account_menu_items', 'rollie_add_my_account_menu_items' );
 
 

// 4. Add content to the new endpoint
 
function rollie_my_orders_query_content() {
echo do_shortcode( '[rollie_my_orders]' );
}

foreach ( array('completed','processing','on-hold','refunded','canceled') as $key => $value)
{
add_action( 'woocommerce_account_'.$value.'_endpoint', 'rollie_my_orders_query_content' );
}

    







function rollie_woo_order_status_icon($rollie_woo_order_status,$rollie_is_downloadable,$url) 
{
	$rollie_woo_order_status_icon = '';
	switch($rollie_woo_order_status)
		{
	case 'pending':
	  $rollie_woo_order_status_icon = 'fas fa-sync fa-pulse ' ;
 	break;		
	case 'on-hold':
	  $rollie_woo_order_status_icon = 'fas fa-hand-holding-usd    ' ;
 	break;							 	
 	case 'processing':
		if ($rollie_is_downloadable){
 		 $rollie_woo_order_status_icon = 'fas fa-sync fa-pulse animated';
		}
		else{
			$rollie_woo_order_status_icon = 'fas fa-shipping-fast    faa-passing animated';
		}

 	break;
 	case 'completed':
 		if ($rollie_is_downloadable){
			$rollie_woo_order_status_icon = 'fas fa-download ' ;
		}
		else{
			 $rollie_woo_order_status_icon = 'fas fa-check faa-pulse animated faa-slow';	
		}

	break; 
	case 'canceled':
	  $rollie_woo_order_status_icon = 'fas fa-times '; 
 	break;
 	case 'refunded':
	  $rollie_woo_order_status_icon = 'far fa-handshake'; 
 	break;
	case 'failed':
	  $rollie_woo_order_status_icon = 'fas fa-exclamation-triangle flash faa-slow'; 
 	break;
 	default:
 	  $rollie_woo_order_status_icon = 'fas fa-dolly-flatbed'; 
 	break;
			
		}
	return  "<a href=".esc_url($url) ."><i class= 'm-3 rollie_woo_order_status_icon  ".$rollie_woo_order_status_icon."' ></i></a>" ;
}

function rollie_woo_orders_custom_column( $columns ) {


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
        // do something here
?>

<div rollie_woo_order_table_status="<?php esc_attr_e($order->get_status())?>" class='rollie_woo_order_table rollie_woo_border_color_custom_column rollie_woo_border_custom_column_rad'>
	<a href=" <?php echo esc_url($order->get_view_order_url()); ?>	" >
	<div class='  rollie_woo_order_table_banner   rollie_button  '>		

	
		<?php $rollie_o_date = $order->get_date_created()->date_i18n('Y-m-d')?>
		<div class="col-12 d-flex">
			<div class='col-8 text-left'><?php echo  __('Order Date','woocommerce').': '.$rollie_o_date?></div>
				<div class='col-4 text-right'><?php echo __('ID','wordpress').': #'.$order->get_order_number() ?></div>
		</div>
		
	</div>
	</a>
	<div class=' row  m-0 p-0 rollie_woo_order_table  rollie_woo_border_color_custom_column '>
	
			<div class='col-12'>
			<?Php	foreach( $order->get_items() as $item_id => $item ){
					$product = $item->get_product(); 
			?>
	
				<div class='row rollie_woo_order_item_row rollie_woo_border_color_custom_column '>
				
					<div class='col-4 col-md-2  rollie_woo_order_table_thumbnail'><?php echo $product->get_image('woocommerce_gallery_thumbnail');?></div>
					<div class='col-8 col-md-10'>
						<div class='row m-0 '>

							<div class='col-8 text-left'><?php echo  $product_name = $item->get_name(); ?></div>
							<div class='col-4 text-center rollie_wrap_n'> <?php echo wc_price( $item->get_total() );?><span class='font-weight-bold'> x </span><?php echo $item->get_quantity();  ?></div>
							
						</div>
					
					</div>
				</div>
			<?php } ?>
				<div class='row rollie_woo_order_summary_row rollie_woo_border_color_custom_column '>		
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

function rollie_woo_orders_table_sort_menu ()
{
	?>
<div class='row rollie_orders_sort_menu'>
	<a href='<?php  echo wc_get_account_endpoint_url('completed') ; ?>'>
	<div class='col-2' rollie_woo_order_table_status_trigger='pending'>
		juhuski
		<i class='fas fa-sync' ></i>
	</div>
	</a>
	<div class='col-2'  rollie_woo_order_table_status_trigger ='processing' >
	<i class='fas fa-sync'></i>
	</div>
	<div class='col-2 '  rollie_woo_order_table_status_trigger ='completed'>
	<i class='fas fa-sync'  ></i>
	</div>
	<div class='col-2' rollie_woo_order_table_status_trigger ='refunded'>
	<i class='fas fa-sync'  ></i>
	</div>
	<div class='col-2' rollie_woo_order_table_status_trigger ='failed'>
	<i class='fas fa-sync'  ></i>
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
	echo "<div class='p-0 col-12 rollie_f_headings rollie_title_text_color rollie_account_title' >".get_the_title()."</div>";
	echo "<div class='col-12 rollie_account_content'>";

}



function rollie_action_woo_account_content_wraper_end()
{

echo "</div>";
echo "</div>";
}








  add_action ('woocommerce_account_content','rollie_action_woo_account_content',1);
  add_action ('woocommerce_account_content','rollie_action_woo_account_content_wraper_end',200);




function wpb_woo_my_account_order() {
	$myorder = array(


		'edit-account'       => __( 'Account Details', 'woocommerce' ),
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
		'orders'             => __( 'Orders', 'woocommerce' ),
		'completed'			 =>	__( 'Completed', 'woocommerce' ),						
		'processing' 		=> __('Processing','woocommerce'),
		'on-hold'			 =>	__( 'On-hold', 'woocommerce' )." ".__('Or','rollie')." ".__('Pending','woocommerce'),
		'refunded'			 =>	__( 'Refunded', 'woocommerce' ),
		'canceled'			 =>	__('Canceled','woocommerce')." ".__('Or','rollie')." ".__('Failed','woocommerce'),
		'downloads'          => __( 'Downloads', 'woocommerce' ),
		'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'payment-methods'    => __( 'Payment methods', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' ),



	);
	return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );






