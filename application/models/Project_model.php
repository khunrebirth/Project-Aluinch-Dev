<?php

class Project_model extends CI_Model {

    public function get_project_all()
    {
        $query = $this->db->get('projects');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_project_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('projects');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_product($data)
    {
        $this->db->insert('projects', $data);

        return $this->db->insert_id();
    }

    public function update_project_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('projects', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_project_by_id($id)
    {
        return $this->db->where('id', $id)->delete('projects');
    }
}
