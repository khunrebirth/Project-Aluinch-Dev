<?php

class Image_product_model extends CI_Model {

    public function get_image_product_all()
    {
        $query = $this->db->get('image_products');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_image_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('image_products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_image_product_by_product_id($id)
    {
        $query = $this->db->where('product_id', $id)->get('image_products');

        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function insert_image_product($data)
    {
        $this->db->insert('image_products', $data);

        return $this->db->insert_id();
    }

    public function update_image_product_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('image_products', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_image_product_by_id($id)
    {
        return $this->db->where('id', $id)->delete('image_products');
    }
}
