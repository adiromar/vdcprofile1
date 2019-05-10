<div id="page-content-wrapper" style="padding: 5px; background-color: #fff">
    <div class="container-fluid mt-2">

<?php if($this->session->flashdata('deleted')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('deleted').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('update')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('update').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('error')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('error').'</p>';
  endif; ?>
  <?php if($this->session->flashdata('not_deleted')):
    echo '<p style="text-align: center" class="alert alert-success">'.$this->session->flashdata('not_deleted').'</p>';
  endif; ?>

    <div class="row">
  		<div class="col-md-12">
  			<div class="tile_front1">
        		<div class="tile-body">
				<h4 class="personal_heading mt-3 mb-4">बिबाह दर्ता रेकर्डहरु</h4>

<div class="loading"></div>

<!--         <table id="view_data" class="table table-bordered">
            <thead>
            	<tr style="background: #819bc0; color: #fff;">
            		<th>क्र.सं.</th>
                    <th>पतिको नाम</th>
            		<th>पतिको नागरिकता नं</th>
                    <th>पत्नीको नाम</th>
            		<th>पत्नीको नागरिकता नं</th>
            		<th>बिबाह दर्ता नं</th>
                    <th>बिबाह भएको मिति (वि.स्)</th>
            		<th>Control</th>
            	</tr>
            </thead>

            <tbody>
            	<?php
            $i = 1;
            $marr = $this->darta_model->get_single_marriage_info();
            foreach ($marr as $key) {
            	// print_r($key['house_no']);
            	?>
            	<tr>
            	<td><?= $i; ?></td>
                <td><?= $key['husband_name'] ?></td>
            	<td><?= $key['husband_cit_no'] ?></td>
            	<td><?= $key['wife_name'] ?></td>
            	<td><?= $key['wife_cit_no'] ?></td>
            	<td><?= $key['darta_no'] ?></td>
                <td><?= $key['married_date'] ?></td>
            	<td><a class="eye-view" href="<?php echo base_url(); ?>darta/delete_marriage/<?= $key['id'] ?>" onclick="return del_marriage();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
            	</tr>
            <?php $i++; } ?>
            </tbody>
        </table> -->

<!-- ***********************   Updated form data ********** -->

        <table id="view_data" class="table table-bordered">
            <thead>
                <tr style="background: #819bc0; color: #fff;">
                    <th>क्र.सं.</th>
                    <th>पतिको नाम</th>
                    <th>पतिको नागरिकता नं</th>
                    <th>पत्नीको नाम</th>
                    <th>पत्नीको नागरिकता नं</th>
                    <th>बिबाह दर्ता नं</th>
                    <th>बिबाह भएको मिति (वि.स्)</th>
                    <th>Control</th>
                </tr>
            </thead>

            <tbody>
                <?php
            $i = 1;
            $marr = $this->darta_model->get_single_marriage_info2();
            foreach ($marr as $key) {
                // print_r($key['house_no']);
                ?>
                <tr>
                <td><?= $i; ?></td>
                <td><?= $key['husband_name_nep'] ?></td>
                <td><?= $key['husband_cit_no'] ?></td>
                <td><?= $key['wife_name_nep'] ?></td>
                <td><?= $key['wife_cit_no'] ?></td>
                <td><?= $key['marr_darta_no'] ?></td>
                <td><?= $key['married_date'] ?></td>
                <td>
                    <a class="eye-view" href="<?php echo base_url(); ?>darta/edit_marriage/<?= $key['id'] ?>"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button></a>
                    <a class="eye-view" href="<?php echo base_url(); ?>darta/delete_marriage/<?= $key['id'] ?>" onclick="return del_marriage();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
    function del_marriage(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"darta/delete_marriage/"+title+id;
        else
          return false;
        } 
</script>