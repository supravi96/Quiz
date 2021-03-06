<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Round extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);


        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);

            $this->load->view('view_round', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function load_scores(){
        $this->load->model('Db_quiz');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $result_set = $this->Db_quiz->get_scores();
        $response['current_round'] = $this->session->userdata('round');
        if($result_set){
            $response['result'] = $result_set;
            $response['status'] = 1;
        }
        
        echo json_encode($response);
    }
}