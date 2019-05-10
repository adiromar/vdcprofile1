<?php 
$user_id = $this->session->userdata('user_id'); 
$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!-- <div class="container-fluid"> -->
<div class="form-show">
	<!-- <div class=""> -->

<?php if($this->session->flashdata('post_created')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';
  endif; ?>

<?php if($this->session->flashdata('post_not_created')):
    echo '<p style="text-align: center" class="alert alert-warning">'.$this->session->flashdata('post_not_created').'</p>';
  endif; ?>

		<?php if (!empty($table_data)){ ?>
            <div class="container pt-5">
			<h4 class='form-heading-title'><?= $table_data[0]['display_name'] ?></h4>
			<h6 class='form-heading-title'><?= $table_data[0]['subtitle'] ?></h6>
            </div>
<?php
            $fields = $table_data[0]['fields']; //echo $fields;
            $types = $table_data[0]['types'];
            $nep = $table_data[0]['nepali_title'];
            $tbl_title = $table_data[0]['title'];

            $fields = str_replace('_', ' ', $fields);
            $fields = explode(',', $fields);
            $types = explode(',', $types);
            $nep = explode(',', $nep);
            // echo '<pre>';
            // print_r($nep);die;
            $fields = array_combine($fields, $types);
            $tbname = $table_data[0]['title'];
			$foreignn = $this->page_model->get_foreigntable_for($tbname);
			$count_for = count($foreignn);
?>
	<form class="form_color" action="<?php echo base_url(); ?>posts/insert" method="post" id="form">

		<!-- ----------------New foreign ---------------------- -->
<?php for ($g=0; $g < $count_for; $g++) { 
if (!empty($foreignn)){ 
    $sec_tbl = $foreignn[$g]['sec_table'];
    // print_r($sec_tbl);die;
    $datas = $this->news_model->get_relation_added_fields($tbname, $sec_tbl);
    $break = $datas[$g];

    foreach ($break as $val => $v) {
        $t = explode(',', $v);
        $rel = explode(',', $break['field']);
    // print_r($v);
    $ox = array($v);
    // print_r($t);die;
?>
<div class="container">
<div class="row first-form mt-5">
    <div class="col-md-12 fieldset mb-4">
        <h5>जिल्लाको विवरण</h5>
    </div>
    
  <div class="col-md-3 col-sm-4">
    <label>जिल्लाको नाम</label>
     <select class="form-control" id="dis_name" name="district" required>
      <option value="">Select</option>
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
    <option value="">Select</option>
    <?php foreach ($forn as $name) { ?>
        <option data-group="<?= $name['id'] ?>"><?= $name['district_code'] ?></option>
    <?php } ?>
</select>
</div>

<?php } if (strpos($v, 'local_unit') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit">
<label>गाउँपालिकाको नाम</label>
<select class="form-control" id="unit" name="local_unit">
    <option value="">Select</option>
    <?php foreach ($unit as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['local_unit'] ?>"><?= $name['local_unit'] ?></option>
    <?php } ?>
</select>
</div>

<?php } if (strpos($v, 'unit_code') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit">
<label>गाउँपालिकाको कोड</label>
<select class="form-control" id="unit" name="unit_code">
    <option value="">Select</option>
    <?php foreach ($unit as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['unit_code'] ?>"><?= $name['unit_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'tole_code') !== False){?>

<div class="col-md-3 col-sm-4 all_unit">
<label>टोलको कोड</label>
<select class="form-control" name="toles" id="tole_codee">
    <option value="">Select</option>
    <?php foreach ($tole as $names) { ?>
        <option data-group="<?= $names['dis_table_id'] ?>" value="<?= $names['tole_code'] ?>"><?= $names['tole_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'jaladhar_code') !== False){ ?>

<div class="col-md-3 col-sm-4 all_unit mt-3">
<label>जलाधार क्षेत्रको कोड</label>
<select class="form-control" name="jaladhar_code" id="jala">
    <option value="">Select</option>
    <?php foreach ($jala as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['jaladhar_code'] ?>"><?= $name['jaladhar_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } if (strpos($v, 'upa_jaladhar_code') !== False){?>

<div class="col-md-3 col-sm-4 all_unit mt-3">
<label>उप-जलाधार क्षेत्रको कोड</label>
<select class="form-control" name="upa_jaladhar_code" id="sub_jala">
    <option value="">Select</option>
    <?php foreach ($upa_jala as $name) { ?>
        <option data-group="<?= $name['dis_table_id'] ?>" value="<?= $name['upa_jaladhar_code'] ?>"><?= $name['upa_jaladhar_code'] ?></option>
    <?php } ?>
</select>
</div>
<?php } ?>


</div>
</div>
<?php } } } ?>
<!-- ------------New Foreign Ends Here------------------------- -->
	
	<div class="container mt-4">
		<div class="row first-form">
			<?php
            $i = 0;
            foreach ($fields as $key => $value)
                // print_r($value);die;
            { ?>
            <!-- Main loop -->
            <?php if($value == 'legend'): ?> 
                <div class="col-md-12 fieldset">
                    <h5><?= ucfirst($key) ?></h5>
                </div>
            <!-- </div> -->
            <?php elseif($value == 'INT'): ?>
                <div class="ml-2 mr-4 mt-2 input_size">
                    <label class="control-label fsize"><?php echo $nep[$i] ?> :
                    <label for="" style="display:none;" class="control-label"><?= ucfirst($key) ?></label>
                    <input type="number" class="form-control fsize" name="<?= $key ?>">
                </div>
            <?php elseif($value == 'DATE'): ?>
                <div class="ml-2 mr-4 mt-2 input_size">
                    <label class="control-label fsize"><?php echo $nep[$i] ?> :
                    
                    <input type="date" class="form-control fsize" name="<?= $key ?>">
                </div>
            <?php elseif($value == 'VARCHAR'): ?>

                <div class="ml-2 mr-4 mt-2 input_size">
                    <label for="" class="control-label fsize"><?php echo $nep[$i] ?> :
                    <label for="" style="display:none;" class="control-label"><b><?= ucfirst($key) ?>:</b></label>
                    <input type="text" class="form-control fsize" name="<?= $key ?>" style="width: 265px;">
                </div>
            <?php elseif($value == 'TEXT'): ?>

                <div class="col-md-12 col-sm-6 mt-4">
                    <label for="" class="control-label fsize"><?php echo $nep[$i] ?> :
                    <label for="" style="display:none;" class="control-label"><b><?= ucfirst($key) ?>:</b></label>
                    <textarea name="<?php echo $key; ?>" class="form-control fsize" cols="50" rows="3"></textarea>
                </div>

            <?php elseif(strpos($value,'radio') !== FALSE): ?>

                <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
            <div class="ml-2 mr-4 mt-2 dotted_border">
                <label for="" class="control-label fsize"><?php echo $nep[$i] ?>:
                <label for="" style="display:none;" class="control-label"><b><?= ucfirst($key) ?>:</b></label><br>
            <?php foreach ($table_values as $k): ?>

                <?php if ($value == $k['name'])
                        {
                            $vals = explode('|', $k['vals']);
                            foreach ($vals as $val)
                            { ?>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-control-label fsize" value="<?= $val ?>"><?= $val ?> <input class="form-check-input" type="radio" name="<?= $key ?>" value="<?= $val ?>">
                                    </label>
                                </div>
                <?php       }
                ?>

                <?php   } ?>

            <?php endforeach ?>
                </div>

            <?php elseif(strpos($value,'checkbox') !== FALSE): ?>

                <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
            <div class="ml-2 mr-4 mt-2 dotted_border">
                <label for="" class="control-label fsize"><?php echo $nep[$i] ?> :
                <br>
            <?php foreach ($table_values as $k): ?>

                <?php if ($value == $k['name'])
                        {
                            $vals = explode('|', $k['vals']);
                            foreach ($vals as $val)
                            { ?>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-control-label fsize" name="<?= $key ?>"><?= $val ?> <input class="form-check-input" type="checkbox"
                                    name="<?php echo $key.'[checkbox]'; ?>[]" value="<?= $val ?>">
                                    </label>
                                </div>
                <?php       }
                ?>

                <?php   } ?>

            <?php endforeach ?>
                </div>

            <?php elseif(strpos($value,'dropdown') !== FALSE): ?>

            <div class="ml-2 mr-4 mt-2 input_size">
                <label for="" class="control-label fsize"><?php echo $nep[$i] ?> :
                <label for="" style="display:none;" class="control-label"><b><?= ucfirst($key) ?>:</b></label><br>
            <?php foreach ($table_values as $k): ?>

                <?php if ($value == $k['name'])
                        {
                            $vals = explode('|', $k['vals']);
                ?>
                <select name="<?= $key ?>" class="form-control" style="width:265px;">
                    <option value="">Select</option>

                <?php
                            foreach ($vals as $val)
                            { ?>
                                <option value="<?= $val ?>"><?= $val ?></option>

                <?php       }
                ?>
                </select>
                <?php   } ?>

            <?php endforeach ?>
                </div>

            <?php endif; $i++; ?>


            <!-- end of Main loop -->
            <?php } ?>
		</div>
	</div>

<!-- Multiple input form part starts here -->
            <?php
            $u = 1;
            $a = 1;
            $tbname = $table_data[0]['title'];
            $foreign = $this->page_model->get_foreigntable_mul($tbname);
            // $for = $foreign[0]['secid_table'];
            // echo '<pre>';
            // print_r($foreign[0]['sec_table']);die;
            if (!empty($foreign))
            {
            $form_type = $foreign[0]['form_type'];
            // echo $form_type;die;
            if ($form_type == "multiple_form"){
            
                foreach ($foreign as $key)
                { ?>
            <div class="container">
                <div class="many">
            <div class="row more<?php echo $u; ?> mt-4 multiple_form first-form">
                <?php    $sectable = $key['sec_table'];

                    $secid = $key['sec_key'];

                    $foreign_table = $this->page_model->get_table_by_id($secid);
                    $foreign_table_values = $this->page_model->get_table_values_by_id($secid);

                    echo "<h4 class='col-md-12 form-heading-title'>".$foreign_table[0]['display_name']."</h4>";

                    $foreign_id = $foreign_table[0]['id'];
                    $foreign_tbl_name = $foreign_table[0]['title'];

                    $fields = $foreign_table[0]['fields'];
                    $types = $foreign_table[0]['types'];
                    $fr = $foreign_table[0]['id'];
                    $nep = $foreign_table[0]['nepali_title'];

                    $fields = str_replace('_', ' ', $fields);
                    $fields = explode(',', $fields);
                    $types = explode(',', $types);

                    $nep = explode(',', $nep);
                    // echo '<pre>';
                    // print_r($nep);die;
                    $fieldss = array_combine($fields, $types);
                    // echo "<pre>";
                    // print_r($table_values);
                    $i = 0;
                    foreach ($fieldss as $keys => $values) { ?>

                <!-- Main loop -->
                <?php if($values == 'legend'): ?> 
                <!-- <div class="col-md-12 legend-border pl-0"> -->
                <div class="col-md-12 fieldset">
                    <h5><?= ucfirst($keys) ?></h5>
                </div>
                <!-- </div> -->

                        <?php elseif($values === 'INT'): ?>
                            <div class="ml-2 mr-4 mt-2 input_size">
                                <label for="" class="control-label fsize"><?php echo $nep[$i] ?> :
                                <input type="number" class="form-control fsize" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]">
                            </div>

                        <?php elseif($values == 'VARCHAR'): ?>

                            <div class="ml-2 mr-4 mt-2 input_size">
                                <label for="" class="control-label"><?php echo $nep[$i] ?> :
                                <input type="text" class="form-control" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]">
                            </div>
                        <?php elseif($values == 'TEXT'): ?>

                            <div class="col-md-12" style="border: 1px solid grey;">
                                <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label> -->
                                <label for="" class="control-label"><?php echo $nep[$i] ?> :
                                <textarea name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" class="form-control"></textarea>
                            </div>

                        <?php elseif(strpos($values,'radio') !== FALSE): ?>

                        <div class="ml-2 mr-4 mt-2 dotted_border">
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label><br> -->
                            <label for="" class="control-label"><?php echo $nep[$i] ?> :<br>
                        <?php foreach ($foreign_table_values as $k): ?>

                            <?php if ($values == $k['name'])
                                    {
                                        $vals = explode('|', $k['vals']);
                                        foreach ($vals as $val)
                                        { ?>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label form-control-label"><?= $val ?> <input class="form-check-input" type="radio" name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" value="<?= $val ?>">
                                                </label>
                                            </div>
                                <?php   }
                                    } ?>

                        <?php endforeach ?>
                        </div>

                        <?php elseif(strpos($values,'checkbox') !== FALSE): ?>

                            <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
                        <div class="ml-2 mr-4 mt-2 dotted_border">
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label><br> -->
                            <label for="" class="control-label"><?php echo $nep[$i] ?> :<br>
                        <?php foreach ($foreign_table_values as $k): ?>

                            <?php if ($values == $k['name'])
                                    {
                                        $vals = explode('|', $k['vals']);
                                        foreach ($vals as $val)
                                        { ?>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label form-control-label"><?= $val ?> <input class="form-check-input" type="checkbox"
                                                name="<?php echo $keys.'['.$foreign_id.'][checkbox]'; ?>[]" value="<?= $val ?>">
                                                </label>
                                            </div>
                            <?php       }
                            ?>

                            <?php   } ?>

                        <?php endforeach ?>
                            </div>

                        <?php elseif(strpos($values,'dropdown') !== FALSE): ?>

                            <!-- <?php echo "<pre>"; print_r($table_values); ?>  -->
                        <div class="ml-2 mr-4 mt-2 input_size">
                            <!-- <label for="" class="control-label"><?= ucfirst($keys) ?>:</label><br> -->
                            <label for="" class="control-label"><?php echo $nep[$i] ?> :<br>
                        <?php foreach ($foreign_table_values as $k): ?>

                            <?php if ($values == $k['name'])
                                    {
                                        $vals = explode('|', $k['vals']);
                            ?>
                            <select name="<?php echo $keys.'['.$foreign_id.']'; ?>[]" class="form-control" style="width: 265px;">
                                <option value="">Select</option>

                            <?php
                                        foreach ($vals as $val)
                                        { ?>
                                            <option value="<?= $val ?>"><?= $val ?></option>

                            <?php       }
                            ?>
                            </select>
                            <?php   } ?>

                        <?php endforeach ?>
                            </div>

                        <?php endif; $i++;
                //end of Main loop

                    } ?>
    <?php
    $query = $this->page_model->get_frn_id();

        foreach ($query as $r) {
           $fid = $r['table_id'];
           //echo $fid;echo $fr;
           if($fr == $fid){

?>
                <!-- <a href="#" style="height: 38px; position:absolute;right:70px;" class='removeempsection<?php echo $a;?> btn btn-danger rt'>-</a> -->
<?php } } ?>
               <input type="hidden" name="foreign_table[]" value="<?= $foreign_id ?>">
               
            </div>
            <div class="append_multiple<?php echo $u; ?>"></div>
        </div>
 <?php
    $query = $this->page_model->get_frn_id();

        foreach ($query as $r) {
           $fid = $r['table_id'];
           //echo $fid;echo $fr;
           if($fr == $fid){

?>
<p align="right" class="mt-2 mr-3 mul_add" style=""><a href="#" class='addempsection<?php echo $a;?> btn btn-success rt'>+</a></p>
<!-- <p class="mt-2 mr-3 mul_add" style="float: right;"><a href="#" class='addempsection btn btn-success rt'>+</a></p> -->
<?php $a++;$u++; } } ?>
</div>
            <?php } //for every foreign table
                }
            } //check if there is foreign table
            ?>

            <?php $tid = $this->uri->segment(3,1);  ?>
            <input type="hidden" name="tablename" value="<?= $tid ?>">
            <input type="hidden" name="tabletitle" value="<?= $tbl_title ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">
            <input type="hidden" name="str" value="<?= $str ?>">
            <div class="offset-5 col-md-7 mt-4 mb-5">
            <!-- <input class="btn btn-info btn-sm" type="submit" value="सेभ गर्नुहोस"> -->
            <input class="btn btn-danger btn-sm" type="reset" value="रद गर्नुहोस" id="reset">

            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
        सेभ गर्नुहोस</button>


        <!-- Modal starts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Save Changes ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to save.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input class="btn btn-primary" type="submit" value="Save">
      </div>
    </div>
  </div>
</div>

<!-- modal ends here -->
        </div>
        </form>
        <!--End Form Here-->

		<?php }else{
			echo "<p class='ml-5 mt-5'>Form Does Not Exists</p>";
		} // table_data ends?>
	<!-- </div> -->
</div>
<!-- </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

 var a = 1;             
var o = '.more1';
var lid = '.addempsection1';

  $(lid).click(function(){
    
  var delbtn = '.removeempsection1';
  var row = '.row' + l;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more1:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
  // var del = $('.more1:lastchild');
    $(temp).appendTo('.append_multiple1');
    // console.log(temp);
    $(delbtn).click(function(){
      $(del).remove();
      temp.removeChild(temp.lastChild);
      l = l-1;
      
    });
    a = a +1;
    $("body, more1").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });

  var o = '.more2';
var lid = '.addempsection2';
var l = 1;
  $(lid).click(function(){
    
  var delbtn = '.removeempsection2';
  var row = temp;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more2:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
    $(temp).appendTo('.append_multiple2');
    console.log(temp);
    $(delbtn).click(function(){
      $(row).remove();
      l = l-1;
      
    });
    a = a +1;
    $("body, more2").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });

  var o = '.more3';
var lid = '.addempsection3';
var l = 1;
  $(lid).click(function(){
    
  var delbtn = '.removeempsection3';
  var row = temp;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more3:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
    $(temp).appendTo('.append_multiple3');
    console.log(temp);
    $(delbtn).click(function(){
      $(row).remove();
      l = l-1;
      
    });
    a = a +1;
    $("body, more3").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });

    var o = '.more4';
var lid = '.addempsection4';
var l = 1;
  $(lid).click(function(){
    
  var delbtn = '.removeempsection4';
  var row = temp;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more4:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
    $(temp).appendTo('.append_multiple4');
    console.log(temp);
    $(delbtn).click(function(){
      $(row).remove();
      l = l-1;
      
    });
    a = a +1;
    $("body, more4").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });

  var o = '.more5';
var lid = '.addempsection5';
var l = 1;
  $(lid).click(function(){
    
  var delbtn = '.removeempsection5';
  var row = temp;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more5:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
    $(temp).appendTo('.append_multiple5');
    console.log(temp);
    $(delbtn).click(function(){
      $(row).remove();
      l = l-1;
      
    });
    a = a +1;
    $("body, more5").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });

  var o = '.more6';
var lid = '.addempsection6';
var l = 1;
  $(lid).click(function(){
    
  var delbtn = '.removeempsection6';
  var row = temp;
  var inp = "#inputt" + o;
  // alert(inp);
  var temp = $('.more6:first').clone().find('input[type=text], input[type=number], input[type=dropdown],input[type=checkbox]').val("").end();
    $(temp).appendTo('.append_multiple6');
    console.log(temp);
    $(delbtn).click(function(){
      $(row).remove();
      l = l-1;
      
    });
    a = a +1;
    $("body, more6").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  });



 $(document).ready(function(){
$("#reset").click(function(){
/* Single line Reset function executes on click of Reset Button */
$("#form")[0].reset();
});});

  $("#district").on('change', function(e){
    // alert("changed");
      var district = $("#district").find('option:selected').val(); 
      $("#option-container").children().appendTo("#rm");
            $("#rm").children().removeAttr('disabled');
      var selectSeason = $("#rm").children("[data-group!='"+district+"']"); 
            $(selectSeason).attr('disabled','disabled');
            $("#rm").val($("#rm optgroup[data-group='"+ district +"'] option:eq(0)").val());
      selectSeason.appendTo("#option-container");
            $("#rm").removeAttr("disabled"); 
            });


    $("#dis_name").on('change', function(e){
    // alert("changed");
      var districtt = $("#dis_name").find('option:selected').val(); 
      $("#option-container").children().appendTo("#rmt");
            $("#rmt").children().removeAttr('disabled');
      var selectSeasons = $("#rmt").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            $("#rmt").val($("#rmt optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#rmt").removeAttr("disabled"); 

        $("#option-container").children().appendTo("#unit");
            $("#unit").children().removeAttr('disabled');
      var selectSeasons = $("#unit").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            $("#unit").val($("#unit optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#unit").removeAttr("disabled"); 

    $("#option-container").children().appendTo("#tole_codee");
            $("#tole_codee").children().removeAttr('disabled');
      var selectSeasons = $("#tole_codee").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            // $(selectSeasons).html('Code Not Found');
            $("#tole_codee").val($("#tole_codee optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#tole_codee").removeAttr("disabled"); 

    $("#option-container").children().appendTo("#jala");
            $("#jala").children().removeAttr('disabled');
      var selectSeasons = $("#jala").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            // $(selectSeasons).html('Code Not Found');
            $("#jala").val($("#jala optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#jala").removeAttr("disabled"); 

    $("#option-container").children().appendTo("#sub_jala");
            $("#sub_jala").children().removeAttr('disabled');
      var selectSeasons = $("#sub_jala").children("[data-group!='"+districtt+"']"); 
            $(selectSeasons).attr('disabled','disabled');
            // $(selectSeasons).html('Code Not Found');
            $("#sub_jala").val($("#sub_jala optgroup[data-group='"+ districtt +"'] option:eq(0)").val());
      selectSeasons.appendTo("#option-container");
            $("#sub_jala").removeAttr("disabled"); 

            // removing disabled for child
            if( !$('#dis_name').val() ) { 
                $("#rmt").children().removeAttr('disabled');
                $("#unit").children().removeAttr('disabled');
                $("#tole_codee").children().removeAttr('disabled');
                $("#jala").children().removeAttr('disabled');
                $("#sub_jala").children().removeAttr('disabled');
            }

            });
</script>