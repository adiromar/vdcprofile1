<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">

<?php if($this->session->flashdata('updated')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('updated').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('insert')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('insert').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('error')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('error').'</p>';
  endif; ?>

<div class="row" id="relation_darta" style="">
  <div class="col-md-12">
  	<div class="tiles">
      <div class="tile-body">
        <div class="heading_title">
            <h5 style='text-align: center; color: #337AB7;'>मृत्यु दर्ता</h5>
        </div>

<?php foreach ($per_name as $key) { ?>
  <form id="" method="post" action="<?= base_url()?>darta/add_deceased" enctype="multipart/form-data">
<div class="row mt-4 ml-4" style="border: 1px solid grey; padding: 12px;">
<div class="col-md-3">
<label>मृत्यु हुने व्यक्तिको नाम</label>
<input type="text" name="deceased_name" value="<?= $key['family_memb_name_list'] ?>" class="form-control">
</div>

<div class="col-md-3">
<label>लिङ्ग</label>
<input type="text" name="gender" value="<?= $key['gender'] ?>" class="form-control" readonly>
</div>

<div class="col-md-3">
<label>नागरिकता नं.</label>
<input type="text" name="deceased_cit_no" value="<?= $key['citizenship_number'] ?>" class="form-control" readonly>
</div>

<div class="col-md-3">
<label>जन्म मिति</label>
<input type="text" name="birth_year" id="nep_date1" value="<?= $key['birth_year'] ?>" class="form-control">
</div>

<div class="col-md-3 mt-3">
<label>मृत्यु भएको मिति</label>
<input type="text" name="death_year" id="nep_date" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[02])" value="" class="form-control" autocomplete="off" required>
</div>

<div class="col-md-3 mt-3">
<label>मृत्यु दर्ता नं</label>
<input type="text" name="death_darta_no" value="" class="form-control">
</div>
<input type="hidden" name="sec_memb_user_id" value="<?= $key['id'] ?>">
<p class="col-md-3 mt-5 ml-4"><input type="submit" id="submitit" name="deceased_insert" class="btn btn-info btn-sm" value="Submit"></p>
<?php
foreach ($dup as $val) { 
  if(!empty($val['deceased_user_id'])) { ?>
    <p class="col-md-3 mt-5 ml-4" style="color: red;">*Death Registration Already Exists</p>
<?php } } ?>

</div>
</form>
<?php } ?>

<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div class="resp"></div>
      
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets_front/nepali/nepali.datepicker.v2.2.min.css" />

<script type="text/javascript">
   $('#post_deceased').click(function () {
    // alert("posted");
     $.post('<?= base_url()?>darta/add_deceased', $('#post_deceased').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      $( "#view_data" ).hide();
      setTimeout(function() {
            $('.resp').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
 
});

$('#nep_date').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 40,
      });
$('#nep_date1').nepaliDatePicker({
      npdMonth: true,
      npdYear: true,
      npdYearCount: 40,
      });
</script>