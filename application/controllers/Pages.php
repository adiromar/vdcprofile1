<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');	
		$this->load->library('pagination');
		$this->load->model('page_model');
		$this->load->model('user_model');
		$this->load->model('darta_model');
		$this->load->model('rm_model');
		$this->load->model('news_model');
		$this->load->model('Dropdown_val_model');	
		$this->load->model('chart_model');	
	}

	public function home(){
		// if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
		// 		show_404();
		// 	}
		$this->load->view('front_templates/header_home');
		$this->load->view('pages/home');
		$this->load->view('front_templates/footer');
	}

	public function personal_form(){
		$this->load->view('front_templates/header');
		$this->load->view('pages/personal_form');
		$this->load->view('front_templates/footer');
	}

	public function form_lists(){
		
		$this->load->view('front_templates/header');
		$this->load->view('pages/list');
		// $this->load->view('front_templates/footer');
	}

	public function view_charts(){
		$this->load->view('front_templates/header');
		$this->load->view('pages/view_charts');
		$this->load->view('front_templates/footer_home');
	}

	public function view_lists(){
		
		$this->load->view('front_templates/header');
		$this->load->view('pages/view_lists');
		$this->load->view('front_templates/footer');
	}

	public function get_table_by_id(){
		$tid = $this->uri->segment(3,1);
		$data['tid'] = $tid;
		$data['table_names'] = $this->page_model->get_table_names();

		$data['table_data'] = $this->page_model->get_table_by_id($tid);
		$data['forn'] = $this->page_model->get_district_name();
		$data['unit'] = $this->page_model->get_unit_name();
		$data['tole'] = $this->page_model->get_tole_name();
		$data['jala'] = $this->page_model->get_jaladhar_name();
		$data['upa_jala'] = $this->page_model->get_upa_jaladhar_name();
		//get foreign table is exists
		$tbname = $data['table_data'][0]['title'];
		$data['table_values'] = $this->page_model->get_table_values_by_id($tid);
		$this->load->view('front_templates/header');
		$this->load->view('pages/get_form', $data);
		$this->load->view('front_templates/footer');
	}

	public function localunit(){
		$this->load->view('front_templates/header');
		$this->load->view('pages/localunit');
		$this->load->view('front_templates/footer');
	}

	public function show_district_profile(){   
		$this->load->model('page_model');
		$this->load->model('user_model');
		$data['title'] = "Show Records";
		$data['dis_prof'] = $this->page_model->get_district_data();
		// $dis_prof = $this->page_model->get_district_data();
		// foreach ($dis_prof as $key) {
		// 	$data['unit'] = $this->page_model->get_unit_data($key['id']);
		// }
		
		$this->load->view('front_templates/header');
		$this->load->view('pages/district_profile', $data);
		$this->load->view('front_templates/footer');
	}

	public function edit_single_by_id(){
		$tid = $this->uri->segment(3,1);
		$data['link_id'] = $tid;
		$data['show'] = $this->darta_model->get_single_info_by_id($tid);
		$this->load->view('front_templates/header');
		$this->load->view('pages/edit_single_by_id', $data);
		$this->load->view('front_templates/footer');
	}

	public function multiple_form(){
		$tid = $this->uri->segment(3,1);
		// $data['table_namesm'] = $this->page_model->get_mul_table_names();

		// $data['table_datam'] = $this->page_model->get_mul_table_by_id($tid);
		
		//get foreign table is exists
		// $tbname = $data['table_datam'][0]['title'];
		

		// $data['table_values_mul'] = $this->page_model->get_table_values_by_id($tid);
		
		$this->load->view('front_templates/header');
		$this->load->view('pages/multiple');
		$this->load->view('front_templates/footer');
	}

	public function edit_table_by_id(){
		$this->load->model('admin_model');
		$tid = $this->uri->segment(3,1);
		$data['table_names'] = $this->page_model->get_table_names();
		$data['table_data'] = $this->page_model->get_table_by_id($tid);
		//get foreign table is exists
		// $tbname = $data['table_data'][0]['title'];	
		$data['table_values'] = $this->page_model->get_table_values_by_id($tid);
		$data['multiple'] = $this->page_model->get_multiple($tid);
		$data['frn_tbl'] = $this->page_model->get_frn_id();
		
		$data['forn'] = $this->page_model->get_district_name();
		$data['unit'] = $this->page_model->get_unit_name();
		$data['tole'] = $this->page_model->get_tole_name();
		$data['jala'] = $this->page_model->get_jaladhar_name();
		$data['upa_jala'] = $this->page_model->get_upa_jaladhar_name();
		// $this->input->post("pages/edit_table_by_id");
		$this->load->view('front_templates/header');
		$this->load->view('pages/edit', $data);
		$this->load->view('front_templates/footer');
	}

	public function edit_personal_by_id(){
		$tid = $this->uri->segment(3,1);

		$data['info'] = $this->darta_model->get_gharmuli_info_by_id($tid);
		$data['count'] = $this->darta_model->count_personal_records_ny_id($tid);
		$data['show'] = $this->darta_model->show_personal_records_ny_id($tid);

		$data['viewss'] = $this->darta_model->get_gharmuli_family_members_by_id($tid);
		$data['dat_id'] = $tid;
		$this->load->view('front_templates/header');
		$this->load->view('pages/edit_personal_info', $data);
		$this->load->view('front_templates/footer');
		
	}

	public function view_personal_by_id(){
		$tid = $this->uri->segment(3,1);

		$data['info'] = $this->darta_model->get_gharmuli_info_by_id($tid);
		$data['count'] = $this->darta_model->count_personal_records_ny_id($tid);
		$data['show'] = $this->darta_model->show_personal_records_ny_id($tid);
		$data['dat_id'] = $tid;
		$this->load->view('front_templates/header');
		$this->load->view('pages/view_single_personal', $data);
		// $this->load->view('front_templates/footer');
		
	}

	public function delete($tbl_name , $id, $sec_tbl=false, $pri_id=false, $pri_dat=false ){
		$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    	$last = explode("/", $str, 9);
		// echo $last[5];
 		$tbl_name = $last[4];
 		$id = $last[5];
 		$sec_tbl = $last[6];
 		$pri_id = $last[7];
 		$pri_dat = $last[8];
 		// echo $sec_tbl;
 		// echo $pri_id;die;
 		// echo $pri_dat;echo $pri_id;die;

 		$result =$this->admin_model->delete_id($tbl_name, $id);
 		$result1 =$this->admin_model->delete_sec_tbl($sec_tbl, $pri_id, $pri_dat);
 		if($result==1 || $result1==1){
 			$this->session->set_flashdata('post_deleted', 'Your data from <strong>'.$tbl_name.' & '.$sec_tbl.'</strong> table has been deleted successfully.');
 			if ($user_type == 'Normal'){
 				redirect ('pages/show_data_by_user/'.$tbl_name.'');
 			}
			redirect ('admins/show_data/'.$tbl_name.'');
     		// echo 'success';
  		}else{
     		echo 'Delete failed';
  		}   
	}

	public function delete_sin($tbl_name , $id){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
 		$tbl_name = $this->uri->segment(3,1);
 		$tid = $this->uri->segment(4,1);
 		// echo $tid;die;
 		$result=$this->admin_model->delete_id($tbl_name, $tid);
 		if($result==1){
 			$this->session->set_flashdata('post_deleted', 'Data from <strong>'.$tbl_name.'</strong> table with Id <strong>'.$tid.'</strong> has been deleted successfully.');
 			if ($user_type == 'Normal'){
 				redirect ('pages/show_data_by_user/'.$tbl_name.'');
 			}else
			// redirect ('admins/show_data/'.$tbl_name.'');
			redirect ($_SERVER['HTTP_REFERER']);
     		
  		}else{
     		echo 'failed';
  		}   
	}

	public function view_records(){
		$data['title'] = "View Recordss";
	
		$this->load->view('front_templates/header');
		$this->load->view('pages/view_records', $data);
		$this->load->view('front_templates/footer');
	}

	public function list_personal(){
		$data['title'] = "View Recordss";
		$data['ttt'] = "Hello World !!";
		
		$config['base_url'] = site_url('pages/list_personal');
		$config['total_rows'] = $this->page_model->countAll('personal_info_form');
		$config['per_page'] = 1000;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];

        $config["num_links"] = floor($choice);

/* This Application Must Be Used With BootStrap 4 *  */
$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
$config['full_tag_close'] 	= '</ul></nav></div>';
$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
$config['num_tag_close'] 	= '</span></li>';
$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
$config['prev_tagl_close'] 	= '</span></li>';
$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
$config['first_tagl_close'] = '</span></li>';
$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
$config['last_tagl_close'] 	= '</span></li>';

        $this->pagination->initialize($config);		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$count_all = $this->page_model->countAll("personal_info_form");

		$data['single_records'] = $this->darta_model->get_single_member_info($config['per_page'],$data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('front_templates/header');
		$this->load->view('pages/list_single', $data);
		// $this->load->view('front_templates/footer');
	}

	public function show_data_by_user(){
		$this->load->model('page_model');
		$this->load->model('user_model');

		$data['title'] = "Show Records";
		$form_name = $this->uri->segment(3,1);
		
		$data['form_name'] = $form_name;
		$data['user_list'] = $this->user_model->check_user();
		
		$user_id=$this->session->userdata('user_id');
		$info = $this->user_model->get_user_type($user_id);
		$user_type = $info[0]['user_type'];
		// echo $data['tbl_id'];die;
		
		if ($user_type == 'User' || $user_type == 'District Admin'){
			$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$last = explode("/", $str, 5);
          	$data['records'] = $this->admin_model->get_unique_table_data_by_user($last[4], $user_id);
          	$data['table'] = $this->admin_model->get_table_by_title($last[4]);
          	$data['tablename'] = $last[4];
          	$this->load->view('front_templates/header');
			$this->load->view('pages/show_data_by_general_user', $data);
			$this->load->view('front_templates/footer');
        }else{
        	$config['base_url'] = site_url('pages/show_data_by_user/'.$form_name.' ');
	        $config['total_rows'] = $this->page_model->countAll($form_name);
			$config['per_page'] = 100;
	        $config['uri_segment'] = 4;
	        
	        $choice = $config["total_rows"] / $config["per_page"];
        	// $config["num_links"] = floor($choice);
        	$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] 	= '</ul></nav></div>';
			$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] 	= '</span></li>';

			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			//For NEXT PAGE Setup
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close'] 	= '</span></li>';
			$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['first_link'] = '<<<';
			$config['last_link'] = '>>>';
			$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close'] 	= '</span></li>';
			// $config['display_pages'] = FALSE;
			$config['num_links'] = 1;

			$this->pagination->initialize($config);	
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			$data['dataqs'] = $this->admin_model->get_table_data_by_admin($form_name, $config['per_page'],$data['page']);
			$data['pagination'] = $this->pagination->create_links();
			
        	$this->load->view('front_templates/header');
			$this->load->view('pages/show_data_by_user', $data);
			$this->load->view('front_templates/footer');
        }
	}

	public function sa18(){   
		$data['title'] = "Show Records";

		$this->load->view('front_templates/header');
		$this->load->view('pages/sa18', $data);
		$this->load->view('front_templates/footer');
	}

	public function data(){   
		$data['title'] = "Show Records";

		$this->load->view('front_templates/header');
		$this->load->view('pages/data', $data);
		$this->load->view('front_templates/footer');
	}
	// display records for sa18 form

	public function delete_single_records(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "personal_info_form";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_id($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal' || $user_type == 'User'){
 				redirect ('pages/list_single');
 			}else
 			redirect ($_SERVER['HTTP_REFERER']);
			// redirect ('pages/list_single');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('pages/list_single');
  		} 
	}

	public function delete_per($id){
		$tbl_name = "gharmuli_info";
		$pers_tbl = "personal_info_form";
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
 		$tid = $this->uri->segment(4,1);

 		$p_id = $this->admin_model->check_personal_tbl($pers_tbl, $tid);
 		// echo count($p_id);
 		for ($i=0; $i < count($p_id); $i++) { 
 			$personal_tbl = $this->admin_model->delete_personal_tbl($pers_tbl, $p_id[$i]['id']); 
 		}
 		// print_r($p_id[0]['id']);die;
 		
 		$result=$this->admin_model->delete_id($tbl_name, $id);
 		if($result==1){
 			$this->session->set_flashdata('post_deleted', 'Data has been deleted successfully.');
 			if ($user_type == 'Normal'){
 				redirect ('pages/view_personal');
 			}else
 			redirect ($_SERVER['HTTP_REFERER']);
			// redirect ('pages/view_personal');
  		}else{
     		echo 'failed';
  		}   
	}

	public function delete_unit($id){
		$tid = $this->uri->segment(3,0);
		$del_dis=$this->admin_model->delete_id('district_profile', $id);
		if($del_dis == true){
			$del_unit=$this->admin_model->delete_additional('unit_table', $id);
			$del_tole=$this->admin_model->delete_additional('tole_table', $id);
			$del_jal=$this->admin_model->delete_additional('t_jaladhar_table', $id);
			$del_s_jal=$this->admin_model->delete_additional('t_upa_jaladhar_table', $id);
			$this->session->set_flashdata('post_deleted', 'रेकर्ड मेटाउन सफल भयो.');
			redirect('pages/show_district_profile/district_profile');
		}else{
			echo "Could not delete sub data";die;
		}
	}

	public function edit_unit(){
		$tid = $this->uri->segment(3,1);
		$data['link_id'] = $tid;
		$data['dist'] = $this->page_model->get_district_records($tid);
		$data['unit'] = $this->page_model->get_local_unit_records($tid);
		$data['tole'] = $this->page_model->get_tole_records($tid);
		$data['jaladhar'] = $this->page_model->get_jaladhar_records($tid);
		$data['sub_jaladhar'] = $this->page_model->get_sub_jaladhar_records($tid);
		$this->load->view('front_templates/header');
		$this->load->view('pages/edit_unit', $data);
		$this->load->view('front_templates/footer');
	}

	public function multiple_fetch(){
        $data['tid'] = $_POST['id'];
        $data['t_name'] = $_POST['name'];
        $t_name = $_POST['name'];
        
        // var_dump($t_name);die;
        $data['fk'] = $this->admin_model->get_foreign_table_of_primary_table_mul($t_name);
        // echo '<pre>';
        
        if(!empty($data['fk'])){
          $this->load->view('pages/list_multiple', $data);
        }
      }

     public function filter_records_by_user(){
     	$this->load->model('admin_model');

     	$form_name = $this->input->post('form_name');
     	$user = $this->input->post('user');
     	$data['form_name'] = $form_name;

     	$data['dat'] = $this->admin_model->get_table_by_title($form_name);

     	if ($user == 'all'){
     		$data['dataqs'] = $this->admin_model->get_table_data_by_admin($form_name);
     	}else{
     		$data['dataqs'] = $this->admin_model->get_table_data_by_user($form_name, $user);
     	}
     	
     	$data['fk'] = $this->admin_model->get_foreign_table_of_primary_table_mul($form_name);
     	$this->load->view('pages/filter_records', $data);
     }


     public function get_user_records(){
     	$form = $this->input->post('form_name');
     	$user = $this->input->post('user');

     	$get_rec = $this->page_model->count_tblrecords_user($form, $user);
     	echo "Total Records: " . $get_rec;
     }

	public function daily_records(){   
		$data['title'] = "Daily Records By Users";
		$data['lists'] = $this->user_model->check_user();
		$data['forms'] = $this->page_model->get_table_names();

		$this->load->view('front_templates/header');
		$this->load->view('pages/daily', $data);
		$this->load->view('front_templates/footer');
	}

	public function filter_records_by_user_daily(){

			if($_POST['form_name'] && $_POST['user_name'] && $_POST['date']){
				$data['form_name'] = $this->input->post('form_name');
				$data['user_name'] = $this->input->post('user_name');
				$data['date'] = $this->input->post('date');
				$data['disp'] = $this->input->post('display_name');
				$data['forms'] = $this->page_model->get_table_names();
			
				$this->load->view('pages/show_daily', $data);
			}else if ($_POST['user_name'] && $_POST['date'] && $_POST['form_name'] == null ){
				
				$data['user_name'] = $this->input->post('user_name');
				$data['date'] = $this->input->post('date');
				$data['disp'] = $this->input->post('display_name');
				$data['forms'] = $this->page_model->get_table_names();
			
				$this->load->view('pages/previewrecords', $data);
			}else {
				echo "<p style='color: red;'>Please Select <b>All Fields</b></p>";die;
			}
			
		}
}