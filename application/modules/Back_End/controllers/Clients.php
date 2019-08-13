<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MX_Controller {

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

    private $data = false;

    public function __construct()
    {
        parent::__construct();

        // Middleware
        require_login('backoffice/login');

        // Set Model
        $this->load->model('User_model');
        $this->load->model('Client_model');
        $this->load->model('Client_category_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

	public function index()
	{
        $this->data['title'] = 'Clients';
		$this->data['content'] = 'client';
        $this->data['client_categories'] = $this->Client_category_model->get_client_category_all();
        $this->data['clients'] = $this->Client_model->get_client_all();

		$this->load->view('app', $this->data);
	}

    public function create() {}

    public function store()
    {

        // TODO:: Validate

        $config['upload_path'] = './storage/images/clients';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'img-client' . '-' . time();

        $status = 500;
        $response['success'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());

            $client = $this->Client_model->insert_client(array(
//                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'image' => $data['upload_data']['file_name'],
                'created_at' => date('Y-m-d H:i:s')
            ));

            if ($client != false) {
                $status = 200;
                $response['success'] = 1;
            }
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function show() {}

    public function edit($id)
    {
        $status = 500;
        $response['success'] = 0;

        $client = $this->Client_model->get_client_by_id($id);

        if ($client != false) {
            $status = 200;
            $response['data'] = $client;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update($id)
    {

        // TODO:: Validate

        $config['upload_path'] = './storage/images/clients';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'img-client' . '-' . time();

        $status = 500;
        $response['success'] = 0;
        $client = false;

        $this->load->library('upload', $config);

        // Case: Don't have upload
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            $client = $this->Client_model->update_client_by_id($id, array(
//                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'updated_at' => date('Y-m-d H:i:s')
            ));
        }

        // Case: Have Upload
        else {
            $data = array('upload_data' => $this->upload->data());

            $client = $this->Client_model->update_client_by_id($id, array(
//                'title' => $this->input->post('title'),
                'category_id' => $this->input->post('category'),
                'image' => $data['upload_data']['file_name'],
                'updated_at' => date('Y-m-d H:i:s')
            ));
        }

        // Set Status
        if ($client != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $client = $this->Client_model->delete_client_by_id($id);

        if ($client != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function create_client_category() {}

    public function store_client_category()
    {

        // TODO:: Validate

        $status = 500;
        $response['success'] = 0;

        $client_category = $this->Client_category_model->insert_client_category(array(
            'title' => $this->input->post('title'),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($client_category != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function show_client_category() {}

    public function edit_client_category($id)
    {
        $status = 500;
        $response['success'] = 0;

        $client_category = $this->Client_category_model->get_client_category_by_id($id);

        if ($client_category != false) {
            $status = 200;
            $response['data'] = $client_category;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update_client_category($id)
    {

        // TODO:: Validate

        $status = 500;
        $response['success'] = 0;

        $client_category = $this->Client_category_model->update_client_category_by_id($id, array(
            'title' => $this->input->post('title'),
            'updated_at' => date('Y-m-d H:i:s')
        ));

        // Set Status
        if ($client_category != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy_client_category($id)
    {
        $status = 500;
        $response['success'] = 0;

        $client_category = $this->Client_category_model->delete_client_category_by_id($id);

        if ($client_category != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
