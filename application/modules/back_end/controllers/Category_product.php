<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_product extends MX_Controller
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

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Page: Product - Category';
        $this->data['content'] = 'category_product/category_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_all();
        $this->data['category_products'] = $this->Category_product_model->get_category_product_all();

        $this->load->view('app', $this->data);
    }

    public function create($group_product_id)
    {
        $group_product = $this->Group_product_model->get_group_product_by_id($group_product_id);

        $this->data['title'] = 'Page : Product - Category';
        $this->data['content'] = 'category_product/add_category_product';
        $this->data['group_products'] = $group_product;
        $this->data['group_product_id'] = $group_product->id;
        $this->data['group_product_title'] = $group_product->title;

        $this->load->view('app', $this->data);
    }

    public function store()
    {
        $img_cover = '';
        $img_cover_home = '';
        $img_og_twitter = '';
        $file_catalog = '';
		$file_price = '';
		$file_cad = '';

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_product('img_cover');
        }

        if (isset($_FILES['img_cover_home']) && $_FILES['img_cover_home']['name'] != '') {
            $img_cover_home = $this->do_upload_img_product('img_cover_home');
        }

        if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
            $img_og_twitter = $this->do_upload_img_product('img_og_twitter');
        }

		if (isset($_FILES['file_catalog']) && $_FILES['file_catalog']['name'] != '') {
			$file_catalog = $this->do_upload_pdf_product('file_catalog');
		}

		if (isset($_FILES['file_price']) && $_FILES['file_price']['name'] != '') {
			$file_price = $this->do_upload_pdf_product('file_price');
		}

		if (isset($_FILES['file_cad']) && $_FILES['file_cad']['name'] != '') {
			$file_cad = $this->do_upload_pdf_product('file_cad');
		}

        $add_category_product = $this->Category_product_model->insert_category_product([
			'meta_tag_title' => $this->input->post('meta_tag_title'),
			'meta_tag_description' => $this->input->post('meta_tag_description'),
			'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
            'img_og_twitter' => $img_og_twitter,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'group_product_id' => $this->input->post('group_product_id'),
			'img_cover' => $img_cover,
			'img_title_alt' => $this->input->post('img_title_alt'),
			'img_cover_home' => $img_cover_home,
			'img_home_title_alt' => $this->input->post('img_home_title_alt'),
			'file_catalog' => $file_catalog,
			'file_price' => $file_price,
			'file_cad' => $file_cad
		]);

        if ($add_category_product) {
            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/product/category/show/' . $this->input->post('group_product_id'));
    }

    public function show($group_product_id)
    {
        $group_product = $this->Group_product_model->get_group_product_by_id($group_product_id);

        $this->data['title'] = 'Product Category';
        $this->data['title'] = 'Product Category';
        $this->data['content'] = 'category_product/category_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_all();
        $this->data['category_products'] = $this->Category_product_model->get_category_product_and_count_all_by_group_product_id($group_product_id);
        $this->data['group_product_id'] = $group_product->id;
        $this->data['group_product_title'] = $group_product->title;

        $this->load->view('app', $this->data);
    }

    public function edit($category_product_id)
    {
		$category_product = $this->Category_product_model->get_category_product_by_id($category_product_id);
		$group_product = $this->Group_product_model->get_group_product_by_id($category_product->group_product_id);

        $this->data['title'] = 'Product Category';
        $this->data['content'] = 'category_product/edit_category_product';
        $this->data['category_product'] = $category_product;
        $this->data['group_products'] = $group_product;
        $this->data['group_product_id'] = $group_product->id;
        $this->data['group_product_title'] = $group_product->title;

        $this->load->view('app', $this->data);
    }

    public function update($category_product_id)
    {
        $category_product = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $img_cover = $category_product->img_cover;
        $img_cover_home = $category_product->img_cover_home;
        $img_og_twitter = $category_product->img_og_twitter;
		$file_catalog = $category_product->file_catalog;
		$file_price = $category_product->file_price;
		$file_cad = $category_product->file_cad;

        if (isset($_FILES['img_cover']) && $_FILES['img_cover']['name'] != '') {
            $img_cover = $this->do_upload_img_product('img_cover');
        }

        if (isset($_FILES['img_cover_home']) && $_FILES['img_cover_home']['name'] != '') {
            $img_cover_home = $this->do_upload_img_product('img_cover_home');
        }

        if (isset($_FILES['img_og_twitter']) && $_FILES['img_og_twitter']['name'] != '') {
            $img_og_twitter = $this->do_upload_img_product('img_og_twitter');
        }

		if (isset($_FILES['file_catalog']) && $_FILES['file_catalog']['name'] != '') {
			$file_catalog = $this->do_upload_pdf_product('file_catalog');
		}

		if (isset($_FILES['file_price']) && $_FILES['file_price']['name'] != '') {
			$file_price = $this->do_upload_pdf_product('file_price');
		}

		if (isset($_FILES['file_cad']) && $_FILES['file_cad']['name'] != '') {
			$file_cad = $this->do_upload_pdf_product('file_cad');
		}

        $update_category_product = $this->Category_product_model->update_category_product_by_id($category_product_id, [
			'meta_tag_title' => $this->input->post('meta_tag_title'),
			'meta_tag_description' => $this->input->post('meta_tag_description'),
			'meta_tag_keywords' => $this->input->post('meta_tag_keywords'),
            'img_og_twitter' => $img_og_twitter,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'group_product_id' => $this->input->post('group_product_id'),
			'img_cover' => $img_cover,
			'img_title_alt' => $this->input->post('img_title_alt'),
			'img_cover_home' => $img_cover_home,
			'img_home_title_alt' => $this->input->post('img_home_title_alt'),
			'file_catalog' => $file_catalog,
			'file_price' => $file_price,
			'file_cad' => $file_cad,
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_category_product) {
            $this->session->set_flashdata('success', 'Update Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/product/category/show/' . $this->input->post('group_product_id'));
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $category_product = $this->Category_product_model->delete_category_product_by_id($id);

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

    private function do_upload_img_product($filename)
    {
        $config['upload_path'] = './storage/uploads/images/products';
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

	public function do_upload_pdf_product($filename)
	{
		$config['upload_path'] = './storage/uploads/files/products';
		$config['allowed_types'] = 'pdf';
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
