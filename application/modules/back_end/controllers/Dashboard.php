<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
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
        $this->load->model('Logger_model');
        $this->load->model('Logger_event_model');

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

	public function index()
	{
        $this->data['title'] = 'Dashboard';
		$this->data['content'] = 'dashboard';
		$this->data['user_total'] = $this->User_model->get_users_count_total();
		$this->data['logs'] = $this->filter_data_logs($this->Logger_model->get_logs_all());
		$this->data['log_total'] = $this->Logger_model->get_logs_count_total();

		$this->load->view('app', $this->data);
	}

	private function filter_data_logs($logs)
	{
		$data = [];

		if (count($logs > 0)) {
			foreach ($logs as $key => $log) {
				$data[$key]['id'] = $log->id;
				$event = $this->Logger_event_model->get_log_events_by_id($log->event_id)->title;
				$html_badge = '';
				switch ($event) {
					case 'login':
						$html_badge = '<div class="badge badge-success">login</div>';
						break;

					case 'logout':
						$html_badge = '<div class="badge badge-info">logout</div>';
						break;

					case 'add':
						$html_badge = '<div class="badge badge-dark">add</div>';
						break;

					case 'update':
						$html_badge = '<div class="badge badge-warning">update</div>';
						break;

					case 'delete':
						$html_badge = '<div class="badge badge-danger">delete</div>';
						break;

					case 'sort_item':
						$html_badge = '<div class="badge badge-secondary">sort_item</div>';
						break;

					default:
						$html_badge = '<div class="badge badge-light">other</div>';
				}

				$data[$key]['event'] = $html_badge;
				$data[$key]['detail'] = $log->detail;
				$data[$key]['username'] = $this->User_model->get_user_by_id($log->user_id)->username;
				$data[$key]['ip'] = $log->ip;
				$data[$key]['created_at'] = $log->created_at;
			}
		}

		return $data;
	}
}
