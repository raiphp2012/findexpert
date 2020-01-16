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

        <title>Expert Consultation Details : Visheshagya</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/two-column.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
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
                <div class="top-nav-tab downarrow">
                    <ul class="nav nav-tabs">
                        <li><a style="cursor: pointer"onclick="location.href = '../ExpertAppointments';" data-toggle="tab">My Appointments</a></li>
                        <li><a style="cursor: pointer"onclick="location.href = '../ExpertDocuments';" data-toggle="tab">My Documents</a></li>
                        <!--<li><a style="cursor: pointer"onclick="location.href = 'MyClients';" data-toggle="tab">My Clients</a></li>-->
                        <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">My Profile</a></li>
                    </ul>
                </div>                
            </div>
        </nav>

        <!-- body content -->        
        <div class="two-column-con">
            <div class="container">
                <div id="exTab2" class="frm-detail">          
                    <div class="tab-pane downarrow" id="top4">
                        <ul class="nav nav-tabs">
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile';" data-toggle="tab">Personal</a></li>
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/professional';" data-toggle="tab">Professional</a></li>
                            <li class="active"><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/consulting';" data-toggle="tab">Consulting</a></li>
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/calendar';" data-toggle="tab">Calendar</a></li>
                            <li><a style="cursor: pointer"onclick="location.href = '../ExpertProfile/accounts';" data-toggle="tab">Accounts</a></li>
                        </ul>
                    </div>
                    <div class="tab-content ">
                        <div class="tab-pane active">                            
                            <div class="main-content detail-view">
                                <div class="detail-view-cont">
                                    <!--<form class="form-horizontal" method="POST" action="ExpertSignup/addExpert" id="expertSignupForm"name="expertSignupForm">-->
                                    <!--<fieldset>-->
                                    <!--<div id="personalDataTab">-->
                                    <!--<div class="alert alert-info text-center">Consultation Information</div>-->
                                    <!--<div class="col-md-10 col-md-offset-1 frm-bdr">
                                    <?php
                                    if (is_array($consultationData)) {
                                        foreach ($consultationData as $data) {
                                            ?>
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label" for="textinput">Consultation Type</label>  
                                                                                            <div class="col-md-4">
                                                                                                <select class="form-control"name="consultationTypeId" id="consultationTypeId">
                                                                                                    <option value="0">--SELECT--</option>
                                            <?php
                                            foreach ($consultationTypes as $type) {
                                                if ($data->consultationTypeId == $type->consultationTypeId) {
                                                    ?>
                                                                                                                                                    <option value=<?php echo $type->consultationTypeId; ?> selected="selected"><?php echo $type->consultationTypeName; ?></option>
                                                    <?php
                                                } else {
                                                    ?>

                                                                                                                                                    <option value=<?php echo $type->consultationTypeId; ?>><?php echo $type->consultationTypeName; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                                                                                </select>                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label" for="textinput">Consultation Fees</label>  
                                                                                            <div class="col-md-4">
                                                                                                <input id="consultationFees" name="consultationFees" type="text" required class="form-control input-md" value=<?php echo $data->consultationFees; ?>>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-4 control-label" for="prependedtext">Active</label>
                                                                                            <div class="col-md-4">
                                                                                                <div class="input-group">
                                            <?php if ($data->isActive == 1) { ?>
                                                                                                                            <input id="consultationFees" name="consultationFees" type="checkbox" checked="true">
                                            <?php } else { ?>
                                                                                                                            <input id="consultationFees" name="consultationFees" type="checkbox">
                                            <?php } ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </div> -->
                                    <!--</div>-->
                                    <!--Form Submit button-->
                                    <!--                                            <div class="col-md-12 text-center form-group">								 
                                                                                    <button class="btn btn-sm btn-primary" onclick="submitForm()">Save</button>                                            
                                                                                </div>-->
                                    <!--</fieldset>-->
                                    <!--</form>-->
                                    <div>
                                        <div class="panel panel-default">
                                            <form class="form-horizontal" method="POST" action="../ExpertProfile/updateConsultationDetails" id="expertSignupForm"name="expertSignupForm">
                                                <table class="table"> 
                                                    <thead>
                                                        <tr>
                                                            <th>#</th> 
                                                            <th>Consultation Type</th> 
                                                            <th>Fees</th> 
                                                            <th>Status</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php {
                                                            $i = 1;
                                                            foreach ($consultationTypes as $type) {
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $i; ?></th>
                                                            <input type="hidden" name="consultationTypeId[]" value="<?php echo $type->consultationTypeId; ?>">
                                                            <td><?php echo $type->consultationTypeName; ?></td>
                                                            <?php
                                                            if (isset($type->consultationFees)) {
                                                                ?>
                                                                <td><input id="consultationFees" name="consultationFees[]" class="form-control" type="number" value="<?php echo $type->consultationFees ?>"></td>
                                                            <?php } else { ?>
                                                                <td><input id="consultationFees" name="consultationFees[]" class="form-control" type="number"></td>
                                                                <?php
                                                            }
                                                            if (isset($type->consultationActiveStatus)) {
                                                                if ($type->consultationActiveStatus == 1) {
                                                                    ?>
                                                                    <td><input name="isActive<?php echo $i - 1; ?>"type="checkbox" data-toggle="toggle" checked value="1"></td>
                                                                <?php } else { ?>
                                                                    <td><input name="isActive<?php echo $i - 1; ?>" type="checkbox" value="0"></td>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <td><input name="isActive<?php echo $i - 1; ?>" type="checkbox" value="0"></td>
                                                                <?php
                                                            }
                                                            ?>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                        }
                                                    }
                                                    ?>
                                                    </tbody> 
                                                </table>
                                            </form>
                                            <div class="col-md-12 text-center form-group">								 
                                                <button class="btn btn-sm btn-primary" onclick="submitForm()">Update Consultation Details</button>                                            
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
        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Visheshagya 2015</p>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script>
                                                    function submitForm()
                                                    {
                                                        $("#expertSignupForm").submit();
                                                    }
        </script> 
    </body>
</html>