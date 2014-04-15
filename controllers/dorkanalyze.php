<?php

class Dorkanalyze extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
		
		// don't run the profiler for this controller
		$this->output->enable_profiler(false);
		
		// limit this to the first admin account only
		if(!isset($this->data['account']->id) OR $this->data['account']->id != 1)
		{
			die;
		}
		
        // Load the analysis model
        $this->load->model(array("analysis_model"));	
	}
	
	function first_run()
	{
		$check = $this->analysis_model->create_profiler_table();
		if($check)
		{
			echo "Table 'profiler_records' created.";
		}
		else
		{
			echo "Table 'profiler_records' not created. Please check to see if it already exists.";
		}
	}
	
	function profiler($id = 0)
	{
		$output = $this->analysis_model->get_last_profiler_record($id);
		print_r($output->id);
		print_r($output->output);
	}
}