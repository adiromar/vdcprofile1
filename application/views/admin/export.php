<?php
$user_id=$this->session->userdata('user_id');
//echo $user_id;
if(!$user_id){

  redirect('user/login');
}

if(isset($_POST["ch"])){
    // Capture selected country
    $country = $_POST["ch"];
    // print_r($country);die;
  }
// $res = "select * from "
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> <?= $title ?>:</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admins/index"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><?= $title?></li>
    </ul>
  </div>
<style type="text/css">
  .eye-view{
    color: #cb8888;
    font-size: 22px;
  }

  .eye-view:hover {
    color: #009688;
  }

  .hid{
    opacity: 0;
  }
</style>

<?php if($this->session->flashdata('post_updated')): 
    echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; 
  endif; ?>
<?php if($this->session->flashdata('post_deleted')): 
    echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; 
  endif; ?>
<div class="row">
  <div class="col-md-12">
  <div class="tile">
        <div class="tile-body">
  <?php 
foreach ($show as $sho) {
  // echo '<pre>';
  // print_r($sho);
}


  ?>
<form class="row" method="post" action="fetch_report">
    <div class="col-md-4">
    <label>Select Table 1</label>
      <select id="first" name="first_tbl" class="ch form-control" onchange="myFunction()">
      
      <?php 

            foreach($groups as $row)
            { 
              
              echo '<option value="'.$row->title.'">'.$row->title.'</option>';
              $title = $row->title;
            }
            ?>
    </select>
</div>
 
<?php 
// $table = "<p id='response'></p>";
// echo $table;
if(empty($table)){

 $table = 'second';
 
}else{
  
}
  $res = $this->db->list_fields($table);
// $t = explode(',', $res);
// echo '<pre>';
// print_r($res);
?>
<?php 


?>
  <div id="first_field" class="col-md-4" style="">
    <label>Select Table Field 1</label>
      <select class="form-control" name="first_tbl_field">
        <option>select</option>
<?php
foreach ($rela as $key) {
  // echo '<pre>';
  echo '<option>'. $key->sec_table .'</option>';
  // echo $key->sec_table;
}
  

?>
      </select>

    </div>
  </div>

  <div class="col-md-4"></div>

  <div class="col-md-4 mt-4">
    <label>Select Table 2</label>
      <select id="first_tbl" class="form-control" name="second_tbl">
      <option selected>Choose</option>
      <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->title.'">'.$row->title.'</option>';
            }
            ?>
    </select>
    </div>
  
  <div id="second_field" class="col-md-4 mt-4">
    <label>Select Table Field 2</label>
      <select class="form-control" name="second_tbl_field">
        <option><?php
        foreach ($res as $result){
      echo '<option data-group="'.$title.'" value="'.$result.'">'.$result.'</option>';    
  
}

        ?></option>
      </select>
  </div>
    <p id="response">
              
            </p>
            <button type="submit" name="report" class="btn btn-primary">Generate Report</button>
            
</form>

<?php
 foreach($groups as $row)
  echo '<pre>';
  // print_r($groups);
            { 
              
             
            }
?>
  </div>
</div>
</div>
</div>

 <!-- <a class="btn btn-info btn-sm mb-2" href="<?php echo base_url(); ?>admins/export1">Export to Excel</a>  -->
 
</main>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
  function myFunction() {
  // alert("change");
    var x = document.getElementById("first").value;
    $table = x;
    document.getElementById("response").innerHTML = x;
}

$(document).ready(function(){
var bOptions = {
    $tbl: [$values]
  };

  var res = document.getElementById("first_tbl").value;
  
    $("select.ch").change(function(){
      alert("ddd");

        var selectedCountry = $(".ch option:selected").val();
        alert(selectedCountry);
        $first = res;
        // alert($rrr);
        // $('#first_field').show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admins/export",
            data: { ch : selectedCountry } 

        }).done(function(data){
          // alert(data);
            $("#response").html(data);
        });
    });
});
</script>