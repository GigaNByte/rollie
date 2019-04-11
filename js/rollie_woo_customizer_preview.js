(function($) {
console.log('wuwt');

 var customize = wp.customize;

 var rollie_gr_controls = [
  new rollie_gradient('rollie_woo_notice_color', '.rollie_woo_notice_color,.woocommerce-info', Array('background','border-color')),
  new rollie_gradient('rollie_woo_error_color', '.rollie_woo_error_color,.woocommerce-error', Array('background','border-color')),
  new rollie_gradient('rollie_woo_success_color', '.rollie_woo_success_color,woocommerce-message', Array('background','border-color')),


 ];


 var rollie_gr_sub_controls = [
  '_gs', '_gr_1', '_gr_2', '_gr_3', '_stop_gr_1', '_stop_gr_2', '_stop_gr_3', '_angle_gr', ''
 ];


 $.each(rollie_gr_controls, function(index, id) {

  for (r_indexx = 0; r_indexx < rollie_gr_sub_controls.length; r_indexx++) {

   customize(id.control_name + rollie_gr_sub_controls[r_indexx], function(value) {

    var toggle = function(to) {
     rollieGradientControl(id);

    };


    value.bind(toggle);


   });

  }
 });
})(jQuery);