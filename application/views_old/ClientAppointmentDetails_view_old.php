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
         <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
         
          <link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
          
        <script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">

        <title>Client Appointment Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <script src="https://static.opentok.com/v2/js/opentok.js" charset="utf-8"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {

                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
        
        <style>
          body{
    background-color:none;
     }
     .two-column-con{
     padding:0; margin:0;
     }
     .navbar-brand{
        background:none;
        }
         .datashow{
             padding-left: 14%;
         }
         .datacol{
             width: 32%;
         }
         .databorder{
                 border: 1px solid black;
                width: 99%;
                margin: 1%;
         }
        </style>
    </head>

    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                        <li class="active"><a  
                            <?php
                            if (empty($this->session->userdata('clientId'))) {
                                ?> 
                                    role="button"
                                    class="launch-modal"
                                    href="#"  
                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientAppointments'; ?>"
                                <?php
                                }
                                if (!empty($this->session->userdata('clientId'))) {
                                    ?>
                                    href="<?php echo base_url() . 'ClientAppointments'; ?>"
                                    <?php
                                }
                                ?>
                                > My Appointment </a></li>
                                <li> <a  <?php
                                    if (empty($this->session->userdata('clientId'))) {
                                        ?> 
                                            role="button"
                                            class="launch-modal"
                                            href="#"  
                                            data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientDocument'; ?>"
                                        <?php
                                        }
                                        if (!empty($this->session->userdata('clientId'))) {
                                            ?>
                                            href="<?php echo base_url() . 'ClientDocument'; ?>"
                                            <?php
                                        }
                                        ?>
                                        >E-Lockers</a></li>
                                        <li><a  <?php
                                            if (empty($this->session->userdata('clientId'))) {
                                                ?> 
                                                    role="button"
                                                    class="launch-modal"
                                                    href="#"  
                                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url() . 'ClientProfile'; ?>"
                                                <?php
                                                }
                                                if (!empty($this->session->userdata('clientId'))) {
                                                    ?>
                                                    href="<?php echo base_url() . 'ClientProfile'; ?>"
                                                    <?php
                                                }
                                                ?>
                                                >My Profile</a></li>
                        <li><?php
                            if (empty($this->session->userdata('clientId'))) {
                                ?> 
                                <a  role="button"
                                    class="launch-modal"
                                    href="#"  
                                    data-modal-id="modal-login" data-modal-value="<?php echo base_url(uri_string()); ?>">Login</a>
                                    <?php }
                                    
                            if(!empty($this->session->userdata('clientId')))
                            {
                            ?>
                            <a href="<?php echo base_url() ?>ClientHome/logout">Logout</a> 
                            <?php
                            }
                            ?></li>
                        
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="wide">
            <div class="container">
                <div class="page-header">
                    <h1>My Appointment Details</h1>
                </div>
            </div>
        </div>
        <div class="content-full-height">
            
            <!-- body content -->        
            <div class="two-column-con">
                <div class="container">
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content" style="border:none">
                            <div class="tab-pane active">                            
                                <div class="main-content detail-view">
                                    <div class="detail-view-cont"></div>
                                </div>
                                <div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Expert Name:<b> <?php echo strtoupper($appointmentData[0]->expertName); ?></b></div>

                                                                                                                        <div class="col-md-6" style="border:1px solid lightgray;">
                                            <div class="panel panel-default" style="overflow-y: scroll; height: 475px">
<!--                                                <div class="panel-heading"><b>Appointments Taken</b></div>-->
                                                     <?php
                                                        $i = 1;
                                                        $currentDate = date('Y-m-d');
                                                 //       $currentTime = date('H:i:s', strtotime('+5 hours +30 minutes'));
                                                        $currentTime = date('H:i:s');
                                                        foreach ($appointmentData as $appointments) {
                                                          if($i==1)
                                                           {
                                                                $clientId=$appointments->clientId;
                                                                $clientName="Self Created";
                                                                 $expertId=$appointments->expertId;
                                                                $expertName=$appointments->expertName;
                                                           ?>
                                                           <input type="hidden" name="clientId" class="clientId" value="<?php echo 
                                                                         $appointments->clientId; ?>" >
                                                        <input type="hidden" name="expertId" class="expertId" value="<?php echo  
                                                                        $appointments->expertId; ?>" >
                                                              <?php
                                                              } 
                                                            if ($appointments->consultationStatusId == 1) {
                                                      $dateTime = $appointments->appointmentDate . $appointments->appointmentStartTime . '-' . $appointments->appointmentEndTime;
                                                                ?>
                                                <div class="databorder">
                                                
                                                <div class="row datashow"> 
                                                    <div class="col-sm-6 datacol"><b>Sr.No.</b></div>
                                                                <div class="col-sm-6 datacol">#<?php echo $i; ?></div>
                                                    </div>
                                                    <div class="row datashow">
                                                    <div class="col-sm-6 datacol">Appointment Id</div>
                                                    <div class="col-sm-6 datacol"><?php echo $appointments->appointmentId; ?></div>

                                                    </div>
                                                 <div class="row datashow">
                                                    <div class="col-sm-6 datacol">Date</div>
                                                                <div class="col-sm-6 datacol"><?php $date = new DateTime($appointments->appointmentDate);
                                                echo $date->format('d-m-Y');
                                                ?></div>

                                                    </div>
                                                    <div class="row datashow">
                                                     <div class="col-sm-4 ">Time</div>
                                                                <div class="col-sm-4"><?php echo $appointments->appointmentStartTime; ?></div>
                                                    
				                          
                                                    </div>
                                                   
                                                    <div class="row datashow">
                                                    <div class="col-sm-4 ">Type</div>
                                                    <div class="col-sm-4 "><?php echo $appointments->consultationTypeName; ?> </div>
                                                    <div class="col-sm-4 ">
                                                    <?php
                                                                        if ((($appointments->consultationTypeId == 1)) && ($appointments->appointmentDate == $currentDate) && (strtotime($currentTime) >= strtotime($appointments->appointmentStartTime)) && (strtotime($currentTime) <= strtotime($appointments->appointmentEndTime))) {
                                                                            ?>
                                                                         <a href="<?php echo $appointments->join_url?>" target="_blank" class="btn btn-success" >Start Video Call </a>
                                                                         
                                                                            <?php
                                                                        }
                                                                        ?>
                                                    </div>
                                                    </div>
                                                    <div class="row datashow">
                                                    <div class="col-sm-4 ">Status </div>
                                                    <div class="col-sm-4 " style="color:red;"><?php echo$appointments->consultationStatusName; ?></div>
                                                   <div class="col-sm-4 "></div>
                                                    </div>
                                                    </div>
                                                <?php 
                                                    } else {
                                                    ?>
                                                    <div class="databorder">
                                                <div class="row datashow"> 
                                                    <div class="col-sm-6 datacol"><b>Sr.No.</b></div>
                                                                <div class="col-sm-6 datacol">#<?php echo $i; ?></div>
                                                    </div>
                                                    <div class="row datashow">
                                                    <div class="col-sm-6 datacol">Appointment Id</div>
                                                    <div class="col-sm-6 datacol"><?php echo $appointments->appointmentId; ?></div>

                                                    </div>
                                                    <div class="row datashow">
                                                     <div class="col-sm-6 datacol">Date</div>
                                                                <div class="col-sm-6 datacol"><?php echo $appointments->appointmentDate . "(" . $appointments->appointmentStartTime . ")"; ?></div>
                                                    
                                                    </div>
                                                <div class="row datashow">
                                                    <div class="col-sm-6 datacol">Type</div>
                                                    <div class="col-sm-6 datacol"><?php echo $appointments->consultationTypeName; ?></div>

                                                    </div>
                                                <div class="row datashow">
                                                    <div class="col-sm-6 datacol">Status</div>
                                                    <div class="col-sm-6 datacol"><?php echo $appointments->consultationStatusName; ?></div>

                                                    </div>
                                                    </div>
                                                
                                                <?php
                                                }                                                
                                                
                                                $i++;
                                                        }
                                                        ?>
                                                    
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="border:1px solid lightgray; height: 500px">
                                            <div class="panel panel-default" style="max-height: 200px; overflow-y:auto">
                                                <div class="panel-heading">Documents</div>
                                                <?php
                                                if (is_array($sharedFileDetails)) {
                                                    foreach ($sharedFileDetails as $fileDetails) {
                                                        if ($fileDetails->sharedBy == 1) {
                                                            ?>
                                                            <div class="panel panel-success col-md-7"  style="float:left">
                                                                <div class="panel-heading">
                                                                    <?php
                                                                        $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . $fileDetails->fileName;
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
                                                            $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . $fileDetails->fileName;
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
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addNoteExpert"> Add Note</button>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" title="Personal Notes for clients & Experts. Also they both can choose to share such notes. Although it is not mendetory. Click for more.." id="noteHelp">...?</button>
                                                </div>
                                                <div class="panel-body" style="max-height:200px;overflow-y:auto;">
                                                <?php
                                                foreach ($appointmentData as $appointments) {
                                                    if ((trim($appointments->appointmentNotes) != NULL) && trim($appointments->appointmentNotes) != "") {
                                                ?>
                                                            <div class="panel panel-info col-md-12"  style="float:left">
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
                                                            echo "<td>"."Publihsed"."</td>";
                                                        }
                                                        if($value==0)
                                                        {
                                                            echo "<td>"."Hidden"."</td>";
                                                        }

                                                    }
                                                    else if($key=="owner"){
                                                        $owner=explode("-",$value);
                                                        
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
            <!-- end body content -->
        </div>
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <?php include('ClientAppointmentCancelPopUp_view.php'); ?>
        <script>
                                                            function submitForm()
                                                            {
                                                                $("#expertSignupForm").submit();
                                                            }
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
        </script> 
        <?php
        include('popUp/clientChangePasswordSuccess_view.php');

        include('popUp/clientChangePasswordError_view.php');

        if (NULL !== $this->session->userdata('clientChangePasswordSuccess')) {
            ?>
            <script>
                $("#changeSuccessMessage").modal('show');
            </script>
            <?php
        }
        if (NULL !== $this->session->userdata('clientChangePasswordError')) {
            // echo $this->session->flashdata('expertLoginError');
            ?>
            <script>
                $("#clientChangePasswordError").modal('show');
            </script>
            <?php
        }
        ?>

<?php 
include('popUp/clientChangePassword_view.php'); 
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
<?php include('popUp/ClientHelpNote.php'); ?>
<script>
 function addNote()
 {
    var clientId=$(".clientId").val();
    var expertId=$(".expertId").val();
    var message=$("#message").val();
    var shared=$("#shared option:selected").val();
    
    $.ajax({
                                url: "<?php echo base_url(); ?>Ajaxcalls/addNoteClient",
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
 
 $(document).ready(function () {
                            $("#noteHelp").click(function () {
                                $("#noteHelpModal").modal('show');
                            });
                        });


</script>