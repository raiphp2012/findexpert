jQuery(window).load(function() {

	//
	// Flexslider
	//
	if( jQuery(".flexslider").length > 0) {
		jQuery(".flexslider").flexslider({
			'controlNav': false,
			'directionNav': true,
			'animation': ThemeOption.slider_effect,
			'slideDirection': ThemeOption.slider_direction,
			'slideshow': Boolean(ThemeOption.slider_autoslide),
			'slideshowSpeed': Number(ThemeOption.slider_speed),
			'animationDuration': Number(ThemeOption.slider_duration),
			'prevText': '',
			'nextText': ''
		});
	}

	loadAudioPlayer();

	jQuery('#entry-list').isotope({
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		itemSelector: 'article.entry',
		transformsEnabled: true
	});


	// Page width calculations

	jQuery(window).resize(setContainerWidth);
	var $box = jQuery(".box-item");

	function setContainerWidth() {
		var columnNumber = parseInt((jQuery(window).width()) / ($box.outerWidth(true))),
			containerWidth = (columnNumber * $box.outerWidth(true));

		if ( columnNumber > 1 )  {
			jQuery("#box-container").css("width",containerWidth+'px');
		} else {
			jQuery("#box-container").css("width", "100%");
		}
	}

	setContainerWidth();

	//bottom twitter widget, add flexslider classes
	var twitter_item  = jQuery("#bottom-widget .widget_ci_twitter_widget");
	if ( twitter_item.length ) {
		twitter_item.find('.tul').addClass("flexslider");
		twitter_item.find('ul').addClass("slides");

		twitter_item.flexslider({
			directionNav: false,
			controlNav: false
		});
	}

});

jQuery(document).ready(function($) {

	$.fn.formLabels();

	// Main navigation
	$('ul#navigation').superfish({
	    delay:       1000,
	    animation:   {opacity:'show'},
	    speed:       'fast',
	    dropShadows: false
	});

	/* -----------------------------------------
	 Responsive Menus Init with jPanelMenu
	 ----------------------------------------- */
	var jPM = $.jPanelMenu({
		menu: '#navigation',
		trigger: '.menu-trigger',
		excludedPanelContent: "style, script, #wpadminbar"
	});

	var jRes = jRespond([
		{
			label: 'mobile',
			enter: 0,
			exit: 767
		}
	]);

	jRes.addFunc({
		breakpoint: 'mobile',
		enter: function() {
			jPM.on();
			$("#jPanelMenu-menu").removeClass("sf-menu");
		},
		exit: function() {
			jPM.off();
		}
	});

	// FitVids
	$("body").fitVids();

	$(".fancybox").fancybox({
		fitToView	: true
	});
});

function loadAudioPlayer() {
	var audio = jQuery('.ci-audio');
	
	if ( audio.length ) {
		audio.not('.mejs-audio').mediaelementplayer();
	}
}
