<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Quiz extends CI_Controller
{
	
	function index(){
        
        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            // $data['topbar'] = $this->load->view('template/topbar',NULL,TRUE);
            $this->load->view('view_quiz', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 		
}    
?>