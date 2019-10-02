<?php

class Project_page_model extends CI_Model
{

    public function get_project_page_all()
    {
        $query = $this->db->get('project_page');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_project_pages_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('project_page');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_project_pages($data)
    {
        $this->db->insert('project_page', $data);

        return $this->db->insert_id();
    }

    public function update_project_pages_by_id($id, $data)
    {
        echo $this->db->where('id', $id)->update('project_page', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_project_pages_by_id($id)
    {
        return $this->db->where('id', $id)->delete('project_page');
    }
}
