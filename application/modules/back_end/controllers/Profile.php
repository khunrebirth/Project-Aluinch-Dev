<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller
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
		$this->load->model('Image_project_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
	}

	public function index() {}

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
}
