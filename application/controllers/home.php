<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    function __construct()
    {
        parent::__construct();
    }
    
    
    function index()
	{
	    //temp code 1 line below
	    $this->load->view('home_view');
		
       /* if($this->session->userdata('validated'))
       {
         $this->load->view('home_view');
       }
       else
       {
         //If no session, redirect to login page
         redirect('login');
       } */
	    
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */