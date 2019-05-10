<?php
$user_id=$this->session->userdata('user_id');
$info = $this->user_model->get_user_type($user_id);
$user_type = $info[0]['user_type'];
$dis = $info[0]['district'];
$all = $this->user_model->get_all_district_user($dis);
$items = array();
foreach ($all as $key => $value) {
$items[] = $value['user_id'];
}
$no = count($items);
?>
<!-- Sidebar -->

 <style type="text/css">
      .eye-view{
      color: #cb8888;
      font-size: 22px;
      }
      .eye-view:hover {
      color: #009688;
      }
      .heading{
      color: #fff;
      }
      #filter_by_users select{
      color: #ffffff;
      background-color: #6b6c6a;
      }
      .sel_col option{color: #121213;background: yellowgreen;}
  </style>

<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
  <div class="container-fluid">
    <main class="app-content">
      <div class="app-title mt-4">
    
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url() ?>pages/view_records">View Records</a></li>
            <li class="breadcrumb-item"><?= $title?></li>
          </ul>
        </div>

     
      <?php if($this->session->flashdata('post_updated')):
      echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';
      endif; ?>
      <?php if($this->session->flashdata('post_deleted')):
      echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>';
      endif; ?>

      <div class="row">
        <div class="col-md-12">
          <div class="tile_front">
            <div class="tile-body mt-4">
              <?php
              $tables = $this->admin_model->get_tables();
              foreach ($tables as $key)
              {
              $qid = $key['id'];
              //echo "Id is " . $qid;
              $fields = explode(',',$key['fields']);
              $titles = explode(',',$key['nepali_title']);
              $row = $this->admin_model->check_relation($qid);
              if ($key['title'] == $form_name){
              
              if($row === 0) //If it is not foreign table
              {
              
              echo "<div class='float-left'><h4 style='color: green; text-transform: capitalize;'>".$key['display_name']."</h4></div>";

              if ($user_type == 'Admin' || $user_type == 'SuperAdmin'){ ?>
                <div class="float-right col-md-6">
                <span id="loading" style="display: none;">loading ...</span>  
                <span id="tot_rec"></span>
              <div class="float-right">
                <form id="filter_by_users" method="post">
                  <select id="filter_by_user" class="form-control sel_col" onchange="myFunction()">
                    <option value="" disabled>Filter By User</option>
                    <option value="all">All</option>
                    <?php foreach ($user_list as $ulist => $uval) {
                    echo '<option value="'.$uval['user_id'].'">'.$uval['user_name'].'</option>';
                    } ?>
                  </select>
                </form>
              </div></div>
              <?php } ?>
              <input type="hidden" id="form_name" name="form_name" value="<?= $form_name ?>">
              <table class="table table-bordered table-responsive table-striped">
                <thead>
                  <tr style="background: #4ba8af;">
                    
                    <th class="heading">क्र.स.</th>
                    <?php foreach($titles as $k => $v){
                    // print_r($v);
                    $result = substr($v, 0, 5);
                    $leg = array("legend");
                    $parts = explode(' ', $v);
                    $pos = in_array('legend', $parts);
                    ?>
                    <?php
                    if ($pos != true){
                    unset($titles[$k]);
                    
                    ?><th class="heading"><?= $v; ?></th>
                    <?php } } ?>
                    <?php
                    $added_title = $this->admin_model->get_added_title($key['title']);
                    $added_nepali_title = $this->admin_model->get_relation_nepali_title($key['title']);
                    // print_r($added_nepali_title[0]['nepali']);
                    $sec_tbl = $this->admin_model->get_sec_tbl($key['title']);
                    // print_r($sec_tbl[0]->sec_table);die;
                    if (!empty($added_title)){
                    // $add_title = $added_title[0]->field;
                    $add_title = $added_nepali_title[0]['nepali'];
                    $add_title = explode(',', $add_title);
                    // print_r($add_title);
                    //$res = explode(',', $add_title);
                    //     $sho = $this->admin_model->get_table_by_title($sec_tbl[0]->sec_table);
                    // $f = $sho[0]['fields'];
                    // $n = $sho[0]['nepali_title'];
                    // $f = explode(',', $f);
                    // $n = explode(',', $n);
                    // $arr_com = array_combine($f, $n);
                    // print_r($arr_com);
                    // foreach ($res as $a) {
                    // foreach ($add_title1 as $key => $val) {
                    foreach ($add_title as $add) {
                    
                    ?>
                    <th class="heading"><?php
                      // foreach ($arr_com as $f => $n){
                      //                     if ($a == $f){
                      //                         echo $n;
                      //                     }
                      //                 }
                      echo $add;
                      
                    // echo $a ?></th>
                    <?php } } ?>
                    <?php
                    //Get foreign table using primary table name
                    $fk = $this->admin_model->get_foreign_table_of_primary_table_mul($key['title']);
                    if(!empty($fk)){
                    echo "<th class='heading'>Multi Data</th>";
                    }
                    foreach ($fk as $sm) {
                    $pk = $sm['sec_key'];
                    // print_r($pk);
                    $foreign_tables = $this->admin_model->get_table_by_id($pk);
                    //foreach ($foreign_tables as $keyssss) {
                    
                    //$f_fields = explode(',',$keyssss['fields']);
                    //foreach($f_fields as $ssk){ ?>
                    <!-- <th><?php echo $ssk; ?></th> -->
                    <?php //}
                    //}
                    }
                    ?>
                    <th class="heading">Inserted By</th>
                    <th class="heading">Duration</th>
                    <th class="heading">View/Edit</th>
                  </tr>
                </thead>
                <tbody id="filter_records">
                  
                  <?php
                  $dat = $this->admin_model->get_table_by_title($key['title']);
                  // print_r($dat[0]['id']);
                  if ($user_type == 'User'){
                  $dataqs = $this->admin_model->get_table_data_by_user($key['title'], $user_id);
                  }
                  if ($user_type == 'District Admin'){
                  $dataqs = $this->admin_model->get_table_data_by_distrct_admin($key['title'], $items);
                  }
                  if ($user_type == 'SuperAdmin' || $user_type == 'Admin'){
                  // $dataqs = $this->admin_model->get_table_data_by_admin($key['title']);
                  }
                  // check for empty records
                  if (!empty($dataqs)){
                  foreach ($dataqs as $keyq) {
                  echo "<tr>";
                    $id = $keyq['id'];
                    
                    if(!empty($keyq['primary_id'])){
                    unset($keyq['primary_id']);
                    
                    }
                    if (!empty($keyq['user_id'])){
                    $user_id_dat = $keyq['user_id'];
                    unset($keyq['user_id']);
                    }
                    foreach ($keyq as $kq) {
                    //print_r($kq);die();
                    
                    $ks = str_replace("|_|", ',', $kq);
                    if ($ks != "123_legend"){
                    
                    echo "<td>".$ks."</td>";
                    }
                    }
                    if (!empty($fk)){
                    echo "<td>";
                      // echo $last;
                      foreach ($fk as $fkey){
                      $ftbl1 = $fkey['sec_table'];
                      
                      echo '<input type="hidden" id="for_name" value="'.$ftbl1.'">';
                      $fdata = $this->admin_model->get_for_table_data_by_name($ftbl1);
                      
                      foreach ($fdata as $key1)
                      {
                      unset($key1['id']);
                      // unset($key1['primary_id']);
                      // print_r($key);
                      $pri_id = $key1['primary_id'];
                      $pri_dat = $key1['primary_data_id'];
                      if (!empty($key1['primary_data_id'])){
                      if ($key1['primary_data_id'] === $id && $key1['primary_id'] === $dat[0]['id'])
                      {
                      unset($key1['primary_data_id']);
                      unset($key1['primary_id']);
                      // print_r($key);
                      foreach ($key1 as $kkk => $v)
                      {
                      if (!empty($v)) {
                      
                      $v = str_replace("|_|", ',', $v);
                      $kkk = ucfirst(str_replace("_", ' ', $kkk));
                      
                      //echo "$kkk"." : "."$v"."<br>";
                      // echo "<th>".$kkk."";
                        // echo "<td>".$v."</td></th>";
                        }
                        }
                        // echo "<hr>";
                        }
                        } // empty
                        
                        }
                        } ?>
                        <a class="btn btn-warning btn-sm" name="tid" data-id="<?= $id ?>" onclick="launch_comment_modal(<?= $id;?>)">View Multiple</a>
                        <?php
                      echo "</td>"; }
                      $by = $this->page_model->record_inserted_by($user_id_dat);
                      if ($by == true){
                      echo "<td>".$by[0]['user_name']."</td>";
                      }
                      // duration
                      echo '<td>';
                        try {
                        $duration = $this->page_model->get_duration($key['id'], $id);
                        // print_r($duration);
                        echo $duration[0]['duration'];
                        } catch (Exception $e) { }
                      echo '</td>';
                      echo "<td>";
                        }
                        ?>
                    
                        <a href="<?php echo base_url(); ?>pages/edit_table_by_id/<?= $qid ?>/<?= $key['title'] ?>/<?= $id; ?>"><i class="fas fa-edit"></i></a>
                        
                        <?php if (empty($ftbl)) { ?>
                          
                        <a class="eye-view" href="<?php echo base_url(); ?>pages/delete_sin/<?= $key['title'] ?>/<?= $id; ?>" onclick="return confirmDelete_sin();"><i class="fas fa-trash"></i></a>
                        <?php }else{ ?>
                        
                        <a class="eye-view" href="<?php echo base_url(); ?>pages/delete/<?= $key['title'] ?>/<?= $id; ?>/<?= $ftbl; ?>/<?= $pri_id; ?>/<?= $pri_dat; ?>" onclick="return confirmDelete();"><i class="fas fa-trash"></i></a><?php } ?>
                        
                        <input type="hidden" id="table_name" value="<?= $key['title'] ?>">
                        <?php
                      echo "</td>";
                    echo "</tr>";
                    }
                    else{
                      echo '<tr style="color: #e31212;"><td colspan="5" ><b>रेकर्ड उपलब्ध छैन !!</b></td></tr>';
                    }
                    
                  //echo "</td>";
                  
                  ?>
                  
                </tbody>
              </table>
              <?php   }
              }
              }
              ?>
              
              <?php echo $pagination; ?>
              
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- <div class="sss">Result:</div> -->
    <button style="display: none" type="button" class="btn btn-primary" id="click_it" data-toggle="modal" data-target="#compose-modals">Launch demo modal</button>
    <div class="modal fade bd-example-modal-lg" id="compose-modals" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content pt-1 pl-2 pr-2 pb-5" style="background-color: #d4d6d7;width: 900px;">
          
        </div>
      </div>
    </div>
    <!-- <div id="my_modal" class="modall">
      <span class="closeit">&times;</span>
      <img class="modal-contents" id="img01">
      <div id="caption">loading</div>
    </div> -->
    <!-- <div class="loader_modal">Place at bottom of page</div> -->
  </div>
</div>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.eye-view{
color: #cb8888;
font-size: 22px;
}
.eye-view:hover {
color: #009688;
}
.heading{
color: #fff;
}
.modal1 {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: auto; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
position: relative;
background-color: #fefefe;
margin: auto;
padding: 0;
border: 1px solid #888;
width: 100%;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
-webkit-animation-name: animatetop;
-webkit-animation-duration: 0.4s;
animation-name: animatetop;
animation-duration: 0.4s
}
/* Add Animation */
@-webkit-keyframes animatetop {
from {top:-300px; opacity:0}
to {top:0; opacity:1}
}
@keyframes animatetop {
from {top:-300px; opacity:0}
to {top:0; opacity:1}
}
/* The Close Button */
.close {
color: white;
float: right;
font-size: 28px;
font-weight: bold;
}
.close:hover,
.close:focus {
color: #000;
text-decoration: none;
cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}
/*ajax loader modal*/
.loader_modal {
display:    none;
position:   fixed;
z-index:    1000;
top:        0;
left:       0;
height:     100%;
width:      100%;
background: rgba( 255, 255, 255, .8 )
url('http://i.stack.imgur.com/FhHRx.gif')
50% 50%
no-repeat;
}
body.loading .loader_modal {
overflow: hidden;
}
body.loading .loader_modal {
display: block;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="text/javascript">

function confirmDelete(){
// alert(title);
var r=confirm("Confirm Delete this Data?")
if (r==true)
window.location = url+"pages/delete/"+title+id;
else
return false;
}
function confirmDelete_sin(){
// alert(title);
var r=confirm("Confirm Delete this Data?")
if (r==true)
window.location = url+"pages/delete_sin/"+title+id;
else
return false;
}
// modals
$('#compose-modals').modal({ show: false});
function launch_comment_modal(id){

var values = {
'id' : id,
'name': document.getElementById('table_name').value,
'for_name': document.getElementById('for_name').value,
};
$('#click_it').click();
// alert(id);
$.ajax({
type: "POST",
url: "<?= base_url(); ?>pages/multiple_fetch",
// dataType: 'JSON',
data: values,
success: function(resp){
$(".modal-content").html(resp);
console.log(resp);
},
});
}


function myFunction() {
// $body = $("body");
var x = document.getElementById("filter_by_user").value;
var tbl = document.getElementById("form_name").value;

var app = 43;
// document.getElementById("tot_rec").append(app);

var values = {
'form_name' : tbl,
'user' : x
};
$.ajax({
type: "POST",
url: "<?= base_url(); ?>pages/filter_records_by_user",
// dataType: 'JSON',
data: values,

success: function(resp){

$("#filter_records").html(resp);
  document.getElementById("filter_records").style.backgroundColor='rgb(248, 226, 227)';
},
});

$.ajax({
type: "POST",
url: "<?= base_url(); ?>pages/get_user_records",
// dataType: 'JSON',
data: values,
success: function(resp){

$("#tot_rec").html(resp);
},
});

} // function end

// $body = $("body");
// $(document).on({
//     ajaxStart: function() { $body.addClass("loading");    },
//      ajaxStop: function() { $body.removeClass("loading"); }
// });
</script>