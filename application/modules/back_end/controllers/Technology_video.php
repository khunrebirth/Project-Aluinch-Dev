<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology_video extends MX_Controller
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

        $this->load->model('User_model');
        $this->load->model('Technology_video_model');
        $this->load->model('Category_technology_model');
        $this->load->model('Faq_technology_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index() {}

    public function show($category_technology_id)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

		$this->data['title'] = 'Page: Technology';

        if ($category_technology_id == $CASE_FAQ) {
            $this->data['content'] = 'faq_technology/faq_technology';
        } else {
            $this->data['content'] = 'technology_video/technology_video';
        }

        $this->data['technology_videos'] = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);
        $this->data['feq_technologies'] = $this->Faq_technology_model->get_faq_technology_by_category_technology_id($category_technology_id);

        $this->load->view('app', $this->data);
    }

    public function create($category_technology_id)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        $this->data['title'] = 'Page: Technology - Add';

        if ($category_technology_id == $CASE_FAQ) {
            $this->data['content'] = 'faq_technology/add_faq_technology';
        } else {
            $this->data['content'] = 'technology_video/add_technology_video';
        }

        $this->data['technology_videos'] = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);

        $this->load->view('app', $this->data);
    }

    public function store()
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

		$img_og_twitter = '';

		if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
			$img_og_twitter = $this->do_upload_img_technology('img_og_twitter');
		}

        if ($this->input->post('category_technology_id') == $CASE_FAQ) {
            $add_technology = $this->Faq_technology_model->insert_category_product([
				'ask' => $this->input->post('ask'),
				'ans' => $this->input->post('ans'),
				'category_technology_id' => $this->input->post('category_technology_id')
			]);
        } else {
            $add_technology = $this->Technology_video_model->insert_category_product([
				'meta_tag_title' => $this->input->post('meta_tag_title'),
				'meta_tag_description' => $this->input->post('meta_tag_description'),
				'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
				'img_og_twitter' => $img_og_twitter,
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'description' => $this->input->post('description'),
				'src' => $this->input->post('src'),
				'short_src' => $this->input->post('short_src'),
				'img_cover' => $this->input->post('img_cover'),
				'img_title_alt' => $this->input->post('img_title_alt'),
				'category_technology_id' => $this->input->post('category_technology_id')
			]);
        }

        if ($add_technology) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Technology ',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/technology/technology_videos/show/' . $this->input->post('category_technology_id'));
    }

    public function edit($category_technology_id, $technology_id)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        $this->data['title'] = 'Page: Technology - Edit';

        if ($category_technology_id == $CASE_FAQ) {
            $this->data['content'] = 'faq_technology/edit_faq_technology';
            $technology = $this->Faq_technology_model->get_faq_technology_by_id($technology_id);
        } else {
            $this->data['content'] = 'technology_video/edit_technology_video';
            $technology = $this->Technology_video_model->get_technology_video_by_id($technology_id);
        }

        $this->data['category_technology'] = $this->Category_technology_model->get_category_technology_by_id($technology->category_technology_id);
        $this->data['technology_videos'] = $technology;
        $this->data['faq_technology'] = $technology;

        $this->load->view('app', $this->data);
    }

    public function update($technology_id)
    {
		$CASE_VIDEO_TYPE_FIRST = 1;
		$CASE_VIDEO_TYPE_SECOUND = 2;
		$CASE_FAQ = 3;

        if ($this->input->post('category_technology_id') == $CASE_FAQ) {
            $update_technology = $this->Faq_technology_model->update_faq_technology_by_id($technology_id, [
				'ask' => $this->input->post('ask'),
				'ans' => $this->input->post('ans'),
				'category_technology_id' => $this->input->post('category_technology_id')
			]);

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Question ',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

        } else {
            $technology_video = $this->Technology_video_model->get_technology_video_by_id($technology_id);
            $img_og_twitter = $technology_video->img_og_twitter;

            if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
                $img_og_twitter = $this->do_upload_img_technology('img_og_twitter');
            }

            $update_technology = $this->Technology_video_model->update_technology_video_by_id($technology_id, [
				'meta_tag_title' => $this->input->post('meta_tag_title'),
				'meta_tag_description' => $this->input->post('meta_tag_description'),
				'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
				'img_og_twitter' => $img_og_twitter,
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'description' => $this->input->post('description'),
				'src' => $this->input->post('src'),
				'short_src' => $this->input->post('short_src'),
				'img_cover' => $this->input->post('img_cover'),
				'img_title_alt' => $this->input->post('img_title_alt'),
				'category_technology_id' => $this->input->post('category_technology_id'),
				'updated_at' => date('Y-m-d H:i:s')
			]);

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Technology ',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

        }

        if ($update_technology) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/technology/technology_videos/show/' . $this->input->post('category_technology_id'));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $technology = $this->Technology_video_model->delete_technology_video_by_id($id);

        if ($technology != false) {
            $status = 200;
            $response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Technology ',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);

        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function destroy_question($id)
    {
        $status = 500;
        $response['success'] = 0;

        $faq_technology = $this->Faq_technology_model->delete_faq_technology_by_id($id);

        if ($faq_technology != false) {
            $status = 200;
            $response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Question Technology ',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);


        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    private function do_upload_img_technology($filename)
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
