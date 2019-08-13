<?php


class Service_model extends CI_Model {

    public function get_service_all()
    {
        $query = $this->db->get('services');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_service_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('services');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_service($data)
    {
        $this->db->insert('services', $data);

        return $this->db->insert_id();
    }

    public function update_service_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('services', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_service_by_id($id)
    {
        return $this->db->where('id', $id)->delete('services');
    }
}
