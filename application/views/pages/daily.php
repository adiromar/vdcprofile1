<?php

?>
<div class="container">
	<div class="row" style="min-height: 600px;">
		<div class="col-md-12">
			<h4 style="text-align: center;">Daily Records</h4>

<form class="form-control mt-4 pt-4 pb-4" id="search_daily" method="post">
	<div class="row mt-3">
			<div class="col-md-4">
				<!-- <label>Select User</label> -->
				<select class="form-control" name="user_name" id="user_name">
					<option value="">Select User</option>
				<?php
				foreach ($lists as $lkey => $lvalue) {
					echo '<option data-name='.$lvalue['user_name'].' value='.$lvalue['user_id'].'>'.$lvalue['firstname']. ' '.$lvalue['lastname'].'</option>';

				} ?>
			</select>
			</div>

			<div class="col-md-3">
				<!-- <label>Select Forms</label> -->
				<select class="form-control" name="form_name" id="form_name">
					<option value="">Select Form</option>
				<?php
				foreach ($forms as $fkey => $fvalue) {
					$slice = preg_replace('/\s+/', '_', $fvalue['display_name']);
					// $slice = str_replace(' ', '_', $fvalue['display_name']);
					echo '<option data-fname='.$slice.' value='.$fvalue['title'].'>'.$fvalue['display_name']. '</option>';

				} ?>
			</select>
			</div>

			<div class="col-md-3">
				<input type="date" name="date" id="date" class="form-control datepicker">
			</div>


			<div class="col-md-2"><input type="submit" name="go" value="Submit" class="btn btn-info"></div>
			</div>
				
			<div class="mt-4" id="show_here"></div>
		</div>
		
	</div>
</div>

<style type="text/css">
	body{
		background-color: #b5d3a1;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );

$("#search_daily").submit(function(e) {
  e.preventDefault();
  var form_name = $("#form_name").val(); 
  var user_name = $("#user_name").val();
  var date = $("#date").val();
  // var date = $('#datepicker option:selected').data("date");
  var a = $('#form_name option:selected').data("fname");
  // alert(a);
  var dataString = 'form_name='+form_name+'&user_name='+user_name+'&date='+date+'&display_name='+a;

  $.ajax({
    type:'POST',
    data:dataString,
    url:'<?= base_url(); ?>pages/filter_records_by_user_daily',
    success:function(data) {
      // alert(data);
      $("#show_here").fadeOut('slow');
      $("#show_here").html(data);
      $("#show_here").fadeIn('fast');
      // document.getElementById("show_here").style.backgroundColor='rgb(248, 226, 227)';
    }
  });
});
</script>