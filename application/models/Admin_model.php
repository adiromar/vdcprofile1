<?php
/**
* Admin Model
*/
class Admin_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}
	public function check_table_exists($title){
		$query = $this->db->get_where('cms_tables', array('title' => $title));
		if (empty($query->row_array())) {
			return true;
		}else{
			return false;
		}
	}
	public function get_tables(){
		$query = $this->db->query('SELECT * FROM cms_tables ORDER BY form_order ASC');
		return $query->result_array();
	}
	public function get_district(){
		$query = $this->db->query('SELECT * FROM district_profile');
		return $query->result_array();
	}
	public function get_rm(){
		$query = $this->db->query('SELECT * FROM unit_table');
		return $query->result_array();
	}
	public function get_tables_pri(){
		$query = $this->db->query('SELECT * FROM cms_tables where form_type = "primary_form" ORDER BY form_order Asc');
		return $query->result_array();
	}
	public function get_tables_mul(){
		$query = $this->db->query('SELECT * FROM cms_tables where form_type = "multiple_form" ORDER BY form_order Asc');
		return $query->result_array();
	}
	public function get_tables_for(){
		$query = $this->db->query('SELECT * FROM cms_tables where form_type = "foreign_form" ORDER BY form_order Asc');
		return $query->result_array();
	}
	public function get_id_by_title($name){
		$query = $this->db->query('SELECT id FROM cms_tables where title = "'.$name.'" ');
		
		return $query->result();
	}
	
	public function get_table_by_id($id){
		$query = $this->db->get_where('cms_tables', array('id' => $id ));
		return $query->result_array();
	}
	public function get_table_by_title($title){
		$query = $this->db->get_where('cms_tables', array('title' => $title ));
		return $query->result_array();
	}
	public function get_for_table_data_by_id($table, $prm, $id){
		
				$query = $this->db->query('SELECT * from `'.$table.'` where primary_id = '.$prm.' and primary_data_id = '.$id.'');
		return $query->result_array();
	}
	
	public function get_for_primary_id($for_tbl, $pri_tbl){
		$query = $this->db->query('SELECT f.primary_id FROM '.$for_tbl.' as f JOIN '.$pri_tbl.' as p where f.primary_data_id = p.id group by f.primary_id ');
		return $query->result_array();
	}
	public function get_table_data_by_name($table){
		
				$query = $this->db->get_where($table);
		return $query->result_array();
	}
	public function get_table_data_by_user($table, $user_id){
		
				$query = $this->db->get_where($table, array('user_id' => $user_id));
		return $query->result_array();
	}
	public function get_table_data_by_admin($table, $start=0,$end=100){
		// $query = $this->db->order_by('id', 'desc');
		$query = $this->db->limit($start, $end);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function get_table_data_by_distrct_admin($table, $items){
		$query = $this->db->where_in('user_id' , $items);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
	public function get_for_table_data_by_name($table){
		
				$query = $this->db->get($table);
		return $query->result_array();
	}
	public function check_relation($id){
		$query = $this->db->get_where('relationships', array('sec_key' => $id));
		return $query->num_rows();
	}
	public function check_relation_by_tblname($primary){
		$this->db->select('sec_table');
		$this->db->from('relationships');
		$this->db->where('primary_table', $primary);
		$this->db->where('form_type', 'multiple_form');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function check_relation_api(){
		$query = $this->db->get_where('relationships', array('form_type' => 'multiple_form'));
		return $query->result_array();
	}
	public function get_foreign_table_of_primary_table($t){
		$query = $this->db->get_where('relationships', array('primary_table' => $t));
		return $query->result_array();
	}
	// unique records
	public function get_unique_table_data_by_user($table, $user_id){
		
		$query = $this->db->get_where($table, array('user_id' => $user_id));
		$query = $this->get_table_by_title( $table );

		$nepali_title = explode(',', $query[0]['nepali_title']);
		$fields = explode(',', $query[0]['fields']);
		
		$comb = array_combine($fields,$nepali_title);
		$comb = array_flip($comb);
		foreach ($comb as $key => $value) {
			
			if ( trim($key) == 'legend' ) {
				unset($comb[$key]);
			}
		}
		$check = implode(',',$comb);
		$query = $this->db->query('SELECT DISTINCT '.$check.' FROM '.$table.' WHERE user_id = '.$user_id);
		
		return $query->result_array();
	}

	public function get_multiple_form_table_of_primary_table($t){
		$query = $this->db->get_where('relationships', array( 'primary_table' => $t, 'form_type' => 'multiple_form' ));
		return $query->result_array();
	}
// tablee and sets
	public function get_table_name_and_id()
		{
			$query = $this->db->query('SELECT id,display_name FROM cms_tables where form_type like "%primary_form%" ORDER BY form_order ASC');
			return $query->result_array();
		}
		public function get_sets(){
			$this->db->from('tbl_question_sets');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function getAllQuestionSets(){
			$this->db->from('tbl_question_sets');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function get_table_by_oldid($oldFormId){
			$this->db->where('oldFormId' , $oldFormId);
			$this->db->order_by('id', 'desc');
			$this->db->from('cms_tables');
			$query = $this->db->get();
			$res = (array) $query->row();
			return $res;
		}
		public function getFormdisplayname($id)
		{
			$this->db->where('id',$id);
			$this->db->select('display_name');
			$this->db->from('cms_tables');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function getFormOldId($id){
			$this->db->where('id', $id);
			$this->db->from('cms_tables');
			$this->db->select('oldFormId');
			$query = $this->db->get();
			$res = (array) $query->row();
			return $res;
		}
		public function insert_question_sets_to_table($data){
			if($this->db->insert('tbl_question_sets', $data)){
				return true;
			}else{
				return false;
			}
		}
		public function get_formlist_by_setid($id)
		{
			$this->db->where('id',$id);
			$this->db->from('tbl_question_sets');
			$query = $this->db->get();
			return $query->result_array();
		}
	public function get_foreign_table_of_primary_table_mul($t){
		$query = $this->db->get_where('relationships', array('primary_table' => $t, 'form_type'=> 'multiple_form' ));
		return $query->result_array();
	}
	public function create_form($title,$fields,$types,$values){
		//Convert fields into string
		$allfields = implode(',', $fields);
		$alltypes = implode(',', $types);
		
		$combine = array_combine($fields,$types);
		foreach ($values as $key => $value) {
			$val[$key] = implode('|', $value);
		}
		//Create table
		$this->load->dbforge();
		$this->dbforge->add_field('id');
		$combine = array_combine($fields,$types);
		foreach ($combine as $key => $value) {
			if ($value == 'INT') {
				
				$this->dbforge->add_field($key.' '.$value.'(20) NOT NULL');
			}
			elseif ($value == 'TEXT') {
				
				$this->dbforge->add_field($key.' '.$value.' NOT NULL');
			}
			elseif ($value == 'legend') {
				
				continue;
			}
			else{
				$this->dbforge->add_field($key.' '. 'VARCHAR(200) NOT NULL');
			}
		}
			$this->dbforge->add_field('user_id INT(55)');
		if ($this->dbforge->create_table($title, TRUE)){
			// 	//Add title to table cms_tables
			$nepali = $this->input->post('nepali_title');
			// print_r($nepali);die;
			$tr = implode(', ', $nepali);
			// print_r($tr);die;
			$data = array(
					'title' => $title,
					'fields' => $allfields,
					'types' => $alltypes,
					'nepali_title' => $tr,
					'form_type' => $this->input->post('form_type'),
					'display_name' => $this->input->post('display_name'),
					'subtitle' => $this->input->post('subtitle'),
					);
			$this->db->insert('cms_tables', $data);
			$id = $this->db->insert_id();
			
			foreach ($val as $key => $value) {
				$dat = array(
							'tableid' => $id,
							'name' => $key,
							'vals' => $value,
							);
			$this->db->insert('cms_values', $dat);
			}
			return true;
		}else{
			return false;
		}
	}
	public function insert_table_feature($key){
		$data = array(
						'table_id' => $key,
						'multiple_input' => 1
					);
		return $this->db->insert('table_properties', $data);
	}
	public function get_table_properties($id){
		$query = $this->db->get_where('table_properties', array('table_id' => $id));
		return $query->num_rows();
	}
	public function disable_table_feature($key){
		$data = array(
						'table_id' => $key,
						//'multiple_input' => 0
					);
		return $this->db->delete('table_properties', $data);
	}
	public function get_table_data_by_id($table, $id){
		
				$query = $this->db->query('SELECT * from `'.$table.'` where id = '.$id.'');
		return $query->result_array();
	}
	
	public function delete_birth($tbl_name, $id){
	$this->db->where("birth_id",$id);
	$this->db->delete($tbl_name);
	return $this->db->affected_rows();
	}
	public function delete_id($tbl_name, $id){
	$this->db->where("id",$id);
	$this->db->delete($tbl_name);
	return $this->db->affected_rows();
	}
	// for deleting additional valus from district profile table
	public function delete_additional($tbl_name, $id){
	$this->db->where("dis_table_id",$id);
	$this->db->delete($tbl_name);
	return $this->db->affected_rows();
	}
	public function check_personal_tbl($tbl_name, $id){
			$query = $this->db->query('SELECT id from '.$tbl_name.' where gharmuli_table_id = '.$id.'');
		return $query->result_array();
	}
	public function delete_personal_tbl($tbl_name, $id){
	$this->db->where("id",$id);
	$this->db->delete($tbl_name);
	return $this->db->affected_rows();
	}
	public function delete_sec_tbl($sec_tbl, $pri_id, $pri_dat){
		$array = array('primary_data_id' => $pri_dat, 'primary_id' => $pri_id);
	$this->db->where($array);
	$this->db->delete($sec_tbl);
	return $this->db->affected_rows();
	}
	public function get_nepali_title_id($name){
		$query = $this->db->query('SELECT nepali_title FROM cms_tables where title = "'.$name.'" ');
		
		return $query->result();
	}
	public function get_added_title($name){
		$query = $this->db->query('SELECT field FROM relationships where primary_table = "'.$name.'" AND form_type = "foreign_form" ');
		
		return $query->result();
	}
	public function get_relation_nepali_title($name){
		$query = $this->db->query('SELECT nepali FROM relationships where primary_table = "'.$name.'" AND form_type = "foreign_form" ');
		
		return $query->result_array();
	}
	public function get_sec_tbl($name){
		$query = $this->db->query('SELECT sec_table FROM relationships where primary_table = "'.$name.'" AND form_type = "foreign_form" ');
		
		return $query->result();
	}
	public function delete_from_values_tbl($id){
	$this->db->where("tableid",$id);
	$this->db->delete('cms_values');
	return $this->db->affected_rows();
	}
	public function delete_form_by_title($title){
	$this->db->where('title',$title);
	$this->db->delete('cms_tables');
	return $this->db->affected_rows();
	}
	public function delete_table_by_title($title){
		$query = $this->db->query('Drop table '.$title.' ');
		return $query;
	}
	public function get_form_type($name){
		$query = $this->db->query('SELECT form_type FROM cms_tables where title = "'.$name.'" ');
		return $query->result();
	}
	public function set_priority($value, $id){
		$query = $this->db->query('Update cms_tables set form_order = '.$value.' where id = "'.$id.'" ');
		return $query;
	}
	public function get_table_data_by_field($field, $table){
			$query = $this->db->query('SELECT '.$field.' from `'.$table.'`');
			// $query = $this->db->get_where($table, array($field));
		return $query->result_array();
	}
	public function get_table_data_by_field_ward($field, $table, $ward){
			$query = $this->db->query('SELECT '.$field.' from `'.$table.'` where ward_no = "'.$ward.'" ');
			// $query = $this->db->get_where($table, array($field));
		return $query->result_array();
	}
	
	public function update_form($title,$fields,$types,$values,$table_id){
		//Convert fields into string
		$allfields = implode(',', $fields);
		$alltypes = implode(',', $types);
		// print_r($alltypes);die;
		$combine = array_combine($fields,$types);
		$old_table_ttl = $this->input->post('old_table_ttl');
		// print_r($combine);die;
		foreach ($values as $key => $value) {
			$val[$key] = implode('|', $value);
		}
		//Create table
		$this->load->dbforge();
			// 	$old_field_ttl = $this->input->post('old_field_ttl');
		// $edit_field_name = $this->input->post('edit_field_name');
		// print_r($old_field_ttl);
		// $combine = array_combine($fields,$types);
		// print_r($combine);die;
		// foreach ($combine as $key => $value) {
			// 	if ($value == 'FLOAT') {
				// 		$fields = array(
		//       		$edit_field_name => array(
	//               	'name' => $edit_field_name,
	//               	'type' => 'Float',
			//       			),
				// 		);
			// 	$this->dbforge->modify_column($old_table_ttl, $fields);
				// 		// $this->dbforge->add_field($key.' '.$value.'(20) NOT NULL');
			// 	}
			// 	if ($value == 'VARCHAR') {
				// 		$fields = array(
		//       		$edit_field_name => array(
	//               	'name' => $edit_field_name,
	//               	'type' => 'varchar (200) NOT NULL',
			//       			),
				// 		);
			// 	$this->dbforge->modify_column($old_table_ttl, $fields);
				// 		// $this->dbforge->add_field($key.' '.$value.'(20) NOT NULL');
			// 	}
		// }
			// $this->dbforge->add_field('user_id INT(55)');
		// if ($this->dbforge->create_table($title, TRUE)){
		$this->dbforge->rename_table($old_table_ttl, $title);
			// 	//Add title to table cms_tables
			$nepali = $this->input->post('nepali_title');
			// $nepali = $this->input->post('subtitle');
			// print_r($nepali);die;
			$tr = implode(', ', $nepali);
			// print_r($tr);die;
			$data = array(
					'title' => $title,
					'fields' => $allfields,
					'types' => $alltypes,
					'nepali_title' => $tr,
					'form_type' => $this->input->post('form_type'),
					'display_name' => $this->input->post('display_name'),
					'subtitle' => $this->input->post('subtitle'),
					);
			$this->db->where('id', $table_id);
			$this->db->update('cms_tables', $data);
			// $id = $this->db->insert_id();
			// print_r($table_id);
			foreach ($val as $key => $value) {
				print_r($key);
				$dat = array(
							'tableid' => $table_id,
							// 'name' => $key,
							'vals' => $value,
							);
			$this->db->where('name', $key);
			$this->db->where('tableid', $table_id);
			$this->db->update('cms_values', $dat);
			}
			return true;
		
		}
		public function create_new_form_versions( $title,$allfields,$alltypes,$nepalititles,$requirements,$values,$oldid = null ){
		$fields = explode(',', $allfields);
		$types = explode(',', $alltypes);
		$combine = array_combine($fields,$types);
		//Create table
		$this->load->dbforge();
		$this->dbforge->add_field('id');
		$this->dbforge->add_field('submittedBy VARCHAR(200) NULL');
		$this->dbforge->add_field('submittedDate VARCHAR(200) NULL');
		$this->dbforge->add_field('surveyDuration VARCHAR(200) NULL');
		foreach ($combine as $key => $value) {
			if ($value == 'INT') {
				$this->dbforge->add_field($key.' float NULL ');
			}
			elseif ($value == 'Decimal') {
				$this->dbforge->add_field($key.' float NULL ');
			}
			elseif ($value == 'TEXT') {
				$this->dbforge->add_field($key.' '.$value.' NULL');
			}
			elseif ($value == 'legend') {
				continue;
			}
			else{
				$this->dbforge->add_field($key.' '. 'VARCHAR(200) NULL');
			}
		}
		$this->dbforge->add_field('user_id INT(55)');
		$this->dbforge->add_field('filledId INT(55)');
		if ($this->dbforge->create_table($title, TRUE))
		{
			$data = array(
					'oldFormId' => $oldid,
					'title' => $title,
					'fields' => $allfields,
					'types' => $alltypes,
					'nepali_title' => $nepalititles,
					'require_or_not' => $requirements,
					'form_type' => 'primary_form',
					'display_name' => $this->input->post('display_name'),
					'subtitle' => $this->input->post('subtitle'),
					);
			$this->db->insert('cms_tables', $data);
			//Get inserted id
			$id = $this->db->insert_id();
			//Insert values using inserted id
			foreach ($values as $key => $val) {
				$dat = array(
							'tableid' => $id,
							'name' => $key,
							'vals' => str_replace(["'", '"'], "", $val),
							);
			$this->db->insert('cms_values', $dat);
			}
			//Insert into pivot table tbl_oldform_newform
			try {
				$formtitle = explode('__', $title);
				$formName = $formtitle[0];
				$oldFormId = $oldid;
				$newFormId = $id;
				$datnew = array(
								'oldFormId' => $oldFormId,
								'newFormId' => $newFormId,
								'formName' => $formName,
							);
				$this->db->insert('tbl_oldform_newform', $datnew);
			} catch (Exception $e) {
			}
			try {
				//Update set table
			$newtablename = $title;
			$oldtablename = $this->input->post('title');
			$newformid = $id;
			$oldformid = $this->input->post('table_id');
			$allsets = $this->admin_model->get_sets();
			
				foreach ($allsets as $k => $sk)
				{
					$tocheck = explode(', ', $sk['question_id']);
					$checktitle = explode(', ', $sk['question_name']);
					if (in_array($oldformid, $tocheck)) {
						$setid = $sk['id'];
						$i = 0;
						foreach ($tocheck as $tk) {
							if ($tk == $oldformid) {
								$tocheck[$i] = $newformid;
							}
						$i++;
						}
						$newtocheck = implode(', ', $tocheck);
						
						$j = 0;
						foreach ($checktitle as $ckey) {
							if ($ckey == $oldtablename) {
								$checktitle[$j] = $newtablename;
							}
						$j++;
						}
						$newchecktitle = implode(', ', $checktitle);
						$this->db->where('id', $setid);
						$this->db->set('question_id', $newtocheck);
						$this->db->set('question_name', $newchecktitle);
						$this->db->update('tbl_question_sets');
					}else{
						continue;
					}
				}
			
			} catch (Exception $e) {
				$this->session->set_flashdata('error_deletion', 'Could not update sets due to some issue.');
			}
			//Try getting skip logics and adding new form to them
			try {
				$skip_logic = $this->admin_model->get_skip_logics($oldFormId);
				if ( count($skip_logic) > 0 ){
					$this->admin_model->copy_skip_logics($newFormId, $skip_logic);
				}
			} catch (Exception $e) {
			}
			return true;
		}else{
			return false;
		}
		die;
	}
}
?>