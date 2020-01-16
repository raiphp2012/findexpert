<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?= link_tag('css/bootstrap.min.css') ?>
</head>
<body>
<div class="container">
	<?php echo form_open('Userlogin/clientLogin', ['class'=>'form-horizontal']) ?>
	  <fieldset>
	    <legend>Client Registration</legend>


        <div class="form-group">


	      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
	      <div class="col-lg-10">
	      <?php echo form_input(['name'=>'name','class'=>'form-control','placeholder'=>'Enter Your Name']); ?>
	       
	      </div>
	    </div>

	    <div class="form-group">


	      <label for="inputEmail" class="col-lg-2 control-label">Mobile Number</label>
	      <div class="col-lg-10">
	      <div class="input-group">
	      <span class="input-group-addon">+91</span>

	      <?php echo form_input(['name'=>'mobile','class'=>'form-control','placeholder'=>'Enter your mobile number']); ?>
	      </div>
	       
	      </div>
	    </div>


	    

	    <div class="form-group">


	      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	      <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email']); ?>
	       
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
	      <div class="col-lg-10">
	      <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
	        
	        
	      </div>
	    </div>
	    
	    
	    </div>
	    
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	       
	        <?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-default']) ?>
	        <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']) ?>
	        
	      </div>
	    </div>
	  </fieldset>
	</form>
</div>
</body>
</html>