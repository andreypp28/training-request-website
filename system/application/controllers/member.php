<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Authenticated_Controller {

    public function __construct()
    {
        parent::__construct();
        
        if($this->current_user->user_type != USER_MEMBER)
        {
            redirect('/');
        }
        
        $this->load->model('request_model');
        $this->load->model('request_quote_model');
        $this->load->model('area_model');
    }
    
    //--------------------------------------------------------------------
	public function index()
	{
        $this->requests();    
	}//end index()

    //--------------------------------------------------------------------
    public function requests($offset = 0)
    {
        $this->load->model('request_model');
        $this->request_model->set_alias();
        
        //get my requests 
        $totals = $this->request_model
            ->where('member_id', $this->current_user->id)
            ->count_all();
        
        $requests = $this->request_model
            ->join('services t3', 't3.service_id=t1.req_service_id', 'left')
            ->where('member_id', $this->current_user->id)
            ->limit($this->limit, $offset)
            ->order_by('req_created_at', 'desc')
            ->find_all();
        Template::set('requests', $requests);
        
        $this->setup_pagination('member/requests', $totals);
        
        $this->render();
    }
    
    //--------------------------------------------------------------------
    public function request($code)
    {
        //get quote row
        $this->request_model->set_alias();
        $where = array('md5(t1.req_id)' => $code);                      
        $request = $this->request_model
            ->join('services t2', 't2.service_id=t1.req_service_id', 'left')
            ->find_by($where);  
        if(empty($request))
        {
            Template::set_message('This link is not for you.', 'danger');
            redirect('member/requests');
        }
        Template::set('request', $request);
        
        //get area
        $area = $this->area_model
            ->find_by('area_code', $request->req_area_code);
        Template::set('area', $area);
        
        //get quotes for this request
        $this->request_quote_model->set_alias();
        $quotes = $this->request_quote_model
            ->join('users t2', 't2.id=t1.trainer_id', 'left')
            ->where('MD5(req_id)', $code)
            ->order_by('quote_created_at', 'desc')
            ->find_all();
        Template::set('quotes', $quotes);
        
        $this->render();
    }
    
    //--------------------------------------------------------------------
    public function quote($code)
    {        
        //get quote row
        $this->request_quote_model->set_alias();
        $where = array(
            'md5(t1.quote_id)'  => $code,
            't2.member_id'      => $this->current_user->id,
        );                      
        $record = $this->request_quote_model
            ->join('requests t2', 't2.req_id=t1.req_id', 'left')
            ->join('services t3', 't3.service_id=t2.req_service_id', 'left')
            ->join('users t4', 't4.id=t1.trainer_id', 'left')
            ->find_by($where);  
        if(empty($record))
        {
            Template::set_message('This link is not for you.', 'danger');
            redirect('member/requests');
        }
        Template::set('record', $record);
        
        //get area
        $area = $this->area_model
            ->find_by('area_code', $record->req_area_code);
        Template::set('area', $area);
        
        Template::set('quote_code', $code);
        $this->render();
    }
}//end class
