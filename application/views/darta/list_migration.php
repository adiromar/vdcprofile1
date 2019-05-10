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
				<h4 class="personal_heading mb-4">बसाई सराई दर्ता रेकर्डहरु</h4>

<div class="loading"></div>

        <table id="view_data" class="table table-bordered">
            <thead>
            	<tr style="background: #819bc0; color: #fff;">
            		<th>SN</th>
                    <th>घरमुलीको नाम</th>
            		<th>लिङ्ग</th>
                    <th>आएको/गएको</th>
                    <th>जिल्ला</th>
                    <th>गा.पा. / न.पा.</th>
            		<th>सरेको मिति</th>
            		<th>दर्ता नं</th>
            		<th>Control</th>
            	</tr>
            </thead>

            <tbody>
            	<?php
            $i = 1;
            $mig = $this->darta_model->get_single_migration_info();
            foreach ($mig as $key) {
            	// print_r($key['house_no']);
            	?>
            	<tr>
            	<td><?= $i; ?></td>
                <td><?= $key['household_name'] ?></td>
            	<td><?= $key['household_gender'] ?></td>
                <td><?= $key['in_out'] ?></td>
                <td><?= $key['district'] ?></td>
            	<td><?= $key['mun_vdc'] ?></td>
            	<td><?= $key['migration_date'] ?></td>
            	<td><?= $key['migration_darta_no'] ?></td>
            	<td><a class="eye-view" href="<?php echo base_url(); ?>darta/delete_migration/<?= $key['id'] ?>" onclick="return del_migration();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
    function del_migration(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"darta/delete_deceased/"+title+id;
        else
          return false;
        } 
</script>