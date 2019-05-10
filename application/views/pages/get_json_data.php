<?php
// header('Content-Type: application/json');
// function test_data(){
    // $datas = array();
    $datas = $this->rm_model->get_population_by_religion();

    echo json_encode($datas, JSON_NUMERIC_CHECK);
    $t= [[1,12],[2,7],[3,6],[4,6],[5,9],[6,13],[7,12],[8,15],[9,14],[10,18]];
    // echo json_encode($t, JSON_NUMERIC_CHECK);
?>