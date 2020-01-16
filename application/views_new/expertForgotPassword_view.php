<?php
/*
 * @author Visheshagya
 */
?>

<!-- to display the pop up -->
<div id="myModalForgotPassword" class="modal fade modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Forgot Password</h4>
            </div>                    
            <div class="modal-body">
                <?php echo form_open(base_url() . 'ExpertForgotPass/expertPasswordRecover', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                               <!--  <label for="inputEmail" class="col-lg-4 control-label">Email</label> -->
                                <div class="col-md-12">
                                    <?php echo form_input(['name' => 'expertEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <!--  <label for="inputPassword" class="col-lg-4 control-label">Mobile</label> -->
                                <div class="col-md-12">
                                    <?php echo form_input(['name' => 'expertMobileNumber', 'type' => 'number', 'required' => 'true', 'min' => '1111111111', 'max' => '9999999999', 'class' => 'form-control', 'placeholder' => 'Your Registered Number']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertMobileNumber'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Reset Password', 'class' => 'btn btn-primary']) ?>
                        </div>
                       
                    </div>

                </fieldset>
           </div>
        </div>
    </div>
</div>
<!--End -->