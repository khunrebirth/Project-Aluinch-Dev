<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectReferences extends MX_Controller {

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
        $this->load->model('project_model');
    }


    public function index()
	{
	    // Set Data
		$data['content'] = 'project-references';
        $data['projects'] = $this->project_model->get_project_all();

		$this->load->view('app', $data);
	}

	public function ajax_get_project_by_id($id) {}
}
