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
foreach ($get_user as $key) {
 // print_r($key);die();


?>
 <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body" style="padding: 10px 75px;">
         <form action="edituser" method="post">
  <div class="form-group row">
    <input type="hidden" name="user_id" value="<?= $key['user_id'] ?>">
    <label for="inputEmail3" class="col-sm-2 col-form-label">First Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname" id="inputEmail3" value="<?= $key['firstname'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname" id="inputEmail3" value="<?= $key['lastname'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" value="<?= $key['user_name'] ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" placeholder="New Password" name="password" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="emailpattern" name="email" value="<?= $key['email'] ?>">
    </div>
  </div>

<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">User Type :</legend>
      <div class="col-sm-10">
      
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios2" value="User" <?php if($key['user_type'] == 'User'){
            echo ' checked ';}?>>
          <label class="form-check-label" for="gridRadios2">Normal User</label>
        </div>

        <!-- <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios3" value="DistrictAdmin" <?php if($key['user_type'] == 'DistrictAdmin'){
            echo ' checked ';}?>>
          <label class="form-check-label" for="gridRadios3">
            District Admin
          </label>
        </div> -->
        <div class="form-check">
          <input class="form-check-input" type="radio" name="user_type" id="gridRadios4" value="Admin" <?php if($key['user_type'] == 'Admin'){
            echo ' checked ';}?>>
          <label class="form-check-label" for="gridRadios4">
            Admin
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>

  <!-- <div class="form-group row" id="dist">
    <label for="inputPassword3" class="col-sm-2 col-form-label">District :</label>
    <div class="col-md-4">
      <select class="form-control" name="district" id="sec_tbl" required>
        <option value="<?= $key['district'] ?>"><?= $key['district'] ?></option>
      <?php 
      foreach ($get_dis as $dist => $dis) {
        echo '<option value="'.$dis['district'].'">'.$dis['district'].'</option>';
      }
      ?>
    </select>
    </div>
  </div> -->

  <!-- <div class="form-group row" id="local">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Local Level (RM) :</label>
    <div class="col-md-4">
      <select class="form-control" name="local_level" id="foreign_tbl" required>
        <option><?= $key['local_level'] ?></option>
        <?php foreach ($get_local as $lkey => $val) {
          echo '<option data-group="'.$val['district_name'].'" value="'.$val['local_level_name'].'">'.$val['local_level_name'].'</option>';
        } ?>
      </select>
    </div>
  </div> -->

  <!-- <div class="form-group row" id="ward">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ward No. :</label>
    <div class="col-md-4">
      <select name="ward_no" class="form-control">
        <option value="<?= $key['ward_no'] ?>"><?= $key['ward_no'] ?></option>
        <?php 
        for ($k=1; $k < 10; $k++) { 
          echo '<option>'.$k.'</option>';
        }

        ?>
      </select>
    </div>
</div> -->
  
  <div class="form-group row">
    <div class="col-sm-2">Status :</div>
    <div class="col-sm-10 col-md-4">
      <div class="form-check">
        <select class="form-control" name="status">
          <option><?= $key['status'] ?></option>
          <option>Pending</option>
          <option>DeActive</option>
          <option>Active</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="user_edit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
        </div>
      </div>
    </div>


  </div>
  <?php } ?>
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