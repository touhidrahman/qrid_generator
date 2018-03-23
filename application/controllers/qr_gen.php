<?php
class Qr_gen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index ()
    {
    if (! $this->session->userdata('validated'))
        {
            redirect('login');
        }
    }
    
    
    function generate ($svc_no_type, $svc_no)
    {
        $svc_no_type = strtoupper($this->uri->segment(3));
        $svc_no = $this->uri->segment(4);
        
        $this->load->model ('person_model');
        $row = $this->person_model->query_qr($svc_no_type, $svc_no);

        $name = $row->name;
        $pid = $row->pid;
        $rank = $row->rank;
        // $cid = $row['cid'];
        
        
        $this->load->library('ciqrcode');
        
        $params['data'] = $pid .", ". $rank ." ". $name .", ". $svc_no_type ."/". $svc_no;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.'qr_images/' .$svc_no_type.'_'.$svc_no. '_qr.png'; //change dir to save images as reqd
        $this->ciqrcode->generate($params);
        
		//change this line to produce a id card design
        $data ['svc_no'] = $svc_no;
        $data ['svc_no_type'] = $svc_no_type;
        $this->load->view('qr_view', $data);
        
    }
}

?>