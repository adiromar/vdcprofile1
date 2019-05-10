<?php
// echo '<pre>';
$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str = explode("/", $str, 6);
$sec = $str[5];
// echo $sec;die;
$data = $this->admin_model->get_table_by_id($sec);
$fields = $data[0]['fields'];
$types = $data[0]['types'];
$nepali_title = $data[0]['nepali_title'];
$old_title = $data[0]['title'];

$fields = explode(',', $fields);
$types = explode(',', $types);
$nepali_title = explode(',', $nepali_title);
foreach ($nepali_title as $nep => $titl) {
  $parts = explode(',', $titl);  
  $pos = in_array('legend', $parts); 
  
if ($pos == true){
                    unset($nepali_title[$nep]);
                    unset($titl);
                  }else{
                    $nep = implode(',', $nepali_title);   
                  }
    }
$nep = explode(',', $nep);
$fields = array_combine($fields, $types);
// $nep_type_mix = array_combine($types, $nepali_title);
print_r($nep);
// print_r($data);
// die;
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

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h4>Form Edit</h4>
            <form method="post" action="<?= base_url() ?>admins/update_form" enctype="multipart/form-data">

        <div class="main_form">
          <div class="form-inline">
            <label for="title" class="control-label col-md-1">Form Name:</label>
              
            <input type="text" name="title" class="form-control col-md-3" placeholder="Database form name" value="<?= $data[0]['title'] ?>" required>
            <label for="display_name" class="control-label col-md-1">Display Name:</label>
            <input type="text" name="display_name" class="form-control col-md-3" placeholder="Form Display Name" value="<?= $data[0]['display_name'] ?>" required>
            <label for="display_name" class="control-label col-md-1 ml-2">Form Type:</label>
            <select name="form_type" class="col-md-2 form-control">
              <option value="primary_form">Primary</option>
              <option value="foreign_form">Foreign</option>
              <option value="multiple_form">Multiple Input</option>
            </select>

             <label for="" class="control-label col-md-3 offset-2 mt-4">Sub Title:</label>
            <input type="text" name="subtitle" class="form-control col-md-3 mt-4" value="<?= $data[0]['subtitle'] ?>" >
          </div>
        
        <div class="another" id="another" style="border: 1px solid grey; padding: 10px; margin-top: 30px;">
          <div class="form-inline mt-4 mb-4" >
            <?php 
            $i= 0;
            foreach ($fields as $key => $value){ 
// print_r($fields);die;
              if ($value == "legend"){
              ?>
              
            <label class="control-label col-md-4">Legend:</label>
            <input type="text" name="fields[]" value="<?= $key ?>" class="form-control col-md-7" >
            <input type="hidden" class="form-control col-md-2" name="nepali_title[]" value="legend">
            <input type="hidden" class="form-control col-md-2" name="types[]" value="legend">
            <?php } ?>
      <div class="form-inline ml-4 mt-2 row">
        
        <?php if ($value == "VARCHAR" || $value == "INT" || $value == "TEXT"){ ?>
      <label class="control-label col-md-1">Field Name:</label>
      <input type="text" class="form-control col-md-2" name="fields[]" value="<?= $key ?>">
      <label class="control-label col-md-2">फिल्डको नाम:</label>
      <input type="text" class="form-control col-md-2" name="nepali_title[]" value="<?= $nep[$i] ?>">
      <label class="control-label col-md-2">Type:</label>
      <select type="text" name="types[]" class="form-control col-md-2" value="<?= $value ?>">
        <option><?= $value; ?></option>
      <option value="VARCHAR">VARCHAR</option><option value="INT">INT</option>
      <option value="TEXT">TEXT</option></select>
<?php } ?>
<?php if ($value == "radio1"){ ?>
<div class="row col-md-12">
<label class='control-label col-md-3'>Field Name:</label>
<input type='text' class='form-control col-md-3' name='fields[]'></input>
</div>  
    </div>
          <?php $i++; } } ?></div>
              <input type="hidden" name="old_table_ttl" value="<?= $old_title ?>">
              <input type="hidden" name="table_id" value="<?= $sec ?>">
              <input class="btn btn-info float-right mt-2" type="submit" name="update" value="Update">
        </div>
      </form></div>


              </div>
           </div>
        </div>
    </div>
</main>