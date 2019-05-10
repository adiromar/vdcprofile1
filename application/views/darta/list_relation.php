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
                <h4 class="personal_heading mb-4">नाता प्रमाणित रेकर्डहरु</h4>

<div class="loading"></div>
    
        <table id="view_data" class="table table-bordered">
            <thead>
                <tr style="background: #819bc0; color: #fff;">
                    <th>क्र.सं.</th>
                    <th>पहिलो सदस्यको नाम</th>
                    <th>लिङ्ग</th>
                    <th>नाता</th>
                    <th>दोस्रो सदस्यको नाम</th>
                    <th>लिङ्ग</th>
                    <th>Control</th>
                </tr>
            </thead>

            <tbody>
                <?php
            $i = 1;
            $rel = $this->darta_model->get_relation_darta_info();
            foreach ($rel as $key) {
                // print_r($key['house_no']);
                ?>
                <tr>
                <td><?= $i; ?></td>
                <td><?= $key['first_member_name'] ?></td>
                <td><?= $key['first_memb_gender'] ?></td>
                <td><?= $key['relation_first'] . ' - ' . $key['relation_second'] ?></td>
                <td><?= $key['sec_memb_name'] ?></td>
                <td><?= $key['sec_memb_gender'] ?></td>
                <td><a class="eye-view" href="<?php echo base_url(); ?>darta/delete_relation/<?= $key['id'] ?>" onclick="return del_relation();"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
    function del_relation(){
       // alert(title);
        var r=confirm("Confirm Delete this Data?")
        if (r==true)
          window.location = url+"darta/delete_relation/"+title+id;
        else
          return false;
        } 
</script>