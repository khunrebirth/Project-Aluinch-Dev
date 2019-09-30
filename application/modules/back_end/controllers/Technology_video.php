<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology_video extends MX_Controller
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
        $this->load->model('Technology_video_model');
        $this->load->model('Category_technology_model');

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {

    }

    public function show($category_technology_id)
    {
        $this->data['title'] = 'Technology';
        $this->data['content'] = 'technology_video/technology_video';
        $this->data['technology_videos'] = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);

        $this->load->view('app', $this->data);
    }

    public function create($category_technology_id)
    {
        $this->data['title'] = 'Technology';
        $this->data['content'] = 'technology_video/add_technology_video';

        $this->data['technology_videos'] = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);

        $this->load->view('app', $this->data);
    }

    public function store()
    {

        $data = [
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'description' => $this->input->post('description'),
            'src' => $this->input->post('src'),
            'short_src' => $this->input->post('short_src'),
            'img_cover' => $this->input->post('img_cover'),
            'img_title_alt' => $this->input->post('img_title_alt'),
            'category_technology_id' => $this->input->post('category_technology_id')

        ];

        $add_technology = $this->Technology_video_model->insert_category_product($data);

        if ($add_technology) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/technology/technology_videos/show/' . $this->input->post('category_technology_id') );
    }


    public function edit($technologies_id)
    {
        $this->data['title'] = 'Technology';
        $this->data['content'] = 'technology_video/edit_technology_video';


        $technology_videos = $this->Technology_video_model->get_technology_video_by_id($technologies_id);

        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($technology_videos->category_technology_id);
        $this->data['technology_videos'] = $technology_videos;

        $this->load->view('app', $this->data);

    }

    public function update($product_id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'body' => $this->input->post('body'),
            'description' => $this->input->post('description'),
            'src' => $this->input->post('src'),
            'short_src' => $this->input->post('short_src'),
            'img_cover' => $this->input->post('img_cover'),
            'img_title_alt' => $this->input->post('img_title_alt'),
            'category_technology_id' => $this->input->post('category_technology_id'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $edit_technology = $this->Technology_video_model->update_technology_video_by_id($product_id, $data);

        if ($edit_technology) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/technology/technology_videos/show/' . $this->input->post('category_technology_id') );
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $product = $this->Technology_video_model->delete_technology_video_by_id($id);

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
