<?php

class Category_technology_model extends CI_Model {

    public function get_category_technology_all()
    {
        $query = $this->db->get('category_technologies');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_category_technology_count_type_video($category_technology_id)
    {
        $sql = "
			SELECT COUNT(technology_videos.id) AS counter
			FROM category_technologies
			INNER JOIN technology_videos ON category_technologies.id = technology_videos.category_technology_id
			WHERE category_technologies.id = $category_technology_id
			GROUP BY category_technologies.id
        ";

        $query = $this->db->query($sql);

        return $query->num_rows() > 0 ? $query->row() : false;
    }

	public function get_category_technology_count_type_faq($category_technology_id)
	{
		$sql = "
			SELECT COUNT(faq_technologies.id) AS counter
			FROM category_technologies
			INNER JOIN faq_technologies on category_technologies.id = faq_technologies.category_technology_id
			WHERE category_technologies.id = $category_technology_id
			GROUP BY category_technologies.id
        ";

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query->row() : false;
	}


    public function get_category_technology_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('category_technologies');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_category_product($data)
    {
        $this->db->insert('category_technologies', $data);

        return $this->db->insert_id();
    }

    public function update_category_technology_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('category_technologies', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_category_technology_by_id($id)
    {
        return $this->db->where('id', $id)->delete('category_technologies');
    }
}
