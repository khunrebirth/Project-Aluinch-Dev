<?php

class Contact_page_model extends CI_Model
{

    public function get_contact_page_all()
    {
        $query = $this->db->get('contact_page');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_contact_pages_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('contact_page');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_contact_pages($data)
    {
        $this->db->insert('contact_page', $data);

        return $this->db->insert_id();
    }

    public function update_contact_pages_by_id($id, $data)
    {
        echo $this->db->where('id', $id)->update('contact_page', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_contact_pages_by_id($id)
    {
        return $this->db->where('id', $id)->delete('contact_page');
    }
}
