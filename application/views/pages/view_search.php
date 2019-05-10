<main class="app-content">
  <div class="app-title">
  
  	<div class="row">
  		<div class="col-md-12">
  			<div class="tiles">
        		<div class="tile-body">

<?php if (!empty($name)){ ?>
<table id="search_results" class="table table-bordered">
	<thead>

		<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
            		<th>घर नं</th>
            		<th>घरमुलीको नाम</th>
            		<th>सदस्यको नाम</th>
            		<th>नागरिकता नं.</th>
            		<th>घरमुली सँगको नाता</th>
            		<th>वडा नं</th>
            		<th>Control</th>
        </tr>
	</thead>
	<tbody>
		<tr>
<?php
$i = 1;

	foreach ($name as $val) {
	// print_r($name);
?>
			<td><?= $i;?></td>
			<td><?= $val['house_no'] ?></td>
			<td><?= $val['household_name'] ?></td>
			<td><?= $val['family_memb_name_list'] ?></td>
			
			<td><?= $val['citizenship_number'] ?></td>
			<td><?= $val['relation_with_head_of_house'] ?></td>
			<td><?= $val['ward_no'] ?></td>
			<td><a href=""><i class="fas fa-desktop"></i></a>
            	<a href="<?php echo base_url(); ?>pages/edit_personal_by_id/<?= $val['id'] ?>"><i class="fas fa-edit"></i></a>
            	<a class="eye-view" href="<?php echo base_url(); ?>pages/delete_sin/<?= $val['id'] ?>" onclick="return confirmDelete_sin();"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
<?php } ?>

<!-- personal search results -->
<?php if (!empty($single)){ ?>
<table id="search_results" class="table table-bordered">
	<thead>

		<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
            		<th>व्यक्तिको नाम</th>
            		<th>घर नं.</th>
            		<th>नागरिकता नं.</th>
            		<th>परिवार छुटिएको</th>
            		<th>बसाई सराई</th>
            		<th>जन्मेको बर्ष</th>
            		<th>पति वा पत्नीको नाम</th>
            		<th>Control</th>
        </tr>
	</thead>
	<tbody>
		<tr>
<?php
$i = 1;

	foreach ($single as $val) {
		// echo '<pre>';
	// print_r($single);die;
?>
	<td><?= $i;?></td>
	<td><?= $val['family_memb_name_list'] ?></td>
	<td><?= $val['house_no'] ?></td>
	<td><?= $val['citizenship_number'] ?></td>
	<td><?= $val['family_seperated'] ?></td>
	
	<td><?= $val['family_migrated'] ?></td>
	<td><?= $val['birth_year'] ?></td>
	<td><?= $val['husband_or_wife_name'] ?></td>
	<td><a href="<?php echo base_url(); ?>pages/edit_single_by_id/<?= $val['id'] ?>"><button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Form"><i class="fas fa-edit"></i></button></a>
		<a href="<?php echo base_url(); ?>darta/janma_darta/<?= $val['id'] ?>" target="_blank"><button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="जन्म दर्ता"><i class="fas fa-child"></i></button></a>
      <a href="<?php echo base_url(); ?>darta/marriage_darta/<?= $val['id'] ?>" target="_blank"><button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="बिबाह दर्ता"><i class="fas fa-user-friends"></i></button></a>
      <a href="<?php echo base_url(); ?>darta/migration/<?= $val['id'] ?>" target="_blank"><button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="बसाई सराई"><i class="fas fa-truck-moving"></i></button></a>
      <a href="<?php echo base_url(); ?>darta/relation_darta/<?= $val['id'] ?>" target="_blank"><button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="नाता प्रमाणित"><i class="fas fa-link"></i></button></a>
      <a href="<?php echo base_url(); ?>darta/death_registration/<?= $val['id'] ?>" target="_blank"><button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="मृत्यु दर्ता"><i class="fas fa-user-minus"></i></button></a>
          </td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
<?php } ?>

<?php if (!empty($parents)){ ?>
<table id="search_results" class="table table-bordered">
	<thead>

		<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
            		<th>घर नं</th>
            		<th>बुवा/आमाको नाम</th>
            		<th>लिङ्ग</th>
            		
            		<th>नागरिकता नं.</th>
            		<th>जन्म मिति</th>
            		<th>हजुरबुवाको नाम</th>
            		<th>Control</th>
        </tr>
	</thead>
	<tbody>
		<tr>
<?php
$i = 1;
	foreach ($parents as $val) {
	// print_r($name);
?>
			<td><?= $i;?></td>
			<td><?= $val['gharmuli_table_id'] ?></td>
			<td><?= $val['family_memb_name_list'] ?></td>
			<td><?= $val['gender'] ?></td>
			
			<td><?= $val['citizenship_number'] ?></td>
			<td><?= $val['birth_year'] ?></td>
			<td><?= $val['father_name'] ?></td>
			<td><a href="<?php echo base_url(); ?>darta/janma_darta/<?= $val['id'] ?>"><i class="fas fa-edit"></i></a>
            	</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>
<?php }elseif(empty($name) && empty($parents) && empty($single) ){
	echo "No Match Found. Search Again.";
} ?>

			</div>
			</div>
		</div>
	</div>
</div>
</main>
