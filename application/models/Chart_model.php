<?php

class Chart_model extends CI_MODEL{
	public function __construct(){
		$this->load->database();
	}

	// public function get_population_by_gender(){
	// 	$this->db->select('sum(case when gender like "%महिला%" then 1 else 0 end) as महिला,
	// 		sum(case when gender like "%पुरुष%" then 1 else 0 end) as पुरुष,
	// 		sum(case when gender like "%अन्य%" then 1 else 0 end) as अन्य,
	// 		');
	// 	$query = $this->db->get('personal_info_bibaran2');
	// 	return $query->result_array();	
	// }

	public function get_population_by_gender(){
		$this->db->select('sum(case when member_gender like "%महिला%" then 1 else 0 end) as महिला,
			sum(case when member_gender like "%पुरुष%" then 1 else 0 end) as पुरुष,
			sum(case when member_gender like "%अन्य%" then 1 else 0 end) as अन्य,
			');
		$query = $this->db->get('member_info');
		return $query->result_array();	
	}

	public function get_household_by_gender(){
	$this->db->select('sum(case when household_gender like "%पुरुष5" then 1 else 0 end) as पुरुष,
			sum(case when household_gender like "%महिला%" then 1 else 0 end) as महिला,
			sum(case when household_gender like "%तेश्रो लिङ्गी%" then 1 else 0 end) as अन्य
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}
		// population on basis of religion 
	public function get_population_by_religion(){
		$this->db->select('sum(case when classify_basis_of_religion = "हिन्दू" then 1 else 0 end) as हिन्दू,
			sum(case when classify_basis_of_religion = "बौद्द" then 1 else 0 end) as बौद्द,
			sum(case when classify_basis_of_religion = "इस्लाम" then 1 else 0 end) as इस्लाम,
			sum(case when classify_basis_of_religion = "क्रिश्चियन" then 1 else 0 end) as क्रिश्चियन,
			sum(case when classify_basis_of_religion = "किराँत" then 1 else 0 end) as किराँत,
			sum(case when classify_basis_of_religion = "शिख" then 1 else 0 end) as शिख,
			sum(case when classify_basis_of_religion = "अन्य" then 1 else 0 end) as अन्य
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

		// population on basis of religion 
	public function get_population_by_mothertongue(){
		$this->db->select('sum(case when mother_tongue = "नेपाली" then 1 else 0 end) as नेपाली,
			sum(case when mother_tongue = "डोटेली/बझाँगी" then 1 else 0 end) as डोटेली,
			sum(case when mother_tongue = "थारु" then 1 else 0 end) as थारु,
			sum(case when mother_tongue = "मगर" then 1 else 0 end) as मगर,
			sum(case when mother_tongue = "भोटे लामा" then 1 else 0 end) as भोटे,
			sum(case when mother_tongue = "गुरुग तमु" then 1 else 0 end) as गुरुग,
			sum(case when mother_tongue = "अन्य" then 1 else 0 end) as अन्य
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

			// population on basis of caste 
	public function get_population_by_caste(){
		$this->db->select('sum(case when classify_basis_of_caste like "%व्राम्हण%" then 1 else 0 end) as ब्राह्मण,
			sum(case when classify_basis_of_caste like "%क्षेत्री%" then 1 else 0 end) as क्षेत्री,
			sum(case when classify_basis_of_caste like "%नेवार%" then 1 else 0 end) as नेवार,
			sum(case when classify_basis_of_caste like "%ठकुरी%" then 1 else 0 end) as ठकुरी,
			sum(case when classify_basis_of_caste like "%अादिवासी/जनजाती%" then 1 else 0 end) as जनजाती,
			sum(case when classify_basis_of_caste like "%सार्की/कामी%" then 1 else 0 end) as कामी,
			sum(case when classify_basis_of_caste like "%गुरुङ%" then 1 else 0 end) as गुरुङ,
			sum(case when classify_basis_of_caste like "%मगर%" then 1 else 0 end) as मगर,
			sum(case when classify_basis_of_caste like "%दलित%" then 1 else 0 end) as दलित,
			sum(case when classify_basis_of_caste like "%राई/लिम्बु%" then 1 else 0 end) as राई,
			sum(case when classify_basis_of_caste like "%थारु%" then 1 else 0 end) as थारु,
			sum(case when classify_basis_of_caste like "%यादव%" then 1 else 0 end) as यादव,
			sum(case when classify_basis_of_caste like "%घर्ति%" then 1 else 0 end) as घर्ति,
			sum(case when classify_basis_of_caste like "%दमाई%" then 1 else 0 end) as दमाई,
			sum(case when classify_basis_of_caste like "%कुमाल%" then 1 else 0 end) as कुमाल,
			sum(case when classify_basis_of_caste like "%अन्य%" then 1 else 0 end) as अन्य');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_male_pop_by_ward(){
		$this->db->select('sum(case when ward_no = "1" then male_family_count else 0 end) as mal1,
			sum(case when ward_no = "1" then female_family_count else 0 end) as fem1,
			sum(case when ward_no = "2" then male_family_count else 0 end) as mal2,
			sum(case when ward_no = "2" then female_family_count else 0 end) as fem2,
			sum(case when ward_no = "3" then male_family_count else 0 end) as mal3,
			sum(case when ward_no = "3" then female_family_count else 0 end) as fem3,
			sum(case when ward_no = "4" then male_family_count else 0 end) as mal4,
			sum(case when ward_no = "4" then female_family_count else 0 end) as fem4,
			sum(case when ward_no = "5" then male_family_count else 0 end) as mal5,
			sum(case when ward_no = "5" then female_family_count else 0 end) as fem5,
			sum(case when ward_no = "6" then male_family_count else 0 end) as mal6,
			sum(case when ward_no = "6" then female_family_count else 0 end) as fem6,
			sum(case when ward_no = "7" then male_family_count else 0 end) as mal7,
			sum(case when ward_no = "7" then female_family_count else 0 end) as fem7,
			sum(case when ward_no = "8" then male_family_count else 0 end) as mal8,
			sum(case when ward_no = "8" then female_family_count else 0 end) as fem8,
			sum(case when ward_no = "9" then male_family_count else 0 end) as mal9,
			sum(case when ward_no = "9" then female_family_count else 0 end) as fem9,'
		);
		$this->db->from('household_statistics_form');
		// $this->db->where('local_unit', $rm);
		// $this->db->where('ward_no', $ward);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_household_pop_by_ward(){
		$this->db->select('sum(case when ward_no = "1" and household_gender like "%पुरुष%" then 1 else 0 end) as mal1,
			sum(case when ward_no = "1" and household_gender like "%महिला%" then 1 else 0 end) as fem1,
			sum(case when ward_no = "2" and household_gender like "%पुरुष%" then 1 else 0 end) as mal2,
			sum(case when ward_no = "2" and household_gender like "%महिला%" then 1 else 0 end) as fem2,
			sum(case when ward_no = "3" and household_gender like "%पुरुष%" then 1 else 0 end) as mal3,
			sum(case when ward_no = "3" and household_gender like "%महिला%" then 1 else 0 end) as fem3,
			sum(case when ward_no = "4" and household_gender like "%पुरुष%" then 1 else 0 end) as mal4,
			sum(case when ward_no = "4" and household_gender like "%महिला%" then 1 else 0 end) as fem4,
			sum(case when ward_no = "5" and household_gender like "%पुरुष%" then 1 else 0 end) as mal5,
			sum(case when ward_no = "5" and household_gender like "%महिला%" then 1 else 0 end) as fem5,
			sum(case when ward_no = "6" and household_gender like "%पुरुष%" then 1 else 0 end) as mal6,
			sum(case when ward_no = "6" and household_gender like "%महिला%" then 1 else 0 end) as fem6,
			sum(case when ward_no = "7" and household_gender like "%पुरुष%" then 1 else 0 end) as mal7,
			sum(case when ward_no = "7" and household_gender like "%महिला%" then 1 else 0 end) as fem7,
			sum(case when ward_no = "8" and household_gender like "%पुरुष%" then 1 else 0 end) as mal8,
			sum(case when ward_no = "8" and household_gender like "%महिला%" then 1 else 0 end) as fem8,
			sum(case when ward_no = "9" and household_gender like "%पुरुष%" then 1 else 0 end) as mal9,
			sum(case when ward_no = "9" and household_gender like "%महिला%" then 1 else 0 end) as fem9,'
		);
		$this->db->distinct('household_name');
		// $this->db->from('household_statistics_form');
		// $this->db->where('local_unit', $rm);
		// $this->db->where('ward_no', $ward);
		$query = $this->db->get('household_statistics_form');
		return $query->result_array();	
	}

	public function get_population_by_ward(){

		$this->db->select('sum(female_family_count) as fem1, sum(male_family_count) as mal1');
		$this->db->from('household_statistics_form');
		// $this->db->where('local_unit', $rm);
		$this->db->where('ward_no', 1);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_disability(){
		$this->db->select('
			sum(case when member_gender = "पुरुष" and disabled = "छ" and disabled_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as पूर्ण_अपाङ्गता_पुरुष,
			sum(case when member_gender = "महिला" and disabled = "छ" and disabled_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as पूर्ण_अपाङ्गता_महिला,
			sum(case when member_gender = "पुरुष" and disabled = "छ" and disabled_type = "अति अशक्त (निलो)" then 1 else 0 end) as अति_अशक्त_पुरुष,
			sum(case when member_gender = "महिला" and disabled = "छ" and disabled_type = "अति अशक्त (निलो)" then 1 else 0 end) as अति_अशक्त_महिला,
			sum(case when member_gender = "पुरुष" and disabled = "छ" and disabled_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as मध्यम_अपाङ्गता_पुरुष,
			sum(case when member_gender = "महिला" and disabled = "छ" and disabled_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as मध्यम_अपाङ्गता_महिला,
			sum(case when member_gender = "पुरुष" and disabled = "छ" and disabled_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as सामान्य_अपाङ्गता_पुरुष,
			sum(case when member_gender = "महिला" and disabled = "छ" and disabled_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as सामान्य_अपाङ्गता_महिला
		');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_rojgari(){
		$this->db->select('
			sum(case when job_opportunity like "%सरकारी स्थायी%" then 1 else 0 end) as सरकारी_स्थायी,
			sum(case when job_opportunity like "%सरकारी करार वा अस्थायी%" then 1 else 0 end) as सरकारी_करार_वा_अस्थायी,
			sum(case when job_opportunity like "%अन्य निजी तथा गै स स%" then 1 else 0 end) as अन्य_निजी,
			sum(case when job_opportunity like "%वेरोजगार%" then 1 else 0 end) as वेरोजगार,
			sum(case when job_opportunity like "%विद्यार्थी%" then 1 else 0 end) as विद्यार्थी,
			sum(case when job_opportunity like "%नावालक%" then 1 else 0 end) as नावालक,
			sum(case when job_opportunity like "%सेवा निवृत्त%" then 1 else 0 end) as सेवा_निवृत्त
			
		');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_education(){
		$this->db->select('
			sum(case when education_status like "%निरक्षर%" then 1 else 0 end) as निरक्षर,
			sum(case when education_status like "%साक्षर%" then 1 else 0 end) as साक्षर,
			sum(case when education_status like "%अनौपचारिक शिक्षा%" then 1 else 0 end) as अनौपचारिक_शिक्षा,
			sum(case when education_status like "%प्राथमिक शिक्षा%" then 1 else 0 end) as प्राथमिक_शिक्षा,
			sum(case when education_status like "%नि. माध्यामिक शिक्षा%" then 1 else 0 end) as नि_माध्यामिक_शिक्षा,
			sum(case when education_status like "%माध्यामिक शिक्षा%" then 1 else 0 end) as माध्यामिक_शिक्षा,
			sum(case when education_status like "%उ मा वि %" then 1 else 0 end) as उ_मा_वि ,
			sum(case when education_status like "%स्नातक%" then 1 else 0 end) as स्नातक,
			
		');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_cooking_gas(){
		$this->db->select('
			sum(case when fuel_used_cooking like "%दाउरा%" then 1 else 0 end) as दाउरा,
			sum(case when fuel_used_cooking like "%मट्टितेल%" then 1 else 0 end) as मट्टितेल,
			sum(case when fuel_used_cooking like "%एलपि ग्याँस%" then 1 else 0 end) as एलपि_ग्याँस,
			sum(case when fuel_used_cooking like "%गुइठा%" then 1 else 0 end) as गुइठा,
			sum(case when fuel_used_cooking like "%गाेवरग्याँस%" then 1 else 0 end) as गाेवरग्याँस,
			sum(case when fuel_used_cooking like "%विजुलि%" then 1 else 0 end) as विजुलि,
			sum(case when fuel_used_cooking like "%अन्य%" then 1 else 0 end) as अन्य,			
		');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function use_of_energy(){
		$this->db->select('
			sum(case when electricity_use_info like "%सोलार%" then 1 else 0 end) as सोलार,
			sum(case when electricity_use_info like "%विजुली%" then 1 else 0 end) as विजुली,
			sum(case when electricity_use_info like "%मट्टितेल%" then 1 else 0 end) as मट्टितेल,
			sum(case when electricity_use_info like "%वायोग्यास %" then 1 else 0 end) as वायोग्यास ,
			sum(case when electricity_use_info like "%अन्य%" then 1 else 0 end) as अन्य,			
		');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_main_occupation(){
		$this->db->select('
			sum(case when main_occupation like "%लघुउद्यम%" then 1 else 0 end) as लघुउद्यम,
			sum(case when main_occupation like "%कृषि%" then 1 else 0 end) as कृषि,
			sum(case when main_occupation like "%व्यवसाय%" then 1 else 0 end) as व्यवसाय,
			sum(case when main_occupation like "%नोकरी %" then 1 else 0 end) as नोकरी ,
			sum(case when main_occupation like "%मजदुरी%" then 1 else 0 end) as मजदुरी,
			sum(case when main_occupation like "%विदेश%" then 1 else 0 end) as विदेश,	
			sum(case when main_occupation like "%शिक्षण%" then 1 else 0 end) as शिक्षण,
			sum(case when main_occupation like "%सेवा निवृत्त%" then 1 else 0 end) as सेवा_निवृत्त,
		');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_married_status(){
		$this->db->select('
			sum(case when mamber_name != "" and marriage_status = "अबिबाहित" then 1 else 0 end) as अबिबाहित,
			sum(case when mamber_name != "" and marriage_status = "बिबाहित" then 1 else 0 end) as बिबाहित,
			sum(case when mamber_name != "" and marriage_status like "%एकल %" then 1 else 0 end) as एकल ,
		');
		$this->db->distinct('mamber_name');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function if_any_disease(){
		$this->db->select('
			sum(case when long_term_disease = "छ" and disease_type like "%छारेरोग%" then 1 else 0 end) as छारेरोग,
			sum(case when long_term_disease = "छ" and disease_type like "%दम%" then 1 else 0 end) as दम,
			sum(case when long_term_disease = "छ" and disease_type like "%मुटुरोग%" then 1 else 0 end) as मुटुरोग,
			sum(case when long_term_disease = "छ" and disease_type like "%दीर्घ मृगौला रोग%" then 1 else 0 end) as दीर्घ_मृगौला_रोग,
			sum(case when long_term_disease = "छ" and disease_type like "%मधुमेह%" then 1 else 0 end) as मधुमेह,
			sum(case when long_term_disease = "छ" and disease_type like "%एच अाई भि%" then 1 else 0 end) as एच_अाई_भि ,
			sum(case when long_term_disease = "छ" and disease_type like "%क्यान्सर%" then 1 else 0 end) as क्यान्सर,
		');
		$this->db->from('member_info');
		$query = $this->db->get();
		return $query->result_array();	
	}

	// public function sutkeri_bhayeko_awastha(){
	// 	$this->db->select('
	// 		sum(case when long_term_disease = "छ" and disease_type like "%छारेरोग%" then 1 else 0 end) as छारेरोग,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%दम%" then 1 else 0 end) as दम,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%मुटुरोग%" then 1 else 0 end) as मुटुरोग,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%दीर्घ मृगौला रोग%" then 1 else 0 end) as दीर्घ_मृगौला_रोग,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%मधुमेह%" then 1 else 0 end) as मधुमेह,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%एच अाई भि%" then 1 else 0 end) as एच_अाई_भि ,
	// 		sum(case when long_term_disease = "छ" and disease_type like "%क्यान्सर%" then 1 else 0 end) as क्यान्सर,
	// 	');
	// 	$this->db->from('member_info');
	// 	$query = $this->db->get();
	// 	return $query->result_array();	
	// }

}
?>