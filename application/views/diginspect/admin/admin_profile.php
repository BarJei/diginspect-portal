<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Administrator - Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'lib.php';?>
	<style>
		body{
			font-size: 20px;
			overflow:hidden;
		}
		td{
			padding-left:10px;
		}
	</style>
 </head>

	<body>

	    <nav class="navbar navbar-custom navbar-fixed-top" style="height:80px;background:black;color:black;" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll" style="margin-top:-1.75%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
					<img src="<?php echo base_url().'assets/img/icons/digiicon.png'?>" class="img-circle icon">
                   DigInspect
                </a>
				
				 <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="margin-top:1.25%; background:white;">
					<ul class="nav navbar-nav" >
					<!--li class="active"><a href="#intro">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#service">Service</a></li-->
					<li class="divider"></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username');?> <b class="caret"></b></a>
					  <ul class="dropdown-menu">
						<li><?php echo anchor("Maine/logout","Log Out"); ?></li>
					  </ul>
					</li>
					</ul>
				</div>
            <!-- /.navbar-collapse-->
            </div>
        </div>
        <!-- /.container -->
	<div style="height:100px;margin-top:1%; text-align:center; background-color:#000;color:#fff; border-top:1px solid #eee;">
		<h1 style="float:left; margin-top:2%; margin-left:3%;"><?php echo anchor("Maine/home","Menu");?> | Administrator - Edit Profile</h1>
	</div>	
    </nav>
	<div id="page-wrap" style="position:relative;margin-left:40%;margin-top:15%;width:300%;">
	<?php echo form_open("Maine/save_changes");?>
	<table>
	  <?php
			
			foreach($userlist as $key=>$value)
			{
			echo "<tr>";
			echo "<td>";
			echo form_label("ID","txtID");
			echo "</td>";
			echo "<td>";
			echo form_input(array("id"=>"txtID","name"=>"txtID","value"=>$value->id,"class"=>"form-control"),set_value("txtID"));
			echo "</td>";
			echo "<td>";
			echo form_error("txtID","<div>","</div>");
			echo "</td></tr>";
			
			echo "<tr>";
			echo "<td>";
			echo form_label("Name","txtName");
			echo "</td>";
			echo "<td>";
			echo form_input(array("id"=>"txtName","name"=>"txtName","value"=>$value->adminName,"class"=>"form-control"),set_value("txtName"));
			echo "</td>";
			echo "<td>";
			echo form_error("txtName","<div>","</div>");
			echo "</td></tr>";
			
				
			echo "<tr>";
			echo "<td>";
			echo form_label("Username","txtUsername");
			echo "</td>";
			echo "<td>";
			echo form_input(array("id"=>"txtUsername","name"=>"txtUsername","value"=>$value->username,"class"=>"form-control"),set_value("txtUsername"));
			echo "</td>";
			echo "<td>";
			echo form_error("txtUsername","<div>","</div>");
			echo "</td></tr>";
			
			echo "<tr>";
			echo "<td>";
			echo form_label("Password","txtPassword");
			echo "</td>";
			echo "<td>";
			echo form_password(array("id"=>"txtPassword","name"=>"txtPassword","value"=>$value->pass,"class"=>"form-control"),set_value("txtPassword"));
			echo "</td>";
			echo "<td>";
			echo form_error("txtPassword","<div>","</div>");
			echo "</td>";
			echo "</tr>";
			}
		?>
	</table>
	<br>
	<?php echo form_submit("btnSaveChanges","Save Changes");?><br>
	<?php echo form_close(); ?>
	</div>
</body>

</html>