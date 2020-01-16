<?php
function PopupPro_javascript($delay=10)
	{
?>
<script type="text/javascript">
jQuery(document).ready(function() {	

	
	jQuery('#popuppro').click(function(e) {
		e.preventDefault();
		
		
		var id = jQuery(this).attr('href');
		var maskHeight = jQuery(document).height();
		var maskWidth = jQuery(window).width();
		jQuery('#ppmask').css({'width':maskWidth,'height':maskHeight});
		jQuery('#ppmask').fadeIn(1000);	
		jQuery('#ppmask').fadeTo("slow",0.8);	
		var winH = jQuery(window).height();
		var winW = jQuery(window).width();
		jQuery(id).css('top',  winH/2-jQuery(id).height()/2);
		jQuery(id).css('left', winW/2-jQuery(id).width()/2);
		jQuery(id).fadeIn(400);
	
	});
	jQuery('.window .close').click(function (e) {
		e.preventDefault();
		jQuery.cookie('popup_hide','true',{path: '/'});
		jQuery('#ppmask').hide();
		jQuery('.window').hide();
	});		
	
	jQuery(document).keyup(function(e) {
  	if (e.keyCode == 27) { jQuery('.window .close').click(); }
});

jQuery("#popuppro").bind('click',function()
{
	return false;
});
if ( jQuery.cookie('popup_hide') != 'true' )
{  

	setTimeout( function() {
		jQuery('#popuppro').click();
	}, <?php echo esc_js( $delay ) ?> );
}
});



</script>

<?php
}
?>
