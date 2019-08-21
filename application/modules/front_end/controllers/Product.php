<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /home.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
        // Set Model
        $this->load->model('group_product_model');
        $this->load->model('category_product_model');
        $this->load->model('product_model');

        // Set Data
        $data['title'] = 'Product Category';
        $data['content'] = 'product';
        $data['list_products'] = $this->filter_data_products($this->group_product_model->get_group_product_all());
        $data['list_products_specific'] = $this->filter_data_products_specific(1, 1);

		$this->load->view('app', $data);
	}

    public function show($group_product_slug, $category_product_slug, $category_product_id)
    {
        // Set Model
        $this->load->model('group_product_model');
        $this->load->model('category_product_model');
        $this->load->model('product_model');

        // Process
        $category_product = $this->category_product_model->get_category_product_by_id($category_product_id);

        // Set Data
        $data['content'] = 'product';
        $data['list_products'] = $this->filter_data_products($this->group_product_model->get_group_product_all());
        $data['list_products_specific'] = $this->filter_data_products_specific($category_product->group_product_id, $category_product->id);

        $this->load->view('app', $data);
    }

    public function ajax_get_product_by_id($id) {}

    private function filter_data_products($group_products)
    {
        $data = [];

        foreach ($group_products as $key_group_product => $group_product) {

            $category_products = $this->category_product_model->get_category_product_by_group_product_id($group_product->id);

            $data[$key_group_product]['group_product_name'] = $group_product->title;
            $data[$key_group_product]['group_product_slug'] = $group_product->slug;
            $data[$key_group_product]['category_products'] = [];

            if (count($category_products) > 0) {

                foreach ($category_products as $key_category_product => $category_product) {

                    $data[$key_group_product]['category_products'][$key_category_product]['category_product_id'] = $category_product->id;
                    $data[$key_group_product]['category_products'][$key_category_product]['category_product_name'] = $category_product->title;
                    $data[$key_group_product]['category_products'][$key_category_product]['category_product_slug'] = $category_product->slug;
                    $data[$key_group_product]['category_products'][$key_category_product]['category_product_desc'] = $category_product->desc;
                    $data[$key_group_product]['category_products'][$key_category_product]['products'] = [];

                    $products = $this->product_model->get_product_by_custom($group_product->id, $category_product->id);

                    if (count($products) > 0) {
                        foreach ($products as $key_product => $product) {
                            $data[$key_group_product]['category_products'][$key_category_product]['products'][$key_product][] = $product;
                        }
                    }
                }
            }
        }

        return $data;
    }

    private function filter_data_products_specific($group_product_id, $category_product_id)
    {
        $data = [];

        $group_product = $this->group_product_model->get_group_product_by_id($group_product_id);
        $category_product = $this->category_product_model->get_category_product_by_id($category_product_id);
        $products = $this->product_model->get_product_by_custom($group_product_id, $category_product_id);

        $data['group_product_name'] = $group_product->title;
        $data['category_product_name'] = $category_product->title;
        $data['category_product_desc'] = $category_product->desc;
        $data['category_product_image_cover'] = $category_product->image_cover;
        $data['products'] = [];

        if (count($products) > 0) {
            foreach ($products as $key_product => $product) {
                $data['products'][$key_product] = $product;
            }
        }

        return $data;
    }
}
