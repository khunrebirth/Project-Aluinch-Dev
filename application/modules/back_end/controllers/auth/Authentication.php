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
        $this->load->model('user_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->get_user($username, $password);

        if ($user) {

            $params = array(
                'user_id' => $user->id,
            );

            $this->session->set_userdata($params);

            redirect('backoffice/dashboard');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('backoffice/login');
    }

}
