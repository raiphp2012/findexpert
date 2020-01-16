<?php
/*
 * @author Visheshagya
 */
include('analytics/googleAnalytics.php');
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
        <title>Client E-Locker, E-Dairy : Visheshagya</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/two-column.css" rel="stylesheet">
        <!--<link href="css/responsive.css" rel="stylesheet">-->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
         <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.js"></script>
        <!--<script src="js/custom.js"></script>-->
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">  
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
  .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
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
                    <a class="navbar-brand" href="<?php echo base_url(); ?>clientHome/mainHome"><div class="logo"></div>
                    <div class="logo_text">TAX & LEGAL SERVICES REDEFINED</div></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li ><a href="<?php echo base_url() .'Expertdetails'; ?>" >Home</a></li>   
                    <li ><a href="<?php echo base_url() .'Expertdetails/search/1'; ?>" >Expert Search</a></li>
                        <li  ><a href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a></li>
                        <li class="active" ><a href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a></li>
                        <li><a href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a></li>
                        <li><a href = "<?php echo base_url() ?>ClientHome/logout">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="wide">
            <div class="container">
                <div class="page-header">
                    <h1>E-Lockers</h1>
                </div>
            </div>
        </div>
        <div class="content-full-height document">
            
            <!-- body content -->        
            <div class="two-column-con document-wrapper">
                <div class="container-fluid">
                    <?php
                    if (null != $this->session->flashdata('ShareSuccessful')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success! </strong><?php echo $this->session->flashdata('ShareSuccessful'); ?>                    
                        </div>
                        <?php
                    }
                    if (null != $this->session->flashdata('DeleteSuccessful')) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong><?php echo $this->session->flashdata('DeleteSuccessful'); ?>
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
                            <strong>Error! </strong><?php echo $this->session->flashdata('FolderCreateErrorMessage'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content" style="border:none;">
                            <div class="tab-pane active">                            
                                <div>
                                    <div class="panel mar0" >
                                        <div class="row">
                                        <div class="col-md-6 slide-R" >
                                            <div class="panel-wrapper" data-simplebar-direction="vertical">
                                           <!--  <div class="simplebar-track">
                                                <div class="simplebar-scrollbar"></div>
                                            </div>
 -->                                            <!-- <div class="simplebar-scroll-content">
                                            <div class="simplebar-content"> -->
                                            <div class="panel">
                                                <div class="panel-heading">E-Lockers</div>
                                                <button type="button" onclick="showCreateFolder()" value="Create Folder" class="btn btn-primary create-folder"><i class="fa fa-folder"></i>Create Folder</button>
                                                <button type="button" onclick="showUploadFom()" value="Upload a file" class="btn btn-primary upload"><i class="fa fa-cloud-upload"></i>Upload a File</button>
                                                <form method="POST" action="<?php echo base_url() . 'ClientDocument/createNewFolder'; ?>" style="display:none;min-height: 50px;" id="createFolderForm">
                                                    <div class="col-md-12 pad0"  style="margin-top:3%">
                                                        <div class="col-md-6">                                             
                                                        <input type="text" name="folderName" required  class="form-control" style="float:left;margin-left: 20px;">
                                                        </div>
                                                        <div class="col-md-6"><input type="submit" value="Create" class="btn btn-success create-folder-btn">
                                                         <button class="btn btn-success" id="cancel-folder">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <?php
                                                if (!empty($foldersList)) {
                                                    foreach ($foldersList as $key => $folders) {
                                                        $folderName = rtrim($key, " \\");
                                                        $key = strtoupper(rtrim($key, " \\"));
                                                        $key = strtoupper(rtrim($key, " \/"));
/*                                                        echo "<br/><b>$key</b><br/>";*/
echo "<div class='panel panel-bottom directory'><div class='panel-heading head-color'><i class='fa fa-folder icon-padR'></i><b>$key</b><i class='fa fa-chevron-circle-down dropdown-icon'></i>"
        . "</div><div class='dir-content'>";

                                                        $i = 1;
                                                        foreach ($folders as $f) {
                                                            $sharLink = "";
                                                            $deleteLink = "";
                                                            $path='';
                                                            $path=base_url()."clientDocuments/".$this->session->userdata('clientId')."/".$key."/".$f;
                                                            $shareLink = "<div class='panel-body'><div><div class='folder-data'><b>$i: </b>$f</div>";
                                                            $shareLink .= "<div class='folder-button'><a role='button' class='btn btn-primary share'";
                                                            $shareLink .= 'onclick="fetchExistingExpertList(\'' . $folderName . '\',\'' . $f . '\')"><i class="fa fa-share"></i></a>';
                                                            $download="<a role='button' class='btn btn-success download' href='".$path."' download><i class='fa fa-download'></i></a>";
                                                            $deleteLink = "<a role='button' class='btn btn-danger delete'";
                                                            $deleteLink .= 'onclick="deleteClientDocument(\'' . $folderName . '\',\'' . $f . '\')"><i class="fa fa-trash"></i></a><div style="clear:both"></div></div></div></br></div>';
                                                            echo  $shareLink ."&nbsp;".$download."&nbsp;". $deleteLink;
                                                            
                                                            $i++;
                                                        }
      echo "</div></div>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        </div>
                                       <!--  </div>
                                        </div> -->
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
                                                            <th>Body</th>
                                                            <th>Create Date</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                 <?php
                                                 if( count($dairy) ):
                                                    ?>
                                                    <?php $count = $this->uri->segment(3,0); ?>
                                                <?php
                                                  foreach($dairy as $dairys ): ?>
                                                    <tr class="success">
                                                        <td><?= ++$count?></td>
                                                        <td><?= $dairys->eDairyTitle ?></td>
                                                        <td><?= $dairys->eDairyBody ?></td>
                                                        <td><?= $dairys->createDate ?></td>
                                                        <td>
                                                            <a href="<?php echo "ClientDocument/editDairy/".$dairys->eDairyId; ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a>
                                                            <a href="<?php echo "ClientDocument/deleteDairy/".$dairys->eDairyId; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
            
            <!--  id of dairy poup-->


            <?php
         include('popUp/ClientDairy.php');
                  ?>

         <script>
             <script type="text/javascript">
                        $(document).ready(function () {
                            $("#eDairy").click(function () {
                                $("#eDairyModal").modal('show');
                            });
                        });

                        $(document).ready(function () {
                            $("#eDairyView").click(function () {
                                $("#eDairyModalView").modal('show');
                            });
                        });
         </script>
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
        <footer id="footer" class="fullWidthSection greyColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <ul class="list-inline social-buttons">
                            <li>Follow Us On:</li>
                            <li><a href="https://www.facebook.com/visheshagya/">
                            <i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/Visheshagya_IN">
                            <i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://in.linkedin.com/in/visheshagya-india-a35780117"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                    </div>
                    <div class="col-md-6 col-sm-6 textright">
                        Visheshagya.in  |  <a href="">Terms of Use</a> | <a href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
        <?php include('popUp/NoAppointmentRecord_view.php'); ?>
        <?php include('popUp/ShareClientFileDetails_view.php'); ?>
        <?php include('popUp/UploadFileClient_view.php'); ?>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/simplebar.js"></script>

        <script>
                                                    function shareClientDocument(path, fileName)
                                                    {
                                                        $.ajax({
                                                            url:<?php echo "'" . base_url() . 'Ajaxcalls/shareClientDocument' . "'"; ?>,
                                                            type: 'POST',
                                                            data: {'expertId': '1', 'fileName': fileName, 'path': path},
                                                            success: function (shareStatus) {
                                                                window.location.reload(true);
                                                            }
                                                        });
                                                    }
                                                    function deleteClientDocument(path, fileName)
                                                    {
                                                        if (confirm("Are you sure to delete this file") == true)
                                                        {
                                                            $.ajax({
                                                                url:<?php echo "'" . base_url() . 'Ajaxcalls/deleteClientDocument' . "'"; ?>,
                                                                type: 'POST',
                                                                data: {'expertId': '1', 'fileName': fileName, 'path': path},
                                                                success: function (shareStatus) {
                                                                    window.location.reload(true);
                                                                }
                                                            });
                                                        }
                                                    }

                                                    function fetchExistingExpertList(path, fileName)
                                                    {
                                                        $.ajax(
                                                                {
                                                                    url: <?php echo "'" . base_url() . 'Ajaxcalls/fetchExistingExpertList' . "'"; ?>,
                                                                    type: 'POST',
                                                                    data: {'clientId': <?php echo $this->session->userdata('clientId'); ?>, 'fileName': fileName, 'path': path},
                                                                    success: function (expertcount)
                                                                    {
                                                                        if (expertcount != -1)
                                                                        {
                                                                            var expertList = JSON.parse(expertcount);
                                                                            var checkboxes = '';
                                                                            $("#fileName").val(fileName);
                                                                            $.each(expertList, function (i, item)
                                                                            {
                                                                                checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" name="expertId[]" value=' + expertList[i].expertId + ' style="display: block;">' + expertList[i].expertName + '</label></div>';
                                                                            });
                                                                            document.getElementById('expertName').innerHTML = checkboxes;
                                                                            $("#path").val(path);
                                                                            $("#SharedClientFileDetails").modal('show');
                                                                        } else
                                                                        {
                                                                            $("#noAppointmentRecord").modal('show');
                                                                        }
                                                                    }
                                                                });
                                                    }
                                                    function showCreateFolder()
                                                    {
                                                        $("#createFolderForm").toggle(500);
                                                    }
                                                    $('#cancel-folder').on('click',()=>{
                                                        $("#createFolderForm").toggle(500);
                                                    })
                                                    function showUploadFom()
                                                    {
                                                        $("#UploadFileClient").modal('show');
                                                    }

                $(".directory").click(function() {
                    console.log('hello');
                    // event.stopPropagation();
                    $(this).children('.dir-content').slideToggle(300);
                });
                $('.panel-wrapper').simplebar();
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
        <script src=<?php echo base_url() . "assets/js/script.js"; ?>></script>
    </body>
</html>

<?php include('popUp/clientChangePassword_view.php'); ?>