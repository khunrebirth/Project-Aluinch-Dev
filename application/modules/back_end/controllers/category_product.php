<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_product extends MX_Controller
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
        $this->load->model('user_model');
        $this->load->model('group_product_model');
        $this->load->model('category_product_model');

        $this->data['user'] = $this->user_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Product Category';
        $this->data['content'] = 'category_product';
        $this->data['group_products'] = $this->group_product_model->get_group_product_all();
        $this->data['category_products'] = $this->category_product_model->get_category_product_all();

        $this->load->view('app', $this->data);
    }

    public function create() {
        $this->data['content'] = 'add_category_product';
        $this->data['group_products'] = $this->group_product_model->get_group_product_all();

        $this->load->view('app', $this->data);}


    public function store()
    {
        $this->input->post('');
        $this->input->post('');
    }

    public function show($id) {
        $this->data['title'] = 'Product Category';
        $this->data['content'] = 'category_product';
        $this->data['group_products'] = $this->group_product_model->get_group_product_all();
        $this->data['category_products'] = $this->category_product_model->get_category_product_by_group_product_id($id);
        $this->data['group_id'] = $id;
        $this->load->view('app', $this->data);
}

    public function edit($id)
    {
        $status = 500;
        $response['success'] = 0;

        $category_product = $this->category_product_model->get_category_product_by_id($id);

        // Set Response
        if ($category_product != false) {
            $status = 200;
            $response['data'] = $category_product;
            $response['success'] = 1;
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update($id)
    {
        $status = 500;
        $response['success'] = 0;
        $category_product = false;

        $category_product = $this->category_product_model->update_category_product_by_id($id, [
            'title' => $this->input->post('title'),
            'group_product_id' => $this->input->post('group_product_id'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Set Response
        if ($category_product != false) {
            $status = 200;
            $response['success'] = 1;
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $category_product = $this->category_product_model->delete_category_product_by_id($id);

        // Set Response
        if ($category_product != false) {
            $status = 200;
            $response['success'] = 1;
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
