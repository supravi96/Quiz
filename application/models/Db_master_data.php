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
        $this->db->insert('acedamic_year',array(
            'year'=>date('Y',time()),
            'timestamp'=>strtotime(date('Y-m-d',time())),
            'quiz_name'=>$data["quiz_name"],
            'rounds'=>$data["rounds"],
            'teams'=>count($data["teams"])));
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

        return 1;
    }

    public function get_team_data(){

        $this->db->select('acedamic_year.id as quiz_id,
            acedamic_year.quiz_name as quiz_name,
            acedamic_year.rounds as rounds,
            acedamic_year.teams as teams,
            team.id as team_id,
            team.team_name as team_name,
            group_concat(member_name) as members');
        $this->db->from('acedamic_year');
        $this->db->join('team','acedamic_year_id=acedamic_year.id','inner');
        $this->db->join('team_members','team_id=team.id','inner');
        $this->db->group_by('acedamic_year_id,team_id');
        $data = $this->db->get()->result();
        return $data;
    }

    public function get_teams($id){

        $this->db->select('team.id as team_id,team_name,group_concat(member_name) as members');
        $this->db->from('team');
        $this->db->join('team_members','team_id=team.id','inner');
        $this->db->where('acedamic_year_id',$id);
        $this->db->group_by('team.id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function updateTeamInfo($data){
        $team_id = 0;
        foreach ($data["teams"] as $key => $value) {
            if($value["teamName"]!=""&&$value["memberName1"]!=""&&$value["memberName2"]!=""){
                if($value["team_id"]==0){
                    $team = array("acedamic_year_id"=>$data["id"],"team_name"=>$value["teamName"]);
                    $this->db->insert("team",$team);
                    $team_id = $this->db->insert_id();
                    $team_members = array();
                    $team_members[] = array("team_id"=>$team_id,"member_name"=>$value["memberName1"]);
                    $team_members[] = array("team_id"=>$team_id,"member_name"=>$value["memberName2"]);
                    $this->db->insert_batch('team_members',$team_members);
                    $round = array();
                    for($i=0;$i<$data["rounds"];$i++){
                        $round[] = array("team_id"=>$team_id,"round_no"=>$i+1);
                    }                  
                    $this->db->insert_batch("round",$round);
                }else{
                    $this->db->where('id',$value["team_id"]);
                    $this->db->update('team',array("team_name"=>$value["teamName"]));
                    $team_members = array();
                    $team_members[] = array("team_id"=>$value["team_id"],"member_name"=>$value["memberName1"]);
                    $team_members[] = array("team_id"=>$value["team_id"],"member_name"=>$value["memberName2"]);
                    for($i=0;$i<count($team_members);$i++) {
                        $this->db->where('team_id',$team_members[$i]['team_id']);
                        $this->db->update('team_members',array("member_name"=>$team_members[$i]['member_name']));
                    }                    
                }
            }
        }
        return 1;
    }

    public function removeTeamInfo($id){
        $this->db->where('id',$id);
        $this->db->update('acedamic_year',array('is_active'=>0));

        $this->db->select('id');
        $this->db->from('team');
        $this->db->where('acedamic_year_id',$id);
        $arr = $this->db->get()->result();
        $this->db->where('acedamic_year_id',$id);
        $this->db->delete('team');
        foreach ($arr as $key => $value) {
            $this->db->where('team_id',$value->id);
            $this->db->delete('team_members');

            $this->db->where('team_id',$value->id);
            $this->db->delete('round');
        }
        return 1;
    }
}


