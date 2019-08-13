<?php


class Service2_model extends CI_Model {

    public function get_service2_all()
    {
        $query = $this->db->get('services2');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_service2_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('services2');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_service2($data)
    {
        $this->db->insert('services2', $data);

        return $this->db->insert_id();
    }

    public function update_service2_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('services2', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_service2_by_id($id)
    {
        return $this->db->where('id', $id)->delete('services2');
    }
}
