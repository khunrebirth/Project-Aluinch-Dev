<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller
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
		$this->load->model('Project_model');
		$this->load->model('Image_project_model');
		$this->load->model('Category_technology_model');
		$this->load->model('Technology_video_model');
		$this->load->model('Faq_technology_model');
		$this->load->model('Portfolio_model');
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
		$data['content'] = 'home';

		// Utilities
		$data['portfolios'] = $this->portfolio_model->get_portfolio_all();
		$data['products']['aluminiums'] = $this->category_product_model->get_category_product_by_group_product_id(1);
		$data['products']['hardwares'] = $this->category_product_model->get_category_product_by_group_product_id(2);
		$data['technologies']['vdos'] = $this->technology_video_model->get_technology_video_by_category_technology_id(1);
		$data['technologies']['tips'] = $this->technology_video_model->get_technology_video_by_category_technology_id(2);
		$data['technologies']['faqs'] = $this->faq_technology_model->get_faq_technology_by_category_technology_id(3);
		$data['projects'] = $this->project_model->get_project_all();

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}
}
