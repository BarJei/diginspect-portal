<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>FDA - Regional Field Office</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'admin/lib.php';?>
	<link href="<?php echo base_url().'assets/design.css'?>" rel="stylesheet">
	<script src="<?php echo base_url().'assets/js/bootstrap3.min.js'?>"></script>
	<!--[if !IE]><!-->
	<style>
	body{
		overflow:auto;
		position:relative;
	}
	td{
	padding-left:10px;
	}
	
	.menu_icon
	{
	width:200px;	
	}
	.col-sm-6 col-md-4
	{padding-right:10px;}
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px;
			overflow:auto;
			}
			
		.menu_icon
	{
	width:100px;	
	}
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
		
		.menu_icon
	{
	width:100px;	
	}
	}
	
	</style>
	<!--<![endif]-->
</head>

<body>

	    <nav class="navbar navbar-custom navbar-fixed-top" style="height:80px;background:black;color:black;" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll" style="margin-top:-1.5%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
					<img src="<?php echo base_url().'assets/img/icons/digiicon.png'?>" class="img-circle icon">
                   DigInspect
                </a>
				
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="margin-top:1.25%; background:white;">
					<ul class="nav navbar-nav" >
					<!--li class="active"><a href="#intro">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#service">Service</a></li-->
					<li class="divider"></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <?php echo $username;?> <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><?php echo anchor("Maine/logout","LOGOUT"); ?></li>
						<li><?php //echo anchor("diginspect/edit_admin_profile/". $username,"Edit Profile"); ?></li>
					  </ul>
					</li>
					</ul>
				</div>
			</div>	
        </div>
        <!-- /.container -->
		</nav>
	<div id="page-wrap" style="margin-top:8%;">

	<section id="portfolio" style="margin-top:-10%;">
	     
	<div style="margin-top:2%; position:relative;">
	<div class="container jumbotron" style="background:#27ae60">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				  <img src="<?php echo base_url().'assets/img/viewinspections.png';?>" class="img-circle menu_icon">
				  <div class="caption" style="text-align:center">
					<h3></h3>
					<p>View inspection details of diff. establishments</p>
					<p><?php echo anchor("Maine/get_collected_data","Inspections Details",array("class"=>"btn btn-primary btn-lg"));?>
				  </div>
				</div>
		  </div>
		  <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				  <img src="<?php echo base_url().'assets/img/newaccount.png';?>" class="img-circle menu_icon">
				  <div class="caption" style="text-align:center">
					<h3></h3>
					<p>Create accounts for newly hired inspectors<br></p>
					<p><?php echo anchor("Maine/adduser","Add New Inspector",array("class"=>"btn btn-primary btn-lg"));?>
				  </div>
				</div>
		  </div>
		   <div class="col-sm-6 col-md-4">
				<div class="thumbnail" >
				  <img src="<?php echo base_url().'assets/img/reports.png';?>" alt="..." class="img-circle menu_icon">
				  <div class="caption" style="text-align:center">
					<h3></h3>
					<p>Summary reports regarding inspections.</p>
					<p><?php echo anchor("Maine/view_reports","REPORTS",array("class"=>"btn btn-primary btn-lg"));?>
				  </div>
				</div>
		  </div>
		   <div class="col-sm-6 col-md-4">
		   	<center>
			    <div class="thumbnail">
			      <img src="<?php echo base_url().'assets/img/icons/digiicon.png'?>" class="img-circle" style="width:50%;">
				      <div class="caption">
				          	<?php //echo anchor("mobile.diginspect.tk/dl/Diginspect.apk","DOWNLOAD APK FILE",array("class"=>"btn btn-warning"));?>
							<a href='<?php echo base_url().'m/app/DigInspect.apk'?>' class='btn btn-warning'>Download APK File</a>
					  </div>
				</div>
			</center>
		</div>
		</div>
	</div>
	</div>
	</section>
	
	</div>
	
</body>

</html>