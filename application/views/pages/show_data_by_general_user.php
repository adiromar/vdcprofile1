<?php
// echo "<pre>";
// print_r($table[0]['display_name']);

	$nepalititles = explode( ',',$table[0]['nepali_title'] );
	$formId = $table[0]['id'];
	$fields = explode( ',',$table[0]['fields'] );
	$colspan =  count($fields);
	$comb = array_combine($fields,$nepalititles);
	$count = 0;
	foreach ($comb as $key => $value) {
	if (trim($value) == 'legend') {
	unset($comb[$key]);
	}
	$count++;
	}
	// check for multiple tables
	$mul_tbl = $this->admin_model->get_foreign_table_of_primary_table_mul($form_name);
	?>

	<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
		    <div class="container-fluid">
			    <main class="app-content">
				<div class="app-title mt-4">
    
			    <ul class="app-breadcrumb breadcrumb">
			      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
			      <li class="breadcrumb-item"><a href="<?= base_url() ?>pages/view_records">View Records</a></li>
			      <li class="breadcrumb-item"><?= $table[0]['display_name'] ?></li>
			      <hr>
			      <li class="ml-5 float-right"><i class="fa fa-list"></i> <b>Total Records: <?= count($records) ?></b></li>
			    </ul>
			  </div>

				<input type="hidden" id="table_name" value="<?= $form_name ?>">
				
				<!-- <h4 style="margin-top:20px">Total: <?= count($records) ?></h4> -->
				<h4 style="text-transform: capitalize;color: green;"><?= $table[0]['display_name'] ?></h4>
				<table id="mytable" class="table table-bordered table-condensed table-striped table-responsive">
					<thead>
						<tr style="background: #3c8fe2;color: white">
							<th>ID</th>
							<?php foreach ($comb as $key => $value): 
								// $foo = trim(preg_replace('/\s+/',' ', $value));
								// $shrt_val = substr($foo, 0, 50);
								?>
							<th  data-toggle="tooltip" data-placement="top" title="<?= $value; ?>"><?= $value ?></th>
							<?php endforeach ?>
							<?php
							if(!empty($mul_tbl)){
							   echo "<th class='heading'>Multi Data</th>";
							} ?>
							<th class="heading">View/Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($records as $key => $value): ?>
						<?php
						$data = $value; 
						$this->load->database();
						$this->db->select('id');
						$id = $this->db->get_where($tablename, $data)->row();
						$id = $id->id;
						?>
						<tr>
							<td><?= $id ?></td>
							<?php foreach ($value as $key => $rvalue): ?>
							
							<?php if ( in_array($key, $fields) ): ?>
							<td><?= $rvalue ?></td>
							<?php else: ?>
							<td>-</td>
							<?php endif ?>
							<?php endforeach ?>
							<?php
							if (!empty($mul_tbl)){
							                      echo "<td>";
								                      foreach ($mul_tbl as $fkey){
								                      $ftbl1 = $fkey['sec_table'];
								                     
								                      echo '<input type="hidden" id="for_name" value="'.$ftbl1.'">';
								                  }
								?>
								<a class="btn btn-warning btn-sm" name="tid" data-id="<?= $id ?>" onclick="launch_comment_modal(<?= $id;?>)">Preview More</a>
							<?php echo "</td>"; } ?>
							<td><a href="<?php echo base_url(); ?>pages/edit_table_by_id/<?= $formId ?>/<?= $tablename ?>/<?= $id; ?>"><i class="fas fa-edit"></i></a></td>
						</tr>
						<?php endforeach; ?>
						<?php
						if (empty($records)){
							echo '<tr style="color: #e31212;"><td colspan='.$colspan.' ><b>रेकर्ड उपलब्ध छैन !!</b></td></tr>';
						} ?>
					</tbody>
				</table>

				<button style="display: none;" type="button" class="btn btn-primary" id="click_it" data-toggle="modal" data-target="#compose-modals">Launch demo modal</button>

				<div class="modal fade bd-example-modal-lg" id="compose-modals" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-xl">
						    <div class="modal-content pt-1 pl-2 pr-2 pb-5" style="background-color: #d4d6d7;width: 900px;">
							        
						    </div>
					  </div>
				</div>

		</main>
	</div>
</div>


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script type="text/javascript">
				// modal
				    $('#compose-modals').modal({ show: false});
				    function launch_comment_modal(id){
				    // var name = document.getElementById('for_name').value;
				     //  alert(id);
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
				</script>