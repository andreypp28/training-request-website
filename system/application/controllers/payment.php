<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends Authenticated_Controller {

    public function __construct()
    {
        parent::__construct();
        
        if($this->current_user->user_type != USER_MEMBER)
        {
            redirect('/');
        }
        
        $this->load->model('request_quote_model');
        $this->load->model('request_model');
        $this->load->model('area_model');
        
        //load paypal
        $paypal_settings = $this->settings_lib->find_all_by('module', 'paypal');
        $this->load->library('paypal');
        if($paypal_settings['paypal.test_mode'] == '1')
        {
            $this->paypal->setTestMode(true);
        }
    }
    
    //--------------------------------------------------------------------
	public function checkout($quote_code='')
    {
        //get quote row
        $this->request_quote_model->set_alias();
        $where = array(
            'md5(t1.quote_id)'  => $quote_code,
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
        
        //payment
        $trainer_paypal = $record->paypal_email ? $record->paypal_email : $record->email;
        $paypal_params = array(
            'business'  => $trainer_paypal,
            'first_name'=> $record->full_name,
            'last_name' => '',
            'item_name' => $record->service_name,
            'amount'    => $record->quote_price, // * 0.1,
            'currency_code' => 'AUD',
            'lc'        => 'AU',
            'bn'        => 'PP-BuyNowBF',
            'no-shipping' => 0,
            'no-note'   => 1,
            'return'    => site_url('payment/complete/'.$quote_code),
            'cancel_return' => site_url('payment/cancel/'.$quote_code),
            'notify_url'=> site_url('payment/notify/'.$quote_code),
        );
        
        $this->paypal->sendRequest($paypal_params);
        exit;
    }

	//--------------------------------------------------------------------
    function complete($quote_code='')
    {
        if(!$this->paypal->completeCheckout())
        {
            Template::set_message('Payment is failed.', 'danger');
            redirect('member/quote/'.$quote_code);   
        }
        
        $response = $this->paypal->getResponse();
        
        //update info here
        $where = array(
            'md5(t1.quote_id)'  => $quote_code,
            't2.member_id'      => $this->current_user->id,
        ); 
        $this->request_quote_model->set_alias();                     
        $record = $this->request_quote_model
            ->join('requests t2', 't2.req_id=t1.req_id', 'left')
            ->find_by($where); 
        if(empty($record))
        {
            Template::set_message('This link is not for you.', 'danger');
            redirect('member/requests');
        }
        
        //update quote status
        $quote_data = array(
            'quote_status' => QUOTE_ACCEPTED,
        );
        $this->request_quote_model->update($record->quote_id, $quote_data);
        
        //update request status
        $request_data = array(
            'req_status'        => REQUEST_CLOSED,
            'req_date_closed'   => date('Y-m-d H:i:s'),
            'req_date_accepted' => date('Y-m-d H:i:s'),
            'req_trainer_id_accepted' => $record->trainer_id,
        );
        $this->request_model->update($record->req_id, $request_data);
        
        //send email to trainer for payment
        $this->_send_payment_email($quote_code);
        
        Template::set_message('Quote is accepted and paid for it.', 'success');
        redirect('member/quote/'.$quote_code);
    }

    function cancel($quote_code='')
    {
        Template::set_message('Payment has been cancelled.', 'warning');
        redirect(base_url('member/quote/'.$quote_code));
    }
    
    function _send_payment_email($quote_code)
    {
        $this->request_quote_model->set_alias();                  
        $record = $this->request_quote_model
            ->select('t1.*, t2.*, t3.service_name, t4.email trainer_email, t4.full_name trainer_name, t5.full_name member_name')
            ->join('requests t2', 't2.req_id=t1.req_id', 'left')
            ->join('services t3', 't3.service_id=t2.req_service_id', 'left')
            ->join('users t4', 't4.id=t1.trainer_id', 'left')
            ->join('users t5', 't5.id=t2.member_id', 'left')
            ->find_by('md5(t1.quote_id)', $quote_code);  
        //get area
        $area = $this->area_model->find_by('area_code', $record->req_area_code);       
        $record->area_name = $area->area_name;
        
        $email_mess = $this->load->view('_emails/quote_payment', (array)$record, true);
        $data = array(
            'to'         => $record->trainer_email,
            'subject'    => 'Payment for Your Quote',
            'message'    => $email_mess,
        );
        
        $this->load->library('emailer');
        $this->emailer->send($data);        
    }
}//end class
