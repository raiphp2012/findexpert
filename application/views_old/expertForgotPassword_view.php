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
                <?php echo form_open(base_url() . 'ExpertForgotPass/expertPasswordRecover', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Forgot Password</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7">
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
                                <label for="inputPassword" class="col-lg-4 control-label">Mobile</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'expertMobileNumber', 'type' => 'number', 'required' => 'true', 'min' => '1111111111', 'max' => '9999999999', 'class' => 'form-control', 'placeholder' => 'Your Registered Number']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertMobileNumber'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Reset Password', 'class' => 'btn btn-primary']) ?>
                        </div>
                       
                    </div>

                </fieldset>
           </div>
        </div>
    </div>
</div>
<!--End -->