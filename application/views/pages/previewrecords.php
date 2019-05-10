<?php
// echo '<pre>';
// print_r($forms);
// echo $user_name;echo $date;
// $get = $this->page_model->get_daily_records('household_statistics_form', $user_name, $date);

?>

<table class="table table-bordered table-striped table-responsive"> 
	<thead class="thead-dark">
		<th>S.N.</th>
		<th>Form Name</th>
		<th>No. of Records</th>
		
	</thead>
	<tbody>
		<?php $i = 1;$get = 0;$rowcount=0;
		foreach ($forms as $fkey => $fval) {
			// $get = $this->page_model->get_daily_rec($fval['title'], $user_name, $date);
			// $this->db->where('inserted_at like', $date . '%');
			// $this->db->where('user_id', $user_name);
			// $this->db->from($fval['title']);
   //              $query = $this->db->get();
   //              $rowcount = $query->num_rows();
		echo '<tr>';
		echo '<th>'.$i.'</th>';
		echo '<th>'.$fval['display_name'].'</th>';
		echo '<th>'.$rowcount.'</th>';
		echo '</tr>';

		$i++; } ?>
	</tbody>
</table>