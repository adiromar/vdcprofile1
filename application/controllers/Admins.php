<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('user_model');
		$this->load->model('rm_model');
		$this->load->helper('file'); 
		
	}

	public function index()
	{
		$data['title'] = "Admin";

		$this->load->model('admin_model');

		// $data['columns'] = $this->admin_model->get_columns();
		$data['tables'] = $this->admin_model->get_tables();

		$this->load->view('includes/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('includes/footer');
	}
	
	public function manage_tables(){
		$data['title'] = "Manage Tables";

		$data['tables'] = $this->admin_model->get_tables_mul();

		$this->load->view('includes/header');
		$this->load->view('admin/manage_tables', $data);
		$this->load->view('includes/footer');
	}

	public function view_data(){
		
		$data['title'] = "View Data";
	
		$this->load->view('includes/header');
		$this->load->view('admin/view_data', $data);
		$this->load->view('includes/footer');

	}

	public function show_data(){       
		
		$this->load->model('user_model');
		$data['title'] = "Show Table";

		$this->load->view('includes/header');
		$this->load->view('admin/show_data', $data);
		$this->load->view('includes/footer');

	}

	public function setup()
	{
		$this->form_validation->set_rules( 'title', 'Title' , 'required|callback_check_table_exists');
		$this->form_validation->set_rules('display_name', 'Display Name', 'required');
		$this->form_validation->set_rules('form_type', 'Form Type', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('includes/header');
			$this->load->view('admin/dashboard');
			$this->load->view('includes/footer');
		}
		else
		{	
			// echo '<pre>';
			// print_r($_POST);die;
			$this->load->model('admin_model');

			$title1 = $this->input->post('title');
			$title1 = strtolower($title1);
			$title = str_replace(' ', '_', $title1);

			$fields = $this->input->post('fields[]');
			$name = str_replace(' ', '_', $fields);

			$types = $this->input->post('types[]');
			$nep = $this->input->post('nepali_title[]');
			// print_r($nep);die;
			$values = $this->input->post('values[]');
			// print_r($nep);
			$form_type = $this->input->post('form_type');

			$create = $this->admin_model->create_form($title,$name,$types,$values);

			if ($create == true) {
				// Set message
				$this->session->set_flashdata('post_created', 'Successfully Created table/form');
				redirect('admins/index'); 
			}else{
				$this->session->set_flashdata('error', 'Error in Form Submition');
				redirect('admins/index');
			}
			
			
		}

		
	}

	public function add_question_sets()
	{
		$data['title'] = "Add Questions to Sets";
		$data['forms'] = $this->admin_model->get_table_name_and_id();
		$data['get_sets'] = $this->admin_model->get_sets();

		$this->load->view('includes/header');
		$this->load->view('admin/question_sets', $data);
		$this->load->view('includes/footer');
	}

	public function insert_question_sets()
	{
		$setname = $this->input->post('set_name');
		$questions = $this->input->post('questions');
		$this->load->model('admin_model');
		$qnames = [];
		foreach ($questions as $key) {
			
			$question_id = $key;
			$res = $this->admin_model->get_table_by_id($key);
			$question_name = $res[0]['title'];
			$qnames[] = $res[0]['title'];
		}
		
		$data =  [
						'set_name' => $setname,
						'question_id' => implode(', ', $questions),
						'question_name' => implode(', ', $qnames),
					];
			
			$result = $this->admin_model->insert_question_sets_to_table($data);
			if ($result == true) {
				$this->session->set_flashdata('post_created', 'Successfully Created Set');
				redirect('admins/add_question_sets');
			}else{
				redirect('admins/add_question_sets');
			}
		
	}

	public function check_table_exists($title)
	{

		$this->form_validation->set_message('check_table_exists', 'That form/table is taken. Please choose a different one');
		if ($this->admin_model->check_table_exists($title)) {
			return true;
		}else{
			return false;
		}
	}

	public function add_multiple_input_feature(){

		$tables = $this->input->post('tables');

		foreach ($tables as $key) {

			$this->admin_model->insert_table_feature($key);
		}

		redirect('admins/manage_tables');

	}

	public function disable_multiple_input_feature(){

		$tables = $this->input->post('tables');
		//print_r($tables);die;
		foreach ($tables as $key) {

			$this->admin_model->disable_table_feature($key);
		}

		redirect('admins/manage_tables');

	}

	public function list_form(){
		$data['title'] = "Manage Created Forms";
		$data['alltables'] = $this->admin_model->get_tables();

		$this->load->view('includes/header');
		$this->load->view('admin/formlist', $data);
		$this->load->view('includes/footer');
	}

	public function edit_form(){
		$data['title'] = "Edit Created Forms";

		$this->load->view('includes/header');
		$this->load->view('admin/edit_form', $data);
		$this->load->view('includes/footer');
	}

	public function edit_form_questions(){
		$data['title'] = "Edit Created Forms";

		$this->load->view('includes/header');
		$this->load->view('admin/edit_form_questions', $data);
		$this->load->view('includes/footer');
	}

	public function delete_form(){
		$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$last = explode("/", $str, 6);
		// echo $last[5];
		// echo $str;die;
		
		$del =$this->admin_model->delete_from_values_tbl($last[5]);
		$delete =$this->admin_model->delete_form_by_title($last[4]);
		$del_tbl =$this->admin_model->delete_table_by_title($last[4]);
		if ($del == true && $delete == true && $del_tbl == true){
			$this->session->set_flashdata('post_deleted', 'Form Deleted Successfully.');
			redirect ('admins/list_form/');
		}else{
			$this->session->set_flashdata('error_deletion', 'form deleted.');
			redirect ('admins/list_form/');
		}
	}

	public function form_priority(){
		// print_r($_POST);die;
		$priority = $this->input->post('priority');
		$id = $this->input->post('id');
		$set = $this->admin_model->set_priority($priority, $id);

		if ($set == true){
			$this->session->set_flashdata('post_deleted', 'Form Priority Set.');
			redirect('admins/list_form');
		}else{
			$this->session->set_flashdata('error_deletion', 'Could not set Form Priority.');
			redirect('admins/list_form');
		}
	}

	public function update_form(){

			$this->load->model('admin_model');
			$display = $this->input->post('display_name');
			$table_id = $this->input->post('table_id');
			$title1 = $this->input->post('title');
			$title1 = strtolower($title1);
			$title = str_replace(' ', '_', $title1);

			$fields = $this->input->post('fields[]');
			$name = str_replace(' ', '_', $fields);

			$types = $this->input->post('types[]');
			$nep = $this->input->post('nepali_title[]');
			// print_r($nep);die;
			$values = $this->input->post('values[]');
			// print_r($nep);
			$form_type = $this->input->post('form_type');

			$create = $this->admin_model->update_form($title,$name,$types,$values,$table_id);

			if ($create) {
				// Set message
				$this->session->set_flashdata('form_updated', 'Successfully Updated Form <b>'.$display.'</b> ');
				redirect('admins/list_form'); 
			}
	}

	public function truncate_table(){
		// print_r($_POST);die;
		$tables = $this->input->post('tables');

		foreach ($tables as $key) {
		$this->db->truncate($key);
		}
		redirect('admins/list_form');
	}

	public function backup(){
		
		$this->load->dbutil();
		$prefs = array(     
    		'format'      => 'zip',             
    		'filename'    => 'profile_backup.sql'
    		);

		$backup =& $this->dbutil->backup($prefs); 
		$db_name = 'profile_backup'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'pathtobkfolder/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 

		$this->load->helper('download');
		force_download($db_name, $backup);
	}

	public function export(){   
		$data['form_name'] = $this->uri->segment(3,1);
		$data['title'] = "Export Table";

		$this->load->view('includes/header');
		$this->load->view('admin/export_records', $data);
		$this->load->view('includes/footer');

	}

	public function records(){
		$data['title'] = "Download Records";

		$data['list_of_district'] = $this->admin_model->get_district();
		$data['list_of_rm'] = $this->admin_model->get_rm();
		$this->load->view('includes/header');
		$this->load->view('admin/list_rm_records', $data);
		// $this->load->view('includes/footer');
	}

	public function get_rm_records(){
		$this->load->model('chart_model');
		// $this->load->library('pdf');
		// $this->load->library('m_pdf');

		$data = [];

		$data['title'] = "Download Reports";
		
		$data['list_of_district'] = $this->admin_model->get_district();
		$data['list_of_rm'] = $this->admin_model->get_rm();

		$data['tot_pop'] = $this->rm_model->get_total_population();
		$data['indivi'] = $this->rm_model->get_population_by_member_age_wise();
		$data['household'] = $this->rm_model->get_family_number();
		$data['pop5'] = $this->rm_model->get_population_by_agegroup_category();
		$data['festivals'] = $this->rm_model->get_festivals();
		$data['rel'] = $this->rm_model->get_population_by_mothertongue();
		$data['reli'] = $this->rm_model->get_population_by_religion();
		$data['caste'] = $this->rm_model->get_population_by_caste();
		$data['gender'] = $this->rm_model->get_population_by_gender();
		$data['gender_group'] = $this->rm_model->get_population_by_gender_agegroup();
		$data['dis'] = $this->rm_model->get_population_by_disability();
		$data['disable'] = $this->rm_model->child_disability_population();
		$data['roof'] = $this->rm_model->household_by_roof_type();
		$data['ownership'] = $this->rm_model->household_by_ownership_type();
		$data['water'] = $this->rm_model->household_by_drinking_water();
		$data['energy'] = $this->rm_model->household_by_consumable_energy();
		$data['lights'] = $this->rm_model->household_by_lights_use();
		$data['subidha'] = $this->rm_model->household_by_sewa_subidha();
		$data['toilet_type'] = $this->rm_model->household_by_toilet_type();
		$data['migration'] = $this->rm_model->population_migration_in_district();
		$data['food'] = $this->rm_model->selfdependent_household_for_food();
		$data['fem_hou'] = $this->rm_model->household_ownership_by_female();
		$data['land'] = $this->rm_model->land_ownership_by_household();
		$data['ropani'] = $this->rm_model->land_ownership_by_ropani();
		$data['elderly'] = $this->rm_model->elderly_people_single_female();
		$data['edu_ins'] = $this->rm_model->education_institution_info();
		$data['college'] = $this->rm_model->university_or_college();
		$data['primary'] = $this->rm_model->primary_student_count_gov();
		$data['primary_pvt'] = $this->rm_model->primary_student_count_pri();
		$data['educ'] = $this->rm_model->education_status_over_five();
		$data['left_school'] = $this->rm_model->left_school_or_not_admitted();
		$data['teachers'] = $this->rm_model->level_wise_teacher_info();
		$data['ratio'] = $this->rm_model->student_teacher_ratio();


		$data['child_workers'] = $this->rm_model->child_working_outside_home_as_workers();
		$data['child_club'] = $this->rm_model->child_club();
		$data['birth'] = $this->rm_model->birth_registration();
		$data['garbage'] = $this->rm_model->garbage_mgmt();
		$data['tole'] = $this->rm_model->rm_tole_development();
		$data['sim_cards'] = $this->rm_model->sim_cards_info();
		$data['monthly_income'] = $this->rm_model->household_monthly_earnings();
		$data['monthly_savings'] = $this->rm_model->household_monthly_savings();
		$data['main_occ'] = $this->rm_model->get_population_by_rojgari();
		$data['unemployed'] = $this->rm_model->unemployed_population();
		$data['birth_all'] = $this->rm_model->birth_reg();
		$data['death'] = $this->rm_model->death_number();
		$data['marr'] = $this->rm_model->marriage_info();
		

		
        //load the view and saved it into $html variable
        // $html=$this->load->view('admin/get_records', $data, true);
 
       //  //this the the PDF filename that user will get to download
       //  $pdfFilePath = "output_pdf_name.pdf";
 
       //  //load mPDF library
       //  $this->load->library('M_pdf');
 
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D");  
		$this->load->view('admin/get_records', $data);
		
		// $this->pdf->render();
  // 		$this->pdf->stream("welcome.pdf");
        // $pdfFilePath ="mypdfName-".time()."-download.pdf";
 
		
		//actually, you can pass mPDF parameter on this load() function
		// $pdf = $this->m_pdf->load();
		//generate the PDF!
		// $pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		// $pdf->Output($pdfFilePath, "D");
	}


	public function export_records(){
		if ($this->input->post('sec_value') == ''){
			$this->session->set_flashdata('post_deleted', 'Please Select Atleast One Primary Field');
			redirect($_SERVER['HTTP_REFERER']);
		}

		// print_r($_POST);die;
		$tbl_name = $this->input->post('form_name');
		// $tbl_title = $this->input->post('form_title');
		$fields = $this->input->post('sec_value');
		$ward_no = $this->input->post('ward_no');

		$foreign_tbl = $this->input->post('foreign_tbl');
		$for_value = $this->input->post('for_value');
		
		$no = count($fields);
		$check_rel = $this->admin_model->check_relation_by_tblname($tbl_name);
		// echo '<pre>';print_r($check_rel);
		// print_r($foreign_tbl);print_r($for_value);die;
		date_default_timezone_set('Asia/Kathmandu');
		$now = date('Y-m-d H:i:s');
		$tbl2 = $tbl_name . '_' . $now;
// header("Content-type: application/vnd.ms-excel");
// header("Content-Disposition: attachment; filename='.$tbl2.xls");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div style="margin-left: 100px; margin-top: 20px;">
<table border="1" class="table table-bordered">
	<thead>
	<tr>
		<?php
		// $added_title = $this->admin_model->get_added_title($tbl_name);
		$temp = array();
		echo "<th>S.N.</th>";
		foreach ($fields as $key => $values) {
			// print_r($fields);
			echo "<th >".$values."</th>";
			$temp[] = $values;
		}
		?>
	     </tr>
	 </thead>
	 <tbody>
	     <tr>
	     	<?php
	     	$f = implode(',', $temp);
	     	if ($ward_no == 'all'){
	     		$data = $this->admin_model->get_table_data_by_field($f, $tbl_name);
	     	}else{
	     		$data = $this->admin_model->get_table_data_by_field_ward($f, $tbl_name, $ward_no);
	     	}
			

			$i = 1;
			foreach ($data as $key) {
				echo "<td>".$i."</td>";
				foreach ($key as $val) {
					echo "<td>".$val."</td>";
				}
			$i++;
		// }   ?>
	     </tr>
	     <?php } ?>
	 </tbody>
</table>

<br><br>

<?php if (!empty($for_value)){ ?>
<table border="1" class="table table-bordered">
	<thead>
	<tr>
		<?php
		$temp = array();
		echo "<th>S.N.</th>";

			foreach ($for_value as $fkey => $fvalues) {
				$cap1 = str_replace('_', ' ', $fvalues);
				$cap1 = ucfirst($cap1);
			echo "<th >".$cap1."</th>";
			$temps[] = $fvalues;
			} 
		?>
	       
	     </tr>
	 </thead>
	 <tbody>
	     <tr>
	     	<?php
	     	$ff = implode(',', $temps);
			$for_data = $this->admin_model->get_table_data_by_field($ff, $foreign_tbl);

			$i = 1;
			foreach ($for_data as $fkey) {
				echo "<td>".$i."</td>";
				foreach ($fkey as $ffval) {
					echo "<td>".$ffval."</td>";
				}
			$i++;
		// }   ?>
	     </tr>
	     <?php } ?>
	 </tbody>
</table>
<?php } ?>


</div>
<?php	}


		public function update_form_questions(){

		// echo "<pre>";
		// print_r($_POST);die;
		foreach ($_POST['values'] as $key => $value) {
			$val[$key] = implode('|', $value);
		}
		//Sort fields by order
		$order = $_POST['order'];
		$newfields = array();
		foreach ( $order as $key => $value) {
			$a = array_combine($_POST['fields'][$key], $value);
			$count = array();
			foreach (array_flip($a) as $akey => $arow)
			{
					$count[$akey] = $akey;
			}
			array_multisort($count, SORT_ASC, $a);
			$newfields[] = array_flip($a);
		}
		$fields = implode(',', array_merge(...$newfields));

		//Sort types by order
		$newtypes = array();
		foreach ( $order as $key => $value) {
			// $b = array_combine($_POST['types'][$key], $value);
			//To do array_combine keeping duplicate values
			$return = array();
			foreach ($value as $i => $k) {
	     	$return[$k][] = $_POST['types'][$key][$i];
	     }

	     array_walk($return, function(&$v){
	     $v = (count($v) == 1) ? array_pop($v): $v;
	     });

			$count = array();
 			foreach ( $return as $bkey => $brow)
 			{
 					$count[$bkey] = $bkey;
 			}
 			array_multisort($count, SORT_ASC, $return);
 			$newtypes[] = $return;

		}
		$types = implode(',', array_merge(...$newtypes));

		//Sort nepali title by order
		$newtitles = array();
		foreach ( $order as $key => $value) {
			$b = array_combine($_POST['nepali_title'][$key], $value);
			$count = array();
			foreach (array_flip($b) as $bkey => $brow)
			{
					$count[$bkey] = $bkey;
			}
			array_multisort($count, SORT_ASC, $b);
			$newtitles[] = array_flip($b);
		}
		$nepalititles = implode('|or|', array_merge(...$newtitles));

		//Sort requirements by order
		$newreq = array();
		foreach ( $order as $key => $value) {
			//To do array_combine keeping duplicate values
			$return = array();
			foreach ($value as $i => $k) {
	     	$return[$k][] = $_POST['requirements'][$key][$i];
	     }

	     array_walk($return, function(&$v){
	     $v = (count($v) == 1) ? array_pop($v): $v;
	     });

			$count = array();
			foreach ( $return as $bkey => $brow)
			{
					$count[$bkey] = $bkey;
			}
			array_multisort($count, SORT_ASC, $return);
			$newreq[] = str_replace('a_','', $return);
		}
		$requirements = implode('|or|', array_merge(...$newreq));

		$this->load->model('admin_model');
		$display = $this->input->post('display_name');
		$oldid = $this->input->post('table_id');
		$title1 = $this->input->post('title');
		$title1 = strtolower($title1);
		$title = str_replace(' ', '_', $title1);
		date_default_timezone_set('Asia/Kathmandu');
		$temptitle = explode('__', $title);
		$title = $temptitle[0];

		$create = $this->admin_model->create_new_form_versions($title."__".time() , $fields, $types, $nepalititles, $requirements, $val, $oldid);
		if ($create) {
				// Set message
				$this->session->set_flashdata('form_updated', 'Successfully Updated Form <b>'.$display.'</b> ');
				redirect('admins/list_form');
			}

		die;
		
	}


	public function get_rm_records_word(){
		// $this->load->library('pdf');
		// $this->load->library('m_pdf');

		$data = [];

		$data['title'] = "Download Reports";
		
		$data['list_of_district'] = $this->admin_model->get_district();
		$data['list_of_rm'] = $this->admin_model->get_rm();

		$data['tot_pop'] = $this->rm_model->get_total_population();
		// $data['indivi'] = $this->rm_model->get_population_by_member_age_wise();
		$data['household'] = $this->rm_model->get_family_number();
		$data['pop5'] = $this->rm_model->get_population_by_agegroup_category();
		$data['festivals'] = $this->rm_model->get_festivals();
		$data['rel'] = $this->rm_model->get_population_by_mothertongue();
		$data['reli'] = $this->rm_model->get_population_by_religion();
		$data['caste'] = $this->rm_model->get_population_by_caste();
		$data['gender'] = $this->rm_model->get_population_by_gender();
		$data['gender_group'] = $this->rm_model->get_population_by_gender_agegroup();
		$data['dis'] = $this->rm_model->get_population_by_disability();
		$data['disable'] = $this->rm_model->child_disability_population();
		$data['roof'] = $this->rm_model->household_by_roof_type();
		$data['ownership'] = $this->rm_model->household_by_ownership_type();
		$data['water'] = $this->rm_model->household_by_drinking_water();
		$data['energy'] = $this->rm_model->household_by_consumable_energy();
		$data['lights'] = $this->rm_model->household_by_lights_use();
		$data['subidha'] = $this->rm_model->household_by_sewa_subidha();
		$data['toilet_type'] = $this->rm_model->household_by_toilet_type();
		$data['migration'] = $this->rm_model->population_migration_in_district();
		$data['food'] = $this->rm_model->selfdependent_household_for_food();
		$data['fem_hou'] = $this->rm_model->household_ownership_by_female();
		$data['land'] = $this->rm_model->land_ownership_by_household();
		$data['ropani'] = $this->rm_model->land_ownership_by_ropani();
		$data['elderly'] = $this->rm_model->elderly_people_single_female();
		$data['edu_ins'] = $this->rm_model->education_institution_info();
		$data['college'] = $this->rm_model->university_or_college();
		$data['primary'] = $this->rm_model->primary_student_count_gov();
		$data['primary_pvt'] = $this->rm_model->primary_student_count_pri();
		$data['educ'] = $this->rm_model->education_status_over_five();
		$data['left_school'] = $this->rm_model->left_school_or_not_admitted();
		$data['teachers'] = $this->rm_model->level_wise_teacher_info();
		$data['ratio'] = $this->rm_model->student_teacher_ratio();
		$data['child_workers'] = $this->rm_model->child_working_outside_home_as_workers();
		$data['child_club'] = $this->rm_model->child_club();
		$data['birth'] = $this->rm_model->birth_registration();
		$data['garbage'] = $this->rm_model->garbage_mgmt();
		$data['tole'] = $this->rm_model->rm_tole_development();
		$data['sim_cards'] = $this->rm_model->sim_cards_info();
		$data['monthly_income'] = $this->rm_model->household_monthly_earnings();
		$data['monthly_savings'] = $this->rm_model->household_monthly_savings();
		$data['main_occ'] = $this->rm_model->get_population_by_rojgari();
		$data['unemployed'] = $this->rm_model->unemployed_population();
		$data['birth_all'] = $this->rm_model->birth_reg();
		$data['death'] = $this->rm_model->death_number();
		$data['marr'] = $this->rm_model->marriage_info();

		$this->load->view('admin/get_records_word', $data);
	}
}//main class loop
