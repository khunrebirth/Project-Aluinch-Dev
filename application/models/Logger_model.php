<?php

class Logger_model extends CI_Model {

    public function get_logs_all()
    {
        $query = $this->db->order_by('created_at', 'desc')->get('logs');

        return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_logs_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('logs');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_logs($data)
    {
        $this->db->insert('logs', $data);

        return $this->db->insert_id();
    }

    public function update_logs_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('logs', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_logs_by_id($id)
    {
        return $this->db->where('id', $id)->delete('logs');
    }

	public function get_logs_count_total()
	{
		return $this->db->count_all('logs');
	}
}
