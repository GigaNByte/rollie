
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


function rollie_nav_handler( container ,ul, list , containerid ,executing_first)
{
	jQuery(
		function($){
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

						$( containerid ).css( "top",collapse_margin + "px" );

					}
				}
			);

	

			if ($( list ).length) {
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
					$( list ).addClass( 'mx-sm-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_xs' );
					if (rollie_collapse_side) {

						 $( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_xs' );

					}
				} else if ( (rollie_nav_l <= 768) && (rollie_nav_l > 576) ) {

					$( container ).addClass( 'navbar-expand-md' );
					 $( list ).addClass( 'mx-md-0' );
					 $( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_sm' );
					if (rollie_collapse_side) {
						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_sm' );

					}
				} else if ((rollie_nav_l <= 992) && (rollie_nav_l > 768) ) {
					$( container ).addClass( 'navbar-expand-lg' );
					$( list ).addClass( 'mx-lg-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_md' );
					if (rollie_collapse_side) {

						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_md' );

					}
				} else if ( (rollie_nav_l > 992 ) ) {
					$( container ).addClass( 'navbar-expand-xl' );
					$( list ).addClass( 'mx-xl-0' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_lg' );
					if (rollie_collapse_side) {
						$( '.rollie_collapse_side_js' ).addClass( 'rollie_collapse_lg' );
					}
					
				}

				 $( container ).removeClass( ' navbar-expand invisible' );

				var rollie_backgroundc = $( '.rollie_navbar_color' ).css( "background-color" );

				 var rollie_backgroundcmod = rgb2hex( rollie_backgroundc );
				 rollie_backgroundcmod     = hexToRgbA( rollie_backgroundcmod ,'0.92' );

				$( containerid ).on(
					'show.bs.collapse',
					function () {		
																		
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

				$( containerid ).on(
					'hidden.bs.collapse',
					function () {					
						$( '.rollie_collapse_side_overlay' ).css('display','none').css( "opacity","0" );
						$( '.rollie_navbar_color' ).css( "background-color",rollie_backgroundc );
						$( ul ).removeClass( 'm-0' );

					}
				);
				$( containerid ).on(
					'hide.bs.collapse',
					function () {					
						$( '.rollie_collapse_side_overlay' ).css('display','none').css( "opacity","0" );
				

					}
				);
			}

			
	$(".rollie_search_button_standalone").on('click',function(){
		if ($('#rollie_search_input_menu_top').css("display") == 'none'){
			$('#rollie_search_input_menu_top').css("display",'block');
	}else{
	$('#rollie_search_input_menu_top').css("display",'none');
	}	

	});

});
}
//Adds support for masonry post grid
jQuery(function($){
		//hides image broken Icon 

$(window).load(function() {
	if ($('.rollie_grid').length){
	$('.rollie_grid').masonry({
	  itemSelector: '.rollie_grid_item',
	columnWidth: '.rollie_grid_size',
	percentPosition: true
	});
}
});

		if( $('.rollie_parent_title').hasClass('rollie_below_js')){
		$('.rollie_parent_title').insertAfter($('.rollie_parent_title').next());

		}
	
		
		


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


		rollie_nav_handler( ".rollie_nav_top_2_nav_js", '.rollie_nav_top_2_js','.rollie_nav_form' , '#rollie_nav_top_2',true );
		

		$( '.rollie_collapse_side_js.collapse > ul' ).css( "display","flex" );		

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
			)

			$( '[class^="rollie_current_cat_"], [class*=" rollie_current_cat_"]' ).each(
				function () {
					var classname   = this.className;
					var classsparts = classname.split( 'rollie_current_cat_' );
					var result      = classsparts[1];
					result          = result.split( " " )[0];

					result = parseInt( result );

					rolliecatswipper.slideToLoop( result );

				}
			);
		}

		$( ".rollie_dropdown_toogle" ).hover(
			function(){
				var parent = $( this ).closest( 'a' );
				parent.bind( 'click', false );
			},
			function(){// On mouse leave
				var parent = $( this ).closest( 'a' );
				parent.unbind( 'click', false );
				parent.blur();// Unfocus the element

			}
		);

		$( ".rollie_dropdown_toogle" ).click(
			function() {

				var parent = $( this ).closest( 'a' );
				parent.bind( 'click', false );
			},
			function(){// On mouse leave
				var parent = $( this ).closest( 'a' );
				parent.unbind( 'click', false );
				parent.blur();
			}
		);

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

		// nested comment form
		var rollie_reply_id = getUrlParameter( 'replytocom' );

		if (rollie_reply_id) {
			rollie_reply_id = '#div-comment-' + rollie_reply_id;
			$( '.comment-respond' ).insertAfter( $( rollie_reply_id ).children().first() );
			
		}

	}
	 

);
