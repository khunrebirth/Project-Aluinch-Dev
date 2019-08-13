<?php


class Team_model extends CI_Model {

    public function get_team_all()
    {
        $query = $this->db->get('teams');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_team_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('teams');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_team($data)
    {
        $this->db->insert('teams', $data);

        return $this->db->insert_id();
    }

    public function update_team_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('teams', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_team_by_id($id)
    {
        return $this->db->where('id', $id)->delete('teams');
    }
}
