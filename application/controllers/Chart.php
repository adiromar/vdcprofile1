<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

public function __Construct()
	{
		parent::__Construct();
		$this->load->helper('url');
		$this->load->helper('url_helper');
		$this->load->library('pagination');
		$this->load->model('darta_model');
		$this->load->model('post_model');
		$this->load->model('page_model');
		$this->load->model('chart_model');
		$this->load->model('rm_model');
		
	}
// json fetch starts here
	public function get_json(){
		print_r($_POST);die;
		// $data = $this->rm_model->get_population_by_religion();
		// $data['post'] = $this->rm_model->test();
		// echo json_encode($data, JSON_NUMERIC_CHECK);
		// $this->load->view('pages/get_json_data');
	}

public function json_population(){
	$datas = $this->chart_model->get_population_by_gender();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	// echo '<pre>';
	// print_r($datas);
	}
	
public function json_household(){
	$datas = $this->chart_model->get_household_by_gender();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

public function json_religion(){
	$datas = $this->chart_model->get_population_by_religion();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

public function json_mothertongue(){
	$datas = $this->chart_model->get_population_by_mothertongue();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_demography(){
	$datas = $this->chart_model->get_population_by_caste();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_disabillity(){
	$datas = $this->chart_model->get_population_by_disability();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$val = str_replace('_', ' ', $key);
		$point = array("label" => $val , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_ward_male_pop(){
		$temp = array();
		// for ($i=1; $i < 10; $i++) { 
			$datas = $this->chart_model->get_male_pop_by_ward();
			array_push($temp, $datas[0]); 
		// }
	$data_points = array();
	// echo '<pre>';
	// print_r($temp);die;
	foreach ($temp[0] as $key => $value) {
		$point = array("label" => $key , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_rojgari(){
	$datas = $this->chart_model->get_population_by_rojgari();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$val = str_replace('_', ' ', $key);
		$point = array("label" => $val , "y" => $value);
		array_push($data_points, $point);   
	}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_education(){
	$datas = $this->chart_model->get_population_by_education();
	$data_points = array();
	
	foreach ($datas[0] as $key => $value) {
		$val = str_replace('_', ' ', $key);
		$point = array("label" => $val , "y" => $value);
		array_push($data_points, $point);   
	}	
	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_cooking_gas(){
		$datas = $this->chart_model->get_cooking_gas();
		$data_points = array();
	
		foreach ($datas[0] as $key => $value) {
			$val = str_replace('_', ' ', $key);
			$point = array("label" => $val , "y" => $value);
			array_push($data_points, $point);   
		}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function json_energy(){
		$datas = $this->chart_model->use_of_energy();
		$data_points = array();
	
		foreach ($datas[0] as $key => $value) {
			$val = str_replace('_', ' ', $key);
			$point = array("label" => $val , "y" => $value);
			array_push($data_points, $point);   
		}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function main_occupation(){
		$datas = $this->chart_model->get_main_occupation();
		$data_points = array();
	
		foreach ($datas[0] as $key => $value) {
			$val = str_replace('_', ' ', $key);
			$point = array("label" => $val , "y" => $value);
			array_push($data_points, $point);   
		}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function married_status(){
		$datas = $this->chart_model->get_married_status();
		$data_points = array();
	
		foreach ($datas[0] as $key => $value) {
			$val = str_replace('_', ' ', $key);
			$point = array("label" => $val , "y" => $value);
			array_push($data_points, $point);   
		}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	public function long_term_disease(){
		$datas = $this->chart_model->if_any_disease();
		$data_points = array();
	
		foreach ($datas[0] as $key => $value) {
			$val = str_replace('_', ' ', $key);
			$point = array("label" => $val , "y" => $value);
			array_push($data_points, $point);   
		}	
	echo json_encode($data_points, JSON_NUMERIC_CHECK);
	}

	// public function sutkeri(){
	// 	$datas = $this->chart_model->sutkeri_bhayeko_awastha();
	// 	$data_points = array();
	
	// 	foreach ($datas[0] as $key => $value) {
	// 		$val = str_replace('_', ' ', $key);
	// 		$point = array("label" => $val , "y" => $value);
	// 		array_push($data_points, $point);   
	// 	}	
	// echo json_encode($data_points, JSON_NUMERIC_CHECK);
	// }



}  // ending bracket
?>