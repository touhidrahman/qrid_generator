<?php
class Search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index ()
    {
        if ($this->session->userdata('validated'))
        {
            $this -> load -> view ('search_view');
        }
        else
        {
            redirect('login');
        }
    }
    
         
    
    function result ()
    {
        $term = $this->input->post('term');
        
        $this->load->model('search_model');
        $data['results'] = $this->search_model->get_result($term);
        
        $pid = $data['results']['pid'];
        $data['active_cid'] = $this->search_model->get_active_cid($pid)->cid;

        $this->load->view('search_view', $data);
    }
    
}

?>