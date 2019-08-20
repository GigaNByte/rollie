
function rollie_nav_handler( container , search_form , collapsing_container ){
	jQuery(
		function($){

			if($('.rollie_header_container').find(container).length ){
				console.log($('.rollie_header_wrapper').height() - $(container).parent().height());
				$('.rollie_header_wrapper').height($('.rollie_header_wrapper').height() - $(container).parent().height());
			}

			if ($( '.rollie_collapse_side_js' ).length ) {
				var rollie_collapse_side = true;
			} else {
				var rollie_collapse_side = false;
			}
			

			$(window).on('resize',function(){
				$(collapsing_container).collapse('hide');
				$(container).find('.rollie_navbar_toggler').blur();
				if (rollie_collapse_side){
					$(collapsing_container).insertBefore('.rollie_top_menu_icons');
				}

			});	
			
			var plus = 0;

			if ($(container).find('.rollie_top_menu_icons').length) {
			 plus = $(container).find('.rollie_top_menu_icons').outerWidth();
			}	
				plus = parseInt( plus );
			 

			if ($( container ).find('.navbar-nav').length) {

				var rollie_nav_l = $( container ).find('.navbar-nav').width();
				rollie_nav_l     = rollie_nav_l + plus;

				if (rollie_nav_l <= 576) {
					$( container ).addClass( 'navbar-expand-sm' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_xs' );					
				} else if ( (rollie_nav_l <= 768) && (rollie_nav_l > 576) ) {
					$( container ).addClass( 'navbar-expand-md' );

					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_sm' );					
				} else if ((rollie_nav_l <= 992) && (rollie_nav_l > 768) ) {
					$( container ).addClass( 'navbar-expand-lg' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_md' );					
				} else if ( (rollie_nav_l > 992 ) ) {
					$( container ).addClass( 'navbar-expand-xl' );
					$( '#rollie_search_input_menu_top' ).addClass( 'rollie_input_collap_lg' );					
				}

				$( container ).removeClass( 'navbar-expand invisible' );

		$( collapsing_container ).on(
					'show.bs.collapse',
					function () {	
					if (rollie_collapse_side){
						$(collapsing_container).insertAfter(container);
						$('.rollie_collapse_side_js').css('margin-top',$('#rollie_navbar_c').height()+"px");
					}else{
						$(collapsing_container).insertAfter('.rollie_top_menu_icons');
					}

					$(container).parent().find('.collapse.show').collapse('hide');	
			
						$('.navbar-nav' ).addClass( 'm-0' );
						$( '.rollie_collapse_side_overlay' ).css('display','block').css( "opacity","1" );
						
						$( document ).mouseup(
							function(e)
							{
								if ( ! $( "#rollie_navbar_c" ).is( e.target ) && $( "#rollie_navbar_c" ).has( e.target ).length === 0  ) {

									$( '#rollie_navbar_c > #rollie_search_input_menu_top' ).removeClass( "rollie_search_input_menu_top_mobile" ).css( 'display','none' ).css( 'visibility','hidden' );
									$("#rollie_navbar_top_container").collapse("hide");
								}
							}
							);
					}
					);

				$( collapsing_container ).on(
					'hidden.bs.collapse',
					function () {			
		
						$('.rollie_collapse_side_overlay').css('display','none').css( "opacity","0" );
						$('.navbar-nav').removeClass( 'm-0' );
						
						if (rollie_collapse_side){
							$('.rollie_collapse_side_js').css('margin-top','0');
							$(collapsing_container).insertBefore('.rollie_top_menu_icons');
						}else{
							$('.rollie_top_menu_icons').insertAfter(collapsing_container);
						}
					});

				$( collapsing_container ).on(
					'hide.bs.collapse',
					function () {		
					$(container).find('.rollie_navbar_toggler').blur();			
						$( '.rollie_collapse_side_overlay' ).css('display','none').css( "opacity","0" );

				});
			}

			//hide all colapses on top menu when colapsing another
			$(container).parent().find('.collapse').on(
					'show.bs.collapse',
					function(){
					$(this).parent().find('.collapse.show').not(this).collapse('hide');	
			
			});

		});
}

jQuery(function($){
	//top nav handler
	//top nav icons handler
	rollie_nav_handler( "#rollie_navbar_top",'#rollie_search_input_menu_top' , '#rollie_nav_top_main_container' );




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

	



	$( window ).scroll(
		function() {

			if ($( window ).scrollTop() + $( window ).height() > $( document ).height() - 140 ) {

				$( '#rollie_footer' ).addClass( "show" );
	
			} else {
				$( '#rollie_footer' ).removeClass( "show" );
			}

		}
	);


		
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

//support for multi level dropdown



$(".dropdown-submenu").on('hover',function() {
    $(this).siblings(".rollie_subdropdown").addClass("rollie_show_subdropdown");
});


$(".dropdown").on('mouseleave',function() {
    $(this).find(".rollie_subdropdown").removeClass("rollie_show_subdropdown");
});

$(".dropdown-submenu").siblings('.rollie_dropdown_toogle').on('click',function(){
$('.dropdown-menu').click(function(e) {
    e.stopPropagation();
}); 

});
	//mobile and desktop support for dropdowns



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

//prevent video loop to stop
$('.rollie_header_video').on('ended', function () {
  this.load();
  this.play();
});
$("video[autoplay]").each(function(){ this.play(); });

});
