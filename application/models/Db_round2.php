<?php
class Db_round2 extends CI_Model 
{ 
	public function get_questions(){

		$this->db->select('id');
		$this->db->from('round');
		$this->db->where('round_no',1);
		$this->db->order_by('points','desc');
		$this->db->limit('6');
		$query1 = $this->db->get()->result();

		$this->db->select('*');
		$this->db->from('round2_question_set');
		$this->db->where('status',0);
		$query2 = $this->db->get()->result();
		return array($query1,$query2);
	}

	public function score($data){
		
		$this->db->select('id,points');
		$this->db->from('round');
		$this->db->where('round_no',$data['round']);
		$this->db->where('team_id',$data['team']);
		$query = $this->db->get();
		
		if($query->num_rows()){
			$result = $query->result();
			$this->db->where('round_no',$data['round']);
			$this->db->where('team_id',$data['team']);
			$this->db->update('round',array("points"=>($data['points']+$result[0]->points)));
		}else{
			$insert_data = array(
				"round_no"=>$data['round'],
				"team_id"=>$data['team'],
				"points"=>$data['points']);
			$this->db->insert('round',$insert_data);
		}
		return 1;
	}
}