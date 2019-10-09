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

        $users = $this->User_model->get_user($username, $password);

        if (count($users) > 0) {
        	foreach ($users as $user) {

        		$isPasswordVerify = password_verify($user->password, password_hash($password, PASSWORD_DEFAULT));

        		if ($isPasswordVerify) {
					$this->session->set_userdata([
						'user_id' => $user->id,
						'role_id' => $user->role_id
					]);

					redirect('backoffice/dashboard');
				} else {
					redirect('backoffice/login');
				}
			}
		} else {
			redirect('backoffice/login');
		}
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('backoffice/login');
    }

}
