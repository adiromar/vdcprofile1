<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

<?php if($this->session->flashdata('updated')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('updated').'</p>';
  endif; ?>

<div class="row" id="marriage_reg" style="">
  <div class="col-md-12 col-xs-12 col-lg-12">
  	<div class="tiles">
      <div class="tile-body">
        <div class="heading_title">
            <h4 style='text-align: center; color: #337AB7;'>बिबाह दर्ता </h4>
        </div>
        <div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<!-- loading ends >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->

        <div class="row col-md-5 mr-4 ml-4" style="float: left; border-right: 2px solid #cec6c6; height: 500px; background: #fff; padding: 15px;">
          <form method="post" id="add_mm" enctype="multipart/form-data">
          <h5 class="steps">Step 1:</h5>
<?php
// echo '<pre>';
// print_r($b_name);die;
foreach ($b_name as $key) {

?>
<div class="row">
<div class="col-md-4 col-xs-4 col-lg-4">
<label>पतिको नाम: </label>
<input type="text" name="husband_name" class="form-control" value="<?= $key['family_memb_name_list'] ?>">
</div>
<div class="col-md-4 col-xs-4 col-lg-4">
<label>हालको उमेर</label>
<input type="text" name="hus_age" class="form-control" value="<?= $key['current_age'] ?>" readonly>
</div>
<div class="col-md-4 col-xs-4 col-lg-4">
<label>लिङ्ग</label>
<input type="text" name="hg" class="form-control" value="<?= $key['gender'] ?>" readonly>
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>नागरिकता प्र. नं.</label>
<input type="text" name="husband_cit_no" class="form-control" value="<?= $key['citizenship_number'] ?>">
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>बिबाह भएको मिति</label>
<input type="text" id="nep_date" name="married_date" class="form-control" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" autocomplete="off" readonly>
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>बिबाह दर्ता नं.</label>
<input type="text" name="darta_no" class="form-control" required>
<input type="hidden" name="oth_id" value="<?= $key['id'] ?>">
</div>
</div>
<?php } 
foreach ($m_name as $key) {

?>
<div class="row col-md-12 col-xs-12">
<div class="col-md-4 col-xs-4 col-lg-4">
<label>पत्नीको नाम: </label>
<input type="text" name="wife_name" class="form-control" value="<?= $key['family_memb_name_list'] ?>">
</div>
<div class="col-md-4 col-xs-4 col-lg-4">
<label>हालको उमेर: </label>
<input type="text" name="wif_age" class="form-control" value="<?= $key['current_age'] ?>" readonly>
</div>
<div class="col-md-4 col-xs-4 col-lg-4">
<label>लिङ्ग: </label>
<input type="text" name="wg" class="form-control" value="<?= $key['gender'] ?>" readonly>
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>नागरिकता प्र. नं.</label>
<input type="text" name="wife_cit_no" class="form-control" value="<?= $key['citizenship_number'] ?>">
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>बिबाह भएको मिति</label>
<input type="text" id="nep_date" name="married_date" class="form-control" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" autocomplete="off">
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>बिबाह दर्ता नं.</label>
<input type="text" name="darta_no" class="form-control" required>
<input type="hidden" name="wif_id" value="<?= $key['id'] ?>" >
</div>
</div>
<?php } ?>

<hr>

<div id="new_resp"></div>
<div id="new_resp1"></div>

<!-- <input type="submit" class="btn btn-info btn-sm" name="insert_new_mar" value="Enter"> -->
</form>
</div>


<!-- search form -->

<div class="row" style="background: #fff">
<form id="search_females" method="post" enctype="multipart/form-data">
<div class="row col-md-12 col-xs-12 ml-1">
  <h5 class="steps">Step 2:</h5>
<?php
if (empty($b_name)){ ?>
  <legend>Search: </legend>
  <div class="col-xs-3">
  <label>पतिको नाम:</label>
  <input type="text" name="male_name">
</div>
  <div class="col-xs-3 ml-2">
  <label>नागरिकता प्र. नं.</label>
  <input type="text" name="mal_cit">
</div>
<p class="offset-4 col-xs-2 mt-4"><input type="submit" class="btn btn-info btn-sm" name="submit_it" value="Search" id="search_fem">
<input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
<?php }else{ ?>
  <legend>Search: </legend>
  <div class="col-xs-4">
  <label>पत्नीको नाम: </label>
  <input type="text" name="name">
</div>
<div class="col-xs-4 ml-2">
  <label>नागरिकता प्र. नं.</label>
  <input type="text" name="wif_cit">
</div>
<p class="offset-4 col-xs-2 mt-4"><input type="submit" class="btn btn-info btn-sm" name="submit_it" value="Search" id="search_fem">
<input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
<?php } ?>
</div>
</form>
</div>

<form id="insert_to_form" method="post" enctype="multipart/form-data">
<div id="wife_view" class="mt-5" style="padding: 8px;"><div>
</form>
<!-- main form ends >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->


        		</div>
        	</div>
        </div>
    </div>


 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets_front/nepali/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_mm').submit(function () {
     // $( "#loading" ).show();
    $.post('<?= base_url()?>darta/insert_marriage', $('#add_mm').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      // $( "#view_data" ).hide();
      setTimeout(function() {
            $('#new_resp1').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
});

  $('#search_fem').click(function () {
    // alert("submitted");

     $( "#loading" ).show();
    $.post('<?= base_url()?>darta/search_marriage', $('#search_females').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      // $( "#view_data" ).hide();
      setTimeout(function() {
        // $("#main_search").hide();
            $('#wife_view').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
});

$('#insert_to_form').submit(function () {
      // alert("done");
         $.post('<?= base_url()?>darta/newmarriage', $('#insert_to_form').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      // $( "#view_data" ).hide();
      setTimeout(function() {
            $('#new_resp').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
    });

$('#nep_date').nepaliDatePicker({
     npdMonth: true,
     npdYear: true,
     npdYearCount: 50
    });

});
</script>