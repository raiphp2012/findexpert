<!DOCTYPE html>

<html lang="en">
<?php $this->load->view('manage/head.php'); ?>
<script>
  
   $(function () {
                $("#consultationDateValue").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });

            });
</script>

<body>

<div id="wrapper">

  <!-- Navigation -->

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a class="navbar-brand" href="<?php echo base_url('manage/admin');?>"><img src="<?php echo ASSETS;?>images/logo.png" class="logo" /></a> </div>

    <!-- /.navbar-header -->

    <?php $this->load->view('manage/menu.php'); ?>

    <!-- /.navbar-top-links -->

    <?php $this->load->view('manage/leftnav.php'); ?>

    <!-- /.navbar-static-side -->

  </nav>

  <!-- Page Content -->

  <div id="page-wrapper">

    <div class="container-fluid">

	

      <div class="row">

        <div class="col-lg-12">

        <div class="panel panel-default">

        <div class="panel-heading"><?php echo $page_title;?></div>

        <div class="panel-body">



          <form role="form" name="frmAgent" id="frmAgent" method="post" action="<?php echo base_url('manage/admin/book_appointment');?>" enctype="multipart/form-data">

          <div class="form-group">

              <label>Consultation Type</label>

        <span class="error"><?php echo form_error('consultationTypeId'); ?></span>

              <select name="consultationTypeId" id="consultationTypeId" class="form-control">
              <option value="">Select Consultation Type</option>
              <option value="1">Video Consultation</option>
              <option value="2">Audio Consultation</option>
              </select>

            </div>

            <div class="form-group">

              <label>Select Profession</label>

			  <span class="error"><?php echo form_error('categoryId'); ?></span>

              <select name="categoryId" id="categoryId" class="form-control">
              <option value="">Select Profession</option>
              <?php foreach($profession_list as $profession){?>
                <option value="<?php echo $profession->categoryId;?>"><?php echo $profession->categoryName;?></option>
              <?php }?>
              </select>

            </div>
			
			 
<div class="form-group">

              <label>Select Professional</label>

        <span class="error"><?php echo form_error('expertId'); ?></span>

              <select name="expertId" id="expertId" class="form-control">
              <option value="">Select Professional</option>
             
              </select>

            </div>

            <div class="form-group">

              <label>Select Client</label>

        <span class="error"><?php echo form_error('clientId'); ?></span>

              <select name="clientId" id="clientId" class="form-control">
              <option value="">Select Client</option>
             <?php foreach($client_list as $client){?>
             <option value="<?php echo $client->clientId;?>"><?php echo $client->clientName;?></option>
             <?php } ?>
              </select>

            </div>


<div class="form-group">

              <label>Appointment Date</label>

        <span class="error"><?php echo form_error('appointmentDate'); ?></span>

               <input type='text' style="width: 100%;" name="appointmentDate" id="consultationDateValue" class="form-control" value="" onchange="fetchNewConsultationTimings()" />
             

            </div>


<div class="form-group">

              <label>Available Time Slot</label>

        <span class="error"><?php echo form_error('appointmentStartTime'); ?></span>

             <select class="form-control" name='appointmentStartTime' id="slots" >
    <option value="">Select Time</option>
    </select>

            </div>
			 

            <input class="btn btn-default btn-add" name="submit" type="submit" value="BookNow">




          </form>

          </div>

          </div>

        </div>

        <!-- /.col-lg-12 -->

      </div>

      <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

  </div>

  <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->

<script type="text/javascript">
  $(document).ready(function(){

    $('#categoryId').change(function(){

$.ajax({
      url: "<?php echo base_url('manage/admin/expert_list_by_profession');?>",
      type: 'post',
      dataType: 'json',
      data: {'categoryId': $(this).val()},
      crossDomain: true,
      success: function(response){
        $.each(response, function(i, item) {
$('#expertId').append($('<option>', {
    value: item.expertId,
    text: item.expertName
}));
        });
      }
       });


    });




  });

  function fetchNewConsultationTimings()
            {
                var ddlSlots = $("#slots");
                var expertId = $('#expertId').val();
                ddlSlots.find('option').remove();
                var param1 = new Date();
                var twoDigitMonth = ((param1.getMonth().toString().length) == 1) ? '0' + (param1.getMonth() + 1) : (param1.getMonth() + 1);
                var twoDigitDate = ((param1.getDate().toString().length) == 1) ? '0' + (param1.getDate()) : (param1.getDate());
                var Currentdate = param1.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;
                var selectedDate = $("#consultationDateValue").val();
                var twoDigitHours = ((param1.getHours().toString().length) == 1) ? '0' + (param1.getHours()) : (param1.getHours());
                var twoDigitMinutes = ((param1.getMinutes().toString().length) == 1) ? '0' + (param1.getMinutes()) : (param1.getMinutes());

                var ttime = twoDigitHours + ":" + twoDigitMinutes;

                $.ajax(
                        {
                            url: '<?php echo base_url() . "Ajaxcalls/fetchAvailableConsultationSlots"; ?>',
                            type: 'POST',
                            data: {'selectedDate': $("#consultationDateValue").val(), 'expertId': expertId},
                            success: function (newData)
                            {
                                ddlSlots.find('option').remove();
                                if (typeof newData.consultationSlots === 'string') {
                                    ddlSlots.append($('<option></option>', {
                                        text: newData.consultationSlots,
                                    }));
                                    if (newData.consultaionSlots == "" || !newData.consultationSlots)
                                    {
                                        document.getElementById("nextButton").style.display = 'none';
                                       /// alert("No appointment available for the selected day");
                                    } else
                                    {
                                        document.getElementById("nextButton").style.display = 'none';
                                        //alert(newData.consultationSlots);
                                    }
                                } else
                                {
                                    ddlSlots.append('<option value=null>Select Available time </option>');
                                    for (var i = 0; i < newData.consultationSlots.length; i++)
                                    {
                                    if(newData.consultationSlots[i].starts==undefined) continue;
                                        ddlSlots.append('<option value=' + newData.consultationSlots[i].starts + '>' + newData.consultationSlots[i].starts + '-' + newData.consultationSlots[i].ends + '</option>');
                                    }
                                    for (var i = 0; i < newData.consultationSlots.length; i++)
                                    {
                                        $.each(newData.previouslyBookedAppointments, function (index, value) {
                                            if (value == newData.consultationSlots[i].starts)
                                            {
                                                $('#slots option[value="' + newData.consultationSlots[i].starts + '"]').remove();
                                            }
                                        });
                                    }
                                    
                                }
                            }
                        });
            }

            

</script>

<?php $this->load->view('manage/footer.php'); ?>

</body>

</html>

