<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_page extends MX_Controller
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
        $this->load->model('Contact_page_model');
        $this->load->model('User_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function edit_content($contact_page_id)
    {
		$this->data['title'] = 'Page: Contact - Content';
        $this->data['content'] = 'contact_page/edit_contact_page';
        $this->data['contact_page'] = $this->Contact_page_model->get_contact_pages_by_id($contact_page_id);

        $this->load->view('app', $this->data);
    }

    public function edit_update($contact_page_id)
    {
        $contact_page = $this->Contact_page_model->get_contact_pages_by_id($contact_page_id);

        $img_og_twitter = $contact_page->img_og_twitter;

        if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
            $img_og_twitter = $this->do_upload_img_meta_contact('img_og_twitter');
        }


        $update_contact_page = $this->Contact_page_model->update_contact_pages_by_id($contact_page_id, [
			'meta_tag_title' => $this->input->post('meta_tag_title'),
			'meta_tag_description' => $this->input->post('meta_tag_description'),
			'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
            'img_og_twitter' => $img_og_twitter,
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_contact_page) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/contact/content/1');
    }

    public function edit_info($contact_page_id)
    {
        $this->data['title'] = 'Manage Item: contact page';
        $this->data['content'] = 'contact_page/edit_contact_info';
        $this->data['contact_page'] = $this->Contact_page_model->get_contact_pages_by_id($contact_page_id);

        $this->load->view('app', $this->data);

    }

    public function update_info($contact_page_id)
    {
        $update_contact_page = $this->Contact_page_model->update_contact_pages_by_id($contact_page_id, [
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'tel' => $this->input->post('tel'),
			'web' => $this->input->post('web'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_contact_page) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/contact/info/1');
    }
    private function do_upload_img_meta_contact($filename)
    {
        $config['upload_path'] = './storage/uploads/images/contacts';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($filename)) {
            $error = array('error' => $this->upload->display_errors());

            return false;
        } else {
            $data = array('upload_data' => $this->upload->data());

            return $data['upload_data']['file_name'];
        }
    }
}
