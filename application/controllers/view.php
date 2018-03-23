<?php
class View extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('view_model');
        $this->load->helper('url');
    }
    
    
    public function index ()
    {
        $config = array();
        $config ["base_url"] = site_url("view/view_list") ;
        $config ["total_rows"] = $this->record_count();
        $config ["per_page"] = 20;
        $config ["uri_segment"] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        
        $data['results'] = $this->view_model->fetch_records($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('list_view', $data);
        
    }
    

}

?>