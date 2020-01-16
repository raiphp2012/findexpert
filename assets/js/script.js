
// $('.content-full-height').css({
// 	'min-height': window.outerHeight - 175 + 'px'
// })
// $('.view-profile').css({
// 	'min-height': window.outerHeight - 175 + 'px'
// })
// $('.sidenavDark').css({
// 	'min-height': $('.view-profile').height() + 'px'
// })
// $('.profile-details-wrapper').css({
// 	'min-height': $('.view-profile').height() + 'px'
// })
$( window ).resize(function() {
  	$('.content-full-height').css({
	'min-height': window.outerHeight - 175 + 'px'
	})
	$('.view-profile').css({
		'min-height': window.outerHeight - 175 + 'px'
	})
	$('.sidenavDark').css({
		'min-height': $('.view-profile').height() + 'px'
	})
	$('.profile-details-wrapper').css({
		'min-height': $('.view-profile').height() + 'px'
	})
}).resize();