  jQuery( document ).ready(function($) {
  "use strict";
// InputSpinners 
//bcause ijnput spinners are part of shadow dom  JS code is needed
    $('<div class="quantity-nav_l"><div class="quantity-button quantity-down rollie_flex_text_center">-</div></div>').insertBefore('.quantity input');
    $('<div class="quantity-nav_r"><div class="quantity-button quantity-up rollie_flex_text_center">+</div></div>').insertAfter('.quantity input');
   $('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
 console.log(oldValue+'dsa'+max);

        if (oldValue >= max && max != '') {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
       
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }

        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });

});