<?php

class Portfolio_model extends CI_Model {

    public function get_portfolio_all()
    {
        $query = $this->db->get('portfolios');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_portfolio_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('portfolios');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_portfolio($data)
    {
        $this->db->insert('portfolios', $data);

        return $this->db->insert_id();
    }

    public function update_portfolio_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('portfolios', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_portfolio_by_id($id)
    {
        return $this->db->where('id', $id)->delete('portfolios');
    }
}
