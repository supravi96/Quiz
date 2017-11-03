<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Round2 extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);


        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);

            $this->load->view('view_round2', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function load_questions(){

        $this->load->model('Db_round2');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        list($teams,$result_set) = $this->Db_round2->get_questions();
        $temp = array();
        $count = 0;
        foreach ($result_set as $key => $value) {
            # code...
            if($count>5){
                $count = 0;
            }
            $data['id'] = $value->id;
            $data['question'] = $value->question;
            $data['answer']= $value->answer;
            $data['opa'] = $value->opa;
            $data['opb'] = $value->opb;
            $data['opc'] = $value->opc;
            $data['opd'] = $value->opd;
            $data['team'] = $teams[$count]->id;
            ++$count;
            $temp[] = $data;
        }
        $response['status'] = 1;
        $response['round_quests'] = $temp;
        echo json_encode($response);
    }

    public function score(){
        $this->load->model('Db_round2');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $result = $this->Db_round2->score($phpArray);
        $response['status'] = 1;
        echo json_encode($response);
    }
}