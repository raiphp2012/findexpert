<?php
/*
 * Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!-- to display the pop up -->
<div id="cancelAppointment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'ExpertAppointmentDetails/cancelAppointment', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Cancel Appointment</legend>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Client Name</label>
                                <div class="col-lg-7">
                                    <input type="text" id="clientName"name="clientName" class="form-control" readonly="true">
                                    <input type="hidden" id="appointmentId"name="appointmentId">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-4 control-label">Appointment Type</label>
                                <div class="col-lg-7">
                                    <input type="text" id="appointmentType" class="form-control" readonly="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Appointment Date-Time</label>
                                <div class="col-lg-7">
                                    <input type="text" id="appointmentDateTime" class="form-control" readonly="true">
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Cancel Reason</label>
                                <div class="col-lg-7">
                                    <input type="text" name="cancelReason" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <input type="submit" class="btn btn-primary" value="Cancel">
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End -->