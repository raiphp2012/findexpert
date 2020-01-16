<?php
/*
 * Visheshagya
 */
?>
<script src="../js/moment.min.js"></script>
<script src="../js/bootstrap-datetimepicker.js"></script>
<script src="../js/custom.js"></script>
<link rel="stylesheet" href="../css/bootstrap-datetimepicker.css">      


<script type="text/javascript">


    $(function () {

        $('.mondayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.mondayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.tuesdayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.tuesdayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.wednesdayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.wednesdayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.thursdayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.thursdayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.fridayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.fridayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.saturdayEnd').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.saturdayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.sundayStart').datetimepicker({
            format: 'LT'
        });
    });
    $(function () {
        $('.sundayEnd').datetimepicker({
            format: 'LT'
        });
    });
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
  $(function () {
      $("#consultationStartDate12").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd',
          minDate: 0
      });
  });
   $(function () {
      $("#consultationEndDate13").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd',
          minDate: 0
      });
  });
</script>
<!-- to display the pop up -->
<div id="showConsultationTimingForm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>                    
            <div class="container">
                <fieldset>
                    <legend>Add Consultation Timings</legeno>
                        <div class="alert alert-danger" id="errorMessage" style="display: none;">

                        </div>

                        <form class="form-horizontal" method="POST" action="../ExpertProfile/updateConsultationTimings" onsubmit="return submitupdateConsultationTimingsForm();" >
                            <fieldset>
                                <div class="row">
                                    <div id="professionalDataTab">
                                        <div class="col-md-12 frm-bdr">
                                            <div class="form-group" id="monday">
                                                <label class="col-md-3 control-label" for="selectbasic">Monday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id="aaaaa" >
                                                        <input type='text' name="mondayStart" 
                                                               value="<?php echo (empty($consultationData->mondayStart)) ? ' ' : $consultationData->mondayStart; ?>" 
                                                               class="form-control mondayStart" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='mondayEnd' >
                                                        <input type='text' name="mondayEnd" value="<?php echo (empty($consultationData->mondayEnd)) ? ' ' : $consultationData->mondayEnd; ?>" class="form-control mondayEnd" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button" onclick="createRow('monday', 1)" id="mondaybutton1" class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('monday', 2)" id="mondaybutton2" style="display: none;" class="btn btn-sm btn-primary"value="Add">
                                                </div>
                                            </div>
                                            <div class="form-group" id="monday1" style="display: none">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="mondayStart_slot1" value="<?php echo (empty($consultationData->mondayStart_slot1)) ? ' ' : $consultationData->mondayStart_slot1; ?>"  class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="mondayEnd_slot1" value="<?php echo (empty($consultationData->mondayEnd_slot1)) ? ' ' : $consultationData->mondayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"  id="monday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="mondayStart_slot2" value="<?php echo (empty($consultationData->mondayStart_slot2)) ? ' ' : $consultationData->mondayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="mondayEnd_slot2" value="<?php echo (empty($consultationData->mondayEnd_slot2)) ? ' ' : $consultationData->mondayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                            <label class="checkbox-inline">
                                                   <input type="checkbox" value="copy" name="copy" onclick="showHide('copygroup',this.value);">Copy the timings.</label>
                                            </div>
                                              <div class="col-md-12 form-group" id="copygroup" style="display:none;">                               
                                               <label class="checkbox-inline">
                                                   <input type="checkbox" value="tuesday" name="tuesday" onclick="copyValue(this.value,'monday');">Tuesday</label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="wednesday" name="wednesday" onclick="copyValue(this.value,'monday');">Wednesday</label>
                                                <label class="checkbox-inline">
                                                  <input type="checkbox" value="thursday" name="thursday" onclick="copyValue(this.value,'monday');">Thursday</label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" value="friday" name="friday" onclick="copyValue(this.value,'monday');">Friday</label>
                                                <label class="checkbox-inline"> 
                                                    <input type="checkbox" value="saturday" name="saturday" onclick="copyValue(this.value,'monday');">Saturday</label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" value="sunday" name="sunday" onclick="copyValue(this.value,'monday');">Sunday</label>
                                            </div>

                                            <div class="form-group" id="tuesday">
                                                <label class="col-md-3 control-label" for="selectbasic">Tuesday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='tuesdayStart'>
                                                        <input type='text' class="form-control tuesdayStart" 
                                                               value="<?php echo (empty($consultationData->tuesdayStart)) ? ' ' : $consultationData->tuesdayStart; ?>"  name="tuesdayStart"/>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='tuesdayEnd'>
                                                        <input type='text' name="tuesdayEnd" 
                                                               value="<?php echo (empty($consultationData->tuesdayEnd)) ? ' ' : $consultationData->tuesdayEnd;
?>" class="form-control tuesdayEnd" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button" onclick="createRow('tuesday', 1)" id="tuesdaybutton1" class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('tuesday', 2)" style="display: none;" id="tuesdaybutton2" class="btn btn-sm btn-primary"value="Add">

                                                </div>
                                            </div>
                                            <div class="form-group" id="tuesday1" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="tuesdayStart_slot1" value="<?php echo (empty($consultationData->tuesdayStart_slot1)) ? ' ' : $consultationData->tuesdayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="tuesdayEnd_slot1" value="<?php echo (empty($consultationData->tuesdayEnd_slot1)) ? ' ' : $consultationData->tuesdayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="tuesday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="tuesdayStart_slot2" value="<?php echo (empty($consultationData->tuesdayStart_slot2)) ? ' ' : $consultationData->tuesdayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="tuesdayEnd_slot2" value="<?php echo (empty($consultationData->tuesdayEnd_slot2)) ? ' ' : $consultationData->tuesdayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="wednesday">
                                                <label class="col-md-3 control-label" for="selectbasic">Wednesday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date ' id='wednesdayStart'>
                                                        <input type='text' name="wednesdayStart" class="form-control wednesdayStart" value="<?php echo empty($consultationData->wednesdayStart) ? ' ' : $consultationData->wednesdayStart;
?>" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='wednesdayEnd'>
                                                        <input type='text' name="wednesdayEnd" class="form-control wednesdayEnd"  value="<?php echo empty($consultationData->wednesdayEnd) ? ' ' : $consultationData->wednesdayEnd;
?>"/>                                                                                                  
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button" onclick="createRow('wednesday', 1)" id="wednesdaybutton1" class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('wednesday', 2)" id="wednesdaybutton2" style="display: none;" class="btn btn-sm btn-primary"value="Add">
                                                </div>
                                            </div>
                                            <div class="form-group" id="wednesday1" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="wednesdayStart_slot1" value="<?php echo (empty($consultationData->wednesdayStart_slot1)) ? ' ' : $consultationData->wednesdayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="wednesdayEnd_slot1" value="<?php echo (empty($consultationData->wednesdayEnd_slot1)) ? ' ' : $consultationData->wednesdayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="wednesday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="wednesdayStart_slot2" value="<?php echo (empty($consultationData->wednesdayStart_slot2)) ? ' ' : $consultationData->wednesdayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="wednesdayEnd_slot2" value="<?php echo (empty($consultationData->wednesdayEnd_slot2)) ? ' ' : $consultationData->wednesdayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="thursday">
                                                <label class="col-md-3 control-label" for="selectbasic">Thursday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='thursdayStart'>                                                    
                                                        <input type='text' name="thursdayStart" class="form-control thursdayStart" value="<?php echo empty($consultationData->thursdayStart) ? ' ' : $consultationData->thursdayStart;
?>" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='thursdayEnd'>
                                                        <input type='text' name="thursdayEnd" class="form-control thursdayEnd" value="<?php echo empty($consultationData->thursdayEnd) ? ' ' : $consultationData->thursdayEnd;
?>" />

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button" onclick="createRow('thursday', 1)" id="thursdaybutton1" class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('thursday', 2)" id="thursdaybutton2" style="display: none;" class="btn btn-sm btn-primary"value="Add">
                                                </div>
                                            </div>
                                            <div class="form-group" id="thursday1" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="thursdayStart_slot1" value="<?php echo (empty($consultationData->thursdayStart_slot1)) ? ' ' : $consultationData->thursdayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="thursdayEnd_slot1" value="<?php echo (empty($consultationData->thursdayEnd_slot1)) ? ' ' : $consultationData->thursdayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="thursday2" style="display: none;" >
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="thursdayStart_slot2" value="<?php echo (empty($consultationData->thursdayStart_slot2)) ? ' ' : $consultationData->thursdayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="thursdayEnd_slot2" value="<?php echo (empty($consultationData->thursdayEnd_slot2)) ? ' ' : $consultationData->thursdayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="friday">
                                                <label class="col-md-3 control-label" for="selectbasic">Friday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='fridayStart'>
                                                        <input type='text' name="fridayStart" class="form-control fridayStart" value="<?php echo empty($consultationData->fridayStart) ? ' ' : $consultationData->fridayStart;
?>" />

                                                    </div>                                               
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='fridayEnd'>
                                                        <input type='text' name="fridayEnd" class="form-control fridayEnd" value="<?php echo empty($consultationData->fridayEnd) ? ' ' : $consultationData->fridayEnd;
?>" />                                                                                                  
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button" onclick="createRow('friday', 1)"  id="fridaybutton1" class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('friday', 2)" id="fridaybutton2" style="display: none;" class="btn btn-sm btn-primary"value="Add">
                                                </div>
                                            </div>
                                            <div class="form-group" id="friday1" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="fridayStart_slot1" value="<?php echo (empty($consultationData->fridayStart_slot1)) ? ' ' : $consultationData->fridayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="fridayEnd_slot1" value="<?php echo (empty($consultationData->fridayEnd_slot1)) ? ' ' : $consultationData->fridayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="friday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="fridayStart_slot2" value="<?php echo (empty($consultationData->fridayStart_slot2)) ? ' ' : $consultationData->fridayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="fridayEnd_slot2" value="<?php echo (empty($consultationData->fridayEnd_slot2)) ? ' ' : $consultationData->fridayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="saturday">
                                                <label class="col-md-3 control-label" for="selectbasic">Saturday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='saturdayStart'>
                                                        <input type='text' name="saturdayStart" class="form-control saturdayStart" value="<?php echo empty($consultationData->saturdayStart) ? ' ' : $consultationData->saturdayStart;
?>"/>                                                    
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='saturdayEnd'>
                                                        <input type='text' name="saturdayEnd" class="form-control saturdayEnd" value="<?php echo empty($consultationData->saturdayEnd) ? ' ' : $consultationData->saturdayEnd;
?>" />                                                                                  
                                                    </div>
                                                </div>
                                                <div class="col-md-3"> 
                                                    <input type="button" onclick="createRow('saturday', 1)" id="saturdaybutton1"  class="btn btn-sm btn-primary"value="Add">
                                                    <input type="button" onclick="createRow('saturday', 2)" id="saturdaybutton2" style="display: none;" class="btn btn-sm btn-primary"value="Add">
                                                </div>

                                            </div>
                                            <div class="form-group" id="saturday1" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="saturdayStart_slot1" value="<?php echo (empty($consultationData->saturdayStart_slot1)) ? ' ' : $consultationData->saturdayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="saturdayEnd_slot1" value="<?php echo (empty($consultationData->saturdayEnd_slot1)) ? ' ' : $consultationData->saturdayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="saturday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="saturdayStart_slot2" value="<?php echo (empty($consultationData->saturdayStart_slot2)) ? ' ' : $consultationData->saturdayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="saturdayEnd_slot2" value="<?php echo (empty($consultationData->saturdayEnd_slot2)) ? ' ' : $consultationData->saturdayEnd_slot2; ?>"  class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="sunday">
                                                <label class="col-md-3 control-label" for="selectbasic">Sunday</label>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='sundayStart'>
                                                        <input type='text' name="sundayStart" class="form-control sundayStart" value="<?php echo empty($consultationData->sundayStart) ? ' ' : $consultationData->sundayStart; ?>" />                                                 

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class='input-group date' id='sundayEnd'>
                                                        <input type='text' name="sundayEnd" class="form-control sundayEnd" value="<?php echo empty($consultationData->sundayEnd) ? ' ' : $consultationData->sundayEnd;
?>" />                                                     
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="button"  onclick="createRow('sunday', 1)"  id="sundaybutton1" class="btn btn-sm btn-primary" value="Add">
                                                    <input type="button" onclick="createRow('sunday', 2)" id="sundaybutton2" style="display:none;" class="btn btn-sm btn-primary" value="Add">
                                                </div>
                                            </div>
                                            <div class="form-group" id="sunday1" style="display: none;" >
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="sundayStart_slot1" value="<?php echo (empty($consultationData->sundayStart_slot1)) ? ' ' : $consultationData->sundayStart_slot1; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="sundayEnd_slot1" value="<?php echo (empty($consultationData->sundayEnd_slot1)) ? ' ' : $consultationData->sundayEnd_slot1; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="sunday2" style="display: none;">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="sundayStart_slot2" value="<?php echo (empty($consultationData->sundayStart_slot2)) ? ' ' : $consultationData->sundayStart_slot2; ?>" class="form-control mondayStart " />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group date">
                                                        <input type="text" name="sundayEnd_slot2" value="<?php echo (empty($consultationData->sundayEnd_slot2)) ? ' ' : $consultationData->sundayEnd_slot2; ?>" class="form-control mondayEnd" />
                                                    </div>
                                                </div>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="selectbasic">Start Date</label>
                                                <div>
                                                   <input type="text" name="startDate"  id="consultationStartDate12" value="<?php echo empty($consultationData->startDate) ? ' ' : $consultationData->startDate;
?>" style="       padding-left: 1%;
    font-weight: 100;
    width: 37%;
    height: 8%;" >

                                                </div>
                                                                                           
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="selectbasic">End Date</label>
                                                <div>
                                                    <input type='text' name="endDate" id="consultationEndDate13"  class="form-control" value="<?php echo empty($consultationData->endDate) ? ' ' : $consultationData->endDate;
?>" style="width: 37%;
    font-weight: 100;
    font-size: 19px;
    height: 8%;"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center form-group">								 
                                                <input type="submit" class="btn btn-sm btn-primary" value="Update Consultation Timing">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!--End -->
<script>
    function submitupdateConsultationTimingsForm() {
        var consultationStartDate = $("#consultationStartDate12").val();
        var consultationEndDate = $("#consultationEndDate13").val();
        $("#errorMessage").empty();
        $("#errorMessage").hide();
        if ($.trim(consultationStartDate) == '')
        {
            $("#errorMessage").append("<strong>Error! </strong>Select Start Date.");
            $('#consultationStartDate12').parent('div').addClass('has-error');
            $("#consultationStartDate12").focus();
            $("#errorMessage").show();
            return false;
        }
        if ($.trim(consultationEndDate) == '')
        {
            $("#errorMessage").append("<strong>Error! </strong>Select End Date.");
            $('#consultationEndDate13').parent('div').addClass('has-error');
            $("#consultationEndDate13").focus();
            $("#errorMessage").show();
            return false;
        }
        var startDate = $('#consultationStartDate12').val().replace('-');
        var endDate = $('#consultationEndDate13').val().replace('-');
        if (startDate > endDate) {

            $("#errorMessage").append("<strong>Error! </strong>Start Date should be less than End Date.");
            $('#consultationEndDate13').parent('div').addClass('has-error');
            $("#consultationEndDate13").focus();
            $("#errorMessage").show();
            return false;
        }
        return true;

    }
    function createRow(dayName, id)
    {
        $("#" + dayName + "button" + id).hide();
        $("#" + dayName + "button" + (id + 1)).show();

        $("#" + dayName + id).show();
    }
     function copyValue(value,copyvalue)
    {
       var toStart= value+"Start";
       var toEnd= value+"End";
        var fromStart= copyvalue+"Start";
       var fromEnd= copyvalue+"End";
       //------------------
       var toStart_slot1= value+"Start_slot1";
       var toEnd_slot1= value+"End_slot1";
      
        var fromStart_slot1= copyvalue+"Start_slot1";
       var fromEnd_slot1= copyvalue+"End_slot1";
       //------------------------
       var toStart_slot2= value+"Start_slot2";
       var toEnd_slot2= value+"End_slot2";
        var fromStart_slot2= copyvalue+"Start_slot2";
       var fromEnd_slot2= copyvalue+"End_slot2";
       //----------------------------
        
        if($('[name="'+value+'"]'). prop("checked") == true){
        $('[name="'+toStart+'"]').val($('[name="'+fromStart+'"]').val());
        $('[name="'+toEnd+'"]').val($('[name="'+fromEnd+'"]').val());
        $('[name="'+toStart_slot1+'"]').val($('[name="'+fromStart_slot1+'"]').val());
        $('[name="'+toEnd_slot1+'"]').val($('[name="'+fromEnd_slot1+'"]').val());
        $('[name="'+toStart_slot2+'"]').val($('[name="'+fromStart_slot2+'"]').val());
        $('[name="'+toEnd_slot2+'"]').val($('[name="'+fromEnd_slot2+'"]').val());
            }
         if($('[name="'+value+'"]'). prop("checked") == false){
            $('[name="'+toStart+'"]').val('');
        $('[name="'+toEnd+'"]').val('');
        $('[name="'+toStart_slot1+'"]').val('');
        $('[name="'+toEnd_slot1+'"]').val('');
        $('[name="'+toStart_slot2+'"]').val('');
        $('[name="'+toEnd_slot2+'"]').val('');
        
        }
 
    }
     function showHide(copygroup,value)
    {

        if($('[name="'+value+'"]'). prop("checked") == true){
            $("#"+copygroup).show();
       
            }
         if($('[name="'+value+'"]'). prop("checked") == false){
           $("#"+copygroup).hide();
        
        }
    }
</script>