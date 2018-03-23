<?php
class View_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function record_count ()
    {
        $this->db->count_all('data');
        
    }
    
    function fetch_records ($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('data');
        
        if ($query->num_rows() > 0 )
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
            
            return $data;
        }
        
        return false;
    }
    
    
}

?>