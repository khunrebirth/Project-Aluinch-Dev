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

    public function index() {}

    public function create($group_product_id, $category_product_id)
    {
        $this->data['title'] = 'Page: Products - Add';
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

        	$bundle_images = $this->upload_images_multi('img-product', $_FILES['img_multi']);

        	if ($bundle_images) {
        		foreach ($bundle_images as $image) {
					$this->Image_product_model->insert_image_product([
						'img' => $image,
						'product_id' => $product_id
					]);
				}
			}

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Product',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

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

        $this->data['title'] = 'Page: Products - Edit';
        $this->data['content'] = 'product/edit_product';
        $this->data['products'] = $products;
        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
        $this->data['category_products'] = $this->Category_product_model->get_category_product_by_id($category_product_id);

        $this->load->view('app', $this->data);
    }

    public function update($product_id)
    {
        $update_product = $this->Product_model->update_product_by_id($product_id, [
			'title' => $this->input->post('title'),
			'description_th' => $this->input->post('description_th'),
			'description_en' => $this->input->post('description_en'),
			'detail' => $this->input->post('detail'),
			'group_product_id' => $this->input->post('group_product_id'),
			'category_product_id' => $this->input->post('category_product_id'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_product) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Product',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

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

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Product',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);
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

	public function list_product_pictures($group_product_id, $category_product_id, $product_id)
	{
		$this->data['title'] = 'Page: Products - Image Product';
		$this->data['content'] = 'image_product/image_product';
		$this->data['product_pictures'] = $this->Image_product_model->get_image_product_by_product_id($product_id);
		$this->data['group_product'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
		$this->data['category_product'] = $this->Category_product_model->get_category_product_by_id($category_product_id);
		$this->data['product'] = $this->Product_model->get_product_by_id($product_id);

		$this->load->view('app', $this->data);
	}

	public function product_pictures_create($group_product_id, $category_product_id, $product_id)
	{
		$this->data['title'] = 'Page: Products - Image Product - Add';
		$this->data['content'] = 'image_product/add_image_product';
		$this->data['group_product'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
		$this->data['category_product'] = $this->Category_product_model->get_category_product_by_id($category_product_id);
		$this->data['product'] = $this->Product_model->get_product_by_id($product_id);

		$this->load->view('app', $this->data);
	}

	public function product_pictures_store($group_product_id, $category_product_id, $product_id)
	{

		$bundle_images = $this->upload_images_multi('img-product', $_FILES['img_multi']);

		if ($bundle_images) {
			foreach ($bundle_images as $image) {
				$this->Image_product_model->insert_image_product([
					'img' => $image,
					'product_id' => $product_id
				]);
			}
		}

		// Set Session To View
		if ($bundle_images) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Image Product',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);


            $this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/page/product/list-product-pictures/' .  $group_product_id . '/' . $category_product_id . '/' . $product_id);
	}

	public function product_pictures_edit($group_product_id, $category_product_id, $product_id, $image_product_id)
	{
		$this->data['title'] = 'Page: Products - Image product - Edit';
		$this->data['content'] = 'image_product/edit_image_product';
		$this->data['image_product'] = $this->Image_product_model->get_image_product_by_id($image_product_id);
		$this->data['group_product'] = $this->Group_product_model->get_group_product_by_id($group_product_id);
		$this->data['category_product'] = $this->Category_product_model->get_category_product_by_id($category_product_id);
		$this->data['product'] = $this->Product_model->get_product_by_id($product_id);

		$this->load->view('app', $this->data);
	}

	public function product_pictures_update($group_product_id, $category_product_id, $product_id, $image_product_id)
	{
		// Get Old data
		$image_product = $this->Image_product_model->get_image_product_by_id($image_product_id);

		// Handle Image
		$img = $image_product->img;

		if (isset($_FILES['img']) && $_FILES['img']['name'] != '') {
			$img = $this->do_upload_img_product('img');
		}

		// Update Data
		$update_image_product = $this->Image_product_model->update_image_product_by_id($image_product_id, [
			'img' => $img,
			'updated_at' => date('Y-m-d H:i:s')
		]);

		// Set Session To View
		if ($update_image_product) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Image Product',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);


            $this->session->set_flashdata('success', 'Update Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

		redirect('backoffice/page/product/list-product-pictures/' .  $group_product_id . '/' . $category_product_id . '/' . $product_id);
	}

	public function product_pictures_destroy($image_product_id)
	{
		$status = 500;
		$response['success'] = 0;

		$delete_product_picture = $this->Image_product_model->delete_image_product_by_id($image_product_id);

		if ($delete_product_picture != false) {
			$status = 200;
			$response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Image Product',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);
		}

		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	/***********************************
	 * Sorting (Using Ajax)
	 * ********************************/

	public function ajax_get_product_and_sort_show($product_id)
	{
		$status = 500;
		$response['success'] = 0;

		$image_products = $this->Image_product_model->get_image_product_and_sort_by_product_id($product_id);

		// Set Response
		if ($image_products != false) {
			$status = 200;
			$response['success'] = 1;

			$counter = 1;
			$html = '<ul id="sortable">';
			foreach ($image_products as $image_product) {
				$html .= '<li id="' . $image_product->id . '" data-sort="' . $image_product->sort . '"><span style="padding: 0px 10px;">' . $counter . ' . </span><img width="120px;" src="' . base_url('storage/uploads/images/products/' . $image_product->img) . '"</li>';
				$counter++;
			}
			$html .= '</ul>';

			$response['data'] = $html;
		}

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function ajax_get_product_and_sort_update($product_id)
	{
		$status = 500;
		$response['success'] = 0;

		// Set Response
		if ($this->input->post()) {
			$bundle_id = $this->input->post('id');
			$bundle_sort = $this->input->post('sort');
			$counter = 1;
			foreach (array_combine($bundle_id, $bundle_sort) as $id => $sort) {
				$this->Image_product_model->update_image_product_by_id($id, [
					'sort' => $counter
				]);
				$counter++;
			}

			$status = 200;
			$response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'จัดเรียง Image Product',
                'event' => 'sort_item',
                'ip' => $this->input->ip_address(),
            ]);
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

	private function upload_images_multi($title, $files)
	{
		$config['upload_path'] = './storage/uploads/images/products';
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
