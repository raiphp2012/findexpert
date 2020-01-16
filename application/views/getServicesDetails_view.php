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
        <title>Expert E-Lockers, E-Dairy : Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url().'css/bootstrap.css'; ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url().'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url().'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url().'css/responsive.css'; ?>" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>
    </head>
    <body>
           <?php include('expertnav.php') ?> 

            <!-- body content -->    
            <div class="content-full-height document">    
            <div class="two-column-con">
                <div class="container">
                    <?php
                    if (null != $this->session->flashdata('ShareSuccessful')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong><?php echo $this->session->flashdata('ShareSuccessful'); ?>                    
                        </div>
                        <?php
                    }
                    if (null != $this->session->flashdata('DeleteSuccessful')) {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong><?php echo $this->session->flashdata('DeleteSuccessful'); ?>
                        </div>
                        <?php
                    }
                    if (null != $this->session->flashdata('FolderCreateSuccessMessage')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong>
                            <?php echo $this->session->flashdata('FolderCreateSuccessMessage'); ?>
                        </div>
                        <?php
                    }
                    if (null != $this->session->flashdata('FolderCreateErrorMessage')) {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <?php echo $this->session->flashdata('FolderCreateErrorMessage'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content " style="border:none;">
                            <div class="tab-pane active"> 
                                <div>
                                    <div class="panel mar0" >
									<div class="row">
									<div class="col-md-6 slide-R"  >
									<h3>Work Progress (<?php echo $complete_segment;?>% Completed)</h3>
									<table width="100%">
																
																<tr>
																<td style="background-color:red;width:<?php echo $complete_segment;?>%;height:20px;"></td>
																<td style="background-color:green;width:<?php echo (100-$complete_segment);?>%;height:20px;"></td>
																</tr>
																
																</table>
									</div>
									</div>
									
                                        <div class="row">
                                        <div class="col-md-6 slide-R"  >

                                            <div class="panel-wrapper" data-simplebar-direction="vertical" style="overflow-y: auto;">
                                            <form class="form-horizontal" method="post" action="<?php echo base_url();?>MyOffice/update_workstatus_details" enctype="multipart/form-data">
      
                                            <div class="panel">
                                                <div class="panel-heading">Services Request
                                                </div>
                                                

                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> SRN #10003456</b>
                                        </div>
                                        <div class='dir-content'>

                                        
                                        </div></div>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                          <input type="hidden" name="srn_id" value="<?php echo $srid; ?>">  
                                        <b> LAST UPDATED</b> &nbsp;&nbsp;&nbsp;<LABEL><?php 
                                        echo $requestDetails->modified_date;?></LABEL>
                                        </div>
                                        </div>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> SRN TYPE</b> &nbsp;&nbsp;&nbsp;<LABEL><?php 
                                        echo $requestDetails->serviceName;?></LABEL>
                                        </div>
                                        </div>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> Task</b> &nbsp;&nbsp;&nbsp;<label><?php 
                                        echo $requestDetails->task_details;?></label>
                                        </div>
										
                                        </div>
										<div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> Task Completed</b><br />
										<?php
										
										foreach($work_complete_status as $work_complete){
											
											?>
										<input type="radio" name="complete_segment" value="<?php echo $work_complete;?>" 
										<?php if($work_complete <= $complete_segment){echo "disabled";}?> /> &nbsp;
										<?php echo $work_complete;?>%
										<?php } ?>
                                        </div>
										
                                        </div>
										
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> Status</b> &nbsp;&nbsp;&nbsp;<select name="status_id"><?php if(!empty($status)){
                                            for($i=0;$i<count($status);$i++){
                                               ?> 
                                                <option value="<?php echo $status[$i]->status_id; ?>" <?php if($requestDetails->status_id==$status[$i]->status_id){ echo "selected"; } ?>><?php echo$status[$i]->statusName; ?></option>
                                           <?php
                                            }

                                            }
                                        ?>

                                        </select>
                                        </div>
                                        </div>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> ASSIGNED TO</b> &nbsp;&nbsp;&nbsp;<label>
                                        <?php 
                                          echo $requestDetails->expertName;
                                                    ?></label>
                                        </div>
                                        </div>
										<?php if($this->session->userdata('parent_id')==0){?>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> RE-ASSIGNED TO</b> &nbsp;&nbsp;&nbsp;
                                        <select name="re_assign_member"> <?php if(!empty($teamMember)){
                                            for($i=0;$i<count($teamMember);$i++){
                                                ?>
                                                <option value="<?php echo $teamMember[$i]->expertId; ?>" <?php if($requestDetails->re_assign_member==$teamMember[$i]->expertId){ echo "selected";}?>><?php echo $teamMember[$i]->expertName;?></option>
                                           <?php
                                            }

                                            }
                                        ?></select>
                                        </div>
                                        </div>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <b> RE-ASSIGNED REASON</b> &nbsp;&nbsp;&nbsp;
                                        <input type="text" name="re_assign_reason" value="<?php if(empty($requestDetails->re_assign_member)){ echo " "; } else{
                                            echo $requestDetails->re_assign_reason;
                                        }?>">
                                        </div>
                                        
                                        </div>
										<?php } ?>
                                        <div class='panel panel-bottom directory'>
                                        <div class='panel-heading head-color'>
                                        <input type="submit" name="update" value="update">
                                        </div>
                                        </div>
                                    
                                        </div>
                                        </div>
                                        </form>
                                        </div>

                                        <div class="col-md-6 slide-L">
                                            <div class="panel-wrapper ediary-notes" data-simplebar-direction="vertical">
                                                <div class="panel">
                                               <div class="panel-heading">Document<a href="#" class="btn  e-dairy pull-right add-btn" id="eDairy">Share Doc</a></div>
                                            </div>
                                            <div class="notes">
                                                   <table class="table">
                                                <thead class="thead-bg">
                                                    
                                                    <th>Document</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </thead>
                                                 <tbody><tr><td>
												 <ul>
												 <?php
													$base_path=base_url().'/expertdocuments/';
													if($this->session->userdata('parent_id')==0){
														$base_path.=$this->session->userdata('expertId');
														}else if($this->session->userdata('parent_id')!=0){
															$base_path.=$this->session->userdata('parent_id'); 
															}
															
													if(!empty($shared_dir)){
														for($i=0;$i<count($shared_dir);$i++){
															 $dir=$shared_dir[$i];
															 $base_path = substr($dir,1,strlen($dir));
															 $base_path = base_url($base_path);
															 
															 $dirRef=opendir($dir);
															  while($res=readdir($dirRef))
															{ 
																if($res!='.' and $res!='..' and !(is_dir($dir.'/'.$res))){
																		echo "<li>";
																		echo $res." ";
																		echo "<a role='button' class='btn btn-primary share' href='$base_path/$res' download><i class='fa fa-download'></i></a>";
																		echo "</li>";
																}
																else if ($res!='.' and $res!='..' and is_dir($dir.'/'.$res)){
																		$path=$dir.'/'.$res;
																		echo "<li>";
																		echo $res."";
																		
																		 $dirRef11=opendir($path);
																		 echo "<ul>";
																	  while($res11=readdir($dirRef11)){
																		  if($res11!='.' and $res11!='..'){
																			echo "<li>";
																		  echo $res11." ";
																		  echo "<a role='button' class='btn btn-primary share' href='$base_path.'/'.$$res11' download><i class='fa fa-download'></i></a>";
																		  echo "</li>";  
																		  }
																		  
																	  }
																	  echo "</ul>";
																	  echo "</li>";
																}
																
															
															
															
															}
															
														
														}
														
													}	
												 ?>
                                               </ul> </tr>
                                                    
                                                 
                                                   
                                                 </tbody>
                                                </table>
                                            </div>

                                                <div class="panel">

                                               <div class="panel-heading" data-toggle="modal" data-target="#addNoteExpert" >Notes  <button class="add-btn" style="border:0;padding: 3px 10px;">Add Note</button></div>
                                               
                                            </div>
											
                                            <div class="notes">
                                                   <table class="table">
                                                <thead class="thead-bg">
                                                    <th>Notes</th>
                                                    <th>Date</th>
                                                </thead>
                                                 <tbody>
												 <?php 
												
												 if(!empty($NoteDetails)){
													 for($i=0;$i<count($NoteDetails);$i++)
													 {
														 ?>
														 <tr>
                                                     <td>
                                                       <?php echo $NoteDetails[$i]->messages; ?>
                                                        </td>
                                                        <td >
                                                        <?php echo $NoteDetails[$i]->datetime; ?>
                                                        </td>
                                                    </tr>
														 
													<?php	 
														 
													 }		
												 }
												
												 ?>
                                                 <?php
												 
												  if(empty($NoteDetails)){													  
												 ?>
                                                    <tr>
                                                    <td colspan="2">
                                                        No records found
                                                        </td>
                                                    </tr>
												<?php 
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
            <!-- end body content -->
            
            <?php
         include('popUp/eDairy.php');
         ?>

         <script>
                        $(document).ready(function () {
                            $("#eDairy").click(function () {
                                $("#eDairyModal").modal('show');
                            });
                        });
         </script>
         
        </div>
        <!-- Footer -->

        <?php include('loginFooter.php') ?>
        <?php include('popUp/NoAppointmentRecord_view.php'); ?>
        <?php include('popUp/ShareFileDetails_view.php'); ?>
        <?php include('popUp/UploadFileExpert_view.php'); ?>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="js/simplebar.js"></script>
         <script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
        <?php 
        include('popUp/ChangePassword_view.php');
        include('analytics/googleAnalytics.php');
         ?>
<div id="addNoteExpert" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Note/Query</h4>
      </div>
      <div class="modal-body">
      <form action="#" method="post">
      <div class="form-group">
      <label class="sr-only">Note</label>
       <textarea class="form-control" name="message" id="message" rows="5" cols="2" placeholder=" Write your Message"></textarea>
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
<script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>

<script>
 function addNote()
 {
    var clientId=<?php echo $requestDetails->clientId; ?>;
    var expertId=<?php echo $requestDetails->assign_member;?>;
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
                                   // location.reload();
                                    
                                }
                            });
   


 }


</script>
          
    </body>
</html>