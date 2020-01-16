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

        <title>Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/two-column.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
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
                    <a class="navbar-brand" href="Expert"></a>
                </div>               
            </div>
        </nav>

        <!-- body content -->
        <div class="two-column-con">
            <div class="container">
                <?php echo $this->session->flashdata('expertSignUpSuccess'); ?>
                <div id="exTab2" class="frm-detail">
                    <div class="tab-content ">
                        <div class="tab-pane active">  
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Appointment Status</label>
                                    <div class="col-md-3">
                                        <select id="consultationStatusId" name="consultationStatusId" class="form-control" onchange="fetchSubCategoryDetails(this.value)">
                                            <option>--SELECT--</option>
                                            <?php foreach ($consultationStatus as $status) { ?>
                                                <option value=<?php echo $status->consultationStatusId; ?>><?php echo $status->consultationStatusName; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="selectbasic">Appointment Date</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="main-content detail-view">
                                <div class="detail-view-cont">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">Customer Name</div>
                                        <div class="col-xs-8 col-md-6">Appointment</div>
                                        <div class="col-xs-3 col-md-2">Type</div>
                                        <div class="col-xs-3 col-md-2">Action</div>
                                    </div>
                                    <?php
                                    if (is_array($appointmentData)) {
                                        foreach ($appointmentData as $appointment) {
                                            ?>
                                            <div class="row">
                                                <div class="col-xs-3 col-md-2"><?php echo $appointment->clientName ?></div>
                                                <div class="col-xs-8 col-md-6"><?php echo $appointment->appointmentDate . '(' . $appointment->appointmentStartTime . '-' . $appointment->appointmentEndTime . ')' ?></div>
                                                <div class="col-xs-3 col-md-2"><?php echo $appointment->consultationTypeName ?></div>
                                                <div class="col-xs-3 col-md-2"><?php echo"EDIT"; ?></div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo"No records found";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>		
                    </div>
                </div>
            </div>
        </div>
        <!-- end body content -->
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2015</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script>
                                            function submitForm()
                                            {
                                                $("#expertSignupForm").submit();
                                            }
//  To fetch the subcategory details based on the category id
                                            function fetchSubCategoryDetails(categoryId)
                                            {
                                                if (categoryId > 0)
                                                {
                                                    $.ajax({
                                                        url: "../Ajaxcalls/fetchSubCategoryDetails",
                                                        type: 'POST',
                                                        data: {'categoryId': categoryId},
                                                        success: function (subCategoryDetails) {
                                                            var subCatgoryData = JSON.parse(subCategoryDetails);
                                                            var checkboxes = '';
                                                            $.each(subCatgoryData, function (i, item) {
                                                                checkboxes += '<div class="checkbox"><label for="checkboxes-0"><input type="checkbox" required name="subCategoryId[]" value=' + subCatgoryData[i].subCategoryId + '>' + subCatgoryData[i].subCategoryName + '</label></div>';
                                                            });
                                                            document.getElementById('subCat').innerHTML = checkboxes;
                                                        }});
                                                }
                                            }

        </script> 
    </body>
</html>