<?php


class Product_model extends CI_Model {

    public function get_product_all()
    {
        $this->db->select('
            products.*,
            group_products.title as group_product_name,
            category_products.title as category_product_name
        ');
        $this->db->from('products');
        $this->db->join('group_products', 'group_products.id = products.group_product_id');
        $this->db->join('category_products', 'category_products.id = products.category_product_id');

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_product_by_custom($group_product_id, $category_product_id)
    {
        $query = $this->db
            ->where('group_product_id', $group_product_id)
            ->where('category_product_id', $category_product_id)
            ->get('products');

        return $query->num_rows() > 0 ? $query->result() : null;
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
