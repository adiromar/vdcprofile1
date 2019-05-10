<?php
$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$str = explode("/", $str, 6);
$sec = $str[5];
$data = $this->admin_model->get_table_by_id($sec);
$required = '';
if ( $data[0]['require_or_not'] != NULL ) {
  $required = explode('|or|', $data[0]['require_or_not']);
}

// echo '<pre>';
// print_r($data);

$display = ucfirst($data[0]['display_name']);
?>
<main class="app-content">
  <?php //echo "<pre>";
  // print_r($data[0]);
// print_r($required); ?>
  <div class="app-title">
    <h1><i class="fa fa-eye"></i> <?= $title ?></h1>
    <!-- <p>Set your Form name and Fields:</p> -->
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <h4>Form Edit - <?= $display ?> </h4><hr>
          <form method="post" action="<?= base_url() ?>admins/update_form_questions" enctype="multipart/form-data">

            <div class="form-inline">
              <label class="control-label col-md-2"><strong>Database Form Name:</strong></label>
              <input type="text" class="form-control col-md-3" name="title" value="<?= $data[0]['title'] ?>" readonly>
              <label for="display_name" class="control-label col-md-2"><strong>Display Name:</strong></label>
              <input type="text" name="display_name" class="form-control col-md-3" placeholder="Form Display Name" required>
              <label for="" class="control-label col-md-3 offset-1 mt-4">Description:</label>
              <input type="text" name="subtitle" class="form-control col-md-6 mt-4" value="<?= $data[0]['subtitle'] ?>" >
            </div>
            <?php
            $fields = $data[0]['fields'];
            $types = $data[0]['types'];
            $nepali_title = $data[0]['nepali_title'];
            $fields1 = explode(',', $fields);
            $types = explode(',', $types);
            $nep = explode(', ', $nepali_title);

            $fields = array_combine($fields1, $types);
            // echo "<pre>";
            // print_r($fields1);
            $names = array();
            $vals = array();
            $titles = array();
            foreach ($fields as $key => $value) {
              if ($value == 'legend') {
                $temp = $key;
              }else{
                $names[$temp][] = $key;
                $vals[$temp][] = $value;
              }
            }
            $newtitlefields = array_combine($fields1,$nep);

            $titles = array();
            foreach ($newtitlefields as $newkey => $newvalue) {
              if ($newvalue == 'legend') {
                $tmp = $newkey;
              }else{
                $titles[$tmp][] = $newvalue;
              }
            }

            $newrequirefields = array_combine($fields1,$required);
            $requirements = array();

            $required = array();
            foreach ($newrequirefields as $reqkey => $reqvalue) {
              if ($reqvalue == 'legend') {
                $tmps = $reqkey;
              }else{
                $required[$tmps][] = $reqvalue;
              }
            }
            //Main loop
            $m = 0;
            foreach ($names as $nk => $nv) { ?>
<div class="section-wrapper" data-counter="<?= $m ?>" style="background-color: #f2ecec; margin: 20px 0px; padding:12px 0px;">

              <div class="form-inline">
                <label class="control-label col-md-4 mt-3"><strong>Legend:</strong></label>
              <input type="text" name="fields[<?= $m ?>][]" value="<?= str_replace('_', ' ', $nk) ?>" class="form-control col-md-5 mt-3" >
              <input type="hidden" class="form-control col-md-2" name="types[<?= $m ?>][]" value="legend">
              <input type="hidden" name="requirements[<?= $m ?>][]" value="legend">
              <input type="hidden" name="nepali_title[<?= $m ?>][]" value="legend">
              <input type="hidden" name="order[<?= $m ?>][]" value="0">
              </div>
              <br>
              <!-- Buttons -->
              <div class="row pl-3">
                <div class="col-md-2">
                  <strong>Add More Fields:</strong>
                </div>
        				<div class="col-md-10">
        					<button class="btn btn-success btn-sm input-button">+ Text</button>
        					<button class="btn btn-success btn-sm number-button">+ Number</button>
        					<button class="btn btn-success btn-sm decimal-button">+ Decimal</button>
        					<button class="btn btn-success btn-sm textarea-button">+ Text Area</button>
        					<button class="btn btn-success btn-sm date-button">+ Date</button>
        					<button class="btn btn-success btn-sm signature-button">+ Signature</button><br>
        					<button class="btn btn-success btn-sm mt-1 radio-button">+ Single Selection</button>
        					<button class="btn btn-success btn-sm mt-1 checkbox-button">+ Multiple Selection</button>
        					<button class="btn btn-success btn-sm mt-1 dropdown-button">+ Dropdown</button>
        					<button class="btn btn-success btn-sm mt-1 upload-button">+ Photo/File</button>
        					<button class="btn btn-success btn-sm mt-1 gps-button">+ GPS</button>
        					<button class="btn btn-success btn-sm mt-1 qr-button">+ QR Code</button>
        				</div>
        			</div>
              <br>
              <?php
              $datas = array_combine( $nv, $vals[$nk] );
              $c = 0;
              $cc = 1;              // echo "<pre>";
              // print_r($datas);
              foreach ($datas as $dk => $dv) {
                $checkrequired = 1;
                if (is_array($required)) {
                    $checkrequired = $required[$nk][$c];
                }
                 ?>

                  <div class="form-inline pb-2 pt-2">
                    <label class="control-label col-md-2">Field Name:</label>
                    <input type="text" class="form-control col-md-2" name="fields[<?= $m ?>][]" value="<?= $dk ?>" readonly="readonly">
                    <label class="control-label col-md-1">Display Name:</label>
                    <input type="text" class="form-control col-md-4" name="nepali_title[<?= $m ?>][]" value="<?= $titles[$nk][$c] ?>">
                    <select name="requirements[<?= $m ?>][]" class="col-md-2 ml-1 form-control">
                      <?php if ($checkrequired == 1) { ?>
                              <option value="a_1">Optional</option>
                              <option value="a_2">Mandatory</option>
                      <?php }elseif( $checkrequired == 2 ){ ?>
                              <option value="a_2">Mandatory</option>
                              <option value="a_1">Optional</option>
                      <?php } ?>
                    </select><br>
                    <label class="col-md-1 offset-2">Order:</label>
                    <input type="number" class="col-md-1 form-control" min="1" name="order[<?= $m ?>][]" value="<?= $cc ?>">
                    <?php if (strpos($dv, 'radio') !== FALSE) : ?>
                      <label class='control-label col-md-2'>Single Selection Values:</label>
                    <?php elseif ( strpos($dv, 'checkbox') !== FALSE ): ?>
                      <label class='control-label col-md-2'>Multiple Selection Values:</label>
                    <?php elseif ( strpos($dv, 'dropdown') !== FALSE ): ?>
                      <label class='control-label col-md-2'>Dropdown Values:</label>
                    <?php else: ?>
                      <label class="control-label col-md-2">Type:</label>
                    <?php endif; ?>

                    <?php if ( $dv == 'VARCHAR' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="VARCHAR">Text</option>
                      <option value="INT">Number</option>
                      <option value="Decimal">Decimal</option>
                      <option value="TEXT">Text Area</option>
                      <option value="DATE">Date</option>
                      <option value="signature">Signature</option>
                    </select>
                    <?php elseif ( $dv == 'INT' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="INT">Number</option>
                      <option value="Decimal">Decimal</option>
                      <option value="VARCHAR">Text</option>
                      <option value="TEXT">Text Area</option>
                      <option value="DATE">Date</option>
                      <option value="signature">Signature</option>
                    </select>
                    <?php elseif ( $dv == 'TEXT' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="TEXT">Text Area</option>
                      <option value="VARCHAR">Text</option>
                      <option value="INT">Number</option>
                      <option value="Decimal">Decimal</option>
                      <option value="DATE">Date</option>
                      <option value="signature">Signature</option>
                    </select>
                    <?php elseif ( $dv == 'DATE' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="DATE">Date</option>
                      <option value="TEXT">Text Area</option>
                      <option value="VARCHAR">Text</option>
                      <option value="INT">Number</option>
                      <option value="Decimal">Decimal</option>
                      <option value="signature">Signature</option>
                    </select>
                    <?php elseif ( $dv == 'Decimal' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="Decimal">Decimal</option>
                      <option value="DATE">Date</option>
                      <option value="TEXT">Text Area</option>
                      <option value="VARCHAR">Text</option>
                      <option value="INT">Number</option>
                      <option value="signature">Signature</option>
                    </select>
                    <?php elseif ( $dv == 'signature' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="signature">Signature</option>
                      <option value="Decimal">Decimal</option>
                      <option value="DATE">Date</option>
                      <option value="TEXT">Text Area</option>
                      <option value="VARCHAR">Text</option>
                      <option value="INT">Number</option>
                    </select>
                    <?php elseif ( $dv == 'file' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="file">Photo/File</option>
                    </select>
                    <?php elseif ( $dv == 'gps' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="gps">GPS</option>
                    </select>
                    <?php elseif ( $dv == 'qrcode' ) : ?>
                    <select type="text" name="types[<?= $m ?>][]" class="form-control col-md-2">
                      <option value="qrcode">QR Code</option>
                    </select>
                    <!-- RADIO -->
                    <?php elseif (strpos($dv, 'radio') !== FALSE) : ?>
                      <input type="hidden" name="types[<?= $m ?>][]" value="<?= $dv ?>">
                      <?php
                      $res = $this->page_model->get_values_by_name($dv, $sec);
                      $val1 = $res[0]['name']; ?>
                      <button class="btn btn-sm btn-info radio-plus" data-radio="<?= $val1 ?>" >+</button>
                      <button class="btn btn-sm btn-warning ml-3 radio-minus" data-radio="<?= $val1 ?>">-</button>
                      <?php
                      $res = $res[0]['vals'];
                      $res = explode('|', $res);
                      echo "<div class='col-md-3 radio-wrapper_".$val1."''>";
                      foreach ($res as $rest => $re) { ?>
                      <input type='text' class='form-control' name="values[<?= $val1 ?>][]" value="<?= $re ?>">
                      <?php } ?>
                      </div>
                    <?php elseif (strpos($dv, 'checkbox') !== FALSE) : ?>
                      <input type="hidden" name="types[<?= $m ?>][]" value="<?= $dv ?>">
                      <?php
                      $res = $this->page_model->get_values_by_name($dv, $sec);
                      $val1 = $res[0]['name']; ?>
                      <button class="btn btn-sm btn-info checkbox-plus" data-checkbox="<?= $val1 ?>" >+</button>
                      <button class="btn btn-sm btn-warning ml-3 checkbox-minus" data-checkbox="<?= $val1 ?>">-</button>
                      <?php
                      $res = $res[0]['vals'];
                      $res = explode('|', $res);
                      echo "<div class='col-md-3 checkbox-wrapper_".$val1."'>";
                      foreach ($res as $rest => $re) { ?>
                      <input type='text' class='form-control' name="values[<?= $val1 ?>][]" value="<?= $re ?>">
                      <?php } ?>
                      </div>
                    <?php elseif (strpos($dv, 'dropdown') !== FALSE) : ?>
                      <input type="hidden" name="types[<?= $m ?>][]" value="<?= $dv ?>">
                      <?php
                      $res = $this->page_model->get_values_by_name($dv, $sec);
                      $val1 = $res[0]['name']; ?>
                      <button class="btn btn-sm btn-info dropdown-plus" data-dropdown="<?= $val1 ?>" >+</button>
                      <button class="btn btn-sm btn-warning ml-3 dropdown-minus" data-dropdown="<?= $val1 ?>">-</button>
                      <?php
                      $res = $res[0]['vals'];
                      $res = explode('|', $res);
                      echo "<div class='col-md-3 dropdown-wrapper_".$val1."'>";
                      foreach ($res as $rest => $re) { ?>
                      <input type='text' class='form-control' name="values[<?= $val1 ?>][]" value="<?= $re ?>">
                      <?php } ?>
                      </div>
                    <?php endif; ?>
                    </select>

                  </div>
              <?php

             $c++; $cc++; }
              ?>

</div>
            <?php  $m++;   }//Main loop


            ?>

            <input type="hidden" name="table_id" value="<?= $sec ?>">
            <hr>

            <div class="row">
              <div class="col-md-12 pt-3 pb-2" id="newfields_add">
              </div>
            </div>
            <hr>
            <!-- //Add New Questions -->
            <div class="col-md-12 pb-4" id="fieldsds1" >

            </div>
            <input type="button" class="btn btn-info btn-sm mb-3" id="showmee_edit" style="float: right;" value="+ Another Question">
            <input class="btn btn-success btn-block mt-4" type="submit" name="update" value="Update">
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
