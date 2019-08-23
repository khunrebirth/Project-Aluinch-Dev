<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

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
        $this->load->model('project_model');
        $this->load->model('image_project_model');
        $this->load->model('category_technology_model');
        $this->load->model('technology_video_model');
        $this->load->model('faq_technology_model');
        $this->load->model('portfolio_model');

        // Set Data
		$data['content'] = 'home';
        $data['portfolios'] = $this->portfolio_model->get_portfolio_all();
        $data['products']['aluminiums'] = $this->category_product_model->get_category_product_by_group_product_id(1);
        $data['products']['hardwares'] = $this->category_product_model->get_category_product_by_group_product_id(2);
        $data['technologies']['vdos'] = $this->technology_video_model->get_technology_video_by_category_technology_id(1);
        $data['technologies']['tips'] = $this->technology_video_model->get_technology_video_by_category_technology_id(2);
        $data['technologies']['faqs'] = $this->faq_technology_model->get_faq_technology_by_category_technology_id(3);
        $data['projects'] = $this->project_model->get_project_all();

		$this->load->view('app', $data);
	}
}
