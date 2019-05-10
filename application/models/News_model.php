<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        function get_form_title()
        {

        $query = $this->db->query('SELECT id,title,display_name FROM cms_tables where (form_type ="primary_form") order by id desc');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
        }

        function get_form_title_mul()
        {

        $query = $this->db->query('SELECT id,title,display_name FROM cms_tables where (form_type = "multiple_form") order by id desc');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
        }

        function get_table_id()
        {

        $query = $this->db->query('SELECT id,title FROM cms_tables order by id desc');


        return $query->result();
        }

        function show_relation(){
                $res = $this->db->query('SELECT * from relationships order by id desc');
                return $res->result();
        }

        function show_relation_foreign(){
                $res = $this->db->query('SELECT * from relationships where form_type like "foreign_form" order by id desc');
                return $res->result();
        }

        function get_relation_added_fields($tbl, $sec){
                $res = $this->db->query('SELECT field from relationships where form_type = "foreign_form" and primary_table ="'.$tbl.'" AND sec_table ="'.$sec.'" order by id desc');
                return $res->result_array();
        }

        function remove_relationship_frm_tbl($tbl, $sec, $fields){
            $this->db->where("primary_table",$tbl);
            $this->db->where("sec_table",$sec);
            $this->db->where("field",$fields);
            $this->db->delete('relationships');
            return $this->db->affected_rows();
        }

        public function get_for_table_names(){

                $query = $this->db->query('SELECT id,title,display_name FROM cms_tables where form_type = "foreign_form" ORDER BY id DESC');

                return $query->result_array();
        }

        public function get_form_type($title){
                
                 $query = $this->db->query('SELECT form_type FROM cms_tables WHERE title = "'.$title.'" ');
                return $query->result_array();
        }

        public function get_primary_sub_fields($id){
                
                 $query = $this->db->query('SELECT * FROM unit_table WHERE dis_table_id = "'.$id.'" ');
                return $query->result_array();
        }
}

