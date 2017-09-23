<?php
class Db_login extends CI_Model 
{ 
    public function login_check($uname,$password)
    {
        $status = 0;
        $admin_id = 0;
        $fetched_data = array();

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$uname);
        $this->db->where('password',$password);
        $query = $this->db->get();
        $count = $query->num_rows();
        if($count== 1)
        {
            $status = 1;
            $date = date('Y-m-d H:i:s',time());
            $timestamp = array( 'timestamp'=> strtotime($date));

            $this->db->where('username',$uname);
            $this->db->update('admin',$timestamp);
        }
        $fetched_data['result'] = $query->result();
        $fetched_data['status'] = $status;
        return $fetched_data;
    }
    
    public  function logout($id)
    {
        $timestamp = array( 'timestamp'=> 1);

        $this->db->where('id',$id);
        $this->db->update('admin',$timestamp);
        return;
    }
    
    
}


