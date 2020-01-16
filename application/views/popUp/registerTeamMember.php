 <div id="registerTeamMember" class="modal fade modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4>Add  Team Member</h4>
            </div>                    
            <div class="modal-body">
                <?php echo form_open('ExpertProfile/addMemberDetails', ['class' => 'form-horizontal','onsubmit'=>'return checkTeamMemberEmail()']) ?>
                <fieldset>
                    <!--<legend>Login</legend>-->
                     
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- <label for="inputName" class="col-lg-4 control-label">Name</label>
                                <div class="col-lg-7"> -->

                                    <?php echo form_input(['name' =>'expertName', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Team Member Name']); ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- <label for="expertEmailId" class="col-lg-4 control-label">Email</label>
                                <div class="col-lg-7"> -->
                                    <?php echo form_input(['name' => 'expertEmailId', 'type' => 'text', 'id'=>'expertEmailId', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                               <!--  </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- <label for="expertMobileNumber" class="col-lg-4 control-label">Mobile </label>
                                <div class="col-lg-7"> -->
                                    <div class="input-group">
                                        <span class="input-group-addon" style="border:1px solid black;border-radius:0;border-right:0;">+91</span>
                                       
                                        <?php echo form_input(['name' => 'expertMobileNumber', 'type' => 'text', 'required' => 'true', 'pattern'=>'[1-9]{1}[0-9]{9}', 'class' => 'form-control', 'placeholder' => ' Enter Team Member ComtactNumber']); ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <div class="col-lg-12 text-center">
                                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']) ?>
                                <?php echo form_submit([ 'value' => 'Add', 'class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>  