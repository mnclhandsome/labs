<?php
	
	/** 
	 * Pharmacy Model
	 */
	class Pharmacy_model extends CI_Model{
		
		public function __construct(){
			# code...
			parent::__construct();
	   		$this->load->database("pharmacy_model");
		}

		public function index(){


		}

		public function authenticate_pharamacy_login($user_name, $password){

			$this->db->select('*');
	        $this->db->from('pharmacy');
	        $this->db->where('pharmacy_email', $user_name);
			$this->db->where('pharmacy_password', $password);
			//$this->db->where('pharmacy_status', 1);
	        $return = $this->db->get();
	        if($return->num_rows() == 0){
	                return false;
	        }else{
	            $result = $return->row_array();
	            return $result;
	        }
		}

		public function getUserPharmacyDetails($pharmacyUserDetails){
			$this->db->select('*');
			$this->db->from('pharmacy');
			$this->db->where('pharmacy_id', $pharmacyUserDetails);
			$result = $this->db->get()->row_array();
			// print_r($result);
			// die;
			return $result;

		}
	}