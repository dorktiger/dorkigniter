<?php
class MY_Profiler extends CI_Profiler {
    
	public function run()
    {
        $output = parent::run();
        $CI = &get_instance();
		$insert = array(
			"output" => $output
		);
		$CI->db->insert("profiler_records", $insert);
    }
}