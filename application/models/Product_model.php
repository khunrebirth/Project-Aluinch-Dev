<?php

class Product_model extends CI_Model
{

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
        $sql = "
    		SELECT 
    		    products.id,
				products.title,
				products.description_en,
				products.description_th, 
				products.created_at, 
				group_products.title AS  group_product_name,
				category_products.title AS category_product_name
			FROM products
			INNER JOIN group_products ON products.group_product_id = group_products.id
			INNER JOIN category_products ON  products.category_product_id = category_products.id
			WHERE products.group_product_id = $group_product_id AND products.category_product_id = $category_product_id
    	";

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->result() : [];
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

	public function get_count_product_image($product_id)
	{
		$sql = "
			SELECT COUNT(*) as count_picture FROM image_products
			WHERE product_id = $product_id
		";

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query->row() : false;
	}
}
