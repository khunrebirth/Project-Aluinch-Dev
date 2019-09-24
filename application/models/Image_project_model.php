<?php

class Image_project_model extends CI_Model {

    public function get_image_project_all()
    {
        $query = $this->db->get('image_projects');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_image_project_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('image_projects');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_image_project_by_project_id($id)
    {
        $query = $this->db->where('project_id', $id)->get('image_projects');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insert_image_project($data)
    {
        $this->db->insert('image_projects', $data);

        return $this->db->insert_id();
    }

    public function update_image_project_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('image_projects', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_image_project_by_id($id)
    {
        return $this->db->where('id', $id)->delete('image_projects');
    }
}
