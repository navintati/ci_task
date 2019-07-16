<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function __construct(){
		
		parent::__construct();
		
	}

	public function putDatas($data)
	{
		// echo "<pre>MODE"; print_r($data); echo "</pre>"; die();
		$data = $this->db->insert('employee', $data);
        return $this->db->insert_id();
	}

}

