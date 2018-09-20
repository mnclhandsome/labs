<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){

		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->model('admin_model');
		$this->load->model('pharmacy_model');
		$this->load->model('lab_model');		
	}

	public function index(){

		//$this->load->view('admin_view');
		if($this->session->userdata('userinfo')){
			redirect(base_url().'admins/dashboard');
		}else{
			redirect(base_url().'admin/login');
		}
		
	}

	public function login(){
		
		if($this->session->userdata('is_user_login')==TRUE){

			if($this->session->userdata('is_admin')==TRUE){

				redirect(base_url('admins/dashboard'),'');

			}else if($this->session->userdata('is_pharmacy')==TRUE){

				redirect(base_url('pharmacy/dashboard'),'');

			}else if($this->session->userdata('is_lab')==TRUE){

				redirect(base_url('lab/dashboard'),'');

			}else{

				redirect(redirect(base_url().'admin'));
			}
			exit;			
		}

		$data['title'] = 'Login For Dashboard';
		$data['msg'] = '';
		
		$user_name = $this->form_validation->set_rules('username', 'Email address', 'trim|required');
		$password = $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() === FALSE) {
			$data['msg'] = $this->session->flashdata('msg');
			$this->load->view('admin_view', $data);
			return;
		}
		
		$is_admin = TRUE;
		$folder = 'admins';
		$is_pharmacy = FALSE;
		$is_lab = FALSE;
		$user_name = $this->input->post("username");
		$password = $this->input->post("password");
		$userRow = $this->admin_model->authenticate_admin_login($user_name, $password);
		$password = md5($password);
		$userId = $userRow['admin_id'];
		if(!$userRow){
			$is_admin = FALSE;
			$is_pharmacy = TRUE;
			$is_lab = FALSE;
			$folder = 'pharamacy';
			$userRow = $this->pharmacy_model->authenticate_pharamacy_login($user_name, $password);
			if(!$userRow){				
				$is_admin = FALSE;
				$is_pharmacy = FALSE;
				$is_lab = TRUE;
				$folder = 'lab';
				$userRow = $this->lab_model->authenticate_lab_login($user_name, $password);
				if(!$userRow){
					print_r($userRow);

					$data['msg'] = 'Wrong email or password provided';
					$this->load->view('admin_view', $data);
					return;
				}elseif($userRow['lab_status'] == 0){

					$data['msg'] = 'You have not yet verified your email address.';
					$this->load->view('admin_view', $data);
					return;
				}else{
					$user_data = array(
						'user_id' => $userRow['lab_id'],
						'user_email' => $userRow['lab_email'],
						'name' => $userRow['lab_name'],
						'password' => $userRow['lab_orginal_pass'],
						'is_user_login' => TRUE,
						'is_admin' => 0,
						'is_pharmacy' => 0,
						'is_lab' => 1,
					);
					$this->session->set_userdata('userinfo', $user_data);
					$redirect = ($this->session->userdata('back_from_user_login')) ? $this->session->userdata('back_from_user_login') : $folder.'/dashboard';
					$this->session->set_userdata('back_from_user_login','');
					redirect(base_url($redirect), '');

				}
			}else if($userRow['pharmacy_status'] == 0){
				$data['msg'] = 'You have not yet verified your email address.';
				$this->load->view('admin_view', $data);
				return;
			}else{

				$user_data = array(
					'user_id' => $userRow['pharmacy_id'],
					'user_email' => $userRow['pharmacy_email'],
					'name' => $userRow['pharmacy_name'],
					'password' => $userRow['pharmacy_orginal_pass'],
					'is_user_login' => TRUE,
					'is_admin' => 0,
					'is_pharmacy' => 1,
					'is_lab' => 0,
				);
				$this->session->set_userdata('userinfo', $user_data);
				$redirect = ($this->session->userdata('back_from_user_login')) ? $this->session->userdata('back_from_user_login') : $folder.'/dashboard';
				$this->session->set_userdata('back_from_user_login','');
				redirect(base_url().'pharmacy/dashboard', '');
			}
		}
		
		$user_data = array(
			'user_id' => $userRow['admin_id'],
			'user_email' => $userRow['admin_email'],
			'user_name' => $userRow['admin_username'],
			'role' => $userRow['role_id'],
			'name' => $userRow['admin_name'],
			'password' => $userRow['admin_password'],
			'is_user_login' => TRUE,
			'is_admin' => $is_admin,
			'is_pharmacy' => $is_pharmacy,
			'is_lab' => $is_lab,

		);
		$this->session->set_userdata('userinfo', $user_data);
		// print_r($user_data);
		// die;
		$redirect = ($this->session->userdata('back_from_user_login')) ? $this->session->userdata('back_from_user_login') : $folder.'/dashboard';
		$this->session->set_userdata('back_from_user_login','');
		redirect(base_url($redirect), '');
	}

	public function logout() {
		  
		$user_data = array(
			'user_id' => '',
			'useremail' => '',
			'is_user_login' => FALSE,
			'slug' => '',
			'is_job_seeker' => FALSE,
			'is_employer' => FALSE
		);
		$this->session->set_userdata('userinfo');
		$this->session->unset_userdata('userinfo');
		redirect(base_url(), 'admin/login'); 
	}

}
