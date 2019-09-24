<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_product extends MX_Controller
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
        $this->load->model('User_model');
        $this->load->model('Group_product_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Product Group';
        $this->data['content'] = 'group_product/group_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_all();

        $this->load->view('app', $this->data);
    }

    public function create()
    {
        $this->data['content'] = 'group_product/add_group_product';

        $this->load->view('app', $this->data);
    }

    public function store()
    {
        $data = array('title' => $this->input->post('title'));
        $this->Group_product_model->insert_group_product($data);
        redirect(base_url('backoffice/page/product/group'));
    }

    public function show()
    {

    }

    public function edit($id)
    {
        $this->data['content'] = 'group_product/edit_group_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($id);
        $this->load->view('app', $this->data);

    }

    public function update($id)
    {
        $data = array('title' => $this->input->post('newtitle'));
        $this->Group_product_model->update_group_product_by_id($id,$data);
        redirect(base_url('backoffice/page/product/group'));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $group_product = $this->Group_product_model->delete_group_product_by_id($id);

        // Set Response
        if ($group_product != false) {
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
