<?php 
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        
        $validated = (bool) $this->session->userdata('validated');
        if ($validated != TRUE)
        {
            redirect('login');
        }
    }

}
?>