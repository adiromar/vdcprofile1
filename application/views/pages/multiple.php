
 <div class="mt-5"> 
        <div class="offset-2 col-md-8" style="padding: 25px; background: #fff;">
          <div class="heading_title">  
            <h4 style='text-align: center; color: red;'>Multiple Form</h4>
        </div> 
            <ul class="list-items">
        <?php
               $table = $this->page_model->get_mul_table_names();
             
               foreach ($table as $key) {
                // print_r($table);die;
               $tbl_id = $key['id'];
               $tbl_title = $key['title'];
               $tbl_title1 = $key['display_name'];               
                ?>
                <li class="home_form1"><i class="fas fa-angle-double-right"></i> <a href="<?php echo base_url(); ?>pages/get_table_by_id/<?= $tbl_id ?>"><?= $tbl_title1 ?></a>
                </li>

            <?php }  ?>
            </ul>
        </div>
    </div> 


