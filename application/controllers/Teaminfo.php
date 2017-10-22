<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teaminfo extends CI_Controller{
	
	function index(){

        $data['all_includes'] = $this->load->view('template/all_includes',NULL,TRUE);

        if(($this->session->userdata('userlogin')))
        { 
            $data['side_view'] = $this->load->view('template/sidenav',NULL,true);
            $this->load->view('view_teamInfo.php', $data);	
        }
        else
        {
            $this->load->view('view_login',$data); 
        }
    } 

    public function addTeamInfo(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;

        if(!$phpArray['view'])
            $result = $this->Db_master_data->addTeamInfo($phpArray);
        else
            $result = $this->Db_master_data->updateTeamInfo($phpArray);
        if($result)
            $response['status'] = 1;
        echo json_encode($response);
    }

    public function getData(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;

        $result = $this->Db_master_data->get_team_data();
        if($result){
            $response['result'] = $result;
            $response['status'] = 1;
        }
        echo json_encode($response);
    }

    public function get_teams(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $result=$this->Db_master_data->get_teams($phpArray['id']);
        if($result){
            $response['status'] = 1;
            $data = array();
            foreach ($result as $key => $value) {
                $temp['team_id'] = $value->team_id;
                $temp['teamName'] = $value->team_name;
                $t = explode(',', $value->members);
                $temp['memberName1'] = $t[0];
                $temp['memberName2'] = $t[1];
                $data[] = $temp;
            }
            $response['result'] = $data;
        }
        echo json_encode($response);
    }

    public function delete_team_info(){
        $this->load->model('Db_master_data');
        $data = file_get_contents("php://input");
        $phpArray = json_decode($data,true);
        $response = array();
        $response['status'] = 0;
        $result = $this->Db_master_data->removeTeamInfo($phpArray["id"]);
        echo json_encode($response);
    }
}
?>