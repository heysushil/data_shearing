<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index(){
		$this->load->view('login');
	}

	public function userLogin(){
		$data = array(
			'email' => $this->input->post('email'),
			'pass' => $this->input->post('password')			
		);
		$result = $this->Model->singlData('addstu', $data);
		// echo "hello";
		// echo "<pre>";print_r($result);exit();
		if($result){
			$user = array(
				'user_id' => $result[0]['id'],
				'name' => $result[0]['name'],
				'email' => $result[0]['email'],
				'type' => $result[0]['type'],
				'course_type' => $result[0]['course']
			);
			
			$this->session->set_userdata($user);
			$this->session->set_flashdata('success', 'Hi, Admin welcome to Dashboard.');
			redirect(base_url()).'welcome';
		}else{
			$this->session->set_flashdata('error', 'Ohhoo. you type a wrong email or password. Try again with right one. Ok!!!');
			$this->index();
		}
	}

	public function userLogout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('warning', 'Oppss! You leaved. Have a good day. Bye bye Admin.');
		$this->index();
	}





	public function data(){
		$sql = "INSERT INTO admin(email,password) VALUES('ritika@g.com','hello') ";
		$this->db->query($sql);
	}
	public function docdata()
	{
		# code...
		$this->load->view('login');
	}
	public function doc()
	{
		# code...
		$config = array(
					'upload_path' => 'documents/',
					'allowed_types' => '*',
					'file_name' => $_FILES['doc']['name']
				);
		$this->load->library('upload',$config);
        $this->upload->initialize($config);
		// if(){
			// $this->upload->data()
        	$this->upload->do_upload('doc');
			$data = $this->upload->data();
			echo "<pre>";print_r($data);	
		// }
		
	}
}