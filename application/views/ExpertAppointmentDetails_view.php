<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        
     
        <title>Expert Appointment Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        
         <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
    </head>

    <body>
           <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>Expert/mainexpertHome"><div class="logo"></div></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right navigation">
                                <?php if($this->session->userdata('parent_id')==0){ ?>
                                     <li><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
                                     My  Practice</a></li>
                                    
                                    <?php } ?>
                                    <li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
                                    <li class="active"><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
                                    <li><a href="<?php echo base_url().'ExpertProfile';?>" >My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <!--to display profile images-->
                                    <a class="btn dropdown-toggle profile-img" data-toggle="dropdown" href="#">
                                        <img src="<?php 
                                         $profileImage=$this->session->userdata('profileImage');
                                          echo $profileImage;
                                        ?>" class="img-responsive img-circle img-thumbnail" width="50px" height="10px;">
                                    </a>
                                    <!--END to display profile images -->
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        
                                        <li> </li>
                                        
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>   
                </div>
            </nav>

            <div class="wide">
                <div class="container">
                    <div class="page-header">
                        <h1>My Appointments</h1>
                    </div>
                </div>
            </div>


            <!-- body content -->      
            <div class="content-full-height"> 
  <div class="two-column-con">
    <div class="container client-app-details">
      <div id="exTab2" class="frm-detail">
        <div class="tab-content" style="border:none;">
          <div class="tab-pane active">                           
            <div class="main-content detail-view">
                <div class="detail-view-cont"></div>
            </div>                                                                
            <div class="panel">
              <div class="panel-heading expert-head-name"><em>Client Name:</em> <b><?php echo strtoupper($appointmentData[0]->clientName); ?></b></div>
                  <div id='myPublisherDiv'></div>
                  <div id='subscribersDiv'></div>
                  <div class="row">
                      <div class="col-md-6 padL0 slide-R" >
                        <div class="ca-details-wrapper" data-simplebar-direction="vertical">
                          <div class="panel borRadius0">
                            <div class="panel-heading second-head">Appointments</div>
                              <?php
                                $i = 1;
                                $currentDate = date('Y-m-d');
                                $currentTime = date('H:i:s');
                                foreach ($appointmentData as $appointments) {
                                 if($i==1)
                                   {
                                      $clientId=$appointments->clientId;
                                      $clientName=$appointments->clientName;
                                      $expertId=$appointments->expertId;
                                      $expertName=$appointments->expertName;
                              ?>
                                  <input type="hidden" name="clientId" class="clientId" value="<?php echo $appointments->clientId; ?>" >
                                  <input type="hidden" name="expertId" class="expertId" value="<?php echo  $appointments->expertId; ?>" >
                              <?php
                                }
                                if (($appointments->consultationStatusId == 1) && ($appointments->appointmentDate == $currentDate) && (strtotime($currentTime) >= strtotime($appointments->appointmentStartTime)) && (strtotime($currentTime) <= strtotime($appointments->appointmentEndTime))) {
                              ?>
                              <div class="databorder">
                                <div class="sr-no">#<?php echo $i; ?></div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Appointment Id</div>
                                  <div class="col-md-6 datacol"><?php echo $appointments->appointmentId; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Date</div>
                                  <div class="col-md-6 datacol"><?php $date = new DateTime($appointments->appointmentDate);
                                  echo $date->format('d-m-Y'); ?></div>
                                </div>
                              
                              <!-- <div class="databorder">
                                <div class="sr-no">#<?php echo $i; ?></div> -->
                                <div class="row datashow">
                                  <div class="col-md-6 datacol">
                                    <?php $dateTime = $appointments->appointmentDate . $appointments->appointmentStartTime . '-' . $appointments->appointmentEndTime;
                                     ?>
                                  </div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Date</div>
                                  <div class="col-md-6 datacol"><?php echo $dateTime; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Type</div>
                                  <div class="col-md-6 datacol"><?php echo $appointments->consultationTypeName; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Status</div>
                                  <div class="col-md-6 datacol"><?php echo$appointments->consultationStatusName; ?></div>
                                </div>
                                 <?php if ($appointments->consultationTypeId == 2) { ?>
                                <div class="row datashow " style="margin-top:20px;">
                                  <div class="col-md-12">
                                   
                                    <input type="button" onclick="initiate_audio_call('<?php echo $appointments->appointmentId; ?>');" class="btn btn-primary call-btn" value="Start Audio">
                                  </div>
                                </div>
                                                  <!-- </div> -->
                                <?php
                                  }
                                  if ($appointments->consultationTypeId == 1) {
                                ?>
                                <div class="row datashow" style="margin-top:20px;">
                                  <div class="col-md-12">
                                      <a href="<?php echo $appointments->start_url; ?>"  class="btn btn-success call-btn video-call" target="_blank"   onclick="UpdateData('<?php echo  $appointments->appointmentId;?>');">Start Video Call </a>
                                      <input type="button" onclick="startAudioCall('<?php echo date('Y-m-d');?>','<?php echo $appointments->expertMobileNumber; ?>', '<?php echo $appointments->clientMobileNumber; ?>', '<?php echo date('H:i',strtotime($appointments->appointmentStartTime)); ?>', '<?php echo date('H:i',strtotime($appointments->appointmentEndTime)); ?>')" class="btn btn-primary call-btn audio-call" value="Start Audio Call">
                                      <input type="button" onclick="ddlChange( '<?php echo $appointments->appointmentId; ?>')" class="btn btn-primary call-btn completed" value="Completed">
                                  </div>
                                </div>
                              <!-- </div> -->
                              <?php } ?>
                              </div>

                              <?php
                              } else {
                              ?>
                              <div class="databorder">
                                <div class="sr-no">#<?php echo $i; ?></div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Appointment Id</div>
                                  <div class="col-md-6 datacol"><?php echo $appointments->appointmentId; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Date</div>
                                  <div class="col-md-6 datacol"><?php echo $appointments->appointmentDate . '(' . $appointments->appointmentStartTime . '-' . $appointments->appointmentEndTime . ')'; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Type</div>
                                  <div class="col-md-6 datacol"><?php echo $appointments->consultationTypeName; ?></div>
                                </div>
                                <div class="row datashow">
                                  <div class="col-md-4 datacol datacol-type">Status</div>
                                  <div class="col-md-6 datacol"><?php echo$appointments->consultationStatusName; ?></div>
                                </div>
                              </div>
                              <?php } $i++; }
                              ?>
                            </div>
                          </div>
                        </div>
                     
                      <div class="col-md-6 col-md-6 padR0 slide-L">
                        <div class="ca-details-wrapper2 pad20">
                          <div class="panel">
                            <div class="panel-heading second-head">Documents</div> 
                          <!-- <?php?> -->
                          </div>
                          <div class="panel">
                            <div class="panel-heading padRL">
                              <button type="button" class="btn btn-info btn-sm add-note" data-toggle="modal" data-target="#addNoteExpert"> Add Note</button>
                              <button type="button" class="btn pad0  question" data-toggle="modal" title="Personal Notes for clients & Experts. Also they both can choose to share such notes. Although it is not mendetory. Click for more.." id="noteHelp"><i class="fa fa-question-circle"></i></button>
                            </div>
                            <ul class="nav nav-tabs">
                              <li><a data-toggle="tab" href="#comments">Comments</a></li>
                              <li  class="active"><a data-toggle="tab" href="#notes">Notes</a></li>
                              <li><a data-toggle="tab" href="#shared-files">Shared Files</a></li>
                              <li><a data-toggle="tab" href="#action-taken">Action Taken</a></li>
                            </ul>
                           <div class="tab-content notes-wrapper">
                              <div id="comments" class="tab-pane fade">
                                <div class="comments" data-simplebar-direction="vertical">
                                  <?php
                                    foreach ($appointmentData as $appointments) {
                                      if ((trim($appointments->appointmentNotes) != NULL) && trim($appointments->appointmentNotes) != "") {
                                  ?>
                                  <div class="panel">
                                      <div class="panel-heading comment-para">
                                          <i class="fa fa-comments"></i>
                                          <?php
                                        echo $appointments->appointmentNotes;
                                          ?>
                                      </div>
                                  </div>
                                  <?php } } ?>
                                </div>
                              </div>
                              <div id="notes" class="tab-pane fade  in active">
                                <!-- <h3>Menu 1</h3>
                                <p>Some content in menu 1.</p> -->
                                <div class="notes" data-simplebar-direction="vertical">
                                  <table class="table">
                                    <thead>
                                      <tr class="thead-bg">
                                        <th>Note/Query</th>
                                        <th>Share</th>
                                        <th>Owners</th>
                                        <th>Datetime</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        if(!(is_array($appointmentDataNotes)))
                                        {
                                            echo "<tr><td colspan='4'> No Available Note</td></tr>";
                                        }
                                        if(is_array($appointmentDataNotes)) {
                                          for ($i=0; $i < count($appointmentDataNotes) ; $i++) {
                                            echo "<tr class='success'>"; 
                                              foreach ($appointmentDataNotes[$i] as $key=>$value) {
                                                if($key=="chat_id" or $key=="expertId" or $key=="clientId" ) continue;
                                                  if( $key=="shared"){
                                                    if($value==1){
                                                      echo "<td>"."Published"."</td>";
                                                    }
                                                    if($value==0)
                                                      {
                                                          echo "<td>"."Personal"."</td>";
                                                      }
                                                  }
                                                  else if($key=="owner"){
                                                    $owner=explode("-",$value);
                                                              // print_r($owner);
                                                    if($owner[0]=="Expert")
                                                      {
                                                              if($owner[1]==$expertId){
                                                                  $ownerName=$expertName;
                                                              }
                                                      }
                                                    if($owner[0]=="Client")
                                                      {
                                                          if($owner[1]==$clientId){
                                                                  $ownerName=$clientName;
                                                              }
                                                         
                                                      }
                                                    echo "<td>".$ownerName."</td>"; 
                                                  }
                                                  else{
                                                    echo "<td>".$value."</td>"; 
                                                  }
                                                    echo "</tr>";              
                                                } } }
                                              ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div id="shared-files" class="tab-pane fade">
                                <!-- <h3>Menu 2</h3> -->
                                <div class="shared-files" data-simplebar-direction="vertical">
                                  <?php
                                    if (is_array($sharedFileDetails)) {
                                      foreach ($sharedFileDetails as $fileDetails) {
                                        if ($fileDetails->sharedBy == 2) {
                                  ?>
                                  <div class="panel" >
                                    <div class="panel-heading comment-para">
                                      <div class="row">
                                        <div class="col-md-10 pad0">
                                          <?php
                                          $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . "/" . $fileDetails->fileName;
                                          ?> <i class="fa fa-file"></i>
                                          <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><?php echo $fileDetails->fileName; ?></a><br/>
                                        </div>
                                        <div class="col-md-2 pad0 download-icon">
                                          <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                    } else {
                                  ?>
                                  <div class="panel" >
                                    <div class="panel-heading comment-para">
                                      <div class="row">
                                        <div class="col-md-10 pad0">
                                          <?php
                                          $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . "/" . $fileDetails->fileName;
                                          ?> <i class="fa fa-file"></i>
                                          <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><?php echo $fileDetails->fileName; ?></a><br/>
                                        </div>
                                        <div class="col-md-2 pad0 download-icon">
                                          <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php } } } ?>
                                </div>
                              </div>
                                          <!-- start Action Taken section -->
                              <div id="action-taken" class="tab-pane fade">
                                <div class="action-taken" data-simplebar-direction="vertical">
                                  <div class="panel-heading padRL">
                                    <button type="button" class="btn btn-info btn-sm add-note" data-toggle="modal" data-target="#addActionExpert">Add Action Taken</button>
                                  </div>
                                  <table class="table">
                                    <thead>
                                      <tr class="thead-bg">
                                        <th>Subject</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        if(!(is_array($appointmentActionTakenData)))
                                        {
                                            echo "<tr><td colspan='5'> No Action taken </td></tr>";
                                        }
                                        if(is_array($appointmentActionTakenData)) {
                                         for ($i=0; $i < count($appointmentActionTakenData) ; $i++) {
                                          echo "<tr>";
                                          foreach ($appointmentActionTakenData[$i] as $key => $value ) {
                                            if($key=="expertId" or $key=="clientId" or $key=="id" or $key=="created_date") continue;
                                            echo "<td>".$value."</td>";
                                          }
                                          echo "</tr>";
                                          }
                                        }
                                      ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>     
</div>


            </div>
        </div>
        <!-- Footer -->
                <?php include('loginFooter.php') ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <?php include('ExpertAppointmentCancelPopUp_view.php'); ?>
        <script>
                                                            function reschedule(clientName, appointmentId, appointmentType, appointmentDateTime)
                                                            {
                                                                $("#clientName").val(clientName);
                                                                $("#appointmentDateTime").val(appointmentDateTime);
                                                                $("#appointmentType").val(appointmentType);
                                                                $("#appointmentId").val(appointmentId);
                                                                $("#myModal").modal('show');
                                                            }
                                                            function cancel(clientName, appointmentId, appointmentType, appointmentDateTime)
                                                            {
                                                                $("#clientName").val(clientName);
                                                                $("#appointmentDateTime").val(appointmentDateTime);
                                                                $("#appointmentType").val(appointmentType);
                                                                $("#appointmentId").val(appointmentId);
                                                                $("#cancelAppointment").modal('show');
                                                            }
                                                            function startAudioCall(currentDate,expertMobileNumber, clientMobileNumber, appointmentStartTime,appointmentEndTime)
                                                                            {


                    var callUrl = "http://etsdom.kapps.in/webapi/saicart/api/saicart_c2c.py?auth_key=bb23a8a029-8bd4-4e44-97ccaa";
                    callUrl +="&agent_number=+91"+expertMobileNumber+"&customer_number=+91"+clientMobileNumber+"&call_start_time="+currentDate;
                    callUrl +=" "+appointmentStartTime+"&call_stop_time="+currentDate+" "+appointmentEndTime;
                    //alert(callUrl);
                        console.log(callUrl);
                                                                                $.ajax({
                                                                                    url: callUrl,
                                                                                    type: 'GET',
                                                                                    crossdomain: true,
                                                                                   dataType: "xml",
                                                                                    success: function (audioCallStatus) {
                                                                                       // alert(audioCallStatus);
                                                                                      //  audioCallStatus.header("Access-Control-Allow-Origin", "*");
                                
                                                                                    }
                                                                                });
                                                                            }

                                                            function startVideoCall(appointmentId, appointmentDate)
                                                            {
                                                                
                                                            var clientId=<?php echo $clientId; ?>;
                                                            console.log(appointmentId);
                                                            var videoUrl="https://s.chatforyoursite.com/index.php?v1=Turn%20On%20Video&v0=Turn%20Off%20Video&m1=Turn%20On%20Mic&m0=Turn%20Off%20Mic&b1=End%20Call&room=dd258efb92c6bb9b84900823746f2566"+ appointmentId+"&to="+ clientId+"&basedata=zEBDEIbNsdsRMbcwpNMUNnhtLI5p36Py0b8wC3JAisw%3D&pluginname=avchat&hostpath=http://visheshagya.in/cometchat/&cssurl=//visheshagya.in/cometchat/css.php?cc_theme=#dd258efb92c6bb9b84900823746f2566&screen=0";
                                                           // window.location=videoUrl;
                                                           console.log(videoUrl);
                                                            window.open(videoUrl, '_blank');
                                                            }
                                                            function ddlChange(appointmentId)
            {
                
                 var updateConsultationStatusUrl = "<?php echo base_url() . "Ajaxcalls/updateAppointmentStatus/"; ?>"+ appointmentId;
                          
                    $.ajax({
                     url: updateConsultationStatusUrl,
                              type: 'GET',                                                                                    
                            success: function (response) {
                                console.log(response);
                                 location.reload();
            }
                    });
            }
            function UpdateData(appointmentId)
            {
                var  UpdateDataZoomUrl ="<?php echo base_url()."Ajaxcalls/UpdateDataZoom/";?>"+appointmentId;
                $.ajax({
                     url: UpdateDataZoomUrl,
                              type: 'GET',      
                         success: function (response) {
                                console.log(response);
                                // location.reload();
            }
                    });
            }
        </script> 
    <?php
        if (NULL !== $this->session->userdata('expertChangePasswordSuccess')) {
            include('popUp/expertChangePasswordSuccess_view.php');
            ?>
            <script>
                $("#changeSuccessMessage").modal('show');
            </script>
            <?php
        }
        if (NULL !== $this->session->userdata('expertChangePasswordError')) {
            // echo $this->session->flashdata('expertLoginError');
            include('popUp/expertChangePasswordError_view.php');
            ?>
            <script>
                $("#expertChangePasswordError").modal('show');
            </script>
            <?php
        }
         include('popUp/ChangePassword_view.php'); 
         include('analytics/googleAnalytics.php');

         ?>
            <?php include('popUp/ClientHelpNote.php'); ?>

<div id="addNoteExpert" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Note/Query</h4>
      </div>
      <div class="modal-body">
      <p> <?php ?></p>
      <form action="#" method="post">
      <div class="form-group">
      <label class="sr-only">Note</label>
       <textarea class="form-control" name="message" id="message" rows="5" cols="2"></textarea>
       </div>
       <div class="form-group">
       <select class="form-control" name="shared" id="shared">
          <option value="0">Hidden</option>
          <option value="1">Publihsed</option>
         
        </select>
        </div>

        </form>
      </div>
      <div class="modal-footer">
       <button  class="btn btn-default"  onclick="addNote();">Submit</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
<!-- Add Action Taken -->
<div id="addActionExpert" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Action Taken</h4>
      </div>
      <div class="modal-body">
      
      <form action="#" method="post">
      <div class="form-group">
      <label class="sr-only">Comment</label>
       <textarea class="form-control" name="comment" id="comment" rows="5" cols="2"></textarea>
       </div>
       <div class="form-group">
       <input type="text" class="form-control" id="payment_amount" >
      </div>
       

        </form>
      </div>
      <div class="modal-footer">
       <button  class="btn btn-default"  onclick="addActionByExpert();">Submit</button>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
<script>
function addActionByExpert () {
  var clientId=$(".clientId").val();
  var expertId=$(".expertId").val();
  var comment=$("#comment").val();
  var payment_amount=$("#payment_amount").val();
  $.ajax({
                                url: "<?php echo base_url(); ?>Ajaxcalls/addActionExpert",
                                type: 'POST',
                                data: {'clientId': clientId,'expertId':expertId,'comment':comment,'payment_amount':payment_amount},
                                async: false,
                                success: function (response) {
                                   
                                    $("#comment").val('');
                                    $('#addActionExpert').modal('hide');
                                    location.reload();
                                    
                                }
                            });
}


 function addNote()
 {
    var clientId=$(".clientId").val();
    var expertId=$(".expertId").val();
    var message=$("#message").val();
    var shared=$("#shared option:selected").val();
    
    $.ajax({
                                url: "<?php echo base_url(); ?>Ajaxcalls/addNoteExpert",
                                type: 'POST',
                                data: {'clientId': clientId,'expertId':expertId,'message':message,'shared':shared},
                                async: false,
                                success: function (response) {
                                   
                                    $("#message").val('');
                                    $('#addNoteExpert').modal('hide');
                                    location.reload();
                                    
                                }
                            });
   


 }


</script>
        <script src=<?php echo base_url() . "js/simplebar.js"; ?>></script>
         <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
         <script type="text/javascript">

function initiate_audio_call(appointmentId)
{
        $.ajax({

        url: "<?php echo base_url('Ajaxcalls/clickocall');?>",

        type: 'POST',

        data: {'appointmentId': appointmentId},

 });
 alert("Call initiated!");       
  
}
</script>

    </body>
</html>
