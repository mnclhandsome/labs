<?php
class Admin_Model extends CI_Model {
    public function __construct() {
       // parent::__construct();
	   $this->load->database("admin_model");
    }

	public function authenticate_admin_login($user_name, $password) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin_email', $user_name);
		$this->db->where('admin_password', $password);
        $return = $this->db->get();
        if($return->num_rows() == 0){
                return false;
        }else{
            $result = $return->row_array();
            return $result;
        }
    }
	
	public function getAllAdminDetails($userId){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('admin_id', $userId);
        $result = $this->db->get()->row_array();
        return $result;
    }

    public function checkEmailExists($email){

        $this->db->select('pharmacy_email');
        $this->db->where('pharmacy_email', $email);
        $result = $this->db->get('pharmacy');
        $count = $result->num_rows();
        //echo $count; 
        return $count;
        // print_r($count);
        //die;
    }

    public function insertPharmacyRecords($postData){

        $this->db->insert('pharmacy', $postData);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function pharmacyList(){

        $this->db->select('*');
        $this->db->from('pharmacy');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getPharmacyDetails($pharmacyId){

        $this->db->select('*');
        $this->db->from('pharmacy');
        $this->db->where('pharmacy_id', $pharmacyId);
        $result = $this->db->get()->row_array();
        // print_r($result);
        // die;
        return $result;
    }

    public function updatePharmacyDetails($pharmacyId, $post){
        // print_r($post);
        // die;
        $this->db->where('pharmacy_id',$pharmacyId);
        $this->db->update("pharmacy",$post);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deletePharmacy($pharmacyId){
        $this->db->where('pharmacy_id',$pharmacyId);
        $this->db->delete('pharmacy');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function activatePharmacy($pharmacyId){
        $this->db->set('pharmacy_status', 1);
        $this->db->where('pharmacy_id', $pharmacyId);
        $this->db->update('pharmacy');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deactivatePharmacy($pharmacyId){
        $this->db->set('pharmacy_status', 0);
        $this->db->where('pharmacy_id', $pharmacyId);
        $this->db->update('pharmacy');
        $result = $this->db->affected_rows();
        return $result;
    }	

    public function checkLabEmailExists($email){

        $this->db->select('lab_email');
        $this->db->where('lab_email', $email);
        $result = $this->db->get('lab');
        $count = $result->num_rows();
        //echo $count; 
        return $count;
        // print_r($count);
        //die;
    }

    public function insertLabRecords($postData){

        $this->db->insert('lab', $postData);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function labList(){

        $this->db->select('*');
        $this->db->from('lab');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getLabDetails($labId){

        $this->db->select('*');
        $this->db->from('lab');
        $this->db->where('lab_id', $labId);
        $result = $this->db->get()->row_array();
        return $result;
    }

    public function updateLabDetails($labId, $post){
        $this->db->where('lab_id',$labId);
        $this->db->update("lab",$post);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deleteLab($labId){
        $this->db->where('lab_id',$labId);
        $this->db->delete('lab');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function activateLab($labId){
        $this->db->set('lab_status', 1);
        $this->db->where('lab_id', $labId);
        $this->db->update('lab');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deactivateLab($labId){
        $this->db->set('lab_status', 0);
        $this->db->where('lab_id', $labId);
        $this->db->update('lab');
        $result = $this->db->affected_rows();
        return $result;
    }
}
?>
