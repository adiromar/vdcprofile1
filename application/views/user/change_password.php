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
			<h4 style="text-align: center;margin-top: 35px;">Change Password</h4>
			<?php 
if($this->session->flashdata('changed')): 
    echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('changed').'</p>'; 
  endif;
  if($this->session->flashdata('nt_changed')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('nt_changed').'</p>'; 
  endif;

			echo form_open('user/change_pass'); 
			echo validation_errors();

			foreach ($change as $ckey => $cvalue) {
			 	$name = $cvalue['user_name'];
			 } ?>
			<div>

				<label class="col-md-4">Username:* </label>
				<input type="text" name="username" value="<?= $name ?>" class="col-md-4">
			</div>
			<div >
				<label class="col-md-4">Old Password*: </label>
				<input type="text" name="old_pass" class="col-md-4" placeholder="Enter your Old Password">
			</div>
			<div >
				<label class="col-md-4">New Password*: </label>
				<input type="text" name="new_pass" class="col-md-4" placeholder="Enter Your New Password">
			</div>
			<div>
				<label class="col-md-4">Confirm Password*: </label>
				<input type="password" name="confirm" class="col-md-4" placeholder="Confirm New Password">
			</div>

			<div class="mt-4">
				<input type="submit" name="enter" class="btn btn-info offset-5">
			</div>
			<?php form_close(); ?>
		</div>
	</div>
</div>