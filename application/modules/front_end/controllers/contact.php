<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /home.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $data['content'] = 'contact_us';

        $this->load->view('app', $data);
    }

    public function send()
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp = $this->input->ip_address();

        $secret = $this->config->item('google_secret');

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $output = curl_exec($ch);
//        curl_close($ch);
//
//        $status = json_decode($output, true);

        $verifyResponse = file_get_contents($url);
        $responseData = json_decode($verifyResponse);

//        if ($status['success']) {
        if ($responseData) {


            // TODO:: Something
            $data = array('name' => $this->input->post('name'),
                'name'=> $this->input->post('name'),
                'email'=> $this->input->post('email'),
                'phone'=> $this->input->post('phone'),
                'company'=> $this->input->post('company'),
                'message'=> $this->input->post('detail'),
            );
            $this->load->model('contact_model');
            $this->contact_model->insert_contacts($data);

        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
        }

        redirect('contact-us', 'refresh');
    }
}
