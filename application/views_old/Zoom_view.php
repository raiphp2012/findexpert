<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<h3> createAUser</h3>
<form action="<?php echo base_url();?>Ajaxcalls/createAUser" method="post">
  <input type="text" name="userEmail" id="email" value="mkattri189@gmail.com"  />
  <input type="hidden" name="userType" id="type" value="2"/>
  <input type="hidden" name="type" id="type" value="createAUser"/>
  <input type="submit" value="submit" />
</form>
<h3> UserInfo</h3>
<form action="<?php echo base_url();?>Ajaxcalls/UserInfo" method="post">
  <input type="text" name="userId"  value="LWh675VSTcmWWY9yw00JnQ" />
  <input type="hidden" name="type" id="type" value="UserInfo"/>
  <input type="submit" value="UserInfo"  />
</form>
<h3> getUserInfoByEmail</h3>
<form action="<?php echo base_url();?>Ajaxcalls/getUserInfoByEmail" method="post">
  <input type="text" name="userEmail"  value="rakeshrai05@gmail.com" />
  	<input type="hidden" name="userLoginType"  value="100"/>
  <input type="hidden" name="type"  value="getUserInfoByEmail"/>
  <input type="submit" value="UserInfo" />
</form>
<h3> listUsers</h3>
<form action="<?php echo base_url();?>Ajaxcalls/listUsers"  method="post">
  <input type="hidden" name="type"  value="listUsers"/>
  <input type="submit" value="listUsers"  />
</form>
<h3> listPendingUsers</h3>
<form action="<?php echo base_url();?>Ajaxcalls/listPendingUsers"  method="post">
  <input type="hidden" name="type"  value="listPendingUsers"/>
  <input type="submit" value="listPendingUsers"/>
</form>
<h3> setUserAssistant</h3>
<form action="<?php echo base_url();?>Ajaxcalls/setUserAssistant" method="post">
	<input type="text" name="userId"  value="Ol04AnsrS06yunpxov1w2A" />
	<input type="text" name="userEmail"  value="mkattri189@gmail.com" />
	<input type="text" name="assistantEmail"  value="rakeshrai05@gmail.com" />
  <input type="hidden" name="type"  value="setUserAssistant"/>
  <input type="submit" value="setUserAssistant"/>
</form>
<h3>createAMeeting</h3>
<form action="<?php echo base_url();?>Ajaxcalls/createAMeeting" method="post">
	<input type="hidden" name="userId"  value="Ol04AnsrS06yunpxov1w2A" />
	<input type="text" name="meetingTopic"  value="Appointment Booking with Legal Expert" />
	<input type="hidden" name="meetingType"  value="2" />
  <input type="hidden" name="type"  value="createAMeeting"/>
  <input type="submit" value="createAMeeting"/>
</form>


<h3>create Schedule Meeting</h3>
<form action="<?php echo base_url();?>Ajaxcalls/createScheduleMeeting" method="post">
	<input type="hidden" name="userId"  value="Ol04AnsrS06yunpxov1w2A" />
	<input type="text" name="meetingTopic"  value="Appointment Booking with Legal Expert" />
	<input type="hidden" name="meetingType"  value="2" />
  	<input type="hidden" name="type"  value="createScheduleMeeting"/>
  <input type="submit" value="Schedule Meeting"/>
</form>
</body>
</html>








