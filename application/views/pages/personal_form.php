<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

 <?php if($this->session->flashdata('inserted')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('inserted').'</p>';
  endif; ?>

<?php if($this->session->flashdata('insert_error')):
    echo '<p style="text-align: center" class="alert alert-danger">'.$this->session->flashdata('insert_error').'</p>';
  endif; ?>
<?php if($this->session->flashdata('update_error')):
    echo '<p style="text-align: center" class="alert alert-warning">'.$this->session->flashdata('update_error').'</p>';
  endif; ?>

   <!-- <a target="_blank" href="<?= base_url(); ?>assets_front/image/slide2.jpg" id="myButton" class="example">Click</a> -->

 <div class="heading_title">
  <h3 style='text-align: center; color: #554e4e;'>व्यक्तिगत सूचना फारम</h3>
</div>

<form class="form_color" action="<?php echo base_url(); ?>darta/insert_personal" method="post" id="form">

	<div class="first_form col-md-12 col-sm-9">

		<div class="row col-md-12 ml-1">
			<legend class="legend-blue-color">विवरण</legend>
				<div class="col-md-3">
					<label>गणकको नाम: </label>
					<input type="text" name="surveyer_name" class="form-control" required>
				</div>

				<div class="col-md-3">
					<label>जलाधार क्षेत्रको नाम: </label>
					<input type="text" name="jaladhar_name" class="form-control">
				</div>

				<div class="col-md-3">
					<label>फाराममा भएको क्र सं: </label>
					<input type="number" name="sn_in_form" class="form-control" required>
				</div>
		</div>

		<div class="row col-md-12 mt-4 ml-1">
			<div class="col-md-2">
					<label>घर नं: </label>
					<input type="text" name="house_no" class="form-control" required>
			</div>

			<div class="col-md-3 col-xs-6">
					<label>घरमुलीको नाम: </label>
					<input type="text" name="household_name" class="form-control" id="household_name" required>
			</div>
			<div class="col-md-2">
					<label>जिल्लाको कोड: </label>
					<select class="form-control" name="district_code" id="districtt">
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_dis_data_for_field();
					foreach ($rm as $rmdata) {
                        //print_r($p); ?>
                        <option value="<?= $rmdata['district'] ?>"><?= $rmdata['district'] ?></option><?php }
					?>
					</select>
			</div>
			<div class="col-md-2">
					<label>स्थानीय तह: </label>
					<select class="form-control" name="rm" id="rmt">
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                        //print_r($p); ?>
                        <option data-group="<?= $rmdata['district_name'] ?>" value="<?= $rmdata['local_unit'] ?>"><?= $rmdata['local_unit'] ?></option><?php }
					?>
					</select>
			</div>
			<div class="col-md-2">
					<label>स्थानीय तहको कोड: </label>
					<select class="form-control" name="rm_code" id="rmt_code">
					<option value="">Select</option>
					<?php 
					$rm = $this->page_model->get_rm_data_for_field();
					foreach ($rm as $rmdata) {
                        //print_r($p); ?>
                        <option data-group="<?= $rmdata['local_unit'] ?>" value="<?= $rmdata['unit_code'] ?>"><?= $rmdata['unit_code'] ?></option><?php }
					?>
					</select>
			</div>
			<div class="col-md-1 col-xs-4">
					<label>वडा नं: </label>
					<select name="ward_no" class="form-control" required>
						<option value="">Select</option>
						<?php for ($i=1; $i < 10; $i++) { ?>
							<option><?= $i; ?></option>
						<?php } ?>
						
					</select>
				</div>
		</div>

		<div class="row col-md-12 mt-4 ml-2">
			 <div class="card col-md-12">
    <div class="card-header" id="headingsdOne">
      <h5 class="mb-0">
        <a class="btn btn-link acc_color" data-toggle="collasdpse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
          पारिवारिक सदस्यको विवरण 
        </a>
        <p class="float-right">
        <a class="btn btn-success btn-sm plus_color" id="add_relation">+</a>
        <!-- <a class="btn btn-danger btn-sm plus_color" id="del_relation">-</a></p> -->
      </h5>
    </div>
<p class="mt-2 ml-4">*घरमुलीको बिबरण नं १ मा उल्लेख गर्नुहोस </p>
    <div id="collapseOne2" class="collaps" aria-labelledby="headingOne" data-parent="#accordionsd">
      <div class="card-body">
        <div class="form-group">
		<div class="col-md-12 table-responsive">
		<table class="table tbl" id="tbl">
			<thead>
				<th width="65">क्र सं </th>
				<th width="290">सदस्यको नाम </th>
				<th width="85">लिङ्ग </th>
				<th width="191">घरमुली सँगको नाता</th>
				<!-- <th width="170">परिवार छुट्टीएको</th> -->
				<th width="170">Household No.</th>
				<th></th>
			</thead>

		</table>
	</div>

	<!-- @@@@@@@@@@@@@ Accordion starts @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  -->
<?php
$inc = 1;	
 $birthDate = "2000-08-11";

$birthDate = explode("-", $birthDate);

$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-0):(date("Y")-$birthDate[0]));

?>
<!-- <h3 class="test">Datepicker with english date textbox</h3>
		<input type="text" id="nepaliDates" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" class="nepaliDates nepali-calendar" value="2069-08-02">
		<input type="text" class="englishDates" id="englishDates"/>
		<input type="text" name="" pattern="\d{1,2}/\d{1,2}/\d{4}" >
<h3>Datepicker inside modal</h3>
		<p>
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			  Launch demo modal
			</button>
		</p> -->

<select name="if_foreign_national[]" id="country_list" class="form-control" style="display: none;">
	<option value="">Select</option>
<?php 
$countries = $this->Dropdown_val_model->countries();
foreach($countries as $key => $value) { ?>
	
<option id="country" value="<?= htmlspecialchars($value) ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
<?php } ?>
</select>

<select name="in_out_district[]" id="district_list" class="form-control" style="display: none;">
	<option value="">Select</option>
<?php 
$dist = $this->Dropdown_val_model->districts();
foreach($dist as $key => $value) { ?>
<option id="country" value="<?= $value ?>"><?= $value ?></option>
<?php  } ?>
</select>

<select name="issued_district[]" id="district_list1" class="form-control" style="display: none;">
	<option value="">Select</option>
<?php 
$dist = $this->Dropdown_val_model->districts();
foreach($dist as $key => $value) { ?>
<option id="country" value="<?= $value ?>"><?= $value ?></option>
<?php  } ?>
</select>

<div id="add_relation_indi">
	<table class="table" id="add_relation_indid">
		
	</table>
	
</div>

</div>

      </div>
      
    </div>
  </div>

</div>

		<div class="offset-5 col-md-7 mt-5 mb-5">
		<input class="btn btn-info btn-sm" type="submit" name="save_personal" id="save_form" value="सेभ गर्नुहोस">
        <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">
    	</div>
	</div>
</form>
	
<div id="status"></div>
</div>
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <script src="<?php echo base_url(); ?>assets_front/nepali/js/jquery.js"></script>
 <!-- <script type="text/javascript" src="<?= base_url()?>assets_front/nepali/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />
<script> 
  $("#districtt").on('change', function(e){
    
      var districtt = $("#districtt").find('option:selected').val(); 
      $("#option-container").children().appendTo("#rmt");
            $("#rmt").children().removeAttr('disabled');
      var selectSeasons = $("#rmt").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            $("#rmt").val($("#rmt optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#rmt").removeAttr("disabled"); 
            
            if( !$('#districtt').val() ) { 
            	$("#rmt").children().removeAttr('disabled');
            }
});
  $("#rmt").on('change', function(e){
  var rm = $("#rmt").find('option:selected').val(); 
      $("#option-container").children().appendTo("#rmt_code");
            $("#rmt_code").children().removeAttr('disabled');
      var selectSeasons = $("#rmt_code").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            $("#rmt_code").val($("#rmt_code optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#rmt_code").removeAttr("disabled"); 
            });

$(document).ready(function(){

	$('.nepaliDates').nepaliDatePicker({
			ndpEnglishInput: 'englishDates'
		});
	$('.englishDates').change(function(){
			$('.nepaliDates').val(AD2BS($('.englishDates').val()));
		});

	});

// document.getElementById("add_relation").click();

 $(document).ready(function(){
        	// alert("auto");
        	// var x = document.getElementsByClassName("example").click();
            document.getElementById("add_relation").click();
        });
</script>