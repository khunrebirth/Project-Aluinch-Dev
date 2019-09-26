<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_page extends MX_Controller
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
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    private $data = false;

    public function __construct()
    {
        parent::__construct();

        // Middleware
        require_login('backoffice/login');

        // Set Model

        $this->load->model('Contact_page_model');
        $this->load->model('User_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }



    public function edit($contact_page_id)
    {
        $this->data['title'] = 'Manage Item: contact page';
        $this->data['content'] = 'contact_page/edit_contact_page';
        $this->data['contact_page'] = $this->Contact_page_model->get_contact_pages_by_id($contact_page_id);

        $this->load->view('app', $this->data);

    }

    public function update($contact_page_id)
    {
        $data = [
            'meta_tag_title' => $this->input->post('meta_tag_title'),
            'meta_tag_description' => $this->input->post('meta_tag_description'),
            'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
        ];

        $update_contact_page = $this->Contact_page_model->update_contact_pages_by_id($contact_page_id, $data);

        if ($update_contact_page) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/contact_page/content/1');

    }
}

