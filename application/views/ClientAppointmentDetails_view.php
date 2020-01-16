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

        

        <!--[if lt IE 9]>

                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <![endif]-->

        <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

        <!-- jQuery -->

        <script src="../js/jquery.min.js"></script>



       <!-- <script src="https://static.opentok.com/v2/js/opentok.js" charset="utf-8"></script>-->

         <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>

         <script src=<?php echo base_url() . "js/simplebar.js"; ?>></script>



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

                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div></a>

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

                                > My Appointments </a></li>

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

                    <h1>My Appointments</h1>

                </div>

            </div>

        </div>

        <div class="content-full-height">

            

            <!-- body content -->        

            <div class="two-column-con">

                <div class="container client-app-details">

                    <div id="exTab2" class="frm-detail">

                        <div class="tab-content" style="border:none">

                            <div class="tab-pane active">                            

                                <div class="main-content detail-view">

                                    <div class="detail-view-cont"></div>

                                </div>

                                <div>

                                    <div class="panel">

                                        <div class="panel-heading expert-head-name"><em>Expert Name:</em> <?php echo strtoupper($appointmentData[0]->expertName); ?></div>

                                            <div class="row">

                                             <div class="col-md-6 padL0 slide-R" >

                                             <div class="ca-details-wrapper" data-simplebar-direction="vertical">

                                            <div class="panel borRadius0">

                                                <div class="panel-heading second-head">Appointments</div>

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

                                                

                                                <!-- <div class="row datashow"> 

                                                    <div class="col-md-4 datacol datacol-type"><b>Sr.No.</b></div> -->

                                                     <div class="sr-no">#<?php echo $i; ?></div>

                                               <!--  </div> -->

                                                <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Appointment Id</div>

                                                    <div class="col-md-6 datacol"><?php echo $appointments->appointmentId; ?></div>



                                                 <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Date</div>

                                                                <div class="col-md-6 datacol"><?php $date = new DateTime($appointments->appointmentDate);

                                                echo $date->format('d-m-Y');

                                                ?></div>



                                                    </div>

                                                    <div class="row datashow">

                                                     <div class="col-md-4 datacol datacol-type ">Time</div>

                                                                <div class="col-md-4"><?php echo $appointments->appointmentStartTime; ?></div>

                                                    

				                          

                                                    </div>

                                                   

                                                    <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Type</div>

                                                    <div class="col-md-4 "><?php echo $appointments->consultationTypeName; ?> </div>

                                                    <div class="col-md-4 ">

                                                    <?php

                                                    //echo $appointments->start_call;

                                                     

                                                    

                                                                      

                                                    /*if ((($appointments->consultationTypeId == 1)) && ($appointments->appointmentDate == $currentDate) && (strtotime($currentTime) >= strtotime($appointments->appointmentStartTime)) && (strtotime($currentTime) <= strtotime($appointments->appointmentEndTime))) {*/

                                                                           

                                                                             

                                                                            ?>

                                                        

                                                                

                                                    </div>

                                                    </div>

                                                    <div class="row datashow">

                                                    <div class="col-md-4 ">Status </div>

                                                    <div class="col-md-4 " style="color:red;"><?php echo $appointments->consultationStatusName; ?></div>

                                                   <div class="col-md-4 "></div>

                                                    </div>

                                                     <script>

             //----start Videos call-----------------------------------------------------------------------
                                                    <?php if($appointments->consultationTypeId == 1){ ?>

                                                                $("#startVideoCall").modal('show');

             

                                 </script>

                                        <div class="row datashow" id="videoCall_btn">

                                            <div class="col-md-12" style="text-align: right;margin-top: 10px;">

                                             <a href="<?php echo $appointments->join_url?>" target="_blank" class="btn btn-success" id="StartVideoCall" >Start Video Call <i class="fa fa-video-camera"></i></a>

                                             <p>Expert is available, please start video call</p>

                                             </div>

                                        </div>

                                                

                                             <script>

                                             $(document).ready(function () {



                                       checkExpertAvailable();

                                });

                                                            $("#videoCall_btn").hide();

                                                            // setTimeout(checkExpertAvailable, 5000);

                                                             

                                                             

                                                              var appointmentId ="<?php echo $appointments->appointmentId; ?>";

                                                                           

                                                             function checkExpertAvailable(){                 

                                                                $.ajax({

                                                                        url: "<?php echo base_url(); ?>Ajaxcalls/checkExpertAvailable",

                                                                        type: 'POST',

                                                                        data: {'appointmentId': appointmentId},

                                                                        async: false,

                                                                         success: function (response) {

                                                                                 

                                                                                 if(response=="busy")

                                                                                 {

                                                                                   $("#videoCall_btn").hide();

                                                                                   setTimeout(checkExpertAvailable, 5000);

                                                                                   

                                                                                 }  

                                                                                 if(response=="online")

                                                                                 {

                                                        //   

                                                                            $("#videoCall_btn").show(); 

                                                                                 }    

                                                                         }

                                                                        });

                                                                               

                                                                        }                                                                                                    

                                                                             

                                                                             

                                                                

                                                                             

                                                                             

                                                         </script>

                                         <?php       }else if($appointments->consultationTypeId == 2) {   ?>

                                          $("#startAudioCall").modal('show');

             

                                 </script>

                                        <div class="row datashow" id="audioCall_btn">

                                            <div class="col-md-12" style="text-align: right;margin-top: 10px;">

                                             

                                             <p>Expert is available, please start audio call</p>

                                             </div>

                                        </div>


                                          <button class="btn btn-success">Start Audio Call <i class="fa fa-phone"></i></button>      

                                             <script>

                                             $(document).ready(function () {



                                       checkExpertAvailable();

                                });

                                                            $("#audioCall_btn").hide();

                                                            // setTimeout(checkExpertAvailable, 5000);

                                                             

                                                             

                                                              var appointmentId ="<?php echo $appointments->appointmentId; ?>";

                                                                           

                                                             function checkExpertAvailable(){                 

                                                                $.ajax({

                                                                        url: "<?php echo base_url(); ?>Ajaxcalls/checkExpertAvailable",

                                                                        type: 'POST',

                                                                        data: {'appointmentId': appointmentId},

                                                                        async: false,

                                                                         success: function (response) {

                                                                                 

                                                                                 if(response=="busy")

                                                                                 {

                                                                                   $("#audioCall_btn").hide();

                                                                                   setTimeout(checkExpertAvailable, 5000);

                                                                                   

                                                                                 }  

                                                                                 if(response=="online")

                                                                                 {

                                                        //   

                                                                            $("#audioCall_btn").show(); 

                                                                                 }    

                                                                         }

                                                                        });

                                                                               

                                                                        }                                                                                                    

                                                                             

                                                                             

                                                                

                                                                             

                                                                             

                                                         </script>

                                                         <?php }else{} ?>


                                                    </div>

                                                <?php 

                                                    } else {

                                                    ?>

                                                    <div class="databorder">

                                                    <!-- <div class="row datashow">  -->

                                                        <!-- <div class="col-md-4 datacol datacol-type"><b>Sr.No.</b></div> -->

                                                        <div class="sr-no">#<?php echo $i; ?></div>

                                                    <!-- </div> -->

                                                    <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Appointment Id</div>

                                                    <div class="col-md-6 datacol"><?php echo $appointments->appointmentId; ?></div>



                                                    </div>

                                                    <div class="row datashow">

                                                     <div class="col-md-4 datacol datacol-type">Date</div>

                                                                <div class="col-md-6 datacol "><?php echo $appointments->appointmentDate . "(" . $appointments->appointmentStartTime . ")"; ?></div>

                                                    

                                                    </div>

                                                <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Type</div>

                                                    <div class="col-md-6 datacol"><?php echo $appointments->consultationTypeName; ?></div>



                                                    </div>

                                                <div class="row datashow">

                                                    <div class="col-md-4 datacol datacol-type">Status</div>

                                                    <div class="col-md-6 datacol" id="appointment-status"><?php echo $appointments->consultationStatusName; ?></div>



                                                    </div>

                                                    </div>

                                                

                                                <?php

                                                }                                                

                                                

                                                $i++;

                                                        }

                                                        ?>

                                                    

                                            </div>

                                        </div>

                                        </div>

                                        <div class="col-md-6 padR0 slide-L">

                                            <div class="ca-details-wrapper2 pad20">

                                            <div class="panel">

                                                <div class="panel-heading second-head">Documents</div>

                                                

                                            </div>

                                            <div class="panel">

                                                <div class="panel-heading padRL"><button type="button" class="btn btn-info btn-sm add-note" data-toggle="modal" data-target="#addNoteExpert"> Add Note</button>

                                                <button type="button" class="btn pad0  question" data-toggle="modal" title="Personal Notes for clients & Experts. Also they both can choose to share such notes. Although it is not mendetory. Click for more.." id="noteHelp"><i class="fa fa-question-circle"></i></button>

                                                </div>

                                                <div class="panel-body padRL">

                                       

                                            <ul class="nav nav-tabs">

                                              <li><a data-toggle="tab" href="#comments">Comments</a></li>

                                              <li  class="active"><a data-toggle="tab" href="#notes">Notes</a></li>

                                              <li><a data-toggle="tab" href="#shared-files">Shared Files</a></li>

                                              <li><a data-toggle="tab" href="#action-taken">Action Taken</a></li>

                                            </ul>



                                            <div class="tab-content notes-wrapper">

                                              <div id="comments" class="tab-pane fade">

                                                <div class="comments" data-simplebar-direction="vertical">

                                                <!-- <h3>Suggestions</h3> -->

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

                                                <?php

                                            }

                                               }

                                                ?>

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

                                          <div id="shared-files" class="tab-pane fade">

                                            <!-- <h3>Menu 2</h3> -->

                                            <div class="shared-files" data-simplebar-direction="vertical">

                                             <?php

                                                if (is_array($sharedFileDetails)) {

                                                    foreach ($sharedFileDetails as $fileDetails) {

                                                        if ($fileDetails->sharedBy == 1) {

                                                            ?>

                                                            <div class="panel" >

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

                                                            <div class="panel" >

                                                                <div class="panel-heading comment-para">

                                                                    <div class="row">

                                                                        <div class="col-md-10 pad0">

                                                                    <?php

                                                            $fileDownloadPath = base_url() . "ShowFile/sharedFile/" . $fileDetails->filePath . $fileDetails->fileName;

                                                                    ?>

                                                                    <i class="fa fa-file"></i>

                                                                    <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><?php echo $fileDetails->fileName; ?></a><br/>

                                                                    </div>

                                                                    <div class="col-md-2 pad0 download-icon">

                                                                        <a target="_blank" href="<?php echo $fileDownloadPath; ?>"><i class="fa fa-cloud-download"></i></a>

                                                                        

                                                                    </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <?php

                                                        }

                                                    }

                                                }

                                                ?>

                                          </div>

                                          </div>

                                          <div id="action-taken" class="tab-pane fade">

                                            <div class="action-taken" data-simplebar-direction="vertical">

                                             <!--<div class="panel-heading padRL"><button type="button" class="btn btn-info btn-sm add-note" data-toggle="modal" data-target="#addActionExpert"> Add Action Taken</button>

                                            </div>-->



                                            <table class="table">

                                            <thead>

                                              <tr class="thead-bg">

                                                <th>Subject</th>

                                                <th>Amount</th>

                                                <th>Status</th>

                                        

                                                <th>Action</th>

                                              </tr>

                                            </thead>

                                            <tbody>

                                            <?php 

                                            if(!(is_array($appointmentActionTakenData)))

                                            {

                                                echo "<tr><td colspan='5'> No  Action taken </td></tr>";

                                            }

                                            if(is_array($appointmentActionTakenData)) {

                                             for ($i=0; $i < count($appointmentActionTakenData) ; $i++) {

                                              echo "<tr>";

                                              foreach ($appointmentActionTakenData[$i] as $key => $value ) {

                                                if($key=="expertId" or $key=="clientId" or $key=="id" or $key=="created_date" or $key=="modified_date") continue;

                                                echo "<td>".$value."</td>"; 

                                              }

                                              $id=$appointmentActionTakenData[$i]->id;

                                              $expertId=$appointmentActionTakenData[$i]->expertId;

                                              $clientId=$appointmentActionTakenData[$i]->clientId;

                                              $comment=$appointmentActionTakenData[$i]->comment;

                                              $payment_amount=$appointmentActionTakenData[$i]->payment_amount;

                                              



                                              

                                              if($appointmentActionTakenData[$i]->status=="success")

                                              {

                                                ?>

                                                <td> Completed</td>

                                                <?php



                                              }

                                              else{



                                              ?>

                                              <td><a href="<?php echo base_url().'Searchexpertdetails/clientMakePayment/'.$id.'/'.$expertId.'/'.$clientId.'/'.$comment.'/'.$payment_amount; ?>">Pay Now</a></td>

                                              <?php }

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

            <!-- end body content -->

        </div>

        </div>

        </div>

        <!-- Footer -->

        <?php include('loginFooter.php') ?>

<div id="addNoteExpert" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Add Note/Query</h4>

      </div>

      <div class="modal-body">

      <!-- <p> <?php ?></p> -->

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

<div id="addActionExpert" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Add Action Taken</h4>

      </div>

      <div class="modal-body">

      <!-- <p> <?php ?></p> -->

      <form action="#" method="post">

      <div class="form-group">

      <label class="sr-only">Comment</label>

       <textarea class="form-control" name="comment" id="comment" rows="5" cols="2"></textarea>

       </div>

       <div class="form-group">

       <input type="text" name="payment_amount" id="payment_amount" class="form-control" >

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



        <!-- Bootstrap Core JavaScript -->

      <!--   <script src="../js/bootstrap.min.js"></script> -->

       

        <?php include('popUp/ClientHelpNote.php'); ?>



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

                $('.ca-details-wrapper').simplebar();

                $('.action-taken').simplebar();

                $('.shared-files').simplebar();

                $('.notes').simplebar();

                $('.comments').simplebar();



                // console.log($('#appointment-status').text());

                // function appStatus(){

                //     if($('#appointment-status').text().toLowerCase() == 'cancelled'){

                //     $('#appointment-status').css({color:'red'});

                //     }else if($('#appointment-status').text().toLowerCase() == 'pending'){

                //         $('#appointment-status').css({color:'yellow'});

                //     }else{

                //         $('#appointment-status').css({color:'green'});

                //     }

                // }

                

        </script> 

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

<script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>

            
 <script type="text/javascript">


$(document).ready(function(){
    $("#virkss").on('click',function(){
        console.log('Click ok to initiate the Call');
        $.ajax({

        url: "<?php echo base_url('Ajaxcalls/clickocall');?>",

        type: 'POST',

        data: {'appointmentId': appointmentId},

       
 });
    })

 

})
</script>
    </body>

</html>



