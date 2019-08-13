<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services2 extends MX_Controller {

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
        $this->load->model('Service2_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

	public function index()
	{
        $this->data['title'] = 'Services2';
		$this->data['content'] = 'service2';
        $this->data['services2'] = $this->Service2_model->get_service2_all();

		$this->load->view('app', $this->data);
	}

    public function create() {}

    public function store()
    {

        // TODO:: Validate

        $config['upload_path'] = './storage/images/services';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'icon-' . $this->input->post('title') . '-' . time();

        $status = 500;
        $response['success'] = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());

            $service2 = $this->Service2_model->insert_service2(array(
                'title' => $this->input->post('title'),
                'image' => $data['upload_data']['file_name'],
                'created_at' => date('Y-m-d H:i:s')
            ));

            if ($service2 != false) {
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

        $service2 = $this->Service2_model->get_service2_by_id($id);

        if ($service2 != false) {
            $status = 200;
            $response['data'] = $service2;
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

        $config['upload_path'] = './storage/images/services';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'icon-' . $this->input->post('title') . '-' . time();

        $status = 500;
        $response['success'] = 0;
        $service2 = false;

        $this->load->library('upload', $config);

        // Case: Don't have upload
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            $service2 = $this->Service2_model->update_service2_by_id($id, array(
                'title' => $this->input->post('title'),
                'updated_at' => date('Y-m-d H:i:s')
            ));

            if ($service2 != false) {
                $status = 200;
                $response['success'] = 1;
            }
        }

        // Case: Have Upload
        else {
            $data = array('upload_data' => $this->upload->data());

            $service2 = $this->Service2_model->update_service2_by_id($id, array(
                'title' => $this->input->post('title'),
                'image' => $data['upload_data']['file_name'],
                'updated_at' => date('Y-m-d H:i:s')
            ));
        }

        if ($service2 != false) {
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

        $service2 = $this->Service_model->delete_service2_by_id($id);

        if ($service2 != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
