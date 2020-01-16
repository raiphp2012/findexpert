$(document).ready(function($){

  $('.eqHt').matchHeight();	
  
  $('#rotateText').typeIt({
    strings: ['Expert','Tax','Financial','Legal','Secretarial'],
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
    collapsedHeight: 60,
    lessLink: '<a href="#">Read Less</a>'
  });  

	$('.launch-modal').on('click', function(e){
		e.preventDefault();
		$( '#' + $(this).data('modal-id') ).modal();
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
      $('#frmForgetFooter').hide();
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
      $('#frmForgetFooter').hide();
      $('#frmLoginFooter').show();
     

		});
	}

  if ($('#btnShowForgot').length > 0) {
$('#btnShowForgot').click(function(e){
  $('#frmLoginTitle').text('Forgot Password');
  $('#frmLogin').slideUp('slow');
  $('#frmRegister').slideUp('slow');
  $('#frmForgot').slideDown('slow');
 
 $('#frmLoginFooter').hide();
 $('#frmRegisterFooter').show();

 
  
  $('#frmForgotFooter').show();
});
}
	




});
// END doc ready