<style type="text/css">
  select option[disabled] {
    display: none;
}
</style>
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


<div class="clearfix" style="margin-bottom: 25px;"></div>

<div class="error" style="color: red; font-weight: bold;">
            <?php echo validation_errors(); ?>  
            <?php if($this->session->flashdata('post_created')): 
    echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; 
  endif; ?>

<?php if($this->session->flashdata('post_not_created')): 
    echo '<p class="alert alert-warning">'.$this->session->flashdata('post_not_created').'</p>'; 
  endif; ?>
          </div>

 <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          
         <!--  <form action="<?php echo base_url(); ?>admins/get_rm_records" method="post" class="row">
          <div class="col-md-3">
          	<label>जिल्ला छानुहोस:</label>
            <select name="sec_tbl" id="seasons" class="form-control">
              
            <?php 

            foreach($list_of_district as $key)
            { 
              // if($this->admin_model->check_relation($row->id) > 0){
              echo '<option value="'.$key['district_code'].'">'.$key['district'].'</option>';
              //echo '<option value="'.$row->id.'">'.$row->id.'</option>';
              // }
            }
            ?>
            </select>

          </div>

          <div class="col-md-3">
          	<label>गाउँपालिका छानुहोस:</label>
            <select name="sec_tbl" id="clubs" class="form-control">
              
            <?php 

            foreach($list_of_rm as $key)
            { 
              // if($this->admin_model->check_relation($row->id) > 0){
              echo '<option data-group="'.$key['district_code'].'" value="'.$key['local_unit'].'">'.$key['local_unit'].'</option>';
              //echo '<option value="'.$row->id.'">'.$row->id.'</option>';
              // }
            }
            ?>
            </select>

          </div>
          

           <div class="col-md-2" style="margin-top: 15px;">

             <input type="submit" class="form-control btn btn-success mt-4" name="" value="Download Excel">
           </div>

           <div name="" id="displayText"></div>

          </form> -->
          <a href="<?php echo base_url(); ?>admins/get_rm_records" class="btn btn-secondary mt-4"><i class="far fa-file-excel"></i> Download in Excel</a><br>

          <a href="<?php echo base_url(); ?>admins/get_rm_records_word" class="btn btn-primary mt-4"><i class="far fa-file-word"></i> Download in Word</a>

        </div>
      </div>
    </div>
  </div>  
<!-- <div id="printableArea">
       Your Content here.....
</div>


<input type="button" onclick="printDiv('printableArea')" value="Print Invoice" /> -->

</main>



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
 // $(document).ready(function(){
 $("#seasons").on('change', function(e){
 	// alert("changed");
      var seasons = $("#seasons").find('option:selected').val(); 
      $("#option-container").children().appendTo("#clubs");
            $("#clubs").children().removeAttr('disabled');
      var selectSeason = $("#clubs").children("[data-group!='"+seasons+"']"); 
            $(selectSeason).attr('disabled','disabled');
            $("#clubs").val($("#clubs optgroup[data-group='"+ seasons +"'] option:eq(0)").val());
      selectSeason.appendTo("#option-container");
            $("#clubs").removeAttr("disabled"); 
            });

// for printing certain page
//  function printDiv(divName) {
//     var printContents = document.getElementById(divName).innerHTML;
//     var originalContents = document.body.innerHTML;
//     document.body.innerHTML = printContents;
//     window.print();
//     document.body.innerHTML = originalContents;
// }
</script>



