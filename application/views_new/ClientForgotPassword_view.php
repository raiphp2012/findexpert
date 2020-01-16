<?php
/*
 * @author Visheshagya
 */
?>

<!-- to display the pop up -->
<div id="myModalForgotPassword" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'ClientForgotPass/clientPasswordRecover', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Forgot Password</legend>
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
                                <label for="inputPassword" class="col-lg-4 control-label">Mobile</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Your Registered Number','pattern'=>'[1-9]{1}[0-9]{9}','oninvalid'=>"setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')"]); ?>
                                </div>      
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('clientMobileNumber'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Reset Password', 'class' => 'btn btn-primary']) ?>
                        </div>                       
                    </div>
                </fieldset>
                </form>
           </div>
        </div>
    </div>
</div>
<!--End -->
