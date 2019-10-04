<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller
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
        $this->load->model('Product_model');
		$this->load->model('Image_product_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Products';
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
        $add_product = $this->Product_model->insert_product([
			'title' => $this->input->post('title'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'detail' => $this->input->post('detail'),
			'group_product_id' => $this->input->post('group_product_id'),
			'category_product_id' => $this->input->post('category_product_id'),
		]);

        if ($add_product) {

			$product_id = $add_product;

        	$bundle_images = $this->upload_files_multi('img-product', $_FILES['img_multi']);

        	if ($bundle_images) {
        		foreach ($bundle_images as $image) {
					$this->Image_product_model->insert_image_product([
						'img' => $image,
						'product_id' => $product_id
					]);
				}
			}

            $this->session->set_flashdata('success', 'Add Done');
        } else {
            $this->session->set_flashdata('error', 'Something wrong');
        }

        redirect('backoffice/page/product/product/show/' . $this->input->post('group_product_id') . '/' . $this->input->post('category_product_id'));
    }

    public function show($group_product_id, $category_product_id)
    {
        $this->data['title'] = 'Products';
        $this->data['content'] = 'product/product';
        $this->data['products'] = $this->filter_data_product($this->Product_model->get_product_by_custom($group_product_id, $category_product_id));
        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
        $this->data['category_products'] = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $this->load->view('app', $this->data);
    }

    public function edit($product_id)
    {
		$products = $this->Product_model->get_product_by_id($product_id);
		$group_product_id = $products->group_product_id;
		$category_product_id = $products->category_product_id;

        $this->data['title'] = 'Products';
        $this->data['content'] = 'product/edit_product';
        $this->data['products'] = $products;
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
            'updated_at' => date('Y-m-d H:i:s')
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

    private function filter_data_product($products)
	{
		$data = [];

		foreach ($products as $key => $product) {
			$bundle = [];
			$bundle['id'] = $product->id;
			$bundle['title'] = $product->title;
			$bundle['description_en'] = $product->description_en;
			$bundle['description_th'] = $product->description_th;
			$bundle['created_at'] = $product->created_at;
			$bundle['group_product_name'] = $product->group_product_name;
			$bundle['category_product_name'] = $product->category_product_name;
			$bundle['count'] = (array)$this->Product_model->get_count_product_image($product->id);

			$data[] = $bundle;
		}

		return $data;
	}

	/***********************************
	 * Product Pictures
	 * ********************************/

	public function list_product_pictures($product_id)
	{
		// Set Data
		$this->data['title'] = '';
		$this->data['content'] = '';
		$this->data['product_pictures'] = $this->Image_product->get_image_product_by_product_id($product_id);

		$this->load->view('app', $this->data);
	}

	public function product_pictures_create()
	{
		// Set Data
		$this->data['title'] = '';
		$this->data['content'] = '';

		// TODO:: Multi Load

		$this->load->view('app', $this->data);
	}

	public function product_pictures_store()
	{
		// Handle Image
		$img_en = '';
		$img_th = '';

		if (isset($_FILES['img_en']) && $_FILES['img_en']['name'] != '') {
			$img_en = $this->do_upload_img_product('img_en');
		}

		if (isset($_FILES['img_th']) && $_FILES['img_th']['name'] != '') {
			$img_th = $this->do_upload_img_product('img_th');
		}

		// Filter Data
		$input_img = ['en' => $img_en, 'th' => $img_th];
		$input_img_title_alt = ['en' => $this->input->post('img_title_alt_en'), 'th' => $this->input->post('img_title_alt_th')];

		// Update Data
		$add_client = $this->Image_product->insert_product_picture([
			'img' => serialize($input_img),
			'img_title_alt' => serialize($input_img_title_alt)
		]);

		// Set Session To View
		if ($add_client) {
			$this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect($this->lang . '/backoffice/page/client/list-client-brands');
	}

	public function product_pictures_edit($product_picture_id)
	{
		$client_brand = $this->Image_product->get_client_brand_pictures_by_id($product_picture_id);

		// Set Data
		$this->data['title'] = 'Page: Client - List Client Brands - Edit Client Brands: ' . $client_brand->id;
		$this->data['content'] = 'client/list_client_brand_edit';
		$this->data['product_picture'] = $client_brand;

		$this->load->view('app', $this->data);
	}

	public function product_pictures_update($product_picture_id)
	{
		// Get Old data
		$client_brand = $this->Image_product->get_client_brand_pictures_by_id($product_picture_id);

		// Handle Image
		$img_en = unserialize($client_brand->img)['en'];
		$img_th = unserialize($client_brand->img)['th'];

		if (isset($_FILES['img_en']) && $_FILES['img_en']['name'] != '') {
			$img_en = $this->do_upload_img_product('img_en');
		}

		if (isset($_FILES['img_th']) && $_FILES['img_th']['name'] != '') {
			$img_th = $this->do_upload_img_product('img_th');
		}

		// Filter Data
		$input_img = ['en' => $img_en, 'th' => $img_th];
		$input_img_title_alt = ['en' => $this->input->post('img_title_alt_en'), 'th' => $this->input->post('img_title_alt_th')];

		// Update Data
		$update_client_brand = $this->Image_product->update_client_brand_pictures_by_id($product_picture_id, [
			'img' => serialize($input_img),
			'img_title_alt' => serialize($input_img_title_alt),
			'updated_at' => date('Y-m-d H:i:s')
		]);

		// Set Session To View
		if ($update_client_brand) {
			$this->session->set_flashdata('success', 'Update Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect($this->lang . '/backoffice/page/client/list-client-brands');
	}

	public function product_pictures_destroy($product_picture_id)
	{
		$status = 500;
		$response['success'] = 0;

		$delete_product_picture = $this->Image_product->delete_image_product_by_id($product_picture_id);

		if ($delete_product_picture != false) {
			$status = 200;
			$response['success'] = 1;
		}

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

	private function upload_files_multi($title, $files)
	{
		$config['upload_path'] = './storage/uploads/files/products';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['overwrite'] = 1;

		$this->load->library('upload', $config);

		$images = [];

		foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name']= $files['name'][$key];
			$_FILES['images[]']['type']= $files['type'][$key];
			$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
			$_FILES['images[]']['error']= $files['error'][$key];
			$_FILES['images[]']['size']= $files['size'][$key];

			$fileName = $title .'_'. $image;

			$images[] = $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('images[]')) {
				$this->upload->data();
			} else {
				return false;
			}
		}

		return $images;
	}
}
