<a id="popuppro" name="simplepopup" href="#dialog"></a>
<div id="boxes"><div id="dialog" class="window">

<div class="poppro_main_contener">
<div class="popupleft">
<?php echo html_entity_decode(popuppro_get_option('popup_box_content')) ;?>

</div>

<div class="popupright"> 



  	<div class="login_frm">

<input type="text"  id="name" name="username" onchange="changeEmail(this);" placeholder="Your Name">
<input type="email"  id="email-sub" name="email" onchange="changeEmail(this);" placeholder="Your Email">
    	<input type="submit" name="Submit" onclick="subscribeMailchimp(this);" id="subscribe-mailchimp" class="login login-submit" value="Subscribe"></div>



</div>

<a class="close" href="#"></a></div></div>
