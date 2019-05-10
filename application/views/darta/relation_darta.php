<!-- Page Content -->
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">


<?php if($this->session->flashdata('updated')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('updated').'</p>';
  endif; ?>

<div class="row" id="relation_darta" style="">
  <div class="col-md-12">
  	<div class="tiles">
      <div class="tile-body">
        <div class="heading_title">
            <h4 style='text-align: center; color: #337AB7;'>नाता प्रमाणित</h4>
        </div>

<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>

<!-- loading ends >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->
        <div class="row col-md-6 col-xs-12 mr-4 ml-4" style="float: left; border-right: 2px solid #cec6c6; height: 500px; background: #fff; padding: 15px;">
          <form method="post" id="add_mb" enctype="multipart/form-data">
<?php
// echo '<pre>';
// print_r($b_name);die;
foreach ($b_name as $key) {

?>
<h5 class="steps">Step 1:</h5>
<div class="row">
<div class="col-md-6 col-xs-4 col-lg-4">
<label>पहिलो सदस्यको नाम : </label>
<input type="text" name="first_member_name" class="form-control" value="<?= $key['family_memb_name_list'] ?>">
</div>
<div class="col-xs-4 col-lg-4">
<label>लिङ्ग</label>
<input type="text" name="first_memb_gender" class="form-control" value="<?= $key['gender'] ?>" readonly>
</div>
<div class="col-xs-4 col-lg-4">
<label>नागरिकता प्र. नं.</label>
<input type="text" name="first_member_cit_no" class="form-control" value="<?= $key['citizenship_number'] ?>">
</div>
<div class="col-md-4 col-xs-4 col-lg-4 mt-3">
<label>नाता (दोस्रो सदस्यसंग)</label>
<select class="form-control" name="relation_first" required>
  <option>Select</option>
    <option>पिता</option>
      <option>आमा </option>
      <option>पति</option>
      <option>पत्नि</option>
      <option>छोरा </option>
      <option>छोरी</option>
      <option>वुहारी</option>
      <option>नाति </option>
      <option>नातिनी</option>
      <option>पनाती</option>
      <option>पनातिनी </option>

      <option>दाजु </option>
      <option>भाई</option>
      <option>भाउजु</option>
      <option>भाइवुहारी </option>
      <option>भतिजो </option>
      <option>भतिजी</option>
      <option>अन्य </option>
</select>
<input type="hidden" name="first_memb_user_id" value="<?= $key['id'] ?>">
</div>
</div>
<?php } ?>

<hr>

<div id="new_resp"></div>
<div id="new_resp1"></div>

<!-- <input type="submit" class="btn btn-info btn-sm" name="insert_new_mar" value="Enter"> -->
</form>
</div>

<div class="row col-md-5" style="background: #fff">
<form id="second_member" method="post" enctype="multipart/form-data">
  <h5 class="steps">Step 2: Search</h5>

  <div class="col-xs-3 mb-4">
  <label>दोस्रो सदस्यको नाम:</label>
  <input type="text" name="memb_name">
</div>
  <div class="col-xs-2">
  <label>नागरिकता प्र. प्र. नं. :</label>
  <input type="text" name="memb_cit_id">
</div>
<p class="offset-4 col-xs-2 mt-4"><input type="submit" class="btn btn-info btn-sm" name="submit_it" value="Search" id="search_memb">
<input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
</form>
</div>

<form id="list_res" method="post" enctype="multipart/form-data">
<div id="list_view" class="mt-5" style="padding: 8px;">
  <div>
</form>

        		</div>
        	</div>
        </div>
    </div>


 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="js/jquery-3.1.0.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){
  $('#search_memb').click(function () {
     // alert("sec memb");
    $.post('<?= base_url()?>darta/search_sadashya2', $('#second_member').serialize(),   
        function (data, textStatus) {
            $("#loading-image").show();
        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);
      // $( "#view_data" ).hide();
      setTimeout(function() {
        // $("#main_search").hide();
            $('#list_view').show('slidedown').html(data);
        }, 1105);
         // $('.loading').show().html(data);
    });
    return false;
});

$('#list_res').submit(function () {
         $.post('<?= base_url()?>darta/show_sadashya', $('#list_res').serialize(),   
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

$('#list_rest').submit(function () {
  alert("working");
         $.post('<?= base_url()?>darta/show_sadashya', $('#list_rest').serialize(),   
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

$('#add_mb').submit(function () {
      // alert("sss");
         $.post('<?= base_url()?>darta/insert_relation', $('#add_mb').serialize(),   
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

});
</script>