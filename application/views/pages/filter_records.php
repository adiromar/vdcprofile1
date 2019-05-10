<?php
     	if (!empty($dataqs)){
     		foreach ($dataqs as $keyq) {
     			echo "<tr>";
                    $id = $keyq['id'];
                    
                       if(!empty($keyq['primary_id'])){
                      unset($keyq['primary_id']);
                                                  
                      }
                      if (!empty($keyq['user_id'])){
                        $user_id_dat = $keyq['user_id'];
                        unset($keyq['user_id']);
                      }
                     foreach ($keyq as $kq) {
                     $ks = str_replace("|_|", ',', $kq);
                      if ($ks != "123_legend"){
                      
                      echo "<td>".$ks."</td>";
                     }
                    }

              // multiple data
                if (!empty($fk)){
                      echo "<td>";
				foreach ($fk as $fkey){
                      $ftbl1 = $fkey['sec_table'];
                     
                      echo '<input type="hidden" id="for_name" value="'.$ftbl1.'">';

                      $fdata = $this->admin_model->get_for_table_data_by_name($ftbl1);
                    
                        foreach ($fdata as $key1){
                          unset($key1['id']);

                          $pri_id = $key1['primary_id'];
                          $pri_dat = $key1['primary_data_id'];

                          if (!empty($key1['primary_data_id'])){
                          if ($key1['primary_data_id'] === $id && $key1['primary_id'] === $dat[0]['id']) 
                          {
                            unset($key1['primary_data_id']);
                            unset($key1['primary_id']);

                            foreach ($key1 as $kkk => $v){
                              if (!empty($v)) {
                              
                              $v = str_replace("|_|", ',', $v);
                              $kkk = ucfirst(str_replace("_", ' ', $kkk));
                              }
                            }
                          }
                        } // empty
                       }
                     } ?>
                <a class="btn btn-warning btn-sm" name="tid" data-id="<?= $id ?>" onclick="launch_comment_modal(<?= $id;?>)">View Multiple</a>
     	<?php
     	echo "</td>"; }
     	$by = $this->page_model->record_inserted_by($user_id_dat);
     	if ($by == true){
            echo "<td>".$by[0]['user_name']."</td>";
        } 
        echo '<td>';
		$duration = $this->page_model->get_duration($dat[0]['id'], $id);
		echo $duration[0]['duration'];
		echo '</td>';
        ?>
        <td><a href="<?php echo base_url(); ?>pages/edit_table_by_id/<?= $dat[0]['id'] ?>/<?= $form_name ?>/<?= $id; ?>"><i class="fas fa-edit"></i></a></td>

        <!-- <td class="shows">Response<?= $dat[0]['title'] ?></td> -->

    </tr>
     <?php }
     	}else{
     		echo "<td colspan='3' style='color: red'>Record Empty</td>";
     	}

?>
<input type="hidden" name="table_name" id="table_name" value="<?= $dat[0]['title'] ?>">

<script type="text/javascript">
	   $('#compose-modals').modal({ show: false});
    function launch_comment_modal(id){
    	
      var values = {
        'id' : id,
        'name': document.getElementById('table_name').value,
        'for_name': document.getElementById('for_name').value,
      };
      
      // console.log(values);
      
       $.ajax({
          type: "POST",
          url: "<?= base_url(); ?>pages/multiple_fetch",
          // dataType: 'JSON',
          data: values,
          success: function(resp){
          $('#click_it').click();
          $(".modal-content").html(resp);
        // console.log(resp);
           },
    });
 }
</script>