<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller
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
		is_superadmin();

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

	public function index()
	{
		$this->data['title'] = 'Users';
		$this->data['content'] = 'user/user';
		$this->data['users'] = $this->User_model->get_user_all();

		$this->load->view('app', $this->data);
	}

	public function create()
	{
		$this->data['title'] = 'Users - Add';
		$this->data['content'] = 'user/add_user';

		$this->load->view('app', $this->data);
	}

	public function store()
	{
		$add_user = $this->User_model->insert_user([
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role')
		]);

		if ($add_user) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม User',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

            $this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/setting/users');
	}

	public function show() {}

	public function edit($id)
	{
		$this->data['title'] = 'User - Edit';
		$this->data['content'] = 'user/edit_user';
		$this->data['user'] = $this->User_model->get_user_by_id($id);

		$this->load->view('app', $this->data);
	}

	public function update($id)
	{
		$update_user = $this->User_model->update_user_by_id($id, [
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => $this->input->post('role'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

		if ($update_user) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข User',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

            $this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/setting/users');
	}

	public function destroy($id)
	{
		$status = 500;
		$response['success'] = 0;

		$delete_user = $this->User_model->delete_user_by_id($id);

		// Set Response
		if ($delete_user != false) {
			$status = 200;
			$response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ User',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);
        }

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
