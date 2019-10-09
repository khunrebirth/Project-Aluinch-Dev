<?php

class Logger_event_model extends CI_Model {

    public function get_log_events_all()
    {
        $query = $this->db->get('log_events');

        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_log_events_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('log_events');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function insert_log_events($data)
    {
        $this->db->insert('log_events', $data);

        return $this->db->insert_id();
    }

    public function update_log_events_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('log_events', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_log_events_by_id($id)
    {
        return $this->db->where('id', $id)->delete('log_events');
    }
}
