<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();

		/*
		| -------------------------------------------------------------------------
		| SET UTILITIES
		| -------------------------------------------------------------------------
		*/

		// Model
		$this->load->model('Group_product_model');
		$this->load->model('Category_product_model');
		$this->load->model('Product_model');
		$this->load->model('Contact_page_model');
	}

	public function index()
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$id = 1;
		$page_content = '';

		/*
		| -------------------------------------------------------------------------
		| SET DATA
		| -------------------------------------------------------------------------
		*/

		// Title Page
		$data['title'] = $page_content->meta_tag_title;

		// Meta Tag
		$data['meta']['title'] = $page_content->meta_tag_title;
		$data['meta']['description'] = $page_content->meta_tag_description;
		$data['meta']['keyword'] = $page_content->meta_tag_keywords;

		// OG & Twitter
		$data['og_twitter']['title'] = $page_content->meta_tag_title;
		$data['og_twitter']['description'] = $page_content->meta_tag_description;
		// $data['og_twitter']['image'] = base_url('storage/uploads/images/contacts/'. $page_content->img_og_twitter);
		$data['og_twitter']['image'] = '';

		// Content
		$data['content'] = 'product';

		// Utilities
		$data['list_products'] = $this->filter_data_products($this->group_product_model->get_group_product_all());
		$data['list_products_specific'] = $this->filter_data_products_specific(1, 1);
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	public function show($group_product_slug, $category_product_slug, $category_product_id)
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$id = 1;
		$page_content = '';

		// Process
		$category_product = $this->category_product_model->get_category_product_by_id(hashids_decrypt($category_product_id));

		/*
		| -------------------------------------------------------------------------
		| SET DATA
		| -------------------------------------------------------------------------
		*/

		// Title Page
		$data['title'] = $page_content->meta_tag_title;

		// Meta Tag
		$data['meta']['title'] = $page_content->meta_tag_title;
		$data['meta']['description'] = $page_content->meta_tag_description;
		$data['meta']['keyword'] = $page_content->meta_tag_keywords;

		// OG & Twitter
		$data['og_twitter']['title'] = $page_content->meta_tag_title;
		$data['og_twitter']['description'] = $page_content->meta_tag_description;
		// $data['og_twitter']['image'] = base_url('storage/uploads/images/contacts/'. $page_content->img_og_twitter);
		$data['og_twitter']['image'] = '';

		// Content
		$data['content'] = 'product';

		// Utilities
		$data['list_products'] = $this->filter_data_products($this->group_product_model->get_group_product_all());
		$data['list_products_specific'] = $this->filter_data_products_specific($category_product->group_product_id, $category_product->id);

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	public function ajax_get_product_by_id($id)
	{
		$status = 500;
		$response['success'] = 0;

		$product = $this->product_model->get_product_by_id(hashids_decrypt($id));

		if ($product != false) {

			$status = 200;
			$response['success'] = 1;

			$html_template = '
                <div class="warp-slide-product">
                    <h1>' . $product->title . '</h1>
                    <div class="des">' . $product->description_en . '|' . $product->description_th . '</div>
                    <div class="owl-product">
                        <div class="item"><img src="' . base_url("storage/uploads/images/products/$product->img") . '" width="100%"  height="300" /></div>
                    </div>
                    <p></p>
                    <a target="_blank" href="http://line.me/ti/p/~ALUMINATION" style="color:#fff; padding: 5;"><p style="text-align:center;padding: 0;background: #01b901;">สอบถามเพิ่มเติมได้ที่ <img src="' . base_url('resources/front_end/images/230x0w.jpg') . '" width="50" style="padding-left: 5px;" /></p></a>
                 </div>
            ';

			$js_template = '
                <script>
                    $(".owl-product").owlCarousel({
                        pagination : true,
                        navigation : false, // Show next and prev buttons
                        slideSpeed : 300,
                        paginationSpeed : 400,
                        singleItem:true
                    })
                    
                    var owl_product = $(".owl-product")
                    
                    $("#arrow-product-right").click(function(){
                        owl_product.trigger(\'owl.next\')
                    })
                    
                    $("#arrow-product-left").click(function(){
                        owl_product.trigger(\'owl.prev\')
                    })
                </script>
            ';

			$response['data'] = $html_template . $js_template;
		}

		// Send Response
		return $this->output
			->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

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
					$data[$key_group_product]['category_products'][$key_category_product]['category_product_description'] = $category_product->description;
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
		$data['category_product_description'] = $category_product->description;
		$data['category_product_img_cover'] = $category_product->img_cover;
		$data['category_product_img_title_alt'] = $category_product->img_title_alt;
		$data['products'] = [];

		if (count($products) > 0) {
			foreach ($products as $key_product => $product) {
				$data['products'][$key_product] = $product;
			}
		}

		return $data;
	}
}
