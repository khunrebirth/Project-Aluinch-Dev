<?php


class Technology_video_model extends CI_Model {

    public function get_technology_video_all()
    {
        $query = $this->db->get('technology_videos');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_technology_video_by_id($id)
    {
        $this->db->select('
            technology_videos.*,
            category_technologies.title as category_technology_name,
            category_technologies.slug as category_technology_slug
        ');
        $this->db->from('technology_videos');
        $this->db->join('category_technologies', 'category_technologies.id = technology_videos.category_technology_id');
        $this->db->where('technology_videos.id', $id);

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_technology_video_by_category_technology_id($id)
    {
        $this->db->select('
            technology_videos.*,
            category_technologies.title as category_technology_name,
            category_technologies.slug as category_technology_slug
        ');
        $this->db->from('technology_videos');
        $this->db->join('category_technologies', 'category_technologies.id = technology_videos.category_technology_id');
        $this->db->where('technology_videos.category_technology_id', $id);

        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insert_category_product($data)
    {
        $this->db->insert('technology_videos', $data);

        return $this->db->insert_id();
    }

    public function update_technology_video_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('technology_videos', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_technology_video_by_id($id)
    {
        return $this->db->where('id', $id)->delete('technology_videos');
    }
}
