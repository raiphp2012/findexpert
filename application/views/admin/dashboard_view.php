<?php include('AdminHeader_view.php'); ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Search Client</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
      </ul>
      <?= form_open('Admin/search',['class'=>'navbar-form navbar-left','role'=>'search']) ?>
      <!-- <form class="navbar-form navbar-left" role="search"> -->
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text" name="query">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      <?= form_close(); ?>
      <?= form_error('query',"<p class='navbar-text text-danger'>",'</p>') ?>
      
    </div>
  </div>
</nav>

<div class="container">
	<table class="table">
		<thead>
			<th>Sr.</th>
			<th>Client Name</th>
			
			<th>Call</th>
			<th>Email</th>
			<th>Remarks</th>

		</thead>
		<tbody>
		<?php
		if( count($clients) ):
		$count = $this->uri->segment(3,0); 

		 foreach( $clients as $client ):
		?>


		<tr>
			<td><?=++$count; ?></td>
			<td><?= $client->clientName ?></td>
			
			<td>
				<button class="btn btn-success"  onclick="startAudioCall('<?php echo date('Y-m-d');?>','<?php echo  $this->session->userdata('mobileNumber'); ?>', '<?php echo $client->clientMobileNumber; ?>', '18:05', '19:50')" >
					Call
				</button>
				</td>
				<td>
				<button class="btn btn-primary">
					Email
				</button>
			</td>
			<td><textarea></textarea>
			</td>
		</tr>
		
		<?php endforeach;  ?>
		<?php
		else:
		?>
	<tr>
		<td colspan="3">No Records</td>
	</tr>
		<?php
		endif;
		?>
		</tbody>
	</table>
	<?= $this->pagination->create_links(); ?>
	
</div>

<?php include('AdminFooter_view.php'); ?>
<script>
function startAudioCall(currentDate,expertMobileNumber, clientMobileNumber, appointmentStartTime,appointmentEndTime)
                                                                            {


					var callUrl = "http://etsdom.kapps.in/webapi/saicart/api/saicart_c2c.py?auth_key=bb23a8a029-8bd4-4e44-97ccaa";
					callUrl +="&agent_number=+91"+expertMobileNumber+"&customer_number=+91"+clientMobileNumber+"&call_start_time="+currentDate;
					callUrl +=" "+appointmentStartTime+"&call_stop_time="+currentDate+" "+appointmentEndTime;
					//alert(callUrl);
						console.log(callUrl);
                                                                                $.ajax({
                                                                                    url: callUrl,
                                                                                    type: 'GET',
                                                                                    crossdomain: true,
                                                                                   dataType: "xml",
                                                                                    success: function (audioCallStatus) {
                                                                                       // alert(audioCallStatus);
                                                                                      //  audioCallStatus.header("Access-Control-Allow-Origin", "*");
   								
                                                                                    }
                                                                                });
                                                                            }

</script>