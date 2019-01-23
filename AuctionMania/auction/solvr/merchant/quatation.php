<?php
include('dbconnect.php');
session_start();
error_reporting(0);
$march_is=$_SESSION['mid'];
$march_name=$_SESSION['email'];
date_default_timezone_set('Asia/Kolkata'); 

$date_time = date("d-m-Y");
if(isset($_POST['add'])) 
{
	
	  $qty=$_POST['f1'];
	  $unit=$_POST['f2'];
	   $desc=$_POST['f3'];
	   
	   $cvid=$_GET['id11'];
	   

	   
  	  $sql1="INSERT INTO march_assign VALUES ('NULL','$march_is','$march_name','$cvid','$date_time','$qty','$unit','$desc','1')";
	$res1= mysqli_query($conn,$sql1);
	
	$sql2="INSERT INTO march_assign_view VALUES ('NULL','$march_is','$march_name','$cvid','$date_time','$qty','$unit','$desc')";
	$resss= mysqli_query($conn,$sql2);

}
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>init </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>

<body class="sidebar-mini skin-blue wysihtml5-supported">
<div class="wrapper">

  <?php include('header.php');  ?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assign
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sub-Catagory</a></li>
        <li class="active">Add Sub-Catagory</li>
      </ol>
    </section>

    <!-- Main content -->
   
    <section class="content">
    <div class="row">
    <div class="col-xs-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fill here</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <!--  <form role="form" method="POST" >-->
		  <form action="" method="POST" enctype="multipart/form-data">
              <div class="box-body">
               <!--- <div class="form-group">
                  <label for="cat_title">Catagory Name :</label>
                  <input type="text" class="form-control" name="cat_name"  id="catagory_title" placeholder="Catagory Name">
                </div>-->
				
				
                  <table>
                    <tr>
                      <td style=" padding: 5px;"">
                        <div class="form-group">
                  <select name="f1" class="form-control" id="match" style="width: 180px; font-size: 15px; border-width: 2px;">
	  <option selected hidden>Select Quantity</option>
	 
	 <?php 
	  $sql2="SELECT * FROM quantity";
	  $res2=mysqli_query($conn,$sql2);
	  while($row2=mysqli_fetch_assoc($res2))
	  {
	  ?>
	  <option style="color: blue; font-size: 20px" value="<?php echo $row2['qty_id'];?>"><?php echo $row2['qty_no'];?></option>
	  <?php
	  }
	  ?>
      </select>
    </div>
    </td>
    <td style="padding: 5px;">
                
                  <div class="form-group">
                  <select name="f2" class="form-control" id="mathc1" style="width: 180px; font-size: 15px;   border-width: 2px;">
	  <option selected hidden>Select Unit</option>

	 
	 <?php 
	  $sql2="SELECT * FROM units";
	  $res2=mysqli_query($conn,$sql2);
	  while($row2=mysqli_fetch_assoc($res2))
	  {
	  ?>
	  <option style="color: blue; font-size: 20px;" value="<?php echo $row2['uiid'];?>"><?php echo $row2['ui_no'];?></option>
	  <?php
	  }
	  ?>
      </select></div>
    </td>
  </tr>
</table>
               
				
				
				
				
				
			
				<div class="form-group">
                  <label for="cat_img">Description</label>
                  <input type="textarea" class="form-control" name="f3" id="" placeholder="Enter here">
                </div>
				
    	<div class="pull-left">
		
    	<button type="submit"  name="add" class="btn btn-block btn-primary" >Assign</button>
<!--	<a>	<button type="submit" href="addcatagories.php" name="add" class="btn btn-block btn-success"></ADD></a>-->
        </div>
      </div>
    </form>
    </div>
      </div>
</div></div></section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');   ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>