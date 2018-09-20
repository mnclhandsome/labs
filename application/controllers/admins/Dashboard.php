<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->helper('form');	
		//$autoload['helper'] = array(‘form’);
		
	}

	public function index(){

		if($this->session->userdata('userinfo')){

			$admindetails = $this->session->userdata('userinfo');
			// print_r($admindetails);
			// die;
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/dashboard');
			$this->load->view('admin/includes/footer');

		}else{

			redirect(base_url().'admin/login');
		}

	}

	public function addPharmacy(){

		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/pharmacy_add_view');
			$this->load->view('admin/includes/footer');
		}
	}

	public function addPharmacyDetails(){

		if($this->session->userdata('userinfo')){

			$admindetails = $this->session->userdata('userinfo');
			$post=$this->input->post();
			$email = $post['pharmacy_email'];
			$checkEmail = $this->admin_model->checkEmailExists($email);
			if($checkEmail > 0){
				$this->session->set_flashdata('error','Email id already exists.please use another Email id');
				redirect(base_url().'admins/dashboard/addPharmacy');
				
			}else{
				$post['pharmacy_password'] = md5($post['pharmacy_password']);
				$post['pharmacy_created_id'] = $admindetails['user_id'];
				$post['pharmacy_created_date'] = date('Y-m-d H:i:s');
				$inserPharmacyRecords = $this->admin_model->insertPharmacyRecords($post);
				$this->session->set_flashdata('message','Pharmacy Details are successfully Enterd');
				redirect(base_url().'admins/dashboard/addPharmacy');
			}
			//redirect(base_url().'admins/dashboard/addPharmacy');

		}

	}
	public function allPharmacyList(){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['pharmacyList'] = $this->admin_model->pharmacyList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/pharmacy_list_view', $data);
			$this->load->view('admin/includes/footer');
		}

	}


	public function getPharmacyInfo($pharmacyId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$pharmacyId = $this->uri->segment(4);

			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['getPharmacyInfo'] = $this->admin_model->getPharmacyDetails($pharmacyId);
			$data['pharmacyList'] = $this->admin_model->pharmacyList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/pharmacy_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}

	}

	public function getPharmacyDetails($pharmacyId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$pharmacyId = $this->uri->segment(4);

			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['getPharmacyInfo'] = $this->admin_model->getPharmacyDetails($pharmacyId);
			$data['pharmacyList'] = $this->admin_model->pharmacyList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/pharmacy_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function updatePharmacy(){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$post = $this->input->post();
			$pharmacyId = $post['pharmacy_id'];
			unset($post['pharmacy_id']);
			$updatePharmacy = $this->admin_model->updatePharmacyDetails($pharmacyId, $post);
			if($updatePharmacy == 1){
				$this->session->set_flashdata('message','Pharmacy Details are successfully Updated');
				redirect(base_url().'admins/dashboard/allPharmacyList');

			}else{
				$this->session->set_flashdata('error','We are unable to process your request');
				redirect(base_url().'admins/dashboard/allPharmacyList');
			}
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/pharmacy_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function deletePharmacy($pharmacyId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$pharmacyId = $this->uri->segment(4);
			$deletePharmacy = $this->admin_model->deletePharmacy($pharmacyId);
			if($deletePharmacy == 1){
				$this->session->set_flashdata('message','Pharmacy is successfully deleted');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}

		}

	}

	public function activatePharmacy($pharmacyId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$pharmacyId = $this->uri->segment(4);
			$activatePharmacy = $this->admin_model->activatePharmacy($pharmacyId);
			if($activatePharmacy == 1){
				$this->session->set_flashdata('message','Pharmacy is successfully Activated');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}

		}

	}

	public function deactivatePharmacy($pharmacyId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$pharmacyId = $this->uri->segment(4);
			$deactivatePharmacy = $this->admin_model->deactivatePharmacy($pharmacyId);
			if($deactivatePharmacy == 1){
				$this->session->set_flashdata('message','Pharmacy is successfully Deactivated');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allPharmacyList');				
			}

		}

	}

	public function addLab(){
		if($this->session->userdata('userinfo')){

			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/lab_add_view');
			$this->load->view('admin/includes/footer');

		}

	}

	public function addLabDetails(){

		if($this->session->userdata('userinfo')){

			$admindetails = $this->session->userdata('userinfo');
			$post=$this->input->post();
			$email = $post['lab_email'];
			$checkEmail = $this->admin_model->checkLabEmailExists($email);
			if($checkEmail > 0){
				$this->session->set_flashdata('error','Email id already exists.please use another Email id');
				redirect(base_url().'admins/dashboard/addLab');
				
			}else{
				$post['lab_password'] = md5($post['lab_password']);
				$post['lab_created_id'] = $admindetails['user_id'];
				$post['lab_created_date'] = date('Y-m-d H:i:s');
				$inserLabRecords = $this->admin_model->insertLabRecords($post);
				$this->session->set_flashdata('message','Lab Details are successfully Enterd');
				redirect(base_url().'admins/dashboard/addLab');
			}
			//redirect(base_url().'admins/dashboard/addPharmacy');

		}

	}
	public function allLabList(){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['labList'] = $this->admin_model->labList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/lab_list_view', $data);
			$this->load->view('admin/includes/footer');
		}

	}


	public function getLabInfo($labId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$pharmacyId = $this->uri->segment(4);

			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['getLabInfo'] = $this->admin_model->getLabDetails($pharmacyId);
			$data['labList'] = $this->admin_model->labList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/lab_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}

	}

	public function getLabDetails($labId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$pharmacyId = $this->uri->segment(4);

			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$data['getLabInfo'] = $this->admin_model->getLabDetails($labId);
			$data['labList'] = $this->admin_model->labList();
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/lab_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function updateLab(){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$post = $this->input->post();
			$labId = $post['lab_id'];
			unset($post['lab_id']);
			$updatelab = $this->admin_model->updateLabDetails($labId, $post);
			if($updatelab == 1){
				$this->session->set_flashdata('message','Lab Details are successfully Updated');
				redirect(base_url().'admins/dashboard/allLabList');

			}else{
				$this->session->set_flashdata('error','We are unable to process your request');
				redirect(base_url().'admins/dashboard/allLabList');
			}
			$this->load->view('admin/includes/header', $data);
			$this->load->view('admin/includes/sidebar', $data);
			$this->load->view('admin/lab_edit_view', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function deleteLab($labId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$labId = $this->uri->segment(4);
			$deleteLab = $this->admin_model->deleteLab($labId);
			if($deleteLab == 1){
				$this->session->set_flashdata('message','Lab is successfully deleted');
				redirect(base_url().'admins/dashboard/allLabList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allLabList');				
			}

		}

	}

	public function activateLab($labId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$labId = $this->uri->segment(4);
			$activateLab = $this->admin_model->activateLab($labId);
			if($activateLab == 1){
				$this->session->set_flashdata('message','Lab is successfully Activated');
				redirect(base_url().'admins/dashboard/allLabList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allLabList');				
			}

		}

	}

	public function deactivateLab($labId){
		if($this->session->userdata('userinfo')){
			$admindetails = $this->session->userdata('userinfo');
			$data['getAdminDetails'] = $this->admin_model->getAllAdminDetails($admindetails['user_id']);
			$labId = $this->uri->segment(4);
			$deactivateLab = $this->admin_model->deactivateLab($labId);
			if($deactivateLab == 1){
				$this->session->set_flashdata('message','Lab is successfully Deactivated');
				redirect(base_url().'admins/dashboard/allLabList');				
			}else{
				$this->session->set_flashdata('error','No action is taken');
				redirect(base_url().'admins/dashboard/allLabList');				
			}

		}

	}
}
