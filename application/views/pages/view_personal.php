<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
    <div class="container-fluid mt-5">

    <div class="row">
  		<div class="col-md-12">
  			<div class="tile_front1">
        		<div class="tile-body">

        			<h4 class="personal_heading">व्यक्तिगत सूचना फारम (घरधुरी विवरण)</h4>

        			<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mb-4" id="search_box">
  Search Data
</button>
<button type="button" class="btn btn-danger float-right mb-4" id="del_box" style="display: none;">
  X
</button>

<div id="show_search" class="show_search"> 
	<h6>Search by</h6>
	<!-- <?= base_url(); ?>posts/search_personal -->
	<form action="" method="post" id="create" enctype="multipart/form-data">
	<div class="row ">
		<div class="col-md-3">
		<label>घरमुलीको नाम / घर न / ना.नं.</label>
		<input type="text" name="gharmuli_name" class="form-control">
		</div>
	<p style="margin-top: 36px;"><button id="submit" type="submit" name="submit" class="btn btn-info btn-sm" value="search">search</button>
    <input class="btn btn-danger btn-sm" type="reset" value="Clear" id="reset"></p>
	</div>

	</form>
</div>

<div id="loading-image" class="loading-div"><img class="loading-image" src="<?= base_url();?>assets_front/balls.gif"></div>
<div class="loading"></div>

        <table id="view_data" class="table table-bordered">
            <thead>
            	<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
                <th>घर नं</th>
            		<th>घरमुलीको नाम</th>
            		<th>लिङ्ग</th>
                <th>नागरिकता नं</th>
            		<th>गा.पा / न.पा.</th>
                <th>वडा नं</th>
            		<th>Control</th>
            	</tr>
            </thead>

            <tbody>
            	<?php
            $i = 1;
            $ghar_info = $this->darta_model->get_gharmuli_infoo();
            foreach ($ghar_info as $key) {
            	// print_r($key['house_no']);
            	?>
            	<tr>
            	<td><?= $i; ?></td>
                <td><?= $key['household_number'] ?></td>
            	<td><?= $key['household_name'] ?></td>
            	<td><?= $key['gender'] ?></td>
              <td><?= $key['citizenship_number'] ?></td>
            	<td><?= $key['rm'] ?></td>
                
                <td><?= $key['ward_no'] ?></td>
            	<td><a href="<?php echo base_url(); ?>pages/view_personal_by_id/<?= $key['id'] ?>"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="All gharmuli info"><i class="fas fa-desktop"></i></button></a>
            		
                <a target="_blank" href="<?php echo base_url(); ?>pages/edit_personal_by_id/<?= $key['household_name'] ?>"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="All gharmuli info"><i class="fas fa-edit"></i>Edit</button></a>
            		<a class="eye-view" href="<?php echo base_url(); ?>pages/delete_per/<?= $key['id'] ?>" onclick="return confirmDelete_per();"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="All gharmuli info"><i class="fas fa-trash"></i></button></a></td>
            	</tr>
            <?php $i++; } ?>
            </tbody>
        </table>






        		</div>
        	</div>
        </div>
    </div>


 </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="js/jquery-3.1.0.js"></script> -->
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
        $("#show_search").hide("fadein");
        $("#del_box").hide("fadein");
        $("#search_box").show("fadein");
        $("#search_results").hide("fadein");
        $("#view_data").show("fadein");
    } 

// $("#del_box").click(function(){
// 	// alert("search");
// 	$("#show_search").hide("fadein");
// 	$("#search_box").show("fadein");
// });

 $('#create').submit(function () {
     $( "#loading" ).show();
      
    $.post('<?= base_url()?>darta/search_personal', $('#create').serialize(), 
              
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

      //    $.ajax({
      //      type: "POST",
      //      url: "<?= base_url()?>posts/search_personal",
      //      data: $('#create').serialize(),
      //      beforeSend: function() {
      //         $("#loading-image").show();
      //      },
      //      success: function(resp) {
      //         $(".loading").html(resp);
      //         $("#view_data").hide();
      //         // $('.loading').html(data);
      //         $("#loading-image").show();
      //      }
      // });
});


function confirmDelete_per(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"pages/delete_per/"+title+id;
        else
          return false;
        } 
 </script>