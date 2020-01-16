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
	    <legend>Client Login</legend>

	    <div class="row">
		    <div class="col-lg-6">
		    <div class="form-group">
		    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	      <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email']); ?>

	      </div>
	      </div>
	      </div>


		    <div class="col-lg-6">
		    	<?php echo form_error('email'); ?>
		    </div>
	    </div>
	    <div class="row">
	    <div class="col-lg-6">
	    <div class="form-group">
	      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
	      <div class="col-lg-10">
	      <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Password']); ?>
	        </div>
	        </div>
	        
	      </div>
	      <div class="col-lg-6">
		    	<?php echo form_error('password'); ?>
		    </div>
	    </div>


	    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
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