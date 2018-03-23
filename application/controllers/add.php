<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Add extends CI_Controller
{

    function __construct ()
    {
        parent::__construct();
    }

    function index ()
    {
        if ($this->session->userdata('validated')) 
        {
            $this->load->view('form_add');
        } else {
            // If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function save ()
    {
        $data['name'] = $this->input->post('name');
        $data['svc_no'] = $this->input->post('svc_no');
        $data['svc_no_type'] = $this->input->post('svc_no_type');
        $data['rank'] = $this->input->post('rank');
        $data['branch_trade'] = $this->input->post('branch_trade');
        $data['blood'] = $this->input->post('blood');
        $data['eye'] = $this->input->post('eye');
        $data['height'] = $this->input->post('height');
        $data['class'] = $this->input->post('class');
        $data['contact'] = $this->input->post('contact');
        $data['ident_mark'] = $this->input->post('ident_mark');
        $data['spouse'] = $this->input->post('spouse');
        $data['address'] = $this->input->post('address');
        $data['address_perm'] = $this->input->post('address_perm');
        $data['editedby_uid'] = $this->session->userdata('uid');
        $bdd = $this->input->post('b_dd');
        $bmm = $this->input->post('b_mm');
        $byy = $this->input->post('b_yy');
        $data['birthday'] = $byy . "-" . $bmm . "-" . $bdd;
        
        $this->load->model('person_model');
        $this->person_model->save_person($data);
        
        // Pass a HTML msg containg data
        $data['html'] = "<div class='col-md-12'>
	            <div class='alert alert-success text-center'>
	            <strong>" .
                 $data['svc_no_type'] . "/" . $data['svc_no'] . "
	                    </strong> Entry Saved!</div></div>";
        
        // Redirect to upload photo
        $this->load->view('upload_photo', $data);
    }
}

/* End of file add.php */
/* Location: ./application/controllers/welcome.php */