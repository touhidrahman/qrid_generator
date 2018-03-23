<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {


    function __construct()
    {
        parent::__construct();
    }
    
    
    function index()
	{
		
        $bd_type = $this->uri->segment(3);
	    $bd = $this->uri->segment(4);  //ck seg
	    $this->load->model('data_model');
	    $this->data_model->delete_data($bd, $bd_type, 'data');
	    
	    unlink(FCPATH.'photos/' .$bd_type.'_'.$bd. '_img.jpg');
	    unlink(FCPATH.'signs/' .$bd_type.'_'.$bd. '_sign.jpg');
	    unlink(FCPATH.'qr_images/' .$bd_type.'_'.$bd. '_qr.png');
	    
    	$this->index();
	    
	}

}

/* End of file delete.php */
/* Location: ./application/controllers/welcome.php */