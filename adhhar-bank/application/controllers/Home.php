<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public $update_count = 0;
	public $update_array = [];
	function __construct()
	{
		parent::__construct();
		$this->load->library('adhharapi');
		$result = $this->adhharapi->getAddressNotification('ybi_bank');
		$result = json_decode($result);
		$this->update_count = sizeof($result->result);
		$this->update_array = $result;
	}

	public function index()
	{
		$data['update_count'] = $this->update_count;
		$this->load->view('home/index', $data);
	}

	public function about()
	{
		$data['update_count'] = $this->update_count;
		$this->load->view('home/about', $data);
	}

	public function services()
	{
		$data['update_count'] = $this->update_count;
		$this->load->view('home/services', $data);
	}

	public function notification()
	{
		$data['update_count'] = $this->update_count;
		$data['update_array'] = $this->update_array;

		$this->load->view('home/notification', $data);
	}

	public function registration()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('midname', 'Middle Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('number', 'Mobile Number', 'required|exact_length[10]|is_unique[users.user_phone]');
		$this->form_validation->set_rules('addhar', 'Addhar Number', 'required|exact_length[12]|is_unique[users.addhar_number]');
		$this->form_validation->set_rules('address', 'Address', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['update_count'] = $this->update_count;
			$this->load->view('home/registration', $data);
		} else {
			$addhar_number = $this->input->post('addhar');
			$data = array(
				'user_name' 	=> $this->input->post('fname'),
				'middle_name' 	=> $this->input->post('midname'),
				'last_name' 	=> $this->input->post('lname'),
				'user_phone ' 	=> $this->input->post('number'),
				'addhar_number' 	=> $addhar_number,
				'dob' 	=> date('Y-m-d', strtotime($this->input->post('dob'))),
				'user_address' 		=> $this->input->post('address'),
				'status' 			=> "ACTIVE",
				'is_deleted' 		=> "NO",
			);

			$result = $this->Admin_model->add('users', $data);
			if ($result) {
				$result = $this->adhharapi->verifyAddhar([
					'agency_code' => 'ybi_bank', // unique code
					'agency_url' => 'ybi.com', // agency url
					'addhar_number' => $addhar_number
				]);
			}
			$this->session->set_flashdata('success_msg', 'New User Added Successfully.');
			$data['update_count'] = $this->update_count;
			$this->load->view('home/registration', $data);
		}
	}

	public function update()
	{
		$id = $this->input->post('id');
		$addhar_number = $this->input->post('addhar_number');
		$user_address = $this->input->post('updated_address');
		$data = array(
			'user_address' => $user_address,
		);
		$this->Admin_model->edit('users', $data, ['addhar_number' => $addhar_number]);
		$this->adhharapi->readNotification($id);
		// $this->session->set_flashdata('success_msg', 'User Address Update Successfully.');
		redirect(base_url('home/notification'));
	}

	public function error_404()
	{
		try {
			$segment1 = $this->uri->segment(1);
			if ($segment1 == 'admin') redirect('admin/not_found');
			else $this->load->view('errors/error_404');
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			return;
		}
	}
}
