<!DOCTYPE html>	
<html lang="en">

<?php $this->load->view('manage/head.php'); ?>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Expert', 'Number of Expert'],
          ['CA',     <?php echo $total_ca;?>],
          ['CS',      <?php echo $total_cs;?>],
          ['CMA',  <?php echo $total_cma;?>],
          ['Lawyer', <?php echo $total_lawyer;?>]
          ]);

        var options = {
          title: 'Expert Database'
        };

        var chart = new google.visualization.PieChart(document.getElementById('expertchart'));

        chart.draw(data, options);
      }
    </script>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('manage/admin');?>"><img src="<?php echo ASSETS;?>images/logo.png" class="logo" /></a>
            </div>
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

<div class="row">
                <div class="col-md-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <div class="row">
                                <div class="col-xs-3">
                                    <a href="<?php echo base_url("manage/admin/ca_list");?>"><img src="<?php echo ASSETS;?>images/logo_ca.png" width="100"/>   </a>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_ca;?></div>
                                </div>
                            </div>

</div>
                            </div>
</div>

 <div class="col-md-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <div class="row">
                                <div class="col-xs-3">
                                    <a href="<?php echo base_url("manage/admin/cs_list");?>"><img src="<?php echo ASSETS;?>images/logo_cs.png" width="100"/></a>   
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_cs;?></div>
                                </div>
                            </div>

</div>
                            </div>
</div>

 <div class="col-md-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <div class="row">
                                <div class="col-xs-3">
                                   <a href="<?php echo base_url("manage/admin/cma_list");?>"> <img src="<?php echo ASSETS;?>images/logo_cma.png" width="100"/>   </a>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_cma;?></div>
                                </div>
                            </div>

</div>
                            </div>
</div>


<div class="col-md-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        <div class="row">
                                <div class="col-xs-3">
                                  <a href="<?php echo base_url("manage/admin/lawyer_list");?>">  <img src="<?php echo ASSETS;?>images/logo_law.png" width="100"/></a>
                                </div>
                                <div class="col-xs-9 text-right">	
                                    <div class="huge"><?php echo $total_lawyer;?></div>
                                </div>
                            </div>

</div>
                            </div>
</div>
                            </div>


<div class="row">
<div class="col-md-12">
   <div id="expertchart" style="width: 900px; height: 500px;"></div>


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


</body>

</html>
