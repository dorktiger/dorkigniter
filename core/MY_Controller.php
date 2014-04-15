<?php

class MY_Controller extends CI_Controller 
{
    var $data;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('language', 'url', 'form', 'account/ssl'));
        $this->load->library(array('account/authentication', 'account/authorization', 'gravatar'));
        $this->load->model(array('account/account_model', 'account/account_details_model'));
		if ($this->authentication->is_signed_in())
		{
			$this->data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
			$this->data['account_details'] = $this->account_details_model->get_by_account_id($this->session->userdata('account_id'));

			// Retrieve user's gravatar if available
			$this->data['gravatar'] = $this->gravatar->get_gravatar( $this->data['account']->email );
			
			// enable the profiler if this is the first admin user
			if($this->data['account']->id == 1)
			{
				$this->output->enable_profiler(TRUE);
			}
		}
    }
}