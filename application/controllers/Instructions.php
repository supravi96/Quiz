<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Instructions extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $this->session->set_userdata('round', 0);
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            $this->load->view('view_instructions', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function get_all_quiz(){
        $this->load->model('Db_quiz');
        $response = array();
        $response['status'] = 0;
        $result_set = $this->Db_quiz->get_quiz();
        if($result_set){
            $response['result'] = $result_set;
            $response['status'] = 1;
        }
        
        echo json_encode($response);
    } 		

    public function updateSession(){
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $this->session->set_userdata('quiz_id',$phpArray['quiz_id']);
        $response['status'] = 1;
        echo json_encode($response);
    }
}    
?>