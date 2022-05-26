<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library("pagination");
}
	public function index()
	{
		if($this->session->userdata('type') == 'admin'){

			//pagination doc
			$configdoc = array(
				'base_url' => base_url().'home',
				'total_rows' => $this->Model->get_count('documents'),
				'per_page' => 6,
				'uri_segment' => 2
			);
			$this->pagination->initialize($configdoc);
			$docPage = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$docPage = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$result['docLinks'] = $this->pagination->create_links();
			$result['documents'] = $this->Model->getDocWithLimit('documents', $configdoc['per_page'], $docPage);

			// pagination user
			$config = array(
				'base_url' => base_url().'home',
				'total_rows' => $this->Model->get_count('addstu'),
				'per_page' => 6,
				'uri_segment' => 2
			);

			
			// $config = array();
	  //       $config["base_url"] = base_url(). "welcome";
	  //       $config["total_rows"] = $this->Model->get_count('documents');
	  //       $config["per_page"] = 10;
	  //       $config["uri_segment"] = 2;

	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        $result['links'] = $this->pagination->create_links();

	        $result['students'] = $this->Model->getStudentData('addstu', $config['per_page'], $page);
			$this->load->view('her');
			$this->load->view('admin_dash',$result);
			$this->load->view('footer1');
		}elseif($this->session->userdata('type') == 'student'){
			redirect(base_url('Welcome/studentDashboard'));
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}
	}	

	public function studentAdd()
	{			
		if($this->session->userdata('type') == 'admin'){
			
			// This code is use for pagination and it related to route page / model page /and view page
			$config = array();
	        $config["base_url"] = base_url(). "students"; //this base url is defined on route.php in cofig folder
	        $config["total_rows"] = $this->Model->get_count('addstu'); //this is a new funciton in model for counting all rows of table for pagination
	        $config["per_page"] = 7; //this number which is limit the table row on view page default set 5 but its upto you to increcs its number
	        $config["uri_segment"] = 2; //get this 2 from url by uri segment which is alos defined in route.php for info go to route page and check it

	        $this->pagination->initialize($config); // its predefined funtion to make pagination work
	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //it sotore number of uri
	        $result["links"] = $this->pagination->create_links(); //this is creat pagination links which you get on view page by echo $link is already usend in addstu

	        $result['students'] = $this->Model->getStudentData('addstu', $config["per_page"], $page); //this is same model funtion only pass two new arragivements limit and start for validation rows on vieew page
	        // echo "<pre>";print_r($result);
			$this->load->view('her'); //these 3 load are same use for showing header main page and footer systamaticlly on front also you can change its number for prectice
			$this->load->view('add',$result);
			$this->load->view('footer1');
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.'); //this is flashdata message for shoing message on wrong condition which you also impliment on all wrong cases
			redirect('Login','refresh'); //this is redicredct case which you use on all funcion when you want to show flash message
		}
	}

	public function studentAddData(){
		if($this->session->userdata('type') == 'admin'){
			$data = array(
				'name' => $this->input->post('name'),
				'course' => $this->input->post('course'),
				'year' => $this->input->post('year'),
				'email' => $this->input->post('email'),
				'pass' => $this->input->post('pass'),
				//'image' => $this->input->post('image'),
				'type' => 'student'
			);
			// echo "<pre>";print_r($data);exit();
			$result = $this->Model->insertData('addstu',$data);
			// var_dump($result);
			if($result === true){
				$this->session->set_flashdata('success', 'Great, New user added successfully.');
				redirect(base_url('Welcome/studentAdd'));
				 //$this->studentAdd();
				
			}else{
				$this->session->set_flashdata('error', 'Oppss, Problem to adding new user. Check whats wrong.');
				redirect(base_url()).'Welcome/studentAdd';
			}
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}
	}	

	public function studentEdit()
	{
		if($this->session->userdata('type') == 'admin'){
			$student_id = $this->uri->segment(3);
			$studentData['students_data'] = $this->Model->singlData('addstu',array('id'=>$student_id));

			$config = array();
	        $config["base_url"] = base_url(). "students";
	        $config["total_rows"] = $this->Model->get_count('addstu');
	        $config["per_page"] = 7;
	        $config["uri_segment"] = 2;

	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        $studentData["links"] = $this->pagination->create_links();

	        $studentData['allStudents'] = $this->Model->getStudentData('addstu', $config["per_page"], $page);

			// $studentData['allStudents'] = $this->Model->getStudentData('addstu');

			$this->load->view('her');
			$this->load->view('edit', $studentData);
			$this->load->view('footer1');
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}
	}

	public function studentEditUpdate(){
		if($this->session->userdata('type') == 'admin'){	
			$studentID = $this->input->post('id');
			$data = array(
				'name' => $this->input->post('name'),
				'course' => $this->input->post('course'),
				'year' => $this->input->post('year'),
				'email' => $this->input->post('email'),
				'pass' => $this->input->post('pass')
			);
			$query = $this->Model->updateStudent('addstu',$data,array('id'=>$studentID));
			if($query){			
				$this->session->set_flashdata('success', 'Olla! Admin you updated user detail successfully.');
				redirect(base_url('Welcome/studentAdd'));
			}else{
				$this->session->set_flashdata('error', 'Oppss! There is some problem to update user detail.');
				$this->studentAdd();
			}
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}	
	}
	public function studentDelete($id)
	{
		if($this->session->userdata('type') == 'admin'){	
			if ($this->Model->deleteData('addstu',array('id'=>$id))) {
				$this->session->set_flashdata('warning', 'Oh no, Admin we lost a user from our family. God blesh the user.');
				redirect(base_url('Welcome/studentAdd'));
				// $this->studentAdd();
			}
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}	
	}

	public function studentUpdate()
	{
		if($this->session->userdata('type') == 'admin'){	
			$result['students'] = $this->Model->getDoc('documents');
			// echo "<pre>";print_r($result);exit();
			$this->load->view('her');
			$this->load->view('update',$result);
			$this->load->view('footer1');
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}
	}

	public function document(){
		if($this->session->userdata('type') == 'admin'){
			if(isset($_FILES['doc'])){
				$docFileName = $_FILES['doc']['name'];
				$docSize = $_FILES['doc']['size'];
				$docType = $_FILES['doc']['type'];
				$course = $this->input->post('course');
				date_default_timezone_set('Asia/Calcutta');
				$uploadDate = date('d-m-y h:i:s a');
				$randumNumber = date('dmyhis');
				$docName = $randumNumber.$docFileName;

				$docPath = "documents/";
				$directoryPath = $docPath.$docName;
				$user_id = $this->session->userdata('user_id');
				$user_type = $this->session->userdata('type');
				
				if($_FILES['doc']['size'] != 0){
					$data = array(
						'docName' => $docName,
						'docSize' => $_FILES['doc']['size'],
						'docType' => $_FILES['doc']['type'],
						'uploadDate' => $uploadDate,
						'docPath' => $docPath.$docName,
						'user_id' => $user_id,
						'course_type' => $course,
						'user_type' => $user_type
					);
					$result = $this->Model->insertData('documents',$data);
					if($result === true){
						move_uploaded_file($_FILES["doc"]["tmp_name"],$directoryPath);
						$this->session->set_flashdata('success', 'Olla, Admin you uploaded document successfully.');
						redirect(base_url('welcome/studentUpdate'));
					}else{
						$this->session->set_flashdata('error', 'Ohh no, Admin there is some problem to upload document but details are saved on table.');
						redirect(base_url('welcome/studentUpdate'));
					}
				}else{
					$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
					redirect(base_url('welcome/studentUpdate'));
				}
			}
		}elseif($this->session->userdata('type') == 'student'){
		
			if(isset($_FILES['doc'])){
				// $this->session->set_flashdata('success', 'User Updated successfully');

				$docFileName = $_FILES['doc']['name'];
				$docSize = $_FILES['doc']['size'];
				$docType = $_FILES['doc']['type'];
				// exit();
				date_default_timezone_set('Asia/Calcutta');
				$uploadDate = date('d-m-y h:i:s a');
				$randumNumber = date('dmyhis');
				$docName = $randumNumber.$docFileName;

				$docPath = "documents/";
				$directoryPath = $docPath.$docName;
				$user_id = $this->session->userdata('user_id');
				$user_type = $this->session->userdata('type');
				$course_type = $this->session->userdata('course_type');
				
				if($_FILES['doc']['size'] != 0){
					$data = array(
						'docName' => $docName,
						'docSize' => $_FILES['doc']['size'],
						'docType' => $_FILES['doc']['type'],
						'uploadDate' => $uploadDate,
						'docPath' => $docPath.$docName,
						'user_id' => $user_id,
						'user_type' => $user_type,
						'course_type' => $course_type
					);
					$result = $this->Model->insertData('documents',$data);
					if($result === true){
						move_uploaded_file($_FILES["doc"]["tmp_name"],$directoryPath);
						$this->session->set_flashdata('success', 'Olla, User you uploaded document successfully.');
						redirect(base_url('welcome/studentDashboard'));
					}else{
						$this->session->set_flashdata('error', 'Ohh no, User there is some problem to upload document but details are saved on table. Contact with admin for more info.');
						redirect(base_url('welcome/studentDashboard'));
					}
				}else{
					$this->session->set_flashdata('error', 'Ohh no, User you trying to upload currupdet or wrong file. Check and try again. Thank You.');
					redirect(base_url('welcome/studentUpdate'));
				}
			}else{
				$this->session->set_flashdata('error', 'Ohh no, User your file details are wrong. Pleas try again with right one.');
				redirect(base_url('welcome/studentUpdate'));
			}
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect('Login');
		}
		
	}

	public function downloadDoc(){	
		if($this->session->userdata('type') == 'admin'){	
			$docID = $this->uri->segment(3);
			$result = array();
			$this->load->helper('download');
			$result = $this->Model->singlData('documents',array('doc_id'=>$docID));
			$docName = substr($result[0]['docName'], 12);
			$path = 'documents/';
			$fullPath = $path.$result[0]['docName'];
			$this->session->set_flashdata('success', 'Yes, Admin you downloaded document successfully.');
			force_download($docName, file_get_contents($fullPath));
		}elseif($this->session->userdata('type') == 'student'){	
			$docID = $this->uri->segment(3);
			$result = array();
			$this->load->helper('download');
			$result = $this->Model->singlData('documents',array('doc_id'=>$docID));
			$docName = substr($result[0]['docName'], 12);
			$path = 'documents/';
			$fullPath = $path.$result[0]['docName'];
			date_default_timezone_set('Asia/Calcutta');
			$requestDate = date('d-m-y h:i:s a');
			$user_id = $this->session->userdata('user_id');

			$permissionData = $this->Model->singlData('permission',array('doc_id'=>$docID,'user_id'=>$user_id));
			// echo "<pre>";var_dump($permissionData[0]['permission']);
			// exit();
			if($permissionData[0]['permission'] == '1' && $permissionData[0]['doc_id'] == $docID && $permissionData[0]['user_id'] == $user_id){
					
					$this->Model->deleteData('permission',array('per_id'=>$permissionData[0]['per_id']));
					//$this->session->set_flashdata('success', 'download success');
					force_download($docName, file_get_contents($fullPath));


			}else{
				if($permissionData[0]['doc_id'] == $docID && $permissionData[0]['user_id'] == $user_id){
						$this->session->set_flashdata('warning', 'Hey, Once you ask for permission. Wait admin still not seen this one.');
						redirect(base_url('welcome/studentDashboard'));
				}else{
					$permission = array(
						'doc_id' => $docID,
						'doc_name' => $result[0]['docName'],
						'user_id' => $user_id,
						'user_name' => $this->session->userdata('name'),
						'user_type' => $this->session->userdata('type'),
						'user_course' => $this->session->userdata('course_type'),
						'request_date' => $requestDate,
						'permission' => 0
					);
					$result = $this->Model->insertData('permission',$permission);

					$this->session->set_flashdata('success', 'Great, You ask for permission. Pleas wait for approve. Thank You.');
					//$this->studentDashboard();
					 redirect(base_url('welcome/studentDashboard'));
				}
			}
			exit();
				
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect('Login');
		}
	}

	public function deleteDoc()
	{
		if($this->session->userdata('type') == 'admin'){
			$docID = $this->uri->segment(3);
			$result = $this->Model->singlData('documents',array('doc_id'=>$docID));
			$docPath = $result[0]['docPath'];
			if(is_readable($docPath) && unlink($docPath)){
				$this->Model->deleteData('documents',array('doc_id'=>$docID));
				$this->session->set_flashdata('error','File deleted successfully.');
				redirect('welcome');
			}else{
				$this->session->set_flashdata('warning','Some problem occure. File not deleted. Try again.');
				redirect('welcome');
			}
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect('Login');
		}		
	}

	public function studentPermission()
	{
		if($this->session->userdata('type') == 'admin'){	
			$result['students'] = $this->Model->getPerdata('permission');
			//echo"<pre>";print_r($result); exit();	
			$this->load->view('her');
			$this->load->view('permission',$result);
			$this->load->view('footer1');
		}else{
			$this->session->set_flashdata('error', 'Heyyy! Dont do this. Login with your credential or contact with Admin.');
			redirect(base_url('Login'));
		}
	}

	public function adminGivePermissionForDoc(){
		if($this->session->userdata('type') == 'admin'){
			$per_id = $this->uri->segment(3);
			$result = $this->Model->updateStudent('permission',array('permission'=>'1'),array('per_id'=>$per_id));
			if($result){
				$this->session->set_flashdata('success', 'Yes! Permission for downloading data given successfully.');
				redirect(base_url('welcome/studentPermission'));
			}else{
				$this->session->set_flashdata('warning', 'Ohh hooo!!! Somthing wrong happen when you trying to give permission.');
				redirect(base_url('welcome/studentPermission'));
			}
		}else{
			$this->session->set_flashdata('warning', 'Dont!!! Do this again. You are not doing wright thing. Try again with right step');
			redirect(base_url('Login'));
		}
	}
	public function deletePermission(){
		if($this->session->userdata('type') == 'admin'){
			$per_id = $this->uri->segment(3);
			$result = $this->Model->deleteData('permission',array('per_id'=>$per_id));
			if($result){
				$this->session->set_flashdata('success', 'Yes! Permission Data deleted successfully. Finally you clean some garbeg form platform. Thank You!');
				redirect(base_url('Welcome/studentPermission'));
			}else{
				$this->session->set_flashdata('error', 'Ohhh hooo!!! Somthing wrong when trying to delete data. Try again');
				redirect(base_url('Welcome/studentPermission'));
			}
		}else{
			$this->session->set_flashdata('warning', 'Dont!!! Do this again. You are not doing wright thing. Try again with right step');
			redirect(base_url('Login'));
		}	
	}

	public function studentDashboard(){
		// $this->load->view('her');

		if($this->session->userdata('type') == 'student' || $this->session->userdata('type') == 'admin'){
			$studentType = $this->session->userdata('type');
			$course_type = $this->session->userdata('course_type');
				$result['students'] = $this->Model->getstudentdoc($course_type);
				// echo "<pre>";print_r($result);exit();
			$this->load->view('student',$result);
		}else{
			$this->session->set_flashdata('warning', 'Dont!!! Do this again. You are not doing wright thing. Try again with right step');
			redirect(base_url('Login'));
		}
	}



	public function insertAdminData()
	{
		$con = mysqli_connect('localhost','root','','datashearing');
		$sql = "INSERT INTO addstu(name,email,pass,type) VALUES('Sahil','admin@sahil.com','sahil','admin')";
		if(mysqli_query($con, $sql)){
			echo "data inserted";
		}else{
			die('problem on inserting data'. mysqli_error($con));
		}
	}
	// Only for creating table and db
	public function data(){
		// creating database
		// database
		$con = mysqli_connect('localhost','root','','datashearing');
		$sql = "CREATE TABLE IF NOT EXISTS addstu(
			id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(100) NOT NULL,
			course  VARCHAR(100) NOT NULL,
			year  VARCHAR(100) NOT NULL,
			email  VARCHAR(100) NOT NULL,
			pass  VARCHAR(100) NOT NULL,
			type  VARCHAR(100) NOT NULL
		)";
		mysqli_query($con,$sql);

		$DOCUMENT = "CREATE TABLE IF NOT EXISTS documents(
			doc_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			docName VARCHAR(500) NOT NULL,
			docSize  VARCHAR(500) NOT NULL,
			docType  VARCHAR(500) NOT NULL,
			uploadDate  VARCHAR(500) NOT NULL,
			docPath  VARCHAR(500) NOT NULL,
			user_id  VARCHAR(500) NOT NULL,
			user_type  VARCHAR(500) NOT NULL
		)";
		mysqli_query($con,$DOCUMENT);

		$permission = "CREATE TABLE IF NOT EXISTS permission(
		per_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		doc_id INT(10) NOT NULL,
		user_id INT(10) NOT NULL,
		doc_name VARCHAR(500) NOT NULL,
		user_name  VARCHAR(500) NOT NULL,
		user_type  VARCHAR(500) NOT NULL,
		user_course  VARCHAR(500) NOT NULL,
		request_date  VARCHAR(500) NOT NULL,
		permission  VARCHAR(500) NOT NULL
		)";
		mysqli_query($con,$permission);
		// $sql = "ALTER TABLE permission ADD user_id varchar(10) NOT NULL
		// 	";
		// // $change = "ALTER TABLE addstu(type varchar(10) not null)";
		// $this->db->query($sql);
}

}