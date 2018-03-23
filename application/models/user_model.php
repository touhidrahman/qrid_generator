<?php
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    //-----------------------------------------------------
    
    function validate ()
    {
        
        $u = $this->security->xss_clean($this->input->post('username'));
        $p = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->select('uid, name, username, password');
        $this->db->from('users');
        $this->db->where ('username', $u);
        $this->db->where ('password', md5($p));
        $this->db->limit (1);
        
        $query = $this->db->get ();
        
        if ($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
            	'uid' => $row->uid,
            	'name' => $row->name,
            	'username' => $row->username,
            	'password' => $row->password,
            	'validated' => TRUE
            );
            $this->session->set_userdata($data);
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    //----------------------------------------------------UNUSED
    
    function save_admin_data ($data)
    {
        $this->db->insert('admin', $data);
        
        return $this->db->insert_id();
    }
    
    function get_admin_data ($admin_id)
    {
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get ('admin');
        
        return $query->result();
    }
    
    function delete_admin ($admin_id)
    {
        $this->db->where('admin_id', $admin_id);
        $this->db->limit(1);
        $query = $this->db->delete ('admin');
        
        return true;
    }
    
    function get_all_admin ()
    {
        $query = $this->db->get('admin');
        
        $data = $query->result();
        return $data;
    }
}

?>