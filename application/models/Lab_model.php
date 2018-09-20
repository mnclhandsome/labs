<?php
	
	/** 
	 * Lab Model
	 */
	class Lab_model extends CI_Model{
		
		public function __construct(){
			# code...
			parent::__construct();
	   		$this->load->database("pharmacy_model");
		}

		public function index(){


		}

		public function authenticate_lab_login($user_name, $password){
			$this->db->select('*');
	        $this->db->from('lab');
	        $this->db->where('lab_email', $user_name);
			$this->db->where('lab_password', $password);
			//$this->db->where('pharmacy_status', 1);
	        $return = $this->db->get();
	        if($return->num_rows() == 0){
	                return false;
	        }else{
	            $result = $return->row_array();
	            return $result;
	        }
		}
	}