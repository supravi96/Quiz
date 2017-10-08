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
}    
?>