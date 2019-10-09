<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_product extends MX_Controller
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

		/*
		| -------------------------------------------------------------------------
		| HANDLE
		| -------------------------------------------------------------------------
		*/

        $this->data['user'] = $this->User_model->get_user_by_id($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->data['title'] = 'Page: Product - Group';
        $this->data['content'] = 'group_product/group_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_and_count_all();

        $this->load->view('app', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Page: Product - Group - Add';
        $this->data['content'] = 'group_product/add_group_product';

        $this->load->view('app', $this->data);
    }

    public function store()
    {
        $add_group_product = $this->Group_product_model->insert_group_product([
        	'title' => $this->input->post('title'),
            'slug' => smm_slug($this->input->post('title'))
		]);

        if ($add_group_product) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'เพิ่ม Group Product',
                'event' => 'add',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Add Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

        redirect('backoffice/page/product/group');
    }

    public function show() {}

    public function edit($id)
    {
        $this->data['title'] = 'Page: Product - Group - Edit';
        $this->data['content'] = 'group_product/edit_group_product';
        $this->data['group_products'] = $this->Group_product_model->get_group_product_by_id($id);

        $this->load->view('app', $this->data);
    }

    public function update($id)
    {
        $update_group_product = $this->Group_product_model->update_group_product_by_id($id, [
			'title' => $this->input->post('title'),
            'slug' => smm_slug($this->input->post('title')),
			'updated_at' => date('Y-m-d H:i:s')
		]);

        if ($update_group_product) {

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'แก้ไข Group Product',
                'event' => 'update',
                'ip' => $this->input->ip_address(),
            ]);

			$this->session->set_flashdata('success', 'Edit Done');
		} else {
			$this->session->set_flashdata('error', 'Something wrong');
		}

        redirect('backoffice/page/product/group');
    }

    public function destroy($id)
    {
        $status = 500;
        $response['success'] = 0;

        $group_product = $this->Group_product_model->delete_group_product_by_id($id);

        // Set Response
        if ($group_product != false) {
            $status = 200;
            $response['success'] = 1;

            logger_store([
                'user_id' => $this->data['user']->id,
                'detail' => 'ลบ Group Product',
                'event' => 'delete',
                'ip' => $this->input->ip_address(),
            ]);
        }

        // Send Response
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
