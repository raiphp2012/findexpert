<?php
/*
 * @author Visheshagya
 */
?>
<!-- to display the pop up -->
<div id="myModal" class="modal fade" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'Expert/checkExpertLogin', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Day view</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Current Date</label>
                                <div class="col-lg-7">
                                    <input type="text" name="currentDate" class="form-control"id="currentDate" readonly value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php // echo form_error('expertEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Client Name</label>
                                <div class="col-lg-7">
                                    <?php echo form_input(['name' => 'expertEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => '']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php // echo form_error('expertEmailId'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Some Field</label>
                                <div class="col-lg-7">
                                    <?php echo form_password(['name' => 'expertPassword', 'required' => 'true', 'class' => 'form-control', 'placeholder' => '']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php echo form_error('expertPassword'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <?php echo form_submit(['name' => 'submit', 'value' => 'Ok', 'class' => 'btn btn-primary']) ?>
                            <input type="button" class="btn btn-primary" value="Reschedule">
                            <input type="button" class="btn btn-primary" value="Cancel">
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End -->