<?php
class Db_quiz extends CI_Model 
{ 
	public function loadAllQuestions($quiz_id = "1"){

		//get quiz details
		$this->db->select('id,quiz_name,timestamp,rounds,teams');
		$this->db->from('acedamic_year');
		$this->db->where('id',$quiz_id);
		$quiz_data = $this->db->get()->result();

		$rounds = $quiz_data[0]->rounds;
		$teams = $quiz_data[0]->teams;

		$offset = ($teams+1)*$this->session->userdata('round');
		$offset = ($offset==0)?$offset:($offset-1);

		$this->db->select('q.id,q.question,q.a,q.b,q.c,q.d,q.answer');
		$this->db->from('question_set q');
		$this->db->limit($teams,$offset);
		$query = $this->db->get()->result();

		//teams
		$this->db->select('id');
		$this->db->from('team');
		$this->db->where('acedamic_year_id',$quiz_id);
		$teams = $this->db->get()->result();

		return array($query,$quiz_data,$teams[0]);
	}

	public function score($arr){
		$team_no = $arr['team'];
		$points = $arr['points'];
		$quiz_id = $arr['quiz_id'];
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
}