<script type="text/javascript">
    $(document).ready(function () {
        $("#login").click(function () {
            $("#myModal").modal('show');
        });
    });

</script>
<style type="text/css">
h1
{
font-family:Arial, Helvetica, sans-serif;
color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
    margin: 20px;
    background-color: #EBEBEB;
    padding: 10px;
    border: #D6D6D6 solid 1px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
}
.fb_box{
    margin: 20px;
    background-color: #FFF0DD;
    padding: 10px;
    border: #F7CFCF solid 1px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
}
.fb_box .image{ text-align:center;}

.google_box .image{ text-align:center;}
</style>
<!-- to display the pop up -->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div id="myModal" class="modal fade" style="padding: 10%; width: 50%;margin-left:28%;">
   <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Login to visheshagya</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          
                          <?php echo form_open(base_url() . 'clientHome/clientLogin', ['class' => 'form-horizontal', 'novalidate'=>'novalidate']) ?>
                              <div class="form-group">
                                  <label for="clientEmailId" class="control-label">Email Id</label>
                                  <?php echo form_input(['name' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                                  <span class="help-block"></span>
                              </div>
                              
                              
                    
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                      <?php echo form_password(['name' => 'clientPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                              
                              
                              <?php echo form_submit(['name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-success btn-block']) ?>
                              <br>


                              <div class="form-group">
                        <div class="col-lg-8 pull-left col-lg-offset-2">
                            <a style="cursor: pointer"id="clientForgotPassword">Forgot Password</a>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#clientForgotPassword").click(function () {
                                       
                                        $("#myModalForgotPassword").modal('show');
                                        $("#myModal").modal('hide');
                                    });
                                });
                            </script>
                        </div>
                    </div>
                              
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead" width="50%">Or 
                      <span class="text-success">Sign in With
                    Social Media</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          
                          <li>
            <?php 
            echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
            ?>
            </li>
            
                          
                          
                      </ul>
                      
                  </div>
              </div>
              <p><a class="btn btn-info btn-block" id="clientNewRegister">New to Visheshagya? Sign up</a></p>
              
          </div>
          <script>
          $(document).ready(function(){
              $("#clientNewRegister").click(function(){
                $("#myModalregister").modal('show');
                 $("#myModal").modal('hide');
              });
          });
          </script>


</div>

