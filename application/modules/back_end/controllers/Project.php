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
		$this->load->model('Image_project_model');

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

			$project_id = $add_project;

			$bundle_images = $this->upload_images_multi('img-project', $_FILES['img_multi']);

			if ($bundle_images) {
				foreach ($bundle_images as $image) {
					$this->Image_project_model->insert_Image_project([
						'title' => $image,
						'project_id' => $project_id
					]);
				}
			}

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Project',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

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

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Project',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

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

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Project',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);

		}

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/***********************************
	 * Project Pictures
	 * ********************************/

	public function list_project_pictures($project_id)
	{
		$this->data['title'] = 'List of Image Project';
		$this->data['content'] = 'image_project/image_project';
		$this->data['project_pictures'] = $this->Image_project_model->get_image_project_by_project_id($project_id);
		$this->data['project'] = $this->Project_model->get_project_by_id($project_id);

		$this->load->view('app', $this->data);
	}

	public function project_pictures_create($project_id)
	{
		$this->data['title'] = 'Image Project - Add';
		$this->data['content'] = 'image_project/add_image_project';
		$this->data['project'] = $this->Project_model->get_project_by_id($project_id);

		$this->load->view('app', $this->data);
	}

	public function project_pictures_store($project_id)
	{

		$bundle_images = $this->upload_images_multi('img-project', $_FILES['img_multi']);

		if ($bundle_images) {
			foreach ($bundle_images as $image) {
				$this->Image_project_model->insert_image_project([
					'title' => $image,
					'project_id' => $project_id
				]);
			}
		}

		// Set Session To View
		if ($bundle_images) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Image Project',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/page/project/list-project-pictures/' . $project_id);
	}

	public function project_pictures_edit($project_id, $image_project_id)
	{
		$this->data['title'] = 'Edit Image Project';
		$this->data['content'] = 'image_project/edit_image_project';
		$this->data['project'] = $this->Project_model->get_project_by_id($project_id);
		$this->data['image_project'] = $this->Image_project_model->get_image_project_by_id($image_project_id);

		$this->load->view('app', $this->data);
	}

	public function project_pictures_update($project_id, $image_project_id)
	{
		// Get Old data
		$image_project = $this->Image_project_model->get_image_project_by_id($image_project_id);

		// Handle Image
		$img = $image_project->img;

		if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
			$img = $this->do_upload_img_project('img');
		}

		// Update Data
		$update_image_project = $this->Image_project_model->update_image_project_by_id($image_project_id, [
			'title' => $img,
			'updated_at' => date('Y-m-d H:i:s')
		]);

		// Set Session To View
		if ($update_image_project) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Image Project',
                'event' => 'edit',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Update Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/page/project/list-project-pictures/' . $project_id);
	}

	public function project_pictures_destroy($image_project_id)
	{
		$status = 500;
		$response['success'] = 0;

		$delete_product_picture = $this->Image_project_model->delete_image_project_by_id($image_project_id);

		if ($delete_product_picture != false) {
			$status = 200;
			$response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Image Project',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);

		}

		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/***********************************
	 * Content
	 * ********************************/

	public function edit_content($contact_page_id)
	{
		$this->data['title'] = 'Page: Project - Content';
		$this->data['content'] = 'project_page/edit_project_page';
		$this->data['contact_page'] = $this->Project_page_model->get_project_pages_by_id($contact_page_id);

		$this->load->view('app', $this->data);
	}

	public function update_content($contact_page_id)
	{
		$project = $this->Project_page_model->get_project_pages_by_id($contact_page_id);

		$img_og_twitter = $project->img_og_twitter;

		if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
			$img_og_twitter = $this->do_upload_img_project('img_og_twitter');
		}

		$update_project_page = $this->Project_page_model->update_project_pages_by_id($contact_page_id, [
			'meta_tag_title' => $this->input->post('meta_tag_title'),
			'meta_tag_description' => $this->input->post('meta_tag_description'),
			'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
			'img_og_twitter' => $img_og_twitter,
			'updated_at' => date('Y-m-d H:i:s')
		]);

		if ($update_project_page) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Content Project Page',
                'event' => 'sort_item',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Update Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/page/project/content/1');
	}

	/***********************************
	 * Sorting (Using Ajax)
	 * ********************************/

	public function ajax_get_project_and_sort_show($project_id)
	{
		$status = 500;
		$response['success'] = 0;

		$image_projects = $this->Image_project_model->get_image_project_and_sort_by_project_id($project_id);

		// Set Response
		if ($image_projects != false) {
			$status = 200;
			$response['success'] = 1;

			$counter = 1;
			$html = '<ul id="sortable">';
			foreach ($image_projects as $image_project) {
				$html .= '<li id="' . $image_project->id . '" data-sort="' . $image_project->sort . '"><span style="padding: 0px 10px;">' . $counter . ' . </span><img width="120px;" src="' . base_url('storage/uploads/images/projects/' . $image_project->title) . '"</li>';
				$counter++;
			}
			$html .= '</ul>';

			$response['data'] = $html;
		}

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function ajax_get_project_and_sort_update($project_id)
	{
		$status = 500;
		$response['success'] = 0;

		// Set Response
		if ($this->input->post()) {
			$bundle_id = $this->input->post('id');
			$bundle_sort = $this->input->post('sort');
			$counter = 1;
			foreach (array_combine($bundle_id, $bundle_sort) as $id => $sort) {
				$this->Image_project_model->update_image_project_by_id($id, [
					'sort' => $counter
				]);
				$counter++;
			}

			$status = 200;
			$response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'จัดเรียง Image Project',
                'event' => 'sort_item',
                'ip' => $this->input->ip_address(),
            ]);
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

	private function upload_images_multi($title, $files)
	{
		$config['upload_path'] = './storage/uploads/images/projects';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['overwrite'] = 1;

		$this->load->library('upload', $config);

		$images = [];

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name'] = $files['name'][$key];
			$_FILES['images[]']['type'] = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error'] = $files['error'][$key];
			$_FILES['images[]']['size'] = $files['size'][$key];

			$fileName = $title . '_' . $image;

			$images[] = $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				return false;
			}
		}

		return $images;
	}
}
