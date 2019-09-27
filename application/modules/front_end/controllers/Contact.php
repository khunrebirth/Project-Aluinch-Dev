<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();

		/*
		| -------------------------------------------------------------------------
		| SET UTILITIES
		| -------------------------------------------------------------------------
		*/

		// Model
		$this->load->model('Contact_model');
		$this->load->model('Contact_page_model');
    }

    public function index()
    {
        $data['content'] = 'contact';
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

        $this->load->view('app', $data);
    }

    public function send()
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp = $this->input->ip_address();

        $secret = $this->config->item('google_secret');

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $verifyResponse = file_get_contents($url);
        $responseData = json_decode($verifyResponse);

        if ($responseData) {

            $data = [
                'name'=> $this->input->post('name'),
                'email'=> $this->input->post('email'),
                'phone'=> $this->input->post('phone'),
                'company'=> $this->input->post('company'),
                'message'=> $this->input->post('detail'),
            ];

            $this->Contact_model->insert_contacts($data);
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
        }

        redirect('contact', 'refresh');
    }
}
