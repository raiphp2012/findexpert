<div class="modal fade modal-login" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" data-role="none">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> <span id="frmLoginTitle">Login</span></h4>
        </div>
        <div class="modal-body">
          <div id="frmLogin">
            <form role="form" action="<?php echo base_url();?>clientHome/clientLogin" method="post">
            <input type="hidden" name="frmLoginOfferType" id="frmLoginOfferType">
                
              <div class="form-group">
                <!-- <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label> -->
                <input type="text" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email">
              </div>
              <div class="form-group">
                <!-- <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label> -->
                <input type="password" class="form-control" id="psw" name="clientPassword" placeholder="Enter password">
              </div>
              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  Remember me
                </label>
              </div>
              <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <!--forgot -->

           <div id="frmForgot" style="display:none;">
            <form role="form" action="<?php echo base_url() . 'ClientForgotPass/clientPasswordRecover';?>" method="post">

              <div class="form-group">
                <<!-- label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label> -->
                <input type="email" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <!-- <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile</label> -->
                <input type="text" class="form-control" name="clientMobileNumber" id="psw" placeholder="Enter Mobile Number" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')" >
              </div>
              
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Reset Password</button>
            </form>
          </div>


          <!--forgot end -->
           <div id="frmRegister">
            
            <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal']) ?>
           

              <div class="form-group">
                <!-- <label for="usrname"><i class="fa fa-user" aria-hidden="true"></i> Full Name</label> -->
                <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
              </div>
              <div class="form-group">
                <!-- <label for="email"><i class="fa fa-envelope" aria-hidden="true"></i> Email Id</label> -->
               <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                                      </div>
                <div class="form-group">
                <!--< label for="phone"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i> Mobile No.</label> -->
               
<?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number']); ?>
              </div>

              <div class="loginFormPopup checkbox">
                <label>
                  <input type="checkbox" value="">
                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                  I agree with the <a href="<?= base_url(); ?>ExpertTermsAndCondition" title="Click here to read Terms and Conditions">terms and conditions</a> for Registration.
                </label>
              </div>

              
              <?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-success btn-block']) ?>
            </form>

          </div>
        </div>
        <div class="modal-footer">
          
         
 
  <?php 
  $response= 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   
   $this->session->set_userdata('response',$response);
             
           $authUrl=$this->session->userdata('authUrl');
          // echo $authUrl;
           // echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
         
                             echo '<a href="'.$authUrl.'" id="btnFBlogin" class="btn btn-default pull-left"><i class="fa fa-facebook-official" aria-hidden="true"></i> login with facebook</a>';
                            ?>
 
  


          <div id="frmLoginFooter">
            <p>New to Visheshagya? <a id="btnShowSignup" href="#">Sign Up</a></p>
          </div>
          <div id="frmRegisterFooter">
            <p>Already a member? <a id="btnShowLogin" href="#">Login</a></p>
          </div>
          <div id="frmForgotFooter">
          <p>Forgot <a id="btnShowForgot" href="#">Password?</a></p>
          </div>
        </div>
      </div>

    </div>
  </div>
 <?php
            if (NULL !== $this->session->userdata('clientSignUpSuccess')) {
                include('SignupSuccessMessage_view.php');
                ?>
                <script>
                    $("#signupSuccessMessage").modal('show');
                </script>
                <?php
            }
            if (NULL !== $this->session->userdata('clientLoginError')) {
                include('SignupErrorMessage_view.php')
                ?> 
                <script>
                    $("#signupErrorMessage").modal('show');
                </script>
                <?php
            }
            if (NULL !== $this->session->userdata('clientResetPasswordSuccess')) {
                include('clientResetSuccessMessage_view.php');
                ?>
                <script>
                    $("#resetSuccessMessage").modal('show');
                </script>
                <?php
            }
            if (NULL !== $this->session->userdata('clientResetPasswordError')) {
                include('clientResetPasswordError_view.php');
                ?>
                <script>
                    $("#clientResetPasswordError").modal('show');
                </script>
                <?php
            }
            ?>