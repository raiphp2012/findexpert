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
        <title>Expert Appointments: Visheshagya</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/two-column.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>js/moment.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/simplebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <script>
            $(function () {
                $('#expertDOB').datetimepicker({
                    viewMode: 'years',
                    format: 'YYYY-MM-DD'
                });
            });
        </script>
         <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
            });
             $(document).ready(function() {
            $('#example').DataTable();
            });
        </script>
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css"> 
        
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
                                     <li  class="active"><a href="<?php echo base_url(); ?>ExpertProfile/updateMyMember">
                                     My  Practice</a></li>
                                    
                                    <?php } ?>
                                    <li><a href = "<?php echo base_url().'MyOffice'; ?>">My Office</a></li>
                                    <li><a href ="<?php echo base_url().'ExpertAppointments'; ?>" >My Appointments</a></li>
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
                        <h1>Add Member</h1>
                    </div>
                </div>
            </div>

            <!-- body content -->
        <div class="content-full-height">
            <div class="two-column-con">
                <div class="container  appointment-status  slideUp">
                    <?php echo $this->session->flashdata('rescheduleSuccess'); ?>
 <?php
                        if (null != $this->session->flashdata('TeamMemberDetailsSuccess')) {
                            ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><?php echo $this->session->flashdata('TeamMemberDetailsSuccess'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    <div id="exTab2" class="frm-detail">
                        <div class="tab-content outer marT25">
                            <div class="tab-pane active" id="top1"> 
                            <div style="margin-bottom: 1%;">
                            <button data-toggle="modal" class="btn btn-primary add-member-btn" data-target="#registerTeamMember">Add Member </button>
                            </div>                            
                                <div class="table-cont">
                                
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                               <th>ExpertId</th> 
                                               <th>Expert Name</th>
                                                <th>Expert Email Id</th>
                                                <th>Expert Mobile No</th>
                                                <th>Status</th> 
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(empty($expertPersonalDetails))
                                         {
                                              ?>
                                              
                                               <tr>
                                                <td colspan="5">No found </td>
                                                                                          
                                                
                                            </tr>
                                              <?php

                                         } 
                                         else{  
                                        foreach( $expertPersonalDetails as $teamMemberDetails)
                                        {
                                        ?>
                                        <tr>
                                                <td><?php echo $teamMemberDetails->expertId;?></td>
                                               <td><?php echo $teamMemberDetails->expertName;?></td>
                                                <td><?php echo $teamMemberDetails->expertEmailId;?>
                                                    
                                                </td>
                                               <td><?php echo $teamMemberDetails->expertMobileNumber;?>
                                                    
                                                </td> 
                                                <td><?php echo $teamMemberDetails->status;?>
                                                    
                                                </td>                                            
                                                <td><a href="#" data-id="<?php echo $teamMemberDetails->expertId;?>" data-value="<?php echo $teamMemberDetails->expertName; ?>" onclick="openModal(this)"> View Details</a></td>
                                            </tr>
                                           <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            </div>
                    </div>  
                </div>       
            </div>
        </div> 
        <?php  include('popUp/registerTeamMember.php'); ?>
        <?php  include('popUp/UpdateTeamMember_view.php'); ?> 
       
        

                           
        <!-- end body content -->
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
              <script src="<?php echo base_url()?>assets/js/script.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
       
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
        <?php //include('popUp/ChangePassword_view.php'); 
        include('analytics/googleAnalytics.php');
        ?>
      <script >
          function checkTeamMemberEmail()
          {
            var emailId=$("#expertEmailId").val();
            $.ajax({
                  url: 'Ajaxcalls/checkMemberEmailId',
                  type: 'POST',
                data: {'emailId': emailId},
                async: false,
                success: function (response) {
                     var verifyResult = JSON.parse(response);
                         if (verifyResult.verificationResult !== 0)
                              {
                                  $('#expertEmailId').parent('div').addClass('has-error');
                                     $("#expertEmailId").focus();
                                     $("#emailError").modal('show');
                                     return false;
                                                                                
                                }
                                return true;
                                                                        
                            }
                                                                   
                 });
          }
          function openModal(elem){
        
        var $elem = $(elem);
            
        var tblId = '#UpdateTeamMember';
    
        var row = $elem.closest('tr');
         
        $('td:not(:last-child)', row).each(function(i,v){
            
            var value = $(v).text().trim();
           // $('input[type=text]:eq('+ i +')', tblId).val(value);
            if(v=="active" || v=="Inactive" )
            {
               alert(v); 
            }
            else{
                $('input[type=text]:eq('+ i +')', tblId).val(value);
            }
            
        });
        
        $(tblId).modal('show');
        
    };
// $("#submit").onclick({
//    resetValueAfterSubmit(); 
// });
    // function resetValueAfterSubmit()
    // {
    //         alert('resetValueAfterSubmit');
    //         $("#expertName").val('');
    //         $("#expertEmailId").val('');
    //         $("#expertMobileNumber").val('');
    // }

      </script>



    </body>
</html>