<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('employee_model', 'em');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('employee/index');
		$this->load->view('layout/footer');
	}

	public function putData()
	{
		$hobbs = implode(',', $this->input->post('checks'));
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'genders' => $this->input->post('genders'),
			'emailadd' => $this->input->post('emailadd'),
			'homeadd' => $this->input->post('homeadd'),
			'contacts' => $this->input->post('contacts'),
			'checks' => $hobbs,
			'image' => $_FILES['image']['name'],
			'created_at' => date('Y-m-d H:i:s', time())
		);

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '55000';
        // $config['max_width']            = '1024';
        // $config['max_height']           = '768';
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('image') ) {
            echo '<h3 align="center" style="color: red"><b> Upload Failed </b></h3>';
        } else {
            $form_data = $this->em->putDatas($data);
            $this->session->set_flashdata('msg', 'Succefully Registered');
            redirect(base_url());
                           
        }

		// if (count($data) != 0) {
		// 	$result = $this->em->putDatas($data);
		// } else {
		// 	redirect(base_url());	
		// }

	}

}

