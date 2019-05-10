<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->model('page_model');
                $this->load->model('admin_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
        $data['title'] = 'Add Relation Page';

        $data['groups'] = $this->news_model->get_form_title();
        $data['groups1'] = $this->news_model->get_form_title_mul();
        $data['frm_ids'] = $this->news_model->get_table_id();
        $data['results'] = $this->news_model->show_relation();
        $this->load->view('includes/header');
        $this->load->view('news/index', $data);
        $this->load->view('includes/footer');
        }

      public function info(){
      $data['title'] = 'New Relation Page - Step 1';
      
      $data['groups'] = $this->news_model->get_form_title();
      $data['test'] = $this->news_model->get_for_table_names();
      $data['results'] = $this->news_model->show_relation_foreign();
      $data['tbl'] = $this->page_model->get_tables_frm_rel_table();

      $this->load->view('includes/header');
      $this->load->view('news/relation', $data);
      }

      public function get(){
      $data['title'] = 'New Relation Page - Step 2';
      $data['groups'] = $this->news_model->get_form_title();
      $data['results'] = $this->news_model->show_relation();

      $this->load->view('includes/header');
      $this->load->view('news/get', $data);
      }

      public function test(){
  //echo "add relation ";
// print_r($_POST);die;
                $hid_title = $this->input->post('hid_title');
                // print_r($hid_title);die;
                $sec_table =$this->input->post('sec_tbl');
                $nepali =$this->input->post('nepali');
                // echo $sec_table;
                $form_type = $this->input->post('form_type');
                $val =$this->input->post('sec_value');
                $val = implode(',', $val);

                $primary =$this->input->post('primary_tbl');
                echo $primary;
                $key = $this->admin_model->get_id_by_title($sec_table);
                $key1 = $key[0]->id;
                echo $key1;
                $primary_key =$this->input->post('pr_key');
                $data = array(
                    'sec_table'=>$sec_table,
                    'sec_key' => $key1,
                    'form_type' => $form_type,
                    'primary_table' =>$primary,
                    'field' => $val,
                    'nepali' => $nepali
                );

                $this->load->model('post_model');
                $d = $this->post_model->check_primary_and_foreign_tables($primary, $key1);
                // print_r($d);
                if(empty($d)){

                    // $dd = $this->admin_model->check_relation($key1);
                    // echo "rel is : " ;print_r($dd);die;
                    // if($dd === 0){
                      
                        $alter = $this->post_model->alter_primary_table($primary, $val );
                        // print_r($alter);die;
                        if ($alter === true) {
                        $this->db->insert('relationships',$data);
                        $this->session->set_flashdata('post_created', 'Relationship added to tables.');
                        }else{
                          redirect('news/info');
                        $this->session->set_flashdata('post_not_created', 'There was some error. No relationship added. Please try again.');
                        }   
                    // }else{
                    //     $this->db->insert('relationships',$data);
                    //     $this->session->set_flashdata('post_created', 'Relationship added to tables.');
                    // }
                
                }else{
                  redirect('news/info');
                    $this->session->set_flashdata('post_not_created', 'This relation already exists.');
                }
               
                redirect ('news/info');
             

    }
      public function remove_rel(){
        $tbl = $this->input->post('tbl_name');
        $sec = $this->input->post('sec_tbl');
        // echo $tbl;echo $sec;
        $fields = $this->news_model->get_relation_added_fields($tbl, $sec);
        if ($fields != true){
          $this->session->set_flashdata('error', 'Could not remove relationship. No Relation Found.');
          redirect ('news/info');
        }else{
        echo '<pre>';
        $val = $fields[0]['field'];
        // print_r($val);die;
    $this->load->dbforge();
    $break = explode(',', $val);
    // print_r($break);die;

    foreach ($break as $bre) {
      $rel = $this->dbforge->drop_column($tbl, $bre);
        }
        $del = $this->news_model->remove_relationship_frm_tbl($tbl, $sec, $val);
        $this->session->set_flashdata('post_created', 'Relationship removed.');
         redirect ('news/info');
       }
   }

      public function filter(){
        $t = $this->input->post('depart');
        echo $t;

        $lists = $this->db->list_fields($t);
        // echo '<pre>';
        // print_r($lists);
        $data[] = $this->$lists;
        // header("Content-Type: application/json");
        $value = json_encode($lists, JSON_FORCE_OBJECT);

        $this->load->view('news/test', $value);
       redirect('news/test', $data);
      }

       public function multiple_fetch(){
        $data['tid'] = $_POST['id'];
        $data['t_name'] = $_POST['name'];
        $t_name = $_POST['name'];
        var_dump($t_name);die;
        $data['fk'] = $this->admin_model->get_foreign_table_of_primary_table_mul($t_name);
        // echo '<pre>';
        
        if(!empty($data['fk'])){
          $this->load->view('pages/list_multiple', $data);
        }
      }
        
}

