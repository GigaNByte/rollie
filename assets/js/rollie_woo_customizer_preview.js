(function ($) {

  var customize = wp.customize;


  var rollie_universal_controls = [
    new RollieCustomizerObj('rollie_woo_notice_border_color', '.rollie_woo_notice_color,.woocommerce-info', Array('border-color')),
    new RollieCustomizerObj('rollie_woo_success_border_color', '.rollie_woo_success_color,woocommerce-message', Array('border-color')),
    new RollieCustomizerObj('rollie_woo_error_border_color', '.rollie_woo_error_color,.woocommerce-error', Array('border-color')),
    new RollieCustomizerObj('rollie_muted_color', '.rollie_muted_color', Array('background', 'color')),
  ];



  var rollie_gr_controls = [
    new RollieCustomizerObj('rollie_woo_notice_color', '.rollie_woo_notice_color,.woocommerce-info', Array('background ')),
    new RollieCustomizerObj('rollie_woo_success_color', '.rollie_woo_success_color,woocommerce-message', Array('background')),
    new RollieCustomizerObj('rollie_woo_error_color', '.rollie_woo_error_color,.woocommerce-error', Array('background')),
  ];


  var rollie_gr_sub_controls = [
    '_gs', '_gr_1', '_gr_2', '_gr_3', '_stop_gr_1', '_stop_gr_2', '_stop_gr_3', '_angle_gr', ''
  ];


  $.each(rollie_gr_controls, function (index, id) {

    for (r_indexx = 0; r_indexx < rollie_gr_sub_controls.length; r_indexx++) {

      customize(id.control_name + rollie_gr_sub_controls[r_indexx], function (value) {

        var toggle = function (to) {
          rollieGradientControl(id);

          //here you can add more complicated css 

        };


        value.bind(toggle);


      });

    }
  });


  $.each(rollie_universal_controls, function (index, id) {
    for (r_indexx = 0; r_indexx < rollie_gr_sub_controls.length; r_indexx++) {
      customize(id.control_name, function (value) {
        var toggle = function (to) {
          rollieUniversalControl(id);
          //here you can add more complicated css 
          //i cant apply some css directly because pseudo elements arent part of dom
          var state = '';
          wp.customize('rollie_woo_notice_icon_invert', function (setting) {
            state = setting.get();
          });
          if (!state) {

            if (id.control_name == 'rollie_woo_error_border_color') {
              $("style[rollie_temp_1='temp']").remove();
              $('<style rollie_temp_1="temp">.woocommerce-error:before{color: ' + id.css_value + ';!important}</style>').appendTo('head');

            }
            else if (id.control_name == 'rollie_woo_notice_border_color') {
              $("style[rollie_temp_2='temp']").remove();
              $('<style rollie_temp_2="temp">.woocommerce-notice:before{color: ' + id.css_value + ';!important}</style>').appendTo('head');
            }
            else if (id.control_name == 'rollie_woo_success_border_color') {
              $("style[rollie_temp_3='temp']").remove();
              $('<style rollie_temp_3="temp">.woocommerce-success:before{color: ' + id.css_value + ';!important}</style>').appendTo('head');
            }
          }
        };
        value.bind(toggle);
      });
    }
  });







})(jQuery);