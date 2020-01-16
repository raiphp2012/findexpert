<?php include('AdminPublicHeader_view.php'); ?>
 
  <!--  Layout container START -->
  <div class="container">  
  <div class="navbar-header"> 
    
      


<?php echo form_open('AdminLogin/admin_login', ['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Admin Login</legend>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
      <div class="col-lg-10">
        
        <?php echo form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username']); ?>
      </div>
    </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('username'); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        
       <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'password']); ?>
        
      </div>
    </div>
      </div>
      <div class="col-lg-6">
        <?php echo form_error('password'); ?>
      </div>
    </div>
   
    
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <?php echo form_reset(['name'=>'submit','value'=>'Reset','class'=>'btn btn-default']); ?>
        <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-success']); ?>
        
      </div>
    </div>
  </fieldset>
</form>





   </div>
  </div> 

  
  <?php include('AdminPublicFooter_view.php'); ?>
  

      
  
 