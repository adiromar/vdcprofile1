<?php
//echo $tid;
?>
<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

<?php if($this->session->flashdata('insert')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('insert').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('error')):
    echo '<p style="text-align: center" class="alert alert-danger">'.$this->session->flashdata('error').'</p>';
  endif; ?>

     <div class="heading_title">
  		<h5 style='text-align: center; color: #337AB7;'>बसाई सराई फारम</h5>
	</div>

<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div id="response_migration"></div>

	<form class="form_color" action="" method="post" id="mig_insert">

	<div class="first_form col-md-12 col-sm-9">

		<div class="row">

			<div class="row col-md-12">
				<h6 class="col-md-12 acc_color">विवरण</h6>
				<div class="col-md-2 col-lg-2">
					<label>बसाई सराई: </label>
					<select class="form-control" name="in_out">
						<option value="">Select</option>
						<option>आएको</option>
						<option>गएको</option>
					</select>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>जिल्ला: (आएको / गएको)</label>
					<!-- <input type="text" name="district" class="form-control" required> -->
					<select class="form-control" name="district" id="districtm" required>
					<?php 
					$rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) { ?>
					<option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php }
					?>
					</select>
				</div>
				<div class="col-md-3 col-lg-3">
					<label>न.पा/ गाउँपालिका: </label>
					<!-- <input type="text" name="mun_vdc" class="form-control" required> -->
					<select class="form-control" name="mun_vdc" id="rmm" required>
						<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                        //print_r($p); ?>
                        <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>वडा नं: </label>
					<select name="ward_no" class="form-control" required>
						<option value="">Select</option>
						<?php
for ($i=1; $i < 10; $i++) { 
	echo '<option>'.$i.'</option>';
}
						?>
					</select>
				</div>
				<div class="col-md-3 col-lg-3">
					<label>फारम दर्ता नं: </label>
					<input type="text" name="form_darta_no" class="form-control">
				</div>
			</div>


			<div class="row col-md-12 mt-4">
				<!-- <h6 class="acc_color col-md-12 col-lg-12 mt-4">नवजात शिशुको विवरण</h6> -->
				<?php foreach ($f_name as $val) { ?>
				<div class="col-md-3 col-lg-3">
					<label>घरमुलीको नाम: </label>
					<input type="text" name="household_name" class="form-control" value="<?= $val['family_memb_name_list'] ?>" required>
				</div>

				<div class="col-md-2 col-lg-2">
					<label>लिङ्ग: </label>
					<select class="form-control" name="household_gender" required>
						<option><?= $val['gender'] ?></option>
						<option >महिला</option>
						<option >पुरुष</option>
						<option >अन्य</option>
					</select>
				</div>

				<div class="col-md-3">
					<label>बसाई सराई गरेको मिति: </label>
					<input type="text" name="migration_date" id="nep_date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" value="" class="form-control" autocomplete="off" required>
				</div>

				<div class="col-md-3">
					<label>बसाई सराई गरेको मिति (in English)</label>
				<input type="text" name="eng_date" id="engg_date" class="form-control" readonly="readonly">
				</div>

			<?php } ?>
				<div class="col-md-3 col-lg-3 mt-3">
					<label>बसाई सराई दर्ता नं: </label>
					<input type="text" name="migration_darta_no" class="form-control" required>
				</div>

			</div>
		</div>

		<div class="offset-5 col-md-7 mt-5 mb-5">
		<input type="hidden" name="link_id" value="<?= $tid?>">
		<input class="btn btn-info btn-sm" type="submit" name="save_personal" value="सेभ गर्नुहोस">
        <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">
    	</div>

	</form>

<script src="<?php echo base_url(); ?>assets_front/nepali/js/jquery.js"></script>
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />
<script type="text/javascript">
	  $("#districtm").on('change', function(e){
    // alert("changed");
      var district = $("#districtm").find('option:selected').val(); 
      $("#option-container").children().appendTo("#rmm");
            $("#rmm").children().removeAttr('disabled');
      var selectSeason = $("#rmm").children("[data-group!='"+district+"']"); 
            $(selectSeason).attr('disabled','disabled');
            $("#rm").val($("#rmm optgroup[data-group='"+ district +"'] option:eq(0)").val());
      selectSeason.appendTo("#option-container");
            $("#rmm").removeAttr("disabled"); 
            });

	  $('#mig_insert').submit(function () {
      // alert("sss");
         $.post('<?= base_url(); ?>darta/insert_migration', $('#mig_insert').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      // $( "#view_data" ).hide();
      setTimeout(function() {
            $('#response_migration').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
    });

	  $('#nep_date').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 50,
      ndpEnglishInput: 'engg_date'
      });
</script>