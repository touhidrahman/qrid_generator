<?php
class Person_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function save_person ($data) 
    {
        /* Adds data to person table from the add personnel details page (add new)
         * This doesn't update the cid (card id)
         * cid should be updated here seperately after generating the card(saving in cards table) */
        $this->db->insert('persons', $data);
        
        return $this->db->insert_id();
    }
    
    
    public function update_person ($svc_no, $svc_no_type, $data)
    {
        $this->db->where('svc_no', $svc_no);
        $this->db->where('svc_no_type', $svc_no_type);
        $this->db->update('persons', $data);
    
        return;
    }
    
    public function delete_data ($svc_no, $svc_no_type, $table)
    {
        $this->db->where('svc_no', $svc_no);
        $this->db->where('svc_no_type', $svc_no_type);
        $this->db->delete($table);
    
        return;
    }
    
    
    public function get_persons ()
    {
        $query = $this->db->get('persons');
        return $query->result();
    }
    
    
    public function query_qr ($svc_no_type, $svc_no)
    {
        $this->db->select('*');   //include cid later
        $this->db->from('persons');
        $this->db->where('svc_no', $svc_no);
        $this->db->where('svc_no_type', $svc_no_type);
        $this->db->limit(1);
        
        /* $q = "SELECT pid, rank, name FROM persons WHERE svc_no = '$svc_no' AND svc_no_type = '$svc_no_type' LIMIT 1";
        
        $query = $this->db->query($q); */
        
        $query = $this->db->get();
        return $query->row();
    }
    
    
    public function list_qr_editedby ($uid)
    {
        /* Retrieves a list of qr images created during the session */
        
    }
    
}

?>