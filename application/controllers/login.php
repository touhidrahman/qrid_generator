<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
    
    function index ($msg = NULL) 
    {
        $data['msg'] = $msg;
        $this->load->view('login_view', $data);
    }
    
    function process ()
    {
        $this->load->model('user_model');
        
        //validate the user
        $result = $this->user_model->validate();
        
        //post validation
        if (! $result)
        {
            $msg = "<br><div class='alert alert-danger text-center'>Incorrect Username or Password!</div>";
            $this->index();
        }
        else 
        {
            redirect('add');
        }
    }
}

?>