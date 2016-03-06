<html>
<link href="../lib/new_style.css" rel="stylesheet"/>
		<link rel="stylesheet" href="../lib/bootstrap-3.3.2-dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../lib/bootstrap-3.3.2-dist/css/bootstrap.css"/>
		<script src="../lib/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
	<body>
	<div class="header">
			<!--img class="h_fdalogo" src="../lib/imgs/fda_cover.png"/ style="margin-left:50px; background-color:white;"-->
			<div style="margin-left:80px; padding-top:20px; float:left;">
				<span style="font-size:35px; margin-top:60px;"><?php echo $_SESSION['user']['adminName'];?></span>
				<a href="admin_menu_index.php"><img src="../lib/imgs/home.png" style="margin-left:20px; margin-top:-10px;height:60;width:60;"></a>
				<!--img src="../lib/imgs/search.png" style="margin-left:20px; margin-top:-10px;height:60;width:60;" id="showRight"-->
				
				<a href="admin_home.php"><img src="../lib/imgs/viewinspections.png" class="img-circle" style="margin-left:20px; margin-top:-10px;height:40;width:40;"></a>
				<a href="admin_reg_user.php"><img src="../lib/imgs/newaccount.png" class="img-circle" style="margin-left:20px; margin-top:-10px;height:40;width:40;"></a>
				<a href="../diginspect-mobile/uploads/"><img src="../lib/imgs/reports.png" class="img-circle" style="margin-left:20px; margin-top:-10px;height:40;width:40;"></a>
			</div>
			
			<div style="margin-right:80px; padding-top:20px; float:right;">
				<ul id="drop-nav">
				<li><img src="../lib/imgs/settings.png" style="margin-left:-20px; margin-top:-10px;height:80;width:80; border:0px;">
					<ul>
						<li><a href="admin_profile.php" target="blank">Edit Profile</a></li>
						<li class="divider"></li>
						<li><a id="btnLogout">Log Out</a></li>
					</ul>
				<li>
				</ul>
				<!--img src="../lib/imgs/refresh.png" style="margin-left:20px; margin-top:-10px;height:40;width:40;"-->
			</div>
		</div>
		<div class="panel panel-primary">
		  <div class="panel-heading" style="height:100px;">
			<h1>Edit Profile</h1>
			<a href="admin_home.php">Back to home</a>
		  </div>
		  <div class="panel-body" style="font-family:Myriad Pro;">
			
			<h3 align='center'>
				<img src="" style="height:150px; width:150px;"/><br><br>
				<input type="hidden" id="txtacctID" value="<?php echo  $_SESSION['user']['id'];?>">
				<input type="file" value="Choose file..." id="ChooseFile" name="ChooseFile"/><br><br>
				Account Name:<input type="text" id="txtacctName" placeholder="Account Name" style="margin-left:15px;" value="<?php echo $rows['adminName'];?>"/><br><br>
				User Name:<input type="text" id="txtuserName" placeholder="User Name"  style="margin-left:55px;" value="<?php echo  $rows['username'];?>"/><br><br>
				Password:<input type="password" id="txtPass" placeholder="Password"  style="margin-left:70px;" value="<?php echo  $rows['pass'];?>"/><br><br>
				
			</h3>
			
			<br>
			<div align="right">
			<input type="button" class="btn btn-primary btn-lg" id="btnSave" name="btnSave" value="Save changes"/>
			<input type="button" class="btn btn-warning btn-lg" id="btnCancel" name="btnCancel" value="Cancel"/>
			</div>
		  </div>
		</div>
		
		<?php include_once'../footer.php';?>
<script type="text/javascript">
    $(function(){
		
		$('#btnSave').click(function(){
			$.ajax({
                url:'admin_profile_save.php',
                type: 'POST',
                data:{
					_acctID:$('#txtacctID').val(),
					_acctName:$('#txtacctName').val(),
					_userName:$('#txtuserName').val(),
					_acctPass:$('#txtPass').val()
                },
                success: function(data){
					alert(data);
                },
                error: function(e){
                    // alert(e);
                }
            });
        });    

    });
</script>
	</body>
</html>