jQuery(document).ready(function ($) {
  "use strict";
  //resizing my account navigation in rollie top navbar




  //login container
  $('.woocommerce #username').wrap('<div class="rollie_login_icons_c rollie_login"></div>');
  $('.woocommerce #password,.woocommerce #reg_password').wrap('<div class="rollie_login_icons_c rollie_password"></div>');
  $('.woocommerce #reg_email').wrap('<div class="rollie_login_icons_c rollie_email"></div>');

  //simgle product gallery swiper
  var rollie_single_product_gallery_swiper =
    new Swiper('.rollie_single_product_swiper_container', {
      direction: 'horizontal',
      loop: true,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    })


  //image zoom
  $(function () {
    $('.rollie_zoom_image').each(function () {
      var originalImagePath = $(this).find('img').data('src');
      $(this).zoom({
        url: originalImagePath,
        magnify: 1
      });
    });
  });

  //variations_form cart
  $('.variations_form').on('change', function () {
    var rollie_current_image = $(this).attr('current-image');
    var dataSwiperSlideIndex = $("[rollie_gallery_image_id='" + rollie_current_image + "']").attr('data-swiper-slide-index');
    rollie_single_product_gallery_swiper.slideTo(dataSwiperSlideIndex);

  });

  // Input Spinners 
  //bcause ijnput spinners are part of shadow dom  JS code is needed
  $('<div class="quantity-nav_l"><div class="quantity-button quantity-down rollie_flex_text_center">-</div></div>').insertBefore('.quantity input');
  $('<div class="quantity-nav_r"><div class="quantity-button quantity-up rollie_flex_text_center">+</div></div>').insertAfter('.quantity input');
  $('.quantity').each(function () {
    var spinner = jQuery(this),
      input = spinner.find('input[type="number"]'),
      btnUp = spinner.find('.quantity-up'),
      btnDown = spinner.find('.quantity-down'),
      min = input.attr('min'),
      max = input.attr('max');

    btnUp.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max && max != '') {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }

      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

    btnDown.click(function () {
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






  function rollie_checked_payment_method() {
    $('.wc_payment_method > input').each(function () {
      if ($(this).is(':checked')) {
        $(this).closest('.wc_payment_method ').addClass('rollie_checked_payment_method rollie_table');
      } else {

        $(this).closest('.wc_payment_method ').removeClass('rollie_checked_payment_method rollie_table');
      }

    });
  }

  rollie_checked_payment_method();
  $(document).ajaxComplete(function () {
    rollie_checked_payment_method();
  });


  $('body').on("change", '.wc_payment_method > input', function () {
    rollie_checked_payment_method();
  });

  //only supports woocomerce panels because there is not similar class for all titles in panel description

  $('.rollie_woo_tab_panel_toogle').find('h2').on('click', function () {

    if ($(this).hasClass('rollie_woo_tab_panel_toogle_disabled')) { // for css animations
      $(this).removeClass('rollie_woo_tab_panel_toogle_disabled');
    } else {
      $(this).addClass('rollie_woo_tab_panel_toogle_disabled');
    }

    if ($(this).siblings().hasClass('rollie_tab_disabled')) {
      $(this).siblings().removeClass('rollie_tab_disabled');
    } else {
      $(this).siblings().addClass('rollie_tab_disabled');
    }

    if ($(this).parent().parent().parent().attr('id') == 'tab-reviews') {
      if ($(this).parent().siblings().hasClass('rollie_tab_disabled')) {
        $(this).parent().siblings().removeClass('rollie_tab_disabled');
      } else {
        $(this).parent().siblings().addClass('rollie_tab_disabled');
      }
    }
  });
  $(".woocommerce-Reviews-title").trigger('click');
})




