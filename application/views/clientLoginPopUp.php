 <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
  	<div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
            <form role="form" action="<?php echo base_url();?>clientHome/clientLogin" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="clientPassword" id="psw" placeholder="Enter password">
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
        <div class="modal-footer">
          <button id="btnFBlogin"  class="btn btn-default pull-left" ><i class="fa fa-facebook-official" aria-hidden="true"></i>Login with Facebook</button>
          
          <p>New to Visheshagya? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>

  	</div>
  </div