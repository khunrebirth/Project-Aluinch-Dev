<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MX_Controller
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
        $this->load->model('Project_model');
        $this->load->model('Project_page_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Project';
        $this->data['content'] = 'project/project';
        $this->data['projects'] = $this->Project_model->get_project_all();

        $this->load->view('app', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Project';
        $this->data['content'] = 'project/add_project';

        $this->load->view('app', $this->data);
    }

    public function store()
    {
        $img_cover = '';

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_project('img_cover');
        }

        $add_project = $this->Project_model->insert_project([
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'img_cover' => $this->input->post('img_cover'),
			'img_cover' => $img_cover,
			'img_title_alt' => $this->input->post('img_title_alt'),
		]);

        if ($add_project) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/project/projects');
    }

    public function show() {}

    public function edit($id)
    {
        $this->data['title'] = 'Project';
        $this->data['content'] = 'project/edit_project';
        $this->data['projects'] = $this->Project_model->get_project_by_id($id);

        $this->load->view('app', $this->data);
    }

    public function update($project_id)
    {
        $project = $this->Project_model->get_project_by_id($project_id);
        $img_cover = $project->img_cover;

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_project('img_cover');
        }

        $update_project = $this->Project_model->update_project_by_id($project_id, [
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'img_cover' => $this->input->post('img_cover'),
			'img_cover' => $img_cover,
			'img_title_alt' => $this->input->post('img_title_alt'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_project) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/project/projects');
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $project = $this->Project_model->delete_project_by_id($id);

        // Set Response
        if ($project != false) {
            $status = 200;
            $response['success'] = 1;
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    private function do_upload_img_project($filename)
    {
        $config['upload_path'] = './storage/uploads/images/projects';
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
    //    MetaTag
    public function edit_content($contact_page_id)
    {
        $this->data['title'] = 'Page: Home - Content';
        $this->data['content'] = 'project_page/edit_project_page';
        $this->data['contact_page'] = $this->Project_page_model->get_project_pages_by_id($contact_page_id);

        $this->load->view('app', $this->data);
    }

    public function update_content($contact_page_id)
    {
        $project = $this->Project_page_model->get_project_pages_by_id($contact_page_id);

        $img_og_twitter = $project->img_og_twitter;

        if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
            $img_og_twitter = $this->do_upload_img_meta_project('img_og_twitter');
        }


        $update_project_page = $this->Project_page_model->update_project_pages_by_id($contact_page_id, [
            'meta_tag_title' => $this->input->post('meta_tag_title'),
            'meta_tag_description' => $this->input->post('meta_tag_description'),
            'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
            'img_og_twitter' => $img_og_twitter,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($update_project_page) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/project/content/1');
    }

    private function do_upload_img_meta_project($filename)
    {
        $config['upload_path'] = './storage/uploads/images/projects';
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
