<?php

class Home_page_model extends CI_Model
{

    public function get_home_page_all()
    {
        $query = $this->db->get('home_page');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_home_pages_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('home_page');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_home_pages($data)
    {
        $this->db->insert('home_page', $data);

        return $this->db->insert_id();
    }

    public function update_home_pages_by_id($id, $data)
    {
        echo $this->db->where('id', $id)->update('home_page', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_home_pages_by_id($id)
    {
        return $this->db->where('id', $id)->delete('home_page');
    }
}
