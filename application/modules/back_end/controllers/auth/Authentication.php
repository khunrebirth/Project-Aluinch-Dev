<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        // Middleware
        require_no_login('backoffice/dashboard');

		$data['content'] = 'auth/login';

		$this->load->view('auth/login', $data);
	}

	public function login_process()
    {
        $this->load->model('User_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $users = $this->User_model->get_user($username);

        if (count($users) > 0) {
        	foreach ($users as $user) {
        		if (password_verify($password, $user->password)) {
					$this->session->set_userdata([
						'user_id' => $user->id,
						'role_id' => $user->role_id
					]);

					logger_store([
						'user_id' => $user->id,
						'detail' => 'เข้าสู่ระบบ Aluinch Backoffice',
						'event' => 'login',
						'ip' => $this->input->ip_address(),
					]);

					redirect('backoffice/dashboard');
				}
			}
			redirect('backoffice/login');
		}
        else {
			redirect('backoffice/login');
		}
    }

    public function logout()
    {
		logger_store([
			'user_id' => $this->session->userdata('user_id'),
			'detail' => 'ออกจากระบบ Aluinch Backoffice',
			'event' => 'logout',
			'ip' => $this->input->ip_address(),
		]);

        $this->session->sess_destroy();

        redirect('backoffice/login');
    }
}
