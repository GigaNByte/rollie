class RollieCustomizerObj {

  constructor(control_name, css_class, css_property) {
    this.control_name = control_name;
    this.css_class = css_class;
    this.css_property = css_property;
    this.css_value = '';
  }
}
function hexToRgbA_2(hex) {
  var c;
  if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
    c = hex.substring(1).split('');
    if (c.length == 3) {
      c = [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c = '0x' + c.join('');
    return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',1)';
  } else {
    return hex;
  }
}

function rollieRangeSanitize(number, from, to) {
  if (from <= number && number <= to) {
    return number;
  } else {
    return 0;
  }
}

function rollieGradientControl(rollie_gradient_obj) {
  (function ($) {
    var rollie_multiple_switch_state;

    wp.customize(rollie_gradient_obj.control_name + '_gs', function (setting) {
      rollie_multiple_switch_state = setting.get();
    });

    if (rollie_multiple_switch_state == 2) { //means gradient enable
      var rollie_gr_1 = '';
      var rollie_gr_2 = '';
      var rollie_gr_3 = '';
      var rollie_stop_gr_1 = '';
      var rollie_stop_gr_2 = '';
      var rollie_stop_gr_3 = '';
      var rollie_angle_gr = '';

      wp.customize(rollie_gradient_obj.control_name + '_gr_1', function (setting) {
        rollie_gr_1 = hexToRgbA_2(setting.get());
      });
      wp.customize(rollie_gradient_obj.control_name + '_gr_2', function (setting) {
        rollie_gr_2 = hexToRgbA_2(setting.get());
      });
      wp.customize(rollie_gradient_obj.control_name + '_gr_3', function (setting) {
        rollie_gr_3 = hexToRgbA_2(setting.get());
      });
      wp.customize(rollie_gradient_obj.control_name + '_stop_gr_1', function (setting) {
        rollie_stop_gr_1 = rollieRangeSanitize(setting.get(), 0, 100);
      });
      wp.customize(rollie_gradient_obj.control_name + '_stop_gr_2', function (setting) {
        rollie_stop_gr_2 = rollieRangeSanitize(setting.get(), 0, 100);
      });
      wp.customize(rollie_gradient_obj.control_name + '_stop_gr_3', function (setting) {
        rollie_stop_gr_3 = rollieRangeSanitize(setting.get(), 0, 100);
      });
      wp.customize(rollie_gradient_obj.control_name + '_angle_gr', function (setting) {
        rollie_angle_gr = rollieRangeSanitize(setting.get(), 0, 360);
      });

      var rollie_gr_css = '';
      rollie_gr_css = /*rollie_gradient_obj.css_before_value*/  " linear-gradient( " + rollie_angle_gr + "deg, " + rollie_gr_1 + " " + rollie_stop_gr_1 + "% , " + rollie_gr_2 + " " + rollie_stop_gr_2 + "% , " + rollie_gr_3 + " " + rollie_stop_gr_3 + "% )";
      for (index = 0; index < rollie_gradient_obj.css_property.length; index++) {
        $(rollie_gradient_obj.css_class).css(rollie_gradient_obj.css_property[index], rollie_gr_css);
      }
      rollie_gradient_obj.css_value = rollie_gr_css;
      /* wp.customize(rollie_gradient_obj.control_name, function(setting) {
        //setting.set(rollie_gr_css);
       });
     */
    } else {
      rollieUniversalControl(rollie_gradient_obj);
    }
  })(jQuery);
}

function rollieColor(control_name, css_class, css_property) {
  this.control_name = control_name;
  this.css_class = css_class;
  this.css_property = css_property;
  this.css_value = '';
}

function rollieUniversalControl(rollie_color_obj) {
  (function ($) {
    wp.customize(rollie_color_obj.control_name, function (setting) {
      var rollie_standard_color = setting.get();
      rollie_color_obj.css_value = rollie_standard_color;
      for (index = 0; index < rollie_color_obj.css_property.length; index++) {
        $(rollie_color_obj.css_class).css(rollie_color_obj.css_property[index], rollie_standard_color);
      }
    });
  })(jQuery);
}

(function ($) {
  var customize = wp.customize;
  var rollie_gr_controls = [
    new RollieCustomizerObj('rollie_main_theme_color', '.rollie_main_color,.rollie_grid_item', Array('background')),
    new RollieCustomizerObj('rollie_second_theme_color', '.rollie_second_color', Array('background')),
    new RollieCustomizerObj('rollie_third_theme_color', '.rollie_third_color', Array('background')),
    new RollieCustomizerObj('rollie_darker_main_theme_color', '.rollie_darker_main_color', Array('background')),
    new RollieCustomizerObj('rollie_sidebar_theme_color', '.rollie_sidebar_color,.rollie_sidebar_left , .rollie_sidebar_right', Array('background')),
    new RollieCustomizerObj('rollie_title_bg_theme_color', '.rollie_title_bg_color', Array('background')),
    new RollieCustomizerObj('rollie_post_classic_title_bg_theme_color', '.rollie_post_title_bg_color', Array('background')),
    new RollieCustomizerObj('rollie_navbar_color', '.rollie_navbar_color ', Array('background')),
    new RollieCustomizerObj('rollie_button_b_h_color', '.rollie_button:hover', Array('background')),
    new RollieCustomizerObj('rollie_button_b_color', '.rollie_button ,.woocommerce-cart-form__contents > thead ,.woocommerce-checkout-review-order-table', Array('background')),
    new RollieCustomizerObj('rollie_button_alt_b_h_color', '.rollie_button_alt:hover,.woocommerce button.button.alt:hover ,.woocommerce a.button.alt:hover,.woocommerce .checkout-button:hover', Array('background')),
    new RollieCustomizerObj('rollie_button_alt_b_color', '.rollie_button_alt,.woocommerce button.button.alt  ,.woocommerce a.button.alt,.woocommerce .checkout-button', Array('background')),
  ];

  var rollie_gr_sub_controls = [
    '_gs', '_gr_1', '_gr_2', '_gr_3', '_stop_gr_1', '_stop_gr_2', '_stop_gr_3', '_angle_gr', ''
  ];
  $.each(rollie_gr_controls, function (index, id) {
    for (r_indexx = 0; r_indexx < rollie_gr_sub_controls.length; r_indexx++) {
      customize(id.control_name + rollie_gr_sub_controls[r_indexx], function (value) {
        var toggle = function (to) {
          rollieGradientControl(id);

        };
        value.bind(toggle);
      });
    }
  });
})(jQuery);



