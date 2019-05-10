<?php
$user_id=$this->session->userdata('user_id');
$info = $this->user_model->get_user_type($user_id);
// $user_type = $user_type[0]['user_type'];
$user_type = $info[0]['user_type'];
$dis = $info[0]['district'];
$all = $this->user_model->get_all_district_user($dis);
// print_r($all);
$items = array();
foreach ($all as $key => $value) {
  $items[] = $value['user_id'];
}
// print_r($items);
$no = count($items);
if ($user_id == false){
    $this->session->set_flashdata('chk_login', 'Please Login To Continue.');
    redirect('pages/data');
}
?>

    <!-- Page Content -->
<div id="page-content-wrapper" style="padding: 5px;">
    <div class="container-fluid">
        <!-- <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><i id="fa" class="fas fa-arrow-alt-circle-left"></i>&nbsp;</a> -->
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
  .link_col{
    color: green; font-size: 18px; font-weight: 500;
  }
</style>

<?php if($this->session->flashdata('post_updated')): 
    echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; 
  endif; ?>
<?php if($this->session->flashdata('post_deleted')): 
    echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; 
  endif; ?>

<div class="row mt-5" style="margin-left: 50px; background: #fff; margin-right: 50px;">
  <div class="col-md-12">
  <div class="tile">
        <div class="tile-body">
          <div class="heading_title">  
          <h4 style='text-align: center; color: red;'>रेकर्ड हेर्नुहोस</h4>
          </div> 

  <?php 
      $tables = $this->admin_model->get_tables_pri();
      // echo "<pre>";
      // print_r($tables);
?>
<table class="table table-striped table-bordered table-responsive">
            <thead>
              <tr>
                <th>मुख्य फारमहरू</th>
                <th>रेकर्ड संख्या</th>
                <!-- <th>Secondary Table</th> -->
                <!-- <th>Multiple Input</th> -->
              </tr>  
            </thead>
            <tbody>
      <?php
      foreach ($tables as $key) 
      {
        

        $qid = $key['id'];
        //echo "Id is " . $qid;
        $fields = explode(',',$key['fields']);
         //print_r($fields);

        $row = $this->admin_model->check_relation($qid);
        // echo "<pre>";
      if($row === 0) //If it is not foreign table
        { ?>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a target="_blank" href='show_data_by_user/<?php echo $key['title']; ?>' class="link_col"><?php echo $key['display_name']; ?><i class="fas fa-link hid"></i></a></li></td>
            <td style="text-align: center;">
              <?php 
              if ($user_type == "SuperAdmin" || $user_type == "Admin"){
                // $this->db->where('user_id', $user_id);
                $this->db->from($key['title']);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "District Admin"){
                // for ($i=0; $i < $no; $i++) { 
                  $this->db->where_in('user_id', $items);
                // }
                $this->db->from($key['title']);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "User"){
                  $this->db->where('user_id', $user_id);
                  $this->db->from($key['title']);
                  $query = $this->db->get();
                  $rowcount = $query->num_rows();
                  // echo $key['title'];

                  // if ($rowcount != 0){
                  //   $unique = $this->admin_model->get_unique_table_data_by_user($key['title'], $user_id);
                  //   echo count($unique);
                  //   // print_r($unique);
                  //   }else{
                      echo $rowcount;
                    // }
            } ?>
            </td>
            <!-- <td><?php
            $fk = $this->admin_model->get_foreign_table_of_primary_table($key['title']);
                    foreach ($fk as $sm) {
                    $pk = $sm['sec_table'];
                   echo $pk . ', ';
                 }
            ?></td> -->
            <!-- <td>-</td> -->
          </tr>
<?php  } } ?>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('displayrecords/socio_economic_info'); ?>" class="link_col">गाउँपालिकाको सामाजिक-आर्थिक जानकारी</a></li></td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('pages/view_personal'); ?>" class="link_col">घरमुली सूचना रेकर्ड</a></li></td>
            <td style="text-align: center">
              <?php 
              if ($user_type == "SuperAdmin" || $user_type == "Admin"){
                // $this->db->where('user_id', $user_id);
                $this->db->from('gharmuli_info');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "District Admin"){
                // for ($i=0; $i < $no; $i++) { 
                  $this->db->where_in('user_id', $items);
                // }
                $this->db->from('gharmuli_info');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "User"){
                $this->db->where('user_id', $user_id);
                $this->db->from('gharmuli_info');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } ?>
            </td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('pages/list_personal'); ?>" class="link_col">व्यक्तिगत सूचना रेकर्ड</a></li></td>
            <td style="text-align: center">
               <?php 
              if ($user_type == "SuperAdmin" || $user_type == "Admin"){
                // $this->db->where('user_id', $user_id);
                $this->db->from('personal_info_form');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "District Admin"){
                // for ($i=0; $i < $no; $i++) { 
                  $this->db->where_in('user_id', $items);
                // }
                $this->db->from('personal_info_form');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } 
              if ($user_type == "User"){
                $this->db->where('user_id', $user_id);
                $this->db->from('personal_info_form');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
            } ?>
            </td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('darta/list_birth_records'); ?>" class="link_col">जन्म दर्ता रेकर्ड</a></li></td>
            <td></td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('darta/list_marriage'); ?>" class="link_col">विबाह दर्ता रेकर्ड</a></li></td>
            <td></td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('darta/list_migration'); ?>" class="link_col">बसाई सराई रेकर्ड</a></li></td>
            <td></td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('darta/list_deceased'); ?>" class="link_col">मृत्यु दर्ता रेकर्ड</a></li></td>
            <td></td>
          </tr>
          <tr>
            <td><li class="view_data_link" style="list-style: none;"><a href="<?= base_url('darta/list_relation'); ?>" class="link_col">नाता प्रमाणित दर्ता रेकर्ड</a></li></td>
            <td></td>
          </tr>
  </tbody>
  </table>

  </div>
</div>
</div>
</div>


<div class="row mt-5" style="margin-left: 50px; background: #fff;">
  <div class="col-md-12">
  <div class="tile">
        <div class="tile-body">
  <?php 
      $tables = $this->admin_model->get_tables_for();
      // echo "<pre>";
      // print_r($tables);
?>
<table class="table table-striped table-bordered table-responsive">
            <thead>
              <tr>
                <th>साझा फारमहरू</th>
                <th>रेकर्ड संख्या</th>
                <!-- <th>Secondary Table</th> -->
                <!-- <th>Multiple Input</th> -->
              </tr>  
            </thead>
            <tbody>
      <?php
      foreach ($tables as $key) 
      {
        

        $qid = $key['id'];
        //echo "Id is " . $qid;
        $fields = explode(',',$key['fields']);
         //print_r($fields);

        // $row = $this->admin_model->check_relation($qid);
        // echo "<pre>";
      // if($row === 0) //If it is not foreign table
        // { 
          ?>
          <tr>
            <td>
              <?php if ($key['title'] == 'district_profile'){ ?>
                <li class="view_data_link" style="list-style: none;"><a target="_blank" href='show_district_profile/<?php echo $key['title']; ?>' style='color: green; font-size: 18px; font-weight: 500;'>स्थानीय तह रेकर्ड<i class="fas fa-link hid"></i></a></li>
             <?php }else{ ?>
              <li class="view_data_link" style="list-style: none;"><a target="_blank" href='show_data_by_user/<?php echo $key['title']; ?>' style='color: green; font-size: 18px; font-weight: 500;'><?php echo $key['display_name']; ?><i class="fas fa-link hid"></i></a></li>
            <?php } ?>
            </td>
            <td style="text-align: center;"><?php
            if ($key['title'] == 'district_profile'){
                $this->db->from('district_profile');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount;
                }else{ 

                $this->db->where('user_id', $user_id);
                $this->db->from($key['title']);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                echo $rowcount; }
            ?></td>
            <!-- <td><?php
            $fk = $this->admin_model->get_foreign_table_of_primary_table($key['title']);
                    foreach ($fk as $sm) {
                    $pk = $sm['sec_table'];
                   echo $pk . ', ';
                 }
            ?></td> -->
            <!-- <td>-</td> -->
          </tr>
          
<?php   } ?>
<?php  // } ?>
  </tbody>
  </table>

  </div>
</div>
</div>
</div>

</div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
