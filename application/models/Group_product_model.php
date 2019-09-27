<?php

class Group_product_model extends CI_Model {

    public function get_group_product_all()
    {
        $query = $this->db->get('group_products');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

	public function get_group_product_and_count_all()
	{
		$sql = "
			SELECT  group_products.id, 
					group_products.title, 
					group_products.slug, 
					group_products.created_at, 
					COUNT(category_products.id) AS counter
			FROM group_products
			LEFT JOIN category_products ON group_products.id = category_products.group_product_id
			GROUP BY group_products.id

        ";

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query->result() : false;
	}

    public function get_group_product_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('group_products');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_group_product($data)
    {
        $this->db->insert('group_products', $data);

        return $this->db->insert_id();
    }

    public function update_group_product_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('group_products', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_group_product_by_id($id)
    {
        return $this->db->where('id', $id)->delete('group_products');
    }
}
