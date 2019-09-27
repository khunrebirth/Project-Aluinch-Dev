<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MX_Controller
{

    private $data = false;

    public function __construct()
    {
        parent::__construct();

        // Middleware
        require_login('backoffice/login');

        // Set Model
        $this->load->model('User_model');
        $this->load->model('Project_model');

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

        $data = ['title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'img_cover' => $this->input->post('img_cover'),
            'img_cover' => $img_cover,
            'img_title_alt' => $this->input->post('img_title_alt'),
        ];
        $add_project = $this->Project_model->insert_project($data);

        if ($add_project) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/project/projects');
    }

    public function show()
    {
    }

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

        $data = ['title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'img_cover' => $this->input->post('img_cover'),
            'img_cover' => $img_cover,
            'img_title_alt' => $this->input->post('img_title_alt'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $add_project = $this->Project_model->update_project_by_id($project_id, $data);

        if ($add_project) {
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
}
