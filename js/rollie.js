
function rgba2rgb(color) {
	color = color.replace(/ /g, '');
	if (color.startsWith('rgba')) {
		color = color.substr(5).split(")")[0].split(',');
		return 'rgb(' + color[0] + ',' + color[1] + ',' + color[2] + ')';
	} else {
		return color;
	}
}



function rollie_nav_handler(container, search_form, collapsing_container) {
	jQuery(function ($) {

		if ($('.rollie_header_container').find(container).length) {
			var rollie_header_container_initial_h = $('.rollie_header_wrapper').height();
			$('.rollie_header_wrapper').css('min-height', $('.rollie_header_wrapper').height() - $(container).height());
		}
		var rollie_collapse_side_navbar = false;
		if ($('.rollie_collapse_side_navbar').length) {
			rollie_collapse_side_navbar = true;
		}
		var rollie_collapse_full = false;
		if ($('.rollie_collapse_full').length) {
			rollie_collapse_full = true;
		}
		var rollie_collapse_fixed = false;
		if ($('.rollie_collapse_fixed').length) {
			rollie_collapse_fixed = true;
		}

		//transparency
		if ($('.rollie_navbar_transparent').length) {
			$('.rollie_navbar_transparent').removeClass('rollie_transparent');
			var rollie_navbar_color = $('.rollie_navbar_color').css('backgroundColor');
			$(container).on('hover', function () {
				$('.rollie_navbar_transparent').removeClass('rollie_transparent');
				if (rollie_collapse_side_navbar) {
					$('.rollie_navbar_color').css('background', rollie_navbar_color);
				} else {
					$('.rollie_navbar_color').css('background', rgba2rgb(rollie_navbar_color));
				}

			});
			$(container).on('mouseleave', function () {
				if (!$('#rollie_nav_top_main_container').hasClass('show') && !$('#rollie_nav_top_main_container').hasClass('collapsing') && !$('#rollie_search_input_menu_top').hasClass('show') && !$('#rollie_search_input_menu_top').hasClass('collapsing') && !$('#rollie_nav_user_info').hasClass('show') && !$('#rollie_nav_user_info').hasClass('collapsing') && !$('#rollie_search_input_menu_top').hasClass('collapsing') && !$('#rollie_nav_cart_info').hasClass('show') && !$('#rollie_nav_cart_info').hasClass('collapsing')) {
					$('.rollie_navbar_color').css('background', rollie_navbar_color);
					$('.rollie_navbar_transparent').addClass('rollie_transparent');
				}
			});


			$('.rollie_navbar_transparent').addClass('rollie_transparent');
			window.onscroll = function () {
				$(window).scroll(function () {

					if ($(window).scrollTop() < 30 && !$('#rollie_nav_top_main_container').hasClass('collapsing') && !$('#rollie_nav_top_main_container').hasClass('show') && !$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').hasClass('show') && !$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').hasClass('collapsing')) {

						$('.rollie_navbar_transparent').addClass('rollie_transparent');
					} else {
						$('.rollie_navbar_transparent').removeClass('rollie_transparent');
					}
				});
			}
		} else {
			var rollie_navbar_color = $('.rollie_navbar_color').css('backgroundColor');
		}



		//on swipe
		//swipe support	
		if (rollie_collapse_fixed || rollie_collapse_side_navbar) {
			$(document).on('swiperight', function (e, data) {
				if ($('.rollie_nav_top_icons_colapsed_content_side').length && $('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').hasClass('show')) {
					$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').collapse('hide');
				}
				else if ((Math.round($(document).width() / 3.3) > data.x - data.distance.x)) {
					$(collapsing_container).collapse('show');
				}
			});
			$(document).on('swipeleft', function (e, data) {
				if ($(collapsing_container).hasClass('show')) {
					$(collapsing_container).collapse('hide');
				}
				else if ($('.rollie_nav_top_icons_colapsed_content_side').length && ($(document).width() - Math.round($(document).width() / 3.3)) < data.x + data.distance.x) {
					$('.rollie_nav_top_icons_colapsed_content_side').find('#rollie_nav_user_info').collapse('show');
				}
			});
		} else {
			$(document).on('swipedown', function (e, data) {
				$(collapsing_container).collapse('show');
			});
			$(document).on('swipeup', function (e, data) {
				$(collapsing_container).collapse('hide');
			});
			$(document).on('swipeleft', function (e, data) {
				$(collapsing_container).collapse('hide');
				if ($('.rollie_nav_top_icons_colapsed_content_side').length && ($(document).width() - Math.round($(document).width() / 3.3)) < data.x + data.distance.x) {
					$('.rollie_nav_top_icons_colapsed_content_side').find('#rollie_nav_user_info').collapse('show');
				}
			});
			$(document).on('swiperight', function (e, data) {
				if ($('.rollie_nav_top_icons_colapsed_content_side').length && $('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').hasClass('show')) {
					$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').collapse('hide');
				}
			});
		}

		$(window).on('resize', function () {
			if ($('.rollie_header_container').find(container).length) {
				$('.rollie_header_wrapper').css('min-height', rollie_header_container_initial_h);
				$('.rollie_header_wrapper').css('min-height', $('.rollie_header_wrapper').height() - $(container).height() + 'px');
			}

			if ($('#rollie_navbar_c').hasClass('rollie_navbar_fixed') || $('#rollie_navbar_c').hasClass('rollie_navbar_absolute')) {
				$('.rollie_nav_top_icons_colapsed_content_side').css('margin-top', $('#rollie_navbar_c').height() + "px");
			}

			$('#rollie_nav_user_info').find('.woocommerce-MyAccount-navigation').find('ul').css('min-height', $(window).height() - $('#rollie_nav_user_info').find('.rollie_woo_order_table_banner').innerHeight() - $('#rollie_navbar_c').height() + "px");

			$(collapsing_container).collapse('hide');
			$(container).find('.rollie_navbar_toggler').blur();
			if (rollie_collapse_side_navbar) {
				$(collapsing_container).insertBefore('.rollie_top_menu_icons');
			}
		});

		var plus = 0;
		if ($(container).find('.rollie_top_menu_icons').length) {
			plus = $(container).find('.rollie_top_menu_icons').outerWidth();
		}
		plus = parseInt(plus);


		if ($(container).find('.navbar-nav').length) {

			var rollie_nav_l = 0;
			$(container).find('.navbar-nav').find('.menu-item').each(function (index) {
				rollie_nav_l += parseInt($(this).width(), 10);
			});
			rollie_nav_l = rollie_nav_l + plus;

			if ($(container).hasClass('rollie_navbar_always_collapse')) {
				$(container).removeClass('invisible');
			} else {
				if (rollie_nav_l <= 576) {
					$(container).addClass('navbar-expand-sm');
					//$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_xs' );					
				} else if ((rollie_nav_l <= 768) && (rollie_nav_l > 576)) {
					$(container).addClass('navbar-expand-md');

					//	$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_sm' );					
				} else if ((rollie_nav_l <= 992) && (rollie_nav_l > 768)) {
					$(container).addClass('navbar-expand-lg');
					//$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_md' );					
				} else if ((rollie_nav_l > 992)) {
					$(container).addClass('navbar-expand-xl');
					//	$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_lg' );					
				}
			}

			$(container).removeClass('navbar-expand invisible');

			$(collapsing_container).on(
				'shown.bs.collapse',
				function () {
					if (rollie_collapse_full) {
						$('#rollie_main_container').removeClass('h-100');
					}
					//when rollie_nav_top_icons_colapsed_content_side is collapsed and navbar main collapse is triggered it fails to set backbr
					if (!rollie_collapse_side_navbar) {
						$('.rollie_navbar_color').css('background', rgba2rgb(rollie_navbar_color));
					}



				});

			function rollie_nav_collapse_show() {

				if ($('#rollie_navbar_c').hasClass('rollie_navbar_fixed')) {
					$('#rollie_navbar_c').addClass('position-absolute');

				}
				if ($('#rollie_navbar_c').hasClass('rollie_navbar_relative')) {
					$('#rollie_navbar_c').addClass('position-sticky');
					console.log('add');
				}

				$('#rollie_fixed_menu_fixed_content').addClass('rollie_overflow_y');
				if (rollie_collapse_side_navbar) {
					//$('.rollie_navbar_transparent').css('background','inherit');
					$(collapsing_container).insertAfter(container);
					$('.rollie_collapse_side').not('.rollie_nav_top_icons_side_item').css('margin-top', $('#rollie_navbar_c').height() + "px");
				}
				else if (rollie_collapse_fixed) {

					$('.rollie_navbar_color').css('background', rgba2rgb(rollie_navbar_color));

					$(collapsing_container).appendTo($('#rollie_fixed_menu_left_container'));
					if (!$('.rollie_collapse_fixed').hasClass('rollie_collapse_fixed_full')) {
						$('.rollie_collapse_side').not('.rollie_nav_top_icons_side_item').css('margin-top', $('#rollie_navbar_c').height() + "px");
					}
				} else {
					$(collapsing_container).insertAfter('.rollie_top_menu_icons');
				}
				//ignore belwo
				$(container).parent().find('.collapse.show').collapse('hide');
				$('.navbar-nav').addClass('m-0');
				$('.rollie_collapse_side_overlay').css('display', 'block').css("opacity", "1");
			}
			var collapse_scroll = 0;
			$(collapsing_container).on('show.bs.collapse', function () {
				console.log('coll3');
				if (false && $('.rollie_nav_top_icons_colapsed_content_side').find('.collapse.show').length) {
					console.log('coll1');
					$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse.show').collapse('hide').on('hidden.bs.collapse', function (evt) {
						console.log('coll423');
						rollie_nav_collapse_show();
						$(this).off(evt);
					});
				} else {
					$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse.show').collapse('hide');
					rollie_nav_collapse_show();
				}

				/*$( document ).mouseup(
						function(e)
						{
							if ( ! $( "#rollie_navbar_c" ).is( e.target ) && $( "#rollie_navbar_c" ).has( e.target ).length === 0  ) {

								$( '#rollie_navbar_c > #rollie_search_input_menu_top' ).removeClass( "rollie_search_input_menu_top_mobile" ).css( 'display','none' ).css( 'visibility','hidden' );
								$("#rollie_navbar_top_container").collapse("hide");
							}
						}
					);
				*/
			});

			$(collapsing_container).on('hidden.bs.collapse', function () {

				$('.rollie_navbar_color').css('background', rollie_navbar_color);
				if (rollie_collapse_fixed) {

					//$('.rollie_navbar_color').css('background',rollie_navbar_color);	
					if (!$('.rollie_nav_top_icons_colapsed_content_side').find('collapse').hasClass('show') || !$('.rollie_nav_top_icons_colapsed_content_side').find('collapse').hasClass('collapsing')) {
						//	$('#rollie_fixed_menu_fixed_content').removeClass('rollie_overflow_y');	
						//	window.scrollBy(0,1234);
					}
				}
				$('.rollie_collapse_side_overlay').css('display', 'none').css("opacity", "0");
				$('.navbar-nav').removeClass('m-0');

				if (rollie_collapse_side_navbar) {
					$('.rollie_collapse_side').css('margin-top', '0');
					$(collapsing_container).insertBefore('.rollie_top_menu_icons');
				} else if (!rollie_collapse_fixed) {
					if (!$('.rollie_collapse_fixed').hasClass('rollie_collapse_fixed_full')) {
						if ($('.rollie_fixed_menu_right_container_fixed_full').length) {
							//	$('.rollie_top_menu_icons').insertAfter(collapsing_container);	

						}
					}
				}


				$('#rollie_fixed_menu_fixed_content').removeClass('rollie_overflow_y');
				$('.rollie_top_menu_icons').find('button').removeAttr('disabled');

			});


			$(collapsing_container).on(
				'hide.bs.collapse',
				function () {
					console.log(event);

					if (rollie_collapse_full) {
						$('#rollie_main_container').addClass('h-100');
					}
					if ($('#rollie_navbar_c').hasClass('rollie_navbar_fixed')) {
						$('#rollie_navbar_c').removeClass('position-absolute');
						console.log('sdasfsdgsdfghb');
					}

					if (!$('.rollie_collapse_fixed').hasClass('rollie_collapse_fixed_full')) {
						if ($('.rollie_fixed_menu_right_container_fixed_full').length) {
							//$('#rollie_navbar_c').insertBefore($('#rollie_extra_fixed_wrapper'));							
						}
					}
					$(container).find('.rollie_navbar_toggler').blur();
					$('.rollie_collapse_side_overlay').css('display', 'none').css("opacity", "0");
					if ($('#rollie_navbar_c').hasClass('rollie_navbar_relative')) {
						$("html, body").animate({ scrollTop: 0 }, 200);
						$('#rollie_navbar_c').removeClass('position-sticky');
					}
				});
		} else {
			$(container).removeClass('navbar-expand invisible');
		}

		//hide all colapses on top menu when colapsing another
		$(container).parent().find('.collapse').on(
			'show.bs.collapse',
			function () {
				if (!rollie_collapse_side_navbar) {
					$('.rollie_navbar_color').css('background', rgba2rgb(rollie_navbar_color));
				}
				$(this).parent().find('.collapse.show').not(this).collapse('hide');
				$('.rollie_navbar_transparent').removeClass('rollie_transparent');
			});

		//iCON MENU COLLAPSE CONTENT HANDLER
		if ($('.rollie_nav_top_icons_colapsed_content_side').length) {
			//only adding this attribute dynamicaly  collapse works propely	
			var rollie_navbar_fixed_flag = false;

			function rollie_nav_top_icons_show() {

				//rollie_overflow_y_icons is the same as rollie_overflow_y 
				//this class eleminates conflicts with navbar collapse when navbar collapses nav top icons menu at relative positioned navbar
				if (!rollie_collapse_side_navbar) {
					$('.rollie_navbar_color').css('background', rgba2rgb(rollie_navbar_color));
				}
				if ($('#rollie_navbar_c').hasClass('rollie_navbar_relative')) {
					$('#rollie_navbar_c').addClass('position-sticky');
					console.log('add');
					//	setTimeout(function(){ $('#rollie_navbar_c').addClass('position-sticky'); }, 300);
				}

				$('#rollie_fixed_menu_fixed_content').addClass('rollie_overflow_y_icons');
				if ($('.rollie_fixed_menu_right_container_fixed_full').length) {
					$('#rollie_content_wrapper').removeClass('justify-content-end d-flex');
					if ($('#rollie_navbar_c').hasClass('rollie_navbar_fixed') || $('#rollie_navbar_c').hasClass('rollie_navbar_absolute')) {
						$('.rollie_nav_top_icons_colapsed_content_side').css('margin-top', $('#rollie_navbar_c').height() + "px");
					}
					$('#rollie_content_wrapper').addClass('justify-content-end d-flex');
				}
				$('#rollie_fixed_menu_right_container').addClass('rollie_menus_shadow');




				$('.rollie_collapse_side_overlay').css('display', 'block').css("opacity", "1");
				$('.rollie_navbar_transparent').removeClass('rollie_transparent');
			}
			function rollie_nav_top_icons_preshow(collapsed) {
				//wait until all menus are hjidden
				if ($('.rollie_nav_top_icons_colapsed_content_side').find('.collapse.show').not(collapsed).length) {
					$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse.show').not(collapsed).collapse('hide').on('hidden.bs.collapse', function (evt) {
						console.log('preon');

						rollie_nav_top_icons_show();
						$(this).off(evt);
					});
				} else {
					console.log('preoff');
					rollie_nav_top_icons_show();
				}
			}

			$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').on(
				'show.bs.collapse',
				function () {

					var collapsed = this;
					//wait until all menus are hjidden	
					if ($(collapsing_container).hasClass('show')) {
						$(collapsing_container).collapse('hide').on('hidden.bs.collapse', function (evt) {
							console.log('kojnidsa');
							rollie_nav_top_icons_preshow(collapsed);
							$(this).off(evt);
						});
					} else {
						rollie_nav_top_icons_preshow(collapsed);
					}
				});

			$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').on(
				'shown.bs.collapse',
				function () {

					$('#rollie_nav_user_info').find('.woocommerce-MyAccount-navigation').find('ul').css('min-height', $(window).height() - $('#rollie_nav_user_info').find('.rollie_woo_order_table_banner').innerHeight() - $('#rollie_navbar_c').height() + "px");
					$('.rollie_navbar_transparent').removeClass('rollie_transparent');
				});
			$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').on(
				'hide.bs.collapse',
				function () {


					console.log('DSAFSDGFSDRGR');
					console.log($('#rollie_nav_cart_info').hasClass('show'));
					$('.rollie_navbar_color').css('background', rollie_navbar_color);
					$('#rollie_fixed_menu_right_container').removeClass('rollie_menus_shadow');
					$('#rollie_content_wrapper').removeClass('justify-content-end d-flex');
					$('.rollie_collapse_side_overlay').css('display', 'none').css("opacity", "0");
					if ($('#rollie_navbar_c').hasClass('rollie_navbar_relative')) {
						$("html, body").animate({ scrollTop: 0 }, 200);
						$('#rollie_navbar_c').removeClass('position-sticky');
						console.log('remobe');
					}
				}
			);
			$('.rollie_nav_top_icons_colapsed_content_side').find('.collapse').on(
				'hidden.bs.collapse',
				function () {


					$('#rollie_fixed_menu_fixed_content').removeClass('rollie_overflow_y_icons');
					if ($('.rollie_fixed_menu_right_container_fixed_full').length) {
						if (rollie_navbar_fixed_flag) {
							//$('#rollie_navbar_c').removeClass('rollie_navbar_fixed');	
						}

					}



				});

		}


		//iCON MENU COLLAPSE CONTENT HANDLER END

	});

}


jQuery(function ($) {

	rollie_nav_handler("#rollie_navbar_top", '#rollie_search_input_menu_top', '#rollie_nav_top_main_container');

	//Adds support for masonry post grid


	if ($('.rollie_grid').length) {

		var rollie_grid = $('.rollie_grid');
		rollie_grid.imagesLoaded(function () {
			rollie_grid.masonry({
				itemSelector: '.rollie_grid_item',
				columnWidth: '.rollie_grid_size',
				isAnimated: true,
				percentPosition: true,
			});

		});

		$('.rollie_grid_item img').on('lazyload', function () {
			rollie_grid.masonry('layout');
		});
	}



	// swap titles in content-header
	if ($('.rollie_parent_title').hasClass('rollie_below_js')) {
		$('.rollie_parent_title').insertAfter($('.rollie_parent_title').next());
	}



	//Padding bottom and transition calc for footer
	if ($('.rollie_footer_collapse').length) {
		$('.rollie_content_container_padding_bottom').css("padding-bottom", $('#rollie_footer > .rollie_footer_collapse').outerHeight() + 30 + "px");
		$('#rollie_footer > .rollie_footer_collapse').removeClass("rollie_padding_footer_measure");
		//footer animation
		$(window).scroll(
			function () {
				if ($(window).scrollTop() + $(window).height() > $(document).height() - 30) {
					$('#rollie_footer > .rollie_footer_collapse').css('visibility', 'visible');
					$('#rollie_footer > .rollie_footer_collapse').addClass("show");
				} else {
					$('#rollie_footer > .rollie_footer_collapse').removeClass("show");
				}

			}
		);
	}

	//swiper for gallery if activated
	if ($('div.rollie_gallery_post_format').length) {
		$(this).scrollTop(0);

		var rollie_gallery_post_format_slider = new Swiper(
			'.rollie_gallery_1_swiper',
			{
				centeredSlides: true,
				autoplay: {
					delay: 1500,
					disableOnInteraction: true,
				},
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},

			}
		);
	}



	//swiper for swap cat navigation
	if ($('div.rollie_cat_swap_swiper').length) {
		var rolliecatswipper = new Swiper(
			'.rollie_cat_swap_swiper',
			{
				direction: 'horizontal',
				loop: true,
				slidesPerView: 3,
				centeredSlides: true,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				breakpoints: {
					700: {
						slidesPerView: 1,
					}
				}

			}
		);

		$('[class^="rollie_current_cat_"], [class*=" rollie_current_cat_"]').each(
			function () {
				var classname = this.className;
				var classsparts = classname.split('rollie_current_cat_');
				var result = classsparts[1];
				result = result.split(" ")[0];

				result = parseInt(result);
				rolliecatswipper.slideToLoop(result);

			});
	}

	//support for multi level dropdown

	$(".dropdown-submenu").on('hover', function () {
		$(this).siblings(".rollie_subdropdown").addClass("rollie_show_subdropdown");
	});


	$(".dropdown").on('mouseleave', function () {
		$(this).find(".rollie_subdropdown").removeClass("rollie_show_subdropdown");
	});

	//mobile touch support for dropdowns
	$(".dropdown-submenu").siblings('.rollie_dropdown_toogle').on('click', function () {
		$('.dropdown-menu').click(function (e) {
			e.stopPropagation();
		});
	});


	//adding nested comment 
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}

		}
	};
	var rollie_reply_id = getUrlParameter('replytocom');
	if (rollie_reply_id) {
		rollie_reply_id = '#div-comment-' + rollie_reply_id;
		$('.comment-respond').insertAfter($(rollie_reply_id).children().first());

	}

	//prevent video loop to stop
	$('.rollie_header_video').on('ended', function () {
		this.load();
		this.play();
	});
	$("video[autoplay]").each(function () { this.play(); });


});
