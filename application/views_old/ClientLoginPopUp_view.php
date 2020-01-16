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
<div id="myModal" class="modal fade" style="height: 100%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" id="closeHeader"class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            
            <div class="container">
                <?php echo form_open(base_url() . 'clientHome/clientLogin', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend style="display: block;width: 100%;padding: 0;margin-bottom: 20px;
                font-size: 21px;line-height: inherit;color: #333;border: 0;
                                                border-bottom: 1px solid #e5e5e5;">Login</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('clientEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                                <div class="col-lg-7">
                                    <?php echo form_password(['name' => 'clientPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('clientPassword'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Login', 'class' => 'btn btn-primary']) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <a style="cursor: pointer"id="clientForgotPassword">Forgot Password</a>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#clientForgotPassword").click(function () {
                                        $("#myModal").modal('hide');
                                        $("#myModalForgotPassword").modal('show');
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <a style="cursor: pointer"id="clientregister">Sign-Up</a>
                            <script type="text/javascript">
                                $(document).ready(function () {
                            $("#clientregister").click(function () {
				                 $("#myModalRegister").modal('show');                                
				        $("#myModal").modal('hide');                                        
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
            <div>
            <?php 
            
            echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
            ?>
            </div>
           
          
        </div>
    </div>
</div>
<?php
include('ClientForgotPassword_view.php');
include('ClientSignupPopUp_view.php');
?>
