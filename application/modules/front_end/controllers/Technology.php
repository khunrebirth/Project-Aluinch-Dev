<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology extends MX_Controller
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
		$this->load->model('Category_technology_model');
		$this->load->model('Technology_video_model');
		$this->load->model('Faq_technology_model');
		$this->load->model('Contact_page_model');
	}

	public function index()
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$technology_id = 1;
		$page_content = $this->Technology_video_model->get_technology_video_by_id($technology_id);

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
		$data['og_twitter']['image'] = base_url('storage/uploads/images/technologies/'. $page_content->img_og_twitter);

		// Content
		$data['content'] = 'technology';

		// Utilities
		$data['category_technologies'] = $this->filter_data_products($this->Category_technology_model->get_category_technology_all());
		$data['technology_specific'] = $this->Technology_video_model->get_technology_video_by_id(1);
		$data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	public function show($category_technology_slug, $technology_slug, $technology_id)
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$technology_id = hashids_decrypt($technology_id);
		$page_content = $this->Technology_video_model->get_technology_video_by_id($technology_id);

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
		$data['og_twitter']['image'] = base_url('storage/uploads/images/technologies/'. $page_content->img_og_twitter);

		// Content
		$data['content'] = 'technology';

		// Utilities
		$data['category_technologies'] = $this->filter_data_products($this->Category_technology_model->get_category_technology_all());
		$data['technology_specific'] = $this->Technology_video_model->get_technology_video_by_id($technology_id);
		$data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	public function show_faq($slug, $category_technology_id)
	{
		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

		$category_technology_id = hashids_decrypt($category_technology_id);
		$page_content = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);

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
		$data['og_twitter']['image'] = base_url('storage/uploads/images/technologies/'. $page_content->img_og_twitter);

		// Content
		$data['content'] = 'technology';

		// Utilities
		$data['category_technologies'] = $this->filter_data_products($this->Category_technology_model->get_category_technology_all());
		$data['contact_info'] = $this->Contact_page_model->get_contact_pages_by_id(1);

		switch (rawurldecode($slug)) {
			case 'faq-คำถามที่พบบอย':

				$category_technology = $this->Category_technology_model->get_category_technology_by_id($category_technology_id);

				$data['technology_specific']['faqs'] = $this->Faq_technology_model->get_faq_technology_by_category_technology_id($category_technology_id);
				$data['technology_specific']['category_technology_name'] = $category_technology->title;
				$data['technology_specific_category_slug'] = $category_technology->slug;
				break;

			default:
				$data['technology_specific'] = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
				$data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;;
		}

		/*
		| -------------------------------------------------------------------------
		| EXECUTE VIEWS
		| -------------------------------------------------------------------------
		*/

		$this->load->view('app', $data);
	}

	private function filter_data_products($category_technologies)
	{
		$data = [];

		foreach ($category_technologies as $key_category_technology => $category_technology) {

			/** CASE LIST **/
			$CASE_VEDIO = 1;
			$CASE_TIPS = 2;
			$CASE_FAQ = 3;
			$CASE_OTHER = 0;

			if ($category_technology->id != $CASE_FAQ) {
				$technologies = $this->Technology_video_model->get_technology_video_by_category_technology_id($category_technology->id);
			} else {
				$technologies = $this->Faq_technology_model->get_faq_technology_by_category_technology_id($category_technology->id);
			}

			$data[$key_category_technology]['category_technology_id'] = $category_technology->id;
			$data[$key_category_technology]['category_technology_name'] = $category_technology->title;
			$data[$key_category_technology]['category_technology_slug'] = $category_technology->slug;
			$data[$key_category_technology]['technologies'] = [];

			if (count($technologies) > 0) {
				foreach ($technologies as $key_technology => $technology) {
					$data[$key_category_technology]['technologies'][$key_technology] = $technology;
				}
			}
		}

		return $data;
	}
}
