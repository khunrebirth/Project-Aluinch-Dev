<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller
{

	private $data = false;

	public function __construct()
	{
		parent::__construct();

		/*
		| -------------------------------------------------------------------------
		| MIDDLEWARE
		| -------------------------------------------------------------------------
		*/

		require_login('backoffice/login');

		/*
		| -------------------------------------------------------------------------
		| SET UTILITIES
		| -------------------------------------------------------------------------
		*/

		// Model
		$this->load->model('User_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
	}

	public function index() {}

	public function edit($id)
	{
		$this->data['title'] = 'Profile - Edit';
		$this->data['content'] = 'profile/edit_profile';
		$this->data['profile'] = $this->User_model->get_user_by_id($id);

		$this->load->view('app', $this->data);
	}

	public function update($id)
	{

		$update_profile = $this->User_model->update_user_by_id($id, [
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		if ($update_profile) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Profile',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Update Password Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/dashboard');
	}
}
