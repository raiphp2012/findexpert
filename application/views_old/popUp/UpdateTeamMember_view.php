<div id="UpdateTeamMember" class="modal fade modal-login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Update Data Team Member</h4>
            </div>                    
                <div class="modal-body">
                <form action="<?php echo base_url(); ?>ExpertProfile/UpdateMemberDetails" method="post" class="form-horizontal">
                
                <fieldset>
                    <!--<legend>Login</legend>-->
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
<!--                                 <label for="inputName" class="col-md-4 control-label">ExpertId</label>
                                <div class="col-lg-7"> -->

                                    <?php echo form_input(['name' => 'ExpertId', 'type' => 'text', 'class' => 'form-control','readonly' => 'true']); ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                               <!--  <label for="inputName" class="col-md-4 control-label">Name</label>
                                <div class="col-lg-7"> -->

                                    <?php echo form_input(['name' => 'updateExpertName', 'type' => 'text',  'class' => 'form-control', 'placeholder' => 'Your Name']); ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="expertEmailId" class="col-md-4 control-label">Email</label>
                                <div class="col-lg-7"> -->
                                    <?php echo form_input(['name' => 'updateExpertEmailId', 'type' => 'text', 'id'=>'expertEmailId',  'class' => 'form-control', 'placeholder' => 'abc@xyz.com']); ?>
                              <!--   </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <label for="expertMobileNumber" class="col-md-4 control-label">Mobile </label>
                                <div class="col-md-7"> -->
                                    <div class="input-group">
                                        <span class="input-group-addon" style="border:1px solid black;border-radius:0;border-right:0;">+91</span>
                                       
                                        <?php echo form_input(['name' => 'updateExpertMobileNumber', 'type' => 'text',  'pattern'=>'[1-9]{1}[0-9]{9}', 'class' => 'form-control', 'placeholder' => 'Your Number']); ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                               <!--  <label for="expertMobileNumber" class="col-md-4 control-label">Status </label>-->
                                        
                                        <select name="status" class ="form-control">
                                            <option value="active">Active</option>
                                            <option vaule="Inactive" > Inactive</option>
                                        
                                        </select>
                                    <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-default']) ?>
                                <?php echo form_submit([ 'value' => 'Save', 'class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </form>
                </div>
        </div>
    </div>
</div>  