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

	<div class="heading_title"><h5 style='text-align: center; color: #337AB7;'>बिबाह दर्ता फारम</h5></div>
	<form class="form_color" action="<?php echo base_url(); ?>darta/insert_marriage2" method="post" id="form">
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
    		<h5 class="full-border mb-4 col-md-12">१. विवाहको विवरण</h5>

    		<div class="col-md-6 col-lg-6 col-xs-6">
    			<label><b>विवाहको किसिम: </b></label>
    			<label><input type="radio" name="marriage_type" value="सामाजिक परम्परा अनुसार">सामाजिक परम्परा अनुसार</label>
    			<label><input type="radio" name="marriage_type" value="विवाह दर्ता ऐन अनुसार">विवाह दर्ता ऐन अनुसार</label>
    		</div>
    		<div>
    			<label><b>विवाह दर्ता नं.: </b></label>
    			<input type="text" name="marr_darta_no">
    		</div>
    		<div class="col-md-12 col-lg-12 mt-2">
					<label><b>विवाह भएको मिति.</b></label>
					<input type="text" name="married_date" id="nepa_date1" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" value="" autocomplete="off" required>
					<input type="text" name="eng_date" id="eng_date1" readonly="readonly">
				</div>
			<h6 class="col-md-12 mt-4 mb-4"><b>विबाह सम्पन्न भएको स्थान</b></h6>

			<div class="row col-md-12 col-lg-12 ml-0">
    		<!-- <div class="col-md-3 col-lg-3"> -->
    			<label><b>जिल्ला: </b></label>
    			<input type="text" name="married_district" class="col-md-2 ml-2 mr-4">
    		<!-- </div> -->
    		<!-- <div class="col-md-3 col-lg-3"> -->
				<label><b>गा.पा./न.प. : </b></label>
				<input type="text" name="married_rm" id="eng_date" class="col-md-2 ml-4 mr-4">
			<!-- </div> -->
			<!-- <div class="col-md-2 col-lg-2"> -->
				<label><b>वडा नं. : </b></label>
				<select name="married_ward" class="col-md-2">
					<?php 
					for ($j=1; $j < 10; $j++) { 
						echo '<option>'.$j.'</option>';
					} ?>
				</select>
			<!-- </div> -->
		</div>

			<div class="col-md-4 col-xs-4 mt-4">
				<label class=""><b>सडक / मार्ग: </b></label>
				<input type="text" name="married_marga">
			</div>

			<div class="col-md-4 col-xs-4 mt-4">
				<label class=""><b>गाउँ / टोल: </b></label>
				<input type="text" name="married_tole">
			</div>

			<div class="col-md-4 col-xs-4 mt-4">
				<label class=""><b>घर नं.: </b></label>
				<input type="text" name="married_ghar_no">
			</div>

			<div class="col-md-12 col-lg-12 mt-2">
				<label>विदेशमा विवाह भएमा ठेगाना: </label>
				<input type="text" name="married_abroad_address">
			</div>

			<div class="col-md-12 col-lg-12 mt-2">
				<label>विदेशमा विवाह भएमा ठेगाना (In English): </label>
				<input type="text" name="married_abroad_address_eng">
			</div>

			<div id="result"></div>

			<h5 class="full-border mt-4 col-md-12"><b>२. दुलाहा दुलहीको विवरण</b></h5>

			<div class="col-md-12 col-lg-12 col-xs-6">
			<table border="bordered">
				<thead>
					<tr style="text-align: center; background: cornflowerblue; color: #fff;">
						<th width="300"></th>
						<th width="400">दुलाहाको विवरण</th>
						<th width="400">दुलहीको विवरण</th>
					</tr>
				</thead>
				<tbody class="input_sizee">
				<tr>
					<form id="search" method="post" enctype="multipart/form-data">
					<td><b>Search</b></td>
					<td><input type="text" id="search_male" name="male_member"></td>
					<td><input type="text" name="female_member"></td>
				</form>
				</tr>
				<?php 
				$name= $this->darta_model->get_memb_name();
				$fem_name= $this->darta_model->get_fem_memb_name(); ?>
				
				<tr>
					<td><b>नाम र थर</b></td>
					<td><select name="husband_name_nep" class="form-control"><?php foreach ($name as $key => $value) {
						echo '<option>'.$value['family_memb_name_list'].'</option>'; } ?>
				</select></td>
					<td><select name="wife_name_nep" class="form-control"><?php foreach ($fem_name as $key => $value) {
						echo '<option value="'.$value['id'].'">'.$value['family_memb_name_list'].'</option>'; } ?>
				</select></td>
				</tr>
				<!-- <tr>
					<td><b>थर</b></td>
					<td><input type="text" name=""></td>
					<td><input type="text" name=""></td>
				</tr> -->
				<tr>
					<td><b>नाम - थर (in English)</b></td>
					<td><input type="text" name="husband_name_eng"></td>
					<td><input type="text" name="wife_name_eng"></td>
				</tr>
				<tr>
					<td><b>जन्म मिति</b></td>
					<td><input type="text" id="birth_date" name="husband_dob"></td>
					<td><input type="text" id="birth_date1" name="wife_dob"></td>
				</tr>
				<tr>
					<td><b>जात / जाति</b></td>
					<td><input type="text" id="birth_date" name="husband_caste"></td>
					<td><input type="text" id="birth_date1" name="wife_caste"></td>
				</tr>
				<tr>
					<td><b>पूर्व वैवाहिक स्थिति</b></td>
					<td><input type="text" name="hus_previous_marriage"></td>
					<td><input type="text" name="wif_previous_marriage"></td>
				</tr>
				<tr>
					<td><b>शिक्षाको स्तर (उतिर्ण तह)</b></td>
					<td><input type="text" name="hus_edu_passed"></td>
					<td><input type="text" name="wif_edu_passed"></td>
				</tr>

				<tr>
					<td><b>पेशा</b></td>
					<td><select name="hus_job" class="form-control">
						<option value="">Select</option>    
						<option value="लघुउद्यम">लघुउद्यम</option>    
						<option value="कृषि">कृषि</option>    
						<option value="व्यवसाय">व्यवसाय</option>    
						<option value="नोकरी">नोकरी</option>    
						<option value="मजदुरी">मजदुरी</option>    
						<option value="विदेश">विदेश</option>    
						<option value="शिक्षण">शिक्षण</option>    
						<option value="सेवा निवृत्त">सेवा निवृत्त</option>    </select></td>
					<td><select name="wif_job" class="form-control">
						<option value="">Select</option>    
						<option value="लघुउद्यम">लघुउद्यम</option>    
						<option value="कृषि">कृषि</option>    
						<option value="व्यवसाय">व्यवसाय</option>    
						<option value="नोकरी">नोकरी</option>    
						<option value="मजदुरी">मजदुरी</option>    
						<option value="विदेश">विदेश</option>    
						<option value="शिक्षण">शिक्षण</option>    
						<option value="सेवा निवृत्त">सेवा निवृत्त</option>    </select></td>
				</tr>
				<tr>
					<td><b>धर्म</b></td>
					<td><input type="text" name="hus_religion"></td>
					<td><input type="text" name="wif_religion"></td>
				</tr>
				<tr>
					<td><b>मातृभाषा</b></td>
					<td><input type="text" name="hus_mother_tongue"></td>
					<td><input type="text" name="wif_mother_tongue"></td>
				</tr>
				<tr>
					<td><b>स्थायी ठेगाना</b></td>
					<td>-</td>
					<td>-</td>
				</tr>
				<tr>
					<td><b>जिल्ला</b></td>
					<td><select class="form-control" name="husband_district" id="dist1" required>
    		     	<option value="">Select</option>
					<?php $rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) { ?>
			    	<option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php } ?>
					</select></td>

					<td><select class="form-control" name="wife_district" id="dist2" required>
    		     	<option value="">Select</option>
					<?php $rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) { ?>
			    	<option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php } ?>
					</select></td>
				</tr>
				<tr>
					<td><b>गा.पा. / न.पा.</b></td>
					<td><select class="form-control" name="husband_rm" id="vdc1" required>
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                         ?>
                    <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select></td>
					<td><select class="form-control" name="wife_rm" id="vdc1" required>
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
					<td><select name="husband_ward" class="form-control" required>
						<option value="">Select</option>
						<?php for ($i=1; $i < 10; $i++) { 
						echo '<option>'.$i.'</option>'; } ?>
					</select></td>
					<td><select name="wife_ward" class="form-control" required>
						<option value="">Select</option>
						<?php for ($i=1; $i < 10; $i++) { 
						echo '<option>'.$i.'</option>'; } ?>
					</select></td>
				</tr>
				<tr>
					<td>सडक/मार्ग</td>
					<td><input type="text" name="husband_marga"></td>
					<td><input type="text" name="wife_marga"></td>
				</tr>
				<tr>
					<td>गाउँ/टोल</td>
					<td><input type="text" name="husband_tole"></td>
					<td><input type="text" name="wife_tole"></td>
				</tr>
				<tr>
					<td>घर नं</td>
					<td><input type="text" name="husband_ghar_no"></td>
					<td><input type="text" name="wife_ghar_no"></td>
				</tr>
				<tr>
					<td>जन्म भएको देश</td>
					<td><select name="husband_birth_country" id="country_list" class="form-control">
					<option value="Nepal">Nepal</option>
					<?php $countries = $this->Dropdown_val_model->countries();
					foreach($countries as $key => $value) { ?>
					<option id="country" value="<?= htmlspecialchars($value) ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
					<?php } ?>
					</select></td>
					<td><select name="wife_birth_country" id="country_list" class="form-control">
					<option value="Nepal">Nepal</option>
					<?php $countries = $this->Dropdown_val_model->countries();
					foreach($countries as $key => $value) { ?>
					<option id="country" value="<?= htmlspecialchars($value) ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
					<?php } ?>
					</select></td>
				</tr>
				<tr>
					<td>नागरिकता लिएको देश</td>
					<td><input type="text" name="husband_cit_taken_country"></td>
					<td><input type="text" name="wife_cit_taken_country"></td>
				</tr>
				<tr>
					<td>नागरिकता प्रमाणपत्र नं.</td>
					<td><input type="text" name="husband_cit_no"></td>
					<td><input type="text" name="wife_cit_no"></td>
				</tr>
				<tr>
					<td>प्रमाणपत्र जारी मिति(साल-महिना-गते)</td>
					<td><input type="text" name="hus_cit_issued"></td>
					<td><input type="text" name="wif_cit_issued"></td>
				</tr>
				<tr>
					<td>नागरिकता प्रमाणपत्र जारी जिल्ला</td>
					<td><input type="text" name="cit_iss_dist_hus"></td>
					<td><input type="text" name="cit_iss_dist_wif"></td>
				</tr>
				<tr>
					<td>बिदेशी भएमा पासपोर्ट नं. र देशको नाम</td>
					<td><input type="text" name="if_hus_foreign"></td>
					<td><input type="text" name="if_wif_foreign"></td>
				</tr>
				<tr>
					<td>ठेगाना (बिदेशी भएमा)</td>
					<td><input type="text" name="hus_address_if_foreign_nep"></td>
					<td><input type="text" name="wif_address_if_foreign_nep"></td>
				</tr>
				<tr>
					<td>बिदेशी भएमा ठेगाना (In English)</td>
					<td><input type="text" name="hus_address_if_foreign_eng"></td>
					<td><input type="text" name="wif_address_if_foreign_eng"></td>
				</tr>
				<tr>
					<td>बाजेको नाम थर (नेपालीमा)</td>
					<td><input type="text" name="hus_grandfat_fullname_nep"></td>
					<td><input type="text" name="wif_grandfat_fullname_nep"></td>
				</tr>
				<tr>
					<td>बाजेको नाम थर (In English)</td>
					<td><input type="text" name="hus_grandfat_fullname_eng"></td>
					<td><input type="text" name="wif_grandfat_fullname_eng"></td>
				</tr>
				<tr>
					<td>बाबुको नाम थर (नेपालीमा)</td>
					<td><input type="text" name="hus_fat_fullname_nep"></td>
					<td><input type="text" name="wif_fat_fullname_nep"></td>
				</tr>
				<tr>
					<td>बाबुको नाम थर (In English)</td>
					<td><input type="text" name="hus_fat_fullname_eng"></td>
					<td><input type="text" name="wif_fat_fullname_eng"></td>
				</tr>
				<tr>
					<td>आमाको नाम थर (नेपालीमा)</td>
					<td><input type="text" name="hus_mot_fullname_nep"></td>
					<td><input type="text" name="wif_mot_fullname_nep"></td>
				</tr>
				<tr>
					<td>आमाको नाम थर (In English)</td>
					<td><input type="text" name="hus_mot_fullname_eng"></td>
					<td><input type="text" name="wif_mot_fullname_eng"></td>
				</tr>
				
				</tbody>
			</table>
			</div>

			<!-- <label>Upload file</label>
			<input type="file" name="userfile"> -->
			
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
        <input class="btn btn-primary" type="submit" value="Save">
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
      $('#birth_date').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 50,
      });
      $('#birth_date1').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 50,
      });

$(document).ready(function(){

 load_data();

 function load_data(query)
 {
 	// alert(query);
 	var name = $('input[name=male_member]').val();
	var female_member = $('input[name=female_member]').val();

	var form_data = 
			  'name='+name+
			  '&female_member='+female_member;
	$('.text').attr('disabled','true');
  $.ajax({
   url:"<?php echo base_url(); ?>darta/search_person",
   method:"POST",
   data:form_data,
   success:function(resp){
    $('#result').html(resp);
   }
  })
 }

 $( "#search_male" ).keyup(function( event ) {
 	// alert("hello");
  var search = $(this).val();
  // alert(search);
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