<?php


class Blog_category_model extends CI_Model {

    public function get_blog_category_all()
    {
        $query = $this->db->get('blog_categories');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_blog_category_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('blog_categories');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_blog_category($data)
    {
        $this->db->insert('blog_categories', $data);

        return $this->db->insert_id();
    }

    public function update_blog_category_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('blog_categories', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_blog_category_by_id($id)
    {
        return $this->db->where('id', $id)->delete('blog_categories');
    }
}
