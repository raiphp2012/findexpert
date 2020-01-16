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

        <link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/responsive.css'; ?>" rel="stylesheet">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
         <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url() . 'js/jquery.min.js'; ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
        </script>
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
                            <strong>Success!</strong><?php echo $this->session->flashdata('FolderCreateSuccessMessage'); ?>
                        </div>
                        <?php
                    }
                    if (null != $this->session->flashdata('FolderCreateErrorMessage')) {
                        ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong><?php echo $this->session->flashdata('FolderCreateErrorMessage'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content " style="border:none;">
                            <div class="tab-pane active"> 
                                <div>
                                    <div class="panel mar0" id="mid-content" >
                                        <div class="row">
                                        <div class="col-md-6 slide-R" >
										
                                                        
                                            <div class="panel-wrapper" data-simplebar-direction="vertical">
                                            <div class="panel">
                                                <div class="panel-heading">E-Lockers</div>
												<table width="100%">
																<tr>
																<td style="width:<?php echo $disk_used;?>%; text-align:center;"><?php echo $disk_used;?>% Used</td>
																<td style="width:<?php echo $disk_remaining;?>%;text-align:center;"><?php echo $disk_remaining;?>% Free</td>
																</tr>
																
																<tr>
																<td style="background-color:red;width:<?php echo $disk_used;?>%;height:20px;"></td>
																<td style="background-color:green;width:<?php echo $disk_remaining;?>%;height:20px;"></td>
																</tr>
																
																</table>
													<br>			
                                                <button type="button" onclick="showCreateFolder()" value="Create Folder" class="btn btn-primary create-folder"><i class="fa fa-folder"></i>Create Folder</button>
                                               <button type="button" onclick="showUploadFom()" value="Upload a file" class="btn btn-primary upload"><i class="fa fa-cloud-upload"></i>Upload a File</button>
                                                <form method="POST" class="form-horizontal" action="<?php echo base_url() . 'ExpertDocument/createNewFolder'; ?>" style="display:none;min-height:82px" id="createFolderForm">
                                                    <div class="col-md-12 pad0" style="margin:2% 0">
                                                        <div class="col-md-12 pad0" style="margin-bottom:2%">     
                                                            <div class="col-md-6">              
                                                            <select class="form-control" name="subFolder">
                                                               <option value="No"> No Subfolder</option> 
                                                          <?php
                                                        foreach ($foldersList as $key => $folders) {
                                                        $folderName = rtrim($key, " \\");
                                                        //$key = strtoupper(rtrim($key, " \\"));
                                                        //$key = strtoupper(rtrim($key, " \/"));
														
														
														$key = rtrim($key, " \\");
                                                        $key = rtrim($key, " \/");
                                                        ?>
                                                        <option><?php echo $key; ?></option>
                                                               
                                                        <?php } ?>       
                                                           </select>
                                                        </div>                                      
                                                          <div class="col-md-6">                                  
                                                            <input type="text" name="folderName" required  class="form-control" style="float:left;">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6"><input type="submit" value="Create" class="btn btn-success create-folder-btn"><button class="btn btn-success" style="margin-left: 10px;" id="cancel-folder">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                     
                        <?php
                        
    
                            $dirRef=opendir('./expertdocuments/' . $this->session->userdata('expertId'));
							
							
							

                        $i = 1;
                            while($res=readdir($dirRef))
                            {  
								$path = '../officeautomation/expertdocuments/'.$this->session->userdata('expertId');
                                    if($res!="." and $res!=".." and is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res))
                                    {
                                        //$path = '../officeautomation/expertdocuments/'.$this->session->userdata('expertId');
										
										$dir_path = $path."/".$res;

                                        echo "<div class='panel panel-bottom directory'>
                                               <div class='panel-heading head-color'>
                                                     <i class='fa fa-folder icon-padR'></i>
                                                     <b onclick='$(\"#dir-$i\").toggle()' id='olddir-$i'>$res</b>
                                                     <input type='text' name='renamefoldder' value='$res' id='dir-$i' style='display:none;'>
                                                     <input type='hidden' name='path' value='$path' id='pathdir-$i'>";
													 ?>
													<a  href="javascrpt:void(0);" onclick="delete_directory('<?php echo $dir_path; ?>');" ><i class="fa fa-trash"></i></a>
                                                   <?php
												   echo  "<i class='fa fa-chevron-circle-down dropdown-icon'></i>
                                                </div>
                                                <div class='dir-content'>";
                                        
                                                $i++;
                                                $dirRef12=opendir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$res);
                                                $j=1;
												$k=1;
                                            while($res12=readdir($dirRef12))
                                            {
												$innerpath = '../officeautomation/expertdocuments/'.$this->session->userdata('expertId').'/'.$res;
                                                    if($res12!="." and $res12!=".." and !(is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res.'/'.$res12)))
                                                    {
                                                       
                                                        echo "<div class='panel-body'>
                                                            <div class='folder-data'>
                                                                <i class='fa fa-file'></i>
																<b onclick='$(\"#file-$i$k\").toggle()' id='oldfile-$i$k'\>$res12
                                                           </b>
														    <input type='text' name='renamefoldder' value='$res12' id='file-$i$k' >
                                                            <input type='hidden' name='path' value='$innerpath' id='pathfile-$i$k'>
 
														   </div>
                                                            <div class='folder-button'>
															<a role='button' class='btn btn-primary share' href='$path/$res/$res12' download><i class='fa fa-download'></i><a>		
                                                              <a role='button' class='btn btn-primary share' onclick='fetchExistingClientList(\'' . $res . '\',\'' . $res12 . '\')'><i class='fa fa-share'></i><a>";
                                                        echo '<a role="button" class="btn btn-danger delete" onclick="deleteExpertDocument(\'' . $res . '\',\'' . $res12 . '\')"><i class="fa fa-trash"></i></a>
                                                        </div></div>';
														$k++;
                                                        
                                                    }
                                                    if($res12!="." and $res12!=".." and is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res.'/'.$res12))
                                                    {
														$inner_dir_path=$innerpath.'/'.$res12;
                                                      echo "<div class='panel panel-bottom sub-directory'>
                                                             <div class='panel-heading head-color'>
                                                               <i class='fa fa-folder icon-padR'></i>
                                                                <b onclick='$(\"#dir-$i$j\").toggle()' id='olddir-$i$j'>$res12</b>
                                                                <input type='text' name='renamefoldder' value='$res12' id='dir-$i$j' style='display:none;'>
                                                                <input type='hidden' name='path' value='$innerpath' id='pathdir-$i$j'>";
																?>
														<a  href="javascrpt:void(0);" onclick="delete_directory('<?php echo $inner_dir_path; ?>');" ><i class="fa fa-trash"></i></a>
																
                                                            <?php    echo "<i class='fa fa-chevron-circle-down dropdown-icon'></i>"
                                                                . "</div><div class='dir-content'>";
                                                                $j++;

                                                      
                                                     $dirRef22=opendir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$res.'/'.$res12);
                                                     while($res22=readdir($dirRef22))
                                                     {
                                                          if($res22!="." and $res22!="..")
                                                            {
                                                                // echo $res22;
                                                                echo '<div class="panel-body"><div class="folder-data"><b><i class="fa fa-file"></i></b>'.$res22.'</div><div class="folder-button">';
																echo '<a role="button" href="'.$path.'/'.$res.'/'.$res12.'/'.$res22.'" class="btn btn-primary share" download><i class="fa fa-download"></i></a>';	
																echo '<a role="button" href="#" class="btn btn-primary share" onclick="fetchExistingClientList(\'' . $res .'/'.$res12. '\',\'' . $res22 . '\')"><i class="fa fa-share"></i></a>';
                                                                echo '<a role="button" class="btn btn-danger delete" onclick="deleteExpertDocument(\'' . $res .'/'.$res12. '\',\'' . $res22 . '\')"><i class="fa fa-trash"></i></a></div></div>';
                                                                
                                                            }
                                                         
                                                     }
                                                     echo "</div></div>";
                                                    }        
                                                    
                                            }
                                            echo "</div></div>";
                                        
                                    }
                                    else{
                                   
                                    if($res!="." and $res!=".." and !(is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res)))
                                    {
                                        
										
                                        //echo "<b>".$res."</b>";
										echo "<b onclick='$(\"#dir-$i\").toggle()' id='olddir-$i'>$res</b>
                                                     <input type='text' name='renamefoldder' value='$res' id='dir-$i' style='display:none;'>
                                                     <input type='hidden' name='path' value='$path' id='pathdir-$i'>";
										
										
                                    }
                                     

                                    }
                                    
                                    
                            }     
                                                ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 slide-L">
                                            <div class="panel-wrapper ediary-notes" data-simplebar-direction="vertical">
                                                <div class="panel">
                                               <div class="panel-heading">E-Diary<a href="#" class="btn  e-dairy pull-right add-btn" id="eDairy">Add New<i class="fa fa-plus"></i></a></div>
                                            </div>
                                            <div class="notes">
                                                   <table class="table">
                                                <thead class="thead-bg">
                                                    <th>Sr.No</th>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </thead>
                                                 <tbody>
                                                 <?php
                                                 error_reporting(0);
                                                 if( count($dairy) ):
                                                    ?>
                                                    <?php $count = $this->uri->segment(3,0); ?>



                                                <?php
                                                  foreach($dairy as $dairys ): ?>
                                                    <tr class="success">
                                                    <td><?= ++$count?></td>
                                                    <td>
                                                        <?= $dairys->eDairyTitle ?>
                                                    </td>
                                                    <td>dd/mm/yyyy</td>
                                                    <td>
                                                        <button class="btn btn-success"><i class="fa fa-eye"></i></button>
                                                        <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                        
                                                    </tr>
                                                    <?php
                                                    endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                    <td colspan="4">
                                                        No records found
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    endif;
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
						function delete_directory(dir_path)
							{
									var result = confirm("Want to delete?");
								if (result) {
									$.ajax({
									url:<?php echo "'" . base_url() . 'Ajaxcalls/deleteDirectory' . "'";?>,
									type: 'POST',
									data: { 'dir_path': dir_path},
									success: function (renameStatus) {
										alert('success');
										window.location.reload(true);
                           
								}
								 });
								}
								
							}
         </script>
         
        </div>
        <!-- Footer -->

        
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="js/simplebar.js"></script>
		<script src="<?php echo base_url() . 'js/jquery.smartmenus.min.js'; ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.smartmenus.bootstrap.min.js'; ?>"></script>
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
		<?php include('loginFooter.php') ?>
        <?php include('popUp/NoAppointmentRecord_view.php'); ?>
        <?php include('popUp/ShareFileDetails_view.php'); ?>
        <?php include('popUp/UploadFileExpert_view.php'); ?>
		<?php //include('popUp/ChangePassword_view.php');
              include('analytics/googleAnalytics.php');
         ?>

        <script>
        $(document).ready(function(){
            $('input[name=renamefoldder]').blur(

                function(){
                    var id = $(this).attr('id');
                    var new_folder_name = $(this).val();
                    var old_folder_name = $('#old'+id).text();
                    var path = $('#path'+id).val();
                   
                    $.ajax({
                        url:<?php echo "'" . base_url() . 'Ajaxcalls/renameExpertDocument' . "'";?>,
                        type: 'POST',
                        data: { 'new_folder_name': new_folder_name,'old_folder_name':old_folder_name,'path':path},
                        success: function (renameStatus) {
                                 $('#'+id).hide();
                                  //alert('success');
                            window.location.reload(true);
                        }
                    });
                }

                );



        });





        function showUploadFom()
        {
            $("#UploadFileExpert").modal('show');
        }
        function fetchExistingClientList(path, fileName)
        {
            $.ajax(
            {
                url: <?php echo "'" . base_url() . 'Ajaxcalls/fetchExistingClientList' . "'"; ?>,
                type: 'POST',
                data: {'expertId': <?php echo $this->session->userdata('expertId'); ?>, 'fileName': fileName, 'path': path},
                success: function (clientcount)
                {
                if (clientcount != -1)
                {
                    var clientList = JSON.parse(clientcount);
                    var checkboxes = '';
                    $("#fileName").val(fileName);
                    $.each(clientList, function (i, item)
                    {
                        checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" name="clientId[]" value=' + clientList[i].clientId + '>' + clientList[i].clientName + '</label></div>';
                    });
                    document.getElementById('clientName').innerHTML = checkboxes;
                    $("#path").val(path);
                    $("#SharedFileDetailsPop").modal('show');
                } else
                {
                    $("#noAppointmentRecord").modal('show');
                }
                }
                });
        }
            function shareExpertDocument()
            {
                var path = $("#path").val();
                var fileName = $("#fileName").val();
                var clientId = document.getElementsByName("clientId");
                $.ajax({
                    url:<?php echo "'" . base_url() . 'Ajaxcalls/shareExpertDocument' . "'"; ?>,
                    type: 'POST',
                    data: {'clientId': clientId, 'fileName': fileName, 'path': path},
                    success: function (shareStatus) {
                        return false;
                        window.location.reload(true);
                    }
                });
            }
            function deleteExpertDocument(path, fileName)
            {
                if (confirm("Are you sure to delete this file") == true)
                {
                    $.ajax({
                        url:<?php echo "'" . base_url() . 'Ajaxcalls/deleteExpertDocument' . "'"; ?>,
                        type: 'POST',
                        data: {'expertId': '<?php echo $this->session->userdata('expertId'); ?>', 'fileName': fileName, 'path': path},
                        success: function (deleteStatus) {
//                                                                    return true;
                            window.location.reload(true);
                        }
                    });
                }
            }
           
            function showCreateFolder()
            {
                $("#createFolderForm").toggle(500);
            }
                                                    $('#cancel-folder').on('click',()=>{
                                                        $("#createFolderForm").toggle(500);
                                                    })
                $(".directory").click(function() {
                    //console.log('hello');
                    event.stopPropagation();
					if(!$(this).children('.dir-content').hasClass("nn")){
						$(this).children('.dir-content').slideDown(300);
						$(this).children('.dir-content').addClass('nn');				
						
					}else{
						$(this).children('.dir-content').removeClass('nn');
						$(this).children('.dir-content').slideUp(300);						
					}
					
					
                });
                $(".sub-directory").click(function(e) {
                    e.preventDefault;
                    //console.log('hello');
                    event.stopPropagation();
					if(!$(this).children('.dir-content').hasClass("nn")){
						$(this).children('.dir-content').slideDown(300);
						$(this).children('.dir-content').addClass('nn');				
						
					}else{
						$(this).children('.dir-content').removeClass('nn');
						$(this).children('.dir-content').slideUp(300);						
					}
					
                });
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
        ?>
		<script>
		$(document).ready(function(){
			
			<?php if($this->session->userdata('isExpertVerified')==0){?>
			//$('#myModal').modal('show');
			//$(".slide-L,.slide-R").prepend("<div class=\"overlay\"></div>");

			//$('#mid-content').find('input, textarea, button, select, div,i,b,a').attr('disabled','disabled');
			//$('.simplebar-content').find('input, textarea, button, select, div').attr('disabled','disabled');
			//$('#mid-content').css('opacity',0.2);

			<?php } ?>
			
		});
		</script>
		
        
        
    </body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Dual Authentication is Requried</h4>
      </div>
      <div class="modal-body">
       <form class="form-inline" action="<?php echo base_url('ExpertDocument/otpVerification')?>" method="post">
		  <div class="form-group">
			<label class="sr-only" for="exampleInputAmount">OTP</label>
			<div class="input-group">
			  
			  <input type="text" class="form-control" id="exampleInputAmount" name="otp" placeholder="Enter OTP">
			  
			</div>
		  </div>
		  <input  type="submit" class="btn btn-primary" value="Verify">
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Resend OTP</button>
      </div>
    </div>
  </div>
</div>	
</html>