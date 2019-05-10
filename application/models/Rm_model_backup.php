<?php

class Rm_model extends CI_MODEL{
	public function __construct(){
		$this->load->database();
	}

public function get_festivals(){

		$this->db->select('festival_name, months');
		$this->db->from('wump_annex_04_sa_18_festivals');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_minus_death(){
		$this->db->select('sum(case when family_memb_name_list != "" then 1 else 0 end) as gross_pop,
			sum(case when status = "Deceased" then 1 else 0 end) as tot_death,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_family_number(){
		$this->db->select('sum(case when household_name != "" then 1 else 0 end) as hou,
			sum(total_family_members) as avg_fam_size,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_ward($ward){

		$this->db->select('ward_no, sum(total_family_members), sum(female_family_count), sum(male_family_count)');
		$this->db->from('household_statistics_form');
		// $this->db->where('local_unit', $rm);
		$this->db->where('ward_no', $ward);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_gender(){
		$this->db->select('sum(case when gender = "पुरुष" then 1 else 0 end) as Male,
			sum(case when gender = "महिला" then 1 else 0 end) as Female,
			sum(case when gender = "तेश्रो लिङ्गी " then 1 else 0 end) as Others,
			sum(case when id != "" then 1 else 0 end) as Total,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_household_by_gender(){

		$this->db->select('sum(case when household_gender = "पुरुष" then 1 else 0 end) as Male,
			sum(case when household_gender = "महिला" then 1 else 0 end) as Female,
			sum(case when household_gender = "तेश्रो लिङ्गी " then 1 else 0 end) as Others,
			sum(case when id != "" then 1 else 0 end) as Total,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_agegroup_category($rm =null){
		$this->db->select('sum(case when gender = "पुरुष" and current_age <= 5 then 1 else 0 end) as male_5,
			sum(case when gender = "महिला" and current_age <= 5 then 1 else 0 end) as female_5,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age <= 5 then 1 else 0 end) as others_5,

			sum(case when gender = "पुरुष" and current_age between 5 and 9 then 1 else 0 end) as male_5_9,
			sum(case when gender = "महिला" and current_age between 5 and 9 then 1 else 0 end) as female_5_9,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 5 and 9 then 1 else 0 end) as others_5_9,

			sum(case when gender = "पुरुष" and current_age between 10 and 14 then 1 else 0 end) as male_10_14,
			sum(case when gender = "महिला" and current_age between 10 and 14 then 1 else 0 end) as female_10_14,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 10 and 14 then 1 else 0 end) as others_10_14,

			sum(case when gender = "पुरुष" and current_age between 15 and 18 then 1 else 0 end) as male_18,
			sum(case when gender = "महिला" and current_age between 15 and 18 then 1 else 0 end) as female_18,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 15 and 18 then 1 else 0 end) as others_18,

			sum(case when gender = "पुरुष" and current_age between 19 and 24 then 1 else 0 end) as male_24,
			sum(case when gender = "महिला" and current_age between 19 and 24 then 1 else 0 end) as female_24,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 19 and 24 then 1 else 0 end) as others_24,

			sum(case when gender = "पुरुष" and current_age between 25 and 45 then 1 else 0 end) as male_45,
			sum(case when gender = "महिला" and current_age between 25 and 45 then 1 else 0 end) as female_45,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 25 and 45 then 1 else 0 end) as others_45,

			sum(case when gender = "पुरुष" and current_age between 46 and 59 then 1 else 0 end) as male_59,
			sum(case when gender = "महिला" and current_age between 46 and 59 then 1 else 0 end) as female_59,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 46 and 59 then 1 else 0 end) as others_59,

			sum(case when gender = "पुरुष" and current_age between 60 and 69 then 1 else 0 end) as male_69,
			sum(case when gender = "महिला" and current_age between 60 and 69 then 1 else 0 end) as female_69,
			sum(case when gender = "तेश्रो लिङ्गी" and current_age between 60 and 69 then 1 else 0 end) as others_69,

			sum(case when gender = "पुरुष" and current_age >= 70 then 1 else 0 end) as male_plus,
			sum(case when gender = "महिला" and current_age >= 70 then 1 else 0 end) as female_plus,
			sum(case when gender = "तेश्रो लिङ्गी" >= 70 then 1 else 0 end) as others_plus,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}
// 11 ends here

	// population on basis of religion 
	public function get_population_by_mothertongue(){
		$this->db->select('sum(case when mother_tongue = "नेपाली" then 1 else 0 end) as nepali,
			sum(case when mother_tongue = "डोटेली/बझाँगी" then 1 else 0 end) as doteli,
			sum(case when mother_tongue = "थारु" then 1 else 0 end) as tharu,
			sum(case when mother_tongue = "मगर" then 1 else 0 end) as magar,
			sum(case when mother_tongue = "भोटे लामा" then 1 else 0 end) as lama,
			sum(case when mother_tongue = "गुरुग तमु" then 1 else 0 end) as gurung,
			sum(case when mother_tongue = "अन्य" then 1 else 0 end) as others,
			sum(case when mother_tongue != "" then 1 else 0 end) as tot');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	// population on basis of religion 
	public function get_population_by_religion(){
		$this->db->select('sum(case when religion = "हिन्दू" then 1 else 0 end) as hindu,
			sum(case when religion = "बौद्द" then 1 else 0 end) as buddha,
			sum(case when religion = "इस्लाम" then 1 else 0 end) as islam,
			sum(case when religion = "क्रिश्चियन" then 1 else 0 end) as christian,
			sum(case when religion = "किराँत" then 1 else 0 end) as kirat,
			sum(case when religion = "शिख" then 1 else 0 end) as shikh,
			sum(case when religion = "अन्य" then 1 else 0 end) as others,
			sum(case when religion != "" then 1 else 0 end) as tot');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

		// population on basis of caste 
	public function get_population_by_caste(){
		$this->db->select('sum(case when caste = "व्राम्हण" then 1 else 0 end) as brahmin,
			sum(case when caste = "क्षेत्री" then 1 else 0 end) as chhetri,
			sum(case when caste = "नेवार" then 1 else 0 end) as newar,
			sum(case when caste = "ठकुरी" then 1 else 0 end) as thakuri,
			sum(case when caste = "अादिवासी/जनजाती" then 1 else 0 end) as janajati,
			sum(case when caste = "सार्की/कामी" then 1 else 0 end) as kami,
			sum(case when caste = "गुरुङ" then 1 else 0 end) as gurung,
			sum(case when caste = "मगर" then 1 else 0 end) as magar,
			sum(case when caste = "दलित" then 1 else 0 end) as dalit,
			sum(case when caste = "राई/लिम्बु" then 1 else 0 end) as rai,
			sum(case when caste = "थारु" then 1 else 0 end) as tharu,
			sum(case when caste = "यादव" then 1 else 0 end) as yadav,
			sum(case when caste = "घर्ति" then 1 else 0 end) as gharti,
			sum(case when caste = "दमाई" then 1 else 0 end) as damai,
			sum(case when caste = "कुमाल" then 1 else 0 end) as kumal,
			sum(case when caste = "अन्य" then 1 else 0 end) as others,
			sum(case when caste != "" then 1 else 0 end) as tot');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function get_population_by_gender_agegroup(){
		$this->db->select('
		sum(case when household_gender = "पुरुष" and household_age <= 14 then 1 else 0 end) as less14_male,
		sum(case when household_gender = "महिला" and household_age <= 14 then 1 else 0 end) as less14_female,
		sum(case when household_gender = "पुरुष" and household_age between 15 and 25 then 1 else 0 end) as 15_25_male,
		sum(case when household_gender = "महिला" and household_age between 15 and 25 then 1 else 0 end) as 15_25_female,
		sum(case when household_gender = "पुरुष" and household_age between 26 and 36 then 1 else 0 end) as 26_36_male,
		sum(case when household_gender = "महिला" and household_age between 26 and 36 then 1 else 0 end) as 26_36_female,

		sum(case when household_gender = "पुरुष" and household_age between 37 and 47 then 1 else 0 end) as 37_47_male,
		sum(case when household_gender = "महिला" and household_age between 37 and 47 then 1 else 0 end) as 37_47_female,
		sum(case when household_gender = "पुरुष" and household_age between 48 and 58 then 1 else 0 end) as 48_58_male,
		sum(case when household_gender = "महिला" and household_age between 48 and 58 then 1 else 0 end) as 48_58_female,
		sum(case when household_gender = "पुरुष" and household_age between 59 and 69 then 1 else 0 end) as 59_69_male,
		sum(case when household_gender = "महिला" and household_age between 59 and 69 then 1 else 0 end) as 59_69_female,
		sum(case when household_gender = "पुरुष" and household_age >= 70 then 1 else 0 end) as 70_male,
		sum(case when household_gender = "महिला" and household_age >= 70 then 1 else 0 end) as 70_female,
		sum(case when household_gender = "पुरुष" then 1 else 0 end) as tot_male,
		sum(case when household_gender = "महिला" then 1 else 0 end) as tot_female');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

		public function get_population_by_disability(){
		$this->db->select('
			sum(case when gender = "पुरुष" and disability = "छ" then 1 else 0 end) as tot_dis_male,
			sum(case when gender = "महिला" and disability = "छ" then 1 else 0 end) as tot_dis_female,
			sum(case when gender = "पुरुष" and disability = "छ" and disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as red_dis_male,
			sum(case when gender = "महिला" and disability = "छ" and disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as red_dis_female,
			sum(case when gender = "पुरुष" and disability = "छ" and disability_type = "अति अशक्त (निलो)" then 1 else 0 end) as blue_dis_male,
			sum(case when gender = "महिला" and disability = "छ" and disability_type = "अति अशक्त (निलो)" then 1 else 0 end) as blue_dis_female,
			sum(case when gender = "पुरुष" and disability = "छ" and disability_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as yell_dis_male,
			sum(case when gender = "महिला" and disability = "छ" and disability_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as yell_dis_female,
			sum(case when gender = "पुरुष" and disability = "छ" and disability_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as white_dis_male,
			sum(case when gender = "महिला" and disability = "छ" and disability_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as white_dis_female
		');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function child_disability_population(){
		$this->db->select('
			sum(case when gender = "पुरुष" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as whi_dis_male,
			sum(case when gender = "पुरुष" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as yell_dis_male,
			sum(case when gender = "पुरुष" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "अति अशक्त (निलो)" then 1 else 0 end) as blue_dis_male,
			sum(case when gender = "पुरुष" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as red_dis_male,
			
			sum(case when gender = "महिला" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as whi_dis_female,
			sum(case when gender = "महिला" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "मध्यम अपाङ्गता (पहेलो)" then 1 else 0 end) as yell_dis_female,
			sum(case when gender = "महिला" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "अति अशक्त (निलो)" then 1 else 0 end) as blue_dis_female,
			sum(case when gender = "महिला" and disability_id_card_taken = "छ" and current_age <= 18 and disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as red_dis_female,
			
		');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_roof_type(){
		$this->db->select('
			sum(case when house_roof_type = "खर परालले छाएको" then 1 else 0 end) as paral,
			sum(case when house_roof_type = "जस्ताले छाएको" then 1 else 0 end) as jasta,
			sum(case when house_roof_type = "टायल वा ढुगाँले छाएको" then 1 else 0 end) as tile,
			sum(case when house_roof_type = "पक्कि ढलान" then 1 else 0 end) as rcc,			
			sum(case when house_roof_type = "काठले छाएको" then 1 else 0 end) as wood,
			sum(case when house_roof_type = "माटोले छाएको" then 1 else 0 end) as mud,
			sum(case when house_roof_type = "अन्य" then 1 else 0 end) as others,
			sum(case when house_roof_type = "" then 1 else 0 end) as empty,
		');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_ownership_type(){
		$this->db->select('
			sum(case when living_basis_of_ownership_ = "निजि" then 1 else 0 end) as private,
			sum(case when living_basis_of_ownership_ = "भाडामा" then 1 else 0 end) as rent,
			sum(case when living_basis_of_ownership_ = "संस्थागत" then 1 else 0 end) as org,
			sum(case when living_basis_of_ownership_ = "अन्य" then 1 else 0 end) as oth,		
		');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_drinking_water(){
		$this->db->select('
			sum(case when drinkingwater_collection_area = "सार्वजनिक धारा (पाइप प्रणाली)" then 1 else 0 end) as public,
			sum(case when drinkingwater_collection_area = "निजिधारा (पाइप प्रणाली)" then 1 else 0 end) as private,
			sum(case when drinkingwater_collection_area = "ट्युवेल हेण्डपाइप" then 1 else 0 end) as tubewell,
			sum(case when drinkingwater_collection_area = "संरक्षित मुलको पानी वा ढाकिएको इनार कुवा" then 1 else 0 end) as covered,	
			sum(case when drinkingwater_collection_area = "नढाकिएको इनार कुवा असंरक्षित मूल" then 1 else 0 end) as uncovered,
			sum(case when drinkingwater_collection_area = "खोला वा नदीको पानी" then 1 else 0 end) as river,	
			sum(case when drinkingwater_collection_area = "मुलको पानी" then 1 else 0 end) as mul,	
			sum(case when drinkingwater_collection_area = "अन्य" then 1 else 0 end) as others,
			sum(case when drinkingwater_collection_area != "" then 1 else 0 end) as tot');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_consumable_energy(){
		$this->db->select('
			sum(case when fuel_used_cooking like "%दाउरा%" then 1 else 0 end) as timber,
			sum(case when fuel_used_cooking like "%एलपि ग्याँस%" then 1 else 0 end) as lp_gas,
			sum(case when fuel_used_cooking like "%मट्टितेल%" then 1 else 0 end) as kero,
			sum(case when fuel_used_cooking like "%गुइठा%" then 1 else 0 end) as guitha,	
			sum(case when fuel_used_cooking like "%गाेवरग्याँस%" then 1 else 0 end) as g_gas,
			sum(case when fuel_used_cooking like "%विजुलि%" then 1 else 0 end) as elec,	
			sum(case when fuel_used_cooking like "%अन्य%" then 1 else 0 end) as others,
			sum(case when fuel_used_cooking != "" then 1 else 0 end) as tot');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_lights_use(){
		$this->db->select('
			sum(case when electricity_use_info like "%सोलार%" then 1 else 0 end) as solar,
			sum(case when electricity_use_info like "%मट्टितेल%" then 1 else 0 end) as kero,
			sum(case when electricity_use_info like "%वायोग्यास%" then 1 else 0 end) as g_gas,
			sum(case when electricity_use_info like "%विजुली%" then 1 else 0 end) as elec,	
			sum(case when electricity_use_info like "%अन्य%" then 1 else 0 end) as others,
			sum(case when fuel_used_cooking = "" then 1 else 0 end) as empty');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_sewa_subidha(){
		$this->db->select('
			sum(case when provided_services like "%सोलार%" then 1 else 0 end) as solar,
			sum(case when provided_services like "%मट्टितेल%" then 1 else 0 end) as kero,
			sum(case when provided_services like "%रेडीयो%" then 1 else 0 end) as radio,
			sum(case when provided_services like "%टि भि%" then 1 else 0 end) as tv,	
			sum(case when provided_services like "%डिस होम तथा केवल लाइन जोडेको%" then 1 else 0 end) as cable,
			sum(case when provided_services = "%कम्प्युटर%" then 1 else 0 end) as computer,
			sum(case when provided_services like "%इन्टरनेट सुविधा%" then 1 else 0 end) as internet,
			sum(case when provided_services like "%टेलिफोन%" then 1 else 0 end) as phone,
			sum(case when provided_services like "%मोबाइल%" then 1 else 0 end) as mobile,
			sum(case when provided_services like "%गाडी%" then 1 else 0 end) as vehicle,	
			sum(case when provided_services like "%मोटर साइकल%" then 1 else 0 end) as bike,
			sum(case when provided_services like "%साइकल%" then 1 else 0 end) as cycle,
			sum(case when provided_services like "%अन्य साधन%" then 1 else 0 end) as oth_veh,
			sum(case when provided_services like "%फ्रिज%" then 1 else 0 end) as fridge,
			sum(case when provided_services like "%कुनै सेवा सुविधा नभएको%" then 1 else 0 end) as nothing,
			sum(case when provided_services != "" then 1 else 0 end) as least,
			sum(case when provided_services = "" then 1 else 0 end) as empty');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_by_toilet_type(){
		$this->db->select('
			sum(case when toilet_type like "%नभएको%" then 1 else 0 end) as no_toilet,
			sum(case when toilet_type like "%सुधारिएको खाल्डे%" then 1 else 0 end) as pitt,
			sum(case when toilet_type like "%गोवरग्याँस जडीत%" then 1 else 0 end) as g_gas,
			sum(case when toilet_type like "%सुधारिएको%" then 1 else 0 end) as maintained,	
			sum(case when toilet_type = "" then 1 else 0 end) as empty');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function population_migration_in_district(){
		$this->db->select('
			sum(case when family_migrated like "%गएको%" and gender like "%पुरुष%" then 1 else 0 end) as out_male,
			sum(case when family_migrated like "%गएको%" and gender like "%महिला%" then 1 else 0 end) as out_female,
			sum(case when family_migrated like "%आएको%" and gender like "%पुरुष%" then 1 else 0 end) as in_male,
			sum(case when family_migrated like "%आएको%" and gender like "%महिला%" then 1 else 0 end) as in_female,
			count(case when in_out_district = "काठमाडौँ" then 1 else 0 end) as ccc
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function selfdependent_household_for_food(){
		$this->db->select('
			sum(case when survival_from_own_agri_production like "%३ महिना भन्दा कम%" then 1 else 0 end) as three,
			sum(case when survival_from_own_agri_production like "%४ देखि ६ महिना%" then 1 else 0 end) as six,
			sum(case when survival_from_own_agri_production like "%७ देखि ९ महिना%"  then 1 else 0 end) as nine,
			sum(case when survival_from_own_agri_production like "%१० देखि १२ महिना%" then 1 else 0 end) as twel,
			sum(case when survival_from_own_agri_production like "%खान पुगेर वेचविखन समेत गर्ने%" then 1 else 0 end) as con_sell
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_ownership_by_female(){
		$this->db->select('
			sum(case when female_ownership = "घर जग्गा दुबैमा स्वामित्व" then 1 else 0 end) as both_own,
			sum(case when female_ownership = "जग्गामा मात्र स्वामित्व" then 1 else 0 end) as land_only,
			sum(case when female_ownership = "घर जग्गा दुबैमा स्वामित्व नभएको"  then 1 else 0 end) as none,
			sum(case when female_ownership = ""  then 1 else 0 end) as empty,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function land_ownership_by_household(){
		$this->db->select('
			sum(case when land_ownership_info = "स्वामित्व भएको" then 1 else 0 end) as own,
			sum(case when land_ownership_info = "स्वामित्व नभएको" then 1 else 0 end) as no_own,
			sum(case when land_ownership_info = "आफ्नो जग्गा अरुलाई कमाउन दिएको"  then 1 else 0 end) as given,
			sum(case when land_ownership_info = "अरुको जग्गा कमाउने"  then 1 else 0 end) as taken,
			sum(case when land_ownership_info = "भूमिहीन"  then 1 else 0 end) as no_land,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function land_ownership_by_ropani(){
		$this->db->select('
			sum(case when family_ownership_of_land = "२ रोपनि भन्दा कम" then 1 else 0 end) as ropani2,
			sum(case when family_ownership_of_land = "२ देखि ५ रोपनी" then 1 else 0 end) as twotofive,
			sum(case when family_ownership_of_land = "६ देखि १० रोपनी" then 1 else 0 end) as ten,
			sum(case when family_ownership_of_land = "११ देखि २० रोपनी" then 1 else 0 end) as ropani20,
			sum(case when family_ownership_of_land = "२० रोपनी भन्दा माथि" then 1 else 0 end) as morethan20,
			sum(case when family_ownership_of_land = "जग्गा जमिन नभएको"  then 1 else 0 end) as no_land,
			sum(case when family_ownership_of_land = "" then 1 else 0 end) as empty,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function elderly_people_single_female(){
		$this->db->select('
			sum(case when current_age >= 70 and gender = "महिला" then 1 else 0 end) as female_70_plus,
			sum(case when current_age >= 70 and gender = "पुरुष" then 1 else 0 end) as male_70_plus,
			sum(case when current_age >= "70" and gender = "महिला" and caste = "दलित" then 1 else 0 end) as female_70_plus_dalit,
			sum(case when current_age >= "70" and gender = "पुरुष" and caste = "दलित" then 1 else 0 end) as male_70_plus_dalit,
			sum(case when gender = "पुरुष" and maritial_status = "एकल" then 1 else 0 end) as single_female,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as tot_dis,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" and gender="पुरुष" then 1 else 0 end) as tot_dis_male,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" and gender="महिला" then 1 else 0 end) as tot_dis_female,

			sum(case when disability_type = "अति अशक्त (निलो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis,
			sum(case when gender="पुरुष" and disability_type = "पूर्ण अपाङ्गता (रातो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis_male,
			sum(case when gender="महिला" and disability_type = "पूर्ण अपाङ्गता (रातो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis_female,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

		public function ward_wise_wage_distribution_for_disability_elder_prople($ward){
		$this->db->select('
			sum(case when current_age >= 70 and gender = "महिला" then 1 else 0 end) as female_70_plus,
			sum(case when current_age >= 70 and gender = "पुरुष" then 1 else 0 end) as male_70_plus,
			sum(case when current_age >= "70" and gender = "महिला" and caste = "दलित" then 1 else 0 end) as female_70_plus_dalit,
			sum(case when current_age >= "70" and gender = "पुरुष" and caste = "दलित" then 1 else 0 end) as male_70_plus_dalit,
			sum(case when gender = "पुरुष" and maritial_status = "एकल" then 1 else 0 end) as single_female,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" then 1 else 0 end) as tot_dis,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" and gender="पुरुष" then 1 else 0 end) as tot_dis_male,
			sum(case when disability_type = "पूर्ण अपाङ्गता (रातो)" and gender="महिला" then 1 else 0 end) as tot_dis_female,

			sum(case when disability_type = "अति अशक्त (निलो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis,
			sum(case when gender="पुरुष" and disability_type = "पूर्ण अपाङ्गता (रातो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis_male,
			sum(case when gender="महिला" and disability_type = "पूर्ण अपाङ्गता (रातो)" or  disability_type = "मध्यम अपाङ्गता (पहेलो)" or disability_type= "सामान्य अपाङ्गता (सेतो)" then 1 else 0 end) as partial_dis_female,
			');
		$this->db->from('personal_info_form');
		$this->db->where('ward_no', $ward);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function education_institution_info(){
		$this->db->select('
			sum(case when school_level = "प्रा. वि" and school_operation = "सरकारी" then 1 else 0 end) as primary_gov,
			sum(case when school_level = "नि. मा. वि" and school_operation = "सरकारी" then 1 else 0 end) as low_sec_gov,
			sum(case when school_level = "मा. वि" and school_operation = "सरकारी" then 1 else 0 end) as sec_gov,
			sum(case when school_level = "उ. मा. वि" and school_operation = "सरकारी" then 1 else 0 end) as higher_sec_gov,
			sum(case when school_level = "अन्य" and school_operation = "सरकारी" then 1 else 0 end) as others_gov,

			sum(case when school_level = "प्रा. वि" and school_operation = "सामुदायिक" then 1 else 0 end) as primary_samu,
			sum(case when school_level = "नि. मा. वि" and school_operation = "सामुदायिक" then 1 else 0 end) as low_sec_samu,
			sum(case when school_level = "मा. वि" and school_operation = "सामुदायिक" then 1 else 0 end) as sec_samu,
			sum(case when school_level = "उ. मा. वि" and school_operation = "सामुदायिक" then 1 else 0 end) as higher_sec_samu,
			sum(case when school_level = "अन्य" and school_operation = "सामुदायिक" then 1 else 0 end) as others_samu,

			sum(case when school_level = "प्रा. वि" and school_operation = "नीजी" then 1 else 0 end) as primary_pri,
			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then 1 else 0 end) as low_sec_pri,
			sum(case when school_level = "मा. वि" and school_operation = "नीजी" then 1 else 0 end) as sec_pri,
			sum(case when school_level = "उ. मा. वि" and school_operation = "नीजी" then 1 else 0 end) as higher_sec_pri,
			sum(case when school_level = "अन्य" and school_operation = "नीजी" then 1 else 0 end) as others_pri,

			');
		$this->db->from('sa11sa');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function university_or_college(){
		$this->db->select('tot_students, school_child_development_name, local_unit, district_code');
		$this->db->from('sa11sa');
		$this->db->where('school_level', 'उ. मा. वि');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function primary_student_count_gov(){
		$this->db->select('sum(case when school_level = "प्रा. वि" and school_operation = "सरकारी" then female_students else 0 end) as primary_gov_female,
			sum(case when school_level = "प्रा. वि" and school_operation = "सरकारी" then male_students else 0 end) as primary_gov_male,
			sum(case when school_level = "प्रा. वि" and school_operation = "सरकारी" then tot_students else 0 end) as primary_gov_tot,

			sum(case when school_level = "प्रा. वि" and school_operation = "नीजी" then female_students else 0 end) as primary_pvt_female,
			sum(case when school_level = "प्रा. वि" and school_operation = "नीजी" then male_students else 0 end) as primary_pvt_male,
			sum(case when school_level = "प्रा. वि" and school_operation = "नीजी" then tot_students else 0 end) as primary_pvt_tot,

			sum(case when school_level = "नि. मा. वि" and school_operation = "सरकारी" then female_students else 0 end) as sec_gov_female,
			sum(case when school_level = "नि. मा. वि" and school_operation = "सरकारी" then male_students else 0 end) as sec_gov_male,
			sum(case when school_level = "नि. मा. वि" and school_operation = "सरकारी" then tot_students else 0 end) as sec_gov_tot,

			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then female_students else 0 end) as sec_pvt_female,
			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then male_students else 0 end) as sec_pvt_male,
			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then tot_students else 0 end) as sec_pvt_tot,

			sum(case when school_level = "मा. वि" and school_operation = "सरकारी" then female_students else 0 end) as gov_female,
			sum(case when school_level = "मा. वि" and school_operation = "सरकारी" then male_students else 0 end) as gov_male,
			sum(case when school_level = "मा. वि" and school_operation = "सरकारी" then tot_students else 0 end) as gov_tot,

			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then female_students else 0 end) as pvt_female,
			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then male_students else 0 end) as pvt_male,
			sum(case when school_level = "नि. मा. वि" and school_operation = "नीजी" then tot_students else 0 end) as pvt_tot,
		
			');
		$this->db->from('sa11sa');
		// $this->db->where('school_level', "प्रा. वि");
		// $this->db->where('school_operation', "सरकारी");
		$query = $this->db->get();
		return $query->result_array();	
	}
	public function primary_student_count_pri(){
		$this->db->select('sum(female_students) as fem, sum(male_students) as male, sum(tot_students) as tot');
		$this->db->from('sa11sa');
		$this->db->where('school_level', "प्रा. वि");
		$this->db->where('school_operation', "नीजी");
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function education_status_over_five(){
		$this->db->select('
			sum(case when education_status = "साक्षर" and gender = "पुरुष" then 1 else 0 end) as sakhxar,
			sum(case when education_status = "प्राथमिक शिक्षा" and gender = "पुरुष" then 1 else 0 end) as pri_edu,
			sum(case when education_status = "माध्यामिक शिक्षा" and gender = "पुरुष" then 1 else 0 end) as sec,
			sum(case when education_status = "नि. माध्यामिक शिक्षा" and gender = "पुरुष" then 1 else 0 end) as low_sec,
			sum(case when education_status = "उ मा वि " and gender = "पुरुष" then 1 else 0 end) as high_school,
			sum(case when education_status = "स्नातक" and gender = "पुरुष" then 1 else 0 end) as bach,
			sum(case when education_status = "स्नातकोत्तर" and gender = "पुरुष" then 1 else 0 end) as mast,
			sum(case when education_status = "अनौपचारिक शिक्षा" and gender = "पुरुष" then 1 else 0 end) as unoff,
			sum(case when gender = "पुरुष" then 1 else 0 end) as tot,

			sum(case when education_status = "साक्षर" and gender = "महिला" then 1 else 0 end) as sakhxar_fem,
			sum(case when education_status = "प्राथमिक शिक्षा" and gender = "महिला" then 1 else 0 end) as pri_edu_fem,
			sum(case when education_status = "माध्यामिक शिक्षा" and gender = "महिला" then 1 else 0 end) as sec_fem,
			sum(case when education_status = "नि. माध्यामिक शिक्षा" and gender = "महिला" then 1 else 0 end) as low_sec_fem,
			sum(case when education_status = "उ मा वि " and gender = "महिला" then 1 else 0 end) as high_school_fem,
			sum(case when education_status = "स्नातक" and gender = "महिला" then 1 else 0 end) as bach_fem,
			sum(case when education_status = "स्नातकोत्तर" and gender = "महिला" then 1 else 0 end) as mast_fem,
			sum(case when education_status = "अनौपचारिक शिक्षा" and gender = "महिला" then 1 else 0 end) as unoff_fem,
			sum(case when gender = "महिला" then 1 else 0 end) as tot_fem,
			');
		$this->db->from('personal_info_form');
		$this->db->where('current_age >= 5');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function left_school_or_not_admitted(){
		$this->db->select('
			sum(case when current_situation = "भर्ना नभएको" and gender = "पुरुष" then 1 else 0 end) as male_not_admit,
			sum(case when current_situation = "भर्ना नभएको" and gender = "महिला" then 1 else 0 end) as female_not_admit,
			sum(case when current_situation = "विद्यालय जान छोडेको" and gender = "पुरुष" then 1 else 0 end) as male_left_school,
			sum(case when current_situation = "विद्यालय जान छोडेको" and gender = "महिला" then 1 else 0 end) as female_left_school,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function ward_wise_literacy_rate($ward){
		$this->db->select('count(id),
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " and gender = "पुरुष" then 1 else 0 end) as male,
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " and gender = "महिला" then 1 else 0 end) as female,
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " and caste = "दलित" then 1 else 0 end) as dalit,
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " and caste = "अादिवासी/जनजाती" then 1 else 0 end) as janajati,
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " and caste != "अादिवासी/जनजाती" and caste != "दलित" and caste != "" then 1 else 0 end) as other_caste,
			sum(case when education_status = "माध्यामिक शिक्षा" or education_status = "नि. माध्यामिक शिक्षा" or education_status = "उ मा वि " then 1 else 0 end) as all_edu,
			');
		$this->db->from('personal_info_form');
		$this->db->where('current_age >= 15');
		$this->db->where('ward_no', $ward);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function balbikash_info($ward){
		$this->db->select('
			sum(case when school_level = "वालविकास केन्द्र" then 1 else 0 end) as tot,
			sum(female_students) as fem,
			sum(male_students) as male
			');
		$this->db->from('sa11sa');
		$this->db->where('wada_no', $ward);
		$this->db->where('school_level', 'वालविकास केन्द्र');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function level_wise_teacher_info(){
		$this->db->select('
			sum(case when school_level = "प्रा. वि" then darbandi_perm_female else 0 end) as pri_fem_darbandi,
			sum(case when school_level = "प्रा. वि" then darbandi_perm_male else 0 end) as pri_mal_darbandi,
			sum(case when school_level = "प्रा. वि" then darbandi_temp_female else 0 end) as pri_fem_darbandi_temp,
			sum(case when school_level = "प्रा. वि" then darbandi_temp_male else 0 end) as pri_mal_darbandi_temp,
			sum(case when school_level = "प्रा. वि" then project_female_teachers else 0 end) as proj_female_pri,
			sum(case when school_level = "प्रा. वि" then project_male_teachers else 0 end) as proj_male_pri,
			sum(case when school_level = "प्रा. वि" then rahat_darbandi_female else 0 end) as rahat_female_pri,
			sum(case when school_level = "प्रा. वि" then rahat_darbandi_male else 0 end) as rahat_male_pri,
			sum(case when school_level = "प्रा. वि" then personal_srot_female else 0 end) as pers_female_pri,
			sum(case when school_level = "प्रा. वि" then personal_srot_female else 0 end) as pers_male_pri,
			sum(case when school_level = "प्रा. वि" then pcf_female else 0 end) as pcf_female_pri,
			sum(case when school_level = "प्रा. वि" then pcf_male else 0 end) as pcf_male_pri,
			sum(case when school_level = "प्रा. वि" then trained_female_teachers else 0 end) as train_female_pri,
			sum(case when school_level = "प्रा. वि" then trained_male_teachers else 0 end) as train_male_pri,

			sum(case when school_level = "नि. मा. वि" then darbandi_perm_female else 0 end) as lsec_fem_darbandi,
			sum(case when school_level = "नि. मा. वि" then darbandi_perm_male else 0 end) as lsec_mal_darbandi,
			sum(case when school_level = "नि. मा. वि" then darbandi_temp_female else 0 end) as lsec_fem_darbandi_temp,
			sum(case when school_level = "नि. मा. वि" then darbandi_temp_male else 0 end) as lsec_mal_darbandi_temp,
			sum(case when school_level = "नि. मा. वि" then project_female_teachers else 0 end) as proj_female_lsec,
			sum(case when school_level = "नि. मा. वि" then project_male_teachers else 0 end) as proj_male_lsec,
			sum(case when school_level = "नि. मा. वि" then rahat_darbandi_female else 0 end) as rahat_female_lsec,
			sum(case when school_level = "नि. मा. वि" then rahat_darbandi_male else 0 end) as rahat_male_lsec,
			sum(case when school_level = "नि. मा. वि" then personal_srot_female else 0 end) as pers_female_lsec,
			sum(case when school_level = "नि. मा. वि" then personal_srot_female else 0 end) as pers_male_lsec,
			sum(case when school_level = "नि. मा. वि" then pcf_female else 0 end) as pcf_female_lsec,
			sum(case when school_level = "नि. मा. वि" then pcf_male else 0 end) as pcf_male_lsec,
			sum(case when school_level = "नि. मा. वि" then trained_female_teachers else 0 end) as train_female_lsec,
			sum(case when school_level = "नि. मा. वि" then trained_male_teachers else 0 end) as train_male_lsec,

			sum(case when school_level = "मा. वि" then darbandi_perm_female else 0 end) as sec_fem_darbandi,
			sum(case when school_level = "मा. वि" then darbandi_perm_male else 0 end) as sec_mal_darbandi,
			sum(case when school_level = "मा. वि" then darbandi_temp_female else 0 end) as sec_fem_darbandi_temp,
			sum(case when school_level = "मा. वि" then darbandi_temp_male else 0 end) as sec_mal_darbandi_temp,
			sum(case when school_level = "मा. वि" then project_female_teachers else 0 end) as proj_female_sec,
			sum(case when school_level = "मा. वि" then project_male_teachers else 0 end) as proj_male_sec,
			sum(case when school_level = "मा. वि" then rahat_darbandi_female else 0 end) as rahat_female_sec,
			sum(case when school_level = "मा. वि" then rahat_darbandi_male else 0 end) as rahat_male_sec,
			sum(case when school_level = "मा. वि" then personal_srot_female else 0 end) as pers_female_sec,
			sum(case when school_level = "मा. वि" then personal_srot_female else 0 end) as pers_male_sec,
			sum(case when school_level = "मा. वि" then pcf_female else 0 end) as pcf_female_sec,
			sum(case when school_level = "मा. वि" then pcf_male else 0 end) as pcf_male_sec,
			sum(case when school_level = "मा. वि" then trained_female_teachers else 0 end) as train_female_sec,
			sum(case when school_level = "मा. वि" then trained_male_teachers else 0 end) as train_male_sec,
			
			');
		$this->db->from('sa11sa');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function student_teacher_ratio(){
		$this->db->select('school_child_development_name, sum(tot_students) as tot_students, sum(students_classroom_ratio) as students_classroom_ratio, sum(students_teachers_ratio) as students_teachers_ratio, sum(tot_teachers_female) as tot_fem_teach, sum(tot_teachers_male) as tot_teachers_m');
		$this->db->group_by('school_child_development_name');
		$this->db->from('sa11sa');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function child_working_outside_home_as_workers(){
		$this->db->select('
			sum(case when gender = "महिला" and child_labour_outside_home = "छ" then 1 else 0 end) as child_fem,
			sum(case when gender = "पुरुष" and child_labour_outside_home = "छ" then 1 else 0 end) as child_male,
			');
		$this->db->from('personal_info_form');
		$this->db->where('current_age <= 18');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function child_club(){
		$this->db->select('
			sum(case when child_club = "छ" and school_operation = "सामुदायिक" then 1 else 0 end) as club,
			sum(case when school_operation = "सामुदायिक" then girls_number else 0 end) as girls_count,
			sum(case when school_operation = "सामुदायिक" then boys_number else 0 end) as boys_count,

			sum(case when child_club = "छ" and school_operation = "नीजी" or school_operation = "सरकारी" then 1 else 0 end) as club_sch,
			sum(case when school_operation = "नीजी" or school_operation = "सरकारी" then girls_number else 0 end) as girls_count_sch,
			sum(case when school_operation = "नीजी" or school_operation = "सरकारी" then boys_number else 0 end) as boys_count_sch,
			');
		$this->db->from('sa11sa');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function birth_registration(){
		$this->db->select('
			count(id) as club,
			sum(case when gender = "महिला" then 1 else 0 end) as fem_child,
			sum(case when gender = "पुरुष" then 1 else 0 end) as male_child,
			');
		$this->db->from('birth_regist');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function garbage_mgmt(){
		$this->db->select('
			sum(case when garbage_mgmt = "नदि वा खोलामा" then 1 else 0 end) as river,
			sum(case when garbage_mgmt = "सडकमा" then 1 else 0 end) as road,
			sum(case when garbage_mgmt = "कन्टेनरमा " then 1 else 0 end) as container,
			sum(case when garbage_mgmt = "घरमा नै लिन अाउँछ" then 1 else 0 end) as ghar,
			sum(case when garbage_mgmt = "आफनै कम्पाउण्डमा " then 1 else 0 end) as compound,
			sum(case when garbage_mgmt = "कम्पोष्ट मल वनाइन्छ " then 1 else 0 end) as mal,
			sum(case when garbage_mgmt = "जलाउने" then 1 else 0 end) as burn,
			sum(case when garbage_mgmt = "" then 1 else 0 end) as empty,
			sum(case when garbage_mgmt != "" then 1 else 0 end) as tot,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function rm_tole_development(){
		$this->db->select('samudayik_sanstha_name,local_unit,wada_no, sanstha_type,revenue_left
			');
		$this->db->from('sa-12');
		$this->db->order_by('samudayik_sanstha_name');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_monthly_earnings(){
		$this->db->select('
			sum(family_members_avg_yearly_income) as yearly,count(id) as cou,
			sum(case when family_members_avg_yearly_income / 12 <= "1000" then 1 else 0 end) as less_than_1000,
			sum(case when family_members_avg_yearly_income / 12 between 1000 and 2000 then 1 else 0 end) as bet_100_2000,
			sum(case when family_members_avg_yearly_income / 12 between 2001 and 3000 then 1 else 0 end) as bet_2_3000,
			sum(case when family_members_avg_yearly_income / 12 between 3001 and 5000 then 1 else 0 end) as bet_3_5000,
			sum(case when family_members_avg_yearly_income / 12 between 5001 and 10000 then 1 else 0 end) as bet_5_10,
			sum(case when family_members_avg_yearly_income / 12 between 10000 and 15000 then 1 else 0 end) as bet_10_15,
			sum(case when family_members_avg_yearly_income / 12 between 15000 and 25000 then 1 else 0 end) as bet_15_25,
			sum(case when family_members_avg_yearly_income / 12 >= 25000 then 1 else 0 end) as more,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function household_monthly_savings(){
		$this->db->select('
			sum(case when avg_family_savings / 12 = "0" then 1 else 0 end) as zero,
			sum(case when family_members_avg_yearly_income / 12 between 500 and 1000 then 1 else 0 end) as bet_5_1000,
			sum(case when family_members_avg_yearly_income / 12 between 1001 and 2000 then 1 else 0 end) as bet_1_2000,
			sum(case when family_members_avg_yearly_income / 12 between 2001 and 3000 then 1 else 0 end) as bet_2_3000,
			sum(case when family_members_avg_yearly_income / 12 between 3001 and 5000 then 1 else 0 end) as bet_3_5000,
			sum(case when family_members_avg_yearly_income / 12 between 5001 and 10000 then 1 else 0 end) as bet_5_10,
			sum(case when family_members_avg_yearly_income / 12 > 10000 then 1 else 0 end) as more,
			');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function ward_wise_poverty_distribution($ward){
		$this->db->select('
			sum(case when family_members_avg_yearly_income <= "12000" then 1 else 0 end) as very_poor,
			sum(case when family_members_avg_yearly_income between 12000 and 36000 then 1 else 0 end) as poor,
			sum(case when family_members_avg_yearly_income between 36000 and 300000 then 1 else 0 end) as medium,
			sum(case when family_members_avg_yearly_income >= 300000 then 1 else 0 end) as rich,
			');
		$this->db->from('household_statistics_form');
		$this->db->where('ward_no', $ward);
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function unemployed_population(){
		$this->db->select('
			sum(case when employment_status = "वेरोजगार" and gender = "पुरुष" then 1 else 0 end) as unemp_male,
			sum(case when employment_status = "वेरोजगार" and gender = "महिला" then 1 else 0 end) as unemp_female,
			sum(case when employment_status = "वेरोजगार" and gender = "तेश्रो लिङ्गी" then 1 else 0 end) as unemp_others,
			sum(case when employment_status = "वेरोजगार" then 1 else 0 end) as unemp_all,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function birth_reg(){
		$this->db->select('
			sum(case when gender = "पुरुष" then 1 else 0 end) as male_pop,
			sum(case when gender = "महिला" then 1 else 0 end) as female_pop,
			count(id) as tot_all,
			sum(case when gender = "पुरुष" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) <= 5 then 1 else 0 end) as five_male,
			sum(case when gender = "महिला" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) <= 5 then 1 else 0 end) as five_female,
			sum(case when (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) <= 5 then 1 else 0 end) as five_all,

			sum(case when gender = "पुरुष" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) between 5 and 18 then 1 else 0 end) as male_18,
			sum(case when gender = "महिला" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) between 5 and 18 then 1 else 0 end) as female_18,
			sum(case when (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) between 5 and 18 then 1 else 0 end) as all_18,

			sum(case when gender = "पुरुष" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) >= 18 then 1 else 0 end) as male_18_plus,
			sum(case when gender = "महिला" and (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) >= 18 then 1 else 0 end) as female_18_plus,
			sum(case when (YEAR(CURRENT_DATE) - YEAR(birth_date_eng)) >= 18 then 1 else 0 end) as all_18_plus,
			');
		$this->db->from('birth_regist');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function death_number(){
		$this->db->select('
			sum(case when gender = "पुरुष" then 1 else 0 end) as male_dec,
			sum(case when gender = "महिला" then 1 else 0 end) as female_dec,
			');
		$this->db->from('death_registration');
		$query = $this->db->get();
		return $query->result_array();	
	}

	public function marriage_info(){
		$this->db->select('
			sum(case when husband_name != "" then 1 else 0 end) as male_dec,
			sum(case when wife_name != "" then 1 else 0 end) as female_dec,
			sum(case when wife_age <= 18 then 1 else 0 end) as fem_less_18,
			sum(case when husband_age <= 18 then 1 else 0 end) as mal_less_18,
			sum(case when wife_age >= 18 then 1 else 0 end) as fem_plus,
			sum(case when husband_age >= 18 then 1 else 0 end) as mal_plus,
			');
		$this->db->from('marriage_registration');
		$query = $this->db->get();
		return $query->result_array();	
	}
	public function sim_cards_info(){
		$this->db->select('
			sum(case when sim_card_used = "NTC" then 1 else 0 end) as ntc,
			sum(case when sim_card_used = "NCELL" then 1 else 0 end) as ncell,
			sum(case when sim_card_used = "अन्य" then 1 else 0 end) as others,
			');
		$this->db->from('personal_info_form');
		$query = $this->db->get();
		return $query->result_array();		
	}

	public function test(){
		$this->db->select('ward_no, sum(total_family_members), sum(female_family_count), sum(male_family_count), sum(total_family_count)');
		$this->db->from('household_statistics_form');
		$query = $this->db->get();
		return json_encode($query->result());	
	}

}