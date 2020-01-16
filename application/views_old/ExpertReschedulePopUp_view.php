<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!--<script type="text/javascript">
    $(document).ready(function () {
        $("#login").click(function () {
            $("#myModal").modal('show');
        });
    });
</script>-->
<script type="text/javascript">
    $(function () {
        $('#newAppointmentDateTime').datetimepicker({
        });
    });
</script>
<script src="../js/moment.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap-datetimepicker.css">
<script src="../js/bootstrap-datetimepicker.js"></script>
<!-- to display the pop up -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <?php echo form_open(base_url() . 'ExpertAppointmentDetails/rescheduleAppointment', ['class' => 'form-horizontal']) ?>
                <fieldset>
                    <legend>Reschedule Appointment</legend>
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
                                <label for="inputPassword" class="col-lg-4 control-label">New Appointment Date-Time</label>
                                <div class="col-lg-7">
                                    <div class='input-group date' id='expertDOB'>
                                        <input type='text' id="newAppointmentDateTime"name="newAppointmentDateTime"class="form-control" value="" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-4 control-label">Reschedule Reason</label>
                                <div class="col-lg-7">
                                    <input type="text" name="rescheduleReason" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 pull-right col-lg-offset-2">
                            <input type="submit" class="btn btn-primary" value="Reschedule">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!--End -->