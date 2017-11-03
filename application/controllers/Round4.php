<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Round4 extends CI_Controller
{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);


        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);

            $this->load->view('view_round4', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function load_questions(){
        $this->load->model('Db_round4');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $result_set = $this->Db_round4->get_questions();

        /*take fetched questions
        loop through it and make new array and assign index 
        */
        echo json_encode($response);
    }
}