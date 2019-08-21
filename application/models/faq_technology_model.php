<?php


class Faq_technology_model extends CI_Model {

    public function get_faq_technology_all()
    {
        $query = $this->db->get('faq_technologies');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_faq_technology_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('faq_technologies');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_faq_technology_by_category_technology_id($id)
    {
        $this->db->select('
            faq_technologies.*,
            category_technologies.title as category_technology_name,
            category_technologies.slug as category_technology_slug
        ');
        $this->db->from('faq_technologies');
        $this->db->join('category_technologies', 'category_technologies.id = faq_technologies.category_technology_id');
        $this->db->where('faq_technologies.category_technology_id', $id);

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insert_category_product($data)
    {
        $this->db->insert('faq_technologies', $data);

        return $this->db->insert_id();
    }

    public function update_faq_technology_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('faq_technologies', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_faq_technology_by_id($id)
    {
        return $this->db->where('id', $id)->delete('faq_technologies');
    }
}
