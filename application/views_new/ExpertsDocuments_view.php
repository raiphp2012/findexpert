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

        <title>Expert E-Lockers, E-Dairy : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">

        <link href="<?php echo base_url() . 'css/bootstrap.css'; ?>" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url() . 'css/style.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/two-column.css'; ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'css/responsive.css'; ?>" rel="stylesheet">
         <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
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
                                    <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
                                    <li class="active"><a href="<?php echo base_url().'ExpertDocument'; ?>">E-Lockers</a></li>
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
                                    <div class="panel mar0" >
                                        <div class="row">
                                        <div class="col-md-6 slide-R" >
                                            <div class="panel-wrapper" data-simplebar-direction="vertical">
                                            <div class="panel">
                                                <div class="panel-heading">E-Lockers</div>
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
                                                        $key = strtoupper(rtrim($key, " \\"));
                                                        $key = strtoupper(rtrim($key, " \/"));
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

                            while($res=readdir($dirRef))
                            {  
                                    if($res!="." and $res!=".." and is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res))
                                    {
                                        // echo "<div class='panel panel-bottom directory'><div class='panel-heading head-color'><i class='fa fa-folder icon-padR'></i><b>$res</b><i class='fa fa-chevron-circle-down dropdown-icon'></i></div><div class='dir-content'>";
                                        echo "<div class='panel panel-bottom directory'><div class='panel-heading head-color'><i class='fa fa-folder icon-padR'></i><b>$res</b><i class='fa fa-chevron-circle-down dropdown-icon'></i>"
        . "</div><div class='dir-content'>";
                                        // echo "<ul>";
                                        $dirRef12=opendir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$res);

                                            while($res12=readdir($dirRef12))
                                            {
                                                    if($res12!="." and $res12!=".." and !(is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res.'/'.$res12)))
                                                    {
                                                        //echo $res.">".$res12."<br>";
                                                        // echo $res12;
                                                        echo '<div class="panel-body"><div class="folder-data"><b><i class="fa fa-file"></i></b>'.$res12.'</div><div class="folder-button"><a role="button" class="btn btn-primary share" onclick="fetchExistingClientList(\'' . $res . '\',\'' . $res12 . '\')"><i class="fa fa-share"></i><a>';
                                                        echo '<a role="button" class="btn btn-danger delete" onclick="deleteExpertDocument(\'' . $res . '\',\'' . $res12 . '\')"><i class="fa fa-trash"></i></a></div></div>';
                                                        // echo "</li>";
                                                    }
                                                    if($res12!="." and $res12!=".." and is_dir('./expertdocuments/'.$this->session->userdata('expertId').'/'.$res.'/'.$res12))
                                                    {
                                                      echo "<div class='panel panel-bottom sub-directory'><div class='panel-heading head-color'><i class='fa fa-folder icon-padR'></i><b>$res12</b><i class='fa fa-chevron-circle-down dropdown-icon'></i>"
        . "</div><div class='dir-content'>";
                                                      //echo "<h4>".$res12."</h4>";
                                                      //echo "<ul>";
                                                     $dirRef22=opendir('./expertdocuments/' . $this->session->userdata('expertId').'/'.$res.'/'.$res12);
                                                     while($res22=readdir($dirRef22))
                                                     {
                                                          if($res22!="." and $res22!="..")
                                                            {
                                                                // echo $res22;
                                                                echo '<div class="panel-body"><div class="folder-data"><b><i class="fa fa-file"></i></b>'.$res22.'</div><div class="folder-button"><a role="button" href="#" class="btn btn-primary share" onclick="fetchExistingClientList(\'' . $res .'/'.$res12. '\',\'' . $res22 . '\')"><i class="fa fa-share"></i></a>';
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
                                        
                                        echo "<b>".$res."</b>";
                                    }
                                        
                                    }
                                    
                                    
                            }   
                                
                                                    
                                                //exit();
                                                
                                                /*if (!empty($foldersList)) {
                                                    foreach ($foldersList as $key => $folders) {
                                                        $folderName = rtrim($key, " \\");
                                                        $key = strtoupper(rtrim($key, " \\"));
                                                        $key = strtoupper(rtrim($key, " \/"));
                                                        echo "<div class='panel panel-bottom directory'><div class='panel-heading head-color'><i class='fa fa-folder icon-padR'></i><b>$key</b><i class='fa fa-chevron-circle-down dropdown-icon'></i></div><div class='dir-content'>";
                                                        $i = 1;
                                                        foreach ($folders as $v=>$f) {
                                                           
                                                            $sharLink = "";
                                                            $deleteLink = "";
                                                            $shareLink = "<div class='panel-body'><div><div class='folder-data'><b>$i: </b>$f</div>";
                                                            $shareLink .= "<div class='folder-button'><a role='button' class='btn btn-primary share'";
                                                            $shareLink .= 'onclick="fetchExistingClientList(\'' . $folderName . '\',\'' . $f . '\')"><i class="fa fa-share"></i></a>';
                                                            $deleteLink = "<a role='button' class='btn btn-danger delete'";
                                                            $deleteLink .= 'onclick="deleteExpertDocument(\'' . $folderName . '\',\'' . $f . '\')"><i class="fa fa-trash"></i></a><div style="clear:both"></div></div></div></br></div>';
                                                            echo $shareLink . $deleteLink;
                                                            $i++;
                                                        }
                                                        echo "</div></div>";
                                                    }
                                                }*/
                                                    
                                                ?>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-6 slide-L">
                                            <div class="panel-wrapper ediary-notes" data-simplebar-direction="vertical">
                                                <div class="panel">
                                               <div class="panel-heading">E-Dairy<a href="#" class="btn  e-dairy pull-right add-btn" id="eDairy">Add New<i class="fa fa-plus"></i></a></div>
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
         </script>
         
        </div>
        <!-- Footer -->

        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>
        <?php include('popUp/NoAppointmentRecord_view.php'); ?>
        <?php include('popUp/ShareFileDetails_view.php'); ?>
        <?php include('popUp/UploadFileExpert_view.php'); ?>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
        <script src="js/simplebar.js"></script>

        <script>
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
                    console.log('hello');
                    event.stopPropagation();
                    $(this).children('.dir-content').slideToggle(300);
                });
                $(".sub-directory").click(function(e) {
                    e.preventDefault;
                    console.log('hello');
                    event.stopPropagation();
                    $(this).children('.dir-content').slideToggle(300);
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
        <?php 
        include('popUp/ChangePassword_view.php');
        include('analytics/googleAnalytics.php');
         ?>
          <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>