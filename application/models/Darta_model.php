<?php 

class Darta_model extends CI_Model
{
	public function __construct(){

		$this->load->database();
	}
		
		public function get_gharmuli_info(){
		// $query = $this->db->get_where('gharmuli_info');
		// $this->db->order_by("id","desc");
		// $query = $this->db->get('gharmuli_info');

		$this->db->select('g.id,g.household_name,g.house_no,g.ward_no,count(p.family_memb_name_list) as cou,p.citizenship_number,p.relation_with_head_of_house');
    	$this->db->from('gharmuli_info g'); 
    	$this->db->group_by('g.household_name');
    	$this->db->join('personal_info_form p', 'p.gharmuli_table_id=g.id');      
    	$query = $this->db->get();

		return $query->result_array();
	}

	public function get_gharmuli_infoo(){
		$this->db->select('*, count(family_memb_name_list) as cou');
    	$this->db->from('personal_info_form'); 
    	$this->db->group_by('household_name');
    	$this->db->where('relation_with_head_of_house like "%स्वयम%" ');
    	$this->db->order_by('id', 'ASC');     
    	$query = $this->db->get();

		return $query->result_array();
	}

	public function get_gharmuli_family_members_by_id($tid){
		$this->db->select('id,family_memb_name_list');
    	$this->db->from('personal_info_form'); 
    	// $this->db->group_by('household_name');
    	$this->db->where('household_name', $tid);
    	// $this->db->order_by('household_name'); 
    	$query = $this->db->get();
		return $query->result_array();
	}

	public function get_gharmuli_info_by_id($tid){
		// $query = $this->db->get_where('gharmuli_info');
		$query = $this->db->get_where('gharmuli_info', array('id' => $tid));
		return $query->result_array();
	}

	public function get_single_info_by_id($tid){
		// $query = $this->db->get_where('gharmuli_info');
		$query = $this->db->get_where('personal_info_form', array('id' => $tid));
		return $query->result_array();
	}
	public function get_single_marriage_info_by_id($tid){
		$query = $this->db->get_where('marriageregistration', array('id' => $tid));
		return $query->result_array();
	}

	public function count_personal_records_ny_id($tid){
		// $query = $this->db->get_where('gharmuli_info');
		$query = $this->db->get_where('personal_info_form', array('gharmuli_table_id' => $tid));
		return $query->num_rows();
	}

	public function show_personal_records_ny_id($tid){
		// $query = $this->db->get_where('gharmuli_info');
		$query = $this->db->get_where('personal_info_form', array('gharmuli_table_id' => $tid));
		return $query->result_array();
	}

	// search data

	public function search_gharmuli_by_name($name){
	
	$this->db->select('g.id,g.household_name,g.house_no,g.ward_no,p.family_memb_name_list,p.citizenship_number,p.relation_with_head_of_house');
    $this->db->from('gharmuli_info g'); 
    $this->db->join('personal_info_form p', 'p.gharmuli_table_id=g.id');
    $this->db->like('g.household_name',$name);
    $this->db->or_like('g.house_no',$name);
    $this->db->or_like('p.family_memb_name_list',$name);
    $this->db->or_like('p.citizenship_number',$name);       
    $query = $this->db->get(); 

		return $query->result_array();
	}

	public function get_single_member_info($start=0,$end=1000){
		$this->db->limit($start, $end);
		$query = $this->db->get('personal_info_form');
		
		return $query->result_array();
	}
	public function get_single_birth_info(){
		$query = $this->db->get('birth_registration');
		return $query->result_array();
	}
	public function get_single_marriage_info(){
		$query = $this->db->get('marriage_registration');
		return $query->result_array();
	}
	public function get_single_marriage_info2(){
		$query = $this->db->get('marriageregistration');
		return $query->result_array();
	}
	public function get_single_death_info(){
		$query = $this->db->get('death_registration');
		return $query->result_array();
	}
	public function get_single_migration_info(){
		$query = $this->db->get('migration_info');
		return $query->result_array();
	}
	public function get_relation_darta_info(){
		$query = $this->db->get('relation_darta');
		return $query->result_array();
	}

	public function search_nuclear_family($name){
		// $query = $this->db->get_where('personal_info_form', array('family_memb_name_list' => $name));

	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->like('family_memb_name_list',$name);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_single_by_search($name,$ghar,$cit_id){
	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->like('family_memb_name_list',$name);
    $this->db->like('house_no',$ghar);
    $this->db->like('citizenship_number',$cit_id);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_people_info_all($name, $cit_id){

	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->like('family_memb_name_list',$name);
    $this->db->like('citizenship_number',$cit_id);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_people_info_male($name, $cit_id){

	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->where('gender', "पुरुष");
    $this->db->like('family_memb_name_list',$name);
    $this->db->like('citizenship_number',$cit_id);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_people_info_female($name, $cit_id){
	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->where('gender', "महिला");
    $this->db->like('family_memb_name_list',$name);
    $this->db->like('citizenship_number',$cit_id);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_husband_info_by_id($name, $cit_id, $id){

	$this->db->select('*');
    $this->db->from('personal_info_form'); 
    $this->db->where('id', $id);
    $this->db->like('family_memb_name_list',$name);
    $this->db->like('citizenship_number',$cit_id);
    $query = $this->db->get();
    return $query->result_array();
	}

	public function get_memb_name(){
	$this->db->select('family_memb_name_list');
    $this->db->from('personal_info_form'); 
    $this->db->where('gender',"पुरुष");
    $query = $this->db->get();
	// $query = $this->db->get_where('personal_info_form', array('gender' => 'महिला'));
    return $query->result_array();
	}

	public function get_fem_memb_name(){
	$this->db->select('family_memb_name_list');
    $this->db->from('personal_info_form'); 
    $this->db->where('gender',"महिला");
    $query = $this->db->get();
	// $query = $this->db->get_where('personal_info_form', array('gender' => 'महिला'));
    return $query->result_array();
	}

	public function get_fathers_name($id){
		$query = $this->db->get_where('personal_info_form', array('id' => $id, 'gender' => 'पुरुष'));
    return $query->result_array();
	}

	public function get_mothers_name($id){
		$query = $this->db->get_where('personal_info_form', array('id' => $id, 'gender' => 'महिला'));
    return $query->result_array();
	}
	public function check_relation_exists($fid, $sid){
		$query = $this->db->get_where('relation_darta', array('first_memb_user_id' => $fid, 'sec_memb_user_id' => $sid));
    return $query->result_array();
	}
	public function check_marriage_exists($hid, $wid){
		$query = $this->db->get_where('marriage_registration', array('husband_user_id' => $hid, 'wife_user_id' => $wid));
    return $query->result_array();
	}
	public function check_migration_exists($ghar_id){
		$query = $this->db->get_where('migration_info', array('gharmuli_table_id' => $ghar_id));
    return $query->result_array();
	}

	public function check_citizen_exists($name){
		$query = $this->db->get_where('personal_info_form', array('citizenship_number' => $name));
    return $query->result_array();
	}

	public function check_dup_death_registration($user_id){
		$query = $this->db->get_where('death_registration', array('deceased_user_id' => $user_id));
    return $query->result_array();
	}
}