<?php

class Image_gallery_model extends CI_Model
{

    public function get_image_gallery_all()
    {
        $query = $this->db->get('image_galleries');

        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_image_gallery_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('image_galleries');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_image_gallery($data)
    {
        $this->db->insert('image_galleries', $data);

        return $this->db->insert_id();
    }

    public function update_image_gallery_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('image_galleries', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_image_gallery_by_id($id)
    {
        return $this->db->where('id', $id)->delete('image_galleries');
    }
}
