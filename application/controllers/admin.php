<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index ()
    {
//         change password
    }
    
        
    function logout()
    {
        session_destroy();
        redirect('login', 'refresh');
    }
    
    
    
    function admin_created ()
    {
        $this->load->library ('form_validation');
        
        $this->form_validation->set_rules ('admin_name', 'Admin Name', 'trim|required|min_length[5]|max_length[16]');
        $this->form_validation->set_rules ('admin_pass', 'Admin Password', 'trim|required|min_length[5]|max_length[16]|matches[admin_pass_conf]');
        $this->form_validation->set_rules ('admin_pass_conf', 'Admin Password Agin', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('create_admin_view');
        }
        else
        {
            $data = array(
            	'admin_id' => NULL,
            	'admin_name' => $this->input->post('admin_name'),
            	'admin_pass' => md5($this->input->post('admin_pass'))
            );
            
            $this->load->model('admin_model');
            $this->admin_model->save_admin_data($data);
            
            $data['html'] = "<div class='alert alert-success text-center'>New Admin Created! You Can <a href='" . site_url('admin'). "'>Login Now</a>.</div>";
            $this->load->view('notify_view', $data);
        }
    }
    
    function create_admin ()
    {
        $data['content'] = 'create_admin_view';
        $this->load-> view('template', $data);
        
        
    }
    
    function list_admin ()
    {
        $this->load->model('admin_model');
        $r = $this->admin_model->get_all_admin();
        
        $html = '';
        $html .= "<div class='container custom-separation'><table class='table table-bordered'>";
       foreach ($r as $row)
       {
           $del_url = site_url('admin/delete' . '/'. $row->admin_id);
           
           $html .= <<<HTML
<tr class='text-center'><td>
$row->admin_name
</td><td>
<a href="$del_url" class="btn btn-danger btn-xs">Delete</a>
</td></tr>
HTML;
           
           
       }
       
       $html .= "</table></div>";
       
       $data['html'] = $html;
       $this->load->view('notify_view', $data);
    }
    
    function validate_admin ()
    {
        $this->load->model('admin_model');
        $query = $this->admin_model->validate ();
        
        if ($query)
        {
            $data = array(
            	'admin_name' => $this->input->post('admin_name'),
            	'is_logged_in' => true
            );
            
            $this->session->set_userdata($data);
            redirect('welcome');
        }
        
        else 
        {
            $this->index();
        }
    }
}