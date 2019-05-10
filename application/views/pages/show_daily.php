<?php

// echo $user_name;echo $date;
// echo $form_name;
$rec = $this->page_model->get_daily_rec($form_name, $user_name, $date);
// echo $rec;die;
$disp_name = str_replace('_', ' ', $disp);
?>
<style type="text/css">
	thead{
		color: #3f663f;
	}
</style>
<table class="table table-bordered table-striped table-responsive">
	<thead>
		<th>Form Name</th>
		<th>Date</th>
		<th>No Of Records</th>
	</thead>
	<tbody>
		<tr>
			<td><?= $disp_name ?></td>
			<td><?= $date ?></td>
			<td><?= $rec ?></td>
		</tr>
	</tbody>
</table>