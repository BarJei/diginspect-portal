<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

<nav class="navbar navbar-custom navbar-fixed-top" style="height:80px;background:black;color:black;" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll" style="margin-top:-1.75%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand">
					<img src="<?php echo base_url().'assets/img/icons/digiicon.png'?>" class="img-circle icon">
                   DigInspect
                </span>
				
				 <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse" style="margin-top:-2%; background:white;">
					<ul class="nav navbar-nav" >
					<li><?php echo anchor("Maine/get_collected_data","Inspection Details"); ?></a></li>
					<li><?php echo anchor("Maine/adduser","Add User"); ?></a></li>
					<li><?php echo anchor("Maine/view_reports","Reports"); ?></a></li>
					<li><a href='<?php echo base_url().'m/app/DigInspect.apk'?>'>Download APK File</a></li>
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