<?php
/*
 * @author Visheshagya
 */
?>

<!-- to display the pop up -->
<div id="myModalChangePassword" class="modal fade modal-login">
    <div class="modal-dialog change-login-modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Change Password</h4>
            </div>                    
            <div class="modal-body">
                <?php echo form_open(base_url() . 'PasswordAssistance/changePassword', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="inputPassword" class="col-lg-4 control-label">Old Password</label> -->
                                    <?php echo form_password(['name' => 'OldPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Old Password']); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_error('OldPassword'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="inputPassword" class="col-lg-4 control-label">New Password</label> -->
                                    <?php echo form_password(['name' => 'NewPassword','id'=>'NewPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'New Password', 'onchange' => "if(this.checkValidity()) form.clientConfirmPassword=this.value;"]); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php echo form_error('NewPassword'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="inputPassword" class="col-lg-4 control-label">Confirm Password</label> -->
                                    <?php echo form_password(['name' => 'clientConfirmPassword','id'=>'clientConfirmPassword','onchange'=>'checkPassword()', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Confirm Password',]); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?php echo form_error('clientPassword'); ?>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?php echo form_submit(['name' => 'submit','id'=>'submit', 'value' => 'Reset Password', 'class' => 'btn']) ?>
                    </div>
                </fieldset>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#submit").disabled = true;
            });
            
            function checkPassword()
            {
                if ($("#NewPassword").val() !== $("#clientConfirmPassword").val())
                {
                    $('#clientConfirmPassword').parent('div').addClass('has-error');

                    return false;
                }
            }
        </script>
    </div>
</div>
<!--End -->
