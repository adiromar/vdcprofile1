<?php 

class Page_model extends CI_Model
{
	public function __construct(){

		$this->load->database();
	}


	public function fetch_district(){
		$this->db->select('*');
		// $this->db->where('district like', '%'.$rm. '%');
		$query = $this->db->get('district_profile');
		return $query->result_array();
	}
	public function get_local_level(){
		$this->db->select('*');
		// $this->db->where('district like', '%'.$rm. '%');
		$query = $this->db->get('unit_table');
		return $query->result_array();
	}
	public function get_table_names(){

		$query = $this->db->query('SELECT id,title,display_name FROM cms_tables where (form_type ="primary_form") ORDER BY form_order Asc');

		return $query->result_array();
	}

	public function get_for_table_names(){

		$query = $this->db->query('SELECT id,title,display_name FROM cms_tables where form_type = "foreign_form" ORDER BY form_order DESC');

		return $query->result_array();
	}

	public function get_mul_table_names(){

		$query = $this->db->query('SELECT id,title,display_name FROM cms_tables where form_type = "multiple_form" ORDER BY id DESC');

		return $query->result_array();
	}

	public function get_tables(){

		$query = $this->db->query('SELECT * FROM cms_tables ORDER BY form_order Asc');

		return $query->result_array();
	}

	public function get_tables_frm_rel_table(){

		$query = $this->db->query('SELECT primary_table FROM relationships where form_type = "foreign_form" order by id desc');

		return $query->result_array();
	}

	public function get_table_values(){

		$query = $this->db->get('cms_values');

		return $query->result_array();
	}

	public function get_table_by_id($tid){

		$query = $this->db->get_where('cms_tables', array('id' => $tid));

		return $query->result_array();
	}

	public function get_for_table_by_id($tid){

		$query = $this->db->get_where('cms_tables', array('id' => $tid, 'form_type' => 'foreign_form'));

		return $query->result_array();
	}

	public function get_mul_table_by_id($tid){

		$query = $this->db->get_where('cms_tables', array('id' => $tid, 'form_type' => 'multiple_form'));

		return $query->result_array();
	}

	public function get_table_values_by_id($tid){

		$query = $this->db->get_where('cms_values', array('tableid' => $tid));

		return $query->result_array();
	}

	public function get_relations($tableid){

		$query = $this->db->get_where('relationships', array('sec_key' => $tableid));

		return $query->num_rows();
	}

	public function get_foreigntable($tbname){

		$query = $this->db->get_where('relationships', array('primary_table' => $tbname));

		return $query->result_array();		
	}

	public function get_foreigntable_mul($tbname){

		$query = $this->db->get_where('relationships', array('primary_table' => $tbname, 'form_type' => 'multiple_form'));
// $query = $this->db->query('SELECT * FROM relationships where primary_table = "'.$tbname.'" AND form_type = "multiple_form" ');
		return $query->result_array();		
	}

	public function get_foreigntable_for($tbname){

		$query = $this->db->get_where('relationships', array('primary_table' => $tbname, 'form_type' => 'foreign_form'));

		return $query->result_array();		
	}

	public function get_multiple($tid){

		$query = $this->db->get_where('table_properties', array('table_id' => $tid));

		return $query->result_array();	
	}

	public function get_district_name_by_code($code){

		$query = $this->db->get_where('district_profile', array('district_code' => $code));

		return $query->result_array();	
	}

	public function get_frn_id(){

		$query = $this->db->query('SELECT table_id FROM table_properties');

		return $query->result_array();
	}

	public function find_foreign_no_of_tbl_for_edit($table, $id, $pid){
		$array = array('primary_data_id' => $id, 'primary_id' => $pid);
		$query = $this->db->get_where($table, $array);

		return $query->result_array();
	}

	public function edit_foreign_id($f_table, $id, $p_id){

		$query = $this->db->query('SELECT * FROM `'.$f_table.'` where primary_data_id
		 = '.$id.' AND primary_id ='.$p_id.' ');

		return $query->result_array();
	}

	public function get_data_for_field($field, $tbl){
		$query = $this->db->query('SELECT distinct '.$field.' FROM '.$tbl.' ');

		return $query->result_array();	
		
	}
	public function get_dis_data_for_field(){
		$query = $this->db->query('SELECT distinct district, district_code FROM district_profile ');
		return $query->result_array();	
	}

	public function get_rm_data_for_field(){
		$query = $this->db->query('SELECT local_unit,unit_code, district_code,district_name FROM unit_table ');
		return $query->result_array();	
	}

	public function get_values_tbl($tbl){
		$query = $this->db->query('SELECT id FROM cms_values where tableid = '.$tbl.' ');

		return $query->result_array();
	}

	public function get_values_by_name($name, $id){

		$query = $this->db->get_where('cms_values', array('name' => $name, 'tableid' => $id));

		return $query->result_array();
	}

	public function get_district_data(){
		$query = $this->db->get('district_profile');

		return $query->result_array();
	}
// get data
	public function get_unit_data($dis_code){
		// $query = $this->db->get_where('unit_table', array('district_code' => $dis_code));
		$query = $this->db->query('SELECT * FROM unit_table where dis_table_id = '.$dis_code.' ');
		return $query->result_array();
	}
	public function get_tole_data($dis_code){
		$query = $this->db->query('SELECT * FROM tole_table where dis_table_id = '.$dis_code.' ');
		return $query->result_array();
	}
	public function get_jaladhar_data($dis_code){
		$query = $this->db->query('SELECT * FROM t_jaladhar_table where dis_table_id = '.$dis_code.' ');
		return $query->result_array();
	}
	public function get_sub_jaladhar_data($dis_code){
		$query = $this->db->query('SELECT * FROM t_upa_jaladhar_table where dis_table_id = '.$dis_code.' ');
		return $query->result_array();
	}

	public function get_district_name(){
		$query = $this->db->query('SELECT district, id, district_code FROM district_profile');
		return $query->result_array();
	}

	public function get_unit_name(){
		$query = $this->db->query('SELECT * FROM unit_table');
		return $query->result_array();
	}
	public function get_tole_name(){
		$query = $this->db->query('SELECT * FROM tole_table');
		return $query->result_array();
	}

	public function get_jaladhar_name(){
		$query = $this->db->query('SELECT * FROM t_jaladhar_table');
		return $query->result_array();
	}
	public function get_upa_jaladhar_name(){
		$query = $this->db->query('SELECT * FROM t_upa_jaladhar_table');
		return $query->result_array();
	}

	public function countAll($table_name)
    {
        return $this->db->count_all($table_name);
    }

    public function count_tblrecords_user($table_name, $id)
    {
        $query = $this->db->get_where($table_name, array('user_id' => $id));
		return $query->num_rows();
    }

    public function get_district_records($tid){
		$query = $this->db->query('SELECT * FROM district_profile where id = '.$tid.'');
		return $query->result_array();
	}

	public function get_local_unit_records($tid){
		$query = $this->db->query('SELECT * FROM unit_table where dis_table_id = '.$tid.'');
		return $query->result_array();
	}

	public function get_tole_records($tid){
		$query = $this->db->query('SELECT * FROM tole_table where dis_table_id = '.$tid.'');
		return $query->result_array();
	}

	public function get_jaladhar_records($tid){
		$query = $this->db->query('SELECT * FROM t_jaladhar_table where dis_table_id = '.$tid.'');
		return $query->result_array();
	}

	public function get_sub_jaladhar_records($tid){
		$query = $this->db->query('SELECT * FROM t_upa_jaladhar_table where dis_table_id = '.$tid.'');
		return $query->result_array();
	}

	public function record_inserted_by($id){
		$query = $this->db->get_where('user_login', array('user_id' => $id));
		return $query->result_array();
	}

	public function get_id_by_tblname($tblname){
		$query = $this->db->get_where('cms_tables', array('title' => $tblname));
		return $query->result_array();
	}

	// get duration time
	public function get_duration($formid, $id){
		$this->db->select('filled_info_data.duration');
		$this->db->from('app_filled_data');
		$this->db->join('filled_info_data', 'filled_info_data.filledId = app_filled_data.formFilledId');
		$this->db->where('filled_info_data.formId', $formid);
		$this->db->where('app_filled_data.data_id', $id);
		$query = $this->db->get();

     if ($query->row_array() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	 // return $query->result_array();
	}

	public function get_daily_rec($formid, $id, $date){

		$this->db->where('user_id', $id);
		$this->db->where('inserted_at like', $date . '%');
		$query = $this->db->get($formid);
			return $query->num_rows();

	 // return $query->result_array();
	}
}