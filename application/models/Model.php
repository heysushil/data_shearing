<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function insertData($tablName,$data){
		// echo "<pre>";print_r($data);
		$result = $this->db->insert($tablName,$data);
		if($result){
			return true;
		}else{
			return false;
		}
	}
	public function updateStudent($tablName, $data, $studentID){
		$result = $this->db->update($tablName,$data,$studentID);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function get_count($tablName){
		return $this->db->count_all($tablName);
	}

	public function getStudentData($tablName, $limit, $start){
		$this->db->select('*')->from($tablName)->where('type','student')->order_by('id','desc');
		$this->db->limit($limit, $start);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data->result_array();
		}else{
			return false;
		}
	}
	public function getPerdata($tablName){
		$result = $this->db->select('*')->from('permission');
		$result = $this->db->get();
		if($result->num_rows()>0){
			return $result->result_array();
			//echo"<pre>";print_r($abc);
		}else{
			return false;
		}
	}
	public function getDocWithLimit($tablName,$limit,$start){
		$result = $this->db->select('documents.*,addstu.id,addstu.name,addstu.course,addstu.year,addstu.type');
		$this->db->from('documents');
		$this->db->join('addstu','addstu.id=documents.user_id');
		$this->db->limit($limit,$start);
		$this->db->order_by('uploadDate','desc');
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data->result_array();
		}else{
			return false;
		}
	}
	public function getDoc(){
		$result = $this->db->select('documents.*,addstu.id,addstu.name,addstu.course,addstu.year,addstu.type');
		$this->db->from('documents');
		$this->db->join('addstu','addstu.id=documents.user_id');
		$this->db->order_by('uploadDate','desc');
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data->result_array();
		}else{
			return false;
		}
	}
	public function getstudentdoc($courseType){
		$result = $this->db->select('documents.*,addstu.id,addstu.name,addstu.course,addstu.year,addstu.type');
		$this->db->from('documents');
		$this->db->join('addstu','addstu.id=documents.user_id');
		// $this->db->where('user_type', $userType);
		$this->db->where('course_type', $courseType);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data->result_array();
			// $result = $data->result_array();
			// echo "<pre>";print_r($result);exit();
		}else{
			return false;
		}
	}

	public function singlData($tablName,$data){
		$query = $this->db->select('*')
						  ->from($tablName)
						  ->where($data)
						  ->limit(1)
						  ->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function singlePermissionData($tablName,$docID){
		
	}
	
	public function deleteData($tablName, $id){
		$this->db->where($id)->delete($tablName);
		return 1;
	}
	
	
}
