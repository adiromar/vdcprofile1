<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		// $this->load->library('nepali_calendar');
		$this->load->model('post_model');
		// include('nepali_calendar.php');
	}	


public function insert()
{		
		$str = $_POST['str'];
		$str = explode("/", $str, 6);
		$thi = $str[4];
		
		// echo '<pre>';
		// print_r($_POST);die;
		$tablename = $_POST['tablename'];
		$tbl_title = $_POST['tabletitle'];
		if (!empty($_POST['foreign_table'])){
		$foreign_table = $_POST['foreign_table'];
	}
		if (!empty($_POST['field_name']) && !empty($_POST['field_data'])){
		$field_name = $_POST['field_name'];
		$field_dat = $_POST['field_data'];
		$mix = array_combine($field_name, $field_dat);

		unset($_POST['field_name']);
		unset($_POST['field_data']);
	}	
	// static foreign fields
	if (!empty($_POST['district_code'])){
		$dist = $this->input->post('district');
		$dist_code = $this->input->post('district_code');
		$local_unit = $this->input->post('local_unit');
		$unit_code = $this->input->post('unit_code');
		$toles = $this->input->post('toles');
		// $jaladhar_code = $this->input->post('jaladhar_code');
		// $sub_jaladhar = $this->input->post('upa_jaladhar_code');

		unset($_POST['district']);
		unset($_POST['district_code']);
		unset($_POST['toles']);
		unset($_POST['local_unit']);
		unset($_POST['unit_code']);
		// unset($_POST['jaladhar_code']);
		// unset($_POST['upa_jaladhar_code']);

		$condition= array(
		// 'district' => $dist,
		'district_code' => $dist_code,
		// 'local_unit' => $local_unit,
		'unit_code' => $unit_code,
		'tole_code' => $toles,
		// 'jaladhar_code' => $jaladhar_code,
		// 'upa_jaladhar_code' => $sub_jaladhar
	);
}
// statis foreign fields ends
		
		unset($_POST['str']);
		unset($_POST['tablename']);
		unset($_POST['foreign_table']);
		unset($_POST['tabletitle']);

		$data = $_POST;
		// echo '<pre>';
		// print_r($data);
		$this->load->model('post_model');

		foreach ($_POST as $key => $value) 
		{	
			// print_r($key);
			if (is_array($value)) {
			
				if (!empty($value['checkbox']) && is_array($value['checkbox'])) 
				{
					$v = implode('|_|', $value['checkbox']);
					$field_data[$key] = $v;

					unset($_POST[$key]);
					
				}else{

					foreach($value as $single => $k){

	 // echo $single;
	 // echo $k;
	 // echo $key;die;	
						if(!empty($foreign_table)){
						foreach ($foreign_table as $fkey) {

							if ($single == $fkey) {
								$foreign_tbl[$fkey][$key]=$k;

								}
							}
						}
					}
					
				}
			}else{
				$field_data[$key]=$value;
				// if (!empty($mix)){
				// 	$field_data = array_merge($field_data, $mix);
				// }
				if (!empty($condition)){
					$field_data = array_merge($field_data, $condition);
				}
				
				unset($_POST[$key]);	
			
			}
			
		}				
// print_r($field_data); die;
		//Get name of table using ID
		$tname = $this->post_model->get_table_name_by_id($tablename);
		$tname = strtolower($tname);
		
		// $this->post_model->insert_form($tname , $field_data);
		if ($this->post_model->insert_form($tname , $field_data) === true) {
			

			//Get the primary data id
			$result = $this->post_model->get_inserted_primary_data_id($tname)->row();
			$primary_data_id = $result->id;
			
			//foreach foreign table
			// print_r($foreign_tbl);

			
	foreach ($foreign_tbl as $foreignkey => $value) {
// print_r($k);
				// echo '<pre>';
				foreach ($value as $key => $x) {
				$c = count($x);
				// print_r($c);die;

					$first_names = array_column($foreign_tbl, $key);
					// print_r($first_names);die;
					if (is_array($x)) {
						if (!empty($x['checkbox']) && is_array($x['checkbox'])) {
							$xx = implode('|_|', $x['checkbox']);
							$value[$key]=$xx;
						}else{	
					$items = array();
					for ($count = 0; $count < $c; $count++) {
							$res =array_column($value, $count);
						$a = array_keys($value);
						// print_r($res);
						// print_r($a);die;
						$b = array_combine($a,$res);
						$out = array('primary_id' => $tablename);
					$value1 = array_merge($b, $out);
					$arr2 = array('primary_data_id' => $primary_data_id);
					$value1 = array_merge($value1, $arr2);
					
					$items[] = $value1;
				
							}
							
						}
					}	
					// $count++;
				}
				for ($i=0; $i < $c; $i++) { 
				// echo "jasjj<br>";
				$f_tname = $this->post_model->get_table_name_by_id($foreignkey);
				 $insert = $this->post_model->insert_form($f_tname,$items[$i]);
				 // print_r($insert);
				}
			}
			// print_r($items);
			// die();
			

			$this->session->set_flashdata('post_created', 'Record Inserted Successfully');
			redirect ('pages/get_table_by_id/'.$thi.' ');

		}else{
			$this->session->set_flashdata('post_not_created', 'There was some relationship error. Please try again.');
			redirect ('pages/get_table_by_id/'.$thi.' ');
		}
}

public function add_relation(){
	$this->load->model('news_model');
  //echo "add relation ";
// print_r($_POST);die;
 		if(!empty($_POST['sec_tbl']) && $_POST['primary_tbl'] == 'Select')
            {
              	$this->session->set_flashdata('post_not_created', 'Please Select Proper Field List. No relationship added.');
    			redirect ('news/index');
                
            }
            else
            {
 				$sec_table =$this->input->post('sec_tbl');
			    $primary =$this->input->post('primary_tbl');
			    $sec_key =$this->input->post('foreign_tbl');
			    $primary_key =$this->input->post('pr_key');
			    // echo $sec_table;
			    $type = $this->news_model->get_form_type($sec_table);
			    $f_type = $type[0]['form_type'];

			    $data = array(
			        'sec_table'=>$sec_table,
			        'sec_key' => $sec_key,
			        //'primary_key' => $primary_key,
			        'primary_table' =>$primary,
			        'form_type' => $f_type
			    );

			    $this->load->model('post_model');
			    $d = $this->post_model->check_primary_and_foreign_tables($primary, $sec_key);
			    if(empty($d)){

			    	$dd = $this->admin_model->check_relation($sec_key);
			    	if($dd === 0){
				    	$alter = $this->post_model->alter_foreign_table($sec_table);
				    	if ($alter === true) {
	   					$this->db->insert('relationships',$data);
	   					$this->session->set_flashdata('post_created', 'Relationship added to tables.');
	   					}else{
	   					$this->session->set_flashdata('post_not_created', 'There was some error. No relationship added. Please try again.');
	   					}	
			    	}else{
			    		$this->db->insert('relationships',$data);
	   					$this->session->set_flashdata('post_created', 'Relationship added to tables.');
			    	}
   				
			    }else{
			    	$this->session->set_flashdata('post_not_created', 'This relation already exists.');
			    }
			   
  				redirect ('news/index');
 			} 

	}

public function insert_foreign()
{
	// print_r($_POST);
		$str = $_POST['str'];
		$str = explode("/", $str, 6);
		$fir = $str[2];
		$sec = $str[3];
		$thi = $str[4];
		$tgt = $fir. '/' . $sec . '/' . $thi;
		$tablename = $_POST['tablename'];
		
		// $tbl_title = $_POST['tabletitle'];
		
		// $field_name = $_POST['field_name'];
		// $field_data = $_POST['field_data'];
		// print_r($field_data);

		// $com = array_combine($field_name, $field_data);
		// print_r($com);
		
		// $this->post_model->insert_form($tbl_title,$dat);
		echo '<pre>'; 
		// print_r($_POST);die;
		echo '</pre>';

		
		// unset($_POST['table_name']);
		// unset($_POST['table_data']);
		unset($_POST['tablename']);
		unset($_POST['str']);
		// unset($_POST['foreign_table']);
		// unset($_POST['tabletitle']);

		$data = $_POST;
		
		$this->load->model('post_model');

		foreach ($_POST as $key => $value) 
		{	

			if (is_array($value)) {
			
				if (!empty($value['checkbox']) && is_array($value['checkbox'])) 
				{
					$v = implode('|_|', $value['checkbox']);
					$field_data[$key] = $v;

					unset($_POST[$key]);
					
				}else{

					foreach($value as $single => $k){	
						if(!empty($foreign_table)){
						foreach ($foreign_table as $fkey) {

							if ($single == $fkey) {
								$foreign_tbl[$fkey][$key]=$k;

								}
							}
						}
					}
					
				}
			}else{

				$field_data[$key]=$value;
				unset($_POST[$key]);	
			}
			// print_r($value);
		}				

		//Get name of table using ID
		$tname = $this->post_model->get_table_name_by_id($tablename);
		$tname = strtolower($tname);
		
		// $this->post_model->insert_form($tname , $field_data);
		if ($this->post_model->insert_form($tname , $field_data) === true) {
			

			//Get the primary data id
			$result = $this->post_model->get_inserted_primary_data_id($tname)->row();
			$primary_data_id = $result->id;
			
			//foreach foreign table
			// print_r($foreign_tbl);

			$items = array();
	foreach ($foreign_tbl as $foreignkey => $value) {

				// echo '<pre>';
				foreach ($value as $key => $x) {
				$c = count($x);
				// print_r($c);die;

					$first_names = array_column($foreign_tbl, $key);
					// print_r($first_names);die;
					if (is_array($x)) {
						if (!empty($x['checkbox']) && is_array($x['checkbox'])) {
							$xx = implode('|_|', $x['checkbox']);
							$value[$key]=$xx;
						}else{	
					for ($count = 0; $count < $c; $count++) {
							$res =array_column($value, $count);
						$a = array_keys($value);
						$b = array_combine($a,$res);
						$out = array('primary_id' => $tablename);
					$value1 = array_merge($b, $out);
					$arr2 = array('primary_data_id' => $primary_data_id);
					$value1 = array_merge($value1, $arr2);
					
					$items[] = $value1;
				
							}
							
						}
					}	
					// $count++;

				}				
			}
			// print_r($items);die;

			for ($i=0; $i < $c; $i++) { 
				echo "jasjj<br>";
				$f_tname = $this->post_model->get_table_name_by_id($foreignkey);
				 $this->post_model->insert_form($f_tname,$items[$i]);
			}
			// die();
			

			$this->session->set_flashdata('post_created', 'Record Inserted in <strong>'.$tname.'</strong> table & <strong>'.$f_tname.'</strong> table');
			redirect ($tgt);

		}else{
			$this->session->set_flashdata('post_not_created', 'There was some relationship error. Please try again.');
			redirect ('pages/foreign');
		}
}


	public function update()
{
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		// echo '<pre>'; 
		// print_r($_POST);die;
		// echo '</pre>';
		
		$tablename = $_POST['tablename'];
		$foreign_table = $_POST['foreign_table'];
		$table_id = $_POST['tableid'];
		$p_title = $_POST['p_title'];
		$p_id = $_POST['p_id'];
		// echo $p_title;echo $table_id;die;
		$foreign_table_id = $_POST['foreign_table_id'];
		$u = implode(' ', $foreign_table_id);
		$v = explode(' ', $u);
		$idd = array($v[0]);

		$for_tbl_ids = array_combine($foreign_table, $foreign_table_id);
		$tbl_records = array();
    		foreach ($foreign_table as $i => $k) {
        		$tbl_records[$k][] = $foreign_table_id[$i];
    		}
		// print_r($v);
		if (!empty($_POST['field_name']) && !empty($_POST['field_data'])){
		// if (!empty($_POST['field_name'] && $_POST['field_data'])){
		$field_name = $_POST['field_name'];
		$field_dat = $_POST['field_data'];
		$mix = array_combine($field_name, $field_dat);
		
		unset($_POST['field_name']);
		unset($_POST['field_data']);
	}

		// static foreign fields
	if (!empty($_POST['district'])){
		$dist = $_POST['district'];
		$dist_code = $_POST['district_code'];
		$unit_code = $_POST['unit_code'];
		$tole_code = $_POST['tole_code'];
		// $jaladhar_code = $_POST['jaladhar_code'];
		// $sub_jaladhar = $_POST['upa_jaladhar_code'];

		unset($_POST['district']);
		unset($_POST['district_code']);
		unset($_POST['tole_code']);
		unset($_POST['unit_code']);
		// unset($_POST['jaladhar_code']);
		// unset($_POST['upa_jaladhar_code']);

		$condition= array(
		// 'district' => $dist,
		'district_code' => $dist_code,
		'unit_code' => $unit_code,
		'tole_code' => $tole_code,
		// 'jaladhar_code' => $jaladhar_code,
		// 'upa_jaladhar_code' => $sub_jaladhar
	);
}
// statis foreign fields ends

		unset($_POST['tablename']);
		unset($_POST['foreign_table']);
		unset($_POST['foreign_table_id']);
		unset($_POST['tableid']);
		unset($_POST['p_title']);
		unset($_POST['p_id']);
		
		$data = $_POST;
		// print_r($data);
		$this->load->model('post_model');

		foreach ($_POST as $key => $value) 
		{	
			
			if (is_array($value)) {
			
				if (!empty($value['checkbox']) && is_array($value['checkbox'])) 
				{
					$v = implode('|_|', $value['checkbox']);
					$field_data[$key] = $v;

					unset($_POST[$key]);
					
				}else{
					
					foreach($value as $single => $k){

	 //echo $single;
	 //echo $k;
	 //echo $key;		
						if(!empty($foreign_table)){
						foreach ($foreign_table as $fkey) {

							if ($single == $fkey) {
								$foreign_tbl[$fkey][$key]=$k;

								}
							}
						}
					}
				  
				}
			}else{

				$field_data[$key]=$value;
				if (!empty($mix)){
					$field_data = array_merge($field_data, $mix);
				}
				if (!empty($condition)){
					$field_data = array_merge($field_data, $condition);
				}
				unset($_POST[$key]);	
			}
			
		}	
		//Get name of table using ID
		$tname = $this->post_model->get_table_name_by_id($tablename);
		$tname = strtolower($tname);
		
		// $this->post_model->insert_form($tname , $field_data);
		if ($this->post_model->update_form($tname , $field_data, $table_id) === true) {
			

			//Get the primary data id
			$result = $this->post_model->get_inserted_primary_data_id($tname)->row();
			$primary_data_id = $result->id;
			
			//foreach foreign table
			// print_r($foreign_tbl);die;

	foreach ($foreign_tbl as $foreignkey => $value) {

		// print_r($foreignkey);
				// echo '<pre>';	
				foreach ($value as $key => $x) {
				$c = count($x);
				$count_no = count($x);
				// print_r($c);
				// print_r($value);
					$first_names = array_column($foreign_tbl, $key);
					// print_r($first_names);
					if (is_array($x)) {
						// print_r($x);
						if (!empty($x['checkbox']) && is_array($x['checkbox'])) {
							$xx = implode('|_|', $x['checkbox']);
							$value[$key]=$xx;
							// print_r($xx);
							// unset($value[$key]);
						}
						else{

					// print_r($value);
					$items = array();
					for ($count = 0; $count < $c; $count++) {
						if (is_array($value)) {
						$res =array_column($value, $count);
						}
						$a = array_keys($value);
						$b = array_combine($a,$res);
						$items[] = $b;
				
							} // for loop
							
						} // else part

					} 
					$items[] = $value;

					
				} // value
				$no = $idd[0];
				$ff_id = array();
				foreach ($tbl_records as $records => $rec_id) {
					if ($records == $foreignkey){
					// print_r($tbl_records[$records]);
					$uu = $tbl_records[$records];
					$ff_id[] = $rec_id;
					}
				}
				// print_r($items);die;
				for ($i=0; $i < $c; $i++) { 				
				 $f_tname = $this->post_model->get_table_name_by_id($foreignkey);
				 $this->post_model->update_form($f_tname,$items[$i], $uu[$i]);
				
				}
	
			}
			
		
			// die();
			if ($user_type == 'Normal' || $user_type == 'User'){
				$this->session->set_flashdata('post_updated', 'Record updated in <strong>'.$tname.'</strong> table with Id '.$table_id.' ');
				redirect ('pages/edit_table_by_id/'.$p_id.'/'.$p_title.'/'.$table_id.'');
			}

			$this->session->set_flashdata('post_updated', 'Record updated in <strong>'.$tname.'</strong> table with Id '.$table_id.' ');
			redirect ('pages/edit_table_by_id/'.$p_id.'/'.$p_title.'/'.$table_id.'');

		}else{
			$this->session->set_flashdata('update_error', 'There was some relationship error. Please try again.');
			redirect ('pages/edit_table_by_id/'.$p_id.'/'.$p_title.'/'.$table_id.'');
		}
	}


	public function insert_dis(){

			if(isset($_POST['btnsubmit'])){
	echo '<pre>';
	// print_r($_POST);die;
	if (empty($_POST['state_code'])){
		$this->session->set_flashdata('error', 'Data empty');
		redirect ('pages/localunit');
	}else{
	$state_name = $this->input->post('state_name');
	$state_code = $this->input->post('state_code');
	$district_name = $this->input->post('district_name');
	$district_code = $this->input->post('district_code');
	$local_unit = $this->input->post('local_unit');
	$unit_code = $this->input->post('unit_code');

	$tole_name = $this->input->post('tole_name');
	$tole_code = $this->input->post('tole_code');
	$jaladhar_name = $this->input->post('jaladhar_name');
	$jaladhar_code = $this->input->post('jaladhar_code');
	$sub_jaladhar_name = $this->input->post('sub_jaladhar_name');
	$sub_jaladhar_code = $this->input->post('sub_jaladhar_code');

// print_r($jaladhar_code);
	$no =count($local_unit);
	$tol_no =count($tole_name);
	$jal_no =count($jaladhar_name);
	$upa_no =count($sub_jaladhar_name);
	// echo $upa_no;die;
	$dis_data= array(
		'state' => $state_name,
		'state_code' => $state_code,
		'district' => $district_name,
		'district_code' => $district_code
	);

	$tname = 'district_profile';
	$insert_dis = $this->post_model->insert_form($tname, $dis_data);

	$result = $this->post_model->get_inserted_primary_data_id($tname)->row();
			$primary_data_id = $result->id;
	// $temp = array();
	for ($j=0; $j < $no; $j++) { 
	$unit_data[$j] = array(
		'local_unit' => $local_unit[$j],
		'unit_code' => $unit_code[$j],
		'district_name' => $district_name,
		'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
		if(!empty($local_unit[$j])){
			$insert_tole = $this->post_model->insert_form('unit_table' , $unit_data[$j]);
		}else{
			echo "Empty";
		}
	 }

	for ($k=0; $k < $tol_no; $k++) { 
	$tole_data[$k] = array(
		'tole_name' => $tole_name[$k],
		'tole_code' => $tole_code[$k],
		// 'district_name' => $district_name,
		// 'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
		if(!empty($tole_name[$k])){
			$insert_tole = $this->post_model->insert_form('tole_table' , $tole_data[$k]);
		}else{
			echo "Empty";
		}
	 }

	for ($k=0; $k < $jal_no; $k++) { 
	$jala_data[$k] = array(
		'jaladhar_name' => $jaladhar_name[$k],
		'jaladhar_code' => $jaladhar_code[$k],
		'dis_table_id' => $primary_data_id
		);  
		if(!empty($jaladhar_code[$k])){
			$insert_jal = $this->post_model->insert_form('t_jaladhar_table' , $jala_data[$k]);
		}else{
			echo "Empty";
		}
}
	for ($u=0; $u < $upa_no; $u++) { 
	$upa_data[$u] = array(
		'upa_jaladhar_name' => $sub_jaladhar_name[$u],
		'upa_jaladhar_code' => $sub_jaladhar_code[$u],
		'dis_table_id' => $primary_data_id
		);
	// print_r($upa_data[$u]);die;
		if(!empty($sub_jaladhar_name[$u])){
			$insert_upa = $this->post_model->insert_form('t_upa_jaladhar_table' , $upa_data[$u]);
		}else{
			echo "Empty";
		}
  }	
		if ($insert_dis == true && $insert_unit == true || $insert_tole == true ){
			$this->session->set_flashdata('record_inserted', 'Record inserted Successfully ');
			redirect('pages/localunit');
				}

			}
		  }
	}


	public function update_dis(){

	if(isset($_POST['btnsubmit'])){
	echo '<pre>';
	// print_r($_POST);die;
	$link_id = $this->input->post('link_id');
	$state_name = $this->input->post('state_name');
	$state_code = $this->input->post('state_code');
	$district_name = $this->input->post('district_name');
	$district_code = $this->input->post('district_code');

	$local_unit = $this->input->post('local_unit');
	$unit_code = $this->input->post('unit_code');
	$local_units = $this->input->post('local_units');
	$unit_codes = $this->input->post('unit_codes');
	$unit_id = $this->input->post('tbl_id');

	$tole_name = $this->input->post('tole_name');
	$tole_code = $this->input->post('tole_code');
	$tole_names = $this->input->post('tole_names');
	$tole_codes = $this->input->post('tole_codes');
	$tole_id = $this->input->post('tole_id');

	$jaladhar_name = $this->input->post('jaladhar_name');
	$jaladhar_code = $this->input->post('jaladhar_code');
	$jaladhar_names = $this->input->post('jaladhar_names');
	$jaladhar_codes = $this->input->post('jaladhar_codes');
	$jala_id = $this->input->post('jala_id');

	$sub_jaladhar_name = $this->input->post('sub_jaladhar_name');
	$sub_jaladhar_code = $this->input->post('sub_jaladhar_code');
	$sub_jaladhar_names = $this->input->post('sub_jaladhar_names');
	$sub_jaladhar_codes = $this->input->post('sub_jaladhar_codes');
	$sub_id = $this->input->post('sub_id');

// print_r($jaladhar_code);
	$no =count($local_unit);
	$unit_new =count($local_units);
	$tol_no =count($tole_name);
	$tol_no_new =count($tole_names);
	$jal_no =count($jaladhar_name);
	$jal_no_new =count($jaladhar_names);
	$upa_no =count($sub_jaladhar_name);
	$upa_no_new =count($sub_jaladhar_names);
	// echo $no;die;
	$dis_data= array(
		'state' => $state_name,
		'state_code' => $state_code,
		'district' => $district_name,
		'district_code' => $district_code
	);

	$tname = 'district_profile';
	$insert_dis = $this->post_model->update_form($tname, $dis_data, $link_id);

	$result = $this->post_model->get_inserted_primary_data_id($tname)->row();
			$primary_data_id = $result->id;
			// echo $primary_data_id;
	// $temp = array();
	for ($j=0; $j < $no; $j++) { 
	$unit_data[$j] = array(
		'local_unit' => $local_unit[$j],
		'unit_code' => $unit_code[$j],
		'district_name' => $district_name,
		'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
	// print_r($unit_data[$j]);die;
		if(!empty($local_unit[$j])){
			$insert_unit = $this->post_model->update_form('unit_table' , $unit_data[$j], $unit_id[$j]);
			// print_r($insert_tole);
		}else{
			echo "Empty";
		}
	 }
	 for ($jj=0; $jj < $unit_new; $jj++) {
	 $unit_data_new[$jj] = array(
		'local_unit' => $local_units[$jj],
		'unit_code' => $unit_codes[$jj],
		'district_name' => $district_name,
		'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
	 // print_r($unit_data_new[$jj]);die;
	$insert_units = $this->post_model->insert_form('unit_table' , $unit_data_new[$jj]);
		}

	for ($k=0; $k < $tol_no; $k++) { 
	$tole_data[$k] = array(
		'tole_name' => $tole_name[$k],
		'tole_code' => $tole_code[$k],
		// 'district_name' => $district_name,
		// 'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
		if(!empty($tole_name[$k])){
			$insert_tole = $this->post_model->update_form('tole_table' , $tole_data[$k], $tole_id[$k]);
		}else{
			echo "Empty";
		}
	 }
	 for ($kk=0; $kk < $tol_no_new; $kk++) { 
	 $tole_datas[$kk] = array(
		'tole_name' => $tole_names[$kk],
		'tole_code' => $tole_codes[$kk],
		// 'district_name' => $district_name,
		// 'district_code' => $district_code,
		'dis_table_id' => $primary_data_id
		); 
	 $insert_toles = $this->post_model->insert_form('tole_table' , $tole_datas[$kk]);
	}

	for ($k=0; $k < $jal_no; $k++) { 
	$jala_data[$k] = array(
		'jaladhar_name' => $jaladhar_name[$k],
		'jaladhar_code' => $jaladhar_code[$k],
		'dis_table_id' => $primary_data_id
		);  
		if(!empty($jaladhar_code[$k])){
			$insert_jal = $this->post_model->update_form('t_jaladhar_table' , $jala_data[$k], $jala_id[$k]);
		}else{
			echo "Empty";
		}
	}
	for ($kl=0; $kl < $jal_no_new; $kl++) { 
	$jala_datas[$kl] = array(
		'jaladhar_name' => $jaladhar_names[$kl],
		'jaladhar_code' => $jaladhar_codes[$kl],
		'dis_table_id' => $primary_data_id
		);  
		$insert_jals = $this->post_model->insert_form('t_jaladhar_table' , $jala_datas[$kl]);
		}

	for ($u=0; $u < $upa_no; $u++) { 
	$upa_data[$u] = array(
		'upa_jaladhar_name' => $sub_jaladhar_name[$u],
		'upa_jaladhar_code' => $sub_jaladhar_code[$u],
		'dis_table_id' => $primary_data_id
		);
	// print_r($upa_data[$u]);die;
		if(!empty($sub_jaladhar_name[$u])){
			$insert_upa = $this->post_model->update_form('t_upa_jaladhar_table' , $upa_data[$u], $sub_id[$u]);
		}else{
			echo "Empty";
		}
  }	
  		for ($uu=0; $uu < $upa_no_new; $uu++) { 
	$upa_datas[$uu] = array(
		'upa_jaladhar_name' => $sub_jaladhar_names[$uu],
		'upa_jaladhar_code' => $sub_jaladhar_codes[$uu],
		'dis_table_id' => $primary_data_id
		);
			$insert_upas = $this->post_model->insert_form('t_upa_jaladhar_table' , $upa_datas[$uu]);
		}

		if ($insert_dis == true || $insert_unit == true || $insert_tole == true ){
			$this->session->set_flashdata('record_inserted', 'Record Updated Successfully ');
			redirect('pages/edit_unit/'.$link_id.' ');
				}
			}
	}

// next sa18

	public function insert18(){
		$this->load->model('post_model');
			$user_id = $this->session->userdata("user_id");
			echo '<pre>';
		// print_r($_POST);die;
		if(isset($_POST["save_record"]))
		{
			$festival_name = $this->input->post("festival_name");
			$attendance_condition_festival_time = $this->input->post("attendance_condition_festival_time");
			$effect_working_days = $this->input->post("effect_working_days");
			$months = $this->input->post("months");
			$datas = array("ward_no"=>$this->input->post("ward_no"),
							"main_langauge"=>$this->input->post("main_langauge"),
							"main_religion_community"=>$this->input->post("main_religion_community"),
							"litterate_rate_male"=>$this->input->post("litterate_rate_male"),
							"litterate_rate_female"=>$this->input->post("litterate_rate_female"),
							"primary_school_available"=>$this->input->post("primary_school_available"),
							"primary_school_no"=>$this->input->post("primary_school_no"),
							"primary_school_nearest_palce"=>$this->input->post("primary_school_nearest_palce"),
							"primary_school_nearest_reach_time"=>$this->input->post("primary_school_nearest_reach_time"),
							"lower_secondary_school_avaliable"=>$this->input->post("lower_secondary_school_avaliable"),
							"lower_secondary_school_no"=>$this->input->post("lower_secondary_school_no"),
							"lower_secondary_school_nearest_place"=>$this->input->post("lower_secondary_school_nearest_place"),
							"lower_secondary_school_reach_time"=>$this->input->post("lower_secondary_school_reach_time"),
							"secondary_school_avaliable"=>$this->input->post("secondary_school_avaliable"),
							"secondary_school_no"=>$this->input->post("secondary_school_no"),
							"secondary_school_nearest_place"=>$this->input->post("secondary_school_nearest_place"),
							"secondary_school_nearest_reach_time"=>$this->input->post("secondary_school_nearest_reach_time"),
							"higher_secondary_school_avaliable"=>$this->input->post("higher_secondary_school_avaliable"),
							"higher_secondary_school_no"=>$this->input->post("higher_secondary_school_no"),
							"higher_secondary_school_nearest_place"=>$this->input->post("higher_secondary_school_nearest_place"),
							"higher_secondary_nearest_reach_time"=>$this->input->post("higher_secondary_nearest_reach_time"),
							"sub_health_post_avaliable"=>$this->input->post("sub_health_post_avaliable"),
							"sub_health_post_nearest_place"=>$this->input->post("sub_health_post_nearest_place"),
							"sub_health_post_nearest_reach_time"=>$this->input->post("sub_health_post_nearest_reach_time"),
							"sub_health_post_no"=>$this->input->post("sub_health_post_no"),
							"animal_service_center_avaliable"=>$this->input->post("animal_service_center_avaliable"),
							"animal_service_center_no"=>$this->input->post("animal_service_center_no"),
							"animal_service_center_nearest_place"=>$this->input->post("animal_service_center_nearest_place"),
							"animal_service_center_nearest_reach_time"=>$this->input->post("animal_service_center_nearest_reach_time"),
							"agro_service_avaliable"=>$this->input->post("agro_service_avaliable"),
							"agro_service_no"=>$this->input->post("agro_service_no"),
							"agro_service_nearest_place"=>$this->input->post("agro_service_nearest_place"),
							"agro_service_nearest_reach_time"=>$this->input->post("agro_service_nearest_reach_time"),
							"post_office_avaliable"=>$this->input->post("post_office_avaliable"),
							"post_office_no"=>$this->input->post("post_office_no"),
							"post_office_nearest_place"=>$this->input->post("post_office_nearest_place"),
							"post_office_nearest_reach_time"=>$this->input->post("post_office_nearest_reach_time"),
							"police_offcie_avaliable"=>$this->input->post("police_offcie_avaliable"),
							"police_offcie_no"=>$this->input->post("police_offcie_no"),
							"police_office_nearest_place"=>$this->input->post("police_office_nearest_place"),
							"police_offcie_nearest_reach_time"=>$this->input->post("police_offcie_nearest_reach_time"),
							"source_center_avaliable"=>$this->input->post("source_center_avaliable"),
							"source_center_no"=>$this->input->post("source_center_no"),
							"source_center_nearest_place"=>$this->input->post("source_center_nearest_place"),
							"source_center_nearest_reach_time"=>$this->input->post("source_center_nearest_reach_time"),
							"bank_avaliable"=>$this->input->post("bank_avaliable"),
							"bank_no"=>$this->input->post("bank_no"),
							"bank_nearest"=>$this->input->post("bank_nearest"),
							"bank_nearest_reach_time"=>$this->input->post("bank_nearest_reach_time"),
							"cooperative_avaliable"=>$this->input->post("cooperative_avaliable"),
							"cooperative_no"=>$this->input->post("cooperative_no"),
							"cooperative_nearest_place"=>$this->input->post("cooperative_nearest_place"),
							"cooperative_nearest_reach_time"=>$this->input->post("cooperative_nearest_reach_time"),
							"telephone_avaliable"=>$this->input->post("telephone_avaliable"),
							"telephone_no"=>$this->input->post("telephone_no"),
							"telephone_nearest_place"=>$this->input->post("telephone_nearest_place"),
							"telephone_nearest_reach_time"=>$this->input->post("telephone_nearest_reach_time"),
							"electricity_authority_avaliable"=>$this->input->post("electricity_authority_avaliable"),
							"electricity_authority_no"=>$this->input->post("electricity_authority_no"),
							"electricity_authority_nearest_place"=>$this->input->post("electricity_authority_nearest_place"),
							"electricity_nearest_reach_time"=>$this->input->post("electricity_nearest_reach_time"),
							"community_org_avaliable"=>$this->input->post("community_org_avaliable"),
							"community_org_no"=>$this->input->post("community_org_no"),
							"community_org_nearest_place"=>$this->input->post("community_org_nearest_place"),
							"community_org_nearest_reach_time"=>$this->input->post("community_org_nearest_reach_time"),
							"skilled_mistri_wages_daily"=>$this->input->post("skilled_mistri_wages_daily"),
							"skilled_mistri_dalit_male"=>$this->input->post("skilled_mistri_dalit_male"),
							"skilled_mistri_dalit_female"=>$this->input->post("skilled_mistri_dalit_female"),
							"skilled_mistri_janajati_male"=>$this->input->post("skilled_mistri_janajati_male"),
							"skilled_mistri_janajati_female"=>$this->input->post("skilled_mistri_janajati_female"),
							"skilled_mistri_other_male"=>$this->input->post("skilled_mistri_other_male"),
							"skilled_mistri_other_female"=>$this->input->post("skilled_mistri_other_female"),
							"maintenance_worker_wages_daily"=>$this->input->post("maintenance_worker_wages_daily"),
							"maintenance_worker_dalit_male"=>$this->input->post("maintenance_worker_dalit_male"),
							"maintenance_worker_dalit_female"=>$this->input->post("maintenance_worker_dalit_female"),
							"maintenance_worker_janajati_male"=>$this->input->post("maintenance_worker_janajati_male"),
							"maintenance_worker_janajati_female"=>$this->input->post("maintenance_worker_janajati_female"),
							"maintenance_worker_other_male"=>$this->input->post("maintenance_worker_other_male"),
							"maintenance_worker_other_female"=>$this->input->post("maintenance_worker_other_female"),
							"local_toilet_developer_wages_daily"=>$this->input->post("local_toilet_developer_wages_daily"),
							"local_toilet_developer_dalit_male"=>$this->input->post("local_toilet_developer_dalit_male"),
							"local_toilet_developer_dalit_female"=>$this->input->post("local_toilet_developer_dalit_female"),
							"local_toilet_developer_janajati_male"=>$this->input->post("local_toilet_developer_janajati_male"),
							"local_toilet_developer_janajati_female"=>$this->input->post("local_toilet_developer_janajati_female"),
							"local_toilet_developer_other_male"=>$this->input->post("local_toilet_developer_other_male"),
							"local_toilet_developer_other_female"=>$this->input->post("local_toilet_developer_other_female"),
							"carpenter_wages_daily"=>$this->input->post("carpenter_wages_daily"),
							"carpenter_dalit_male"=>$this->input->post("carpenter_dalit_male"),
							"carpenter_dalit_female"=>$this->input->post("carpenter_dalit_female"),
							"carpenter_janajati_male"=>$this->input->post("carpenter_janajati_male"),
							"carpenter_janajati_female"=>$this->input->post("carpenter_janajati_female"),
							"carpenter_other_male"=>$this->input->post("carpenter_other_male"),
							"carpenter_other_female"=>$this->input->post("carpenter_other_female"),
							"electrician_wages_daily"=>$this->input->post("electrician_wages_daily"),
							"electrician_dalit_male"=>$this->input->post("electrician_dalit_male"),
							"electrician_dalit_female"=>$this->input->post("electrician_dalit_female"),
							"electrician_janajati_male"=>$this->input->post("electrician_janajati_male"),
							"electrician_janajati_female"=>$this->input->post("electrician_janajati_female"),
							"electrician_other_male"=>$this->input->post("electrician_other_male"),
							"electrician_other_female"=>$this->input->post("electrician_other_female"),
							"sky_pot_developer_wages_daily"=>$this->input->post("sky_pot_developer_wages_daily"),
							"sky_pot_developer_dalit_male"=>$this->input->post("sky_pot_developer_dalit_male"),
							"sky_pot_developer_dalit_female"=>$this->input->post("sky_pot_developer_dalit_female"),
							"sky_pot_developer_janjati_male"=>$this->input->post("sky_pot_developer_janjati_male"),
							"sky_pot_developer_janjati_female"=>$this->input->post("sky_pot_developer_janjati_female"),
							"sky_pot_developer_other_male"=>$this->input->post("sky_pot_developer_other_male"),
							"sky_pot_developer_other_female"=>$this->input->post("sky_pot_developer_other_female"),
							"women_health_volunteer_wages_daily"=>$this->input->post("women_health_volunteer_wages_daily"),
							"women_health_volunteer_dalit_male"=>$this->input->post("women_health_volunteer_dalit_male"),
							"women_health_volunteer_dalit_female"=>$this->input->post("women_health_volunteer_dalit_female"),
							"women_health_volunteer_janajati_male"=>$this->input->post("women_health_volunteer_janajati_male"),
							"women_health_volunteer_janajati_female"=>$this->input->post("women_health_volunteer_janajati_female"),
							"women_health_volunteer_other_male"=>$this->input->post("women_health_volunteer_other_male"),
							"women_health_volunteer_other_female"=>$this->input->post("women_health_volunteer_other_female"),
							"water_technician_wages_daily"=>$this->input->post("water_technician_wages_daily"),
							"water_technician_dalit_male"=>$this->input->post("water_technician_dalit_male"),
							"water_technician_dalit_female"=>$this->input->post("water_technician_dalit_female"),
							"water_technician_janjati_male"=>$this->input->post("water_technician_janjati_male"),
							"water_technician_janajati_female"=>$this->input->post("water_technician_janajati_female"),
							"water_technician_other_male"=>$this->input->post("water_technician_other_male"),
							"water_technician_other_female"=>$this->input->post("water_technician_other_female"),
							"agro_technician_wages_daily"=>$this->input->post("agro_technician_wages_daily"),
							"agro_technician_dalit_male"=>$this->input->post("agro_technician_dalit_male"),
							"agro_technician_dalit_female"=>$this->input->post("agro_technician_dalit_female"),
							"agro_technician_janajati_male"=>$this->input->post("agro_technician_janajati_male"),
							"agro_technician_janajati_female"=>$this->input->post("agro_technician_janajati_female"),
							"agro_technician_other_male"=>$this->input->post("agro_technician_other_male"),
							"agro_technician_other_female"=>$this->input->post("agro_technician_other_female"),
							"animal_health_technician_wages_daily"=>$this->input->post("animal_health_technician_wages_daily"),
							"animal_health_technician_dalit_male"=>$this->input->post("animal_health_technician_dalit_male"),
							"animal_health_technician_dalit_female"=>$this->input->post("animal_health_technician_dalit_female"),
							"animal_health_technician_janajati_male"=>$this->input->post("animal_health_technician_janajati_male"),
							"animal_health_technician_janajati_female"=>$this->input->post("animal_health_technician_janajati_female"),
							"animal_health_technician_other_male"=>$this->input->post("animal_health_technician_other_male"),
							"animal_health_technician_other_female"=>$this->input->post("animal_health_technician_other_female"),
							"social_mobilizer_wages_daily"=>$this->input->post("social_mobilizer_wages_daily"),
							"social_mobilizer_dalit_male"=>$this->input->post("social_mobilizer_dalit_male"),
							"social_mobilizer_dalit_female"=>$this->input->post("social_mobilizer_dalit_female"),
							"social_mobilizer_janajati_male"=>$this->input->post("social_mobilizer_janajati_male"),
							"social_mobilizer_janajati_female"=>$this->input->post("social_mobilizer_janajati_female"),
							"social_mobilizer_other_male"=>$this->input->post("social_mobilizer_other_male"),
							"social_mobilizer_other_female"=>$this->input->post("social_mobilizer_other_female"),
							"vegetalble_production_household"=>$this->input->post("vegetalble_production_household"),
							"vegetable_narsari_berna_production_household"=>$this->input->post("vegetable_narsari_berna_production_household"),
							"multipurpose_narsari_household"=>$this->input->post("multipurpose_narsari_household"),
							"masala_khetif_household"=>$this->input->post("masala_khetif_household"),
							"seed_production_household"=>$this->input->post("seed_production_household"),
							"mushroom_production_household"=>$this->input->post("mushroom_production_household"),
							"goat_household"=>$this->input->post("goat_household"),
							"chicken_household"=>$this->input->post("chicken_household"),
							"milk_household"=>$this->input->post("milk_household"),
							"dhogo_household"=>$this->input->post("dhogo_household"),
							"gundri_bune_household"=>$this->input->post("gundri_bune_household"),
							"bee_household"=>$this->input->post("bee_household"),
							"fruit_household"=>$this->input->post("fruit_household"),
							"pickle_hosehold"=>$this->input->post("pickle_hosehold"),
							"shoes_production_household"=>$this->input->post("shoes_production_household"),
							"agrovet_household"=>$this->input->post("agrovet_household"),
							"electirc_shop_household"=>$this->input->post("electirc_shop_household"),
							"iron_work_household"=>$this->input->post("iron_work_household"),
							"retailer_household"=>$this->input->post("retailer_household"),
							"hotel_business_household"=>$this->input->post("hotel_business_household"),
							"non_wood_forest_resource_household"=>$this->input->post("non_wood_forest_resource_household"),
							"other_household"=>$this->input->post("other_household"),
							"india_person_no"=>$this->input->post("india_person_no"),
							"india_why"=>$this->input->post("india_why"),
							"india_how_month"=>$this->input->post("india_how_month"),
							"other_country_person_no"=>$this->input->post("other_country_person_no"),
							"other_country_why"=>$this->input->post("other_country_why"),
							"other_country_how_month"=>$this->input->post("other_country_how_month"),
							"other_district_person_no"=>$this->input->post("other_district_person_no"),
							"other_district_why"=>$this->input->post("other_district_why"),
							"other_district_how_month"=>$this->input->post("other_district_how_month"),
							"household_use_crop"=>$this->input->post("household_use_crop"),
							"business_purpose_crop"=>$this->input->post("business_purpose_crop"),
							"income_business_purpose_crop"=>$this->input->post("income_business_purpose_crop"),
							"vegetable_kheti"=>$this->input->post("vegetable_kheti"),
							"household_use_vegetable"=>$this->input->post("household_use_vegetable"),
							"business_purpose_vegetable"=>$this->input->post("business_purpose_vegetable"),
							"income_business_purpose_vegetable"=>$this->input->post("income_business_purpose_vegetable"),
							"fruit_crop"=>$this->input->post("fruit_crop"),
							"fuirt_household_use"=>$this->input->post("fuirt_household_use"),
							"business_purpose_fruit"=>$this->input->post("business_purpose_fruit"),
							"income_business_purpose_fruit"=>$this->input->post("income_business_purpose_fruit"),
							"vegetable_fuirt_market_probablity"=>$this->input->post("vegetable_fuirt_market_probablity"),
							"benefitable_animal_business"=>$this->input->post("benefitable_animal_business"),
							"probablity_non_wooden_source"=>$this->input->post("probablity_non_wooden_source"),
							"nearest_market_jadibuti"=>$this->input->post("nearest_market_jadibuti"),
							"others"=>$this->input->post("others"),
							"export_materials"=>$this->input->post("export_materials"),
							"micro_industry"=>$this->input->post("micro_industry"),
							"retail_shop"=>$this->input->post("retail_shop"),
							"hotel_resturant"=>$this->input->post("hotel_resturant"),
							"haat_bazzar"=>$this->input->post("haat_bazzar"),
							"loan_source"=>$this->input->post("loan_source"),
							"bank_loan_rate"=>$this->input->post("bank_loan_rate"),
							"co_opertaive_loan_rate"=>$this->input->post("co_opertaive_loan_rate"),
							"rich_people_loan_rate"=>$this->input->post("rich_people_loan_rate"),
							"nearest_lagre_bazzar"=>$this->input->post("nearest_lagre_bazzar"),
							"large_bazzar_distance"=>$this->input->post("large_bazzar_distance"),
							"stone_inside_outside_vdc"=>$this->input->post("stone_inside_outside_vdc"),
							"stone_place_name"=>$this->input->post("stone_place_name"),
							"stone_sufficient"=>$this->input->post("stone_sufficient"),
							"stone_carriage_required_hour"=>$this->input->post("stone_carriage_required_hour"),
							"sand_inside_outside_vdc"=>$this->input->post("sand_inside_outside_vdc"),
							"sand_place_name"=>$this->input->post("sand_place_name"),
							"sand_sufficient"=>$this->input->post("sand_sufficient"),
							"sand_cariage_required"=>$this->input->post("sand_cariage_required"),
							"wood_inside_outside_vdc"=>$this->input->post("wood_inside_outside_vdc"),
							"wood_place_name"=>$this->input->post("wood_place_name"),
							"wood_sufficient"=>$this->input->post("wood_sufficient"),
							"wood_cariage_required"=>$this->input->post("wood_cariage_required"),
							"bamboo_inside_outside_vdc"=>$this->input->post("bamboo_inside_outside_vdc"),
							"bamboo_place_name"=>$this->input->post("bamboo_place_name"),
							"bamboo_sufficient"=>$this->input->post("bamboo_sufficient"),
							"bamboo_cariage_requi"=>$this->input->post("bamboo_cariage_requi"),
							"slet_inside_outside_vdc"=>$this->input->post("slet_inside_outside_vdc"),
							"slet_place_name"=>$this->input->post("slet_place_name"),
							"slet_sufficient"=>$this->input->post("slet_sufficient"),
							"slet_carriage_requied"=>$this->input->post("slet_carriage_requied"),
							"other_inside_outside_vdc"=>$this->input->post("other_inside_outside_vdc"),
							"others_place_name"=>$this->input->post("others_place_name"),
							"others_sufficient"=>$this->input->post("others_sufficient"),
							"others_carriage_requied"=>$this->input->post("others_carriage_requied"),
							"baisak_busy_male"=>$this->input->post("baisak_busy_male"),
							"baisak_busy_female"=>$this->input->post("baisak_busy_female"),
							"jestha_busy_male"=>$this->input->post("jestha_busy_male"),
							"jestha_busy_female"=>$this->input->post("jestha_busy_female"),
							"ashad_busy_male"=>$this->input->post("ashad_busy_male"),
							"ashad_busy_female"=>$this->input->post("ashad_busy_female"),
							"shrawan_busy_male"=>$this->input->post("shrawan_busy_male"),
							"shrawan_busy_female"=>$this->input->post("shrawan_busy_female"),
							"bhadra_busy_male"=>$this->input->post("bhadra_busy_male"),
							"bhadra_busy_female"=>$this->input->post("bhadra_busy_female"),
							"asoj_busy_male"=>$this->input->post("asoj_busy_male"),
							"asoj_busy_female"=>$this->input->post("asoj_busy_female"),
							"kartik_busy_female"=>$this->input->post("kartik_busy_female"),
							"kartik_busy_male"=>$this->input->post("kartik_busy_male"),
							"mangsir_busy_male"=>$this->input->post("mangsir_busy_male"),
							"mangsir_busy_female"=>$this->input->post("mangsir_busy_female"),
							"poush_busy_male"=>$this->input->post("poush_busy_male"),
							"poush_busy_female"=>$this->input->post("poush_busy_female"),
							"magh_busy_male"=>$this->input->post("magh_busy_male"),
							"magh_busy_female"=>$this->input->post("magh_busy_female"),
							"falgun_busy_male"=>$this->input->post("falgun_busy_male"),
							"falgun_busy_female"=>$this->input->post("falgun_busy_female"),
							"chaitra_busy_male"=>$this->input->post("chaitra_busy_male"),
							"chaitra_busy_femaile"=>$this->input->post("chaitra_busy_femaile"),
							"user_id"=>$user_id
			);
		$table_name = "wump_annex_04_sa_18_vdc_social_economic_info";
		if($this->post_model->insert_form($table_name, $datas) == TRUE)
			{
				$vdc_socio_economic_id = $this->db->insert_id();
				for($i = 0; $i<count($festival_name); $i++)
				{
					$festival_data = array(
											"vdc_socio_economic_id"=>$vdc_socio_economic_id,
											"festival_name"=>$festival_name[$i],
											"attendance_condition_festival_time"=>$attendance_condition_festival_time[$i],
											"effect_working_days"=>$effect_working_days[$i],
											"months"=>$months[$i],
											"user_id"=>$user_id
											);
					$this->post_model->insert_form("wump_annex_04_sa_18_festivals",$festival_data);
				}
				
				$this->data["success_message"] = "रेकर्ड दाखिला भयो";
				redirect ('pages/sa18');
			}
			else
			{
				$this->data["error_message"] = "error";
			}
		}
		
	}

}