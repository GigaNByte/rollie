jQuery( document ).ready(function($) {
	"use strict";


	function rollie_multiple_switch_underline()
	{
		$('.rollie_multiple_switch > input').each(function(){
			
			if ($(this).prop('checked')){
				$( this ).parent().addClass( "rollie_checked_style" );
				$(this).addClass( "rollie_checked" );
			}
			else{
				$( this ).parent().removeClass( "rollie_checked_style" );
				$(this).removeClass( "rollie_checked" );
			}
		});
	}
	function rollie_multiple_switch_hide_show_controler(rollie_input_name)
	{


		var rollie_mscc_id = '';

		$('.rollie_multiple_switch_row_js').find( 'input[name='+rollie_input_name+']').each(function(index){

			rollie_mscc_id = '';
			rollie_mscc_id = $(this).closest('.rollie_mscc_js').attr('rollie_mscc_attrs');

			if ($(this).is(":checked") ==  true) {
				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().attr('rollie_mscc_active','active');
				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().removeClass('rollie_multiple_switch_group_hidden_js').addClass('rollie_multiple_switch_group_js');
				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().last().addClass('rollie_multiple_switch_bb');
			} else {
				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().attr('rollie_mscc_active','disactive');
				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().removeClass('rollie_multiple_switch_group_js').addClass('rollie_multiple_switch_group_hidden_js');

				$(this).closest('li').nextAll().prev("[rollie_mscc_attrs = " + rollie_mscc_id + "]").next().last().removeClass('rollie_multiple_switch_bb');
			}

		});


	}
	function rollie_multiple_switch()
	{
		rollie_multiple_switch_underline();

		$(".rollie_multiple_switch > input").on("change", rollie_multiple_switch_underline);

		var rollie_input_name = '';

		$('.rollie_multiple_switch_row_js').each(function() {

			rollie_input_name = '';
			rollie_input_name = $(this).find('input').attr('name');


	rollie_multiple_switch_hide_show_controler(rollie_input_name); //on document ready
	 $(this).find('input').on("change",function(){//on change
	 	rollie_input_name = $(this).attr('name');
	 	rollie_multiple_switch_hide_show_controler(rollie_input_name);
	 });

	});


	}

	function rollie_collapse_label_toggle_controler (selector_name,on_doc_ready)
	{
		var	value = $(selector_name).attr('rollie_collapse_elements');

		if ($(selector_name).attr('rollie_open_close_auto') == 'true'){
			$(selector_name).parent().next().css('margin-top','0');
			$(selector_name).parent().css('margin-bottom','0');
			$(selector_name).children().first().css('margin-top','0');
			$(selector_name).parent().nextAll().eq(parseInt(value)-1).addClass('rollie_collapse_bb');

		}



		$(selector_name).parent().nextAll('li').each(function( index ) {
			var tr = true;
			if(!on_doc_ready)
			{


				if (($(this).attr('rollie_mscc_active') == 'disactive'))
				{
					tr=false;
				}

			}
			if (value  !== 'undefined'  && index <  value){



				if( ! $( this ).hasClass('rollie_collapse_label_show_flag')  )   {	


					$(this).addClass('rollie_collapse_label_show_flag');
					if (tr)
					{
			$(this).removeClass('rollie_multiple_switch_group_hidden_js').addClass('rollie_multiple_switch_group_js');//	i couldnt do this because another my custom control manipulate visiblity at the same area if( $( this ).css('visibility') == 'hidden')
		}

	}
	else{


		$(this).removeClass('rollie_multiple_switch_group_js  rollie_collapse_label_show_flag').addClass('rollie_multiple_switch_group_hidden_js');
	}

}	
});
	}

	function rollie_collapse_label_toggle ()
	{	


		$('.rollie_collapse_label_toggle').each(function(){
			rollie_collapse_label_toggle_controler(this,true);
		});
		$( '.rollie_collapse_label_toggle' ).on( "click", function() { 
			rollie_collapse_label_toggle_controler(this,false);
		});
	}

	rollie_collapse_label_toggle ();
	rollie_multiple_switch();
	$('.rollie_collapse_label_toggle').each(function(){
		rollie_collapse_label_toggle_controler(this,true);
	});





	$( ".rollie_font_reset" ).on( "click", function() {
		var rollie_object_name = $(this).attr("object_name");
		var rollie_def = $(this).attr('default');
		console.log(rollie_def);
		var rollie_object_frontend_class = rollie_object_name.replace("_obj", "");


		wp.customize( rollie_object_name ).set(rollie_def);	

		$(".rollie_fonts_list").val($(".rollie_fonts_list").attr("rollie-reset-value"));
		$(".rollie_regularweight").val($(".rollie_regularweight").attr("rollie-reset-value"));
		$(".rollie_italicweight").val($(".rollie_italicweight").attr("rollie-reset-value"));
		$(".rollie_boldweight").val($(".rollie_boldweight").attr("rollie-reset-value"));
		$(".rollie_subsets").val($(".rollie_subsets").attr("rollie-reset-value"));
		$(".rollie_font_category").val($(".rollie_font_category").attr("rollie-reset-value"));
		$(".rollie_fonts_list,.rollie_regularweight,.rollie_italicweight,.rollie_boldweight,.rollie_subsets,.rollie_font_category").trigger('change');
	})


	/**
	 * TinyMCE Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	 $('.customize-control-tinymce-editor').each(function(){
		// Get the toolbar strings that were passed from the PHP Class
		var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('id')].skyrockettinymcetoolbar1;
		var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('id')].skyrockettinymcetoolbar2;

		wp.editor.initialize( $(this).attr('id'), {
			tinymce: {
				wpautop: true,
				toolbar1: tinyMCEToolbar1String,
				toolbar2: tinyMCEToolbar2String
			},
			quicktags: true
		});
	});
	 $(document).on( 'tinymce-editor-init', function( event, editor ) {
	 	editor.on('change', function(e) {
	 		tinyMCE.triggerSave();
	 		$('#'+editor.id).trigger('change');
	 	});
	 });
	/**
	 * Googe Font Select Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	 $('.google-fonts-list').each(function (i, obj) {
	 	if (!$(obj).hasClass('select2-hidden-accessible')) {
	 		$(obj).select2();
	 	}
	 });
	 $('.rollie_font_reset').on('click', function (){
	 	$('.google-fonts-list').each(function (i, obj) {
	 		if (!$(obj).hasClass('select2-hidden-accessible')) {
	 			$(obj).select2();
	 		}
	 	});
	 });
	 $('.google-fonts-list').on('change', function() {
		/*		if (data.isreset==true)
		{
			var rollie_regularweight= $(".rollie_regularweight").attr("rollie-reset-value");
		 var rollie_italicweight = $(".rollie_italicweight").attr("rollie-reset-value");
		 var rollie_boldweight = $(".rollie_boldweight").attr("rollie-reset-value");
		 var rollie_subsets = $(".rollie_subsets").attr("rollie-reset-value");
		  var rollie_category = $(".rollie_font_category").attr("rollie-reset-value");

		 $(".rollie_regularweight").val(rollie_regularweight);
		 $(".rollie_italicweight").val(rollie_italicweight);
		 $(".rollie_boldweight").val(rollie_boldweight);
		 $(".rollie_subsets").val(rollie_subsets);
		  $(".rollie_font_category").val(rollie_category);
		 $(".rollie_regularweight option[value="+rollie_regularweight+"]").attr('selected', 'selected');
		 $(".rollie_italicweight option[value="+rollie_italicweight+"]").attr('selected', 'selected');
		 $(".rollie_boldweight option[value="+rollie_boldweight+"]").attr('selected', 'selected');
		 $(".rollie_subsets option[value="+rollie_subsets+"]").attr('selected', 'selected');
		}
		*/
		var elementRegularWeight = $(this).parent().parent().find('.google-fonts-regularweight-style');
		var elementItalicWeight = $(this).parent().parent().find('.google-fonts-italicweight-style');
		var elementBoldWeight = $(this).parent().parent().find('.google-fonts-boldweight-style');
		var elementSubsetsWeight = $('.google-fonts-list').parent().parent().find('.google-fonts-subsets-style');
		var selectedFont = $(this).val();
		var customizerControlName = $(this).attr('control-name');
		var elementItalicWeightCount = 0;
		var elementBoldWeightCount = 0;

		// Clear Weight/Style dropdowns
		elementRegularWeight.empty();
		elementItalicWeight.empty();
		elementBoldWeight.empty();
		elementSubsetsWeight.empty();
		// Make sure Italic & Bold dropdowns are enabled
		elementItalicWeight.prop('disabled', false);
		elementBoldWeight.prop('disabled', false);

		// Get the Google Fonts control object
		var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

		// Find the index of the selected font
		var indexes = $.map(bodyfontcontrol.skyrocketfontslist, function(obj, index) {
			if(obj.family === selectedFont) {
				return index;
			}
		});
		var index = indexes[0];

		// For the selected Google font show the available weight/style variants
		$.each(bodyfontcontrol.skyrocketfontslist[index].variants, function(val, text) {
			elementRegularWeight.append(
				$('<option></option>').val(text).html(text)
				);
			if (text.indexOf("italic") >= 0) {
				elementItalicWeight.append(
					$('<option></option>').val(text).html(text)
					);
				elementItalicWeightCount++;
			} else {
				elementBoldWeight.append(
					$('<option></option>').val(text).html(text)
					);
				elementBoldWeightCount++;
			}
		});

		if(elementItalicWeightCount == 0) {
			elementItalicWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
				);
			elementItalicWeight.prop('disabled', 'disabled');
		}
		if(elementBoldWeightCount == 0) {
			elementBoldWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
				);
			elementBoldWeight.prop('disabled', 'disabled');
		}
		
		$.each(bodyfontcontrol.skyrocketfontslist[index].subsets, function(val, text) {
			elementSubsetsWeight.append(
				$('<option></option>').val(text).html(text)
				);
		});
		
		// Update the font category based on the selected font
		$(this).parent().parent().find('.google-fonts-category').val(bodyfontcontrol.skyrocketfontslist[index].category);

		skyrocketGetAllSelects($(this).parent().parent());

	});





	 $('.rollie_font_reset').on('click', function() {

	 	var ul_class=$(this).parent().parent().parent();

	 	var font_list = $( ul_class ).find($(".google-fonts-list"));
	 	var elementRegularWeight = $(font_list).parent().parent().find('.google-fonts-regularweight-style');
	 	var elementItalicWeight = $(font_list).parent().parent().find('.google-fonts-italicweight-style');
	 	var elementBoldWeight = $(font_list).parent().parent().find('.google-fonts-boldweight-style');
	 	var elementSubsetsWeight = $(font_list).parent().parent().find('.google-fonts-subsets-style');
	 	var selectedFont = $(font_list).val();
	 	var customizerControlName = $(font_list).attr('control-name');
	 	var elementItalicWeightCount = 0;
	 	var elementBoldWeightCount = 0;

		// Clear Weight/Style dropdowns
		elementRegularWeight.empty();
		elementItalicWeight.empty();
		elementBoldWeight.empty();
		elementSubsetsWeight.empty();
		// Make sure Italic & Bold dropdowns are enabled
		elementItalicWeight.prop('disabled', false);
		elementBoldWeight.prop('disabled', false);


		// Get the Google Fonts control object
		var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

		// Find the index of the selected font
		var indexes = $.map(bodyfontcontrol.skyrocketfontslist, function(obj, index) {
			if(obj.family === selectedFont) {
				return index;
			}
		});
		var index = indexes[0];

		// For the selected Google font show the available weight/style variants
		$.each(bodyfontcontrol.skyrocketfontslist[index].variants, function(val, text) {
			elementRegularWeight.append(
				$('<option></option>').val(text).html(text)
				);
			if (text.indexOf("italic") >= 0) {
				elementItalicWeight.append(
					$('<option></option>').val(text).html(text)
					);
				elementItalicWeightCount++;
			} else {
				elementBoldWeight.append(
					$('<option></option>').val(text).html(text)
					);
				elementBoldWeightCount++;
			}
		});

		if(elementItalicWeightCount == 0) {
			elementItalicWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
				);
			elementItalicWeight.prop('disabled', 'disabled');
		}
		if(elementBoldWeightCount == 0) {
			elementBoldWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
				);
			elementBoldWeight.prop('disabled', 'disabled');
		}
		
		$.each(bodyfontcontrol.skyrocketfontslist[index].subsets, function(val, text) {
			elementSubsetsWeight.append(
				$('<option></option>').val(text).html(text)
				);
		});
		
		// Update the font category based on the selected font

		skyrocketGetAllSelects($(this).parent().parent());
		$(this).parent().parent().find('.google-fonts-category').val(bodyfontcontrol.skyrocketfontslist[index].category);
		var rollie_regularweight= $(ul_class).find(".rollie_regularweight").attr("rollie-reset-value");
		var rollie_italicweight = $(ul_class).find(".rollie_italicweight").attr("rollie-reset-value");
		var rollie_boldweight = $(ul_class).find(".rollie_boldweight").attr("rollie-reset-value");
		var rollie_subsets = $(ul_class).find(".rollie_subsets").attr("rollie-reset-value");
		var rollie_category = $(ul_class).find(".rollie_font_category").attr("rollie-reset-value");

		$(ul_class).find(".rollie_regularweight").val(rollie_regularweight);
		$(ul_class).find(".rollie_italicweight").val(rollie_italicweight);
		$(ul_class).find(".rollie_boldweight").val(rollie_boldweight);
		$(ul_class).find(".rollie_subsets").val(rollie_subsets);
		$(ul_class).find(".rollie_font_category").val(rollie_category);
		$(ul_class).find(".rollie_regularweight option[value="+rollie_regularweight+"]").attr('selected', 'selected');
		$(ul_class).find(".rollie_italicweight option[value="+rollie_italicweight+"]").attr('selected', 'selected');
		$(ul_class).find(".rollie_boldweight option[value="+rollie_boldweight+"]").attr('selected', 'selected');
		$(ul_class).find(".rollie_subsets option[value="+rollie_subsets+"]").attr('selected', 'selected');
	});
	 $('.google_fonts_select_control select').on('change', function() {
	 	skyrocketGetAllSelects($(this).parent().parent());
	 });
	 $('.rollie_font_reset').on('click', function() {
	 	skyrocketGetAllSelectsreset($(this).parent().parent().parent());		
	 });



	 function skyrocketGetAllSelects($element) {
	 	var selectedFont = {
	 		font: $element.find('.google-fonts-list').val(),
	 		regularweight: $element.find('.google-fonts-regularweight-style').val(),
	 		italicweight: $element.find('.google-fonts-italicweight-style').val(),
	 		boldweight: $element.find('.google-fonts-boldweight-style').val(),
	 		subsets: $element.find('.google-fonts-subsets-style').val(),
	 		category: $element.find('.google-fonts-category').val()
	 	};


		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
	}
	function skyrocketGetAllSelectsreset($element) {

		var selectedFont = {
			font: $element.find(".rollie_fonts_list").attr("rollie-reset-value"),
			regularweight: $element.find(".rollie_regularweight").attr("rollie-reset-value"),
			italicweight:  $element.find(".rollie_italicweight").attr("rollie-reset-value"),
			boldweight: $element.find(".rollie_boldweight").attr("rollie-reset-value"),
			subsets:  $element.find(".rollie_subsets").attr("rollie-reset-value"),
			category: $element.find('.google-fonts-category').val(),
		};

		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
	}
	
	/**
	 * Slider Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	// Set our slider defaults and initialise the slider
	$('.slider-custom-control').each(function(){
		var sliderValue = $(this).find('.customize-control-slider-value').val();
		var newSlider = $(this).find('.slider');
		var sliderMinValue = parseFloat(newSlider.attr('slider-min-value'));
		var sliderMaxValue = parseFloat(newSlider.attr('slider-max-value'));
		var sliderStepValue = parseFloat(newSlider.attr('slider-step-value'));

		newSlider.slider({
			value: sliderValue,
			min: sliderMinValue,
			max: sliderMaxValue,
			step: sliderStepValue,
			change: function(e,ui){
				// Important! When slider stops moving make sure to trigger change event so Customizer knows it has to save the field
				$(this).parent().find('.customize-control-slider-value').trigger('change');
			}
		});
	});

	// Change the value of the input field as the slider is moved
	$('.slider').on('slide', function(event, ui) {
		$(this).parent().find('.customize-control-slider-value').val(ui.value);
	});

	// Reset slider and input field back to the default value
	$('.slider-reset').on('click', function() {
		var resetValue = $(this).attr('rollie-reset-value');
		$(this).parent().find('.customize-control-slider-value').val(resetValue);
		$(this).parent().find('.slider').slider('value', resetValue);

	});

	// Update slider if the input field loses focus as it's most likely changed
	$('.customize-control-slider-value').blur(function() {
		var resetValue = $(this).val();
		var slider = $(this).parent().find('.slider');
		var sliderMinValue = parseInt(slider.attr('slider-min-value'));
		var sliderMaxValue = parseInt(slider.attr('slider-max-value'));

		// Make sure our manual input value doesn't exceed the minimum & maxmium values
		if(resetValue < sliderMinValue) {
			resetValue = sliderMinValue;
			$(this).val(resetValue);
		}
		if(resetValue > sliderMaxValue) {
			resetValue = sliderMaxValue;
			$(this).val(resetValue);
		}
		$(this).parent().find('.slider').slider('value', resetValue);
	});
	


	function rollie_add_panel_icon(rollie_panel_slug,dashicon_classes)
	{
		$("li[aria-owns='sub-accordion-"+rollie_panel_slug+"']>h3").prepend('<span class="dashicons '+dashicon_classes+'"></span>')	;
	}

	rollie_add_panel_icon ('panel-rollie_grid_meta_panel','dashicons-layout');
	rollie_add_panel_icon ('panel-rollie_font_panel','dashicons-editor-textcolor');
	rollie_add_panel_icon ('panel-rollie_misc_panel','dashicons-admin-settings');
	rollie_add_panel_icon ('panel-rollie_color_design_panel','dashicons-admin-customizer');
	rollie_add_panel_icon ('panel-rollie_post_formats_panel','dashicons-format-status');

	rollie_add_panel_icon ('section-rollie_sidebar_section','dashicons-exerpt-view');
	rollie_add_panel_icon ('section-rollie_comments_section','dashicons-admin-comments');
	rollie_add_panel_icon ('section-rollie_buttons_section','dashicons-admin-collapse');
	rollie_add_panel_icon ('section-rollie_search_form_section','dashicons-search');
	rollie_add_panel_icon ('section-rollie_icons_section','dashicons-menu');
	rollie_add_panel_icon ('section-rollie_theme_colors_section','dashicons-admin-customizer');




	// Loop over each control and transform it into our color picker.
	$( '.alpha-color-control' ).each( function() {

		// Scope the vars.
		var $control, startingColor, paletteInput, showOpacity, defaultColor, palette,
		colorPickerOptions, $container, $alphaSlider, alphaVal, sliderOptions;

		// Store the control instance.
		$control = $( this );

		// Get a clean starting value for the option.
		startingColor = $control.val().replace( /\s+/g, '' );

		// Get some data off the control.
		paletteInput = $control.attr( 'data-palette' );
		showOpacity  = $control.attr( 'data-show-opacity' );
		defaultColor = $control.attr( 'data-default-color' );

		// Process the palette.
		if ( paletteInput.indexOf( '|' ) !== -1 ) {
			palette = paletteInput.split( '|' );
		} else if ( 'false' == paletteInput ) {
			palette = false;
		} else {
			palette = true;
		}

		// Set up the options that we'll pass to wpColorPicker().
		colorPickerOptions = {
			change: function( event, ui ) {
				var key, value, alpha, $transparency;

				key = $control.attr( 'data-customize-setting-link' );
				value = $control.wpColorPicker( 'color' );

				// Set the opacity value on the slider handle when the default color button is clicked.
				if ( defaultColor == value ) {
					alpha = acp_get_alpha_value_from_color( value );
					$alphaSlider.find( '.ui-slider-handle' ).text( alpha );
				}

				// Send ajax request to wp.customize to trigger the Save action.
				wp.customize( key, function( obj ) {
					obj.set( value );
				});

				$transparency = $container.find( '.transparency' );

				// Always show the background color of the opacity slider at 100% opacity.
				$transparency.css( 'background-color', ui.color.toString( 'no-alpha' ) );
			},
			palettes: palette // Use the passed in palette.
		};

		// Create the colorpicker.
		$control.wpColorPicker( colorPickerOptions );

		$container = $control.parents( '.wp-picker-container:first' );

		// Insert our opacity slider.
		$( '<div class="alpha-color-picker-container">' +
			'<div class="min-click-zone click-zone"></div>' +
			'<div class="max-click-zone click-zone"></div>' +
			'<div class="alpha-slider"></div>' +
			'<div class="transparency"></div>' +
			'</div>' ).appendTo( $container.find( '.wp-picker-holder' ) );

		$alphaSlider = $container.find( '.alpha-slider' );

		// If starting value is in format RGBa, grab the alpha channel.
		alphaVal = acp_get_alpha_value_from_color( startingColor );

		// Set up jQuery UI slider() options.
		sliderOptions = {
			create: function( event, ui ) {
				var value = $( this ).slider( 'value' );

				// Set up initial values.
				$( this ).find( '.ui-slider-handle' ).text( value );
				$( this ).siblings( '.transparency ').css( 'background-color', startingColor );
			},
			value: alphaVal,
			range: 'max',
			step: 1,
			min: 0,
			max: 100,
			animate: 300
		};

		// Initialize jQuery UI slider with our options.
		$alphaSlider.slider( sliderOptions );

		// Maybe show the opacity on the handle.
		if ( 'true' == showOpacity ) {
			$alphaSlider.find( '.ui-slider-handle' ).addClass( 'show-opacity' );
		}

		// Bind event handlers for the click zones.
		$container.find( '.min-click-zone' ).on( 'click', function() {
			acp_update_alpha_value_on_color_control( 0, $control, $alphaSlider, true );
		});
		$container.find( '.max-click-zone' ).on( 'click', function() {
			acp_update_alpha_value_on_color_control( 100, $control, $alphaSlider, true );
		});

		// Bind event handler for clicking on a palette color.
		$container.find( '.iris-palette' ).on( 'click', function() {
			var color, alpha;

			color = $( this ).css( 'background-color' );
			alpha = acp_get_alpha_value_from_color( color );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );

			// Sometimes Iris doesn't set a perfect background-color on the palette,
			// for example rgba(20, 80, 100, 0.3) becomes rgba(20, 80, 100, 0.298039).
			// To compensante for this we round the opacity value on RGBa colors here
			// and save it a second time to the color picker object.
			if ( alpha != 100 ) {
				color = color.replace( /[^,]+(?=\))/, ( alpha / 100 ).toFixed( 2 ) );
			}

			$control.wpColorPicker( 'color', color );
		});

		// Bind event handler for clicking on the 'Clear' button.
		$container.find( '.button.wp-picker-clear' ).on( 'click', function() {
			var key = $control.attr( 'data-customize-setting-link' );

			// The #fff color is delibrate here. This sets the color picker to white instead of the
			// defult black, which puts the color picker in a better place to visually represent empty.
			$control.wpColorPicker( 'color', '#ffffff' );

			// Set the actual option value to empty string.
			wp.customize( key, function( obj ) {
				obj.set( '' );
			});

			acp_update_alpha_value_on_alpha_slider( 100, $alphaSlider );
		});

		// Bind event handler for clicking on the 'Default' button.
		$container.find( '.button.wp-picker-default' ).on( 'click', function() {
			var alpha = acp_get_alpha_value_from_color( defaultColor );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
		});

		// Bind event handler for typing or pasting into the input.
		$control.on( 'input', function() {
			var value = $( this ).val();
			var alpha = acp_get_alpha_value_from_color( value );

			acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
		});

		// Update all the things when the slider is interacted with.
		$alphaSlider.slider().on( 'slide', function( event, ui ) {
			var alpha = parseFloat( ui.value ) / 100.0;

			acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, false );

			// Change value shown on slider handle.
			$( this ).find( '.ui-slider-handle' ).text( ui.value );
		});

	});






});



/**
 * Alpha Color Picker JS
 *
 * This file includes several helper functions and the core control JS.
 */

/**
 * Override the stock color.js toString() method to add support for
 * outputting RGBa or Hex.
 */
 Color.prototype.toString = function( flag ) {

	// If our no-alpha flag has been passed in, output RGBa value with 100% opacity.
	// This is used to set the background color on the opacity slider during color changes.
	if ( 'no-alpha' == flag ) {
		return this.toCSS( 'rgba', '1' ).replace( /\s+/g, '' );
	}

	// If we have a proper opacity value, output RGBa.
	if ( 1 > this._alpha ) {
		return this.toCSS( 'rgba', this._alpha ).replace( /\s+/g, '' );
	}

	// Proceed with stock color.js hex output.
	var hex = parseInt( this._color, 10 ).toString( 16 );
	if ( this.error ) { return ''; }
	if ( hex.length < 6 ) {
		for ( var i = 6 - hex.length - 1; i >= 0; i-- ) {
			hex = '0' + hex;
		}
	}

	return '#' + hex;
};

/**
 * Given an RGBa, RGB, or hex color value, return the alpha channel value.
 */
 function acp_get_alpha_value_from_color( value ) {
 	var alphaVal;

	// Remove all spaces from the passed in value to help our RGBa regex.
	value = value.replace( / /g, '' );

	if ( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ ) ) {
		alphaVal = parseFloat( value.match( /rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1] ).toFixed(2) * 100;
		alphaVal = parseInt( alphaVal );
	} else {
		alphaVal = 100;
	}

	return alphaVal;
}

/**
 * Force update the alpha value of the color picker object and maybe the alpha slider.
 */
 function acp_update_alpha_value_on_color_control( alpha, $control, $alphaSlider, update_slider ) {
 	var iris, colorPicker, color;

 	iris = $control.data( 'a8cIris' );
 	colorPicker = $control.data( 'wpWpColorPicker' );

	// Set the alpha value on the Iris object.
	iris._color._alpha = alpha;

	// Store the new color value.
	color = iris._color.toString();

	// Set the value of the input.
	$control.val( color );

	// Update the background color of the color picker.
	colorPicker.toggler.css({
		'background-color': color
	});

	// Maybe update the alpha slider itself.
	if ( update_slider ) {
		acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider );
	}

	// Update the color value of the color picker object.
	$control.wpColorPicker( 'color', color );
}

/**
 * Update the slider handle position and label.
 */
 function acp_update_alpha_value_on_alpha_slider( alpha, $alphaSlider ) {
 	$alphaSlider.slider( 'value', alpha );
 	$alphaSlider.find( '.ui-slider-handle' ).text( alpha.toString() );
 }

