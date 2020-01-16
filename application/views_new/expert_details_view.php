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
        <meta name="author" content="">

        <title>Expert Details: Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <base href="/"/>
        <link href=<?php echo base_url() . "css/bootstrap.min.css"; ?> rel="stylesheet" type="text/css">
        <!-- Custom CSS -->
        <link href=<?php echo base_url() . "css/effect.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/style.css"; ?> rel="stylesheet" type="text/css">
        <link href=<?php echo base_url() . "css/two-column.css"; ?> rel="stylesheet" type="text/css">
        <!-- jQuery -->
        <script src=<?php echo base_url() . "js/jquery.min.js"; ?>></script>
        <!-- Bootstrap Core JavaScript -->
        <script src=<?php echo base_url() . "js/bootstrap.min.js"; ?>></script>
        <!-- Custom CSS -->
        <link href="css/two-column.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
<!--        <script src="js/bootstrap-datetimepicker.js"></script>-->

        <script type="text/javascript">
            $(document).ready(function () {
                $("#ChangePassword").click(function () {
                    $("#myModalChangePassword").modal('show');
                });
              
            });
        </script>
    </head>
    <body>
        <?php
        if (null == $this->session->userdata('clientId')) {
            include('ClientLoginPopUp_view.php');
            ?>
            <script>
                $("#myModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            </script>
            <?php
        }
        ?>
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
                        <a class="navbar-brand" id="logo" href="<?php echo base_url() . 'ClientProfile'; ?>"></a> 
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <div class="top-nav-tab downarrow">
                                <ul class="nav nav-tabs">
                                	<li > <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails'; ?>">Home</a> </li>
                                    <li class="active"> <a style="cursor: pointer" href="<?php echo base_url() . 'Expertdetails/search/1'; ?>">Expert Search</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientAppointments'; ?>">My Appointment</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientDocument'; ?>">E-Lockers</a> </li>
                                    <li> <a style="cursor: pointer" href="<?php echo base_url() . 'ClientProfile'; ?>">My Profile</a> </li>
                            		<?php include('clientProfileIconMenu.php'); ?>                                    
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- body content -->
            <div class="two-column-con">
                <?php
                if (NULL !== $this->session->flashdata('expertChangePasswordError')) {
                    include('popUp/ChangePasswordError_view.php');
                    ?>
                    <script>
                        $("#changePasswordError").modal('show');
                    </script>
                <?php }
                ?>
                <div class="container">
                    <div id="exTab2">	
                        <ul class="nav nav-tabs">                        
                            <li <?php if ($categoryId == 1) { ?>class="active"<?php } ?>>                            
                                <a  href=<?php echo base_url() . "Expertdetails/search/1"; ?> >Chartered Accountant</a>
                            </li>
                            <li  <?php if ($categoryId == 2) { ?>class="active"<?php } ?>>
                                <a href=<?php echo base_url() . "Expertdetails/search/2"; ?>  >Company Secretary</a>
                            </li>
                            <li  <?php if ($categoryId == 4) { ?>class="active"<?php } ?>>
                                <a href=<?php echo base_url() . "Expertdetails/search/4"; ?> >CMA</a>
                            </li>

                            <li  <?php if ($categoryId == 3) { ?>class="active"<?php } ?>>
                                <a href=<?php echo base_url() . "Expertdetails/search/3"; ?> >Lawyer</a>
                            </li>
                            
                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <div class="sidebar">
                                    <!-- left form -->
                                    <div class="col-xs-12">
                                        <form class="form-horizontal" action="<?php echo base_url() . 'Searchexpertdetails/index/'.$this->session->userdata('selectedCategoryId'); ?>" id= "Searchexpertdetails" name="Searchexpertdetails" method="POST" onsubmit="return checkChecked('Searchexpertdetails');">
                                            <fieldset>
                                                <input type="hidden" name="selectedCategoryId" value="<?php echo $this->session->userdata('selectedCategoryId'); ?>">
                                                <legend>Search Criteria</legend>
                                                <div class="form-group" style="max-height: 200px;overflow-y: auto">
                                                    <label class="col-md-12 control-label" for="checkboxes">Service Type</label>
                                                    <div class="col-md-12">
                                                        <?php
                                                        foreach ($subCategoryDetails as $subCategory) {
                                                            ?>
                                                            <div class="checkbox">
                                                                <label for="checkboxes-0">
                                                                    <input type="checkbox" name="subCategoryIds[]" class="subCategory" id="checkboxes-0" value="<?php echo $subCategory->subCategoryId; ?>">
                                                                    <?php echo $subCategory->subCategoryName; ?>
                                                                </label>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>                                                    
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <hr>
                                            <fieldset>
                                                <!-- Multiple Checkboxes -->
                                                <div class="form-group">
                                                    <label class="col-md-12 control-label" for="checkboxes">Experience in Years</label>
                                                    <div class="col-md-12">
                                                        <!--<input type="hidden" name="categoryId" value="<?php // echo $this->session->userdata('categoryId');       ?>">-->
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
                                                                       value="1">0 - 5 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
                                                                       value="2">5 - 10
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
                                                                       value="3">10 - 15 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
                                                                       value="4">15 - 20
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="checkboxes-0">
                                                                <input type="checkbox" name="experinceInYear[]" id="checkboxes-0"  
                                                                       value="5">More than 20
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Button -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-block btn-primary" value="Search Expert"  >
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end left form -->
                                </div>

                                <div class="main-content baner-grids">
                                    <?php
                                    if (null != $this->session->flashdata('searchExpertError')) {
                                        ?>
                                        <div class="alert alert-info">
                                            <strong>Sorry!</strong><?php echo $this->session->flashdata('searchExpertError'); ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-6 baner-top">
                                        <figure class="effect-bubba">
                                            <img src=<?php echo base_url() . "img/img1.jpg"; ?> alt=""/>
                                            <figcaption>
                                                <h4>SEARCH  AN EXPERT</h4> <p>from our panel by Service Type</p>
                                            </figcaption>			
                                        </figure>	
                                    </div>
                                    <div class="col-md-6 baner-top">
                                        <figure class="effect-bubba">
                                            <img src=<?php echo base_url() . "img/img2.jpg"; ?> alt=""/>
                                            <figcaption>
                                                <h4>SELECT AN EXPERT </h4><p>to Consult and Book An Appoinment</p>
                                            </figcaption>			
                                        </figure>	
                                    </div>
                                    <div class="col-md-6 baner-top">
                                        <figure class="effect-bubba">
                                            <img src=<?php echo base_url() . "img/img3.jpg"; ?> alt=""/>
                                            <figcaption>
                                                <h4>CHANNEL (VIDEO,AUDIO, IN PERSON) </h4><p>and Pay Consultation Fees</p>	
                                            </figcaption>			
                                        </figure>	
                                    </div>
                                    <div class="col-md-6 baner-top">
                                        <figure class="effect-bubba">
                                            <img src=<?php echo base_url() . "img/img4.jpg"; ?> alt=""/>
                                            <figcaption>
                                                <h4>READY TO CONSULT</h4><p>with your selected Expert at scheduled time.</p>
                                            </figcaption>			
                                        </figure>	
                                    </div>
                                </div>		
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end body content -->
            <!-- Footer -->
        </div>
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2016</p>
            </div>
        </footer> 
        <?php 
        include('popUp/clientChangePassword_view.php'); 
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
            ?>
            <script>
                $("#clientChangePasswordError").modal('show');
            </script>
            <?php
        }
        ?>
        <script>
            function checkChecked(formname) {
                var anyBoxesChecked = false;
                $('#' + formname + ' input[type="checkbox"]').each(function () {
                    if ($(this).is(":checked")) {
                        anyBoxesChecked = true;
                    }
                });

                if (anyBoxesChecked == false) {
                    alert('Please select at least one checkbox');
                    return false;
                }
            }
        </script>
        <?php include('analytics/googleAnalytics.php'); ?>
    </body>
</html>