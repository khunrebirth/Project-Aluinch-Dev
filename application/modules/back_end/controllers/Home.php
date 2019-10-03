<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller
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
        $this->load->model('Group_product_model');
        $this->load->model('Category_product_model');
        $this->load->model('Image_gallery_model');
        $this->load->model('Home_page_model');

        /*
        | -------------------------------------------------------------------------
        | HANDLE
        | -------------------------------------------------------------------------
        */

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index() {}

    public function gallery()
    {
        $this->data['title'] = 'Homes';
        $this->data['content'] = 'image_gallery/image_gallery';
        $this->data['image_galleries'] = $this->Image_gallery_model->get_image_gallery_all();

        $this->load->view('app', $this->data);
    }

    public function gallery_create()
    {
        $this->data['title'] = 'Homes';
        $this->data['content'] = 'image_gallery/add_image_gallery';

        $this->load->view('app', $this->data);

    }

    public function gallery_store()
    {
        $img_cover = '';

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_gallery('img_cover');
        }

        $add_image_gallery = $this->Image_gallery_model->insert_image_gallery([
            'title' => $img_cover,
            'img_title_alt' => $this->input->post('img_title_alt')
        ]);

        if ($add_image_gallery) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/home/gallery');
    }

    public function gallery_edit($image_gallery_id)
    {
        $this->data['title'] = 'Homes';
        $this->data['content'] = 'image_gallery/edit_image_gallery';
        $this->data['image_galleries'] = $this->Image_gallery_model->get_image_gallery_by_id($image_gallery_id);

        $this->load->view('app', $this->data);
    }

    public function gallery_update($image_gallery_id)
    {
        $image_gallery = $this->Image_gallery_model->get_image_gallery_by_id($image_gallery_id);

        $img_cover = $image_gallery->title;

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_gallery('img_cover');
        }

        $update_image_gallery = $this->Image_gallery_model->update_image_gallery_by_id($image_gallery_id, [
            'title' => $img_cover,
            'img_title_alt' => $this->input->post('img_title_alt'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

        if ($update_image_gallery) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/home/gallery');
    }

    public function gallery_destroy($image_gallery_id)
    {
        $status = 500;
        $response['success'] = 0;

        $product = $this->Image_gallery_model->delete_image_gallery_by_id($image_gallery_id);

        if ($product != false) {
            $status = 200;
            $response['success'] = 1;
        }

        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function edit_content($contact_page_id)
    {
        $this->data['title'] = 'Page: Home - Content';
        $this->data['content'] = 'home_page/edit_home_page';
        $this->data['contact_page'] = $this->Home_page_model->get_home_pages_by_id($contact_page_id);

        $this->load->view('app', $this->data);
    }

    public function update_content($contact_page_id)
    {
        $contact_page = $this->Home_page_model->get_home_pages_by_id($contact_page_id);

        $img_og_twitter = $contact_page->img_og_twitter;

        if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
            $img_og_twitter = $this->do_upload_img_meta_home('img_og_twitter');
        }

        $update_home_page = $this->Home_page_model->update_home_pages_by_id($contact_page_id, [
            'meta_tag_title' => $this->input->post('meta_tag_title'),
            'meta_tag_description' => $this->input->post('meta_tag_description'),
            'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
            'img_og_twitter' => $img_og_twitter,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($update_home_page) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/home/content/' . $contact_page_id);
    }

	private function do_upload_img_gallery($filename)
	{
		$config['upload_path'] = './storage/uploads/images/portfolios';
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

    private function do_upload_img_meta_home($filename)
    {
        $config['upload_path'] = './storage/uploads/images/homes';
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
