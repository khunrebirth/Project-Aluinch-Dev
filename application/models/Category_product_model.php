<?php

class Category_product_model extends CI_Model {

    public function get_category_product_all()
    {
        $this->db->select('
            category_products.*,
            group_products.title as group_product_name,
            group_products.slug as group_product_slug
        ');
        $this->db->from('category_products');
        $this->db->join('group_products', 'group_products.id = category_products.group_product_id');

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_category_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('category_products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_category_product_by_group_product_id($id)
    {
        $this->db->select('
            category_products.*,
            group_products.title as group_product_name,
            group_products.slug as group_product_slug
        ');
        $this->db->from('category_products');
        $this->db->join('group_products', 'group_products.id = category_products.group_product_id');
        $this->db->where('category_products.group_product_id', $id);

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : [];
    }

	public function get_category_product_and_count_all_by_group_product_id($group_product_id)
	{
		$sql = "
			SELECT  category_products.*,
					group_products.title AS group_product_name,
					group_products.slug AS group_product_slug,
					COUNT(products.id) AS counter
			FROM category_products
			LEFT JOIN products ON category_products.id = products.category_product_id
			LEFT JOIn group_products ON group_products.id = category_products.group_product_id
			WHERE category_products.group_product_id = $group_product_id
			GROUP BY category_products.id
        ";

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query->result() : [];
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
