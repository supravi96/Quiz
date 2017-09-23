<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Questionans extends CI_Controller{
	
	function index(){
        
        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            // $data['topbar'] = $this->load->view('template/topbar',NULL,TRUE);
            $this->load->view('view_questionAns', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function addQuestionData(){

        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;

        $question = $phpArray['question'];
        $answer = $phpArray['correctAnswer'];
        $a = $phpArray['optA'];
        $b = $phpArray['optB'];
        $c = $phpArray['optC'];
        $d = $phpArray['optD'];

        $input_array = array(
                                'question' => $question,
                                'answer'=> $answer,
                                'a' => $a,
                                'b' => $b,
                                'c' => $c,
                                'd' => $d
                            );
        $response['status'] = $this->Db_master_data->addQuestionData($input_array);
        echo json_encode($response);
    }

    public function loadAllQuestions(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;

        $result = $this->Db_master_data->loadAllQuestions();
        if($result){
            $response['data'] = $result;
            $response['status'] = 1;
        }
        echo json_encode($response);
    }
}
?>