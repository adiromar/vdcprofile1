<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
    <div class="container-fluid mt-4">

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
				<h4 class="personal_heading mb-4">जन्म दर्ता रेकर्डहरु</h4>

<div class="loading"></div>

 <!--        <table id="view_data" class="table table-bordered">
            <thead>
            	<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
                    <th>जन्मेको बच्चाको नाम</th>
            		<th>लिङ्ग</th>
                    <th>जन्म मिति</th>
            		<th>जन्म दर्ता नं</th>
            		<th>बुबाको नाम</th>
                    <th>जिल्ला</th>
                    <th>गाउँपालिका</th>
                    <th>वडा नं</th>
            		<th>Control</th>
            	</tr>
            </thead>

            <tbody>
            	<?php
            $i = 1;
            $birth_info = $this->darta_model->get_single_birth_info();
            foreach ($birth_info as $key) {
            	// print_r($key['house_no']);
            	?>
            	<tr>
            	<td><?= $i; ?></td>
                <td><?= $key['name'] ?></td>
            	<td><?= $key['gender'] ?></td>
            	<td><?= $key['birth_date'] ?></td>
            	<td><?= $key['birth_regist_no'] ?></td>
            	
            	<td><?= $key['father_name'] ?></td>
                <td><?= $key['district'] ?></td>
                <td><?= $key['mun_vdc'] ?></td>
                <td><?= $key['ward_no'] ?></td>
            	<td><a class="eye-view" href="<?php echo base_url(); ?>darta/delete_birth/<?= $key['id'] ?>" onclick="return del_birth();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
            	</tr>
            <?php $i++; } ?>
            </tbody>
        </table> -->

        <table id="view_data" class="table table-bordered">
            <thead>
                <tr style="background: #819bc0; color: #fff;">
                    <th>SN</th>
                    <th>जन्मेको बच्चाको नाम</th>
                    <th>लिङ्ग</th>
                    <th>जन्म मिति</th>
                    <th>बुबाको नाम</th>
                    <th>आमाको नाम</th>
                    <th>जिल्ला</th>
                    <th>गाउँपालिका</th>
                    <th>वडा नं</th>
                    <th>Control</th>
                </tr>
            </thead>

            <tbody>
                <?php
            $i = 1;
            $birth_info = $this->darta_model->get_single_birth_info();
            foreach ($birth_info as $key) {
                // print_r($key['house_no']);
                ?>
                <tr>
                <td><?= $i; ?></td>
                <td><?= $key['child_name_nep'] ?></td>
                <td><?= $key['gender'] ?></td>
                <td><?= $key['birth_date_nep'] ?></td>
                <td><?= $key['father_name_nep'] ?></td>
                <td><?= $key['mother_name_nep'] ?></td>
                <td><?= $key['district'] ?></td>
                <td><?= $key['mun_rm'] ?></td>
                <td><?= $key['ward_no'] ?></td>
                <td><a class="eye-view" href="<?php echo base_url(); ?>darta/delete_birth/<?= $key['birth_id'] ?>" onclick="return del_birth();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
<script type="text/javascript">
    function del_birth(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"darta/delete_birth/"+title+id;
        else
          return false;
        } 
</script>