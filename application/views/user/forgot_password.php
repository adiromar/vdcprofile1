<style type="text/css">
	p {
		color: red;
	}
.change_pass{
	border: 1px solid lightgrey;
    padding: 8px;
    background: aliceblue;
}
</style>
<div class="container">
	<div class="form-row change_pass">
		<div class="col-md-12" style="height: 500px;">
			<h4 style="text-align: center;margin-top: 35px;">Forgot Password</h4>
			<?php 
if($this->session->flashdata('changed')): 
    echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('changed').'</p>'; 
  endif;
  if($this->session->flashdata('nt_changed')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('nt_changed').'</p>'; 
  endif;
  if($this->session->flashdata('email_sent')): 
    echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('email_sent').'</p>'; 
  endif;

			echo form_open('user/renue_password'); 
			echo validation_errors();

			 ?>
			<div class="mt-4">

				<label class="col-md-4">Your Email Address: </label>
				<input type="email" name="email" class="col-md-4" placeholder="Email" autocomplete="off">
			</div>
			<!-- <div >
				<label class="col-md-4">New Password: </label>
				<input type="text" name="new_pass" class="col-md-4" placeholder="Enter Your New Password">
			</div>
			<div>
				<label class="col-md-4">Confirm Password: </label>
				<input type="password" name="confirm" class="col-md-4" placeholder="Confirm New Password">
			</div> -->

			<div class="mt-4">
				<input type="submit" name="renue_pass" class="btn btn-info offset-5">
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>