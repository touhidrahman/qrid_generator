<?php
class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    //-----------------------------------------------------
    
    function validate ()
    {
        
        $u = $this->security->xss_clean($this->input->post('admin_name'));
        $p = $this->security->xss_clean($this->input->post('admin_pass'));
        
        $this->db->select('admin_id, admin_name, admin_pass');
        $this->db->from('admin');
        $this->db->where ('admin_name', $u);
        $this->db->where ('admin_pass', md5($p));
        $this->db->limit (1);
        
        $query = $this->db->get ();
        
        if ($query->num_rows() == 1)
        {
            $row = $query->row();
            $data = array(
            	'admin_id' => $row->admin_id,
            	'admin_name' => $row->admin_name,
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
    
    //----------------------------------------------------
    
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