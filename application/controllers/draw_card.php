<?php
class Draw_card extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function go ()
    {
        $svc_no_type = strtoupper($this->uri->segment(3));
        $svc_no = $this->uri->segment(4);
        
        $this->load->model('person_model');
        $row = $this->person_model->query_qr($svc_no_type, $svc_no);

            $data['name'] = $row->name;
            $data['rank'] = $row->rank;
            $data['svc_no_type'] = $svc_no_type;
            $data['svc_no'] = $svc_no;
            $data['blood'] = $row->blood;
            $data['cid'] = $row->cid; //add an if statement, if cid == 0 then create new cid and update simultaneously
            $data['branch_trade'] = $row->branch_trade;
            $data['birthday'] = $row->birthday;
        
/*             $card = array(
            	'issue_dt' => date('Y-m-d'),
                'status' => '1',
            );
        $this->load->model('card_model');
        $this->card_model->update_card($row->cid, $row->pid, $card); */
        
        switch (strtoupper($svc_no_type))
        {
        	case 'BD':
        	    $this->load->view('card_layouts/card_view_bd', $data);
        	    break;
        	case 'MS':
        	    $this->load->view('card_layouts/card_view_ms', $data);
        	    break;
        	case 'T':
        	    $this->load->view('card_layouts/card_view_t', $data);
        	    break;
        }
        
    }
        
    function mdl ()
    {
        $svc_no_type = strtoupper($this->uri->segment(3));
        $svc_no = $this->uri->segment(4);
    
        $this->load->model('person_model');
        $row = $this->person_model->query_qr($svc_no_type, $svc_no);
    
        $data['name'] = $row->name;
        $data['rank'] = $row->rank;
        $data['svc_no_type'] = $svc_no_type;
        $data['svc_no'] = $svc_no;
        $data['blood'] = $row->blood;
        $data['cid'] = $row->cid; //add an if statement, if cid == 0 then create new cid and update simultaneously
        $data['birthday'] = $row->birthday;
    
        /*             $card = array(
         'issue_dt' => date('Y-m-d'),
                'status' => '1',
        );
        $this->load->model('card_model');
        $this->card_model->update_card($row->cid, $row->pid, $card); */
    
        
        $this->load->view('card_layouts/card_view_mdl', $data);

        }

    
    //----------------------------------------------
    function spl ()
    {
        $svc_no_type = $this->uri->segment(3);
        $data['svc_no_type'] = $svc_no_type;
        $svc_no = $this->uri->segment(4);
        $data['svc_no'] = $svc_no;
        
        $query = $this->db->query("SELECT * FROM persons WHERE svc_no = '$svc_no' AND svc_no_type = '$svc_no_type' LIMIT 1");
        foreach ($query->result() as $row)
        {
            $data['name'] = $row->name;
            $data['rank'] = $row->rank;
            $data['blood'] = $row->blood;
            $data['card_no'] = $row->card_no;
            $data['br'] = $row->br;
            $data['svc_no_type'] = $row->svc_no_type;
            $data['b_day'] = $row->b_day;
        }
        
        /* $upd = array(
        	'airhq_issue_day' => date('Y-m-d')
        );
        $this->load->model('data_model');
        $this->data_model->update_data($svc_no, $svc_no_type, $upd); */
        
        
        $this->load->view('card_layouts/card_view_spl', $data);
        	    
      }
        
        
}

?>