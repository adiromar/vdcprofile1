<?php

?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-eye"></i> <?= $title ?></h1>
      <!-- <p>Set your Form name and Fields:</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
    </ul>
  </div>
<?php
if($this->session->flashdata('dupli')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('dupli').'</p>'; 
  endif;
?>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body" style="padding: 10px 75px;">
          
         <form action="insertuser" method="post">
<?php
echo validation_errors(); ?>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname" id="inputEmail3" placeholder="First Name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname" id="inputEmail3" placeholder="Last name" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username"  placeholder="Username" autocomplete="off" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" pattern=".{6,}" title="6 characters minimum" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="emailpattern" name="email" placeholder="Email">
    </div>
  </div>

    <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">User Type :</legend>
      <div class="col-sm-10">
        <!-- <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios1" value="General">
          <label class="form-check-label" for="gridRadios1">
            General (Guest)
          </label>
        </div> -->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios2" value="User" checked>
          <label class="form-check-label" for="gridRadios2">Normal User</label>
        </div>
        <!-- <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios3" value="DistrictAdmin">
          <label class="form-check-label" for="gridRadios3">
            District Admin
          </label>
        </div> -->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios4" value="Admin">
          <label class="form-check-label" for="gridRadios4">Admin
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>

 <!--  <div class="form-group row" id="dist">
    <label for="inputPassword3" class="col-sm-2 col-form-label">District :</label>
    <div class="col-md-4"> -->
      <!-- <select class="form-control" name="location" required>
        <option disabled>Select District</option><option>Taplejung</option><option>Panchthar</option><option>Illam</option><option>Jhapa</option><option>Morang</option><option>Sunsari</option><option>Dhankuta</option><option>Sankhuwasabha</option><option>Bhojpur</option><option>Terhathum</option><option>Okhaldunga</option><option>Khotang</option><option>Solukhumbu</option><option>Udaypur</option><option>Saptari</option><option>Siraha</option><option>Dhanusa</option><option>Mahottari</option><option>Sarlahi</option><option>Sindhuli</option>
 <option>Ramechhap</option><option>Dolakha</option><option>Sindhupalchowk</option><option>Kavrepalanchowk</option><option>Lalitpur</option>
<option>Bhaktapur</option><option>Kathmandu</option><option>Nuwakot</option><option>Rasuwa</option><option>Dhading</option><option>Makwanpur</option><option>Rautahat</option><option>Bara</option><option>Parsa</option><option>Chitawan</option><option>Gorkha</option>
<option>Lamjung</option><option>Tanahun</option><option>Syangja</option><option>Kaski</option><option>Manang</option><option>Mustang</option><option>Parwat</option><option>Myagdi</option><option>Baglung</option><option>Gulmi</option><option>Palpa</option><option>Nawalparasi</option><option>Rupandehi</option><option>Arghakhanchi</option><option>Kapilvastu</option><option>Pyuthan</option><option>Rolpa</option><option>Rukum</option><option>Salyan</option><option>Dang</option><option>Bardiya</option><option>Surkhet</option><option>Dailekh</option><option>Banke</option><option>Jajarkot</option><option>Dolpa</option><option>Humla</option><option>Kalikot</option><option>Mugu</option><option>Jumla</option><option>Bajura</option><option>Bajhang</option><option>Achham</option><option>Doti</option><option>Kailali</option><option>Kanchanpur</option><option>Dadeldhura</option><option>Baitadi</option><option>Darchula</option>
      </select> -->
      <!-- <select class="form-control" name="district" id="sec_tbl" required>
        <option value="">Select</option> -->
      <?php 
      //foreach ($get_dis as $dist => $dis) {
        //echo '<option value="'.$dis['district'].'">'.$dis['district'].'</option>';
      // }
      ?>
    <!-- </select>
    </div>
  </div> -->

  <!-- <div class="form-group row" id="local">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Local Level (RM) :</label>
    <div class="col-md-4">
      <select class="form-control" name="local_level" id="foreign_tbl" required>
        <option readonly>Select</option> -->
        <?php // foreach ($get_local as $key => $val) {
          // echo '<option data-group="'.$val['district_name'].'" value="'.$val['local_unit'].'">'.$val['local_unit'].'</option>';
        // } ?>
     <!--  </select>
    </div>
  </div> -->

<div class="form-group row" id="ward">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ward No. :</label>
    <div class="col-md-4">
      <select name="ward_no" class="form-control" required>
        <option value="">Select</option>
        <?php 
        for ($k=1; $k < 10; $k++) { 
          echo '<option>'.$k.'</option>';
        }

        ?>
      </select>
    </div>
</div>

  <div class="form-group row">
    <div class="col-sm-2">Status :</div>
    <div class="col-sm-10 col-md-4">
      <div class="form-check">
        <select class="form-control" name="status">
          <option>Pending</option>
          <option>DeActive</option>
          <option>Active</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 col-md-10">
      <button type="submit" name="user_add" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<!-- <div id="created">Result</div> -->
        </div>
      </div>
    </div>


  </div>
</main>

<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(function(){

    $('#sec_tbl').on('change', function(){
        // var val = $('#sec_tbl option:selected').data("id");
        var val = $(this).val();

        // var sub = $('#foreign_tbl option:selected').data("group");
        var sub = $('#foreign_tbl');
        // console.log(sub);
        $('option', sub).filter(function(){

            if (
                 $(this).attr('data-group') === val 
              || $(this).attr('data-group') === 'SHOW'
            ) {

                $(this).show('slow');
            } else {
                $(this).hide();
            }
        });
    });
    $('#foreign_tbl').trigger('change');
});

  $( document ).ready(function() {
  $("input:radio").click(function() {
    // alert('adf');
    if($(this).val() == "Admin") {
      $("#dist").hide( 500 );
      $("#local").hide( 500 );
      $("#ward").hide( 500 );
    } else if ($(this).val() == "DistrictAdmin"){
      $("#dist").show( 500 );
      $("#local").hide( 500 );
      $("#ward").hide( 500 );
    }else{
      $("#dist").show( 500 );
      $("#local").show( 500 );
      $("#ward").show( 500 );
    }
  });

  
});
</script>