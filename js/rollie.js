
function rgb2hex(rgb){
	rgb = rgb.match( /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i );
	return (rgb && rgb.length === 4) ? "#" +
	("0" + parseInt( rgb[1],10 ).toString( 16 )).slice( -2 ) +
	("0" + parseInt( rgb[2],10 ).toString( 16 )).slice( -2 ) +
	("0" + parseInt( rgb[3],10 ).toString( 16 )).slice( -2 ) : '';
}
function hexToRgbA(hex,a){
	var c;
	if (/^#([A-Fa-f0-9]{3}){1,2}$/.test( hex )) {
		c = hex.substring( 1 ).split( '' );
		if (c.length == 3) {
			c = [c[0], c[0], c[1], c[1], c[2], c[2]];
		}
		c = '0x' + c.join( '' );
		return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join( ',' ) + ',' + a + ')';
	}
	throw new Error( 'Bad Hex' );
}


function rollie_nav_handler( container ,ul, search_form , collapsing_container ,executing_first){
	jQuery(
		function($){
			$( '.rollie_collapse_side_js.collapse > ul' ).css( "display","flex" );	

			if ($( '.rollie_collapse_side_js' ).length && ! ($( '.rollie_collapse_side' ).length) ) {
				var rollie_collapse_side = true;

			} else {
				var rollie_collapse_side = false;

			}


			$( ".rollie_navbar_toggler" ).click(
				function() {
					
					$( '.rollie_collapse_side_js' ).css( 'visibility','visible' );

					if ($( '.rollie_collapse_side_js' ).length ) {


						collapse_margin = $( '.rollie_nav_top_2_nav_js ' ).height();

						$( collapsing_container ).css( "top",collapse_margin + "px" );

					}
				}
				);



			if ($( search_form ).length) {
				var plus = 800;
				plus     = parseInt( plus );
			} else {
				var plus = 0;
			}

			if ($( ul ).length) {

				var rollie_nav_l = $( ul ).width();
				rollie_nav_l     = rollie_nav_l + plus;

				if (rollie_nav_l <= 576) {
					$( container ).addClass( 'navbar-expand-sm' );
					$( search_form ).addClass( 'mx-sm-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_xs' );
					if (rollie_collapse_side) {

						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_xs' );

					}
				} else if ( (rollie_nav_l <= 768) && (rollie_nav_l > 576) ) {

					$( container ).addClass( 'navbar-expand-md' );
					$( search_form ).addClass( 'mx-md-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_sm' );
					if (rollie_collapse_side) {
						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_sm' );

					}
				} else if ((rollie_nav_l <= 992) && (rollie_nav_l > 768) ) {
					$( container ).addClass( 'navbar-expand-lg' );
					$( search_form ).addClass( 'mx-lg-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_md' );
					if (rollie_collapse_side) {

						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_md' );

					}
				} else if ( (rollie_nav_l > 992 ) ) {
					$( container ).addClass( 'navbar-expand-xl' );
					$( search_form ).addClass( 'mx-xl-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_lg' );
					if (rollie_collapse_side) {
						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_lg' );
					}
					
				}

				$( container ).removeClass( ' navbar-expand invisible' );

				var rollie_backgroundc = $( '.rollie_navbar_color' ).css( "background-color" );

				var rollie_backgroundcmod = rgb2hex( rollie_backgroundc );
				rollie_backgroundcmod     = hexToRgbA( rollie_backgroundcmod ,'0.92' );

		$( collapsing_container ).on(
					'show.bs.collapse',
					function () {		
	//					$(container).parent().find('.collapse').collapse('hide');	
						$('.rollie_top_menu_icons').insertBefore(collapsing_container);

						$('ul' ).addClass( 'm-0' );
						$( '.rollie_collapse_side_overlay' ).css('display','block').css( "opacity","1" );
						$( container ).css( "background-color",rollie_backgroundcmod );
					
						if (rollie_collapse_side) {

							$( '.rollie_top_navbar_b_color' ).css( "background-color",rollie_backgroundcmod );
						}
						$( document ).mouseup(
							function(e)
							{
								if ( ! $( "#rollie_insert_search_form_between_js" ).is( e.target ) && $( "#rollie_insert_search_form_between_js" ).has( e.target ).length === 0  ) {

									$( '#rollie_insert_search_form_between_js > #rollie_search_input_menu_top' ).removeClass( "rollie_search_input_menu_top_mobile" ).css( 'display','none' ).css( 'visibility','hidden' );
									$(".rollie_navbar_top_container").collapse("hide");
								}
							}
							);
					}
					);

				$( collapsing_container ).on(
					'hidden.bs.collapse',
					function () {			
					
						$( '.rollie_collapse_side_overlay' ).css('display','none').css( "opacity","0" );
						$( '.rollie_navbar_color' ).css( "background-color",rollie_backgroundc );
						$( ul ).removeClass( 'm-0' );
						$('.rollie_top_menu_icons').insertAfter(collapsing_container);
					});

				$( collapsing_container ).on(
					'hide.bs.collapse',
					function () {					
						$( '.rollie_collapse_side_overlay' ).css('display','none').css( "opacity","0" );
				});
			}

			//hide all colapses on top menu when colapsing another
			$(container).parent().find('.collapse').on(
					'show.bs.collapse',
					function(){
					$(this).parent().find('.collapse').not(this).collapse('hide');	
			});

		});
}

jQuery(function($){

	//



	//Adds support for masonry post grid
	$(window).load(function() {
		if ($('.rollie_grid').length){
			$('.rollie_grid').masonry({
				itemSelector: '.rollie_grid_item',
				columnWidth: '.rollie_grid_size',
				percentPosition: true
			});
		}
	});

	// swap titles in content-header
	if( $('.rollie_parent_title').hasClass('rollie_below_js')){
		$('.rollie_parent_title').insertAfter($('.rollie_parent_title').next());
	}



	//Padding bottom and transition calc for footer
	$( '.rollie_content_container_padding_bottom' ).css( "padding-bottom",$( '#rollie_footer' ).outerHeight() + "px" );
	$( '#rollie_footer' ).removeClass( "rollie_padding_footer_measure" );
	$( '#rollie_footer' ).addClass( "footer" );
	$( window ).scroll(
		function() {

			if ($( window ).scrollTop() + $( window ).height() > $( document ).height() - 140 ) {

				$( '#rollie_footer' ).addClass( "show" );
				$( '#rollie_footer' ).css( "opacity","100" );
			} else {
				$( '#rollie_footer' ).removeClass( "show" );
			}

		}
	);

	//top nav handler
	//top nav icons handler
	rollie_nav_handler( "#rollie_navbar_top", '.rollie_nav_top_2_js','#rollie_search_input_menu_top' , '#rollie_nav_top_2',true );
		
	//swiper for gallery if activated
	if ($( 'div.rollie_gallery_post_format' ).length) {
		$( this ).scrollTop( 0 );

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
	if ($( 'div.rollie_cat_swap_swiper' ).length) {
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
					700:{
						slidesPerView: 1,
					}
				}

			}
		);

	$( '[class^="rollie_current_cat_"], [class*=" rollie_current_cat_"]' ).each(
		function () {
			var classname   = this.className;
			var classsparts = classname.split( 'rollie_current_cat_' );
			var result      = classsparts[1];
			result          = result.split( " " )[0];

			result = parseInt( result );

			rolliecatswipper.slideToLoop( result );

		});
	}




	//mobile and desktop support for dropdowns
	$( ".rollie_dropdown_toogle" ).on('hover click',
		function(){
			var parent = $( this ).closest( 'a' );
			parent.bind( 'click', false );
		},
				function(){
					var parent = $( this ).closest( 'a' );
					parent.unbind( 'click', false );
					parent.blur();// Unfocus the element

		}
	);



	//adding nested comment 
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL  = window.location.search.substring( 1 ),
		sURLVariables = sPageURL.split( '&' ),
		sParameterName,
		i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split( '=' );

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent( sParameterName[1] );
			}
		}
	};

	var rollie_reply_id = getUrlParameter( 'replytocom' );

	if (rollie_reply_id) {
		rollie_reply_id = '#div-comment-' + rollie_reply_id;
		$( '.comment-respond' ).insertAfter( $( rollie_reply_id ).children().first() );
		
	}	

//inherit height of container for rollie_top_menu_icons  
$('.rollie_top_menu_icons').height($('#rollie_nav_top_2').height());

//set same width/height aspect ratio for elements rollie_top_menu_icons  menu

$('.rollie_top_menu_icons > button').each(function(){
	$(this).width($(this).height());
})

//proper control :focus pseudoclass  for elements in  rollie_top_menu_icons  menu
$('rollie_top_menu_icons').children().on('show.bs.collapse',function(){
//$(this).find('*').focus(); 
})
$('rollie_top_menu_icons').children().on('hide.bs.collapse',function(){
$(this).find('*').blur(); 
})


});
