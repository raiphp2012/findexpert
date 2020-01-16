<?php
/*
 * @author Visheshagya
 */
?>
<!-- register -->

<div id="myModalregister" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open('Welcome/checkUserLogin', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <!--<legend>Login</legend>-->
                    <legend>Client Registration</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Your Name']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="clientMobile" class="col-lg-4 control-label">Mobile </label>
                                <div class="col-lg-7">
                                    <div class="input-group">
                                        <span class="input-group-addon">+91</span>
                                       
                                        <?php echo form_input(['name' => 'clientMobile', 'type' => 'number', 'required' => 'true', 'pattern'=>'[1-9]{1}[0-9]{9}', 'class' => 'form-control', 'placeholder' => 'Your Number']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'emailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-8 pull-right">
                                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']) ?>
                                <?php echo form_submit([ 'value' => 'Signup', 'class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!--</form>-->
            </div>
        </div>
    </div>
</div>
<!-- register end -->