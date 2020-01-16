$(function() {

    $('#side-menu').metisMenu();

});

var baseUrl = getRootUrl();


//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(document).ready(function(){
						   
$('#attribute_id').change(function(){
	var attribute_id = $(this).val();
	if(attribute_id == '1' || attribute_id == '2' || attribute_id == '3' || attribute_id == '4' || attribute_id == '5' || attribute_id == '6' || attribute_id == '7')
	{
		$('#fck-editor').show();	
		$('#normal-editor').hide();
		$('#normal-editor').val('');
	}
	else
	{
		$('#normal-editor').show();	
		$('#fck-editor').hide();
		$('#fck-editor').val('');
	}
});

$('#btn-update-order').click(function(){
$.ajax({
			url: baseUrl+"admin/update_image_order", 
			type: 'post',
			data: $('#frmSortOrder').serialize(),
			success: function(){
				window.location.reload();

		},
		
	});
return false;
});
});
function delete_category_image(category_id)
{
	if(confirm('Are sure to delete image ?'))
	{
		$.ajax({
			url: baseUrl+"admin/delete_category_image", 
			type: 'post',
			data: {'category_id':category_id},
			success: function(){
				window.location.reload();
		},
		
	});	
	}
}

function delete_brand_image(brand_id)
{
	if(confirm('Are sure to delete image ?'))
	{
		$.ajax({
			url: baseUrl+"admin/delete_brand_image", 
			type: 'post',
			data: {'brand_id':brand_id},
			success: function(){
				window.location.reload();
		},
		
	});	
	}
}


function delete_product_image(image_id)
{
	if(confirm('Are sure to delete image ?'))
	{
		$.ajax({
			url: baseUrl+"admin/delete_product_image", 
			type: 'post',
			data: {'image_id':image_id},
			success: function(){
				$('#img-'+image_id).remove();
		},
		
	});	
	}
}

function change_theme(theme)
{
	$.ajax({
			url: baseUrl+"admin/change_theme", 
			type: 'post',
			data: {'theme':theme},
			success: function(){
				window.location.reload();
		},
		
	});		
}

function change_default_image(image_id,product_id)
{
	
	$.ajax({
			url: baseUrl+"admin/change_default_image", 
			type: 'post',
			dataType: 'json',
			data: {'image_id':image_id,'product_id':product_id},
			success: function(result){
				window.location.reload();
		},
		
		});
}

function change_project_default_image(image_id,product_id)
{
	
	$.ajax({
			url: baseUrl+"admin/change_project_default_image", 
			type: 'post',
			dataType: 'json',
			data: {'image_id':image_id,'project_id':product_id},
			success: function(result){
				window.location.reload();
		},
		
		});
}



function getRootUrl() {
	return window.location.origin?window.location.origin+'/':window.location.protocol+'/'+window.location.host+'/';
}


