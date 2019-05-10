<div class="form-show">
<?php if($this->session->flashdata('post_updated')): 
    echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; 
  endif; 
if($this->session->flashdata('post_deleted')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; 
  endif;
  if($this->session->flashdata('update_error')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('update_error').'</p>'; 
  endif; ?>

        <?php         
        if (!empty($table_data)) 
        { ?>
        <div class="container pt-5">
            <h4 class='form-heading-title'>Update: <?= $table_data[0]['display_name'] ?></h4>
            <h6 class='form-heading-title'><?= $table_data[0]['subtitle'] ?></h6>
        </div>
  <?php
            // echo "<h2>Update: ".$table_data[0]['display_name']."</h2>";
            $fields = $table_data[0]['fields']; //echo $fields;
            $types = $table_data[0]['types'];
            // $fields = str_replace('_', ' ', $fields);
            $p_id = $table_data[0]['id'];
            // $fields = str_replace('_', ' ', $fields);
            $fields = explode(',', $fields);
            $types = explode(',', $types);
            $nep = $table_data[0]['nepali_title'];
            $nep = explode(',', $nep);
            $title = $table_data[0]['title'];

            $fields = array_combine($fields, $types);
            $p_title = $table_data[0]['title'];
        ?>
<?php
$url = $_SERVER['REQUEST_URI'];
$uid = substr($url, strrpos($url, '/') + 1);
// print_r($p_id);die;
?>

        <form class="form_color" action="<?php echo base_url(); ?>posts/update" method="post">
<?php
$tbname = $table_data[0]['title'];
$foreignn = $this->page_model->get_foreigntable_for($tbname);
$count_for = count($foreignn);

 ?>

<!-- ----------------New foreign ---------------------- -->
<?php for ($g=0; $g < $count_for; $g++) { 
if (!empty($foreignn)){ 
    $sec_tbl = $foreignn[$g]['sec_table'];
    // print_r($sec_tbl);die;
    $datas = $this->news_model->get_relation_added_fields($tbname, $sec_tbl);
    $break = $datas[$g];

    foreach ($break as $val => $v) {
        $t = explode(',', $v);
    // print_r($t);die;
        $valres = $this->admin_model->get_table_data_by_id($table_data[0]['title'], $uid);
        // echo '<pre>';
        // print_r($valres);die;

?>
<div class="container">
<div class="row first-form mt-5">
    <div class="col-md-12 fieldset mb-4">
        <h5>जिल्लाको विवरण</h5>
    </div>

  <div class="col-md-3 col-sm-4">
<label>जिल्लाको नाम</label>
<select class="form-control" id="dis_name" name="district">
    <option value="23">Select</option>
    <?php foreach ($forn as $name) { ?>
        <option value="<?= $name['id'] ?>"><?= $name['district'] ?></option>
    <?php } ?>
</select>
</div>

<?php 
if (strpos($v, 'district_code') !== False){ ?>
<div class="col-md-3 col-sm-4 all_unit">
<label>जिल्लाको कोड</label>
<select class="form-control" id="rmt" name="district_code" required>
    <option><?= $valres[0]['district_code'] ?></option>
    <?php foreach ($forn as $name) { ?>
        <option data-group="<?= $name['id'] ?>"><?= $name['district_code'] ?></option>
    <?php } ?>
</select>
</div>

<?php } if (strpos($v, 'local_unit') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit">
<label>गाउँपालिकाको नाम</label>
<select class="form-control" id="unit" name="unit_code">
    <option><?= $valres[0]['local_unit'] ?></option>
    <?php foreach ($unit as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['local_unit'] ?>"><?= $name['local_unit'] ?></option>
    <?php } ?>
</select>
</div>

<?php } if (strpos($v, 'unit_code') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit">
<label>गाउँपालिकाको कोड</label>
<select class="form-control" id="unit" name="unit_code">
    <option><?= $valres[0]['unit_code'] ?></option>
    <?php foreach ($unit as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['unit_code'] ?>"><?= $name['unit_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'tole_code') !== False){?>

<div class="col-md-3 col-sm-4 all_unit">
<label>टोलको कोड</label>
<select class="form-control" name="tole_code" id="tole_codee">
    <option><?= $valres[0]['tole_code'] ?></option>
    <?php foreach ($tole as $names) { ?>
        <option data-group="<?= $names['dis_table_id'] ?>" value="<?= $names['tole_code'] ?>"><?= $names['tole_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'jaladhar_code') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit mt-3">
<label>जलाधार क्षेत्रको कोड</label>
<select class="form-control" name="jaladhar_code" id="jala">
    <option><?= $valres[0]['jaladhar_code'] ?></option>
    <?php foreach ($jala as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['jaladhar_code'] ?>"><?= $name['jaladhar_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'upa_jaladhar_code') !== False){?>

<div class="col-md-3 col-sm-4 all_unit mt-3">
<label>उप-जलाधार क्षेत्रको कोड</label>
<select class="form-control" name="upa_jaladhar_code" id="sub_jala">
    <option><?= $valres[0]['upa_jaladhar_code'] ?></option>
    <?php foreach ($upa_jala as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['upa_jaladhar_code'] ?>"><?= $name['upa_jaladhar_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } ?>

</div>
</div>
<?php } } } ?>
<!-- ------------------------------------- -->


 <div class="container mt-4">
        <div class="row first-form">

            <?php
            $i = 0;
            foreach ($fields as $key => $value){ ?>
            <!-- Main loop -->
<?php 
$res = $this->admin_model->get_table_data_by_id($tbname, $uid);
foreach ($res as $ress => $info) { ?>

<!-- <input class="form-control" type="hidden" name="" value="<?= $info[$key]?>"> -->

             <?php if($value == 'legend'): ?> 
                <div class="col-md-12 fieldset">
                    <h5><?= ucfirst($key) ?></h5>
                </div>

            <?php elseif($value == 'INT'): ?>
                <div class="ml-2 mr-4 mt-2 input_size">
                    <label for="" class="control-label"><?php echo $nep[$i] ?>:</label>
                    <!-- <label for="" class="control-label"><?= ucfirst($key) ?></label> -->
                    <input type="number" class="form-control" name="<?= $key ?>" value="<?= $info[$key] ?>">
                </div>
            <?php elseif($value == 'DATE'): ?>
                <div class="ml-2 mr-4 mt-2 input_size">
                    <label for="" class="control-label"><?php echo $nep[$i] ?>:</label>
                    <input type="date" class="form-control" name="<?= $key ?>" value="<?php echo date('Y-m-d',strtotime($info[$key])) ?>">
                </div>
                
            <?php elseif($value == 'VARCHAR'): ?> 
                <div class="ml-2 mr-4 mt-2 input_size">
                    <label for="" class="control-label"><?php echo $nep[$i] ?>:</label>
                    <input type="text" class="form-control" name="<?= $key ?>" value="<?= $info[$key] ?>">
                </div>
               
            <?php elseif($value == 'TEXT'): ?>

                <div class="col-md-12 col-sm-6 mt-4">
                    <label for="" class="control-label"><?php echo $nep[$i] ?>:</label>
                    <textarea name="<?php echo $key; ?>" value="<?= $info[$key] ?>" class="form-control"><?= $info[$key] ?></textarea>
                </div> 

            <?php elseif(strpos($value,'radio') !== FALSE): ?>
            <div class="ml-2 mr-4 mt-2 dotted_border">
                <label for="" class="control-label"><?php echo $nep[$i] ?>:</label><br> 
            <?php foreach ($table_values as $k): ?>
                
                <?php if ($value == $k['name'])
                        { 
                            $vals = explode('|', $k['vals']);
                            foreach ($vals as $val) 
                            { ?>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="<?= $key ?>" value="<?= $val ?>"<?php if($val == $info[$key]){
            echo ' checked ';}?>>
                                    <label class="form-check-label form-control-label" value="<?= $val ?>"><?= $val ?></label>
                                </div>
                <?php  } } ?>
                
                <?php endforeach ?>

                </div>

            <?php elseif(strpos($value,'checkbox') !== FALSE): ?>
            <div class="ml-2 mr-4 mt-2 dotted_border">
                <label class="control-label"><?php echo $nep[$i] ?>:</label><br>
            <?php foreach ($table_values as $k): ?>
                
                <?php if ($value == $k['name'])
                        { 
                            $vals = explode('|', $k['vals']);
                            foreach ($vals as $val) 
                            { 
                                // print_r($info[$key]);
                                $t = explode('|_|',$info[$key]);
                                // print_r($t);die;
                                $checked = in_array($val,$t) ? ' checked="checked"' : '';
                                ?>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" 
                                    name="<?php echo $key.'[checkbox]'; ?>[]" value="<?= $val ?>"<?php echo $checked; ?>>
                                    <label class="form-check-label form-control-label" name="<?= $key ?>"><?= $val ?></label>
                                </div>
                <?php       }
                ?>

                <?php } ?>
                
            <?php endforeach ?>
                </div>

            <?php elseif(strpos($value,'dropdown') !== FALSE): ?>
            <div class="ml-2 mr-4 mt-2 input_size">
                <label for="" class="control-label"><?php echo $nep[$i] ?>:</label><br>
            <?php foreach ($table_values as $k): ?>
                <?php if ($value == $k['name'])
                        { 
                            $vals = explode('|', $k['vals']);
                ?>
                <select name="<?= $key ?>" class="form-control" value="<?= $key ?>">
                    <option value="">Select</option>
                
                <?php
                            foreach ($vals as $val) 
                            { ?>
                                <option <?php if ($info[$key] == $val){ ?> selected="selected" <?php }?> value="<?= $val ?>"><?= $val ?></option>
                                
                <?php       }
                ?>
                </select>
                <?php } ?>
                
            <?php endforeach ?>
                </div>

            <?php endif; $i++;?>
            <?php } ?>
            <!-- end of Main loop -->
            <?php } ?>
    </div>
</div>

<!-- <div class="clearfix left"></div> -->
<?php 
            $tbname = $table_data[0]['title'];
            // echo $tbname;
            $foreign_table = $this->page_model->get_foreigntable_mul($tbname);

             
            if (!empty($foreign_table)) {   
                foreach ($foreign_table as $key){ 

                    $sectable = $key['sec_table'];
                    $secid = $key['sec_key'];
                    $foreign_table = $this->page_model->get_table_by_id($secid);  

                    $foreign_table_values = $this->page_model->get_table_values_by_id($secid);

                    $foreign_id = $foreign_table[0]['id'];
                    $foreign_tbl_name = $foreign_table[0]['title'];
                    $fields = $foreign_table[0]['fields'];
                    $types = $foreign_table[0]['types'];
                    $fr = $foreign_table[0]['id'];
                    // echo $fr;
                    $fields = explode(',', $fields);
                    $types = explode(',', $types);
                    $nep = $foreign_table[0]['nepali_title'];
                    $nep = explode(',', $nep);
                    $fieldss = array_combine($fields, $types);
                    // echo "<pre>";
                    // print_r($table_values);
                    // echo "uid ".$uid;
                    $dat = $this->admin_model->get_table_by_title($foreign_tbl_name);
                // print_r($dat[0]['id']);

                    $count_table = $this->page_model->find_foreign_no_of_tbl_for_edit($foreign_tbl_name, $uid, $p_id);
                    // print_r($count_table);
                    if (!empty($count_table)) {
                        $cou = count($count_table);
                        $y = $count_table[0]['id'];
                    }else{
                        $cou = 0;
                    }
                    
                    // print_r($p_id);
                    $single_for = $this->page_model->edit_foreign_id($foreign_tbl_name, $uid, $p_id);
               ?>
               
    <div class="container">
    <div class="many"> 
<?php for ($j=0; $j < $cou; $j++) { ?>
     <div class="row morew mt-4">
                <?php
                    echo "<p class='col-md-12 mt-4 foreign_title'>".$foreign_table[0]['display_name']."</p>";
                    $i = 0;
                    foreach ($fieldss as $keys => $values) { ?>
<?php
$res = $this->admin_model->get_table_data_by_id($foreign_table[0]['title'], $y);
// print_r($res);
foreach ($res as $ress => $info) {
    // echo '<pre>';
    // print_r($info);
?>
                        <!-- Main loop -->
                        <?php if($values == 'INT'): ?>  
                            
                            <div class="col-md-4 mb-2">
                                <label for="" class="control-label"><p><?php echo $nep[$i] ?> :</p></label>
                                <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> -->
                                <input type="number" class="form-control" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $info[$keys] ?>">
                            </div>
                        <?php elseif($values == 'FLOAT'): ?>  
                            
                            <div class="col-md-4">
                                <label for="" class="control-label"><p><?php echo $nep[$i] ?> :</p></label>
                                <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> -->
                                <input type="number" class="form-control" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $info[$keys] ?>">
                            </div>

                        <?php elseif($values == 'VARCHAR'): ?>  
                            
                            <div class="col-md-4 mb-2">
                                <label for="" class="control-label"><p><?php echo $nep[$i] ?> :</p></label>
                                <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> -->
                                <input type="text" class="form-control" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $info[$keys] ?>">
                            </div>
                        <?php elseif($values == 'TEXT'): ?>

                            <div class="col-md-4 mb-2">
                                <label for="" class="control-label"><p><?php echo $nep[$i] ?></p></label>
                                <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> -->
                                <textarea name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $info[$keys] ?>" class="form-control"></textarea>
                            </div>

                        <?php elseif(strpos($values,'radio') !== FALSE): ?>

                        <div class="col-md-4 mb-2">
                            <label for="" class="control-label"><p><?php echo $nep[$i] ?></p></label>
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> --><br>
                        <?php foreach ($foreign_table_values as $k): ?>
                            
                            <?php if ($values == $k['name'])
                                    { 
                                        $vals = explode('|', $k['vals']);
                                        foreach ($vals as $val) 
                                        { ?>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $val ?>">
                                                <label class="form-check-label form-control-label"><?= $val ?></label>
                                            </div>
                                <?php   }                
                                    } ?>
                            
                        <?php endforeach ?>
                        </div>

                        <?php elseif(strpos($values,'checkbox') !== FALSE): ?>

                            <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
                        <div class="col-md-4 mb-2">
                            <label for="" class="control-label"><p><?php echo $nep[$i] ?></p></label>
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> --><br>
                        <?php foreach ($foreign_table_values as $k): ?>
                            
                            <?php if ($values == $k['name'])
                                    { 
                                        $vals = explode('|', $k['vals']);
                                        foreach ($vals as $val) { 
                                            $t = explode('|_|',$info[$keys]);
                                // print_r($t);die;
                                $checked = in_array($val,$t) ? ' checked="checked"' : '';
                                            ?>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" 
                                                name="<?php echo $keys.'['.$foreign_id.'][checkbox]'; ?>[]" value="<?= $val ?>"<?php echo $checked; ?>>
                                                <label class="form-check-label form-control-label"><?= $val ?></label>
                                            </div>
                            <?php       }
                            ?>

                            <?php   } ?>
                            
                        <?php endforeach ?>
                            </div>

                        <?php elseif(strpos($values,'dropdown') !== FALSE): ?>

                            <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
                        <div class="col-md-4 mb-2">
                            <label for="" class="control-label"><p><?php echo $nep[$i] ?></p></label>
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> --><br>
                        <?php foreach ($foreign_table_values as $k): ?>
                            
                            <?php if ($values == $k['name'])
                                    { 
                                        $vals = explode('|', $k['vals']);
                            ?>
                            <select name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" class="form-control">
                                <option value="<?= $info[$keys] ?>">Select</option>
                            
                            <?php
                                        foreach ($vals as $val) 
                                        { ?>
                                            <!-- <option value="<?= $val ?>"><?= $val ?></option> -->

                                            <option <?php if ($info[$keys] == $val){ ?> selected="selected" <?php }?> value="<?= $val ?>"><?= $val ?></option>
                                            
                            <?php       }
                            ?>
                            </select>
                            <?php   } ?>
                            
                        <?php endforeach ?>
                            </div>

                        <?php endif; 
                //end of Main loop
                        $i++;
                    } } ?>

               <input type="hidden" name="foreign_table[]" value="<?= $foreign_id ?>">
               <input type="hidden" name="foreign_table_id[]" value="<?= $y ?>">
        </div>

    <?php $y++;
 }  ?>
 </div>
       </div>
            <?php } //for every foreign table?>
               
 </div>

        <?php } //check if there is foreign table   ?>

      <?php $tid = $this->uri->segment(3,1);  ?>
      <p class="offset-5">
            <input type="hidden" name="tablename" value="<?= $tid ?>">
            <input type="hidden" name="tableid" value="<?= $uid ?>">
            <input type="hidden" name="p_title" value="<?= $p_title ?>">
            <input type="hidden" name="p_id" value="<?= $p_id ?>">
            <!-- <input class="btn btn-info col-md-2 mt-4 mb-4" type="submit" value="Update"> -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
        सेभ गर्नुहोस</button>
            
        </p>

<!-- Modal starts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Changes ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input class="btn btn-primary" type="submit" value="Update">
      </div>
    </div>
  </div>
</div>

        </form>
  </div>
</div>

<?php } ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>