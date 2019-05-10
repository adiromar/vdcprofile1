<style>
	.inputs_ques select
	{
		width: 300px;
		height: 40px;
		padding-left: 10px;
	}
</style>
<main class="app-content">
<form action="<?php echo base_url(); ?>admins/insert_question_sets" method="post">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> <?= $title ?></h1>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admins/index"><i class="fa fa-home fa-lg"></i></a></li>
			<li class="breadcrumb-item"><?= $title ?></li>
		</ul>
	</div>
	<div class="tile">
		<div class="tile-body">

			<div class="row">
				<div class="col-md-12">
					<label for=""><strong>Add SET Name:</strong></label>
					<input type="text" class="form-control" name="set_name"><br>
				</div>
				<div class="col-md-12 mt-2">
					<label for=""><strong>Choose questions:</strong></label><br>	
					<div class="row">
						<?php 
						foreach ($forms as $key): ?>
							<?php $c = $this->admin_model->get_table_by_oldid($key['id']); //to check if table has new version
			        		if ( count($c) == 0 ) { ?>
							<div class="col-md-4">
								<input type="checkbox" name="questions[]" value="<?= $key['id'] ?>">&nbsp;&nbsp;<?= $key['display_name'] ?>		
							</div>	
							<?php } ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<hr><br><br>
			<input type="submit" class="btn btn-success" name="submit">
			</form>
		</div>
	</div>

	<a href="<?php echo base_url(); ?>admins/add_question_sets">
		<button class="btn btn-warning" style="width: 200px;">RESET</button>
	</a>

	<div class="tile mt-4">
		<div class="tile-body">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-condensed">
						<thead>
							<tr>
								<th>Set Name:</th>
								<th>Forms:</th>
								<th>Action:</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($get_sets as $key): ?>
								<tr>
									<td> <?= $key['set_name'] ?> </td>
									<td><?=  $key['question_name'] ?></td>
									<td>
										<a href="<?php echo base_url(); ?>admins/remove_question_sets?id=<?= $key['id'] ?>">
											<span class="fa fa-trash" style="color: red;"></span>	
										</a>
									</td>
								</tr>	
								<span style="display: none"><?= $key['question_id'] ?></span>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

			
</main>
