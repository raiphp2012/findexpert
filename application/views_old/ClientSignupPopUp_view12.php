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

<div id="myModalregister" class="modal fade" style="padding: 10%; width: 50%;margin-left:28%;">
   <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Sign-Up to visheshagya</h4>
          </div>
          <div class="modal-body">
          <div class="alert alert-danger" id="emailMessage" style="display: none;">
                        <strong>Error! </strong>Email already exists.
                    </div>
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          
                          <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal', 'novalidate'=>'novalidate']) ?>

                              <div class="form-group">
                                  <label for="clientEmailId" class="control-label">Name</label>
                                 <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
                                  <span class="help-block"></span>
                              </div>


                              <div class="form-group">
                                  <label for="clientEmailId" class="control-label">Emai Id</label>
                                 


                                 <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com',
                                        'onchange' => 'checkClientEmailId(this.value)']);
                                    ?>
                                  <span class="help-block"></span>
                                  <div class="col-lg-6">
<?php echo form_error('clientEmailId'); ?>
                        </div>
                              </div>

                              
                              
                              
                    
                              <div class="form-group">
                                  <label for="Mobile Number" class="control-label">Mobile</label>
									<div class="input-group">
                                  <span class="input-group-addon">+91</span> 
                                      <?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number','pattern'=>'[1-9]{1}[0-9]{9}','oninvalid'=>"setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')"]); ?>
                                      </div>
                                  <span class="help-block"></span>
                                   <div class="col-lg-6">
<?php echo form_error('clientMobileNumber'); ?>
                            </div>
                              </div>
                             
                              
                              
                              
                              <?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-success btn-block']) ?>
                              <br>


                              
                              
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
              
              
          </div>
         



           


</div>

<script type="text/javascript">
    function checkClientEmailId(emailid) {
        var emailid = emailid;
        $.ajax({
            url: 'Ajaxcalls/checkClientEmailId',
            type: 'POST',
            data: {'emailId': emailid},
            async: false,
            success: function (response) {
                if (response.verificationResult == "1")
                {
                    $('#clientEmailId').parent('div').addClass('has-error');
                    $("#clientEmailId").focus();

                    $("#emailMessage").show();

                } else {
                    $("#emailMessage").hide();
                }
            }
        });
    }
</script>


