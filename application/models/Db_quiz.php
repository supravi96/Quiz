<?php
class Db_quiz extends CI_Model 
{ 
	public function loadAllQuestions(){

		$quiz_id = $this->session->userdata('quiz_id');
		$rounds = 0;
		$teams = 0;
		//get quiz details
		$this->db->select('id,quiz_name,timestamp,rounds,teams');
		$this->db->from('acedamic_year');
		$this->db->where('id',$quiz_id);
		$quiz_data = $this->db->get()->result();

		if($quiz_data){
			$rounds = $quiz_data[0]->rounds;
			$teams = $quiz_data[0]->teams;
		}		

		$offset = ($teams)*$this->session->userdata('round');  

		$this->db->select('q.id,q.question,q.a,q.b,q.c,q.d,q.answer');
		$this->db->from('question_set q');
		$this->db->limit($teams,$offset);
		$query = $this->db->get()->result();
		return array($query,$quiz_data,$teams);
	}

	public function score($arr){
		$team_no = $arr['team'];
		$points = $arr['points'];
		$quiz_id = $this->session->userdata('quiz_id');
		//teams
		$this->db->select('id');
		$this->db->from('team');
		$this->db->where('acedamic_year_id',$quiz_id);
		$teams = $this->db->get()->result();
		$team_id = $teams[$team_no]->id;		

		$this->db->select('points');
		$this->db->from('round');
		$this->db->where('team_id',$team_id);
		$this->db->where('round_no',$this->session->userdata('round')+1);
		$total  = $this->db->get()->result();

		$update_column = array(
			'points' => $points+$total[0]->points
		);

		$this->db->where('team_id',$team_id);
		$this->db->where('round_no',$this->session->userdata('round')+1);
		$this->db->update('round',$update_column);
		return 1;
	}

	public function get_scores(){
		$quiz_id = $this->session->userdata('quiz_id');
		$round_no = $this->session->userdata('round');
		$this->db->select('team_name,round_no,points,rounds');
		$this->db->from('team');
		$this->db->join('round','team_id=team.id','inner');
		$this->db->join('acedamic_year','acedamic_year.id=acedamic_year_id','inner');
		$this->db->where('acedamic_year_id',$quiz_id);
		$this->db->where('round_no',$round_no);
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_quiz(){
		$this->db->select('id ,quiz_name');
		$this->db->from('acedamic_year');
		$this->db->where('is_active',1);
		return $this->db->get()->result();
	}

	public function get_final_result(){

		$quiz_id = $this->session->userdata('quiz_id');
		
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where('acedamic_year_id',$quiz_id);
		$teams = $this->db->get()->result();
		foreach ($teams as $key => $value) {
			$this->db->select('points');
			$this->db->from('round');
			$this->db->where('team_id',$value->id);
			$round_points = $this->db->get()->result();
			$total = 0;
			foreach ($round_points as $key1 => $value1) {
				$total += $value1->points;
			}
			$this->db->where('id',$value->id);
			$this->db->update('team',array('total_points'=>$total));
		}
		//get quiz details
		$this->db->select('acedamic_year.id as quiz_id,
			acedamic_year.quiz_name as quiz_name,
			acedamic_year.timestamp as timestamp,
			acedamic_year.report as report,
			acedamic_year.rounds as rounds,
			acedamic_year.teams as teams,
			team.id as team_id,
			team.team_name as team_name,
			team.total_points as total_points,
			group_concat(member_name) as members,
			" " as points');
		$this->db->from('acedamic_year');
		$this->db->join('team','acedamic_year_id=acedamic_year.id','inner');
		$this->db->join('team_members','team_id=team.id','inner');
		$this->db->where('acedamic_year.id',$quiz_id);
		$this->db->group_by('team_id');
		$quiz_data = $this->db->get()->result();
		foreach ($quiz_data as $key2 => $value2) {
			$value2->points = $this->fetchRoundInfo($value2->team_id);
			$value2->members = explode(',', $value2->members);
		}
		$update = ('UPDATE round 
			JOIN team on team.id = round.team_id
			set points = 0
			WHERE team.acedamic_year_id = '.$this->session->userdata('quiz_id'));
		$query = $this->db->query($update);
		if($this->db->affected_rows()){
			$this->session->set_userdata('quiz_id',0);
			$this->session->set_userdata('round',0);
		}
		return $quiz_data;
	}

	public function fetchRoundInfo($team_id){
		$this->db->select('points');
		$this->db->from('round');
		$this->db->where('team_id',$team_id);
		$query = $this->db->get()->result();
		return $query;
	}
}