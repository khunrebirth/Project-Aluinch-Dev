<?php

class contact_model extends CI_Model {

    public function get_contact_all()
    {
        $query = $this->db->get('contacts');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_contacts_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('contacts');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_contacts($data)
    {
        $this->db->insert('contacts', $data);

        return $this->db->insert_id();
    }

    public function update_contacts_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('contacts', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_contacts_by_id($id)
    {
        return $this->db->where('id', $id)->delete('contacts');
    }
}
