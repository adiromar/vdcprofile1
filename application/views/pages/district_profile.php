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
// print_r($no);die;
// print_r($unit);
// print_r($unit_prof);
?>
<div id="page-content-wrapper" class="home">
    <div class="container-fluid">
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
  hr{
    border: 1px solid #dee2e6;
  }
</style>
<?php if($this->session->flashdata('post_updated')): 
    echo '<p style="text-align: center;" class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; 
  endif; ?>
<?php if($this->session->flashdata('post_deleted')): 
    echo '<p style="text-align: center;" class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>'; 
  endif; ?>

 <div class="heading_title">
  <h3 style='text-align: center; color: #554e4e;'>साझा फारम रेकर्डहरु</h3>
</div>

<div class="row">
  <div class="col-md-12">
  <div class="tile_front" style="background: #fff;">
        <div class="tile-body">

       <table class="table table-bordered">
         <thead style="background: #7e7ee5;">
           <tr style="color: #fff;">
             <th rowspan="2" width="">क़.स.</th>
             <th rowspan="2" width="50">प्रदेशको नाम</th>
             <th rowspan="2" width="50">प्रदेशको कोड</th>
             <th rowspan="2" width="50">जिल्ला</th>
             <th rowspan="2" width="50">जिल्लाको कोड</th>
             <th colspan="2">नगरपालिका/गाउँपालिका</th>
             <th colspan="2">टोलको विवरण</th>
             <th colspan="2">जलाधार क्षेत्र विवरण</th>
             <th colspan="2">उप-जलाधार क्षेत्र विवरण</th>
             <th colspan="2"></th>
           </tr>
           <tr style="color: #fff;">
            
             <th >नाम</th>
             <th > कोड</th>
             <th >टोलको नाम</th>
             <th >टोलको कोड</th>
             <th >नाम</th>
             <th >कोड</th>
             <th >नाम</th>
             <th >कोड</th>
             <th >Control</th>
           </tr>
         </thead>
         <tbody align="center">
          <?php 
          foreach ($dis_prof as $key)
            // print_r($key['id']);
           { ?>
           <tr>
             <td rowspan="1"><?= $key['id']; ?></td>
             <td rowspan="1"><?= $key['state']; ?></td>
             <td rowspan="1"><?= $key['state_code']; ?></td>
             <td rowspan="1"><?= $key['district']; ?></td>
             <td rowspan="1"><?= $key['district_code']; ?></td>
         <!-- </tr> -->
            
           <!-- <tr> -->
            <?php
            $unit_name = $codes = $tole_name = $tole_code = $jala_name = $jala_code = $sub_jala_name = $sub_jala_code = '';
            $unit = $this->page_model->get_unit_data($key['id']);
            foreach ($unit as $val) { 
              $unit_name .= $val['local_unit'] ."<br/><hr>";
              $codes .= $val['unit_code'] ."<br/><hr>";
            }
            $tole = $this->page_model->get_tole_data($key['id']);
            foreach ($tole as $val) { 
              $tole_name .= $val['tole_name'] ."<br/><hr>";
              $tole_code .= $val['tole_code'] ."<br/><hr>";
            }
            $jaladhar = $this->page_model->get_jaladhar_data($key['id']);
            foreach ($jaladhar as $val) { 
              $jala_name .= $val['jaladhar_name'] ."<br/><hr style='color: red;'>";
              $jala_code .= $val['jaladhar_code'] ."<br/><hr>";
            }
            $sub_jala = $this->page_model->get_sub_jaladhar_data($key['id']);
            foreach ($sub_jala as $val) { 
              $sub_jala_name .= $val['upa_jaladhar_name'] ."<br/><hr>";
              $sub_jala_code .= $val['upa_jaladhar_code'] ."<br/><hr>";
            }
              ?>
            <!-- <tr> -->
            <td><?= $unit_name ?></td>
            <td><?= $codes ?></td>
            <td><?= $tole_name ?></td>
            <td><?= $tole_code ?></td>
            <td><?= $jala_name ?></td>
            <td><?= $jala_code ?></td>
            <td><?= $sub_jala_name ?></td>
            <td><?= $sub_jala_code ?></td>
            <td><a class="eye-view" href="<?= base_url(); ?>pages/edit_unit/<?= $key['id'] ?>"><button type="button" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button></a>
              <a class="eye-view" href="<?= base_url(); ?>pages/delete_unit/<?= $key['id'] ?>" onclick="return confirmDelete();"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button></a></td>
          </tr>
          <?php } ?>
        <!-- </tr> -->
         </tbody>
       </table>

        </div>
  </div>
</div>
</div>

</div>
</div>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script type="text/javascript">
   
    function confirmDelete(){
       // alert(title);
        var r=confirm("Are you sure to delete this data ?")
        if (r==true)
          //window.location = url+"pages/delete/"+title+id;
        else
          return false;
        } 
</script>