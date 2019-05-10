<?php
$user_id=$this->session->userdata('user_id');
$user_type = $this->user_model->get_user_type($user_id);
$user_type = $user_type[0]['user_type'];

$list = $this->db->list_fields($form_name);

// unset($list[0]);
// unset($fields['user_id']);
foreach ($list as $key => $f) {
  if ($f == 'user_id'){
    unset($list[$key]);
  }
}

$check_rel = $this->admin_model->check_relation_by_tblname($form_name);
$k =0;
if ($check_rel == true){
  $sec = $check_rel[$k]['sec_table'];
  $for_fields = $this->db->list_fields($check_rel[0]['sec_table']);
  unset($for_fields[0]);

  foreach ($for_fields as $fkey => $fval){
  if ($fval == 'user_id' || $fval == 'primary_id'){
    unset($for_fields[$fkey]);
      }
  }
  $k++;
}else{

}

$nepali = $this->admin_model->get_nepali_title_id($form_name);
$nepali = $nepali[0]->nepali_title;
$res = explode(',', $nepali);
$dat = array();
foreach ($res as $key => $r) {
  $parts = explode(' ', $r);  
  $pos = in_array('legend', $parts); 
  if ($pos == true){
                    unset($res[$key]);
                    
                  }else{
                    $dat[] = '';
                  }
  
}

// $res = implode(',', $res);
// $res = explode(',', $res);
// print_r($list);
// print_r($res);die;
// $comb = array_combine($list, $res);
// print_r($comb);die;
?><main class="app-content">
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
          <p><h4 style="color: #007bff;">Select Fields :</h4></p>

<form action="<?= base_url() ?>admins/export_records" method="post">
          <div class="col-md-3 mb-4">
            <label><b>Sort By (Ward No.): </b></label>
            <select class="form-control" name="ward_no">
            <option value="all">All</option>
            <?php for ($i=1; $i < 10; $i++) { 
              echo '<option>'.$i.'</option>';
            } ?>
            </select>
          </div>

          <div class="col-md-12 float-left">
            <label><input type="checkbox" onClick="toggle(this)" checked="checked"><b> Primary (Select All)</b></label><br/><br/>
            <?php 
      foreach ($list as $key => $val) { ?>
        
        <label class="col-md-4"><input type="checkbox" name="sec_value[]" id="sec_value" value="<?= $val; ?>" class="" checked> <?= $val; ?></label>
      <?php }  ?>
      
          </div>

<?php if($check_rel == true){ ?>
          <div class="col-md-12 float-left mt-4">
            <label><input type="checkbox" onClick="toggle2(this)" checked="checked"><b> Multiple Data (Select All)</b></label><br/><br/>
            <?php 
      foreach ($for_fields as $fkey => $fval) { ?>
        
        <label class="col-md-3"><input type="checkbox" name="for_value[]" id="for_value" value="<?= $fval; ?>" class="" checked> <?= $fval; ?></label>
        <input type="hidden" name="foreign_tbl" value="<?= $sec ?>">

      <?php }  ?>
          </div>
        <?php } ?>

          <div class="col-md-2 float-right">
            <input type="hidden" name="form_name" value="<?= $form_name ?>">
            <!-- <input type="hidden" name="form_title" value="<?= $disp_name ?>"> -->
            <input class="btn btn-success" type="submit" name="export" value="Generate Report">
          </div>
          
</form>
        </div>
  </div>
</div>
</div>

</main>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="text/javascript">

function toggle(source) {
    console.log('toggle');
    checkboxes = document.getElementsByName('sec_value[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

function toggle2(source) {
    console.log('toggle2');
    checkboxes2 = document.getElementsByName('for_value[]');
  for(var i=0, n=checkboxes2.length;i<n;i++) {
    checkboxes2[i].checked = source.checked;
  }
}
</script>