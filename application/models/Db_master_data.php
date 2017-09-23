<?php
class Db_master_data extends CI_Model 
{ 

    public function addQuestionData($data){

        $this->db->insert('question_set', $data); 
        if($this->db->insert_id())
            return 1;
        else
            return 0;
    }

    public function loadAllQuestions(){
    	$this->db->select("*");
    	$this->db->from('question_set');
    	return $this->db->get()->result();
    }
}


