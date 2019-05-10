<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

<?php if($this->session->flashdata('insert')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('insert').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('error')):
    echo '<p style="text-align: center" class="alert alert-danger">'.$this->session->flashdata('error').'</p>';
  endif; ?>

<!-- ****************** New fields birth registration ********************************* -->

	<div class="heading_title"><h5 style='text-align: center; color: #337AB7;'>जन्मको सूचना फारम</h5></div>
	<form class="form_color" action="<?php echo base_url(); ?>darta/insert_janma_darta2" method="post" id="form">
    	<div class="row col-md-12 col-lg-12 col-xs-9 first_form" style="background: #fff;">

    		<div class="col-md-5">
    		   <div class="col-md-12">
    		     <table border="bordered">
    		     	<thead style="text-align: center;">
    		     		<tr>
    		     			<th width="150">जिल्ला</th>
    		     			<td width="150"><select class="form-control" name="district" id="dist" required>
    		     			<option value="">Select</option>
			<?php $rm = $this->page_model->get_dis_data_for_field();
			foreach ($rm as $rmdata) { ?>
			    <option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php } ?>
			</select></td>
    		     		</tr>

    		     		<tr>
    		     			<th width="150">गा.पा./न.पा.</th>
    		     			<td width="150"><select class="form-control" name="mun_rm" id="vdc" required>
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                         ?>
                        <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select></td>
    		     		</tr>
    		     		<tr>
    		     			<th width="150">वार्ड नं.</th>
    		     			<td width="150"><select name="ward_no" class="form-control" required>
						<option value="">Select</option>
<?php
for ($i=1; $i < 10; $i++) { 
	echo '<option>'.$i.'</option>';
} ?>
					</select></td>
    		     		</tr>

    		     	</thead>
    		     </table>
		      </div>
    		</div>

    		<div class="col-md-7 float-right">
    		    <div class="col-md-12">
    		     	<table border="bordered">
    		     		<thead style="text-align: center;">
    		     			<tr>
    		     				<th width="300">स्थानीय पन्जिकाधिकारीको नाम</th>
    		     				<td width="150"><input type="text" name="local_auth_name"></td>
    		     			</tr>
    		     			<tr>
    		     				<th width="300">स्थानीय पन्जिकाधिकारीको नाम (In English)</th>
    		     				<td width="150"><input type="text" name="local_auth_name_eng"></td>
    		     			</tr>
    		     			<tr>
    		     				<th width="300">कर्मचारी संकेत नं.</th>
    		     				<td width="150"><input type="text" name="emp_record_no"></td>
    		     			</tr>
    		     			<tr>
    		     				<th width="300">फारम दर्ता नं.</th>
    		     				<td width="150"><input type="text" name="form_darta_no"></td>
    		     			</tr>
    		     			<tr>
    		     				<th width="300">परिवारको लगत फारम नं.</th>
    		     				<td width="150"><input type="text" name="family_form_no"></td>
    		     			</tr>
    		     		</thead>
    		     	</table>
    		</div>
    	</div>

    	<div class="row col-md-12 col-lg-12 col-xs-6 mt-4 mb-5">
    		<h5 class="full-border mb-4 col-md-12">१. नवजात शिशुको विवरण</h5>

    		<div class="col-md-10 col-lg-10">
    			<label class="mr-2"><b>पुरा नाम र थर: </b></label>
    			<input type="text" name="child_name_nep" class="col-md-4">
    		<!-- </div> -->
    		<!-- <div class="col-md-4"> -->
    			<label class="ml-4"><b>पुरा नाम र थर (English): </b></label>
    			<input type="text" name="child_name_eng" class="col-md-3">
    		</div>
    		<div class="col-md-8 mt-4">
				<label><b>जन्मेको मिति: </b></label>
				<input type="text" name="birth_date_nep" id="nepa_date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" value="" autocomplete="off" required>
				<!-- </div> -->
			<!-- <div class="col-md-3"> -->
				<label class="ml-4"><b>जन्मेको मिति (in English)</b></label>
				<input type="text" name="birth_date_eng" id="eng_date" readonly="readonly">
			</div>
			<div class="col-md-10 col-xs-4 mt-4">
				<label class="mr-2"><b>शिशु जन्मेको ठाउँ: </b></label>
				<input type="radio" value="घर" name="child_birth_place"> घर
				<input type="radio" value="स्वास्थ्य संस्था" name="child_birth_place"> स्वास्थ्य संस्था
				<input type="radio" value="अस्पताल" name="child_birth_place"> अस्पताल
				<input type="radio" value="अन्य" name="child_birth_place"> अन्य
			</div>

			<div class="col-md-10 col-xs-4 mt-4">
				<label class="mr-2"><b>शिशु जन्मदा मद्त गर्ने व्यक्ति: </b></label>
				<input type="radio" name="helper_dur_birth" value="घरको मानिस"> घरको मानिस
				<input type="radio" name="helper_dur_birth" value="सुडिनी"> सुडिनी
				<input type="radio" name="helper_dur_birth" value="नर्स"> नर्स
				<input type="radio" name="helper_dur_birth" value="स्वास्थ्य कर्मी"> स्वास्थ्य कर्मी
				<input type="radio" name="helper_dur_birth" value="डाक्टर"> डाक्टर
				<input type="radio" name="helper_dur_birth" value="अन्य"> अन्य
			</div>
			<div class="col-md-8 col-lg-8 col-xs-4 mt-4">
				<label><b>लिङ्ग: </b></label>
				<input type="radio" name="gender" value="महिला">महिला
				<input type="radio" name="gender" value="पुरुष">पुरुष
				<input type="radio" name="gender" value="अन्य">अन्य
			</div>
			<div class="col-md-8 col-lg-8 col-xs-4 mt-4">
				<label><b>जात / जाति: </b></label>
				<input type="text" name="caste">
			</div>
			<div class="col-md-8 col-lg-8 col-xs-4 mt-4">
				<label><b>जन्मको किसिम: </b></label>
				<label>एकल<input type="radio" name="birth_type" value="एकल"></label>
				<label>जुम्ल्याहा<input type="radio" name="birth_type" value="जुम्ल्याहा"></label>
				<label>तिम्ल्याहा वा सो भन्दा बादी<input type="radio" name="birth_type" value="तिम्ल्याहा वा सो भन्दा बादी"></label>
			</div>
			<div class="col-md-8 col-lg-8 col-xs-4 mt-4">
				<label><b>कुनै शारीरिक अशक्तता: </b></label>
				<label>छ<input type="radio" name="physical_defect" value="छ"></label>
				<label>छैन<input type="radio" name="physical_defect" value="छैन"></label>

				<label class="ml-5"><b>भएमा उल्लेख गर्ने: </b></label>
				<input type="text" name="if_any_physical_defect">
			</div>
			<h5 class="col-md-12 col-xs-12 mt-4"><b>शिशुको जन्मेको ठेगाना</b></h5>

			<h5 class="full-border mt-4 col-md-12"><b>२. नवजात शिशुको बाजेको विवरण</b></h5>
			<div class="col-md-12 col-lg-12 col-xs-4 mt-4">
				<label><b>नवजात शिशुको बजेको नाम: </b></label>
				<input type="text" name="grandfather_name">

				<label class="ml-4"><b>बजेको नाम (in English): </b></label>
				<input type="text" name="gf_name_eng">
			</div>

			<div id="result"></div>

			<h5 class="full-border mt-4 col-md-12"><b>३. नवजात शिशुको बाबु आमाको विवरण</b></h5>

			<div class="col-md-12 col-lg-12 col-xs-6">
			<table border="bordered">
				<thead>
					<tr style="text-align: center; background: cornflowerblue; color: #fff;">
						<th width="300"></th>
						<th width="400">बाबुको विवरण</th>
						<th width="400">आमाको विवरण</th>
					</tr>
				</thead>
				<tbody class="input_sizee">
				<tr>
					<form id="search" method="post">
					<td><b>Search</b></td>
					<td><input type="text" id="search_male" name="male_member"></td>
					<td><input type="text" name="female_member"></td>
				</form>
				</tr>
				<tr>
				<?php 
				$name= $this->darta_model->get_memb_name();
				$fem_name= $this->darta_model->get_fem_memb_name(); ?>
					<td><b>नाम र थर</b></td>
					<td><select name="father_name_nep" class="form-control">
						<option value="">Select</option>
						<?php foreach ($name as $key => $value) {
						echo '<option>'.$value['family_memb_name_list'].'</option>'; } ?>
				</select></td>
					<td><select name="mother_name_nep" class="form-control">
						<option value="">Select</option>
						<?php foreach ($fem_name as $key => $value) {
						echo '<option>'.$value['family_memb_name_list'].'</option>'; } ?>
				</select></td>
				</tr>
				<!-- <tr>
					<td><b>थर</b></td>
					<td><input type="text" name=""></td>
					<td><input type="text" name=""></td>
				</tr> -->
				<tr>
					<td><b>नाम - थर (in English)</b></td>
					<td><input type="text" name="father_name_eng"></td>
					<td><input type="text" name="mother_name_eng"></td>
				</tr>
				<tr>
					<td><b>स्थायी ठेगाना</b></td>
					<td>-</td>
					<td>-</td>
				</tr>
				<tr>
					<td><b>जिल्ला</b></td>
					<td><select class="form-control" name="father_district" id="dist1" required>
    		     	<option value="">Select</option>
					<?php $rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) { ?>
			    	<option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php } ?>
					</select></td>

					<td><select class="form-control" name="mother_district" id="dist2" required>
    		     	<option value="">Select</option>
					<?php $rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) { ?>
			    	<option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>गा.पा. / न.पा.</b></td>
					<td><select class="form-control" name="father_rm" id="vdc1" required>
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                         ?>
                    <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select></td>
					<td><select class="form-control" name="mother_rm" id="vdc1" required>
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                         ?>
                    <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select></td>
				</tr>
				<tr>
					<td><b>वडा नं</b></td>
					<td><select name="father_ward" class="form-control" required>
						<option value="">Select</option>
						<?php for ($i=1; $i < 10; $i++) { 
						echo '<option>'.$i.'</option>'; } ?>
					</select></td>
					<td><select name="mother_ward" class="form-control" required>
						<option value="">Select</option>
						<?php for ($i=1; $i < 10; $i++) { 
						echo '<option>'.$i.'</option>'; } ?>
					</select></td>
				</tr>
				<tr>
					<td>सडक/मार्ग</td>
					<td><input type="text" name="father_marga"></td>
					<td><input type="text" name="mother_marga"></td>
				</tr>
				<tr>
					<td>गाउँ/टोल</td>
					<td><input type="text" name="father_tole"></td>
					<td><input type="text" name="mother_tole"></td>
				</tr>
				<tr>
					<td>घर नं</td>
					<td><input type="text" name="father_ghar_no"></td>
					<td><input type="text" name="mother_ghar_no"></td>
				</tr>
				<tr>
					<td>शिशु जन्मदाको उमेर</td>
					<td><input type="number" name="fat_age_during_child_birth" min="1"></td>
					<td><input type="number" name="mot_age_during_child_birth" min="1"></td>
				</tr>
				<tr>
					<td>जन्म भएको देश</td>
					<td><select name="father_birth_country" id="country_list" class="form-control">
					<option value="">Select</option>
					<?php $countries = $this->Dropdown_val_model->countries();
					foreach($countries as $key => $value) { ?>
					<option id="country" value="<?= htmlspecialchars($value) ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
					<?php } ?>
					</select></td>
					<td><select name="mother_birth_country" id="country_list" class="form-control">
					<option value="">Select</option>
					<?php $countries = $this->Dropdown_val_model->countries();
					foreach($countries as $key => $value) { ?>
					<option id="country" value="<?= htmlspecialchars($value) ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
					<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td>नागरिकता लिएको देश</td>
					<td><input type="text" name="father_cit_taken_country"></td>
					<td><input type="text" name="mother_cit_taken_country"></td>
				</tr>
				<tr>
					<td>नागरिकता प्रमाणपत्र नं.</td>
					<td><input type="text" name="father_cit_no"></td>
					<td><input type="text" name="mother_cit_no"></td>
				</tr>
				<tr>
					<td>प्रमाणपत्र जारी मिति(साल-महिना-गते)</td>
					<td><input type="text" name="fat_cit_issued"></td>
					<td><input type="text" name="mot_cit_issued"></td>
				</tr>
				<tr>
					<td>नागरिकता प्रमाणपत्र जारी जिल्ला</td>
					<td><input type="text" name="cit_iss_dist_fat"></td>
					<td><input type="text" name="cit_iss_dist_mot"></td>
				</tr>
				<tr>
					<td>बिदेशी भएमा पासपोर्ट नं. र देशको नाम</td>
					<td><input type="text" name="if_fat_foreign"></td>
					<td><input type="text" name="if_mot_foreign"></td>
				</tr>
				<tr>
					<td>शिक्षाको स्तर (उत्तीर्ण तह)</td>
					<td><input type="text" name="fat_education"></td>
					<td><input type="text" name="mot_education"></td>
				</tr>
				<tr>
					<td>पेशा</td>
					<td><input type="text" name="father_job"></td>
					<td><input type="text" name="mother_job"></td>
				</tr>
				<tr>
					<td>धर्म</td>
					<td><input type="text" name="fat_religion"></td>
					<td><input type="text" name="mot_religion"></td>
				</tr>
				<tr>
					<td>मातृभाषा</td>
					<td><input type="text" name="fat_mother_tongue"></td>
					<td><input type="text" name="mot_mother_tongue"></td>
				</tr>
				<tr>
					<td>यो शिशु समेत गरेर हाल सम्म जन्मेको सन्तान संख्या</td>
					<td colspan="2"><input type="number" name="tot_children" min="1"></td>
				</tr>
				<tr>
					<td>यो शिशु समेत गरेर हाल सम्म जीवित सन्तान संख्या</td>
					<td colspan="2"><input type="number" name="tot_alive_children" min="0"></td>
				</tr>
				<tr>
					<td>विवाह दर्ता नं.</td>
					<td colspan="2"><input type="text" name="marriage_darta_no"></td>
				</tr>
				<tr>
					<td>विवाह भएको मिति.</td>
					<td><input type="text" name="married_date" id="nepa_date1" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" value="" autocomplete="off" required></td>
					<td><input type="text" name="eng_date" id="eng_date1" readonly="readonly"></td>
				</tr>
				</tbody>
			</table>
			</div>
    	</div>
    	<div class="offset-5 col-md-7 mt-5 mb-5">
		<!-- <input type="hidden" name="link_id" value="<?= $tid?>"> -->
		<!-- <input class="btn btn-info btn-sm" type="submit" name="save_personal" value="सेभ गर्नुहोस"> -->
		<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
        सेभ गर्नुहोस</button>

        <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">
    	</div>

    	       <!-- Modal starts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Save Changes ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to save.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input class="btn btn-primary" type="submit" name="save_personal" value="Save">
      </div>
    </div>
  </div>
</div>

<!-- modal ends here -->

</form>
<!-- ends here -->

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


<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
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

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>pages/search_person",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

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