<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('adhharapi');
	}

	public function check_addhar($addhar_number = '')
	{
		$result = $this->Admin_model->getRow('users', '*', ['where' => ['addhar_number' => $addhar_number]]);
		if (!empty($result)) {
			return TRUE;
		} else {
			if ($addhar_number == '') {
				$this->form_validation->set_message('check_addhar', 'The {field} field is required');
			} elseif (strlen($addhar_number) != 12) {
				$this->form_validation->set_message('check_addhar', 'The {field} field must be 12 digits');
			} else {
				$this->form_validation->set_message('check_addhar', 'The {field} not found..!');
			}
			return FALSE;
		}
	}

	public function check_otp($otp = '')
	{
		$valid_otp = 123456;
		if ($otp == $valid_otp) {
			return TRUE;
		} else {
			if ($otp == '') {
				$this->form_validation->set_message('check_otp', 'The {field} field is required');
			} elseif (strlen($otp) != 6) {
				$this->form_validation->set_message('check_otp', 'The {field} field must be 6 digits');
			} else {
				$this->form_validation->set_message('check_otp', 'The {field} not match..!');
			}
			return FALSE;
		}
	}

	public function index()
	{

		$this->load->view('addhar/usage');
	}

	public function enrolment()
	{
		$this->load->view('addhar/enrolment');
	}

	public function features()
	{
		$this->load->view('addhar/features');
	}

	public function generation()
	{
		$this->load->view('addhar/generation');
	}

	public function update()
	{
		$this->load->view('addhar/update-data');
	}

	public function verifyAddhar()
	{
		$form 			= $this->input->post('form');
		$addhar_number 	= $this->input->post('number');
		$this->form_validation->set_rules('number', 'Addhar Number', 'callback_check_addhar');
		if ($form === 'otp') {
			$this->form_validation->set_rules('otp', 'otp', 'callback_check_otp');
		}
		if ($this->form_validation->run() == FALSE) {
			if ($form === 'otp') {
				$data['form'] = 'otp_verify';
			}
			$this->load->view('addhar/update-enroll', $data);
		} else {
			if ($form == 'number') {
				$data['form'] = 'otp_verify';
				$this->session->set_flashdata('success_msg', 'otp send on register mobile number.');
				$this->load->view('addhar/update-enroll', $data);
			} else {
				$result = $this->Admin_model->getRow('users', '*', ['where' => ['addhar_number' => $addhar_number]]);
				redirect(base_url('home/updateAddhar/' . encode($result->user_id)));
			}
		}
	}

	public function updateAddhar($user_id = '')
	{
		try {
			$user_id 	= decode($user_id);
			$e_record 	= $this->Admin_model->getRow('users', '*', ['where' => ['user_id' => $user_id]]);
			$this->form_validation->set_rules('address', 'User Address ', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['e_record'] 		= $e_record;
				$data['agency_link'] 	= $this->Admin_model->getRows('agency_link', 'agency_url, agency_code', ['where' => ['addhar_number' => $e_record->addhar_number]]);
				$this->load->view('addhar/update-form', $data);
			} else {
				$other 			 = $this->input->post('other');
				
				$updated_address = $this->input->post('address');
				if (!empty($other)) {
					foreach ($other as $key => $value) {
						$data = array(
							'updated_address' 	=> $this->input->post('address'),
							'agency_code' 		=> $key,
							'addhar_number' 	=> $e_record->addhar_number,
							'status' 			=> "ACTIVE",
							'is_deleted' 		=> "NO",
						);
						$notificationid = $this->Admin_model->add('agency_notification', $data);
						
							$bank = $this->adhharapi->updateAddress($e_record->addhar_number, $updated_address);

							// $this->adhharapi->readNotification($notificationid);
						
					}
				}
				$data = array(
					'user_address' => $this->input->post('address'),
				);
				
				$this->Admin_model->edit('users', $data, ['user_id' => $user_id]);

				$this->session->set_flashdata('success_msg', 'address updated successfully.');
				redirect(base_url('home/verifyAddhar'));
			}
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			return;
		}
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
