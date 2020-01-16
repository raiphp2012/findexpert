<?php
/*
 * @author Visheshagya
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Visheshagya">
        
        <link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>

        <title>Expert Appointment Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
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
        <div class="content-full-height">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="../Expert" id="logo"></a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                <?php if($this->session->userdata('parent_id')==0){?>
                                <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url().'ExpertProfile/updateMyMember';?>';" data-toggle="tab">My Practice</a></li>
                                    <?php } ?> 
                                    <li class="active"><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertAppointments'; ?>.';" data-toggle="tab">My Appointments</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertDocument'; ?>.';" data-toggle="tab">E-Lockers</a></li>
                                    <li><a style="cursor: pointer"onclick="location.href = '<?php echo base_url() . 'ExpertProfile'; ?>.';" data-toggle="tab">My Profile</a></li>
                                    <li>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                        <span class="login-icon pull-left"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation" class="dropdown-header">Action</li>
                                        <li><a href="Logout" class="btn btn-primary btn-xs" role="button" data-toggle="modal" id="ChangePassword">Change Password</a>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>Logout" class="btn btn-danger btn-xs" role="button" data-toggle="modal">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- body content -->        
            <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content" style="border:none;">
                            <div class="tab-pane active">                            
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont"></div>
                                </div>                                                                 
                                <div>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">Client Name: <b><?php echo strtoupper($appointmentData[0]->clientName); ?></b></div>
                                       <div id='myPublisherDiv'></div>
                                           <div id='subscribersDiv'></div> 
                                        <div class="col-md-6" style="border:1px solid lightgray;">
                                            <div class="panel panel-default" style="overflow-y: scroll; height: 475px">
                                                <!--<div class="panel-heading">Appointments Taken</div>-->
                                                <table class="table">
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $currentDate = date('Y-m-d');
  //                                                      echo date('H:i:s');
//                                                      $currentTime = date('H:i:s', strtotime('+5 hours +30 minutes'));
                                                        $currentTime = date('H:i:s');
//echo $currentTime;
                                                        
                                                        foreach ($appointmentData as $appointments) {
                                                         if($i==1)
                                                           {
                                                                $clientId=$appointments->clientId;
                                                                $clientName=$appointments->clientName;
                                                                 $expertId=$appointments->expertId;
                                                                $expertName=$appointments->expertName;
                                                           ?>
                                                           <input type="hidden" name="clientId" class="clientId" value="<?php echo 
                                                                         $appointments->clientId; ?>" >
                                                        <input type="hidden" name="expertId" class="expertId" value="<?php echo  
                                                                        $appointments->expertId; ?>" >
                                                           <?php
                                                       }
                                                            if (($appointments->consultationStatusId == 1) && ($appointments->appointmentDate == $currentDate) && (strtotime($currentTime) >= strtotime($appointments->appointmentStartTime)) && (strtotime($currentTime) <= strtotime($appointments->appointmentEndTime))) {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="3">
                                                                <tr>
                                                                	<td>Appointment </td>
                                                                	<td><?php echo $i; ?></td>
                                                                	<td> </td>
                                                                </tr>
                                                                <tr>
                                                                <td>Appointment No.</td>
                                                                    <td><?php echo $appointments->appointmentId; ?></td>
                                                                    <td>
                                                                       
                                                                        <?php if ($appointments->consultationTypeId == 2) { ?>
                                                                            <input type="button"                                                                                
                                                                                   onclick="startAudioCall('<?php echo date('Y-m-d');?>','<?php echo $appointments->expertMobileNumber; ?>', '<?php echo $appointments->clientMobileNumber; ?>', '<?php echo date('H:i',strtotime($appointments->appointmentStartTime)); ?>', '<?php echo date('H:i',strtotime($appointments->appointmentEndTime)); ?>')"
                                                                                   class="btn btn-primary" value="Start Audio"></td><td>                                                                    </td>
                                                                    </td>

                                                                                   <?php
                                                                               }
                                                                               if ($appointments->consultationTypeId == 1) {
                                                                                   ?>
                                                               
                                                                            <a href="<?php echo $appointments->start_url?>" target="_blank" class="btn btn-success" >Start Video Call </a>
                                                                                   <input type="button"                                                                                
                                                                                   onclick="startAudioCall('<?php echo date('Y-m-d');?>','<?php echo $appointments->expertMobileNumber; ?>', '<?php echo $appointments->clientMobileNumber; ?>', '<?php echo date('H:i',strtotime($appointments->appointmentStartTime)); ?>', '<?php echo date('H:i',strtotime($appointments->appointmentEndTime)); ?>')"
                                                                                   class="btn btn-primary" value="Start Mobile Call"></td><td>
                                                                
                                                                       <input type="button"                                                                                
                                                                                   onclick="ddlChange( '<?php echo $appointments->appointmentId; ?>')"
                                                                                   class="btn btn-primary" value="Completed">
                                                                                   </td>
                                                                                   
                                                                               <?php }
                                                                               ?>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <?php
                                                                        $dateTime = $appointments->appointmentDate . $appointments->appointmentStartTime . '-' . $appointments->appointmentEndTime;
                                                                       // echo $appointments->appointmentId;
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                   
                                                                </tr>
                                                                <tr>
                                                                <td>Date</td>
                                                                <td><?php echo $dateTime; ?></td>
                                                                
                                                                </tr>
                                                                <tr><td>Type</td><td><?php echo $appointments->consultationTypeName; ?></td><td></td></tr>
                                                                <tr><td>Status</td><td><?php echo$appointments->consultationStatusName; ?></td><td></td></tr>
                                                                </td>
                                                                </tr>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="3">
                                                                <tr><td>Appointment </td><td><?php echo $i; ?></td><td></td></tr>
                                                                <tr><td>Appointment No.</td><td><?php echo $appointments->appointmentId; ?></td><td></td></tr>
                                                                <tr><td>Date</td><td><?php echo $appointments->appointmentDate . '(' . $appointments->appointmentStartTime . '-' . $appointments->appointmentEndTime . ')'; ?></td><td></td></tr>
                                                                <tr><td>Type</td><td><?php echo $appointments->consultationTypeName; ?></td><td></td></tr>
                                                                <tr><td>Status</td><td><?php echo$appointments->consultationStatusName; ?></td><td></td></tr>
                                                                </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $i++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid lightgray; height: 500px">
                                            <div class="panel panel-default" style="max-height: 200px; overflow-y:auto">
                                                <div class="panel-heading">Documents</div>
                                                <?php
                                                if (is_array($sharedFileDetails)) {
                                                    foreach ($sharedFileDetails as $fileDetails) {
                                                        if ($fileDetails->sharedBy == 2) {
                                                            ?>
                                                            <div class="panel panel-success col-md-7"  style="float:left">
                                                                <div class="panel-heading">
                                                                    <?php
                                                                    $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . "/" . $fileDetails->fileName;
                                                                    ?>
                                                                    <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><?php echo $fileDetails->fileName; ?></a><br/>

                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="panel panel-info col-md-7"  style="float: right">
                                                                <div class="panel-heading">
                                                                    <?php
                                                                    $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . "/" . $fileDetails->fileName;
                                                                    ?>
                                                                    <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><?php echo $fileDetails->fileName; ?></a><br/>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="panel panel-default" >
                                                <div class="panel-heading"> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNoteExpert"> Add Note</button></div>
                                                <div class="panel-body"   style="max-height: 180px;overflow-y: auto;float:left" >
                                                    <?php
                                                    foreach ($appointmentData as $appointments) {
                                                        if ((trim($appointments->appointmentNotes) != NULL) && trim($appointments->appointmentNotes) != "") {
                                                            ?>
                                                            <div class="panel panel-success col-md-12"  style="float:left">
                                                                <div class="panel-heading">
                                                                    <?php
                                                                    echo $appointments->appointmentNotes;
                                                                    ?>
                                            </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                
                                                 <table class="table">
                                                  <thead>
                                              <tr>
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
                                                    
                                                    if( $key=="shared")
                                                    {

                                                        if($value==1)
                                                        {
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
                                                                                                    }
                                                  echo "</tr>";                                                  
                                                
                                             }
                                            
                                            }
                                             ?>
                                             
                                            </tbody>
                                          </table>
                                          </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Action Taken</div>
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
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>

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
    </body>
</html>
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
<script>
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