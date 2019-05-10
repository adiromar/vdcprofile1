<?php 
$user_id=$this->session->userdata('user_id');
$user_type=$this->session->userdata('user_type');
$username=$this->session->userdata('user_name');
// echo $username;

if($user_id != true ){
	$this->session->set_flashdata('session_ended', '<b>Please Login to continue. </b>');
	redirect('pages/home');
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_front/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets_front/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_front/css/index.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_front/css/list.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets_front/css/forms.css">

</head>
<body>
<div class="container-fluid header-back">
	<div class="row">
		<div class="col-lg-2 col-md-2">
			<div class="logo-back">
				<img class="logo" src="<?= base_url(); ?>assets_front/image/logo.png">
			</div>
		</div>
		<div class="col-lg-6 col-md-10">
			<div>
				<ul class="nav justify-content-center">
					<li class="nav-item top-li">
						<a  class="nav-link header-link" href="<?= base_url(); ?>">Home</a>
					</li>
					<li class="nav-item top-li">
						<a  class="nav-link header-link" href="<?= base_url(); ?>pages/form_lists">Forms</a>
					</li>
					<li class="nav-item top-li">
						<a  class="nav-link header-link" href="<?= base_url(); ?>pages/view_records">View Records</a>
					</li>
					<li class="nav-item top-li">
						<a  class="nav-link header-link" href="<?= base_url(); ?>pages/view_charts">View Charts</a>
					</li>
					<li class="nav-item top-li">
						<a class="nav-link header-link" href="">Contact</a>
					</li>
				</ul>
			</div>
		</div>
<?php
if ($user_id == false){
?>
		<div class="col-lg-4 col-md-6">
			<form method="post" action="<?= base_url(); ?>user/index">
				<div class="row login">
					<div class="col-lg-4 col-md-4">
						<div >
							<input type="text" name="username" placeholder="Username" required="true">
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div>
							<input type="password" name="password" placeholder="PASSWORD" required="">
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div>
							<input type="submit" name="login" value=" LOGIN ">
						</div>
					</div>
				</div>
			</form>
		</div>
<?php }else{ ?>

		<div class="col-lg-4 col-md-6 welcome-div">
			<ul class="nav justify-content-center">
				<!-- <li class="nav-item top-li">
					<a href="<?php echo base_url('user/logout');?>" class="nav-link header-link"><i class="fas fa-sign-out-alt"></i> Log Out</a>
				</li> -->
				<li class="nav-item top-li">
					<div class="dropdown">
					<a href="" class="nav-link header-link dropbtn"><i class="fas fa-user-alt"></i> <?= $username?></a>
					<div class="drop-content">
						<?php if ($user_type =='Admin' ||$user_type == 'SuperAdmin' ){ ?>
						<a href="<?= base_url()?>admins/view_data"><i class="fas fa-wrench"></i> Admin Section</a>
					<?php } ?>
						<a href="<?php echo base_url('user/change_password');?>" class=""><i class="fas fa-info"></i> Change Password</a>
						<a href="<?php echo base_url('user/logout');?>" class=""><i class="fas fa-sign-out-alt"></i> Log Out</a>
					</div>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>
	</div>
</div>