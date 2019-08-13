<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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

        $user = $this->User_model->get_user($username, $password);

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
