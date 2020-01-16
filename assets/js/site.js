$(document).ready(function($){

  $('.eqHt').matchHeight();	
  
  $('#rotateText').typeIt({
    strings: ['Expert','Tax','Legal','Accounting'],
    speed: 300,
    deleteSpeed: 50,
    lifeLike: false,
    cursor: false, 
    breakLines: false,
    breakDelay: 1500,
    loop: true,
    html: false,
    autoStart: true
  });
  
  $('.slider').slider()
  
  $('.expertSummary').readmore({
    speed: 300,
    collapsedHeight: 30,
    lessLink: '<a href="#" class="read-more">Read Less</a>'
  });  

  $('.expertSkills').readmore({
    speed: 300,
    collapsedHeight: 20,
    moreLink:  '<a href="#" class="view-more">View More</a>',
    lessLink: '<a href="#" class="view-more">View Less</a>'
  });  

	$('.launch-modal').on('click', function(e){
		e.preventDefault();
		$( '#' + $(this).data('modal-id') ).modal();
		$("#frmLoginOfferType").val($(this).data('modal-value'));
                $("#frmLoginOfferType2").val($(this).data('modal-value'));
                
              
                
	});
    
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href") // activated tab
    alert(target);
    if(target =='#tab_cs') { window.location="http://google.com"; }
    if(target =='#tab_cma') { window.location="http://yahoo.com"; }

  });
  
	if ($('#btnShowSignup').length > 0) {
		$('#btnShowSignup').click(function(e){
  		$('#frmLoginTitle').text('Sign Up');
  		$('#frmLogin').slideUp('slow');
		$('#frmForgot').slideUp('slow');
  		$('#frmRegister').slideDown('slow');
      $('#frmLoginFooter').hide();
  		$('#frmRegisterFooter').show();
		});
	}
	if ($('#btnShowLogin').length > 0) {
		$('#btnShowLogin').click(function(e){
  		$('#frmLoginTitle').text('Login');
  		$('#frmRegister').slideUp('slow');
		$('#frmForgot').slideUp('slow');
  		$('#frmLogin').slideDown('slow');
  		$('#frmRegisterFooter').hide();
      $('#frmLoginFooter').show();
		});
	}
	if ($('#btnShowForgot').length > 0) {
		$('#btnShowForgot').click(function(e){
  		$('#frmLoginTitle').text('Forgot Password');
  		$('#frmForgot').slideDown('slow');
  		$('#frmRegister').slideUp('slow');
		$('#frmLogin').slideUp('slow');
		$('#frmLoginFooter').hide();
  		$('#frmRegisterFooter').show();
		});
	}




});
// END doc ready