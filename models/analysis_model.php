<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analysis_model extends CI_Model {
	
	function create_profiler_table()
	{
		$this->load->dbforge();
		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'output' => array(
				'type' => 'LONGTEXT',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		if($this->dbforge->create_table('profiler_records', TRUE))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_last_profiler_record($id)
	{
		if($id == 0)
		{
			return $this->db->query("SELECT output FROM profiler_records ORDER BY id DESC LIMIT 1")->row();
		}
		if($id > 0)
		{
			$query = $this->db->query("SELECT id, output FROM profiler_records where id = " . $id);
			return $query->row();
		}
	}
}