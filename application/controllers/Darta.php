<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Darta extends CI_Controller {

public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->helper('url_helper');
		$this->load->library('pagination');
		// $this->load->library('nepali_calendar');
		$this->load->model('darta_model');
		$this->load->model('post_model');
		$this->load->model('page_model');
		$this->load->model('rm_model');
		$this->load->model('Dropdown_val_model');
		
	}

	public function info(){
			$this->load->view('front_templates/header');
			$this->load->view('darta/registration');
			$this->load->view('front_templates/footer');
	}

	public function janmadarta(){
			$this->load->view('front_templates/header');
			$this->load->view('darta/janma_darta2');
			$this->load->view('front_templates/footer');
	}

	public function marriagedarta(){
			$this->load->view('front_templates/header');
			$this->load->view('darta/marriagedarta');
			$this->load->view('front_templates/footer');
	}

	public function personal(){

			$this->load->view('front_templates/header');
			$this->load->view('pages/personal_form');
			$this->load->view('front_templates/footer');
	}

	public function janma_darta(){
			$data['tid'] = $this->uri->segment(3,1);
			$data['f_name'] = $this->darta_model->get_fathers_name($data['tid']);
			$data['m_name'] = $this->darta_model->get_mothers_name($data['tid']);

			$this->load->view('front_templates/header');
			$this->load->view('darta/janma_darta',$data);
			$this->load->view('front_templates/footer');
	}

	public function migration(){
			$data['tid'] = $this->uri->segment(3,1);
			$data['f_name'] = $this->darta_model->get_single_info_by_id($data['tid']);

			$this->load->view('front_templates/header');
			$this->load->view('darta/migration',$data);
			$this->load->view('templates/footer');
	}

	public function excel(){
			// $data['tid'] = $this->uri->segment(3,1);
			// $data['f_name'] = $this->darta_model->get_single_info_by_id($data['tid']);

			$this->load->view('front_templates/header');
			$this->load->view('darta/import_excel');
			$this->load->view('templates/footer');
	}

	public function list_birth_records(){
			$data['tid'] = $this->uri->segment(3,1);

			$this->load->view('front_templates/header');
			$this->load->view('darta/list_birth_records',$data);
			$this->load->view('front_templates/footer');
	}

	public function list_marriage(){
			$data['tid'] = $this->uri->segment(3,1);

			$this->load->view('front_templates/header');
			$this->load->view('darta/list_marriage',$data);
			$this->load->view('front_templates/footer');
	}
	public function list_relation(){
			$data['tid'] = $this->uri->segment(3,1);

			$this->load->view('front_templates/header');
			$this->load->view('darta/list_relation',$data);
			$this->load->view('front_templates/footer');
	}
	public function list_deceased(){
			$data['tid'] = $this->uri->segment(3,1);

			$this->load->view('front_templates/header');
			$this->load->view('darta/list_deceased',$data);
			$this->load->view('front_templates/footer');
	}
	public function list_migration(){
			$data['tid'] = $this->uri->segment(3,1);

			$this->load->view('front_templates/header');
			$this->load->view('darta/list_migration',$data);
			$this->load->view('front_templates/footer');
	}

	public function marriage_darta(){
		$data['title'] = "Marriage Registration";
		$tid = $this->uri->segment(3,1);
		$data['l_id'] = $tid;
		$data['b_name'] = $this->darta_model->get_fathers_name($tid);
		$data['m_name'] = $this->darta_model->get_mothers_name($tid);

		$this->load->view('front_templates/header');
		$this->load->view('darta/marriage_reg',$data);
		$this->load->view('front_templates/footer');
	}

      public function edit_marriage(){
            $data['tid'] = $this->uri->segment(3,1);
            $tid = $this->uri->segment(3,1);
            $data['records'] = $this->darta_model->get_single_marriage_info_by_id($tid);

            $this->load->view('front_templates/header');
            $this->load->view('darta/edit_marriage', $data);
            $this->load->view('front_templates/footer');
      }

	public function relation_darta(){
		$data['title'] = "Marriage Registration";
		$tid = $this->uri->segment(3,1);
		$data['l_id'] = $tid;

		$data['b_name'] = $this->darta_model->get_single_info_by_id($tid);
		// $data['m_name'] = $this->darta_model->get_mothers_name($tid);

		$this->load->view('front_templates/header');
		$this->load->view('darta/relation_darta',$data);
		$this->load->view('front_templates/footer');
	}

	public function death_registration(){
		$tid = $this->uri->segment(3,1);
		$data['per_name'] = $this->darta_model->get_single_info_by_id($tid);
		$data['dup'] = $this->darta_model->check_dup_death_registration($tid);
		$data['l_id'] = $tid;
		$this->load->view('front_templates/header');
		$this->load->view('darta/death_registration', $data);
		$this->load->view('front_templates/footer');
	}

	public function create_db(){
			$this->load->dbforge();
			$fields = array(
                        'id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 11,
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                          ),
                        'district' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'mun_rm' => array(
                                                 'type' =>'VARCHAR',
                                                 'constraint' => '100',
                                                 // 'default' => 'King of Town',
                                          ),
                        'ward_no' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                          ),
                        'local_auth_name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                          ),
                        'local_auth_name_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'emp_record_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'form_darta_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'family_form_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'marriage_type' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                  ),
                        'married_date' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_district' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_rm' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_ward' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '20',
                                                 'null' => TRUE, ),
                        'married_marga' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_tole' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_ghar_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_abroad_address' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'married_abroad_address_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'male_member' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'female_member' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_name_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_name_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_name_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_name_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_dob' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_dob' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_caste' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_caste' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_previous_marriage' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_previous_marriage' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '20',
                                                 'null' => TRUE, ),
                        'hus_edu_passed' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '20',
                                                 'null' => TRUE, ),

                        'wif_edu_passed' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_job' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_job' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_religion' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_religion' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_mother_tongue' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_mother_tongue' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '50',
                                                 'null' => TRUE, ),
                        'husband_district' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '50',
                                                 'null' => TRUE, ),
                        'wife_district' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_rm' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_rm' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_ward' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_ward' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_marga' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_marga' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_tole' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_tole' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_ghar_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_ghar_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_birth_country' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_birth_country' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_cit_taken_country' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_cit_taken_country' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'husband_cit_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wife_cit_no' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_cit_issued' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_cit_issued' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'cit_iss_dist_hus' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'cit_iss_dist_wif' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '150',
                                                 'null' => TRUE, ),
                        'if_hus_foreign' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '150',
                                                 'null' => TRUE, ),
                        'if_wif_foreign' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_address_if_foreign_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_address_if_foreign_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_address_if_foreign_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_address_if_foreign_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_grandfat_fullname_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_grandfat_fullname_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_grandfat_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_grandfat_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_fat_fullname_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_fat_fullname_nep' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_fat_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_fat_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_mot_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_mot_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'hus_mot_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                        'wif_mot_fullname_eng' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '100',
                                                 'null' => TRUE, ),
                );

    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('marriageregistration', TRUE);
    echo "db created";
	}

public function insert_personal(){
	$this->data['success_message'] = "";
	$this->data['error_message'] = "";
	$user_id = $this->session->userdata("user_id");

	// $cal = new Nepali_Calendar();
	// print_r ($cal->eng_to_nep(2008,11,23));
	// print_r($cal->nep_to_eng(2065,8,8));
	// print_r($this->input->post("birth_year"));

	if(isset($_POST["save_personal"]))
		{	
	echo '<pre>';
	// print_r($_POST);die;

	$surveyer_name = $this->input->post("surveyer_name");
	$jaladhar_name = $this->input->post("jaladhar_name");
	$ward_no = $this->input->post("ward_no");
	$sn_in_form = $this->input->post("sn_in_form");
	$house_no = $this->input->post("house_no");
	$household_name = $this->input->post("household_name");

	$info = array(	"surveyer_name"=>$surveyer_name,
					"jaladhar_name"=>$jaladhar_name,
					"ward_no"=>$ward_no,
					"sn_in_form"=>$sn_in_form,
					"house_no"=>$house_no,
					"household_name"=>$household_name
				);
	$this->post_model->insert_form('gharmuli_info', $info);

	$district = $this->input->post("district_code");
	$rm = $this->input->post("rm");
	$household_number = $this->input->post("household_number");
	$family_sn = $this->input->post("family_sn");
	$family_memb_name_list = $this->input->post("family_memb_name_list");
	$relation_with_head_of_house = $this->input->post("relation_with_head_of_house");
	$family_seperated = $this->input->post("family_seperated");
	$family_migrated = $this->input->post("family_migrated");
	$any_other_relation_with_household = $this->input->post("any_other_relation_with_household");
	$in_out_district = $this->input->post("in_out_district");
	$gender = $this->input->post("gender");
	$birth_year = $this->input->post("birth_year");
	$dob_english = $this->input->post("dob_english");
	// print_r($dob_english);

for ($m=0; $m < count($dob_english); $m++) { 
	$birthDate = $dob_english[$m];
	$birthDate = explode("-", $birthDate);
	$age[$m] = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-0):(date("Y")-$birthDate[0]));
	print_r($age);
	$current_age = $age[$m];
}
	
	$citizenship_certificate_taken = $this->input->post("citizenship_certificate_taken");
	$citizenship_number = $this->input->post("citizenship_number");
	$issued_district = $this->input->post("issued_district");

	$if_foreign_national = $this->input->post("if_foreign_national");
	$father_name = $this->input->post("father_name");
	$mother_tongue = $this->input->post("mother_tongue");
	$religion = $this->input->post("religion");
	$caste = $this->input->post("caste");
	$maritial_status = $this->input->post("maritial_status");
	$husband_or_wife_name = $this->input->post("husband_or_wife_name");
	$marriage_year = $this->input->post("marriage_year");
	$marriage_registered = $this->input->post("marriage_registered");
	$marriage_registered_no = $this->input->post("marriage_registered_no");
	$if_single = $this->input->post("if_single");
	$education_status = $this->input->post("education_status");
	$current_situation = $this->input->post("current_situation");
	$education_institution = $this->input->post("education_institution");
	$institution_location = $this->input->post("institution_location");
	$employment_status = $this->input->post("employment_status");
	$main_job = $this->input->post("main_job");
	$if_any_side_job = $this->input->post("if_any_side_job");
	$if_skilled_manpower = $this->input->post("if_skilled_manpower");
	$bank_account = $this->input->post("bank_account");

	$financial_transaction_bank_or_org = $this->input->post("financial_transaction_bank_or_org");
	$disability = $this->input->post("disability");
	$disability_type = $this->input->post("disability_type");
	$disabillity_body_part = $this->input->post("disabillity_body_part");
	$disability_id_card_taken = $this->input->post("disability_id_card_taken");
	$any_sustained_illness = $this->input->post("any_sustained_illness");
	$illness_type = $this->input->post("illness_type");
	$child_labour_outside_home = $this->input->post("child_labour_outside_home");

	$child_stay_outside_home_as_labour = $this->input->post("child_stay_outside_home_as_labour");
	$child_labour_work = $this->input->post("child_labour_work");
	$enrolled_in_club_or_social_org = $this->input->post("enrolled_in_club_or_social_org");
	$mobile_used = $this->input->post("mobile_used");
	$mobile_set_used = $this->input->post("mobile_set_used");
	$sim_card_used = $this->input->post("sim_card_used");
	$on_social_network = $this->input->post("on_social_network");
	$vehicle_possessed = $this->input->post("vehicle_possessed");
	$son_count = $this->input->post("son_count");

	$daughter_count = $this->input->post("daughter_count");
	$are_you_pregnent = $this->input->post("are_you_pregnent");
	$pregnent_month = $this->input->post("pregnent_month");
	$checkup_as_protocol = $this->input->post("checkup_as_protocol");
	$iron_tablet_regularly = $this->input->post("iron_tablet_regularly");
	$yucca_medicine_taken_regularly = $this->input->post("yucca_medicine_taken_regularly");
	$tt_vaccine_taken = $this->input->post("tt_vaccine_taken");
	$sutkeri_ko_awasta = $this->input->post("sutkeri_ko_awasta");
	$iron_chakki_taken_during_sutkeri = $this->input->post("iron_chakki_taken_during_sutkeri");
	$sutkeri_bhayeko_sthan = $this->input->post("sutkeri_bhayeko_sthan");
	$child_vaccine_status = $this->input->post("child_vaccine_status");
	$vaccine_missed_reason = $this->input->post("vaccine_missed_reason");
      $delivery_at_hospital = $this->input->post("delivery_at_hospital");
      $govt_facility = $this->input->post("govt_facility");
      $govt_facility_name = $this->input->post("govt_facility_name");

	$result = $this->post_model->get_inserted_primary_data_id('gharmuli_info')->row();
	// print_r($result);die;

	for ($i = 0; $i < count($family_memb_name_list); $i++) {

	$data = array(	"district_code"=>$district,
					"rm"=>$rm,
					"ward_no"=>$ward_no,
					"surveyer_name"=>$surveyer_name,
					"jaladhar_name"=>$jaladhar_name,
					"sn_in_form"=>$sn_in_form,
					"household_number"=>$household_number[$i],
					"family_sn"=>$family_sn[$i],
					"house_no"=>$house_no,
					"household_name"=>$household_name,
					"family_memb_name_list"=>$family_memb_name_list[$i],
					"gender"=>$gender[$i],
					"relation_with_head_of_house"=>$relation_with_head_of_house[$i],
					"family_seperated"=>$family_seperated[$i],
					"family_migrated"=>$family_migrated[$i],
					"any_other_relation_with_household"=>$any_other_relation_with_household[$i],
					"in_out_district"=>$in_out_district[$i],
					"birth_year"=>$birth_year[$i],
					"dob_english"=>$dob_english[$i],
					// "birth_month"=>$birth_month[$i],
					"current_age"=>$age[$i],
					"citizenship_certificate_taken"=>$citizenship_certificate_taken[$i],
					"citizenship_number"=>$citizenship_number[$i],
					"issued_district"=>$issued_district[$i],
					"if_foreign_national"=>$if_foreign_national[$i],
					"father_name"=>$father_name[$i], 
					"mother_tongue"=>$mother_tongue[$i], 
					"religion"=>$religion[$i],      	
					"caste"=>$caste[$i], 
					"maritial_status"=>$maritial_status[$i],
					"husband_or_wife_name"=>$husband_or_wife_name[$i],
					"marriage_year"=>$marriage_year[$i],
					"marriage_registered"=>$marriage_registered[$i],
					"marriage_registered_no"=>$marriage_registered_no[$i],
					"if_single"=>$if_single[$i],

					"education_status"=>$education_status[$i],
					"current_situation"=>$current_situation[$i],
					"education_institution"=>$education_institution[$i],
					"institution_location"=>$institution_location[$i],
					"employment_status"=>$employment_status[$i],
					"main_job"=>$main_job[$i],
					"if_any_side_job"=>$if_any_side_job[$i],
					"if_skilled_manpower"=>$if_skilled_manpower[$i],
					"bank_account"=>$bank_account[$i],
					"financial_transaction_bank_or_org"=>$financial_transaction_bank_or_org[$i],      	
					"disability"=>$disability[$i],
					"disability_type"=>$disability_type[$i],
					"disabillity_body_part"=>$disabillity_body_part[$i],
					"disability_id_card_taken"=>$disability_id_card_taken[$i],
					"any_sustained_illness"=>$any_sustained_illness[$i],

					"illness_type"=>$illness_type[$i],
					"child_labour_outside_home"=>$child_labour_outside_home[$i],
					"child_stay_outside_home_as_labour"=>$child_stay_outside_home_as_labour[$i],
					"child_labour_work" =>$child_labour_work[$i],
					"enrolled_in_club_or_social_org"=>$enrolled_in_club_or_social_org[$i],
					"mobile_used"=>$mobile_used[$i],
					"mobile_set_used"=>$mobile_set_used[$i],
					"sim_card_used"=>$sim_card_used[$i],
					"on_social_network"=>$on_social_network[$i],
					"vehicle_possessed"=>$vehicle_possessed[$i],
					"son_count"=>$son_count[$i],      	
					"daughter_count"=>$daughter_count[$i],
					"are_you_pregnent"=>$are_you_pregnent[$i],
					"pregnent_month"=>$pregnent_month[$i],
					"checkup_as_protocol"=>$checkup_as_protocol[$i],
					"iron_tablet_regularly"=>$iron_tablet_regularly[$i],

					"yucca_medicine_taken_regularly"=>$yucca_medicine_taken_regularly[$i],  
					"tt_vaccine_taken"=>$tt_vaccine_taken[$i],  
					"sutkeri_ko_awasta"=>$sutkeri_ko_awasta[$i],  
					"iron_chakki_taken_during_sutkeri"=>$iron_chakki_taken_during_sutkeri[$i],  
					"sutkeri_bhayeko_sthan"=>$sutkeri_bhayeko_sthan[$i],  
					"child_vaccine_status"=>$child_vaccine_status[$i],  
					"vaccine_missed_reason"=>$vaccine_missed_reason[$i],
                              "delivery_at_hospital"=>$delivery_at_hospital[$i],
                              "govt_facility"=>$govt_facility[$i],
                              "govt_facility_name"=>$govt_facility_name[$i],
					"gharmuli_table_id"=>$result->id, 
					"user_id"=>$user_id,  
		);
$table_name = "personal_info_form";
$insert_frm = $this->post_model->insert_form($table_name, $data);

// print_r($data);die;
}
	
							
		if($insert_frm == TRUE)
			{
			$this->session->set_flashdata('inserted', 'रेकर्ड दाखिला भयो !!');
			redirect ('pages/personal_form');
			}
		else
			{
			$this->session->set_flashdata('insert_error', 'रेकर्ड दाखिला भएन | कृपया पारिवारिक सदस्यको विवरण उल्लेख गर्नुहोस !!');
			redirect ('pages/personal_form');
			}
		
	}
}

public function update_single(){
	// print_r($_POST);die;
	if(isset($_POST["update_single"]))
		{
			// echo "hello";die;
	$pri_id = $this->input->post("primary_id");
	$family_memb_name_list = $this->input->post("family_memb_name_list");
	$relation_with_head_of_house = $this->input->post("relation_with_head_of_house");
	$any_other_relation_with_household = $this->input->post("any_other_relation_with_household");
	$in_out_district = $this->input->post("in_out_district");
	$gender = $this->input->post("gender");
	$birth_year = $this->input->post("birth_year");
	// $birth_month = $this->input->post("birth_month");
	$current_age = $this->input->post("current_age");
	$citizenship_certificate_taken = $this->input->post("citizenship_certificate_taken");
	$citizenship_number = $this->input->post("citizenship_number");
	$issued_district = $this->input->post("issued_district");

	$if_foreign_national = $this->input->post("if_foreign_national");
	$father_name = $this->input->post("father_name");
	$maritial_status = $this->input->post("maritial_status");
	$husband_or_wife_name = $this->input->post("husband_or_wife_name");
	$marriage_year = $this->input->post("marriage_year");
	$marriage_registered = $this->input->post("marriage_registered");
	$if_single = $this->input->post("if_single");
	$education_status = $this->input->post("education_status");
	$current_situation = $this->input->post("current_situation");
	$education_institution = $this->input->post("education_institution");
	$institution_location = $this->input->post("institution_location");
	$employment_status = $this->input->post("employment_status");
	$main_job = $this->input->post("main_job");
	$if_any_side_job = $this->input->post("if_any_side_job");
	$if_skilled_manpower = $this->input->post("if_skilled_manpower");
	$bank_account = $this->input->post("bank_account");

	$financial_transaction_bank_or_org = $this->input->post("financial_transaction_bank_or_org");
	$disability = $this->input->post("disability");
	$disability_type = $this->input->post("disability_type");
	$disabillity_body_part = $this->input->post("disabillity_body_part");
	$disability_id_card_taken = $this->input->post("disability_id_card_taken");
	$any_sustained_illness = $this->input->post("any_sustained_illness");
	$illness_type = $this->input->post("illness_type");
	$child_labour_outside_home = $this->input->post("child_labour_outside_home");

	$child_stay_outside_home_as_labour = $this->input->post("child_stay_outside_home_as_labour");
	$child_labour_work = $this->input->post("child_labour_work");
	$enrolled_in_club_or_social_org = $this->input->post("enrolled_in_club_or_social_org");
	$mobile_used = $this->input->post("mobile_used");
	$mobile_set_used = $this->input->post("mobile_set_used");
	$sim_card_used = $this->input->post("sim_card_used");
	$on_social_network = $this->input->post("on_social_network");
	$vehicle_possessed = $this->input->post("vehicle_possessed");
	$son_count = $this->input->post("son_count");

	$daughter_count = $this->input->post("daughter_count");
	$are_you_pregnent = $this->input->post("are_you_pregnent");
	$pregnent_month = $this->input->post("pregnent_month");
	$checkup_as_protocol = $this->input->post("checkup_as_protocol");
	$iron_tablet_regularly = $this->input->post("iron_tablet_regularly");
	$yucca_medicine_taken_regularly = $this->input->post("yucca_medicine_taken_regularly");
	$tt_vaccine_taken = $this->input->post("tt_vaccine_taken");
	$sutkeri_ko_awasta = $this->input->post("sutkeri_ko_awasta");
	$iron_chakki_taken_during_sutkeri = $this->input->post("iron_chakki_taken_during_sutkeri");
	$sutkeri_bhayeko_sthan = $this->input->post("sutkeri_bhayeko_sthan");
	$child_vaccine_status = $this->input->post("child_vaccine_status");
	$vaccine_missed_reason = $this->input->post("vaccine_missed_reason");
	$sec_id = $this->input->post("sec_table_id");
	// print_r($sec_id);die;
	// $result = $this->darta_model->get_inserted_primary_data_id('gharmuli_info')->row();
	// print_r($result);die;

	for ($i = 0; $i < count($family_memb_name_list); $i++) {

	$data = array(	//"district_code"=>$district,
					//"rm"=>$rm,
					//"ward_no"=>$ward_no,
					//"family_sn"=>$family_sn[$i],
					// "house_no"=>$house_no,
					"family_memb_name_list"=>$family_memb_name_list[$i],
					"gender"=>$gender[$i],
					"relation_with_head_of_house"=>$relation_with_head_of_house[$i],
					"any_other_relation_with_household"=>$any_other_relation_with_household[$i],
					"in_out_district"=>$in_out_district[$i],
					"birth_year"=>$birth_year[$i],
					// "birth_month"=>$birth_month[$i],
					"current_age"=>$current_age[$i],
					"citizenship_certificate_taken"=>$citizenship_certificate_taken[$i],
					"citizenship_number"=>$citizenship_number[$i],
					"issued_district"=>$issued_district[$i],
					"if_foreign_national"=>$if_foreign_national[$i],
					"father_name"=>$father_name[$i],      	
					"maritial_status"=>$maritial_status[$i],
					"husband_or_wife_name"=>$husband_or_wife_name[$i],
					"marriage_year"=>$marriage_year[$i],
					"marriage_registered"=>$marriage_registered[$i],
					"if_single"=>$if_single[$i],

					"education_status"=>$education_status[$i],
					"current_situation"=>$current_situation[$i],
					"education_institution"=>$education_institution[$i],
					"institution_location"=>$institution_location[$i],
					"employment_status"=>$employment_status[$i],
					"main_job"=>$main_job[$i],
					"if_any_side_job"=>$if_any_side_job[$i],
					"if_skilled_manpower"=>$if_skilled_manpower[$i],
					"bank_account"=>$bank_account[$i],
					"financial_transaction_bank_or_org"=>$financial_transaction_bank_or_org[$i],      	
					"disability"=>$disability[$i],
					"disability_type"=>$disability_type[$i],
					"disabillity_body_part"=>$disabillity_body_part[$i],
					"disability_id_card_taken"=>$disability_id_card_taken[$i],
					"any_sustained_illness"=>$any_sustained_illness[$i],

					"illness_type"=>$illness_type[$i],
					"child_labour_outside_home"=>$child_labour_outside_home[$i],
					"child_stay_outside_home_as_labour"=>$child_stay_outside_home_as_labour[$i],
					"child_labour_work"=>$child_labour_work[$i],
					"enrolled_in_club_or_social_org"=>$enrolled_in_club_or_social_org[$i],
					"mobile_used"=>$mobile_used[$i],
					"mobile_set_used"=>$mobile_set_used[$i],
					"sim_card_used"=>$sim_card_used[$i],
					"on_social_network"=>$on_social_network[$i],
					"vehicle_possessed"=>$vehicle_possessed[$i],
					"son_count"=>$son_count[$i],      	
					"daughter_count"=>$daughter_count[$i],
					"are_you_pregnent"=>$are_you_pregnent[$i],
					"pregnent_month"=>$pregnent_month[$i],
					"checkup_as_protocol"=>$checkup_as_protocol[$i],
					"iron_tablet_regularly"=>$iron_tablet_regularly[$i],

					"yucca_medicine_taken_regularly"=>$yucca_medicine_taken_regularly[$i],  
					"tt_vaccine_taken"=>$tt_vaccine_taken[$i],  
					"sutkeri_ko_awasta"=>$sutkeri_ko_awasta[$i],  
					"iron_chakki_taken_during_sutkeri"=>$iron_chakki_taken_during_sutkeri[$i],  
					"sutkeri_bhayeko_sthan"=>$sutkeri_bhayeko_sthan[$i],  
					"child_vaccine_status"=>$child_vaccine_status[$i],  
					"vaccine_missed_reason"=>$vaccine_missed_reason[$i],
					// "gharmuli_table_id"=>$result->id, 
					// "user_id"=>$user_id,  
		);
// print_r($data);die;	
$table_name = "personal_info_form";
$update = $this->post_model->update_form($table_name, $data, $sec_id[$i]);
}
// die;
if ($update == TRUE){
	$this->session->set_flashdata('updated_r', 'रेकर्ड उपडेट भयो !!');
	redirect ('pages/edit_single_by_id/'.$pri_id.'');
}else{
	$this->session->set_flashdata('error_r', 'रेकर्ड उपडेट हुन सकेन !!');
	redirect ('pages/edit_single_by_id/'.$pri_id.'');
}
		}
}

public function update_personal(){
	$this->data['success_message'] = "";
	$this->data['error_message'] = "";
	$user_id = $this->session->userdata("user_id");

	if(isset($_POST["update_personal"]))
		{	
	echo '<pre>';
	// print_r($_POST);die;
	$surveyer_name = $this->input->post("surveyer_name");
	$jaladhar_name = $this->input->post("jaladhar_name");
	$ward_no = $this->input->post("ward_no");
	$sn_in_form = $this->input->post("sn_in_form");
	$house_no = $this->input->post("house_no");
	$household_name = $this->input->post("household_name");
	$pri_id = $this->input->post("primary_id");
	$rm = $this->input->post("rm");
	$info = array(	"surveyer_name"=>$surveyer_name,
					"jaladhar_name"=>$jaladhar_name,
					"ward_no"=>$ward_no,
					"sn_in_form"=>$sn_in_form,
					"house_no"=>$house_no,
					"household_name"=>$household_name
				);
	$this->post_model->update_form('gharmuli_info', $info, $pri_id);

	$result = $this->post_model->get_inserted_primary_data_id('gharmuli_info')->row();

	// add records in update form
	$district = $this->input->post("district_name");
	$family_sn_ed = $this->input->post("family_sn_ed");
	$family_memb_name_list_ed = $this->input->post("family_memb_name_list_ed");
	$relation_with_head_of_house_ed = $this->input->post("relation_with_head_of_house_ed");
	$any_other_relation_with_household_ed = $this->input->post("any_other_relation_with_household_ed");
	$in_out_district_ed = $this->input->post("in_out_district_ed");
	$gender_ed = $this->input->post("gender_ed");
	$birth_year_ed = $this->input->post("birth_year_ed");
	// $birth_month_ed = $this->input->post("birth_month_ed");
	$current_age_ed = $this->input->post("current_age_ed");
	$citizenship_certificate_taken_ed = $this->input->post("citizenship_certificate_taken_ed");
	$citizenship_number_ed = $this->input->post("citizenship_number_ed");
	$issued_district_ed = $this->input->post("issued_district_ed");

	$if_foreign_national_ed = $this->input->post("if_foreign_national_ed");
	$father_name_ed = $this->input->post("father_name_ed");
	$maritial_status_ed = $this->input->post("maritial_status_ed");
	$husband_or_wife_name_ed = $this->input->post("husband_or_wife_name_ed");
	$marriage_year_ed = $this->input->post("marriage_year_ed");
	$marriage_registered_ed = $this->input->post("marriage_registered_ed");
	$if_single_ed = $this->input->post("if_single_ed");
	$education_status_ed = $this->input->post("education_status_ed");
	$current_situation_ed = $this->input->post("current_situation_ed");
	$education_institution_ed = $this->input->post("education_institution_ed");
	$institution_location_ed = $this->input->post("institution_location_ed");
	$employment_status_ed = $this->input->post("employment_status_ed");
	$main_job_ed = $this->input->post("main_job_ed");
	$if_any_side_job_ed = $this->input->post("if_any_side_job_ed");
	$if_skilled_manpower_ed = $this->input->post("if_skilled_manpower_ed");
	$bank_account_ed = $this->input->post("bank_account_ed");

	$financial_transaction_bank_or_org_ed = $this->input->post("financial_transaction_bank_or_org_ed");
	$disability_ed = $this->input->post("disability_ed");
	$disability_type_ed = $this->input->post("disability_type_ed");
	$disabillity_body_part_ed = $this->input->post("disabillity_body_part_ed");
	$disability_id_card_taken_ed = $this->input->post("disability_id_card_taken_ed");
	$any_sustained_illness_ed = $this->input->post("any_sustained_illness_ed");
	$illness_type_ed = $this->input->post("illness_type_ed");
	$child_labour_outside_home_ed = $this->input->post("child_labour_outside_home_ed");

	$child_stay_outside_home_as_labour_ed = $this->input->post("child_stay_outside_home_as_labour_ed");
	$child_labour_work_ed = $this->input->post("child_labour_work_ed");
	$enrolled_in_club_or_social_org_ed = $this->input->post("enrolled_in_club_or_social_org_ed");
	$mobile_used_ed = $this->input->post("mobile_used_ed");
	$mobile_set_used_ed = $this->input->post("mobile_set_used_ed");
	$sim_card_used_ed = $this->input->post("sim_card_used_ed");
	$on_social_network_ed = $this->input->post("on_social_network_ed");
	$vehicle_possessed_ed = $this->input->post("vehicle_possessed_ed");
	$son_count_ed = $this->input->post("son_count_ed");

	$daughter_count_ed = $this->input->post("daughter_count_ed");
	$are_you_pregnent_ed = $this->input->post("are_you_pregnent_ed");
	$pregnent_month_ed = $this->input->post("pregnent_month_ed");
	$checkup_as_protocol_ed = $this->input->post("checkup_as_protocol_ed");
	$iron_tablet_regularly_ed = $this->input->post("iron_tablet_regularly_ed");
	$yucca_medicine_taken_regularly_ed = $this->input->post("yucca_medicine_taken_regularly_ed");
	$tt_vaccine_taken_ed = $this->input->post("tt_vaccine_taken_ed");
	$sutkeri_ko_awasta_ed = $this->input->post("sutkeri_ko_awasta_ed");
	$iron_chakki_taken_during_sutkeri_ed = $this->input->post("iron_chakki_taken_during_sutkeri_ed");
	$sutkeri_bhayeko_sthan_ed = $this->input->post("sutkeri_bhayeko_sthan_ed");
	$child_vaccine_status_ed = $this->input->post("child_vaccine_status_ed");
	$vaccine_missed_reason_ed = $this->input->post("vaccine_missed_reason_ed");

	for ($k=0; $k < count($family_memb_name_list_ed); $k++) { 
		$info_ed = array("district_code"=>$district,
					"rm"=>$rm,
					"ward_no"=>$ward_no,
					"family_sn"=>$family_sn_ed[$k],
					"family_memb_name_list"=>$family_memb_name_list_ed[$k],
					"gharmuli_table_id"=>$result->id,
					"house_no"=>$house_no,
					"gender"=>$gender_ed[$k],
					"relation_with_head_of_house"=>$relation_with_head_of_house_ed[$k],
					"any_other_relation_with_household"=>$any_other_relation_with_household_ed[$k],
					"in_out_district"=>$in_out_district_ed[$k],
					"birth_year"=>$birth_year_ed[$k],
					// "birth_month"=>$birth_month_ed[$i],
					"current_age"=>$current_age_ed[$k],
					"citizenship_certificate_taken"=>$citizenship_certificate_taken_ed[$k],
					"citizenship_number"=>$citizenship_number_ed[$k],
					"issued_district"=>$issued_district_ed[$k],
					"if_foreign_national"=>$if_foreign_national_ed[$k],
					"father_name"=>$father_name_ed[$k],      	
					"maritial_status"=>$maritial_status_ed[$k],
					"husband_or_wife_name"=>$husband_or_wife_name_ed[$k],
					"marriage_year"=>$marriage_year_ed[$k],
					"marriage_registered"=>$marriage_registered_ed[$k],
					"if_single"=>$if_single_ed[$k],

					"education_status"=>$education_status_ed[$k],
					"current_situation"=>$current_situation_ed[$k],
					"education_institution"=>$education_institution_ed[$k],
					"institution_location"=>$institution_location_ed[$k],
					"employment_status"=>$employment_status_ed[$k],
					"main_job"=>$main_job_ed[$k],
					"if_any_side_job"=>$if_any_side_job_ed[$k],
					"if_skilled_manpower"=>$if_skilled_manpower_ed[$k],
					"bank_account"=>$bank_account_ed[$k],
					"financial_transaction_bank_or_org"=>$financial_transaction_bank_or_org_ed[$k],      	
					"disability"=>$disability_ed[$k],
					"disability_type"=>$disability_type_ed[$k],
					"disabillity_body_part"=>$disabillity_body_part_ed[$k],
					"disability_id_card_taken"=>$disability_id_card_taken_ed[$k],
					"any_sustained_illness"=>$any_sustained_illness_ed[$k],

					"illness_type"=>$illness_type_ed[$k],
					"child_labour_outside_home"=>$child_labour_outside_home_ed[$k],
					"child_stay_outside_home_as_labour"=>$child_stay_outside_home_as_labour_ed[$k],
					"child_labour_work"=>$child_labour_work_ed[$k],
					"enrolled_in_club_or_social_org"=>$enrolled_in_club_or_social_org_ed[$k],
					"mobile_used"=>$mobile_used_ed[$k],
					"mobile_set_used"=>$mobile_set_used_ed[$k],
					"sim_card_used"=>$sim_card_used_ed[$k],
					"on_social_network"=>$on_social_network_ed[$k],
					"vehicle_possessed"=>$vehicle_possessed_ed[$k],
					"son_count"=>$son_count_ed[$k],      	
					"daughter_count"=>$daughter_count_ed[$k],
					"are_you_pregnent"=>$are_you_pregnent_ed[$k],
					"pregnent_month"=>$pregnent_month_ed[$k],
					"checkup_as_protocol"=>$checkup_as_protocol_ed[$k],
					"iron_tablet_regularly"=>$iron_tablet_regularly_ed[$k],

					"yucca_medicine_taken_regularly"=>$yucca_medicine_taken_regularly_ed[$k],  
					"tt_vaccine_taken"=>$tt_vaccine_taken_ed[$k],  
					"sutkeri_ko_awasta"=>$sutkeri_ko_awasta_ed[$k],  
					"iron_chakki_taken_during_sutkeri"=>$iron_chakki_taken_during_sutkeri_ed[$k],  
					"sutkeri_bhayeko_sthan"=>$sutkeri_bhayeko_sthan_ed[$k],  
					"child_vaccine_status"=>$child_vaccine_status_ed[$k],  
					"vaccine_missed_reason"=>$vaccine_missed_reason_ed[$k],
				);
	// print_r($info_ed);die;
	if (!empty($info_ed)){
	$this->post_model->insert_form('personal_info_form', $info_ed);
	}
	}
	// ends 
	
	$family_sn = $this->input->post("family_sn");
	$family_memb_name_list = $this->input->post("family_memb_name_list");
	$relation_with_head_of_house = $this->input->post("relation_with_head_of_house");
	$any_other_relation_with_household = $this->input->post("any_other_relation_with_household");
	$in_out_district = $this->input->post("in_out_district");
	$gender = $this->input->post("gender");
	$birth_year = $this->input->post("birth_year");
	// $birth_month = $this->input->post("birth_month");
	$current_age = $this->input->post("current_age");
	$citizenship_certificate_taken = $this->input->post("citizenship_certificate_taken");
	$citizenship_number = $this->input->post("citizenship_number");
	$issued_district = $this->input->post("issued_district");

	$if_foreign_national = $this->input->post("if_foreign_national");
	$father_name = $this->input->post("father_name");
	$maritial_status = $this->input->post("maritial_status");
	$husband_or_wife_name = $this->input->post("husband_or_wife_name");
	$marriage_year = $this->input->post("marriage_year");
	$marriage_registered = $this->input->post("marriage_registered");
	$if_single = $this->input->post("if_single");
	$education_status = $this->input->post("education_status");
	$current_situation = $this->input->post("current_situation");
	$education_institution = $this->input->post("education_institution");
	$institution_location = $this->input->post("institution_location");
	$employment_status = $this->input->post("employment_status");
	$main_job = $this->input->post("main_job");
	$if_any_side_job = $this->input->post("if_any_side_job");
	$if_skilled_manpower = $this->input->post("if_skilled_manpower");
	$bank_account = $this->input->post("bank_account");

	$financial_transaction_bank_or_org = $this->input->post("financial_transaction_bank_or_org");
	$disability = $this->input->post("disability");
	$disability_type = $this->input->post("disability_type");
	$disabillity_body_part = $this->input->post("disabillity_body_part");
	$disability_id_card_taken = $this->input->post("disability_id_card_taken");
	$any_sustained_illness = $this->input->post("any_sustained_illness");
	$illness_type = $this->input->post("illness_type");
	$child_labour_outside_home = $this->input->post("child_labour_outside_home");

	$child_stay_outside_home_as_labour = $this->input->post("child_stay_outside_home_as_labour");
	$child_labour_work = $this->input->post("child_labour_work");
	$enrolled_in_club_or_social_org = $this->input->post("enrolled_in_club_or_social_org");
	$mobile_used = $this->input->post("mobile_used");
	$mobile_set_used = $this->input->post("mobile_set_used");
	$sim_card_used = $this->input->post("sim_card_used");
	$on_social_network = $this->input->post("on_social_network");
	$vehicle_possessed = $this->input->post("vehicle_possessed");
	$son_count = $this->input->post("son_count");

	$daughter_count = $this->input->post("daughter_count");
	$are_you_pregnent = $this->input->post("are_you_pregnent");
	$pregnent_month = $this->input->post("pregnent_month");
	$checkup_as_protocol = $this->input->post("checkup_as_protocol");
	$iron_tablet_regularly = $this->input->post("iron_tablet_regularly");
	$yucca_medicine_taken_regularly = $this->input->post("yucca_medicine_taken_regularly");
	$tt_vaccine_taken = $this->input->post("tt_vaccine_taken");
	$sutkeri_ko_awasta = $this->input->post("sutkeri_ko_awasta");
	$iron_chakki_taken_during_sutkeri = $this->input->post("iron_chakki_taken_during_sutkeri");
	$sutkeri_bhayeko_sthan = $this->input->post("sutkeri_bhayeko_sthan");
	$child_vaccine_status = $this->input->post("child_vaccine_status");
	$vaccine_missed_reason = $this->input->post("vaccine_missed_reason");
	$sec_id = $this->input->post("sec_table_id");
	// print_r($sec_id);die;
	// $result = $this->darta_model->get_inserted_primary_data_id('gharmuli_info')->row();
	// print_r($result);die;

	for ($i = 0; $i < count($family_memb_name_list); $i++) {

	$data = array(	"district_code"=>$district,
					"rm"=>$rm,
					"ward_no"=>$ward_no,
					"family_sn"=>$family_sn[$i],
					"house_no"=>$house_no,
					"family_memb_name_list"=>$family_memb_name_list[$i],
					"gender"=>$gender[$i],
					"relation_with_head_of_house"=>$relation_with_head_of_house[$i],
					"any_other_relation_with_household"=>$any_other_relation_with_household[$i],
					"in_out_district"=>$in_out_district[$i],
					"birth_year"=>$birth_year[$i],
					// "birth_month"=>$birth_month[$i],
					"current_age"=>$current_age[$i],
					"citizenship_certificate_taken"=>$citizenship_certificate_taken[$i],
					"citizenship_number"=>$citizenship_number[$i],
					"issued_district"=>$issued_district[$i],
					"if_foreign_national"=>$if_foreign_national[$i],
					"father_name"=>$father_name[$i],      	
					"maritial_status"=>$maritial_status[$i],
					"husband_or_wife_name"=>$husband_or_wife_name[$i],
					"marriage_year"=>$marriage_year[$i],
					"marriage_registered"=>$marriage_registered[$i],
					"if_single"=>$if_single[$i],

					"education_status"=>$education_status[$i],
					"current_situation"=>$current_situation[$i],
					"education_institution"=>$education_institution[$i],
					"institution_location"=>$institution_location[$i],
					"employment_status"=>$employment_status[$i],
					"main_job"=>$main_job[$i],
					"if_any_side_job"=>$if_any_side_job[$i],
					"if_skilled_manpower"=>$if_skilled_manpower[$i],
					"bank_account"=>$bank_account[$i],
					"financial_transaction_bank_or_org"=>$financial_transaction_bank_or_org[$i],      	
					"disability"=>$disability[$i],
					"disability_type"=>$disability_type[$i],
					"disabillity_body_part"=>$disabillity_body_part[$i],
					"disability_id_card_taken"=>$disability_id_card_taken[$i],
					"any_sustained_illness"=>$any_sustained_illness[$i],

					"illness_type"=>$illness_type[$i],
					"child_labour_outside_home"=>$child_labour_outside_home[$i],
					"child_stay_outside_home_as_labour"=>$child_stay_outside_home_as_labour[$i],
					"child_labour_work"=>$child_labour_work[$i],
					"enrolled_in_club_or_social_org"=>$enrolled_in_club_or_social_org[$i],
					"mobile_used"=>$mobile_used[$i],
					"mobile_set_used"=>$mobile_set_used[$i],
					"sim_card_used"=>$sim_card_used[$i],
					"on_social_network"=>$on_social_network[$i],
					"vehicle_possessed"=>$vehicle_possessed[$i],
					"son_count"=>$son_count[$i],      	
					"daughter_count"=>$daughter_count[$i],
					"are_you_pregnent"=>$are_you_pregnent[$i],
					"pregnent_month"=>$pregnent_month[$i],
					"checkup_as_protocol"=>$checkup_as_protocol[$i],
					"iron_tablet_regularly"=>$iron_tablet_regularly[$i],

					"yucca_medicine_taken_regularly"=>$yucca_medicine_taken_regularly[$i],  
					"tt_vaccine_taken"=>$tt_vaccine_taken[$i],  
					"sutkeri_ko_awasta"=>$sutkeri_ko_awasta[$i],  
					"iron_chakki_taken_during_sutkeri"=>$iron_chakki_taken_during_sutkeri[$i],  
					"sutkeri_bhayeko_sthan"=>$sutkeri_bhayeko_sthan[$i],  
					"child_vaccine_status"=>$child_vaccine_status[$i],  
					"vaccine_missed_reason"=>$vaccine_missed_reason[$i],
					// "gharmuli_table_id"=>$result->id, 
					// "user_id"=>$user_id,  
		);
// print_r($data);die;	
$table_name = "personal_info_form";
$update = $this->post_model->update_form($table_name, $data, $sec_id[$i]);
}
// die;
if ($update == TRUE){
	$this->session->set_flashdata('updated', 'रेकर्ड उपडेट भयो !!');
	redirect ('pages/edit_personal_by_id/'.$pri_id.'');
}else{
	$this->session->set_flashdata('error', 'रेकर्ड उपडेट हुन सकेन !!');
	redirect ('pages/edit_personal_by_id/'.$pri_id.'');
}

		// if($this->darta_model->insert_form($table_name, $data[$i]) == TRUE)
		// 	{
		// 	$this->data["success_message"] = "रेकर्ड दाखिला भयो";
		// 	redirect('pages/personal_form');
		// 	}
		// else
		// 	{
		// 	$this->data["error_message"] = "error";
		// 	}
		
	}
}

	public function search_personal(){
		$name = $this->input->post('gharmuli_name');
			if (!empty($_POST) ){
				$data['name'] = $this->darta_model->search_gharmuli_by_name($name);
				// print_r($data);
				if (!empty($data)){
					$this->load->view('pages/view_search', $data);
				}else{
					echo "No Match Found !!";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}

	public function search_single(){
		$name = $this->input->post('person_name');
		$ghar = $this->input->post('ghar_no');
		$cit_id = $this->input->post('cit_id');
			if (!empty($_POST['person_name']) || !empty($_POST['cit_id']) ){
				$data['single'] = $this->darta_model->get_single_by_search($name,$ghar,$cit_id);
				// print_r($data);
				if (!empty($data['single'])){
					$this->load->view('pages/view_search', $data);
				}else{
					echo "No Match Found !!";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}

	public function search_parents(){

	$name = $this->input->post('parents_name');
	// print_r($name);die;
	if (!empty($name) ){
				$data['parents'] = $this->darta_model->search_nuclear_family($name);
				
				if (!empty($data['parents'])){
					$this->load->view('pages/view_search', $data);
				}else{
					echo "No Match Found !!";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}

	public function search_male(){
	// echo "hello";die;
	// 	echo "ds";
	$name = $this->input->post('h_name');
	$cit_id = $this->input->post('h_cit_id');
	// $id = $this->input->post('id');
	// print_r($id);die;
	if (!empty($name) || !empty($cit_id)){
				$data['husband_list'] = $this->darta_model->get_people_info($name, $cit_id);
				// print_r($data);die;
				if (!empty($data['husband_list'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 class='mt-4 ml-4' style='color: red;'>No Match Found !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}
	public function fetch_hus(){
		// $name = $this->input->post('husband_name');
		$name = $this->input->post('pop_id');
		$cit_id = $this->input->post('citizenship_number');
		$id = $this->input->post('id');
		// print_r($name);die;
		if (!empty($name) || !empty($cit_id)){
				$data['husband'] = $this->darta_model->get_husband_info_by_id($name, $cit_id,$id);
				print_r($data['husband']);die;
				if (!empty($data['husband'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 class='mt-4 ml-4' style='color: red;'>No Match Found !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}
	public function show_sadashya(){
	$idd = $this->input->post('user_id');
	// print_r($_POST);die;
	if (!empty($idd)){
				$data['member2'] = $this->darta_model->get_single_info_by_id($idd);
				// print_r($data);die;
				if (!empty($data['member2'])){
					$this->load->view('search/ajax-member', $data);
				}else{
					echo "<h5 style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "<h5 style='color: red;'>कृपया फिल्डमा डाटा हाल्नुहोस !!</h5>";
			}
	}

	public function search_sadashya2(){
	$name = $this->input->post('memb_name');
	$cit_id = $this->input->post('memb_cit_id');
	// print_r($name);die;
	if (!empty($name) || !empty($cit_id)){
				$data['mem_list'] = $this->darta_model->get_people_info_all($name, $cit_id);
				// print_r($data);die;
				if (!empty($data['mem_list'])){
					$this->load->view('search/ajax-member', $data);
				}else{
					echo "<h5 style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "<h5 style='color: red;'>कृपया फिल्डमा डाटा हाल्नुहोस !!</h5>";
			}
	}

	public function search_marriage(){
	// echo "hello";die;
	$name = $this->input->post('name');
	$cit_id = $this->input->post('wif_cit');
	$male_name = $this->input->post('male_name');
	$mal_cit = $this->input->post('mal_cit');
	if (!empty($name) || !empty($cit_id)){
	$data['wife_list'] = $this->darta_model->get_people_info_female($name, $cit_id);
		if (!empty($data['wife_list'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 class='mt-4 ml-4' style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
			}else if (!empty($male_name) || !empty($mal_cit)){
	$data['husband_list'] = $this->darta_model->get_people_info_male($male_name, $mal_cit);
		if (!empty($data['husband_list'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
			}else if(empty($name || $male_name)){
				echo "<h5 style='color: red;'>कृपया फिल्डमा डाटा हाल्नुहोस !!</h5>";
			}
	}

	public function newmarriage(){
		$h_name = $this->input->post('pop_id');
		$male = $this->input->post('male_id');
		
		if (!empty($h_name)){
			$data['list'] = $this->darta_model->get_single_info_by_id($h_name);
				if (!empty($data['list'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
			}else if(!empty($male)){
				$data['h_list'] = $this->darta_model->get_single_info_by_id($male);
				if (!empty($data['h_list'])){
					$this->load->view('search/ajax_marriage', $data);
				}else{
					echo "<h5 style='color: red;'>कुनै पनि रेकर्ड भेटाउन सकिएन !!</h5>";
				}
			}else{
				echo "<h5 style='color: red;'>कृपया फिल्डमा डाटा हाल्नुहोस !!</h5>";
			}
	}
	public function insert_marriage(){
		// print_r($_POST);die;
			$h_name = $this->input->post('husband_name');
			$w_name = $this->input->post('wife_name');
			$hus_cit = $this->input->post('husband_cit_no');
			$hus_age = $this->input->post('hus_age');
			$wife_age = $this->input->post('wif_age');
			$wif_cit = $this->input->post('wife_cit_no');
			$darta_no = $this->input->post('darta_no');
			$married_date = $this->input->post('married_date');
			$wife_user_id = $this->input->post('wif_id');
			$husband_user_id = $this->input->post('oth_id');
			// echo $hus_age;die;

			$datas = array(	"husband_name"=>$h_name,
					"wife_name"=>$w_name,
					"husband_cit_no"=>$hus_cit,
					"wife_cit_no"=>$wif_cit,
					"darta_no"=>$darta_no,
					"husband_user_id"=>$husband_user_id,
					"wife_user_id"=>$wife_user_id,
					"husband_age"=>$hus_age,
					"wife_age"=>$wife_age,
					"married_date"=>$married_date
				);
			// print_r($datas);
			
			$check_dup = $this->darta_model->check_marriage_exists($husband_user_id, $wife_user_id);
			if ($husband_user_id == $wife_user_id){
				echo "<p style='color: red'>Error...Same User in both field.</p>";
			die;
			}else if ($check_dup == false){
			$insert = $this->post_model->insert_form('marriage_registration', $datas);
			echo "<p style='color: green'>विबाह दर्ता दाखिला भयो..</p>";
			die;
		}else if($check_dup == true){
			echo "<p style='color: red'>रेकर्ड पहिले नै दाखिला भईसक्यो...</p>";
		}
		else{
			echo "<p style='color: red'>Sorry!! Some Error Occurred.</p>";
		}
		die;
	}

	public function insert_relation(){
		if (isset($_POST)){

			$first_member_name = $this->input->post('first_member_name');
			$first_member_cit_no = $this->input->post('first_member_cit_no');
			$first_memb_user_id = $this->input->post('first_memb_user_id');
			$first_memb_gender = $this->input->post('first_memb_gender');
			$sec_memb_name = $this->input->post('sec_memb_name');
			$sec_memb_cit_no = $this->input->post('sec_memb_cit_no');
			$sec_memb_user_id = $this->input->post('sec_memb_user_id');
			$sec_memb_gender = $this->input->post('sec_memb_gender');
			$relation_first = $this->input->post('relation_first');
			$relation_second = $this->input->post('relation_second');

			$dat = array( "first_member_name"=>$first_member_name,
					"first_member_cit_no"=>$first_member_cit_no,
					"first_memb_user_id"=>$first_memb_user_id,
					"first_memb_gender"=>$first_memb_gender,
					"sec_memb_name"=>$sec_memb_name,
					"sec_memb_cit_no"=>$sec_memb_cit_no,
					"sec_memb_gender"=>$sec_memb_gender,
					"sec_memb_user_id"=>$sec_memb_user_id,
					"relation_first"=>$relation_first,
					"relation_second"=>$relation_second
				);
			// print_r($dat);die;
			
			$check_rel = $this->darta_model->check_relation_exists($first_memb_user_id, $sec_memb_user_id);
			// print_r($check_rel);die;
			if ($first_memb_user_id == $sec_memb_user_id){
				echo "<p style='color: red'>Not valid User Entry..try again</p>";
			die;
			}else if (empty($check_rel)){
			// print_r($dat);die;
			$ok = $this->post_model->insert_form('relation_darta', $dat);
			echo "<p style='color: green'>नाता प्रमाणित दाखिला भयो..</p>";
			// print_r($dat);
			die;
		}else if (!empty($check_rel)){
			echo "<p style='color: red'>यस रेकर्ड पहिले नै दाखिला भइसक्यो...रेकर्ड दाखिला भएन !</p>";
			die;
		}else{
			echo "<p style='color: red'>रेकर्ड दाखिला भएन..कृपया पुन प्रयास गर्नुहोस</p>";
		}
		die;
		}
	}

		public function insert_migration(){
		// print_r($_POST);die;
			$in_out = $this->input->post('in_out');
			$district = $this->input->post('district');
			$mun_vdc = $this->input->post('mun_vdc');
			$ward_no = $this->input->post('ward_no');
			$form_darta_no = $this->input->post('form_darta_no');
			$household_name = $this->input->post('household_name');
			$household_gender = $this->input->post('household_gender');
			$migration_date = $this->input->post('migration_date');
			$eng_date = $this->input->post('eng_date');
			$migration_darta_no = $this->input->post('migration_darta_no');
			$gharmuli_id = $this->input->post('link_id');
			// echo $hus_age;die;

			$datas = array(	"in_out"=>$in_out,
					"district"=>$district,
					"ward_no"=>$ward_no,
					"mun_vdc"=>$mun_vdc,
					"form_darta_no"=>$form_darta_no,
					"household_name"=>$household_name,
					"household_gender"=>$household_gender,
					"migration_date"=>$migration_date,
					"mig_date"=>$eng_date,
					"migration_darta_no"=>$migration_darta_no,
					"gharmuli_table_id"=>$gharmuli_id
				);
			// print_r($datas);
			
			$check_dup = $this->darta_model->check_migration_exists($gharmuli_id);

		if ($check_dup == false){
			$insert = $this->post_model->insert_form('migration_info', $datas);
			echo "<p style='color: green'>बसाई सऱाई दर्ता दाखिला भयो..</p>";
			die;
		}else if($check_dup == true){
			echo "<p style='color: red'>रेकर्ड पहिले नै दाखिला भईसक्यो...</p>";
		}
		else{
			echo "<p style='color: red'>Sorry!! Some Error Occurred.</p>";
		}
		die;
	}

	public function check_val(){
		$name=$_POST['user_name'];
		// echo $name;die;
		$check = $this->darta_model->check_citizen_exists($name);
		// print_r($check);die;
		if ($check == true){
			echo "<p class='mt-2'><i class='fa fa-minus-circle' style='font-size:25px;color:#d92626'></i> Please Enter Correct values above.</p>";
		}else{
			echo "<i class='fa fa-check-circle' style='font-size:25px;color:green'></i>";
		}
	}

	public function search_people(){
	$name = $this->input->post('person_name');
	$cit_id = $this->input->post('cit_id');
	// print_r($name);die;
	if (!empty($name) || !empty($cit_id)){
				$data['person'] = $this->darta_model->get_people_info($name, $cit_id);
				// print_r($data);die;
				if (!empty($data['person'])){
					$this->load->view('search/ajax-member', $data);
				}else{
					echo "<h5 class='mt-4 ml-4' style='color: red;'>No Match Found !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}
	}

	public function test(){
		$name = $this->input->post('person_name');
		$cit_id = $this->input->post('ccitizenship_number');
			if (!empty($name) || !empty($cit_id)){
				$data['person_display'] = $this->darta_model->get_people_info($name, $cit_id);
				// print_r($data);die;
				if (!empty($data['person_display'])){
					$this->load->view('search/ajax-member', $data);
				}else{
					echo "<h5 class='mt-4 ml-4' style='color: red;'>No Match Found !!</h5>";
				}
				// $this->load->view('admin/view_search', $data);
			}else{
				echo "Empty field";
			}

	}

	public function insert_janma_darta(){
		// echo '<pre>';
		// print_r($_POST);die;
		if(isset($_POST["save_personal"]))
		{	
	$district = $this->input->post("district");
	$mun_vdc = $this->input->post("mun_vdc");
	$ward_no = $this->input->post("ward_no");
	$form_darta_no = $this->input->post("form_darta_no");
	$name = $this->input->post("child_name");
	$child_gender = $this->input->post("child_gender");
	$birth_date = $this->input->post("birth_date");
	$eng_date = $this->input->post("eng_date");
	$birth_darta_no = $this->input->post("birth_darta_no");
	$father_name = $this->input->post("father_name");
	$info_id = $this->input->post("personal_id");
	$tid = $this->input->post("link_id");
	$data = array(	"name"=>$name,
					"birth_date"=>$birth_date,
					"birth_date_eng"=>$eng_date,
					"birth_regist_no"=>$birth_darta_no,
					"father_name"=>$father_name,
					"district"=>$district,
					"gender"=>$child_gender,
					"mun_vdc"=>$mun_vdc,
					"form_darta_no"=>$form_darta_no,
					"ward_no"=>$ward_no,
					"personal_info_id"=>$info_id
				);

	$ins = $this->post_model->insert_form('birth_regist', $data);
	if ($ins == TRUE){
		$rec_id = $this->post_model->get_inserted_primary_data_id("birth_regist")->row();
		$inf = array(
			"birth_regist_id" => $rec_id->id
		);
		$this->post_model->update_form('personal_info_form', $inf,$info_id);

	$this->session->set_flashdata('insert', 'जन्म दर्ता दाखिला भयो..');
	redirect ('darta/janma_darta/'.$tid.' ');
	}else{
	$this->session->set_flashdata('error', 'रेकर्ड दाखिला हुन सकेन !!');
	redirect ('darta/janma_darta/'.$tid.' ');
			}
		} 
	}

		public function insert_janma_darta2(){
		// echo '<pre>';
		// print_r($_POST);die;
		if(isset($_POST["save_personal"]))
		{	
	$district = $this->input->post("district");
	$mun_rm = $this->input->post("mun_rm");
	$ward_no = $this->input->post("ward_no");
	$local_auth_name = $this->input->post("local_auth_name");
	$local_auth_name_eng = $this->input->post("local_auth_name_eng");
	$emp_record_no = $this->input->post("emp_record_no");
	$form_darta_no = $this->input->post("form_darta_no");
	$family_form_no = $this->input->post("family_form_no");
	$child_name_nep = $this->input->post("child_name_nep");
	$child_name_eng = $this->input->post("child_name_eng");
	$birth_date_nep = $this->input->post("birth_date_nep");
	$birth_date_eng = $this->input->post("birth_date_eng");

	$child_birth_place = $this->input->post("child_birth_place");
	$helper_dur_birth = $this->input->post("helper_dur_birth");
	$gender = $this->input->post("gender");
	$caste = $this->input->post("caste");
	$birth_type = $this->input->post("birth_type");
	$physical_defect = $this->input->post("physical_defect");
	$if_any_physical_defect = $this->input->post("if_any_physical_defect");
	$grandfather_name = $this->input->post("grandfather_name");
	$gf_name_eng = $this->input->post("gf_name_eng");
	$father_name_nep = $this->input->post("father_name_nep");
	$mother_name_nep = $this->input->post("mother_name_nep");
	$father_name_eng = $this->input->post("father_name_eng");
	$mother_name_eng = $this->input->post("mother_name_eng");
	$father_district = $this->input->post("father_district");
	$mother_district = $this->input->post("mother_district");

	$father_rm = $this->input->post("father_rm");
	$mother_rm = $this->input->post("mother_rm");
	$father_ward = $this->input->post("father_ward");
	$mother_ward = $this->input->post("mother_ward");
	$father_marga = $this->input->post("father_marga");
	$mother_marga = $this->input->post("mother_marga");
	$father_tole = $this->input->post("father_tole");
	$mother_tole = $this->input->post("mother_tole");
	$father_ghar_no = $this->input->post("father_ghar_no");
	$mother_ghar_no = $this->input->post("mother_ghar_no");
	$fat_age_during_child_birth = $this->input->post("fat_age_during_child_birth");
	$mot_age_during_child_birth = $this->input->post("mot_age_during_child_birth");
	$father_birth_country = $this->input->post("father_birth_country");
	$mother_birth_country = $this->input->post("mother_birth_country");
	$father_cit_taken_country = $this->input->post("father_cit_taken_country");

	$mother_cit_taken_country = $this->input->post("mother_cit_taken_country");
	$father_cit_no = $this->input->post("father_cit_no");
	$mother_cit_no = $this->input->post("mother_cit_no");
	$fat_cit_issued = $this->input->post("fat_cit_issued");
	$mot_cit_issued = $this->input->post("mot_cit_issued");
	$cit_iss_dist_fat = $this->input->post("cit_iss_dist_fat");
	$cit_iss_dist_mot = $this->input->post("cit_iss_dist_mot");
	$if_fat_foreign = $this->input->post("if_fat_foreign");
	$if_mot_foreign = $this->input->post("if_mot_foreign");
	$fat_education = $this->input->post("fat_education");

	$mot_education = $this->input->post("mot_education");
	$father_job = $this->input->post("father_job");
	$mother_job = $this->input->post("mother_job");
	$fat_religion = $this->input->post("fat_religion");
	$mot_religion = $this->input->post("mot_religion");
	$fat_mother_tongue = $this->input->post("fat_mother_tongue");
	$mot_mother_tongue = $this->input->post("mot_mother_tongue");
	$tot_children = $this->input->post("tot_children");
	$tot_alive_children = $this->input->post("tot_alive_children");
	$marriage_darta_no = $this->input->post("marriage_darta_no");
	$married_date = $this->input->post("married_date");
	// $tid = $this->input->post("link_id");
	$data = array(	"district"=>$district,
					"mun_rm"=>$mun_rm,
					"ward_no"=>$ward_no,
					"local_auth_name"=>$local_auth_name,
					"local_auth_name_eng"=>$local_auth_name_eng,
					"emp_record_no"=>$emp_record_no,
					"form_darta_no"=>$form_darta_no,
					"family_form_no"=>$family_form_no,
					"child_name_nep"=>$child_name_nep,
					"child_name_eng"=>$child_name_eng,
					"birth_date_nep"=>$birth_date_nep,
					"birth_date_eng"=>$birth_date_eng,
					"child_birth_place"=>$child_birth_place,
					"helper_dur_birth"=>$helper_dur_birth,
					"gender"=>$gender,
					"caste"=>$caste,
					"birth_type"=>$birth_type,
					"physical_defect"=>$physical_defect,
					"if_any_physical_defect"=>$if_any_physical_defect,
					"grandfather_name"=>$grandfather_name,
					"gf_name_eng"=>$gf_name_eng,

					"father_name_nep"=>$father_name_nep,
					"mother_name_nep"=>$mother_name_nep,
					"father_name_eng"=>$father_name_eng,
					"mother_name_eng"=>$mother_name_eng,
					"father_district"=>$father_district,
					"mother_district"=>$mother_district,
					"father_rm"=>$father_rm,
					"mother_rm"=>$mother_rm,
					"father_ward"=>$father_ward,
					"mother_ward"=>$mother_ward,
					"father_marga"=>$father_marga,
					"mother_marga"=>$mother_marga,
					"father_tole"=>$father_tole,
					"mother_tole"=>$mother_tole,
					"father_ghar_no"=>$father_ghar_no,
					"mother_ghar_no"=>$mother_ghar_no,
					"fat_age_during_child_birth"=>$fat_age_during_child_birth,
					"mot_age_during_child_birth"=>$mot_age_during_child_birth,
					"father_birth_country"=>$father_birth_country,
					"mother_birth_country"=>$mother_birth_country,

					"father_cit_taken_country"=>$father_cit_taken_country,
					"mother_cit_taken_country"=>$mother_cit_taken_country,
					"father_cit_no"=>$father_cit_no,
					"mother_cit_no"=>$mother_cit_no,
					"fat_cit_issued"=>$fat_cit_issued,
					"mot_cit_issued"=>$mot_cit_issued,
					"cit_iss_dist_fat"=>$cit_iss_dist_fat,
					"cit_iss_dist_mot"=>$cit_iss_dist_mot,
					"if_fat_foreign"=>$if_fat_foreign,
					"if_mot_foreign"=>$if_mot_foreign,
					"fat_education"=>$fat_education,
					"mot_education"=>$mot_education,
					"father_job"=>$father_job,
					"mother_job"=>$mother_job,
					"fat_religion"=>$fat_religion,
					"mot_religion"=>$mot_religion,

					"fat_mother_tongue"=>$fat_mother_tongue,
					"mot_mother_tongue"=>$mot_mother_tongue,
					"tot_children"=>$tot_children,
					"tot_alive_children"=>$tot_alive_children,
					"marriage_darta_no"=>$marriage_darta_no,
					"married_date"=>$married_date
				);

	$ins = $this->post_model->insert_form('birth_registration', $data);
	if ($ins == TRUE){
		// $rec_id = $this->post_model->get_inserted_primary_data_id("birth_regist")->row();
		// $inf = array(
		// 	"birth_regist_id" => $rec_id->id
		// );
		// $this->post_model->update_form('personal_info_form', $inf,$info_id);

	$this->session->set_flashdata('insert', 'जन्म दर्ता दाखिला भयो..');
	redirect ('darta/janmadarta/');
	// echo "inserted";die;
	}else{
	$this->session->set_flashdata('error', 'रेकर्ड दाखिला हुन सकेन !!');
	redirect ('darta/janmadarta/ ');
	// echo "error";
			}
		} 
	}

	public function insert_marriage2(){
		// echo '<pre>';
		// print_r($_POST);
		if(isset($_POST["save_personal"]))
		{	
	$district = $this->input->post("district");
	$mun_rm = $this->input->post("mun_rm");
	$ward_no = $this->input->post("ward_no");
	$local_auth_name = $this->input->post("local_auth_name");
	$local_auth_name_eng = $this->input->post("local_auth_name_eng");
	$emp_record_no = $this->input->post("emp_record_no");
	$form_darta_no = $this->input->post("form_darta_no");
	$family_form_no = $this->input->post("family_form_no");

	$marriage_type = $this->input->post("marriage_type");
      $marr_darta_no = $this->input->post("marr_darta_no");
	$married_date = $this->input->post("married_date");
	$married_district = $this->input->post("married_district");
	$married_rm = $this->input->post("married_rm");
	$married_ward = $this->input->post("married_ward");
	$married_marga = $this->input->post("married_marga");
	$married_tole = $this->input->post("married_tole");
	$married_ghar_no = $this->input->post("married_ghar_no");
	$married_abroad_address = $this->input->post("married_abroad_address");
	$married_abroad_address_eng = $this->input->post("married_abroad_address_eng");
	$husband_name_nep = $this->input->post("husband_name_nep");
	$wife_name_nep = $this->input->post("wife_name_nep");
	$husband_name_eng = $this->input->post("husband_name_eng");
	$wife_name_eng = $this->input->post("wife_name_eng");
	$husband_dob = $this->input->post("husband_dob");
	$wife_dob = $this->input->post("wife_dob");
	$husband_caste = $this->input->post("mohusband_castether_name_eng");
	$wife_caste = $this->input->post("wife_caste");
	$hus_previous_marriage = $this->input->post("hus_previous_marriage");
	$wif_previous_marriage = $this->input->post("wif_previous_marriage");

	$hus_edu_passed = $this->input->post("hus_edu_passed");
	$wif_edu_passed = $this->input->post("wif_edu_passed");
	$hus_job = $this->input->post("hus_job");
	$wif_job = $this->input->post("wif_job");
	$hus_religion = $this->input->post("hus_religion");
	$wif_religion = $this->input->post("wif_religion");
	$hus_mother_tongue = $this->input->post("hus_mother_tongue");
	$wif_mother_tongue = $this->input->post("wif_mother_tongue");
	$husband_district = $this->input->post("husband_district");
	$wife_district = $this->input->post("wife_district");
	$husband_rm = $this->input->post("husband_rm");
	$wife_rm = $this->input->post("wife_rm");
	$husband_ward = $this->input->post("husband_ward");
	$wife_ward = $this->input->post("wife_ward");

	$husband_marga = $this->input->post("husband_marga");
	$wife_marga = $this->input->post("wife_marga");
	$husband_tole = $this->input->post("husband_tole");
	$wife_tole = $this->input->post("wife_tole");
	$husband_ghar_no = $this->input->post("husband_ghar_no");
	$wife_ghar_no = $this->input->post("wife_ghar_no");
	$husband_birth_country = $this->input->post("husband_birth_country");
	$wife_birth_country = $this->input->post("wife_birth_country");
	$husband_cit_taken_country = $this->input->post("husband_cit_taken_country");
	$wife_cit_taken_country = $this->input->post("wife_cit_taken_country");

	$husband_cit_no = $this->input->post("husband_cit_no");
	$wife_cit_no = $this->input->post("wife_cit_no");
	$hus_cit_issued = $this->input->post("hus_cit_issued");
	$wif_cit_issued = $this->input->post("wif_cit_issued");
	$cit_iss_dist_hus = $this->input->post("cit_iss_dist_hus");
	$cit_iss_dist_wif = $this->input->post("cit_iss_dist_wif");
	$if_hus_foreign = $this->input->post("if_hus_foreign");
	$if_wif_foreign = $this->input->post("if_wif_foreign");
	$hus_address_if_foreign_nep = $this->input->post("hus_address_if_foreign_nep");
	$wif_address_if_foreign_nep = $this->input->post("wif_address_if_foreign_nep");
	$hus_address_if_foreign_eng = $this->input->post("hus_address_if_foreign_eng");

	$wif_address_if_foreign_eng = $this->input->post("wif_address_if_foreign_eng");
	$hus_grandfat_fullname_nep = $this->input->post("hus_grandfat_fullname_nep");
	$wif_grandfat_fullname_nep = $this->input->post("wif_grandfat_fullname_nep");
	$hus_grandfat_fullname_eng = $this->input->post("hus_grandfat_fullname_eng");
	$wif_grandfat_fullname_eng = $this->input->post("wif_grandfat_fullname_eng");
	$hus_fat_fullname_nep = $this->input->post("hus_fat_fullname_nep");
	$wif_fat_fullname_nep = $this->input->post("wif_fat_fullname_nep");
	$hus_fat_fullname_eng = $this->input->post("hus_fat_fullname_eng");
	$wif_fat_fullname_eng = $this->input->post("wif_fat_fullname_eng");

	$hus_mot_fullname_nep = $this->input->post("hus_mot_fullname_nep");
	$wif_mot_fullname_nep = $this->input->post("wif_mot_fullname_nep");
	$hus_mot_fullname_eng = $this->input->post("hus_mot_fullname_eng");
	$wif_mot_fullname_eng = $this->input->post("wif_mot_fullname_eng");
	// $tid = $this->input->post("link_id");

	// $name = $this->input->post("userfile");
	// $name = $_FILES["userfile"]['name'];
	// $name = str_replace(' ', '_', $name);
	// $new_name = time().'_'.$name;
// echo $name;die;
	$data = array(	"district"=>$district,
					"mun_rm"=>$mun_rm,
					"ward_no"=>$ward_no,
					"local_auth_name"=>$local_auth_name,
					"local_auth_name_eng"=>$local_auth_name_eng,
					"emp_record_no"=>$emp_record_no,
					"form_darta_no"=>$form_darta_no,
					"family_form_no"=>$family_form_no,

					"marriage_type"=>$marriage_type,
                              "marr_darta_no"=>$marr_darta_no,
					"married_date"=>$married_date,
					"married_district"=>$married_district,
					"married_rm"=>$married_rm,
					"married_ward"=>$married_ward,
					"married_marga"=>$married_marga,
					"married_tole"=>$married_tole,
					"married_ghar_no"=>$married_ghar_no,
					"married_abroad_address"=>$married_abroad_address,
					"married_abroad_address_eng"=>$married_abroad_address_eng,

					"husband_name_nep"=>$husband_name_nep,
					"wife_name_nep"=>$wife_name_nep,
					"husband_name_eng"=>$husband_name_eng,
					"wife_name_eng"=>$wife_name_eng,
					"husband_dob"=>$husband_dob,
					"wife_dob"=>$wife_dob,
					"husband_caste"=>$husband_caste,
					"wife_caste"=>$wife_caste,
					"hus_previous_marriage"=>$hus_previous_marriage,
					"wif_previous_marriage"=>$wif_previous_marriage,
					"hus_edu_passed"=>$hus_edu_passed,
					"wif_edu_passed"=>$wif_edu_passed,
					"hus_job"=>$hus_job,
					"wif_job"=>$wif_job,
					"hus_religion"=>$hus_religion,
					"wif_religion"=>$wif_religion,
					"hus_mother_tongue"=>$hus_mother_tongue,
					"wif_mother_tongue"=>$wif_mother_tongue,
					"husband_district"=>$husband_district,
					"wife_district"=>$wife_district,
					"husband_rm"=>$husband_rm,
					"wife_rm"=>$wife_rm,
					"husband_ward"=>$husband_ward,
					"wife_ward"=>$wife_ward,

					"husband_marga"=>$husband_marga,
					"wife_marga"=>$wife_marga,
					"husband_tole"=>$husband_tole,
					"wife_tole"=>$wife_tole,
					"husband_ghar_no"=>$husband_ghar_no,
					"wife_ghar_no"=>$wife_ghar_no,
					"husband_birth_country"=>$husband_birth_country,
					"wife_birth_country"=>$wife_birth_country,
					"husband_cit_taken_country"=>$husband_cit_taken_country,
					"wife_cit_taken_country"=>$wife_cit_taken_country,
					"husband_cit_no"=>$husband_cit_no,
					"wife_cit_no"=>$wife_cit_no,
					"hus_cit_issued"=>$hus_cit_issued,
					"wif_cit_issued"=>$wif_cit_issued,
					"cit_iss_dist_hus"=>$cit_iss_dist_hus,
					"cit_iss_dist_wif"=>$cit_iss_dist_wif,

					"if_hus_foreign"=>$if_hus_foreign,
					"if_wif_foreign"=>$if_wif_foreign,
					"hus_address_if_foreign_nep"=>$hus_address_if_foreign_nep,
					"wif_address_if_foreign_nep"=>$wif_address_if_foreign_nep,
					"hus_address_if_foreign_eng"=>$hus_address_if_foreign_eng,
					"wif_address_if_foreign_eng"=>$wif_address_if_foreign_eng,
					"hus_grandfat_fullname_nep"=>$hus_grandfat_fullname_nep,
					"wif_grandfat_fullname_nep"=>$wif_grandfat_fullname_nep,
					"hus_grandfat_fullname_eng"=>$hus_grandfat_fullname_eng,
					"wif_grandfat_fullname_eng"=>$wif_grandfat_fullname_eng,
					"hus_fat_fullname_nep"=>$hus_fat_fullname_nep,
					"wif_fat_fullname_nep"=>$wif_fat_fullname_nep,
					"hus_fat_fullname_eng"=>$hus_fat_fullname_eng,
					"wif_fat_fullname_eng"=>$wif_fat_fullname_eng,
					"hus_mot_fullname_nep"=>$hus_mot_fullname_nep,
					"wif_mot_fullname_nep"=>$wif_mot_fullname_nep,
					"hus_mot_fullname_eng"=>$hus_mot_fullname_eng,
					"wif_mot_fullname_eng"=>$wif_mot_fullname_eng
				);


$config = array(
			'file_name' => $new_name,
			'upload_path' => './uploads/',
			// 'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
			// 'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1250",
			'max_width' => "1250"
);
		// print_r($config);die;
    	$this->load->library('upload', $config);
    	$this->upload->initialize($config);
    	$this->upload->do_upload();

					$arr3 = array('userfile' => $new_name);
					$value1 = array_merge($data, $arr3);
					$items[$i] = $value1;

	$ins = $this->post_model->insert_form('marriageregistration', $data);
	if ($ins == TRUE){
		// $rec_id = $this->post_model->get_inserted_primary_data_id("birth_regist")->row();
		// $inf = array(
		// 	"birth_regist_id" => $rec_id->id
		// );
		// $this->post_model->update_form('personal_info_form', $inf,$info_id);

	$this->session->set_flashdata('insert', 'जन्म दर्ता दाखिला भयो..');
	redirect ('darta/janmadarta/');
	// echo "inserted";die;
	}else{
	$this->session->set_flashdata('error', 'रेकर्ड दाखिला हुन सकेन !!');
	redirect ('darta/janmadarta/ ');
	// echo "error";
			}
		} 
	}

      public function update_marriage2(){

            if(isset($_POST["save_personal"]))
            { 
      $tid = $_POST['link_id'];
      unset($_POST['link_id']);  
      $district = $this->input->post("district");
      $mun_rm = $this->input->post("mun_rm");
      $ward_no = $this->input->post("ward_no");
      $local_auth_name = $this->input->post("local_auth_name");
      $local_auth_name_eng = $this->input->post("local_auth_name_eng");
      $emp_record_no = $this->input->post("emp_record_no");
      $form_darta_no = $this->input->post("form_darta_no");
      $family_form_no = $this->input->post("family_form_no");

      $marriage_type = $this->input->post("marriage_type");
      $marr_darta_no = $this->input->post("marr_darta_no");
      $married_date = $this->input->post("married_date");
      $married_district = $this->input->post("married_district");
      $married_rm = $this->input->post("married_rm");
      $married_ward = $this->input->post("married_ward");
      $married_marga = $this->input->post("married_marga");
      $married_tole = $this->input->post("married_tole");
      $married_ghar_no = $this->input->post("married_ghar_no");
      $married_abroad_address = $this->input->post("married_abroad_address");
      $married_abroad_address_eng = $this->input->post("married_abroad_address_eng");
      $husband_name_nep = $this->input->post("husband_name_nep");
      $wife_name_nep = $this->input->post("wife_name_nep");
      $husband_name_eng = $this->input->post("husband_name_eng");
      $wife_name_eng = $this->input->post("wife_name_eng");
      $husband_dob = $this->input->post("husband_dob");
      $wife_dob = $this->input->post("wife_dob");
      $husband_caste = $this->input->post("mohusband_castether_name_eng");
      $wife_caste = $this->input->post("wife_caste");
      $hus_previous_marriage = $this->input->post("hus_previous_marriage");
      $wif_previous_marriage = $this->input->post("wif_previous_marriage");

      $hus_edu_passed = $this->input->post("hus_edu_passed");
      $wif_edu_passed = $this->input->post("wif_edu_passed");
      $hus_job = $this->input->post("hus_job");
      $wif_job = $this->input->post("wif_job");
      $hus_religion = $this->input->post("hus_religion");
      $wif_religion = $this->input->post("wif_religion");
      $hus_mother_tongue = $this->input->post("hus_mother_tongue");
      $wif_mother_tongue = $this->input->post("wif_mother_tongue");
      $husband_district = $this->input->post("husband_district");
      $wife_district = $this->input->post("wife_district");
      $husband_rm = $this->input->post("husband_rm");
      $wife_rm = $this->input->post("wife_rm");
      $husband_ward = $this->input->post("husband_ward");
      $wife_ward = $this->input->post("wife_ward");

      $husband_marga = $this->input->post("husband_marga");
      $wife_marga = $this->input->post("wife_marga");
      $husband_tole = $this->input->post("husband_tole");
      $wife_tole = $this->input->post("wife_tole");
      $husband_ghar_no = $this->input->post("husband_ghar_no");
      $wife_ghar_no = $this->input->post("wife_ghar_no");
      $husband_birth_country = $this->input->post("husband_birth_country");
      $wife_birth_country = $this->input->post("wife_birth_country");
      $husband_cit_taken_country = $this->input->post("husband_cit_taken_country");
      $wife_cit_taken_country = $this->input->post("wife_cit_taken_country");

      $husband_cit_no = $this->input->post("husband_cit_no");
      $wife_cit_no = $this->input->post("wife_cit_no");
      $hus_cit_issued = $this->input->post("hus_cit_issued");
      $wif_cit_issued = $this->input->post("wif_cit_issued");
      $cit_iss_dist_hus = $this->input->post("cit_iss_dist_hus");
      $cit_iss_dist_wif = $this->input->post("cit_iss_dist_wif");
      $if_hus_foreign = $this->input->post("if_hus_foreign");
      $if_wif_foreign = $this->input->post("if_wif_foreign");
      $hus_address_if_foreign_nep = $this->input->post("hus_address_if_foreign_nep");
      $wif_address_if_foreign_nep = $this->input->post("wif_address_if_foreign_nep");
      $hus_address_if_foreign_eng = $this->input->post("hus_address_if_foreign_eng");

      $wif_address_if_foreign_eng = $this->input->post("wif_address_if_foreign_eng");
      $hus_grandfat_fullname_nep = $this->input->post("hus_grandfat_fullname_nep");
      $wif_grandfat_fullname_nep = $this->input->post("wif_grandfat_fullname_nep");
      $hus_grandfat_fullname_eng = $this->input->post("hus_grandfat_fullname_eng");
      $wif_grandfat_fullname_eng = $this->input->post("wif_grandfat_fullname_eng");
      $hus_fat_fullname_nep = $this->input->post("hus_fat_fullname_nep");
      $wif_fat_fullname_nep = $this->input->post("wif_fat_fullname_nep");
      $hus_fat_fullname_eng = $this->input->post("hus_fat_fullname_eng");
      $wif_fat_fullname_eng = $this->input->post("wif_fat_fullname_eng");

      $hus_mot_fullname_nep = $this->input->post("hus_mot_fullname_nep");
      $wif_mot_fullname_nep = $this->input->post("wif_mot_fullname_nep");
      $hus_mot_fullname_eng = $this->input->post("hus_mot_fullname_eng");
      $wif_mot_fullname_eng = $this->input->post("wif_mot_fullname_eng");
      // $tid = $this->input->post("link_id");

      // $name = $this->input->post("userfile");
      // $name = $_FILES["userfile"]['name'];
      // $name = str_replace(' ', '_', $name);
      // $new_name = time().'_'.$name;
// echo $name;die;
      $data = array(    "district"=>$district,
                              "mun_rm"=>$mun_rm,
                              "ward_no"=>$ward_no,
                              "local_auth_name"=>$local_auth_name,
                              "local_auth_name_eng"=>$local_auth_name_eng,
                              "emp_record_no"=>$emp_record_no,
                              "form_darta_no"=>$form_darta_no,
                              "family_form_no"=>$family_form_no,

                              "marriage_type"=>$marriage_type,
                              "marr_darta_no"=>$marr_darta_no,
                              "married_date"=>$married_date,
                              "married_district"=>$married_district,
                              "married_rm"=>$married_rm,
                              "married_ward"=>$married_ward,
                              "married_marga"=>$married_marga,
                              "married_tole"=>$married_tole,
                              "married_ghar_no"=>$married_ghar_no,
                              "married_abroad_address"=>$married_abroad_address,
                              "married_abroad_address_eng"=>$married_abroad_address_eng,

                              "husband_name_nep"=>$husband_name_nep,
                              "wife_name_nep"=>$wife_name_nep,
                              "husband_name_eng"=>$husband_name_eng,
                              "wife_name_eng"=>$wife_name_eng,
                              "husband_dob"=>$husband_dob,
                              "wife_dob"=>$wife_dob,
                              "husband_caste"=>$husband_caste,
                              "wife_caste"=>$wife_caste,
                              "hus_previous_marriage"=>$hus_previous_marriage,
                              "wif_previous_marriage"=>$wif_previous_marriage,
                              "hus_edu_passed"=>$hus_edu_passed,
                              "wif_edu_passed"=>$wif_edu_passed,
                              "hus_job"=>$hus_job,
                              "wif_job"=>$wif_job,
                              "hus_religion"=>$hus_religion,
                              "wif_religion"=>$wif_religion,
                              "hus_mother_tongue"=>$hus_mother_tongue,
                              "wif_mother_tongue"=>$wif_mother_tongue,
                              "husband_district"=>$husband_district,
                              "wife_district"=>$wife_district,
                              "husband_rm"=>$husband_rm,
                              "wife_rm"=>$wife_rm,
                              "husband_ward"=>$husband_ward,
                              "wife_ward"=>$wife_ward,

                              "husband_marga"=>$husband_marga,
                              "wife_marga"=>$wife_marga,
                              "husband_tole"=>$husband_tole,
                              "wife_tole"=>$wife_tole,
                              "husband_ghar_no"=>$husband_ghar_no,
                              "wife_ghar_no"=>$wife_ghar_no,
                              "husband_birth_country"=>$husband_birth_country,
                              "wife_birth_country"=>$wife_birth_country,
                              "husband_cit_taken_country"=>$husband_cit_taken_country,
                              "wife_cit_taken_country"=>$wife_cit_taken_country,
                              "husband_cit_no"=>$husband_cit_no,
                              "wife_cit_no"=>$wife_cit_no,
                              "hus_cit_issued"=>$hus_cit_issued,
                              "wif_cit_issued"=>$wif_cit_issued,
                              "cit_iss_dist_hus"=>$cit_iss_dist_hus,
                              "cit_iss_dist_wif"=>$cit_iss_dist_wif,

                              "if_hus_foreign"=>$if_hus_foreign,
                              "if_wif_foreign"=>$if_wif_foreign,
                              "hus_address_if_foreign_nep"=>$hus_address_if_foreign_nep,
                              "wif_address_if_foreign_nep"=>$wif_address_if_foreign_nep,
                              "hus_address_if_foreign_eng"=>$hus_address_if_foreign_eng,
                              "wif_address_if_foreign_eng"=>$wif_address_if_foreign_eng,
                              "hus_grandfat_fullname_nep"=>$hus_grandfat_fullname_nep,
                              "wif_grandfat_fullname_nep"=>$wif_grandfat_fullname_nep,
                              "hus_grandfat_fullname_eng"=>$hus_grandfat_fullname_eng,
                              "wif_grandfat_fullname_eng"=>$wif_grandfat_fullname_eng,
                              "hus_fat_fullname_nep"=>$hus_fat_fullname_nep,
                              "wif_fat_fullname_nep"=>$wif_fat_fullname_nep,
                              "hus_fat_fullname_eng"=>$hus_fat_fullname_eng,
                              "wif_fat_fullname_eng"=>$wif_fat_fullname_eng,
                              "hus_mot_fullname_nep"=>$hus_mot_fullname_nep,
                              "wif_mot_fullname_nep"=>$wif_mot_fullname_nep,
                              "hus_mot_fullname_eng"=>$hus_mot_fullname_eng,
                              "wif_mot_fullname_eng"=>$wif_mot_fullname_eng
                        );

      $ins = $this->post_model->update_form('marriageregistration', $data, $tid);
      if ($ins == TRUE){
            // $rec_id = $this->post_model->get_inserted_primary_data_id("birth_regist")->row();
            // $inf = array(
            //    "birth_regist_id" => $rec_id->id
            // );
            // $this->post_model->update_form('personal_info_form', $inf,$info_id);

      $this->session->set_flashdata('update', 'रेकर्ड अपडेट भयो..');
      redirect ('darta/list_marriage/');
      // echo "inserted";die;
      }else{
      $this->session->set_flashdata('error', 'रेकर्ड अपडेट हुन सकेन !!');
      redirect ('darta/list_marriage/ ');
      // echo "error";
                  }
            } 
      }

	public function add_deceased(){
		// echo '<pre>';
		// print_r($_POST);die;
	if(($_POST['deceased_insert'])){	
	$name = $this->input->post("deceased_name");
	$gender = $this->input->post("gender");
	$deceased_cit_no = $this->input->post("deceased_cit_no");
	$birth_year = $this->input->post("birth_year");
	$death_year = $this->input->post("death_year");
	$death_darta_no = $this->input->post("death_darta_no");
	$deceased_user_id = $this->input->post("sec_memb_user_id");
	
	$data = array(	"full_name"=>$name,
					"gender"=>$gender,
					"citizenship_no"=>$deceased_cit_no,
					"birth_date"=>$birth_year,
					"deceased_date"=>$death_year,
					"deceased_darta_no"=>$death_darta_no,
					"deceased_user_id" => $deceased_user_id
				);
	
	$ins = $this->post_model->insert_form('death_registration', $data);
	if ($ins == TRUE){
		$status = array("status" => "Deceased");
		$upd = $this->post_model->update_form('personal_info_form', $status, $deceased_user_id);
		// $rec_id = $this->post_model->get_inserted_primary_data_id("birth_regist")->row();
	$this->session->set_flashdata('insert', 'मृत्यु दर्ता दाखिला भयो..');
	redirect ('darta/death_registration');
	}else{
	$this->session->set_flashdata('error', 'रेकर्ड दाखिला हुन सकेन !!');
	redirect ('darta/death_registration');
			}
		}else{
			echo "not submitted";
		}
		echo json_encode($data);
	}

	public function delete_relation(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "relation_darta";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_id($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal'){
 				redirect ('darta/list_relation');
 			}else
			redirect ('darta/list_relation');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('darta/list_relation');
  		} 
	}

	public function delete_deceased(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "death_registration";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_id($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal'){
 				redirect ('darta/list_deceased');
 			}else
			redirect ('darta/list_deceased');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('darta/list_deceased');
  		} 
	}

		public function delete_migration(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "migration_info";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_id($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal'){
 				redirect ('darta/list_migration');
 			}else
			redirect ('darta/list_migration');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('darta/list_migration');
  		} 
	}

	public function delete_marriage(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "marriageregistration";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_id($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal'){
 				redirect ('darta/list_marriage');
 			}else
			redirect ('darta/list_marriage');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('darta/list_marriage');
  		} 
	}

	public function delete_birth(){
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$pers_tbl = "birth_registration";

		$tid = $this->uri->segment(3,1);
		// echo $tid;die;
		$result=$this->admin_model->delete_birth($pers_tbl, $tid);
		 if($result==1){
 			$this->session->set_flashdata('deleted', 'रेकर्ड मेटाउन सफल भयो');
 			if ($user_type == 'Normal'){
 				redirect ('darta/list_birth_records');
 			}else
			redirect ('darta/list_birth_records');
     		
  		}else{
  			$this->session->set_flashdata('not_deleted', 'रेकर्ड मेटाउदा समस्या आयो');
  			redirect ('darta/list_birth_records');
  		} 
	}

	public function search_person(){
		if( isset($_POST['male_member']) ){
		echo "hello";
		exit();
		}else{
			echo "Error!! . Not Submitted";
		}
	}


} // ends here