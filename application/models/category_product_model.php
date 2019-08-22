<?php

class Category_product_model extends CI_Model {

    public function get_category_product_all()
    {
        $this->db->select('
            category_products.*,
            group_products.title as group_product_name
        ');
        $this->db->from('category_products');
        $this->db->join('group_products', 'group_products.id = category_products.group_product_id');

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_category_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('category_products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_category_product_by_group_product_id($id)
    {
        $query = $this->db->where('group_product_id', $id)->get('category_products');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insert_category_product($data)
    {
        $this->db->insert('category_products', $data);

        return $this->db->insert_id();
    }

    public function update_category_product_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('category_products', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_category_product_by_id($id)
    {
        return $this->db->where('id', $id)->delete('category_products');
    }
}
