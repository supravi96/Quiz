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

    public function addTeamInfo($data){
        $team_id = array();
        $this->db->insert('acedamic_year',array('year'=>date('Y',time())));
        $acedamic_year_id = $this->db->insert_id();

        foreach ($data["teams"] as $key => $value) {
            if($value["teamName"]!=""&&$value["memberName1"]!=""&&$value["memberName2"]!=""){
                $team = array("acedamic_year_id"=>$acedamic_year_id,"team_name"=>$value["teamName"]);
                $this->db->insert("team",$team);
                $team_id[] = $this->db->insert_id();
                $team_members = array();
                $team_members[] = array("team_id"=>$team_id[$key],"member_name"=>$value["memberName1"]);
                $team_members[] = array("team_id"=>$team_id[$key],"member_name"=>$value["memberName2"]);
                $this->db->insert_batch('team_members',$team_members);
            }
        }
        $round = array();
        for($j=0;$j<count($team_id);$j++){
            for($i=0;$i<$data["rounds"];$i++){
                $round[] = array("team_id"=>$team_id[$j],"round_no"=>$i+1);
            }
        }
        $this->db->insert_batch("round",$round);
    }
}


