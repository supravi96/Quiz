<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quiz extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);


        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            $this->load->view('view_quiz', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 	

    public function fetchQuestion(){
        $this->load->model('Db_quiz');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        list($round_quests,$quiz_data,$teams) = $this->Db_quiz->loadAllQuestions();
        if($round_quests&&$quiz_data&&$teams){
            $response['quiz'] = $quiz_data[0]->quiz_name.' '.date('d-m-Y',$quiz_data[0]->timestamp);
            $response['round_quests'] = $round_quests;
            $response['teams'] = $teams;
            $response['status'] = 1;
            
        }

        echo json_encode($response);
    }	

    public function update_round(){
        $this->load->model('Db_quiz');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $this->session->set_userdata('round', $this->session->userdata('round')+1);
        echo json_encode($response);
    }

    public function score(){
        $this->load->model('Db_quiz');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;

        $result_set = $this->Db_quiz->score($phpArray);
        $response['status'] = 1;
        echo json_encode($response);
    }
}    
?>