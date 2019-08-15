<?php


class Product_model extends CI_Model {

    public function get_product_all()
    {
        $query = $this->db->get('products');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_product($data)
    {
        $this->db->insert('products', $data);

        return $this->db->insert_id();
    }

    public function update_product_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('products', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_product_by_id($id)
    {
        return $this->db->where('id', $id)->delete('products');
    }
}
