<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
    <div class="container-fluid">

<?php if($this->session->flashdata('deleted')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('deleted').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('not_deleted')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('not_deleted').'</p>';
  endif; ?>

    <div class="row">
  		<div class="col-md-12">
  			<div class="tile_front1">
        		<div class="tile-body">
        			<h4 class="personal_heading">व्यक्तिगत रेकर्डहरु</h4>
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mb-4" id="search_box">रेकर्ड खोज्नुहोस</button>
<button type="button" class="btn btn-danger float-right mb-4" id="del_box" style="display: none;">
  X
</button>

<div id="show_search" class="show_search"> 
    <h6>Search: </h6>
    <!-- <?= base_url(); ?>posts/search_personal -->
    <form action="" method="post" id="create" enctype="multipart/form-data">
    <div class="row ">
        <div class="col-md-3">
        <label>व्यक्तिको नाम</label>
        <input type="text" name="person_name" class="form-control">
        </div>
        <div class="col-md-2">
        <label>घर नं</label>
        <input type="text" name="ghar_no" class="form-control">
        </div>
        <div class="col-md-2">
        <label>नागरिकता नं</label>
        <input type="text" name="cit_id" class="form-control">
        </div>
    <p style="margin-top: 36px;"><button id="submit" type="submit" name="submit" class="btn btn-info btn-sm" value="search">खोज्नुहोस</button>
    <input class="btn btn-danger btn-sm" type="reset" value="रद् गर्नुहोस" id="reset"></p>
    </div>

    </form>
</div>

<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div class="loading"></div>


<div class="row">
        <div class="col-md-12">
            <?php echo $pagination; ?>
        </div>
    </div>

        <table id="view_data" class="table table-bordered">
            <thead>
            	<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
                    <th>घर नं.</th>
                    <th>सदस्यको क्र सं</th>
                    <th>सदस्यको नाम</th>
            		<th>लिङ्ग</th>
                    <th>घरमुलीको नाम</th>
            		<th>जन्मेको साल</th>
            		<th>बर्ष</th>
                    <th>नागरिकता नं</th>
            		<th>Control</th>
            	</tr>
            </thead>

            <tbody>
            	<?php
            $i = 1 + $page;
            // $single_records = $this->darta_model->get_single_member_info();
            foreach ($single_records as $key) {
            	// print_r($key['house_no']);
            	?>
            	<tr>
            	<td><?= $i; ?></td>
                <td><?= $key['household_number'] ?></td>
                <td><?= $key['family_sn'] ?></td>
                <td><?= $key['family_memb_name_list'] ?></td>
            	<td><?= $key['gender'] ?></td>
            	<td><?= $key['household_name'] ?></td>
            	<td><?= $key['birth_year'] ?></td>
            	
            	<td><?= $key['current_age'] ?></td>
                <td><?= $key['citizenship_number'] ?></td>
            	<td>
                    <!-- <a href="<?php echo base_url(); ?>darta/janma_darta/<?= $key['id'] ?>"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Janma darta"><i class="fas fa-child"></i></button></a> -->
            		<a href="<?php echo base_url(); ?>pages/edit_single_by_id/<?= $key['id'] ?>"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button></a>
            		<a class="eye-view" href="<?php echo base_url(); ?>pages/delete_single_records/<?= $key['id'] ?>" onclick="return confirmDelete_per();"><i class="fas fa-trash"></i></a></td>
            	</tr>
            <?php $i++; } ?>
            </tbody>
        </table>

        		</div>

    <div class="row">
        <div class="col-md-12">
            <?php echo $pagination; ?>
        </div>
    </div>

        	</div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/jquery-3.1.0.js"></script>
<script type="text/javascript">
    var button = document.getElementById('search_box')
    var buttonx = document.getElementById('del_box')
    button.addEventListener('click',hideshow,false);
    buttonx.addEventListener('click',hideshowx,false);

    function hideshow() {
        /* document.getElementById('hidden-div').style.display = 'block' */; 
        this.style.display = 'none'
        $("#show_search").show("fadein");
        $("#del_box").show("fadein");
    }   
function hideshowx() {
        /* document.getElementById('hidden-div').style.display = 'block' */; 
        this.style.display = 'none'
        $("#show_search").hide("fadeout");
        $("#del_box").hide("fadeout");
        $("#search_box").show("fadeout");
        $("#search_results").hide("fadeout");
        $("#view_data").show("fadeout");
    } 

// $("#del_box").click(function(){
//  // alert("search");
//  $("#show_search").hide("fadein");
//  $("#search_box").show("fadein");
// });

 $('#create').submit(function () {
    
     $( "#loading" ).show();
      
    $.post('<?= base_url()?>darta/search_single', $('#create').serialize(), 
              
        function (data, textStatus) {
            $("#loading-image").show();

        setTimeout(function() {
            $("#loading-image").hide();
        }, 1100);

      $( "#view_data" ).hide();

      setTimeout(function() {
            $('.loading').show('fadein').html(data);
        }, 1105);

         // $('.loading').show().html(data);
    });
    return false;
});


function confirmDelete_per(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"pages/delete_single_records/"+id;
        else
          return false;
        } 
 </script>