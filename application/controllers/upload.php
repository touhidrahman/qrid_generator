<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller
{
    /*
     * (non-PHPdoc) @see CI_Controller::__construct()
     */
    public function __construct ()
    {
        parent::__construct();
        $this->load->helper(array(
                'form',
                'url'
        ));
    }

    function index ()
    {
        if ($this->session->userdata('validated')) {
            $this->load->view('upload_photo');
        } else {
            // If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    
    /* Sign Upload Method */
    function sign ()
    {
        $svc_no = $this->input->post('svc_no');
        $svc_no_type = $this->input->post('svc_no_type');
        
        $config['upload_path'] = 'signs/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['file_name'] = $svc_no_type . "_" . $svc_no . "_sign.jpg";
        $config['remove_spaces'] = true;
        $config['overwrite'] = true;
        $config['max_size'] = '200';
        $config['max_width'] = '400';
        $config['max_height'] = '200';
        
        $this->load->library('upload', $config);
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('sign')) 		
		// sign is the input fieldname in the form
		{
            // file_name retrieved from uploaded image
            $upload_data = $this->upload->data();
            $data['sign'] = $upload_data['file_name'];
            
            $this->load->model('person_model');
            // update the db with file name
            $this->person_model->update_person($svc_no, $svc_no_type, $data);
            
            // View last entry (code directly brought from profile/view)
            $this->load->model('search_model');
            $data['person'] = $this->search_model->last_entry($svc_no, $svc_no_type);
            $pid = $data['person']['pid'];
            $data['cids'] = $this->search_model->get_cards_for($pid);
        
            $this->load->view('profile_view', $data);
            
        } else {
            $data = array(
                    'error' => $this->upload->display_errors()
            );
            
            $this->load->view('content', $data);
        }
    }
    
    /* Photo Uploading Method */
    function photo ()
    {
        $svc_no = $this->input->post('svc_no');
        $svc_no_type = $this->input->post('svc_no_type');
        
        $config['upload_path'] = 'photos/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $svc_no_type . "_" . $svc_no . "_img.jpg";
        $config['remove_spaces'] = true;
        $config['overwrite'] = true;
        $config['max_size'] = '400';
        $config['max_width'] = '800';
        $config['max_height'] = '1000';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        // pic is the input fieldname in the form
        if ($this->upload->do_upload('pic')) {
            // file_name retrieved from uploaded image
            $upload_data = $this->upload->data();
            $data['pic'] = $upload_data['file_name'];
            
            $this->load->model('person_model');
            // update the db with file name
            $this->person_model->update_person($svc_no, $svc_no_type, $data);
            
            // Pass a msg to next page
            $data['html'] = "<div class='col-md-12'>
			        <div class='alert alert-success text-center'>
			        <strong>" .
                     $svc_no_type . "/" . $svc_no .
                     "</strong> Photo Uploaded!</div></div>";
            $data['svc_no'] = $svc_no;
            $data['svc_no_type'] = $svc_no_type;
            
            // Redirect to upload photo
            $this->load->view('upload_sign', $data);
        } else {
            $data = array(
                    'error' => $this->upload->display_errors()
            );
            
            $this->load->view('content', $data);
        }
    }
}