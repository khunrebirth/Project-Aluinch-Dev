<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_technology extends MX_Controller
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
        $this->load->model('Category_technology_model');
        $this->load->model('Technology_video_model');

        /*
        | -------------------------------------------------------------------------
        | HANDLE
        | -------------------------------------------------------------------------
        */

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Page: Technology';
        $this->data['content'] = 'category_technology/category_technology';

        $this->data['technologies'] = $this->filter_data_category_technology(
            $this->Category_technology_model->get_category_technology_all()
        );

        $this->load->view('app', $this->data);
    }

    public function show() {}

    public function edit($category_technologies)
    {
    	$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        if ($category_technologies == $CASE_FAQ) {
            $this->data['content'] = 'category_technology/edit_category_faq_technology';
        } else {
            $this->data['content'] = 'category_technology/edit_category_technology';
        }

        $this->data['title'] = 'Page: Technology - Edit';
        $this->data['technologies'] = $this->Category_technology_model->get_category_technology_by_id($category_technologies);

        $this->load->view('app', $this->data);
    }

    public function update($category_technologies)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        if ($category_technologies == $CASE_FAQ) {

            $category_technology = $this->Category_technology_model->get_category_technology_by_id($category_technologies);
            $img_og_twitter = $category_technology->img_og_twitter;

            if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
                $img_og_twitter = $this->do_upload_img_category_technology('img_og_twitter');
            }

            $data = [
                'meta_tag_title' => $this->input->post('meta_tag_title'),
                'meta_tag_description' => $this->input->post('meta_tag_description'),
                'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
                'img_og_twitter' => $img_og_twitter,
                'title' => $this->input->post('title'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

        } else {
            $data = [
                'title' => $this->input->post('title'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $update_category_technology = $this->Category_technology_model->update_category_technology_by_id($category_technologies, $data);

        if ($update_category_technology) {
            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Category Technology',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

            $this->session->set_flashdata('success', 'Edit Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/technology/category');
    }

    private function filter_data_category_technology($category_technologies)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        $data = [];

        foreach ($category_technologies as $category_technology) {
            $temp_data = [];
            $temp_data['id'] = $category_technology->id;
            $temp_data['title'] = $category_technology->title;
            $temp_data['created_at'] = $category_technology->created_at;
            $temp_data['counter'] = 0;

            // Case: Video
            if ($category_technology->id == $CASE_VIDEO_TYPE_FIRST || $category_technology->id == $CASE_VIDEO_TYPE_SECOUND) {
                $temp_data['counter'] = $this->Category_technology_model->get_category_technology_count_type_video($category_technology->id)->counter;
            } // Case: Faq
            else if ($category_technology->id == $CASE_FAQ) {
                $temp_data['counter'] = $this->Category_technology_model->get_category_technology_count_type_faq($category_technology->id)->counter;
            }

            $data[] = $temp_data;
        }

        return $data;
    }

    private function do_upload_img_category_technology($filename)
    {
        $config['upload_path'] = './storage/uploads/images/technologies';
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
