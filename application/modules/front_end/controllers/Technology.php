<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology extends MX_Controller {

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

    public function __construct()
    {
        parent::__construct();

        // Set Model
        $this->load->model('category_technology_model');
        $this->load->model('technology_video_model');
        $this->load->model('faq_technology_model');
    }


	public function index()
	{
		$data['content'] = 'technology';
        $data['category_technologies'] = $this->filter_data_products( $this->category_technology_model->get_category_technology_all());
        $data['technology_specific'] = $this->technology_video_model->get_technology_video_by_id(1);
        $data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;

		$this->load->view('app', $data);
	}

	public function show($category_technology_slug, $technology_slug, $technology_id)
    {
        $data['content'] = 'technology';
        $data['category_technologies'] = $this->filter_data_products( $this->category_technology_model->get_category_technology_all());
        $data['technology_specific'] = $this->technology_video_model->get_technology_video_by_id($technology_id);
        $data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;

        $this->load->view('app', $data);
    }

    public function show_faq($slug, $category_technology_id)
    {
        $data['content'] = 'technology';
        $data['category_technologies'] = $this->filter_data_products( $this->category_technology_model->get_category_technology_all());

        switch (rawurldecode($slug)) {
            case 'faq-คำถามที่พบบอย':

                $category_technology = $this->category_technology_model->get_category_technology_by_id($category_technology_id);

                $data['technology_specific']['faqs'] = $this->faq_technology_model->get_faq_technology_by_category_technology_id($category_technology_id);
                $data['technology_specific']['category_technology_name'] = $category_technology->title;
                $data['technology_specific_category_slug'] = $category_technology->slug;
                break;

            default:
                $data['technology_specific'] = $this->technology_video_model->get_technology_video_by_category_technology_id($category_technology_id);
                $data['technology_specific_category_slug'] = $data['technology_specific']->category_technology_slug;
                ;
        }

        $this->load->view('app', $data);
    }

    private function filter_data_products($category_technologies)
    {
        $data = [];

        foreach ($category_technologies as $key_category_technology => $category_technology) {

            /** CASE LIST */
            $CASE_VEDIO = 1;
            $CASE_TIPS = 2;
            $CASE_FAQ = 3;
            $CASE_OTHER = 0;

            if ($category_technology->id != $CASE_FAQ) {
                $technologies = $this->technology_video_model->get_technology_video_by_category_technology_id($category_technology->id);
            } else {
                $technologies = $this->faq_technology_model->get_faq_technology_by_category_technology_id($category_technology->id);
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
