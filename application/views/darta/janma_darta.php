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
  		<h5 style='text-align: center; color: #337AB7;'>जन्म दर्ता फारम</h5>
	</div>


	<form class="form_color" action="<?php echo base_url(); ?>darta/insert_janma_darta" method="post" id="form">

	<div class="first_form col-md-12 col-sm-9">

		<div class="row">

			<div class="row col-md-12">
				<h6 class="col-md-12 acc_color">विवरण</h6>
				<div class="col-md-3 col-lg-3">
					<label>जिल्ला: </label>
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
				<div class="col-md-3 col-lg-3">
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
					<input type="text" name="form_darta_no" class="form-control" required>
				</div>
			</div>


			<div class="row col-md-12">
				<h6 class="acc_color col-md-12 col-lg-12 mt-4">नवजात शिशुको विवरण</h6>
				<div class="col-md-3 col-lg-3">
					<label>पुरा नाम र थर: </label>
					<input type="text" name="child_name" class="form-control" required>
				</div>

				<div class="col-md-3 col-lg-3">
					<label>लिङ्ग: </label>
					<select class="form-control" name="child_gender">
						<option value="">Select</option>
						<option >महिला</option>
						<option >पुरुष</option>
						<option >अन्य</option>
					</select>
				</div>



				<div class="col-md-3 col-lg-3 mt-3">
					<label>जन्म दर्ता नं: </label>
					<input type="text" name="birth_darta_no" class="form-control">
				</div>
				<?php
foreach ($f_name as $key) { ?>
				<div class="col-md-3 col-lg-3 mt-3">
					<label>बुवाको नाम: </label>
					<input type="text" name="father_name" value="<?= $key['family_memb_name_list'] ?>" class="form-control">

					<input type="hidden" name="personal_id" value="<?= $key['id'] ?>">
				</div>

				<div class="col-md-3 col-lg-3 mt-3">
					<label>बुवाको नागरिकता प्र.नं: </label>
					<input type="text" name="cit_number" value="<?= $key['citizenship_number'] ?>" class="form-control">
				</div>
<?php } 
foreach ($m_name as $key) { ?>
				<div class="col-md-3 col-lg-3 mt-3">
					<label>आमाको नाम: </label>
					<input type="text" name="mother_name" value="<?= $key['family_memb_name_list'] ?>" class="form-control">

					<input type="hidden" name="personal_id" value="<?= $key['id'] ?>">
				</div>

				<div class="col-md-3 mt-3">
					<label>आमाको नागरिकता प्र.नं: </label>
					<input type="text" name="mot_cit_number" value="<?= $key['citizenship_number'] ?>" class="form-control">
				</div>
<?php } ?>
				</div>
			</div>
		</div>

		<div class="offset-5 col-md-7 mt-5 mb-5">
		<input type="hidden" name="link_id" value="<?= $tid?>">
		<input class="btn btn-info btn-sm" type="submit" name="save_personal" value="सेभ गर्नुहोस">
        <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">
    	</div>
</form>



<style type="text/css">
	.full-border{
	background: #d5cece;
    padding: 8px;
	}
	@media only screen and (max-width: 600px) {
    body {
        background-color: lightblue;
    }
}
	.input_sizee td input{
		width: 400px;
	}
	.input_sizee td{
		text-align: center;
	}
</style>
<script src="<?php echo base_url(); ?>assets_front/nepali/js/jquery.js"></script>
<!-- <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />


<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	  $("#dist").on('change', function(e){
    // alert("changed");
      var district = $("#dist").find('option:selected').val(); 
      $("#option-container").children().appendTo("#vdc");
            $("#vdc").children().removeAttr('disabled');
      var selectSeason = $("#vdc").children("[data-group!='"+district+"']"); 
            $(selectSeason).attr('disabled','disabled');
            $("#vdc").val($("#vdc optgroup[data-group='"+ district +"'] option:eq(0)").val());
      selectSeason.appendTo("#option-container");
            $("#vdc").removeAttr("disabled"); 
            });

	  $('#nepa_date').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 50,
      ndpEnglishInput: 'eng_date'
      });
      $('#nepa_date1').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 50,
      ndpEnglishInput: 'eng_date1'
      });

$(document).ready(function(){

 // load_data();

 $( "#search_male" ).keyup(function( event ) {
 	// alert("hello");
  var search = $(this).val();
  alert(search);
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>