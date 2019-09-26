<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller
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
        $this->load->model('Category_product_model');
        $this->load->model('Product_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Manage Item: products';
        $this->data['content'] = 'product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_all();
        $this->data['category_products'] = $this->Category_product_model->get_category_product_all();
        $this->data['products'] = $this->Product_model->get_product_all();

        $this->load->view('app', $this->data);
    }

    public function create($group_product_id, $category_product_id)
    {
        $this->data['title'] = 'Manage Item: products';
        $this->data['content'] = 'product/add_product';

        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
        $this->data['category_products'] = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $this->load->view('app', $this->data);
    }

    public function store()
    {

        /*     $img_cover = '';
             $img_cover_home = '';

             if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
                 $img_cover = $this->do_upload_img_product('img_cover');
             }

             if (isset($_FILES['img_cover_home']) && $_FILES['img_cover_home']['name'] != '') {
                 $img_cover_home = $this->do_upload_img_product('img_cover_home');
             }
     */
        $data = [
            'title' => $this->input->post('title'),
            'description_th' => $this->input->post('description_th'),
            'description_en' => $this->input->post('description_en'),
            'detail' => $this->input->post('detail'),
            'group_product_id' => $this->input->post('group_product_id'),
            'category_product_id' => $this->input->post('category_product_id'),
//            'img_cover' => '',
//            'img_title_alt' => $this->input->post('img_title_alt'),
//            'img_cover_home' => '',
//            'img_home_title_alt' => $this->input->post('img_home_title_alt')
        ];

        $add_product = $this->Product_model->insert_product($data);

        if ($add_product) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/product/product/show/' . $this->input->post('group_product_id') . '/' . $this->input->post('category_product_id'));
    }

    public function show($group_product_id, $category_product_id)
    {
        $this->data['title'] = 'Manage Item: products';
        $this->data['content'] = 'product/product';
        $this->data['products'] = $this->Product_model->get_product_by_custom($group_product_id, $category_product_id);
        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
        $this->data['category_products'] = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $this->load->view('app', $this->data);
    }

    public function edit($product_id)
    {
        $this->data['title'] = 'Manage Item: products';
        $this->data['content'] = 'product/edit_product';

        $products = $this->Product_model->get_product_by_id($product_id);
        $this->data['products'] = $products;

        $group_product_id = $products->group_product_id;
        $category_product_id = $products->category_product_id;


        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
        $this->data['category_products'] = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $this->load->view('app', $this->data);

    }

    public function update($product_id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'description_th' => $this->input->post('description_th'),
            'description_en' => $this->input->post('description_en'),
            'detail' => $this->input->post('detail'),
            'group_product_id' => $this->input->post('group_product_id'),
            'category_product_id' => $this->input->post('category_product_id'),
        ];

        $update_product = $this->Product_model->update_product_by_id($product_id, $data);

        if ($update_product) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/product/product/show/' . $this->input->post('group_product_id') . '/' . $this->input->post('category_product_id'));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $product = $this->Product_model->delete_product_by_id($id);

        if ($product != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
